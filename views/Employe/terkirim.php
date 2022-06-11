<?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
$notif_count = count($notif);
?>
<?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
$notifsend = count($notif);
?>
<!-- ============================================= -->
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
    <?php if ($notifdisabled == 0) : ?>
        <a href="<?= base_url('CounterController/notifsend') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge"></span></a>
    <?php else : ?>
        <a href="<?= base_url('CounterController/notifsend') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge rounded-pill" style="top: -19px"><?= $notifsend ?></span></a>
    <?php endif ?>
    <!-- <?php if ($notifdisable == 0) : ?>
        <a href="<?= base_url('CounterController/notifsend') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge"></span></a>
    <?php else : ?>
        <a href="<?= base_url('CounterController/notifsend') ?>" class="btn text-white font-weight-bold pl-2 tu" style="font-size: 25px;cursor: pointer">DELIVERY ORDER <span class="badge badge-danger navbar-badge" style="top: -19px"><?= $notifsend ?></span></a>
    <?php endif ?> -->
</div>

<div class="container-xxl ml-5">
    <div class="row">
        <div class="col-9">
            <div class="card border-0">
                <div class=" card border-0">
                    <!-- <div class="card-header border-0 bg-transparent">
                        <div class="row d-flex justify-content-between">
                            <div class="col-10 pl-5">
                                <?php if ($notifdisabled == 0) : ?>
                                    <a href="<?= base_url('CounterController/notifsend') ?>" class="btn fw bay btn-light">TERKIRIM<span class="badge badge-danger navbar-badge"></span></a>
                                <?php else : ?>
                                    <a href="<?= base_url('CounterController/notifsend') ?>" class="btn fw bay btn-light">TERKIRIM<span class="badge badge-danger navbar-badge"><?= $notifsend ?></span></a>
                                <?php endif ?>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div> -->
                    <div class="card-body ml-4">
                        <center>
                            <div class="card bay p-4">
                                <div class="card-header border-0 bg-white">
                                    <form action="<?php echo base_url('CounterController/terkirim') ?>" method="post">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group">
                                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                                        <option class="slc" value="codeso">No. SO</option>
                                                        <option class="slc" value="nopesanan">No. Pesanan</option>
                                                        <option class="slc" value="namecomm">Customer</option>
                                                    </select>
                                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No. SO dan lainnya" style="font-family:Arial, FontAwesome">
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
                                                            <div class="col-1">
                                                            </div>
                                                            <div class="col-3">
                                                                <p>&nbsp;</p>
                                                                <a href="<?php echo base_url('CounterController/terkirim') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4" style="margin-top: 13vh">
                                                <a class="btn btn-outline-danger" style="margin-right: 0.6vw;margin-left: 6vw" onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
                                                <a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-striped table-hover">
                                        <thead style="background-color: orange;color: white">
                                            <tr>
                                                <th style="width: 5%;" scope="col">No</th>
                                                <th style="width: 15%;" scope="col">No. SO</th>
                                                <th style="width: 20%;" scope="col">Nama Customer</th>
                                                <th style="width: 40%;" scope="col">Alamat</th>
                                                <th style="width: 15%;" scope="col">Delive. Date</th>
                                                <th style="width: 10%;" scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: whtie" id="xdetail">
                                            <?php if ($data != "Not Found") : $a = 1; ?>
                                                <?php foreach ($data as $key) : ?>
                                                    <tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
                                                        <td><?php echo $a++; ?></td>
                                                        <td><?php echo $key["codeso"] ?></td>
                                                        <td><?php echo $key["namecust"] ?></td>
                                                        <td><?php echo $key["delivaddr"] ?></td>
                                                        <td><?php echo $key["delivdate"] ?></td>
                                                        <td>
                                                            <?php if ($key["notif"] == 2) : ?>
                                                                <?php echo $key["orderstatus"] ?>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge position-relative">Baru</span>
                                                            <?php elseif ($key["notif"] == 3) : ?>
                                                                <?php echo $key["orderstatus"] ?>
                                                            <?php else : ?>
                                                                <?php echo $key["orderstatus"] ?>
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
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3" style="margin-top: 2vh;">
            <div class="card bay border-0">
                <div class="card-body">
                    <center>
                        <p class="fw">Progress Pengiriman</p>
                    </center>
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5"> </div>
                                    <div class="col-12">
                                        <a class="btn" onclick="printDiv('card-body')"><i class="fa fa-print"></i> Cetak Data</a>
                                        <a class="btn" id="update"><i class="fa fa-refresh"></i> Update Data</a>
                                        <a class="btn" id="del"><i class="fa fa-trash"></i> Cancel Sales Order</a>
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
                                            <div class="col-2">
                                                <p class="badge bg-warning text-dark" id="status">Outstanding</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw">Nama Pesanan<br>
                                                    <span style="color: #3C2E8F" class="fn" id="napes">PT. Untung Jaya</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Alamat<br>
                                                        <span style="color: #3C2E8F" class="fn" id="addr">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                        <span style="color: #3C2E8F" class="fn" id="date">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
                                                        <span style="color: #3C2E8F" class="fn" id="jasa">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: #3C2E8F" class="fn" id="qty">X product</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn" id="tyso">Shopee</span>
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
                                        <thead style="background-color: grey;color: white">
                                            <tr>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Ready Stock</th>
                                                <th scope="col">Qty. Order</th>
                                                <th scope="col">Harga Jual</th>
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

