<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-body  ml-4">
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <div class="row">
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table m-0" id="table">
                        <thead style="background-color: orange;color: white">
                            <tr>
                                <th style="text-align:center;width: 1%" scope="col">#</th>
                                <th style="text-align:center;width: 15%" scope="col">Nama Product</th>
                                <th style="text-align:center;width: 5%" scope="col">SKU</th>
                                <th style="text-align:center;width: 5%" scope="col">QTY</th>
                                <th style="text-align:center;width: 5%" scope="col">Amount</th>
                            </tr>
                        <tbody style="background-color: white;color: black">
                            <tr>
                                <?php
                                $expdatetime = date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))));
                                if ($data != "Not Found") : $a = 1;
                                    $getdata = array(); ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php $ok = 0;
                                        $amount = 0;
                                        $qty = 0;
                                        if ($key["data"] != "Not Found") :  ?>
                                            <?php foreach ($key["data"] as $keyx) : ?>
                                                <?php if ($keyx["endqty"] != "0") : ?>
                                                    <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))))) :

                                                        $qty = $qty + $keyx["endqty"];
                                                    ?>
                                                    <?php endif ?>
                                                <?php
                                                    $key["qtyawal"] = $keyx["endqty"];
                                                endif ?>
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
                                                                        $g["exp"] = $keey1["expdate"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
                                                                        }

                                                                        $g["idpo"] = $keey1["idpo"];
                                                                        $g["snid"] = $keey1["snid"];
                                                                        $g["exp"] = $keey1["expdate"];
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
                                                                        $g["exp"] = $keey1["expdate"];
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
                                                                        $g["exp"] = $keey1["expdate"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                                        if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                            $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                                        } else {
                                                                            $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                                                            if ($g["snakhir"] != "0"  && $g["snawal"] != "0") {
                                                                $g["hpp"] = $keey1["hargabeli"] * (($g["snakhir"] - $g["snawal"]) + 1);
                                                            } else {
                                                                $g["hpp"] = $keey1["hargabeli"] * $key["qtyawal"];
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
                            <th style="text-align:center;width: 1%;padding-left: 1vw" scope="row"><?= $a++ ?>
                            </th>
                            <td style="text-align:center;width: 15%"><?php echo $key["nameitem"] ?></td>
                            <td style="text-align:center;width: 5%"><?php echo $key["sku"] ?></td>
                            <td class="pl-4" style="text-align:center;width: 5%"><?php echo $key["totalexp"] ?></td>
                            <td class="pl-4" style="text-align:center;width: 5%"><?php echo $key["hpp"] ?></td>
                            </tr>
                            <?php $key["qtyexp"] = $qty;
                                            $key["amount"] = $amount; ?>
                        <?php array_push($getdata, $key);
                                        endif  ?>
                    <?php endforeach ?>
                <?php endif ?>
                </tr>
                        </tbody>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>