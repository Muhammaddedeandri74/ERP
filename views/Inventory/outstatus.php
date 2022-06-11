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
                                    <select class="form-select" id="idwh" aria-label="Default select example">

                                        <?php if ($data1 != "Not Found") {
                                            foreach ($data1 as $key) { ?>
                                                <option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
                                                <?php }
                                        } ?>>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Tipe Outgoing</label>
                            <select name="tipeingoing" id="tipeout" class="form-select" onchange="ubah(this.value)">
                                <option value="" selected>Semua</option>
                                <option value="sales">Sales</option>
                                <option value="mvwh">Move Warehouse</option>
                                <option value="ret">Return</option>
                                <option value="outg">Out Gudang</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <!-- <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">Supplier</label>
                            <input type="text" name="customer" class="form-control" style="font-size:1rem;" placeholder="PT. Merdeka">
                        </div>
                        <div class="col-2"></div>
                    </div> -->
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
                <div class="col-4">
                    <label for="" class="form-label fs-3 mb-5"> </label>
                    <div id="all">
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Status</label>
                                <select name="namewarehouse" id="status" class="form-select" required>
                                    <option value="">Semua</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Process">Process</option>
                                    <option value="Finish">Finish</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
                            <div class="col-7"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">Pencarian</label>
                            <div class="input-group">
                                <div class="col-4">
                                    <select name="filter" id="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                        <option value="codeinvout">No.Transaksi</option>
                                        <option value="codeso">No. Sales Order</option>
                                        <option value="nodo">No. Delivery Order</option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5"></div>
                        <div class="col-2">
                            <a href="" class="btn">RESET</a>
                        </div>
                        <div class="col-3" style="margin-left: 0.6vw;">
                            <a href="#" class="btn btn-primary" onclick="loaddata()">PENCARIAN</a>
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
            <label for="" class="form-label fs-4">List Outgoing</label>
            <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
            <div id="sale">
                <table class="table m-0">
                    <thead class="border-0 text-center bg-primary" style="color: white">
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Tipe Outgoing</th>
                            <th>No. Sales Order</th>
                            <th>Tgl. Transaksi</th>
                            <th>Gudang</th>
                            <th>No. Delivery Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="bodylist">
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
            <!-- <div id="mvh" style="display: none;">
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
            </div> -->
            <!-- <div id="out" style="display: none;">
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
            </div> -->
            <!-- <div id="retr" style="display: none;">
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
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="modal1Label">DETAIL OUTGOING </h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <label for="" class="form-label">No. Transaksi</label>
                        <p id="noinvout">~</p>
                    </div>
                    <div class="col-1">
                        <label for="" class="form-label">Tipe OUT</label>
                        <p id="typeout">~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">No. Sales Order</label>
                        <p id="codeso">~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Tgl. Transaksi</label>
                        <p id="dateout">~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Gudang</label>
                        <p id="idwhx">~</p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">No. Delivery</label>
                        <p id="nodo">~</p>
                    </div>
                    <div class="col-1">
                        <label for="" class="form-label">Status</label>
                        <p id="statusout">~</p>
                    </div>

                </div>
                <div class="row mx-1">
                    <table class="table table-bordered table-striped" id="table-user">
                        <thead>
                            <tr>
                                <td>Nama Item</td>
                                <td>SKU</td>
                                <td>Qty Out</td>
                                <td>Exp Date</td>
                                <td>Use BOM</td>

                            </tr>
                        </thead>
                        <tbody id="detailout">
                            <tr>
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

                                                    <th scope="col">Qty Out</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="cursor: pointer;" data-toggle="modal" data-target="#modalino">
                                                    <th scope="row">1</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>

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
                <button class="btn btn-danger" style="float: right;" id="cancel" onclick="cancelout()">Cancel</button>
                <button class="btn btn-danger" style="float: right;" id="edit" onclick="editout()">Edit</button>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo base_url('InventoryController/inventoryout') ?>" method="POST" id="formz">
    <input type="hidden" id="noinvoutx" name="noinvout">
