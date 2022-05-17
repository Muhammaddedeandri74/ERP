<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Transaction Book</li>
            </ol>
            <h3 class="text-white">IN/OUT REPORT</h3>
        </nav>
    </div>
    <div class="content bg-white  mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">Pilih Gudang</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Gudang 1</option>
                                <option value="1">Gudang 2</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-3">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">Terapkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
                <div class="col-3">
                    <label for="" class="form-label">Cetak & Download</label>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                            <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="mb-3 row">
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary text-white" id="basic-addon1">Pencarian</span>
                                <input type="text" class="form-control" placeholder="Cari Berdasarkan Customer" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
        <div class="row mb-3" style="border-bottom: 1px solid;border-top: 1px solid">
            <label for="" class="form-label fs-4 mt-3">SKU-ITEM | SAYUR KOL</label>
            <div class="mb-3">
                <table class="table table-bordered table-striped" id="table-user">
                    <thead style="background:#CFDBFF">
                        <tr>
                            <td>No. Transaksi</td>
                            <td>Tanggal</td>
                            <td>Unit</td>
                            <td>Masuk</td>
                            <td>Harga Pokok</td>
                            <td>Nilai</td>
                            <td>Keluar</td>
                            <td>Harga Pokok</td>
                            <td>Nilai</td>
                            <td>Balance</td>
                            <td>Harga Pokok</td>
                            <td>Nilai</td>
                        </tr>
                    </thead>
                    <tbody style="background: 000000;">
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
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                        </tr>
                    </tbody>
                    <tfoot style="background:#CFDBFF">
                        <tr>
                            <td colspan="3">Total Sayur Kol :</td>
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
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</form>

<script>
    function ubah(x) {
        if (x == "produk") {
            $('#produkx').show();
            $('#bahbakx').hide();
        } else if (x == "bahbak") {
            $('#produkx').hide();
            $('#bahbakx').show();
        }
    }
</script>