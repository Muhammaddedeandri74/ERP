<form action="<?php echo base_url('OrderManagementController/orderreport') ?>" method="POST" enctype="multipart/form-data">
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
            <div class="row mb-5">
                <div class="col-9">
                    <label for="" class="form-label fs-4 mb-3">Periode</label>
                    <div class="row">
                        <div class="col-2">
                            <label for="" class="form-label">Mulai dari</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Customer</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p></p>
                            </div>
                            <a href="" class="btn btn-primary mt-3">Pencarian</a>
                            <a href="" style="margin-left: 10px;" class="btn mt-3">Reset</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label for="" class="form-label fs-3 mb-3">Cetak &amp; Download</label>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-light"><i class="bx bxs-download">Download</i></button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-light"><i class="bx bx-printer">Cetak</i></button>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table m-0 text-center">
                    <thead style="background:#1143d8;color:white;">
                        <tr>
                            <th>Customer/ Tgl. Transaksi</th>
                            <th>No. Transaksi</th>
                            <th>No. Invoice</th>
                            <th>Total Amount</th>
                            <th>Total Adj.</th>
                            <th>balance Amount</th>
                            <th>VAT</th>
                            <th>Mata Uang</th>
                            <th>Exch. Rate</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="detailx">
                        <tr>
                            <td class="bg-light text-black text-start" colspan="11">Budi darmawan</td>
                        </tr>
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
                            <td class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">expand </td>
                        </tr>
                        <td colspan="10">
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table text-center" style="background:#00000019;">
                                        <thead>
                                            <tr>
                                                <th>No. Sales Order</th>
                                                <th>No. Outgoing</th>
                                                <th>Name Item</th>
                                                <th>SKU</th>
                                                <th>Unit</th>
                                                <th>Spesifikasi</th>
                                                <th>Harga</th>
                                                <th>QTY</th>
                                                <th>VAT</th>
                                                <th>Diskon</th>
                                                <th>Total</th>
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
                                                <td>~</td>
                                                <td>~</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4">
                                            <div class="row mb-2">
                                                <div class="col-6 text-end">
                                                    <label for="" class="form-label">Sub Total</label>
                                                </div>
                                                <div class="col-6 ">
                                                    <label for="" class="form-label">Rp. 750.000</label>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 text-end">
                                                    <label for="" class="form-label">Diskon Transaksi</label>
                                                </div>
                                                <div class="col-6 ">
                                                    <label for="" class="form-label">Rp. 750.000</label>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 text-end">
                                                    <label for="" class="form-label">VAT</label>
                                                </div>
                                                <div class="col-6 ">
                                                    <label for="" class="form-label">Rp. 750.000</label>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 text-end">
                                                    <label for="" class="form-label fw-bold">Total</label>
                                                </div>
                                                <div class="col-6 ">
                                                    <label for="" class="form-label fw-bold">Rp. 750.000</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <tr style="background-color: #E6ECFF;">
                            <td class=" text-black text-end" colspan="3">Budi darmawan | Total</td>
                            <td>Rp. 1.000.000</td>
                            <td>Rp. 1.000.000</td>
                            <td>Rp. 1.000.000</td>
                            <td colspan="4"></td>
                        </tr>
                    </tbody>
                    <tfoot style="background:#1143d8;color:white;">
                        <tr>
                            <td class="text-end" colspan="3">Grand Total All Transaction </td>
                            <td id="totalsub">Rp. 15.000.000</td>
                            <td id="totalvat">Rp. 15.000.000</td>
                            <td id="totalongkir">Rp. 15.000.000</td>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>