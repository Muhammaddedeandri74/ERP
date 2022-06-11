<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Sales Management </a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Adjustment</li>
        </ol>
        <h3 class="text-white">Register Sales Invoice Adjustment</h3>
    </nav>
</div>
<div class="content bg-white  mx-4">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label class="mb-3 fs-5">Informasi Dasar</label>
                <div class="row mb-3">
                    <div class="col-10">
                        <label class="form-label">No. Payment</label>
                        <input type="text" name="" class="form-control" placeholder="INV-2121/22/12" value="" readonly>
                    </div>
                    <div class="col-2 mt-3"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-10">
                        <label for="exampleFormControlInput1" class="form-label">Customer</label>
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
            <div class="col-5">
                <label class="mb-3 fs-5">Informasi Detail </label>
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pembayaran</label>
                        <input type="date" name="dateinvoice" id="dateinvoice" class="form-control" value="" autocomplete="off">
                    </div>
                    <div class="col-5">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Mata Uang</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="" selected>Rupiah</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
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
                    <p class="text-muted">Mengambil data Invoice</p>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <label for="exampleFormControlInput1" class="form-label">No. Invoice</label>
                        <input type="text" name="" id="" placeholder="Pilih Data" class="form-control" value="" autocomplete="off" readonly>
                        <div class="row">
                            <span class="text-muted" style="font-size: 15px">Semua data Invoice Customer akan tampil</span>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <p></p>
                        <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary" onclick="loaddata()">Cari Data</a>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="" class="form-label fs-3">Adjustment</label>
                    <div class="row">
                        <div class="col-5">
                            <label for="adjamount" class="form-label">Adjustment Amount</label>
                            <input type="text" class="form-control" name="" id="adjamount">
                        </div>
                        <div class="col-5">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">AUTO CALCULATE</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <label for="" class="form-label fs-4 mt-5">Periode Waktu Invoice</label>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="" class="form-label">Mulai Dari</label>
                        <input type="date" name="" id="dateinvoice" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label">Sampai Dengan</label>
                        <input type="date" name="" id="duedate" class="form-control">
                    </div>
                    <div class="col-4">
                        <p></p>
                        <a href="" class="btn btn-outline-primary mt-3">Ambil Data</a>
                    </div>
                </div>
                <div class="row">
                    <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan Customer diatas</span>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <table class="table m-0 text-center">
                    <thead style="background:#1143d8;color:white;">
                        <tr>
                            <th>No. Invoice</th>
                            <th>Tgl. Invoice</th>
                            <th>Mata Uang</th>
                            <th>VAT</th>
                            <th>Invoice Amount</th>
                            <th>Adjustment Amount</th>
                            <th>Balance Amount</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="detailx">
                        <tr>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="card p-3 text-end" style="border-radius: 8px">
                    <div class="row ">
                        <div class="col-6 ">
                            <p>Amount</p>
                        </div>
                        <div class="col-6">
                            <p>Rp. -</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Total Adjustment Amount</p>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <input type="number" class="form-control" id="" name="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Advanced Amount</p>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <input type="number" class="form-control" id="" name="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Balance</p>
                        </div>
                        <div class="col-6">
                            <p>Rp. -</p>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button href="" class="btn btn-primary mt-4 px-5">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="exampleModalLabel">List Invoice</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                        <input type="text" name="search" id="search" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleFormControlInput1" class="form-label">Mulai Dari</label>
                                <input type="date" name="" id="datestart" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col-4">
                                <label for="exampleFormControlInput1" class="form-label">Sampai Dengan</label>
                                <input type="date" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col-4 mb-5">
                                <p></p>
                                <a href="" class="btn btn-primary mt-3" onclick="loaddatax()">Terapkan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
                                    <th>No. Invoice</th>
                                    <th>Tgl Invoice</th>
                                    <th>Customer</th>
                                    <th>Qty Item</th>
                                    <th>Amount</th>
                                    <th>Status <i class='bx bx-down-arrow-alt'></i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                    <td>~</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>