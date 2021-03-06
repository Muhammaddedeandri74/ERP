<form action="<?php echo base_url('MasterDataControler/editinvin') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
            </ol>
            <h3 class="text-white">Register Ingoing</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <input type="hidden" name="idin" id="idin">
            <input type="hidden" name="codein" id="codein">
            <div class="row mb-3">
                <div class="col-4">
                    <div class="row">
                        <label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. Transaksi</label>
                                <input type="text" name="codein" class="form-control" value="<?php echo $data9["codein"] ?>" readonly>
                                <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                            </div>
                        </div>
                        <div class="col-4 mb-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tipe Ingoing</label>
                            <!-- <select name="typein" id="myDIV" onchange="ubah(this.value)" class="form-select"> -->
                            <input type="text" id="myDIV" name="typein" class="form-control" value="<?php echo $data9["typein"] ?>" readonly>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8" id="namecustx">
                            <label for="" class="form-label">Supplier</label>
                            <input type="text" id="namecust" class="form-control" objectype="cust" list="xcust" value="<?php echo $data9["namecust"] ?>" name="namecust" autocomplete="off" readonly>
                            <input type="hidden" id="idcust" name="idcust" value="<?php echo $data9["idcust"] ?>">
                        </div>
                        <div class=" col-4 mb-3">
                        </div>
                    </div>
                    <div id="supplierx">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="" class="form-label">No. Purchase Order</label>
                                    <input type="hidden" class="form-control" id="idpo" name="idpo" value="<?php echo $data9["idpo"] ?>">
                                    <input type="text" id="codepo" name="codepo" class="form-control" value="<?php echo $data9["codepo"] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <p></p>
                                <!-- <a href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary mt-3" style="font-size:13px;" onclick="loaddatax()">Cari Data</a> -->
                            </div>
                        </div>

                    </div>
                    <div id="warehousex" style="display: none;">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="" class="form-label">Data Move WH</label>
                                    <input type="text" name="codemove" id="codeinvout" class="form-control" value="" autocomplete="off" readonly>
                                    <input type="hidden" name="idinvout" id="idinvout" class="form-control" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <p></p>
                                <a href="" data-mdb-toggle="modal" data-mdb-target="#modalgudang" class="btn btn-primary mt-3" onclick="loaddata()">Cari Data</a>
                            </div>
                        </div>
                    </div>
                    <div id="returnx" style="display: none;">
                    </div>
                </div>
                <div class="col-4">
                    <label for="" class="form-label fs-3 mb-3">Informasi Gudang & Mata Uang</label>
                    <div id="supplier">
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Gudang Penerima</label>
                                <select name="idwh1" id="" class="form-select" required>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="datein" id="date" value="<?php echo $data9["datein"] ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="" class="form-label">Mata Uang</label>
                                <select name="currency2" id="" class="form-select" required>
                                    <?php if ($data1 != "Not Found") : ?>
                                        <?php foreach ($data1 as $key) : ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">No. Surat Jalan</label>
                                <input type="text" name="nosuratjalan" id="nosuratjalan" value="<?php echo $data9["nosuratjalan"] ?>" class="form-control">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div id="warehouse" style="display: none;">
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Gudang Pengirim</label>
                                <select name="idwh" id="idwh" class="form-select" aria-label="Disabled select example">
                                    <option value="">Pilih</option>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                                <!-- <input type="text" name="idwh" id="idwhx" class="form-control"> -->
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Gudang Penerima</label>
                                <select name="idwh2" id="idwh2" class="form-select" aria-label="Disabled select example">
                                    <option value="">Pilih</option>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="datein1" id="datein1">
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Mata Uang</label>
                                <select name="currency1" id="" class="form-select" required>
                                    <?php if ($data1 != "Not Found") : ?>
                                        <?php foreach ($data1 as $key) : ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div id="return" style="display: none;">
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Gudang Penerima</label>
                                <select name="namewarehouse2" id="namewarehouse2" class="form-select" aria-label="select example">
                                    <option value="">Pilih</option>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="datein2" id="datein2" id="" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="" class="form-label">Mata Uang</label>
                                <select name="currency" id="" class="form-select" required>
                                    <?php if ($data1 != "Not Found") : ?>
                                        <?php foreach ($data1 as $key) : ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="col-5"></div>
                        </div>
                    </div>
                </div>
                <div class="col-4" id="action" style="display: none;">
                    <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-light" onclick="printDiv('invin')"><i class='bx bx-printer'>Cetak</i></button>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="suptable">
            <label for="" class="form-label fs-5 mt-3">Item/Produk</label>
            <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
            <table class="table table-bordered table-striped list-akses">
                <thead class="text-white text-center" style="background:#1143d8;">
                    <tr>
                        <th>SKU</th>
                        <th>Nama Item</th>
                        <th>Deskripsi</th=>
                        <th>Harga</th>
                        <th>Qty Po</th>
                        <th>Qty In</th>
                        <th>Selisih</th>
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="detailx">
                </tbody>
            </table>
            <div class="mr-4" style="text-align:right;">
                <button type="button" class="btn btn-primary" id="addorder" onclick="addorderx()" style="font-size:13px;">Update</button>
            </div>
        </div>
        <div class="row" id="movewhtable" style="display: none;">
            <label for="" class="form-label fs-5 mt-3">Item/Produk</label>
            <input type="hidden" id="line-transaksi1" name="line-transaksi" value="0" />
            <table class="table table-bordered table-striped list-akses">
                <thead class="text-white text-center" style="background:#1143d8;">
                    <tr>
                        <th>SKU</th>
                        <th>Nama Item</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Qty Out</th>
                        <th>Qty In</th>
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="detailmovewh">
                </tbody>
            </table>
            <div class="mr-4" style="text-align:right;">
                <!-- <button type="button" class="btn btn-primary" id="addorder" onclick="addorderx()">Update</button> -->
            </div>
        </div>
        <div class="row" id="returntable" style="display: none;">
            <label for="" class="form-label fs-5 mt-3">Item/Produk</label>
            <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
            <table class="table table-bordered table-striped list-akses">
                <thead class="text-white text-center" style="background:#1143d8;">
                    <tr>
                        <th>SKU</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Qty </th>
                        <th>Expire Date</th>
                        <th>Action</th=>
                    </tr>
                </thead>
                <tbody id="detailreturn">
                </tbody>
            </table>
            <div class="mr-4" style="text-align:right;">
                <!-- <button type="button" class="btn btn-primary" id="addorder" onclick="addorderx()">Buat Transaksi</button> -->
            </div>
        </div>
        <div class="row" id="initialtable" style="display: none;">
            <label for="" class="form-label fs-5 mt-3">Item/Produk</label>
            <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
            <table class="table table-bordered table-striped list-akses">
                <thead>
                    <tr>
                        <th style="background:#1143d8;color:white;text-align:center;">SKU</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Nama Item</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Deskripsi</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Harga</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Qty Po</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Qty In</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Selisih</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Expire Date</th>
                        <th style="background:#1143d8;color:white;text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody id="detailreturn" class="p-0">
                </tbody>
            </table>
            <div class="mr-4" style="text-align:right;">
                <!-- <button type="button" class="btn btn-primary" id="addorder" onclick="addorderx()">Buat Transaksi</button> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalgudang" tabindex="-1" aria-labelledby="modalgudangLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">DAFTAR MOVE ITEM</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-5">
                            <label for="" class="form-label">Pencarian</label>
                            <input type="text" class="form-control" placeholder="Cari berdasarkan customer">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">Mulai Dari</label>
                                    <input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-1" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped" id="table-user">
                            <thead>
                                <tr>
                                    <td style="text-align:center;">No. Outgoing (DO)</td>
                                    <td style="text-align:center;">Gudang Pengirim</td>
                                    <td style="text-align:center;">Qty Item</td>
                                    <td style="text-align:center;">Qty In</td>
                                    <td style="text-align:center;">Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td style="text-align:center;">Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailmove">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-8">
                                    <label for="" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                            <option value="codepo">No.Purchase Order</option>
                                        </select>
                                        <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select" id="statuspo" aria-label="Default select example">
                                        <option value="">Pilih Status Po</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Process">Process</option>
                                        <option value="Finish">Finish</option>
                                        <option value="Cancel">Cancel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">Mulai Dari</label>
                                    <input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="#" class="btn btn-primary mt-3" onclick="loaddatax()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-1" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped" id="table-user">
                            <thead>
                                <tr>
                                    <td>No. Purchase Order</td>
                                    <td>Tgl Order</td>
                                    <td>Tgl Delivery</td>
                                    <td>Qty PO</td>
                                    <td>Qty IN</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailpo">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bay" style="display: none;" id="invin">
        <div class="card-header pl-5 border-0">
            <div class="row d-flex justify-content-between p-3">
                <div class="col-3">

                </div>
                <div class="col-8">

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
                <div class="col-5 mt-3">
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">FROM :</p>
                        <p style="margin-left: 2vw;" id="pt"></p>
                    </div>
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">ATTN :</p>
                        <p style="margin-left: 2vw;" id="cust"></p>
                    </div>
                </div>
                <div class="col-5 mt-3">
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">No :</p>
                        <p style="margin-left: 2vw;" id="no"></p>
                    </div>
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">DATE :</p>
                        <p style="margin-left: 2vw;" id="dates"></p>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col text-center mt-3">
                    <label for="" class="form-label fs-3"><u>Inventory In</u> </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table border">
                        <thead style="border: 2px solid black">
                            <tr>
                                <td>No</td>
                                <td>Sku</td>
                                <td>Nama Item</td>
                                <td>Deskripsi</td>
                                <td>Harga</td>
                                <td>Qty PO</td>
                                <td>Qty IN</td>
                                <td>Selisih</td>
                                <td>Expire Date</td>
                            </tr>
                        </thead>
                        <tbody id="bodys">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 40vh">
                <div class="col-8 mt-4" style="line-height: 0.5rem;">
                </div>
                <div class="col-4 mt-3" style="float: right;">
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4" style="text-align: right;"></p>
                        <p style="padding-top: 2.5vh;">( MARKETING )</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function ubah(x) {
        if (x == "supplier") {
            $('#supplier').show();
            $('#namecustx').show();
            $('#supplierx').show();
            $('#warehouse').hide();
            $('#warehousex').hide();
            $('#return').hide();
            $('#returnx').hide();
            $('#suptable').show();
            $('#movewhtable').hide();
            $('#returntable').hide();
            $('#initialtable').hide();
        } else if (x == "warehouse") {
            $('#supplier').hide();
            $('#namecustx').hide();
            $('#supplierx').hide();
            $('#warehouse').show();
            $('#warehousex').show();
            $('#return').hide();
            $('#returnx').hide();
            $('#suptable').hide();
            $('#movewhtable').show();
            $('#returntable').hide();
            $('#initialtable').hide();
        } else if (x == "return") {
            $('#supplier').hide();
            $('#namecustx').show();
            $('#supplierx').hide();
            $('#warehouse').hide();
            $('#warehousex').hide();
            $('#return').show();
            $('#returnx').show();
            $('#suptable').hide();
            $('#movewhtable').hide();
            $('#returntable').show();
            $('#initialtable').hide();
        }
    }
