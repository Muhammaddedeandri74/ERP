<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Sales Order / Invoice</p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">INVOICE</p>
</div>



<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php base_url('Salesinvoice/controler') ?>" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <p style="float: left; font-size: 25px; color: #3C2E8F "><b>List Invoice</b></p>
                                    <div class="input-group">
                                        <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                            <option class="slc" value="codeinv">No.Invoice</option>
                                            <option class="slc" value="nopesanan">No.Pesanan</option>
                                            <option class="slc" value="codeso">No.SO</option>
                                            <option class="slc" value="namecomm">Nama Customer</option>
                                        </select>
                                        <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari BerdasarkanFiler" id="valsearch" style="font-family:Arial, FontAwesome">
                                    </div>
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-3">
                                                    <p>Dari</p>
                                                    <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                                </div>
                                                <div class="col-3">
                                                    <p>Hingga</p>
                                                    <input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                                </div>
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p style="float: left;padding-left:0.6vw">Status</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="col">
                                                                <select name="status" class="form-select form-control" id="stat">
                                                                    <option value="" selected>Sort By Status</option>
                                                                    <option id="status" value="Unpaid">Unpaid</option>
                                                                    <option id="status" value="Paid">Paid</option>
                                                                    <option id="status" value="Paid Partial">Paid Partial</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 pt-3">
                                                            <div class="col input-group">
                                                                <!-- <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>&nbsp;
                                                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a> -->
                                                                <a href="<?php echo base_url('SalesinvoiceControler') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a> &nbsp;
                                                                <button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-2" style="margin-top: 24vh">
                                    <button disabled type="button" class="btn btn-outline-primary" id="konfirms" onclick="verify()"><i class="fa fa-check"></i> Proses All </button>
                                    <a class="btn btn-outline-success" style="float: right;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped table-hover">
                            <thead style="background-color: #3C2E8F;color: white">
                                <tr>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</th>
                                    <th>No. Invoice</th>
                                    <th>No. Pesanan</th>
                                    <th>No. SO</th>
                                    <th>Nama Customer</th>
                                    <th>Tanggal Invoice</th>
                                    <th>Total Pembayaran</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <form action="<?php echo base_url('SalesinvoiceControler/updatebycheck') ?>" method="POST" id="forms">
                                <tbody style="background-color: whtie" id="bodyxx">
                                    <?php if ($data != "Not Found") : $a = 1; ?>
                                        <?php foreach ($data as $key) : ?>
                                            <tr>
                                                <?php if ($key["status"] != "Paid") { ?>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" value="<?php echo $key["idinv"] ?>" id="check" name="check[]" onclick="checkdata()">
                                                        </div>
                                                    </td>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php } ?>
                                                <td><?php echo $key["codeinv"] ?></td>
                                                <td><?php echo $key["nopesanan"] ?></td>
                                                <td><?php echo $key["codeso"] ?></td>
                                                <td><?php echo $key["namecust"] ?></td>
                                                <td><?php echo $key["dateinv"] ?></td>
                                                <td><?php echo number_format($key["cash"] + $key["card"], 0, "", ",") ?></td>
                                                <td><?php echo number_format($key["totalinv"], 0, "", ",") ?></td>
                                                <td><?php echo $key["status"] ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idinv"] ?>)" class="btn btn-secondary">Update</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
                <form id="form" action="<?php echo base_url('SalesinvoiceControler/updateinvoice') ?>" method="POST">
                    <input type="hidden" name="idinv" id="idinv">
                </form>
            </center>
        </div>
    </div>