<div class="excel" id="excel">
</div>
<div class="data" id="data">
    <table class="table table-striped table-hover">
        <thead style="background: purple">
            <tr style="border: solid;">
                <th style="width: 15%;" scope="col">No. SO</th>
                <th style="width: 20%;" scope="col">Nama Customer</th>
                <th style="width: 40%;" scope="col">Alamat</th>
                <th style="width: 15%;" scope="col">Delive. Date</th>
                <th style="width: 10%;" scope="col">Status</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Qty Order</th>
                <th>Harga Jual</th>
            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($data != "Not Found") : $a = 0; ?>
                <?php foreach ($data as $key) : ?>
                    <tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['codeso'] ?>)">
                        <td style="border: 1px solid"><?php echo $key["codeso"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["namecust"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["delivaddr"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["delivdate"] ?></td>
                        <td style="border: 1px solid">
                            <?php if ($key["notif"] == 2) : ?>
                                <?php echo $key["orderstatus"] ?>&nbsp;&nbsp;<span class="badge badge-danger navbar-badge position-relative">Baru</span>
                            <?php elseif ($key["notif"] == 3) : ?>
                                <?php echo $key["orderstatus"] ?>
                            <?php else : ?>
                                <?php echo $key["orderstatus"] ?>
                            <?php endif ?>
                        </td>
                        <td colspan="4">
                            <table class="table">
                                <tbody>
                                    <?php foreach ($key["data"] as $keyx) : ?>
                                        <tr>
                                            <td style="width: 30%;border: 1px solid"><?php echo $keyx["nameitem"] ?></td>
                                            <td style="width: 20%;border: 1px solid"><?php echo $keyx["sku"] ?></td>
                                            <td style="width: 20%;border: 1px solid"><?php echo  number_format($keyx["qtyorder"], 0, "", ",") ?></td>
                                            <td style="width: 20%;border: 1px solid"><?php echo  number_format($keyx["totalprice"], 0, "", ",") ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $('#data').hide();
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Terkirim', 8],
            ['Siap Dikirim', 2],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'colors': [
                '#105652',
                '#B91646'
            ],
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }

    function apply(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var ix = 0;
        var a = 1;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                    baris += '<tr>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + data[i]["delivaddr"] + '</td>';
                    baris += '<td>' + data[i]["delivdate"] + '</td>';
                    if (data[i]["notif"] == 2) {
                        baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                    } else if (data[i]["notif"] == 3) {
                        baris += '<td>' + data[i]["orderstatus"] + '</td>';
                    } else if (data[i]["notif"] == null) {
                        baris += '<td>' + data[i]["orderstatus"] + '</td>';
                    }
                    baris += '</tr>';
                    bar += '<tr>';
                    bar += '<td>' + data[i]["codeso"] + '</td>';
                    bar += '<td>' + data[i]["namecust"] + '</td>';
                    bar += '<td>' + data[i]["delivaddr"] + '</td>';
                    bar += '<td>' + data[i]["delivdate"] + '</td>';
                    if (data[i]["notif"] == 2) {
                        bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                    } else if (data[i]["notif"] == 3) {
                        bar += '<td>' + data[i]["orderstatus"] + '</td>';
                    } else if (data[i]["notif"] == null) {
                        bar += '<td>' + data[i]["orderstatus"] + '</td>';
                    }
                    bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                    }
                    bar += `</tbody>
                            </table>
                        </td>`;
                    bar += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["delivdate"] >= $('#date1').val() && data[i]["delivdate"] <= $('#date2').val()) {
                        baris += '<tr>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + data[i]["delivaddr"] + '</td>';
                        baris += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            baris += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        baris += '</tr>';
                        bar += '<tr>';
                        bar += '<td>' + data[i]["codeso"] + '</td>';
                        bar += '<td>' + data[i]["namecust"] + '</td>';
                        bar += '<td>' + data[i]["delivaddr"] + '</td>';
                        bar += '<td>' + data[i]["delivdate"] + '</td>';
                        if (data[i]["notif"] == 2) {
                            bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
                        } else if (data[i]["notif"] == 3) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        } else if (data[i]["notif"] == null) {
                            bar += '<td>' + data[i]["orderstatus"] + '</td>';
                        }
                        bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
                        for (var a = 0; a < data[i]["data"].length; a++) {
                            bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
                        }
                        bar += `</tbody>
                            </table>
                        </td>`;
                        bar += '</tr>';
                    }
                }
            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return;
        }

        $('#xdetail').html(baris);
        $('#prt').html(bar);
        console.log($('#valsearch').val())
        console.log($('#date1').val())
        console.log($('#date2').val())
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            baris += '<tr>';
            baris += '<td>' + data[i]["codeso"] + '</td>';
            baris += '<td>' + data[i]["namecust"] + '</td>';
            baris += '<td>' + data[i]["delivaddr"] + '</td>';
            baris += '<td>' + data[i]["delivdate"] + '</td>';
            if (data[i]["notif"] == 2) {
                baris += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
            } else if (data[i]["notif"] == 3) {
                baris += '<td>' + data[i]["orderstatus"] + '</td>';
            } else if (data[i]["notif"] == null) {
                baris += '<td>' + data[i]["orderstatus"] + '</td>';
            }
            baris += '</tr>';
            bar += '<tr>';
            bar += '<td>' + data[i]["codeso"] + '</td>';
            bar += '<td>' + data[i]["namecust"] + '</td>';
            bar += '<td>' + data[i]["delivaddr"] + '</td>';
            bar += '<td>' + data[i]["delivdate"] + '</td>';
            if (data[i]["notif"] == 2) {
                bar += '<td>' + data[i]["orderstatus"] + ' <span class="badge badge-danger navbar-badge position-relative">Baru</span></td>';
            } else if (data[i]["notif"] == 3) {
                bar += '<td>' + data[i]["orderstatus"] + '</td>';
            } else if (data[i]["notif"] == null) {
                bar += '<td>' + data[i]["orderstatus"] + '</td>';
            }
            bar += `<td colspan="3">
                            <table class="table">
                                <tbody>`;
            for (var a = 0; a < data[i]["data"].length; a++) {
                bar += `<tr>
                            <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyorder"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["totalprice"] + `</td>
                        </tr>`
            }
            bar += `</tbody>
                            </table>
                        </td>`;
            bar += '</tr>';

        }
        $('#xdetail').html(baris);
        $('#prt').html(bar);
    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "DeliveryOrderTerkirim.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function printDiv() {
        var printContents = document.getElementById('cards').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function printdata() {
        var printContents = document.getElementById('data').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function detail(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = '';
        var bar = '';
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idso"] == x) {
                document.getElementById('del').setAttribute('onclick', 'deletes(' + x + ')')
                document.getElementById('update').setAttribute('onclick', 'updates(' + x + ')')
                if (data[i]["statusorder"] == 'Waiting') {
                    $('#update').show();
                    $('#del').show();
                } else {
                    $('#update').hide();
                    $('#del').hide();
                }
                if (data[i]['nopesanan'] != "") {
                    $('#nopes').html('No.Pesanan ' + data[i]["nopesanan"])
                } else {
                    $('#nopes').html('No.Pesanan' + data[i]["codeso"]);
                }
                $('#types').html(data[i]["nametypeso"]);
                $('#status').html(data[i]["statusorder"]);
                $('#napes').html(data[i]["namecomm"]);
                $('#addr').html(data[i]["delivaddr"]);
                $('#date').html(data[i]["delivdate"]);
                $('#jasa').html(data[i]["jasapengirim"]);
                $('#qty').html(data[i]["totalso"] + ' Product');
                $('#tyso').html(data[i]["nametypeso"]);

                bar += `<table class="table">
                        <thead>
                            <tr>
                                <th style="border-style:solid;">No Pesanan</th>`

                if (data[i]['nopesanan'] != "") {
                    bar += `<th style="border-style:solid;">` + data[i]["nopesanan"] + `</th>`
                } else {
                    bar += `<th style="border-style:solid;">` + data[i]["codeso"] + `</th>`
                }
                bar += `<tr>
                        <th style="border-style:solid;">Type Pesanan</th>
                        <th style="border-style:solid;">Nama Pemesan</th>
                        <th style="border-style:solid;">Alamat</th>
                        <th style="border-style:solid;">Delivery Date</th>
                        <th style="border-style:solid;">Qty Product</th>
                        <th style="border-style:solid;">Order Type</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
                        <td style="border-style:solid;">` + data[i]["namecomm"] + `</td>
                        <td style="border-style:solid;">` + data[i]["delivdate"] + `</td>
                        <td style="border-style:solid;">` + data[i]["totalso"] + ` Product</td>
                        <td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
                        <td style="border-style:solid;">OUT - Sales</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td colspan='5'>DAFTAR ITEM YANG DIPESAN</td>
                    </tr>
                    <tr>
                        <td style="border-style:solid;">Nama Product</td>
                        <td style="border-style:solid;">SKU</td>
                        <td style="border-style:solid;">Ready Stock</td>
                        <td style="border-style:solid;">Qty Order</td>
                        <td style="border-style:solid;">Balance</td>
                    </tr>`;

                for (var a = 0; a < data[i]["data"].length; a++) {
                    baris += `<tr>
                                <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                <td >` + data[i]["data"][a]["sku"] + `</td>
                                <td >` + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + `</td>
                                <td >` + data[i]["data"][a]["qtyready"] + `</td>
                                <td >` + data[i]["data"][a]["qtyorder"] + `</td>
                                <td >` + formatnum(parseFloat(data[i]["data"][a]["totalprice"]).toFixed(0)) + `</td>
                            </tr>`
                    bar += `<tr>
                        <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
                            <td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
                        </tr>`
                }

                bar += `</tbody>
            </table>`
                $('#body').html(baris);
                $('#excel').html(bar);
                $('#excel').hide();
                console.log(baris)

            }
        }

    }
</script>