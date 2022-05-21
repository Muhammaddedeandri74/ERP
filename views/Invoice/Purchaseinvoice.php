<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
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
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Dasar</label>
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label class="form-label">No. Invoice</label>
                                    <input type="text" name="codepo" class="form-control" placeholder="INV-2121/22/12" value="" autocomplete="off" readonly>
                                </div>
                                <div class="col-2 mt-3"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Detail & Pajak</label>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Invoice</label>
                                    <input type="date" name="" id="" class="form-control" value="" autocomplete="off">
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                    <input type="date" name="" id="" class="form-control" value="" autocomplete="off">
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Mata Uang</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <label for="" class="fs-5 mb-3">Pajak</label>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Gunakan VAT</label>
                                    <div class="col-sm-7">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-5 fs-5">Cetak & Download</label>
                            <div class="row">
                                <div class="col-5">
                                    <a href="" class="btn"><i class="bx bxs-download"></i>Download</a>
                                </div>
                                <div class="col-5">
                                    <a href="" class="btn"><i class="bx bx-printer"></i>Cetak</a>
                                </div>
                                <div class="col-2"></div>
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
                                    <input type="text" name="codepo" class="form-control text-muted" placeholder="Pilih Data" readonly value="" autocomplete="off">
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Semua data ingoing supplier akan tampil</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary">Cari Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label fs-4 mt-5">Perioder Waktu Ingoing</label>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="" class="form-label">Mulai Dari</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="" class="btn btn-outline-primary mt-3">Ambil Data</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row" style="margin-top: 11vh;">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Purchase Order</label>
                                    <input type="text" name="codepo" class="form-control text-muted" placeholder="Pilih Data" readonly value="" autocomplete="off">
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#pilihdatapo" class="btn btn-outline-primary">Cari Data</a>
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
                                    <td>Nama Item</td>
                                    <td>Sku</td>
                                    <td>Unit</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>Type Disc.</td>
                                    <td>Disc Item</td>
                                    <td>VAT</td>
                                    <td>Total</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td>Rp. -</td>
                                    <td>Rp. -</td>
                                    <td></td>
                                </tr>
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
                                    <p>Rp -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Discount</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>VAT</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp -</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8"></div>
                    <div class="col-4 text-end">
                        <a href="" class="btn btn-primary">Simpan Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">LIST INGOING</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Mulai Dari</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4 mb-5">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>No. Transaksi</td>
                                    <td>No. Purchase Order</td>
                                    <td>Tgl Masuk</td>
                                    <td>Supplier</td>
                                    <td>Qty Item</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td><a href="" class="btn btn-primary">Pilih</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pilihdatapo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Mulai Dari</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4 mb-5">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>No. PO</td>
                                    <td>No. INGOING</td>
                                    <td>Supplier</td>
                                    <td>Tgl Order</td>
                                    <td>Tgl Delivery</td>
                                    <td>Qty Item</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td><a href="" class="btn btn-primary">Pilih</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>