</div>
<div class="excel" id="excel">
</div>
<div style="padding-left: 6vw;" class="data" id="data">
    <table class="table table-striped table-hover">
        <thead class="text-white" style="background: purple">
            <tr>
                <th style="background: purple;border:solid;" scope="col">No. Invoice</th>
                <th style="background: purple;border:solid;" scope="col">No. Pesanan</th>
                <th style="background: purple;border:solid;" scope="col">No. SO</th>
                <th style="background: purple;border:solid;" scope="col">Nama Customer</th>
                <th style="background: purple;border:solid;" scope="col">Tanggal Invoice</th>
                <th style="background: purple;border:solid;" scope="col">Ongkir</th>
                <th style="background: purple;border:solid;" scope="col">Sub Total</th>
                <th style="background: purple;border:solid;" scope="col">Disc</th>
                <th style="background: purple;border:solid;" scope="col">Total Pembayaran</th>
                <th style="background: purple;border:solid;" scope="col">Total Transaksi</th>
                <th style="background: purple;border:solid;" scope="col">Status</th>
                <th style="background: purple;border:solid;" scope="col">Nama Barang</th>
                <th style="background: purple;border:solid;" scope="col">SKU</th>
                <th style="background: purple;border:solid;" scope="col">QTY</th>
                <th style="background: purple;border:solid;" scope="col">Harga Beli</th>
                <th style="background: purple;border:solid;" scope="col">Harga Satuan</th>
                <th style="background: purple;border:solid;" scope="col">VAT</th>
                <th style="background: purple;border:solid;" scope="col">Sub Total</th>
                <th style="background: purple;border:solid;" scope="col">Disc</th>
                <th style="background: purple;border:solid;" scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody class="table-striped table-hover" id="printr">
            <?php if ($data != "Not Found") : $a = 1 ?>
                <?php foreach ($data as $key) : ?>
                    <tr>
                        <td style="border:solid;"><b><?php echo $key["codeinv"] ?></b></td>
                        <td style="border:solid;"><b><?php echo $key["nopesanan"] ?></b></td>
                        <td style="border:solid;"><b><?php echo $key["codeso"] ?></b></td>
                        <td style="border:solid;"><b><?php echo $key["namecust"] ?></b></td>
                        <td style="border:solid;"><b><?php echo $key["dateinv"] ?></b></td>
                        <td style="border:solid;"><b><?php echo number_format($key["delivfee"], 0, "", ",") ?></b></td>
                        <td style="border:solid;"><b><?php echo number_format($key["subtotal"], 0, "", ",") ?></b></td>
                        <td style="border:solid;"><b><?php echo $key["discount"] ?></b></td>
                        <td style="border:solid;"><b><?php echo number_format($key["cash"] + $key["card"], 0, "", ",") ?></b></td>
                        <td style="border:solid;"><b><?php echo number_format($key["totalinv"], 0, "", ",") ?></b></td>
                        <?php if ($key["status"] == "Unpaid") { ?>
                            <td style="border:solid;"><b><?php echo $key["status"] ?></b></td>
                        <?php } else  if ($key["status"] == "Paid Partial") { ?>
                            <td style="border:solid;"><b><?php echo $key["status"] ?></b></td>
                        <?php } else { ?>
                            <td style="border:solid;"><b><?php echo $key["status"] ?></b></td>
                        <?php } ?>
                        <td colspan="9">
                            <table class="table">
                                <?php foreach ($key["data"] as $keyx) : ?>
                                    <tr style="border: 1px solid;">
                                        <td><?php echo $keyx["nameitem"] ?></td>
                                        <td><?php echo $keyx["sku"] ?></td>
                                        <td><?php echo $keyx["qty"] ?></td>
                                        <td><?php echo $keyx["pricebuyitem"] ?></td>
                                        <td><?php echo $keyx["priceitem"] ?></td>
                                        <td><?php echo $keyx["VAT"] ?></td>
                                        <td><?php echo $keyx["price"] ?></td>
                                        <td><?php echo $keyx["disc"] ?></td>
                                        <td><?php echo $keyx["totalprice"] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </td>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function clearsearch() {
        $('#valsearch').val("");
    }

    function kirimorder(x) {
        $('#idinv').val(x);
        $('#form').submit();
    }

    $('#data').hide();

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "invoice.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var z = 1;
        for (var i = 0; i < data.length; i++) {
            baris += `<tr>
               <th">`
            `</th>`;
            if (data[i]["status"] != "Paid") {
                baris += `<td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </td>`;
            } else {
                baris += `<td> </td>`
            }
            baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
            bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
            if (data[i]["status"] == "Unpaid") {
                bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
            } else if (data[i]["status"] == "Paid Partial") {
                bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
            } else {
                bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
            }
            bar += `<td colspan="9">
                            <table class="table">`;
            for (var a = 0; a < data[i]["data"].length; a++) {
                if (a % 2 == 0) {
                    bar += '<tr style="border: 1px solid;">';
                } else {
                    bar += '<tr style="border: 1px solid;">'
                }
                bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`

            }
            bar += `</table>
                        </td>`;
            bar += `
            <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            `;
        }
        $('#bodyxx').html(baris);
        $('#printr').html(bar);
    }

    function checkdata() {
        var ele = document.getElementsByName('check[]');
        var check = 0;
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                if (ele[i].checked == true) {
                    check++
                }

        }
        if (check > 0) {
            document.getElementById("konfirms").disabled = false;
        } else {
            document.getElementById("konfirms").disabled = true;
        }
    }

    function verify() {
        if (confirm("Apakah kamu yakin untuk confirm semua yang ditandai ?")) {
            $('#forms').submit();
        }
    }

    function apply() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var z = 1;
        if ($('#valsearch').val() != '' && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) {
                    baris += `<tr>
                                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>
                                <td>` + data[i]["status"] + `</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`;
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {
                    baris += `<tr>
                                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>
                                <td>` + data[i]["status"] + `</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`;
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
                    baris += `<tr>
                                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                                    <td>` + data[i]["nopesanan"] + `</td>
                                    <td>` + data[i]["codeso"] + `</td>
                                    <td>` + data[i]["namecust"] + `</td>
                                    <td>` + data[i]["dateinv"] + `</td>
                                    <td>` + data[i]["totalinv"] + `</td>
                                    <td>` + data[i]["status"] + `</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                    </td>
                                </tr>`;
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
                    baris += `<tr>
                                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>
                                <td>` + data[i]["status"] + `</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`;
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }
            }
        } else if ($('#valsearch').val() == '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    baris += `<tr>
                                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += ''
                        }
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }
            }
        } else if ($('#valsearch').val() == '' && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }
            }
        } else if ($('#valsearch').val() != '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }

            }
        } else if ($('#valsearch').val() == '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`

                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }
            }
        } else if ($('#valsearch').val() != '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    baris += `<tr>
                <th scope="row">` + z++ + `</th>`;
                    if (data[i]["status"] != "Paid") {
                        baris += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>`;
                    } else {
                        baris += `<td> </td>`
                    }
                    baris += `<td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`;
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discount"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }

                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        if (a % 2 == 0) {
                            bar += '<tr style="border: 1px solid;">';
                        } else {
                            bar += '<tr style="border: 1px solid;">'
                        }
                        bar += `
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>
                    </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }

            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return
        }

        $('#bodyxx').html(baris);
        $('#printr').html(bar);
    }

    function detail(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = '';
        var bar = '';
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idinv"] == x) {
                if (data[i]['idinv'] != "") {
                    $('#nopes').html('No. SO ' + data[i]["codeso"])
                } else {
                    $('#nopes').html('No. SO' + data[i]["codeso"]);
                }
                $('#types').html(data[i]["codeinv"]);
                $('#status').html(data[i]["statusorder"]);
                $('#napes').html(data[i]["namecust"]);
                for (var a = 0; a < data[i]["data"].length; a++) {
                    baris += `<tr>
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + data[i]["data"][a]["qty"] + `</td>
                                <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                <td >` + data[i]["data"][a]["VAT"] + `</td>
                                <td >` + data[i]["data"][a]["price"] + `</td>
                                <td >` + data[i]["data"][a]["disc"] + `</td>
                                <td >` + data[i]["data"][a]["totalprice"] + `</td>
                            </tr>`
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["delivfee"] + `</td>
                                <td>` + data[i]["subtotal"] + `</td>
                                <td>` + data[i]["discount"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>`;
                    if (data[i]["status"] == "Unpaid") {
                        bar += `<td style="background-color: red;color: white;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else if (data[i]["status"] == "Paid Partial") {
                        bar += `<td style="background-color: yellow;font-size: 16px;">` + data[i]["status"] + `</td>`
                    } else {
                        bar += `<td style="background-color: green;color: white;font-size: 16px">` + data[i]["status"] + `</td>`
                    }
                    bar += `<td colspan="9">
                            <table class="table">`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: 1px solid;">
                                    <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                    <td >` + data[i]["data"][a]["sku"] + `</td>
                                    <td >` + data[i]["data"][a]["qty"] + `</td>
                                    <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                    <td >` + data[i]["data"][a]["priceitem"] + `</td>
                                    <td >` + data[i]["data"][a]["VAT"] + `</td>
                                    <td >` + data[i]["data"][a]["price"] + `</td>
                                    <td >` + data[i]["data"][a]["disc"] + `</td>
                                    <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                </tr>`
                    }
                    bar += `</table>
                        </td>`;
                    bar += `<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                }
                $('#body').html(baris);
                $('#printr').html(baris);
                console.log(baris);
            }
        }
    }
</script>