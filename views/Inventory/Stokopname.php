<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory Closing</li>
            </ol>
            <h3 class="text-white">Stock Opname</h3>
        </nav>
    </div>
    <div class="content bg-white  mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <div class="row">
                        <label for="" class="form-label fs-3 mb-3">Gudang</label>
                        <div class="col-5">
                            <label for="" class="form-label">Pilih Gudang</label>
                            <select name="namewarehouse" id="idwh" class="form-select" required>
                                <option value="">Gudang </option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Item Type</label>
                            <select name="" id="itemtype" class="form-select" onchange="ubah(this.value)">
                                <option value="">All</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row mt-3">
                        <div class="mt-4">
                            <p></p>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Opname Periode</label>
                            <input type="month" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-4">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">Terapkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <a href="" class="btn px-4"><i class='bx bxs-file-pdf fs-5'></i> Cetak Template</a>
                    <div class="row" style="display: none;">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <div class="card mt-4" style="background-color: #FCAA2559;">
                                <a class="btn" style="text-transform: capitalize;">Silahkan Validasi data Stock opname <span style="color: red;">DD/MM/YYYY</span><br>Sebelum melakukan stock opname selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                    <div class="input-group">
                        <div class="col-4">
                            <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                <option value="sku">SKU</option>
                                <option value="nameitem">Nama Item</option>
                                <option value="deskripsi">Deskripsi</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" id="search" class="form-control" placeholder="Cari Data">
                                </div>
                                <div class="col-4">
                                    <a href="#" class="btn btn-primary " onclick="loaddata()">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="mt-3">
                        <p></p>
                    </div>
                    <a href="" class="btn btn-outline-success mt-3">Submit Opname</a>
                </div>
            </div>
        </div>
        <div id="bahbakx" class="row mb-5" style="overflow-x: auto;">
            <div class="col">
                <table class="table table-bordered table-striped " id="table-user">
                    <thead>
                        <tr>
                            <td>Nama Item</td>
                            <td>Spesifikasi</td>
                            <td>Item Type</td>
                            <td>SKU</td>
                            <td>Unit</td>
                            <td>Begin</td>
                            <td>Qty. IN</td>
                            <td>Qty. Out </td>
                            <td>Balance</td>
                            <td>Qty. Actual</td>
                            <td>Selisih</td>
                        </tr>
                    </thead>
                    <tbody id="bodylist">
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
        </div>
    </div>
</form>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="exampleModalLabel">List Closing History</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <input type="hidden" name="idcust" id="idcust">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>Periode</td>
                                    <th>Status</th>
                                    <td>Closed At</td>
                                    <th>Issued By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="detailx">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="" class="btn btn-transparent"><i class='bx bx-window-open'></i> I/O Status</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo base_url('InventoryController/Requestpo') ?>" id="formx" method="POST">

</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    function ubah(x) {
        if (x == "produk") {
            $('#produkx').show();
            $('#bahbakx').hide();
        } else if (x == "bahbak") {
            $('#produkx').hide();
            $('#bahbakx').show();
        }
    }

    loaddata()

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryStockControler/getitemstock') ?>",
            data: "idwh=" + $('#idwh').val() + "&itemtype=" + $('#itemtype').val() + "&filter=" + $('#filter').val() + "&search=" + $('#search').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                if (hasil != "Not Found") {
                    var baris = ""
                    for (let i = 0; i < hasil.length; i++) {
                        baris += ` <tr>
                            <td><input class="form-check-input checkbox" type="checkbox" value="` + hasil[i]["iditem"] + `" id="` + hasil[i]["sku"] + `"></td>
                            <td>` + hasil[i]["nameitem"] + `</td>
                            <td>` + hasil[i]["deskripsi"] + `</td>
                            <td>` + hasil[i]["itemtype"] + `</td>
                            <td>` + hasil[i]["sku"] + `</td>
                            <td>` + hasil[i]["minstock"] + `</td>
                            <td>` + hasil[i]["beginqty"] + `</td>
                            <td>` + hasil[i]["inqty"] + `</td>
                            <td>` + hasil[i]["outqty"] + `</td>
                            <td>` + hasil[i]["endqty"] + `</td>
                        </tr>`

                    }

                    $('#bodylist').html(baris)
                }
            }
        });
    }

    function buatpo() {

        var fav, iditems = [];
        $('.checkbox').each(function() { // run through each of the checkboxes
            if ($(this).prop('checked') == true) {
                fav = $(this).attr('id')
                iditems.push(fav);
            }

        })

        var baris = ""
        for (let i = 0; i < iditems.length; i++) {
            baris += `<input type="hidden" name="iditemx[]" value="` + iditems[i] + `">`
        }
        $('#formx').html(baris)
        if ($('#formx').html() == "") {
            alert("Pilih Item Dahulu")
        } else {
            $('#formx').submit()
        }



        console.log(iditems)
    }
</script>