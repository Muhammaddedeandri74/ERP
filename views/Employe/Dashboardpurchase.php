<style>
    ::placeholder {
        color: white;
        font-size: 16px;
    }

    .tu {
        text-transform: uppercase;
        color: white;
    }

    .tb {
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .lhfb {
        line-height: 0.8rem;
        font-size: 30px;
    }

    .brl {
        border: 2px solid white;
        margin-left: 2vw;
    }

    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }
</style>
<div class="container-xxl pt-4" style="padding-left: 6vw;background-color: #3C2E8F;">
    <div class="row d-flex justify-content-between">
        <div class="col-6">
            <p class="tu font-weight-bold" style="font-size: 13px">Purchasing/ Terbaru</p>
            <p class="tu font-weight-bold" style="font-size: 25px">Purchasing</p>
        </div>
       <!--  <div class="col-6">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label text-white" style="text-align:right">Filter Pencarian</label>
                <div class="col-sm-9">
                    <input type="text" style="border: 2px solid white" placeholder="Cari Berdasarkan Customer atau lainnya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#xF002;" class="form-control col-8 fontAwesome bg-transparent text-white" id="inputPassword">
                </div>
            </div>
        </div> -->
        <div class="col-8">
            <div class="row pt-1 pb-3 d-flex justify-content-between text-white">
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <?php if ($data == "Not Found"){ ?>
                            <p class="lhfb">0</p> 
                        <?php } else { ?>
                        <p class="lhfb"><?= count($data) ?></p>
                        <?php } ?>
                        <div class="input-group d-flex justify-content-between">
                            <p>Purchase Order</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <?php if ($data2 == "Not Found"){ ?>
                            <p class="lhfb">0</p> 
                        <?php } else { ?>
                        <p class="lhfb"><?= count($data2) ?></p>
                        <?php } ?>
                        <div class="input-group d-flex justify-content-between">
                            <p>Request</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containter-xxl" style="padding-left: 6vw;">
    <div class="row d-flex justify-content-between mt-3">
        <!-- <div class="col-4">
            <div class="card bays">
                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="row d-flex justify-content-between">
                    <div class="col-8">
                        <p class="pt-4 pl-4"> <i class="btn fa fa-truck rounded-circle bg-primary text-white px-1 py-1" aria-hidden="true"></i> Siap</p>
                    </div>
                    <div class="col-4">
                        <p class="text-muted pt-4 pl-4">Lihat Semua</p>
                    </div>
                </div>
                <div class="card-body p-0 px-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Order</th>
                                <th scope="col">Outgoing NO.</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
        <div class="col-12" style="padding-right: 2vw;">
            <div class="card bays">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="pt-4 pl-3" style="line-height: 0.8rem;">
                            <p class="tb ">Penjualan Terakhir</p>
                            <!-- <span>10 Transaksi Dilakukan</span> -->
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- <p style="text-align: right;" class="tb pt-4 pr-4 text-muted">Update a Day AGO</p> -->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="text-white" style="background-color: #3C2E8F;">
                            <tr>
                                <th scope="col">No. Order</th>
                                <th scope="col">No. Req</th>
                                <th scope="col">Tgl. Order</th>
                                <th scope="col">Item</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data == "Not Found"){ ?>
                                
                            <?php } else { ?>
                            <?php $a = 0; ?>
                            <?php foreach ($data as $key) : ?>
                                <?php if ($a < 10) : $a++; ?>
                                    <tr data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key['idpo'] ?>)">
                                        <td><?= $key['codepo'] ?></td>
                                        <td><?= $key['codepr'] ?></td>
                                        <td><?= $key['datepo'] ?></td>
                                        <td><?= $key['itemcount'] ?></td>
                                        <td><?= $key['statuspo'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php } ?>
                        </tbody>
                    </table>
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
                                    <div class="col-7"> </div>
                                    <div class="col-5">
                                        <!--   <a class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                        <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
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

<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawTitleSubtitle);

    function drawTitleSubtitle() {
        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Time of Day');
        data.addColumn('number', 'Oktober');
        data.addColumn('number', 'September');

        data.addRows([
            [{
                v: [8, 0, 0],
                f: '8 am'
            }, 1, .25],
            [{
                v: [9, 0, 0],
                f: '9 am'
            }, 2, .5],
            [{
                v: [10, 0, 0],
                f: '10 am'
            }, 3, 1],
            [{
                v: [11, 0, 0],
                f: '11 am'
            }, 4, 2.25],
            [{
                v: [12, 0, 0],
                f: '12 pm'
            }, 5, 2.25],
            [{
                v: [13, 0, 0],
                f: '1 pm'
            }, 6, 3],
            [{
                v: [14, 0, 0],
                f: '2 pm'
            }, 7, 4],
            [{
                v: [15, 0, 0],
                f: '3 pm'
            }, 8, 5.25],
            [{
                v: [16, 0, 0],
                f: '4 pm'
            }, 9, 7.5],
            [{
                v: [17, 0, 0],
                f: '5 pm'
            }, 10, 10],
        ]);

        var options = {
            chart: {
                title: 'DAILY SALES COMPARISON',
            },
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            vAxis: {
                title: 'Rating (scale of 1-10)'
            }
        };

        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, options);
    }

    function konfirmorder(x) {

        var data = <?php echo json_encode($data) ?>;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idpo"] == x) {
                x1 = Number(data[i]["itemcount"]);
                $('#head1').html(` <p class="fw">No. Request <br> <span class="fn">` + data[i]["codepo"] + `</span></p>`)
                $('#head2').html(` <p class="fw">Nama Pemesan <br> <span class="fn">` + data[i]["nameuser"] + `</span></p>`)
                $('#head3').html(` <p class="fw p-3">Supplier<br><span style="color: #3C2E8F" class="fn">` + data[i]["namesupp"] + `</span></p>`)
                $('#head4').html(` <p class="fw p-3">Request Date<br><span style="color: #3C2E8F" class="fn">` + data[i]["datepo"] + `</span></p>`)
                $('#head5').html(` <p class="fw p-3">Item Count<br><span style="color: #3C2E8F" class="fn">` + x1 + ` Product</span></p>`)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('PrQuo/getpo') ?>",
                    data: 'id=' + x,
                    dataType: 'json',
                    success: function(hasil) {
                        console.log(hasil)
                        x2 = Number(hasil["headertrans"]["subtotal"]);
                        x3 = Number(hasil["headertrans"]["subtotal"]);
                        x4 = Number(hasil["headertrans"]["totalpo"]);
                        $('#head6').html(` <p class="fw p-3">SubTotal Request<br><span style="color: #3C2E8F" class="fn">` + x2 + `</span></p>`)
                        $('#head7').html(` <p class="fw p-3">Total PPN Request<br><span style="color: #3C2E8F" class="fn">` + x3 + `</span></p>`)
                        $('#head8').html(` <p class="fw p-3">Total Request<br><span style="color: #3C2E8F" class="fn">` + x4 + `</span></p>`)
                        var baris = '';
                        for (var a = 0; a < hasil["detailtrans"].length; a++) {
                            baris += `<tr>
                                    <td>` + hasil["detailtrans"][a]["nameitem"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["sku"] + `</td>
                                    <td>` + hasil["detailtrans"][a]["qty"].replace(".000000", "") + `</td>
                                    <td>` + hasil["detailtrans"][a]["price"].replace(".0000", "") + `</td>
                                    
                                </tr>`
                        }
                        $('#boodx').html(baris)
                    }
                });
            }
        }
    }
</script>