<style type="text/css">
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

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>

<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Gudang Utama / Report </p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">Report Ingoing </p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/reportingoing') ?>" class="btn bay fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('InOut/reportoutgoing') ?>" class="btn fw btn-transparent">OUTGOING</a>
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
                    <form action="<?php echo base_url('InOut/reportingoing') ?>" method="post">
                        <div class="row d-flex justify-content-between">
                            <div class="col-3">
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-6">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codein">Trans NO</option>
                                        <option class="slc" value="nosuratjalan">No. Surat Jalan</option>
                                        <option class="slc" value="noinvoice">No. Invoice</option>
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Trans No dan Lainnya" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p style="text-align :left">Dari</p>
                                                <input name="date1" placeholder="Pilih Tanggal" value="<?= set_value('date1') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p style="text-align :left">Hingga</p>
                                                <input name="date2" placeholder="Pilih Tanggal" value="<?= set_value('date2') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
                                                <p><br></p>
                                                <a href="<?php echo base_url('InOut/reportingoing') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
                                                <button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                            <!-- <div class="col-2 pt-3 ">
											<a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
										</div>
										<div class="col-2 pt-3">
											<a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
										</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-2" style="margin-top: 13vh">
                                <a class="btn btn-outline-success" style="margin-left: 6vw;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>

                        <!-- <div class="row pt-4">
                        <div class="col-6 pt-2 pl-3">
                            <div class="input-group">
                                <select class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example">
                                    <option class="slc" value="1">Trans NO</option>
                                    <option class="slc" value="2">Order NO</option>
                                    <option class="slc" value="2">Supplier</option>
                                    <option class="slc" value="2">Deskripsi</option>
                                    <option class="slc" value="2">No. Surat Jalan</option>
                                    <option class="slc" value="2">No. Invoice</option>
                                    <option class="slc" value="2">Issue By</option>
                                </select>
                                <input type="text" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" oninput="searchx(this.value)" style="font-family:Arial, FontAwesome">
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2">

                        </div>
                    </div> -->
                    </form>
                </div>
                <div class="card-body">
                    <table class="table cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th>NO </th>
                                <th>Trans NO</th>
                                <th>Order NO</th>
                                <th>Trans Date</th>
                                <th>Supplier</th>
                                <th>Item Count</th>
                                <th>Deskripsi</th>
                                <th>No. Surat Jalan</th>
                                <th>No. Invoice</th>
                                <th>Issue By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="xdetail">
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
                <div class="excel" id="excel">
                </div>
                <div class="data" id="data">
                    <table class="table cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">NO </th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Trans NO</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Order NO</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Trans Date</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Supplier</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Item Count</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Deskripsi</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">No. Surat Jalan</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">No. Invoice</th>
                                <th style="border-style:solid;background-color: #3C2E8F;color: white">Issue By</th>
                            </tr>
                        </thead>
                        <tbody id="baris">
                            <?php if ($data != "Not Found") : $a = 1 ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <td style="border: solid;"><?php echo $a++; ?></td>
                                        <td style="border: solid;"><?php echo $key["codein"] ?></td>
                                        <td style="border: solid;"><?php echo $key["codepo"] ?></td>
                                        <td style="border: solid;"><?php echo $key["datein"] ?></td>
                                        <td style="border: solid;"><?php echo $key["namesupp"] ?></td>
                                        <td style="border: solid;">1</td>
                                        <td style="border: solid;"><?php echo $key["descinfo"] ?></td>
                                        <td style="border: solid;"><?php echo $key["nosuratjalan"] ?></td>
                                        <td style="border: solid;"><?php echo $key["noinvoice"] ?></td>
                                        <td style="border: solid;"><?php echo $key["nameuser"] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5"> </div>
                                    <div class="col-12">
                                        <a class="btn" onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
                                        <!-- <a class="btn" id="btnExport"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn" id="cmd" onclick="pdf()"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
                                        <a class="btn" id="update"><i class="fa fa-refresh"></i> Update Data</a>
                                        <a class="btn" id="del"><i class="fa fa-trash"></i> Cancel Sales Order</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body " id="cards">
                                <div class="card bay" width="100%" id="header">
                                    <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10">
                                                <p class="fw" id="nopes">No. Pesanan 123123rr<br>
                                                    <span class="fn" id="types">Sl22</span>
                                                </p>
                                            </div>
                                            <!-- <div class="col-2">
                                                <p class="badge bg-warning text-dark" id="status">Outstanding</p>
                                            </div> -->
                                            <div class="col-12">
                                                <p class="fw">Nama Supplier<br>
                                                    <span style="color: #3C2E8F" class="fn" id="napes">PT. Untung Jaya</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Deskripsi<br>
                                                        <span style="color: #3C2E8F" class="fn" id="desc">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Trans Date <br>
                                                        <span style="color: #3C2E8F" class="fn" id="date">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Surat Jalan<br>
                                                        <span style="color: #3C2E8F" class="fn" id="sj">X product</span>
                                                    </p>
                                                </div>
                                                <!-- <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn" id="tyso">Shopee</span>
                                                    </p>
                                                </div>
                                                <div style="width: 30%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                        <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                    </p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4" id="dataitem">
                                    <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                    <table class="table cn">
                                        <thead style="background-color: grey;color: white">
                                            <tr>
                                                <th scope="col">Name Item</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Harga Beli</th>
                                                <th scope="col">Qty</th>
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

