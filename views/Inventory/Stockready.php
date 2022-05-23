<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Transaction Book</li>
            </ol>
            <h3 class="text-white">Stock Ready</h3>
        </nav>
    </div>
    <div class="content bg-white  mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <div class="row">
                        <div class="col-5">
                            <label for="" class="form-label">Pilih Gudang</label>
                            <select name="namewarehouse" id="" class="form-select" required>
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Item Type</label>
                            <select name="" id="" class="form-select" onchange="ubah(this.value)">
                                <option value="bahbak">Bahan Baku</option>
                                <option value="produk">Produk</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-4">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">Terapkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Cetak & Download</label>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                            <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                    <div class="input-group">
                        <div class="col-4">
                            <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                <option value="codequo">No.Quotation</option>
                                <option value="namequotation">Nama Quotation</option>
                                <option value="namecust">Nama Customer</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="text" id="search" class="form-control" placeholder="Cari Data">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bahbakx" class="row mb-5" style="overflow-x: auto;">
            <div class="col">
                <table class="table table-bordered table-striped " id="table-user">
                    <thead>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>Nama Item</td>
                            <td>Spesifikasi</td>
                            <td>Item Type</td>
                            <td>SKU</td>
                            <td>Unit</td>
                            <td>Min Stock</td>
                            <td>Ready Stock</td>
                            <td>QTY Order</td>
                            <td>Balance</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
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
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 text-end">
                <a href="" class="btn btn-primary">BUAT REQUEST PO</a>
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