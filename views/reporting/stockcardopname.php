<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }
</style>



<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('reporting/stockcard') ?>" class="btn fw btn-transparent">ALL</a>
                    <a href="<?= base_url('reporting/stockcardhabis') ?>" class="btn fw btn-transparent">STOCK HABIS</a>
                    <a href="<?= base_url('reporting/stockcardexp') ?>" class="btn fw btn-transparent">SEGERA EXPIRED</a>
                    <a href="<?= base_url('reporting/stockcardopname') ?>" class="btn fw bay btn-light px-4">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('reporting/stockcardopname') ?>" method="post">
                            <div class="row pt-4 d-flex justify-content-between">
                                <div class="col-6" style="margin-left: 1vw;">
                                    <!-- <input type="text" name="cari" id="cari" placeholder="filter" placeholder="Search By name item" class="form-control" value="<?php echo $cari; ?> " /> -->
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="input-group">
                                                <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
                                                    <option class="slc" value="nameitem">Nama Product</option>
                                                    <option class="slc" value="sku">SKU</option>
                                                </select>
                                                <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" name="search" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Nama Product dan SKU" style="font-family:Arial, FontAwesome">
                                            </div>
                                            &nbsp;
                                            <div class="input-group">
                                                <a href="<?php echo base_url('reporting/stockcardopname') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>&nbsp;
                                                <button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-2" style="margin-top: 10vh">
                                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-upload"></i>Upload</a>
                                    <a class="btn btn-outline-success" style="float: right;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="<?php echo base_url('reporting/addstockopname') ?>" method="post">
                        <div class="card-body ">
                            <table class="table m-0 table-striped table-hover">
                                <thead style="background-color: orange;color: white">
                                    <tr>
                                        <th style="text-align:center;width: 4% " scope="col">ID Item</th>
                                        <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                        <th style="text-align:center;width: 5% " scope="col">SKU</th>
                                        <th style="text-align:center;width: 5% " scope="col">QTY System</th>
                                        <th style="text-align:center;width: 5% " scope="col">Qty Actual</th>
                                        <th style="text-align:center;width: 5% " scope="col">Balance System</th>
                                    </tr>
                                </thead>
                            </table>
                            <div style="overflow-y: scroll;height: 44vh">
                                <table class="table table-striped table-hover ">
                                    <tbody style="background-color: whtie" id="bodyx">
                                        <?php if ($data != "Not Found") : $a = 1;
                                            $getdata = array(); ?>
                                            <?php $angka = 0; ?>
                                            <?php foreach ($data as $key) : ?>
                                                <?php $angka ?>
                                                <tr>
                                                    <?php $ok = 0;
                                                    $key["qtys"] = 0;
                                                    if ($key["data"] != "Not Found") :  ?>
                                                        <?php foreach ($key["data"] as $keyx) : ?>
                                                            <?php if ($keyx["endqty"] != "0") : ?>
                                                                <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("7 day", strtotime(date("Y-m-d"))))) :
                                                                    $ok = $ok + 1;
                                                                    $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                                                ?>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                    <th style="text-align:center;width: 4% "><?php echo $key["iditem"] ?></th>
                                                    <input type="hidden" name="iditem[]" value="<?php echo $key["iditem"] ?>">
                                                    <td style="text-align:center;width: 20%"><?php echo $key["nameitem"] ?></td>
                                                    <input type="hidden" name="nameitem[]" value="<?php echo $key["nameitem"] ?>">
                                                    <td style="text-align:center;width: 5% "><?php echo $key["sku"] ?></td>
                                                    <input type="hidden" name="sku[]" value="<?php echo $key["sku"] ?>">
                                                    <td style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" id="ticket_price-<?= $angka ?>" class="form-control bg-transparent" value="<?php echo $key["qtyactual"] ?>" readonly></td>
                                                    <input type="hidden" name="qtysystem[]" value="<?php echo $key["qtyactual"] ?>">
                                                    <?php if (isset($long)) { ?>
                                                        <?php foreach ($long as $keyx) : ?>
                                                            <?php if ($keyx->SKU == $key["sku"]) : ?>
                                                                <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" id="num-<?= $angka ?>" oninput="calc(this.value,<?= $angka ?>)" name="qtyactual[]" value="<?php echo $keyx->{'QTY Actual'} ?>" class="form-control bg-transparent" readonly></td>
                                                                <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" id="total-<?= $angka ?>" value="<?php echo $key["qtyactual"] -  $keyx->{'QTY Actual'} ?>" name="balancesystem[]" class="form-control bg-transparent" readonly></td>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    <?php } else { ?>
                                                        <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" id="num-<?= $angka ?>" oninput="calc(this.value,<?= $angka ?>)" name="qtyactual[]" value="<?php echo $key["qtyactual"] ?>" class="form-control bg-transparent" readonly></td>
                                                        <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" id="total-<?= $angka ?>" value="<?php echo $key["qtyactual"]  ?>" name="balancesystem[]" class="form-control bg-transparent" readonly></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php array_push($getdata, $key);
                                            endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php echo $pagination; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <?php if (isset($long)) { ?>
                                <button type="submit" class="btn btn-warning btn-lg" style="width: 10%;color: white;background: orange; float: right;" onclick="printdata()" type="button">Submit</button>
                            <?php } else { ?>
                                <button disabled class="btn btn-warning btn-lg" style="width: 10%;color: white;background: orange; float: right;" onclick="printdata()" type="button">Submit</button>
                            <?php } ?>
                            <!-- <button type="submit" class="btn btn-warning btn-lg" style="width: 10%;color: white;background: orange; float:right; margin-right:1%;">Save</button> -->
                        </div>
                    </form>
                    <form action="<?php echo base_url('Reporting/mailstockcardopname') ?>" method="post">
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
                </div>
            </center>
        </div>
    </div>
</div>
<!-- Modal UPLOAD EXCEL-->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File upload form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label for="exampleFormControlInput1" style="padding-left: 2.1rem;" class="form-label">Form Select file :</label>
                <form method='post' action="<?php echo base_url('CounterController/ImportExcel') ?>" style="margin-left: 1vw;margin-bottom: 1vh" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type='file' name='import' id="import" class='form-control border-0' accept=".xls,.xlsx">
                        <input type='button' class='btn btn-info' value='Upload'>
                    </div>
                </form>
                <!-- <a class="btn btn-outline-primary" style="margin-left: 1.7vw;" href="<?php echo base_url('assets/excel/Form Data Excel Opname.xlsx') ?>"> <i class="fa fa-print"></i> Download Form Excel</a> -->
                <!-- Preview-->
                <div id='preview'></div>
            </div>
        </div>
    </div>
</div>
<pre id="result"></pre>
<div class="excel" id="excel">
</div>
<div class="data" id="data">
    <table class="table table-striped table-hover">
        <thead style="background: purple">
            <tr>
                <th style="text-align:center;border:1px solid;background-color: yellow;" scope="col">ID Item</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;" scope="col">Nama Product</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;" scope="col">SKU</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;" scope="col">QTY System</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;" scope="col">QTY Actual</th>
            </tr>
        </thead>
        <tbody id="printt">
            <?php
            if ($data != "Not Found") : $a = 1;
                $getdata = array(); ?>
                <?php foreach ($data as $key) : ?>
                    <tr>
                        <?php $ok = 0;
                        $key["qtys"] = 0;
                        if ($key["data"] != "Not Found") :  ?>
                            <?php foreach ($key["data"] as $keyx) : ?>
                                <?php if ($keyx["endqty"] != "0") : ?>
                                    <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("7 day", strtotime(date("Y-m-d"))))) :
                                        $ok = $ok + 1;
                                        $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                    ?>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <th style="text-align:center;border:1px solid;" scope="row"><?php echo $key["iditem"] ?></th>
                        <td style="text-align:center;border:1px solid;"><?php echo $key["nameitem"] ?></td>
                        <td style="text-align:center;border:1px solid;"><?php echo $key["sku"] ?></td>
                        <td style="text-align:center;border:1px solid;"><?php echo $key["qtyactual"] ?></td>
                        <td style="text-align:center;border:1px solid;"></td>
                    </tr>
                <?php array_push($getdata, $key);
                endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<form action="<?php echo base_url('reporting/stockcardopname') ?>" method="POST" id="forms">
    <input type="hidden" name="long" id="long">
