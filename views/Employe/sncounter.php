<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>
<style>
    .fw {
        font-weight: bold;
    }

    .fn {
        font-weight: normal;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .cn {
        text-align: center;
    }

    .tu {
        text-transform: uppercase;
    }

    .selectpicker {
        height: 20vh;
    }

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>

<?php $datadisplay = array(); ?>

<div class="container-fluid py-2" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Counter / Serial Number</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">SERIAL NUMBER</p>
</div>

<div class="container-xxl ml-5">
    <div class="card-body ml-4">
        <div class="card bay " width="80%">
            <div class="card-header border-0 bg-white">
                <div class="row  d-flex justify-content-between">
                    <div class="col-6" style="margin-left: 1vw;">
                        <div class="input-group">
                            <?php if ($sn != "") { ?>
                                <input type="text" class="form-control" placeholder="&#xF002; Cari Product Berdasarkan SN" onkeypress="return isNumberKey(event)" id="search" style="font-family:Arial, FontAwesome" value="<?php echo $sn ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" placeholder="&#xF002; Cari Product Berdasarkan SN" onkeypress="return isNumberKey(event)" id="search" style="font-family:Arial, FontAwesome">
                            <?php } ?>
                        </div>
                        <div class="card">
                            <div class="card-body bays">
                                <div class="rwo d-flex justify-content-between">
                                    <div class="col-3">
                                        <p>Dari</p>
                                        <?php if ($date1 != "") { ?>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1" value="<?php echo $date1 ?>">
                                        <?php } else { ?>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                        <?php } ?>
                                    </div>
                                    <div class="col-3">
                                        <p>Sampai</p>
                                        <?php if ($date1 != "") { ?>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2" value="<?php echo $date2 ?>">
                                        <?php } else { ?>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                        <?php } ?>
                                    </div>
                                    <div class="col-3">
                                        <p>Nama Barang</p>
                                        <select class=" selectpicker form-control" data-live-search="true" id="selitem">
                                            <option value="" selected>Cari Product atau Item</option>
                                            <?php if ($data5 != "Not Found") : ?>
                                                <?php foreach ($data5 as $key) : ?>
                                                    <option value="<?php echo $key['iditem'] ?>"><?php echo $key["nameitem"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col-1 pt-3">
                                        <a style="text-decoration: none;color: purple;cursor: pointer;" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                    </div>
                                    <div class="col-2 pt-3">
                                        <a style="text-decoration: none;float:right" class="btn btn-outline-primary" onclick="date()">Apply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-4">
                        <div class="mb-3 row">
                            <!-- <label for="inputPassword" class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                                <select class=" selectpicker form-control" data-live-search="true" onchange="chose(this.value)" id="selitem">
                                    <option value="" disabled selected>Cari Product atau Item</option>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key['iditem'] ?>"><?php echo $key["nameitem"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div> -->
                            <a class="btn btn-outline-success" style="margin-left: 22vw;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Tipe Barang</label>
                            <div class="col-sm-8">
                                <select class="form-select form-control col-11" aria-label="Default select example" onchange="typeitem(this.value)">
                                    <option selected disabled>Pilih Tipe Barang</option>
                                    <?php if ($data4 != "Not Found") : ?>
                                        <?php foreach ($data4 as $key) : ?>
                                            <option value="<?php echo $key["namecomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-select form-control col-11" aria-label="Default select example" onchange="status(this.value)">
                                    <option selected disabled>Pilih Status Barang</option>
                                    <option value="Counter">Counter</option>
                                    <option value="Gudang Utama">Gudang Utama</option>
                                    <option value="Out Sales">Out Sales</option>
                                    <option value="Out Paket">Out Paket</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body pt-4">
                <table class="table m-0 table-hover table-striped ">
                    <thead style="background-color: orange;color: white">
                        <tr>
                            <th style="text-align:center;width: 5% " scope="col">SKU</th>
                            <th style="text-align:center;width: 17% " scope="col">Nama Barang</th>
                            <th class="pl-5" style="text-align:center;width: 8% " scope="col">Supplier</th>
                            <th style="text-align:center;width: 5% " scope="col">Serial Number</th>
                            <th style="text-align:center;width: 5% " scope="col">EXP</th>
                            <th style="text-align:center;width: 5% " scope="col">HPP</th>
                            <th style="text-align:center;width: 5% " scope="col">Tipe Barang</th>
                            <th style="text-align:center;width: 5% " scope="col">Status</th>
                        </tr>
                    </thead>
                </table>
                <div style="overflow-y: scroll;height: 46vh">
                    <table class="table table-striped table-hover">
                        <tbody style="background-color: white" id="bodyxx">
                            <?php $startx = $start;
                            if ($sn == "" || $item == "Not Found") {
                                if ($data2 != "Not Found") : $a = 0; ?>
                                    <?php foreach ($data2 as $key) : ?>
                                        <?php if ($a == $start) :
                                            if ($start < $finish) {
                                                $snawal;
                                                $snakhir;
                                                if (strlen($key["idsn2"]) >= 20 && strlen($key["idsn"] >= 20)) {
                                                    $snawal = substr($key["idsn"], 8);
                                                    $snakhir = substr($key["idsn2"], 8);
                                                } else {
                                                    $snawal = $key["idsn"];
                                                    $snakhir = $key["idsn2"];
                                                }
                                                if ($snakhir == "0" && $snawal == "0") {
                                                    $totalsn = -1;
                                                } else {
                                                    $totalsn = $snakhir - $snawal;
                                                }

                                        ?>
                                                <?php for ($i = 0; $i <= $totalsn; $i++) { ?>
                                                    <tr>
                                                        <?php $status = $key["namewh"];
                                                        if ($data3 != "Not Found") {

                                                            foreach ($data3 as $key3) :
                                                                if ($key3["idsn"] == $key3["idsn2"] || $key3["idsn2"] == 0) {
                                                                    if ($key3["idsn"] == ($key["idsn"] + $i)) {
                                                                        $status = $key3["type"];
                                                                    }
                                                                } else {
                                                                    if ($key3["idsn"] <= ($key["idsn"] + $i) && $key3["idsn2"] >= ($key["idsn"] + $i)) {
                                                                        $status = $key3["type"];
                                                                    }
                                                                }
                                                                if ($status == "") {
                                                                    $status = $key["namewh"];
                                                                }
                                                            endforeach;
                                                        }

                                                        ?>

                                                        <?php
                                                        $f["iditem"] = $key["iditem"];
                                                        $f["sku"] = $key["sku"];
                                                        $f["nameitem"] = $key["nameitem"];
                                                        $f["exp"] = $key["expdate"];
                                                        $snfix;

                                                        if (strlen($key["idsn2"]) >= 20 && strlen($key["idsn"] >= 20)) {
                                                            $sndepan = substr($key["idsn"], 0, 5);
                                                            $snakhirs = substr($key["idsn"], 6, (int)strlen($key["idsn"]) - 2);
                                                            $snakhir = substr($key["idsn"], -1);
                                                            $snfix = $sndepan . "" . ((int)$snakhirs + $i) . $snakhir;
                                                        } else if (strlen($key["idsn2"]) >= 15 && strlen($key["idsn"] >= 15)) {
                                                            $sndepan = substr($key["idsn"], 0, 14);
                                                            $snakhirs = substr($key["idsn"], 14, (int)strlen($key["idsn"]) - 1);
                                                            $snfix = $sndepan . "" . ((int)$snakhirs + $i);
                                                        } else {
                                                            // $sndepan = substr($key["idsn"], 0,5);
                                                            //  $snakhirs = substr($key["idsn"], 6);
                                                            $snfix = $key["idsn"] + $i;
                                                        }
                                                        // $sndepan = substr($key["idsn"], 0, 5);
                                                        // $snakhirs = substr($key["idsn"], 6, (int)strlen($key["idsn"]) - 2);
                                                        // $snakhir = substr($key["idsn"], -1);
                                                        // $sndepan = substr($key["idsn"], 0, 5);
                                                        // $snakhirs = substr($key["idsn"], 6, (int)strlen($key["idsn"]) - 2);
                                                        // $snakhir = substr($key["idsn"], -1);
                                                        // $snfix = $key["idsn"]; //$sndepan . "" .  $snakhirs + $i;

                                                        // $f["idsn"] = $snfix;
                                                        $f["namesupp"] = $key["namesupp"];
                                                        $f["namecomm"] = $key["namecomm"];
                                                        $f["status"] = $status;
                                                        array_push($datadisplay, $f);
                                                        ?>
                                                        <td style="text-align:center;width: 5% "><?php echo $key["sku"] ?></td>
                                                        <td style="text-align:center;width: 20% "><?php echo $key["nameitem"] ?></td>
                                                        <td style="text-align:center;width: 8% "><?php echo $key["namesupp"]  ?></td>
                                                        <td style="text-align:center;width: 5% "><?php echo $snfix ?></td>
                                                        <td style="text-align:center;width: 5% "><?php echo $key["expdate"] ?></td>
                                                        <td style="text-align:center;width: 5% "><?php echo $key["priceitem"] ?></td>
                                                        <td style="text-align:center;width: 5% "><?php echo $key["namecomm"]  ?></td>
                                                        <td style="text-align:center;width: 5% "><?php echo $status  ?></td>
                                                    </tr>
                                                <?php } ?>
                                        <?php $start++;
                                            };
                                        endif;
                                        $a++; ?>
                                    <?php endforeach ?>
                                <?php endif;
                            } else { ?>
                                <?php $status = "";
                                if ($data3 != "Not Found") {

                                    foreach ($data3 as $key3) :
                                        if ($key3["idsn"] == $key3["idsn2"] || $key3["idsn2"] == 0) {
                                            if ($key3["idsn"] == ($sn)) {
                                                $status = $key3["type"];
                                            }
                                        } else {
                                            if ($key3["idsn"] <= ($sn) && $key3["idsn2"] >= ($sn)) {
                                                $status = $key3["type"];
                                            }
                                        }
                                        if ($status == "") {
                                            $status = $item[0]["namewh"];
                                        }
                                    endforeach;
                                } else {
                                    $status = $item[0]["namewh"];
                                }

                                ?>
                                <?php  ?>
                                <?php
                                $f["iditem"] = $item[0]["iditem"];
                                $f["sku"] = $item[0]["sku"];
                                $f["nameitem"] = $item[0]["nameitem"];
                                $f["expdate"] = $item[0]["expdate"];
                                $snfix = $sn;
                                $sndepan = substr($sn, 0, 5);
                                $snakhirs = substr($sn, 6, (int)strlen($sn) - 2);
                                $snakhir = substr($sn, -1);
                                $f["idsn"] = $snfix;
                                $f["namesupp"] = $item[0]["namesupp"];
                                $f["namecomm"] = $item[0]["namecomm"];
                                $f["priceitem"] = $item[0]["priceitem"];
                                $f["status"] = $status;
                                array_push($datadisplay, $f);
                                ?>
                                <?php foreach ($datadisplay as $key) : ?>
                                    <td style="text-align:center;width: 5% "><?php echo $key["sku"] ?></td>
                                    <td style="text-align:center;width: 20% "><?php echo $key["nameitem"] ?></td>
                                    <td style="text-align:center;width: 8% "><?php echo $key["namesupp"]  ?></td>
                                    <td style="text-align:center;width: 5% "><?php echo $key["idsn"] ?></td>
                                    <td style="text-align:center;width: 5% "><?php echo $key["expdate"] ?></td>
                                    <td style="text-align:center;width: 5% "><?php echo $key["priceitem"]  ?></td>
                                    <td style="text-align:center;width: 5% "><?php echo $key["namecomm"]  ?></td>
                                    <td style="text-align:center;width: 5% "><?php echo $key["status"]  ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example" style="overflow-y: scroll;">
            <ul class="pagination justify-content-center" id="page">
                <?php $totaldata = 0;
                if ($data2 != "Not Found") : ?>
                    <?php $totaldata = ceil(count($data2) / 2) ?>
                <?php endif;
                $before = 0;
                $after = 2; ?>
                <?php if ($totaldata > 20) { ?>
                    <?php for ($i = 1; $i <= 20; $i++) {
                        if ($sn == "") {
                    ?>
                            <?php if ($i == $page) { ?>
                                <li class="page-item"><a class="page-link" style="cursor: pointer; background-color: #7C8881; color: white" onclick="page(<?php echo $before ?>,<?php echo $after ?> ,<?php echo $i ?>)"><?php echo $i ?></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="page(<?php echo $before ?>,<?php echo $after ?> ,<?php echo $i ?>)"><?php echo $i ?></a></li>
                        <?php };
                        } ?>

                        <?php $before = $before + 2;
                        $after = $after + 2; ?>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="next(1,20)">Next</a></li>
                <?php } else { ?>

                    <?php for ($i = 1; $i <= $totaldata; $i++) {
                        if ($sn == "") {
                    ?>
                            <?php if ($i == $page) { ?>
                                <li class="page-item"><a class="page-link" style="cursor: pointer; background-color: #7C8881; color: white" onclick="page(<?php echo $before ?>,<?php echo $after ?> ,<?php echo $i ?>)"><?php echo $i ?></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="page(<?php echo $before ?>,<?php echo $after ?> ,<?php echo $i ?>)"><?php echo $i ?></a></li>
                        <?php };
                        } ?>

                        <?php $before = $before + 2;
                        $after = $after + 2; ?>
                    <?php } ?>

                <?php } ?>


            </ul>
        </nav>
    </div>
</div>

<div class="excel" id="excel">
</div>
<div class="data" id="data">
    <table class="table">
        <thead style="background: purple">
            <tr style="border: solid;">
                <th scope="col">SKU</th>
                <th>Nama Barang</th>
                <th>Supplier</th>
                <th>Serial Number</th>
                <th>EXP</th>
                <th>HPP</th>
                <th>Tipe Barang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="background-color: white;" id="pri">
            <?php foreach ($datadisplay as $key) : ?>
                <td><?php echo $key["sku"] ?></td>
                <td><?php echo $key["nameitem"] ?></td>
                <td><?php echo $key["namesupp"]  ?></td>
                <td>'<?php echo $key["idsn"] ?></td>
                <td><?php echo $key["exp"] ?></td>
                <td><?php echo $key["priceitem"]  ?></td>
                <td><?php echo $key["namecomm"]  ?></td>
                <td><?php echo $key["status"]  ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $('#search').select()
    $('#search').focus();

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Tidak Boleh Alphabet");
            return false;
        }
        return true;
    }


    function next(start, finish) {

        var baris = "";
        var before = (finish * 2);
        var after = Number(finish * 2) + Number(2);
        var page = <?php echo json_encode($page) ?>;

        <?php if ($totaldata > 20) { ?>
            baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="back(' + start + ',' + finish + ')">Back</a></li>'
            for (var i = Number(finish) + Number(1); i <= Number(finish) + Number(20); i++) {


                <?php if ($sn == "") {
                ?>
                    if (i == page) {
                        baris += '<li class="page-item"><a class="page-link" style="cursor: pointer; background-color: #7C8881; color: white" onclick="page(' + before + ',' + after + ' ,' + i + ')">' + i + '</a></li>'
                    } else {
                        baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="page(' + before + ',' + after + ' ,' + i + ')">' + i + '</a></li>'
                    }


                <?php  } ?>

                before = Number(before) + Number(2);
                after = Number(after) + Number(2);
            }
            baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="next(' + (Number(finish) + Number(1)) + ',' + (Number(finish) + Number(20)) + ')">Next</a></li>'



        <?php } ?>

        $('#page').html(baris)


    }

    function back(start, finish) {
        var baris = "";
        var before = Number(0) + (Number(start * 2) - 2);
        var after = Number(start * 2);
        var page = <?php echo json_encode($page) ?>;

        <?php if ($totaldata > 20) { ?>
            if (start != "1") {
                baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="back(' + (start - 20) + ',' + (finish - 20) + ')">Back</a></li>'
            }

            for (var i = Number(start); i <= finish; i++) {


                <?php if ($sn == "") {
                ?>
                    if (i == page) {
                        baris += '<li class="page-item"><a class="page-link" style="cursor: pointer; background-color: #7C8881; color: white" onclick="page(' + before + ',' + after + ' ,' + i + ')">' + i + '</a></li>'
                    } else {
                        baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="page(' + before + ',' + after + ' ,' + i + ')">' + i + '</a></li>'
                    }


                <?php  } ?>

                before = Number(before) + Number(2);
                after = Number(after) + Number(2);
            }
            baris += '<li class="page-item"><a class="page-link" style="cursor: pointer;" onclick="next(' + start + ',' + finish + ')">Next</a></li>'



        <?php } ?>

        $('#page').html(baris)
    }


    $('#data').hide();

    var iditem = <?php echo json_encode($iditem) ?>;
    if (iditem != "empty") {
        $('#selitem').val(iditem)
    }


    function reset() {
        var start = <?php echo $startx ?>;
        var finish = <?php echo $finish ?>;
        var page = <?php echo $page ?>;
        window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + start + '&finish=' + finish + '&page=' + page);
    }

    function page(x, y, z) {

        var start = <?php echo $startx ?>;
        var finish = <?php echo $finish ?>;
        var page = <?php echo $page ?>;
        if ($('#date1').val() != "" && $('#date2').val() != "") {


            window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + x + '&finish=' + y + '&page=' + z + '&date1=' + $('#date1').val() + '&date2=' + $('#date2').val() + '&xxx=' + $('#selitem').val());

        } else if ($('#selitem').val() != "") {
            window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + x + '&finish=' + y + '&page=' + z + '&xxx=' + $('#selitem').val());
        } else {
            window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + x + '&finish=' + y + '&page=' + z);
        }



    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Scounter.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    // Get the input field
    var input = document.getElementById("search");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            var start = <?php echo $startx ?>;
            var finish = <?php echo $finish ?>;
            var page = <?php echo $page ?>;
            if ($('#search').val() == "") {
                window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + start + '&finish=' + finish + '&page=' + page);
            } else {

                window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + start + '&finish=' + finish + '&page=' + page + '&idsn=' + $('#search').val());
            }
        }
    });



    function typeitem(x) {
        var data = <?php echo json_encode($datadisplay) ?>;
        console.log(data)
        var baris = '';
        var bar = '';
        for (var i = 0; i < data.length; i++) {
            console.log(x + " " + data[i]["iditem"])
            if (data[i]["namecomm"] == x)

            {
                baris += ` <tr>
                                        <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                                        <td style="text-align:center;width: 20% ">` + data[i]["nameitem"] + `</td>
                                        <td style="text-align:center;width: 8% ">` + data[i]["namesupp"] + `</td>
                                        <td style="text-align:center;width: 5% ">` + data[i]["idsn"] + `</td>
                                        <td style="text-align:center;width: 5% ">` + data[i]["exp"] + `</td>
                                         <td style="text-align:center;width: 5% ">` + data[i]["namecomm"] + `</td>
                                         <td style="text-align:center;width: 5% ">` + data[i]["status"] + `</td>
                                    </tr>`
                bar += `
                <tr>
                        <td style="text-align:center;">` + data[i]["sku"] + `</td>
                        <td style="text-align:center; ">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;">` + data[i]["namesupp"] + `</td>
                        <td style="text-align:center;">` + data[i]["idsn"] + `</td>
                        <td style="text-align:center;">` + data[i]["exp"] + `</td>
                        <td style="text-align:center;" >` + data[i]["namecomm"] + `</td>
                        <td style="text-align:center;">` + data[i]["status"] + `</td>
                    <tr>`
            }
        }

        $('#bodyxx').html(baris);
        $('#pri').html(bar);
    }

    function status(x) {
        var data = <?php echo json_encode($datadisplay) ?>;
        console.log(data)
        var baris = '';
        var bar = '';
        for (var i = 0; i < data.length; i++) {
            console.log(x + " " + data[i]["iditem"])
            if (data[i]["status"] == x)

            {
                baris += ` <tr>
                                        <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                                        <td style="text-align:center;width: 20% ">` + data[i]["nameitem"] + `</td>
                                        <td style="text-align:center;width: 8% ">` + data[i]["namesupp"] + `</td>
                                        <td style="text-align:center;width: 5% ">` + data[i]["idsn"] + `</td>
                                        <td style="text-align:center;width: 5% ">` + data[i]["exp"] + `</td>
                                         <td style="text-align:center;width: 5% ">` + data[i]["namecomm"] + `</td>
                                         <td style="text-align:center;width: 5% ">` + data[i]["status"] + `</td>
                                    </tr>`
                bar += `
                    <tr>
                        <td style="text-align:center;">` + data[i]["sku"] + `</td>
                        <td style="text-align:center; ">` + data[i]["nameitem"] + `</td>
                        <td style="text-align:center;">` + data[i]["namesupp"] + `</td>
                        <td style="text-align:center;">` + data[i]["idsn"] + `</td>
                        <td style="text-align:center;">` + data[i]["exp"] + `</td>
                        <td style="text-align:center;" >` + data[i]["namecomm"] + `</td>
                        <td style="text-align:center;">` + data[i]["status"] + `</td>
                    <tr>`
            }
        }

        $('#bodyxx').html(baris);
        $('#pri').html(bar);
    }


    function date() {
        var start = <?php echo $startx ?>;
        var finish = <?php echo $finish ?>;
        var page = <?php echo $page ?>;
        if ($('#date1').val() != "" && $('#date2').val() != "") {


            window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + start + '&finish=' + finish + '&page=' + page + '&date1=' + $('#date1').val() + '&date2=' + $('#date2').val() + '&xxx=' + $('#selitem').val());

        } else if ($('#selitem').val() != "") {
            window.location.replace("<?php echo base_url('CounterController/sncounter') ?>" + '?start=' + start + '&finish=' + finish + '&page=' + page + '&xxx=' + $('#selitem').val());
        } else {
            alert("Tolong isi Periode tanggal atau nama item")
        }
    }
</script>