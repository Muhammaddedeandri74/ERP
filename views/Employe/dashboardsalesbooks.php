<style>
    .tu {
        text-transform: uppercase;
        color: white;
    }

    .tp {
        text-transform: uppercase;
        font-size: 25px;
        color: purple;
    }

    .fw {
        font-weight: bold;
    }

    .fn {
        font-weight: normal;
    }

    .cn {
        text-align: center;
    }

    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }

    .tb {
        text-transform: uppercase;
    }

    .lhfb {
        line-height: 0.8rem;
        font-size: 30px;
    }

    .brl {
        border: 2px solid white;
        margin-left: 2vw;
    }

    .bay {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .ba {
        border-radius: 10px;
    }

    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }

    .table {
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
    }

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">SALES Management / Sales Book</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">Sales Book</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('Employe/salesbook') ?>" class="btn fw tb btn-transparent">Sales Order</a>
                    <a href="<?= base_url('Employe/salesbooks') ?>" class="btn fw tb bay btn-light">Invoice</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <form action="<?php echo base_url('Employe/salesbooks') ?>" method="post">
                        <div class="row pt-4 d-flex justify-content-between">
                            <div class="col-6" style="margin-left: 1vw;">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codeinv">No. Invoice</option>
                                        <option class="slc" value="nopesanan">No. Pesanan</option>
                                        <option class="slc" value="codeso">No. SO</option>
                                        <option class="slc" value="namecomm">Nama Customer</option>
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari BerdasarkanFiler" id="valsearch" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-3">
                                                <p>Dari</p>
                                                <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p>Hingga</p>
                                                <input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
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
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p><br></p>
                                                <a style="text-decoration: none;" class=" btn btn-outline-danger" href="<?php echo base_url('Employe/salesbooks') ?>">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                            <!-- <div class="col-1 pt-4 d-flex justify-content-between">
                                            <a style="text-decoration: none;color: purple;cursor: pointer;" class="pr-2" onclick="reset()">Reset</a>
                                        </div>
                                        <div class="col-2 pt-3">
                                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                        </div> -->
                                            <!-- <div class="col-12 pt-3">
                                            <div class="col input-group">
                                                <button class="btn btn-outline-danger" type="button" onclick="reset()">Reset</button>
                                                <button class="btn btn-outline-primary ml-2" type="button" onclick="apply()">Apply</button>
                                            </div>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-3" style="margin-top: 11vh">
                                <a class="btn btn-outline-success" style="float: right;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="text-white" style="background-color: #3C2E8F;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Invoice</th>
                                <th>No.Pesanan</th>
                                <th scope="col">No. SO</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Tanggal Invoice</th>
                                <th scope="col">Total Transaksi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: whtie" id="bodyxx">
                            <?php if ($data != "Not Found") : $a = 1;
                                $grandtotal = 0; ?>
                                <?php foreach ($data as $key) : $grandtotal = $grandtotal +  $key["totalinv"] ?>
                                    <tr>
                                        <th scope="row"><?php echo $a++ ?></th>
                                        <td><?php echo $key["codeinv"] ?></td>
                                        <td><?php echo $key["nopesanan"] ?></td>
                                        <td><?php echo $key["codeso"] ?></td>
                                        <td><?php echo $key["namecust"] ?></td>
                                        <td><?php echo $key["dateinv"] ?></td>
                                        <td><?php echo number_format($key["totalinv"], 0, "", ",") ?></td>
                                        <td><?php echo $key["status"] ?></td>
                                        <td><a data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idinv'] ?>)" style="cursor: pointer;" class="btn btn-secondary">Detail </a></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="border: solid">
                                    <td colspan="6">Total Amount</td>
                                    <td colspan="3"><?php echo $grandtotal ?></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <!--Tampilkan pagination-->
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="excel" id="excel">
</div>
<div style="padding-left: 6vw; display: none" class="data" id="data">
    <table class="table table-striped table-hover">
        <thead class="text-white" style="background: purple">
            <tr style="border: solid;">
                <th style="background: purple;color: white" scope="col">No. Invoice</th>
                <th style="background: purple;color: white" scope="col">No. Pesanan</th>
                <th style="background: purple;color: white" scope="col">No. SO</th>
                <th style="background: purple;color: white" scope="col">Nama Customer</th>
                <th style="background: purple;color: white" scope="col">Tanggal Invoice</th>
                <th style="background: purple;color: white" scope="col">Ongkir</th>
                <th style="background: purple;color: white" scope="col">Sub Total</th>
                <th style="background: purple;color: white" scope="col">Disc</th>
                <th style="background: purple;color: white" scope="col">Total Transaksi</th>
                <th style="background: purple;color: white" scope="col">Status</th>
                <th style="color: white;background: #3C2E8F" scope="col">Nama Barang</th>
                <th style="color: white;background: #3C2E8F" scope="col">SKU</th>
                <th style="color: white;background: #3C2E8F" scope="col">QTY</th>
                <th style="color: white;background: #3C2E8F" scope="col">Harga Beli</th>
                <th style="color: white;background: #3C2E8F" scope="col">Harga Satuan</th>
                <th style="color: white;background: #3C2E8F" scope="col">VAT</th>
                <th style="color: white;background: #3C2E8F" scope="col">Sub Total</th>
                <th style="color: white;background: #3C2E8F" scope="col">Disc</th>
                <th style="color: white;background: #3C2E8F" scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody class="table-striped table-hover" id="printr">
            <?php if ($data != "Not Found") : $a = 0 ?>
                <?php foreach ($data as $key) : ?>
                    <tr style="border: 1px solid;">
                        <td style="font-size: 16px;"><b><?php echo $key["codeinv"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["nopesanan"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["codeso"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["namecust"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["dateinv"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["delivfee"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo number_format($key["subtotal"], 0, "", ",") ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo $key["discrp"] ?></b></td>
                        <td style="font-size: 16px;"><b><?php echo number_format($key["totalinv"], 0, "", ",") ?></b></td>
                        <?php if ($key["status"] == "Unpaid") { ?>
                            <td style="background-color: red;color: white;font-size: 16px;"><b><?php echo $key["status"] ?></b></td>
                        <?php } else  if ($key["status"] == "Paid Partial") { ?>
                            <td style="background-color: yellow;font-size: 16px;"><b><?php echo $key["status"] ?></b></td>
                        <?php } else { ?>
                            <td style="background-color: green;color: white;font-size: 16px"><b><?php echo $key["status"] ?></b></td>
                        <?php } ?>

                        <td colspan="9">
                            <table class="table">
                                <?php foreach ($key["data"] as $keyx) : ?>
                                    <tr style="border: 1px solid;">
                                        <td><?php echo $keyx["nameitem"] ?></td>
                                        <td><?php echo $keyx["sku"] ?></td>
                                        <td><?php echo $keyx["qty"] ?></td>
                                        <td><?php echo $keyx["pricebuyitem"] ?></td>
                                        <td><?php echo number_format($keyx["priceitem"], 0, "", ",") ?></td>
                                        <td><?php echo $keyx["VAT"] ?></td>
                                        <td><?php echo number_format($keyx["price"], 0, "", ",") ?></td>
                                        <td><?php echo $keyx["disc"] ?></td>
                                        <td><?php echo number_format($keyx["totalprice"], 0, "", ",") ?></td>
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

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user ml-0" style="width:100%" method="post" action="">
                <div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Sales Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl ml-5">
                        <div class=" card border-0">
                            <div class="row d-flex justify-content-between">
                                <div class="col-10"> </div>
                                <div class="col-2">
                                    <a onclick="printdata()" class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                    <!-- <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                            <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                                </div>
                            </div>
                            <div class="card-body " id="cards">
                                <div class="card bay" width="100%" id="header">
                                    <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10">
                                                <p class="fw" id="nopes">No. Invoice 123123rr<br>
                                                    <span class="fn" id="types">Sl22</span>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw">Nama Customer<br>
                                                    <span style="color: #3C2E8F" class="fn" id="napes">PT. Untung Jaya</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                        <span style="color: #3C2E8F" class="fn" id="date">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
                                                        <span style="color: #3C2E8F" class="fn" id="jasa">Jasa</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Total Transaksi<br>
                                                        <span style="color: #3C2E8F" class="fn" id="fee">X product</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Total Terbayar<br>
                                                        <span style="color: #3C2E8F" class="fn" id="bt">Shopee</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Total Kekurangan<br>
                                                        <span style="color: #3C2E8F" class="fn" id="bk">Shopee</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4" id="dataitem">
                                    <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                    <table class="table cn">
                                        <thead style="background-color: grey;color: white">
                                            <tr>
                                                <th style="color: white;" scope="col">Nama Barang</th>
                                                <th style="color: white;" scope="col">SKU</th>
                                                <th style="color: white;" scope="col">QTY</th>
                                                <th style="color: white;" scope="col">Harga Beli</th>
                                                <th style="color: white;" scope="col">Harga Satuan</th>
                                                <th style="color: white;" scope="col">VAT</th>
                                                <th style="color: white;" scope="col">Sub Total</th>
                                                <th style="color: white;" scope="col">Disc</th>
                                                <th style="color: white;" scope="col">Total Harga</th>
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

<script type="text/javascript">
    // $('#data').hide();

    function clearsearch() {
        $('#valsearch').val("");
    }

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

    function printdata() {
        var printContents = document.getElementById("cards").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function reset() {

        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var grandtotal = 0;
        var z = 1;
        for (var i = 0; i < data.length; i++) {
            baris += `<tr>
                    <th scope="row">` + z++ + `</th>
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["totalinv"] + `</td>
                    <td>` + data[i]["status"] + `</td>
                    <td>
                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                    </td>
                </tr>`
            grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
            bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                    </tr>`;
        }
        baris += `<tr style="border: solid">
                    <td colspan="6">Total Amount</td>
                    <td colspan="3">` + grandtotal + `</td>
                </tr>`
        $('#bodyxx').html(baris);
        $('#printr').html(bar);
    }

    function apply() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var grandtotal = 0;
        var z = 1;
        if ($('#valsearch').val() != '' && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {

            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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

            }

        } else if ($('#valsearch').val() == '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);

                    baris += `
                    <tr>
                            <th scope="row">` + z++ + `</th>
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>
                                <td>` + data[i]["status"] + `</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
            }
        } else if ($('#valsearch').val() == '' && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                        <th scope="row">` + z++ + `</th>
                            <td>` + data[i]["codeinv"] + `</td>
                            <td>` + data[i]["nopesanan"] + `</td>
                            <td>` + data[i]["codeso"] + `</td>
                            <td>` + data[i]["namecust"] + `</td>
                            <td>` + data[i]["dateinv"] + `</td>
                            <td>` + data[i]["totalinv"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
            }
        } else if ($('#valsearch').val() != '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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

            }
        } else if ($('#valsearch').val() == '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    baris += `
                    <tr>
                            <th scope="row">` + z++ + `</th>
                                <td>` + data[i]["codeinv"] + `</td>
                                <td>` + data[i]["nopesanan"] + `</td>
                                <td>` + data[i]["codeso"] + `</td>
                                <td>` + data[i]["namecust"] + `</td>
                                <td>` + data[i]["dateinv"] + `</td>
                                <td>` + data[i]["totalinv"] + `</td>
                                <td>` + data[i]["status"] + `</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
            }
        } else if ($('#valsearch').val() != '' && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["codeinv"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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
                } else if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["dateinv"] >= $('#date1').val() && data[i]["dateinv"] <= $('#date2').val() && data[i]["status"] == $('#stat').val()) {
                    grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "">'
                    }
                    baris += `
                    <th scope="row">` + z++ + `</th>
                        <td>` + data[i]["codeinv"] + `</td>
                        <td>` + data[i]["nopesanan"] + `</td>
                        <td>` + data[i]["codeso"] + `</td>
                        <td>` + data[i]["namecust"] + `</td>
                        <td>` + data[i]["dateinv"] + `</td>
                        <td>` + data[i]["totalinv"] + `</td>
                        <td>` + data[i]["status"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(` + data[i]["idinv"] + `)">Update <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                    bar += `
                <tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                    <td>` + data[i]["codeinv"] + `</td>
                    <td>` + data[i]["nopesanan"] + `</td>
                    <td>` + data[i]["codeso"] + `</td>
                    <td>` + data[i]["namecust"] + `</td>
                    <td>` + data[i]["dateinv"] + `</td>
                    <td>` + data[i]["delivfee"] + `</td>
                    <td>` + data[i]["subtotal"] + `</td>
                    <td>` + data[i]["discrp"] + `</td>
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

            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return
        }
        baris += `   <tr style="border: solid">
                                    <td colspan="6">Total Amount</td>
                                    <td colspan="3">` + grandtotal + `</td>
                                </tr>`

        $('#bodyxx').html(baris);
        $('#printr').html(bar);
    }

    function detail(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = '';
        var grandtotal = 0;
        var bar = '';
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idinv"] == x) {
                grandtotal = Number(grandtotal) + Number(data[i]["totalinv"]);
                if (data[i]['idinv'] != "") {
                    $('#nopes').html('No. SO ' + data[i]["codeso"])
                } else {
                    $('#nopes').html('No. SO' + data[i]["codeso"]);
                }
                $('#types').html(data[i]["codeinv"]);
                $('#status').html(data[i]["statusorder"]);
                $('#napes').html(data[i]["namecust"]);
                $('#date').html(data[i]["dateinv"]);
                $('#jasa').html(data[i]["jasapengirim"]);
                $('#fee').html(data[i]["totalinv"]);
                $('#bt').html(data[i]["totalinv"] - data[i]["balace"]);
                $('#bk').html(data[i]["balace"]);
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
                            </tr>
                    </tr>`
                    bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
                            <td>` + data[i]["codeinv"] + `</td>
                            <td>` + data[i]["nopesanan"] + `</td>
                            <td>` + data[i]["codeso"] + `</td>
                            <td>` + data[i]["namecust"] + `</td>
                            <td>` + data[i]["dateinv"] + `</td>
                            <td>` + data[i]["delivfee"] + `</td>
                            <td>` + data[i]["subtotal"] + `</td>
                            <td>` + data[i]["discrp"] + `</td>
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

                baris += `   <tr style="border: solid">
                                    <td colspan="6">Total Amount</td>
                                    <td colspan="3">` + grandtotal + `</td>
                                </tr>`
                $('#body').html(baris);
                $('#printr').html(baris);
            }
        }
    }

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
</script>