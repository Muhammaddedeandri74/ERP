<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Quotation</li>
            </ol>
            <h3 class="text-white">Quotation Report</h3>
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
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family: FontAwesome" />
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family: FontAwesome" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family: FontAwesome" />
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <p></p>
                                    <a href="" class="btn btn-primary">Terapkan</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="row mb-5" style="overflow-x: auto;">
                        <h5>Item/Produk</h5>
                        <table class="table table-bordered table-striped list-akses p-0 m-0" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No. Quotation</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Judul Quotation</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Customer</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total Amount</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Status <i class="bx bx-chevron-down arrow"></i></td>
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
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">Total Quotation</td>
                                    <td>Rp. 24.000.000,00</td>
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
                                            <label for=""><i style="color: red" class='bx bxs-circle'></i> Total Semua Quotation</label>
                                            <p>Rp. 12.000.000,00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Semua Pending</label>
                                            <p>Rp. 12.000.000,00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Semua Accept</label>
                                            <p>Rp. 12.000.000,00</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>