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
                <div class="col-4">
                    <label class="form-label fs-4 mb-3">Informasi Dasar</label>
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Supplier</label>
                            <select name="namesupp" id="" class="form-select" value="<?= set_value('codepo') ?>">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">Cari Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <label class="form-label fs-4 mb-3">Informasi Advance </label>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="" class="form-label">Mata Uang</label>
                            <select name="" id="" class="form-select">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Exchange Rate</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Advance Amount</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>
                        <div class="col-3">
                            <p></p>
                            <a href="" class="btn btn-primary mt-3">SIMPAN ADVANCE</a>
                        </div>
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
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label class="form-label fs-5">List Advance </label>
                <table class="table table-bordered table-striped" id="table-user">
                    <thead class="text-white text-center" style="background:#1143d8">
                        <tr>
                            <td>No. Advance</td>
                            <td>Supplier</td>
                            <td>Tgl. Advance</td>
                            <td>Mata Uang</td>
                            <td>Exch. Rate</td>
                            <td>Advance Amount</td>
                            <td>Adjustment Amount</td>
                            <td>Balance Amount</td>
                            <td>No. Voucher</td>
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
                            <td>~</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Grand Total</td>
                            <td>Rp. 500.000,00</td>
                            <td>Rp. 0,00</td>
                            <td>Rp. 500.000,00</td>t
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</form>