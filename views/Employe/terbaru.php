<?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
$notif_count = count($notif);
?>
<?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
$notifsend = count($notif);
?>
<!-- =================================Notifff Disabled====================================== -->
<?php
$notif         = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
$notifdisable  = count($notif);
?>
<?php
$notifs         = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
$notifdisabled  = count($notifs);
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PACKAGING / Delivery Order</p>
    <?php if ($notifdisable == 0) : ?>
        <a href="<?= base_url('CounterController/notifdelivery') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge"></span></a>
    <?php else : ?>
        <a href="<?= base_url('CounterController/notifdelivery') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge rounded-pill" style="top: -19px"><?= $notif_count ?></span></a>
    <?php endif ?>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <!-- <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <?php if ($notifdisable == 0) : ?>
                        <a href="<?= base_url('CounterController/notifdelivery') ?>" class="btn fw bay btn-light">SIAP DIKIRIM<span class="badge badge-danger navbar-badge"></span></a>
                    <?php else : ?>
                        <a href="<?= base_url('CounterController/notifdelivery') ?>" class="btn fw bay btn-light">SIAP DIKIRIM<span class="badge badge-danger navbar-badge"><?= $notif_count ?></span></a>
                    <?php endif ?>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div> -->
        <div class="card-body  ml-4">
            <center>
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('CounterController/deliveryorder') ?>" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                            <option class="slc" value="codeso">No. SO</option>
                                            <!-- <option class="slc" value="typeorder">Tipe Order</option> -->
                                            <option class="slc" value="nopesanan">No. Pesanan</option>
                                            <option class="slc" value="namecomm">Customer</option>
                                        </select>
                                        <input type="text" name="search" value="<?= set_value('search') ?>" value="" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No. SO dan lainnya" style="font-family:Arial, FontAwesome">
                                    </div>
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="rwo d-flex justify-content-between">
                                                <div class="col-3">
                                                    <p style="text-align :left">Dari</p>
                                                    <input placeholder="Pilih Tanggal" name="date1" value="<?= set_value('date1') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                                </div>
                                                <div class="col-3">
                                                    <p style="text-align :left">Hingga</p>
                                                    <input placeholder="Pilih Tanggal" name="date2" value="<?= set_value('date2') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                                </div>
                                                <!-- <div class="col-1">
                                                </div>
                                                <div class="col-2 pt-3 ">
                                                    <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                                </div>
                                                <div class="col-2 pt-3">
                                                    <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                                </div> -->
                                                <div class="col-3">
                                                    <p>&nbsp;</p>
                                                    <a href="<?php echo base_url('CounterController/deliveryorder') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                    <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-2" style="margin-top: 13vh">
                                    <a class=" btn btn-outline-success" style="margin-left: 125px;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped table-hover">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. SO</th>
                                    <th scope="col">Tipe. Order</th>
                                    <th scope="col">No. Pesanan</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Qty. Items</th>
                                    <th scope="col">Tgl. Order</th>
                                    <th scope="col">Delive. Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: whtie" id="xdetail">
                                <?php $i = 1;
                                if ($data != "Not Found") : $a = 0; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php $notifs  = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Process'])->result_array(); ?>
                                        <?php if ($a % 2 == 0) { ?>
                                            <tr>
                                            <?php } else { ?>
                                            <tr style="background: #eeeeee">
                                            <?php } ?>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?php echo $key["codeso"] ?></td>
                                            <td><?php echo $key["typeorder"] ?></td>
                                            <td><?php echo $key["nopesanan"] ?></td>
                                            <td><?php echo $key["namecust"] ?></td>
                                            <td><?php echo $key["totalso"] ?></td>
                                            <td><?php echo $key["dateso"] ?></td>
                                            <td><?php echo $key["delivdate"] ?></td>
                                            <td>
                                                <?php if ($key["notif"] == 1) : ?>
                                                    <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)" class="btn btn-warning">Kemas Order&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a>
                                                <?php elseif ($key["notif"] == 2) : ?>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)" class="btn btn-warning">Kemas Order</a>
                                                <?php else : ?>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)" class="btn btn-warning">Kemas Order</a>
                                                <?php endif ?>
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
                <form id="form" action="<?php echo base_url('CounterController/kemasorder') ?>" method="POST">
                    <input type="hidden" name="idso" id="idso">
                </form>
            </center>
        </div>
    </div>
</div>

<script type="text/javascript">
    function kirimorder(x) {
        $('#idso').val(x);
        $('#form').submit();
    }

    function apply(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var ix = 0;
        var a = 1;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["typeorder"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["typeorder"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + data[i]["totalso"] + '</td>';
                    baris += '<td>' + data[i]["dateso"] + '</td>';
                    baris += '<td>' + data[i]["delivdate"] + '</td>';
                    if (data[i]["notif"] == 1) {
                        baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                    } else if (data[i]["notif"] == 2) {
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                    } else if (data[i]["notif"] == null) {
                        baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                    }
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["typeorder"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["typeorder"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["totalso"] + '</td>';
                        baris += '<td>' + data[i]["dateso"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 1) {
                            baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
                        } else if (data[i]["notif"] == 2) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        } else if (data[i]["notif"] == null) {
                            baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
                        }
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
        var baris = "";
        var a = 1;
        var ix = 0;
        for (var i = 0; i < data.length; i++) {
            ix = (ix + 1);
            baris += '<tr style="cursor: pointer;">';
            baris += '<td>' + ix + '</td>';
            baris += '<td>' + data[i]["codeso"] + '</td>';
            baris += '<td>' + data[i]["typeorder"] + '</td>';
            baris += '<td>' + data[i]["nopesanan"] + '</td>';
            baris += '<td>' + data[i]["namecust"] + '</td>';
            baris += '<td>' + data[i]["totalso"] + '</td>';
            baris += '<td>' + data[i]["dateso"] + '</td>';
            baris += '<td>' + data[i]["delivdate"] + '</td>';
            if (data[i]["notif"] == 1) {
                baris += '<td> <a class="position-relative" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer; text-decoration:none; color:black;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge">Baru</span></a> </td>';
            } else if (data[i]["notif"] == 2) {
                baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
            } else if (data[i]["notif"] == null) {
                baris += '<td> <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["idso"] ?>)">Kemas Order <i class="fa fa-external-link" aria-hidden="true"></i></a> </td>'
            }
            baris += '</tr>';
        }
        $('#xdetail').html(baris);
    }
</script>