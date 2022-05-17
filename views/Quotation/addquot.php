<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Quotation</li>
            </ol>
            <h3 class="text-white">Register Quotation</h3>
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
                                <div class="col-8">
                                    <label class="form-label">No. Quotation</label>
                                    <input type="text" name="codepo" class="form-control" value="" autocomplete="off">
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" class="btn btn-primary">Cari Data</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">Customer</label>
                                    <select name="idsupp" class="form-select" aria-label="Default select example" onchange="supp(this.value)">
                                        <option selected>Pilih</option>
                                        <?php if ($data != "Not Found") : ?>
                                            <?php foreach ($data as $key) : ?>
                                                <option value="<?php echo $key["idsupp"] ?>"><?php echo $key["namesupp"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="col-4"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Judul Quotation </label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="4"></textarea>
                                    <div class="row text-end">
                                        <span style="font-size: 10px;" class="text-muted">Maksimal 100 Karakter</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Penawaran Berlaku</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Akun Perbankan </label>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Norekening</label>
                                    <select name="norekening" id="norekening" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <?php if ($data != "Not Found") : ?>
                                            <?php foreach ($data as $key) : ?>
                                                <option value="<?php echo $key["norekening"] ?>"><?php echo $key["norekening"] ?> - <?php echo $key["namabank"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Pajak </label>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Gunakan VAT</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                    </div>
                                </div>
                            </div>
                            <label class="mb-3 fs-5">Cetak & Download</label>
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
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="row mb-5" style="overflow-x: auto;">
                        <h5>Item/Produk</h5>
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Nama Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sku</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Type Disc.</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Discount Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
                                    <td>as</td>
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
                                    <p>PPN</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp -</p>
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
                        <a href="" class="btn btn-primary">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function supp(x) {
        var data = <?php echo json_encode($data) ?>;
        for (let i = 0; i < data.length; i++) {
            if (data[i]["idsupp"] == x) {
                $('#norekening').val(data[i]["norekening"])
            }

        }
    }
</script>