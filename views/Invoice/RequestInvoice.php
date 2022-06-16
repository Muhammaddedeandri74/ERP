<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Invoice</li>
            </ol>
            <h3 class="text-white">Purchase Invoice Status</h3>
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
                    <label for="" class="fs-3 mb-3">Pencarian & Filter</label>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                <div class="input-group">
                                    <div class="col-4">
                                        <select name="filter" value="" class="form-select form-control" aria-label="Default select example" id="filter">
                                            <option value="codeinv" selected>No. Invoice</option>
                                            <option value="namecust">Nama Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Filter..">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mulai Dari</label>
                                        <input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sampai Dengan</label>
                                        <input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                        <select class="form-select" id="statusinv" aria-label="Default select example">
                                            <option value="">Pilih Status Invin</option>
                                            <option value="Waiting">Waiting</option>
                                            <option value="Process">Process</option>
                                            <option value="Finish">Finish</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <p></p>
                                    <a class="btn btn-primary" onclick="loaddata()">Terapkan</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="row mb-5" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No. Purchase Invoice</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Tanggal Invoice</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Supplier</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Status</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                                </tr>
                            </thead>
                            <tbody id="detailx">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td id="total">Rp. 0</td>
                                </tr>
                            </tfoot>
                        </table>
                        <table class="table p-0 m-0">
                            <tbody style="background-color: #0000001E;">
                                <tr>
                                    <td>
                                        <div class="row">
                                            <label for="" class="form-label">Report</label>
                                            <div class="col-6">
                                                <a class="btn btn-light" id="btn_exportexcel"><i class='bx bxs-download'>Download</i></a>
                                            </div>
                                            <div class="col-5">
                                                <a class="btn btn-light" onclick="printdata()"><i class='bx bx-printer'>Cetak</i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: blue" class='bx bxs-circle'></i> Total Semua Invoice</label>
                                            <p id="all">0</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Status Unpaid</label>
                                            <p id="unpaid">0</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: orange" class='bx bxs-circle'></i> Total Status Paid</label>
                                            <p id="paid">0</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Status Partial</label>
                                            <p id="partial">0</p>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE INVOICE</h5>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">No. Invoice</label>
                            <p id="codeinv"></p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">No. Ingoing</label>
                            <p>INV</p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">Tgl. Transaksi</label>
                            <p id="dateinv"></p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">Supplier</label>
                            <p id="namecust"></p>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="form-label">Edit PO</label>
                            <p id="edit"></p>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Item</td>
                                    <td>SKU</td>
                                    <td>Spesifikasi</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>VAT</td>
                                    <td>Diskon</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody id="xdetails">
                                <tr>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                    <td>sscanf</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6 text-end">
                                    <p>Sub Total</p>
                                </div>
                                <div class="col-6">
                                    <p id="subtotalx">Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-end">
                                    <p>Diskon Transaksi</p>
                                </div>
                                <div class="col-6">
                                    <p id="distransx">Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-end">
                                    <p>VAT</p>
                                </div>
                                <div class="col-6">
                                    <p id="vatx">Rp. -</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-end">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <p id="grandtotalx">Rp. -</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo base_url('InventoryController/Purchaseinvoice') ?>" method="POST" id="formz">
    <input type="hidden" id="codeinvz" name="codeinvz">
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    loaddata()

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistinvoice') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statusinv=" + $('#statusinv').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                var ix = 1
                grandtotal = 0
                unpaid = 0
                paid = 0
                partial = 0
                if (hasil != "Not Found") {
                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                            <td>` + ix++ + `</td>
                            <td>` + hasil[i]["codeinv"] + `</td>
                            <td>` + hasil[i]["dateinv"] + `</td>
                            <td>` + hasil[i]["namecust"] + `</td>
                            <td>Rp. ` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                            <td>` + hasil[i]["statusinv"] + `</td>
                            <td><a onclick="cekdetail('` + hasil[i]["codeinv"] + `')" class="btn btn-primary" style="font-size: 12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Detail</a></td>
                            
                        </tr>`

                        grandtotal = Number(grandtotal) + Number(hasil[i]["grandtotal"])

                        if (hasil[i]["statusinv"] == "Unpaid") {
                            unpaid = Number(unpaid) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statusinv"] == "Paid") {
                            paid = Number(paid) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statusinv"] == "Partial") {
                            partial = Number(partial) + Number(hasil[i]["grandtotal"])
                        }

                    }

                }
                $('#detailx').html(baris)
                $('#total').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#all').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#unpaid').html(formatRupiah(unpaid + "", "Rp."))
                $('#paid').html(formatRupiah(paid + "", "Rp."))
                $('#partial').html(formatRupiah(partial + "", "Rp."))
            }

        });
    }

    function cekdetail(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var bar = "";
        var barx = "";
        var ix = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["codeinv"] == x) {

                $('#codeinv').html(data[i]["codeinv"]);
                $('#idinv').val(data[i]["idinv"]);
                $('#dateinv').html(data[i]["dateinv"]);
                $('#namecust').html(data[i]["namecust"]);

                $('#subtotalx').html(formatnum(data[i]["subtotal"]));
                $('#distransx').html(formatnum(data[i]["distrans"]));
                $('#vatx').html(formatnum(data[i]["vat"]));
                $('#grandtotalx').html(formatnum(data[i]["grandtotal"]));

                if (data[i]["statusinv"] == "Unpaid") {
                    $('#edit').html(` <button type="button" class="btn btn-outline-primary" onclick = "edit()" data-mdb-dismiss="modal" style="font-size:10px;">Edit</button>`)
                    $('#codeinvz').val(data[i]["codeinv"])
                } else {
                    $('#edit').html("")
                }

                for (var a = 0; a < data[i]["data"].length; a++) {
                    baris += '<tr>';
                    baris += '<td>' + ix++ + '</td>';
                    baris += '<td>' + data[i]["data"][a]["nameitem"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["sku"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["spec"] + '</td>';
                    baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + '</td>';
                    baris += '<td>' + data[i]["data"][a]["qty"] + '</td>';
                    baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["vat"]).toFixed(0)) + '</td>';
                    baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["disnom"]).toFixed(0)) + '</td>';
                    baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["grandtotal"]).toFixed(0)) + '</td>';
                    baris += '</tr>';
                }
                break;
            }
        }
        $('#xdetails').html(baris);
        $('#btnxx').html(barx);
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function edit() {
        $('#formz').submit();
    }
</script>