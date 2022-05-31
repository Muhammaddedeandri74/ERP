<?php


class backgroundservice extends CI_Model
{
    function getshop()
    {
        $query = "SELECT * FROM tb_company";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                $respon["idshop"] = $key->idkmotion;
                $respon["idwh"] = $key->idwh;
            }
        } else {
            $respon = "Tidak Konek K-Motion";
        }

        return $respon;
    }


    function syncitem($idshop)
    {
        $respon = "";
        $data = array($idshop);
        $query = "SELECT * FROM tb_item WHERE sync = 'n' AND bom = 'n'";
        $db =  $this->load->database('kmotion', TRUE);
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                $typeqty = "";
                if ($key->jenisqty == "non stock") {
                    $jenisqty = "Service";
                } else {
                    $typeqty = "Stock";
                }
                $status = "";
                if ($key->status == "1") {
                    $status = "Active";
                } else {
                    $status = "No-Active";
                }
                $data1 = array($idshop, $key->iditem, $key->sku);
                $query1 = "SELECT * FROM tb_item where idtoko = ? AND iditemserp = ? AND sku = ?";
                $eksekusi1 = $db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    foreach ($eksekusi1 as $key1) {
                        $data2 = array($key->nameitem, $key->price, $typeqty, $key->deskripsi, $status, $idshop, $key->iditem, $key->sku);
                        $query2 = "UPDATE tb_item set nameitem = ? , price = ? , typeqty = ?, dsc = ?,status = ? WHERE idtoko = ? AND iditemserp = ? AND sku = ?";
                        $eksekusi2 = $db->query($query2, $data2);
                        if ($eksekusi2 == true) {
                            $data3 = array($key->iditem, $key->sku);
                            $query3 = "UPDATE tb_item set sync = 'y' WHERE iditem = ? AND sku = ?";
                            $eksekusi3 = $this->db->query($query3, $data3);
                            if ($eksekusi3 == true) {
                                $respon = "Data Terupdate dari " . $key1->nameitem . " menjadi " . $key->nameitem . "\n";
                            } else {
                                $respon = "Failed";
                                break;
                            }
                        } else {
                            $respon = "Failed";
                            break;
                        }
                    }
                } else {
                    $data2 = array($idshop, $key->nameitem, $key->price, $typeqty, $key->deskripsi, $status, $key->iditem, $key->sku);
                    $query2 = "INSERT INTO tb_item(idtoko,category,nameitem,price,qty,typeqty,dsc,status,iditemserp,sku)VALUES(?,1,?,?,0,?,?,?,?,?)";
                    $eksekusi2 = $db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($key->iditem, $key->sku);
                        $query3 = "UPDATE tb_item set sync = 'y' WHERE iditem = ? AND sku = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $respon = "Data item Bertambah nama item = " . $key->nameitem . "\n";
                        } else {
                            $respon = "Failed";
                            break;
                        }
                    } else {
                        $respon = "Failed";
                        break;
                    }
                }
            }
        }

        return $respon;
    }


    function syncinvin($idshop, $idwh)
    {
        $respon = "";
        $data = array($idwh);
        $query = " 	SELECT * FROM invin LEFT JOIN invindet ON invin.idin = invindet.idin LEFT JOIN tb_customer ON invin.idcust = tb_customer.idcust WHERE invin.sync = 'n' AND invin.idwh = '2'";
        $eksekusi = $this->db->query($query, $data)->result_object();
        $db =  $this->load->database('kmotion', TRUE);
        if (count($eksekusi) > 0) {
            $codein = "";
            foreach ($eksekusi as $key) {
                $data1 = array($key->iditem);
                $query1 = "SELECT * FROM tb_item where iditemserp = ?";
                $eksekusi1 = $db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    $respon  = 1;
                    $data2 = array($key->datein, $idshop, $key->codein, $key->namecust, $key->qtyin, ucfirst($key->typein), $key->total, 'S-ERP');
                    $query2 = "INSERT INTO tb_invin (dateinvin,idshop,codeinvin,namesupp,qtyin,typein,price,`from`) VALUES(?,?,?,?,?,?,?,?)";
                    if ($codein != $key->codein) {
                        $codein = $key->codein;
                        $eksekusi2 = $db->query($query2, $data2);
                    }

                    if ($eksekusi2 == true) {

                        $data3 = array($key->codein);
                        $query3 = "UPDATE invin SET sync = 'y' where codein = ? AND sync = 'n'";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            if (count($eksekusi1) > 0) {
                                foreach ($eksekusi1 as $key1) {
                                    $respon  = 1;
                                    $data2 = array($key->codein, $key1->iditem, $key->qtyindet, $key->harga);
                                    $query2 = "INSERT INTO tb_invindet (codeinvin,iditem,qtyin,price) VALUES(?,?,?,?)";
                                    $eksekusi2 = $db->query($query2, $data2);
                                    if ($eksekusi2 == true) {
                                        $dataflow = array($key1->idtoko, $key1->iditem);
                                        $querydataflow = "SELECT * FROM tb_flowitemwh	 WHERE idshop	= ? AND iditem	= ?";
                                        $eksekusidataflow = $db->query($querydataflow, $dataflow)->result_object();
                                        if (count($eksekusidataflow) > 0) {
                                            $begin;
                                            foreach ($eksekusidataflow as $keyx) {
                                                $begin     = $keyx->qty;
                                            }
                                            $newqty = $begin + $key->qtyindet;
                                            $data12 = array($key->qtyindet, $newqty, $idshop, $key1->iditem);
                                            $query12 = "UPDATE tb_flowitemwh SET buy = buy + ? , qty = ? WHERE idshop = ? AND iditem = ?";
                                            // $data12 = array($idshop, $iditem[$i], $qtyitem[$i], $newqty);
                                            // $query12 = "INSERT INTO tb_flowitemwh(idshop,iditem,buy,qty) VALUES (?,?,?,?)";
                                            $eksekusi12 = $db->query($query12, $data12);
                                            if ($eksekusi12 == true) {
                                                $dateflow = date('Y-m-d');
                                                $data13 = array($idshop, $key1->iditem, $key->qtyindet, $newqty, $begin, $dateflow);
                                                $query13 = "INSERT INTO tb_flowitem(idtoko,iditem,buy,qty,start,`desc`,dateflow) VALUES (?,?,?,?,?,'Inventory IN " . $key->codein . "', ?)";
                                                $eksekusi13 = $db->query($query13, $data13);
                                                if ($eksekusi13 == true) {
                                                    $respon = "Success";
                                                } else {
                                                    $respon = "Failed6";
                                                }
                                            } else {
                                                $respon = "Failed7";
                                                break;
                                            }
                                        } else {
                                            $newqty = 0 + $key->qtyin;
                                            $data12 = array($idshop, $key1->iditem, $key->qtyindet, $newqty);
                                            $query12 = "INSERT INTO tb_flowitemwh(idshop,iditem,buy,qty) VALUES (?,?,?,?)";
                                            $eksekusi12 = $db->query($query12, $data12);
                                            if ($eksekusi12 == true) {
                                                $dateflow = date('Y-m-d');
                                                $data13 = array($idshop, $key1->iditem, $key->qtyindet, $newqty, $dateflow);
                                                $query13 = "INSERT INTO tb_flowitem(idtoko,iditem,buy,qty,start,`desc`,dateflow) VALUES (?,?,?,?,'0','Inventory IN " . $key->codein . "',?)";
                                                $eksekusi13 = $db->query($query13, $data13);
                                                if ($eksekusi13 == true) {
                                                    $respon = "Success";
                                                } else {
                                                    $respon = "Failed8";
                                                }
                                            } else {
                                                $respon = "Failed9";
                                                break;
                                            }
                                        }



                                        $datax = array($key->qtyindet, $key1->iditem, $idshop);
                                        $queryx = "UPDATE tb_item SET qty = qty + ? WHERE iditem = ? AND idtoko = ? ";
                                        $eksekusix = $db->query($queryx, $datax);
                                        if ($eksekusix == true) {
                                            $respon = "Success Sync Invin " . $key->codein;
                                        } else {
                                            $respon = "Failed10";
                                            break;
                                        }
                                    } else {
                                        $respon = "Failed4";
                                    }
                                }
                            } else {
                                $respon = "Failed5";
                            }
                        } else {
                            $respon = "Failed1";
                        }
                    } else {
                        $respon = "Failed2";
                    }
                } else {
                    $respon = "Failed3";
                }
            }
        } else {
            $respon = "NOt Found";
        }

        return $respon;
    }

    function syncinvout($idshop, $idwh)
    {
        $respon = "";
        $data = array($idwh);
        $query = "SELECT *,invout.qtyout as qtyouts, invout.qtyout as qtyoutx FROM invout LEFT JOIN invoutdet ON invout.codeinvout = invoutdet.codeinvout LEFT JOIN tb_customer ON invout.idsupp = tb_customer.idcust WHERE invout.sync = 'n' AND invout.idwh = '2'";
        $eksekusi = $this->db->query($query, $data)->result_object();
        $db =  $this->load->database('kmotion', TRUE);
        if (count($eksekusi) > 0) {

            $eksekusi2 = "";
            foreach ($eksekusi as $key) {
                $codeinvout = "";
                $data1 = array($key->iditem);
                $query1 = "SELECT * FROM tb_item where iditemserp = ?";
                $eksekusi1 = $db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    $respon  = 1;
                    $typeout = "";
                    if ($key->typeout == "Return") {
                        $typeout = "Supplier";
                    } else {
                        $typeout = $key->typeout;
                    }
                    $data2 = array($key->dateout, $idshop, $key->codeinvout, $key->namecust, $key->qtyouts, ucfirst($typeout), '0', 'S-ERP');
                    $query2 = "INSERT INTO tb_invout (dateinvout,idshop,noinvout,namesupp,qtyout,typeout,price,`from`) VALUES(?,?,?,?,?,?,?,?)";
                    if ($codeinvout != $key->codeinvout) {
                        $codeinvout = $key->codeinvout;
                        $eksekusi2 = $db->query($query2, $data2);
                    }

                    if ($eksekusi2 == true) {

                        $data3 = array($key->codeinvout);
                        $query3 = "UPDATE invout SET sync = 'y' where codeinvout = ? AND sync = 'n'";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            if (count($eksekusi1) > 0) {
                                foreach ($eksekusi1 as $key1) {
                                    $respon  = 1;
                                    $data2 = array($key->codeinvout, $key1->iditem, $key->qtyoutx, "0");
                                    $query2 = "INSERT INTO tb_invoutdet (noinvout,iditem,qtyout,price) VALUES(?,?,?,?)";
                                    $eksekusi2 = $db->query($query2, $data2);
                                    if ($eksekusi2 == true) {
                                        $dataflow = array($key1->idtoko, $key1->iditem);
                                        $querydataflow = "SELECT * FROM tb_flowitemwh	 WHERE idshop	= ? AND iditem	= ?";
                                        $eksekusidataflow = $db->query($querydataflow, $dataflow)->result_object();
                                        if (count($eksekusidataflow) > 0) {
                                            $begin;
                                            foreach ($eksekusidataflow as $keyx) {
                                                $begin     = $keyx->qty;
                                            }
                                            $newqty = $begin - $key->qtyoutx;
                                            $data12 = array($key->qtyoutx, $newqty, $idshop, $key1->iditem);
                                            $query12 = "UPDATE tb_flowitemwh SET sell = sell + ? , qty = ? WHERE idshop = ? AND iditem = ?";
                                            // $data12 = array($idshop, $iditem[$i], $qtyitem[$i], $newqty);
                                            // $query12 = "INSERT INTO tb_flowitemwh(idshop,iditem,buy,qty) VALUES (?,?,?,?)";
                                            $eksekusi12 = $db->query($query12, $data12);
                                            if ($eksekusi12 == true) {
                                                $dateflow = date('Y-m-d');
                                                $data13 = array($idshop, $key1->iditem, $key->qtyoutx, $newqty, $begin, $dateflow);
                                                $query13 = "INSERT INTO tb_flowitem(idtoko,iditem,sell,qty,start,`desc`,dateflow) VALUES (?,?,?,?,?,'Inventory OUT " . $key->codeinvout . "', ?)";
                                                $eksekusi13 = $db->query($query13, $data13);
                                                if ($eksekusi13 == true) {
                                                    $respon = "Success";
                                                } else {
                                                    $respon = "Failed6";
                                                }
                                            } else {
                                                $respon = "Failed7";
                                                break;
                                            }
                                        } else {
                                            $newqty = 0 - $key->qtyoutx;
                                            $data12 = array($idshop, $key1->iditem, $key->qtyoutx, $newqty);
                                            $query12 = "INSERT INTO tb_flowitemwh(idshop,iditem,sell,qty) VALUES (?,?,?,?)";
                                            $eksekusi12 = $db->query($query12, $data12);
                                            if ($eksekusi12 == true) {
                                                $dateflow = date('Y-m-d');
                                                $data13 = array($idshop, $key1->iditem, $key->qtyoutx, $newqty, $dateflow);
                                                $query13 = "INSERT INTO tb_flowitem(idtoko,iditem,buselly,qty,start,`desc`,dateflow) VALUES (?,?,?,?,'0','Inventory OUT " . $key->codeinvout . "',?)";
                                                $eksekusi13 = $db->query($query13, $data13);
                                                if ($eksekusi13 == true) {
                                                    $respon = "Success";
                                                } else {
                                                    $respon = "Failed8";
                                                }
                                            } else {
                                                $respon = "Failed9";
                                                break;
                                            }
                                        }



                                        $datax = array($key->qtyoutx, $key1->iditem, $idshop);
                                        $queryx = "UPDATE tb_item SET qty = qty - ? WHERE iditem = ? AND idtoko = ? ";
                                        $eksekusix = $db->query($queryx, $datax);
                                        if ($eksekusix == true) {
                                            $respon = "Success Sync Invout " . $key->codeinvout;
                                        } else {
                                            $respon = "Failed10";
                                            break;
                                        }
                                    } else {
                                        $respon = "Failed4";
                                    }
                                }
                            } else {
                                $respon = "Failed5";
                            }
                        } else {
                            $respon = "Failed1";
                        }
                    } else {
                        $respon = "Failed2";
                    }
                } else {
                    $respon = "Failed3";
                }
            }
        } else {
            $respon = "NOt Found";
        }

        return $respon;
    }

    function syncsales($idshop, $idwh)
    {
        $db =  $this->load->database('kmotion', TRUE);
        $data = array($idshop);
        $query = "SELECT*, count(tb_order.iditem) AS count,SUM(qty)AS totalqty, tb_orderheader.amount AS amounts FROM tb_orderheader, tb_order, user WHERE tb_order.idtoko = ? AND tb_order.orderno = tb_orderheader.orderno AND tb_orderheader.iduser = user.iduser AND tb_orderheader.status = 'finish' AND tb_orderheader.sync = 'n' GROUP BY tb_order.orderno  ";
        $eksekusi = $db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                $data1 = array($key->iduser);
                $query1 = "SELECT * FROM user where iduser = ?";
                $eksekusi1 = $db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    $idcust = "";
                    foreach ($eksekusi1 as $key1) {
                        $data2 = array($key1->fullname, $key1->email, $key1->phone, $key->delivorder);
                        $query2 = "SELECT * FROM tb_customer where namecust = ? AND email = ? AND phonecust = ? AND addresscust = ?";
                        $eksekusi2 = $this->db->query($query2, $data2)->result_object();
                        if (count($eksekusi2) > 0) {
                            foreach ($eksekusi2 as $key2) {
                                $idcust = $key2->idcust;
                            }
                        } else {
                            $query3 = "SELECT * FROM tb_customer ORDER BY idcust DESC LIMIT 1";
                            $eksekusi3 = $this->db->query($query3)->result_object();
                            if (count($eksekusi3) > 0) {
                                foreach ($eksekusi3 as $key3) {
                                    $idcust = $key3->idcust + 1;
                                    $codecust = "CC" . str_replace("CC", "", $key3->codecust) + 1;
                                    $data4 = array($codecust, 'Buyer', $key1->fullname, $key1->phone, $key1->email, $key1->phone, $key->delivorder);
                                    $query4 = "INSERT INTO tb_customer (codecust,typecust,namecust,phonecust,email,nocontact,addresscust)VALUES(?,?,?,?,?,?,?)";
                                    $eksekusi4 = $this->db->query($query4, $data4);
                                }
                            } else {
                                $idcust = 1;
                                $codecust = "CC01";
                                $data4 = array($codecust, 'Buyer', $key1->fullname, $key1->phone, $key1->email, $key1->phone, $key->delivorder);
                                $query4 = "INSERT INTO tb_customer (codecust,typecust,namecust,phonecust,email,nocontact,addresscust)VALUES(?,?,?,?,?,?,?)";
                                $eksekusi4 = $this->db->query($query4, $data4);
                            }
                        }
                    }

                    if ($idcust != "") {
                        $codeso = "";
                        $data5 = array($idwh);
                        $query5 = "SELECT * FROM tb_salesorder where idwh = ? ORDER BY codeso DESC LIMIT 1";
                        $eksekusi5 = $this->db->query($query5, $data5)->result_object();
                        if (count($eksekusi5) > 0) {
                            foreach ($eksekusi5 as $key5) {
                                $codeso = "SLS-TRS-" . str_replace("SLS-TRS-", "", $key5->codeso) + 1;
                            }
                        } else {

                            $query7 = "SELECT * FROM tb_salesorder  ORDER BY codeso DESC LIMIT 1";
                            $eksekusi7 = $this->db->query($query7)->result_object();
                            if (count($eksekusi7) > 0) {
                                foreach ($eksekusi7 as $key7) {
                                    $codeso = "SLS-TRS-" . str_replace("SLS-TRS-", "", $key7->codeso) + 1;
                                }
                            } else {
                                $codeso = "SLS-TRS-1";
                            }
                        }
                        $data6 = array(
                            $idwh, $idcust, $codeso, $key->orderno, $key->orderdate, $key->orderdate, $key->delivaddr, "E-Commerce", "", $key->phone, $key->amounts, $key->amounts, $key->amountongkir, $key->amounttotal, $key->totalqty, $key->totalqty, 'Finish', 'K-Motion'
                        );
                        $query6 = "INSERT INTO tb_salesorder(idwh,idcust,codeso,nopesanan,dateso,delivdate,delivaddr,tipeorder,norekening,nocontact,subtotal,totaldisc,ongkir,
                        grandtotalso,qtyso,qtyout,statusorder,`from`)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $eksekusi6 = $this->db->query($query6, $data6);
                        if ($eksekusi6 == true) {

                            $data7 = array($codeso);
                            $query7 = "SELECT * FROM tb_salesorder where codeso = ?";
                            $eksekusi7 = $this->db->query($query7, $data7)->result_object();
                            if (count($eksekusi7) > 0) {
                                foreach ($eksekusi7 as $key7) {
                                    $idso = $key7->idso;
                                    $data8 = array($key->orderno);
                                    $query8 = "SELECT * FROM tb_order where orderno = ?";
                                    $eksekusi8 = $db->query($query8, $data8)->result_object();
                                    if (count($eksekusi8) > 0) {
                                        foreach ($eksekusi8 as $key8) {
                                            $data10 = array($key8->iditem);
                                            $query10 = "SELECT * FROM tb_item WHERE iditem = ?";
                                            $eksekusi10 = $db->query($query10, $data10)->result_object();
                                            if (count($eksekusi10) > 0) {
                                                foreach ($eksekusi10 as $key10) {
                                                    $data9 = array($idso, $key10->iditemserp, $key8->price, $key8->qty, $key8->qty, $key8->price * $key8->qty, $key8->ppromo, $key8->amount);
                                                    $query9 = "INSERT INTO tb_salesorderdetail(idso,iditem,price,qtyso,qtyout,totalso,disnomdet,grandtotaldet)VALUES(?,?,?,?,?,?,?,?)";
                                                    $eksekusi9 = $this->db->query($query9, $data9);
                                                    if ($eksekusi9 == true) {
                                                        $respon = "Success";
                                                    } else {
                                                        $respon = "Failed Insert Sales order detail";
                                                    }
                                                }

                                                if ($respon == "Success") {
                                                    $query11 = "SELECT * FROM invout order by codeinvout DESC LIMIT 1";
                                                    $eksekusi11 = $this->db->query($query11)->result_object();

                                                    $noinvout = "";
                                                    if (count($eksekusi11) > 0) {
                                                        foreach ($eksekusi11 as $key11) {
                                                            $noinvout = "OUT-TRS-" . str_replace("OUT-TRS-", "", $key11->codeinvout) + 1;
                                                        }
                                                    } else {
                                                        $noinvout = "OUT-TRS-1";
                                                    }

                                                    $data12 = array($noinvout, $idso, $noinvout, "Sales", $idwh, $idcust, $key->orderdate, $key->totalqty, $key->totalqty, "Process", 'y');
                                                    $query12 = "INSERT INTO invout (codeinvout,idso,nodo,typeout,idwh,idsupp,dateout,qtyout,qtyin,statusout,sync)VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                                                    $eksekusi12 = $this->db->query($query12, $data12);
                                                    if ($eksekusi12 == true) {
                                                        $expdate = "";
                                                        $data13 = array($idwh, $key10->iditemserp, $key8->qty);
                                                        $query13 = "SELECT * FROM tb_itemqtyexp WHERE idwh = ? AND iditem = ? AND endqty - ? >= 0";
                                                        $eksekusi13 = $this->db->query($query13, $data13)->result_object();
                                                        if (count($eksekusi13) > 0) {
                                                            foreach ($eksekusi13 as $key13) {
                                                                $expdate = $key13->expdate;
                                                            }
                                                        } else {
                                                            $expdate = substr($key->orderdate, 0, 10);
                                                        }

                                                        $data14 = array($noinvout, $key10->iditemserp, $key8->qty, $expdate);
                                                        $query14 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                                        $eksekusi14 = $this->db->query($query14, $data14);
                                                        if ($eksekusi14 == true) {
                                                            $data15 = array($key10->iditemserp);
                                                            $query15 = "SELECT * FROM tb_item WHERE iditem = ?";
                                                            $eksekusi15 = $this->db->query($query15, $data15)->result_object();
                                                            if (count($eksekusi15) > 0) {

                                                                foreach ($eksekusi15 as $key15) {

                                                                    if ($key15->jenisqty != "non stock") {
                                                                        $data16 = array($key8->qty, $key8->qty, $key8->qty, $idwh, $key15->iditem);
                                                                        $query16 = "UPDATE tb_itemqty SET endqty = endqty - ? , qtyso = qtyso - ?, outqty = outqty + ? WHERE idwh = ? AND iditem = ?";
                                                                        $eksekusi16 = $this->db->query($query16, $data16);
                                                                        if ($this->db->affected_rows()) {
                                                                            $data17 = array($key8->qty, $key8->qty, $idwh, $key15->iditem, $expdate);
                                                                            $query17 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? ,  outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND expdate = ? ";
                                                                            $eksekusi17 = $this->db->query($query17, $data17);
                                                                            if ($this->db->affected_rows()) {
                                                                                $data21 = array($key->orderno);
                                                                                $query21 = "UPDATE tb_orderheader set sync = 'y' WHERE orderno = ?";
                                                                                $eksekusi21 = $db->query($query21, $data21);
                                                                                if ($eksekusi21 == true) {
                                                                                    $respon = "Success Input Sales Status Pada id salesorder = " . $key->orderno;
                                                                                } else {
                                                                                    $respon = "Failed On Sales Status Pada id salesorder = " . $key->orderno;
                                                                                }
                                                                            } else {
                                                                                $data22 = array($key8->qty, 0 - $key8->qty, $idwh, $key15->iditem, $expdate);
                                                                                $query22 = "INSERT INTO tb_itemqtyexp (outqty,endqty,idwh,iditem,expdate)VALUES(?,?,?,?,?) ";
                                                                                $eksekusi22 = $this->db->query($query22, $data22);
                                                                            }
                                                                        } else {
                                                                            $data23 = array($key8->qty, 0 - $key8->qty, $idwh, $key15->iditem);
                                                                            $query23 = "INSERT INTO tb_itemqty (outqty,endqty,idwh,iditem) VALUES(?,?,?,?)";
                                                                            $eksekusi23 = $this->db->query($query23, $data23);
                                                                            break;
                                                                        }
                                                                    } else {
                                                                        $data18 = array($key15->iditem, $idwh);
                                                                        $query18 = "SELECT * FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                                                                        $eksekusi18 = $this->db->query($query18, $data18)->result_object();
                                                                        if (count($eksekusi18) > 0) {
                                                                            foreach ($eksekusi18 as $key18) {
                                                                                $datax = array($key18->iditembom, $idwh, $key8->qty * $key18->qty);
                                                                                $queryx = "SELECT * FROM tb_itemqtyexp where iditem = ? AND idwh = ? AND endqty - ? >=0 ORDER BY expdate ASC LIMIT 1";
                                                                                $eksekusix = $this->db->query($queryx, $datax)->result_object();
                                                                                if (count($eksekusix) > 0) {
                                                                                    foreach ($eksekusix as $keyx) {
                                                                                        $data19 = array($key8->qty * $key18->qty, $key8->qty * $key18->qty, $key18->iditembom, $idwh);
                                                                                        $query19 = "UPDATE tb_itemqty SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ? ";
                                                                                        $eksekusi19 = $this->db->query($query19, $data19);
                                                                                        if ($eksekusi19 == true) {
                                                                                            $data8 = array($noinvout, $key18->iditembom, $key8->qty * $key18->qty, $keyx->expdate);
                                                                                            $query8 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                                                                            $eksekusi8 = $this->db->query($query8, $data8);
                                                                                            if ($eksekusi8 == true) {
                                                                                                $data20 = array($key8->qty * $key18->qty, $key8->qty * $key18->qty, $key18->iditembom, $idwh, $keyx->expdate);
                                                                                                $query20 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ?  AND expdate = ?";
                                                                                                $eksekusi20 = $this->db->query($query20, $data20);
                                                                                                if ($eksekusi20 == true) {
                                                                                                    $data21 = array($key->orderno);
                                                                                                    $query21 = "UPDATE tb_orderheader set sync = 'y' WHERE orderno = ?";
                                                                                                    $eksekusi21 = $db->query($query21, $data21);
                                                                                                    if ($eksekusi21 == true) {
                                                                                                        $respon = "Success Input Sales Status Pada id salesorder = " . $key->orderno;
                                                                                                    } else {
                                                                                                        $respon = "Failed On Sales Status Pada id salesorder = " . $key->orderno;
                                                                                                    }
                                                                                                } else {
                                                                                                    $data24 = array($key8->qty * $key18->qty, 0 - $key8->qty * $key18->qty, $idwh, $key18->iditembom, $keyx->expdate);
                                                                                                    $query24 = "INSERT INTO tb_itemqtyexp (outqty,endqty,idwh,iditem,expdate) VALUES(?,?,?,?,?)";
                                                                                                    $eksekusi24 = $this->db->query($query24, $data24);
                                                                                                }
                                                                                            } else {
                                                                                                $respon = "Failed On Insert Item BOM invoutdet ";
                                                                                                break;
                                                                                            }
                                                                                        } else {
                                                                                            $data25 = array($key8->qty * $key18->qty, 0 - $key8->qty * $key18->qty, $key18->iditembom, $idwh);
                                                                                            $query25 = "INSERT INTO tb_itemqty (outqty,endqty,iditem,idwh) VALUES(?,?,?,?)";
                                                                                            $eksekusi25 = $this->db->query($query25, $data25);
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                } else {
                                                                                    $respon = "Failed For Get Exp Date BOM";
                                                                                }
                                                                            }
                                                                        } else {
                                                                            $respon = "Failed For Get Item BOM";
                                                                            break;
                                                                        }
                                                                    }


                                                                    if ($respon == "Success") {
                                                                    }
                                                                }
                                                            } else {
                                                                $respon = "Item Not Found";
                                                            }
                                                        } else {
                                                            $respon = "Failed Insert Invoice Detail";
                                                        }
                                                    } else {
                                                        $respon = "Failed Insert Invoice";
                                                    }
                                                }
                                            } else {
                                                $respon = "Not Sync Item on K-Motion to S-ERP";
                                            }
                                        }
                                    } else {
                                        $respon = "Sales Order Not Found";
                                    }
                                }
                            } else {
                                $respon = "failed get detail";
                            }
                        } else {
                            $respon = "Failed Insert Sales Order";
                        }
                    } else {
                        $respon = "Customer Tidak ada";
                    }
                } else {
                    $respon = "Customer Tidak Ditemukan";
                }
            }
        } else {
            $respon = "Not Found Sales";
        }
        return $respon;
    }
}
