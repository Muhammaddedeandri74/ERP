<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('CounterController/stockinventory') ?>" class="btn fw bay btn-light px-4">ALL</a>
                    <a href="<?= base_url('CounterController/stockhabis') ?>" class="btn fw btn-transparent">STOCK HABIS</a>
                    <a href="<?= base_url('CounterController/expired') ?>" class="btn fw btn-transparent">SEGERA EXPIRED</a>
                    <a href="<?= base_url('CounterController/opname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('CounterController/stockinventory') ?>" method="post">
                            <div class="row pt-4 d-flex justify-content-between">
                                <div class="col-6" style="margin-left: 1vw;">
                                    <!-- <input type="text" name="cari" id="cari" placeholder="filter" placeholder="Search By name item" class="form-control" value="<?php echo $cari; ?> " /> -->
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="input-group">
                                                <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
                                                    <option class="slc" value="iditem">ID Item</option>
                                                    <option class="slc" value="nameitem">Nama Product</option>
                                                    <option class="slc" value="sku">SKU</option>
                                                </select>
                                                <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" name="search" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Nama Product dan SKU" style="font-family:Arial, FontAwesome">
                                            </div>
                                            &nbsp;
                                            <div class="input-group">
                                                <a href="<?php echo base_url('CounterController/stockinventory') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>&nbsp;
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-2" style="margin-top: 13vh">
                                    <a class=" btn btn-outline-success" style="float:right" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped table-hover m-0">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="text-align:center;width: 4% ">ID Item</th>
                                    <th style="text-align:center;width: 20% ">Nama Product</th>
                                    <th style="text-align:center;width: 10% ">SKU</th>
                                    <th style="text-align:center;width: 5% ">Min. Stock</th>
                                    <th style="text-align:center;width: 5% ">QTY Actual</th>
                                    <th style="text-align:center;width: 5% ">QTY Sales Order</th>
                                    <th style="text-align:center;width: 5% ">Balance</th>
                                    <th style="text-align:center;width: 5% ">Amount HPP</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 52vh">
                            <table class="table table-striped table-hover">
                                <tbody style="background-color: whtie" id="bodyx">
                                    <?php
                                    if ($data != "Not Found") : $a = 1;
                                        $getdata = array(); ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php if ($a % 2 == 0) { ?>
                                                <tr>
                                                <?php } else { ?>
                                                <tr style="background: #eeeeee">
                                                <?php } ?>
                                                <?php $ok = 0;
                                                $key["qtys"] = 0;

                                                if ($key["data"] != "Not Found") :  ?>
                                                    <?php foreach ($key["data"] as $keyx) : ?>
                                                        <?php if ($keyx["endqty"] != "0") : ?>
                                                            <?php if ($keyx["expdate"] < date('Y-m-d')) :
                                                                $ok = $ok + 1;

                                                            ?>
                                                            <?php endif ?>
                                                        <?php
                                                            $key["qtyawal"] = $keyx["endqty"];
                                                        else :
                                                            $key["qtyawal"] = 0;

                                                        endif ?>
                                                    <?php endforeach ?>
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
                                                    <?php foreach ($key["data1"] as $keey1) : ?>
                                                        <?php if ($data1 != "Not Found") : ?>
                                                            <?php foreach ($data1 as $keey) : ?>

                                                                <?php
                                                                if ($key["usesn"] == "Y") {


                                                                    if (in_array($keey1["iditem"], $iditem)) {


                                                                        if ($keey["idsn"] == $keey["idsn2"] || $keey["idsn2"] == 0) {
                                                                            if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {

                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10) + 1;
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"] + 1;
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }

                                                                                $g["hpps"] = 1;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn"], 10) - 1;
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn2"] - 1;
                                                                                }
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["hpps"] = 2;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
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

                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10) + 1;
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"] + 1;
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["hpps"] = 3;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
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
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10) - 1;
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn2"] - 1;
                                                                                }
                                                                                $g["hpps"] = 4;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }

                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey1["idsn"] > $keey["idsn"] && $keey1["idsn2"] > $keey["idsn"] && $keey["snid"] == $keey1["snid"]) {
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 5;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            }
                                                                        } else {

                                                                            if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn2"], 10) + 1;
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn2"] + 1;
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 6;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn"], 10) - 1;
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn"] - 1;
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 7;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
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

                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn2"], 10) + 1;
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn2"] + 1;
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 8;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
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
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn"], 10) - 1;
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn"] - 1;
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 9;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] > $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 10;
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {

                                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                                } else {
                                                                                    $g["snawal"] = $keey1["idsn"];
                                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                                }
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 11;
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["idpo"] = $keey1["idpo"];
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

                                                                        }
                                                                    } else {

                                                                        if (strlen($keey1["idsn"]) >= 10) {
                                                                            $g["snawal"] = substr($keey1["idsn"], 10);
                                                                            $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                        } else {
                                                                            $g["snawal"] = $keey1["idsn"];
                                                                            $g["snakhir"] = $keey1["idsn2"];
                                                                        }
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

                                                                    if (strlen($keey1["idsn"]) >= 10) {
                                                                        $g["snawal"] = substr($keey1["idsn"], 10);
                                                                        $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                    } else {
                                                                        $g["snawal"] = $keey1["idsn"];
                                                                        $g["snakhir"] = $keey1["idsn2"];
                                                                    }
                                                                    $g["hpp"] = intval($keey1["hargabeli"]) * $key["qtyawal"];
                                                                    $g["hpps"] = 11;
                                                                    $g["snid"] = $keey1["snid"];
                                                                    $g["idpo"] = $keey1["idpo"];
                                                                    array_push($key["detail"], $g);
                                                                    break;
                                                                }

                                                                ?>

                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                <?php } else {

                                                    if ($key["data1"] != "Not Found") {
                                                        if ($key["usesn"] == "Y") {
                                                            foreach ($key["data1"] as $keey) {
                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                } else {
                                                                    $g["snawal"] = $keey1["idsn"];
                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                }
                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                    $g["hpp"] = intval($keey["hargabeli"]) * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                } else {
                                                                    $g["hpp"] = intval($keey["hargabeli"] * $key["qtyawal"]);
                                                                }

                                                                $g["idpo"] = $keey["idpo"];
                                                                array_push($key["detail"], $g);
                                                            }
                                                        } else {
                                                            foreach ($key["data1"] as $keey) {
                                                                if (strlen($keey1["idsn"]) >= 10) {
                                                                    $g["snawal"] = substr($keey1["idsn"], 10);
                                                                    $g["snakhir"] = substr($keey1["idsn2"], 10);
                                                                } else {
                                                                    $g["snawal"] = $keey1["idsn"];
                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                }
                                                                $g["hpp"] = intval($keey["hargabeli"]);
                                                                $g["hpps"] = 11;
                                                                $g["snid"] = $keey["snid"];
                                                                $g["idpo"] = $keey["idpo"];
                                                                array_push($key["detail"], $g);
                                                                break;
                                                            }
                                                        }
                                                    }
                                                } ?>

                                                <?php
                                                if (count($key["detail"]) == 0) {

                                                    $key["hpp"] = 0;
                                                } else {
                                                    $totalpo = array();
                                                    $totalhpp = 0;
                                                    foreach ($key["detail"] as $kex) {
                                                        array_push($totalpo, $kex["idpo"]);
                                                        $totalhpp = intval($totalhpp) + intval($kex["hpp"]);
                                                    }

                                                    // $key["hpp"]   = intval($totalhpp) / count(array_unique($totalpo));
                                                    $key["hpp"]   = intval($totalhpp);
                                                }
                                                ?>
                                                <th style="text-align:center;width: 4% " scope="row"><?php echo $key["iditem"] ?></th>
                                                <td style="text-align:center;width: 21%"><?php echo $key["nameitem"] ?></td>
                                                <td style="text-align:center;width: 10%"><?php echo $key["sku"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["minstock"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["qtyactual"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["qtyso"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["qtyactual"] - $key["qtyso"]   ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo number_format($key["hpp"], 0, "", ",") ?></td>
                                                </tr>
                                            <?php array_push($getdata, $key);
                                        endforeach ?>
                                        <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>
<div class="excel" id="excel">
</div>
<div class="data" id="data" style="display: none">
    <table class="table">
        <thead style="background: purple">
            <tr>
                <th style="text-align:center;border:1px solid;background-color: yellow;">ID Item</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">Nama Product</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">SKU</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">Min. Stock</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">QTY Actual</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">QTY Sales Order</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">Balance</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">HPP</th>
            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($getdata != "Not Found") : $a = 1;
            ?>
                <?php foreach ($getdata as $key) : ?>
                    <?php if ($a % 2 == 0) { ?>
                        <tr>
                        <?php } else { ?>
                        <tr style="background: #eeeeee">
                        <?php } ?>

                        <th style="text-align:center;border:1px solid;width:4%"><?php echo $key["iditem"] ?></th>
                        <td style="text-align:center;border:1px solid;width: 21%"><?php echo $key["nameitem"] ?></td>
                        <td style="text-align:center;border:1px solid;width: 10%"><?php echo $key["sku"] ?></td>
                        <td style="text-align:center;border:1px solid;width: 5%"><?php echo $key["minstock"] ?></td>
                        <td style="text-align:center;border:1px solid;width: 5%"><?php echo $key["qtyactual"] ?></td>
                        <td style="text-align:center;border:1px solid;width: 5%"><?php echo $key["qtyso"] ?></td>
                        <td style="text-align:center;border:1px solid;width: 5%"><?php echo $key["qtyactual"] - $key["qtyso"]   ?></td>
                        <td style="text-align:center;border:1px solid;width: 5%"><?php echo $key["hpp"] ?></td>

                        </tr>
                    <?php
                endforeach ?>
                <?php endif ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function search(x) {
        var data = <?php echo json_encode($getdata) ?>;
        console.log(data);
        var baris = "";
        var bar = "";
        var a = 1;
        var ix = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
                ix = (ix + 1);
                baris += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                    </tr>`
                bar += `<tr>
                        <th style="text-align:center;width: 4%;border:1px solid" scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%;border:1px solid">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                    </tr>`
            } else if (data[i]["sku"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                ix = (ix + 1);
                baris += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                    </tr>`
                bar += `<tr>
                        <th style="text-align:center;width: 4%;border:1px solid " scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%;border:1px solid">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%;border:1px solid">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["hpp"] + `</td>
                    </tr>`
            }
        }
        $('#bodyx').html(baris);
        $('#prt').html(bar);
    }

    $("#btn_exportexcel").click(function(e) {

        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "StockInventory.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>