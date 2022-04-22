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
</style>
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Gudang Utama / Report </p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">Report Outgoing</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/reportingoing') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('InOut/reportoutgoing') ?>" class="btn bay fw btn-transparent">OUTGOING</a>
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
                    <form action="<?php echo base_url('InOut/reportoutgoing') ?>" method="post">
                        <div class="row pt-4">
                            <div class="col-6">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codeinret">Trans NO</option>
                                        <!-- <option class="slc" value="2">Order NO</option>
                                        <option class="slc" value="3">Supplier</option>
                                        <option class="slc" value="4">Deskripsi</option>
                                        <option class="slc" value="5">Issue By</option> -->
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Trans No dan Lainnya" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p style="text-align :left">Dari</p>
                                                <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p style="text-align :left">Hingga</p>
                                                <input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
                                                <p>&nbsp;</p>
                                                <a href="<?php echo base_url('InOut/reportoutgoing') ?>" style="text-decoration: none;color: purple" class="btn btn-outline-danger">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-2" style="margin-top: 13vh">
                                <a class="btn btn-outline-success" style="margin-left: 6vw;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th>NO </th>
                                <th>Trans NO</th>
                                <th>Order NO</th>
                                <th>Trans Date</th>
                                <th>Supplier</th>
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

<div class="excel" id="excel">
</div>
<div class="data" id="data" style="display: none">
    <table class="table">
        <thead style="background-color: #3C2E8F;color: white">
            <tr>
                <th style="text-align:center;border:1px solid;">NO </th>
                <th style="text-align:center;border:1px solid;">Trans NO</th>
                <th style="text-align:center;border:1px solid;">Order No</th>
                <th style="text-align:center;border:1px solid;">Trans Date</th>
                <th style="text-align:center;border:1px solid;">Item Count</th>
                <th style="text-align:center;border:1px solid;">Deskripsi</th>
                <th style="text-align:center;border:1px solid;">Item Count</th>
                <th style="text-align:center;border:1px solid;">Deskripsi</th>
                <th style="text-align:center;border:1px solid;">Issue By</th>
            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($data != "Not Found") : $a = 1;
                $getdata = array(); ?>
                <?php foreach ($data as $key) : ?>
                    <?php if ($key["typeinret"] == 1) : ?>
                        <?php if ($key["codepo"] == 1 and $key["codepo"] == 1) : ?>
                            <th style="text-align:center;border:1px solid;" scope="row"><?php echo $a++ ?></th>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["codeinret"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["codepo"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["dateinret"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["namesupp"] ?></td>
                            <td style="text-align:center;border:1px solid;"></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["descinfo"]  ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["nameuser"]  ?></td>
                            </tr>
                        <?php array_push($getdata, $key);
                        endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<script language="javascript">
    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        var baris = "";
        var bar = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["typeinret"] == "1") {

                if (data[i]["codepo"] != null && data[i]["namesupp"] != null) {

                    if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        if (i % 2 == 0) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse" class="btn btn-secondary">Detail</a></td>';
                            baris += '</tr>';
                            bar += `
                            <td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        } else {
                            baris += '<tr style="background:#eeeeee; cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';

                            bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        }
                    }


                } else if (data[i]["codepo"] == null && data[i]["namesupp"] == null) {
                    if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        if (i % 2 == 0) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';

                            bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        } else {
                            baris += '<tr style="background:#eeeeee; cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';
                            bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        }
                    }


                } else if (data[i]["codepo"] != null && data[i]["namesupp"] == null) {
                    if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        if (i % 2 == 0) {
                            baris += '<tr style="cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';

                            bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        } else {
                            baris += '<tr style="background:#eeeeee; cursor: pointer;">';
                            baris += '<td>' + ix + '</td>';
                            baris += '<td>' + data[i]["codeinret"] + '</td>';
                            baris += '<td>' + data[i]["codepo"] + '</td>';
                            baris += '<td>' + data[i]["dateinret"] + '</td>';
                            baris += '<td>' + data[i]["namesupp"] + '</td>';
                            baris += '<td>' + x1 + '</td>';
                            baris += '<td>' + data[i]["descinfo"] + '</td>';
                            baris += '<td>' + data[i]["nameuser"] + '</td>';
                            baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                            baris += '</tr>';

                            bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                        }
                    }


                } else if (data[i]["codepo"] == null && data[i]["namesupp"] != null) {
                    {
                        if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
                            x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                            ix = (ix + 1);
                            if (i % 2 == 0) {
                                baris += '<tr style="cursor: pointer;">';
                                baris += '<td>' + ix + '</td>';
                                baris += '<td>' + data[i]["codeinret"] + '</td>';
                                baris += '<td>' + data[i]["codepo"] + '</td>';
                                baris += '<td>' + data[i]["dateinret"] + '</td>';
                                baris += '<td>' + data[i]["namesupp"] + '</td>';
                                baris += '<td>' + x1 + '</td>';
                                baris += '<td>' + data[i]["descinfo"] + '</td>';
                                baris += '<td>' + data[i]["nameuser"] + '</td>';
                                baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                                baris += '</tr>';

                                bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                            } else {
                                baris += '<tr style="background:#eeeeee; cursor: pointer;">';
                                baris += '<td>' + ix + '</td>';
                                baris += '<td>' + data[i]["codeinret"] + '</td>';
                                baris += '<td>' + data[i]["codepo"] + '</td>';
                                baris += '<td>' + data[i]["dateinret"] + '</td>';
                                baris += '<td>' + data[i]["namesupp"] + '</td>';
                                baris += '<td>' + x1 + '</td>';
                                baris += '<td>' + data[i]["descinfo"] + '</td>';
                                baris += '<td>' + data[i]["nameuser"] + '</td>';
                                baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                                baris += '</tr>';

                                bar += `
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codeinret"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepo"] + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["dateinret"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid"></td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["descinfo"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            `;
                            }
                        }


                    }


                }
            }

        }

        $('#xdetail').html(baris);
        $('#prt').html(bar)

    }

    function apply(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data);
        var baris = "";
        var ix = 0;
        var x1 = 0;
        if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 5) {
                    if (data[i]["nosuratjalan"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 6) {
                    if (data[i]["noinvoice"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 7) {
                    if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                }

            }
        } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if (data[i]["datein"] >= $('#date1').val() && data[i]["datein"] <= $('#date2').val()) {
                    x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                    ix = (ix + 1);
                    baris += '<tr style="cursor: pointer;">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codeinret"] + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["dateinret"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                    baris += '</tr>';
                }
            }
        } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
            for (var i = 0; i < data.length; i++) {
                if ($('#search').val() == 1) {
                    if (data[i]["codein"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 2) {
                    if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 3) {
                    if (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 4) {
                    if (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 5) {
                    if (data[i]["nosuratjalan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 6) {
                    if (data[i]["noinvoice"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
                    }
                } else if ($('#search').val() == 7) {
                    if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["datein"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
                        x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                        ix = (ix + 1);
                        baris += '<tr style="cursor: pointer;">';
                        baris += '<td>' + ix + '</td>';
                        baris += '<td>' + data[i]["codeinret"] + '</td>';
                        baris += '<td>' + data[i]["codepo"] + '</td>';
                        baris += '<td>' + data[i]["dateinret"] + '</td>';
                        baris += '<td>' + data[i]["namesupp"] + '</td>';
                        baris += '<td>' + x1 + '</td>';
                        baris += '<td>' + data[i]["descinfo"] + '</td>';
                        baris += '<td>' + data[i]["nameuser"] + '</td>';
                        baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                        baris += '</tr>';
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
        console.log(data);
        var baris = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["itemin"] == "1") {
                x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
                ix = (ix + 1);
                baris += '<tr style="cursor: pointer;">';
                baris += '<td>' + ix + '</td>';
                baris += '<td>' + data[i]["codeinret"] + '</td>';
                baris += '<td>' + data[i]["codepo"] + '</td>';
                baris += '<td>' + data[i]["dateinret"] + '</td>';
                baris += '<td>' + data[i]["namesupp"] + '</td>';
                baris += '<td>' + x1 + '</td>';
                baris += '<td>' + data[i]["descinfo"] + '</td>';
                baris += '<td>' + data[i]["nameuser"] + '</td>';
                baris += '<td><a style="text-decoration: none" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
                baris += '</tr>';
            }
            $('#xdetail').html(baris);
        }

    }


    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Reportoutgoing.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>