<style>
    body {
        font-family: 'Raleway', sans-serif;
    }

    #gp_head {
        text-align: center;
        background-color: #61CAFA;
        height: 66px;
        margin: 0 0 -29px 0;
        padding-top: 35px;
        border-radius: 8px 8px 0 0;
        color: rgb(255, 255, 255);
    }

    #gp_tabel {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        width: 80%;
        border-collapse: collapse;
    }

    #gp_tabel td,
    #gp_tabel th {
        font-size: 1em;
        border: 1px solid #61CAFA;
        padding: 3px 7px 2px 7px;
    }

    #gp_tabel th {
        font-size: 1.1em;
        text-align: center;
        padding-top: 5px;
        padding-bottom: 4px;
        background-color: #61CAFA;
        color: #ffffff;
    }

    #gp_tabel tr.alt td {
        color: #000000;
        background-color: #61CAFA;
    }

    #gp_tabel a {
        border: solid 1px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
    }

    #gp_tabel a:hover,
    #gp_tabel a.current {
        color: #FFFFFF;
        box-shadow: 0px 1px #EDEDED;
        -moz-box-shadow: 0px 1px #EDEDED;
        -webkit-box-shadow: 0px 1px #EDEDED;
    }

    #gp_tabel a:hover,
    #gp_tabel a.current {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }

    #gp_tabel a {
        color: #58B0E7;
        display: block;
        text-decoration: none;
        padding: 7px 10px 7px 10px;
    }

    #pagination {
        margin: 40 40 0;
    }

    ul.gp_pagination li a {
        border: solid 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
    }

    ul.gp_pagination li {
        padding-bottom: 1px;
    }

    ul.gp_pagination li a:hover,
    ul.gp_pagination li a.current {
        color: #FFFFFF;
        box-shadow: 0px 1px #EDEDED;
        -moz-box-shadow: 0px 1px #EDEDED;
        -webkit-box-shadow: 0px 1px #EDEDED;
    }

    ul.gp_pagination {
        margin: 4px 0;
        padding: 0px;
        height: 100%;
        overflow: hidden;
        font: 12px 'Tahoma';
        list-style-type: none;
    }

    ul.gp_pagination li {
        float: left;
        margin: 0px;
        padding: 0px;
        margin-left: 5px;
    }

    ul.gp_pagination li a {
        color: black;
        display: block;
        text-decoration: none;
        padding: 7px 10px 7px 10px;
    }

    ul.gp_pagination li a img {
        border: none;
    }

    ul.gp_pagination li a {
        color: #0A7EC5;
        border-color: #8DC5E6;
        background: #F8FCFF;
    }

    ul.gp_pagination li a:hover,
    ul.gp_pagination li a.current {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    input[type=submit] {
        border: solid 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
        color: black;

        color: #0A7EC5;
        border-color: #8DC5E6;
        background: #F8FCFF;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }

    input[type=text] {
        width: 250px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        padding: 6px 9px 6px 9px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        ;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    .gp_btn ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .gp_btn li {
        display: inline-block;
    }

    .btn2 {
        border: solid 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
        color: black;
        display: block;

        color: #0A7EC5;
        border-color: #8DC5E6;
        background: #F8FCFF;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
    }

    .btn2:hover {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }
</style>
<div class="container-xxl ml-5" style="width: 96%;">
    <div class=" row">
        <div class="col py-3" style="border-radius: 5px;">
            <h1 style="margin-top: 30px; margin-left: 20px;  text-transform: uppercase;">Items</h1>

            <?php
            // $namerole = array();
            $role = array();
            $active = 0;
            $noactive = 0;
            if ($data != "Not Found") {
                foreach ($data as $key) {

                    if ($key["status"] == 0) {
                        $noactive = $noactive + 1;
                    } else {
                        $active = $active + 1;
                    }

                    // if(!in_array($key["namerole"], $namerole, true)){
                    //        array_push($namerole, $key["namerole"]);
                    //    }
                }
            }
            ?>

            <div class="row">
                <div class="col-9">
                    <div style="background: #fed88d ; margin-left:20px;margin-right:10px ;margin-top: 20px ; padding: 10px;border-radius: 4px">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px">
                                <div class="row">
                                    <p style="color:purple"><b style="font-size: 25px">Halo, <?php echo $fullname ?> !</b></p>
                                    <p>Anda bisa mengatur (Tambah, Hapus, Aktif, non-Aktif) Item untuk sistem ERP disini.</p>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col">
                                        <div class="row">
                                            <p style="color:purple"><b>Item Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $active ?> item</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p style="color:purple"><b>Item Non-Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $noactive ?> item</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p style="color:purple"><b>Total Item</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $active + $noactive ?> item</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url('assets/img/ilupar.png') ?>" style="float: right; margin-top: 67px;margin-right: 50px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:10px;margin-top: 20px">
                <div class="col-9">
                    <div class="row">
                        <div class="col-3 mt-4">
                            <p class="col-8" style="border-bottom: 5px solid purple; font-size: 22px">List Item</p>
                        </div>
                        <div class="col-5 mt-4 input-group">
                            <?php echo form_open('SuperAdminControler/search'); ?>
                            <div class="input-group mb-3">
                                <input type="text" name="key" value="<?= set_value('key') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan ID Item & Nama Item" size="50" style="font-family:Arial, FontAwesome" autocomplete="off" autofocus required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- <div class="col-5 mt-4">
							<input type="text" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Nama Item Dan SKU" oninput="searcha(this.value)" style="font-family:Arial, FontAwesome">
						</div> -->
                        <div class="col-4 mt-4">
                            <!-- <a style="margin-left: 1.6vw;margin-right:0.5vw" class="btn btn-outline-success" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-upload" aria-hidden="true"></i></i> Upload</a> -->
                            <a href="<?php echo base_url('SuperAdminControler/item') ?>" class="btn" style="border:1px solid purple;color:purple"><i class="fa fa-refresh" aria-hidden="true"></i>Refresh</a>
                            <a style="margin-right: 0.5vw;" class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            <a href="<?php echo base_url('SuperAdminControler/additem') ?>" class="btn" style="border:1px solid purple;color:purple">+ Tambah Item</a>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="col pt-3" style="margin-right: 40px">
                        <a href="<?php echo base_url('SuperAdminControler/additemtype') ?>" class="btn mt-2" style="float :right;border:1px solid purple;color:purple;margin-right:5vw">+ Tambah Item Type</a>
                    </div>
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
                <div class="col-9 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ; margin-bottom: 10px;border-radius: 5px; ">
                    <table class="table m-0">
                        <thead class="border-0">
                            <tr>
                                <th style="width: 7%;color: purple">ID ITEM</th>
                                <th style="width: 25%;color: purple">NAME ITEM</th>
                                <th style="width: 5%;color: purple">VAT</th>
                                <th style="width: 5%;color: purple">PPH</th>
                                <th style="width: 13%;color: purple">PRICE ITEM</th>
                                <th style="width: 10%;color: purple">SKU</th>
                                <th style="width: 10%;color: purple">Min Stock</th>
                                <th style="width: 10%;color: purple">Max Stock</th>
                                <th style="width: 5%;color: purple">Item Type</th>
                                <th style="width: 5%;color: purple">Status</th>
                                <th style="width: 5%;color: purple">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="height: 44vh; overflow-y: scroll">
                        <table class="table table-striped table-hover" id="xd">
                            <tbody>

                                <?php if ($data != "Not Found") {
                                    if ($this->uri->segment(4)) {
                                        $no = $this->uri->segment(4);
                                    } else {
                                        $no = 0;
                                    }
                                ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td style="width: 7%;color: purple"><?php echo $key["iditem"] ?></td>
                                            <td style="width: 25%;color: purple"><?php echo $key["nameitem"] ?></td>
                                            <?php if ($key["VAT"] != 0 || $key["VAT"] == 0.005) : ?>
                                                <td style="width: 5%;color: purple">Y</td>
                                            <?php else : ?>
                                                <td style="width: 5%;color: purple">N</td>
                                            <?php endif ?>
                                            <?php if ($key["pph22"] != 0 || $key["pph22"] == 0.005) : ?>
                                                <td style="width: 5%;color: purple">Y</td>
                                            <?php else : ?>
                                                <td style="width: 5%;color: purple">N</td>
                                            <?php endif ?>
                                            <td style="width: 13%;color: purple"><?php echo number_format($key["priceitem"], 0, "", ",") ?></td>
                                            <td style="width: 10%;color: purple"><?php echo $key["sku"] ?></td>
                                            <td style="width: 10%;color: purple"><?php echo $key["minstock"] ?></td>
                                            <td style="width: 10%;color: purple"><?php echo $key["maxstock"] ?></td>
                                            <td style="width: 5%;color: purple"><?php echo $key["namecomm"] ?></td>
                                            <?php if ($key['status'] == "1") { ?>
                                                <td style="width: 5%;color: purple">Active</td>
                                            <?php } else { ?>
                                                <td style="width: 5%;color: purple">No-Active</td>
                                            <?php } ?>
                                            <td style="width: 5%;color: purple"><a href="<?php echo base_url('MasterDataControler/getdataitembyid?id=' . base64_encode($key['iditem'])) ?>" class="btn btn-secondary">Edit</a>
                                        </tr>
                                    <?php endforeach ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination">
                        <ul class="gp_pagination">
                            <?php foreach ($links as $link) {
                                echo "<li>" . $link . "</li>";
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-2 bays ml-5" style="background: white ; margin-bottom: 10px;border-radius:5px">
                    <table style="width: 100% ; margin-top: 20px" class="table ">
                        <thead>
                            <tr>
                                <th style="color: purple">Item Type</th>
                                <th style="color: purple">Status</th>
                                <th style="color: purple">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data1 != "Not Found") : ?>
                                <?php foreach ($data1 as $key) : ?>
                                    <tr>
                                        <td><?php echo $key["namecomm"] ?></td>
                                        <?php if ($key['isactive'] == "1") { ?>
                                            <td style="color: purple">Active</td>
                                        <?php } else { ?>
                                            <td style="color: purple">No-Active</td>
                                        <?php } ?>
                                        <td><a href="<?php echo base_url('MasterDataControler/getdataitemtypebyid?id=' . base64_encode($key['codecomm'])) ?>"><i class="fa fa-pencil">Edit</i></a></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>

<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File upload form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label for="exampleFormControlInput1" style="padding-left: 2.1rem;" class="form-label">Form Select file :</label>
                <form method='post' action='' style="margin-left: 1vw;margin-bottom: 1vh" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type='file' name='import' id='import' class='form-control border-0' accept=".xls,.xlsx">
                        <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                    </div>
                </form>
                <a class="btn btn-outline-primary" style="margin-left: 1.7vw;" href="<?php echo base_url('assets/excel/items.xlsx') ?>"> <i class="fa fa-print"></i> Download Form Excel</a>
                <!-- Preview-->
                <div id='preview'></div>
            </div>
        </div>
    </div>
</div>

<div class="excel" id="excel">
</div>
<div class="data" id="data">
    <table class="table table-striped table-hover">
        <thead style="background: purple">
            <tr>
                <th style="border:solid;background-color:purple">ID ITEM</th>
                <th style="border:solid;background-color:purple">NAME ITEM</th>
                <th style="border:solid;background-color:purple">UseSN</th>
                <th style="border:solid;background-color:purple">VAT</th>
                <th style="border:solid;background-color:purple">PPH</th>
                <th style="border:solid;background-color:purple">PRICE ITEM</th>
                <th style="border:solid;background-color:purple">SKU</th>
                <th style="border:solid;background-color:purple">Min Stock</th>
                <th style="border:solid;background-color:purple">Max Stock</th>
                <th style="border:solid;background-color:purple">Item Type</th>
                <th style="border:solid;background-color:purple">Status</th>
            </tr>
        </thead>
        <tbody id="prt">
            <?php if ($data != "Not Found") { ?>
                <?php foreach ($data as $key) : ?>
                    <tr>
                        <td style="border: 1px solid"><?php echo $key["iditem"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["nameitem"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["usesn"] ?></td>
                        <?php if ($key["VAT"] != 0 || $key["VAT"] == 0.005) : ?>
                            <td style="border: 1px solid">Y</td>
                        <?php else : ?>
                            <td style="border: 1px solid">N</td>
                        <?php endif ?>
                        <?php if ($key["pph22"] != 0 || $key["pph22"] == 0.005) : ?>
                            <td style="border: 1px solid">Y</td>
                        <?php else : ?>
                            <td style="border: 1px solid">N</td>
                        <?php endif ?>
                        <td style="border: 1px solid"><?php echo number_format($key["priceitem"], 0, "", ",") ?></td>
                        <td style="border: 1px solid"><?php echo $key["sku"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["minstock"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["maxstock"] ?></td>
                        <td style="border: 1px solid"><?php echo $key["namecomm"] ?></td>
                        <?php if ($key['status'] == "1") { ?>
                            <td style="border: 1px solid">Active</td>
                        <?php } else { ?>
                            <td style="border: 1px solid">No-Active</td>
                        <?php } ?>

                    </tr>
                <?php endforeach ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<form action="<?php echo base_url('Employe/uplo') ?>" method="POST" id="forms">
    <input type="hidden" name="long" id="long">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#data').hide();

    function searcha(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var bar = "";
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["nameitem"].toLowerCase().includes(x.toLowerCase())) || (data[i]["sku"].toLowerCase().includes(x.toLowerCase()))) {
                baris += '<tr>';
                baris += '<td style="width: 7%;color: purple">' + data[i]["iditem"] + '</td>';
                baris += '<td style="width: 10%;color: purple">' + data[i]["nameitem"] + '</td>';
                baris += '<td style="width: 13%;color: purple">' + data[i]["pricebuyitem"] + '</td>';
                baris += '<td style="width: 11%;color: purple">' + data[i]["priceitem"] + '</td>';
                baris += '<td style="width: 5%;color: purple">' + data[i]["VAT"] + '</td>';
                baris += '<td style="width: 10%;color: purple">' + data[i]["subprice"] + '</td>';
                baris += '<td style="width: 10%;color: purple">' + data[i]["sku"] + '</td>';
                baris += '<td style="width: 10%;color: purple">' + data[i]["minstock"] + '</td>';
                baris += '<td style="width: 10%;color: purple">' + data[i]["maxstock"] + '</td>';
                baris += '<td style="width: 5%;color: purple">' + data[i]["namecomm"] + '</td>';
                if (data[i]['status'] == "1") {
                    baris += `<td style="color: purple">Active</td>`;
                } else {
                    baris += `<td style="color: purple">No-Active</td>`;
                }
                baris += '<td><a href="<?php echo base_url('MasterDataControler/getdataitembyid?id=') ?>' + btoa(data[i]["iditem"]) + '"><i class="fa fa-pencil"></i> Edit</a></td>';
                baris += '</tr>';
                bar += '<tr>';
                bar += '<td style="width: 7%;color: purple; border: 1px solid">' + data[i]["iditem"] + '</td>';
                bar += '<td style="width: 10%;color: purple; border: 1px solid">' + data[i]["nameitem"] + '</td>';
                bar += '<td style="width: 13%;color: purple; border: 1px solid">' + data[i]["pricebuyitem"] + '</td>';
                bar += '<td style="width: 11%;color: purple; border: 1px solid">' + data[i]["priceitem"] + '</td>';
                bar += '<td style="width: 5%;color: purple; border: 1px solid">' + data[i]["VAT"] + '</td>';
                bar += '<td style="width: 10%;color: purple; border: 1px solid">' + data[i]["subprice"] + '</td>';
                bar += '<td style="width: 10%;color: purple; border: 1px solid">' + data[i]["sku"] + '</td>';
                bar += '<td style="width: 10%;color: purple; border: 1px solid">' + data[i]["minstock"] + '</td>';
                bar += '<td style="width: 10%;color: purple; border: 1px solid">' + data[i]["maxstock"] + '</td>';
                bar += '<td style="width: 5%;color: purple; border: 1px solid">' + data[i]["namecomm"] + '</td>';
                if (data[i]['status'] == "1") {
                    bar += `<td style="color: purple; border: 1px solid">Active</td>`;
                } else {
                    bar += `<td style="color: purple; border: 1px solid">No-Active</td>`;
                }
                bar += '</tr>';
            }

        }

        $('#xd').html(baris);
        $('#prt').html(bar);
    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "MasterItem.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    $("#import").on("change", function(e) {
        var file = e.target.files[0];
        // input canceled, return
        if (!file) return;

        var FR = new FileReader();
        FR.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, {
                type: 'array'
            });
            var firstSheet = workbook.Sheets[workbook.SheetNames[0]];

            // header: 1 instructs xlsx to create an 'array of arrays'
            var result = XLSX.utils.sheet_to_json(firstSheet, {
                header: 2,
                blankRows: false
            });

            // data preview
            var output = document.getElementById('result');

            $('#long').val(window.btoa(unescape(encodeURIComponent(JSON.stringify(result, null, 2)))))
            $('#forms').submit()

            output.innerHTML = JSON.stringify(result, null, 2);
        };
        FR.readAsArrayBuffer(file);
    });
</script>