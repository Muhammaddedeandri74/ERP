<style>
    .upc {
        text-transform: uppercase;
    }

    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .ta {
        text-align: right;
        pa
    }

    .fw {
        font-weight: bold;
    }
</style>



<?php

$upload = json_decode(base64_decode($data));




$idtransaksi = "";
$transaksi = array();
foreach ($upload as $key) {
    if ($key->{'ID Transaksi'} != $idtransaksi) {
        array_push($transaksi, $key->{'ID Transaksi'});
        $idtransaksi = $key->{'ID Transaksi'};
    }
}



foreach ($transaksi as $key) {
    if ($data5 != "Not Found") {
        foreach ($data5 as $keyx) {

            if ($key == $keyx["nopesanan"]) {
                unset($transaksi[array_search($key, $transaksi)]);
                break;
            }
        }
    }
}




// print_r($datatransaksi);


// if (count($transaksi) == 0) {
//     echo"<script>if(confirm('Excel Ini Sudah Diinput Ke Sales Order Sebelumnya')){ window.location.replace('".base_url('Employe/SalesOrder')."')}</script>";

// }

echo $this->session->flashdata('message');
$this->session->set_flashdata('message', '');



?>
<form action="<?php echo base_url('Employe/insertsalesorder') ?>" method="POST" id="form">
    <input type="hidden" name="from" value="<?php echo $data ?>">
    <div class="container-xxl text-white pt-3" style="background-color: purple;">
        <div class="row d-flex justify-content-between">
            <div class="col-1">
                <a href="<?php echo base_url('Employe/SalesOrder') ?>"><i class="fa fa-arrow-circle-left fa-3x pt-4 text-white" style="float: right;" aria-hidden="true"></i></a>
            </div>
            <div class="col-7">
                <p class="tu font-weight-bold " style="font-size: 13px">SALES ORDER / Order / Upload Excel</p>
                <p class="tu font-weight-bold upc" style="font-size: 25px">form order excel</p>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>

    <div class="container-xxl" style="background-color: #F9F3DF;">
        <div class="row">
            <div class="col-4 bg-light">
                <div class="row">
                    <div class="col py-3 ml-3">
                        <div class="card bays">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between" style="color: purple">
                                    <div class="col-7" style="line-height: 0.5rem;">
                                        <h4 class="upc" style="color: purple;">list data order</h4>
                                        <p><?php echo count($transaksi) ?> Sales Order</p>
                                    </div>
                                    <div class="col-5 pt-2 ta" style="line-height: 0.5rem;">
                                        <p>Tanggal Transaksi</p>
                                        <p><?php echo date('Y/m/d') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-6">
                        <p class="upc pl-3 pt-3" style="color: purple">pilih semua order ready</p>
                    </div>
                    <div class="col-6">
                        <button style="float: right;margin-top: 1vh" class="btn btn-outline-success" type="button" onclick="processall()">Proses All</button>
                    </div>
                </div>
                <?php if (count($transaksi) > 6) { ?>
                    <div class="row" style="overflow-y: scroll;height: 67.9vh">
                    <?php } else { ?>
                        <div class="row" style="margin-bottom: 26.8vh">
                        <?php } ?>
                        <?php foreach ($transaksi as $key) : ?>
                            <?php foreach ($upload as $keyx) : ?>
                                <?php if ($key == $keyx->{'ID Transaksi'}) : ?>

                                    <div class="col-12 pb-3" onclick="detail('<?php echo $keyx->{"ID Transaksi"} ?>')" style="cursor: pointer;">
                                        <div class="card bays ml-3">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-between" style="color: purple">
                                                    <div class="col-1">
                                                        <div class="form-check">
                                                            <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault[<?php echo $keyx->{'ID Transaksi'} ?>]"> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="line-height: 1rem;">
                                                        <p class="fw">No. Pesanan <?php echo $keyx->{'ID Transaksi'} ?></p>
                                                        <p><?php echo $keyx->From ?></p>
                                                        <p><?php echo $keyx->Pembeli ?></p>
                                                    </div>


                                                    <?php $count = 0;
                                                    foreach ($upload as $keyxx) : ?>
                                                        <?php if ($keyxx->{'ID Transaksi'} == $key) { ?>
                                                            <?php $count++ ?>
                                                        <?php } ?>
                                                    <?php endforeach ?>

                                                    <div class="col-3 pt-2 ta">
                                                        <p><?php echo $count ?> Item</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php break;
                                endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>



                        </div>
                    </div>
                    <div class="col-8" style="height: 100%;">
                        <div class="row d-flex justify-content-between">
                            <div class="col-12 pt-3">
                                <div class="card bays">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-between py-3">
                                            <div class="col-9" style="line-height: 0.5rem;" id="nopes">
                                                <p class="upc fw">No. Pesanan -</p>
                                                <p>-</p>
                                            </div>
                                            <div class="col-3" id="stapes">
                                                <p class="btn btn-outline-success rounded-pill">-</p>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between pt-2">
                                            <div class="col-4" style="line-height: 0.5rem;" id="tages">
                                                <p class="fw">Tanggal Tansaksi</p>
                                                <p>-</p>
                                            </div>
                                            <div class="col-5" style="line-height: 0.5rem;" id="napes">
                                                <p class="fw">Nama Pemesan</p>
                                                <p>-</p>
                                            </div>
                                            <div class="col-3" style="line-height: 0.5rem;" id="bipeng">
                                                <p class="fw">Biaya Pengirim</p>
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between pt-3">
                                            <div class="col-9" style="line-height: 0.5rem;" id="alamat">
                                                <p class="fw">Alamat</p>
                                                <p>-</p>
                                            </div>
                                            <div class="col-3" style="line-height: 0.5rem;" id="deldate">
                                                <p class="fw">Tanggal Pengiriman</p>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between pt-3">
                                            <div class="col-9" style="line-height: 0.5rem;">
                                                <p class="fw"></p>
                                                <p>-</p>
                                            </div>
                                            <div class="col-3" style="line-height: 0.5rem;" id="jasa">
                                                <p class="fw">Jasa Pengiriman</p>
                                                <p>-</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 pl-2">
                            <p class="upc fw">Daftar item yang dipesan</p>
                        </div>
                        <div>
                            <table class="table" style="background-color: white;">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Qty. Order</th>
                                        <th scope="col">Ready Stock</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyx">

                                </tbody>
                            </table>
                        </div>
                        <div>
                            <p class="pl-2 pt-2" id="jmlitem">Jumlah Item : -</p>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-5">
                                <div class="card bays" style="background-color: #FFC4E1;border-radius:10px">
                                    <div class="card-body">
                                        <p style="color:purple; font-weight:bold">Quick Reminder</p>
                                        <hr>
                                        <p>Periksa dengan teliti setiap Pesanan Yang anda buat. Pastikan Stock barang tidak ada yang minus atau kurang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card" style="background-color: purple;">
                                    <div class="card-body py-5">
                                        <center>
                                            <p class="upc fw text-white">Summary bill</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5" style="background-color: white;">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6 pt-4" style="text-align: right;line-height:0.8rem">
                                        <p>Subtotal</p>
                                        <p>Biaya Pengiriman</p>
                                    </div>
                                    <div class="col-6 pt-4" style="line-height:0.8rem" id="bayar">
                                        <p>-</p>
                                        <p>-</p>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class=" col-6" style="text-align: right;">
                                        <p>Grand Total</p>
                                    </div>
                                    <div class="col-6" id="total">
                                        <p>-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-7"></div>
                            <!-- <div class="col-2">
                         <button class="btn btn-danger text-white upc fw" type="button" id="hapus" disabled>Hapus Pesanan</a>
                    </div> -->
                            <div class="col-3">
                                <button class="btn btn-warning text-white upc fw" type="button" id="pending" disabled onclick="makeorder()">Masukan Ke Pending List</a>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-success text-white upc fw" type="button" id="buat" disabled onclick="makeorder()">Buat Pesanan</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>

