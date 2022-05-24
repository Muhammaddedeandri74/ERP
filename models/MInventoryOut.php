<?php


class MInventoryOut extends CI_Model
{
    function getlastoutid()
    {
        $query = "SELECT * FROM invout ORDER BY codeinvout DESC LIMIT 1";
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

    function outsales($idso, $noinvout, $idwhsales, $dateoutsales, $nodeliv, $iditem, $qtyout, $expdate)
    {
        $this->db->trans_begin();
        $data = array($idso, $noinvout, $idwhsales, $dateoutsales, $nodeliv, array_sum($qtyout));
        $query = "INSERT INTO invout (idso,codeinvout,idwh,dateout,nodo,statusout,typeout,qtyout) VALUES(?,?,?,?,?,'Process','Sales',?);";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {
            for ($i = 0; $i < count($iditem); $i++) {
                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                $query1 = "INSERT INTO invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                $eksekusi1 = $this->db->query($query1, $data1);
                if ($eksekusi1 == true) {
                    $data2 = array($qtyout[$i], $qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i]);
                    $query2 = "UPDATE tb_itemqty SET endqty = endqty - ? , qtyso = qtyso - ?, outqty = outqty + ? WHERE idwh = ? AND iditem = ?";
                    $eksekusi2 = $this->db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($qtyout[$i], $qtyout[$i], $idwhsales, $iditem[$i], $expdate[$i]);
                        $query3 = "UPDATE tb_itemqtyexp SET endqty = endqty - ? ,  outqty = outqty + ? WHERE idwh = ? AND iditem = ? AND expdate = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $data4 = array($qtyout[$i], $iditem[$i], $idso);
                            $query4 = "UPDATE tb_salesorderdetail SET qtyout = qtyout + ? WHERE iditem = ? AND idso = ? ";
                            $eksekusi4 = $this->db->query($query4, $data4);
                            if ($eksekusi4 == true) {
                                $data5 = array($idso);
                                $query5 = "UPDATE tb_salesorder set statusorder = 'Process' WHERE idso = ?";
                                $eksekusi5 = $this->db->query($query5, $data5);
                                if ($eksekusi5 == true) {
                                    $data6 = array($iditem[$i], $idwhsales);
                                    $query6 = "SELECT * FROM tb_itemdetail,tb_item, tb_itemqty WHERE tb_itemdetail.iditem = ? AND tb_itemqty.idwh = ? AND tb_itemdetail.iditembom = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem";
                                    $eksekusi6 = $this->db->query($query6, $data6)->result_object();
                                    if (count($eksekusi6) > 0) {
                                        foreach ($eksekusi6 as $key6) {
                                            $data7 = array($qtyout[$i] * $key6->qty, $qtyout[$i] * $key6->qty, $key6->iditembom, $idwhsales);
                                            $query7 = "UPDATE tb_itemqty SET endqty = endqty - ? , outqty = outqty + ? WHERE iditem = ? AND idwh = ?";
                                            $eksekusi7 = $this->db->query($query7, $data7);
                                            if ($eksekusi7 == true) {
                                                $respon = "Success";
                                            } else {
                                                $respon = "Failed On qty item BOM Pada id salesorder = " . $key6->iditembom;
                                                break;
                                            }
                                        }
                                    }
                                } else {
                                    $respon = "Failed On Sales Status Pada id salesorder = " . $idso;
                                    break;
                                }
                            } else {
                                $respon = "Failed On Detail Qty Sales Detail Pada id item = " . $iditem[$i];
                                break;
                            }
                        } else {
                            $respon = "Failed On Detail Qty EXP Pada id item = " . $iditem[$i];
                            break;
                        }
                    } else {
                        $respon = "Failed On Detail Qty Pada id item = " . $iditem[$i];
                        break;
                    }
                } else {
                    $respon = "Failed On DetailOut Pada id item = " . $iditem[$i];
                    break;
                }
            }
        } else {
            $respon = "Failed Insert Out Sales Header";
        }

        if ($respon == "Success") {
            $this->db->trans_commit();
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }

    function outmovewh($namewarehouse, $namewarehouse2, $noinvout, $dateoutmovewh, $iditem, $qtyout, $expdate)
    {
        $this->db->trans_begin();
        $data = array($noinvout, "Move Warehouse", $namewarehouse, $namewarehouse2, $dateoutmovewh, "Process", array_sum($qtyout));
        $query = "INSERT INTO invout (codeinvout, typeout,idwh,idwh2,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?,?)";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {

            for ($i = 0; $i < count($iditem); $i++) {

                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                $eksekusi1 = $this->db->query($query1, $data1);
                if ($eksekusi1 == true) {
                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $namewarehouse);
                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ?";
                    $eksekusi2 = $this->db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $namewarehouse);
                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $respon = "Success";
                        } else {
                            $respon = "Gagal Update Item Qty EXP ";
                            break;
                        }
                    } else {
                        $respon = "Gagal Update Item Qty ";
                        break;
                    }
                } else {
                    $respon = "Gagal Input Detail Invout";
                    break;
                }
            }
        } else {
            $respon = "Gagal Input Invout Header";
        }

        if ($respon == "Success") {
            $this->db->trans_commit();
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }


    function outret($idwhret, $idsupp, $noinvout, $dateret, $iditem, $qtyout, $expdate)
    {
        $this->db->trans_begin();
        $data = array($noinvout, "Return", $idwhret, $idsupp, $dateret, "Process", array_sum($qtyout));
        $query = "INSERT INTO invout (codeinvout, typeout,idwh,idsupp,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?,?)";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {

            for ($i = 0; $i < count($iditem); $i++) {

                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                $eksekusi1 = $this->db->query($query1, $data1);
                if ($eksekusi1 == true) {
                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhret);
                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ?";
                    $eksekusi2 = $this->db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhret);
                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $respon = "Success";
                        } else {
                            $respon = "Gagal Update Item Qty EXP ";
                            break;
                        }
                    } else {
                        $respon = "Gagal Update Item Qty ";
                        break;
                    }
                } else {
                    $respon = "Gagal Input Detail Invout";
                    break;
                }
            }
        } else {
            $respon = "Gagal Input Invout Header";
        }

        if ($respon == "Success") {
            $this->db->trans_commit();
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }

    function outwh($idwhout, $noinvout, $dateoutwh, $iditem, $qtyout, $expdate)
    {
        $this->db->trans_begin();
        $data = array($noinvout, "Out Warehouse", $idwhout, $dateoutwh, "Process", array_sum($qtyout));
        $query = "INSERT INTO invout (codeinvout, typeout,idwh,dateout,statusout,qtyout)VALUES(?,?,?,?,?,?)";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {

            for ($i = 0; $i < count($iditem); $i++) {

                $data1 = array($noinvout, $iditem[$i], $qtyout[$i], $expdate[$i]);
                $query1 = "INSERT invoutdet (codeinvout,iditem,qtyout,expdate)VALUES(?,?,?,?)";
                $eksekusi1 = $this->db->query($query1, $data1);
                if ($eksekusi1 == true) {
                    $data2 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $idwhout);
                    $query2 = "UPDATE tb_itemqty SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND idwh = ?";
                    $eksekusi2 = $this->db->query($query2, $data2);
                    if ($eksekusi2 == true) {
                        $data3 = array($qtyout[$i], $qtyout[$i], $iditem[$i], $expdate[$i], $idwhout);
                        $query3 = "UPDATE tb_itemqtyexp SET outqty = outqty + ?, endqty = endqty - ? WHERE iditem = ? AND expdate = ? AND idwh = ?";
                        $eksekusi3 = $this->db->query($query3, $data3);
                        if ($eksekusi3 == true) {
                            $respon = "Success";
                        } else {
                            $respon = "Gagal Update Item Qty EXP ";
                            break;
                        }
                    } else {
                        $respon = "Gagal Update Item Qty ";
                        break;
                    }
                } else {
                    $respon = "Gagal Input Detail Invout";
                    break;
                }
            }
        } else {
            $respon = "Gagal Input Invout Header";
        }

        if ($respon == "Success") {
            $this->db->trans_commit();
        } else {
            $this->db->trans_rollback();
        }

        return $respon;
    }
}
