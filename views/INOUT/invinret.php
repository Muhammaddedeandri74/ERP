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
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Gudang Utama / Request </p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">REQUEST COUNTER</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/invin') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('InOut/invinret') ?>" class="btn bay fw btn-transparent">OUTGOING</a>
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
                    <form action="<?php echo base_url('InOut/invinret') ?>" method="post">
                        <div class="row pt-4">
                            <div class="col-6 pt-2 pl-3">
                                <div class="input-group">
                                    <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
                                        <option class="slc" value="codeinret">Trans No</option>
                                        <option class="slc" value="codepo">Order No</option>
                                        <option class="slc" value="namecomm">Supplier</option>
                                    </select>
                                    <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" name="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="card">
                                    <div class="card-body bays">
                                        <div class="rwo d-flex justify-content-between">
                                            <div class="col-3">
                                                <p>Dari</p>
                                                <input placeholder="Pilih Tanggal" value="<?= set_value('date1') ?>" name="date1" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                            </div>
                                            <div class="col-3">
                                                <p>Hingga</p>
                                                <input placeholder="Pilih Tanggal" value="<?= set_value('date2') ?>" name="date2" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                            </div>
                                            <div class="col-3">
                                                <p><br></p>
                                                <a style="text-decoration: none;" class=" btn btn-outline-danger" href="<?php echo base_url('InOut/invinret') ?>">Reset</a>
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
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
                            <!-- <div class="col-3">
                        </div>
                        <div class="col-2">
                            <a href="<?php echo base_url('InOut/newinvinret') ?>" class="btn btn-outline-primary" style="float :right"><b></b></a>
                        </div> -->
                            <div class="col-4">
                            </div>
                            <div class="col-2" style="margin-top: 13vh">
                                <a href="<?php echo base_url('InOut/newinvinret') ?>" class="btn btn-outline-primary"><b>Inventory Out</b></a>
                                <a class="btn btn-outline-success" style="float: right;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table cn table-striped table-hover">
                        <thead style="background-color: orange;color: white">
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
                        <tbody>
                            <?php if ($data != "Not Found") : $a = 1;
                                $getdata = array(); ?>
                                <?php foreach ($data as $key) : ?>
                                    <th style="text-align:center;" scope="row"><?php echo $a++ ?></th>
                                    <td style="text-align:center;"><?php echo $key["codeinret"] ?></td>
                                    <td style="text-align:center;"><?php echo $key["codepo"] ?></td>
                                    <td style="text-align:center;"><?php echo $key["dateinret"] ?></td>
                                    <td style="text-align:center;"><?php echo $key["namesupp"] ?></td>
                                    <td style="text-align:center;"><?php echo $key["iteminret"] ?></td>
                                    <td style="text-align:center;"><?php echo $key["descinfo"]  ?></td>
                                    <td style="text-align:center;"><?php echo $key["nameuser"]  ?></td>
                                    <td style="text-align:center;"><a style="text-decoration:none" href="<?php echo base_url('InOut/changeinvinret?idtrans=' . base64_encode($key["idinret"])) ?>" class="btn btn-warning"></i> Edit</a></td>
                                    </td>
                                    </tr>
                                <?php array_push($getdata, $key);
                                endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                    <div class="excel" id="excel">
                    </div>
                    <div class="data" id="data">
                        <table class="table cn">
                            <thead style="background-color: orange;color: white">
                                <th style="border-style:solid;background-color: orange;color: white">NO </th>
                                <th style="border-style:solid;background-color: orange;color: white">Trans NO</th>
                                <th style="border-style:solid;background-color: orange;color: white">Order NO</th>
                                <th style="border-style:solid;background-color: orange;color: white">Trans Date</th>
                                <th style="border-style:solid;background-color: orange;color: white">Supplier</th>
                                <th style="border-style:solid;background-color: orange;color: white">Item Count</th>
                                <th style="border-style:solid;background-color: orange;color: white">Deskripsi</th>
                                <th style="border-style:solid;background-color: orange;color: white">Issue By</th>
                                <th style="border-style:solid;background-color: purple;color: white">SKU</th>
                                <th style="border-style:solid;background-color: purple;color: white">Name Item</th>
                                <th style="border-style:solid;background-color: purple;color: white">Expired</th>
                                <th style="border-style:solid;background-color: purple;color: white">SN Awal</th>
                                <th style="border-style:solid;background-color: purple;color: white">SN Akhir</th>
                                <th style="border-style:solid;background-color: purple;color: white">QTY</th>
                            </thead>
                            <tbody>
                                <?php if ($data != "Not Found") : $a = 1 ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td style="border: solid;"><?php echo $a++; ?></td>
                                            <td style="border: solid;"><?php echo $key["codeinret"] ?></td>
                                            <td style="border: solid;"><?php echo $key["codepo"] ?></td>
                                            <td style="border: solid;"><?php echo $key["dateinret"] ?></td>
                                            <td style="border: solid;"><?php echo $key["namesupp"] ?></td>
                                            <td style="border: solid;"><?php echo $key["iteminret"] ?></td>
                                            <td style="border: solid;"><?php echo $key["descinfo"] ?></td>
                                            <td style="border: solid;"><?php echo $key["nameuser"] ?></td>
                                            <td colspan="6">
                                                <table class="table">
                                                    <tbody>
                                                        <?php foreach ($key["data"] as $keyx) : ?>
                                                            <tr>
                                                                <td style="border: solid;"><?php echo $keyx["sku"] ?></td>
                                                                <td style="border: solid;"><?php echo $keyx["nameitem"] ?></td>
                                                                <td style="border: solid;"><?php echo $keyx["expdate"] ?></td>
                                                                <td style="border: solid;"><?php echo $keyx["idsn"] ?></td>
                                                                <td style="border: solid;"><?php echo $keyx["idsn2"] ?></td>
                                                                <td style="border: solid;"><?php echo $keyx["qty"] ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
    $('#data').hide();

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Invinret.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    // function searchx(x) {
    //     var data = <?php echo json_encode($data) ?>;
    //     var baris = "";
    //     var ix = 0;
    //     var x1 = 0;
    //     for (var i = 0; i < data.length; i++) {
    //         if (data[i]["typeinret"] == "1") {
    //             if (data[i]["codepo"] != null && data[i]["namesupp"] != null) {
    //                 if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<tr>';
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                     baris += '</tr>';

    //                 }


    //             } else if (data[i]["codepo"] == null && data[i]["namesupp"] == null) {
    //                 if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<tr>';
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                     baris += '</tr>';

    //                 }


    //             } else if (data[i]["codepo"] != null && data[i]["namesupp"] == null) {
    //                 if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<tr>';
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                     baris += '</tr>';

    //                 }


    //             } else if (data[i]["codepo"] == null && data[i]["namesupp"] != null) {
    //                 {
    //                     if ((data[i]["codeinret"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
    //                         x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                         ix = (ix + 1);
    //                         baris += '<tr>';
    //                         baris += '<td>' + ix + '</td>';
    //                         baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                         baris += '<td>' + data[i]["codepo"] + '</td>';
    //                         baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                         baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                         baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                         baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                         baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                         baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                         baris += '</tr>';

    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     $('#xdetail').html(baris);

    // }

    // function apply() {
    //     var data = <?php echo json_encode($data) ?>;
    //     console.log(data);
    //     var baris = "";
    //     var bar = "";
    //     var ix = 0;
    //     var x1 = 0;
    //     if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
    //         for (var i = 0; i < data.length; i++) {
    //             if (data[i]["typeinret"] == "1") {
    //                 if ((data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) || (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) || (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) || (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4)) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<tr>';
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                     baris += '</tr>';
    //                 }
    //             }

    //         }
    //     } else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
    //         for (var i = 0; i < data.length; i++) {
    //             if (data[i]["typeinret"] == "1") {
    //                 if (data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<tr>';
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                     baris += '</tr>';
    //                 }
    //             }
    //         }
    //     } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
    //         for (var i = 0; i < data.length; i++) {
    //             if (data[i]["typeinret"] == "1") {
    //                 if ((data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 || data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 || data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 || data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val())) {
    //                     x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                     ix = (ix + 1);
    //                     baris += '<td>' + ix + '</td>';
    //                     baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                     baris += '<td>' + data[i]["codepo"] + '</td>';
    //                     baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                     baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                     baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                     baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                     baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                     baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '"><i class="fa fa-pencil"> EDIT</i></a></td>';
    //                     baris += '</tr>';

    //                 }
    //             }
    //         }
    //     } else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
    //         for (var i = 0; i < data.length; i++) {
    //             if ((data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) ||
    //                 (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) ||
    //                 (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val()) ||
    //                 (data[i]["codeinret"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["dateinret"] >= $('#date1').val() && data[i]["dateinret"] <= $('#date2').val())) {
    //                 x1 = formatnum(parseFloat(data[i]["iteminret"]).toFixed(0));
    //                 ix = (ix + 1);
    //                 baris += '<tr>';
    //                 baris += '<td>' + ix + '</td>';
    //                 baris += '<td>' + data[i]["codeinret"] + '</td>';
    //                 baris += '<td>' + data[i]["codepo"] + '</td>';
    //                 baris += '<td>' + data[i]["dateinret"] + '</td>';
    //                 baris += '<td>' + data[i]["namesupp"] + '</td>';
    //                 baris += '<td>' + data[i]["iteminret"] + '</td>';
    //                 baris += '<td>' + data[i]["descinfo"] + '</td>';
    //                 baris += '<td>' + data[i]["nameuser"] + '</td>';
    //                 baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //                 baris += '</tr>';

    //             }
    //         }
    //     } else {
    //         alert("Masukan Filter Dengan Benar")
    //         return
    //     }
    //     $('#xdetail').html(baris);

    // }

    // function reset() {
    //     var data = <?php echo json_encode($data) ?>;
    //     console.log(data);
    //     var baris = "";
    //     var ix = 0;
    //     for (var i = 0; i < data.length; i++) {
    //         if (data[i]["typeinret"] == "1") {
    //             ix = (ix + 1);
    //             baris += '<tr>';
    //             baris += '<td>' + ix + '</td>';
    //             baris += '<td>' + data[i]["codeinret"] + '</td>';
    //             baris += '<td>' + data[i]["codepo"] + '</td>';
    //             baris += '<td>' + data[i]["dateinret"] + '</td>';
    //             baris += '<td>' + data[i]["namesupp"] + '</td>';
    //             baris += '<td>' + data[i]["iteminret"] + '</td>';
    //             baris += '<td>' + data[i]["descinfo"] + '</td>';
    //             baris += '<td>' + data[i]["nameuser"] + '</td>';
    //             baris += '<td style="cursor: pointer"><a style="text-decoration: none; color: black" href="<?php echo base_url('InOut/changeinvinret?idtrans=') ?>' + btoa(data[i]["idinret"]) + '&from=warehouse">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a></td>';
    //             baris += '</tr>';


    //         }
    //         $('#xdetail').html(baris);
    //     }

    // }
    // $(document).ready(function() {
    //     var today = new Date();
    //     var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
    //     if ($("#date2").val() == '') {
    //         $("#date2").val(date);
    //     }
    //     date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-01';
    //     if ($("#date1").val() == '') {
    //         $("#date1").val(date);
    //     }
    // });

    searchx('');
    $('form button').on("click", function(e) {
        e.preventDefault();
    });
</script> -->