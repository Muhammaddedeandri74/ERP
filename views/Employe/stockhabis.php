<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('CounterController/stockinventory') ?>" class="btn fw btn-transparent px-4">ALL</a>
                    <a href="<?= base_url('CounterController/stockhabis') ?>" class="btn fw bay btn-light">STOCK HABIS</a>
                    <a href="<?= base_url('CounterController/expired') ?>" class="btn fw btn-transparent">SEGERA EXPIRED</a>
                    <a href="<?= base_url('CounterController/opname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('CounterController/stockhabis') ?>" method="post">
                            <div class="row pt-4 d-flex justify-content-between">
                                <div class="col-6 pt-2 pl-1">
                                    <div class="input-group">
                                        <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
                                            <option class="slc" value="nameitem">Nama Product</option>
                                            <option class="slc" value="sku">SKU</option>
                                        </select>
                                        <input type="text" value="<?= set_value('search') ?>" class="form-control col-10" value="<?= set_value('search') ?>" name="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
                                    </div>
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="rwo d-flex justify-content-between">
                                                <div class="col-3">
                                                    <p>Dari</p>
                                                    <input type="number" name="dari" id="dari" value="<?= set_value('dari') ?>" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="col-3">
                                                    <p>Sampai</p>
                                                    <input type="number" name="sampai" id="sampai" value="<?= set_value('sampai') ?>" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="col-3">
                                                    <p><br></p>
                                                    <a style="text-decoration: none;" class=" btn btn-outline-danger" href="<?php echo base_url('CounterController/stockhabis') ?>">Reset</a>
                                                    <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2" style="margin-top: 13vh;">
                        <a class=" btn btn-outline-success" style="float:right" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                    </div>
                    <div class="card-body ">
                        <table class="table m-0 table-striped table-hover" id="table">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="text-align:center;width: 4% " scope="col">#</th>
                                    <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                    <th style="text-align:center;width: 5% " scope="col">SKU</th>
                                    <th style="text-align:center;width: 5% " scope="col">Stock Minimum</th>
                                    <th style="text-align:center;width: 5% " scope="col">QTY</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 45vh">
                            <table class="table table-striped table-hover" id="table">
                                <tbody style="background-color: whtie" id="bodyx">
                                    <?php if ($data != "Not Found") : $a = 1;
                                        $getdata = array(); ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php if ($key["minstock"] > $key["qty"]) : ?>
                                                <tr id="<?php echo $key['iditem'] ?>">
                                                    <th style="text-align:center;width: 4% "><input type="checkbox" name="<?php echo $key['iditem'] ?>" class="form-control p-0"></th>
                                                    <td style="text-align:center;width: 21%"><?php echo $key["nameitem"] ?></td>
                                                    <td style="text-align:center;width: 5% "><?php echo $key["sku"] ?></td>
                                                    <td style="text-align:center;width: 5% "><?php echo $key["minstock"] ?></td>
                                                    <td class="pl-4" style="text-align:center;width: 5% "><?php echo $key["qty"] ?></td>
                                                </tr>
                                            <?php array_push($getdata, $key);
                                            endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <?php echo $pagination; ?>
                            </div>
                        </div> -->
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>

<div style="float: right; padding-right: 10%">
    <button class="btn btn-warning btn-lg" style="width: 120%;color: white;background: orange" onclick="order()">Buat Permintaan Barang</button>
</div>
<div style="float: right; padding-right: 2%">
    <button type="button" class="btn btn-warning btn-lg" style="width: 120%;color: white;background: orange" data-toggle="modal" data-target="#kirimmail">Kirim Email</button>
</div>
</form>

<form action="<?php echo base_url('CounterController/buatrequest') ?>" method='POST' id="form">
    <div id="data" style="padding-left: 50%"></div>
</form>

