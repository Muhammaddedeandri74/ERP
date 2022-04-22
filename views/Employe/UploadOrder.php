<style type="text/css">
	.header {
		height: 10vh;
		width: 100vw;
		background: purple;
		position: fixed;
	}

	body {
		background:
	}

	.right,
	.left {
		box-shadow: 0px 0px 55px 0px rgba(0, 0, 0, 0.71);
		-webkit-box-shadow: 0px 0px 55px 0px rgba(0, 0, 0, 0.71);
		-moz-box-shadow: 0px 0px 55px 0px rgba(0, 0, 0, 0.71);
	}

	.left {
		height: 100%;
	}

	.right {
		height: 85vh;
		width: 25vw;
	}

	/* The switch - the box around the slider */
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

<?php

if ($data5 != "Not Found") {
	$noso = "";
	foreach ($data5 as $key) {
		$noso = $key["codeso"];
		$noso++;
	}
} else {
	$noso = "SO0001";
}


$upload = json_decode(base64_decode($data));

$idtransaksi = 0;
$transaksi = array();
foreach ($upload as $key) {
	if ($key->{'ID Transaksi'} != $idtransaksi) {
		array_push($transaksi, $key->{'ID Transaksi'});
		$idtransaksi = $key->{'ID Transaksi'};
	}
}

print_r($transaksi);
?>


<?php foreach ($transaksi as $key) : ?>
	<?php foreach ($upload as $keyx) : ?>
		<?php if ($key == $keyx->{'ID Transaksi'}) : ?>
			<tr>
				<td><?php echo $key ?></td>
			</tr>
		<?php break;
		endif ?>
	<?php endforeach ?>
<?php endforeach ?>

<!DOCTYPE html>
<html>

<head>
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxx.css') ?>" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<title>ERP</title>
</head>

