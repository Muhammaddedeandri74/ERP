<div class="container-xxl ml-5" style="width: 96%;">
    <div class=" row">
        <div class="col py-3" style="border-radius: 5px;">
            <h1 style="margin-top: 30px; margin-left: 20px;text-transform: uppercase;">ORDER TYPE</h1>


            <div class="row">
                <div class="col-9">
                    <div style="box-shadow: 0.5px 2px #bbc6cb;background: #d5a6bd ; height: 25vh; margin-left:20px;margin-right:10px ;margin-top: 20px; padding: 10px">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px">
                                <div class="row">
                                    <p><b style="font-size: 25px">Halo, !</b></p>
                                    <p>Anda bisa mengatur (Tambah, Hapus, Aktif, non-Aktif) Bank untuk sistem ERP disini.</p>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Bank Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p> Bank</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Bank Non-Aktif</b></p>
                                        </div>
                                        <div class="row">
                                            <p> Bank</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p><b>Total Bank</b></p>
                                        </div>
                                        <div class="row">
                                            <p> Bank</p>
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
                <div class="col-2">
                    <img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
                </div>
            </div>
            <div class="row" style=" margin-left:20px;margin-right:10px;margin-top: 20px">
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <p class="col-4 pt-3" style="border-bottom: 5px solid purple; font-size: 22px">List Bank</p>
                        </div>
                        <div class="col pt-3" style="margin-right: 40px">
                            <a href="<?php echo base_url('SuperAdminControler/addtypeorder') ?>" class="btn mt-2" style="float :right;border:1px solid purple;color:purple;margin-right:5vw">+ Tambah Bank</a>
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
                                <th style="color: purple">Name Common</th>
                                <th style="color: purple">Isactive</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>