<?php


class MInventoryOut extends CI_Model
{
    function getlastoutid()
    {
        $query = "SELECT * FROM invout ORDER BY codeinvout DESC LIMIT 1";
        $eksekusi = $this->db->query($query)->result_object();
        if (count($eksekusi) > 0) {
            foreach ($eksekusi as $key) {
                $respon = $key->codeinvout++;
            }
        } else {
            $respon = "OUT-TRS-1";
        }

        return $respon;
    }
}
