<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"> </script>
<style>
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
<!-- <div style="padding-left: 6vw;"><?= print_r($data2[1]) ?></div> -->
<div class="container-xxl pt-4" style="padding-left: 5%;background-color: #3C2E8F;">
    <div class="row d-flex justify-content-between">
        <div class="col-7">
            <p class="tu font-weight-bold " style="font-size: 13px">Sales Order / terbaru</p>
            <p class="tu font-weight-bold " style="font-size: 25px">Global sales order</p>
        </div>
        <div class="col-10">
            <div class="row pt-1 pb-3 d-flex justify-content-between text-white">
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data3 == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else { ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= count($data3) ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('Employe/quotationlist') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">New Quotation</p>
                </div>
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data3 == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else {
                            $waiting = 0; ?>
                            <?php foreach ($data3 as $key) : ?>
                                <?php if ($key["statusquo"] == "Waiting") : ?>
                                    <?php $waiting = $waiting + 1; ?>
                                <?php endif ?>
                            <?php endforeach ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= $waiting ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('Employe/quotationlist') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">Waiting Quotation</p>
                </div>
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data2 == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else { ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= count($data2) ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('Employe/salesorder') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">New Order</p>
                </div>
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data2 == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else {
                            $pending = 0;
                            foreach ($data2 as $key) {
                                if ($key["statusorder"] == "Pending") {
                                    $pending++;
                                }
                            }

                        ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= $pending ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('Employe/pendinglist') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">Order Pending</p>
                </div>
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data4 == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else { ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= count($data4) ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('SalesinvoiceControler') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">Invoice</p>
                </div>
                <div class="col br brl">
                    <div class="d-flex justify-content-between">
                        <?php if ($data == "Not Found") { ?>
                            <p class="lhfb pl-1 pt-4 pb-1">0</p>
                        <?php } else { ?>
                            <p class="lhfb pl-1 pt-4 pb-1"><?= count($data) ?></p>
                        <?php } ?>
                        <a class="pl-1 pb-1" href="<?php echo base_url('CounterController/terkirim') ?>" style="cursor: pointer;text-decoration: none; color:white;padding-top: 1.2rem">Lihat <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                    </div>
                    <p style="text-align: center;">Delivery Finish</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containter-xxl mx-5 mt-3" style="padding-left: 2%;">
    <div class="row d-flex justify-content-between mb-3">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-body bays">
                    <div class="d-flex justify-content-between">
                        <div class="col-4">
                            <p>Dari</p>
                            <input placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1" value="<?php echo $start ?>">
                        </div>
                        <div class="col-4">
                            <p>Hingga</p>
                            <input placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2" value="<?php echo $finish ?>">
                        </div>
                        <div class="col-2 pt-4 d-flex justify-content-between">
                            <a style="text-decoration: none;color: purple;cursor: pointer;" class="pr-2" onclick="resets()">Reset</a>
                        </div>
                        <div class="col-2 pt-3">
                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">

        </div>
    </div>
    <div class="row d-flex justify-content-between mt-3">
        <div class="col-12">
            <div class="card bays">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="pt-4 pl-3" style="line-height: 0.8rem;">
                            <p class="tb"><b>Riwayat Penjualan</b></p>
                            <!-- <span>10 Transaksi Dilakukan</span> -->
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- <p style="text-align: right;" class="tb pt-4 pr-4 text-muted">Update a Day AGO</p> -->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table m-0">
                        <thead class="text-white" style="background-color: #3C2E8F;text-align: center;">
                            <tr>
                                <th style="width: 15%">No. SO</th>
                                <th style="width: 15%">Tanggal</th>
                                <th style="width: 20%">Tipe Order</th>
                                <th style="width: 21%">Delivery Date</th>
                                <th style="width: 21%">Action</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="overflow-y: scroll;height: 30vh">
                        <table class="table">
                            <tbody style="text-align: center;">
                                <?php if ($data2 == "Not Found") { ?>
                                <?php } else { ?>
                                    <?php $i = 0;
                                    rsort($data2); ?>
                                    <?php foreach ($data2 as $key) : ?>
                                        <?php if ($i < 10) : $i++; ?>
                                            <tr>
                                                <td style="width: 15%"><?= $key['codeso'] ?></td>
                                                <td style="width: 15%"><?= $key['dateso'] ?></td>
                                                <td style="width: 20%"><?= $key['nametypeso'] ?></td>
                                                <td style="width: 22%"><?= $key['delivdate'] ?></td>
                                                <td style="width: 18%"><a style="cursor: pointer;text-decoration: none;color: black" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)" href="">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
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
    <div class="row justify-content-between mt-3">
        <div class="col-12 ">
            <div class="card bays">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="pt-4 pl-3" style="line-height: 0.8rem;">
                            <p class="tb "><b>Data Product Terjual</b></p>
                            <!-- <span>10 Transaksi Dilakukan</span> -->
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- <p style="text-align: right;" class="tb pt-4 pr-4 text-muted">Update a Day AGO</p> -->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table m-0">
                        <thead class="text-white" style="background-color: #3C2E8F;text-align: center;">
                            <tr>
                                <th style="width: 15%">Nama Produk</th>
                                <th style="width: 15%">SKU</th>
                                <th style="width: 9%">Qty</th>
                                <th style="width: 9%">Harga Beli</th>
                                <th style="width: 9%">Harga Item</th>

                                <th style="width: 9%">Discount</th>
                                <th style="width: 9%">Total Harga</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="overflow-y: scroll;height: 30vh">
                        <table class="table">
                            <tbody style="text-align: center;" id="bodyx">
                                <?php $Terjual = array();
                                if ($data2 == "Not Found") { ?>

                                <?php } else { ?>
                                    <?php $a = 0;
                                    ?>
                                    <?php foreach ($data2 as $key) : ?>
                                        <?php if ($key["data"] != "Not Found") {
                                            foreach ($key['data'] as $keyz) : ?>
                                                <?php
                                                $f['sku'] = $keyz['sku'];
                                                $f['nameitem'] = $keyz['nameitem'];
                                                $f['pricebuyitem'] = $keyz['pricebuyitem'];
                                                $f['price'] = $keyz['price'];
                                                $f['vat'] = $keyz['vat'];
                                                $f['disc'] = $keyz['disc'];
                                                $f['totalprice'] = $keyz['totalprice'];
                                                $f['qty'] = $keyz['qty'];
                                                array_push($Terjual, $f);
                                                ?>
                                        <?php endforeach;
                                        }; ?>
                                    <?php endforeach ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between mt-3">
        <div class="col-12 ">
            <div class="card bays">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="pt-4 pl-3" style="line-height: 0.8rem;">
                            <p class="tb "><b>Total Penjualan</b></p>
                            <!-- <span>10 Transaksi Dilakukan</span> -->
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- <p style="text-align: right;" class="tb pt-4 pr-4 text-muted">Update a Day AGO</p> -->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table m-0">
                        <thead class="text-white" style="background-color: #3C2E8F;text-align: center;">
                            <tr>
                                <th style="width: 15%">Tanggal Penjualan</th>
                                <th style="width: 15%">Total Transaksi</th>
                                <th style="width: 15%">Total Penjualan Item</th>
                                <th style="width: 9%">Sub Total</th>
                                <th style="width: 9%">Disc</th>
                                <th style="width: 9%">Total Price</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="overflow-y: scroll;height: 30vh">
                        <table class="table">
                            <tbody style="text-align: center;" id="bodyxx">
                                <?php $record = array();
                                if ($data2 == "Not Found") { ?>

                                <?php } else { ?>
                                    <?php $a = 0;
                                    ?>
                                    <?php foreach ($data2 as $key) : ?>
                                        <?php
                                        $d['dateso'] = $key['dateso'];
                                        $d['qtyso'] = 1;
                                        $d['totalitem'] = $key['totalso'];
                                        $d['subtotal'] = $key['subtotal'];
                                        $d['disc'] = $key['discs'];
                                        $d['totalprice'] = $key['totalprice'];
                                        array_push($record, $d);
                                        ?>
                                    <?php endforeach ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                                <th scope="col">Harga Beli</th>
                                                <th scope="col">Ready Stock</th>
                                                <th scope="col">Qty. Order</th>
                                                <th scope="col">Harga Jual</th>
                                                <th scope="col">Balance</th>

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

<script>
    var data = <?php echo json_encode($record) ?>;

    var bariss = '';
    let results = [];
    data.forEach(function(a) {
        if (!this[a.dateso]) {
            this[a.dateso] = {
                dateso: a.dateso,
                qtyso: 0,
                totalitem: 0,
                subtotal: 0,
                disc: 0,
                totalprice: 0


            };
            results.push(this[a.dateso]);
        }
        this[a.dateso].qtyso += a.qtyso;
        this[a.dateso].totalitem += Number(a.totalitem);
        this[a.dateso].subtotal += Number(a.subtotal);
        this[a.dateso].disc += Number(a.disc);
        this[a.dateso].totalprice += Number(a.totalprice);
    }, Object.create(null));

    var sortedObjss = _.sortBy(results, 'dateso').reverse();;



    for (var i = 0; i < sortedObjss.length; i++) {
        bariss += `
            <tr>
                                        <td style="width: 15%" >` + sortedObjss[i]["dateso"] + `</td>
                                        <td style="width: 15%" >` + sortedObjss[i]["qtyso"] + `</td>
                                        <td style="width: 15%" >` + sortedObjss[i]["totalitem"] + `</th>
                                        <td style="width: 9%" >` + sortedObjss[i]["subtotal"] + `</th>
                                        <td style="width: 9%" >` + sortedObjss[i]["disc"] + `</th>
                                        <td style="width: 9%" >` + sortedObjss[i]["totalprice"] + `</th>
                                    </tr>
            `


    }
    $('#bodyxx').html(bariss);






    var users = <?php echo json_encode($Terjual) ?>;
    var baris = '';
    let result = [];
    users.forEach(function(a) {
        if (!this[a.sku]) {
            this[a.sku] = {
                sku: a.sku,
                nameitem: a.nameitem,
                qty: 0,
                pricebuyitem: 0,
                price: 0,
                disc: 0,
                totalprice: 0


            };
            result.push(this[a.sku]);
        }
        this[a.sku].qty += a.qty;
        this[a.sku].pricebuyitem += Number(a.pricebuyitem * a.qty);
        this[a.sku].price += Number(a.price * a.qty) + Number(a.vat * a.qty);
        this[a.sku].disc += Number(a.disc);
        this[a.sku].totalprice += Number(a.totalprice);
    }, Object.create(null));

    var sortedObjs = _.sortBy(result, 'qty').reverse();;

    var b = 0;
    for (var i = 0; i < sortedObjs.length; i++) {
        baris += `
            <tr>
                                        <td style="width: 15%" >` + sortedObjs[i]["nameitem"] + `</td>
                                        <td style="width: 15%" >` + sortedObjs[i]["sku"] + `</td>
                                        <td style="width: 9%" >` + sortedObjs[i]["qty"] + `</th>
                                        <td style="width: 9%" >` + sortedObjs[i]["pricebuyitem"] + `</th>
                                        <td style="width: 9%" >` + sortedObjs[i]["price"] + `</th>
                                        <td style="width: 9%" >` + sortedObjs[i]["disc"] + `</th>
                                        <td style="width: 9%" >` + sortedObjs[i]["totalprice"] + `</th>
                                    </tr>
            `


    }
    $('#bodyx').html(baris);


    function apply() {
        if ($('#date1').val() != "" || $('#date2').val() != "") {
            window.location.replace("<?php echo base_url('Employe?start=') ?>" + $('#date1').val() + "&finish=" + $('#date2').val());
        } else {
            alert("Masukan Tanggal Dengan Benar");
        }
    }


    function resets() {

        window.location.replace("<?php echo base_url('Employe?start=') . date('Y-m-d') . '&finish=' . date('Y-m-d') . '' ?>");
    }

    function detail(x) {

        var data = <?php echo json_encode($data2) ?>;

        console.log(data);
        var baris = '';
        var bar = '';

        for (var i = 0; i < data.length; i++) {
            if (data[i]["idso"] == x) {

                if (data[i]["statusorder"] == 'Waiting' || data[i]["statusorder"] == 'Cancel') {
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
                $('#qty').html(data[i]["totalso"] + ' Product');
                $('#tyso').html(data[i]["nametypeso"]);


                bar += `

                <table class="table ">
                <thead>
                    <tr>
                        <th style="border-style:solid;">No Pesanan</th>
                `
                if (data[i]['nopesanan'] != "") {
                    bar += `<th style="border-style:solid;">` + data[i]["nopesanan"] + `</th>`
                } else {
                    bar += `<th style="border-style:solid;">` + data[i]["codeso"] + `</th>`
                }
                bar += `		
                        
                    </tr>
                    <tr>
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
                    </tr>
                    `;




                for (var a = 0; a < data[i]["data"].length; a++) {
                    if (a % 2 == 0) {
                        baris += '<tr style="background :#eeeeee">';
                    } else {
                        baris += '<tr>'
                    }
                    baris += `
                                        <td >` + data[i]["data"][a]["nameitem"] + `</td>
                                        <td >` + data[i]["data"][a]["sku"] + `</td>
                                        <td >` + data[i]["data"][a]["pricebuyitem"] + `</td>
                                        <td >` + data[i]["data"][a]["qtyready"] + `</td>
                                        <td >` + data[i]["data"][a]["qty"] + `</td>
                                        <td >` + data[i]["data"][a]["totalprice"] + `</td>
                                        <td >` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
                                    </tr>

                        `
                    bar += `<tr>
                        <td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
                                        <td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
                                        <td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
                                        <td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
                                        <td style="border-style:solid;">` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
                                    
                                    </tr>

                    </tr>`
                }

                bar += `</tbody>
            </table>

            `
                $('#body').html(baris);
                $('#excel').html(bar);
                $('#excel').hide();
                console.log(baris)

            }
        }

    }
</script>