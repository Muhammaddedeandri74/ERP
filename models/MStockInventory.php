<?php

class MStockInventory extends CI_Model
{

    function getitemstock($idwh, $itemtype, $filter, $search)
    {
        $data = array("%" . $search . "%", $idwh, "%" . $itemtype . "%");
        $query = "SELECT * FROM (SELECT tb_item.*,tb_itemqty.endqty , tb_itemqty.qtyso ,tb_itemqty.beginqty,tb_itemqty.inqty,tb_itemqty.outqty, tb_itemqty.idwh FROM tb_item LEFT JOIN tb_itemqty ON tb_item.iditem = tb_itemqty.iditem) AS t
        WHERE t." . $filter . " LIKE ? AND t.idwh = ? AND itemgroup LIKE ?";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {

            $respon = array();
            foreach ($eksekusi as $key) {
                $f["iditem"] = $key->iditem;
                $f["nameitem"] = $key->nameitem;
                $f["deskripsi"] = $key->deskripsi;
                $f["itemtype"] = $key->itemgroup;
                $f["sku"] = $key->sku;
                $f["minstock"] = $key->minstock;
                $f["endqty"] = $key->endqty;
                $f["beginqty"] = $key->beginqty;
                $f["inqty"] = $key->inqty;
                $f["outqty"] = $key->outqty;
                $f["qtyso"] = $key->qtyso;
                $f["balance"] = $key->endqty - $key->qtyso;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }

    function getitemstocksafe($idwh, $itemtype, $filter, $search)
    {
        $data = array("%" . $search . "%", $idwh, "%" . $itemtype . "%");
        $query = "SELECT * FROM (SELECT tb_item.*,tb_itemqty.endqty , tb_itemqty.qtyso ,tb_itemqty.beginqty,tb_itemqty.inqty,tb_itemqty.outqty, tb_itemqty.idwh FROM tb_item LEFT JOIN tb_itemqty ON tb_item.iditem = tb_itemqty.iditem) AS t
        WHERE t." . $filter . " LIKE ? AND t.idwh = ? AND itemgroup LIKE ? AND t.endqty - t.qtyso < t.minstock";
        $eksekusi = $this->db->query($query, $data)->result_object();
        if (count($eksekusi) > 0) {

            $respon = array();
            foreach ($eksekusi as $key) {
                $f["iditem"] = $key->iditem;
                $f["nameitem"] = $key->nameitem;
                $f["deskripsi"] = $key->deskripsi;
                $f["itemtype"] = $key->itemgroup;
                $f["sku"] = $key->sku;
                $f["minstock"] = $key->minstock;
                $f["endqty"] = $key->endqty;
                $f["beginqty"] = $key->beginqty;
                $f["inqty"] = $key->inqty;
                $f["outqty"] = $key->outqty;
                $f["qtyso"] = $key->qtyso;
                $f["balance"] = $key->endqty - $key->qtyso;

                array_push($respon, $f);
            }
        } else {
            $respon = "Not Found";
        }

        return $respon;
    }
}
