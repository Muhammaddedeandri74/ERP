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
            <h1 style="margin-top: 30px; margin-left: 20px;text-transform: uppercase;">Users</h1>

            <?php
            $namerole = array();
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

                    if (!in_array($key["namerole"], $namerole, true)) {
                        array_push($namerole, $key["namerole"]);
                    }
                }
            }

            ?>

            <div class="row">
                <div class="col-9">
                    <div style="background: #f4cff0; margin-left:20px;margin-right:10px ;margin-top: 20px; padding: 10px;border-radius: 5px">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px;">
                                <div class="row">
                                    <p><b style="font-size: 25px">Halo, <?php echo $fullname ?> !</b></p>
                                    <p>Anda bisa mengatur (Tambah, Hapus, Aktif, non-Aktif) pengguna untuk sistem ERP disini.</p>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Pengguna Aktif</b></p>
                                        </div>
                                        <div class="row">

                                            <p><?php echo $active ?> Pengguna</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Pengguna Non-Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $noactive ?> Pengguna</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Total Pengguna</b></p>
                                        </div>
                                        <div class="row">
                                            <p><?php echo $active + $noactive ?> Pengguna</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url('assets/img/logouser.png') ?>" style="float: right; margin-top: 20px;margin-right: 50px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:10px;margin-top: 20px">
                <!-- <div class="col-9">
					<div class="row">
						<div class="col">
							<p class="col-4 pt-3" style="border-bottom: 5px solid purple; font-size: 22px">List Pengguna</p>
						</div>
						<div class="col pt-1">
							<a href="<?php echo base_url('SuperAdminControler/adduser') ?>" class="btn mt-4 fontAwesome" style="float :right;border:1px solid purple;color:purple"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</a>
							<a href="<?php echo base_url('SuperAdminControler/userhistory') ?>" class="btn mt-4 mr-2 fontAwesome" style="float :right;border:1px solid purple;color:purple"><i class="fa fa-history" aria-hidden="true"></i> User History</a>
						</div>
					</div>
				</div> -->
                <div class="col-9">
                    <div class="row">
                        <div class="col-3 mt-4">
                            <p class="col-8" style="border-bottom: 5px solid purple; font-size: 22px">List Item</p>
                        </div>
                        <div class="col-5 mt-5">
                            <?php echo form_open('SuperAdminControler/searchuser'); ?>
                            <div class="input-group mb-3">
                                <input type="text" name="key" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Username dan lainya" size="50" style="font-family:Arial, FontAwesome" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" style="color:purple" type="submit" name="search">Serach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- <div class="col-5 mt-4">
							<input type="text" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Nama Item Dan SKU" style="font-family:Arial, FontAwesome">
						</div> -->
                        <div class="col-4 mt-4">
                            <!-- <a href="<?php echo base_url('SuperAdminControler/user') ?>" style="float :solid purple;color:purple" class="btn btn-outline-secondary"> Reload</a> -->
                            <a href="<?php echo base_url('SuperAdminControler/adduser') ?>" class="btn mt-4 fontAwesome" style="float :right;border:1px solid purple;color:purple"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</a>
                            <a href="<?php echo base_url('SuperAdminControler/userhistory') ?>" class="btn mt-4 mr-2 fontAwesome" style="float :right;border:1px solid purple;color:purple"><i class="fa fa-history" aria-hidden="true"></i> User History</a>&nbsp;
                            <a href="<?php echo base_url('SuperAdminControler/user') ?>" class="btn mt-4 fontAwesome" style="float :right;border:1px solid purple;color:purple"><i class="fa fa-refresh" aria-hidden="true"></i></i> Refresh</a>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo base_url('SuperAdminControler/addroleuser') ?>" class="btn" style="float :left;border:1px solid purple;color:purple; margin-left: 3rem;margin-top:3vh"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Role User</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
                <div class="col-9 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ; margin-bottom: 10px;border-radius: 5px; ">
                    <table class="table m-0">
                        <thead class="border-0">
                            <tr>
                                <th style="width: 5%;color: purple">ID</th>
                                <th style="width: 20%;color: purple">Username</th>
                                <th style="width: 25%;color: purple">Email</th>
                                <th style="width: 15%;color: purple">Role</th>
                                <th style="width: 15%;color: purple">No.Handphone</th>
                                <th style="width: 10%;color: purple">Status</th>
                                <th style="width: 10%;color: purple">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <div style="height: 44vh; overflow-y: scroll">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <?php if ($data != "Not Found") { ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td style="width: 5%;"><?php echo $key["iduser"] ?></td>
                                            <td style="width: 20%;"><?php echo $key["username"] ?></td>
                                            <td style="width: 25%;"><?php echo $key["email"] ?></td>
                                            <td style="width: 15%;"><?php echo $key["namerole"] ?></td>
                                            <td style="width: 15%;"><?php echo $key["phone"] ?></td>
                                            <?php if ($key['isactive'] == "1") { ?>
                                                <td style="width: 10%;">Active</td>
                                            <?php } else { ?>
                                                <td style="width: 10%;">No-Active</td>
                                            <?php } ?>

                                            <td style="width: 10%;"><a style="color: purple; text-decoration: none" href="<?php echo base_url('MasterDataControler/getdatauserbyid?id=' . base64_encode($key['iduser'])) ?>"><i class="fa fa-pencil"></i> Edit</a></td>
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
                <div class="col-2 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ; margin-left:80px;  margin-bottom: 10px; border-radius: 5px">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th style=" color: purple;width:50%">Role User</th>
                                <th style=" color: purple;width:50%">Manage Role</th>
                            </tr>
                        </thead>
                    </table>
                    <div style=" height: 44vh; overflow-y: scroll">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <?php foreach ($data1 as $key) : ?>
                                    <tr>
                                        <td><?php echo $key["namerole"] ?></td>
                                        <td><a style="color: black; text-decoration:none" href="<?php echo base_url('SuperAdminControler/managerole?xxx=') . base64_encode($key["idrole"]) ?>"><i class="fa fa-tasks" aria-hidden="true"></i> Manage</a></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>