<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
        </ol>
        <h3 class="text-white">Ingoing Report</h3>
    </nav>
</div>
<div class="content bg-white  mx-4">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <div class="row mb-4">
            <div class="col-9">
                <label for="" class="form-label fs-3 mb-3">Periode</label>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-5">
                                <label for="" class="form-label">Mulai dari</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Sampai dengan</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="" class="form-label">Urutkan berdasarkan</label>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">Supplier</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">Item</label>
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="col-5">
                                <a href="" class="btn btn-primary ">Pencarian</a>
                                <a href="" class="btn" style="margin-left: 10px;">Reset</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
                <div class="me-3 mb-3">
                    <p></p>
                    <a class="btn btn-light" id="btn_exportexcel"><i class='bx bxs-download'>Download</i></a>
                    <a class="btn btn-light" onclick="printdata()"><i class='bx bx-printer'>Cetak</i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table m-0 text-center">
                    <thead style="background:#1143d8;color:white;">
                        <tr>
                            <th>Supplier/ Tgl. Transaksi</th>
                            <th>No. Transaksi</th>
                            <th>Surat Jalan/GR</th>
                            <th>Tipe Ingoing</th>
                            <th>No. Purchase Order</th>
                            <th>Qty Item</th>
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
                                                <th>Qty PO</th>
                                                <th>Qty IN</th>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>