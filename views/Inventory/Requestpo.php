<form action="<?php echo base_url('MasterDataControler/addreqpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Request Form</li>
            </ol>
            <h3 class="text-white">Request PO</h3>
        </nav>
    </div>
    <div class="modal fade" id="requestso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Sales Order</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
                </div>
                <input type="hidden" name="idcust" id="idcust">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-9">
                                    <label for="" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <select name="filterx" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterx">
                                            <option value="codeso">No.Sales Order</option>
                                            <option value="nopesanan">No.Pesanan</option>
                                            <option value="namecust">No.Sales Order</option>
                                        </select>
                                        <input type="text" id="searchx" class="form-control" placeholder="Cari Berdasarkan No Sales Order">
                                    </div>
                                </div>
                                <div class=" col-3">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select" id="statusorder" aria-label="Default select example" style="width:auto;">
                                        <option value="">Pilih Status SO</option>
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
                                    <input type="date" class="form-control" name="" id="datestartx" value="<?php echo date('Y-m-01') ?>">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" name="" id="finishdatex" value="<?php echo date('Y-m-t') ?>">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="#" class="btn btn-primary mt-3" onclick="loaddataso()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code SO</th>
                                        <th>No. Pesanan</th>
                                        <th>Tanggal SO</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailsox">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="requestpo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">List Request Purchase Order</h5>
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
                                        <select name="filters" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filters">
                                            <option value="codereqpo">No.Request Po</option>
                                        </select>
                                        <input type="text" id="searchs" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select" id="statusreqpos" aria-label="Default select example">
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
                                    <input type="date" class="form-control" name="" id="datestarts" value="<?php echo date('Y-m-01') ?>">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">Sampai Dengan</label>
                                    <input type="date" class="form-control" name="" id="finishdates" value="<?php echo date('Y-m-t') ?>">
                                </div>
                                <div class="col-4">
                                    <p></p>
                                    <a href="#" class="btn btn-primary mt-3" onclick="loaddatax()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code Request PO</th>
                                        <th>Tgl Request PO</th>
                                        <th>Deskripsi</th>
                                        <th>Status Request PO</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailreqpo">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12 bays">
                    <div class="row">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php $this->session->set_flashdata('message', ''); ?>
                    </div>
                    <div class="row mb-">
                        <div class="col-5">
                            <label for="" class="form-label fs-4 mb-3">Informasi Dasar</label>

                            <div class="row mb-3">
                                <label for="" class="form-label">No. Request PO</label>
                                <div class="col-4" id="code">
                                    <input type="text" name="codereqpo" id="coderequestpo" class="form-control" readonly>
                                    <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                                    <input type="hidden" name="idporeq" class="form-control">
                                </div>
                                <div class="col-4" style="display:none;" id="codex">
                                    <input type="text" name="codereqpo" id="coderequestpo" value="<?php echo $data2 ?>" class="form-control" readonly>
                                    <input type="hidden" name="idporeq" class="form-control">
                                </div>
                                <div class="col-4">
                                    <button type="button" data-mdb-toggle="modal" id="loadquo" data-mdb-target="#requestpo" class="btn btn-primary" onclick="loaddatax()">Cari Data</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="form-label">No. Sales Order</label>
                                <div class="col-4">
                                    <input type="text" name="codeso" id="codeso" class="form-control" readonly>
                                    <input type="hidden" name="idso" id="idsox" class="form-control" readonly>
                                </div>
                                <div class="col-4">
                                    <button type="button" data-mdb-toggle="modal" data-mdb-target="#requestso" class="btn btn-primary" onclick="loaddataso()">Cari Data</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="form-label">Due Date (optional)</label>
                                <div class="col-4">
                                    <input type="date" name="date" id="date1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <lable for="" class="form-label fs-3">&nbsp; </lable>
                            <div class="row">
                                <div class="col-10">
                                    <label for="" class="form-label">Remark</label>
                                    <textarea name="desc" id="desc" cols="7" rows="4" class="form-control" style="font-size:13px;"></textarea>
                                    <div class="">
                                        <span class="text-muted" style="font-size: 13px;">Maksimal 250 Karakter</span>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-3" id="action" style="display: none;">
                            <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light" onclick="printDiv('reqpo')"><i class='bx bx-printer'>Cetak</i></button>
                                </div>
                                <div class="col-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-12">
                        <h5>Item/Produk</h5>
                        <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sku</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Nama Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty Request</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                                </tr>
                            </thead>
                            <tbody id="detail">

                            </tbody>
                        </table>
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
                                            <p>Grand Total</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mr-4 mt-3" style="text-align:right;">
                            <button type="button" class="btn btn-primary" id="addorder" onclick="addorder()" style="font-size:13px;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bay" style="display: none;" id="reqpo">
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
                        <label for="" class="form-label fs-3"><u>Request Purchase Order</u> </label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <table class="table border">
                            <thead style="border: 2px solid black">
                                <tr>
                                    <td>No</td>
                                    <td>Sku</td>
                                    <td>Nama Item</td>
                                    <td>Harga</td>
                                    <td>Qty Request</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody id="bodys">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-end">
                        <div class="card p-3" style="background-color: white;border-radius: 8px">
                            <div class="row">
                                <div class="col-6 ">
                                    <p>Sub Total</p>
                                </div>
                                <div class="col-6">
                                    <p id="subtotalx"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 ">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <p id="grandtotalx"></p>
                                </div>
                            </div>
                        </div>
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