</form>

<script>
    function ubah(x) {

    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    loaddata();
    var data;

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryOutControler/dataout') ?>",
            data: "idwh=" + $('#idwh').val() + "&tipeout=" + $('#tipeout').val() + "&date1=" + $('#date1').val() + "&date2=" + $('#date2').val() + "&status=" + $('#status').val() + "&filter=" + $('#filter').val() + "&search=" + $('#search').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {
                    data = hasil
                    for (let i = 0; i < hasil.length; i++) {
                        baris += ` <tr>
                            <td>` + hasil[i]["codeinvout"] + `</td>
                            <td>` + hasil[i]["typeout"] + `</td>
                            <td>` + hasil[i]["codeso"] + `</td>
                            <td>` + hasil[i]["dateout"] + `</td>
                            <td>` + hasil[i]["namewarehouse"] + `</td>
                            <td>` + hasil[i]["nodo"] + `</td>
                            <td>` + hasil[i]["statusout"] + `</td>
                            <td data-mdb-toggle="modal" data-mdb-target="#modal1" > <button class="btn btn-primary" onclick="detailout(` + hasil[i]["idinvout"] + `)">Detail</button></td>
                        </tr>`

                    }


                }
                $('#bodylist').html(baris)
            }
        });
    }

    function editout() {
        $('#formz').submit();
    }

    function detailout(x) {
        for (let i = 0; i < data.length; i++) {
            if (data[i]["idinvout"] == x) {

                if (data[i]["statusout"] == "Waiting") {
                    $('#cancel').show()
                } else {
                    $('#cancel').hide()
                }

                if (data[i]["edit"] == "yes") {
                    $('#edit').show()
                } else {
                    $('#edit').hide()
                }

                console.log(data[i])
                $('#noinvout').html(data[i]["codeinvout"])
                $('#typeout').html(data[i]["typeout"])
                $('#codeso').html(data[i]["codeso"])
                $('#dateout').html(data[i]["dateout"])
                $('#idwhx').html(data[i]["namewarehouse"])
                $('#nodo').html(data[i]["nodo"])
                $('#statusout').html(data[i]["statusout"])
                $('#noinvoutx').val(data[i]["codeinvout"])

                var baris = ""
                for (let b = 0; b < data[i]["data"].length; b++) {
                    baris += ` <tr>
                                <td>` + data[i]["data"][b]["nameitem"] + `</td>
                                <td>` + data[i]["data"][b]["sku"] + `</td>
                                <td>` + data[i]["data"][b]["qtyout"] + `</td>
                                <td>` + data[i]["data"][b]["expdate"] + `</td>
                                <td>` + data[i]["data"][b]["usebom"].toUpperCase() + `</td>

                            </tr>`

                    if (data[i]["data"][b]["usebom"] == "y") {
                        baris += `<td colspan="6" id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="background-color:#E7E9EC">
                                <div class="row accordion-body">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Bahan</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Qty Out</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               `
                        for (let c = 0; c < data[i]["data"][b]["data"].length; c++) {

                            baris += `<tr >
                                                    <td>` + data[i]["data"][b]["data"][c]["nameitem"] + `</td>
                                                    <td>` + data[i]["data"][b]["data"][c]["sku"] + `</td>
                                                    <td>` + data[i]["data"][b]["data"][c]["qty"] + `</td>

                                                </tr>`
                        }

                        baris += `
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>`
                    }
                }
                $('#detailout').html(baris);

            }
        }
    }


    function cancelout() {
        if (confirm("Yakin Ingin Cancel Transaksi")) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('InventoryOutControler/cancelout') ?>",
                data: "codeinvout=" + $('#noinvout').html(),
                dataType: "JSON",
                success: function(hasil) {
                    location.reload()
                }
            });
        }
    }
</script>