<style>
    body {
        font-family: 'Raleway', sans-serif;
    }


    /* .hidden {
		display: none;
	} */

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
</style>
<div class="container-xxl ml-5" style="width: 96%;">
    <div class=" row">
        <div class="col py-3" style="border-radius: 5px;">
            <h1 style="margin-top: 30px; margin-left: 20px;  text-transform: uppercase;">Supplier</h1>

            <?php
            // $namerole = array();
            $role = array();
            $active = 0;
            $noactive = 0;
            if ($data != "Not Found") {
                foreach ($data as $key) {

                    if ($key["isactive"] == 0) {
                        $noactive = $noactive + 1;
                    } else {
                        $active = $active + 1;
                    }
                }
            }
            ?>

            <div class="row">
                <div class="col-9">
                    <div style="background: #6bd2ff;margin-left:20px;margin-right:10px ;margin-top: 20px; padding: 10px;border-radius: 4px">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px">
                                <div class="row">
                                    <p><b style="font-size: 25px">Halo, <?php echo $fullname ?> !</b></p>
                                    <p>Anda bisa mengatur (Tambah, Hapus, Aktif, non-Aktif) Supplier untuk sistem ERP disini.</p>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Supplier Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $active ?> Supplier</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Supplier Non-Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $noactive ?> Supplier</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Total Supplier</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $active + $noactive ?> Supplier</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url('assets/img/sup_ilu.png') ?>" style="float: right; margin-top: 20px;margin-right: 50px;width:16.5vw">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:10px;margin-top: 20px">
                <div class="col-9">
                    <div class="row">
                        <div class="col-3 mt-4">
                            <p class="col-8" style="border-bottom: 5px solid purple; font-size: 22px">List Supplier</p>
                        </div>
                        <div class="col-5 mt-4">
                            <?php echo form_open('SuperAdminControler/searchsupplier'); ?>
                            <div class="input-group">
                                <input type="text" name="key" value="<?= set_value('key') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Kode Supplier dan lainnya" size="50" style="font-family:Arial, FontAwesome" autocomplete="off" autofocus required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col pt-3">
                            <a href="<?php echo base_url('SuperAdminControler/addsupplier') ?>" class="btn mt-2" style="float :right;border:1px solid purple;color:purple;">+ Tambah Supplier</a>
                            <a href="<?php echo base_url('SuperAdminControler/supplier') ?>" class="btn mt-2" style="border:1px solid purple;color:purple"><i class="fa fa-refresh" aria-hidden="true"></i>Refresh</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
                <div class="col-9 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 10px;border-radius: 5px">
                    <table style="width: 100% ; margin-top: 20px" class="table">
                        <thead>
                            <tr>
                                <th style="color: purple">NO </th>
                                <th style="color: purple">Code Supplier</th>
                                <th style="color: purple">Name Supplier</th>
                                <th style="color: purple">Address Supplier</th>
                                <th style="color: purple">Phone Supplier</th>
                                <th style="color: purple">Status</th>
                                <th style="color: purple">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="height: 44vh; overflow-y: scroll">
                        <table class="table table-striped table-hover" id="xd">
                            <tbody>
                                <?php if ($data != "Not Found") { ?>
                                    <?php $a = 1;
                                    foreach ($data as $key) : ?>
                                        <tr>
                                            <td style="color: purple"><?php echo $a++ ?></td>
                                            <td style="color: purple"><?php echo $key["codecomm"] ?></td>
                                            <td style="color: purple"><?php echo $key["namecomm"] ?></td>
                                            <td style="color: purple"><?php echo $key["attrib1"] ?></td>
                                            <td style="color: purple"><?php echo $key["attrib2"] ?></td>
                                            <?php if ($key['isactive'] == "1") { ?>
                                                <td style="color: purple">Active</td>
                                            <?php } else { ?>
                                                <td style="color: purple">No-Active</td>
                                            <?php } ?>
                                            <td><a href="<?php echo base_url('MasterDataControler/getdatasupplierbyid?id=' . base64_encode($key['codecomm'])) ?>" class="btn btn-secondary">Edit</a>
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
            </div>
        </div>
    </div>