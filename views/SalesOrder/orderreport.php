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
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="Waiting">Waiting</option>
                                <option value="Process">Process</option>
                                <option value="Finish">Finish</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Mulai Dari</label>
                            <input type="date" name="date1" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">Sampai Dengan</label>
                            <input type="date" name="date2" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="col-6"></div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label for="" class="form-label">Pencarian</label>
                    <input type="text" name="namecust" id="namecust" class="form-control" placeholder="Cari Berdasarkan Customer" autocomplete="off">
                </div>
                <div class="col-4">
                    <p></p>
                    <a href="<?php echo base_url('OrderManagementController/orderreport') ?>" class="btn btn-danger mt-3" style="font-size: 13px;">Reload</a>
                    <button type="submit" class="btn btn-primary mt-3" style="font-size: 13px;">Terapkan</button>
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
                            <th>DPP</th>
                            <th>Discount</th>
                            <th>Total Amount</th>
                            <th>Status <i class='bx bx-down-arrow-alt'></i></th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($data != "Not Found") : ?>
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
                        <?php endif ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total Order :</td>
                            <td>0 Item</td>
                            <td>Rp. 15.000.000</td>
                            <td>Rp. 15.000.000</td>
                            <td>Rp. 15.000.000</td>
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
                                    <label for=""><i style="color: #F56764" class="bx bxs-circle"></i> Total Semua Sales Order</label>
                                    <p></p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: #FCAA25" class="bx bxs-circle"></i> Total Sales Order Pending</label>
                                    <p>Rp. 12.000.000,00</p>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <label for=""><i style="color: #008F43" class="bx bxs-circle"></i> Total Sales Order Selesai</label>
                                    <p>Rp. 12.000.000,00</p>
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
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
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
                    <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">DPP</td>
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
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 1;
        console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idso"] == x) {
                for (var a = 0; a < data[i]["data"].length; a++) {
                    baris += '<tr>';
                    baris += '<td scope="row">' + ix++ + '</td>';
                    baris += '<td>' + data[i]["data"][a]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["dateso"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["nameitem"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["sku"] + '</td>';
                    baris += '<td>' + data[i]["data"][a]["deskripsi"] + '</td>';
                    baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + '</td>';
                    baris += '</tr>';
                }
                break;
            }
        }
        $('#xdetails').html(baris);
    }
</script>