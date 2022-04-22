<style type="text/css">
    .fw {
        font-weight: bold;
    }

    .fn {
        font-weight: normal;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .cn {
        text-align: center;
    }

    .slc {
        background-color: #f3f3f3;
        color: black;
    }
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Counter / Ingoing - Outgoing</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">COUNTER</p>
</div>
<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('CounterController/inout') ?>" class="btn fw btn-transparent">Order Processing</a>
                    <a href="<?= base_url('CounterController/outgoing') ?>" class="btn fw btn-transparent ">OUTGOING</a>
                    <a href="<?= base_url('CounterController/ingoing') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('CounterController/return') ?>" class="btn fw bay btn-light">RETURN</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <div class="row pt-4">
                        <div class="col-6 pt-2 pl-3">
                            <div class="input-group">
                                <select class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                    <option class="slc" value="1">Trans NO</option>
                                    <option class="slc" value="2">Code SO</option>
                                    <option class="slc" value="3">No Pesanan</option>
                                    <option class="slc" value="4">Name Customer</option>
                                    <option class="slc" value="5">Issue By</option>
                                </select>
                                <input type="text" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan No Trans dan lainnya" style="font-family:Arial, FontAwesome">
                            </div>
                            <div class="card">
                                <div class="card-body bays">
                                    <div class="rwo d-flex justify-content-between">
                                        <div class="col-3">
                                            <p style="text-align :left">Dari</p>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                        </div>
                                        <div class="col-3">
                                            <p style="text-align :left">Hingga</p>
                                            <input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                        </div>
                                        <div class="col-3">
                                            <p><br></p>
                                            <a style="text-decoration: none;" class=" btn btn-outline-danger" onclick="reset()">Reset</a>
                                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                        </div>
                                        <!-- <div class="col-1">
                                        </div> -->
                                        <!-- <div class="col-2 pt-3 ">
                                            <a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
                                        </div>
                                        <div class="col-2 pt-3">
                                            <a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2">
                            <a href="<?php echo base_url('CounterController/newinvincounter') ?>" class="btn btn-outline-primary" style="float :right;margin-top:13.7vh"><b>+ Return</b></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover cn">
                        <thead style="background-color: orange;color: white">
                            <tr>
                                <th>NO </th>
                                <th>Trans NO</th>
                                <th>Trans Date</th>
                                <th>Code SO</th>
                                <th>No Pesanan</th>
                                <th>Name Customer</th>
                                <th>Item Count</th>
                                <th>Deskripsi</th>
                                <th>Issue By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="xdetail">
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function apply() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        console.log(data);
        var ix = 0;
        var x1 = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["typeinret"] == "2") {
                    if ($('#search').val() == 1) {
                        if (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 2) {
                        if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 3) {
                        if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 4) {
                        if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 5) {
                        if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    }
                }
            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["typeinret"] == "2") {
                    if (data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr>';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["codeso"] + '</td>';
                        baris += '<td>' + data[i]["nopesanan"] + '</td>';
                        baris += '<td>' + data[i]["namecust"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["typeinret"] == "2") {
                    if ($('#search').val() == 1) {
                        if (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 2) {
                        if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 3) {
                        if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 4) {
                        if (data[i]["namecust"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    } else if ($('#search').val() == 5) {
                        if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            baris += '<tr>';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["codeso"] + '</td>';
                            baris += '<td>' + data[i]["nopesanan"] + '</td>';
                            baris += '<td>' + data[i]["namecust"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                        }
                    }
                }
            }
        } else {
            alert("Masukan Filter Dengan Benar")
            return;
        }

        $('#xdetail').html(baris);
        console.log($('#valsearch').val())
        console.log($('#date1').val())
        console.log($('#date2').val())
    }

    function reset() {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var a = 1;
        var ix = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["typeinret"] == "2") {
                x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr>';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codeinret"] + '</td>';
                baris += '<td>' + data[i]["dateinret"] + '</td>';
                baris += '<td>' + data[i]["codeso"] + '</td>';
                baris += '<td>' + data[i]["nopesanan"] + '</td>';
                baris += '<td>' + data[i]["namecust"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                baris += '</tr>';
            }
        }
        $('#xdetail').html(baris);
    }

    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["typeinret"] == "2") {
                if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1)) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                } else if ((data[i]["codeso"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2)) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                } else if ((data[i]["nopesanan"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3)) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                } else if ((data[i]["namecust"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 4)) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                } else if ((data[i]["nameuser"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 5)) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr>';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["codeso"] + '</td>';
                    baris += '<td>' + data[i]["nopesanan"] + '</td>';
                    baris += '<td>' + data[i]["namecust"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none;color: black" href="<?php echo base_url('CounterController/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=counter ">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                }
            }
        }
        $('#xdetail').html(baris);
    }
    searchx('');
    $('form button').on("click", function(e) {
        e.preventDefault();
    });
</script>