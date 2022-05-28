<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
        </ol>
        <h3 class="text-white">Register Produk</h3>
    </nav>
</div>
<div class="content bg-white  mx-4">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <form action="<?php echo base_url('MasterDataControler/additem') ?>" method="POST" enctype="multipart/form-data" id="form">
            <div class="row mb-3">
                <div class="col-4">
                    <img src="<?= base_url("assets/icon/item.png")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
                    <input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
                </div>
                <div class="col-4">
                    <div class="row mb-3">
                        <div class="col-10">
                            <label for="" class="form-label">Item Group</label>
                            <select name="itemgroup" class="form-select" onchange="location = this.options[this.selectedIndex].value;" required>
                                <option value="Produk"><a href="<?php echo base_url('SuperAdminControler/Produk') ?>">Produk</a></option>
                                <option value="ProdukJadi" selected><a href="<?php echo base_url('SuperAdminControler/ProdukJadi') ?>">Produk Jadi</a></option>
                                <option value="BahanMaterial"><a href="<?php echo base_url('SuperAdminControler/BahanMaterial') ?>">Bahan Baku/Material </a></option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Nama Item</label>
                        <div class="col-10">
                            <input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
                            <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                            <input type="hidden" name="iditem" class="form-control">
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label">SKU Item</label>
                        <div class="col-10">
                            <input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <label class="form-label mb-3">Jenis Item</label>
                            <div class="row">
                                <div class="col-3">
                                    <input type="radio" name="jenisitem" value="service" class="form-check-input" id="service">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Service
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" class="form-check-input" name="jenisitem" value="non service">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Non Service
                                    </label>
                                </div>
                                <div class="col-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row mb-3">
                        <label class="form-label">Harga</label>
                        <div class="col-10">
                            <input type="number" name="price" id="price" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px;" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label class="form-label">Status</label>
                        </div>
                        <div class="col-8">
                            <div class="form-check form-switch">
                                <input name="status" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="text-muted">Note</span>
                        <span class="text-muted">Service: Item bisa dijual tanpa quantity stock </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
                    <table class="table m-0">
                        <thead class="text-center text-white" style="background:#1143d8;">
                            <tr>
                                <th style="width: 10%;">No</th>
                                <th>SKU</th=>
                                <th>Nama Item</th=>
                                <th>Deskripsi</th=>
                                <th>Qty</th=>
                                <th>Action</th=>
                            </tr>
                        </thead>
                        <tbody id="detailx">
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;" onclick="addorder()">Buat Item</button>
        </form>
    </div>
</div>

<datalist id="xitem">
    <?php
    if ($data != 'Not Found') {
        foreach ($data as $key) {
    ?>
            <option value="<?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] ?></option>
    <?php }
    } ?>
</datalist>
<script type="text/javascript">
    add_row_transaksi(0)

    var xitem = '';
    xitem = '<?php
                $x = '';
                if ($data != 'Not Found') {
                    foreach ($data as $key) {
                        $x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["price"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
                    }
                }
                echo $x;
                ?>';

    function calc() {
        var xcnt = 0;
        var xqty = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xcnt++;
                xqty += parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', ''));
            }
            //$(this).val(i+1);
        });
    }

    function reorder() {
        $('input[objtype=nourut]').each(function(i, obj) {
            $(this).val(i + 1);
        });
    }

    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
        reorder();
        calc();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#uimg')
                    .attr('src', e.target.result)
                    .width(412)
                    .height(309);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function add_row_transaksi(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none;"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control  nourut" objtype="nourut" name="transaksi_nourut[]" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditembom[]" / ></td>';
        tabel += '<td style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
        tabel += '<td style="border:none;"><input style="text-align:center" type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
        tabel += '<td style="border:none;"><input type="text" readonly id="transaksi_' + xid + '_deskripsi" objtype="_deskripsi" class="form-control  _deskripsi" name="transaksi_deskripsi[]" /></td>';
        tabel += '<td style="border:none;"><input type="text" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control _qty" name="transaksi_qty[]" / autocomplete="off"></td>';
        tabel += '<td style="border:none;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        $('#line-transaksi-').val(xid);
        $('#detailx').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
    }

    $(document).on('change', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {
            $('#transaksi_' + xid + '_sku').val("");
            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_deskripsi').val("");
            $('#transaksi_' + xid + '_qty').val(0);
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
            $('#transaksi_' + xid + '_qty').val(0);

        }
        calc();
    });

    function addorder() {
        var cx = $('#form').serialize();
        $.post("<?php echo base_url('MasterDataControler/additem') ?>", cx,
            function(data) {
                if (data == 'Success') {
                    alert('Input Data Berhasil');
                    cancelorder();
                } else {
                    alert('Input Data Gagal. ' + data);
                }
            });
    }

    function cancelorder() {
        location.reload();
    }

    function datedis() {
        if (document.getElementById("service")) {
            document.getElementById("price").disabled = false;
        } else {
            document.getElementById("price").enable = false;
        }
    }
</script>