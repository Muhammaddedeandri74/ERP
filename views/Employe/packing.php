<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .ig {
        background-color: orange;
        color: white
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

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
<?php

$iditem = array();
$newdata1 = array();


foreach ($data[0]["data"] as $key) {
    $f["iditem"] = $key["iditem"];
    $f["nameitem"] = $key["nameitem"];
    $f["sku"] = $key["sku"];
    $f["totalprice"] = $key["totalprice"];
    $f["usesn"] = $key["usesn"];
    $f["hargabeli"] = $key["hargabeli"];
    $f["idpo"] = $key["idpo"];
    $f["snid"] = $key["snid"];
    $f["qtyorder"] = 0;
    array_push($iditem, $f);
}

$newdata = array_map("unserialize", array_unique(array_map("serialize", $iditem)));
foreach ($newdata as $key) {
    $f["qtyorder"] = 0;
    foreach ($data[0]["data"] as $keyx) {
        if ($key["iditem"] == $keyx["iditem"]) {
            $f["qtyorder"] = $f["qtyorder"] + $keyx["qtyorder"];
        }
    }
    $f["iditem"] = $key["iditem"];
    $f["nameitem"] = $key["nameitem"];
    $f["sku"] = $key["sku"];
    $f["totalprice"] = $key["totalprice"];
    $f["usesn"] = $key["usesn"];
    $f["hargabeli"] = $key["hargabeli"];
    $f["snid"] = $key["snid"];
    $f["idpo"] = $key["idpo"];

    array_push($newdata1, $f);
}
?>

<div class="container-xxl" style="background-color : orange;">
    <div class="row">
        <div class="col-1"><br><br>
            <button class="btn ml-5 bg-transparent" onclick="back()"><i style="color: white; font-size: 30px" class="fa fa-arrow-left" aria-hidden="true"></i></button>
        </div>
        <div class="col-11">
            <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">Packing / SN Checker</p>
            <p class="text-white font-weight-bold pl-2" style="font-size: 25px">DELIVERY ORDER</p>
        </div>
    </div>
</div>

<div class="container-xxl p-5">
    <form action="<?php echo base_url("CounterController/updatesalesorder") ?>" Method="POST" id="form">
        <input type="hidden" id="idso" name="idso">
        <div class="row">
            <div class="col-6">
                <div class="card bay">
                    <div class="card-body p-5">
                        <div class="row d-flex justify-content-between">
                            <div class="col-9-half">
                                <p class="fw lh-1 pl-3" style="font-size: 20px;">
                                    <?php if ($data[0]["nopesanan"] == "") { ?>
                                        No. Pesanan <?php echo $data[0]["codeso"] ?>
                                    <?php } else { ?>
                                        No. Pesanan <?php echo $data[0]["nopesanan"] ?>
                                    <?php } ?>
                                    <br>
                                    <span><?php echo $data[0]["typeorder"] ?></span>
                                </p>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-outline-primary" onclick="printDiv('resi')">Cetak Nomor Resi Pengiriman</button>
                            </div>
                            <div class="col-8 lh-1 py-2">
                                <p class="lh-1" style="font-size: 20px;"><b>Nama Pemesan</b><br>
                                    <span style="font-size: 16px;"><?php echo $data[0]["namecust"] ?></span>
                                </p>
                            </div>
                            <div class="col-4 lh-1 py-2">
                                <p class="lh-1" style="font-size: 20px;"><b>Nomor Resi</b><br>
                                    <input type="number" name="noresi" value="<?php echo $data[0]['noresi'] ?>">
                                </p>
                            </div>
                            <div class="col-8 lh-1 py-2">
                                <p class="lh-1" style="font-size: 20px;"><b>Alamat</b><br>
                                    <span style="font-size: 16px;"><?php echo $data[0]["delivaddr"] ?></span>
                                </p>
                            </div>
                            <div class="col-4 lh-1 py-2">
                                <p class="lh-1" style="font-size: 20px;"><b>Jasa Pengiriman</b><br>
                                    <input type="text" name="jasapengirim" value="<?php echo $data[0]['jasapengirim'] ?>">
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="lh-1" style="font-size: 20px;"><b>Delivery Date</b><br>
                                    <span style="font-size: 16px;"><?php echo $data[0]["delivdate"] ?></span>
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="lh-1" style="font-size: 20px;"><b>Delivery Cost</b><br>
                                    <span style="font-size: 16px;">Rp.<?php echo $data[0]["delivfee"] ?></span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card bay" style="display: none;" id="resi">
                    <div class="card-header pl-5 border-0">
                        <div class="row d-flex justify-content-between">
                            <div class="col-8">
                                <img src="<?= base_url($data1["logo"]) ?>" width="15%" alt="">
                            </div>
                            <div class="col-4" style="font-size: 24px">
                                <div style="line-height: 0.5rem;">
                                    <p style="float:right"><b><?php echo $data[0]["delivdate"] ?></b></p>
                                    <p style="float:right"><b> <?php if ($data[0]["nopesanan"] == "") { ?>
                                                Order #<?php echo $data[0]["codeso"] ?>
                                            <?php } else { ?>
                                                Order #<?php echo $data[0]["nopesanan"] ?>
                                            <?php } ?>
                                        </b></p>
                                </div>
                                <!-- <p style="float:right"> <b>Kurir :</b> <?php echo $data[0]["typeorder"] ?></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body pl-5">
                        <p style="border-top: 2px solid black;"></p>
                        <div class="row d-flex justify-content-between pt-3">
                            <div class="col-5">
                                <div style="line-height: 1.8rem;">
                                    <p style="font-size: 24px;"><b>Kepada</b></p>
                                    <p style="font-size: 24px;"><?php echo $data[0]["namecust"] ?></p>
                                    <p style="font-size: 24px;"><?php echo $data[0]["delivaddr"] ?></p>
                                    <p style="font-size: 24px;">ph : <?php echo $data[0]["nohp"] ?></p>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div style="line-height: 1.8rem;">
                                    <p class="lh-1" style="font-size: 24px;"><b>Dari</b></p>
                                    <p style="font-size: 24px;"><?php echo $data1["namecomp"] ?></p>
                                    <p style="font-size: 24px;"><?php echo $data1["addr"] ?></p>
                                    <p style="font-size: 24px;">ph : <?php echo $data1["phone"] ?></p>
                                </div>
                            </div>
                        </div>
                        <p style="font-size: 24px;"> <b>Order Notes :</b> </p><br>
                        <p style="border-bottom: 2px solid black;"></p>
                        <p style="font-size: 40px;">Item Details</p>
                        <table class="table mt-4" style="border: 3px solid black;">
                            <thead style="border: 3px solid black;">
                                <tr>
                                    <th style="font-size: 24px; width: 10%" scope="col">No</th>
                                    <th style="font-size: 24px; width: 40%" scope="col">Item</th>
                                    <th style="font-size: 24px; width: 15%" scope="col">Quantity</th>
                                    <th style="font-size: 24px; width: 35%" scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if ($data[0]["data"] != "") : $a = 0; ?>
                                    <?php foreach ($newdata1 as $key) : ?>
                                        <?php if ($a % 2 == 0) { ?>
                                            <tr>
                                            <?php } else { ?>
                                            <tr style="background: #eeeeee">
                                            <?php } ?>
                                            <td style="font-size: 24px;"><?= $i++ ?></td>
                                            <td style="font-size: 24px;"><?php echo $key["nameitem"] ?></td>
                                            <td style="font-size: 24px;"><?php echo $key["qtyorder"] ?></td>
                                            <td style="font-size: 24px;"><?php echo number_format($key["totalprice"], 0, "", ".") ?></td>
                                            </tr>
                                        <?php $a++;
                                    endforeach ?>
                                    <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card bay my-4">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-12">
                                <p>Jumlah Produk : <?php echo $data[0]["totalso"] ?></p>
                                <table class="table ">
                                    <thead style="background-color: orange;color: white">
                                        <tr>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Qty. Order</th>
                                            <th scope="col">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: whtie">
                                        <?php if ($data[0]["data"] != "") : $a = 0; ?>
                                            <?php foreach ($newdata1 as $key) : ?>
                                                <?php if ($a % 2 == 0) { ?>
                                                    <tr>
                                                    <?php } else { ?>
                                                    <tr style="background: #eeeeee">
                                                    <?php } ?>

                                                    <td><?php echo $key["nameitem"] ?></td>
                                                    <td><?php echo $key["sku"] ?></td>
                                                    <td><?php echo $key["qtyorder"] ?></td>
                                                    <td><?php echo number_format(intval($key["totalprice"]), 0, "", ".") ?> <input type="hidden" name="pricebuyitem[]" id="item-<?php echo $key["iditem"] ?>"> <input type="hidden" name="iditemx[]" value="<?php echo $key["iditem"] ?>">
                                                        <input type="hidden" id="itempo-<?php echo $key["iditem"] ?>"> <input type="hidden" id="jmlpo-<?php echo $key["iditem"] ?>">
                                                    </td>

                                                    </tr>
                                                <?php $a++;
                                            endforeach ?>
                                            <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bay">
                    <div class="card-body p-5">
                        <div class="row">
                            <p class="fw" style="font-size: 24px; border-bottom: 4px solid orange">CEK SERIAL NUMBER PRODUK</p>
                            <div class="col-12">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-9">
                                        <p class="fw">Scan Serial Number</p>
                                    </div>
                                    <div class="col-3">
                                        <label class="switch">
                                            <input type="checkbox" value="1" checked id="status" onclick="change()">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text ig" id="basic-addon1">SN. Awal</span>
                                    <input type="text" onfocus="this.select();" class="form-control col-9" name="snawal" id="snawal" placeholder="Masukan Serial Number Produk Disini" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3" id="snakhirs">
                                    <span class="input-group-text ig" id="basic-addon1">SN. Akhir</span>
                                    <input type="text" onfocus="this.select();" class="form-control col-9" id="snakhir" name="snakhir" placeholder="Masukan Serial Number Produk Disini" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <button class="btn" type="button" onclick="ceksn()" id="valid" style="width: 86.3%;background-color: orange; color: white">Validasi</button>
                                <br><br><br>
                            </div>

                            <p class="fw" style="font-size: 24px; border-bottom: 4px solid orange">LIST VALIDASI PRODUK</p>
                            <table class="table ">
                                <thead style="background-color: orange;color: white">
                                    <tr>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">SN. awal</th>
                                        <th scope="col">SN. Akhir</th>
                                        <th scope="col">Expire date</th>
                                        <th scope="col">Qty</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: whtie" id="bodyx">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-4 bay">
                    <div class="card-body">
                        <button class="btn" id="selesai" type="button" onclick="done()" style="background-color: orange; color: white" disabled> Selesai</button>
                        <button class="btn" type="button" onclick="cancel(<?php echo $data[0]['idso'] ?>)" style="background-color: orange; color: white"> Batalkan Pesanan</button>
                        <!-- <div class="col-4">
                                <button class="btn" type="button" onclick="cancel(<?php echo $data[0]['idso'] ?>)" style="background-color: orange; color: white"> Cancel</button>
                            </div> -->
                    </div>
                </div>
            </div>

            <input type="hidden" id="idso" name="idso" value="<?php echo $data[0]['idso'] ?>">
            <!-- <input type="hidden" id="iduser" name="iduser" value="<?php echo $iduser ?>"> -->
            <input type="hidden" id="idcust" name="idcust" value="<?php echo $data[0]['idcust'] ?>">
            <input type="hidden" id="delivaddr" name="delivaddr" value="<?php echo $data[0]['delivaddr'] ?>">
            <input type="hidden" id="idwh" name="idwh" value="<?php echo $data[0]["data"][0]["idwh"] ?>">
    </form>

</div>
</div>


<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }


    const snawal = [];
    const snakhir = [];
    const iditem = [];


    function change() {
        if ($('#status').val() == 1) {
            $('#status').val(0);
            $('#snakhir').val("");
            $('#snakhirs').hide();

        } else {
            $('#status').val(1)
            $('#snakhir').val("");
            $('#snakhirs').show();
        }
    }

    $(document).ready(function() {
        $(window).keydown(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });

    // Get the input field
    var input = document.getElementById("snawal");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            if ($('#status').val() == 1) {
                document.getElementById("snakhir").focus();
            } else {
                document.getElementById("valid").click();
            }

        }
    });

    var inputs = document.getElementById("snakhir");

    // Execute a function when the user releases a key on the keyboard
    inputs.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("valid").click();
        }
    });


    function aktif() {
        if (confirm("Apakah Anda Akan Scan dengan SN terurut ??")) {
            document.getElementById('snakhir').readOnly = false;
            document.getElementById('valid').disabled = false;
            document.getElementById('snakhir').setAttribute('onclick', 'nonaktif()');
        }
    }


    function nonaktif() {
        if (confirm("Apakah Anda yakin ingin menonaktifkan SN Akhir ??")) {
            document.getElementById('snakhir').readOnly = true;
            document.getElementById('valid').disabled = true;
            document.getElementById('snakhir').setAttribute('onclick', 'aktif()');

        }
    }

    function back() {
        window.location.href = "<?php echo base_url('CounterController/deliveryorder') ?>";
    }


    function ceksn() {
        console.log($('#snakhir').val())
        if ($('#snawal').val() != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('CounterController/ceksn') ?>",
                data: 'snno1=' + $('#snawal').val() + '&snno2=' + $('#snakhir').val() + '&idso=' + $('#idso').val(),
                dataType: "json",
                success: function(hasil) {

                    // console.log(hasil);
                    var loop = 0;
                    var berhasil = 0;
                    var wrongwh = 0;

                    if (hasil["pesan"] == "Success") {

                        var datax = <?php echo json_encode($newdata1) ?>;
                        for (var i = 0; i < datax.length; i++) {
                            var snawal1;
                            var snakhir1;
                            if ($('#snakhir').val().length >= 20) {

                                snakhir1 = $('#snakhir').val().slice(0, -1);
                            } else {
                                snakhir1 = $('#snakhir').val();
                            }
                            if ($('#snawal').val().length >= 20) {
                                snawal1 = $('#snawal').val().slice(0, -1)
                            } else {
                                snawal1 = $('#snawal').val()
                            }

                            console.log(snakhir1.substr(snakhir1.length - 5) + " " + snawal1.substr(snawal1.length - 5))
                            var qty = 0;
                            if (snawal1.length > 15 && snakhir1.length > 15) {
                                qty = Number(snakhir1.substr(snakhir1.length - 5) - snawal1.substr(snawal1.length - 5)) + Number(1)
                            } else {
                                qty = Number(snakhir1) - Number(snawal1) + Number(1);
                            }



                            if (datax[i]["iditem"] == hasil["data"][0]["iditem"]) {
                                console.log(datax[i]["qtyorder"] + "<" + (Number($('#snakhir').val() - $('#snawal').val()) + Number(1)))

                                var snawall;
                                var snakhirr
                                if ($('#snakhir').val().length > 15) {
                                    snakhirr = $('#snakhir').val().substr(15);
                                } else {
                                    snakhirr = $('#snakhir').val();
                                }

                                if ($('#snawal').val().length > 15) {
                                    snawall = $('#snawal').val().substr(15);
                                } else {
                                    snawall = $('#snawal').val();
                                }

                                if (datax[i]["qtyorder"] < (Number(snakhirr - snawall) + Number(1))) {
                                    alert("SN yang di scan melebihi qty order");
                                    berhasil++

                                } else {
                                    var idwh = 0;
                                    var datawh = <?php echo json_encode($data3); ?>;
                                    for (var c = 0; c < datawh.length; c++) {
                                        if (datawh[c]["attrib3"] == 'counter') {
                                            idwh = datawh[c]["idcomm"];
                                        }
                                    }
                                    console.log(idwh + " " + hasil["data"][0]["idwh"])
                                    console.log(hasil["data"][0]);

                                    if (hasil["data"][0]["idwh"] != idwh) {
                                        alert('SN ini tidak dalam counter')
                                        wrongwh++
                                        break;
                                    }

                                    for (var a = 0; a < snawal.length; a++) {
                                        console.log(snawal[a] + "==" + $('#snawal').val())
                                        if (snawal[a] == $('#snawal').val()) {
                                            alert('SN Telah Di Scan');
                                            loop++;
                                            berhasil++
                                            break;

                                        }
                                    }
                                    for (var a = 0; a < snakhir.length; a++) {
                                        console.log(snakhir[a] + "==" + $('#snakhir').val())
                                        if (snakhir[a] == $('#snawal').val()) {
                                            alert('SN Telah Di Scan');
                                            loop++;
                                            berhasil++
                                            break;

                                        }
                                    }

                                    if ($('#snakhir').val() != "") {
                                        console.log("OK");
                                        for (var a = 0; a < snawal.length; a++) {
                                            if (snawal[a] == $('#snakhir').val()) {
                                                alert('SN Telah Di Scan');
                                                loop++;
                                                berhasil++
                                                break;

                                            }
                                        }
                                        for (var a = 0; a < snakhir.length; a++) {
                                            if (snakhir[a] == $('#snakhir').val()) {
                                                alert('SN Telah Di Scan');
                                                loop++;
                                                berhasil++
                                                break;

                                            }
                                        }
                                    }

                                    if (loop == 0 && wrongwh == 0 && berhasil == 0) {
                                        if ($('#snakhir').val() != "") {
                                            var long = qty
                                            for (var x = 0; x < long; x++) {
                                                iditem.push(hasil["data"][0]["iditem"]);
                                            }
                                        } else {
                                            iditem.push(hasil["data"][0]["iditem"]);
                                        }




                                        const aCount = new Map([...new Set(iditem)].map(
                                            x => [x, iditem.filter(y => y === x).length]
                                        ));
                                        console.log(hasil["data"][0]["iditem"])
                                        if (aCount.get(hasil["data"][0]["iditem"]) > datax[i]["qtyorder"]) {
                                            alert("Product yang discan telah melebihi qty order");
                                            berhasil++
                                            iditem.splice(iditem.indexOf(hasil["data"][0]["iditem"]), 1);

                                            break

                                        } else {

                                            var baris = `
                                            <tr>
                                                <td>` + hasil["data"][0]["nameitem"] + ` <input type="hidden" id="iditem[]" name="iditem[]" value="` + hasil["data"][0]["iditem"] + `"><input type="hidden" id="nameitem[]"  name="nameitem[]" value="` + hasil["data"][0]["nameitem"] + `" ?></td>
                                                <td>` + $('#snawal').val() + ` <input type="hidden" name="snawal[]" value="` + $('#snawal').val() + `"> <input type="hidden" name="snid[]" value="` + hasil["data"][0]["snid"] + `"></td>
                                               
                                                `;
                                            if ($('#snakhir').val() != "") {
                                                baris += `

                                                      <td>` + $('#snakhir').val() + ` <input type="hidden" name="snakhir[]" value="` + $('#snakhir').val() + `"></td>
                                                    <td>` + hasil["data"][0]["expdate"] + ` <input type="hidden" name="expdate[]" value="` + hasil["data"][0]["expdate"] + `"> </td>
                                                    <td>` + qty + ` <input type="hidden" name="qty[]" value="` + qty + `"> </td>
                                                       
                                                    `;

                                            } else {
                                                baris += `
                                                    <td>` + $('#snakhir').val() + ` <input type="hidden" name="snakhir[]" value="0"></td>
                                                <td>` + hasil["data"][0]["expdate"] + ` <input type="hidden" name="expdate[]" value="` + hasil["data"][0]["expdate"] + `"> </td>
                                                    <td>1 <input type="hidden" name="qty[]" value="1"> </td>`

                                            }
                                            baris += `</tr>`;


                                            $('#bodyx').append(baris);
                                            document.getElementById('selesai').disabled = false;
                                            console.log(baris)
                                            snawal.push($('#snawal').val());
                                            if ($('#snakhir').val() != "") {
                                                snakhir.push($('#snakhir').val());
                                            }

                                            if ($('#item-' + hasil["data"][0]["iditem"] + '').val() == "") {
                                                $('#item-' + hasil["data"][0]["iditem"] + '').val(hasil["data"][0]["hargabeli"])
                                                $('#itempo-' + hasil["data"][0]["iditem"] + '').val(hasil["data"][0]["idpo"])
                                                $('#jmlpo-' + hasil["data"][0]["iditem"] + '').val(Number($('#jmlpo-' + hasil["data"][0]["iditem"] + '').val()) + Number(1))
                                            } else if ($('#itempo-' + hasil["data"][0]["iditem"] + '').val() != hasil["data"][0]["idpo"]) {
                                                $('#itempo-' + hasil["data"][0]["iditem"] + '').val(hasil["data"][0]["idpo"])
                                                $('#jmlpo-' + hasil["data"][0]["iditem"] + '').val(Number($('#jmlpo-' + hasil["data"][0]["iditem"] + '').val()) + Number(1))
                                                $('#item-' + hasil["data"][0]["iditem"] + '').val((Number(hasil["data"][0]["hargabeli"]) + Number($('#item-' + hasil["data"][0]["iditem"] + '').val())) / $('#jmlpo-' + hasil["data"][0]["iditem"] + '').val())
                                            }
                                            console.log(hasil["data"][0]["hargabeli"])

                                            $('#snawal').val("");
                                            $('#snakhir').val("");


                                            berhasil++;
                                            break

                                        }




                                    }





                                }
                            }
                        }

                        if (berhasil == 0) {
                            alert("SN Salah Item");

                        }




                    } else {
                        alert(hasil["pesan"]);
                    }


                }
            });
        } else {
            alert('Tolong input SN terlebih dahulu');
        }

    }


    function done() {
        var ok = "";
        var datax = <?php echo json_encode($newdata1) ?>;
        var obj = {};
        console.log(datax)
        console.log(iditem)

        if (confirm("Apakah Semua Item Telah Siap Dikirim ??")) {

            for (var i = 0, j = iditem.length; i < j; i++) {
                if (obj[iditem[i]]) {
                    obj[iditem[i]]++;
                } else {
                    obj[iditem[i]] = 1;
                }
            }

            for (var i = 0; i < datax.length; i++) {

                if (datax[i]["usesn"] == 'Y') {
                    if (obj[datax[i]["iditem"]] != datax[i]["qtyorder"]) {
                        ok = "Not";
                    }
                }

                console.log(obj[datax[i]["iditem"]] + " " + datax[i]["qtyorder"])
            }
            if (ok != "") {
                alert("Jumlah Item yang terscan tidak sesuai dengan data");
            } else {
                $('#form').submit();
            }

        }
    }
    start()

    function start() {
        var datax = <?php echo json_encode($newdata1) ?>;
        var baris = '';
        var usesn = 0;
        console.log(datax)
        for (var i = 0; i < datax.length; i++) {
            if (datax[i]["usesn"] == 'Y') {
                usesn++
            } else {
                $('#item-' + datax[i]["iditem"]).val(datax[i]["hargabeli"])
                var baris = baris + `
                                            <tr>
                                                <td>` + datax[i]["nameitem"] + ` <input type="hidden" id="iditem[]" name="iditem[]" value="` + datax[i]["iditem"] + `"><input type="hidden" id="nameitem[]"  name="nameitem[]" value="` + datax[i]["nameitem"] + `" ?></td>
                                                <td>0 <input type="hidden" name="snawal[]" value="0"> <input type="hidden" name="snid[]" value="` + datax[i]["snid"] + `"></td>
                                                <td>0<input type="hidden" name="snakhir[]" value="0"></td>
                                                    <td>9999-12-31 <input type="hidden" name="expdate[]" value="9999-12-31"> </td>
                                                    <td>` + datax[i]["qtyorder"] + ` <input type="hidden" name="qty[]" value="` + datax[i]["qtyorder"] + `"> </td>
                                                 </tr>   
                                                `;

            }
        }
        $('#bodyx').append(baris);
        console.log(usesn)
        if (usesn == 0) {
            document.getElementById('selesai').disabled = false;
        }
    }

    function cancel(x) {
        if (confirm("Anda Yakin Ingin Membatalkan Orderan Ini")) {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('CounterController/cancelorder') ?>',
                data: 'idso=' + x,
                dataType: 'json',
                success: function(hasil) {
                    // console.log()
                    if (hasil == "Success") {
                        alert(hasil)
                        window.location.href = 'deliveryorder';
                        // location.reload();
                    } else {
                        alert(hasil)
                    }
                }
            });
        }
    }
</script>