<form action="<?php echo base_url('SalesinvoiceControler/addinvoice') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Sales Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Invoice</li>
            </ol>
            <h3 class="text-white">Register Sales Invoice</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="row">
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php $this->session->set_flashdata('message', ''); ?>
                </div>
                <div class="col-4">
                    <label class="form-label mb-3 fs-3">Informasi Dasar</label>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label class="form-label">No. Transaksi</label>
                            <input type="text" name="codeinv" id="codeinv" class="form-control" value="" autocomplete="off" readonly>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Tipe Sales</label>
                            <select class="form-select" id="typesales" name="typesales" aria-label=" Default select example">
                                <option value="B2B">B2B</option>

                            </select>
                            <!-- <a href=""  class="btn btn-primary" onclick="loaddata()">Cari Data</a> -->
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="custname" class="form-label">Customer</label>
                            <input type="text" id="custname" class="form-control" objectype="cust" list="xcust" name="namecust" required readonly autocomplete="off">
                            <input type="hidden" id="idcust" name="idcust">
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">No. Invoice</label>
                            <input type="text" class="form-control" name="noinvoice" id="noinvoice" required>
                        </div>
                    </div>
                    <a href="#" data-mdb-toggle="modal" data-mdb-target="#customeradd" class="btn btn-outline-primary"><i class='bx bx-search-alt-2'></i></i>Cari Invoice</a>
                </div>
                <div class="col-3">
                    <label class="form-label fs-3 mb-3">Informasi Detail & Pajak </label>
                    <div class="row mb-3">
                        <div class="col-5 ">
                            <label for="startinvoice" class="form-label">Tanggal Invoice <span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="startinvoice" name="startinvoice" placeholder="name@example.com" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-5">
                            <label for="expinvoice" class="form-label">Due Date Payment</label>
                            <input type="date" class="form-control" id="expinvoice" name="expinvoice" placeholder="name@example.com" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="" class="form-label">Mata Uang</label>
                            <select class="form-select" aria-label="Default select example" name="idcur">
                                <option value="1">Rupiah</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <label for="" class="form-label">Exchange Rate</label>
                            <input type="text" class="form-control" name="rate" id="rate">
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="mb-3 fs-5">Pajak </label>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Gunakan VAT</label>
                        <div class="col-sm-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="check" checked onclick="calc()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <label for="address" class="form-label">Title</label>
                        <textarea name="title" class="form-control" id="title" cols="20" rows="3"></textarea>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="col-2" style="display: none;">
                    <div class="row">
                        <label class="mb-3 fs-5">Cetak & Download</label>
                        <div class="col-7">
                            <a href="#" class="btn"><i class="bx bxs-download"></i> Download</a>
                        </div>
                        <div class="col-5">
                            <a href="#" class="btn" onclick="printDiv('quot')" data-dismiss="modal"><i class="bx bx-printer"></i> Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <div class="row mb-3">
                        <label for="" class="fs-3 form-label">Ambil Data</label>
                        <p class="text-muted">Mengambil data Outgoing</p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="exampleFormControlInput1" class="form-label">No. Outgoing</label>
                            <input type="text" name="codeout" id="codeout" class="form-control" value="" autocomplete="off" readonly="">
                            <input type="hidden" name="idout" id="idout" class="form-control" value="" autocomplete="off" readonly="">
                            <div class="row">
                                <span class="text-muted" style="font-size: 15px">Semua data Outgoing supplier akan tampil</span>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <p></p>
                            <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-outline-primary" onclick="loaddataout()">Cari Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <label for="" class="form-label fs-5 mt-5">Perioder Waktu Outgoing Salesorder</label>
                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="" id="datestart" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="" id="datefinish" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">No. Sales Order</label>
                            <select name="idso" id="idso" class="form-control">
                                <option value="">Pilih No.Sales Order</option>
                                <?php if ($data1 != "Not Found") {
                                    foreach ($data1 as $key) { ?>
                                        <option value="<?php echo $key["idso"] ?>"><?php echo $key["namecust"] . " - " . $key["codeso"] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <p></p>
                            <a href="#" class="btn btn-outline-primary mt-3" onclick="getdatabysales()">Ambil Data</a>
                        </div>
                    </div>
                    <div class="row">
                        <span class="text-muted" style="font-size: 15px">Data akan diambil berdasarkan supplier diatas</span>
                    </div>
                </div>
                <div class="col-2"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="row mb-5" style="overflow-x: auto;">
                <h5>Item/Produk</h5>
                <table class="table table-bordered table-striped " id="table-user">
                    <thead class="text-white text-center" style="background:#1143d8;">
                        <tr>
                            <td>No. Sales Order</td>
                            <td>No. Inventory Out</td>
                            <td>Nama Item</td>
                            <td>SKU</td>
                            <td>Harga</td>
                            <td>Qty</td>
                            <td>Sub Total</td>
                            <td>Disc. Total</td>
                            <td>Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="detail">

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
                            <p>Discount Nominal</p>
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" id="disnom" name="disnoms" value="0" oninput="calc()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>PPN</p>
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

                <button type="button" class="btn btn-primary" id="simpan" onclick="save()">Simpan</button>
                <button type="button" class="btn btn-primary" id="cancel" style="display: none;" onclick="cancelorder()">Cancel</button>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="card bay" style="display: none;" id="quot">
        <div class="card-header pl-5 border-0">
            <div class="row d-flex justify-content-between p-3">
                <div class="col-3">

                </div>
                <div class="col-8">

                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
        <div class="card-body">
            <p style="border-top: 2px solid black;"></p>
            <div class="row d-flex justify-content-between">
                <div class="col-1">
                </div>
                <div class="col-5 mt-3">
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">FROM :</p>
                        <p style="margin-left: 2vw;" id="pt"></p>
                    </div>
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">ATTN :</p>
                        <p style="margin-left: 2vw;" id="cust"></p>
                    </div>
                </div>
                <div class="col-5 mt-3">
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">No :</p>
                        <p style="margin-left: 2vw;" id="no"></p>
                    </div>
                    <div class="input-group">
                        <p class="col-4" style="text-align: right;">DATE :</p>
                        <p style="margin-left: 2vw;" id="dates"></p>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col text-center mt-3">
                    <label for="" class="form-label fs-3"><u>QUOTATION</u> </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table border">
                        <thead style="border: 2px solid black">
                            <tr>
                                <td>Sku</td>
                                <td>Nama Item</td>
                                <td>Harga</td>
                                <td>Qty</td>
                                <td>Discount Nominal</td>
                                <td>Sub Total</td>
                                <td>Total Discount</td>
                                <td>Grand Total</td>
                            </tr>
                        </thead>
                        <tbody id="bodys">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 40vh">
                <div class="col-8 mt-4" style="line-height: 0.5rem;">
                </div>
                <div class="col-4 mt-3" style="float: right;">
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4 " style="text-align: right;"></p>
                        <p></p>
                    </div>
                    <div class="input-group flex-nowrap">
                        <p class="col-sm-4" style="text-align: right;"></p>
                        <p style="padding-top: 2.5vh;">( MARKETING )</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Data Inventory Out</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <input type="hidden" name="idcust" id="idcust">
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-8">
                                <label for="" class="form-label">Pencarian</label>
                                <div class="input-group">
                                    <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                        <option value="tb_salesorder.codeso">No.Sales Order</option>
                                        <option value="invout.codeinvout">No. Inventory Out</option>
                                        <option value="tb_customer.namecust">Nama Customer</option>
                                    </select>
                                    <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                </div>
                            </div>
                            <!-- <div class="col-4">
                                <label for="" class="form-label">Status</label>
                                <select class="form-select" id="statusquo" aria-label="Default select example">
                                    <option value="">Pilih Status Quotation</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Process">Process</option>
                                    <option value="Finish">Finish</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <label for="" class="form-label">Mulai Dari</label>
                                <input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
                            </div>
                            <div class="col-4">
                                <label for="" class="form-label">Sampai Dengan</label>
                                <input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
                            </div>
                            <div class="col-4">
                                <p></p>
                                <a href="#" class="btn btn-primary mt-3" onclick="loaddataout()">Terapkan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Sales Order</th>
                                    <th>No. Invotory Out</th>
                                    <th>Customer</th>
                                    <th>Tanggal Out</th>
                                    <th>Qty Item</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="detailx">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<datalist id="xcust">
    <!--<option value="" disabled selected>Select Item</option>-->
    <?php
    if ($data != 'Not Found' || !empty($data)) {
        foreach ($data as $key) {

    ?>
            <option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>"><?php echo  $key["namecust"] . " - " . $key["phonecust"]; ?></option>
    <?php
        }
    } ?>
</datalist>

<datalist id="xitem">
    <?php

    if ($data != 'Not Found') {
        foreach ($item as $key) {
    ?>
            <option value="<?php echo $key["sku"]; ?>" price="<?php echo $key["price"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["nameitem"] . ' - Rp. ' . number_format($key['price'], 0, '.', ','); ?></option>
    <?php }
    } ?>
</datalist>

<script>
    function getdatabysales() {
        if ($('#datestart').val() == "") {
            alert("Masukan Tanggal Awal")
        } else if ($('#datefinish').val() == "") {
            alert("Masukan Tanggal Akhir")
        } else if ($('#idso').val() == "") {
            alert("Masukan No.Salesorder")
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('SalesinvoiceControler/detailinvoutbysales') ?>",
                data: "datestart=" + $('#datestart').val() + "&datefinish=" + $('#datefinish').val() + "&idso=" + $('#idso').val(),
                dataType: "JSON",
                success: function(hasil) {
                    console.log(hasil)
                    var baris = "";
                    $('#detail').html("")
                    for (let i = 0; i < hasil.length; i++) {
                        add_row_transaksi(i)
                        var xid = Number(i) + Number(1);

                        if (hasil[i]["vat"] == 0) {
                            $("#check").prop("checked", false);
                        } else {
                            $("#check").prop("checked", true);
                        }

                        $('#custname').val(hasil[i]["namecust"])
                        $('#idcust').val(hasil[i]["idcust"])
                        $('#codeout').val("")
                        $('#idout').val("")
                        $('#idso_' + xid).val(hasil[i]["idso"])
                        $('#idsodet_' + xid).val(hasil[i]["idsodet"])
                        $('#codeso_' + xid).val(hasil[i]["codeso"])
                        $('#invout_' + xid).val(hasil[i]["invout"])
                        $('#invoutdet_' + xid).val(hasil[i]["invoutdet"])
                        $('#codeinvout_' + xid).val(hasil[i]["codeinvout"])
                        $('#iditem_' + xid).val(hasil[i]["iditem"])
                        $('#nameitem_' + xid).val(hasil[i]["nameitem"])
                        $('#sku_' + xid).val(hasil[i]["sku"])
                        $('#harga_' + xid).val(formatRupiah(hasil[i]["price"] + ""))
                        $('#qty_' + xid).val(hasil[i]["qtyout"])
                        $('#subtotal_' + xid).val(formatRupiah(hasil[i]["subtotal"] * hasil[i]["qtyout"] + ""))
                        $('#disnom_' + xid).val(formatRupiah(hasil[i]["disnomdet"] * hasil[i]["qtyout"] + ""))
                        $('#total_' + xid).val(formatRupiah(hasil[i]["grandtotal"] * hasil[i]["qtyout"] + ""))

                    }

                    calc()
                }
            });
        }
    }

    function loaddataout() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('SalesinvoiceControler/getlistout') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&date1=" + $('#datestart').val() + "&date2=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {
                    for (let i = 0; i < hasil.length; i++) {
                        baris += `<tr>
                                    <td>` + hasil[i]["codeso"] + `</td>
                                    <td>` + hasil[i]["codeinvout"] + `</td>
                                    <td>` + hasil[i]["namecust"] + `</td>
                                    <td>` + hasil[i]["dateout"] + `</td>
                                    <td>` + hasil[i]["qtyout"] + `</td>
                                    <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailinvout(` + hasil[i]["idinvout"] + `)">Pilih</a></td>
                                </tr>`
                    }
                }
                $('#detailx').html(baris)
            }
        });
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    function detailinvout(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('SalesinvoiceControler/detailinvout') ?>",
            data: "idinvout=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = "";
                $('#detail').html("")
                for (let i = 0; i < hasil.length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);

                    if (hasil[i]["vat"] == 0) {
                        $("#check").prop("checked", false);
                    } else {
                        $("#check").prop("checked", true);
                    }

                    $('#datestart').val("")
                    $('#datefinish').val("")
                    $('#idso').val("")
                    $('#custname').val(hasil[i]["namecust"])
                    $('#idcust').val(hasil[i]["idcust"])
                    $('#codeout').val(hasil[i]["codeinvout"])
                    $('#idout').val(hasil[i]["idinvout"])
                    $('#idso_' + xid).val(hasil[i]["idso"])
                    $('#idsodet_' + xid).val(hasil[i]["idsodet"])
                    $('#codeso_' + xid).val(hasil[i]["codeso"])
                    $('#invout_' + xid).val(hasil[i]["invout"])
                    $('#invoutdet_' + xid).val(hasil[i]["invoutdet"])
                    $('#codeinvout_' + xid).val(hasil[i]["codeinvout"])
                    $('#iditem_' + xid).val(hasil[i]["iditem"])
                    $('#nameitem_' + xid).val(hasil[i]["nameitem"])
                    $('#sku_' + xid).val(hasil[i]["sku"])
                    $('#harga_' + xid).val(formatRupiah(hasil[i]["price"] + ""))
                    $('#qty_' + xid).val(hasil[i]["qtyout"])
                    $('#subtotal_' + xid).val(formatRupiah(hasil[i]["subtotal"] * hasil[i]["qtyout"] + ""))
                    $('#disnom_' + xid).val(formatRupiah(hasil[i]["disnomdet"] * hasil[i]["qtyout"] + ""))
                    $('#total_' + xid).val(formatRupiah(hasil[i]["grandtotal"] * hasil[i]["qtyout"] + ""))

                }

                calc()
            }
        });
    }

    $(document).keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    });



    $(document).on('input', '#custname', function() {
        var val = $(this).val();
        var xobj = $('#xcust option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {
            $('#idcust').val("");
            $('#email').val("");
            $('#address').html("");
            $('#phone').val("");
        } else {
            $('#idcust').val(xobj.data('idcust'));
            $('#email').val(xobj.data('email'));
            $('#address').html(xobj.data('address'));
            $('#phone').val(xobj.data('phone'));
        }
    });



    function cancelorder() {
        if (confirm("Apakah Anda Yakin ingin membatalkan Quotation ini ?")) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('QuotationController/cancelquo') ?>",
                data: 'codequo=' + $('#codequo').val(),
                dataType: 'JSON',
                success: function(hasil) {
                    if (hasil == "Success") {
                        location.reload()
                    } else {
                        alert(hasil);
                    }
                }
            });
        }
    }


    function add_row_transaksi(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = `<tr id="trans_` + xid + `">
    <td><input type="hidden" name="idso[]" id="idso_` + xid + `" class="form-control"><input type="hidden" id="idsodet_` + xid + `" name="idsodet[]" class="form-control">
        <input type="text" name="codeso[]" id="codeso_` + xid + `" class="form-control" value="" readonly>
    </td>
    <td><input type="hidden" id="idinvout_` + xid + `" name="idinvout[]" class="form-control"><input type="hidden" id="idinvoutdet_` + xid + `" name="idinvoutdet[]" class="form-control">
        <input type="text" id="codeinvout_` + xid + `" name="codeinvout[]" class="form-control" readonly>
    </td>
    <td><input type="hidden"  id="iditem_` + xid + `" name="iditem[]" class="form-control"><input type="text" id="nameitem_` + xid + `" name="nameitem[]" class="form-control" readonly></td>
    <td><input type="text" objtype="sku" id="sku_` + xid + `" name="sku[]" class="form-control" readonly></td>
    <td><input type="text" id="harga_` + xid + `" name="harga[]" class="form-control" readonly></td>
    <td><input type="text" id="qty_` + xid + `" name="qty[]" class="form-control" readonly></td>
    <td><input type="text" id="subtotal_` + xid + `" name="subtotalx[]" class="form-control" readonly></td>
    <td><input type="text" id="disnom_` + xid + `" name="disnom[]" class="form-control" readonly></td>
    <td><input type="text" id="total_` + xid + `" name="total[]" class="form-control" readonly></td>
    <td><input type="checkbox" id="select_` + xid + `"  style="height: 30px; width:30px"> </td>
</tr>`;

        //return tabel;
        $('#line-transaksi').val(xid);
        $('#detail').append(tabel);

    }

    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
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

            document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
        }
        calc();
    });


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
            xid = $(this).attr('id').replace("sku_", "");
            if ($('#idtem_' + xid).val() != '') {
                xttl += parseFloat($('#total_' + xid).val().replaceAll('.', ''));
            }
        });
        if ($("#check").is(":checked") == true) {
            vat = (xttl - $('#disnom').val()) * 11 / 100;
        } else {
            vat = 0;
        }
        grandtot = Number((xttl - $('#disnom').val())) + Number(vat)
        $("#ppn").val(formatRupiah(vat + ""))
        $("#subtotal").val(formatRupiah(xttl + ""))
        $("#grandtotal").val(formatRupiah(grandtot + ""))


    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function save() {
        const arry = [];
        const arrys = [];
        var baris = '';
        $('#table-user tr').filter(':has(:checkbox:not(:checked))').each(function() {
            // this = tr
            $tr = $(this);
            arry.push(this.id);
        });

        $('#table-user tr').filter(':has(:checkbox:checked)').each(function() {
            // this = tr
            $tr = $(this);
            arrys.push(this.id);
        });


        if (arrys.length == 0) {
            alert("Pilih Item yang ingin dijadikan Invoice");
        } else {

            if ($('#noinvoice').val() == "") {
                alert("Tolong Isi No.Invoice dahulu")
            } else if ($('#title').val() == "") {
                alert("Tolong Isi Judul Invoice dahulu")
            } else if ($('#rate').val() == "") {
                alert("Tolong Isi Exchange Rate dahulu")
            } else {
                for (let i = 0; i < arry.length; i++) {

                    $('#' + arry[i]).remove();

                    calc();
                }
                $('#form').submit()
            }

        }



        console.log(arry)

    }
</script>