</form>

<div class="excel" id="excel">
</div>
<div cclass="data" id="datas" style="display: none">
    <center>
        <h1>Data Opname <?php echo date('Y-m-d') ?></h1>
    </center>
    <br><br><br>
    <table class="table">
        <thead style="background-color: orange;color: white">
            <tr>
                <th style="text-align:center;border:1px solid;" scope="col">#</th>
                <th style="text-align:center;border:1px solid;" scope="col">Nama Product</th>
                <th style="text-align:center;border:1px solid;" scope="col">SKU</th>
                <th style="text-align:center;border:1px solid;" scope="col">QTY System</th>
                <th style="text-align:center;border:1px solid;" scope="col">QTY Actuals</th>
                <th style="text-align:center;border:1px solid;" scope="col">Balance</th>
            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($data != "Not Found") : $a = 1;
                $getdata = array(); ?>
                <?php $angka = 0; ?>
                <?php foreach ($data as $key) : ?>
                    <?php $angka ?>
                    <tr>
                        <?php $ok = 0;
                        $key["qtys"] = 0;
                        if ($key["data"] != "Not Found") :  ?>
                            <?php foreach ($key["data"] as $keyx) : ?>
                                <?php if ($keyx["endqty"] != "0") : ?>
                                    <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("7 day", strtotime(date("Y-m-d"))))) :
                                        $ok = $ok + 1;
                                        $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                    ?>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <th style="text-align:center;width: 4%;border:1px solid;" scope="row"><?php echo $a++ ?></th>
                        <td style="text-align:center;width: 20%;border:1px solid;"><?php echo $key["nameitem"] ?></td>
                        <td style="text-align:center;width: 5%;border:1px solid; "><?php echo $key["sku"] ?></td>
                        <td style="text-align:center;width: 5%;border:1px solid; "><?php echo $key["qtyactual"] ?></td>
                        <?php if (isset($long)) { ?>
                            <?php foreach ($long as $keyx) : ?>
                                <?php if ($keyx->SKU == $key["sku"]) : ?>
                                    <td class="pl-5" style="text-align:center;width: 5%;border:1px solid; "><?php echo $keyx->{'QTY Actual'} ?></td>
                                    <td class="pl-5" style="text-align:center;width: 5%;border:1px solid; "><?php echo $key["qtyactual"] -  $keyx->{'QTY Actual'} ?></td>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php } else { ?>
                            <td class="pl-5" style="text-align:center;width: 5%;border:1px solid; "><?php echo $key["qtyactual"] ?>></td>
                            <td class="pl-5" style="text-align:center;width: 5%;border:1px solid; "><?php echo $key["qtyactual"]  ?></td>
                        <?php } ?>
                    </tr>
                <?php array_push($getdata, $key);
                endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $('#data').hide();

    function toggleTable() {
        var x = document.getElementById("hide");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

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
                            <td style="text-align:center;width: 20%">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["minstock"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                        </tr>`;
                bar += `<tr>
                        <th style="text-align:center;width: 4%;border:1px solid" scope="row">` + ix + `</th>
                            <td style="text-align:center;width: 20%";border:1px solid>` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["minstock"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["qtyactual"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["qtyactual"] + `</td>
                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                        </tr>`;
            } else if (data[i]["sku"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                ix = (ix + 1);
                baris += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>        
                            <td style="text-align:center;width: 20%">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["minstock"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                        </tr>`;
                bar += `<tr>
                        <th style="text-align:center;width: 4% " scope="row">` + ix + `</th>
                            <td style="text-align:center;width: 20%;border:1px solid">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["minstock"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qtyactual"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid ">` + data[i]["qtyactual"] + `</td>
                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                        </tr>`;
            }
        }
        $('#bodyx').html(baris);
        $('#prt').html(bar);
    }

    function printdata() {

        var wb = XLSX.utils.table_to_book(document.getElementById('datas'), {
            sheet: "Sheet name"
        })

        var wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            bookSST: true,
            type: 'binary'
        });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }

        saveAs(new Blob([s2ab(wbout)], {
            type: "application/octet-stream"
        }), 'Report Stock Opname.xlsx');

        // printdatax();
        if (confirm('Apakah Report Ingin Dicetak ?')) {
            setTimeout(function() {
                printdatax();
            }, 1000);
        }


    }

    function printdatax() {
        var printContents = document.getElementById('datas').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function calc(angka1, index) {
        var price = $('#ticket_price-' + index).val();
        var total = price - angka1;
        console.log(price + " " + angka1);
        $('#total-' + index).val(total);
    }

    // $("#btn_exportexcel").click(function(e) {

    //     let file = new Blob([$('.data').html()], {
    //         type: "application/vnd.ms-excel"
    //     });
    //     let url = URL.createObjectURL(file);
    //     let a = $("<a />", {
    //         href: url,
    //         download: "StockOpname.xls"
    //     }).appendTo("body").get(0).click();
    //     e.preventDefault();
    // });

    $('#btn_exportexcel').on('click', function() {
        var wb = XLSX.utils.table_to_book(document.getElementById('data'), {
            sheet: "Sheet name"
        })

        var wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            bookSST: true,
            type: 'binary'
        });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }

        saveAs(new Blob([s2ab(wbout)], {
            type: "application/octet-stream"
        }), 'StockOpname.xlsx');
    })

    $("#import").on("change", function(e) {
        var file = e.target.files[0];
        // input canceled, return
        if (!file) return;

        var FR = new FileReader();
        FR.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLS.read(data, {
                type: 'array'
            });
            var firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            // header: 1 instructs xlsx to create an 'array of arrays'
            var result = XLS.utils.sheet_to_json(firstSheet, {
                header: 2,
                blankRows: false
            });
            // data preview
            var output = document.getElementById('result');
            $('#long').val(window.btoa(unescape(encodeURIComponent(JSON.stringify(result, null, 2)))))
            $('#forms').submit()

            console.log(JSON.stringify(result, null, 2))
            output.innerHTML = JSON.stringify(result, null, 2);
        };
        FR.readAsArrayBuffer(file);
    });
</script>