<form>
    <table class="table">

        <thead>

        </thead>
    </table>


</form>


<script type="text/javascript">
    function processall() {
        if (confirm("Apakah Anda Yakin Akan memproses semua Data ??")) {
            alert("Mohon Tunggu Beberapa saat")
            $('#form').attr('action', '<?php echo base_url('Employe/uploadAllExcel') ?>');
            $('#form').submit();

        }
    }

    function detail(x) {

        var data = <?php echo json_encode($upload) ?>;
        console.log(data)
        var item = <?php echo json_encode($data3) ?>;
        console.log(item)
        var locitem = <?php echo json_encode($data6) ?>;
        console.log(locitem);

        var baris = '';
        var cant = 0;
        var subtotal = 0;
        var subtotals = 0;
        var jmlitem = 0;

        for (var i = 0; i < data.length; i++) {
            if (data[i]["ID Transaksi"] == x) {

                $('#nopes').html(` <p class="upc fw">No. Pesanan ` + data[i]['ID Transaksi'] + `</p><p>` + data[i]["From"] + `</p><input type="hidden" name="nopes" value = "` + data[i]['ID Transaksi'] + `">`)

                if (data[i]["From"].toLowerCase() == "web") {
                    $('#nopes').append('<input type="hidden" name="typeso" value = "001">')
                } else if (data[i]["From"].toLowerCase() == "tokopedia") {
                    $('#nopes').append('<input type="hidden" name="typeso" value = "002">')
                } else if (data[i]["From"].toLowerCase() == "shopee") {
                    $('#nopes').append('<input type="hidden" name="typeso" value = "003">')
                } else {
                    $('#nopes').append('<input type="hidden" name="typeso" value = "004">')
                }
                $('#napes').html(` <p class="fw">Nama Pemesan</p><p>` + data[i]["Pembeli"] + `</p> <input type="hidden" name="idcust" id="idcust" > <input type="hidden" id="nacust" name="nacust" value="` + data[i]["Pembeli"] + `"> <input type="hidden" id="numcust" name="numcust" value="` + data[i]["HP Pembeli"] + `">`)
                $('#tages').html(` <p class="fw">Tanggal Transaksi</p><p>` + data[i]["Tanggal Transaksi"] + `</p> <input type="hidden" id="datetrans" name="datetrans" value="` + data[i]["Tanggal Transaksi"] + `">`)
                $('#bipeng').html(`<p class="fw">Biaya Pengirim</p><p>` + data[i]["Biaya Pengiriman"] + `</p><input type="hidden" name="delivfee" value=` + data[i]["Biaya Pengiriman"] + `>`)
                $('#jasa').html(`<p class="fw">Jasa Pengiriman</p><p>` + data[i]["Jasa Pengiriman"] + `</p><input type="hidden" name="jasapengirim" value=` + data[i]["Jasa Pengiriman"] + `>`)
                if (data[i]["Kecamatan Pembeli"] != null) {
                    $('#alamat').html(`  <p class="fw">Alamat</p><p>` + data[i]["Alamat Pembeli"] + `, ` + data[i]["Kecamatan Pembeli"] + `, ` +
                        data[i]["Kota Pembeli"] + `, ` + data[i]["Propinsi Pembeli"] + `, ` + data[i]["Kode Pos Pembeli"] + `</p><input type="hidden" id="delivaddr" name="delivaddr" value="` + data[i]["Alamat Pembeli"] + `, ` + data[i]["Kecamatan Pembeli"] + `, ` +
                        data[i]["Kota Pembeli"] + `, ` + data[i]["Propinsi Pembeli"] + `, ` + data[i]["Kode Pos Pembeli"] + `">`)

                } else {
                    $('#alamat').html(`  <p class="fw">Alamat</p><p>` + data[i]["Alamat Pembeli"] + `</p><input type="hidden" id="delivaddr" name="delivaddr" value="` + data[i]["Alamat Pembeli"] + `">`)
                }

                if (data[i]["Tanggal Pengiriman"] != null) {
                    $('#deldate').html(`<p class="fw">Delivery Date</p><p>` + data[i]["Tanggal Pengiriman"] + `</p><input type="hidden" name="delivdate" value=` + data[i]["Tanggal Pengiriman"] + `> </p><input type="hidden" name="noresi" value=` + data[i]["Kode Tracking"] + `>`)
                } else {
                    $('#deldate').html(`<p class="fw">Delivery Date</p><p>` + data[i]["Tanggal Pengiriman"] + `</p><input type="hidden" name="delivdate" value=` + data[i]["Tanggal Pengiriman"] + `> </p><input type="hidden" name="noresi" value=` + data[i]["Kode Tracking"] + `>`)
                }

                var idloc = 0;
                for (var l = 0; l < locitem.length; l++) {

                    if (data[i]["Propinsi Pembeli"].toLowerCase().includes(locitem[l]["namecomm"].toLowerCase())) {
                        idloc = locitem[l]["idcomm"];
                    }

                }

                for (var a = 0; a < item.length; a++) {
                    console.log(data[i]["SKU"] + " " + item[a]["sku"])
                    console.log(data[i]);

                    var vat = 0;
                    var hargabersih = 0;
                    if (data[i]["VAT"] != null) {
                        vat = data[i]["VAT"];
                        hargabersih = data[i]["Harga Dibayar"] - data[i]["VAT"];
                    } else {
                        vat = 0;
                        hargabersih = data[i]["Harga Dibayar"];
                    }

                    if (data[i]["SKU"] == item[a]["sku"]) {
                        console.log(item[a]["sku"]);
                        console.log(item[a]["nameitem"]);
                        console.log(item[a]["nameitem"]);

                        // console.log(data[i]["SKU"] + " " + item[a]["sku"])
                        // console.log(data[i]);
                        jmlitem++;

                        if (data[i]["Jumlah Produk"] > item[a]["qty"]) {
                            baris += '<tr style="background : red;color:white">'
                            cant++;
                        } else {
                            baris += '<tr>'
                        }



                        baris += ` <td>` + item[a]["nameitem"] + ` <input type="hidden" name="iditemx[]" value="` + item[a]["iditem"] + `"> <input type="hidden" name="idwh[]" value="` + item[a]["idwh"] + `"><input type="hidden" name="nameitemx[]" value="` + item[a]["nameitem"] + `"></td>
                                   <td>` + item[a]["sku"] + `<input type="hidden" name="skux[]" value="` + item[a]["sku"] + `"></td>
                                   <td>` + data[i]["Jumlah Produk"] + ` <input type="hidden" name="qtyorderx[]" value="` + data[i]["Jumlah Produk"] + `"><input type="hidden" name="qtyready[]" value="` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + `"></td>
                                   <td>` + item[a]["qty"] + `  <input type="hidden" name="pricex[]" value="` + hargabersih + `">  <input type="hidden" name="dpps[]" value="` + hargabersih + `">  <input type="hidden" name="hargaitem[]" value="` + data[i]["Harga Dibayar"] + `"></td>
                                    <td>` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + ` <input type="hidden" name="discx[]" value="0"><input type="hidden" name="hargabeli[]" value="` + item[a]["pricebuyitem"] + `"></td>
                                   <td>` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + ` <input type="hidden" name="subtotalxx[]" value="` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + `"> <input type="hidden" name="vat[]" value="` + vat + `"></td>
                                  </tr>
                                    `

                        subtotal = Number(subtotal) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])
                        subtotals = Number(subtotals) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])
                        console.log(baris);
                        break;
                    } else if (data[i]["Propinsi Pembeli"] != "") {
                        if (item[a]["id_location"] == idloc && data[i]["Nama Produk"].toLowerCase().includes(item[a]["nameitem"].toLowerCase())) {
                            // console.log(data[i]["Propinsi Pembeli"] + " " + locitem[l]["namecomm"].toLowerCase() + " " + a);
                            jmlitem++;

                            if (data[i]["Jumlah Produk"] > item[a]["qty"]) {
                                baris += '<tr style="background : red;color:white">'
                                cant++;
                            } else {
                                baris += '<tr>'
                            }

                            baris += ` <td>` + item[a]["nameitem"] + ` <input type="hidden" name="iditemx[]" value="` + item[a]["iditem"] + `"> <input type="hidden" name="idwh[]" value="` + item[a]["idwh"] + `"><input type="hidden" name="nameitemx[]" value="` + item[a]["nameitem"] + `"></td>
                                   <td>` + item[a]["sku"] + `<input type="hidden" name="skux[]" value="` + item[a]["sku"] + `"></td>
                                   <td>` + data[i]["Jumlah Produk"] + ` <input type="hidden" name="qtyorderx[]" value="` + data[i]["Jumlah Produk"] + `"><input type="hidden" name="qtyready[]" value="` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + `"></td>
                                   <td>` + item[a]["qty"] + `  <input type="hidden" name="pricex[]" value="` + hargabersih + `">  <input type="hidden" name="dpps[]" value="` + hargabersih + `">  <input type="hidden" name="hargaitem[]" value="` + data[i]["Harga Dibayar"] + `"></td>
                                    <td>` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + ` <input type="hidden" name="discx[]" value="0"><input type="hidden" name="hargabeli[]" value="` + item[a]["pricebuyitem"] + `"></td>
                                   <td>` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + ` <input type="hidden" name="subtotalxx[]" value="` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + `"> <input type="hidden" name="vat[]" value="` + vat + `"></td>
                                  </tr>
                                    `
                            subtotal = Number(subtotal) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])
                            subtotals = Number(subtotals) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])

                        } else if (data[i]["Nama Produk"].toLowerCase().includes(item[a]["nameitem"].toLowerCase())) {
                            jmlitem++;

                            if (data[i]["Jumlah Produk"] > item[a]["qty"]) {
                                baris += '<tr style="background : red;color:white">'
                                cant++;
                            } else {
                                baris += '<tr>'
                            }
                            baris += ` <td>` + item[a]["nameitem"] + ` <input type="hidden" name="iditemx[]" value="` + item[a]["iditem"] + `"> <input type="hidden" name="idwh[]" value="` + item[a]["idwh"] + `"><input type="hidden" name="nameitemx[]" value="` + item[a]["nameitem"] + `"></td>
                                   <td>` + item[a]["sku"] + `<input type="hidden" name="skux[]" value="` + item[a]["sku"] + `"></td>
                                   <td>` + data[i]["Jumlah Produk"] + ` <input type="hidden" name="qtyorderx[]" value="` + data[i]["Jumlah Produk"] + `"><input type="hidden" name="qtyready[]" value="` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + `"></td>
                                   <td>` + item[a]["qty"] + `  <input type="hidden" name="pricex[]" value="` + hargabersih + `">  <input type="hidden" name="dpps[]" value="` + hargabersih + `">  <input type="hidden" name="hargaitem[]" value="` + data[i]["Harga Dibayar"] + `"></td>
                                    <td>` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + ` <input type="hidden" name="discx[]" value="0"><input type="hidden" name="hargabeli[]" value="` + item[a]["pricebuyitem"] + `"></td>
                                   <td>` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + ` <input type="hidden" name="subtotalxx[]" value="` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + `"> <input type="hidden" name="vat[]" value="` + vat + `"></td>
                                  </tr>
                                    `

                            subtotal = Number(subtotal) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])
                            subtotals = Number(subtotals) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])

                        }
                    } else if (data[i]["Nama Produk"].toLowerCase().includes(item[a]["nameitem"].toLowerCase())) {
                        jmlitem++;

                        if (data[i]["Jumlah Produk"] > item[a]["qty"]) {
                            baris += '<tr style="background : red;color:white">'
                            cant++;
                        } else {
                            baris += '<tr>'
                        }

                        baris += ` <td>` + item[a]["nameitem"] + ` <input type="hidden" name="iditemx[]" value="` + item[a]["iditem"] + `"> <input type="hidden" name="idwh[]" value="` + item[a]["idwh"] + `"><input type="hidden" name="nameitemx[]" value="` + item[a]["nameitem"] + `"></td>
                                   <td>` + item[a]["sku"] + `<input type="hidden" name="skux[]" value="` + item[a]["sku"] + `"></td>
                                   <td>` + data[i]["Jumlah Produk"] + ` <input type="hidden" name="qtyorderx[]" value="` + data[i]["Jumlah Produk"] + `"><input type="hidden" name="qtyready[]" value="` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + `"></td>
                                   <td>` + item[a]["qty"] + `  <input type="hidden" name="pricex[]" value="` + hargabersih + `">  <input type="hidden" name="dpps[]" value="` + hargabersih + `">  <input type="hidden" name="hargaitem[]" value="` + data[i]["Harga Dibayar"] + `"></td>
                                    <td>` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + ` <input type="hidden" name="discx[]" value="0"><input type="hidden" name="hargabeli[]" value="` + item[a]["pricebuyitem"] + `"></td>
                                   <td>` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + ` <input type="hidden" name="subtotalxx[]" value="` + data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"] + `"> <input type="hidden" name="vat[]" value="` + vat + `"></td>
                                  </tr>
                                    `

                        subtotal = Number(subtotal) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])
                        subtotals = Number(subtotals) + Number(data[i]["Harga Dibayar"] * data[i]["Jumlah Produk"])

                    }

                }

            }
        }


        $('#bodyx').html(baris);

        $('#jmlitem').html('Jumlah Item : ' + jmlitem);


        $('#bayar').html(`<p>` + subtotal + `</p><p>` + data[0]["Biaya Pengiriman"] + `</p>`)
        $('#total').html(`<p>` + (Number(subtotal) + Number(data[0]["Biaya Pengiriman"])) + `</p>`)

        if (cant > 0) {
            $('#stapes').html(` <p class="btn btn-outline-danger rounded-pill">Tidak Dapat Diprocess</p> <input type="hidden" name="idcurrency" value = "14"><input type="hidden" name="paymentmethod" value = "29"><input type="hidden" name="qty" value = "` + jmlitem + `"><input type="hidden" name="subtotals" value = "` + subtotals + `"><input type="hidden" name="grandtotals" value = "` + subtotals + `"> <input type="hidden" id="pendings" value="1">`)
            document.getElementById("buat").disabled = true;
            document.getElementById("pending").disabled = false;
        } else {
            $('#stapes').html(` <p class="btn btn-outline-success rounded-pill">Dapat Diprocess</p> <input type="hidden" name="idcurrency" value = "14"><input type="hidden" name="paymentmethod" value = "29"><input type="hidden" name="qty" value = "` + jmlitem + `"><input type="hidden" name="subtotals" value = "` + subtotals + `"><input type="hidden" name="grandtotals" value = "` + subtotals + `"> <input type="hidden" id="pendings" value="0">`)
            document.getElementById("buat").disabled = false;
            document.getElementById("pending").disabled = true;
        }
        if (baris == "") {
            document.getElementById("buat").disabled = true;
        }

        // document.getElementById("hapus").disabled = false;
    }



    function makeorder() {
        var name = $('#nacust').val();
        var delivaddr = $('#delivaddr').val();
        var nocust = $('#numcust').val();
        // console.log(name+" "+delivaddr+" "+nocust+" "+$('#pendings').val());
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Employe/cekcust') ?>",
            data: 'name=' + name + '&delivaddr=' + delivaddr + '&nocust=' + nocust,
            dataType: "json",
            success: function(hasil) {
                $('#idcust').val(hasil)
                if (confirm("Yakin Ingin Membuat Order Ini ?")) {
                    if ($('#pendings').val() == "0") {
                        $('#form').attr('action', '<?php echo base_url('Employe/insertsalesorder') ?>');
                        $('#form').submit();
                    } else {
                        $('#form').attr('action', '<?php echo base_url('Employe/insertsalesorderpending') ?>');
                        $('#form').submit();
                    }

                }

                // console.log(hasil)
            }

        });
    }
</script>