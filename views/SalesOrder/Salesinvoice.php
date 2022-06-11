<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Sales Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Invoice</li>
            </ol>
            <h3 class="text-white">Sales Invoice Status</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-5">
                <div class="col-4">
                    <label for="" class="form-label fs-3 mb-3">Filter Pencarian</label>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="exampleFormControlInput1" class="form-label">No. Invoice</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-2"></div>
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
                    <label for="" class="form-label fs-3 mb-3">Periode Invoice</label>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipe Periode</label>
                            <select class="form-select" id="statusquo" aria-label="Default select example">
                                <option value="">Pilih Status Quotation</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipe Sales <span style="color:red">*</span></label>
                            <select class="form-select" id="statusquo" aria-label="Default select example">
                                <option value="">Pilih Status Quotation</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Status Invoice</label>
                            <select class="form-select" id="statusquo" aria-label="Default select example">
                                <option value="">Pilih Status Quotation</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <p></p>
                            <a href="" class="btn mt-3">Reset</a>
                            <a href="" class="btn btn-primary mt-3">Pencarian</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped list-akses p-0 m-0 " id="table-user">
                    <thead class="text-center text-white" style="background:#1143d8">
                        <tr>
                            <th>No. Invoice</th>
                            <th>Customer</th>
                            <th>Tgl. Transaksi</th>
                            <th>Due Date</th>
                            <th>Mata Uang</th>
                            <th>V.A.T</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center " id="detailx">
                        <tr>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td>as</td>
                            <td><a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary"><i class='bx bx-window-open'></i> Detail</a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-end" colspan="6">Grand Total</td>
                            <td id="total">Rp. 24.000.000,00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Data Inventory Out</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="" class="form-label">No. Sales Invoice</label>
                        <p><b>INVSO-202212012111</b></p>
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">Customer</label>
                        <p><b>SAM B</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Tgl. Transaksi</label>
                        <p><b>09-09-2022</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Last Update</label>
                        <p><b>09-10-2022</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Status</label>
                        <p><b>Finish</b></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <table class="table">
                        <thead class="text-center text-white" style="background:#1143d8">
                            <tr>
                                <th>No. Sales Order</th>
                                <th>No. Outgoing</th>
                                <th>Nama Item</th>
                                <th>SKU</th>
                                <th>Unit</th>
                                <th>Spesifikasi</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>VAT</th>
                                <th>Diskon</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
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
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-2">
                                    <label for="" class="form-label">Sub Total</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Diskon Transaksi</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">VAT</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Total</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Amount Paid</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Balance</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row mb-2">
                                    <label for="" class="form-label">Rp. 700.000,00</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
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
</script>