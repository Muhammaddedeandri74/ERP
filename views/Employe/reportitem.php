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
$sku = "";
$transaksi = array();
foreach ($upload as $key) {
    if ($key->{'sku'} != $idtransaksi) {
        array_push($transaksi, $key->{'sku'});
        $idtransaksi = $key->{'sku'};
    }
}
foreach ($transaksi as $key) {
    foreach ($data5 as $keyx) {
        if ($key == $keyx["nopesanan"]) {
            unset($transaksi[array_search($key, $transaksi)]);
            break;
        }
    }
}
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
                <p class="tu font-weight-bold " style="font-size: 13px">MASTER ITEM / ITEMS / Upload Excel</p>
                <p class="tu font-weight-bold upc" style="font-size: 25px">form item excel</p>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>

    <div class="container-xxl" style="background-color: #F9F3DF;">
        <div class="row">
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
                $('#bipeng').html(`<p class="fw">Biaya Pengirim</p><p>` + data[i]["Biaya Pengiriman"] + `</p><input type="hidden" name="delivfee" value=` + data[i]["Biaya Pengiriman"] + `>`)
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
                for (var a = 0; a < item.length; a++) {
                    if (data[i]["SKU"] == item[a]["sku"]) {
                        console.log(data[i]["SKU"] + " " + item[a]["sku"])
                        console.log(data[i]);
                        jmlitem++;
                        if (data[i]["Jumlah Produk"] > item[a]["qty"]) {
                            baris += '<tr style="background : red;color:white">'
                            cant++;
                        } else {
                            baris += '<tr>'
                        }
                        baris += `<td>` + item[a]["nameitem"] + ` <input type="hidden" name="iditemx[]" value="` + item[a]["iditem"] + `"> <input type="hidden" name="idwh[]" value="` + item[a]["idwh"] + `"><input type="hidden" name="nameitemx[]" value="` + item[a]["nameitem"] + `"></td>
                                    <td>` + data[i]["SKU"] + `<input type="hidden" name="skux[]" value="` + item[a]["sku"] + `"></td>
                                    <td>` + data[i]["Jumlah Produk"] + ` <input type="hidden" name="qtyorderx[]" value="` + data[i]["Jumlah Produk"] + `"><input type="hidden" name="qtyready[]" value="` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + `"></td>
                                    <td>` + item[a]["qty"] + `  <input type="hidden" name="pricex[]" value="` + data[i]["Harga Dibayar"] + `"> <input type="hidden" name="hargaitem[]" value="` + item[a]["priceitem"] + `"></td>
                                    <td>` + (item[a]["qty"] - data[i]["Jumlah Produk"]) + ` <input type="hidden" name="discx[]" value="0"><input type="hidden" name="hargabeli[]" value="` + item[a]["pricebuyitem"] + `"></td>
                                    <td>` + data[i]["Harga Dibayar"] + ` <input type="hidden" name="subtotalxx[]" value="` + data[i]["Harga Dibayar"] + `"> <input type="hidden" name="vat[]" value="` + (Number(item[a]["priceitem"] * item[a]["VAT"] / 100)) + `"></td>
                                </tr>`
                        subtotal = Number(subtotal) + Number(data[i]["Harga Dibayar"])
                        subtotals = Number(subtotals) + Number(data[i]["Harga Dibayar"])
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