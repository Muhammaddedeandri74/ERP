<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory Out</li>
        </ol>
        <h3 class="text-white">Outgoing Status</h3>
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
                <div class="col-4">
                    <label for="" class="form-label fs-3 mb-3">Filter Status</label>
                    <div class="row mb-3">
                        <div class="col-5">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label">Gudang</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Tipe Outgoing</label>
                            <select name="tipeingoing" id="tipeingoing" class="form-select" onchange="ubah(this.value)">
                                <option value="all" selected>Semua</option>
                                <option value="sales">Sales</option>
                                <option value="mvwh">Move Warehouse</option>
                                <option value="ret">Return</option>
                                <option value="outg">Out Gudang</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">Supplier</label>
                            <input type="text" name="customer" class="form-control" style="font-size:1rem;" placeholder="PT. Merdeka">
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-4">
                    <label for="" class="form-label fs-3 mb-5"> </label>
                    <div id="all">
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Status</label>
                                <select name="namewarehouse" id="" class="form-select" required>
                                    <option value="">Semua</option>
                                    <option value="">Waiting</option>
                                    <option value="">Process</option>
                                    <option value="">Finish</option>
                                    <option value="">Cancle</option>
                                </select>
                            </div>
                            <div class="col-7"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">Item</label>
                            <input type="text" class="form-control" placeholder="Pilih Item yang di cari" readonly>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5"></div>
                        <div class="col-2">
                            <a href="" class="btn">RESET</a>
                        </div>
                        <div class="col-3" style="margin-left: 0.6vw;">
                            <a href="" class="btn btn-primary">PENCARIAN</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div id="salesx" style="display: none;"></div>
                    <div id="mvwhx" style="display: none;"></div>
                    <div id="retx" style="display: none;"></div>
                    <div id="outgx" style="display: none;"></div>
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
            <label for="" class="form-label fs-4">Item/Produk</label>
            <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
            <div id="sale">
                <table class="table m-0">
                    <thead class="border-0 text-center bg-primary" style="color: white">
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Tipe Outgoing</th>
                            <th>No. Sales Order</th>
                            <th>Tgl. Transaksi</th>
                            <th>Customer</th>
                            <th>No. Delivery Order</th>
                            <th>Status</th>
                            <th>Action</th>
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
                            <td data-mdb-toggle="modal" data-mdb-target="#modal1">Action</td>
                        </tr>
                        <tr>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td>~</td>
                            <td data-mdb-toggle="modal" data-mdb-target="#modal1">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="mvh" style="display: none;">
                <table class="table m-0">
                    <thead class="border-0 text-center bg-primary" style="color: white">
                        <tr>
                            <th>Nama Item</th>
                            <th>SKU</th>
                            <th>Deskripsi</th>
                            <th>QTY Order</th>
                            <th>QTY Out</th>
                            <th>Harga</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Action</th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="out" style="display: none;">
                <table class="table m-0">
                    <thead class="border-0 text-center bg-primary" style="color: white">
                        <tr>
                            <th>Nama Item</th>
                            <th>SKU</th>
                            <th>Deskripsi</th>
                            <th>QTY Order</th>
                            <th>QTY Out</th>
                            <th>Harga</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Action</th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="retr" style="display: none;">
                <table class="table m-0">
                    <thead class="border-0 text-center bg-primary" style="color: white">
                        <tr>
                            <th>Nama Item</th>
                            <th>SKU</th>
                            <th>Deskripsi</th>
                            <th>QTY Order</th>
                            <th>QTY Out</th>
                            <th>Harga</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Action</th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="modal1Label">DETAIL OUTGOING (NAME INV)</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <label for="" class="form-label">No. Sales Order</label>
                        <p>~</p>
                    </div>
                    <div class="col-1">
                        <label for="" class="form-label">Tipe OUT</label>
                        <p>~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">No. Pesanan</label>
                        <p>~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Tgl. Transaksi</label>
                        <p>~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Customer</label>
                        <p>~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">No. Delivery</label>
                        <p>~</p>
                    </div>
                    <div class="col-1">
                        <label for="" class="form-label">Status</label>
                        <p>~</p>
                    </div>
                </div>
                <div class="row mx-1" style="overflow-x: auto;">
                    <table class="table table-bordered table-striped" id="table-user">
                        <thead>
                            <tr>
                                <td>Nama Item</td>
                                <td>SKU</td>
                                <td>Spesifikasi</td>
                                <td>Unit</td>
                                <td>Qty Out</td>
                                <td>Total</td>
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
                            <td colspan="6" id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="row accordion-body">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Bahan</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Qty Out</th>
                                                    <th scope="col">Balance</th>
                                                    <th scope="col">Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="cursor: pointer;" data-toggle="modal" data-target="#modalino">
                                                    <th scope="row">1</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    <td>@fat</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    <td>@fat</td>
                                                    <td>@fat</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
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
        </div>
    </div>
</div>
<script>
    function ubah(x) {
        if (x == "sales") {
            $('#sale').show();
            $('#sales').show();
            $('#salesx').show();
            $('#salesxy').show();
            $('#mvh').hide();
            $('#mvwh').hide();
            $('#mvwhx').hide();
            $('#mvwhxy').hide();
            $('#ret').hide();
            $('#retr').hide();
            $('#retx').hide();
            $('#retxy').hide();
            $('#out').hide();
            $('#outg').hide();
            $('#outgx').hide();
            $('#outgxy').hide();
            $('#all').hide();
        } else if (x == "mvwh") {
            $('#sale').hide();
            $('#sales').hide();
            $('#salesx').hide();
            $('#salesxy').hide();
            $('#mvh').show();
            $('#mvwh').show();
            $('#mvwhx').show();
            $('#mvwhxy').show();
            $('#ret').hide();
            $('#retr').hide();
            $('#retx').hide();
            $('#retxy').hide();
            $('#out').hide();
            $('#outg').hide();
            $('#outgx').hide();
            $('#outgxy').hide();
            $('#all').hide();
        } else if (x == "ret") {
            $('#sale').hide();
            $('#sales').hide();
            $('#salesx').hide();
            $('#salesxy').hide();
            $('#mvh').hide();
            $('#mvwh').hide();
            $('#mvwhx').hide();
            $('#mvwhxy').hide();
            $('#ret').show();
            $('#retr').show();
            $('#retx').show();
            $('#retxy').show();
            $('#out').hide();
            $('#outg').hide();
            $('#outgx').hide();
            $('#outgxy').hide();
            $('#all').hide();
        } else if (x == "outg") {
            $('#sale').hide();
            $('#sales').hide();
            $('#salesx').hide();
            $('#salesxy').hide();
            $('#mvh').hide();
            $('#mvwh').hide();
            $('#mvwhx').hide();
            $('#mvwhxy').hide();
            $('#ret').hide();
            $('#retr').hide();
            $('#retx').hide();
            $('#retxy').hide();
            $('#out').show();
            $('#outg').show();
            $('#outgx').show();
            $('#outgxy').show();
            $('#all').hide();
        } else if (x == "all") {
            $('#sale').hide();
            $('#sales').hide();
            $('#salesx').hide();
            $('#salesxy').hide();
            $('#mvh').hide();
            $('#mvwh').hide();
            $('#mvwhx').hide();
            $('#mvwhxy').hide();
            $('#ret').hide();
            $('#retr').hide();
            $('#retx').hide();
            $('#retxy').hide();
            $('#out').show();
            $('#outg').show();
            $('#outgx').show();
            $('#outgxy').show();
            $('#all').show();
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>