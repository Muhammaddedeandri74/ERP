<style type="text/css">
	.header {
		height: 10vh;
		width: 100vw;
		background: purple;
		position: fixed;
	}

	.right,
	.left {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		background-color: white;
	}

	.left {
		height: 100%;
	}

	.right {
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

	.bays {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		background-color: white;
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
?>

<!DOCTYPE html>
<html>

<head>
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/Chart.js') ?>"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>ERP</title>
</head>

<body>
	<div class="container-xxl text-white pt-3" style="background-color: purple;">
		<div class="row d-flex justify-content-between">
			<div class="col-1">
				<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
			</div>
			<div class="col-7">
				<p class="tu font-weight-bold " style="font-size: 13px">SALES ORDER/Order/New Sales</p>
				<p class="tu font-weight-bold upc" style="font-size: 25px">FORM ORDER</p>
			</div>
			<div class="col-4">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url('Employe/insertsalesorder') ?>" method="post">
		<div class="row" style="margin-top: 2vh;">
			<div class="col">
				<div class="left" style="padding-left: 25px; padding-top: 25px; padding-bottom: 25px;padding-right: 2%;margin-left:2vw">
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
							<p style="margin-top: 20px;margin-bottom: 0">Nomor Resi Pengiriman</p>
							<input type="text" name="noresi" class="form-control" placeholder="Masukan Nomor Resi Pengiriman" required>
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
					<div class="row d-flex justify-content-between">
						<div class="col-4">
							<p style="margin-bottom: 5px">Cari Produk</p>
							<input type="text" name="" oninput="search(this.value)" class="form-control" placeholder="Masukan Kata Kunci Produk">
							<div class="bays" style=" overflow-y: scroll;" id="itemx">
								<?php if ($data3 != "Not Found") : ?>
									<?php foreach ($data3 as $key) : ?>
										<?php if ($key["qty"] > "0") : ?>
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
						<div class="col-8">
							<input type="hidden" name="">
							<p style="margin-bottom: 5px">Detail Produk</p>
							<div class="card bays">
								<div class="card-header" style="background: #8F2E80; color: white; padding: 2%">
									<div class="row d-flex justify-content-between lh-1 align-items-center">
										<div class="col-6" id="nameitemx">
											<p class="fs-5 px-3">-</p>
										</div>
										<div class="col-6" id="secunder">
											<p id="sku" class="fs-5 px-4" style="text-align: right;">-</p>
											<p id="price" class="fs-5 px-4" style="text-align: right;">-</p>
										</div>
									</div>
								</div>
								<div class="card-body">
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
								<div class="card-footer" style="background: #eeeeee;">
									<p>Summary</p>
									<div class="row d-flex justify-content-between">
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
										<div class="col-3" style="margin-top: 4.4vh">
											<button style="background: #8F2E80; color: white;" class="btn" type="button" onclick="tambah()">TAMBAH</button>
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
			<div class="col-3 pb-2" style=" margin-right: 32px;">
				<div class="right">
					<div style="background: orange; display: flex; justify-content: center; " class="align-items-center">
						<center>
							<p class="py-4" style="font-size: 30px;color: white"><b>SUMMARY</b> </p>
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
	$(document).on("keydown", "form", function(event) {
		return event.key != "Enter";
	});



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
														`;
														if (data[i]["priceitem"] != null)
														{
															baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`
													
														}
														else
														{
															baris += `
															<p class="fs-5">` + formatRupiah("0", 'Rp. ') + `</p>`
														}
														baris += `	</div>
													</div>`

														
			} else if (data[i]["sku"].toLowerCase().includes(x)) {
				baris += `
							<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(` + data[i]["iditem"] + `)">
														<div class="col-8">
															<p class="fs-5">` + data[i]["nameitem"] + `</p>
															<p class="fs-6">SKU. ` + data[i]["sku"] + `</p>
														</div>
														<div class="col-4">`
															if (data[i]["priceitem"] != null)
														{
															baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`
													
														}
														else
														{
															baris += `
															<p class="fs-5">` + formatRupiah("0", 'Rp. ') + `</p>`
														}
														baris += `	</div>
													</div>`
						
			}else if(x == "")
			{
				baris += `
							<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(` + data[i]["iditem"] + `)">
														<div class="col-8">
															<p class="fs-5">` + data[i]["nameitem"] + `</p>
															<p class="fs-6">SKU. ` + data[i]["sku"] + `</p>
														</div>
														<div class="col-4">`
															if (data[i]["priceitem"] != null)
														{
															baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`
													
														}
														else
														{
															baris += `
															<p class="fs-5">` + formatRupiah("0", 'Rp. ') + `</p>`
														}
														baris += `	</div>
													</div>`


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
				console.log(data[i])
				var baris = `
								<p  class="fs-5 px-3">` + data[i]["nameitem"] + `</p>
								<input type="hidden" id="iditem" value="` + data[i]["iditem"] + `">
								<input type="hidden" id="idwh" value="` + data[i]["idwh"] + `">
								<input type="hidden" id="nameitem" value="` + data[i]["nameitem"] + `">
							`
				var secunder = `
								<p class="fs-5 px-4" style="text-align: right;"> SKU. ` + data[i]["sku"] + `</p>`;
								if (data[i]["subprice"] != null) 
								{
									secunder +=`
										<p  class="fs-5 px-4" style="text-align: right;">` + formatRupiah(data[i]["subprice"], 'Rp. ') + `</p>
										

										`


								}
								else
								{

									secunder +=`
										<p  class="fs-5 px-4" style="text-align: right;">` + formatRupiah("0", 'Rp. ') + `</p>
										

										`


								}
								secunder +=`
								
								<input type="hidden" id="sku" value="` + data[i]["sku"] + `">
								<input type="hidden" id="priceitem" value="` + data[i]["subprice"] + `">

								`
				$("#nameitemx").html(baris);
				$("#secunder").html(secunder);
				$('#hargaitem').val(data[i]["priceitem"])
				$('#grandtotal').val(data[i]["subprice"])
				if (data[i]["VAT"] != null)
				{
					$('#vat').val(data[i]["priceitem"] * data[i]["VAT"]/100)
				}
				else
				{
					$('#vat').val(data[i]["priceitem"] * 0/100)
				}
				
				$('#vatx').val(formatRupiah($('#vat').val(), 'Rp. '))
				$('#subtotal').val(data[i]["subprice"])
				if (data[i]["pricebuyitem"] != null)
				{
					$('#hargabeli').val(formatRupiah(data[i]["pricebuyitem"], 'Rp. '))
				}
				else
				{
					$('#hargabeli').val(formatRupiah("0", 'Rp. '))
				}
				
				console.log(data[i]["pricebuyitem"]);
				if (data[i]["subprice"] != null)
				{
					$('#subtotalx').val(formatRupiah(data[i]["subprice"], 'Rp. '))
				}
				else
				{
					$('#subtotalx').val(formatRupiah("0", 'Rp. '))
				}
				if (data[i]["priceitem"] != null)
				{
					$('#hargaitemx').val(formatRupiah(data[i]["priceitem"], 'Rp. '))
				}
				else
				{
					$('#hargaitemx').val(formatRupiah("0", 'Rp. '))
				}
				if (data[i]["subprice"] != null)
				{
					$('#grandtotalx').val(formatRupiah(data[i]["subprice"], 'Rp. '))
				}
				else
				{
					$('#grandtotalx').val(formatRupiah("0", 'Rp. '))
				}
				
				
				$('#readystock').val(data[i]["qty"])
				$('#balance').val(data[i]["qty"] - 1)
				$('#minstock').val(data[i]["minstock"])
				$('#qtyorder').val(1)
				$('#disper').val("")
				$('#disnom').val("0")
				$('#totaldiscount').val("0")
				$('#totaldiscountx').val("0")
				document.getElementById('vatx').disabled = false;
				document.getElementById('hargaitemx').readOnly = false;


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
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"><input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
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
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"> <input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
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
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"> <input type="text"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
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
										<td id=qtyorder[]> <input type="hidden"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"> <input type="text"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
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