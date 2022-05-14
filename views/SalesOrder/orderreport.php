<form action="<?php echo base_url('MasterDataControler/addsalesorder') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Order</li>
            </ol>
            <h3 class="text-white">Register Order Confirmation</h3>
        </nav>
    </div>
    <div class="content bg-white  mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">Status Order</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3">
                            <p></p>
                            <a href="" class="btn btn-primary mt-3">Terapkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label for="" class="form-label">Pencarian</label>
                    <input type="text" class="form-control" placeholder="Cari Berdasarkan Customer" name="" id="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table m-0">
                    <thead class="border-0">
                        <tr>
                            <th><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
                            <th>No. Sales Order</th>
                            <th>Tgl. Transaksi</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>DPP</th>
                            <th>Discount</th>
                            <th>Total Amount</th>
                            <th>Status <i class='bx bx-down-arrow-alt'></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </td>
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
                            <td colspan="4">Total Order :</td>
                            <td>100</td>
                            <td>Rp. 15.000.000</td>
                            <td>Rp. 15.000.000</td>
                            <td>Rp. 15.000.000</td>
                        </tr>
                    </tfoot>
                </table>
                <table class="table p-0 m-0">
                    <tbody style="background-color: #0000001E;">
                        <tr>
                            <td>
                                <div class="row">
                                    <label for="">Report</label>
                                    <div class="col-6">
                                        <a href="" class="btn"><i class="bx bxs-download"></i>Download</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="" class="btn"><i class="bx bx-printer"></i>Cetak</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: #F56764" class="bx bxs-circle"></i> Total Semua Sales Order</label>
                                    <p>Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: #FCAA25" class="bx bxs-circle"></i> Total Sales Order Pending</label>
                                    <p>Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: #008F43" class="bx bxs-circle"></i> Total Sales Order Selesai</label>
                                    <p>Rp. 12.000.000,00</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background:#1143d8;color:white;">
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH CUSTOMER BARU</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label">Code Customer</label>
                                <input type="text" name="codesupp" class="form-control" value="<?php echo $idsupp ?>" readonly>
                                <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email Pengguna" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label">Type Customer</label>
                                <select name="typecust" class="form-select" aria-label="Default select example">
                                    <option Value="">Pilih</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Supplier">Supplier</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">No. Telpon</label>
                                <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Masukkan Nomor Telepon Pengguna" name="" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="" class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="namaperusahaan" id="" class="form-control" placeholder="Masukkan Nama Perusahaan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Contact Person</label>
                                        <input type="text" name="nocontact" class="form-control" placeholder="Masukkan Contact Person" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" cols="30" rows="4"></textarea>
                                <div class="text-end">
                                    <span style="font-size: 10px" class="text-muted">Maksimal 200 Karakter</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="form-label fs-3 mb-3">Informasi Bank</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Pilih Bank</td>
                                            <td>Nomor Rekening</td>
                                            <td>Attr/Beneficiary</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>~</td>
                                            <td>~</td>
                                            <td>~</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="" class="btn btn-primary"><i class="bx bx-plus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="modaldata" tabindex="-1" aria-labelledby="modaldataLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">PILIH DATA QUOTATION</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
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
                                    <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </td>
                                    <td>No. Quotation</td>
                                    <td>Judul Quotation</td>
                                    <td>Customer</td>
                                    <td>Qty Item</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>