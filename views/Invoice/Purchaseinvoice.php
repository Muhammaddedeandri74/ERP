<form action="<?php echo base_url('MasterDataControler/addpoinvoice') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Invoice</li>
            </ol>
            <h3 class="text-white">Register Purchase Invoice </h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12 bays">
                    <div class="row">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php $this->session->set_flashdata('message', ''); ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="mb-3 fs-5">Informasi Dasar</label>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label class="form-label">No. Invoice</label>
                                    <input type="hidden" name="idinv" id="idinv">
                                    <input type="text" name="codeinv" id="codeinv" class="form-control" autocomplete="off" readonly>
                                    <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                                </div>
                                <!-- <div class="col-2 mt-3">
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModalInvoice" class="btn btn-outline-primary" onclick="loaddatainvoice()">Cari Data</a>
                                </div> -->
                                <div class="col-4 mt-3" id="hidenoin">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModalInvoice" class="btn btn-outline-primary" onclick="loaddatainvoice()">Cari Data</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <input type="text" id="namesupp" class="form-control" objectype="supp" list="xsupp" name="namesupp" autocomplete="off" required>
                                    <input type="hidden" id="idsupp" name="idsupp">
                                </div>
                                <div class="col-4">
                                    <button class=" rounded-circle mt-4" style="position: absolute;top: 181px;left: 380px;font-size: 12px;border: 0;" onclick="document.getElementById('namesupp').value = ''">X</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">Type Outgoing</label>
                                    <textarea name="remark" id="remark" class="form-control" cols="20" rows="1" required></textarea>
                                    <div class="row text-end">
                                        <span style="font-size: 10px;" class="text-muted">Maksimal 100 Karakter</span>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="mb-3 fs-5">Informasi Detail & Pajak</label>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Invoice</label>
                                    <input type="date" name="dateinvoice" id="dateinvoice" class="form-control" value="">
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Keluar</label>
                                    <input type="date" name="duedate" id="duedate" class="form-control" value="">
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Mata Uang</label>
                                    <select name="idcurr" id="idcurr" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Pilih</option>
                                        <?php if ($data1 != "Not Found") : ?>
                                            <?php foreach ($data1 as $key) : ?>
                                                <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Exchange Rate</label>
                                    <input type="text" name="exchangerate" id="exchangerate" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="exampleFormControlInput1" class="form-label">Remark</label>
                                    <textarea name="remark" id="remark" class="form-control" cols="20" rows="1" required></textarea>
                                    <div class="row text-end">
                                        <span style="font-size: 10px;" class="text-muted">Maksimal 100 Karakter</span>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <label for="" class="fs-5 mb-3">Pajak</label>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Gunakan VAT</label>
                                    <div class="col-sm-7">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="vat" value="11" class="form-check-input" id="check" checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="action" style="display:none ;">
                                    <label class="mb-5 fs-5">Cetak & Download</label>
                                    <div class="col-sm-7">
                                        <a href="" class="btn"><i class="bx bxs-download"></i>Download</a>
                                        <a href="" class="btn" onclick="printDiv('invoice')"><i class="bx bx-printer"></i>Cetak</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="row mb-3">
                                <label for="" class="fs-3 form-label">Ambil Data</label>
                                <p class="text-muted">Mengambil data barang/item</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Ingoing</label>
                                    <input type="text" name="codein" id="codein" class="form-control" readonly>
                                    <input type="hidden" name="idin" id="idin" class="form-control" readonly>
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Semua data ingoing supplier akan tampil</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3" id="hidenoin">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary" onclick="loaddatainvin()">Cari Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row mb-3">
                                <label for="" class="fs-3 form-label">Ambil Data</label>
                                <p class="text-muted">Mengambil data barang/item</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Purchase Order</label>
                                    <input type="hidden" name="idpo" id="idpo">
                                    <input type="text" name="codepo" id="codepo" class="form-control" readonly>
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModalx" class="btn btn-outline-primary" onclick="loaddata()">Cari Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row mb-3">
                                <label for="" class="fs-3 form-label">Ambil Data</label>
                                <p class="text-muted">Mengambil data barang/item</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Inventory Out</label>
                                    <input type="hidden" name="idinvout" id="idinvout">
                                    <input type="text" name="codeinvout" id="codeinvout" class="form-control" readonly>
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModalIO" class="btn btn-outline-primary" onclick="loaddataIO()">Cari Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="row mb-5" style="overflow-x: auto;">
                        <h5>Item/Produk</h5>
                        <table class="table table-bordered table-striped" id="table-user">
                            <thead class="text-white" style="background:#1143d8;">
                                <tr>
                                    <td>Sku</td>
                                    <td>Nama Item</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>Discount Percent</td>
                                    <td>Discount Nominal</td>
                                    <td>Sub Total</td>
                                    <td>Total Discount</td>
                                    <td>Grand Total</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailinvoice">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
                            <div class="row">
                                <div class="col-6">
                                    <p>Sub Total</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Discount Transaksi</p>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="disnom" name="distrans" value="0" oninput="calc()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>VAT</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="ppn" name="ppn" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8"></div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-primary" id="addinvoice" onclick="addinvoice()">Simpan Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bay" style="display: none;" id="invoice">
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
                    <label for="" class="form-label fs-3"><u>PURCHASE INVOICE</u> </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table border">
                        <thead style="border: 2px solid black">
                            <tr>
                                <td>Sku</td>
                                <td>Nama Item</td>
                                <td>Harga</td>
                                <td>QTY</td>
                                <td>Subtotal</td>
                                <td>Grandtotal</td>
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
    <div class="modal fade" id="exampleModalInvoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Invoice</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="" class="form-label">Pencarian</label>
                                        <div class="input-group">
                                            <select name="filterz" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterz">
                                                <option value="codeinv">No.Invoice</option>
                                            </select>
                                            <input type="text" id="searchz" class="form-control" placeholder="Cari Berdasarkan Filter">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Status</label>
                                        <select class="form-select" id="statusinvz" aria-label="Default select example">
                                            <option value="">Pilih Status</option>
                                            <option value="Unpaid">Unpaid</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Partial">Partial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="" class="form-label">Mulai Dari</label>
                                        <input type="date" class="form-control" name="" id="datestartz" value="<?php echo date('Y-m-01') ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Sampai Dengan</label>
                                        <input type="date" class="form-control" name="" id="finishdatez" value="<?php echo date('Y-m-t') ?>">
                                    </div>
                                    <div class="col-4">
                                        <p></p>
                                        <a href="#" class="btn btn-primary mt-3" onclick="loaddatainvoice()">Terapkan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>No. Invoice</td>
                                    <td>Tgl Invoice</td>
                                    <td>Supplier</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailinvoicedet">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Ingoing</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="" class="form-label">Pencarian</label>
                                        <div class="input-group">
                                            <select name="filterx" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterx">
                                                <option value="codein">No.Invin</option>
                                            </select>
                                            <input type="text" id="searchx" class="form-control" placeholder="Cari Berdasarkan Filter">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Status</label>
                                        <select class="form-select" id="statusin" aria-label="Default select example">
                                            <option value="">Pilih Status</option>
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
                                        <input type="date" class="form-control" name="" id="datestartx" value="<?php echo date('Y-m-01') ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Sampai Dengan</label>
                                        <input type="date" class="form-control" name="" id="finishdatex" value="<?php echo date('Y-m-t') ?>">
                                    </div>
                                    <div class="col-4">
                                        <p></p>
                                        <a href="#" class="btn btn-primary mt-3" onclick="loaddatainvin()">Terapkan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No. Inventory In</td>
                                    <td>Tgl Invin</td>
                                    <td>Supplier</td>
                                    <td>No. Surat Jalan</td>
                                    <td>Tipe Ingoing</td>
                                    <td>Gudang</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailinvin">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Purchase Order</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-8">
                                    <label for="" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <select name="filter" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                            <option value="codepo">No.Po</option>
                                        </select>
                                        <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select" id="statuspo" aria-label="Default select example">
                                        <option value="">Pilih Status PO</option>
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
                                    <a href="#" class="btn btn-primary mt-3" onclick="loaddata()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. Request</th>
                                        <th>Tgl Request</th>
                                        <th>Nama Supplier</th>
                                        <th>Qty Item</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailx">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalIO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Inventory Out</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-8">
                                    <label for="" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <select name="filterout" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterout">
                                            <option value="codeinvout">No.Inventory Out</option>
                                        </select>
                                        <input type="text" id="searchout" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select" id="statusout" aria-label="Default select example">
                                        <option value="">Pilih Status</option>
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
                                    <input type="date" class="form-control" name="" id="datestartout" value="<?php echo date('Y-m-01') ?>">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" name="" id="finishdateout" value="<?php echo date('Y-m-t') ?>">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="#" class="btn btn-primary mt-3" onclick="loaddataIO()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. Inventory Out</th>
                                        <th>Tanggal Out</th>
                                        <th>Type Out</th>
                                        <th>Nama Supplier</th>
                                        <th>Qty Out</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailout">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <datalist id="xsupp">
        <?php
        if ($data != 'Not Found' || !empty($data)) {
            foreach ($data as $key) {
        ?>
                <option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
        <?php }
        } ?>
    </datalist>

    <datalist id="xitem">
        <?php
        if ($data3 != 'Not Found') {
            foreach ($data3 as $key) {
        ?>
                <option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
        <?php }
        } ?>
    </datalist>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var codeinv = <?php echo json_encode($codeinvz) ?>;
    console.log(codeinv);
    if (codeinv != "") {
        detailinvoice(codeinv)
    }

    add_row_transaksi(0)

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistpo') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statuspo=" + $('#statuspo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["qtypo"] + `</td>
                                            <td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
											<td>` + hasil[i]["statuspo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpo('` + hasil[i]["codepo"] + `')">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailx').html(baris)
            }

        });
    }

    function loaddataIO() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistIO') ?>",
            data: "filterout=" + $('#filterout').val() + "&searchout=" + $('#searchout').val() + "&statusout=" + $('#statusout').val() + "&datestartout=" + $('#datestartout').val() + "&finishdateout=" + $('#finishdateout').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codeinvout"] + `</td>
                                            <td>` + hasil[i]["dateout"] + `</td>
                                            <td>` + hasil[i]["typeout"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["qtyout"] + `</td>
											<td>` + hasil[i]["statusout"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailIO('` + hasil[i]["codeinvout"] + `')">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailout').html(baris)
            }

        });
    }

    function loaddatainvin() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistinvinstatus') ?>",
            data: "filter=" + $('#filterx').val() + "&search=" + $('#searchx').val() + "&statusin=" + $('#statusin').val() + "&datestart=" + $('#datestartx').val() + "&finishdate=" + $('#finishdatex').val(),
            dataType: "JSON",
            success: function(hasil) {
                // console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {
                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                            <td>` + hasil[i]["codein"] + `</td>
                            <td>` + hasil[i]["datein"] + `</td>
                            <td>` + hasil[i]["namecust"] + `</td>
                            <td>` + hasil[i]["nosuratjalan"] + `</td>
                            <td>` + hasil[i]["typein"] + `</td>
                            <td>` + hasil[i]["namewarehouse"] + `</td>
                            <td>Rp. ` + formatnum(parseFloat(hasil[i]["total"]).toFixed(0)) + `</td>
                            <td>` + hasil[i]["statusin"] + `</td>
                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailinvin('` + hasil[i]["codein"] + `')">Pilih</a></td>
                            
                        </tr>`



                    }

                }
                $('#detailinvin').html(baris)
            }

        });
    }

    function loaddatainvoice() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistinvoicedetail') ?>",
            data: "filter=" + $('#filterz').val() + "&search=" + $('#searchz').val() + "&statusin=" + $('#statusinvz').val() + "&datestart=" + $('#datestartz').val() + "&finishdate=" + $('#finishdatez').val(),
            dataType: "JSON",
            success: function(hasil) {
                // console.log(hasil)
                var baris = ""
                var ix = 1
                if (hasil != "Not Found") {
                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                            <td>` + ix++ + `</td>
                            <td>` + hasil[i]["codeinv"] + `</td>
                            <td>` + hasil[i]["dateinv"] + `</td>
                            <td>` + hasil[i]["namecust"] + `</td>
                            <td>Rp. ` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                            <td>` + hasil[i]["statusinv"] + `</td>
                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailinvoice('` + hasil[i]["codeinv"] + `')">Detail</a></td>
                            
                        </tr>`



                    }

                }
                $('#detailinvoicedet').html(baris)
            }

        });
    }

    function loaddatax() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistpoinvoice') ?>",
            data: "filter=" + $('#search').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["delivedate"] + `</td>
											<td> ` + hasil[i]["qtypo"] + `</td>
                                            <td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
											<td> ` + hasil[i]["statuspo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpo(` + hasil[i]["idpo"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailpo').html(baris)
            }

        });
    }

    function detailinvoice(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailinvoice') ?>",
            data: "idinv=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                $('#pt').html(hasil["namecust"]);
                $('#cust').html(hasil["namecust"]);
                $('#no').html(hasil["codeinv"]);
                $('#dates').html(hasil["dateinv"]);

                $('#codeinv').val(hasil["codeinv"]);
                $('#idinv').val(hasil["idinv"]);
                $('#idsupp').val(hasil["idcust"]);
                $('#namesupp').val(hasil["namecust"]);
                $('#remark').val(hasil["remark"]);
                $('#dateinv').val(hasil["dateinv"]);
                $('#duedate').val(hasil["delivedate"]);
                $('#idcurr').val(hasil["idcurr"]);
                $('#exchangerate').val(hasil["exchangerate"]);
                $('#hidenoin').hide();
                $('#hidenopo').hide();
                $('#exchangerate').val(hasil["exchangerate"]);
                $('#detailinvoice').html("")
                $('#action').show();
                var baris = ""

                for (var a = 0; a < hasil["data"].length; a++) {
                    baris += `<tr>
                                <td>` + hasil["data"][a]["sku"] + `</td>
                                <td>` + hasil["data"][a]["nameitem"] + `</td>
                                <td>` + formatnum(parseFloat(hasil["data"][a]["price"]).toFixed(0)) + `</td>
                                <td>` + hasil["data"][a]["qty"] + `</td>
                                <td>` + formatnum(parseFloat(hasil["data"][a]["subtotal"]).toFixed(0)) + `</td>
                                <td>` + formatnum(parseFloat(hasil["data"][a]["grandtot"]).toFixed(0)) + `</td>
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

                    $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + "");
                    $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_discpercent').val(hasil["data"][i]["disper"]);
                    $('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnom"]);
                    $('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["data"][i]["subtotal"]) + "");
                    $('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["totaldisc"]);
                    $('#transaksi_' + xid + '_total').val(formatRupiah(hasil["data"][i]["grandtot"]) + "");

                    // document.getElementById('transaksi_' + xid + '_qty').disabled = true;
                    // document.getElementById('transaksi_' + xid + '_discpercent').disabled = true;
                    // document.getElementById('transaksi_' + xid + '_disnom').disabled = true;
                    // document.getElementById('namesupp').disabled = true;
                    // document.getElementById('dateinvoice').disabled = true;
                    // document.getElementById('duedate').disabled = true;
                    // document.getElementById('idcurr').disabled = true;
                    // document.getElementById('exchangerate').disabled = true;
                    // document.getElementById('check').disabled = true;
                    calc();

                }

            }
        });
    }

    function detailpo(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailpo') ?>",
            data: "idpo=" + x,
            dataType: "JSON",
            success: function(hasil) {
                $('#codeinv').val(hasil["codeinv"]);
                $('#idpo').val(hasil["idpo"]);
                $('#codepo').val(hasil["codepo"]);
                $('#idsupp').val(hasil["idcust"]);
                $('#namesupp').val(hasil["namecust"]);

                $('#vat').val(hasil["vat"]);
                if (hasil["vat"] == 0) {
                    $('#check').prop('checked', false);
                } else {
                    $('#check').prop('checked', true);
                }

                var val = hasil["namecust"];
                var xobj = $('#xsupp option').filter(function() {
                    return this.value == val;
                });

                if ((val == "") || (xobj.val() == undefined)) {
                    $('#idsupp').val("");
                    $('#norekening').val("");
                }
                $('#norekening').val(hasil["norekening"]);

                for (let i = 0; i < hasil["data"].length; i++) {
                    // add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    if ((val == "") || (xobj.val() == undefined)) {
                        $('#transaksi_' + xid + '_iditem').val("");
                        $('#transaksi_' + xid + '_sku').val("");
                        $('#transaksi_' + xid + '_nameitem').val("");
                        $('#transaksi_' + xid + '_harga').val("");
                        $('#transaksi_' + xid + '_qty').val("");
                        $('#transaksi_' + xid + '_discpercent').val("");
                        $('#transaksi_' + xid + '_disnom').val("");
                        $('#transaksi_' + xid + '_totaldisc').val("");
                        $('#transaksi_' + xid + '_total').val("");
                        $('#transaksi_' + xid + '_sub').val("");
                    } else {
                        $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                        $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                        $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                        $('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + '');
                        $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                        $('#transaksi_' + xid + '_discpercent').val(hasil["data"][i]["disper"]);
                        $('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnom"]);
                        $('#transaksi_' + xid + '_totaldisc').val(formatRupiah(hasil["data"][i]["totaldisc"]) + "");
                        $('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["data"][i]["subpo"]) + "");
                        $('#transaksi_' + xid + '_total').val(formatRupiah(hasil["data"][i]["grandtotal"]) + "");
                        calc();
                    }

                }

            }
        });
    }

    function detailinvin(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailinvin') ?>",
            data: "idin=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                $('#codein').val(hasil["codein"]);
                $('#idin').val(hasil["idin"]);
                $('#idsupp').val(hasil["idcust"]);
                $('#namesupp').val(hasil["namecust"]);

                for (let i = 0; i <= hasil["data"].length; i++) {
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["harga"]) + "");
                    $('#transaksi_' + xid + '_qty').val(formatRupiah(hasil["data"][i]["qtyindet"]) + "");
                    $('#transaksi_' + xid + '_discpercent').val(0);
                    $('#transaksi_' + xid + '_disnom').val(0);
                    $('#transaksi_' + xid + '_sub').val(hasil["data"][i]["harga"] * hasil["data"][i]["qtyindet"]);
                    $('#transaksi_' + xid + '_totaldisc').val(0);
                    $('#transaksi_' + xid + '_total').val(hasil["data"][i]["harga"] * hasil["data"][i]["qtyindet"]);

                    calc();

                }

            }
        });
    }

    function detailIO(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailIO') ?>",
            data: "idinvout=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                $('#codeinvout').val(hasil["codeinvout"]);
                $('#idinvout').val(hasil["idinvout"]);
                $('#idsupp').val(hasil["idcust"]);
                $('#namesupp').val(hasil["namecust"]);
                $('#dateinvoice').val(hasil["dateout"]);

                for (let i = 0; i <= hasil["data"].length; i++) {
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + "");
                    $('#transaksi_' + xid + '_qty').val(formatRupiah(hasil["data"][i]["qtyout"]) + "");

                    calc();

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
        tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" id="transaksi_' + xid + '_discpercent" oninput="discx(' + xid + ')"  class="form-control"name="discpercent[]" value="" oninput="discp(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" id="transaksi_' + xid + '_disnom" oninput="discxx(' + xid + ')"  class="form-control"name="disnom[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_sub"  class="form-control"name="sub[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_totaldisc"  class="form-control"name="totaldisc[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        // return tabel;
        $('#line-transaksi').val(xid);
        $('#detailinvoice').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
    }

    $(document).on('input', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {

            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_deskripsi').val("");
            $('#transaksi_' + xid + '_harga').val("");
            $('#transaksi_' + xid + '_qty').val("");
            $('#transaksi_' + xid + '_discpercent').val("");
            $('#transaksi_' + xid + '_disnom').val("");
            $('#transaksi_' + xid + '_totaldisc').val("");
            $('#transaksi_' + xid + '_total').val("");
            $('#transaksi_' + xid + '_sub').val("");

            document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = true;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = true;
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
            $('#transaksi_' + xid + '_harga').val(formatRupiah(xobj.data('price') + ''));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_discpercent').val(0);
            $('#transaksi_' + xid + '_disnom').val(0);
            $('#transaksi_' + xid + '_totaldisc').val(0);
            $('#transaksi_' + xid + '_total').val(formatRupiah(xobj.data('price') + ''));
            $('#transaksi_' + xid + '_sub').val(formatRupiah(xobj.data('price') + ''));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = false;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
        }
        calc();
    });


    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
        reorder();
        calc();
    }

    $(document).on('input', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {

            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_deskripsi').val("");
            $('#transaksi_' + xid + '_harga').val("");
            $('#transaksi_' + xid + '_qty').val("");
            $('#transaksi_' + xid + '_discpercent').val("");
            $('#transaksi_' + xid + '_disnom').val("");
            $('#transaksi_' + xid + '_totaldisc').val("");
            $('#transaksi_' + xid + '_total').val("");
            $('#transaksi_' + xid + '_sub').val("");

            document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = true;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = true;
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
            $('#transaksi_' + xid + '_harga').val(formatRupiah(xobj.data('price') + ''));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_discpercent').val(0);
            $('#transaksi_' + xid + '_disnom').val(0);
            $('#transaksi_' + xid + '_totaldisc').val(0);
            $('#transaksi_' + xid + '_total').val(formatRupiah(xobj.data('price') + ''));
            $('#transaksi_' + xid + '_sub').val(formatRupiah(xobj.data('price') + ''));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = false;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
        }
        calc();
    });

    $('form button').on("click", function(e) {
        if ($(this).attr('id') == "addinvoice") {
            var xask = '';
            if ($("#idinv").val() != "") {
                xask = "Simpan Invoice?";
            } else {
                xask = "Simpan Invoice?";
            }
            if (confirm(xask)) {
                if (validasi()) {
                    addinvoice();
                }
            }
        }
        e.preventDefault();
    });

    function addinvoice() {
        var cx = $('#form').serialize();
        $.post("<?php echo base_url('MasterDataControler/addpoinvoice') ?>", cx,
            function(data) {
                console.log(data)
                if (data == 'Success') {
                    alert('');
                    cancelorder();
                } else {
                    alert('' + data);
                    cancelorder();

                }
            });
    }

    function cancelorder() {
        location.reload();
    }


    function validasi() {
        var xval = 0;
        var sts = 1;

        xval = $("#namesupp").val();
        if ($("#namesupp").val() == '') {
            alert('Input Supplier Terlebih Dahulu');
            sts = 0;
            return false;
        }

        xval = $("#idcurr").val();
        if ($("#idcurr").val() == '') {
            alert('Input Mata Uang Terlebih Dahulu');
            sts = 0;
            return false;
        }

        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

            if ($('#transaksi_' + xid + '_sku').val() == "") {
                alert('Masukan Item terlebih dahulu');
                sts = 0;
                return false;
            }

        });

        if (sts == 1) {
            return true;
        } else {
            return false;
        }
    }

    $(function() {
        $("#check").click(function() {
            if ($(this).is(":checked")) {
                $("#check").val(1);
            } else {
                $("#check").val(0);
            }
            calc();
        });
    });

    function cal(x) {
        console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b " +
            $('#transaksi_' + x + '_disnom').val() + " c " + $('#transaksi_' + x + '_disnom').val() + " d ")
        $('#transaksi_' + x + '_sub').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val().replaceAll(".", "") + ""))
        $('#transaksi_' + x + '_totaldisc').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_disnom').val().replaceAll(".", "") + ""))
        $('#transaksi_' + x + '_total').val(formatRupiah($('#transaksi_' + x + '_sub').val().replaceAll(".", "") - $('#transaksi_' + x + '_totaldisc').val().replaceAll(".", "") + ""))
        calc();
    }

    function discx(xid) {
        console.log($('#transaksi_' + xid + '_discpercent').val() + " " + xid)
        $('#transaksi_' + xid + '_disnom').val(formatRupiah($('#transaksi_' + xid + '_harga').val().replaceAll(".", "") * $('#transaksi_' + xid + '_discpercent').val() / 100 + ""));
        cal(xid)
    }

    function discxx(xid) {
        console.log($('#transaksi_' + xid + '_disnom').val() + " " + $('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))
        $('#transaksi_' + xid + '_discpercent').val(0)

        if (Number($('#transaksi_' + xid + '_disnom').val()) > Number($('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))) {
            console.log("O")
            alert("diskon melebihi total harga")
            $('#transaksi_' + xid + '_disnom').val($('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))
        }
        cal(xid)
    }

    function calc() {
        var xttl = 0;
        var dpp = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll('.', ''));
            }
        });

        if ($("#check").is(":checked") == true) {
            vat = (xttl - $('#disnom').val().replaceAll(".", "")) * 11 / 100;
        } else {
            vat = 0;
        }
        grandtot = Number((xttl - $('#disnom').val().replaceAll(".", ""))) + Number(vat)
        $("#ppn").val(formatRupiah(vat + ""))
        $("#subtotal").val(formatRupiah(xttl + ""))
        $("#grandtotal").val(formatRupiah(grandtot + ""))
    }

    function discountpersent(disc, disc1) {
        if (disc1 > 100) {
            $('#transaksi_' + disc + '_discpersen').val(100);
            alert("Maaf Angka terlalu banyak");

        } else if (disc1 < 1) {
            $('#transaksi_' + disc + '_discpersen').val(0);
            alert("Masukan Discount");
        }

    }

    $(document).on('input', '#namesupp', function() {
        var val = $(this).val();
        var xobj = $('#xsupp option').filter(function() {
            return this.value == val;
        });

        if ((val == "") || (xobj.val() == undefined)) {
            $('#idsupp').val("");
            $('#norekening').val("");
        } else {

            $('#idsupp').val(xobj.data('idcust'));
            var data = <?php echo json_encode($data) ?>;
            console.log(data)
            for (let i = 0; i < data.length; i++) {

                if (data[i]["idcust"] == xobj.data('idcust')) {
                    var baris = '<option value="">Pilih</option>'
                    for (let b = 0; b < data[i]["data"].length; b++) {

                        baris += `<option value="` + data[i]["data"][b]["norekening"] + `">` + data[i]["data"][b]["norekening"] + ` - ` + data[i]["data"][b]["beneficiary"] + ` ( ` + data[i]["data"][b]["namabank"] + ` ) </option>`
                    }
                    $('#norekening').html(baris)
                }


            }
        }
    });

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#dateinvoice").val() == '') {
            $("#dateinvoice").val(date);
        }
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
        if ($("#duedate").val() == '') {
            $("#duedate").val(date);
        }
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>