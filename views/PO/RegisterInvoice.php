<form action="<?php echo base_url('InventoryController/PoStatus') ?>" method="POST">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Adjustment</li>
            </ol>
            <h3 class="text-white">Register Invoice Adjustment</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-4">
                <div class="col-3">
                    <label class="form-label fs-4 mb-3">Informasi Dasar</label>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">No. Payment</label>
                            <input type="text" name="" id="" placeholder="INVPAY_2022/05/09-001" class="form-control" autocomplete="off" autofocus readonly>
                        </div>
                        <div class="col-2 mt-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <label for="" class="form-label">Supplier</label>
                            <select name="namesupp" id="" class="form-select" value="<?= set_value('codepo') ?>">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label fs-4 mb-3">Informasi Detail </label>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" class="form-control" name="date1" id="date1" value="<?= set_value('date1') ?>">
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label">Mata Uang</label>
                                    <select name="" class="form-select" aria-label="Default select example">
                                        <option value="">Rupiah</option>
                                        <option value="">USD</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="fs-5 mb-3">Cetak & Download</label>
                    <div class="row mt-3">
                        <div class="col-4">
                            <p></p>
                            <a class="btn btn-light" id="btn_exportexcel"><i class='bx bxs-download'>Download</i></a>
                        </div>
                        <div class="col-4">
                            <p></p>
                            <a class="btn btn-light" onclick="printdata()"><i class='bx bx-printer'>Cetak</i></a>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <div class="row mb-3">
                            <label for="" class="fs-3 form-label">Ambil Data</label>
                            <span class="text-muted">Mengambil data Invoice</span>
                        </div>
                        <div class="row mb-3">
                            <div class="col-8">
                                <label for="exampleFormControlInput1" class="form-label">No. Invoice</label>
                                <input type="text" name="" id="" class="form-control text-muted" placeholder="Pilih Data" readonly="" value="" autocomplete="off">
                                <div class="row">
                                    <span class="text-muted" style="font-size: 15px">Semua data Invoice supplier akan tampil</span>
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <p></p>
                                <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary">Cari Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label fs-4 mt-4">Perioder Waktu Invoice</label>
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
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label class="form-label fs-5">Item/Produk</label>
                <table class="table table-bordered table-striped" id="table-user">
                    <thead class="text-white text-center" style="background:#1143d8">
                        <tr>
                            <td>No. Invoice</td>
                            <td>Tgl. Invoice</td>
                            <td>Mata Uang</td>
                            <td>VAT</td>
                            <td>Invoice Amount</td>
                            <td>Adjustment Amount</td>
                            <td>Balance Amount</td>
                            <td>Action</td>
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
        <div class="row mb-3">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="card p-3" style="background-color: white;border-radius: 8px">
                    <div class="row">
                        <div class="col-6">
                            <p>Amount</p>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="" name="" readonly="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Adjustment Amount</p>
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" id="" name="" value="0" oninput="calc()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Purchase in Advance</p>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="" name="" readonly="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Balance Total</p>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="" name="" readonly="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 text-end">
                <a href="" class="btn btn-primary">SIMPAN</a>
            </div>
        </div>
    </div>
</form>

<script>

</script>