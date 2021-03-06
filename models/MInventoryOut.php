<?php


class MInventoryOut extends CI_Model
{
    function getlastoutid()
    {
        $query = "SELECT * FROM invout ORDER BY idinvout DESC LIMIT 1";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {

                $respon =  "OUT-TRS-" . str_replace("OUT-TRS-", "", $key->codeinvout)  + 1;
            }
        } else {
            $respon = "OUT-TRS-1";
        }

        return $respon;
    }

    function outsales($idso, $nopes, $noinvout, $idwhsales, $dateoutsales, $nodeliv, $iditem, $qtyout, $expdate, $nameitem, $typeqty)
    {

        $data1 = array($noinvout);
        $query1 = "SELECT * FROM invout WHERE codeinvout =  '" . $noinvout . "'";
        $eksekusi1 = $this->db->query($query1)->result_object();
        if (count($eksekusi1) > 0) {

            foreach ($eksekusi1 as $key1) {

                $queryx = " UPDATE tb_salesorder SET statusorder = 'Process' WHERE CAST(tb_salesorder.qtyso AS INT)  >  CAST(tb_salesorder.qtyout AS INT) AND  CAST(tb_salesorder.qtyout AS INT) > 0";
                $eksekusix = $this->db->query($query1);
                if ($eksekusix == true) {
                    $respon = "Success";
                } else {
                    $respon = "Failed Update Salesorder";
                    break;
                }
                $queryx = " UPDATE tb_salesorder SET statusorder = 'Process' WHERE  CAST(tb_salesorder.qtyout AS INT) = 0 ";
                $eksekusix = $this->db->query($query1);
                if ($eksekusix == true) {
                    $respon = "Success";
                } else {
                    $respon = "Failed Update Salesorder";
                    break;
                }

                $data2 = array($key1->qtyout, $key1->idso);
                $query2 = "UPDATE tb_salesorder set qtyout = qtyout - ? WHERE idso = ?";
                $eksekusi2 = $this->db->query($query2, $data2);
                if ($eksekusi2 == true) {

                    $data3 = array($key1->codeinvout);
                    $query3 = "SELECT * FROM invoutdet WHERE codeinvout = ?";
                    $eksekusi3 = $this->db->query($query3, $data3)->result_object();
                    if (count($eksekusi3) > 0) {

                        foreach ($eksekusi3 as $key3) {
                            $data4 = array($key3->qtyout, $key3->iditem, $key1->idso);
                            $query4 = "UPDATE tb_salesorderdetail set qtyout = qtyout - ? WHERE iditem = ? AND idso = ?";
                            $eksekusi4 = $this->db->query($query4, $data4);
                            if ($eksekusi4 == true) {

                                $data5 = array($key3->qtyout, $key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem);
                                $query5 = "UPDATE tb_itemqty SET  qtyso = qtyso + ?,  outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ?";
                                $eksekusi5 = $this->db->query($query5, $data5);
                                if ($eksekusi5 == true) {
                                    $data6 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem, $key3->expdate);
                                    $query6 = "UPDATE tb_itemqtyexp SET outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ? ANd expdate = ?";
                                    $eksekusi6 = $this->db->query($query6, $data6);
                                    if ($eksekusi6 == true) {
                                        $respon = "Success";
                                    } else {
                                        $respon = "failed for update qty item exp";
                                    }
                                } else {
                                    $respon = "failed for update qty item";
                                }
                            } else {
                                $respon = "failed update qty on salesorder detail";
                                break;
                            }
                        }
                    } else {
                        $respon = "failed for get detail invoutdet";
                        break;
                    }
                } else {
                    $respon = "failed back qty salesorder";
                    break;
                }
            }

            if ($respon == "Success") {
                $data2 = array($noinvout);
                $query2 = "DELETE FROM invoutdet WHERE codeinvout = ?";
                $eksekusi2 = $this->db->query($query2, $data2);
                if ($eksekusi2 == true) {
                    $this->db->trans_begin();
                    $data = array($idso, $nopes, $idwhsales, $dateoutsales, $nodeliv, array_sum($qtyout), $noinvout);
                    $query = "UPDATE invout SET idso = ?,nopes =?,idwh = ?,dateout = ?,nodo=?,statusout='Process',typeout = 'Sales',qtyout = ?  WHERE codeinvout = ?";
                    $eksekusi = $this->db->query($query, $data);
                    if ($eksekusi == true) {
                        for ($i = 0; $i < count($iditem); $i++) {
                            if ($iditem[$i] != "") {
                                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                                $query1 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                $eksekusi1 = $this->db->query($query1, $data1);
                                if ($eksekusi1 == true) {
                                    if ($typeqty[$i] != "non stock") {
                                        $data2 = array($qtyout[$i], $qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i], $qtyout[$i]);
                                        $query2 = "UPDATE tb_itemqty SET endqty = endqty - ? , qtyso = qtyso - ?, outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND endqty - ? >= 0";
                                        $eksekusi2 = $this->db->query($query2, $data2);
                                        if ($this->db->affected_rows()) {
                                            $data3 = array($qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i], $expdate[$i], $qtyout[$i]);
                                            $query3 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? ,  outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND expdate = ? AND endqty - ? >= 0";
                                            $eksekusi3 = $this->db->query($query3, $data3);
                                            if ($this->db->affected_rows()) {
                                                $respon = "Success";
                                            } else {
                                                $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                                break;
                                            }
                                        } else {
                                            $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                            break;
                                        }
                                    } else {
                                        $data6 = array($iditem[$i], $idwhsales);
                                        $query6 = "SELECT * FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                                        $eksekusi6 = $this->db->query($query6, $data6)->result_object();
                                        if (count($eksekusi6) > 0) {
                                            foreach ($eksekusi6 as $key6) {
                                                $datax = array($key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty);
                                                $queryx = "SELECT * FROM tb_itemqtyexp where iditem = ? AND idwh = ? AND endqty - ? >=0 ORDER BY expdate ASC LIMIT 1";
                                                $eksekusix = $this->db->query($queryx, $datax)->result_object();
                                                if (count($eksekusix) > 0) {
                                                    foreach ($eksekusix as $keyx) {
                                                        $data7 = array($qtyout[$i] * $key6->qty, $qtyout[$i] * $key6->qty, $key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty);
                                                        $query7 = "UPDATE tb_itemqty SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                                                        $eksekusi7 = $this->db->query($query7, $data7);
                                                        if ($this->db->affected_rows()) {
                                                            $data8 = array($noinvout, $key6->iditembom, $qtyout[$i] * $key6->qty, $keyx->expdate);
                                                            $query8 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                                            $eksekusi8 = $this->db->query($query8, $data8);
                                                            if ($eksekusi8 == true) {
                                                                $data9 = array($qtyout[$i] * $key6->qty, $qtyout[$i] * $key6->qty, $key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty, $keyx->expdate);
                                                                $query9 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0 AND expdate = ?";
                                                                $eksekusi9 = $this->db->query($query9, $data9);
                                                                if ($this->db->affected_rows()) {
                                                                    $respon = "Success";
                                                                } else {
                                                                    $respon = "Stock Expired Item " . $keyx->nameitem . " Kurang";
                                                                    break;
                                                                }
                                                            } else {
                                                                $respon = "Failed On Insert Item BOM invoutdet ";
                                                                break;
                                                            }
                                                        } else {
                                                            $respon = "Stock  Item " . $keyx->nameitem . " Kurang";
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
                                        $data4 = array($qtyout[$i], $iditem[$i], $idso);
                                        $query4 = "UPDATE tb_salesorderdetail SET qtyout = qtyout + ? WHERE iditem = ? AND idso = ? ";
                                        $eksekusi4 = $this->db->query($query4, $data4);
                                        if ($eksekusi4 == true) {
                                            $data5 = array($noinvout, array_sum($qtyout), $idso);
                                            $query5 = "UPDATE tb_salesorder set statusorder = 'Process', noinvout = ?, qtyout= qtyout + ? WHERE idso = ?";
                                            $eksekusi5 = $this->db->query($query5, $data5);
                                            if ($eksekusi5 == true) {
                                            } else {
                                                $respon = "Failed On Sales Status Pada id salesorder = " . $idso;
                                                break;
                                            }
                                        } else {
                                            $respon = "Failed On Detail Qty Sales Detail Pada id item = " . $iditem[$i];
                                            break;
                                        }
                                    }
                                } else {
                                    $respon = "Failed On DetailOut Pada id item = " . $iditem[$i];
                                    break;
                                }
                            }
                        }
                    } else {
                        $respon = "Failed Insert Out Sales Header";
                    }

                    if ($respon == "Success") {
                        $query1 = " UPDATE tb_salesorder SET statusorder = 'Finish' WHERE CAST(tb_salesorder.qtyso AS INT)  =  CAST(tb_salesorder.qtyout AS INT) AND statusorder != 'Finish'";
                        $eksekusi1 = $this->db->query($query1);
                        if ($eksekusi1 == true) {
                            $respon = "Success";
                        } else {
                            $respon = "Failed Update Salesorder";
                        }
                    }
                } else {
                    $respon = "Failed for clean old invoutdet";
                }
            }
        } else {
            $this->db->trans_begin();
            $data = array($idso, $nopes, $noinvout, $idwhsales, $dateoutsales, $nodeliv, array_sum($qtyout));
            $query = "INSERT INTO invout (idso,nopes,codeinvout,idwh,dateout,nodo,statusout,typeout,qtyout) VALUES(?,?,?,?,?,?,'Process','Sales',?);";
            $eksekusi = $this->db->query($query, $data);
            if ($eksekusi == true) {
                for ($i = 0; $i < count($iditem); $i++) {
                    if ($iditem[$i] != "") {
                        $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                        $query1 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                        $eksekusi1 = $this->db->query($query1, $data1);
                        if ($eksekusi1 == true) {
                            if ($typeqty[$i] != "non stock") {
                                $data2 = array($qtyout[$i], $qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i], $qtyout[$i]);
                                $query2 = "UPDATE tb_itemqty SET endqty = endqty - ? , qtyso = qtyso - ?, outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND endqty - ? >= 0";
                                $eksekusi2 = $this->db->query($query2, $data2);
                                if ($this->db->affected_rows()) {
                                    $data3 = array($qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i], $expdate[$i], $qtyout[$i]);
                                    $query3 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? ,  outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND expdate = ? AND endqty - ? >= 0";
                                    $eksekusi3 = $this->db->query($query3, $data3);
                                    if ($this->db->affected_rows()) {
                                        $respon = "Success";
                                    } else {
                                        $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                        break;
                                    }
                                } else {
                                    $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                    break;
                                }
                            } else {
                                $data6 = array($iditem[$i], $idwhsales);
                                $query6 = "SELECT * FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                                $eksekusi6 = $this->db->query($query6, $data6)->result_object();
                                if (count($eksekusi6) > 0) {
                                    foreach ($eksekusi6 as $key6) {
                                        $datax = array($key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty);
                                        $queryx = "SELECT * FROM tb_itemqtyexp where iditem = ? AND idwh = ? AND endqty - ? >=0 ORDER BY expdate ASC LIMIT 1";
                                        $eksekusix = $this->db->query($queryx, $datax)->result_object();
                                        if (count($eksekusix) > 0) {
                                            foreach ($eksekusix as $keyx) {
                                                $data7 = array($qtyout[$i] * $key6->qty, $qtyout[$i] * $key6->qty, $key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty);
                                                $query7 = "UPDATE tb_itemqty SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                                                $eksekusi7 = $this->db->query($query7, $data7);
                                                if ($this->db->affected_rows()) {
                                                    $data8 = array($noinvout, $key6->iditembom, $qtyout[$i] * $key6->qty, $keyx->expdate);
                                                    $query8 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                                    $eksekusi8 = $this->db->query($query8, $data8);
                                                    if ($eksekusi8 == true) {
                                                        $data9 = array($qtyout[$i] * $key6->qty, $qtyout[$i] * $key6->qty, $key6->iditembom, $idwhsales, $qtyout[$i] * $key6->qty, $keyx->expdate);
                                                        $query9 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0 AND expdate = ?";
                                                        $eksekusi9 = $this->db->query($query9, $data9);
                                                        if ($this->db->affected_rows()) {
                                                            $respon = "Success";
                                                        } else {
                                                            $respon = "Stock Expired Item " . $keyx->nameitem . " Kurang";
                                                            break;
                                                        }
                                                    } else {
                                                        $respon = "Failed On Insert Item BOM invoutdet ";
                                                        break;
                                                    }
                                                } else {
                                                    $respon = "Stock  Item " . $keyx->nameitem . " Kurang";
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
                                $data4 = array($qtyout[$i], $iditem[$i], $idso);
                                $query4 = "UPDATE tb_salesorderdetail SET qtyout = qtyout + ? WHERE iditem = ? AND idso = ? ";
                                $eksekusi4 = $this->db->query($query4, $data4);
                                if ($eksekusi4 == true) {
                                    $data5 = array($noinvout, array_sum($qtyout), $idso);
                                    $query5 = "UPDATE tb_salesorder set statusorder = 'Process', noinvout = ?, qtyout= qtyout + ? WHERE idso = ?";
                                    $eksekusi5 = $this->db->query($query5, $data5);
                                    if ($eksekusi5 == true) {
                                    } else {
                                        $respon = "Failed On Sales Status Pada id salesorder = " . $idso;
                                        break;
                                    }
                                } else {
                                    $respon = "Failed On Detail Qty Sales Detail Pada id item = " . $iditem[$i];
                                    break;
                                }
                            }
                        } else {
                            $respon = "Failed On DetailOut Pada id item = " . $iditem[$i];
                            break;
                        }
                    }
                }
            } else {
                $respon = "Failed Insert Out Sales Header";
            }

            if ($respon == "Success") {
                $query1 = " UPDATE tb_salesorder SET statusorder = 'Finish' WHERE CAST(tb_salesorder.qtyso AS INT)  =  CAST(tb_salesorder.qtyout AS INT) AND statusorder != 'Finish'";
                $eksekusi1 = $this->db->query($query1);
                if ($eksekusi1 == true) {
                    $respon = "Success";
                } else {
                    $respon = "Failed Update Salesorder";
                }
            }
        }





        if ($respon == "Success") {
            $this->db->trans_commit();
            $respon = "Success dengan nomor Out " . $noinvout;
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }

    function outmovewh($namewarehouse, $namewarehouse2, $noinvout, $dateoutmovewh, $iditem, $qtyout, $expdate, $nameitem)
    {
        $data1 = array($noinvout);
        $query1 = "SELECT * FROM invout WHERE codeinvout =  '" . $noinvout . "'";
        $eksekusi1 = $this->db->query($query1)->result_object();
        if (count($eksekusi1) > 0) {

            foreach ($eksekusi1 as $key1) {

                $data3 = array($key1->codeinvout);
                $query3 = "SELECT * FROM invoutdet WHERE codeinvout = ?";
                $eksekusi3 = $this->db->query($query3, $data3)->result_object();
                if (count($eksekusi3) > 0) {

                    foreach ($eksekusi3 as $key3) {
                        $data5 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem);
                        $query5 = "UPDATE tb_itemqty SET   outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ?";
                        $eksekusi5 = $this->db->query($query5, $data5);
                        if ($eksekusi5 == true) {
                            $data6 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem, $key3->expdate);
                            $query6 = "UPDATE tb_itemqtyexp SET outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ? ANd expdate = ?";
                            $eksekusi6 = $this->db->query($query6, $data6);
                            if ($eksekusi6 == true) {
                                $respon = "Success";
                            } else {
                                $respon = "failed for update qty item exp";
                            }
                        } else {
                            $respon = "failed for update qty item";
                        }
                    }
                } else {
                    $respon = "failed for get detail invoutdet";
                    break;
                }
            }

            if ($respon == "Success") {
                $data2 = array($noinvout);
                $query2 = "DELETE FROM invoutdet WHERE codeinvout = ?";
                $eksekusi2 = $this->db->query($query2, $data2);
                if ($eksekusi2 == true) {
                    $this->db->trans_begin();
                    $data = array("Move Warehouse", $namewarehouse, $namewarehouse2, $dateoutmovewh, "Waiting", array_sum($qtyout), $noinvout);
                    $query = "UPDATE invout SET typeout = ?,idwh =?,idwh2=?,dateout=?,statusout=?,qtyout=? WHERE codeinvout = ?";
                    $eksekusi = $this->db->query($query, $data);
                    if ($eksekusi == true) {

                        for ($i = 0; $i < count($iditem); $i++) {
                            if ($iditem[$i] != "") {
                                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                $eksekusi1 = $this->db->query($query1, $data1);
                                if ($eksekusi1 == true) {
                                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $namewarehouse, $qtyout[$i]);
                                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                                    $eksekusi2 = $this->db->query($query2, $data2);
                                    if ($this->db->affected_rows()) {
                                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $namewarehouse, $qtyout[$i]);
                                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                        $eksekusi3 = $this->db->query($query3, $data3);
                                        if ($this->db->affected_rows()) {
                                            $respon = "Success";
                                        } else {
                                            $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                            break;
                                        }
                                    } else {
                                        $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                        break;
                                    }
                                } else {
                                    $respon = "Gagal Input Detail Invout";
                                    break;
                                }
                            }
                        }
                    } else {
                        $respon = "Gagal Input Invout Header";
                    }
                } else {
                    $respon = "Failed for clean old invoutdet";
                }
            }
        } else {
            $this->db->trans_begin();
            $data = array($noinvout, "Move Warehouse", $namewarehouse, $namewarehouse2, $dateoutmovewh, "Waiting", array_sum($qtyout));
            $query = "INSERT INTO invout (codeinvout, typeout,idwh,idwh2,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?,?)";
            $eksekusi = $this->db->query($query, $data);
            if ($eksekusi == true) {

                for ($i = 0; $i < count($iditem); $i++) {
                    if ($iditem[$i] != "") {
                        $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                        $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                        $eksekusi1 = $this->db->query($query1, $data1);
                        if ($eksekusi1 == true) {
                            $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $namewarehouse, $qtyout[$i]);
                            $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                            $eksekusi2 = $this->db->query($query2, $data2);
                            if ($this->db->affected_rows()) {
                                $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $namewarehouse, $qtyout[$i]);
                                $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                $eksekusi3 = $this->db->query($query3, $data3);
                                if ($this->db->affected_rows()) {
                                    $respon = "Success";
                                } else {
                                    $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                    break;
                                }
                            } else {
                                $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                break;
                            }
                        } else {
                            $respon = "Gagal Input Detail Invout";
                            break;
                        }
                    }
                }
            } else {
                $respon = "Gagal Input Invout Header";
            }
        }


        if ($respon == "Success") {
            $this->db->trans_commit();
            $respon = "Success dengan nomor Out " . $noinvout;
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }


    function outret($idwhret, $idsupp, $noinvout, $dateret, $iditem, $qtyout, $expdate, $nameitem)
    {
        $data1 = array($noinvout);
        $query1 = "SELECT * FROM invout WHERE codeinvout =  '" . $noinvout . "'";
        $eksekusi1 = $this->db->query($query1)->result_object();
        if (count($eksekusi1) > 0) {

            foreach ($eksekusi1 as $key1) {

                $data3 = array($key1->codeinvout);
                $query3 = "SELECT * FROM invoutdet WHERE codeinvout = ?";
                $eksekusi3 = $this->db->query($query3, $data3)->result_object();
                if (count($eksekusi3) > 0) {

                    foreach ($eksekusi3 as $key3) {
                        $data5 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem);
                        $query5 = "UPDATE tb_itemqty SET  outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ?";
                        $eksekusi5 = $this->db->query($query5, $data5);
                        if ($eksekusi5 == true) {
                            $data6 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem, $key3->expdate);
                            $query6 = "UPDATE tb_itemqtyexp SET outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ? ANd expdate = ?";
                            $eksekusi6 = $this->db->query($query6, $data6);
                            if ($eksekusi6 == true) {
                                $respon = "Success";
                            } else {
                                $respon = "failed for update qty item exp";
                            }
                        } else {
                            $respon = "failed for update qty item";
                        }
                    }
                } else {
                    $respon = "failed for get detail invoutdet";
                    break;
                }
            }

            if ($respon == "Success") {
                $data2 = array($noinvout);
                $query2 = "DELETE FROM invoutdet WHERE codeinvout = ?";
                $eksekusi2 = $this->db->query($query2, $data2);
                if ($eksekusi2 == true) {
                    $this->db->trans_begin();
                    $data = array($noinvout, "Return", $idwhret, $idsupp, $dateret, "Finish", array_sum($qtyout));
                    $query = "INSERT INTO invout (codeinvout, typeout,idwh,idsupp,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?,?)";
                    $eksekusi = $this->db->query($query, $data);
                    if ($eksekusi == true) {

                        for ($i = 0; $i < count($iditem); $i++) {

                            if ($iditem[$i] != "") {
                                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                $eksekusi1 = $this->db->query($query1, $data1);
                                if ($eksekusi1 == true) {
                                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhret, $qtyout[$i]);
                                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                                    $eksekusi2 = $this->db->query($query2, $data2);
                                    if ($this->db->affected_rows()) {
                                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhret, $qtyout[$i]);
                                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                        $eksekusi3 = $this->db->query($query3, $data3);
                                        if ($this->db->affected_rows()) {
                                            $respon = "Success";
                                        } else {
                                            $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                            break;
                                        }
                                    } else {
                                        $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                        break;
                                    }
                                } else {
                                    $respon = "Gagal Input Detail Invout";
                                    break;
                                }
                            }
                        }
                    } else {
                        $respon = "Gagal Input Invout Header";
                    }
                } else {
                    $respon = "Failed for clean old invoutdet";
                }
            }
        } else {
            $this->db->trans_begin();
            $data = array($noinvout, "Return", $idwhret, $idsupp, $dateret, "Finish", array_sum($qtyout));
            $query = "INSERT INTO invout (codeinvout, typeout,idwh,idsupp,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?,?)";
            $eksekusi = $this->db->query($query, $data);
            if ($eksekusi == true) {

                for ($i = 0; $i < count($iditem); $i++) {

                    if ($iditem[$i] != "") {
                        $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                        $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                        $eksekusi1 = $this->db->query($query1, $data1);
                        if ($eksekusi1 == true) {
                            $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhret, $qtyout[$i]);
                            $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                            $eksekusi2 = $this->db->query($query2, $data2);
                            if ($this->db->affected_rows()) {
                                $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhret, $qtyout[$i]);
                                $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                $eksekusi3 = $this->db->query($query3, $data3);
                                if ($this->db->affected_rows()) {
                                    $respon = "Success";
                                } else {
                                    $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                    break;
                                }
                            } else {
                                $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                break;
                            }
                        } else {
                            $respon = "Gagal Input Detail Invout";
                            break;
                        }
                    }
                }
            } else {
                $respon = "Gagal Input Invout Header";
            }
        }


        if ($respon == "Success") {
            $this->db->trans_commit();
            $respon = "Success dengan nomor Out " . $noinvout;
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }

    function outwh($idwhout, $noinvout, $dateoutwh, $iditem, $qtyout, $expdate, $nameitem)
    {

        $data1 = array($noinvout);
        $query1 = "SELECT * FROM invout WHERE codeinvout =  '" . $noinvout . "'";
        $eksekusi1 = $this->db->query($query1)->result_object();
        if (count($eksekusi1) > 0) {

            foreach ($eksekusi1 as $key1) {

                $data3 = array($key1->codeinvout);
                $query3 = "SELECT * FROM invoutdet WHERE codeinvout = ?";
                $eksekusi3 = $this->db->query($query3, $data3)->result_object();
                if (count($eksekusi3) > 0) {

                    foreach ($eksekusi3 as $key3) {
                        $data5 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem);
                        $query5 = "UPDATE tb_itemqty SET   outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ?";
                        $eksekusi5 = $this->db->query($query5, $data5);
                        if ($eksekusi5 == true) {
                            $data6 = array($key3->qtyout, $key3->qtyout, $key1->idwh, $key3->iditem, $key3->expdate);
                            $query6 = "UPDATE tb_itemqtyexp SET outqty = outqty - ? , endqty = endqty + ? where idwh = ? AND iditem= ? ANd expdate = ?";
                            $eksekusi6 = $this->db->query($query6, $data6);
                            if ($eksekusi6 == true) {
                                $respon = "Success";
                            } else {
                                $respon = "failed for update qty item exp";
                            }
                        } else {
                            $respon = "failed for update qty item";
                        }
                    }
                } else {
                    $respon = "failed for get detail invoutdet";
                    break;
                }
            }

            if ($respon == "Success") {
                $data2 = array($noinvout);
                $query2 = "DELETE FROM invoutdet WHERE codeinvout = ?";
                $eksekusi2 = $this->db->query($query2, $data2);
                if ($eksekusi2 == true) {
                    $this->db->trans_begin();
                    $data = array($noinvout, "Out Warehouse", $idwhout, $dateoutwh, "Finish", array_sum($qtyout));
                    $query = "INSERT INTO invout (codeinvout, typeout,idwh,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?)";
                    $eksekusi = $this->db->query($query, $data);
                    if ($eksekusi == true) {

                        for ($i = 0; $i < count($iditem); $i++) {

                            if ($iditem[$i] != "") {
                                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                                $eksekusi1 = $this->db->query($query1, $data1);
                                if ($eksekusi1 == true) {
                                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhout, $qtyout[$i]);
                                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                                    $eksekusi2 = $this->db->query($query2, $data2);
                                    if ($this->db->affected_rows()) {
                                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhout, $qtyout[$i]);
                                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                        $eksekusi3 = $this->db->query($query3, $data3);
                                        if ($this->db->affected_rows()) {
                                            $respon = "Success";
                                        } else {
                                            $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                            break;
                                        }
                                    } else {
                                        $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                        break;
                                    }
                                } else {
                                    $respon = "Gagal Input Detail Invout";
                                    break;
                                }
                            }
                        }
                    } else {
                        $respon = "Gagal Input Invout Header";
                    }
                } else {
                    $respon = "Failed for clean old invoutdet";
                }
            }
        } else {
            $this->db->trans_begin();
            $data = array($noinvout, "Out Warehouse", $idwhout, $dateoutwh, "Finish", array_sum($qtyout));
            $query = "INSERT INTO invout (codeinvout, typeout,idwh,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?)";
            $eksekusi = $this->db->query($query, $data);
            if ($eksekusi == true) {

                for ($i = 0; $i < count($iditem); $i++) {

                    if ($iditem[$i] != "") {
                        $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                        $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                        $eksekusi1 = $this->db->query($query1, $data1);
                        if ($eksekusi1 == true) {
                            $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhout, $qtyout[$i]);
                            $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND endqty - ? >= 0";
                            $eksekusi2 = $this->db->query($query2, $data2);
                            if ($this->db->affected_rows()) {
                                $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhout, $qtyout[$i]);
                                $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ? AND endqty - ? >= 0";
                                $eksekusi3 = $this->db->query($query3, $data3);
                                if ($this->db->affected_rows()) {
                                    $respon = "Success";
                                } else {
                                    $respon = "Stock Expired Item " . $nameitem[$i] . " Kurang";
                                    break;
                                }
                            } else {
                                $respon = "Stock Item " . $nameitem[$i] . " Kurang";
                                break;
                            }
                        } else {
                            $respon = "Gagal Input Detail Invout";
                            break;
                        }
                    }
                }
            } else {
                $respon = "Gagal Input Invout Header";
            }
        }


        if ($respon == "Success") {
            $this->db->trans_commit();
            $respon = "Success dengan nomor Out " . $noinvout;
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }


    function dataout($idwh, $tipeout, $date1, $date2, $status, $filter, $search)
    {
        $data = array($idwh, "%" . $tipeout . "%", $date1, $date2, "%" . $status . "%", "%" . $search . "%");
        $query = "SELECT * FROM (SELECT invout.*,tb_warehouse.namewarehouse, tb_salesorder.codeso FROM invout LEFT JOIN tb_salesorder ON invout.idso = tb_salesorder.idso LEFT JOIN tb_warehouse ON invout.idwh = tb_warehouse.idwarehouse) AS t WHERE t.idwh =? AND t.typeout LIKE ?
        AND t.dateout BETWEEN ? AND ? AND t.statusout LIKE ? AND t." . $filter . " LIKE ?";
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
                $f["namewarehouse"] = $key->namewarehouse;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;
                $f["data"] = array();
                $f["edit"] = "yes";

                $data1 = array($f["codeinvout"]);
                $query1 = "SELECT * FROM invoutdet , tb_item WHERE invoutdet.codeinvout = ? AND invoutdet.iditem = tb_item.iditem";
                $eksekusi1 = $this->db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    foreach ($eksekusi1 as $key1) {
                        $g["iditem"] = $key1->iditem;
                        $g["nameitem"] = $key1->nameitem;
                        $g["qtyout"] = $key1->qtyout;
                        $g["expdate"] = $key1->expdate;
                        $g["sku"] = $key1->sku;
                        $g["usebom"] = $key1->usebom;

                        if ($key1->noinvoice != 0) {
                            $f["edit"] = "no";
                        }

                        $g["data"] = array();
                        if ($g["usebom"] == "y") {
                            $dataxx = array($g["iditem"], $key->idwh);
                            $queryxx = "SELECT *,tb_itemdetail.qty AS qtyout FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                            $eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
                            if (count($eksekusixx) > 0) {
                                foreach ($eksekusixx as $keyxx) {
                                    $h["sku"] = $keyxx->sku;
                                    $h["iditem"] = $keyxx->iditem;
                                    $h["nameitem"] = $keyxx->nameitem;
                                    $h["qty"] = $keyxx->qtyout * $g["qtyout"];

                                    array_push($g["data"], $h);
                                }
                            }
                        }

                        array_push($f["data"], $g);
                    }
                }

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function dataoutbycode($noinvout)
    {
        $data = array($noinvout);
        $query = "SELECT * FROM (SELECT invout.*,tb_warehouse.namewarehouse,tb_salesorder.delivaddr, tb_salesorder.codeso,tb_salesorder.nopesanan, tb_customer.namecust FROM invout LEFT JOIN tb_salesorder ON invout.idso = tb_salesorder.idso LEFT JOIN tb_warehouse ON invout.idwh = tb_warehouse.idwarehouse LEFT JOIN tb_customer ON tb_customer.idcust = tb_salesorder.idcust) AS t WHERE t.codeinvout = ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {

            foreach ($eksekusi as $key) {
                $f["idinvout"] = $key->idinvout;
                $f["codeinvout"] = $key->codeinvout;
                $f["idso"] = $key->idso;
                $f["nopesanan"] = $key->nopesanan;
                $f["delivaddr"] = $key->delivaddr;
                $f["namecust"] = $key->namecust;
                $f["idsupp"] = $key->idsupp;
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
                $f["namewarehouse"] = $key->namewarehouse;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;
                $f["idwh"] = $key->idwh;
                $f["idwh2"] = $key->idwh2;
                $f["data"] = array();
                $f["edit"] = "yes";

                $data1;
                $query1;
                if ($key->typeout == "Sales") {
                    $data1 = array($f["codeinvout"], $key->idso);
                    $query1 = "SELECT *, invoutdet.qtyout as qtyouts FROM  invoutdet LEFT JOIN  tb_salesorderdetail ON tb_salesorderdetail.iditem = invoutdet.iditem LEFT JOIN
                     tb_item ON invoutdet.iditem = tb_item.iditem WHERE invoutdet.codeinvout = ? AND tb_salesorderdetail.idso = ?  ";
                } else {
                    $data1 = array($f["codeinvout"]);
                    $query1 = "SELECT *, invoutdet.qtyout as qtyouts FROM  invoutdet , tb_item WHERE invoutdet.codeinvout = ? AND invoutdet.iditem = tb_item.iditem";
                }

                $eksekusi1 = $this->db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    foreach ($eksekusi1 as $key1) {
                        $g["iditem"] = $key1->iditem;
                        $g["nameitem"] = $key1->nameitem;
                        $g["qtyout"] = $key1->qtyouts;
                        if ($key->typeout == "Sales") {
                            $g["qtyso"] = $key1->qtyso;
                        }
                        $g["expdate"] = $key1->expdate;
                        $g["sku"] = $key1->sku;
                        $g["usebom"] = $key1->usebom;


                        if ($key1->noinvoice != 0) {
                            $f["edit"] = "no";
                        }

                        $g["data"] = array();
                        if ($g["usebom"] == "y") {
                            $dataxx = array($g["iditem"], $key->idwh);
                            $queryxx = "SELECT *,tb_itemdetail.qty AS qtyout FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                            $eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
                            if (count($eksekusixx) > 0) {
                                foreach ($eksekusixx as $keyxx) {
                                    $h["sku"] = $keyxx->sku;
                                    $h["iditem"] = $keyxx->iditem;
                                    $h["nameitem"] = $keyxx->nameitem;
                                    $h["qty"] = $keyxx->qtyout * $g["qtyout"];

                                    array_push($g["data"], $h);
                                }
                            }
                        }

                        array_push($f["data"], $g);
                    }
                }

                $respon = $f;
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }


    function cancelout($codeinvout)
    {
        $this->db->trans_begin();
        $data = array($codeinvout);
        $query = "SELECT * FROM (SELECT invout.*,tb_warehouse.namewarehouse, tb_salesorder.codeso FROM invout LEFT JOIN tb_salesorder ON invout.idso = tb_salesorder.idso LEFT JOIN tb_warehouse ON invout.idwh = tb_warehouse.idwarehouse) AS t WHERE t.codeinvout =? ";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {

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
                $f["namewarehouse"] = $key->namewarehouse;
                $f["dateout"] = $key->dateout;
                $f["statusout"] = $key->statusout;
                $f["data"] = array();

                if ($f["statusout"] != "Waiting") {
                    $respon = "Status Sudah Berubah, Tidak Dapat di cancel";
                } else {
                    $data1 = array($codeinvout);
                    $query1 = "UPDATE invout SET statusout = 'Cancel' WHERE codeinvout = ?";
                    $eksekusi1 = $this->db->query($query1, $data1);
                    if ($eksekusi1 == true) {
                        $respon = "Success";
                    } else {
                        $respon = "Gagal Update Status Out";
                        break;
                    }
                }

                $data1 = array($f["codeinvout"]);
                $query1 = "SELECT * FROM invoutdet , tb_item WHERE invoutdet.codeinvout = ? AND invoutdet.iditem = tb_item.iditem";
                $eksekusi1 = $this->db->query($query1, $data1)->result_object();
                if (count($eksekusi1) > 0) {
                    foreach ($eksekusi1 as $key1) {
                        $g["iditem"] = $key1->iditem;
                        $g["nameitem"] = $key1->nameitem;
                        $g["qtyout"] = $key1->qtyout;
                        $g["expdate"] = $key1->expdate;
                        $g["sku"] = $key1->sku;
                        $g["usebom"] = $key1->usebom;
                        $g["data"] = array();

                        if ($respon == "Success") {

                            $data2 = array($g["qtyout"], $g["qtyout"], $g["iditem"], $key->idwh);
                            $query2 = "UPDATE tb_itemqty SET outqty = outqty - ? , endqty = endqty + ? WHERE iditem = ? AND idwh = ?";
                            $eksekusi2 = $this->db->query($query2, $data2);
                            if ($eksekusi2 == true) {
                                $data3 = array($g["qtyout"], $g["qtyout"], $g["iditem"], $key->idwh, $g["expdate"]);
                                $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty - ? , endqty = endqty + ? WHERE iditem = ? AND idwh = ? AND expdate = ?";
                                $eksekusi3 = $this->db->query($query3, $data3);
                                if ($eksekusi3 == true) {
                                    $respon = "Success";
                                } else {
                                    $respon = "Gagal Update Qty Exp";
                                    break;
                                }
                            } else {
                                $respon = "Gagal Update Qty";
                                break;
                            }
                        }


                        if ($g["usebom"] == "y") {
                            $dataxx = array($g["iditem"], $key->idwh);
                            $queryxx = "SELECT *,tb_itemdetail.qty AS qtyout FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                            $eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
                            if (count($eksekusixx) > 0) {
                                foreach ($eksekusixx as $keyxx) {
                                    $h["sku"] = $keyxx->sku;
                                    $h["iditem"] = $keyxx->iditem;
                                    $h["nameitem"] = $keyxx->nameitem;
                                    $h["qty"] = $keyxx->qtyout * $g["qtyout"];

                                    if ($respon == "Success") {

                                        $data2 = array($h["qty"], $h["qty"], $h["iditem"], $key->idwh);
                                        $query2 = "UPDATE tb_itemqty SET outqty = outqty - ? , endqty = endqty + ? WHERE iditem = ? AND idwh = ?";
                                        $eksekusi2 = $this->db->query($query2, $data2);
                                        if ($eksekusi2 == true) {
                                            $respon = "Success";
                                        } else {
                                            $respon = "Gagal Update Qty";
                                            break;
                                        }
                                    }

                                    array_push($g["data"], $h);
                                }
                            }
                        }

                        array_push($f["data"], $g);
                    }
                }
            }
        } else {
            $respon = "Not Found";
        }

        if ($respon == "Success") {
            $this->db->trans_commit();
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }
}
