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

    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }

    .slc {
        background-color: #f3f3f3;
        color: black;
    }

    .num {
        mso-number-format: text;
    }

    tfoot {
        color: green;
    }
</style>
<?php
$status = array('Waiting', 'Process', 'Finish', 'Cancel');
?>

<?php
$name  = "st.namecomm";
$name1 = $name;
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Purchase Order Report</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">PURCHASE REPORT</p>
</div>
<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('PrQuo/reportpr') ?>" class="btn fw btn-transparent">REQUEST PURCHASE</a>
                    <a href="<?= base_url('PrQuo/reportpo') ?>" class="btn bay fw btn-transparent">PURCHASE ORDER</a>
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
                    <form action="<?php echo base_url('PrQuo/reportpo') ?>" method="post">
                        <div class="row pt-4 d-flex justify-content-between">
                            <div class="col-6" style="margin-left: 1vw;">
                                <div class=" input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codepo">Order NO</option>
                                        <option class="slc" value="codepr">Request NO</option>
                                        <!-- <option class="slc" value="namecomm">Supplier</option> -->
                                        <!-- <option class="slc" value="4">Status</option> -->
                                        <!-- <option class="slc" value="nameuser">Issue By</option> -->
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Order NO dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                                    <!-- <button style="display:none" type="submit"><i class="fa fa-search"></i></button> -->
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p>Dari</p>
                                                <input placeholder="Pilih Tanggal" name="date1" value="<?= set_value('date1') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p>Hingga</p>
                                                <input placeholder="Pilih Tanggal" name="date2" value="<?= set_value('date2') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
                                                <a href="<?php echo base_url('PrQuo/reportpo') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
                                                <button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                            <!-- <div class="col-3">
                                                <p><br></p>
                                                <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                                <a style="text-decoration: none;" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
                <div class="col">
                </div>
                <div class="col-2" style="margin-top: 12vh">
                    <a class="btn btn-outline-danger" onclick="printdatas()"><i class="fa fa-print"></i> Cetak Data</a>
                    <a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                    <!-- <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                </div>
            </div>
        </div>
        <div class="card-body ">
            <table class="table table-striped table-hover">
                <thead style="background-color: #3C2E8F;color:white">
                    <tr>
                        <th>NO </th>
                        <th>Order NO</th>
                        <th>Request NO</th>
                        <th>Order Date</th>
                        <th>Supplier</th>
                        <th>Item Count</th>
                        <th>Total Request</th>
                        <th>Status</th>
                        <th>Issue By</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data != "Not Found") : $a = 1 ?>
                        <?php foreach ($data as $key) : ?>
                            <tr>
                                <td><?php echo $a++ ?></td>
                                <td><?php echo $key["codepo"] ?></td>
                                <td><?php echo $key["codepr"] ?></td>
                                <td><?php echo $key["datepo"] ?></td>
                                <td><?php echo $key["namesupp"] ?></td>
                                <td><?php echo $key["itemcount"] ?></td>
                                <td><?php echo number_format($key["totalpo"], 0, "", ",") ?></td>
                                <td><?php echo $key["statuspo"] ?></td>
                                <td><?php echo $key["nameuser"] ?></td>
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
                <div class="modal-header" style="background-color : #3C2E8F; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Purchase Report</h5>
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
                                            <div class="col-10" id="head1">
                                                <p class="fw">No. Request 123123rr<br>
                                                    <span class="fn">Sl22</span>
                                                </p>
                                            </div>
                                            <div class="col-2" id>
                                                <!-- <p class="badge bg-warning text-dark">Outstanding</p> -->
                                            </div>
                                            <div class="col-12" id="head2">
                                                <p class="fw">Nama Pesanan<br>
                                                    <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;" id="head3">
                                                    <p class="fw p-3">Alamat<br>
                                                        <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;" id="head4">
                                                    <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                        <span style="color: #3C2E8F" class="fn">Tanggal</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;" id="head5">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: #3C2E8F" class="fn">X product</span>
                                                    </p>
                                                </div>
                                                <div style="width: 40%;" id="heady">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                        <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div id="head6">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn">Shopee</span>
                                                    </p>
                                                </div>
                                                <div id="head9">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn">Shopee</span>
                                                    </p>
                                                </div>
                                                <div id="head7">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                        <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                    </p>
                                                </div>
                                                <div id="headz">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                        <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                    </p>
                                                </div>
                                                <div id="head8">
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
                                        <thead style="background-color: #3C2E8F;color: white">
                                            <tr>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Qty.</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty. Return</th>
                                                <th scope="col">Harga Return</th>
                                                <th scope="col">PPH</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: whtie" id="boodx">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bay" style="display: none;" id="quot">
                    <div class="card-header pl-5 border-0">
                        <div class="row d-flex justify-content-between p-3">
                            <div class="col-3">
                                <?php if ($data1 == "Not Found") { ?>
                                    <img style="opacity: 0.8;width:14vw" alt="">
                                <?php } else { ?>
                                    <img src="<?= base_url($data1["logo"]) ?>" style="opacity: 0.8;width:14vw" alt="">
                                <?php } ?>
                                <!-- <img src="<?= base_url('assets/img/df.png') ?>" style="opacity: 0.8;width:14vw" alt=""> -->
                            </div>
                            <div class="col-8">
                                <?php if ($data1 == "Not Found") { ?>
                                    <p></p>
                                    <p style="font-size:22px;text-align:center"></p>
                                <?php } else { ?>
                                    <p style="font-weigth:bold;color:purple;font-size:36px;opacity:0.6;text-align:center"><?= $data1['namecomp'] ?></p>
                                    <p style="font-size:22px;text-align:center"><?php echo $data1["addr"] ?> &nbsp;&nbsp;&nbsp;&nbsp; Telp : <?php echo $data1["phone"] ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="border-top: 2px solid black;"></p>
                        <div class="row d-flex justify-content-between">
                            <div class="col-1">
                            </div>
                            <div class="col-5">
                                <div class="input-group flex-nowrap">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">TO :</p>
                                    <p id="pt" class="mt-2">PT. DRS</p>
                                </div>
                                <div class="input-group flex-nowrap">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">ATTN :</p>
                                    <p id="cust" class="mt-2"></p>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group flex-nowrap">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">No :</p>
                                    <p id="no" class="mt-2">Sj14045</p>
                                </div>
                                <div class="input-group flex-nowrap">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">DATE :</p>
                                    <p id="dates" class="mt-2">21/12/2021</p>
                                </div>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col">
                                <p style="text-align: center;font-size: 24px;font-weight:bold"><u>PURCHASE ORDER</u> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table border">
                                    <thead style="border: 2px solid black">
                                        <tr>
                                            <th class="tc" style="width: 10%;border: 2px solid black" scope="col">NO</th>
                                            <th class="tc" style="width: 40%;border: 2px solid black" scope="col">NAMA PRODUCT</th>
                                            <th class="tc" style="border: 2px solid black" scope="col">SKU</th>
                                            <!-- <th class="tc" style="width: 18%;border: 2px solid black" scope="col">DESCRIPTION</th> -->
                                            <th class="tc" style="border: 2px solid black" scope="col">QTY</th>
                                            <th class="tc" style="border: 2px solid black" scope="col">HARGA SATUAN</th>
                                            <th class="tc" style="border: 2px solid black" scope="col">DISC</th>
                                            <th class="tc" style="border: 2px solid black" scope="col">HARGA TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodys">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <p style="font-size: 18px;padding-top: 12vh;margin-left: 12vw">( <a id="isu"> ( ISSUE BY )</a> )</p>
                            <p style="font-size: 18px;padding-top: 12vh;margin-right: 12vw">( <?= $data1['director'] ?> )</p>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

<div id="excel" class="excel"></div>
<div class="data" id="data" style="display: none;">
    <table class="table table-striped table-hover" style="margin-top: 2%;width: 100%">
        <thead style="background: #3C2E8F;color: white ">
            <tr style="border: 1px solid;">
                <th style="background-color: purple;">NO </th>
                <th style="background-color: purple;">Order NO</th>
                <th style="background-color: purple;">Request NO</th>
                <th style="background-color: purple;">Order Date</th>
                <th style="background-color: purple;">Supplier</th>
                <th style="background-color: purple;">Item Count</th>
                <th style="background-color: purple;">Total Request</th>
                <th style="background-color: purple;">Status</th>
                <th style="background-color: purple;">Total PPH</th>
                <th style="background-color: purple;">Issue By</th>
                <th colspan="3">
                    <table style="width: 100%;">
                        <tbody>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;">Detail Purchase Order </th>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;"></th>
                            <th style="background-color: purple;"></th>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">Item Name</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">SKU</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">QtyIn</th>
                                <th style="width: 10%;border: 1px solid;background-color: purple;">QtyRet</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">Harga</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">Disc</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">pph</th>
                                <th style="width: 15%;border: 1px solid;background-color: purple;">Grand Total</th>
                            </tr>
                            <?php if ($data != "Not Found") : ?>
                                <?php foreach ($data as $keys) : ?>
                                    <tr>
                                        <td style="border: 1px solid;"><?php echo $keys["nameitem"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["sku"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["datepo"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["qtyin"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["qtyret"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["price"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["discrp"] ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["pph"]  ?></td>
                                        <td style="border: 1px solid;"><?php echo $keys["nameuser"] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tfoot>
                    </table>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data != "Not Found") : $a = 1 ?>
                <?php foreach ($data as $keys) : ?>
                    <tr>
                        <td style="border: 1px solid;"><?php echo $a++ ?></td>
                        <td style="border: 1px solid;"><?php echo $key["codepo"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["codepr"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["datepo"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["namesupp"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["itemcount"] ?></td>
                        <td style="border: 1px solid;"><?php echo number_format($key["totalpo"], 0, "", ",") ?></td>
                        <td style="border: 1px solid;"><?php echo $key["statuspo"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["pph22"] ?></td>
                        <td style="border: 1px solid;"><?php echo $key["nameuser"] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<script language="javascript">
    function apply() {
        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        var baris = "";
        var bar = "";
        var ix = 0;
        var x1 = 0;
        var x2 = 0;
        var totalqty = 0;
        var totalprice = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 10%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 10%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else {
                    console.log("NOT FOUND")
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else {
                    console.log("NOT FOUND")
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qty"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val() && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else {
                    console.log("NOT FOUND")
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                } else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                    x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                    x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["codepr"] + '</td>';
                    baris += '<td>' + data[i]["datepo"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + x2 + '</td>';
                    baris += '<td>' + data[i]["statuspo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '</tr>';
                    bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                    bar += '<td style="border: 1px solid;">' + ix + '</td>';
                    bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                    bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                    bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                    bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                    bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                    for (var a = 0; a < data[i]["data"].length; a++) {
                        bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                    }
                    bar += `</tbody>
	                        </table>
	                    </td>`
                    bar += '</tr>';
                    totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                    totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
                }
            }
            baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
            bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`


        } else {
            alert("Masukan Filter Dengan Benar")
            return
        }
        $('#xdetail').html(baris);
        $('#prt').html(bar);
    }

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var bar = "";
        var ix = 0;
        var x1 = 0;
        var x2 = 0;
        var x0 = 0;
        var totalqty = 0;
        var totalprice = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["codepo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["codepr"] + '</td>';
                baris += '<td>' + data[i]["datepo"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + x2 + '</td>';
                baris += '<td>' + data[i]["statuspo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '</tr>';
                bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                bar += '<td style="border: 1px solid;">' + ix + '</td>';
                bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                for (var a = 0; a < data[i]["data"].length; a++) {
                    bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                }
                bar += `</tbody>
	                        </table>
	                    </td>`
                bar += '</tr>';
                totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
            } else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["codepr"] + '</td>';
                baris += '<td>' + data[i]["datepo"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + x2 + '</td>';
                baris += '<td>' + data[i]["statuspo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '</tr>';
                bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                bar += '<td style="border: 1px solid;">' + ix + '</td>';
                bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                for (var a = 0; a < data[i]["data"].length; a++) {
                    bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                }
                bar += `</tbody>
	                        </table>
	                    </td>`
                bar += '</tr>';
                totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
            } else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["codepr"] + '</td>';
                baris += '<td>' + data[i]["datepo"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + x2 + '</td>';
                baris += '<td>' + data[i]["statuspo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '</tr>';
                bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                bar += '<td style="border: 1px solid;">' + ix + '</td>';
                bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                for (var a = 0; a < data[i]["data"].length; a++) {
                    bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                }
                bar += `</tbody>
	                        </table>
	                    </td>`
                bar += '</tr>';
                totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
            } else if (data[i]["statuspo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 4) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["codepr"] + '</td>';
                baris += '<td>' + data[i]["datepo"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + x2 + '</td>';
                baris += '<td>' + data[i]["statuspo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '</tr>';
                bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                bar += '<td style="border: 1px solid;">' + ix + '</td>';
                bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                for (var a = 0; a < data[i]["data"].length; a++) {
                    bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                }
                bar += `</tbody>
	                        </table>
	                    </td>`
                bar += '</tr>';
                totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
            } else if (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 5) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["codepr"] + '</td>';
                baris += '<td>' + data[i]["datepo"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + x2 + '</td>';
                baris += '<td>' + data[i]["statuspo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '</tr>';
                bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
                bar += '<td style="border: 1px solid;">' + ix + '</td>';
                bar += '<td style="border: 1px solid;" class="num" >' + data[i]["codepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x1 + '</td>';
                bar += '<td style="border: 1px solid;">' + x2 + '</td>';
                bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
                bar += '<td style="border: 1px solid;">' + x0 + '</td>';
                bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
                for (var a = 0; a < data[i]["data"].length; a++) {
                    bar += `<tr style="border: solid;">
                                <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyin"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["qtyret"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;background-color:yellow;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
                }
                bar += `</tbody>
	                        </table>
	                    </td>`
                bar += '</tr>';
                totalqty = Number(totalqty) + Number(x1.replace(',', ''));
                totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
            }
        }
        baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`

        $('#xdetail').html(baris);
        $('#prt').html(bar);
    }
    searchx('');
    $('form button').on("a", function(e) {
        //searchx($('#search').val());
        e.preventDefault();
    });

    function printdata() {
        var printContents = document.getElementById("quot").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();
    }

    function printdatas() {
        var printContents = document.getElementById('data').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    $("#btnExport").click(function(e) {
        let file = new Blob([$('.excel').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "PurchaseOrdersatuan.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "PurchaseOrder.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });


    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idpo"] == x) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
                x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
                $('#head1').html(` <p class="fw">No. Order <br> <span class="fn">` + data[i]["codepo"] + `</span></p>`)
                $('#head2').html(` <p class="fw">Nama Pemesan <br> <span class="fn">` + data[i]["nameuser"] + `</span></p>`)
                $('#head3').html(` <p class="fw p-3">Supplier<br><span style="color: #3C2E8F" class="fn">` + data[i]["namesupp"] + `</span></p>`)
                $('#head4').html(` <p class="fw p-3">Request Date<br><span style="color: #3C2E8F" class="fn">` + data[i]["datepo"] + `</span></p>`)
                $('#head5').html(` <p class="fw p-3">Item Count<br><span style="color: #3C2E8F" class="fn">` + x1 + ` Product</span></p>`)
                $('#pt').html(data[i]["namesupp"]);
                $('#isu').html(data[i]["nameuser"]);
                $('#headz').html(` <p class="fw p-3">Total PPH Purchase<br><span style="color: #3C2E8F" class="fn" id="total">` + x0 + `</span></p>`)

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('PrQuo/getpo') ?>",
                    data: 'id=' + x,
                    dataType: 'json',
                    success: function(hasil) {
                        console.log(hasil)
                        x2 = formatnum(parseFloat(hasil["headertrans"]["subtotal"]).toFixed(0));
                        x3 = formatnum(parseFloat(hasil["headertrans"]["ppntotal"]).toFixed(0));
                        x4 = formatnum(parseFloat(hasil["headertrans"]["totalpo"]).toFixed(0));
                        x5 = formatnum(parseFloat(hasil["headertrans"]["disctotal"]).toFixed(0));
                        x6 = formatnum(parseFloat(hasil["detailtrans"][0]["itemret"]).toFixed(0));
                        $('#head6').html(` <p class="fw p-3">SubTotal Purchase<br><span style="color: #3C2E8F" class="fn">` + x2 + `</span></p>`)
                        $('#head7').html(` <p class="fw p-3">Total PPN Purchase<br><span style="color: #3C2E8F" class="fn">` + x3 + `</span></p>`)
                        $('#head8').html(` <p class="fw p-3">Total Purchase<br><span style="color: #3C2E8F" class="fn">` + x4 + `</span></p>`)
                        $('#head9').html(` <p class="fw p-3">SubTotal Return<br><span style="color: #3C2E8F" class="fn" id="total"></span></p>`)

                        $('#heady').html(` <p class="fw p-3">Total Return<br><span style="color: #3C2E8F" class="fn">` + x6 + `</span></p>`)
                        $('#cust').html(hasil["headertrans"]["attn"]);
                        $('#no').html(hasil["headertrans"]["codepo"]);
                        $('#dates').html(hasil["headertrans"]["datepo"]);

                        var baris = '';
                        var bars = '';
                        var z = 1;
                        var totalreturn = 0;
                        for (var a = 0; a < hasil["detailtrans"].length; a++) {
                            baris += `<tr>
                                    <td>` + hasil["detailtrans"][a]["nameitem"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["sku"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["qty"].replace(".000000", "") + `</td>
                                    <td>` + formatnum(parseFloat(hasil["detailtrans"][a]["price"]).toFixed(0)) + `</td>
                                    <td>` + formatnum(parseFloat(hasil["detailtrans"][a]["qtyret"]).toFixed(0)) + `</td>
                                    <td>` + formatnum(parseFloat(hasil["detailtrans"][a]["qtyret"].replace(".0000", "") * hasil["detailtrans"][a]["price"]).toFixed(0)) + `</td>
                                    <td>` + formatnum(parseFloat(hasil["detailtrans"][a]["pph"]).toFixed(0)) + `</td>
                                    
                                </tr>`
                            bars += `<tr>
                                    <td style="border-style:solid;">` + z++ + `</td>
                                    <td style="border-style:solid;">` + hasil["detailtrans"][a]["nameitem"] + `</td>
                                    <td style="border-style:solid;">` + hasil["detailtrans"][a]["sku"] + `</td>
                                    <td style="border-style:solid;">` + hasil["detailtrans"][a]["qty"].replace(".000000", "") + `</td>
                                    <td style="border-style:solid;">` + hasil["detailtrans"][a]["price"].replace(".0000", "") + `</td>
                                    <td style="border-style:solid;">` + (hasil["detailtrans"][a]["price"].replace(".0000", "") * hasil["detailtrans"][a]["qty"].replace(".000000", "")) * (hasil["detailtrans"][a]["discper"].replace(".00", "") / 100) + `</td>
                                    <td style="border-style:solid;">` + hasil["detailtrans"][a]["subpo"].replace(".0000", "") + `</td>
                                </tr>`

                            totalreturn = Number(totalreturn) + Number(hasil["detailtrans"][a]["qtyret"].replace(".0000", "") * hasil["detailtrans"][a]["price"].replace(".0000", ""))

                        }
                        bars += `<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">Sub Total</th>
											<td style="border: 2px solid black">` + x2 + `</td>
										</tr>
                                        <tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">Disc</th>
											<td style="border: 2px solid black">` + x5 + `</td>
										</tr>
										<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">PPN</th>
											<td style="border: 2px solid black">` + x3 + `</td>
										</tr>
										<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">TOTAL</th>
											<td style="border: 2px solid black;"><b>` + x4 + `</b></td>
										</tr>`

                        $('#total').html(totalreturn)
                        $('#boodx').html(baris)
                        $('#bodys').html(bars)
                    }
                });
            }
        }
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        var a = 1;
        var ix = 0;
        var x1 = 0;
        var x2 = 0;
        var x0 = 0;
        var totalqty = 0;
        var totalprice = 0;
        for (var i = 0; i < data.length; i++) {
            x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
            x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
            x0 = formatnum(parseFloat(data[i]["pph22"]).toFixed(0));
            ix = (ix + 1);
            baris += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
            baris += '<td>' + ix + '</td>';
            baris += '<td>' + data[i]["codepo"] + '</td>';
            baris += '<td>' + data[i]["codepr"] + '</td>';
            baris += '<td>' + data[i]["datepo"] + '</td>';
            baris += '<td>' + data[i]["namesupp"] + '</td>';
            baris += '<td>' + x1 + '</td>';
            baris += '<td>' + x2 + '</td>';
            baris += '<td>' + data[i]["statuspo"] + '</td>';
            baris += '<td>' + data[i]["nameuser"] + '</td>';
            baris += '</tr>';
            bar += '<tr style="cursor: pointer;"  data-toggle="modal" data-target="#modalopenshop"  onclick =konfirmorder(' + data[i]["idpo"] + ')  ">';
            bar += '<td>' + ix + '</td>';
            bar += '<td style="border: 1px solid;">' + data[i]["codepo"] + '</td>';
            bar += '<td style="border: 1px solid;">' + data[i]["codepr"] + '</td>';
            bar += '<td style="border: 1px solid;">' + data[i]["datepo"] + '</td>';
            bar += '<td style="border: 1px solid;">' + data[i]["namesupp"] + '</td>';
            bar += '<td style="border: 1px solid;">' + x1 + '</td>';
            bar += '<td style="border: 1px solid;">' + x2 + '</td>';
            bar += '<td style="border: 1px solid;">' + data[i]["statuspo"] + '</td>';
            bar += '<td style="border: 1px solid;">' + x0 + '</td>';
            bar += `<td style="border: 1px solid;">` + data[i]["nameuser"] + `</td>
                        <td colspan="3">
	                    <table class="table" style ="width: 100%">
	                        <tbody>`;
            for (var a = 0; a < data[i]["data"].length; a++) {
                bar += `<tr style="border: solid;">
                                <td style="width: 15%;">` + data[i]["data"][a]["nameitem"] + `</td>
	                            <td style="width: 15%;">` + data[i]["data"][a]["sku"] + `</td>
	                            <td style="width: 15%;">` + formatnum(parseFloat(data[i]["data"][a]["qty"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;">` + formatnum(parseFloat(data[i]["data"][a]["price"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;">` + data[i]["data"][a]["discrp"].replaceAll('.0000', "") + `</td>
	                            <td style="width: 15%;">` + formatnum(parseFloat(data[i]["data"][a]["pph"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                            <td style="width: 15%;">` + formatnum(parseFloat(data[i]["data"][a]["grand"].replaceAll('.0000', "")).toFixed(0)) + `</td>
	                        </tr>`
            }
            bar += `</tbody>
	                        </table>
	                    </td>`
            bar += '</tr>';
            totalqty = Number(totalqty) + Number(x1.replace(',', ''));
            totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
        }
        baris += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        bar += `<tr>
				    	<td colspan="5">Total Item</td>
				    	<td colspan='5' style="text-align:left">` + formatnum(parseFloat(totalqty).toFixed(0)) + `</td>
				    </tr>
				    <tr>
				    	<td colspan="6">Total Price</td>
				    	<td colspan='4' style="text-align:left">` + formatnum(parseFloat(totalprice).toFixed(0)) + `</td>
				    </tr>`
        $('#xdetail').html(baris);
        $('#prt').html(bar);
    }
</script>