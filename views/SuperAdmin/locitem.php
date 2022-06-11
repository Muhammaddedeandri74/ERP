<div class="container-xxl ml-5" style="width: 96%;">
    <div class=" row">
        <div class="col py-3" style="border-radius: 5px;">
            <h1 style="margin-top: 30px; margin-left: 20px;  text-transform: uppercase;">Items</h1>
            <!-- <?php
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
                        }
                    }
                    ?> -->
            <div class="row">
                <div class="col-9">
                    <div style="background: #fed88d ; margin-left:20px;margin-right:10px ;margin-top: 20px ; padding: 10px;border-radius: 4px">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px">
                                <div class="row">
                                    <p style="color:purple"><b style="font-size: 25px">Halo, <?php echo $fullname ?> !</b></p>
                                    <p>Anda bisa mengatur (Tambah, Edit, Aktif, non-Aktif) Lokasi Item untuk sistem ERP disini.</p>
                                </div>
                                <!-- <div class="row" style="margin-top: 20px">
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
                                </div> -->
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
                        <div class="col-5 mt-4">
                            <input type="text" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Lokasi" oninput="searcha(this.value)" style="font-family:Arial, FontAwesome">
                        </div>
                        <div class="col-4 mt-4">
                            <!-- <a style="margin-left: 1.6vw;margin-right:0.5vw" class="btn btn-outline-success" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-upload" aria-hidden="true"></i></i> Upload</a> -->
                            <!-- <a style="margin-right: 0.5vw;" class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a> -->
                            <a href="<?php echo base_url('SuperAdminControler/addlocitem') ?>" class="btn" style="border:1px solid purple;color:purple;float: right">+ Tambah Lokasi Item</a>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="col pt-3" style="margin-right: 40px">
                    </div>
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
                <div class="col-9 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ; margin-bottom: 10px;border-radius: 5px; ">
                    <table class="table m-0">
                        <thead class="border-0">
                            <tr>
                                <th style="text-align:center;color: purple">Kode Lokasi</th>
                                <th style="text-align:center;color: purple">Nama Lokasi</th>
                                <th style="text-align:center;color: purple">Alias Lokasi 1</th>
                                <th style="text-align:center;color: purple">Alias Lokasi 2</th>
                                <th style="text-align:center;color: purple">Alias Lokasi 3</th>
                                <th style="text-align:center;color: purple">Alias Lokasi 4</th>
                                <th style="text-align:center;color: purple">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="height: 44vh; overflow-y: scroll">
                        <table class="table table-striped table-hover">
                            <tbody id="xd">
                                <?php if ($data != "Not Found") { ?>
                                    <?php $a = 1;
                                    foreach ($data as $key) : ?>
                                        <tr>
                                            <td style="color: purple;text-align:left;"><?php echo $key["codecomm"] ?></td>
                                            <td style="color: purple;text-align:left;"><?php echo $key["namecomm"] ?></td>
                                            <td style="color: purple;text-align:center;"><?php echo $key["attrib1"] ?></td>
                                            <td style="color: purple;text-align:center;"><?php echo $key["attrib2"] ?></td>
                                            <td style="color: purple;text-align:center;"><?php echo $key["attrib3"] ?></td>
                                            <td style="color: purple;text-align:center;"><?php echo $key["attrib4"] ?></td>
                                            <td style="color: purple;text-align: right;"><a href="<?php echo base_url('MasterDataControler/getdatalocitembyid?id=' . base64_encode($key['idcomm'])) ?>" class="btn btn-secondary">Edit</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                <a class="btn btn-outline-primary" style="margin-left: 1.7vw;" href="<?php echo base_url('assets/excel/Form Data excel.xlsx') ?>"> <i class="fa fa-print"></i> Download Form Excel</a>
                <!-- Preview-->
                <div id='preview'></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#data').hide();

    function searcha(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 1;
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["codecomm"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase()))) {
                baris += '<tr>';
                baris += '<td style="color: purple;">' + data[i]["codecomm"] + '</td>';
                baris += '<td style="color: purple;">' + data[i]["namecomm"] + '</td>';
                baris += '<td style="color: purple">' + data[i]["attrib1"] + '</td>';
                baris += '<td style="color: purple">' + data[i]["attrib2"] + '</td>';
                baris += '<td style="color: purple">' + data[i]["attrib3"] + '</td>';
                baris += '<td style="color: purple;">' + data[i]["attrib4"] + '</td>';
                baris += '<td style="width:1%;"><a href="<?php echo base_url('MasterDataControler/getdatalocitembyid?id=') ?>' + btoa(data[i]["idcomm"]) + '"><i class="fas fa-pencil-alt"></i> EDIT</a></td>';
                baris += '</tr>';

            }

        }

        $('#xd').html(baris);
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
</script>