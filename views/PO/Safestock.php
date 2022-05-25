<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Transaction Book</li>
            </ol>
            <h3 class="text-white">Safe Stock</h3>
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
                        <div class="col-5">
                            <label for="" class="form-label">Pilih Gudang</label>
                            <select name="namewarehouse" id="idwh" class="form-select" required>

                                <?php if ($data1 != "Not Found") : ?>
                                    <?php foreach ($data1 as $key) : ?>
                                        <option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Item Type</label>
                            <select name="" id="itemtype" class="form-select" onchange="ubah(this.value)">
                                <option value="">All</option>
                                <?php if ($data != "Not Found") : ?>
                                    <?php foreach ($data as $key) : ?>
                                        <option value="<?php echo $key["namegroup"] ?>"><?php echo $key["namegroup"] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <!-- <div class="col-4">
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
                        </div>
                        <div class="col-4">
                            <p></p>
                            <a href="" class="btn btn-outline-primary mt-3">Terapkan</a>
                        </div>
                    </div>
                </div> -->
                <div class="col-4">
                    <label for="" class="form-label">Cetak & Download</label>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                            <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
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
                                    <a href="#" class="btn btn-primary" onclick="loaddata()">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bahbakx" class="row mb-5" style="overflow-x: auto;">
            <div class="col">
                <table class="table table-bordered table-striped " id="table-user">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Nama Item</td>
                            <td>Spesifikasi</td>
                            <td>Item Type</td>
                            <td>SKU</td>

                            <td>Min Stock</td>
                            <td>Ready Stock</td>
                            <td>QTY Order</td>
                            <td>Balance</td>
                        </tr>
                    </thead>
                    <tbody id="bodylist">
                        <tr>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
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
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 text-end">
                <a href="#" class="btn btn-primary" onclick="buatpo()">BUAT REQUEST PO</a>
            </div>
        </div>
    </div>
</form>

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
            url: "<?php echo base_url('InventoryStockControler/getitemstocksafe') ?>",
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
                            <td>` + hasil[i]["endqty"] + `</td>
                            <td>` + hasil[i]["qtyso"] + `</td>
                            <td>` + hasil[i]["balance"] + `</td>
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
        $('#formx').submit()


        console.log(iditems)
    }
</script>