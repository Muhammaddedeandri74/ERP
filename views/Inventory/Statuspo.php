<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Request Form</li>
            </ol>
            <h3 class="text-white">Request PO Status</h3>
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
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                                <div class="input-group">
                                    <div class="col-4">
                                        <select name="filters" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filters">
                                            <option value="codereqpo">No.Request PO</option>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="searchs" class="form-control" placeholder="Cari Berdasarkan Code Request PO">
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
                                        <select class="form-select" id="statusreqpos" aria-label="Default select example">
                                            <option value="">Pilih Status</option>
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
                                        <input type="date" class="form-control" name="" id="datestarts" value="<?php echo date('Y-m-01') ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sampai Dengan</label>
                                        <input type="date" class="form-control" name="" id="finishdates" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <p></p>
                                    <a href="#" class="btn btn-primary" onclick="loaddatax()">Terapkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered " id="table-user">
                        <thead class="text-white" style="background:#1143d8">
                            <tr>
                                <td>No. Request PO <i class='bx bx-down-arrow-alt'></i></td>
                                <td>Tgl Request Po <i class='bx bx-down-arrow-alt'></i></td>
                                <td>Deskripsi <i class='bx bx-down-arrow-alt'></i></td>
                                <td>Total <i class='bx bx-down-arrow-alt'></i></td>
                                <td>Status <i class='bx bx-down-arrow-alt'></i></td>
                            </tr>
                        </thead>
                        <tbody id="detailx">
                            <tr>
                                <td>as</td>
                                <td>as</td>
                                <td>as</td>
                                <td>as</td>
                                <td>as</td>
                                <td>Detail <i class='bx bx-windows'></i></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table p-0 m-0">
                        <tbody style="background-color: #0000001E;">
                            <tr>
                                <td>
                                    <div class="row">
                                        <label for="" class="form-label">Report</label>
                                        <div class="col-6">
                                            <a href="" class="btn"><i class="bx bxs-download"></i>Download</a>
                                        </div>
                                        <div class="col-5">
                                            <a href="" class="btn"><i class="bx bx-printer"></i>Cetak</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <label for=""><i style="color: blue" class='bx bxs-circle'></i> Total Semua Request PO</label>
                                        <p id="all">Rp. 12.000.000,00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Request PO Waiting</label>
                                        <p id="waiting">Rp. 12.000.000,00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <label for=""><i style="color: req" class='bx bxs-circle'></i> Total Request PO Process</label>
                                        <p id="process">Rp. 12.000.000,00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Request PO Finish</label>
                                        <p id="finish">Rp. 12.000.000,00</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    loaddatax()

    function loaddatax() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('InventoryController/getlistrequestpo') ?>",
            data: "filters=" + $('#filters').val() + "&searchs=" + $('#searchs').val() + "&statusreqpos=" + $('#statusreqpos').val() + "&datestarts=" + $('#datestarts').val() + "&finishdates=" + $('#finishdates').val(),
            dataType: "JSON",
            success: function(hasil) {
                var baris = ""
                var bar = ""
                grandtotal = 0
                waiting = 0
                finish = 0
                cancel = 0
                process = 0
                if (hasil != "Not Found") {

                    for (let i = 0; i < hasil.length; i++) {
                        baris += `  <tr>
                                            <td>` + hasil[i]["codereqpo"] + `</td>
                                            <td>` + hasil[i]["datereqpo"] + `</td>
                                            <td>` + hasil[i]["deskripsi"] + `</td>
                                            <td>Rp. ` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
											<td>` + hasil[i]["statusreqpo"] + `</td>
                                        </tr>`

                        grandtotal = Number(grandtotal) + Number(hasil[i]["grandtotal"])

                        if (hasil[i]["statusreqpo"] == "Waiting") {
                            waiting = Number(waiting) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statusreqpo"] == "Process") {
                            process = Number(process) + Number(hasil[i]["grandtotal"])
                        }

                        if (hasil[i]["statureqspo"] == "Cancel") {
                            cancel = Number(cancel) + Number(hasil[i]["grandtotal"])
                        }
                        if (hasil[i]["statusreqpo"] == "Finish") {
                            finish = Number(finish) + Number(hasil[i]["grandtotal"])
                        }
                    }
                }
                $('#detailx').html(baris)
                $('#total').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#all').html(formatRupiah(grandtotal + " ", "Rp."))
                $('#waiting').html(formatRupiah(waiting + "", "Rp."))
                $('#process').html(formatRupiah(process + "", "Rp."))
                $('#finish').html(formatRupiah(finish + "", "Rp."))
                $('#cancel').html(formatRupiah(cancel + "", "Rp."))
            }

        });
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