</script>
<datalist id="xcust">
    <?php
    if ($data4 != 'Not Found' || !empty($data4)) {
        foreach ($data4 as $key) {
    ?>
            <option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
    <?php }
    } ?>
</datalist>
<datalist id="xitem">
    <?php if ($data != 'Not Found') {
        foreach ($data as $key) { ?>
            <option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
    <?php }
    } ?>
</datalist>
<script type="text/javascript">
    var data = <?php echo json_encode($data9); ?>;
    console.log(data);
    for (let i = 0; i < data["data"].length; i++) {
        add_row_transaksi(i)
        var xid = Number(i) + Number(1);
        $('#transaksi_' + xid + '_iditem').val(data["data"][i]["iditem"]);
        $('#transaksi_' + xid + '_sku').val(data["data"][i]["sku"]);
        $('#transaksi_' + xid + '_nameitem').val(data["data"][i]["nameitem"]);
        $('#transaksi_' + xid + '_deskripsi').val(data["data"][i]["deskripsi"]);
        $('#transaksi_' + xid + '_harga').val(data["data"][i]["price"]);
        $('#transaksi_' + xid + '_qtypo').val(data["data"][i]["qtypodet"]);
        $('#transaksi_' + xid + '_qtyin').val(data["data"][i]["qtyindet"]);
        $('#transaksi_' + xid + '_balance').val(data["data"][i]["balance"]);
        $('#transaksi_' + xid + '_expiredate').val(data["data"][i]["expdate"]);
    }
    add_row_transaksi1(0)
    add_row_transaksi2(0)

    function poselect(x, y, z) {
        $('#codepo').val(x);
        $('#idpo').val(y);
        $('#datepo').val(z);
        loadreq();
    }

    var xitem = '';
    xitem = '<?php
                $x = '';
                if ($data != 'Not Found') {
                    foreach ($data as $key) {
                        $x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["price"] . '" nameitem="' . $key["nameitem"] . '"  sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
                    }
                }
                echo $x;
                ?>';

    var xunit = '';

    function calc() {
        var xcnt = 0;
        var xqty = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xcnt++;
                xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
            }
            //$(this).val(i+1);
        });
    }

    function reorder() {
        $('input[objtype=nourut]').each(function(i, obj) {
            $(this).val(i + 1);
        });
    }

    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
        reorder();
        calc();
    }

    function del_row_transaksi1(xid) {
        $('#transaksi1-' + xid + '').remove();
        reorder();
        calc();
    }

    function del_row_transaksi2(xid) {
        $('#transaksi2-' + xid + '').remove();
        reorder();
        calc();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#uimg')
                    .attr('src', e.target.result)
                    .width(412)
                    .height(309);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('input', '#namecust', function() {
        var val = $(this).val();
        console.log(val);
        var xobj = $('#xcust option').filter(function() {
            return this.value == val;
        });

        if ((val == "") || (xobj.val() == undefined)) {
            $('#idcust').val("");
        } else {
            $('#idcust').val(xobj.data('idcust'))

        }
    });

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistmovewh') ?>",
            data: "filter=" + $('#search').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codeinvout"] + `</td>
                                            <td>` + hasil[i]["namewarehouse"] + `</td>
                                            <td>` + hasil[i]["qtyout"] + `</td>
                                            <td>` + hasil[i]["qtyin"] + `</td>
											<td>` + hasil[i]["statusout"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailmove(` + hasil[i]["idinvout"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailmove').html(baris)
            }

        });
    }

    function loaddatax() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistpo') ?>",
            data: "filter=" + $('#search').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                // console.log(hasil);
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["delivedate"] + `</td>
                                            <td>` + hasil[i]["qtypo"] + `</td>
											<td>` + hasil[i]["qtyin"] + `</td>
											<td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
											<td>` + hasil[i]["statuspo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpox(` + hasil[i]["idpo"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailpo').html(baris)
            }

        });
    }

    function detailmove(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailmove') ?>",
            data: "idinvout=" + x,
            dataType: "JSON",
            success: function(hasil) {
                // console.log(hasil)
                $('#codeinvout').val(hasil["codeinvout"]);
                $('#idinvout').val(hasil["idinvout"]);
                $('#idwhx').val(hasil["namewarehouse"]);
                $('#detailmovewh').html("");

                for (let i = 0; i <= hasil["data"].length; i++) {
                    add_row_transaksi1(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi1_' + xid + '_iditem1').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    $('#transaksi1_' + xid + '_sku1').val(xobj.data('sku'));
                    $('#transaksi1_' + xid + '_iditem1').val(xobj.data('iditem'));
                    $('#transaksi1_' + xid + '_nameitem1').val(xobj.data('nameitem'));
                    $('#transaksi1_' + xid + '_deskripsi1').val(xobj.data('deskripsi'));
                    $('#transaksi1_' + xid + '_harga1').val(hasil["data"][i]["price"]);
                    $('#transaksi1_' + xid + '_qtyout1').val(hasil["data"][i]["qtyout"]);
                    $('#transaksi1_' + xid + '_expiredate1').val(hasil["data"][i]["expdate"]);
                    calc();

                }

            }
        });
    }

    function detailpox(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailpox') ?>",
            data: "idpo=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = "";
                var ix = 1;
                $('#codepo').val(hasil["codepo"]);
                $('#idpo').val(hasil["idpo"]);
                $('#idcust').val(hasil["idcust"]);
                $('#namecust').val(hasil["namecust"]);
                $('#pt').html(hasil["namecust"]);
                $('#cust').html(hasil["namecust"]);
                $('#no').html(hasil["codepo"]);
                $('#dates').html(hasil["datepo"]);
                $('#action').show("");
                $('#detailx').html("");


                for (var a = 0; a < hasil["data"].length; a++) {
                    baris += `<tr>
					            <td scope="row">` + ix++ + `</td>;
                                <td>` + hasil["data"][a]["sku"] + `</td>
                                <td>` + hasil["data"][a]["nameitem"] + `</td>
                                <td>` + hasil["data"][a]["deskripsi"] + `</td>
                                <td>` + formatnum(parseFloat(hasil["data"][a]["price"]).toFixed(0)) + `</td>
                                <td>` + hasil["data"][a]["qty"] + `</td>
                                <td>0</td>
                                <td>` + hasil["qtypo"] + `</td>
                                <td>-</td>
                            </tr>`;
                }
                $('#bodys').html(baris);

                for (let i = 0; i <= hasil["data"].length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    if ((val == "") || (xobj.val() == undefined)) {
                        $('#transaksi_' + xid + '_iditem').val("");
                        $('#transaksi_' + xid + '_sku').val("");
                        $('#transaksi_' + xid + '_nameitem').val("");
                        $('#transaksi_' + xid + '_harga').val("");
                        $('#transaksi_' + xid + '_qtypo').val("");
                        $('#transaksi_' + xid + '_expiredate').val("");
                    } else {
                        $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                        $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                        $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                        $('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
                        $('#transaksi_' + xid + '_qtypo').val(hasil["data"][i]["qty"]);
                        $('#transaksi_' + xid + '_expiredate').val("");
                        document.getElementById('transaksi_' + xid + '_action').readonly = true;

                    }

                    // $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    // $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    // $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    // $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
                    // $('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
                    // $('#transaksi_' + xid + '_qtypo').val(hasil["data"][i]["qty"]);
                    // $('#transaksi_' + xid + '_expiredate').val(hasil["data"][i]["expdate"]);
                }

            }
        });
    }

    function add_row_transaksi(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / ></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control _nameitem" name="transaksi_nameitem[]" value=""/></td>';
        tabel += '<td style="border:none;"><input style="width:100%" readonly type="text" id="transaksi_' + xid + '_deskripsi" autocomplete="off" objtype="_deskripsi" class="form-control  _deskripsi" name="transaksi_deskripsi[]' + xid + '_deskripsi"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" readonly type="number" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_qtypo" class="form-control  _qtypo" value="0" name="transaksi_qtypo[]" onchange="count(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="number" id="transaksi_' + xid + '_qtyin" class="form-control  _qtyin" value="0" name="transaksi_qtyin[]" onchange="count(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_balance" class="form-control _balance" value="0" name="transaksi_balance[]"  onchange="count(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input  autocomplete="off" type="date" id="transaksi_' + xid + '_expiredate" objtype="expiredate"  class="form-control _expiredate" name="transaksi_expiredate[]"></td>';
        tabel += '<td style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        $('#line-transaksi').val(xid);
        $('#detailx').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
    }

    function add_row_transaksi1(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi1_" + xxid + "_nourut1").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi1-' + xid + '"><input type="hidden" id="transaksi1_' + xid + '_iditem1"  class="form-control  iditem1" name="transaksi_iditem1[]" / ></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text" readonly class="form-control  sku" objtype="sku" id="transaksi1_' + xid + '_sku1" name="transaksi_sku1[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text"  readonly id="transaksi1_' + xid + '_nameitem1"  class="form-control _nameitem" name="transaksi_nameitem1[]" value=""/></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="text" readonly id="transaksi1_' + xid + '_deskripsi1" autocomplete="off" class="form-control  _deskripsi1" name="transaksi_unit1[]' + xid + '_deskripsi"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="number" readonly id="transaksi1_' + xid + '_harga1" autocomplete="off" class="form-control  _harga" name="transaksi_harga1[]' + xid + '_harga"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="number" readonly id="transaksi1_' + xid + '_qtyout1" class="form-control  _qtyout1" value="0" name="transaksi_qtyout1[]" onchange="count1(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" type="number" id="transaksi1_' + xid + '_qtyin1" class="form-control  _qtyin1" value="0" name="transaksi_qtyin1[]" onchange="count1(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input style="width:100%" autocomplete="off" type="date" id="transaksi1_' + xid + '_expiredate1" objtype="expiredate"  class="form-control _expiredate" name="transaksi_expiredate1[]"></td>';
        tabel += '<td style="border:none;" id="transaksi1-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi1(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        $('#line-transaksi1').val(xid);
        $('#detailmovewh').append(tabel);
        $('#transaksi1_' + xid + '_nourut1').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi1-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi1(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi1(' + xxid + ')"><b>x</b>');
            $('#transaksi1-tr-' + xxid + '').html(xdt);
        }
    }

    function add_row_transaksi2(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi2_" + xxid + "_nourut2").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;height:1px" id="transaksi2-' + xid + '"><input type="hidden" id="transaksi2_' + xid + '_iditem2"  class="form-control  iditem2" name="transaksi_iditem2[]" / ></td>';
        tabel += '<td style="border:none;"><input type="text" style="text-align:center;" class="form-control  sku2" objtype="sku2" id="transaksi2_' + xid + '_sku2" name="transaksi_sku2[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
        tabel += '<td style="border:none;"><input type="text"  readonly id="transaksi2_' + xid + '_nameitem2"  class="form-control _nameitem2" name="transaksi_nameitem2[]" value=""/></td>';
        tabel += '<td style="border:none;"><input type="text" id="transaksi2_' + xid + '_price2"  class="form-control _price2" name="transaksi_price2"></td>';
        tabel += '<td style="border:none;"><input type="text" readonly id="transaksi2_' + xid + '_deskripsi2" autocomplete="off" class="form-control  _deskripsi2" name="transaksi_deskripsi2[]' + xid + '_deskripsi2"></td>';
        tabel += '<td style="border:none;"><input type="number" id="transaksi2_' + xid + '_qtyin2" class="form-control  _qtyin2" value="0" name="transaksi_qtyin2[]" onchange="count2(' + xid + ')"></td>';
        tabel += '<td style="border:none;"><input  autocomplete="off" type="date" id="transaksi2_' + xid + '_expiredate2" class="form-control _expiredate2" name="transaksi_expiredate2[]"></td>';
        tabel += '<td style="border:none;" id="transaksi2-tr-' + xid + '"><button id="transaksi2_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi2(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        $('#line-transaksi').val(xid);
        $('#detailreturn').append(tabel);
        $('#transaksi2_' + xid + '_nourut2').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi2-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi2(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi2(' + xxid + ')"><b>x</b>');
            $('#transaksi2-tr-' + xxid + '').html(xdt);
        }
    }


    $(document).on('change', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {
            $('#transaksi_' + xid + '_sku').val("");
            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_harga').val(0);
            $('#transaksi_' + xid + '_deskripsi').val("");
            $('#transaksi_' + xid + '_qtypo').val("");
            $('#transaksi_' + xid + '_expiredate').val("");
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_harga').val(xobj.data('price'));
            $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
            $('#transaksi_' + xid + '_expiredate').val(xobj.data('expiredate'));
        }
        calc();
    });

    $(document).on('change', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi1_", "").replace("_sku1", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {
            $('#transaksi1_' + xid + '_sku1').val("");
            $('#transaksi1_' + xid + '_iditem1').val("");
            $('#transaksi1_' + xid + '_nameitem1').val("");
            $('#transaksi1_' + xid + '_harga1').val(0);
            $('#transaksi1_' + xid + '_deskripsi1').val("");
            $('#transaksi1_' + xid + '_expiredate1').val("");
        } else {
            $('#transaksi1_' + xid + '_sku1').val(xobj.data('sku'));
            $('#transaksi1_' + xid + '_iditem1').val(xobj.data('iditem'));
            $('#transaksi1_' + xid + '_nameitem1').val(xobj.data('nameitem'));
            $('#transaksi1_' + xid + '_harga1').val(xobj.data('price'));
            $('#transaksi1_' + xid + '_deskripsi1').val(xobj.data('deskripsi'));
            $('#transaksi1_' + xid + '_expiredate1').val(xobj.data('expiredate'));
        }
        calc();
    });

    $(document).on('change', '.sku2', function() {
        var xid = $(this).attr('id').replace("transaksi2_", "").replace("_sku2", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {
            $('#transaksi2_' + xid + '_sku2').val("");
            $('#transaksi2_' + xid + '_iditem2').val("");
            $('#transaksi2_' + xid + '_nameitem2').val("");
            $('#transaksi2_' + xid + '_price2').val(0);
            $('#transaksi2_' + xid + '_deskripsi2').val("");
            $('#transaksi2_' + xid + '_expiredate2').val("");
        } else {
            $('#transaksi2_' + xid + '_sku2').val(xobj.data('sku'));
            $('#transaksi2_' + xid + '_iditem2').val(xobj.data('iditem'));
            $('#transaksi2_' + xid + '_nameitem2').val(xobj.data('nameitem'));
            $('#transaksi2_' + xid + '_price2').val(xobj.data('price'));
            $('#transaksi2_' + xid + '_deskripsi2').val(xobj.data('deskripsi'));
            $('#transaksi2_' + xid + '_expiredate2').val(xobj.data('expiredate'));
        }
        calc();
    });


    function addorderx() {
        var xask = '';
        // console.log($("#idin").val())
        if ($("#idin").val() != "") {
            xask = "Ubah Transaksi?";
        } else {
            xask = "Ubah Transaksi?";
        }
        if (confirm(xask)) {
            if ($('#myDIV').val() == "supplier") {
                if (validasisales()) {
                    var cx = $('#form').serialize();
                    $.post("<?php echo base_url('MasterDataControler/editinvin') ?>", cx,
                        function(data) {
                            if (data == 'Success') {
                                alert('Update Data Berhasil');
                                cancelorder();
                            } else {
                                alert('Update Data Gagal. ' + data);
                            }
                        });
                }
            }

        }
    }

    $('form button').on("click", function(e) {
        if ($(this).attr('id') == "cancel") {
            var xask = 'Cancel InventoryIn ?';

            if (confirm(xask)) {
                if (validasi()) {
                    cancelorderx();
                }
            }
        }
        e.preventDefault();
    });

    function validasisales() {

        var xval = 0;
        var sts = 1;
        var pending = 0;

        xval = $("#namecust").val();
        if (xval == "") {
            alert('Pilih Data Supplier');
            sts = 0;
            return false;
        }

        xval = $("#nosuratjalan").val();
        if (xval == "") {
            alert('Input No.Surat Jalan Isi Terlebih Dahulu ');
            sts = 0;
            return false;
        }


        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

            if ($("#idpo") != "") {

                // if (Number($('#transaksi_' + xid + '_sku').val()) < Number($('#transaksi_' + xid + '_sku').val())) {
                // 	alert('Qty Out Lebih Besar Dari Stock');
                // 	sts = 0;
                // 	return false;
                // }

                // if ($('#transaksi_' + xid + '_sku').val() == "") {
                // 	alert('Masukan Item terlebih dahulu');
                // 	sts = 0;
                // 	return false;
                // }

                // if ($('#transaksi_' + xid + '_qtyin').val() == 0) {
                // 	alert('Kolom Qty Tidak Boleh Kosong');
                // 	sts = 0;
                // 	return false;
                // }
            }

        });

        if (sts == 1) {
            return true;
        } else {
            return false;
        }


        //return 'ok';
    }

    function cancelorder() {
        location.reload();
        return false;
    }

    function count(xid) {
        var qtypos = $('#transaksi_' + xid + '_qtypo').val();
        var qtyins = $('#transaksi_' + xid + '_qtyin').val();
        var totals = qtypos - qtyins;
        $('#transaksi_' + xid + '_balance').val(totals);
    }

    function count1(xid) {
        var qtyins = $('#transaksi1_' + xid + '_qtyin1').val();
        var totals = qtyins;
        $('#transaksi1_' + xid + '_balance1').val(totals);
    }

    function count2(xid) {
        var qtyins = $('#transaksi1_' + xid + '_qtyin2').val();
        var totals = qtyins;
        $('#transaksi1_' + xid + '_balance2').val(totals);
    }

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#date").val() == '') {
            $("#date").val(date);
        }
    });

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#date2").val() == '') {
            $("#date2").val(date);
        }
        date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-01';
        if ($("#date1").val() == '') {
            $("#date1").val(date);
        }
    });

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>