<body>

	<div class="header">
		<div class="header" style="height: 10vh; background: purple">
			<div class="row">
				<div class="col-1">
					<img src="<?php echo base_url('assets/img/arrow_back.png') ?>" style="margin: 20%" onclick="back()">
				</div>
				<div class="col" style="margin-top: 20px">
					<div class="row">
						<p style="color: white">SALES ORDER/Order/New Sales</p>
					</div>
					<div class="row">
						<p><b style="color: white">FORM ORDER</b></p>
					</div>
				</div>
			</div>

		</div>

	</div>

	<?php echo $this->session->flashdata('message'); ?>
	<?php $this->session->set_flashdata('message', ''); ?>


	<form action="<?php echo base_url('Employe/insertsalesorder') ?>" method="post">
		<div class="row" style="width: 100%;">


			<div class="col" style="padding-left: 32px; margin-right: 20px; margin-top: 20px;">
				<div class="left" style="padding-left: 25px; padding-top: 25px; padding-bottom: 25px;padding-right: 5%; margin-top: 10vh">
					<p style="font-size: 30px;margin: 0"><b>INFORMASI CUSTOMER</b></p>
					<hr style="height: 0.2%">
					<div class="d-flex">
						<div style="width: 25%">
							<p style="margin: 0;font-size: 20px"><b>Info Pesanan</b></p>
							<hr style="height: 2%; background: #8F2E80; margin: 0;opacity: 1">
							<p style="margin-top: 20px;margin-bottom: 0">Jenis Pemesanan</p>
							<select class="form-control" name="typeso" required>
								<option value="" disabled selected>Pilih buyer, supplier atau e-commerce</option>
								<option value="001">WEB</option>
								<option value="002">E-Commerce</option>
								<option value="003">B2B</option>
							</select>
							<p style="margin-top: 20px;margin-bottom: 0">Customer</p>
							<select class="form-control" name="idcust" required>
								<option value="" disabled selected>Pilih Customer</option>
								<?php if ($data1 != "Not Found") : ?>
									<?php foreach ($data1 as $key) : ?>
										<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
							<!-- <p style="margin-top: 20px;margin-bottom: 0">No. Sales Order</p>
								<input type="text" name="noso" class="form-control" placeholder="Masukan Nomor Pesanan" value="<?php echo $noso ?>" readonly> -->
							<p style="margin-top: 20px;margin-bottom: 0">No. Pesanan</p>
							<input type="text" name="nopes" class="form-control" placeholder="Masukan Nomor Pesanan">
						</div>
						<div style="margin-left: 10%; width: 20%">
							<p style="margin: 0;font-size: 20px"><b>Pengiriman</b></p>
							<hr style="height: 2%; background: #8F2E80; margin: 0;opacity: 1">
							<p style="margin-top: 20px;margin-bottom: 0">Tanggal Pengiriman</p>
							<input type="date" name="delivdate" class="form-control" placeholder="Pilih Tanggal Pengiriman" required>
							<p style="margin-top: 20px;margin-bottom: 0">Alamat</p>
							<input type="text" name="delivaddr" class="form-control" placeholder="Alamat Disini" required>
							<p style="margin-top: 20px;margin-bottom: 0">Biaya Pengiriman</p>
							<input type="text" name="delivfee" class="form-control" placeholder="Masukan Biaya Pengiriman" required>
						</div>
						<div style="margin-left: 10%; width: 30%">
							<p style="margin: 0;font-size: 20px"><b>Pembayaran, Diskon & VAT</b></p>
							<hr style="height: 2%; background: #8F2E80; margin: 0;opacity: 1">
							<div class="d-flex" style="margin-top: 20px">
								<div style="margin-right: 10px">
									<p style="margin-bottom: 0">Mata Uang</p>
									<select class="form-control" name="idcurrency" required>
										<option value="" disabled selected> Pilih Mata Uang</option>
										<?php if ($data2 != "Not Found") : ?>
											<?php foreach ($data2 as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>" <?php echo ($key["namecomm"] ==  'Rupiah') ? ' selected="selected"' : ''; ?> disabled><?php echo $key["namecomm"] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div>
									<p style="margin-bottom: 0">Metode Pembayaran</p>
									<select class="form-control" name="paymentmethod" required>
										<option value="" disabled selected> Pilih Metode Pembayaran</option>
										<?php if ($data4 != "Not Found") : ?>
											<?php foreach ($data4 as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>"> <?php echo $key["namecomm"] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>

							</div>
							<div class="d-flex" style="margin-top: 20px">
								<div style="margin-right: 10px">
									<p style="margin-bottom: 0">Presentase Discount</p>
									<input type="text" name="dispers" id="dispers" onclick="dispers()" oninput="discount1(this.value)" class="form-control" placeholder="0%" readonly>
								</div>
								<div>
									<p style="margin-bottom: 0">Nominal Discount</p>
									<input type="text" name="disnoms" id="disnoms" onclick="disnoms()" oninput="count()" class="form-control" placeholder="Masukan Nominal" readonly>
								</div>

							</div>

							<p style="margin-top: 20px;margin-bottom: 0;">VAT</p>
							<div class="d-flex " style="margin-top: 5px">
								<div>
									<label class="switch">
										<input type="checkbox" id="vat" name="vat" value="0" onclick="vatc()" disabled>
										<span class="slider round"></span>
									</label>
								</div>
								<div style="margin-left: 20px">
									<p>Klik untuk on / off</p>
								</div>
							</div>



						</div>
					</div>

					<p style="margin-top: 50px; font-size: 30px"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<p style="margin-top: 15px; margin-bottom: 5px">Cari Produk</p>
					<div class="d-flex">
						<div style="width: 50%">
							<input type="text" name="" oninput="search(this.value)" class="form-control" placeholder="Masukan Kata Kunci Produk">
							<div style="margin-top: 10px;height: 50vh;box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31);
											-webkit-box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31);
											-moz-box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31); overflow-y: scroll;" id="itemx">
								<?php if ($data3 != "Not Found") : ?>
									<?php foreach ($data3 as $key) : ?>
										<?php if ($key["qty"] != "0") : ?>

											<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(<?php echo $key["iditem"] ?>)">
												<div class="col-8">
													<p class="fs-5"><?php echo $key["nameitem"] ?></p>
													<p class="fs-6">SKU. <?php echo $key["sku"] ?></p>
												</div>
												<div class="col-4">
													<p class="fs-5"><?php echo 'Rp. ' . number_format($key["priceitem"], 0, "", ".") ?></p>
												</div>
											</div>

										<?php endif ?>

									<?php endforeach ?>
								<?php endif ?>

							</div>
						</div>
						<div style="width: 100%; margin-left: 30px">
							<input type="hidden" name="">
							<p style="margin-top: 15px; margin-bottom: 5px">Detail Produk</p>
							<div style="margin-top: 10px;height: 50vh;box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31);
											-webkit-box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31);
											-moz-box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.31);">
								<div class="card">
									<div class="card-header" style="background: #8F2E80; color: white; padding: 2%">
										<div class="row d-flex justify-content-between lh-1 align-items-center" style="height: 7vh">
											<div class="col-6" id="nameitemx">
												<p class="fs-5 px-3">-</p>

											</div>
											<div class="col-6" id="secunder">
												<p id="sku" class="fs-5 px-4" style="text-align: right;">-</p>
												<p id="price" class="fs-5 px-4" style="text-align: right;">-</p>
											</div>
										</div>
									</div>
									<div class="card-body" style="height: 25vh">
										<div class="d-flex">

											<div style="width: 100%">
												<div class="d-flex" style="margin-bottom: 2%">
													<p>Ready Stock</p>
													<input type="number" id="readystock" class="form-control" style="margin-left: 7%" readonly>
												</div>
												<div class="d-flex" style="margin-bottom: 2%">
													<p>Order Qty</p>
													<input type="number" id="qtyorder" oninput="qtyx(this.value)" class="form-control" style="margin-left: 10%">
												</div>
												<div class="d-flex" style="margin-bottom: 2%;">
													<p>Balance</p>
													<input type="number" id="balance" class="form-control" style="margin-left: 9%" readonly>
													<input type="hidden" id="minstock" class="form-control" style="margin-left: 9%" readonly>
												</div>
											</div>

											<div style="margin-left: 5%;width: 100%">
												<div class="d-flex" style="margin-bottom: 4%;">
													<p>Disc %.</p>
													<input type="text" id="disper" class="form-control" onclick="disper()" oninput="disc1(this.value)" style="margin-left: 14%">
												</div>
												<div class="d-flex">
													<p>Disc Nominal</p>
													<input type="text" id="disnom" class="form-control" onclick="disnom()" oninput="disc2(this.value)" style="margin-left: 5%">
												</div>

											</div>


										</div>
									</div>
									<div class="card-footer" style="background: #eeeeee; height: 15vh">
										<p>Summary</p>
										<div class="row d-flex justify-content-between align-items-center">
											<div class="col-3">
												<p>Sub total</p>
												<input type="hidden" id="subtotal" class="form-control" readonly>
												<input type="text" id="subtotalx" class="form-control" readonly>
											</div>
											<div class="col-3">
												<p>Disc total</p>
												<input type="hidden" id="totaldiscount" value="0" class="form-control" readonly>
												<input type="text" id="totaldiscountx" value="0" class="form-control" readonly>
											</div>
											<div class="col-3">
												<p>Grand total</p>
												<input type="hidden" id="grandtotal" class="form-control" readonly>
												<input type="text" id="grandtotalx" class="form-control" readonly>
											</div>
											<div class="col-2">
												<button style="background: #8F2E80; color: white" class="btn" type="button" onclick="tambah()">TAMBAH</button>
											</div>
										</div>
									</div>
								</div>



							</div>
						</div>
					</div>

					<table class="table" style="margin-top: 50px">
						<thead style="background: purple; color: white">
							<tr>
								<th>#</th>
								<th>Nama Item</th>
								<th>SKU</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Discount</th>
								<th>Sub Total</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody id="body">

						</tbody>
					</table>

					<div class="d-flex" style="margin-top: 50px">
						<p style="margin-bottom: 0">Jumlah Item : </p>
						<input type="text" id="jmlitem" name="" value="0" style="margin-left: 20px">
						<input type="hidden" id="jmlitemx" name="" value="0" style="margin-left: 20px">
					</div>



				</div>
			</div>

			<div class="col-3" style=" margin-right: 32px; margin-top: 20px;">
				<div class="right" style="position: fixed; top: 12vh;">
					<div style="height: 15%; background: orange; display: flex; justify-content: center; " class="align-items-center">
						<center>
							<p style="font-size: 30px;color: white"><b>SUMMARY</b> </p>
						</center>
					</div>

					<div style="padding: 20px">
						<p style="margin-bottom: 0; font-size: 20px;color:#444444">Quantity</p>
						<hr>
						<div class="row">
							<div class="col-8">
								<p>Jumlah Barang</p>
							</div>
							<div class="col-4">
								<input type="text" name="qty" id="qtys" value="0" class="form-control" readonly>
							</div>
						</div>

						<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Total Harga</p>
						<hr>
						<div class="row">
							<div class="col-8">
								<p>Sub Total</p>
							</div>
							<div class="col-4">
								<input type="text" name="subtotals" id="subtotals" value="0" class="form-control" readonly>
							</div>
						</div>

						<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Discount</p>
						<hr>
						<div class="row">
							<div class="col-8">
								<p>Persen</p>
							</div>
							<div class="col-4">
								<input type="text" value="0" id="disperx" class="form-control" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<p>Nominal</p>
							</div>
							<div class="col-4">
								<input type="text" value="0" id="disnomx" class="form-control" readonly>
							</div>
						</div>

						<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">VAT</p>
						<hr>
						<div class="row">
							<div class="col-8">
								<p>Persen</p>
							</div>
							<div class="col-4">
								<input type="text" id="vatper" value="0" class="form-control" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<p>Nominal</p>
							</div>
							<div class="col-4">
								<input type="text" id="vatnom" name="vatnom" value="0" class="form-control" readonly>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-8">
								<p><b>Grand Total</b></p>
							</div>
							<div class="col-4">
								<input type="text" name="grandtotals" id="grandtotals" value="0" class="form-control" readonly>
							</div>
						</div>

						<button style="background: orange; width: 100%; color: white; margin-top: 20px" class="btn btn-warning">Buat Order</button>
					</div>




				</div>
			</div>

		</div>


	</form>


