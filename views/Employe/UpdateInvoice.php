<style>
    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .fw {
        font-weight: bold;
    }

    .fsfw {
        font-size: 20px;
        font-weight: bold;
    }

    .fkfw {
        font-size: 16px;
        font-weight: bold;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<body class="bg-light">
    <div class="container-fluid text-white pt-3" style="background-color: #3C2E8F;;">
        <div class="row d-flex justify-content-between">
            <div class="col-1">
                <a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
            </div>
            <div class="col-7">
                <p class="tu font-weight-bold " style="font-size: 13px">Invoice / Detail</p>
                <p class="tu font-weight-bold upc" style="font-size: 25px">Data Invoice</p>
            </div>
            <div class="col-4">
                <?php echo $this->session->flashdata('message'); ?>
                <?php $this->session->set_flashdata('message', ''); ?>
            </div>
        </div>
    </div>
    <!-- <div class="container-xxl" style="background-color : #3C2E8F;">
        <div class="row">
            <div class="col-1"><br><br>
                <button class="btn ml-5 bg-transparent" type="button" onclick="back()"><i style="color: white; font-size: 30px" class="fa fa-arrow-left" aria-hidden="true"></i></button>
            </div>
            <div class="col-11">
                <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Invoice / Detail</p>
                <p class="text-white font-weight-bold pl-2" style="font-size: 25px">Data Invoice</p>
            </div>
        </div>
    </div> -->

    <form action="<?php echo base_url('SalesinvoiceControler/updatedatainvoice') ?>" method="POST" id="form">
        <input type="hidden" name="idinv" value="<?php echo $data4[0]["idinv"] ?>">
        <div class="container-fluid border my-3" style="width: 95%; background-color: white">
            <div class="row d-flex justify-content-between" style="border-bottom: 2px grey;">
                <div class="col-10 fw">
                    <p class="pl-5 pt-5" style="font-size: 26px;"><?php echo $data4[0]["codeinv"] ?></p>
                </div>
                <div class="col-2">
                    <p class="btn btn-primary justify-content-end col-12 mt-5" onclick="update()">Update Data</p>
                </div>
                <hr style="width: 98%;">
                <!-- content -->
                <div class="col-4">
                    <div class="row">
                        <div class="col-4">
                            <p style="text-align: right;">Informasi Dasar</p>
                        </div>
                        <div class="col-8">
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Jenis Pemesanan</label>
                                <select class="form-control" aria-label="Default select example" readonly>
                                    <option selected disabled>Pilih buyer, supplier atau e-commerce</option>
                                    <option value="001" <?php echo ($data4[0]["typeso"] ==  001) ? ' selected="selected"' : ''; ?>>WEB</option>
                                    <option value="002" <?php echo ($data4[0]["typeso"] ==  002) ? ' selected="selected"' : ''; ?>>E-Commerce</option>
                                    <option value="003" <?php echo ($data4[0]["typeso"] ==  003) ? ' selected="selected"' : ''; ?>>B2B</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Customer</label>
                                <select class="form-control" aria-label="Default select example" readonly>
                                    <option selected disabled>Pilih Customer</option>
                                    <?php if ($data != "Not Found") : ?>
                                        <?php foreach ($data as $key) : ?>
                                            <option value="<?php echo $key["idcomm"] ?>" <?php echo ($data4[0]["idcust"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 pt-4">
                            <p style="text-align: right;">Mata Uang & Pajak</p>
                        </div>
                        <div class="col-8 pt-4">
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Pilih Mata Uang</label>
                                <select class="form-control" aria-label="Default select example" readonly>
                                    <option selected disabled>Pilih mata uang untuk Transaksi</option>
                                    <?php if ($data2 != "Not Found") : ?>
                                        <?php foreach ($data2 as $key) : ?>
                                            <option value="<?php echo $key["idcomm"] ?>" <?php echo ($data4[0]["idcurrency"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-8">
                                    <p style="margin-bottom: 0; margin-top: 20px">VAT</p>
                                    <div class="d-flex " style="margin-top: 5px">
                                        <div>
                                            <label class="switch">
                                                <?php if ($data4[0]["VAT"] == "" || $data4[0]["VAT"] == "0") { ?>
                                                    <input type="checkbox" value="0" onclick="vat()" name="vats" id="vats" disabled>
                                                <?php } else { ?>
                                                    <input type="checkbox" value="10" onclick="vat()" name="vats" id="vats" checked disabled>
                                                <?php } ?>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div style="margin-left: 20px">
                                            <p>Klik untuk on / off</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 pt-4">
                            <p style="text-align: right;">Pembayaran</p>
                        </div>
                        <div class="col-8 pt-4">
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Metode Pembayaran</label>
                                <?php if ($data4[0]["status"] == "Paid") { ?>
                                    <select class="form-control" name="paymentmethod" aria-label="Default select example" readonly>
                                    <?php } else { ?>
                                        <select class="form-control" name="paymentmethod" aria-label="Default select example">
                                        <?php } ?>

                                        <option selected disabled>Pilih metode pembayaran</option>
                                        <?php if ($data3 != "Not Found") : ?>
                                            <?php foreach ($data3 as $key) : ?>
                                                <option value="<?php echo $key["namecomm"] ?>" <?php echo ($data4[0]["typepayment"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        </select>
                            </div>
                        </div>
                        <div class="col-4 pt-4">
                            <p style="text-align: right;">Pengiriman</p>
                        </div>
                        <div class="col-8 pt-4">
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Tanggal Pengiriman</label>
                                <input type="date" name="delivdate" class="form-control" value="<?php echo $data4[0]["datedo"] ?>" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Jasa Pengiriman</label>
                                <input type="text" name="jasapengirim" class="form-control" value="<?php echo $data4[0]["jasapengirim"] ?>" readonly>
                            </div>
                            <div class="lh-sm">
                                <p>Alamat</p>
                                <input type="text" name="address" class="form-control" value="<?php echo $data4[0]["delivaddr"] ?>" readonly>
                            </div>
                            <div class="lh-sm">
                                <p>Biaya Pengiriman</p>
                                <input type="text" name="address" id="ongkir" class="form-control" value="<?php echo number_format($data4[0]["delivfee"]) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-4 pt-4">
                            <p class="pt-1" style="text-align: right;">Global Diskon</p>
                        </div>
                        <div class="col-8 pt-4" style="margin-bottom: 5%">
                            <div class="d-flex" style="justify-content: space-around;">
                                <p style="margin: 0">Presentase</p>
                                <p style="margin: 0">Nominal</p>
                            </div>
                            <?php if ($data4[0]["status"] == "Paid") { ?>
                                <div class="d-flex" style="justify-content: space-around;">
                                    <input type="number" name="disper" placeholder="%" class="form-control" readonly>
                                    <input type="number" name="disnom" placeholder="Rupiah" class="form-control" value="<?php echo $data4[0]["discrp"] ?>" readonly>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex" style="justify-content: space-around;">
                                    <input type="number" name="disper" id="disper" placeholder="%" class="form-control" oninput="discper(this.value)">
                                    <input type="number" name="disnom" id="disnom" placeholder="Rupiah" class="form-control" value="<?php echo $data4[0]["discrp"] ?>" oninput="discnom(this.value)">
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
                <div class="col-8 pl-5">
                    <p>Status Pembayaran</p>
                    <div class="form-check ">
                        <div class="row d-flex justify-content-between ">
                            <div class="col-2">
                                <?php if ($data4[0]["status"] == "Paid") { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" disabled>
                                <?php } ?>

                                <label class="form-check-label" for="flexRadioDefault1">
                                    Dibayar
                                </label>
                            </div>
                            <div class="col-2">
                                <?php if ($data4[0]["status"] == "Unpaid") { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" disabled>
                                <?php } ?>

                                <label class="form-check-label" for="flexRadioDefault1">
                                    Belum Dibayar
                                </label>
                            </div>
                            <div class="col-2">
                                <?php if ($data4[0]["status"] == "Paid Partial") { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" disabled>
                                <?php } ?>

                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bayar Sebagian
                                </label>
                            </div>
                            <!--   <div class="col-2">
                             <?php if ($data4[0]["status"] == "Can") { ?>
                                
                            <?php } else { ?>

                            <?php } ?>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Batal
                            </label>
                        </div> -->
                            <div class="col-1">

                            </div>
                            <div class="col-3">
                                <button onclick="printDiv('resi')" class="btn btn-outline-primary col-12">Cetak</button>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between pt-4">
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Yang Telah Dibayar</label>
                            <input type="text" class="form-control" name="jmlbayarlast" id="jmlbayarlast" value="<?php echo number_format($data4[0]["totalinv"] - $data4[0]["balance"]) ?>" readonly>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jumlah Yang Harus Di Bayar</label>
                                <input type="text" class="form-control" id="jmlharus" id="jmlharus" value="<?php echo $data4[0]["balance"] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nominal Yang Akan Dibayar</label>
                                <?php if ($data4[0]["status"] == "Paid") { ?>
                                    <input type="number" min="0" class="form-control" id="jmlbayar" name="jmlbayar" value="0" oninput="bayar(this.value)" readonly>
                                <?php } else { ?>
                                    <input type="number" min="0" class="form-control" id="jmlbayar" name="jmlbayar" value="0" oninput="bayar(this.value)">
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Balance</label>
                                <input type="text" class="form-control" id="balance" name="balance" value="<?php echo $data4[0]["balance"] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 2vh;">
                        <p class="fsfw">Produk/Item</p>
                    </div>
                    <div class=" card bg-light">
                        <div class="card-body">
                            <table class="table border ">
                                <thead class="text-white " style="background-color: #3C2E8F">
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Qty.</th>
                                        <th scope="col">Harga/Satuan</th>
                                        <th scope="col">VAT</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Disc.</th>
                                        <th scope="col">Grand Total</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    <?php $totalprice = 0;
                                    $a = 0;
                                    foreach ($data4[0]["data"] as $key) : ?>
                                        <tr>
                                            <td><input type="hidden" name="idinvdet[]" value="<?php echo $key["idinvdet"] ?>"><?php echo $key["nameitem"] ?></td>
                                            <td><?php echo $key["sku"] ?></td>
                                            <td><?php echo $key["qty"] ?></td>
                                            <td><?php echo number_format($key["priceitem"], 0, "", ".") ?></td>
                                            <td><?php echo number_format($key["VAT"], 0, "", ".") ?></td>
                                            <td><?php echo number_format($key["price"], 0, "", ".") ?></td>
                                            <?php if ($data4[0]["status"] == "Paid") { ?>
                                                <td><?php echo $key["disc"] ?></td>
                                            <?php } else { ?>
                                                <?php if ($key["disc"] != "0") { ?>
                                                    <td><?php echo $key["disc"] ?></td>
                                                <?php } else { ?>
                                                    <td><input type="number" name="discdet[]" id="discdet-<?php echo $a ?>" value="<?php echo $key["disc"] ?>" oninput="discdet(this.value,<?php echo $key["price"] ?>,<?php echo $a ?>, <?php echo $data4[0]["totalinv"]  ?>)"></td>
                                                <?php } ?>
                                            <?php } ?>

                                            <td><input type="text" name="totalprice[]" id="totalprice-<?php echo $a ?>" value="<?php echo number_format(intval($key["totalprice"]), 0, "", ".") ?>" readonly></td>
                                        </tr>
                                    <?php $a++;
                                        $totalprice = $totalprice +  $key["price"];
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-2 pt-3" style="text-align: right;">
                            <div>
                                <p class="fkfw">Jumlah Item</p>
                                <p class="fkfw">Grand Total</p>
                            </div>
                        </div>
                        <div class="col-2 pt-3">
                            <div>
                                <p class="fkfw"><?php echo count($data4[0]["data"])  ?></p>
                                <input type="hidden" id="jmlitem" value="<?php echo count($data4[0]["data"]) ?>">
                                <p class="fkfw" id="granndtotal"><?php echo number_format($totalprice, 0, "", ".") ?></p>

                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 2vh;">
                        <p class="fsfw">Produk Return</p>
                    </div>
                    <div class=" card bg-light">
                        <div class="card-body">
                            <table class="table border ">
                                <thead class="text-white " style="background-color: #3C2E8F">
                                    <tr>
                                        <th>Code Return</th>
                                        <th>QTY Return</th>
                                        <th>Date Return</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody style="background-color: white;">
                                    <?php if ($data4 != "Not Found") : ?>
                                        <?php foreach ($data4 as $key) : ?>
                                            <?php if ($key["idinv"] != "") : ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td><?php echo $key["codeinret"] ?></td>
                                                    <td style="text-align: center;"><?php echo $key["qtyinret"] ?></td>
                                                    <td><?php echo $key["dateinret"] ?></td>
                                                    <td><?php echo $key["descinfo"] ?></td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  <div class="fsfw">
                    <p>Additional Info</p>
                    <textarea name="" id="" cols="120" rows="5" readonly><?php echo $data4[0]["moreinfo"] ?></textarea>
                </div> -->
                </div>
                <div class="card bay p-5" style="display: none;" id="resi">
                    <div class="card-header pl-5 border-0">
                        <div class="row d-flex justify-content-between">
                            <div class="col-8">
                                <img src="<?= base_url($data5["logo"]) ?>" width="15%" alt="">
                            </div>
                            <div class="col-4">
                                <div style="line-height: 0.8rem;">
                                    <p style="text-align: center"> <b>Invoice</b></p>
                                    <p>tgl : <?php echo $data4[0]["datedo"] ?></p>
                                    <?php if ($data != "Not Found") : ?>
                                        <?php foreach ($data as $key) : ?>
                                            <?php if ($data4[0]["idcust"] ==  $key["idcomm"]) : ?>
                                                <p>Kepada : <?php echo $key["namecomm"] ?></p>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table mt-2" style="border: 3px solid black;text-align:center">
                            <thead style="border: 3px solid black;">
                                <tr>
                                    <th style="width: 5%;border: solid" scope="col">No</th>
                                    <th style="width: 65%;border: solid" scope="col">Produk</th>
                                    <th style="width: 5%;border: solid" scope="col">Qty</th>
                                    <th style="width: 10%;border: solid" scope="col">Harga</th>
                                    <th style="width: 20%;border: solid" scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data4[0]["data"] as $key) : ?>
                                    <tr>
                                        <td style="border: solid"><?= $i++ ?></td>
                                        <td style="border: solid"><?php echo $key["nameitem"] ?></td>
                                        <td style="border: solid"><?php echo $key["qty"] ?></td>
                                        <td style="border: solid"><?php echo number_format($key["priceitem"], 0, "", ".") ?></td>
                                        <td style="border: solid"><?php echo number_format($key["price"], 0, "", ".") ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <th style="border: solid" colspan="3"></th>
                                    <th>Ongkir</th>
                                    <td style="border: solid"><?php echo number_format($data4[0]["delivfee"]) ?></td>

                                </tr>
                                <tr>
                                    <th style="text-align:center;border:solid;font-size:18px" colspan="4">Total</th>
                                    <td style="border:solid;font-size:18px"> <b> <?php echo number_format($data4[0]["totalinv"], 0, "", ".") ?> </b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0">
                        <div style="line-height: 0.5rem;">
                            <p style="padding-left: 1vw;font-size: 18px;"> <b>Pembayaran</b> </p>
                            <?php if ($data6 == "Not Found") { ?>
                                <p style="padding-left: 1vw;"></p>
                            <?php } else { ?>
                                <?php foreach ($data6 as $key) : ?>
                                    <p style="padding-left: 1vw;"><?php echo $key["namecomm"] ?> : <?php echo $key["attrib1"] ?></p>
                                <?php endforeach ?>
                            <?php } ?>
                        </div>
                        <div class="col-12" style="margin-top:2vh;border: 3px solid black">
                            <p style="font-size: 32px;text-align:center"><b><?php echo $data5["titleremark"] ?></b></p>
                            <p style="font-size: 24px;text-align:center"><?php echo $data5["bodyremark"] ?></p>
                            <div class="row">
                                <div class="col-3">

                                </div>
                                <div class="col-6">

                                </div>
                                <div class="col-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>

<script type="text/javascript">
    function back() {
        window.location.href = "<?php echo base_url('SalesinvoiceControler') ?>";
    }


    function bayar(x) {
        var balaceawal = $('#balance').val();
        $('#balance').val($('#jmlharus').val() - x);
        if ($('#balance').val() < 0) {
            alert("Pembayaran Lebih");
            $('#jmlbayar').val(balaceawal);
            $('#balance').val(0);
        }

    }

    function update() {
        if (confirm("Anda Yakin ingin mengupdate data invoice ini ??")) {
            $('#form').submit();
        }
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function discdet(x, y, z, a) {

        if (x <= y) {

            $('#totalprice-' + z).val(y - x)
            $('#disper').val(0)


            count()


        } else {
            alert("Discount Item Melebihi Harga Jual")
            $('#totalprice-' + z).val(0)
        }
    }

    function count() {
        var jmlitem = $('#jmlitem').val();
        var total = 0;
        for (var i = 0; i < jmlitem; i++) {
            total = Number(total) + Number($('#totalprice-' + i).val().replaceAll('.', ""))


        }
        $('#granndtotal').html(total)

        total = Number(total) + Number($('#ongkir').val().replaceAll(',', ""))

        $('#jmlharus').val(total - $('#jmlbayarlast').val().replaceAll(',', '') - $('#disnom').val())
        $('#balance').val(total - $('#jmlbayarlast').val().replaceAll(',', '') - $('#disnom').val())



    }

    function discper(x) {
        $('#disnom').val(($('#jmlharus').val().replaceAll(",", "") - $('#jmlbayarlast').val().replaceAll(',', '')) * (x / 100))
        count()
    }

    function discnom(x) {
        $('#disper').val(0)
        count()
    }
</script>