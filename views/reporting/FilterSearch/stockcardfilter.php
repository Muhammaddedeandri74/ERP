<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);

        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    #pagination {
        margin: 40 40 0;
    }

    ul.gp_pagination li a {
        border: solid 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
    }

    ul.gp_pagination li {
        padding-bottom: 1px;
    }

    ul.gp_pagination li a:hover,
    ul.gp_pagination li a.current {
        color: #FFFFFF;
        box-shadow: 0px 1px #EDEDED;
        -moz-box-shadow: 0px 1px #EDEDED;
        -webkit-box-shadow: 0px 1px #EDEDED;
    }

    ul.gp_pagination {
        margin: 4px 0;
        padding: 0px;
        height: 100%;
        overflow: hidden;
        font: 12px 'Tahoma';
        list-style-type: none;
    }

    ul.gp_pagination li {
        float: left;
        margin: 0px;
        padding: 0px;
        margin-left: 5px;
    }

    ul.gp_pagination li a {
        color: black;
        display: block;
        text-decoration: none;
        padding: 7px 10px 7px 10px;
    }

    ul.gp_pagination li a img {
        border: none;
    }

    ul.gp_pagination li a {
        color: #0A7EC5;
        border-color: #8DC5E6;
        background: #F8FCFF;
    }

    ul.gp_pagination li a:hover,
    ul.gp_pagination li a.current {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY GUDANG</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('reporting/stockcard') ?>" class="btn fw bay btn-light px-4">ALL</a>
                    <a href="<?= base_url('reporting/stockcardhabis') ?>" class="btn fw btn-transparent">STOCK HABIS</a>
                    <a href="<?= base_url('reporting/stockcardexp') ?>" class="btn fw btn-transparent">SEGERA EXPIRED</a>
                    <a href="<?= base_url('reporting/stockcardopname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group">
                                    <!-- <select class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="1">Nama Product</option>
                                        <option class="slc" value="2">SKU</option>
                                    </select>
                                    <input type="text" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Nama Item ataupun SKU" oninput="search(this.value)" style="font-family:Arial, FontAwesome"> -->
                                    <?php echo form_open('Reporting/search'); ?>
                                    <div class="input-group mb-3">
                                        <input type="text" name="key" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Nama Product & SKU" style="font-family:Arial, FontAwesome" size="50px" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="search">Serach</button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-2">
                                <a class="btn btn-outline-success" id="btn_exportexcel" style="float: right;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table class="table m-0 table-striped table-hover">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="text-align:center;width: 4%" scope="col">#</th>
                                    <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                    <th style="text-align:center;width: 5%" scope="col">SKU</th>
                                    <th style="text-align:center;width: 5%" scope="col">Min. Stock</th>
                                    <th style="text-align:center;width: 5%" scope="col">QTY Actual</th>
                                    <th style="text-align:center;width: 5%" scope="col">HPP</th>
                                    <th style="text-align:center;width: 5%" scope="col">Balance</th>

                                </tr>
                            </thead>
                        </table>

                        <div style="overflow-y: scroll;height: 52vh">
                            <table class="table">
                                <tbody style="background-color: whtie" id="bodyx">
                                    <?php if ($data != "Not Found") : $a = 1;
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
                                                                $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                                            ?>
                                                            <?php endif ?>
                                                        <?php
                                                            $key["qtyawal"] = $keyx["endqty"];
                                                        endif ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                <?php $key["detail"] = array(); ?>
                                                <?php if ($data1 != "Not Found" && $key["data1"] != "Not Found") { ?>
                                                    <?php foreach ($key["data1"] as $keey1) : ?>
                                                        <?php if ($data1 != "Not Found") : ?>
                                                            <?php foreach ($data1 as $keey) : ?>

                                                                <?php
                                                                if ($key["usesn"] == "Y") {


                                                                    if ($keey["iditem"] == $keey1["iditem"]) {


                                                                        if ($keey["idsn"] == $keey["idsn2"] || $keey["idsn2"] == 0) {
                                                                            if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey1["idsn"] + 1;
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                $g["hpps"] = 1;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey["idsn"] - 1;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["hpps"] = 2;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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

                                                                                $g["snawal"] = $keey["idsn"] + 1;
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["hpps"] = 3;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey1["idsn2"] - 1;
                                                                                $g["hpps"] = 4;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }

                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey1["idsn"] > $keey["idsn"] && $keey1["idsn2"] > $keey["idsn"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 5;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            }
                                                                        } else {

                                                                            if ($keey["idsn"] == $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey["idsn2"] + 1;
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 6;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] > $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey["idsn"] - 1;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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

                                                                                $g["snawal"] = $keey["idsn2"] + 1;
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey["idsn"] - 1;
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 9;
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                $g["snid"] = $keey1["snid"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] > $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {
                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                                }
                                                                                $g["hpps"] = 10;
                                                                                $g["snid"] = $keey1["snid"];
                                                                                $g["idpo"] = $keey1["idpo"];
                                                                                array_push($key["detail"], $g);
                                                                                // break;
                                                                            } else if ($keey["idsn"] < $keey1["idsn"] && $keey["idsn2"] < $keey1["idsn2"] && $keey["snid"] == $keey1["snid"]) {

                                                                                $g["snawal"] = $keey1["idsn"];
                                                                                $g["snakhir"] = $keey1["idsn2"];
                                                                                if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                                } else {
                                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                            //      $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                            //     $g["hpps"] = 12;
                                                                            //     $g["idpo"] = $keey1["idpo"];
                                                                            //     array_push($key["detail"], $g);
                                                                            //     break;

                                                                            // }

                                                                        }
                                                                    }
                                                                } else {

                                                                    $g["snawal"] = $keey1["idsn"];
                                                                    $g["snakhir"] = $keey1["idsn2"];
                                                                    $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                        foreach ($key["data1"] as $keey) {
                                                            $g["snawal"] = $keey["idsn"];
                                                            $g["snakhir"] = $keey["idsn2"];
                                                            if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                $g["hpp"] = $keey["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                            } else {
                                                                $g["hpp"] = $keey["hargabeli"] * $key["qtyawal"];
                                                            }

                                                            $g["idpo"] = $keey["idpo"];
                                                            array_push($key["detail"], $g);
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
                                                        $totalhpp = $totalhpp + $kex["hpp"];
                                                    }

                                                    $key["hpp"] = $totalhpp / count(array_unique($totalpo));
                                                }


                                                ?>


                                                <th style="text-align:center;width: 4%" scope="row"><?php echo $a++ ?></th>
                                                <td style="text-align:center;width: 20%"><?php echo $key["nameitem"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["sku"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["minstock"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["qtyactual"] ?></td>
                                                <td style="text-align:center;width: 5%"><?php echo $key["hpp"] ?></td>

                                                <td class="pl-4" style="text-align:center;width: 5%"><?php echo $key["qtyactual"]  ?></td>

                                                </tr>
                                            <?php array_push($getdata, $key);
                                        endforeach ?>
                                        <?php endif ?>

                                </tbody>
                            </table>
                            <div id="pagination">
                                <ul class="gp_pagination">
                                    <?php foreach ($links as $link) {
                                        echo "<li>" . $link . "</li>";
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>

<div class="excel" id="excel">
</div>
<div class="data" id="data">
    <table class="table">
        <thead style="background: purple">
            <tr>
                <th style="text-align:center;border:1px solid;" scope="col">#</th>
                <th style="text-align:center;border:1px solid;" scope="col">Nama Product</th>
                <th style="text-align:center;border:1px solid;" scope="col">SKU</th>
                <th style="text-align:center;border:1px solid;" scope="col">Min. Stock</th>
                <th style="text-align:center;border:1px solid;" scope="col">QTY Actual</th>
                <th style="text-align:center;border:1px solid;" scope="col">Avg. Prch. Price</th>
                <th style="text-align:center;border:1px solid;" scope="col">QTY Expired</th>
                <th style="text-align:center;border:1px solid;" scope="col">Balance</th>

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
                        <?php $ok = 0;
                        $key["qtys"] = 0;
                        if ($key["data"] != "Not Found") :  ?>
                            <?php foreach ($key["data"] as $keyx) : ?>
                                <?php if ($keyx["endqty"] != "0") : ?>
                                    <?php if ($keyx["expdate"] < date('Y-m-d')) :
                                        $ok = $ok + 1;
                                        $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                    ?>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <th style="text-align:center;width: 4% " scope="row"><?php echo $a++ ?></th>
                        <td style="text-align:center;width: 21%"><?php echo $key["nameitem"] ?></td>
                        <td style="text-align:center;width: 10%"><?php echo $key["sku"] ?></td>
                        <td style="text-align:center;width: 5%"><?php echo $key["minstock"] ?></td>
                        <td style="text-align:center;width: 5%"><?php echo $key["qtyactual"] ?></td>
                        <td style="text-align:center;width: 5%"><?php echo $key["qtyso"] ?></td>
                        <td style="text-align:center;width: 5%"><?php echo $key["qtyactual"] - $key["qtyso"]   ?></td>
                        <td style="text-align:center;width: 5%"><?php echo $key["hpp"] ?></td>

                        </tr>
                    <?php
                endforeach ?>
                <?php endif ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('#data').hide();

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
                        <td style="text-align:center;width: 5%">` + data[i]["qtys"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                    </tr>`
                bar += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtys"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
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
                        <td style="text-align:center;width: 5%">` + data[i]["qtys"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
                    </tr>`
                bar += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>
                        <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;width: 10%">` + data[i]["sku"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["minstock"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyactual"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtyso"] + `</td>
                        <td style="text-align:center;width: 5%">` + data[i]["qtys"] + `</td>
                        <td style="text-align:center;width: 5%">` + (data[i]["qtyactual"] - data[i]["qtyso"] - data[i]["qtys"]) + `</td>
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
            download: "StockCard.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>