</body>

</html>


<script type="text/javascript">
	function search(x) {
		var data = <?php echo json_encode($data3) ?>;
		var baris = "";
		for (var i = 0; i < data.length; i++) {

			if (data[i]["nameitem"].toLowerCase().includes(x)) {
				baris += `
							<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(` + data[i]["iditem"] + `)">
														<div class="col-8">
															<p class="fs-5">` + data[i]["nameitem"] + `</p>
															<p class="fs-6">SKU. ` + data[i]["sku"] + `</p>
														</div>
														<div class="col-4">
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>
														</div>
													</div>
						`
			} else if (data[i]["sku"].toLowerCase().includes(x)) {
				baris += `
							<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(` + data[i]["iditem"] + `)">
														<div class="col-8">
															<p class="fs-5">` + data[i]["nameitem"] + `</p>
															<p class="fs-6">SKU. ` + data[i]["sku"] + `</p>
														</div>
														<div class="col-4">
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>
														</div>
													</div>
						`
			}
		}
		$('#itemx').html(baris);
	}

	function back() {
		window.location.href = "<?php echo base_url('Employe/salesorder') ?>";
	}


	function selectitem(x) {
		var data = <?php echo json_encode($data3) ?>;
		for (var i = 0; i < data.length; i++) {
			if (data[i]["iditem"] == x) {
				var baris = `
								<p  class="fs-5 px-3">` + data[i]["nameitem"] + `</p>
								<input type="hidden" id="iditem" value="` + data[i]["iditem"] + `">
								<input type="hidden" id="idwh" value="` + data[i]["idwh"] + `">
								<input type="hidden" id="nameitem" value="` + data[i]["nameitem"] + `">
							`
				var secunder = `
								<p class="fs-5 px-4" style="text-align: right;"> SKU. ` + data[i]["sku"] + `</p>
								<p  class="fs-5 px-4" style="text-align: right;">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>
								<input type="hidden" id="sku" value="` + data[i]["sku"] + `">
								<input type="hidden" id="priceitem" value="` + data[i]["priceitem"] + `">

								`
				$("#nameitemx").html(baris);
				$("#secunder").html(secunder);
				$('#subtotal').val(data[i]["priceitem"])
				$('#grandtotal').val(data[i]["priceitem"])
				$('#subtotalx').val(formatRupiah(data[i]["priceitem"], 'Rp. '))
				$('#grandtotalx').val(formatRupiah(data[i]["priceitem"], 'Rp. '))
				$('#readystock').val(data[i]["qty"])
				$('#balance').val(data[i]["qty"] - 1)
				$('#minstock').val(data[i]["minstock"])
				$('#qtyorder').val(1)

			}
		}
	}

	function qtyx(x) {
		if (x < 0) {
			x = 0;
		}
		$('#qtyorder').val(x);
		$('#balance').val($('#readystock').val() - x)
		var total = $('#priceitem').val() * x
		$('#subtotalx').val(total)
		$('#subtotal').val(total)
		$('#subtotalx').val(formatRupiah($('#subtotalx').val(), 'Rp. '))

		var grantotal = $('#priceitem').val() * x - $('#totaldiscount').val()
		$('#grandtotalx').val(grantotal)
		$('#grandtotal').val(grantotal)
		$('#grandtotalx').val(formatRupiah($('#grandtotalx').val(), 'Rp. '))
	}

	function formatRupiah(angka, prefix) {
		console.log(angka)
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	function disper() {
		document.getElementById('disnom').readOnly = true;
		document.getElementById('disper').readOnly = false;
	}

	function disnom() {
		document.getElementById('disnom').readOnly = false;
		document.getElementById('disper').readOnly = true;
	}

	function disc1(x) {
		if ($('#disper').val() > 100) {

			$('#disper').val("100");
		}
		if ($('#disper').val() < 0) {

			$('#disper').val("0");
		}

		if (x > 100) {

			x = 100;
		}
		if (x < 0) {

			x = 0;
		}

		if ($('#subtotal').val() == "") {
			alert("Tolong Pilih Item Terlebih Dahulu");
			$('#disper').val("");
		} else {
			var disc = $('#subtotal').val() * (x / 100);

			$('#disnom').val(disc);
			$('#totaldiscount').val(disc);
			$('#totaldiscountx').val(disc);
			var grandtotal = $('#subtotal').val() - $(totaldiscount).val();
			console.log(grandtotal);
			$('#grandtotalx').val(grandtotal)
			$('#grandtotal').val(grandtotal)
			$('#grandtotalx').val(formatRupiah($('#grandtotalx').val(), 'Rp. '))



		}

	}

	function disc2(x) {
		if ($('#subtotal').val() == "") {
			alert("Tolong Pilih Item Terlebih Dahulu");
			$('#disnom').val("");
		} else {
			$('#disper').val("");
			var disc = $('#subtotal').val() - x;
			console.log(disc);
			$('#totaldiscount').val(disc);
			$('#totaldiscountx').val(disc);


		}
	}

	function tambah() {
		console.log($('#balance').val() + " " + $('#minstock').val())
		if ($('#nameitem').val() == "") {
			alert("Pilih Item Dahulu")
		} else if ($('#qtyorder').val() == "0") {
			alert("Masukan Qty Order");
		} else if ($('#balance').val() < 0) {
			alert("Stock kurang untuk dipesan");
		} else if (Number($('#balance').val()) < Number($('#minstock').val())) {
			if (confirm('Stock Item ini akan dibawah stock minimum, Yakin ingin menambahkan item ini?')) {
				var baris = '';
				var a = $('#jmlitem').val()
				var b = Number($('#jmlitem').val()) + 1
				if (a % 2 == 0) {
					baris += `
									<tr id=item` + $('#jmlitemx').val() + `>
										<td>` + b + `</td>
										<td id=nameitem[]><input type="hidden"  name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
										<td id=sku[]> <input type="hidden"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `">` + $('#qtyorder').val() + `</td>
										<td id=price[]> <input type="hidden"  name="pricex[]" value ="` + $('#subtotal').val() + `">` + $('#subtotal').val() + `</td>
										<td id=disc[]> <input type="hidden"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + $('#totaldiscount').val() + `</td>
										<td id=subtotal[]> <input type="hidden"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + $('#grandtotal').val() + `</td>
										<td id=Action[]><button  onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `)">Delete</button></td>
									</tr>	
								 `
				} else {
					baris += `
									<tr id=item` + $('#jmlitemx').val() + ` style = "background : #eeeeee">
										<td>` + b + `</td>
										<td id=nameitem[]><input type="hidden"  name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
										<td id=sku[]> <input type="hidden"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `">` + $('#qtyorder').val() + `</td>
										<td id=price[]> <input type="hidden"  name="pricex[]" value ="` + $('#subtotal').val() + `">` + $('#subtotal').val() + `</td>
										<td id=disc[]> <input type="hidden"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + $('#totaldiscount').val() + `</td>
										<td id=subtotal[]> <input type="hidden"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + $('#grandtotal').val() + `</td>
										<td id=Action[]><button  onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `)">Delete</button></td>
									</tr>	
								 `
				}

				$("#body").append(baris)

				$('#jmlitem').val(Number($('#jmlitem').val()) + 1);
				$('#qtys').val(Number($('#jmlitem').val()));
				$('#subtotals').val(Number($('#subtotals').val()) + Number($('#grandtotal').val()));
				$('#jmlitemx').val(Number($('#jmlitem').val()) + 1);
				var baris = `
										<p  class="fs-5 px-3">-</p>
										<input type="hidden" id="iditem" value="">
										<input type="hidden" id="nameitem" value="">
									`
				var secunder = `
										<p class="fs-5 px-4" style="text-align: right;">-</p>
										<p  class="fs-5 px-4" style="text-align: right;">-</p>
										<input type="hidden" id="sku" value="">
										<input type="hidden" id="priceitem" value="">

										`
				$("#nameitemx").html(baris);
				$("#secunder").html(secunder);
				$('#subtotal').val("")
				$('#grandtotal').val("")
				$('#subtotalx').val("")
				$('#grandtotalx').val("")
				$('#readystock').val("")
				$('#balance').val("")
				$('#qtyorder').val("")

				document.getElementById('disnoms').readOnly = false;
				document.getElementById('dispers').readOnly = false;
				document.getElementById('vat').disabled = false;


				count();
			}
		} else {
			var baris = '';
			var a = $('#jmlitem').val()
			var b = Number($('#jmlitem').val()) + 1
			if (a % 2 == 0) {
				baris += `
							<tr id=item` + $('#jmlitemx').val() + `>
										<td>` + b + `</td>
										<td id=nameitem[]><input type="hidden"  name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
										<td id=sku[]> <input type="hidden"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `">` + $('#qtyorder').val() + `</td>
										<td id=price[]> <input type="hidden"  name="pricex[]" value ="` + $('#subtotal').val() + `">` + $('#subtotal').val() + `</td>
										<td id=disc[]> <input type="hidden"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + $('#totaldiscount').val() + `</td>
										<td id=subtotal[]> <input type="hidden"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + $('#grandtotal').val() + `</td>
										<td id=Action[]><button  onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `)">Delete</button></td>
							</tr>	
						 `
			} else {
				baris += `
							<tr id=item` + $('#jmlitemx').val() + ` style = "background : #eeeeee">
								<td>` + b + `</td>
										<td id=nameitem[]><input type="hidden"  name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
										<td id=sku[]> <input type="hidden"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `">` + $('#qtyorder').val() + `</td>
										<td id=price[]> <input type="hidden"  name="pricex[]" value ="` + $('#subtotal').val() + `">` + $('#subtotal').val() + `</td>
										<td id=disc[]> <input type="hidden"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + $('#totaldiscount').val() + `</td>
										<td id=subtotal[]> <input type="hidden"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + $('#grandtotal').val() + `</td>
										<td id=Action[]><button  onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `)">Delete</button></td>
							</tr>	
						 `
			}

			$("#body").append(baris)

			$('#jmlitem').val(Number($('#jmlitem').val()) + 1);
			$('#qtys').val(Number($('#jmlitem').val()));
			$('#subtotals').val(Number($('#subtotals').val()) + Number($('#grandtotal').val()));
			$('#jmlitemx').val(Number($('#jmlitem').val()) + 1);
			var baris = `
								<p  class="fs-5 px-3">-</p>
								<input type="hidden" id="iditem" value="">
								<input type="hidden" id="nameitem" value="">
							`
			var secunder = `
								<p class="fs-5 px-4" style="text-align: right;">-</p>
								<p  class="fs-5 px-4" style="text-align: right;">-</p>
								<input type="hidden" id="sku" value="">
								<input type="hidden" id="priceitem" value="">

								`
			$("#nameitemx").html(baris);
			$("#secunder").html(secunder);
			$('#subtotal').val("")
			$('#grandtotal').val("")
			$('#subtotalx').val("")
			$('#grandtotalx').val("")
			$('#readystock').val("")
			$('#balance').val("")
			$('#qtyorder').val("")

			document.getElementById('disnoms').readOnly = false;
			document.getElementById('dispers').readOnly = false;
			document.getElementById('vat').disabled = false;


			count();
		}


	}


	function del(x, y) {
		if (confirm('Hapus Item Ini?')) {
			$('#item' + x + '').remove();
		}
		$('#jmlitem').val($('#jmlitem').val() - 1);
		$('#qtys').val($('#qtys').val() - 1);
		$('#subtotals').val($('#subtotals').val() - y);

		if ($('#jmlitem').val() == 0) {
			document.getElementById('disnoms').readOnly = true;
			document.getElementById('dispers').readOnly = true;
			document.getElementById('vat').disabled = true;
			document.getElementById('vat').checked = false;
			$('#vatper').val(0);
			$('#vatnom').val(0);
		}

		count();

	}

	function count() {
		var grantotal = Number($('#subtotals').val() - $('#disnoms').val()) + Number($('#vatnom').val());
		$('#grandtotals').val(grantotal);
	}

	function dispers() {
		document.getElementById('disnoms').readOnly = true;
		document.getElementById('dispers').readOnly = false;
	}

	function disnoms() {
		document.getElementById('disnoms').readOnly = false;
		document.getElementById('dispers').readOnly = true;
	}

	function discount1(x) {
		if (x >= 100) {
			x = 100
			$('#grandtotals').val(0)

		}
		if (x < 0) {
			x = 0
		}
		$('#dispers').val(x);
		$('#disperx').val(x);
		$('#disnoms').val($('#subtotals').val() * (x / 100));
		$('#disnomx').val($('#subtotals').val() * (x / 100));
		console.log(x)
		count();
	}

	function vatc() {
		if ($('#vat').val() == 10) {
			$('#vat').val(0);
		} else {
			$('#vat').val(10);
		}

		$('#vatper').val($('#vat').val() + "%");
		$('#vatnom').val(($('#subtotals').val() - $('#disnoms').val()) * ($('#vat').val() / 100))

		count();

	}
</script>