<datalist id="xitem">
    <?php
    if ($data1 != 'Not Found') {
        foreach ($data1 as $key) {
    ?>
            <option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
    <?php }
    } ?>
</datalist>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function loaddataso() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistso') ?>",
            data: "filterx=" + $('#filterx').val() + "&searchx=" + $('#searchx').val() + "&statusorder=" + $('#statusorder').val() + "&datestartx=" + $('#datestartx').val() + "&finishdatex=" + $('#finishdatex').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                                            <td>` + hasil[i]["codeso"] + `</td>
                                            <td>` + hasil[i]["nopesanan"] + `</td>
                                            <td>` + hasil[i]["dateso"] + `</td>
											<td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["statusorder"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailso('` + hasil[i]["codeso"] + `')">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailsox').html(baris)
            }

        });
    }

    function loaddatax() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistreqpo') ?>",
            data: "filters=" + $('#filters').val() + "&searchs=" + $('#searchs').val() + "&statusreqpos=" + $('#statusreqpos').val() + "&datestarts=" + $('#datestarts').val() + "&finishdates=" + $('#finishdates').val(),
            dataType: "JSON",
            success: function(hasil) {
                var baris = ""
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                                            <td>` + hasil[i]["codereqpo"] + `</td>
                                            <td>` + hasil[i]["datereqpo"] + `</td>
                                            <td>` + hasil[i]["deskripsi"] + `</td>
											<td>` + hasil[i]["statusreqpo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailreqpo(` + hasil[i]["idreqpo"] + `)">Pilih</a></td>
                                        </tr>`
                    }
                }
                $('#detailreqpo').html(baris)
            }

        });
    }

    function detailreqpo(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailreqpo') ?>",
            data: "idreqpo=" + x,
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                $('#coderequestpo').val(hasil["codereqpo"]);
                $('#idreqpo').val(hasil["idreqpo"]);
                $('#desc').val(hasil["deskripsi"]);
                $('#detail').html("");
                $('#action').show();
                var baris = "";
                var ix = 1;

                for (let a = 0; a <= hasil["data"].length; a++) {
                    baris += `<tr>
                        <td scope="row">` + ix++ + `</td>;
                        <td>` + hasil["data"]["sku"] + `</td>
                        <td>` + hasil["data"]["nameitem"] + `</td>
                        <td>Rp. ` + formatnum(parseFloat(hasil["data"]["price"]).toFixed(0)) + `</td>
                        <td>` + hasil["data"]["qty"] + `</td>
                        <td>Rp. ` + formatnum(parseFloat(hasil["data"]["grandtotal"]).toFixed(0)) + `</td>
                    </tr>`;
                }

                for (let i = 0; i <= hasil["data"].length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });
                    $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + '');
                    $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_discpercent').val(0);
                    $('#transaksi_' + xid + '_disnom').val(0);
                    $('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["subtotal"]) + '');
                    $('#transaksi_' + xid + '_totaldisc').val(0);
                    $('#transaksi_' + xid + '_total').val(formatRupiah(hasil["grandtotal"]) + '');
                    document.getElementById('transaksi_' + xid + '_sku').readOnly = true;
                    document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
                    document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
                    document.getElementById('transaksi_' + xid + '_action').readOnly = true;
                    document.getElementById('date1').disabled = true;
                    document.getElementById('desc').disabled = true;

                    calc();

                }

                $('#bodys').html(baris);
            }
        });
    }

    //

    function detailso(x) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/detailso') ?>",
            data: "idso=" + x,
            dataType: "JSON",
            success: function(hasil) {
                $('#idsox').val(hasil["idso"]);
                $('#codeso').val(hasil["codeso"]);
                $('#dateso').val(hasil["dateso"]);
                $('#delivedate').val(hasil["delivedate"]);
                $('#namesupp').val(hasil["namecust"]);
                $('#idsupp').val(hasil["idcust"]);
                $('#detail').html("");

                for (let i = 0; i <= hasil["data"].length; i++) {
                    add_row_transaksi(i)
                    var xid = Number(i) + Number(1);
                    $('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
                    var val = hasil["data"][i]["sku"];
                    var xobj = $('#xitem option').filter(function() {
                        return this.value == val;
                    });
                    $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
                    $('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
                    $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
                    $('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
                    $('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
                    $('#transaksi_' + xid + '_discpercent').val(hasil["data"][i]["disnomdet"]);
                    $('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnomdet"]);
                    $('#transaksi_' + xid + '_sub').val(hasil["data"][i]["totalso"]);
                    $('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["totaldisc"]);
                    $('#transaksi_' + xid + '_total').val(hasil["data"][i]["grandtotaldet"]);
                    calc();

                }

            }
        });
    }

    var iditem = <?php echo json_encode($iditem)  ?>;
    if (iditem != "") {
        for (let i = 0; i < iditem.length; i++) {
            add_row_transaksi(i)
            var xid = Number(i) + Number(1);
            $('#transaksi_' + xid + '_sku').val(iditem[i]);
            var val = iditem[i];
            var xobj = $('#xitem option').filter(function() {
                return this.value == val;
            });
            $('#transaksi_' + xid + '_sku').val(iditem[i]);
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_harga').val(xobj.data('price'));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_total').val(xobj.data('price'));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
            calc();
            console.log(iditem[i])
        }

    } else {
        add_row_transaksi(0)
    }

    $(function() {
        $("#check").click(function() {
            if ($(this).is(":checked")) {
                $("#check").val(1);
            } else {
                $("#check").val(0);
            }
            calc();
        });
    });

    $(document).keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    });

    $('form button').on("click", function(e) {
        if ($(this).attr('id') == "addorder") {
            var xask = '';
            if ($("#idporeq").val() == "") {
                xask = "Simpan Transaksi?";
            } else {
                xask = "Simpan Transaksi?";
            }
            if (confirm(xask)) {
                if (validasi()) {
                    addorder();
                }
            }
        }
        e.preventDefault();
    });

    function validasi() {
        var xval = 0;
        var sts = 1;

        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

            // if ($('#transaksi_' + xid + '_sku').val() == "") {
            //     alert('Masukan Item Terlebih Dahulu');
            //     sts = 0;
            //     return false;
            // }

            // if ($('#transaksi_' + xid + '_qtyin').val() == 0) {
            //     alert('Masukan QTY Terlebih Dahulu');
            //     sts = 0;
            //     return false;
            // }
        });



        if (sts == 1) {
            return true;
        } else {
            return false;
        }
    }

    function addorder() {
        var cx = $('#form').serialize();
        $.post("<?php echo base_url('MasterDataControler/addporeq') ?>", cx,
            function(data) {
                if (data == 'Success') {
                    alert('Data Berhasil Dengan No. Request');
                    $('#code').hide();
                    $('#codex').show();
                    $('#action').show();
                    cancelorder();
                } else {
                    alert('' + data);
                    $('#code').hide();
                    $('#codex').show();
                    $('#action').show();
                    // detailpo(data.replace("Success Dengan No. ", ""));
                }
            });
    }




    function calc() {
        var xcnt = 0;
        var xqty = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xcnt++;
                xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
            }
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
        tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:100%;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';

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


    function discountpersent(disc, disc1) {
        if (disc1 > 100) {
            $('#transaksi_' + disc + '_discpersen').val(100);
            alert("Maaf Angka terlalu banyak");

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
            $('#transaksi_' + xid + '_harga').val("");
            $('#transaksi_' + xid + '_qty').val("");
            $('#transaksi_' + xid + '_total').val("");

            document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_harga').val(formatRupiah(xobj.data('price') + ""));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_total').val(formatRupiah(xobj.data('price') + ""));

        }
        calc();
    });


    // function cal(x) {
    //     console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b ")
    //     $('#transaksi_' + x + '_total').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val() + ""))
    //     calc();
    // }

    function cal(x) {
        console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val().replaceAll(".", "") + " b ")
        $('#transaksi_' + x + '_sub').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val().replaceAll(".", "") + ""))
        $('#transaksi_' + x + '_total').val(formatRupiah($('#transaksi_' + x + '_qty').val().replaceAll(".", "") + "") * $('#transaksi_' + x + '_harga').val().replaceAll(".", "") + "")
        calc();
    }



    function calc() {
        var xttl = 0;
        var dpp = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll(".", ""));

            }

        });


        if ($("#check").is(":checked") == true) {
            vat = (xttl - $('#disnom').val()) * 11 / 100;
        } else {
            vat = 0;
        }
        grandtot = xttl;

        $("#ppn").val(formatnum(vat))
        $("#subtotal").val(formatnum(xttl))
        $("#grandtotal").val(formatnum(grandtot))

    }

    function cancelorder() {
        location.reload();
    }

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#date1").val() == '') {
            $("#date1").val(date);
        }
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
        if ($("#date2").val() == '') {
            $("#date2").val(date);
        }
    });

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

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>