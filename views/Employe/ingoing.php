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

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>
<?php
$status = array('Received', 'Waiting');
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Counter / Ingoing - Outgoing</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">COUNTER</p>
</div>
<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('CounterController/inout') ?>" class="btn fw btn-transparent">Order Processing</a>
                    <a href="<?= base_url('CounterController/outgoing') ?>" class="btn fw btn-transparent">OUTGOING</a>
                    <a href="<?= base_url('CounterController/ingoing') ?>" class="btn fw bay btn-light">INGOING</a>
                    <a href="<?= base_url('CounterController/return') ?>" class="btn fw btn-transparent">RETURN</a>
                    <!-- <a href="<?= base_url('CounterController/stockopname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a> -->
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <form action="<?php echo base_url('CounterController/ingoing') ?>" method="post">
                        <?php
                        $a = 0;
                        if ($data != "Not Found") {
                            $a = count($data);
                        }
                        ?>
                        <p style="font-size: 18px;">Total Berkas : <?php echo $a ?> berkas </p>
                        <div class="row pt-4">
                            <div class="col-6 pt-2 pl-3">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codemove">No. Ingoing</option>
                                        <option class="slc" value="descinfo">Deskripsi</option>
                                    </select>
                                    <input type="text" name="search" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No. Ingoing dan lainnya" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p style="text-align :left">Dari</p>
                                                <input name="date1" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p style="text-align :left">Hingga</p>
                                                <input name="date2" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
                                                <p>Sorting</p>
                                                <select name="status" class="form-control py-2 " style="cursor: pointer;" aria-label="Default select example" id="stat">
                                                    <option selected value="">Sort By Status</option>
                                                    <?php foreach (array_unique($status) as $key) : ?>
                                                        <?php if ($key != "Pending") : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $key ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <p><br></p>
                                                <a href="<?php echo base_url('CounterController/ingoing') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                            <!-- <div class="col-1 pt-3 ">
                                                <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                            </div>
                                            <div class="col-2 pt-3">
                                                <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2"></div>
                            <div class="col-2">
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover cn">
                        <thead style="background-color: orange;color: white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Ingoing</th>
                                <th scope="col">Tipe. IN</th>
                                <th scope="col">Qty. Items</th>
                                <th scope="col">Tgl. Order</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Gudang Pengirim</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: whtie">
                            <?php $i = 1;
                            if ($data != "Not Found") : $a = 0; ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?php echo $key["codemove"] ?></td>
                                        <?php if ($key["norequest"] == "" || $key["norequest"] == "") { ?>
                                            <td>Move In</td>
                                        <?php } else { ?>
                                            <td>Request</td>
                                        <?php } ?>
                                        <td><?php echo $key["itemmove"] ?></td>
                                        <td><?php echo $key["datemove"] ?></td>
                                        <td><?php echo $key["descinfo"] ?></td>

                                        <td><?php echo $key["namecomm"] ?></td>
                                        <td><?php echo $key["status"] ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idmove"] ?>)" class="btn btn-warning">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('CounterController/konfirmso') ?>">
                <div class="modal-header" style="background-color : orange; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Data Ingoing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl ml-5">
                        <div class=" card border-0">
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-10"> </div>
                                    <div class="col-2">
                                        <a onclick="printdata()" class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                        <!-- <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="cards">
                                <div class="card-body">
                                    <div class="card bay" width="100%" id="header">
                                        <div class="card-header border-0 bg-white">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-10">
                                                    <p class="fw">No. Request 123123rr<br>
                                                        <span class="fn">Sl22</span>
                                                    </p>
                                                </div>
                                                <div class="col-2">
                                                    <p class="badge bg-warning text-dark">Outstanding</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="fw">Nama Pesanan<br>
                                                        <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between" style="width: 100%;">
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3">Alamat<br>
                                                            <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                            <span style="color: #3C2E8F" class="fn">Tanggal</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                            <span style="color: #3C2E8F" class="fn">X product</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                            <span style="color: #3C2E8F" class="fn">Shopee</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 30%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                            <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4" id="dataitem">
                                        <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                        <table class="table cn">
                                            <thead style="background-color: orange;color: white">
                                                <tr>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Ready Stock</th>
                                                    <th scope="col">Qty. Order</th>
                                                    <th scope="col">Balance</th>
                                                    <!-- <th scope="col">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: whtie">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="footer">
                        <button type="button" class="btn btn-warning text-white">Confirm</button>
                    </div>
            </form>
        </div>
    </div>
    </form>
</div>

