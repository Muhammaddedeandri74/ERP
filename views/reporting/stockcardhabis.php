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
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">STOCK / Stock Inventory</p>
    <p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">STOCK INVENTORY GUDANG</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('reporting/stockcard') ?>" class="btn fw btn-transparent px-4">ALL</a>
                    <a href="<?= base_url('reporting/stockcardhabis') ?>" class="btn bay fw btn-light ">STOCK HABIS</a>
                    <a href="<?= base_url('reporting/stockcardexp') ?>" class="btn fw btn-transparent">SEGERA EXPIRED</a>
                    <a href="<?= base_url('reporting/stockcardopname') ?>" class="btn fw btn-transparent">STOCK OPNAME</a>
                </div>
            </div>
        </div>
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-header border-0 bg-white">
                        <form action="<?php echo base_url('reporting/stockcardhabis') ?>" method="post">
                            <div class="row pt-4 d-flex justify-content-between">
                                <div class="col-6" style="margin-left: 1vw;">
                                    <!-- <input type="text" name="cari" id="cari" placeholder="filter" placeholder="Search By name item" class="form-control" value="<?php echo $cari; ?> " /> -->
                                    <div class="card">
                                        <div class="card-body bays">
                                            <div class="input-group">
                                                <select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
                                                    <option class="slc" value="nameitem">Nama Product</option>
                                                    <option class="slc" value="sku">SKU</option>
                                                </select>
                                                <input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" name="search" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Nama Product dan SKU" style="font-family:Arial, FontAwesome">
                                            </div>
                                            &nbsp;
                                            <div class="input-group">
                                                <a href="<?php echo base_url('reporting/stockcardhabis') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>&nbsp;
                                                <button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-2" style="margin-top: 13vh">
                                    <a class=" btn btn-outline-success" style="float:right" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table m-0 table-striped table-hover" id="table">
                            <thead style="background-color: orange;color: white">
                                <tr>

                                    <th style="text-align:center;width:1%" scope="col">No</th>
                                    <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                    <th style="text-align:center;width: 5%" scope="col">SKU</th>
                                    <th style="text-align:center;width: 5%" scope="col">Stock Minimum</th>
                                    <th style="text-align:center;width: 5%" scope="col">QTY</th>

                                    <!-- <th scope="col">Actions</th> -->
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 52vh">
                            <table class="table table-striped table-hover">
                                <tbody style="background-color: whtie" id="bodyx">
                                    <?php if ($data != "Not Found") : $a = 1;
                                        $getdata = array(); ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php if ($key["minstock"] > $key["qty"]) : ?>

                                                <?php if ($a % 2 == 0) { ?>
                                                    <tr id="<?php echo $key['iditem'] ?>">
                                                    <?php } else { ?>
                                                    <tr id="<?php echo $key['iditem'] ?>">
                                                    <?php } ?>

                                                    <td style="text-align:center;width: 1%"><?php echo $a++ ?></td>
                                                    <td style="text-align:center;width: 20%"><?php echo $key["nameitem"] ?></td>
                                                    <td style="text-align:center;width: 5%"><?php echo $key["sku"] ?></td>
                                                    <td style="text-align:center;width: 5%"><?php echo $key["minstock"] ?></td>
                                                    <td class="pl-5" style="text-align:center;width: 5%"><?php echo $key["qty"] ?></td>
                                                    </tr>
                                                <?php array_push($getdata, $key);
                                            endif ?>

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
                        <div class="card-footer">
                            <button class="btn btn-warning btn-lg" style="width: 10%;color: white;background: orange;float: right" data-toggle="modal" data-target="#kirimmail" type="button" onclick="toggleTable()">Kirim Email</button>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <form action="<?php echo base_url('CounterController/buatrequest') ?>" method='POST' id="form">
        <div id="data" style="padding-left: 50%"></div>
    </form>
</div>


<div class="excel" id="excel">
</div>
<div class="data" id="datax">
    <table class="table" id="hide">
        <thead style="background: orange">
            <tr>
                <th style="text-align:center;border:1px solid;background-color: yellow;">ID Item</th>
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
                            <tr id="<?php echo $key['iditem'] ?>">
                            <?php } ?>

                            <td style="text-align:center;border:1px solid;"><?php echo $key["iditem"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["nameitem"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["sku"] ?></td>
                            <td style="text-align:center;border:1px solid;"><?php echo $key["minstock"] ?></td>
                            <td class="pl-5" style="text-align:center;border:1px solid;"><?php echo $key["qty"] ?></td>
                            </tr>
                        <?php array_push($getdata, $key);
                    endif ?>

                    <?php endforeach ?>
                <?php endif ?>
        </tbody>
    </table>
</div>
<form action="<?php echo base_url('Reporting/mailstockcardhabis') ?>" method="post">
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
<script type="text/javascript">
    $('#datax').hide();

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
                baris += `<tr>
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
                baris += `<tr>
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

        if (arry.length == 0) {
            alert("Pilih Item Terlebih Dahulu")
        } else {

            for (var i = 0; i < arry.length; i++) {

                baris += `<input type="hidden" name="iditem[]" value=` + arry[i] + `>`


            }

            $('#data').html(baris)

            $('#form').submit()

        }

    }

    $("#btn_exportexcel").click(function(e) {
        let file = new Blob([$('.data').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "StockCardHabis.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>