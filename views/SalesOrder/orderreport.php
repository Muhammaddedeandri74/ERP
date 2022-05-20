<form action="<?php echo base_url('OrderManagementController/orderreport') ?>" method="POST" enctype="multipart/form-data">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Order</li>
            </ol>
            <h3 class="text-white">Register Order Confirmation</h3>
        </nav>
    </div>
    <div class="content bg-white  mx-4">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">Status Order</label>
                            <select class="form-select" name="status" id="status" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="Waiting">Waiting</option>
                                <option value="Process">Process</option>
                                <option value="Finish">Finish</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="date1" id="datestart" value="<?php echo date('Y-m-d') ?>" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="date2" id="finishdate" value="<?php echo date('Y-m-t') ?>" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="col-6"></div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label for="" class="form-label">Pencarian</label>


                    <div class="row">
                        <div class="col-6">
                            <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                                <option value="codeso">No. Sales Order</option>
                                <option value="namecust">Nama Customer</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Filter">
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <p></p>
                    <a href="<?php echo base_url('OrderManagementController/orderreport') ?>" class="btn btn-danger mt-3" style="font-size: 13px;">Reload</a>
                    <button type="button" onclick="loaddata()" class="btn btn-primary mt-3" style="font-size: 13px;">Terapkan</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table m-0">
                    <thead class="border-0">
                        <tr>
                            <th>No</th>
                            <th>No. Sales Order</th>
                            <th>Tgl. Transaksi</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>Sub Total</th>
                            <th>VAT</th>
                            <th>Ongkos Kirim</th>
                            <th>Total Amount</th>
                            <th>Status <i class='bx bx-down-arrow-alt'></i></th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="detailx">
                        <!-- <?php if ($data != "Not Found") : ?>
                            <?php $no = 1 ?>
                            <?php foreach ($data as $key) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key["codeso"] ?></td>
                                    <td><?php echo $key["dateso"] ?></td>
                                    <td><?php echo $key["namecust"] ?></td>
                                    <td><?php echo $key["nameitem"] ?></td>
                                    <td>Rp. <?php echo number_format($key['price'], 0, '.', ',') ?></td>
                                    <?php if ($key["disnomdet"] == "") : ?>
                                        <td>Rp . 0</td>
                                    <?php else : ?>
                                        <td> Rp. <?php echo number_format($key['disnomdet'], 0, '.', ',') ?></td>
                                    <?php endif ?>
                                    <td>Rp. <?php echo number_format($key['grandtotaldet'], 0, '.', ',') ?></td>
                                    <td style="text-align:left;">
                                        <?php if ($key["statusorder"] == "Waiting") : ?>
                                            <p style="background-color:#E6ECFF;width:fit-content;text-color:#1143D8;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statusorder"] ?></p>
                                        <?php elseif ($key["statusorder"] == "Process") : ?>
                                            <p style="background-color:#FCAA25;width:fit-content;text-color:white;" class="fs-6 px-3 text-white rounded-pill"> <?php echo $key["statusorder"] ?></p>
                                        <?php elseif ($key["statusorder"] == "Finish") : ?>
                                            <p style="background-color:#A6FFC6;width:fit-content;text-color:#008F43;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statusorder"] ?></p>
                                        <?php endif ?>
                                    </td>
                                    <td><a onclick="cekdetail(<?php echo $key['idso'] ?>)" class="btn btn-primary" style="font-size: 12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Detail</a></td>
                                </tr>

                            <?php endforeach ?>
                        <?php endif ?> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total Order :</td>
                            <td id="totalitem">0 Item</td>
                            <td id="totalsub">Rp. 15.000.000</td>
                            <td id="totalvat">Rp. 15.000.000</td>
                            <td id="totalongkir">Rp. 15.000.000</td>
                            <td id="totalamount">Rp. 15.000.000</td>
                        </tr>
                    </tfoot>
                </table>
                <table class="table p-0 m-0">
                    <tbody style="background-color: #0000001E;">
                        <tr>
                            <td>
                                <div class="row">
                                    <label for="">Report</label>
                                    <div class="col-6">
                                        <a id="btn_exportexcel" class="btn"><i class="bx bxs-download" style="font-size: 13px;"></i>Download</a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn" onclick="printdata()"><i class="bx bx-printer" style="font-size: 13px;"></i>Cetak</a>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="row">
                                    <label for=""><i style="color: blue" class='bx bxs-circle'></i> Total Semua Sales Order</label>
                                    <p id="all">Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Sales Order Waiting</label>
                                    <p id="waiting">Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: orange" class='bx bxs-circle'></i> Total Sales Order Proses</label>
                                    <p id="process">Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Sales Order Finish</label>
                                    <p id="finish">Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: red" class='bx bxs-circle'></i> Total Sales Order Cancel</label>
                                    <p id="cancel">Rp. 12.000.000,00</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background:#1143d8;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">DETAIL DATA PURCHASE ORDER</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped" id="table-user">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>No Purchase Order</td>
                                    <td>Tanggal SO</td>
                                    <td>Name Item</td>
                                    <td>SKU</td>
                                    <td>Qty</td>
                                    <td>Harga Total</td>
                                </tr>
                            </thead>
                            <tbody id="xdetails">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <pre id="result" style="display: none"></pre>
    <div class="excel" id="excel">
    </div>
    <div class="data" id="data">
        <table class="table table-striped table-hover">
            <thead style="background: purple">
                <tr>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">#</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">No. Sales Order</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Tgl. Transaksi</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Customer</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Item</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Sub Total</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Discount</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Total Amount</td>
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Status</td>
                </tr>
            </thead>
            <tbody id="printt">
                <?php if ($data != "Not Found") : ?>
                    <?php $no = 1 ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>

                            <td style="border:solid;"><?php echo $no++; ?></td>
                            <td style="border:solid;"><?php echo $key["codeso"] ?></td>
                            <td style="border:solid;"><?php echo $key["dateso"] ?></td>
                            <td style="border:solid;"><?php echo $key["namecust"] ?></td>
                            <td style="border:solid;"><?php echo $key["nameitem"] ?></td>
                            <td style="border:solid;"><?php echo number_format($key['price'], 0, '.', ',') ?></td>
                            <td style="border:solid;"><?php echo $key["disnomdet"] ?></td>
                            <td style="border:solid;"><?php echo $key["grandtotaldet"] ?></td>
                            <td style="border:solid;"><?php echo $key["statusorder"] ?></td>
                        </tr>

                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#data').hide();

    function printdata() {
        var printContents = document.getElementById('data').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        console.log(file)
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Sales Order Report.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function cekdetail(x) {

        var ix = 1;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('OrderManagementController/detailsalesorder') ?>",
            data: "idso=" + x,
            dataType: "JSON",
            success: function(hasil) {
                var baris = "";

                for (var i = 0; i < hasil["data"].length; i++) {

                    baris += '<tr>';
                    baris += '<td scope="row">' + ix++ + '</td>';
                    baris += '<td>' + hasil["codeso"] + '</td>';
                    baris += '<td>' + hasil["dateso"] + '</td>';
                    baris += '<td>' + hasil["data"][i]["nameitem"] + '</td>';
                    baris += '<td>' + hasil["data"][i]["sku"] + '</td>';
                    baris += '<td>' + hasil["data"][i]["qtyso"] + '</td>';
                    baris += '<td>' + formatRupiah(hasil["data"][i]["grandtotaldet"] + "", "Rp.") + '</td>';
                    baris += '</tr>';

                }
                console.log(hasil)
                $('#xdetails').html(baris);
            }
        })



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

    loaddata()

    function loaddata() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('OrderManagementController/orderreportload') ?>",
            data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&status=" + $('#status').val() + "&date1=" + $('#datestart').val() + "&date2=" + $('#finishdate').val(),
            dataType: "JSON",
            success: function(hasil) {

                console.log(hasil)
                var baris = ""
                totalquo = 0
                totalitem = 0
                totalsub = 0
                totalvat = 0
                totalongkir = 0
                totalamount = 0
                waiting = 0
                finish = 0
                cancel = 0
                process = 0;
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {


                        baris += `  <tr>
                                    <td>` + (Number(i) + Number(1)) + `</td>
                                    <td>` + hasil[i]["codeso"] + `</td>
                                    <td>` + hasil[i]["dateso"] + `</td>
                                    <td>` + hasil[i]["namecust"] + `</td>
                                    <td>` + hasil[i]["data"].length + `</td>
                                    <td>` + formatRupiah(hasil[i]["subtotal"] + " ", "Rp.") + `</td>
                                    <td>` + formatRupiah(hasil[i]["vat"] + " ", "Rp.") + `</td>
                                    <td>` + formatRupiah(hasil[i]["ongkir"] + " ", "Rp.") + `</td>
                                    
                                    <td>` + formatRupiah(hasil[i]["grandtotalso"] + " ", "Rp.") + `</td>
                                    <td style="text-align:left;">
                                        ` + hasil[i]["statusorder"] + `
                                    </td>
                                    <td><a onclick="cekdetail(` + hasil[i]["idso"] + `)" class="btn btn-primary" style="font-size: 12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Detail</a></td>
                                </tr>`

                        totalquo = Number(totalquo) + Number(hasil[i]["grandtotalso"])
                        totalitem = Number(totalitem) + Number(hasil[i]["data"].length)
                        totalsub = Number(totalsub) + Number(hasil[i]["subtotal"])
                        totalvat = Number(totalvat) + Number(hasil[i]["vat"])
                        totalongkir = Number(totalongkir) + Number(hasil[i]["ongkir"])
                        totalamount = Number(totalamount) + Number(hasil[i]["grandtotalso"])

                        if (hasil[i]["statusorder"] == "Waiting") {
                            waiting = Number(waiting) + Number(hasil[i]["grandtotalso"])
                        }

                        if (hasil[i]["statusorder"] == "Process") {
                            process = Number(process) + Number(hasil[i]["grandtotalso"])
                        }

                        if (hasil[i]["statusorder"] == "Cancel") {
                            cancel = Number(cancel) + Number(hasil[i]["grandtotalso"])
                        }
                        if (hasil[i]["statusorder"] == "Finish") {
                            finish = Number(finish) + Number(hasil[i]["grandtotalso"])
                        }
                    }


                }
                $('#detailx').html(baris)
                $('#totalitem').html(totalitem + " Item")
                $('#totalsub').html(formatRupiah(totalsub + " ", "Rp."))
                $('#totalvat').html(formatRupiah(totalvat + " ", "Rp."))
                $('#totalongkir').html(formatRupiah(totalongkir + " ", "Rp."))
                $('#totalamount').html(formatRupiah(totalamount + " ", "Rp."))

                $('#total').html(formatRupiah(totalquo + " ", "Rp."))
                $('#all').html(formatRupiah(totalquo + " ", "Rp."))
                $('#waiting').html(formatRupiah(waiting + "", "Rp."))
                $('#process').html(formatRupiah(process + "", "Rp."))
                $('#finish').html(formatRupiah(finish + "", "Rp."))
                $('#cancel').html(formatRupiah(cancel + "", "Rp."))
            }

        });
    }
</script>