<script type="text/javascript">
    function apply(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 0;
        var a = 1;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) {
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += `<td>` + data[i]["codemove"] + `</td>`
                    if (data[i]["norequest"] == null) {
                        baris += `  <td>Move In</td>`
                    } else {
                        baris += `<td>Request</td>`
                    }
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                    baris += '</tr>';
                } else {
                    console.log("NOT FOUND")
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                console.log($('#stat').val() == 1);
                if (data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += `<td>` + data[i]["codemove"] + `</td>`
                    if (data[i]["norequest"] == null) {
                        baris += `  <td>Move In</td>`
                    } else {
                        baris += `<td>Request</td>`
                    }
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += `<td>` + data[i]["codemove"] + `</td>`
                    if (data[i]["norequest"] == null) {
                        baris += `  <td>Move In</td>`
                    } else {
                        baris += `<td>Request</td>`
                    }
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                    baris += '</tr>';
                } else {
                    console.log("NOT FOUND")
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += `<td>` + data[i]["codemove"] + `</td>`
                        if (data[i]["norequest"] == null) {
                            baris += `  <td>Move In</td>`
                        } else {
                            baris += `<td>Request</td>`
                        }
                        baris += '<td>' + data[i]["qtymove"] + '</td>';
                        baris += '<td>' + data[i]["datemove"] + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["namecomm"] + '</td>';
                        baris += '<td>' + data[i]["status"] + '</td>';
                        baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() == "" && $('#stat').val() == "") {
            alert("Masukan Tanggal Akhir")
            return;
        } else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() != "" && $('#stat').val() == "") {
            alert("Masukan Tanggal Awal")
            return;
        } else {
            alert("Masukan Filter Dengan Benar")
            return;
        }

        $('#bodyxx').html(baris);
    }

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var ix = 0;
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["codemove"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1)) {
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += `<td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Move In</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += '<td>' + data[i]["qtymove"] + '</td>';
                baris += '<td>' + data[i]["datemove"] + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["namecomm"] + '</td>';
                baris += '<td>' + data[i]["status"] + '</td>';
                baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                baris += '</tr>';
            } else if ((data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2)) {
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += `<td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Move In</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += '<td>' + data[i]["qtymove"] + '</td>';
                baris += '<td>' + data[i]["datemove"] + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["namecomm"] + '</td>';
                baris += '<td>' + data[i]["status"] + '</td>';
                baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                baris += '</tr>';
            } else if ((data[i]["namecomm"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3)) {
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += `<td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Move In</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += '<td>' + data[i]["qtymove"] + '</td>';
                baris += '<td>' + data[i]["datemove"] + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["namecomm"] + '</td>';
                baris += '<td>' + data[i]["status"] + '</td>';
                baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
                baris += '</tr>';
            }
        }
        $('#bodyxx').html(baris);
    }
    searchx('');
    $('form button').on("a", function(e) {
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
        var ix = 0;
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            ix = (ix + 1);
            baris += '<tr>';
            baris += '<td>' + ix + '</td>';
            baris += `<td>` + data[i]["codemove"] + `</td>`
            if (data[i]["norequest"] == null) {
                baris += `  <td>Move In</td>`
            } else {
                baris += `<td>Request</td>`
            }
            baris += '<td>' + data[i]["qtymove"] + '</td>';
            baris += '<td>' + data[i]["datemove"] + '</td>';
            baris += '<td>' + data[i]["descinfo"] + '</td>';
            baris += '<td>' + data[i]["namecomm"] + '</td>';
            baris += '<td>' + data[i]["status"] + '</td>';
            baris += '<td>  <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idmove"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>';
            baris += '</tr>';
        }
        $('#bodyxx').html(baris);
    }

    function konfirmorder(x) {

        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idmove"] == x) {

                var idrequest = 0;
                if (data[i]["norequest"] != null) {
                    idrequest = data[i]["norequest"];
                }

                console.log(data[i]["idmove"] + " " + x);
                if (data[i]["status"] != "Waiting") {
                    $('#footer').hide();
                } else {
                    $('#footer').show();
                }

                $('#footer').html('<a href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=counter&xxx=' + idrequest + '" class="btn btn-warning text-white"><i class="fa fa-pencil"> Confirm</i></a>')

                // console.log(data[i])
                var baris = `
                                <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10" >`;

                if (data[i]["nopesanan"] == null) {
                    baris += ` <p class="fw">No. Ingoing ` + data[i]["codemove"] + `<br>
                                                            
                                                        </p>`
                } else {
                    baris += `
                                                         <p class="fw">No. Ingoing ` + data[i]["codemove"] + `<br>
                                                            
                                                        </p>
                                                     `
                }

                baris += `</div>
                                         <input type="hidden" name="idso" value="` + data[i]["idmove"] + `">
                                           
                                            <div class="col-12">
                                                <p class="fw">Tanggal Ingoing<br>
                                                    <span style="color: #3C2E8F" class="fn">` + data[i]["datemove"] + `</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Warehouse Pengirim<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["namecomm"] + `</span>
                                                    </p>
                                                </div>
                                               
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["qtymove"] + ` Product</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `;

                var barisx = `
                                         <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                        <table class="table cn">
                                            <thead style="background-color: orange;color: white">
                                                <tr>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Exp Date</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: whtie">`;
                for (var x = 0; x < data[i]["data"].length; x++) {
                    if (x % 2 == 0) {
                        barisx += `<tr>`
                    } else {
                        barisx += `<tr style = "background : #eeeeee">`
                    }


                    barisx += `
                                                                        <td>` + data[i]["data"][x]["nameitem"] + `</td>
                                                                        <td>` + data[i]["data"][x]["sku"] + `</td>
                                                                        <td>` + data[i]["data"][x]["qty"].replace(".0000", "") + `</td>
                                                                        <td>` + data[i]["data"][x]["expdate"] + `</td>
                                                                      
                                                                        
                                                                    </tr>


                                                          `

                }
                barisx += `
                                                                </tbody>
                                                            </table>
                                                      `





                $('#header').html(baris);
                // console.log(barisx);
                $('#dataitem').html(barisx);

                break;
            }
        }
    }
</script>