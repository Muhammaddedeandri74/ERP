<?php

class MSalesInvoice extends CI_Model
{

    function getuser()
    {
        $query = "SELECT DISTINCT tb_customer.namecust, tb_customer.idcust,tb_customer.phonecust FROM tb_salesorder,invout,tb_customer WHERE tb_salesorder.idcust = tb_customer.idcust 
        AND invout.idso = tb_salesorder.idso AND tb_salesorder.grandtotalso > totalinvoice AND invout.statusinvoice != 'Ready' ORDER BY tb_customer.namecust ASC";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["namecust"] = $key->namecust;
                $f["phonecust"] = $key->phonecust;
                $f["idcust"] = $key->idcust;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function getlistout($filter, $search, $date1, $date2)
    {
        $data = array("%" . $search . "%", $date1, $date2);
        $query = "SELECT tb_salesorder.codeso,invout.*,tb_customer.namecust,tb_customer.phonecust FROM tb_salesorder,invout,tb_customer WHERE tb_salesorder.idcust = tb_customer.idcust 
        AND invout.idso = tb_salesorder.idso AND CAST(tb_salesorder.grandtotalso AS INT)  >  CAST(tb_salesorder.totalinvoice AS INT) AND invout.statusinvoice != 'Ready'  AND " . $filter . " LIKE ? AND invout.dateout between ? AND ? ORDER BY tb_customer.namecust ASC";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["idinvout"] = $key->idinvout;
                $f["codeinvout"] = $key->codeinvout;
                if ($key->codeso == null) {
                    $f["codeso"] = "-";
                } else {
                    $f["codeso"] = $key->codeso;
                }
                if ($key->nodo == null) {
                    $f["nodo"] = "-";
                } else {
                    $f["nodo"] = $key->nodo;
                }

                $f["typeout"] = $key->typeout;
                $f["query"] = $this->db->last_query();
                $f["namecust"] = $key->namecust;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;

                $data1 = array($key->codeinvout);
                $query1 = "SELECT count(*) as total FROM invoutdet where codeinvout = ?";
                $eksekusi1 = $this->db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    foreach ($eksekusi1 as $key1) {
                        $f["qtyout"] = $key1->total;
                    }
                } else {
                    $f["qtyout"] = 0;
                }
                // $f["qtyout"] = $key->qtyout;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function detailinvout($idinvout)
    {
        $data = array($idinvout);
        $query = "
        SELECT *,tb_salesorderdetail.price AS prices,invoutdet.qtyout AS outqty,tb_customer.namecust, tb_customer.idcust FROM tb_salesorder,tb_salesorderdetail,invout,invoutdet,tb_item,tb_customer WHERE tb_salesorder.idso = tb_salesorderdetail.idso AND tb_salesorder.idso = invout.idso AND invout.codeinvout
        = invoutdet.codeinvout AND invoutdet.iditem= tb_salesorderdetail.iditem AND tb_salesorderdetail.iditem = tb_item.iditem AND invoutdet.noinvoice = '0' AND invout.statusinvoice != 'Ready' AND tb_salesorder.idcust = tb_customer.idcust AND invout.idinvout = ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["vat"] = $key->vat;
                $f["idinvout"] = $key->idinvout;
                $f["idinvoutdet"] = $key->idinvoutdet;
                $f["codeinvout"] = $key->codeinvout;
                $f["idso"] = $key->idso;
                $f["idsodet"] = $key->idsodet;
                if ($key->codeso == null) {
                    $f["codeso"] = "-";
                } else {
                    $f["codeso"] = $key->codeso;
                }
                if ($key->nodo == null) {
                    $f["nodo"] = "-";
                } else {
                    $f["nodo"] = $key->nodo;
                }

                $f["typeout"] = $key->typeout;
                $f["query"] = $this->db->last_query();
                $f["namecust"] = $key->namecust;
                $f["idcust"] = $key->idcust;
                $f["iditem"] = $key->iditem;
                $f["nameitem"] = $key->nameitem;
                $f["expdate"] = $key->expdate;
                $f["subtotal"] = $key->totalso / $key->qtyso;
                $f["disnomdet"] = $key->disnomdet / $key->qtyso;
                $f["grandtotal"] = $key->grandtotaldet / $key->qtyso;
                $f["price"] = $key->prices;
                $f["expdate"] = $key->expdate;
                $f["sku"] = $key->sku;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;
                $f["qtyout"] = $key->qtyout;
                $f["outqty"] = $key->outqty;
                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function detailinvoutbysales($datestart, $datefinish, $idso)
    {
        $data = array($idso, $datestart, $datefinish);
        $query = "
        SELECT *,tb_salesorderdetail.price AS prices,invoutdet.qtyout AS outqty,tb_customer.namecust, tb_customer.idcust FROM tb_salesorder,tb_salesorderdetail,invout,invoutdet,tb_item,tb_customer WHERE tb_salesorder.idso = tb_salesorderdetail.idso AND tb_salesorder.idso = invout.idso AND invout.codeinvout
        = invoutdet.codeinvout AND invoutdet.iditem= tb_salesorderdetail.iditem AND tb_salesorderdetail.iditem = tb_item.iditem AND invout.statusinvoice != 'Ready' AND invoutdet.noinvoice = '0' AND tb_salesorder.idcust = tb_customer.idcust 
        AND tb_salesorder.idso = ? AND invout.dateout between ? AND ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["vat"] = $key->vat;
                $f["idinvout"] = $key->idinvout;
                $f["idinvoutdet"] = $key->idinvoutdet;
                $f["codeinvout"] = $key->codeinvout;
                $f["idso"] = $key->idso;
                $f["idsodet"] = $key->idsodet;
                if ($key->codeso == null) {
                    $f["codeso"] = "-";
                } else {
                    $f["codeso"] = $key->codeso;
                }
                if ($key->nodo == null) {
                    $f["nodo"] = "-";
                } else {
                    $f["nodo"] = $key->nodo;
                }

                $f["typeout"] = $key->typeout;
                $f["query"] = $this->db->last_query();
                $f["namecust"] = $key->namecust;
                $f["idcust"] = $key->idcust;
                $f["iditem"] = $key->iditem;
                $f["nameitem"] = $key->nameitem;
                $f["expdate"] = $key->expdate;
                $f["subtotal"] = $key->totalso / $key->qtyso;
                $f["disnomdet"] = $key->disnomdet / $key->qtyso;
                $f["grandtotal"] = $key->grandtotaldet / $key->qtyso;
                $f["price"] = $key->prices;
                $f["expdate"] = $key->expdate;
                $f["sku"] = $key->sku;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;
                $f["qtyout"] = $key->qtyout;
                $f["outqty"] = $key->outqty;
                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function getlistsalesorder()
    {
        $query = "SELECT DISTINCT tb_salesorder.codeso, tb_salesorder.idso,tb_customer.namecust FROM tb_salesorder,tb_salesorderdetail,invout,invoutdet,tb_item,tb_customer WHERE tb_salesorder.idso = tb_salesorderdetail.idso AND tb_salesorder.idso = invout.idso AND invout.codeinvout
               = invoutdet.codeinvout AND invoutdet.iditem= tb_salesorderdetail.iditem AND invout.statusinvoice != 'Ready' AND  tb_salesorderdetail.iditem = tb_item.iditem AND invoutdet.noinvoice = 0 AND tb_salesorder.idcust = tb_customer.idcust ";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["namecust"] = $key->namecust;
                $f["codeso"] = $key->codeso;
                $f["idso"] = $key->idso;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function addinvoice($codeinvoice, $noinvoice, $idcust, $startinvoice, $expinvoice, $idcur, $rate, $title, $subtotal, $disnoms, $ppn, $grandtotal, $idso, $idsodet, $codeso, $idinvout, $idinvoutdet, $codeinvout, $iditem, $nameitem, $sku, $harga, $qty, $subtotalx, $disnom, $total)
    {
        $respon = "";
        $this->db->trans_begin();
        $data = array($codeinvoice, $noinvoice, $idcust, $startinvoice, $expinvoice, $idcur, $rate, $title, $subtotal, $disnoms, $ppn, $grandtotal);
        $query = "INSERT INTO tb_invoicesalesheader(codeinvoice,noinvoice,idcust,dateinvoice,expinvoice,idcur,rate,title,subtotal,disnoms,ppn,grandtotal)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {
            for ($i = 0; $i < count($idso); $i++) {
                $data1 = array(
                    $codeinvoice, $idso[$i], $idsodet[$i], $codeso[$i], $idinvout[$i], $idinvoutdet[$i], $codeinvout[$i], $iditem[$i], $harga[$i],
                    $qty[$i], $subtotalx[$i], $disnom[$i], $total[$i]
                );
                $query1 = "INSERT INTO tb_invoicesalesdetail (codeinvoice,idso,idsodet,codeso,idinvout,idinvoutdet,codeinvout,iditem,harga,qty,subtotals,disnom,total)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $eksekusi1 = $this->db->query($query1, $data1);
                if ($eksekusi1 == true) {

                    $data2 = array($total[$i], $idso[$i]);
                    $query2 = "UPDATE tb_salesorder SET totalinvoice = totalinvoice + ? WHERE idso = ?";
                    $eksekusi2 = $this->db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($codeinvoice, $iditem[$i], $codeinvout[$i]);
                        $query3 = "UPDATE invoutdet SET noinvoice = ? WHERE iditem = ? AND codeinvout = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $data4 = array($codeinvout[$i]);
                            $query4 = "SELECT * FROM invoutdet WHERE codeinvout = ? AND noinvoice = '0'";
                            $eksekusi4 = $this->db->query($query4, $data4)->result_object();
                            if (count($eksekusi4) == 0) {
                                $data5 = array($codeinvout[$i]);
                                $query5 = "UPDATE invout set statusinvoice = 'Ready' WHERE codeinvout = ?";
                                $eksekusi5 = $this->db->query($query5, $data5);
                                if ($eksekusi5 == true) {
                                    $respon = "Success";
                                } else {
                                    $respon = "Failed Update Inventory Out Invoice Status on codeinvout " . $codeinvout[$i];

                                    $this->db->trans_rollback();
                                    break;
                                }
                            } else {
                                $respon = "Success";
                            }
                        } else {
                            $respon = "Failed on update inventory out detail where idinvoutdet " . $idinvoutdet[$i];
                            $this->db->trans_rollback();
                            break;
                        }
                    } else {
                        $respon = "Failed on update totalinvoice in salesorder in codeso " . $codeso[$i] . " iditem  " . $iditem[$i];
                        $this->db->trans_rollback();
                        break;
                    }
                } else {
                    $respon = "Failed on insert invoice detail in item " . $iditem[$i];
                    $this->db->trans_rollback();
                    break;
                }
            }
        } else {
            $respon = "failed on insert invoice header";
        }

        if ($respon == "Success") {
            $query1 = " UPDATE tb_salesorder SET statusorder = 'Finish' WHERE CAST(tb_salesorder.grandtotalso AS INT)  =  CAST(tb_salesorder.totalinvoice AS INT) AND statusorder != 'Finish'";
            $eksekusi1 = $this->db->query($query1);
            if ($eksekusi1 == true) {
                $respon = "Success";
            } else {
                $respon = "Failed Update Salesorder";
            }
        }


        if ($respon == "Success") {
            $this->db->trans_commit();
        }

        return $respon;
    }

    function getlistinvoice($filter, $search, $statusinvoice, $startdate, $datefinish)
    {
        $data = array("%" . $search . "%", "%" . $statusinvoice . "%", $startdate, $datefinish);
        $query = "SELECT * FROM(SELECT tb_invoicesalesheader.*,tb_customer.namecust FROM tb_invoicesalesheader,tb_customer WHERE tb_invoicesalesheader.idcust = tb_customer.idcust) AS t WHERE  t." . $filter . " LIKE ?
         AND t.statusinvoice LIKE  ? AND t.dateinvoice BETWEEN ? AND ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["idinvoice"]         = $key->idinvoice;
                $f["codeinvoice"]       = $key->codeinvoice;
                $f["noinvoice"]       = $key->noinvoice;
                $f["idcust"]       = $key->idcust;
                $f["namecust"]     = $key->namecust;
                $f["idcust"]        = $key->idcust;
                $f["idcur"]        = $key->idcur;
                $f["dateinvoice"]        = $key->dateinvoice;
                $f["expinvoice"]       = $key->expinvoice;
                $f["rate"]   = $key->rate;
                $f["title"]     = $key->title;
                $f["subtotal"]   = $key->subtotal;
                $f["ppn"]   = $key->ppn;
                $f["grandtotal"]   = $key->grandtotal;
                $f["statusinvoice"]   = $key->statusinvoice;


                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function getlistinvoicedetail()
    {
        $query = "SELECT * FROM tb_invoicesalesheader,tb_customer WHERE tb_invoicesalesheader.idcust = tb_customer.idcust";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["idinvoice"]         = $key->idinvoice;
                $f["codeinvoice"]       = $key->codeinvoice;
                $f["noinvoice"]       = $key->noinvoice;
                $f["idcust"]       = $key->idcust;
                $f["namecust"]     = $key->namecust;
                $f["idcust"]        = $key->idcust;
                $f["idcur"]        = $key->idcur;
                $f["disnoms"]        = $key->disnoms;
                $f["dateinvoice"]        = $key->dateinvoice;
                $f["expinvoice"]       = $key->expinvoice;
                $f["rate"]   = $key->rate;
                $f["title"]     = $key->title;
                $f["subtotal"]   = $key->subtotal;
                $f["ppn"]   = $key->ppn;
                $f["grandtotal"]   = $key->grandtotal;
                $f["statusinvoice"]   = $key->statusinvoice;


                $data = array($f["codeinvoice"]);
                $query1 = "SELECT * FROM tb_invoicesalesdetail,tb_invoicesalesheader,tb_item  WHERE tb_invoicesalesdetail.iditem = tb_item.iditem AND tb_invoicesalesheader.codeinvoice = tb_invoicesalesdetail.codeinvoice AND tb_invoicesalesdetail.codeinvoice = ?";
                $eksekusi1 = $this->db->query($query1, $data)->result_object();
                if (count($eksekusi1) > 0) {
                    $f["data"] = array();
                    foreach ($eksekusi1 as $keyx) {
                        $g["codeinvoice"] = $keyx->codeinvoice;
                        $g["sku"] = $keyx->sku;
                        $g["nameitem"]  = $keyx->nameitem;
                        $g["sku"]       = $keyx->sku;
                        $g["price"] = $keyx->pricebuy;
                        $g["qty"] = $keyx->qty;
                        $g["ppn"] = $keyx->ppn;
                        $g["disnom"] = $keyx->disnom;
                        $g["spec"] = $keyx->spec;
                        $g["deskripsi"] = $keyx->deskripsi;
                        $g["total"] = $keyx->total;


                        array_push($f["data"], $g);
                    }
                } else {
                    $f["data"] = "Not Found";
                }

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }
        return $respon;
    }
}
