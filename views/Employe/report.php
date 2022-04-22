<style>
    .fw {
        font-weight: bold;
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
<div class="container-xxl" style="padding-left: 5%;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PACKAGING / Delivery Order</p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">DELIVERY ORDER</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('employe/report') ?>" class="btn fw bay btn-light">SEMUA</a>
                    <a href="<?= base_url('employe/ingoing') ?>" class="btn fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('employe/outgoing') ?>" class="btn fw btn-transparent">OUTGOING</a>
                    <a href="<?= base_url('employe/request') ?>" class="btn fw btn-transparent">REQUEST</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: #3C2E8F; color: white">Filter &nbsp; <i class="fa fa-chevron-down"></i></span>
                                    <input type="text" class="form-control" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family:Arial, FontAwesome">
                                </div>
                            </div>
                            <div class="col-2">

                            </div>
                            <div class="col-4">
                                <a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
                                <a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                <a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table cn">
                            <thead style="background-color: #3C2E8F;color: white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Request</th>
                                    <th scope="col">Tgl dibuat</th>
                                    <th scope="col">Judul Request</th>
                                    <th scope="col">Qty. Items</th>
                                    <th scope="col">Dibuat Oleh</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: whtie">
                                <tr>
                                    <th scope="row"></th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>
                                        <p class="btn btn-primary rounded-pill col-12">@mdo</p>
                                    </td>
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