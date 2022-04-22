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
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">Report Ingoing</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/reportingoing') ?>" class="btn bay fw btn-transparent">INGOING</a>
                    <a href="<?= base_url('InOut/reportoutgoing') ?>" class="btn fw btn-transparent">OUTGOING</a>
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
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">

                        </div>
                        <div class="col-6" style="padding-left: 18vw;">
                            <div class="col">
                                <label>TIPE IN</label>
                                <a style="margin-left: 2vw;" href="<?= base_url('InOut/reportingoing') ?>" class="btn fw btn-transparent">SUPPLIER</a>
                                <a href="<?= base_url('InOut/reportreturn') ?>" class="btn bay fw btn-transparent">RETURN</a>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-6 pt-2 pl-3">
                            <div class="input-group">
                                <select class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
                                    <option class="slc" value="1">No. Ingoing</option>
                                    <option class="slc" value="2">Gudang Pengirim</option>
                                </select>
                                <input type="text" class="form-control col-10" name="search" id="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" oninput="searchx(this.value)" style="font-family:Arial, FontAwesome">
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                        </div>
                        <div class="col-2">
                            <!-- <a href="<?php echo base_url('InOut/newinvin') ?>" class="btn btn-outline-primary" style="float :right"><b><i class="fa fa-plus" aria-hidden="true"></i> Counter In</b></a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Ingoing</th>
                                <th scope="col">Tipe. IN</th>
                                <th scope="col">Qty. Items</th>
                                <th scope="col">Tgl. Order</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Gudang Pengirim</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: whtie" id="bodyxx">
                            <?php if ($data != "Not Found") : $a = 0; ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td><?php echo $key["codemove"] ?></td>
                                        <?php if ($key["norequest"] == "") { ?>
                                            <td>Return Counter</td>
                                        <?php } else { ?>
                                            <td>Request</td>
                                        <?php } ?>
                                        <td><?php echo $key["itemmove"] ?></td>
                                        <td><?php echo $key["datemove"] ?></td>
                                        <td><?php echo $key["descinfo"] ?></td>

                                        <td><?php echo $key["namecomm"] ?></td>
                                        <td><?php echo $key["status"] ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(<?php echo $key["idmove"] ?>)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                <?php endforeach ?>
                            <?php endif ?>


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

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="user" method="post" action="<?= base_url('CounterController/konfirmso') ?>">
                <div class="modal-header" style="background-color : orange; color: white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Data Ingoing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl ml-5">
                        <div class=" card border-0">
                            <div class="card-header border-0 bg-transparent">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7"> </div>
                                    <div class="col-5">
                                        <a class="btn"><i class="fa fa-print"></i> Cetak Data</a>
                                        <a class="btn"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                        <a class="btn"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="card bay" width="100%" id="header">
                                        <div class="card-header border-0 bg-white">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-10">
                                                    <p class="fw">No. Request 123123rr<br>
                                                        <span class="fn">Sl22</span>
                                                    </p>
                                                </div>
                                                <div class="col-2">
                                                    <p class="badge bg-warning text-dark">Outstanding</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="fw">Nama Pesanan<br>
                                                        <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between" style="width: 100%;">
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3">Alamat<br>
                                                            <span style="color: #3C2E8F" class="fn">PT. Untung Jaya</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
                                                            <span style="color: #3C2E8F" class="fn">Tanggal</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                            <span style="color: #3C2E8F" class="fn">X product</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
                                                            <span style="color: #3C2E8F" class="fn">Shopee</span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 30%;">
                                                        <p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
                                                            <span style="color: #3C2E8F" class="fn">OUT - Sales</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4" id="dataitem">
                                        <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                        <table class="table cn">
                                            <thead style="background-color: grey;color: white">
                                                <tr>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Ready Stock</th>
                                                    <th scope="col">Qty. Order</th>
                                                    <th scope="col">Balance</th>
                                                    <!-- <th scope="col">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: whtie">
                                                <tr>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td><i class="fa fa-pencil"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="footer">
                        <button type="button" class="btn btn-outline-success">Confirm</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        for (var i = 0; i < data.length; i++) {
            if (data[i]["codemove"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
                baris += '<tr>';
                baris += `<th scope="row"></th>
                            <td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
            } else if (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                baris += '<tr>';
                baris += `<th scope="row"></th>
                            <td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`

            } else if (x.toLowerCase().includes("return counter")) {
                baris += '<tr>';
                baris += `<th scope="row"></th>
                            <td>` + data[i]["codemove"] + `</td>`
                if (data[i]["norequest"] == null) {
                    baris += `  <td>Return Counter</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
            } else if (x.toLowerCase().includes("request")) {
                baris += '<tr>';
                baris += `
                              <th scope="row"></th>
                                        <td>` + data[i]["codemove"] + `</td>
                                        `
                if (data[i]["norequest"] == "") {
                    baris += `  <td>Return Counter</td>`
                } else {
                    baris += `<td>Request</td>`
                }
                baris += `
                            <td>` + data[i]["qtymove"] + `</td>
                            <td>` + data[i]["datemove"] + `</td>
                            <td>` + data[i]["descinfo"] + `</td>
                            <td>` + data[i]["namecomm"] + `</td>
                            <td>` + data[i]["status"] + `</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="konfirmorder(` + data[i]["idmove"] + `)">Detail <i class="fa fa-external-link" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
            }
        }
        $('#bodyxx').html(baris);
    }


    function konfirmorder(x) {
        var data = <?php echo json_encode($data) ?>;
        console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idmove"] == x) {
                if (data[i]["status"] != "Waiting") {
                    $('#footer').hide();
                } else {
                    $('#footer').show();
                }

                $('#footer').html('<a href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouses" class="btn btn-outline-success"><i class="fas fa-pencil-alt">Confirm</i></a>')

                // console.log(data[i])
                var baris = `
                                <div class="card-header border-0 bg-white">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-10" >`;

                if (data[i]["nopesanan"] == null) {
                    baris += ` <p class="fw">No. Ingoing ` + data[i]["codemove"] + `<br>
                                                            
                                                        </p>`
                } else {
                    baris += `
                                                         <p class="fw">No. Ingoing ` + data[i]["codemove"] + `<br>
                                                            
                                                        </p>
                                                     `
                }

                baris += `</div>
                                         <input type="hidden" name="idso" value="` + data[i]["idmove"] + `">
                                           
                                            <div class="col-12">
                                                <p class="fw">Tanggal Ingoing<br>
                                                    <span style="color: #3C2E8F" class="fn">` + data[i]["datemove"] + `</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div style="width: 40%;">
                                                    <p class="fw p-3">Warehouse Pengirim<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["namecomm"] + `</span>
                                                    </p>
                                                </div>
                                               
                                                <div style="width: 40%;">
                                                    <p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
                                                        <span style="color: #3C2E8F" class="fn">` + data[i]["qtymove"] + ` Product</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `;

                var barisx = `
                                         <p class="fw">DAFTAR ITEM YANG DIPESAN</p>
                                        <table class="table cn">
                                            <thead style="background-color: grey;color: white">
                                                <tr>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Exp Date</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: whtie">`;
                for (var x = 0; x < data[i]["data"].length; x++) {
                    if (x % 2 == 0) {
                        barisx += `<tr>`
                    } else {
                        barisx += `<tr style = "background : #eeeeee">`
                    }


                    barisx += `
                                                                        <td>` + data[i]["data"][x]["nameitem"] + `</td>
                                                                        <td>` + data[i]["data"][x]["sku"] + `</td>
                                                                        <td>` + data[i]["data"][x]["qty"].replace(".0000", "") + `</td>
                                                                        <td>` + data[i]["data"][x]["expdate"] + `</td>
                                                                      
                                                                        
                                                                    </tr>


                                                          `

                }
                barisx += `
                                                                </tbody>
                                                            </table>
                                                      `





                $('#header').html(baris);
                // console.log(barisx);
                $('#dataitem').html(barisx);
            }
        }
    }
</script>