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

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Counter / Ingoing - Outgoing</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">COUNTER</p>
</div>
<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 0, 'statusorder' => 'Waiting'])->result_array();
                    $notif_count = count($notif);
                    ?>

                    <?php
                    $notif           = $this->db->get_where('tb_salesorder', ['notif' => 0, 'statusorder' => 'Waiting'])->result_array();
                    $notifdisable    = count($notif);
                    ?>
                    <?php if ($notifdisable == 0) : ?>
                        <a href="<?= base_url('CounterController/notifwaiting') ?>" class="btn fw bay btn-light">Order Processing<span class="badge badge-danger navbar-badge"></span></a>
                    <?php else : ?>
                        <a href="<?= base_url('CounterController/notifwaiting') ?>" class="btn fw bay btn-light">Order Processing<span class="badge badge-danger navbar-badge"><?= $notif_count; ?></span></a>
                    <?php endif ?>
                    <a href="<?= base_url('CounterController/outgoing') ?>" class="btn fw btn-transparent">OUTGOING</a>
                    <a href="<?= base_url('CounterController/ingoing') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('CounterController/return') ?>" class="btn fw btn-transparent">RETURN</a>
                    <!-- <a href="<?= base_url('CounterController/stockopname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a> -->
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>

        <form id="form" action="<?php echo base_url('CounterController/confirmall') ?>" method="POST">
            <div class="card-body  ml-4">
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
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
                                    <select class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="1">No. SO</option>
                                        <option class="slc" value="2">Tipe. SalesOrder</option>
                                        <option class="slc" value="3">No Pesanan</option>
                                        <option class="slc" value="4">Customer</option>
                                    </select>
                                    <input type="text" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No SO dan lainnya" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p style="text-align :left">Dari</p>
                                                <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p style="text-align :left">Hingga</p>
                                                <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
                                                <p><br></p>
                                                <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                                <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                            </div>
                                            <!-- <div class="col-1">
                                            </div> -->
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
                            <div class="col-2"></div>
                            <div class="col-2"></div>
                            <div class="col-2">

                            </div>
                        </div>
                        <div class="row d-flex justify-content-between mt-2">
                            <button type="button" style="align-content:right" class="btn btn-outline-primary ml-3" onclick="checkall(this)" id="tandai">Tandai Semua</button>
                            <button type="button" style="align-content:right" class="btn btn-outline-primary ml-3" onclick="uncheckall(this)" id="hilang">Hilangkan Semua Tanda</button>
                            <button disabled type="button" style="background-color: orange;color: white;align-content:right" class="btn mr-3" id="konfirm" onclick="verify()">Konfirm Yang Ditandai</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover cn">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. SO</th>
                                    <th scope="col">Tipe. SalesOrder</th>
                                    <th scope="col">No. Pesanan</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Qty. Items</th>
                                    <th scope="col">Tgl. Order</th>
                                    <th scope="col">Delive. Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: whtie" id="bodyxx">
                                <?php
                                $notifs  = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Waiting'])->result_array();
                                ?>
                                <?php if ($data != "Not Found") : $a = 0; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input type="checkbox" value="<?php echo $key["idso"] ?>" id="check" name="check[]" onclick="checkdata()">
                                                </div>
                                            </th>
                                            <td><?php echo $key["codeso"] ?></td>
                                            <td><?php echo $key["typeorder"] ?></td>
                                            <td><?php echo $key["nopesanan"] ?></td>
                                            <td><?php echo $key["namecust"] ?></td>
                                            <td><?php echo $key["totalso"] ?></td>
                                            <td><?php echo $key["dateso"] ?></td>
                                            <td><?php echo $key["delivdate"] ?></td>
                                            <td>
                                                <?php if ($key["notif"] == 0 && $key["statusorder"] == 'Waiting') { ?>
                                                    <a data-toggle="modal" class="position-relative" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black; " onclick="konfirmorder(<?php echo $key["idso"] ?>)">Konfirmasi <span class="badge badge-danger navbar-badge">Baru</span></a>
                                                <?php } elseif ($key["notif"] == 0) { ?>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idso"] ?>) ">Konfirmasi</a>
                                                <?php } else { ?>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idso"] ?>)">Konfirmasi</a>
                                                <?php } ?>
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


        </form>

    </div>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('CounterController/konfirmso') ?>" id="formx">
                <div class="modal-header" style="background-color : orange; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl ml-5">
                        <div class=" card border-0">
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-10"></div>
                                    <div class="col-2">
                                        <a onclick="printdata()" class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                        <!-- <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="cards">
                                <div class="card bay" width="100%" id="header">
                                    <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10">
                                                <p class="fw">No. Pesanan 123123rr<br>
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
                                            <tr>
                                                <td>Mark</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td><i class="fa fa-pencil"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: #eeeeee; height: 10vh">
                    <button class="btn btn-warning text-white" onclick="confirms()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#hilang').hide();


    function confirms() {
        if (confirm("Apakah kamu yakin untuk confirm  ?")) {
            $('#formx').submit();
        }
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
            document.getElementById("konfirm").disabled = false;
        } else {
            document.getElementById("konfirm").disabled = true;
        }
    }

    function printdata() {
        var printContents = document.getElementById("cards").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function verify() {
        if (confirm("Apakah kamu yakin untuk confirm semua yang ditandai ?")) {
            $('#form').submit();
        }
    }

    function checkall(source) {
        var ele = document.getElementsByName('check[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = true;
        }
        $('#hilang').show();
        $('#tandai').hide();
        document.getElementById("konfirm").disabled = false;
    }

    function uncheckall() {
        var ele = document.getElementsByName('check[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = false;

        }
        $('#hilang').hide();
        $('#tandai').show();
        document.getElementById("konfirm").disabled = true;
    }

    function apply() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        console.log(data);
        var ix = 0;
        var x1 = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["typeorder"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                    baris += '<tr style="cursor: pointer;">';
                    baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["typeorder"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + data[i]["totalso"] + '</td>';
                    baris += '<td>' + data[i]["dateso"] + '</td>';
                    baris += '<td>' + data[i]["delivdate"] + '</td>';
                    baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["typeinret"] == "2") {
                    if ($('#search').val() == 1) {
                        if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["typeorder"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + data[i]["totalso"] + '</td>';
                            baris += '<td>' + data[i]["dateso"] + '</td>';
                            baris += '<td>' + data[i]["delivdate"] + '</td>';
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')">Konfirmasi</a> </td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 2) {
                        if (data[i]["typeorder"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["typeorder"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + data[i]["totalso"] + '</td>';
                            baris += '<td>' + data[i]["dateso"] + '</td>';
                            baris += '<td>' + data[i]["delivdate"] + '</td>';
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 3) {
                        if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["typeorder"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + data[i]["totalso"] + '</td>';
                            baris += '<td>' + data[i]["dateso"] + '</td>';
                            baris += '<td>' + data[i]["delivdate"] + '</td>';
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 4) {
                        if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["typeorder"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + data[i]["totalso"] + '</td>';
                            baris += '<td>' + data[i]["dateso"] + '</td>';
                            baris += '<td>' + data[i]["delivdate"] + '</td>';
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
                            baris += '</tr>';
                        }
                    }
                }
            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return;
        }

        $('#bodyxx').html(baris);
        console.log($('#valsearch').val())
        console.log($('#date1').val())
        console.log($('#date2').val())
    }

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["codeso"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1)) {
                baris += '<tr style="cursor: pointer;">';
                baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                baris += '<td>' + data[i]["codeso"] + '</td>';
                baris += '<td>' + data[i]["typeorder"] + '</td>';
                baris += '<td>' + data[i]["nopesanan"] + '</td>';
                baris += '<td>' + data[i]["namecust"] + '</td>';
                baris += '<td>' + data[i]["totalso"] + '</td>';
                baris += '<td>' + data[i]["dateso"] + '</td>';
                baris += '<td>' + data[i]["delivdate"] + '</td>';
                baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi </a> </td>';
                baris += '</tr>';
            } else if ((data[i]["typeorder"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2)) {
                baris += '<tr style="cursor: pointer;">';
                baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                baris += '<td>' + data[i]["codeso"] + '</td>';
                baris += '<td>' + data[i]["typeorder"] + '</td>';
                baris += '<td>' + data[i]["nopesanan"] + '</td>';
                baris += '<td>' + data[i]["namecust"] + '</td>';
                baris += '<td>' + data[i]["totalso"] + '</td>';
                baris += '<td>' + data[i]["dateso"] + '</td>';
                baris += '<td>' + data[i]["delivdate"] + '</td>';
                baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';
            } else if ((data[i]["namecust"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3)) {
                baris += '<tr style="cursor: pointer;">';
                baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
                baris += '<td>' + data[i]["codeso"] + '</td>';
                baris += '<td>' + data[i]["typeorder"] + '</td>';
                baris += '<td>' + data[i]["nopesanan"] + '</td>';
                baris += '<td>' + data[i]["namecust"] + '</td>';
                baris += '<td>' + data[i]["totalso"] + '</td>';
                baris += '<td>' + data[i]["dateso"] + '</td>';
                baris += '<td>' + data[i]["delivdate"] + '</td>';
                baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi</a> </td>';

            }
        }
        $('#bodyxx').html(baris);
    }
    searchx('');
    $('form button').on("click", function(e) {
        e.preventDefault();
    });

    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idso"] == x) {
                var baris = `
                                <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10" >`;
                if (data[i]["nopesanan"] == null) {
                    baris += ` <p class="fw">No. Pesanan ` + data[i]["codeso"] + `<br>
                                <span class="fn">` + data[i]["typeorder"] + `</span>
                                </p>`
                } else {
                    baris += `
                            <p class="fw">No. Pesanan ` + data[i]["nopesanan"] + `<br>
                                <span class="fn">` + data[i]["typeorder"] + `</span>
                            </p>`
                }
                baris += `</div>
                            <input type="hidden" name="idso" value="` + data[i]["idso"] + `">
                                <div class="col-2">
                                    <p class="badge bg-warning text-dark">Outstanding</p>
                                </div>
                                <div class="col-12">
                                    <p class="fw">Nama Pesanan<br>
                                        <span style="color: #3C2E8F" class="fn">` + data[i]["namecust"] + `</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between" style="width: 100%;">
                                    <div style="width: 40%;">
                                        <p class="fw p-3">Alamat<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["delivaddr"] + `</span>
                                        </p>
                                    </div>
                                    <div style="width: 40%;">
                                        <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["delivdate"] + `</span>
                                        </p>
                                    </div>
                                    <div style="width: 40%;">
                                        <p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["jasapengirim"] + `</span>
                                        </p>
                                    </div>
                                    <div style="width: 40%;">
                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["totalso"] + ` Product</span>
                                        </p>
                                    </div>
                                    <div style="width: 40%;">
                                        <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["typeorder"] + `</span>
                                        </p>
                                    </div>
                                    <div style="width: 30%;">
                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                            <span style="color: #3C2E8F" class="fn">` + data[i]["outtype"] + `</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                var barisx = `<p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                <table class="table cn">
                                    <thead style="background-color: orange;color: white">
                                        <tr>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Ready Stock</th>
                                            <th scope="col">Qty. Order</th>
                                            <th scope="col">Balance</th>
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
                                <td>` + (Number(data[i]["data"][x]["qtyready"])) + `</td>
                                <td>` + data[i]["data"][x]["qtyorder"] + `</td>
                                <td>` + ((Number(data[i]["data"][x]["qtyready"])) - data[i]["data"][x]["qtyorder"]) + `</td>
                            </tr>`
                }
                barisx += `</tbody>
                            </table>`
                $('#header').html(baris);
                console.log(barisx);
                $('#dataitem').html(barisx);
            }
        }
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        for (var i = 0; i < data.length; i++) {
            baris += '<tr style="cursor: pointer;">';
            baris += '<th> <input type="checkbox" value="' + data[i]["idso"] + '" id="check" name="check[]" onclick="checkdata()"> </th>';
            baris += '<td>' + data[i]["codeso"] + '</td>';
            baris += '<td>' + data[i]["typeorder"] + '</td>';
            baris += '<td>' + data[i]["nopesanan"] + '</td>';
            baris += '<td>' + data[i]["namecust"] + '</td>';
            baris += '<td>' + data[i]["totalso"] + '</td>';
            baris += '<td>' + data[i]["dateso"] + '</td>';
            baris += '<td>' + data[i]["delivdate"] + '</td>';
            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idso"] + ')" class="btn btn-warning">Konfirmasi </a> </td>';

        }
        $('#bodyxx').html(baris);
    }
</script>