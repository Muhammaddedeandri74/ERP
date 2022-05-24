<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Invoice</li>
            </ol>
            <h3 class="text-white">Register Purchase Invoice </h3>
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
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Dasar</label>
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label class="form-label">No. Invoice</label>
                                    <input type="text" name="codepo" class="form-control" placeholder="INV-2121/22/12" value="" autocomplete="off" readonly>
                                </div>
                                <div class="col-2 mt-3"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <input type="text" id="namesupp" class="form-control" objectype="supp" list="xsupp" name="namesupp" autocomplete="off" required>
                                    <input type="hidden" id="idsupp" name="idsupp">
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Detail & Pajak</label>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Invoice</label>
                                    <input type="date" name="dateinvoice" id="dateinvoice" class="form-control" value="" autocomplete="off">
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                    <input type="date" name="duedate" id="duedate" class="form-control" value="" autocomplete="off">
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Mata Uang</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="" selected>Pilih</option>
                                        <?php if ($data1 != "Not Found") : ?>
                                            <?php foreach ($data1 as $key) : ?>
                                                <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <label for="" class="fs-5 mb-3">Pajak</label>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Gunakan VAT</label>
                                    <div class="col-sm-7">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-5 fs-5">Cetak & Download</label>
                            <div class="row">
                                <div class="col-5">
                                    <a href="" class="btn"><i class="bx bxs-download"></i>Download</a>
                                </div>
                                <div class="col-5">
                                    <a href="" class="btn"><i class="bx bx-printer"></i>Cetak</a>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="row mb-3">
                                <label for="" class="fs-3 form-label">Ambil Data</label>
                                <p class="text-muted">Mengambil data barang/item</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Ingoing</label>
                                    <input type="text" name="codein" id="codein" class="form-control" value="" autocomplete="off" readonly>
                                    <input type="hidden" name="idin" id="idin" class="form-control" value="" autocomplete="off" readonly>
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Semua data ingoing supplier akan tampil</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary" onclick="loaddata()">Cari Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label fs-4 mt-5">Perioder Waktu Ingoing</label>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="" class="form-label">Mulai Dari</label>
                                    <input type="date" name="" id="dateinvoice" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" name="" id="duedate" class="form-control">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="" class="btn btn-outline-primary mt-3">Ambil Data</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row" style="margin-top: 11vh;">
                                <div class="col-8">
                                    <label for="exampleFormControlInput1" class="form-label">No. Purchase Order</label>
                                    <input type="text" name="codepo" class="form-control text-muted" placeholder="Pilih Data" readonly value="" autocomplete="off">
                                    <div class="row">
                                        <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#pilihdatapo" class="btn btn-outline-primary" onclick="loaddatax()">Cari Data</a>
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
                        <table class="table table-bordered table-striped" id="table-user">
                            <thead class="text-white" style="background:#1143d8;">
                                <tr>
                                    <td>Sku</td>
                                    <td>Nama Item</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>Discount Percent</td>
                                    <td>Discount Nominal</td>
                                    <td>Sub Total</td>
                                    <td>Total Discount</td>
                                    <td>Grand Total</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailinvoice">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
                            <div class="row">
                                <div class="col-6">
                                    <p>Sub Total</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Discount Transaksi</p>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="disnom" name="distrans" value="0" oninput="calc()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>VAT</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="ppn" name="ppn" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8"></div>
                    <div class="col-4 text-end">
                        <a href="" class="btn btn-primary">Simpan Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Ingoing</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                            <input type="text" name="search" id="search" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Mulai Dari</label>
                                    <input type="date" name="" id="datestart" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Sampai Dengan</label>
                                    <input type="date" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4 mb-5">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3" onclick="loaddatax()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No. Transaksi</td>
                                    <td>Tgl Masuk</td>
                                    <td>Supplier</td>
                                    <td>Qty Item</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailinvin">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pilihdatapo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                            <input type="text" name="search" id="search" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Mulai Dari</label>
                                    <input type="date" name="" id="datestart" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Sampai Dengan</label>
                                    <input type="date" name="" id="finishdate" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-4 mb-5">
                                    <p></p>
                                    <a href="" class="btn btn-primary mt-3">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No. PO</td>
                                    <td>Supplier</td>
                                    <td>Tgl Order</td>
                                    <td>Tgl Delivery</td>
                                    <td>Qty Item</td>
                                    <td>Total Amount</td>
                                    <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailpo">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <datalist id="xsupp">
        <?php
        if ($data != 'Not Found' || !empty($data)) {
            foreach ($data as $key) {
        ?>
                <option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
        <?php }
        } ?>
    </datalist>

    <datalist id="xitem">
        <?php
        if ($data3 != 'Not Found') {
            foreach ($data3 as $key) {
        ?>
                <option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
        <?php }
        } ?>
    </datalist>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistinvinincoice') ?>",
            data: "filter=" + $('#search').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {

                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codein"] + `</td>
                                            <td>` + hasil[i]["datein"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["qtyin"] + `</td>
											<td>` + hasil[i]["statusin"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailinvin(` + hasil[i]["idin"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailinvin').html(baris)
            }

        });
    }

    function loaddatax() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistpoinvoice') ?>",
            data: "filter=" + $('#search').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {

                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["delivedate"] + `</td>
											<td> ` + hasil[i]["qtypo"] + `</td>
                                            <td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
											<td> ` + hasil[i]["statuspo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpo(` + hasil[i]["idpo"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailpo').html(baris)
            }

        });
    }

    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
        reorder();
        calc();
    }

    function detailinvin(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailinvin') ?>",
            data: "idin=" + x,
            dataType: "JSON",
            success: function(hasil) {
                $('#codein').val(hasil["codein"]);
                $('#idin').val(hasil["idin"]);
                $('#detailinvoice').html("");

                for (let i = 0; i <= hasil["data"].length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });

                    $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
                    $('#transaksi_' + xid + '_harga').val(hasil["data"][i]["harga"]);
                    $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_discpercent').val(0);
                    $('#transaksi_' + xid + '_discnominal').val(hasil["data"][i]["disc"] * hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_sub').val(hasil["data"][i]["total"]);
                    $('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["qty"] * hasil["data"][i]["disc"]);
                    $('#transaksi_' + xid + '_total').val(hasil["data"][i]["price"] * hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_grandtotal').val(hasil["data"][i]["totalprice"]);

                    calc();

                }

            }
        });
    }

    add_row_transaksi(0)

    function add_row_transaksi(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_discpercent" oninput="discx(' + xid + ')"  class="form-control"name="discpercent[]" value="" oninput="discp(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_disnom" oninput="discxx(' + xid + ')"  class="form-control"name="disnom[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_sub"  class="form-control"name="sub[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_totaldisc"  class="form-control"name="totaldisc[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';

        tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        // return tabel;
        $('#line-transaksi').val(xid);
        $('#detailinvoice').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
    }

    $(document).on('input', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {

            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_deskripsi').val("");
            $('#transaksi_' + xid + '_harga').val("");
            $('#transaksi_' + xid + '_qty').val("");
            $('#transaksi_' + xid + '_discpercent').val("");
            $('#transaksi_' + xid + '_disnom').val("");
            $('#transaksi_' + xid + '_totaldisc').val("");
            $('#transaksi_' + xid + '_total').val("");
            $('#transaksi_' + xid + '_sub').val("");

            document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = true;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = true;
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
            $('#transaksi_' + xid + '_harga').val(xobj.data('price'));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_discpercent').val(0);
            $('#transaksi_' + xid + '_disnom').val(0);
            $('#transaksi_' + xid + '_totaldisc').val(0);
            $('#transaksi_' + xid + '_total').val(xobj.data('price'));
            $('#transaksi_' + xid + '_sub').val(xobj.data('price'));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
            document.getElementById('transaksi_' + xid + '_discpercent').readOnly = false;
            document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
        }
        calc();
    });

    function validasi() {
        var xval = 0;
        var sts = 1;

        xval = $("#namesupp").val();
        if ($("#namesupp").val() == '') {
            alert('Input Supplier');
            sts = 0;
            return false;
        }

        if (sts == 1) {
            return true;
        } else {
            return false;
        }
    }

    function cal(x) {
        console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b " +
            $('#transaksi_' + x + '_disnom').val() + " c " + $('#transaksi_' + x + '_disnom').val() + " d ")
        $('#transaksi_' + x + '_sub').val($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val())
        $('#transaksi_' + x + '_totaldisc').val($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_disnom').val())
        $('#transaksi_' + x + '_total').val($('#transaksi_' + x + '_sub').val() - $('#transaksi_' + x + '_totaldisc').val())
        calc();
    }

    function discx(xid) {

        console.log($('#transaksi_' + xid + '_discpercent').val() + " " + xid)
        $('#transaksi_' + xid + '_disnom').val($('#transaksi_' + xid + '_harga').val() * $('#transaksi_' + xid + '_discpercent').val() / 100);
        cal(xid)
    }

    function discxx(xid) {
        $('#transaksi_' + xid + '_discpercent').val(0)
        cal(xid)
    }

    function calc() {
        var xttl = 0;
        var dpp = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll(',', ''));

            }

        });



        if ($("#check").is(":checked") == true) {
            vat = (xttl - $('#disnom').val()) * 11 / 100;
        } else {
            vat = 0;
        }
        disctotal = (xttl - $('#disnom').val());
        grandtot = Number((xttl - $('#disnom').val())) + Number(vat)

        $("#ppn").val(formatnum(vat))
        $("#subtotal").val(formatnum(xttl))
        $("#distotal").val(formatnum(disctotal))
        $("#grandtotal").val(formatnum(grandtot))

    }

    $(document).on('input', '#namesupp', function() {
        var val = $(this).val();
        var xobj = $('#xsupp option').filter(function() {
            return this.value == val;
        });

        if ((val == "") || (xobj.val() == undefined)) {
            $('#idsupp').val("");
            $('#norekening').val("");
        } else {

            $('#idsupp').val(xobj.data('idcust'));
            var data = <?php echo json_encode($data) ?>;
            console.log(data)
            for (let i = 0; i < data.length; i++) {

                if (data[i]["idcust"] == xobj.data('idcust')) {
                    var baris = '<option value="">Pilih</option>'
                    for (let b = 0; b < data[i]["data"].length; b++) {

                        baris += `<option value="` + data[i]["data"][b]["norekening"] + `">` + data[i]["data"][b]["norekening"] + ` - ` + data[i]["data"][b]["beneficiary"] + ` ( ` + data[i]["data"][b]["namabank"] + ` ) </option>`
                    }
                    $('#norekening').html(baris)
                }


            }
        }
    });

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#dateinvoice").val() == '') {
            $("#dateinvoice").val(date);
        }
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
        if ($("#duedate").val() == '') {
            $("#duedate").val(date);
        }
    });
</script>