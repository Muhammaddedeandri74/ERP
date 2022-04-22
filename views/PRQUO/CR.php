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
</style>

<?php
$status = array('Waiting', 'Process', 'Accepted');
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Request / Counter</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">REQUEST COUNTER</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('PrQuo/pr') ?>" class="btn fw btn-transparent">REQUEST PURCHASE</a>
                    <a href="<?= base_url('PrQuo/cr') ?>" class="btn bay fw btn-transparent">REQUEST COUNTER</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <form action="<?php echo base_url('PrQuo/cr') ?>" method="post">
                        <div class="row pt-4 d-flex justify-content-between">
                            <div class="col-6" style="margin-left: 1vw;">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="norequest">No Request</option>
                                        <option class="slc" value="namerequest">Judul</option>
                                        <option class="slc" value="fullname">Dibuat</option>
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" placeholder="&#xF002; Cari Berdasarkan nomor request dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                                </div>
                                <!-- <input type="text" class="form-control" placeholder="&#xF002; Cari Berdasarkan nomor pesanan atau nama customer" oninput="search(this.value)" style="font-family:Arial, FontAwesome"> -->
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p>Dari</p>
                                                <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p>Hingga</p>
                                                <input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
                                                <a style="text-decoration: none;" class=" btn btn-outline-danger" href="<?php echo base_url('PrQuo/cr') ?>">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
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
                            <div class="col-2">
                            </div>
                            <div class="col-3" style="margin-top: 11vh">
                                <!-- <a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
                            <a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <table class="table table-striped table-hover cn">
                                <thead style="background-color: orange;color: white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No. Request</th>
                                        <th scope="col">Tgl dibuat</th>
                                        <!-- <th scope="col">Nama Gudang</th> -->
                                        <th scope="col">Judul Request</th>
                                        <th scope="col">Qty. Items</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white" id="bodyxx">
                                    <?php $i = 1;
                                    if ($data != "Not Found") : ?>
                                        <?php foreach ($data as $key) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++ ?></th>
                                                <td><?php echo $key["norequest"] ?></td>
                                                <td><?php echo $key["daterequest"] ?></td>
                                                <td><?php echo $key["namerequest"] ?></td>
                                                <td><?php echo $key["totalreq"] ?></td>
                                                <td><?php echo $key["fullname"] ?></td>
                                                <td><?php echo $key["statusreq"] ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(<?php echo $key["idrequestheader"] ?>)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('InOut/newmovewh') ?>">
                <div class="modal-header" style="background-color : orange; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Request</h5>
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
                                        <thead style="background-color: grey;color: white">
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
                <div class="modal-footer" id="footer">
                    <button type="submit" class="btn btn-outline-warning"> Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function apply() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var a = 1;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $("#date2").val() == "" && $('#stat').val() == "") {

            for (var i = 0; i < data.length; i++) {

                if (data[i]["namerequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                              <th scope="row"> ` + a++ + `</th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                         `
                } else if (data[i]["norequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
                    console.log($('#valsearch').val() + " " + $('#search').val() + " " + data[i]["norequest"])
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                                 <th scope="row"> ` + a++ + `</th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>`

                } else if (data[i]["fullname"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                                      <th scope="row"> ` + a++ + `</th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                 `

                }

            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $("#date2").val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val()) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
               <th scope="row"> ` + a++ + `</th>
                        <td>` + data[i]["norequest"] + `</td>
                        
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                      
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>
         `
                }

            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $("#date2").val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                        <th scope="row"> ` + a++ + `</th>
                                <td>` + data[i]["norequest"] + `</td>
                                
                                <td>` + data[i]["daterequest"] + `</td>
                                <td>` + data[i]["namerequest"] + `</td>
                                <td>` + data[i]["totalreq"] + `</td>
                                <td>` + data[i]["fullname"] + `</td>
                                <td>` + data[i]["statusreq"] + `</td>
                            
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        `
                }

            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $("#date2").val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["namerequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val()) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
              <th scope="row"> ` + a++ + `</th>
                        <td>` + data[i]["norequest"] + `</td>
                        
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                      
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>
         `
                } else if (data[i]["norequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val()) {
                    console.log($('#valsearch').val() + " " + $('#search').val() + " " + data[i]["norequest"])
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                 <th scope="row"> ` + a++ + `</th>
                        <td>` + data[i]["norequest"] + `</td>
                        
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                      
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`

                } else if (data[i]["fullname"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val()) {

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                      <th scope="row"> ` + a++ + `</th>
                        <td>` + data[i]["norequest"] + `</td>
                        
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                      
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                 `

                }

            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $("#date2").val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["namerequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                        <th scope="row"> ` + a++ + `</th>
                                <td>` + data[i]["norequest"] + `</td>
                                
                                <td>` + data[i]["daterequest"] + `</td>
                                <td>` + data[i]["namerequest"] + `</td>
                                <td>` + data[i]["totalreq"] + `</td>
                                <td>` + data[i]["fullname"] + `</td>
                                <td>` + data[i]["statusreq"] + `</td>
                            
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                `
                } else if (data[i]["norequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    console.log($('#valsearch').val() + " " + $('#search').val() + " " + data[i]["norequest"])
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                        <th scope="row"> ` + a++ + `</th>
                                <td>` + data[i]["norequest"] + `</td>
                                
                                <td>` + data[i]["daterequest"] + `</td>
                                <td>` + data[i]["namerequest"] + `</td>
                                <td>` + data[i]["totalreq"] + `</td>
                                <td>` + data[i]["fullname"] + `</td>
                                <td>` + data[i]["statusreq"] + `</td>
                            
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>`

                } else if (data[i]["fullname"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                            <th scope="row"> ` + a++ + `</th>
                                <td>` + data[i]["norequest"] + `</td>
                                
                                <td>` + data[i]["daterequest"] + `</td>
                                <td>` + data[i]["namerequest"] + `</td>
                                <td>` + data[i]["totalreq"] + `</td>
                                <td>` + data[i]["fullname"] + `</td>
                                <td>` + data[i]["statusreq"] + `</td>
                            
                                <td>
                                    <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        `

                }

            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $("#date2").val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val() && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                    <th scope="row"> ` + a++ + `</th>
                            <td>` + data[i]["norequest"] + `</td>
                            
                            <td>` + data[i]["daterequest"] + `</td>
                            <td>` + data[i]["namerequest"] + `</td>
                            <td>` + data[i]["totalreq"] + `</td>
                            <td>` + data[i]["fullname"] + `</td>
                            <td>` + data[i]["statusreq"] + `</td>
                        
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    `
                }

            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $("#date2").val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["namerequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val() && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                            <th scope="row"> ` + a++ + `</th>
                                    <td>` + data[i]["norequest"] + `</td>
                                    
                                    <td>` + data[i]["daterequest"] + `</td>
                                    <td>` + data[i]["namerequest"] + `</td>
                                    <td>` + data[i]["totalreq"] + `</td>
                                    <td>` + data[i]["fullname"] + `</td>
                                    <td>` + data[i]["statusreq"] + `</td>
                                
                                    <td>
                                        <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            `
                } else if (data[i]["norequest"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val() && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    console.log($('#valsearch').val() + " " + $('#search').val() + " " + data[i]["norequest"])
                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                <th scope="row"> ` + a++ + `</th>
                        <td>` + data[i]["norequest"] + `</td>
                        
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                    
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`

                } else if (data[i]["fullname"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val() && data[i]["statusreq"].toLowerCase().includes($('#stat').val().toLowerCase())) {

                    if (i % 2 == 0) {
                        baris += '<tr>';
                    } else {
                        baris += '<tr style = "background :#eeeeee">'
                    }
                    baris += `
                        <th scope="row"> ` + a++ + `</th>
                            <td>` + data[i]["norequest"] + `</td>
                            
                            <td>` + data[i]["daterequest"] + `</td>
                            <td>` + data[i]["namerequest"] + `</td>
                            <td>` + data[i]["totalreq"] + `</td>
                            <td>` + data[i]["fullname"] + `</td>
                            <td>` + data[i]["statusreq"] + `</td>
                        
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    `

                }

            }
        } else {
            alert("Masukan Filter Dengan Benar")
        }




        $('#bodyxx').html(baris);
    }

    function konfirmorders(x) {
        var data = <?php echo json_encode($data) ?>;

        for (var i = 0; i < data.length; i++) {
            if (data[i]["idrequestheader"] == x) {
                if (data[i]["statusreq"] == "Accepted") {
                    $('#footer').hide()
                } else {
                    $('#footer').show()
                }
                console.log(data[i])
                var baris = `
                                <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10" >`;

                if (data[i]["nopesanan"] == null) {
                    baris += ` <p class="fw">No. Request ` + data[i]["norequest"] + `<br>
                                                            <span class="fn">` + data[i]["daterequest"] + `</span>
                                                        </p>`
                } else {
                    baris += `
                                                         <p class="fw">No. Request ` + data[i]["norequest"] + `<br>
                                                            <span class="fn">` + data[i]["daterequest"] + `</span>
                                                        </p>
                                                     `
                }

                baris += `</div>
                                         <input type="hidden" name="idrequest" value="` + data[i]["idrequestheader"] + `">
                                            <div class="col-2">
                                                <p class="badge bg-warning text-dark">` + data[i]["statusreq"] + `</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw">Judul Request<br>
                                                    <span style="color: #3C2E8F" class="fn">` + data[i]["namerequest"] + `</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Dibuat Oleh<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["fullname"] + `</span>
                                                    </p>
                                                </div>
                                              
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["totalreq"] + ` Product</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn">Request Barang</span>
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
                                                    <th scope="col">Qty. Request</th>
                                                    <th scope="col">Qty. Out</th>
                                                    <th scope="col">Qty. Total</th>
                                                    
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
                                                                        <td>` + (data[i]["data"][x]["qty"] - data[i]["data"][x]["qtyin"]) + `</td>
                                                                        <td>` + data[i]["data"][x]["qtyin"] + `</td>
                                                                        <td>` + data[i]["data"][x]["qty"] + `</td>
                                                                       
                                                                        
                                                                    </tr>


                                                          `

                }
                barisx += `
                                                                </tbody>
                                                            </table>
                                                      `





                $('#header').html(baris);
                console.log(barisx);
                $('#dataitem').html(barisx);
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

    function submit() {
        $('#form').submit();
    }


    function search(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        for (var i = 0; i < data.length; i++) {
            if (data[i]["namerequest"].toLowerCase().includes(x.toLowerCase())) {
                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                         `
            } else if (data[i]["norequest"].toLowerCase().includes(x.toLowerCase())) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                                <th scope="row"></th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>`

            } else if (data[i]["statusreq"].toLowerCase().includes(x.toLowerCase())) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                                    <th scope="row"></th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                 `

            } else if (data[i]["fullname"].toLowerCase().includes(x.toLowerCase())) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                                     <th scope="row"></th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                 `

            }

        }
        $('#bodyxx').html(baris);
    }




    function reset() {

        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (i % 2 == 0) {
                baris += '<tr>';
            } else {
                baris += '<tr style = "background :#eeeeee">'
            }
            baris += `
            <th scope="row"> ` + a++ + `</th>
                                        <td>` + data[i]["norequest"] + `</td>
                                        
                                        <td>` + data[i]["daterequest"] + `</td>
                                        <td>` + data[i]["namerequest"] + `</td>
                                        <td>` + data[i]["totalreq"] + `</td>
                                        <td>` + data[i]["fullname"] + `</td>
                                        <td>` + data[i]["statusreq"] + `</td>
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorders(` + data[i]["idrequestheader"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr> 
                             `
        }
        $('#bodyxx').html(baris);


    }

    function searchx(x) {

        var data = <?php echo json_encode($data) ?>;
        var grandtotal = 0;
        var baris = '';
        if (data != "Not Found") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase())) {
                    grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
                    var a = 0;

                    if (a % 2 == 0) {
                        baris += `
                            <tr>
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    } else {
                        baris += `
                            <tr style="background : #eeeeee">
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    }
                } else if (data[i]["codequo"].toLowerCase().includes(x.toLowerCase())) {
                    grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
                    var a = 0;

                    if (a % 2 == 0) {
                        baris += `
                            <tr>
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    } else {
                        baris += `
                            <tr style="background : #eeeeee">
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    }
                } else if (data[i]["namequotation"].toLowerCase().includes(x.toLowerCase())) {
                    grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
                    var a = 0;

                    if (a % 2 == 0) {
                        baris += `
                            <tr>
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    } else {
                        baris += `
                            <tr style="background : #eeeeee">
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    }
                } else if (data[i]["nametypequo"].toLowerCase().includes(x.toLowerCase())) {
                    grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
                    var a = 0;

                    if (a % 2 == 0) {
                        baris += `
                            <tr>
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    } else {
                        baris += `
                            <tr style="background : #eeeeee">
                                <td>` + data[i]["codequo"] + `</td>
                                <td>` + data[i]["datequo"] + `</td>
                                <td>` + data[i]["nametypequo"] + `</td>
                                <td>` + data[i]["namequotation"] + `</td>
                                <td>` + data[i]["namecomm"] + `</td>
                                
                                <td>` + data[i]["pricetotal"] + `</td>
                                <td>` + data[i]["statusquo"] + `</td>
                                <td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
                            </tr>
                        `
                    }
                }
            }
            baris += `<tr style="border: solid;">
            <td colspan="5">Total Price</td>
            <td colspan="3">` + grandtotal + `</td>
        </tr>`

            $('#bodyx').html(baris);
        } else {
            alert("Data Kosong");
        }


    }
</script>