<script type="text/JavaScript" src="https://MomentJS.com/downloads/moment.js"></script>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('CounterController/stockinventory') ?>" class="btn fw btn-transparent px-4">ALL</a>
                    <a href="<?= base_url('CounterController/stockhabis') ?>" class="btn fw btn-transparent">STOCK HABIS</a>
                    <a href="<?= base_url('CounterController/expired') ?>" class="btn fw bay btn-light">SEGERA EXPIRED</a>
                    <a href="<?= base_url('CounterController/opname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('CounterController/expired') ?>" method="post">
                            <div class="row pt-4 d-flex justify-content-between">
                                <div class="col-6" style="margin-left: 1vw;">
                                    <!-- <input type="text" name="cari" id="cari" placeholder="filter" placeholder="Search By name item" class="form-control" value="<?php echo $cari; ?> " /> -->
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="input-group">
                                                <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
                                                    <option class="slc" value="idiitem">ID Item</option>
                                                    <option class="slc" value="nameitem">Nama Product</option>
                                                    <option class="slc" value="sku">SKU</option>
                                                </select>
                                                <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" name="search" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Nama Product dan SKU" style="font-family:Arial, FontAwesome">
                                            </div>
                                            &nbsp;
                                            <div class="input-group">
                                                <a href="<?php echo base_url('CounterController/expired') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>&nbsp;
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-2" style="margin-top: 14vh;float: right;">
                                    <a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table m-0" id="table">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="text-align:center;width: 4%" scope="col">ID Item</th>
                                    <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                    <th style="text-align:center;width: 5%" scope="col">SKU</th>
                                    <th style="text-align:center;width: 5%" scope="col">QTY</th>
                                    <th style="text-align:center;width: 5%" scope="col">HPP</th>
                                    <th style="text-align:center;width: 5%" scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 46vh">
                            <table class="table">
                                <tbody style="background-color: whtie" id="bodyx">
                                    <?php
                                    $expdatetime = date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))));
                                    // print_r($data);
                                    if ($data != "Not Found") : $a = 1;
                                        $getdata = array(); ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php $ok = 0;
                                            $amount = 0;
                                            $qty = 0;
                                            if ($key["data"] != "Not Found") :  ?>
                                                <?php foreach ($key["data"] as $keyx) : ?>
                                                    <?php if ($keyx["endqty"] != "0") :
                                                        $qty = $qty + $keyx["endqty"]; ?>

                                                    <?php
                                                        $key["qtyawal"] = $keyx["endqty"];
                                                    endif ?>
                                                <?php endforeach ?>
                                                <?php if ($key["data1"] != "Not Found") :  ?>
                                                    <?php foreach ($key["data1"] as $keyx) : ?>
                                                        <?php $amount = (int)$amount + (int)$keyx["hargabeli"];

                                                        ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                            <?php if ($data1 != "Not Found") :

                                                $iditem = array();
                                            ?>

                                                <?php foreach ($data1 as $value) :
                                                    array_push($iditem, $value["iditem"]);
                                                ?>

                                                <?php endforeach ?>
                                            <?php endif ?>
                                            <?php $key["detail"] = array(); ?>
                                            <?php if ($key["data1"] != "Not Found" && $data1 != "Not Found") { ?>
                                                <?php foreach ($key["data1"] as $keey1) :  ?>

                                                    <?php if ($data1 != "Not Found") {
                                                    ?>

                                                        <?php foreach ($data1 as $keey) : ?>

                                                            <?php
                                                            if ($key["usesn"] == "Y") {

                                                                if (in_array($keey1["iditem"], $iditem)) {


                                                                    if ($keey["idsn"] == $keey["idsn2"] || $keey["idsn2"] == 0) {

                                                                        if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"] + 1;
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            $g["hpps"] = 1;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey["idsn"] - 1;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["hpps"] = 2;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            $out = 0;
                                                                            foreach ($data1 as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["idsn"] && $g["snakhir"] <= $keyc["idsn"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            foreach ($key["detail"] as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["snawal"] && $g["snakhir"] <= $keyc["snakhir"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            if ($out == 0) {
                                                                                array_push($key["detail"], $g);
                                                                            }

                                                                            $g["snawal"] = $keey["idsn"] + 1;
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["hpps"] = 3;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            $out = 0;
                                                                            foreach ($data1 as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["idsn"] && $g["snakhir"] <= $keyc["idsn"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            foreach ($key["detail"] as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["snawal"] && $g["snakhir"] <= $keyc["snakhir"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            if ($out == 0) {
                                                                                array_push($key["detail"], $g);
                                                                            }

                                                                            // break;
                                                                        } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn"] == $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey1["idsn2"] - 1;
                                                                            $g["hpps"] = 4;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }

                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        } else if ($keey1["idsn"] > $keey["idsn"] && $keey1["idsn2"] > $keey["idsn"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 5;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        }
                                                                    } else {

                                                                        if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey["idsn2"] + 1;
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 6;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey["idsn"] - 1;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 7;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            $out = 0;
                                                                            foreach ($data1 as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["idsn"] && $g["snakhir"] <= $keyc["idsn2"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            foreach ($key["detail"] as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["snawal"] && $g["snakhir"] <= $keyc["snakhir"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            if ($out == 0) {
                                                                                array_push($key["detail"], $g);
                                                                            }

                                                                            $g["snawal"] = $keey["idsn2"] + 1;
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 8;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            $out = 0;
                                                                            foreach ($data1 as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["idsn"] && $g["snakhir"] <= $keyc["idsn2"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            foreach ($key["detail"] as $keyc) {
                                                                                if ($keey1["snid"] == $keyc["snid"]) {
                                                                                    if ($g["snawal"] >= $keyc["snawal"] && $g["snakhir"] <= $keyc["snakhir"]) {
                                                                                        $out++;
                                                                                    }
                                                                                }
                                                                            }
                                                                            if ($out == 0) {
                                                                                array_push($key["detail"], $g);
                                                                            }

                                                                            // break;
                                                                        } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn2"] == $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey["idsn"] - 1;
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 9;
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] > $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 10;
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {

                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                            if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                                $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            } else {
                                                                                $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                            }
                                                                            $g["hpps"] = 11;
                                                                            $g["snid"] = $keey1["snid"];
                                                                            $g["idpo"] = $keey1["idpo"];
                                                                            $g["exp"] = $keey1["expdate"];
                                                                            array_push($key["detail"], $g);
                                                                            // break;
                                                                        }

                                                                        // else if($keey["idsn"] > $keey1["idsn"] && $keey["idsn2"] > $keey1["idsn2"]){

                                                                        //     $g["snawal"] = $keey1["idsn"] ;
                                                                        //     $g["snakhir"] = $keey1["idsn2"] ;
                                                                        //      $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        //     $g["hpps"] = 12;
                                                                        //     $g["idpo"] = $keey1["idpo"];
                                                                        //     array_push($key["detail"], $g);
                                                                        //     break;

                                                                        // }
                                                                        break;
                                                                    }
                                                                } else {

                                                                    $g["snawal"] = $keey1["idsn"];
                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                    $g["hpps"] = 1;
                                                                    if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                        $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                    } else {
                                                                        $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                    }
                                                                    $g["idpo"] = $keey1["idpo"];
                                                                    $g["snid"] = $keey1["snid"];
                                                                    $g["exp"] = $keey1["expdate"];
                                                                    array_push($key["detail"], $g);
                                                                    break;
                                                                }
                                                            } else {

                                                                $g["snawal"] = $keey1["idsn"];
                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                } else {
                                                                    $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                                }
                                                                $g["hpps"] = 11;
                                                                $g["snid"] = $keey1["snid"];
                                                                $g["idpo"] = $keey1["idpo"];
                                                                $g["exp"] = $keey1["expdate"];
                                                                array_push($key["detail"], $g);
                                                                break;
                                                            }

                                                            ?>

                                                        <?php endforeach ?>
                                                    <?php } else {

                                                        $g["snawal"] = $keey1["idsn"];
                                                        $g["snakhir"] = $keey1["idsn2"];
                                                        if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                            $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                        } else {
                                                            $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                        }
                                                        $g["hpps"] = 11;
                                                        $g["snid"] = $keey1["snid"];
                                                        $g["idpo"] = $keey1["idpo"];
                                                        $g["exp"] = $keey1["expdate"];
                                                        array_push($key["detail"], $g);
                                                        break;
                                                    ?>

                                                    <?php } ?>
                                                <?php endforeach ?>
                                            <?php } else {

                                                if ($key["data1"] != "Not Found") {
                                                    foreach ($key["data1"] as $keey) {
                                                        $g["snawal"] = $keey["idsn"];
                                                        $g["snakhir"] = $keey["idsn2"];
                                                        if ($g["snakhir"] != ""  && $g["snawal"] != "") {
                                                            $g["hpp"] = intval($keey["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                        } else {
                                                            $g["hpp"] = intval($keey["hargabeli"]) * $key["qtyawal"];
                                                        }
                                                        $g["idpo"] = $keey["idpo"];
                                                        $g["exp"] = $keey["expdate"];
                                                        array_push($key["detail"], $g);
                                                    }
                                                }
                                            } ?>

                                            <?php
                                            if (count($key["detail"]) == 0) {

                                                $key["hpp"] = 0;
                                                $key["totalexp"] = 0;
                                            } else {
                                                $totalpo = array();
                                                $totalhpp = 0;
                                                $key["totalexp"] = 0;
                                                foreach ($key["detail"] as $kex) {
                                                    if ($kex["exp"] <= date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))))) {

                                                        $key["totalexp"] = $key["totalexp"] + ($kex["snakhir"] - $kex["snawal"] + 1);
                                                        $ok++;

                                                        array_push($totalpo, $kex["idpo"]);
                                                        $totalhpp = $totalhpp + $kex["hpp"];
                                                    }
                                                }

                                                if (count($totalpo) > 0) {
                                                    $key["hpp"] = $totalhpp / count(array_unique($totalpo));
                                                }
                                            }
                                            ?>



                                            <?php if ($ok != 0) : ?>
                                                <?php if ($a % 2 == 0) { ?>
                                                    <tr id="<?php echo $key['iditem'] ?>" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="detail('<?php echo $key["iditem"] ?>', '<?php echo $key["idwh"] ?>',' <?php echo $key["nameitem"] ?>', '<?php echo $key["sku"] ?>', '<?php echo $qty ?>')">
                                                    <?php } else { ?>
                                                    <tr style="background: #eeeeee;cursor: pointer;" id="<?php echo $key['iditem'] ?>" data-toggle="modal" data-target="#modalopenshop" onclick="detail('<?php echo $key["iditem"] ?>', '<?php echo $key["idwh"] ?>',' <?php echo $key["nameitem"] ?>', '<?php echo $key["sku"] ?>', '<?php echo $qty ?>')">
                                                    <?php } ?>
                                                    <td style="text-align:center;width: 4%"><?php echo $key["iditem"] ?></td>
                                                    </th>
                                                    <td style="text-align:center;width: 22%"><?php echo $key["nameitem"] ?></td>
                                                    <td style="text-align:center;width: 5%"><?php echo $key["sku"] ?></td>
                                                    <td class="pl-4" style="text-align:center;width: 5%"><?php echo $key["totalexp"] ?></td>
                                                    <td class="pl-4" style="text-align:center;width: 5%"><?php echo $key["hpp"] ?></td>
                                                    <td class="pl-4" style="text-align:center;width: 5%">Detail <i class="fa fa-external-link"></i></td>
                                                    </tr>
                                                    <?php $key["qtyexp"] = $qty;
                                                    $key["amount"] = $amount; ?>
                                                <?php array_push($getdata, $key);
                                            endif  ?>
                                            <?php endforeach ?>
                                        <?php endif;
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <form action="<?php echo base_url('CounterController/buatreturn') ?>" method='POST' id="form">
        <div id="data" style="padding-left: 50%"></div>
    </form>
</div>

<div style="float: right; padding-right: 10%">
    <button class="btn btn-warning btn-lg" style="width: 120%;color: white;background: orange" onclick="order()">Buat Return Barang</button>
</div>

<div style="float: right; padding-right: 2%">
    <button type="button" class="btn btn-warning btn-lg" style="width: 120%;color: white;background: orange" data-toggle="modal" data-target="#kirimmail">Kirim Email</button>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user ml-0" style="width:100%" method="post" action="">
                <div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Item Expired</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl ml-5">
                        <div class=" card border-0">
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5"> </div>
                                    <div class="col-12">
                                        <a class="btn" onclick="printDiv('card-body')"><i class="fa fa-print"></i> Cetak Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body " id="cards">
                                <div class="card bay" width="100%" id="header">
                                    <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Nama Item<br>
                                                        <span style="color: #3C2E8F" class="fn" id="addr">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> SKU<br>
                                                        <span style="color: #3C2E8F" class="fn" id="date">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> Qty. Expired<br>
                                                        <span style="color: #3C2E8F" class="fn" id="qty">X product</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4" id="dataitem">
                                    <p class="fw">DAFTAR SN YANG Expired</p>
                                    <table class="table cn">
                                        <thead style="background-color: grey;color: white">
                                            <tr>
                                                <th scope="col" style="width: 30%">Expired Date</th>
                                                <th scope="col" style="width: 35%">SN Awal</th>
                                                <th scope="col" style="width: 35%">SN Akhir</th>
                                                <th scope="col" style="width: 35%">HPP</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: whtie" id="body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="excel" id="excel">
</div>
<div class="data" id="data" style="display: none">
    <table class="table">
        <thead style="background: purple">
            <tr>
                <th style="text-align:center;border:1px solid;" scope="col">ID Item</th>
                <th style="text-align:center;border:1px solid;" scope="col">Nama Product</th>
                <th style="text-align:center;border:1px solid;" scope="col">SKU</th>
                <th style="text-align:center;border:1px solid;" scope="col">QTY</th>
                <th style="text-align:center;border:1px solid;" scope="col">HPP</th>
                <th style="text-align:center;border:1px solid;" scope="col">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>EXP DATE</td>
                                <td>SN AWAL</td>
                                <td>SN AKHIR</td>
                            </tr>
                        </tbody>
                    </table>
                </th>
                <!-- <th style="text-align:center;border:1px solid;" scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($data1 != "Not Found") : $a = 1;
            ?>
                <?php foreach ($getdata as $key) : ?>
                    <?php $ok = 0;
                    $amount = 0;
                    $qty = 0;
                    if ($key["data"] != "Not Found") :  ?>
                        <?php foreach ($key["data1"] as $keyx) : ?>
                            <?php if ($keyx["endqty"] != "0") : ?>
                                <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))))) :
                                    $ok = $ok + 1;
                                    $qty = $qty + $keyx["endqty"];
                                ?>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php if ($key["data1"] != "Not Found") : ?>
                            <?php foreach ($key["data1"] as $keyx) : ?>
                                <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))))) :
                                    $amount = $amount + $keyx["hargabeli"];
                                ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if ($ok != 0) : ?>
                        <?php if ($a % 2 == 0) { ?>
                            <tr id="<?php echo $key['iditem'] ?>" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="detail('<?php echo $key["iditem"] ?>', '<?php echo $key["idwh"] ?>',' <?php echo $key["nameitem"] ?>', '<?php echo $key["sku"] ?>', '<?php echo $qty ?>')">
                            <?php } else { ?>
                            <tr style="background: #eeeeee;cursor: pointer;" id="<?php echo $key['iditem'] ?>" data-toggle="modal" data-target="#modalopenshop" onclick="detail('<?php echo $key["iditem"] ?>', '<?php echo $key["idwh"] ?>',' <?php echo $key["nameitem"] ?>', '<?php echo $key["sku"] ?>', '<?php echo $qty ?>')">
                            <?php } ?>
                            <th style="text-align:center;width: 4%;border:1px solid;" scope="row"><?php echo $key["nameitem"] ?>
                            </th>
                            <td style="text-align:center; border:1px solid;"><?php echo $key["nameitem"] ?></td>
                            <td style="text-align:center; border:1px solid;"><?php echo $key["sku"] ?></td>
                            <td class="pl-4" style="text-align:center;width: 5%; border: solid;"><?php echo $key["totalexp"] ?></td>
                            <td class="pl-4" style="text-align:center;width: 5%;border: solid;"><?php echo $key["hpp"] ?></td>
                            <!-- <td class="pl-4" style="text-align:center; border:1px solid;">Detail <i class="fa fa-external-link"></i></td> -->

                            <td>
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($key["detail"] as $keey) : ?>
                                            <tr>

                                                <td style="text-align:center;border:1px solid;background-color:yellow;"><?php echo $keey["exp"] ?></td>
                                                <td style="text-align:center;border:1px solid;background-color:yellow;"><?php echo $keey["snawal"] ?></td>
                                                <td style="text-align:center;border:1px solid;background-color:yellow;"><?php echo $keey["snakhir"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </td>
                            </tr>

                            <?php $key["qtyexp"] = $qty;
                            $key["amount"]       = $amount; ?>
                        <?php
                    endif  ?>
                    <?php endforeach ?>
                <?php endif ?>
        </tbody>
    </table>
</div>
<form action="<?php echo base_url('CounterController/sentemailstockexpaired') ?>" method="post">
    <div class="modal fade" id="kirimmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" autocomplete="off" style="font-family:Arial, FontAwesome" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function search(x) {
        var data = <?php echo json_encode($getdata) ?>;
        console.log(data);
        var baris = "";
        var bar = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
                baris += '<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(' + data[i] + ')">';
                baris += `  <th style="text-align:center;width: 4%;padding-left:1vw" scope="row">` + (a++) + `</th>
                                <td style="text-align:center;width: 22%">` + data[i]["nameitem"] + `</td>
                                <td style="text-align:center;width: 5%">` + data[i]["sku"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["totalexp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">Detail <i class="fa fa-external-link"></i></td>
                            </tr>`
                bar += '<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(' + data[i] + ')">';
                bar += `  <th style="text-align:center;width: 4%;padding-left:1vw" scope="row">` + (a++) + `</th>
                                <td style="text-align:center;width: 22%">` + data[i]["nameitem"] + `</td>
                                <td style="text-align:center;width: 5%">` + data[i]["sku"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["totalexp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">Detail <i class="fa fa-external-link"></i></td>
                            </tr>`
            } else if (data[i]["sku"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                baris += '<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(' + data[i] + ')">';
                baris += `
                        <th style="text-align:center;width: 4%;padding-left:1vw" scope="row">` + (a++) + `</th>
                            <td style="text-align:center;width: 22%">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5%" >` + data[i]["sku"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["totalexp"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5%">Detail <i class="fa fa-external-link"></i></td>
                        </tr>`
                bar += '<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(' + data[i] + ')">';
                bar += `  <th style="text-align:center;width: 4%;padding-left:1vw" scope="row">` + (a++) + `</th>
                                <td style="text-align:center;width: 22%">` + data[i]["nameitem"] + `</td>
                                <td style="text-align:center;width: 5%">` + data[i]["sku"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["totalexp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                                <td class="pl-4" style="text-align:center;width: 5%">Detail <i class="fa fa-external-link"></i></td>
                            </tr>`
            }
        }
        $('#bodyx').html(baris);
        $('#prt').html(bar);
    }

    function order() {
        const arry = [];
        var baris = '';
        $('#table tr').filter(':has(:checkbox:checked)').each(function() {
            // this = tr
            $tr = $(this);
            arry.push(this.id);
        });
        for (var i = 0; i < arry.length; i++) {
            baris += `<input type="hidden" name="iditem[]" value=` + arry[i] + `>`
        }
        $('#data').html(baris)
        $('#form').submit()
    }


    function detail(x, y, z, a, b) {
        // $.ajax({
        //     type: "POST",
        //     url: '<?php echo base_url("CounterController/getdataexpired") ?>',
        //     data: 'iditem=' + x + '&idwh=' + y,
        //     dataType: 'json',
        //     success: function(hasil) {
        //         $('#addr').html(z)
        //         $('#date').html(a)
        //         $('#qty').html(b)
        //         var baris = "";
        //         for (var i = 0; i < hasil.length; i++) {
        //             baris += `
        //                     <tr>
        //                         <td>` + hasil[i]["expdate"] + `</td>   
        //                         <td>` + hasil[i]["idsn"] + `</td>   
        //                         <td>` + hasil[i]["idsn2"] + `</td>   
        //                     </tr>`
        //         }
        //         $('#body').html(baris);
        //     }
        // });

        var data = <?php echo json_encode($getdata) ?>;
        var today = new Date();

        var date = moment().add(90, "days").format('YYYY-MM-DD');
        console.log(data);
        var baris = "";
        var bar = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["iditem"] == x) {
                $('#addr').html(data[i]["nameitem"])
                $('#date').html(data[i]["sku"])
                $('#qty').html(data[i]["totalexp"])
                for (var count = 0; count < data[i]["detail"].length; count++) {
                    console.log(data[i]["detail"][count]["exp"] + " " + date)
                    if (data[i]["detail"][count]["exp"] <= date) {
                        baris += `
                             <tr>
                                 <td>` + data[i]["detail"][count]["exp"] + `</td>   
                                 <td>` + data[i]["detail"][count]["snawal"] + `</td>   
                                 <td>` + data[i]["detail"][count]["snakhir"] + `</td>   
                                 <td>` + data[i]["detail"][count]["hpp"] + `</td>   
                             </tr>`

                    }

                }
            }
        }
        $('#body').html(baris);

    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "StockExpired.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>