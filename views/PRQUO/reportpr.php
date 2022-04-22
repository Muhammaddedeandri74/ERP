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
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Purchase Request Report</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">REQUEST PURCHASE REPORT</p>
</div>
<?php
$status = array('Waiting', 'Process', 'Finish', 'Cancel');
?>
<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('PrQuo/reportpr') ?>" class="btn bay fw btn-transparent">REQUEST PURCHASE</a>
                    <a href="<?= base_url('PrQuo/reportpo') ?>" class="btn fw btn-transparent">PURCHASE ORDER</a>
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
                    <form action="<?php echo base_url('PrQuo/reportpr') ?>" method="post">
                        <div class="row pt-4">
                            <div class="col-6" style="margin-left: 1vw;">
                                <div class=" input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codepr">Request NO</option>
                                        <!-- <option class="slc" value="namesupp">Supplier</option>
                                        <option class="slc" value="namauser">Issue By</option> -->
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Order NO dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p>Dari</p>
                                                <input type="text" name="date1" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p>Hingga</p>
                                                <input type="text" name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
                                                <a href="<?php echo base_url('PrQuo/reportpr') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
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
                            <div class="col"></div>
                            <div class="col-2" style="margin-top: 13vh;">
                                <!-- <a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a> -->
                                <a class="btn btn-outline-success" id="btn_exportexcel" style="margin-left: 130px;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                <!-- <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th>NO </th>
                                <th>Request NO</th>
                                <th>Request Date</th>
                                <th>Supplier</th>
                                <th>Item Count</th>
                                <th>Total Request</th>
                                <th>Status</th>
                                <th>Issue By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data != "Not Found") : $a = 1 ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $key["codepr"] ?></td>
                                        <td><?php echo $key["datepr"] ?></td>
                                        <td><?php echo $key["namesupp"] ?></td>
                                        <td><?php echo $key["itemcount"] ?></td>
                                        <td><?php echo number_format($key["totalpr"], 0, "", ",") ?></td>
                                        <td><?php echo $key["statuspr"] ?></td>
                                        <td><?php echo $key["nameuser"] ?></td>
                                        <td><a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key['idpr'] ?> )" class="btn btn-secondary">Detail</a></td>
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
                                    <th style="border-style:solid;background-color: purple;color: white">NO </th>
                                    <th style="border-style:solid;background-color: purple;color: white">Request NO</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Request Date</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Supplier</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Item Count</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Total Request</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Status</th>
                                    <th style="border-style:solid;background-color: purple;color: white">Issue By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data != "Not Found") : $a = 1 ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td style="border: solid;"><?php echo $a++ ?></td>
                                            <td style="border: solid;"><?php echo $key["codepr"] ?></td>
                                            <td style="border: solid;"><?php echo $key["datepr"] ?></td>
                                            <td style="border: solid;"><?php echo $key["namesupp"] ?></td>
                                            <td style="border: solid;"><?php echo $key["itemcount"] ?></td>
                                            <td style="border: solid;"><?php echo number_format($key["totalpr"], 0, "", ",") ?></td>
                                            <td style="border: solid;"><?php echo $key["statuspr"] ?></td>
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
</div>
<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('CounterController/konfirmso') ?>">
                <div class="modal-header" style="background-color : #3C2E8F; color: white">
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
                                                <div style="width: 40%;" id="head6">
                                                    <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                        <span style="color: #3C2E8F" class="fn">Shopee</span>
                                                    </p>
                                                </div>
                                                <div style="width: 30%;" id="head7">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                        <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                    </p>
                                                </div>
                                                <div style="width: 30%;" id="head8">
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
                                                <th scope="col">Qty</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Subtotal</th>

                                                <!-- <th scope="col">Action</th> -->
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
            </form>
        </div>
    </div>
</div>


<script language="javascript">
    $('#data').hide();

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "reportpr.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function printdata() {
        var printContents = document.getElementById("cards").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idpr"] == x) {
                x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));


                $('#head1').html(` <p class="fw">No. Request <br> <span class="fn">` + data[i]["codepr"] + `</span></p>`)
                $('#head2').html(` <p class="fw">Nama Pemesan <br> <span class="fn">` + data[i]["nameuser"] + `</span></p>`)
                $('#head3').html(` <p class="fw p-3">Supplier<br><span style="color: #3C2E8F" class="fn">` + data[i]["namesupp"] + `</span></p>`)
                $('#head4').html(` <p class="fw p-3">Request Date<br><span style="color: #3C2E8F" class="fn">` + data[i]["datepr"] + `</span></p>`)
                $('#head5').html(` <p class="fw p-3">Item Count<br><span style="color: #3C2E8F" class="fn">` + x1 + ` Product</span></p>`)


                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('PrQuo/getpr') ?>",
                    data: 'id=' + x,
                    dataType: 'json',
                    success: function(hasil) {
                        console.log(hasil)
                        x2 = formatnum(parseFloat(hasil["headertrans"]["subtotal"]).toFixed(0));
                        x3 = formatnum(parseFloat(hasil["headertrans"]["ppntotal"]).toFixed(0));
                        x4 = formatnum(parseFloat(hasil["headertrans"]["totalpr"]).toFixed(0));
                        $('#head6').html(` <p class="fw p-3">SubTotal Request<br><span style="color: #3C2E8F" class="fn">` + x2 + `</span></p>`)
                        $('#head7').html(` <p class="fw p-3">Total PPN Request<br><span style="color: #3C2E8F" class="fn">` + x3 + `</span></p>`)
                        $('#head8').html(` <p class="fw p-3">Total Request<br><span style="color: #3C2E8F" class="fn">` + x4 + `</span></p>`)


                        var baris = '';
                        for (var a = 0; a < hasil["detailtrans"].length; a++) {
                            baris += `<tr>
                                    <td>` + hasil["detailtrans"][a]["nameitem"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["sku"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["qty"].replace(".0000", "") + `</td>
                                    <td>` + hasil["detailtrans"][a]["price"].replace(".0000", "") + `</td>
                                    <td>` + hasil["detailtrans"][a]["subpr"].replace(".0000", "") + `</td>
                                </tr>`
                        }

                        $('#boodx').html(baris)
                    }
                });
            }
        }
    }
</script>