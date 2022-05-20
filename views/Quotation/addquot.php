<form action="<?php echo base_url('QuotationController/addquo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Quotation</li>
            </ol>
            <h3 class="text-white">Register Quotation</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
                <div class="col-12 bays">

                    <div class="row mb-3">
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Dasar</label>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label class="form-label">No. Quotation</label>
                                    <input type="text" name="codequo" id="codequo" class="form-control" value="<?php echo $data1 ?>" autocomplete="off" readonly>
                                </div>
                                <div class="col-4 mt-3">
                                    <p></p>
                                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary" onclick="loaddata()">Cari Data</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="custname" class="form-label">Customer</label>
                                    <input type="text" id="custname" class="form-control" objectype="cust" list="xcust" name="namecust" required>
                                    <input type="hidden" id="idcust" name="idcust">
                                </div>
                                <div class="col-4"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="email" class="form-label">Email Kontak</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" readonly>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="" class="form-label mt-5">Alamat</label>
                                    <textarea name="address" class="form-control" id="address" cols="20" rows="4" readonly></textarea>
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="" class="form-label">No. Telephon</label>
                                    <input type="text" class="form-control" name="phone" id="phone" readonly>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Informasi Judul & Lainnya </label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Penawaran</label>
                                    <textarea name="judulquo" id="judulquo" class="form-control" cols="20" rows="4" required></textarea>
                                    <div class="row text-end">
                                        <span style="font-size: 10px;" class="text-muted">Maksimal 100 Karakter</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="startquo" class="form-label">Penawaran Berlaku</label>
                                    <input type="date" class="form-control" id="startquo" name="startquo" placeholder="name@example.com" value="<?php echo date('Y-m-d') ?>">
                                </div>
                                <div class="col-6">
                                    <label for="expquo" class="form-label">Tanggal Expired</label>
                                    <input type="date" class="form-control" id="expquo" name="expquo" placeholder="name@example.com" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mb-3 fs-5">Pajak </label>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Gunakan VAT</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="check" checked onclick="calc()">
                                    </div>
                                </div>
                            </div>
                            <label class="mb-3 fs-5">Akun Perbankan </label>
                            <select class="form-select" aria-label="Default select example" name="norek" id="norek" required>
                                <option value="">Pilih Akun Bank</option>
                                <?php if ($data2 != "Not Found") {
                                    foreach ($data2 as $key) { ?>
                                        <option value="<?php echo $key["norekening"] ?>"><?php echo  $key["beneficiary"] ?> - <?php echo $key["norekening"] ?> ( <?php echo $key["bank"]  ?> )</option>
                                <?php }
                                } ?>
                            </select>
                            <div id="bank"></div>

                            <div class="row" id="action" style="display: none;">
                                <label class="mb-3 fs-5">Cetak & Download</label>
                                <div class="col-4">
                                    <a href="#" class="btn"><i class="bx bxs-download"></i> PDF</a>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="btn"><i class="bx bx-printer"></i> Cetak</a>
                                </div>
                                <div class="col-4">
                                    <a href="<?php echo base_url('QuotationController/addquot') ?>" class="btn"><i class='bx bx-reset'></i> Baru</a>
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
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sku</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Nama Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Discount Percent</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Discount Nominal</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sub Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total Discount</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Grand Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
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

                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        <button type="button" class="btn btn-primary" id="cancel" style="display: none;" onclick="cancelorder()">Cancel</button>
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
                <h5 class="modal-title" id="exampleModalLabel">List Quotation</h5>
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
                                        <option value="codequo">No.Quotation</option>
                                        <option value="namequotation">Nama Quotation</option>
                                        <option value="namecust">Nama Customer</option>
                                    </select>
                                    <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="" class="form-label">Status</label>
                                <select class="form-select" id="statusquo" aria-label="Default select example">
                                    <option value="">Pilih Status Quotation</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Process">Process</option>
                                    <option value="Finish">Finish</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
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
                                <a href="#" class="btn btn-primary mt-3" onclick="loaddata()">Terapkan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Quotation</th>
                                    <th>Judul Quotation</th>
                                    <th>Customer</th>
                                    <th>Tanggal Exp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="detailx">
                                <!-- <?php if ($data3 != "Not Found") {
                                            foreach ($data3 as $key) { ?>
                                        <tr>
                                            <td><?php echo $key["codequo"] ?></td>
                                            <td><?php echo $key["namequotation"] ?></td>
                                            <td><?php echo $key["namecust"] ?></td>
                                            <td><?php echo $key["expquo"] ?></td>
                                            <td><?php echo $key["statusquo"] ?></td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailquo(<?php echo $key["idquo"] ?>)">Pilih</a></td>
                                        </tr>
                                <?php }
                                        } ?> -->
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
            if ($key["typecust"] == "Buyer") {
    ?>
                <option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
    <?php }
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
    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('QuotationController/getlistquo') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statusquo=" + $('#statusquo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {

                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                            <td>` + hasil[i]["codequo"] + `</td>
                                            <td>` + hasil[i]["namequotation"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["expquo"] + `</td>
                                            <td>` + hasil[i]["statusquo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailquo(` + hasil[i]["idquo"] + `)">Pilih</a></td>
                                        </tr>`
                    }


                }
                $('#detailx').html(baris)
            }

        });
    }

    function detailquo(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('QuotationController/detailquo') ?>",
            data: "idquo=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                $('#custname').val(hasil["namecust"]);
                $('#address').html(hasil["delivaddr"]);
                $('#codequo').val(hasil["codequo"]);
                $('#judulquo').val(hasil["namequotation"]);
                $('#startquo').val(hasil["datequo"]);
                $('#disnom').val(hasil["disc"]);
                $('#expquo').val(hasil["expquo"]);
                $('#norek').val(hasil["norek"]);
                $('#action').show();
                $('#detail').html("")
                var val = hasil["namecust"];
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

                for (let i = 0; i < hasil["data"].length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
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
                        cal();
                        $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
                        $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                        $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                        $('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
                        $('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
                        $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                        $('#transaksi_' + xid + '_discpercent').val(0);
                        $('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disc"]);
                        $('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["qty"] * hasil["data"][i]["disc"]);
                        $('#transaksi_' + xid + '_total').val(hasil["data"][i]["totalprice"]);
                        $('#transaksi_' + xid + '_sub').val(hasil["data"][i]["qty"] * hasil["data"][i]["price"]);

                        document.getElementById('transaksi_' + xid + '_action').disabled = true;
                        document.getElementById('transaksi_' + xid + '_sku').readOnly = true;


                    }
                    calc();
                    document.getElementById('codequo').readOnly = true;
                    document.getElementById('judulquo').readOnly = true;
                    document.getElementById('startquo').readOnly = true;
                    document.getElementById('expquo').readOnly = true;
                    document.getElementById('norek').disabled = true;
                    document.getElementById('disnom').disabled = true;
                    document.getElementById('custname').disabled = true;
                    $('#simpan').hide()
                    if (hasil["statusquo"] == "Waiting") {
                        $('#cancel').show()
                    } else {
                        $('#cancel').hide()
                    }

                    if (hasil["VAT"] == 0) {
                        $("#check").prop("checked", false);
                    } else {
                        $("#check").prop("checked", true);
                    }

                }

            }
        });
    }

    $(document).keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    });

    add_row_transaksi(0)

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
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" list="xitem" value="" required></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control"name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_qty"  class="form-control"name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_discpercent" oninput="discx(' + xid + ')"  class="form-control"name="discpercent[]" value="" oninput="discp(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_disnom" oninput="discxx(' + xid + ')"  class="form-control"name="disnom[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_sub"  class="form-control"name="sub[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_totaldisc"  class="form-control"name="totaldisc[]" value="" oninput="disn(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';

        tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        //return tabel;
        $('#line-transaksi').val(xid);
        $('#detail').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
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
        grandtot = Number((xttl - $('#disnom').val())) + Number(vat)

        $("#ppn").val(vat)
        $("#subtotal").val(xttl)
        $("#grandtotal").val(grandtot)

    }
</script>