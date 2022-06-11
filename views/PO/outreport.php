<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory Out</li>
        </ol>
        <h3 class="text-white">Outgoing Report</h3>
    </nav>
</div>
<div class="content bg-white  mx-4">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <form action="<?php echo base_url('MasterDataControler/AddInventoryin') ?>" method="POST" enctype="multipart/form-data" id="form">
            <div class="row mb-4">
                <div class="col-3">
                    <label for="" class="form-label fs-3 mb-3">Filter Status</label>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control" value="<?php echo date('Y-m') . '-01' ?>">
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="tanggalmasuk" id="date2" style="cursor: pointer;" class="form-control" value="<?php echo date('Y-m-t') ?>">
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row mt-3">
                        <p></p>
                    </div>
                    <div class="row mt-4">
                        <label for="" class="form-label">Urutkan Berdasarkan</label>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Customer
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Item
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <a href="#" class="btn btn-primary" onclick="loaddata()">PENCARIAN</a>
                            <a href="" style="margin-left: 10px;" class="btn">RESET</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-4">
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
        </form>
    </div>
    <div class="row">
        <div class="col">
            <table class="table m-0 text-center">
                <thead style="background:#1143d8;color:white;">
                    <tr>
                        <th>Customer/ Tgl. Transaksi</th>
                        <th>No. Transaksi</th>
                        <th>No. Sales Order</th>
                        <th>Tipe Outgoing</th>
                        <th>No. Surat Jalan</th>
                        <th>Qty Item</th>
                        <th>Action</th>
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
                        <td class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">expand </td>
                    </tr>
                    <td colspan="10">
                        <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table text-center" style="background:#00000019;">
                                    <thead>
                                        <tr>
                                            <th>Name Item</th>
                                            <th>SKU</th>
                                            <th>Unit</th>
                                            <th>Spesifikasi</th>
                                            <th>Qty Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                    </td>
                    <tr>
                        <td> Total Transaksi :</td>
                        <td colspan="7"></td>
                    </tr>
                </tbody>
                <tfoot style="background:#1143d8;color:white;">
                    <tr>
                        <td> Total Transaksi :</td>
                        <td colspan="7"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>