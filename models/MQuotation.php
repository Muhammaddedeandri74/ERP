<?php

class MQuotation extends CI_Model
{
    function getquotationlast()
    {
        $query = "SELECT * FROM tb_quotation ORDER BY codequo DESC LIMIT 1";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                $respon =   "QUO-TRS-" . str_replace("QUO-TRS-", "", $key->codequo)  + 1;
            }
        } else {
            $respon = "QUO-TRS-1";
        }

        return $respon;
    }

    function getlistquotation($filter, $search, $statusquo, $startdate, $datefinish)
    {
        $data = array("%" . $search . "%", "%" . $statusquo . "%", $startdate, $datefinish);
        $query = "SELECT * FROM(SELECT tb_quotation.*,tb_customer.namecust FROM tb_quotation,tb_customer WHERE tb_quotation.idcust = tb_customer.idcust) AS t where  t." . $filter . " LIKE ? AND t.statusquo LIKE  ? AND 
        t.datequo BETWEEN ? AND ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["idquo"] = $key->idquo;
                $f["codequo"] = $key->codequo;
                $f["namequotation"] = $key->namequotation;
                $f["namecust"] = $key->namecust;
                $f["expquo"] = $key->expquo;
                $f["statusquo"] = $key->statusquo;
                $f["totalquo"] = $key->totalquo;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function detailquo($idquo)
    {
        $data = array($idquo);
        $query = "SELECT * FROM tb_quotation,tb_customer where tb_quotation.idcust = tb_customer.idcust  AND tb_quotation.idquo = ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {

            foreach ($eksekusi as $key) {
                $f["idquo"] = $key->idquo;
                $f["codequo"] = $key->codequo;
                $f["namequotation"] = $key->namequotation;
                $f["namecust"] = $key->namecust;
                $f["idcust"] = $key->idcust;
                $f["delivaddr"] = $key->delivaddr;
                $f["expquo"] = $key->expquo;
                $f["datequo"] = $key->datequo;
                $f["norek"] = $key->norek;
                $f["VAT"] = $key->VAT;
                $f["pricetotal"] = $key->pricetotal;
                $f["disc"] = $key->disc;
                $f["totalquo"] = $key->totalquo;
                $f["statusquo"] = $key->statusquo;
                $f["data"] = array();
                $datax = array($key->codequo);
                $queryx = "SELECT * FROM tb_quotationdetail,tb_item WHERE tb_quotationdetail.codequo = ? AND tb_quotationdetail.iditem = tb_item.iditem";
                $eksekusix = $this->db->query($queryx, $datax)->result_object();
                if (count($eksekusix) > 0) {
                    foreach ($eksekusix as $keyx) {
                        $g["sku"] = $keyx->sku;
                        $g["iditem"] = $keyx->iditem;
                        $g["qty"] = $keyx->qty;
                        $g["price"] = $keyx->price;
                        $g["disc"] = $keyx->disc;
                        $g["totalprice"] = $keyx->totalprice;

                        array_push($f["data"], $g);
                    }
                } else {
                    $respon = "Detail Error";
                    break;
                }


                $respon = $f;
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function cancelquo($codequo)
    {
        $data = array($codequo);

        $query = "SELECT * FROM tb_quotation where codequo = ? ";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                if ($key->statusquo != "Waiting") {
                    if ($key->statusquo == "Cancel") {
                        $respon = "Quotation Sudah Dicancel";
                    } else if ($key->statusquo) {
                        $respon = "Quotation Sudah Diproses";
                    }
                } else {
                    $queryx = "UPDATE tb_quotation SET statusquo = 'Cancel' where codequo = ?";
                    $eksekusix = $this->db->query($queryx, $data);
                    if ($eksekusix == true) {
                        $respon = "Success";
                    } else {
                        $respon = "Quotation Gagal Diupdate";
                    }
                }
            }
        } else {
            $respon = "Quotation Tidak ditemukan";
        }

        return $respon;
    }

    function getcompanydata()
    {
        $query = "SELECT * FROM tb_companydet";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {

                $f["idcomp"] = $key->idcomp;
                $f["bank"] = $key->bank;
                $f["beneficiary"] = $key->beneficiary;
                $f["norekening"] = $key->norekening;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function getitem()
    {
        $query = "SELECT * FROM tb_item WHERE jenisitem = 'non service'";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            $respon = array();
            foreach ($eksekusi as $key) {
                $f["iditem"]        =  $key->iditem;
                $f["nameitem"]      =  $key->nameitem;
                $f["sku"]           =  $key->sku;
                $f["price"]         =  $key->price;
                $f["bom"]           =  $key->bom;
                $f["usebom"]        =  $key->usebom;
                $f["itemgroup"]     =  $key->itemgroup;
                $f["deskripsi"]     =  $key->deskripsi;
                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function addquo($date, $iduser, $norek, $codequo, $idcust, $address, $judulquo, $startquo, $expquo, $subtotal, $disnoms, $ppn, $grandtotal, $iditem, $qty, $disnom, $harga, $total)
    {

        $data = array($codequo);
        $query = "SELECT * FROM tb_quotation WHERE codequo = ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {
            $query = "SELECT * FROM tb_quotation ORDER BY codequo DESC LIMIT 1";
            $eksekusi = $this->db->query($query)->result_object();
            if (count($eksekusi) > 0) {
                foreach ($eksekusi as $key) {
                    $codequo =  "QUO-TRS-" . str_replace("QUO-TRS-", "", $key->codequo)  + 1;
                }
            } else {
                $respon = "Error Last Code Quotation";
                return $respon;
            }
        }
        $this->db->trans_begin();
        $data = array($codequo, $judulquo, $idcust, 0, $startquo, $expquo, "B2B", "Transfer", $subtotal, $ppn, $norek, '0', $disnoms, $address, $grandtotal, 'Waiting', $date, $iduser);
        $query = "INSERT INTO tb_quotation (codequo,namequotation,idcust,idcurrency,datequo,expquo,typequo,typepayment,pricetotal,VAT,norek,delivdate,disc,delivaddr,
        totalquo,statusquo,madelog,madeuser) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $eksekusi = $this->db->query($query, $data);
        if ($eksekusi == true) {

            for ($i = 0; $i < count($iditem); $i++) {
                if ($iditem[$i] != "") {
                    $datax = array($codequo, $iditem[$i], '0', $qty[$i], $harga[$i], $disnom[$i], '0', $total[$i]);
                    $queryx = "INSERT INTO tb_quotationdetail (codequo,iditem,idunit,qty,price,disc,VAT,totalprice) VALUES(?,?,?,?,?,?,?,?)";
                    $eksekusix = $this->db->query($queryx, $datax);
                    if ($eksekusix == true) {
                        $respon = "Success";
                    } else {
                        $respon = "Gagal Insert Quotation Detail pada item = " + $iditem[$i];
                        break;
                    }
                }
            }
        } else {
            $respon = "Gagal Insert Header Quotation";
        }

        if ($respon != "Success") {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        return $respon;
    }
}
