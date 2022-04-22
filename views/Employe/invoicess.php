<style>
    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .fw {
        font-weight: bold;
    }

    .fsfw {
        font-size: 20px;
        font-weight: bold;
    }

    .fkfw {
        font-size: 16px;
        font-weight: bold;
    }
</style>

<body class="bg-light">

    <div class="container-xxl" style="background-color : #3C2E8F;">
        <div class="row">
            <div class="col-1"><br><br>
                <button class="btn ml-5 bg-transparent"><i style="color: white; font-size: 30px" class="fa fa-arrow-left" aria-hidden="true"></i></button>
            </div>
            <div class="col-11">
                <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Invoice / Detail</p>
                <p class="text-white font-weight-bold pl-2" style="font-size: 25px">Update Data Invoice</p>
            </div>
        </div>
    </div>

    <div class="container-fluid border" style="width: 95%; background-color: white">
        <div class="row d-flex justify-content-between" style="border-bottom: 2px grey;">
            <div class="col-10 fw">
                <p class="pl-5 pt-5" style="font-size: 20px;">INV-XXXX-XX</p>
            </div>
            <div class="col-2">
                <p class="btn btn-primary justify-content-end col-12 mt-5">Update Data</p>
            </div>
            <hr style="width: 98%;">
            <!-- content -->
            <div class="col-4">
                <div class="row">
                    <div class="col-4">
                        <p style="text-align: right;">Informasi Dasar</p>
                    </div>
                    <div class="col-8">
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Jenis Pemesanan</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Pilih buyer, supplier atau e-commerce</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Customer</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Masukkan judul penawaran</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 pt-4">
                        <p style="text-align: right;">Mata Uang & Pajak</p>
                    </div>
                    <div class="col-8 pt-4">
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Pilih Mata Uang</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Pilih mata uang untuk Transaksi</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="formFile" class="form-label">Jenis Pajak (VAT)</label>
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih nilai Pajak</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="formFile" class="form-label">Jenis Harga</label>
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih harga</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pt-4">
                        <p style="text-align: right;">Pembayaran</p>
                    </div>
                    <div class="col-8 pt-4">
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Metode Pembayaran</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Pilih metode pembayaran</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Nama Bank</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Masukkan nomor</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Nomor Rekening</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Masukkan nomor</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 pt-4">
                        <p style="text-align: right;">Pengiriman</p>
                    </div>
                    <div class="col-8 pt-4">
                        <div class="mb-2">
                            <label for="formFile" class="form-label">Tanggal Pengiriman</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Pilih Tanggal Pengiriman</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="lh-sm">
                            <p>Alamat</p>
                            <p>loremipsumasjdkjas</p>
                        </div>
                    </div>
                    <div class="col-4 pt-4">
                        <p class="pt-1" style="text-align: right;">Global Diskon</p>
                    </div>
                    <div class="col-8 pt-4">
                        <a class="btn btn-outline-dark">Pilih Presentase</a>
                        <a class="btn btn-outline-dark">Pilih Nominal</a>
                    </div>
                </div>
            </div>
            <div class="col-8 pl-5">
                <p>Update Status Pembayaran</p>
                <div class="form-check">
                    <div class="row d-flex justify-content-between">
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Dibayar
                            </label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Outstanding
                            </label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Bayar Sebagian
                            </label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Batal
                            </label>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-3">
                            <a class="btn btn-outline-primary col-12">Cetak</a>
                        </div>
                    </div>
                </div>
                <div style="padding-top: 4vh;">
                    <p class="fsfw"">Produk/Item</p>
                </div>
                <div class=" card bg-light">
                    <div class="card-body">
                        <table class="table border ">
                            <thead class="text-white " style="background-color: #3C2E8F">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Qty.</th>
                                    <th scope="col">Harga/Satuan</th>
                                    <th scope="col">Disc.</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: white;">
                                <tr>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-2 pt-3" style="text-align: right;">
                        <div>
                            <p class="fkfw">Jumlah Item</p>
                            <p class="fkfw">Grand Total</p>
                        </div>
                    </div>
                    <div class="col-2 pt-3">
                        <div>
                            <p class="fkfw">1</p>
                            <p class="fkfw">1.200.000</p>
                        </div>
                    </div>
                </div>
                <div class="fsfw">
                    <p>Additional Info</p>
                    <textarea name="" id="" cols="120" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
</body>