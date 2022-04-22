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
$status = array('Accepted', 'Process', 'Waiting');
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">WAREHOUSER / Report / Counter</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">Laporan Counter</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <!-- <a href="<?= base_url('employe/report') ?>" class="btn fw btn-transparent">SEMUA</a> -->
                    <a href="<?= base_url('CounterController/ingoingreport') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('CounterController/outgoingreport') ?>" class="btn fw btn-transparent">OUTGOING</a>
                    <a href="<?= base_url('CounterController/report') ?>" class="btn fw bay btn-light">REQUEST</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <form action="<?php echo base_url('CounterController/report') ?>" method="post">
                        <div class="row pt-4 d-flex justify-content-between">
                            <div class="col-6 pt-2 pl-3">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="norequest">No. Request</option>
                                        <option class="slc" value="namerequest">Judul Request</option>
                                        <option class="slc" value="fullname">Dibuat Oleh</option>
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No. Request dan lainnya" style="font-family:Arial, FontAwesome">
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
                                            <div class="col-3">
                                                <p>Sorting</p>
                                                <select class="form-control py-2 " name="status" value="<?= set_value('status') ?>" style="cursor: pointer;" aria-label="Default select example" id="stat">
                                                    <option selected value="">Sort By Status</option>
                                                    <?php foreach (array_unique($status) as $key) : ?>
                                                        <?php if ($key != "Pending") : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $key ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-3 ">
                                                <p>&nbsp;</p>
                                                <a href="<?php echo base_url('CounterController/report') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                            <!-- <div class="col-1 pt-3 ">
                                                <a href="<?php echo base_url('CounterController/report') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                            </div>
                                            <div class="col-2 pt-3">
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-2">
                            </div>
                            <div class="col-3" style="margin-top: 11vh"> -->
                            <!-- <a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
                            <a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                            <!-- </div> -->
                            <div class="col">
                            </div>
                            <div class="col" style="margin-top: 13vh">
                                <a class="btn btn-outline-success" style="margin-left:63%;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                    </form>
                </div>
                <div class="card-body pt-4">
                    <table class="table table-hover table-striped ">
                        <thead style="background-color: orange;color: white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Request</th>
                                <th scope="col">Tgl dibuat</th>
                                <th scope="col">Judul Request</th>
                                <th scope="col">Qty. Items</th>
                                <th scope="col">Dibuat Oleh</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white" id="xdetail">
                            <?php $i = 1;
                            if ($data != "Not Found") : ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td><?php echo $key["norequest"] ?></td>
                                        <td><?php echo $key["daterequest"] ?></td>
                                        <td><?php echo $key["namerequest"] ?></td>
                                        <td><?php echo $key["totalreq"] ?></td>
                                        <td><?php echo $key["fullname"] ?></td>
                                        <td><?php echo $key["statusreq"] ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idrequestheader"] ?>)" class="btn btn-warning">Detail</a>
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
                    <div class="excel" id="excel">
                    </div>
                    <div class="data" id="data">
                        <table class="table cn">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="border-style:solid;background-color: orange;color: white">#</th>
                                    <th style="border-style:solid;background-color: orange;color: white">No. Request</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Tgl dibuat</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Judul Request</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Qty. Items</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Dibuat Oleh</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                if ($data != "Not Found") : ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <th style="border: solid;"><?= $i++ ?></th>
                                            <td style="border: solid;"><?php echo $key["norequest"] ?></td>
                                            <td style="border: solid;"><?php echo $key["daterequest"] ?></td>
                                            <td style="border: solid;"><?php echo $key["namerequest"] ?></td>
                                            <td style="border: solid;"><?php echo $key["totalreq"] ?></td>
                                            <td style="border: solid;"><?php echo $key["fullname"] ?></td>
                                            <td style="border: solid;"><?php echo $key["statusreq"] ?></td>
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
</div>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('CounterController/konfirmso') ?>">
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
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#data').hide();

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Outgoingreport.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idrequestheader"] == x) {
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
                                         <input type="hidden" name="idso" value="' + data[i]["idrequestheader"] + '">
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
                                            <thead style="background-color: grey;color: white">
                                                <tr>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Qty. Request</th>
                                                    
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


    function date() {
        if ($('#date1').val() == "" || $('#date2').val() == "") {
            alert("Masukan Periode dengan benar")
        } else {
            var data = <?php echo json_encode($data) ?>;
            console.log(data);
            var baris = "";
            var ix = 0;
            var a = 1;
            for (var i = 0; i < data.length; i++) {
                if (data[i]["daterequest"] >= $('#date1').val() && data[i]["daterequest"] <= $('#date2').val()) {
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += `<td>` + data[i]["norequest"] + `</td>
                        <td>` + data[i]["daterequest"] + `</td>
                        <td>` + data[i]["namerequest"] + `</td>
                        <td>` + data[i]["totalreq"] + `</td>
                        <td>` + data[i]["fullname"] + `</td>
                        <td>` + data[i]["statusreq"] + `</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(' + data[i]["idrequestheader"] + ')">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                }
            }
            $('#xdetail').html(baris);
        }
    }
</script>