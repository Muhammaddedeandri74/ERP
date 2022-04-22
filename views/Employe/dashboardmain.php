<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"> </script>

<style>
    .bgdas {
        border-radius: 21px 21px 0px 0px;
        background-image: url(<?= base_url('assets/img/bnr.png') ?>);
        background-size: cover;
    }

    .cw {
        color: white;
        border-radius: 10px;
    }

    .lhfb {
        line-height: 0.8rem;
        font-size: 40px;
    }

    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
    }

    .tu {
        text-transform: uppercase;
        color: white;
    }

    .st {
        text-align: right;
        font-size: 20px;
    }

    .tb {
        text-transform: uppercase;
    }

    .fbfw {
        font-weight: bold;
        font-size: 16px;
    }

    .fsfw {
        font-weight: bold;
        font-size: 22px;
    }

    table {
        border-collapse: collapse;
        border-radius: 0.5em;
        overflow: hidden;
    }
</style>
<div class="container-xxl pt-4" style="padding-left: 6vw;">
    <div class="row d-flex justify-content-between">
        <div class="col-8">
            <div class="card border-0 bgdas mb-3">
                <div class="card-body">
                    <div class="p-3">
                        <p style="background-color: white; color: #8f2e80; font-size: 20px" class="badge rounded-pill tu">Dashboard</p>
                        <div class="lh-1">
                            <P class="text-white">Halo, <?= $data["fullname"] ?></P>
                            <p class="tu" style="font-size: 20px;">Selamat Datang Di <b>Panel Utama</b> </p>
                        </div>
                        <p class="tu">Cek progress penjualan hari ini</p>
                    </div>
                </div>
            </div>
            <!-- <div class="row d-flex justify-content-between mb-3"> -->
            <!-- <div class="col-8">
                    <p class="mt-3">
                        <?php
                        $tgl = date('l, d-m-Y');
                        echo $tgl;
                        ?>
                    </p>
                </div> -->
            <div class="row d-flex justify-content-between mb-3">
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-4">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periode</p>
                                    <input placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2" value="<?php echo $finish ?>">
                                </div>
                                <div class="col-2">
                                    <p>&nbsp;</p>
                                    <div class="d-flex justify-content-around">
                                        <!-- <a style="text-decoration: none" class="btn btn-outline-danger mr-4" onclick="resets()">Reset</a> -->
                                        <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>&nbsp;</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">

                </div>
            </div>
            <!-- <div class="col-4">
                    <div class="mb-3 row mt-3">
                        <label for="inputPassword" class="col-sm-6 col-form-label">Filter berdasarkan</label>
                        <div class="col-sm-6">
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>Hari ini</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" style="row-gap: 16px;">
                <div class="col">
                    <div class="p-3 cw" style="background-color: #2E4C6D;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($salesorder == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($salesorder) ?></p>
                        <?php } ?>
                        <p>Sales Order</p>
                    </div>
                </div>
                <br>
                <div class="col ">
                    <div class="p-3 cw" style="background-color:green;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($waiting == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($waiting) ?></p>
                        <?php } ?>
                        <p>Sales Order Waiting </p>
                    </div>
                </div>
                <br>
                <div class="col">
                    <div class="p-3 cw" style="background-color: red;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($pending == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($pending) ?></p>
                        <?php } ?>
                        <p>Sales Order Pending</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color:brown;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($process == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($process) ?></p>
                        <?php } ?>
                        <p>Sales Order Process</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color:#DEB887	;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($cancel == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($cancel) ?></p>
                        <?php } ?>
                        <p>Sales Order Cancel</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color:#00FFFF;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($finis == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($finis) ?></p>
                        <?php } ?>
                        <p>Sales Order Finish</p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 cw" style="background-color: purple; cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($quotation == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($quotation) ?></p>
                        <?php } ?>
                        <p>Quotation</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color: blueviolet;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($data5 == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($data5) ?></p>
                        <?php } ?>
                        <p>Customers</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color: #396EB0;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($po == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($po) ?></p>
                        <?php } ?>
                        <p>Purchase Order</p>
                    </div>
                </div>
                <div class="col br">
                    <div class="p-3 cw" style="background-color: #FC997C;cursor: pointer">
                        <p class="st"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                        <?php if ($invoice == "Not Found") { ?>
                            <p class="lhfb">0</p>
                        <?php } else { ?>
                            <p class="lhfb"><?= count($invoice) ?></p>
                        <?php } ?>
                        <p>Invoice</p>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row d-flex justify-content-between">
                <div class="col-5">
                    <div style="margin-bottom: 6vh;">
                        <table class="table p-0 m-0">
                            <thead class="br" style="background-color: #EADEDE;">
                                <tr>
                                    <th>Top Selling Product</th>
                                    <th></th>
                                    <th scope="col"><a style="color: black;text-decoration: none" href="<?php echo base_url('Employe/salesorder') ?>">Lihat Semua <i class="fa fa-chevron-right" aria-hidden="true"></i></a></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th style="width: 30%">SKU</th>
                                    <th style="width: 50%">Nama Produk</th>
                                    <th style="width: 20%">Terjual</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 53vh">
                            <table class="table p-0 m-0">
                                <tbody id="bodyz">
                                    <?php $Terjual = array();
                                    if ($salesorder == "Not Found") { ?>

                                    <?php } else { ?>
                                        <?php $a = 0;
                                        ?>
                                        <?php foreach ($salesorder as $key) : ?>
                                            <?php foreach ($key['data'] as $keyz) : ?>
                                                <?php
                                                $f['sku'] = $keyz['sku'];
                                                $f['nameitem'] = $keyz['nameitem'];
                                                $f['qty'] = $keyz['qty'];
                                                array_push($Terjual, $f);
                                                ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div style="margin-bottom: 6vh;">
                        <table class="table">
                            <thead class="br" style="background-color: #EADEDE;">
                                <tr>
                                    <th colspan="4">Sales Order List</th>
                                    <th scope="col"><a style="color: black;text-decoration: none" href="<?php echo base_url('Employe/salesorder') ?>">Lihat Semua <i class="fa fa-chevron-right" aria-hidden="true"></i></a></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 53vh">
                            <table class="table p-0 m-0">
                                <tbody>
                                    <?php if ($salesorder == "Not Found") { ?>

                                    <?php } else { ?>
                                        <?php $a = 0;
                                        krsort($salesorder); ?>
                                        <?php $i = 1;
                                        foreach ($salesorder as $key) : ?>
                                            <?php if ($key['statusorder'] != 'Pending') : ?>
                                                <?php if ($a < 10) : $a++; ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $key['namecomm'] ?></td>
                                                        <td><?= $key['dateso'] ?></td>
                                                        <td><?= $key['statusorder'] ?></td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="detail(<?php echo $key['idso'] ?>)">Detail <i class=" fa fa-external-link" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div id="line_top_x"></div> -->
                </div>

            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-12">
                    <div style="margin-bottom: 6vh;">
                        <table class="table p-0 m-0">
                            <thead class="br" style="background-color: #EADEDE;">
                                <tr>
                                    <th colspan="6">Top Jasa Pengiriman</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th style="width:10%;">Jasa Pengiriman</th>
                                    <th style="width:10%;">Waiting</th>
                                    <th style="width:10%;">Pending</th>
                                    <th style="width:10%;">Process</th>
                                    <th style="width:10%;">Finish</th>
                                    <th style="width:10%;">Cancel</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 47vh">
                            <table class="table p-0 m-0">
                                <tbody id="bodyz">
                                    <?php if ($jasa == "Not Found") { ?>
                                    <?php } else { ?>
                                        <?php $a = 0;
                                        krsort($jasa); ?>
                                        <?php $i = 1;
                                        foreach ($jasa as $key) : ?>
                                            <tr>
                                                <?php if ($key['jasapengirim'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['jasapengirim'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">Tidak Ada Jasa Pengiriman</td>
                                                <?php endif ?>
                                                <?php if ($key['waiting'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['waiting'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">0</td>
                                                <?php endif ?>
                                                <?php if ($key['pending'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['pending'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">0</td>
                                                <?php endif ?>
                                                <?php if ($key['process'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['process'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">0</td>
                                                <?php endif ?>
                                                <?php if ($key['finish'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['finish'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">0</td>
                                                <?php endif ?>
                                                <?php if ($key['cancel'] != "") : ?>
                                                    <td style="width:10%;"><?= $key['cancel'] ?></td>
                                                <?php else : ?>
                                                    <td style="width:10%;">0</td>
                                                <?php endif ?>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php } ?>
                                    <tr>
                                        <th style="width:10%;">Total :</th>
                                        <?php if ($waiting != "Not Found") : ?>
                                            <th style="width:10%;"><?= count($waiting) ?></th>
                                        <?php else : ?>
                                            <th style="width:10%;">0</th>
                                        <?php endif ?>
                                        <?php if ($pending != "Not Found") : ?>
                                            <th style="width:10%;"><?= count($pending) ?></th>
                                        <?php else : ?>
                                            <th style="width:10%;">0</th>
                                        <?php endif ?>
                                        <?php if ($process != "Not Found") : ?>
                                            <th style="width:10%;"><?= count($process) ?></th>
                                        <?php else : ?>
                                            <th style="width:10%;">0</th>
                                        <?php endif ?>
                                        <?php if ($finis != "Not Found") : ?>
                                            <th style="width:10%;"><?= count($finis) ?></th>
                                        <?php else : ?>
                                            <th style="width:10%;">0</th>
                                        <?php endif ?>
                                        <?php if ($cancel != "Not Found") : ?>
                                            <th style="width:10%;"><?= count($cancel) ?></th>
                                        <?php else : ?>
                                            <th style="width:10%;">0</th>
                                        <?php endif ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-12">
                    <div style="margin-bottom: 6vh;">
                        <table class="table p-0 m-0">
                            <thead class="br" style="background-color: #EADEDE;">
                                <tr>
                                    <th colspan="6">Total Penjualan</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th style="width: 10%;;">Tanggal Penjualan</th>
                                    <th style="width: 10%;;">Total Transaksi</th>
                                    <th style="width: 10%;;">Total Penjualan Item</th>
                                    <th style="width: 10%;;">Sub Total</th>
                                    <th style="width: 10%;;">Discount</th>
                                    <th style="width: 10%;;">Total Price</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 47vh">
                            <table class="table p-0 m-0">
                                <tbody>
                                    <?php if ($salesorder != "Not Found") { ?>
                                        <?php $a = 0;
                                        krsort($salesorder); ?>
                                        <?php $i = 1;
                                        foreach ($salesorder as $key) : ?>
                                            <?php if ($a < 10) : $a++; ?>
                                                <tr>
                                                    <td style="width: 10%;"><?= $key['dateso'] ?></td>
                                                    <td style="width: 10%;">1</td>
                                                    <td style="width: 10%;"><?= $key['totalso'] ?></td>
                                                    <td style="width: 10%;">Rp. <?= number_format($key["subtotal"], 0, "", ",") ?></td>
                                                    <td style="width: 10%;"><?= $key['discs'] ?></td>
                                                    <td style="width: 10%;">Rp. <?= number_format($key["totalprice"], 0, "", ",") ?></td>
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
        <div class="col-4">
            <div class="card bays mb-3">
                <div class="row d-flex justify-content-between mt-3 ml-3">
                    <div class="col-8">
                        <p class="fsfw">Waiting Approval</p>
                    </div>
                    <div class="col-4 mt-2">
                        <a style="color: black;text-decoration: none" href="<?php echo base_url('Employe/salesorder') ?>">Lihat Semua <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <center>
                    <hr class="col-11">
                </center>
                <div class="card-body p-0 px-3 mb-3 ">
                    <?php if ($salesorder == "Not Found") { ?>

                    <?php } else { ?>
                        <?php $i = 0; ?>
                        <?php foreach ($salesorder as $key) : ?>
                            <?php if ($key['statusorder'] == "Waiting") : ?>
                                <?php if ($i < 5) : $i++; ?>
                                    <div class="card bays mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-1-half">
                                                    &nbsp;<i class="btn fa fa-file-text-o py-3 px-3" aria-hidden="true" style="background-color: #8f2e80; color: white; border-radius:0px;"></i>
                                                </div>
                                                <div class="col-5" style="line-height: 0.2rem;">
                                                    <p><?= $key['namecomm'] ?></p>
                                                    <p>Order no. #<?= $key['codeso'] ?></p>
                                                    <p><?= $key['dateso'] ?></p>
                                                </div>
                                                <div class="col-4" style="line-height: 0.5rem;">
                                                    <p>Order Qty</p>
                                                    <p><?= count($key['data']) ?> item</p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="btn btn-light fa fa-ellipsis-h" data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="detail(<?php echo $key['idso'] ?>)" aria-hidden=" true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php } ?>
                </div>
            </div>
            <div class="card bays">
                <div class="row d-flex justify-content-between mt-3 ml-3">
                    <div class="col-7 pt-2" style="line-height: 1rem;">
                        <p class="fsfw tb ">Item in stock</p>
                    </div>
                    <div class="col-4 pt-2">
                        <select onchange="change(this.value)" class="form-select form-control" aria-label="Default select example">
                            <option value="warehouse">Gudang Utama</option>
                            <option value="counter">Counter</option>
                        </select>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
                <center>
                    <hr class="col-11">
                </center>
                <div class="card-body p-0 px-3 mb-3 " id="warehouse">
                    <?php if ($data7 == "Not Found") { ?>

                    <?php } else { ?>
                        <?php $a = 0; ?>
                        <?php foreach ($data7 as $key) : ?>
                            <?php if ($a < 5) : $a++; ?>
                                <div class="card bays mb-3">
                                    <div class="card-body p-0 pl-3 pt-4">
                                        <div class="row">
                                            <div class="col-1">
                                                <?php if ($key['qtyactual'] - $key['qtyso'] <= 0) { ?>
                                                    <p class="btn py-3 px-3" style="background-color: red; color: white; border-radius:0px;"></p>
                                                <?php } else if ($key['qtyactual'] - $key['qtyso'] > 0 &&  $key['qtyactual'] - $key['qtyso'] <= $key['minstock']) { ?>
                                                    <p class="btn py-3 px-3" style="background-color: yellow; color: white; border-radius:0px;"></p>
                                                <?php } else { ?>
                                                    <p class="btn py-3 px-3" style="background-color: green; color: white; border-radius:0px;"></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-9 fbfw pt-1" style="line-height: 0.2rem;">
                                                <p><?= $key['nameitem'] ?></p>
                                                <p>SKU <?= $key['sku'] ?></p>
                                            </div>
                                            <div class="col-2" style="line-height: 0.4rem;">
                                                <p class="pl-1">PCS</p>
                                                <p class="badge badge-dark text-white rounded-pill py-2 px-2"><?= $key['qtyactual'] - $key['qtyso'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>

                        <center>
                            <a class="btn btn-outline-info" href="<?php echo base_url('reporting/stockcard') ?>" style="font-weight: 600;cursor: pointer"> Muat Lebih Banyak </a>
                        </center>
                    <?php } ?>
                </div>
                <div class="card-body p-0 px-3 mb-3 " id="container">
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="card bays">
                <div style="margin-bottom: 6vh;">
                    <table class="table">
                        <thead class="br" style="background-color: #EADEDE;">
                            <tr>
                                <th colspan="4">Jumlah Sales Order</th>
                            </tr>
                        </thead>

                    </table>
                    <div style="overflow-y: scroll;height: 47vh">

                        <?php
                        $tahun = "";            // string kosong untuk menampung data tahun
                        $total = null;    // nilai awal null untuk menampung data total siswa

                        // looping data dari $chartSiswa
                        if ($chartbar != "Not Found") {
                            foreach ($chartbar as $chart) {
                                $status        = $chart["statusorder"];
                                $tahun        .= "'$status'" . ",";
                                $jumlah1        = $chart["jumlah"];
                                $total        .= "'$jumlah1'" . ",";
                            }
                        }
                        ?>
                        <canvas id="myChart" style="width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <br>
            <div class="card bays">
                <div style="margin-bottom: 6vh;">
                    <table class="table">
                        <thead class="br" style="background-color: #EADEDE;">
                            <tr>
                                <th colspan="4">Jumlah Sales Order</th>
                            </tr>
                        </thead>

                    </table>
                    <div style="overflow-y: scroll;height: 53vh" id="piechart"></div>
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
<br>
<br>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
    $('#counter').hide();
    $('#warehouse').show();

    function change(x) {
        if (x == 'warehouse') {
            $('#counter').hide();
            $('#warehouse').show();
        } else {
            $('#counter').show();
            $('#warehouse').hide();
        }


    }

    function detail(x) {

        var data = <?php echo json_encode($salesorder) ?>;
        if (data != "Not Found") {
            var datas = data.length;
        } else {
            var datas = 0;
        }

        var baris = '';
        var bar = '';

        for (var i = 0; i < datas; i++) {
            console.log(data[i]["idso"]);
            console.log(x);
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

    var users = <?php echo json_encode($Terjual) ?>;
    var baris = '';
    let result = [];
    users.forEach(function(a) {
        if (!this[a.sku]) {
            this[a.sku] = {
                sku: a.sku,
                nameitem: a.nameitem,
                qty: 0
            };
            result.push(this[a.sku]);
        }
        this[a.sku].qty += a.qty;
    }, Object.create(null));

    var sortedObjs = _.sortBy(result, 'qty').reverse();;

    var b = 0;
    for (var i = 0; i < sortedObjs.length; i++) {
        if (b < 8) {
            baris += `
            <tr>
                                        <td style="width: 30%">` + sortedObjs[i]["sku"] + `</td>
                                        <td style="width: 50%">` + sortedObjs[i]["nameitem"] + `</td>
                                        <td style="width: 35%">` + sortedObjs[i]["qty"] + `</th>
                                    </tr>
            `

        }


    }
    $('#bodyz').html(baris);





    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawAxisTickColors);

    function drawAxisTickColors() {
        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Time of Day');
        data.addColumn('number', 'Motivation Level');
        data.addColumn('number', 'Energy Level');

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
            title: 'DAILY SALES INCOME',
            focusTarget: 'category',
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                },
                textStyle: {
                    fontSize: 14,
                    color: '#053061',
                    bold: true,
                    italic: false
                },
                titleTextStyle: {
                    fontSize: 18,
                    color: '#053061',
                    bold: true,
                    italic: false
                }
            },
            vAxis: {
                title: '',
                textStyle: {
                    fontSize: 18,
                    color: '#67001f',
                    bold: false,
                    italic: false
                },
                titleTextStyle: {
                    fontSize: 18,
                    color: '#67001f',
                    bold: true,
                    italic: false
                }
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    google.charts.load('current', {
        'packages': ['line']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'year');
        data.addColumn('number', 'XL');
        data.addColumn('number', 'SIMPATI');
        data.addColumn('number', 'Three');

        data.addRows([
            [1, 37.8, 80.8, 41.8],
            [2, 30.9, 69.5, 32.4],
            [3, 25.4, 57, 25.7],
            [4, 11.7, 18.8, 10.5],
            [5, 11.9, 17.6, 10.4],
            [6, 8.8, 13.6, 7.7],
            [7, 7.6, 12.3, 9.6],
            [8, 12.3, 29.2, 10.6],
            [9, 16.9, 42.9, 14.8],
            [10, 12.8, 30.9, 11.6],
            [11, 5.3, 7.9, 4.7],
            [12, 6.6, 8.4, 5.2],
            [13, 4.8, 6.3, 3.6],
            [14, 4.2, 6.2, 3.4]
        ]);

        var options = {
            chart: {
                title: 'Sales Insight',
            },
            width: 700,
            height: 500,
            axes: {
                x: {
                    0: {
                        side: 'top'
                    }
                }
            }
        };

        var chart = new google.charts.Line(document.getElementById('line_top_x'));

        chart.draw(data, google.charts.Line.convertOptions(options));
    }

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {

        var data = google.visualization.arrayToDataTable([
            ['Effort', 'Amount given'],
            ['My all', 100],
        ]);

        var options = {
            pieHole: 0.5,
            pieSliceTextStyle: {
                color: 'black',
            },
            legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
    }

    function apply() {
        if ($('#date2').val() != "") {
            window.location.replace("<?php echo base_url('AuthControler/employe?finish=') ?>" + $('#date2').val());
        } else {
            alert("Masukan Tanggal Dengan Benar");
        }
    }

    function resets() {

        window.location.replace("<?php echo base_url('AuthControler/employe?finish=') . date('Y-m-d') . '' ?>");
    }

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['statusorder', 'jumlah'],
            <?php
            if ($persentase != "Not Found") {
                foreach ($persentase as $datax) {
                    echo "['" . $datax['statusorder'] . "'," . $datax['jumlah'] . "],";
                }
            }
            ?>
        ]);
        var options = {
            title: 'Daftar Persentase Salesorder',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    const chartSalesorder = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(chartSalesorder, {
        type: 'bar',
        data: {
            labels: [<?= $tahun; ?>], // data tahun sebagai label dari chart
            datasets: [{
                label: 'Top Salesorder',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?= $total; ?>] //data siswa sebagai data dari chart
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>