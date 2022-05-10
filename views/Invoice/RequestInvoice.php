<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Invoice</li>
            </ol>
            <h3 class="text-white">Purchase Invoice Status</h3>
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
                    <label for="" class="fs-3 mb-3">Pencarian & Filter</label>
                    <div class="row mb-3">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-3 mb-3">
                                    <label for="" class="form-label">No. Purchase Invoice</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="" class="form-label">Mulai Dari</label>
                                    <input type="date" class="form-control py-1">
                                </div>
                                <div class="col-2">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control py-1">
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">Status Purchase Invoice</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-2 mb-5">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3">Submit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="row mb-5" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No. Purchase Invoice</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No. Ingoing</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Supplier</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Tgl Transaksi</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Amount Trans.</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Last Update</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Status</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Update</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE INVOICE</h5>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">No. Invoice</label>
                            <p>INV-2022/22/22</p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">No. Ingoing</label>
                            <p>INV-2022/22/22</p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">Tgl. Transaksi</label>
                            <p>08/08/2008</p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">Supplier</label>
                            <p>PT. Sana Sini Oke</p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">No. Invoice</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-2 mb-3">
                            <p></p>
                            <a href="" class="btn btn-primary mt-3">Update</a>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nama Item</td>
                                    <td>SKU</td>
                                    <td>Unit</td>
                                    <td>Spesifikasi</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>VAT</td>
                                    <td>Diskon</td>
                                    <td>Total</td>
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
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <p>Sub Total</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>VAT</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Diskon Transaksi</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. -</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>