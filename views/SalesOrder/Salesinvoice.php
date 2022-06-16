<form action="<?php echo base_url('SalesinvoiceControler/Salesinvoice') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Sales Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Invoice</li>
            </ol>
            <h3 class="text-white">Sales Invoice Status</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                        <div class="input-group">
                            <div class="col-4">
                                <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                    <option value="codeinvoice">Code Invoice</option>
                                    <option value="noinvoice">No Invoice</option>
                                    <option value="namecust">Customer</option>
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
                                <label for="exampleFormControlInput1" class="form-label">Status</label>
                                <select class="form-select" id="statusinvoice" aria-label="Default select example">
                                    <option value="">Pilih</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Process">Process</option>
                                    <option value="Finish">Finish</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
                        </div>
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
                        <div class="col-3 mt-3">
                            <p></p>
                            <a href="#" class="btn btn-primary" onclick="loaddata()">Terapkan</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped list-akses p-0 m-0 " id="table-user">
                    <thead class="text-center text-white" style="background:#1143d8">
                        <tr>
                            <th>No</th>
                            <th>Code Invoice</th>
                            <th>No. Invoice</th>
                            <th>Customer</th>
                            <th>Tgl. Transaksi</th>
                            <th>Due Date</th>
                            <th>Mata Uang</th>
                            <th>V.A.T</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center " id="detailx">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8" style="font-size:17px;">Total</td>
                            <td id="total" style="font-size:17px;">Rp. 181,120</td>
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
                                    <label for=""><i style="color: blue" class='bx bxs-circle'></i> Total Semua Sales Invoice</label>
                                    <p id="all">0</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Status Invoice Waiting</label>
                                    <p id="waiting">0</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: orange" class='bx bxs-circle'></i> Total Status Invoice Proses</label>
                                    <p id="process">0</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Status Invoice Finish</label>
                                    <p id="finish">0</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: red" class='bx bxs-circle'></i> Total Status Invoice Cancel</label>
                                    <p id="cancel">0</p>
                                </div>
                            </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Pilih Data Inventory Out</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="" class="form-label">No. Sales Invoice</label>
                        <p><b>INVSO-202212012111</b></p>
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">Customer</label>
                        <p><b>SAM B</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Tgl. Transaksi</label>
                        <p><b>09-09-2022</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Last Update</label>
                        <p><b>09-10-2022</b></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Status</label>
                        <p><b>Finish</b></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <table class="table">
                        <thead class="text-center text-white" style="background:#1143d8">
                            <tr>
                                <th>No. Sales Order</th>
                                <th>No. Outgoing</th>
                                <th>Nama Item</th>
                                <th>SKU</th>
                                <th>Unit</th>
                                <th>Spesifikasi</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>VAT</th>
                                <th>Diskon</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-2">
                                    <label for="" class="form-label">Sub Total</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Diskon Transaksi</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">VAT</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Total</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Amount Paid</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">Balance</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row mb-2">
                                    <label for="" class="form-label">Rp. 700.000,00</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                                <div class="row mb-2">
                                    <label for="" class="form-label">RP. 0</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#1143d8;color:white;">
                <h5 class="modal-title" id="exampleModalLabel">DETAIL SALES INVOCE</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2" style="margin-left: 1vw">
                        <label for="" class="form-label">No. Invoice</label>
                        <p id="noinvoice"></p>
                    </div>
                    <div class="col-2" style="margin-left: 1vw">
                        <label for="" class="form-label">Kode Invoice</label>
                        <p id="codeinvoicex"></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Supplier</label>
                        <p id="namecustx"></p>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Tgl. Transaksi</label>
                        <p id="dateinvoice"></p>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Status</label>
                        <p id="statusinvoicex"></p>
                    </div>
                    <div class="col-2" id="">
                        <label for="" class="form-label">Edit Invoice</label>
                        <p id="btnx"></p>
                    </div>
                </div>
                <div class="row mx-3" style="overflow-x: auto;">
                    <table class="table table-bordered table-striped" id="table-user">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>No. Invoice</td>
                                <td>SKU</td>
                                <td>Name Item</td>
                                <td>Spesifikasi</td>
                                <td>Harga</td>
                                <td>QTY</td>
                                <td>Diskon</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody id="xdetails">
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
                                <p id="subtotalx"></p>
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
                                <p>Total</p>
                            </div>
                            <div class="col-6">
                                <p id="totalx">Rp. -</p>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    loaddata();

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('SalesinvoiceControler/getlistinvoice') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statusinvoice=" + $('#statusinvoice').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {
                console.log(hasil)
                var baris = ""
                var bar = ""
                grandtotal = 0
                waiting = 0
                finish = 0
                cancel = 0
                process = 0
                var ix = 1
                if (hasil != "Not Found") {
                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                                            <td>` + ix++ + `</td>
                                            <td>` + hasil[i]["codeinvoice"] + `</td>
                                            <td style="text-align:left">` + hasil[i]["noinvoice"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["dateinvoice"] + `</td>
                                            <td>` + hasil[i]["expinvoice"] + `</td>
                                            <td>` + hasil[i]["idcur"] + `</td>
                                            <td style="text-align:left">Rp. ` + formatnum(parseFloat(hasil[i]["ppn"]).toFixed(0)) + `</td>
                                            <td style="text-align:left">Rp. ` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                                            <td>` + hasil[i]["statusinvoice"] + `</td>
                                            <td><a onclick="cekdetail('` + hasil[i]["codeinvoice"] + `')" class="btn btn-primary" style="font-size: 12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">Detail</a></td>


                                        </tr>`

                        grandtotal = Number(grandtotal) + Number(hasil[i]["grandtotal"])

                        if (hasil[i]["statusinvoice"] == "Waiting") {
                            waiting = Number(waiting) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statusinvoice"] == "Process") {
                            process = Number(process) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statusinvoice"] == "Cancel") {
                            cancel = Number(cancel) + Number(hasil[i]["grandtotal"])
                        }
                        if (hasil[i]["statusinvoice"] == "Finish") {
                            finish = Number(finish) + Number(hasil[i]["grandtotal"])
                        }


                    }

                }
                $('#detailx').html(baris)
                $('#btnx').html(bar);
                $('#total').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#all').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#waiting').html(formatRupiah(waiting + "", "Rp."))
                $('#process').html(formatRupiah(process + "", "Rp."))
                $('#finish').html(formatRupiah(finish + "", "Rp."))
                $('#cancel').html(formatRupiah(cancel + "", "Rp."))
            }

        });
    }

    function cekdetail(x) {
        var data = <?php echo json_encode($data1) ?>;
        console.log(data)
        var baris = "";
        var bar = "";
        var barx = "";
        var ix = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["codeinvoice"] == x) {

                $('#noinvoice').html(data[i]["noinvoice"]);
                $('#codeinvoicex').val(data[i]["codeinvoice"]);
                $('#idinvoice').val(data[i]["idinvoice"]);
                $('#namecustx').html(data[i]["namecust"]);
                $('#dateinvoice').html(data[i]["dateinvoice"]);
                $('#expinvoice').html(data[i]["expinvoice"]);
                $('#statusinvoicex').html(data[i]["statusinvoice"]);

                $('#subtotalx').html(formatnum(data[i]["subtotal"]));
                $('#distransx').html(formatnum(data[i]["disnoms"]));
                $('#totalx').html(formatnum(data[i]["subtotal"]));
                $('#vatx').html(formatnum(data[i]["ppn"]));
                $('#grandtotalx').html(formatnum(data[i]["grandtotal"]));

                if (data[i]["statusinvoice"] == "Waiting") {
                    bar += `<a href="#" name="submit" onclick="editx()" class="btn btn-outline-primary" style="font-size:10px; width:auto;">Edit Po</a>`;
                } else if (data[i]["statusinvoice"] == "Process") {

                } else if (data[i]["statusinvoice"] == "Finish") {

                }

                for (var a = 0; a < data[i]["data"].length; a++) {
                    baris += '<tr>';
                    baris += '<td>' + ix++ + '</td>';
                    baris += '<td>' + data[i]["data"][a]["codeinvoice"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["sku"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["nameitem"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["spec"] + '</td>';
                    baris += '<td>Rp ' + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + ' </td>';
                    baris += '<td>' + data[i]["data"][a]["qty"] + '</td>';
                    baris += '<td>Rp ' + formatnum(parseFloat(data[i]["data"][a]["disnom"]).toFixed(0)) + ' </td>';
                    baris += '<td>Rp ' + formatnum(parseFloat(data[i]["data"][a]["total"]).toFixed(0)) + ' </td>';
                    baris += '</tr>';
                }
                break;
            }
        }
        $('#xdetails').html(baris);
        $('#btnx').html(bar);
        $('#btnxx').html(barx);
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
</script>