<script language="javascript">
    $('#data').hide();

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["codein"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nosuratjalan"].toLowerCase().includes(x.toLowerCase())) || (data[i]["noinvoice"].toLowerCase().includes(x.toLowerCase()))) {
                x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codein"] + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["datein"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                baris += '<td>' + data[i]["noinvoice"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '<td style="cursor: pointer;"><a style="color:white" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '" class="btn btn-secondary">Detail</i></a></td>';
                baris += '</tr>';
            }
        }

        $('#xdetail').html(baris);
    }

    function apply(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var ix = 0;
        var x1 = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codein"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 5) {
                    if (data[i]["nosuratjalan"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 6) {
                    if (data[i]["noinvoice"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 7) {
                    if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                }

            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datein"] >= $('#date1').val() && data[i]["datein"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codein"] + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["datein"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                    baris += '<td>' + data[i]["noinvoice"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codein"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 5) {
                    if (data[i]["nosuratjalan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 6) {
                    if (data[i]["noinvoice"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 7) {
                    if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codein"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["datein"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                        baris += '<td>' + data[i]["noinvoice"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                        baris += '</tr>';
                    }
                }
            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return;
        }

        $('#xdetail').html(baris);
        console.log($('#valsearch').val())
        console.log($('#date1').val())
        console.log($('#date2').val())
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["itemin"] == "1") {
                x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codein"] + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["datein"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["nosuratjalan"] + '</td>';
                baris += '<td>' + data[i]["noinvoice"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
                baris += '</tr>';


            }
            $('#xdetail').html(baris);
        }

    }

    function detail(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = '';
        for (var i = 0; i < data; i++) {
            if (data[i]["idin"] == x) {
                if (data[i]['idin'] != "") {
                    $('#nopes').html('Order NO ' + data[i]["codepo"])
                } else {
                    $('#nopes').html('Order NO' + data[i]["codepo"]);
                }
                $('#types').html(data[i]["codeinv"]);
                $('#status').html(data[i]["statusorder"]);
                $('#napes').html(data[i]["namesupp"]);
                $('#desc').html(data[i]["descinfo"]);
                $('#date').html(data[i]["datein"]);
                $('#sj').html(data[i]["nosuratjalan"]);

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('InOut/getdataingoingdetail') ?>",
                    data: "hasil=" + x,
                    dataType: "json",
                    success: function(hasil) {
                        console.log(hasil);
                        for (let a = 0; a < hasil.length; a++) {

                            baris += `
                            <tr>
                                                <td>` + hasil[a]['nameitem'] + `</td>
                                                <td>` + hasil[a]['sku'] + `</td>
                                                <td>` + hasil[a]['price'] + `</td>
                                                <td>` + hasil[a]['qty'].replace('.0000', '') + `</td>
                                            </tr>
                            `;

                        }
                        $('#body').html(baris);
                    }
                });

            }
        }
    }

    function printdata() {
        var printContents = document.getElementById("cards").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Reportingoing.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    searchx('');
    $('').on("click", function(e) {
        e.preventDefault();
    });
</script>