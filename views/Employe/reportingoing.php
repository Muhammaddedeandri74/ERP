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
$status = array('Received', 'Waiting');
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
                    <a href="<?= base_url('CounterController/ingoingreport') ?>" class="btn fw bay btn-light">INGOING</a>
                    <a href="<?= base_url('CounterController/outgoingreport') ?>" class="btn fw btn-transparent">OUTGOING</a>
                    <a href="<?= base_url('CounterController/report') ?>" class="btn fw btn-transparent">REQUEST</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <form action="<?php echo base_url('CounterController/ingoingreport') ?>" method="post">
                        <div class="row pt-4 d-flex justify-content-between">
                            <div class="col-6 pt-2 pl-3">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codemove">No. Ingoing</option>
                                        <option class="slc" value="typemove">Tipe In</option>
                                        <option class="slc" value="descinfo">Deskripsi</option>
                                    </select>
                                    <input type="text" value="<?= set_value('search') ?>" name="search" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No. Ingoing dan lainnya" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p style="text-align :left">Dari</p>
                                                <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p style="text-align :left">Hingga</p>
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
                                                <p>&nbsp;</p>
                                                <a href="<?php echo base_url('CounterController/ingoingreport') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-2">
                            </div>
                            <div class="col-3" style="margin-top: 11vh"> -->
                            <!-- <a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a> -->
                            <!-- <a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a> -->
                            <!-- <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                            <!-- </div> -->
                            <div class="col">
                            </div>
                            <div class="col" style="margin-top: 13vh">
                                <a class="btn btn-outline-success" style="margin-left:63%;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>
                    </form>
                    <div class="card-body pt-4">
                        <table class="table table-hover table-striped cn">
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
                            <tbody>
                                <?php $i = 1;
                                if ($data != "Not Found") : $a = 0; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php if ($key["status"] != "Waiting") : ?>
                                            <?php if ($a % 2 == 0) { ?>
                                                <tr>
                                                <?php } else { ?>
                                                <tr style="background: #eeeeee">
                                                <?php } ?>
                                                <th scope="row"><?= $i++ ?></th>
                                                <td><?php echo $key["codemove"] ?></td>
                                                <?php if ($key["norequest"] == "") { ?>
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
                                            <?php endif ?>
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
                                        <th style="border-style:solid;background-color: orange;color: white">No </th>
                                        <th style="border-style:solid;background-color: orange;color: white">No Ingoing</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Tipe In</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Qty Items</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Tanggal Order</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Deskripsi</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Gudang Pengirim</th>
                                        <th style="border-style:solid;background-color: orange;color: white">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    if ($data != "Not Found") : $a = 0; ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php if ($key["status"] != "Waiting") : ?>
                                                <?php if ($a % 2 == 0) { ?>
                                                    <tr>
                                                    <?php } else { ?>
                                                    <tr style="border: solid;">
                                                    <?php } ?>
                                                    <th style="border: solid;"><?= $i++ ?></th>
                                                    <td style="border: solid;"><?php echo $key["codemove"] ?></td>
                                                    <?php if ($key["norequest"] == "") { ?>
                                                        <td style="border: solid;">Move In</td>
                                                    <?php } else { ?>
                                                        <td style="border: solid;">Request</td>
                                                    <?php } ?>
                                                    <td style="border: solid;"><?php echo $key["itemmove"] ?></td>
                                                    <td style="border: solid;"><?php echo $key["datemove"] ?></td>
                                                    <td style="border: solid;"><?php echo $key["descinfo"] ?></td>
                                                    <td style="border: solid;"><?php echo $key["namecomm"] ?></td>
                                                    <td style="border: solid;"><?php echo $key["status"] ?></td>
                                                    </tr>
                                                <?php endif ?>
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
            download: "Ingoingreport.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idmove"] == x) {
                // console.log(data[i])
                var baris = `
                                <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10" >`;
                if (data[i]["nopesanan"] == null) {
                    baris += ` <p class="fw">No. Ingoing ` + data[i]["codemove"] + `<br> </p>`
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
                                            <thead style="background-color: grey;color: white">
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
                                                                        <td>` + data[i]["data"][x]["qty"] + `</td>
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
            }
        }
    }

    function printdata() {
        var printContents = document.getElementById("cards").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload;
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


    function date() {
        if ($('#date1').val() == "" || $('#date2').val() == "") {
            alert("Masukan Periode dengan benar")
        } else {
            var data = <?php echo json_encode($data) ?>;
            var baris = "";
            var a = 1;
            var ix = 0;
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
                    baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
                }
            }
            $('#bodyxx').html(baris);
        }
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var a = 1;
        var ix = 0;
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
            baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
        }
        $('#bodyxx').html(baris);
    }
</script>