<form action="<?php echo base_url('CounterController/sentemailstockhabis') ?>" method="post">
    <div class="modal fade" id="kirimmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" autocomplete="off" style="font-family:Arial, FontAwesome" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="data" id="data" style="display: none">
    <table class="table">
        <thead style="background: purple">
            <tr style="text-align:center;">
                <th style="text-align:center;border:1px solid;background-color: yellow;">No</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">Nama Product</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">SKU</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">Stock Minimum</th>
                <th style="text-align:center;border:1px solid;background-color: yellow;">QTY</th>

            </tr>
        </thead>
        <tbody style="background-color: whtie" id="prt">
            <?php if ($data != "Not Found") : $a = 1;
                $getdata = array(); ?>
                <?php foreach ($data as $key) : ?>
                    <?php if ($key["minstock"] > $key["qty"]) : ?>

                        <?php if ($a % 2 == 0) { ?>
                            <tr id="<?php echo $key['iditem'] ?>">
                            <?php } else { ?>
                            <tr style="background: #eeeeee border:1px solid;" id="<?php echo $key['iditem'] ?>">
                            <?php } ?>
                            <td style="text-align:center;border:1px solid;"><?php echo $a++; ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["nameitem"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["sku"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["minstock"] ?></td>
                            <td class="pl-4" style="border:1px solid;"><?php echo $key["qty"] ?></td>

                            <!--   <td>
                            <a data-toggle="modal" data-target="#modalopenshop" style="cursor: pointer;" onclick="kirimorder(<?php echo $key["iditem"] ?>)">Detail<i class="fa fa-external-link" aria-hidden="true"></i></a>
                        </td> -->
                            </tr>
                        <?php array_push($getdata, $key);
                    endif ?>

                    <?php endforeach ?>
                <?php endif ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $('#data').hide();

    function toggleTable() {
        var x = document.getElementById("hide");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function search(x) {
        var data = <?php echo json_encode($getdata) ?>;
        var baris = "";
        var bar = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
                baris += `<tr id=` + data[i]["iditem"] + `>
                        <th style="text-align:center;width: 4% " scope="row"><input type="checkbox" name="` + data[i]["iditem"] + `" class="form-control"></th>
                            <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qty"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5% ">` + data[i]["status"] + `</td>
                            </tr>`;
                bar += `<tr>
                        <th style="text-align:center;width: 4%;border:1px solid" scope="row"><input type="checkbox" name="` + data[i]["iditem"] + `" class="form-control"></th>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["qty"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5%;border:1px solid">` + data[i]["status"] + `</td>
                            </tr>`;
            } else if (data[i]["sku"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
                baris += `<tr id=` + data[i]["iditem"] + `>
                        <th style="text-align:center;width: 4% " scope="row"><input type="checkbox" name="` + data[i]["iditem"] + `" class="form-control"></th>
                            <td style="text-align:center;width: 21%">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5% ">` + data[i]["qty"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5% ">` + data[i]["status"] + `</td>
                            </tr>`;
                bar += `<tr>
                        <th style="text-align:center;width: 4%;border:1px solid" scope="row"><input type="checkbox" name="` + data[i]["iditem"] + `" class="form-control"></th>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["nameitem"] + `</td>
                            <td style="text-align:center;width: 5%";border:1px solid>` + data[i]["sku"] + `</td>
                            <td style="text-align:center;width: 5%";border:1px solid>` + data[i]["qty"] + `</td>
                            <td class="pl-4" style="text-align:center;width: 5%";border:1px solid>` + data[i]["status"] + `</td>
                            </tr>`;
            }
        }
        $('#bodyx').html(baris);
        $('#prt').html(bar);
    }

    function order() {
        const arry = [];
        var baris = '';
        $('#table tr').filter(':has(:checkbox:checked)').each(function() {
            // this = tr
            $tr = $(this);
            arry.push(this.id);
        });
        for (var i = 0; i < arry.length; i++) {
            baris += `<input type="hidden" name="iditem[]" value=` + arry[i] + `>`
        }
        $('#data').html(baris)
        $('#form').submit()
    }

    function Timer(duration, display) {
        let timer = duration,
            hours, minutes, seconds;

        let setIntervalId = setInterval(function() {
            hours = parseInt((timer / 3600) % 24, 10)
            minutes = parseInt((timer / 60) % 60, 10)
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.text(hours + ":" + minutes + ":" + seconds);

            --timer;
            if (timer === -1) {
                clearInterval(setIntervalId);
                // Perform the necessary operation here like triggering event to update the database.
            }
        }, 1000);
    }

    function start() {
        // For testing purpose set the value to 10 seconds.
        let twentyFourHours = 24 * 60 * 60;
        const display = $('#remainingTime');
        Timer(twentyFourHours, display);
    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "StockHabis.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>