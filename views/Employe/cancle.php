<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }
</style>
<div class="container-xxl" style="padding-left: 5%;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PACKAGING / Delivery Order</p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">DELIVERY ORDER</p>
</div>

<div class="container-xxl ml-5">
    <div class="row">
        <div class="col-8">
            <div class="card border-0">
                <div class=" card border-0">
                    <div class="card-header border-0 bg-transparent">
                        <div class="row d-flex justify-content-between">
                            <div class="col-10 pl-5">
                              <a href="<?= base_url('CounterController/deliveryorder') ?>" class="btn fw bay btn-light">SIAP DIKIRIM</a>
                    <a href="<?= base_url('CounterController/terkirim') ?>" class="btn fw btn-transparent">TERKIRIM</a>
                    <a href="<?= base_url('CounterControllerloye/cancle') ?>" class="btn fw btn-transparent">DIBATALKAN</a>
                    <a href="<?= base_url('CounterController/all') ?>" class="btn fw btn-transparent">SEMUA</a>
                            </div>
                            <div class="col-2">
                                <button class="btn" style="background-color: #3C2E8F;color:white">
                                    <i class="fa fa-plus"></i>
                                    <a class="text-white text-decoration-none" href="">Buat Pengiriman</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ml-4">
                        <center>
                            <div class="card bay p-4" width="80%">
                                <div class="card-header border-0 bg-white">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="background-color: #3C2E8F; color: white">Filter &nbsp; <i class="fa fa-chevron-down"></i></span>
                                        <input type="text" class="form-control" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family:Arial, FontAwesome">
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <table class="table ">
                                        <thead style="background-color: #3C2E8F;color: white">
                                            <tr>
                                                <th scope="col">No. SO</th>
                                                <th scope="col">Nama Customer</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Delive. Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: whtie">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3" style="margin-top: 8.5vh;">
            <div class="card border-0">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>