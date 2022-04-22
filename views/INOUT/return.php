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
<?php
$status = array('Waiting', 'Receive');
?>
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">INGOING / Ingoing </p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">INGOING</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/invin') ?>" class="btn bay fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('InOut/invinret') ?>" class="btn fw btn-transparent">OUTGOING</a>
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
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">

                        </div>
                        <div class="col-6" style="padding-left: 18vw;">
                            <div class="col">
                                <label>TIPE IN</label>
                                <a style="margin-left: 2vw;" href="<?= base_url('InOut/invin') ?>" class="btn fw btn-transparent">SUPPLIER</a>
                                <a href="<?= base_url('InOut/return') ?>" class="btn bay fw btn-transparent">RETURN</a>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-6 pt-2 pl-3">
                            <div class="input-group">
                                <select class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                    <option class="slc" value="1">No Going</option>
                                    <option class="slc" value="2">Deskripsi</option>
                                    <option class="slc" value="3">Gudang Pengirim</option>
                                </select>
                                <input type="text" class="form-control col-10" name="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                            </div>
                            <div class="card">
                                <div class="card-body bays">
                                    <div class="rwo d-flex justify-content-between">
                                        <div class="col-3">
                                            <p>Dari</p>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                        </div>
                                        <div class="col-3">
                                            <p>Hingga</p>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                        </div>
                                        <div class="col-3">
                                            <p>Status</p>
                                            <select class="form-control py-2 " style="cursor: pointer;" aria-label="Default select example" id="stat">
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
                                            <a style="text-decoration: none;" class=" btn btn-outline-danger" onclick="reset()">Reset</a>
                                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
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
                        <!-- <div class="col-4"></div> -->
                        <!-- 						<div class="col-2">
							<a href="<?php echo base_url('PRQUO/newpr') ?>" style="margin-top: 14vh;float :right" class="btn btn-outline-primary"><b>+ Purchase Request</b></a>
						</div> -->
                        <div class="col-4">
                        </div>
                        <div class="col-2" style="margin-top: 13vh">
                            <a class="btn btn-outline-success" style="float: right;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
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
                        <tbody style="background-color: whtie" id="xdetail">
                            <?php $i = 1;
                            if ($data != "Not Found") : $a = 0; ?>
                                <?php foreach ($data as $key) : ?>
                                    <?php if ($a % 2 == 0) { ?>
                                        <tr>
                                        <?php } else { ?>
                                        <tr style="background: #eeeeee">
                                        <?php } ?>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?php echo $key["codemove"] ?></td>
                                        <?php if ($key["norequest"] == "") { ?>
                                            <td>Return Counter</td>
                                        <?php } else { ?>
                                            <td>Request</td>
                                        <?php } ?>
                                        <td><?php echo $key["itemmove"] ?></td>
                                        <td><?php echo $key["datemove"] ?></td>
                                        <td><?php echo $key["descinfo"] ?></td>

                                        <td><?php echo $key["namecomm"] ?></td>
                                        <td><?php echo $key["status"] ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idmove"] ?>)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
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
                                    <th style="border-style:solid;background-color: orange;color: white">NO </th>
                                    <th style="border-style:solid;background-color: orange;color: white">No. Ingoing</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Tipe. IN</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Qty. Items</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Tgl. Order</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Deskripsi</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Gudang Pengirim</th>
                                    <th style="border-style:solid;background-color: orange;color: white">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                if ($data != "Not Found") : $a = 0; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php if ($a % 2 == 0) { ?>
                                            <tr>
                                            <?php } else { ?>
                                            <tr>
                                            <?php } ?>
                                            <th style="border: solid;"><?= $i++ ?></th>
                                            <td style="border: solid;"><?php echo $key["codemove"] ?></td>
                                            <?php if ($key["norequest"] == "") { ?>
                                                <td style="border: solid;">Return Counter</td>
                                            <?php } else { ?>
                                                <td style="border: solid;">Request</td>
                                            <?php } ?>
                                            <td style="border: solid;"><?php echo $key["itemmove"] ?></td>
                                            <td style="border: solid;"><?php echo $key["datemove"] ?></td>
                                            <td style="border: solid;"><?php echo $key["descinfo"] ?></td>

                                            <td style="border: solid;"><?php echo $key["namecomm"] ?></td>
                                            <td style="border: solid;"><?php echo $key["status"] ?></td>
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
                                    <div class="col-7"> </div>
                                    <div class="col-5">
                                        <a class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                        <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
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
                                                        <span style="color: black" class="fn">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between" style="width: 100%;">
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3">Alamat<br>
                                                            <span style="color: black" class="fn">PT. Untung Jaya</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                            <span style="color: black" class="fn">Tanggal</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                            <span style="color: black" class="fn">X product</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                            <span style="color: black" class="fn">Shopee</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 30%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                            <span style="color: black" class="fn">OUT - Sales</span>
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
                    <div class="modal-footer" id="footer">
                        <button type="button" class="btn btn-danger text-white">Confirm</button>
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
            download: "Return.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        for (var i = 0; i < data.length; i++) {
            if (data[i]["codemove"].toLowerCase().includes(x.toLowerCase())) {
                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["codemove"] + `</td>
                                        `
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
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
                                    </tr>
                         `
            } else if (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase())) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["codemove"] + `</td>
                                        `
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
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
                                    </tr>
                         `

            } else if (x.toLowerCase().includes("return counter")) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["codemove"] + `</td>
                                        `
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
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
                                    </tr>
                         `
            } else if (x.toLowerCase().includes("request")) {

                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["codemove"] + `</td>
                                        `
                if (data[i]["norequest"] == "") {
                    baris += `  <td>Return Counter</td>`
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
                                    </tr>
                         `

            }

        }
        $('#bodyxx').html(baris);
    }

    function apply() {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var bar = "";
        var ix = 0;
        var x1 = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) ||
                    (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) ||
                    (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3)) {
                    console.log("Test");
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) {
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) ||
                    (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) ||
                    (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val())) {
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';

                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 &&
                        data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 &&
                        data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 &&
                        data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()))) {
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 &&
                        data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) &&
                    data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()) ||
                    (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 &&
                        data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) &&
                    data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()) ||
                    (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 &&
                        data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) &&
                    data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix + '</td>';
                    baris += '<td>' + data[i]["codemove"] + '</td>';
                    baris += '<td>Return Counter</td>';
                    baris += '<td>' + data[i]["qtymove"] + '</td>';
                    baris += '<td>' + data[i]["datemove"] + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["namecomm"] + '</td>';
                    baris += '<td>' + data[i]["status"] + '</td>';
                    baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
                    baris += '</tr>';
                }
            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return
        }


        $('#xdetail').html(baris);
        $('#prt').html(bar);

    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 0;
        for (var i = 0; i < data.length; i++) {
            baris += '<tr>';
            baris += '<td scope="row">' + ix + '</td>';
            baris += '<td>' + data[i]["codemove"] + '</td>';
            baris += '<td>Return Counter</td>';
            baris += '<td>' + data[i]["qtymove"] + '</td>';
            baris += '<td>' + data[i]["datemove"] + '</td>';
            baris += '<td>' + data[i]["descinfo"] + '</td>';
            baris += '<td>' + data[i]["namecomm"] + '</td>';
            baris += '<td>' + data[i]["status"] + '</td>';
            baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
            baris += '</tr>';
        }
        $('#xdetail').html(baris);
    }

    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idmove"] == x) {
                if (data[i]["status"] != "Waiting") {
                    $('#footer').hide();
                } else {
                    $('#footer').show();
                }

                $('#footer').html('<a href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouses" class="btn btn btn-warning text-white"><i class="fas fa-pencil-alt">Confirm</i></a>')

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
                                                    <span style="color: black" class="fn">` + data[i]["datemove"] + `</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Warehouse Pengirim<br>
                                                        <span style="color: black" class="fn">` + data[i]["namecomm"] + `</span>
                                                    </p>
                                                </div>
                                               
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: black" class="fn">` + data[i]["qtymove"] + ` Product</span>
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
            }
        }
    }
</script>