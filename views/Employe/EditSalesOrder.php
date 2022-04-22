<style type="text/css">
	.ju {
		overflow-x: auto;
		overflow-y: auto;
	}

	.bays {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
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

<!DOCTYPE html>
<html>

<head>
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src='<?php echo base_url('assets/js/jquery-3.4.1.js'); ?>'></script>
	<script src='<?php echo base_url('assets/js/format.currency.min.js'); ?>'></script>
	<script src='<?php echo base_url('assets/js/jquery-ui.js'); ?>'></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxx.css') ?>" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>

	<title>ERP</title>
</head>

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

<body>
	<div class="container-fluid text-white pt-3" style="background-color: purple;">
		<div class="row d-flex justify-content-between">
			<div class="col-1">
				<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
			</div>
			<div class="col-7">
				<p class="tu font-weight-bold " style="font-size: 13px">SALES ORDER/Order/Update Sales</p>
				<p class="tu font-weight-bold upc" style="font-size: 25px">FORM ORDER</p>
			</div>
			<div class="col-4">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url('Employe/updatesalesorder') ?>" method="post">
		<input type="hidden" name="idso" value="<?php echo $data5[0]["idso"] ?>">
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 2vh;padding-left:1rem">
				<div class="col bays p-4">
					<p style="font-size: 30px;"><b>INFORMASI CUSTOMER</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Pesanan</b></p>
								<hr style="height: 2%; background: #8F2E80;opacity: 1">
							</div>
							<div class="mb-3">
								<label>Jenis Pemesanan</label>
								<select class="form-select" name="typeso" required>
									<option value="" disabled selected>Pilih buyer, supplier atau e-commerce</option>
									<?php if ($data6 != "Not Found") : ?>
										<?php foreach ($data6 as $key) : ?>
											<option value="<?php echo $key["codecomm"] ?>" <?php echo ($data5[0]["typeso"] ==  $key["codecomm"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="mb-3">
								<label>Customer</label>
								<select class=" selectpicker form-control" data-live-search="true" name="idcust" required>
									<option value="" disabled selected>Pilih Customer</option>
									<?php if ($data1 != "Not Found") : ?>
										<?php foreach ($data1 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>" <?php echo ($data5[0]["idcust"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="mb-3">
								<label>No. Sales Order</label>
								<input type="text" name="noso" class="form-control" placeholder="Masukan Nomor Pesanan" value="<?php echo $data5[0]['codeso'] ?>" readonly>
							</div>
							<div class="mb-3">
								<label>No. Pesanan</label>
								<input type="text" name="nopes" class="form-control" placeholder="Masukan Nomor Pesanan" value="<?php echo $data5[0]["nopesanan"] ?>">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="datetrans" class="form-control" placeholder="Pilih Tanggal Transaksi" value="<?php echo str_replace(" ", "", $data5[0]["dateso"])  ?>" required>
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Pengiriman</b></p>
								<hr style="height: 2%; background: #8F2E80; ;opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Pengiriman</label>
								<input type="date" name="delivdate" class="form-control" placeholder="Pilih Tanggal Pengiriman" required value="<?php echo $data5[0]["delivdate"] ?>">
							</div>
							<div class="mb-3">
								<label>Jasa Pengiriman</label>
								<input type="text" name="jasapengirim" class="form-control" placeholder="Masukan Jasa Pengiriman" value="<?php echo $data5[0]["jasapengirim"] ?>" required>
							</div>
							<div class="mb-3">
								<label>Alamat</label>
								<input type="text" name="delivaddr" class="form-control" placeholder="Alamat Disini" required value="<?php echo $data5[0]["delivaddr"] ?>">
							</div>
							<div class="mb-3">
								<label>Biaya Pengiriman</label>
								<input type="text" name="delivfee" class="form-control" placeholder="Masukan Biaya Pengiriman" value="<?php echo $data5[0]["delivfee"] ?>" required>
							</div>
							<div class="mb-3">
								<label>Nomor Resi Pengiriman</label>
								<input type="text" name="noresi" class="form-control" placeholder="Masukan Nomor Resi Pengiriman" value="<?php echo $data5[0]["noresi"] ?>">
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Pembayaran, Diskon & VAT</b></p>
								<hr style="height: 2%; background: #8F2E80; ;opacity: 1">
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-6">
									<label>Mata Uang</label>
									<select class="form-control" name="idcurrency">
										<option value="" disabled selected> Pilih Mata Uang</option>
										<?php if ($data2 != "Not Found") : ?>
											<?php foreach ($data2 as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>" <?php echo ($data5[0]["idcurrency"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?> disabled><?php echo $key["namecomm"] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="col-6">
									<label>Metode Pembayaran</label>
									<select class="form-control" name="paymentmethod" required>
										<option value="" disabled selected> Pilih Metode Pembayaran</option>
										<?php if ($data4 != "Not Found") : ?>
											<?php foreach ($data4 as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>" <?php echo ($data5[0]["typepayment"] ==  $key["idcomm"]) ? ' selected="selected"' : ''; ?>> <?php echo $key["namecomm"] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
							</div>

							<div class="row d-flex justify-content-between mb-3">
								<div class="col-6">
									<label>Presentase Discount</label>
									<input type="text" name="dispers" id="dispers" onclick="dispersy()" oninput="discount1(this.value)" class="form-control" placeholder="0%" readonly>
								</div>
								<div class="col-6">
									<label>Nominal Discount</label>
									<input type="text" name="disnoms" id="disnoms" onclick="disnomsy()" oninput="count()" class="form-control" placeholder="Masukan Nominal" readonly value="<?php echo $data5[0]["discs"] ?>">
								</div>
							</div>
							<div class="mb-3">
								<label>Referensi Sales Order</label>
								<select class=" selectpicker form-control" data-live-search="true" onchange="chose(this.value)" name="return">
									<option value="" disabled selected>Cari Sales Order yang sudah ada</option>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data5 as $key) : ?>
											<option value="<?php echo json_encode($key['idso']) ?>"><?php echo $key["codeso"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<!-- <div class="mb-3">
								<label>Remark</label>
								<textarea type="text" name="remark" class="form-control" placeholder="" style="height: 110px;" required></textarea>
							</div> -->
						</div>
					</div>
					<div class="mt-1">
						<p style="font-size: 30px"><b>INFORMASI PRODUK</b></p>
						<hr style="height: 0.2%">
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-4">
							<p style="margin-bottom: 5px">Cari Produk</p>
							<input type="text" name="" oninput="search(this.value)" class="form-control" placeholder="Masukan Kata Kunci Produk">
							<div class="bays" style=" overflow-y: scroll; overflow-x: hidden; height:46vh ; padding-left: 2vh" id="itemx">
								<?php if ($data3 != "Not Found") : ?>
									<?php foreach ($data3 as $key) : ?>
										<?php if ($key["qty"] > "0") : ?>
											<div class="row d-flex justify-content-between lh-1 p-2" style="cursor: pointer;" onclick="selectitem(<?php echo $key["iditem"] ?>)">
												<div class="col-7">
													<p class="fs-5"><?php echo $key["nameitem"] ?></p>
													<p class="fs-6">SKU. <?php echo $key["sku"] ?></p>
												</div>
												<div class="col-5">
													<p class="fs-5"><?php echo 'Rp. ' . number_format(intval($key["subprice"]), 0, "", ".") ?></p>
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
									<div class="row d-flex justify-content-between">
										<div class="col-6">
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">Ready Stock</label>
												<div class="col-sm-9">
													<input type="number" id="readystock" class="form-control" readonly>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">Order Qty</label>
												<div class="col-sm-9">
													<input type="number" id="qtyorder" oninput="calc()" min="0" class="form-control">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">Balance</label>
												<div class="col-sm-9">
													<input type="number" id="balance" class="form-control" readonly>
													<input type="hidden" id="minstock" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-4 col-form-label">Disc %.</label>
												<div class="col-sm-8">
													<input type="text" id="disper" class="form-control" onclick="disperx()" oninput="disc1(this.value)">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-4 col-form-label">Disc Nominal</label>
												<div class="col-sm-8">
													<input type="text" id="disnom" class="form-control" onclick="disnomy()" oninput="disc2(this.value)">
												</div>
											</div>
											<div class="mb-3 row">
												<!-- <label for="inputPassword" class="col-sm-4 col-form-label">Harga Beli</label> -->
												<div class="col-sm-8">
													<input type="hidden" id="hargabeli" class="form-control" readonly>
												</div>
											</div>
											<!-- <p style="margin-top: 20px;margin-bottom: 0;">VAT</p>
											<div class="d-flex " style="margin-top: 5px">
												<div>
													<label class="switch">
														<input type="checkbox" id="vatx" name="vatx" value="0" onclick="vatt()" disabled>
														<span class="slider round"></span>
													</label>
												</div>
												<div style="margin-left: 20px">
													<p>Klik untuk on / off</p>
												</div>
											</div> -->
										</div>
									</div>
								</div>
								<div class="card-footer pb-4" style="background: #eeeeee;">
									<p>Summary</p>
									<div class="row d-flex justify-content-between">
										<div class="col">
											<p>Harga Item</p>
											<input type="hidden" id="hargaitem" class="form-control" readonly>
											<input type="text" id="hargaitemx" class="form-control" readonly onclick="focusprice()">
										</div>
										<div class="col">
											<p>DPP</p>
											<input type="hidden" id="dpp" class="form-control" readonly>
											<input type="text" id="dppx" class="form-control" readonly>
										</div>
										<div class="col">
											<p>VAT</p>
											<input type="hidden" id="vat" class="form-control" readonly>
											<input type="text" id="vatx" class="form-control" readonly>
										</div>
										<div class="col">
											<p>Sub total</p>
											<input type="hidden" id="subtotal" class="form-control" readonly>
											<input type="text" id="subtotalx" class="form-control" readonly>
										</div>
										<div class="col">
											<p>Disc total</p>
											<input type="hidden" id="totaldiscount" value="0" class="form-control" readonly>
											<input type="text" id="totaldiscountx" value="0" class="form-control" readonly>
										</div>
										<div class="col">
											<p>Grand total</p>
											<input type="hidden" id="grandtotal" class="form-control" readonly>
											<input type="text" id="grandtotalx" class="form-control" readonly>
										</div>
										<div class="col" style="margin-top: 4vh">
											<button style="background: #8F2E80; color: white;" class="btn" type="button" onclick="tambah()">TAMBAH</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pt-3"></div>
					<table class="table" style="width: 100%;">
						<thead style="background: purple; color: white">
							<tr style="height:40px;text-align:center">
								<th style="width: 3%;">#</th>
								<th style="width: 30%">Nama Item</th>
								<th style="width: 5%">SKU</th>
								<th style="width: 10%">Harga Item</th>
								<th style="width: 10%">DPP</th>
								<th style="width: 5%">VAT</th>
								<th style="width: 5%">QTY</th>
								<th style="width: 10%">Harga Jual</th>
								<th style="width: 5%;">Disc</th>
								<th style="width: 10%">Sub Total</th>
								<th style="width: 5%;">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $a  = 0;
							$notready = 0;
							$b = 1;

							foreach ($data5[0]["data"] as $key) : $qtyready ?>
								<?php foreach ($data3 as $keyx) : ?>
									<?php if ($key["iditem"] == $keyx["iditem"]) :
										$qtyready = $keyx["qty"];
									?>

									<?php endif ?>
								<?php endforeach ?>
								<?php if ($qtyready <= 0) {
									$notready = $notready + 1; ?>
									<tr id="item<?php echo $a ?>" style="background: #ef7979; cursor:pointer " onclick="edit(<?= $a ?> , <?= $key['iditem'] ?> )">
									<?php } else { ?>
										<?php if ($a % 2 == 0) { ?>
									<tr id="item<?php echo $a ?>" style="background: #eeeeee ; cursor:pointer" onclick="edit(<?= $a ?> , <?= $key['iditem'] ?>)">
									<?php } else { ?>
									<tr id=" item<?php echo $a ?>" style="cursor:pointer" onclick="edit(<?= $a ?> , <?= $key['iditem'] ?>)">
									<?php } ?>
								<?php } ?>

								<td><?php echo $b++ ?> </td>
								<td style="text-align:center"><input type="hidden" id=nameitemx_<?php echo $a ?> name="nameitemx[]" value="<?php echo $key['nameitem'] ?>"> <input type="hidden" name="idwh[]" value="<?php echo $key['idwh'] ?>"> <input type="hidden" name="iditemx[]" value="<?php echo $key['iditem'] ?>"><?php echo $key['nameitem'] ?></td>
								<td style="text-align:center" id=skux_<?php echo $a ?>> <input type="hidden" name="skux[]" value="<?php echo $key['sku'] ?>"><?php echo $key['sku'] ?></td>

								<td style="text-align:center"> <input type="hidden" id=hargaitem_<?php echo $a ?> name="hargaitem[]" value="<?php echo $key['price'] ?>"><?php echo 'Rp. ' . number_format($key['price'], 0, "", ".") ?></td>
								<td style="text-align:center"> <input type="hidden" id=hargabeli_<?php echo $a ?> name="hargabeli[]" value="<?php echo $key['pricebuyitem'] ?>"> <input type="hidden" name="dpps[<?php echo $a ?>]" value="<?php echo $key['dpp'] ?>"> <?php echo 'Rp. ' . number_format($key['dpp'], 0, "", ".") ?></td>
								<td style="text-align:center"> <input type="hidden" id=vat_<?php echo $a ?> name="vat[]" value="<?php echo $key['VATx'] ?>"><?php echo    'Rp. ' . number_format($key['VATx'], 0, "", ".") ?></td>
								<td style="text-align:center"> <input type="hidden" id=qtyorderx_<?php echo $a ?> name="qtyorderx[]" value="<?php echo $key['qty'] ?>"> <input type="hidden" name="qtyready[]" id="items<?php echo $a ?>" value="<?php echo $qtyready ?>"><?php echo $key['qty'] ?></td>
								<td style="text-align:center"> <input type="hidden" id=pricex_<?php echo $a ?> name="pricex[]" value="<?php echo intval($key['price'])  ?>"><?php echo  'Rp. ' . number_format(($key['price'] + $key["VATx"]) * $key["qty"], 0, "", ".")  ?></td>
								<td style="text-align:center"> <input type="hidden" id=discx_<?php echo $a ?> name="discx[]" value="<?php echo $key['disc'] ?>"><?php echo 'Rp. ' . number_format($key['disc'], 0, "", ".")  ?></td>
								<td style="text-align:center"> <input type="hidden" id=subtotalxx_<?php echo $a ?> name="subtotalxx[]" value="<?php echo intval($key['totalprice']) ?>"><?php echo 'Rp. ' . number_format(intval($key['totalprice']), 0, "", ".")  ?></td>
								<td style="text-align:center" id=Action[]><button class="btn btn-outline-danger" onclick="del(<?php echo $a ?>,<?php echo $key['totalprice'] ?>,<?php echo $key["VATx"] ?>,<?php echo $key["disc"] ?>,<?php echo $qtyready ?>)">Delete</button></td>
									</tr>
									<?php $a++ ?>
								<?php endforeach ?>
						</tbody>
					</table>
					<div class="d-flex" style="margin-top: 50px">
						<label style="padding-top: 0.5vh;">Jumlah Item : </label>
						<input type="text" class="py-1" id="jmlitem" name="" value="<?php echo $data5[0]["totalso"] ?>" style="margin-left: 20px;border-radius:4px">
						<input type="hidden" id="jmlitemx" name="" value="<?php echo $data5[0]["totalso"] ?>" style="margin-left: 20px">
						<input type="hidden" id="editindex" name="" value="" style="margin-left: 20px">
						<input type="hidden" id="oldsub" name="" value="" style="margin-left: 20px">
					</div>
				</div>
				<div class="col-3 pb-2">
					<div class="bays">
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
									<input type="text" name="qty" id="qtys" value="<?php echo $data5[0]["totalso"] ?>" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Total Harga</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Sub Total</p>
								</div>
								<div class="col-4">
									<input type="text" name="subtotals" id="subtotals" value="<?php echo $data5[0]["subtotal"] ?>" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Discount</p>
							<hr>
							<!-- <div class="row">
								<div class="col-8">
									<p>Persen</p>
								</div>
								<div class="col-4">
									<input type="text" value="0" id="disperx" class="form-control" readonly>
								</div>
							</div> -->
							<div class="row">
								<div class="col-8">
									<p>Nominal</p>
								</div>
								<div class="col-4">
									<input type="text" value="<?php echo $data5[0]["discs"] ?>" id="disnomx" class="form-control" readonly>
									<input type="hidden" value="0" id="disnomxy" class="form-control" readonly>
								</div>
							</div>
							<!-- <p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">VAT</p> -->
							<hr>
							<!-- <div class="row">
								<div class="col-8">
									<p>Persen</p>
								</div>
								<div class="col-4">
									<input type="text" id="vatper" value="0" class="form-control" readonly>
								</div>
							</div> -->
							<div class="row" style="display: none;">
								<div class="col-8">
									<p>Nominal</p>
								</div>
								<div class="col-4">
									<input type="text" id="vatnom" name="vatnom" value="<?php echo $data5[0]["VATs"] ?>" class="form-control" readonly>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-8">
									<p><b>Grand Total</b></p>
								</div>
								<div class="col-4">
									<input type="text" name="grandtotals" id="grandtotals" value="<?php echo $data5[0]["totalprices"] ?>" class="form-control" readonly>
									<input type="hidden" name="grandtotalsx" id="grandtotalsx" value="0" class="form-control" readonly>
									<input type="hidden" name="notready" id="notready" value="<?php echo $notready ?>" class="form-control" readonly>
								</div>
							</div>
							<button class="btn btn-outline-warning col-12 mt-4">Update Order</button>
						</div>
					</div>
				</div>
				<!-- <div class="col-3 pb-2">
					<div class="bays">
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
									
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Total Harga</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Sub Total</p>
								</div>
								<div class="col-4">
									
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Discount</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Nominal</p>
								</div>
								<div class="col-4">
									
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">VAT</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Nominal</p>
								</div>
								<div class="col-4">
									
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-8">
									<p><b>Grand Total</b></p>
								</div>
								<div class="col-4">
									
								</div>
							</div>
							<button class="btn btn-outline-warning col-12 mt-4">Update Order</button>
						</div>
					</div>
				</div> -->
			</div>

			<input type="hidden" name="from" value="<?php echo $from ?>">
	</form>
</body>

</html>
<script type="text/javascript">
	// Get the input field
	var input = document.getElementById("hargaitemx");

	// Execute a function when the user releases a key on the keyboard
	input.addEventListener("keyup", function(event) {
		// Number 13 is the "Enter" key on the keyboard
		if (event.keyCode === 13) {

			// $('#hargaitem').val($('#hargaitemx').val().replace('Rp. ', '').replaceAll(".", ""))
			// $('#hargaitemx').val(formatRupiah($('#hargaitem').val(), 'Rp. '))
			// if ($('#vatx').val() != 0) {

			// 	$('#vat').val($('#hargaitem').val() * (10 / 100));
			// 	$('#vatx').val(formatRupiah($('#vat').val(), 'Rp. '));
			// }
			// $('#subtotal').val(Number($('#hargaitem').val()) + Number($('#vat').val()) * $('#qtyorder').val())
			// $('#subtotalx').val(formatRupiah($('#subtotal').val(), 'Rp. '))
			// $('#grandtotal').val($('#subtotal').val() - $('#totaldiscount').val())
			// $('#grandtotalx').val(formatRupiah($('#grandtotal').val(), 'Rp. '))
			// console.log($('#grandtotal').val())

			calc()
			$('#hargaitem').val($('#hargaitemx').val())


		}
	});


	function edit(a, x) {
		$('#editindex').val(a)
		selectitem(x);
	}


	function focusprice() {
		$('#hargaitemx').val("")
	}


	$(document).on("keydown", "form", function(event) {
		return event.key != "Enter";
	});

	function vatt() {
		if ($('#vatx').val() == 0) {
			$('#vatx').val(10);
			$("#grandtotal").val(Number(($('#subtotal').val() - $('#totaldiscount').val()) * (10 / 100)) + Number($('#subtotal').val() - $('#totaldiscount').val()))
			$('#grandtotalx').val(formatRupiah($('#grandtotal').val(), 'Rp. '))
		} else {
			$('#vatx').val(0);
			$("#grandtotal").val($('#subtotal').val() - $('#totaldiscount').val())
			$('#grandtotalx').val(formatRupiah($('#grandtotal').val(), 'Rp. '))
		}
	}



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
				if (data[i]["priceitem"] != null) {
					baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`

				} else {
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
				if (data[i]["priceitem"] != null) {
					baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`

				} else {
					baris += `
															<p class="fs-5">` + formatRupiah("0", 'Rp. ') + `</p>`
				}
				baris += `	</div>
													</div>`

			} else if (x == "") {
				baris += `
							<div class="row d-flex justify-content-between lh-1 p-3" style="cursor: pointer;" onclick="selectitem(` + data[i]["iditem"] + `)">
														<div class="col-8">
															<p class="fs-5">` + data[i]["nameitem"] + `</p>
															<p class="fs-6">SKU. ` + data[i]["sku"] + `</p>
														</div>
														<div class="col-4">`
				if (data[i]["priceitem"] != null) {
					baris += `
															<p class="fs-5">` + formatRupiah(data[i]["priceitem"], 'Rp. ') + `</p>`

				} else {
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
		var from = <?php echo json_encode($from) ?>;
		if (from == "sales") {
			window.location.href = "<?php echo base_url('Employe/salesorder') ?>";
		} else {
			window.location.href = "<?php echo base_url('Employe/pendinglist') ?>";
		}

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
				if (data[i]["subprice"] != null) {
					secunder += `
										<p  class="fs-5 px-4" style="text-align: right;">` + formatRupiah(data[i]["subprice"], 'Rp. ') + `</p>
										

										`


				} else {

					secunder += `
										<p  class="fs-5 px-4" style="text-align: right;">` + formatRupiah("0", 'Rp. ') + `</p>
										

										`


				}
				secunder += `
								
								<input type="hidden" id="sku" value="` + data[i]["sku"] + `">
								<input type="hidden" id="priceitem" value="` + data[i]["subprice"] + `">

								`
				$("#nameitemx").html(baris);
				$("#secunder").html(secunder);
				$('#hargaitem').val(data[i]["priceitem"])
				$('#grandtotal').val(data[i]["subprice"])
				if (data[i]["VAT"] != null) {
					$('#vat').val(data[i]["priceitem"] * data[i]["VAT"] / 100)
				} else {
					$('#vat').val(data[i]["priceitem"] * 0 / 100)
				}

				$('#vatx').val(formatRupiah($('#vat').val(), 'Rp. '))
				$('#subtotal').val(data[i]["subprice"])
				if (data[i]["pricebuyitem"] != null) {
					$('#hargabeli').val(formatRupiah(data[i]["pricebuyitem"], 'Rp. '))
				} else {
					$('#hargabeli').val(formatRupiah("0", 'Rp. '))
				}

				console.log(data[i]["pricebuyitem"]);
				if (data[i]["subprice"] != null) {
					$('#subtotalx').val(formatRupiah(data[i]["subprice"], 'Rp. '))
				} else {
					$('#subtotalx').val(formatRupiah("0", 'Rp. '))
				}
				if (data[i]["priceitem"] != null) {
					$('#hargaitemx').val(formatRupiah(data[i]["priceitem"], 'Rp. '))
				} else {
					$('#hargaitemx').val(formatRupiah("0", 'Rp. '))
				}
				if (data[i]["subprice"] != null) {
					$('#grandtotalx').val(formatRupiah(data[i]["subprice"], 'Rp. '))
				} else {
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

				if ($('#editindex').val() != "") {
					console.log($('#editindex').val() + " " + $('#qtyorderx_' + $('#editindex').val() + '').val())
					$('#qtyorder').val($('#qtyorderx_' + $('#editindex').val() + '').val())
					$('#disnom').val($('#discx_' + $('#editindex').val() + '').val())
					$('#hargaitem').val($('#hargaitem_' + $('#editindex').val() + '').val())
					$('#hargaitemx').val($('#hargaitem_' + $('#editindex').val() + '').val())
					$('#oldsub').val($('#subtotalxx_' + $('#editindex').val() + '').val())
				}

				if (data[i]["VAT"] != null && data[i]["VAT"] != 0) {
					calc("Y")
				} else {
					calc("N")
				}

			}
		}

	}

	function calc(usesn) {
		console.log("OK")
		var harga = $('#hargaitem').val();
		var dpp = (harga / 1.11);
		var vat = harga - dpp.toFixed(0);

		var disc = $('#disnom').val();
		if (disc == "" || disc == null) {
			disc = 0;
		}
		var qty = $('#qtyorder').val();
		var sub = harga * qty;
		var disctotal = disc;
		var grandtotal = sub - disctotal;

		$('#dpp').val(dpp.toFixed(0));
		$('#dppx').val(dpp.toFixed(0));
		$('#vat').val(vat);
		$('#vatx').val(vat);
		$('#subtotal').val(sub);
		$('#subtotalx').val(sub);
		$('#totaldiscount').val(disctotal);
		$('#totaldiscountx').val(disctotal);
		$('#grandtotal').val(grandtotal);
		$('#grandtotalx').val(grandtotal);

		if (usesn != "Y") {
			$('#vat').val(0);
			$('#vatx').val(0);
		}

		// $('#dppx').val(formatRupiah($('#dpp').val(), "Rp."));
		// $('#vatx').val(formatRupiah($('#vatx').val(), "Rp."));
		// $('#subtotalx').val(formatRupiah($('#subtotalx').val(), "Rp."));
		// $('#totaldiscountx').val(formatRupiah($('#totaldiscountx').val(), "Rp."));
		// $('#grandtotalx').val(formatRupiah($('#grandtotalx').val(), "Rp."));
		// $('#hargaitemx').val(formatRupiah($('#hargaitemx').val(), "Rp."));
		// $('#disnom').val(formatRupiah($('#disnom').val(), "Rp."));

	}

	function qtyx(x) {
		if (x < 0) {
			x = 0;
		}
		if (x > 0) {
			$('#qtyorder').val(x);
			$('#balance').val($('#readystock').val() - x)
			var total = (Number($('#hargaitem').val()) + Number($('#vat').val())) * x
			$('#subtotalx').val(total)
			$('#subtotal').val(total)
			$('#subtotalx').val(formatRupiah($('#subtotalx').val(), 'Rp. '))

			var grantotal = (Number($('#hargaitem').val()) + Number($('#vat').val())) * x - $('#totaldiscount').val()
			$('#grandtotalx').val(grantotal)
			$('#grandtotal').val(grantotal)
			$('#grandtotalx').val(formatRupiah($('#grandtotalx').val(), 'Rp. '))

		}

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

	function disperx() {
		document.getElementById('disnom').readOnly = true;
		document.getElementById('disper').readOnly = false;
	}

	function disnomy() {
		document.getElementById('disnom').readOnly = false;
		document.getElementById('disper').readOnly = true;
		$('#disnom').val("")
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
			calc()

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
			$('#totaldiscount').val(x);
			$('#totaldiscountx').val($('#totaldiscount').val());
			$('#grandtotal').val(disc);
			$('#grandtotalx').val($('#grandtotal').val());
			calc()


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

				if ($('#editindex').val() == "") {
					var a = $('#jmlitem').val()
					var b = Number($('#jmlitem').val()) + 1
				} else {
					var a = $('#editindex').val()
					var b = Number($('#editindex').val()) + Number(1)
					var oldsubtotals = $('#oldsub').val();
				}


				if (a % 2 == 0) {
					baris += `
			<tr id=item` + $('#jmlitemx').val() + ` style="height:40px;text-align:center;cursor:pointer;" onclick="edit(` + a + `, ` + $('#iditem').val() + `)">
										<td>` + b + `</td>
			<td style="text-align:center" id=nameitem[]><input type="hidden" id="nameitemx_` + a + `" name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
			<td style="text-align:center" id=sku[]> <input type="hidden" id="skux_` + a + `"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
			<td style="text-align:center" id=hargaitem[]> <input type="hidden"  id="hargaitem_` + a + `"   name="hargaitem[]" value ="` + $('#hargaitem').val() + `">` + formatRupiah($('#hargaitem').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=dpp[]> <input type="hidden" id="hargabeli_` + a + `"  name="hargabeli[]" value ="` + $('#hargabeli').val() + `">  <input type="hidden" id="dpps[` + a + `]"   name="dpps[]" value ="` + $('#dpp').val() + `">` + formatRupiah($('#dpp').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=vat[]> <input type="hidden" id="vat_` + a + `"   name="vat[]" value ="` + $('#vat').val() + `">` + formatRupiah($('#vatx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=qtyorder[]> <input type="hidden" id="qtyorderx_` + a + `"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"><input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
			<td style="text-align:center" id=price[]> <input type="hidden" id="pricex_` + a + `" name="pricex[]" value ="` + $('#subtotal').val() + `">` + formatRupiah($('#subtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=disc[]> <input type="hidden" id="discx_` + a + `"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + formatRupiah($('#totaldiscountx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=subtotal[]> <input type="hidden" id="subtotalxx_` + a + `"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + formatRupiah($('#grandtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=Action[]><button class="btn btn-outline-danger" onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `,` + (Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val()))) + `,` + $('#totaldiscount').val() + `)">Delete</button></td>
									</tr>	
								 `
				} else {
					baris += `
								<tr id=item` + $('#jmlitemx').val() + ` style="style="height:40px;text-align:center; background:#eeeeee">
									
										<td>` + b + `</td>
										<td style="text-align:center" id=nameitem[]><input type="hidden" id="nameitemx_` + a + `" name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
			<td style="text-align:center" id=sku[]> <input type="hidden" id="skux_` + a + `"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
			<td style="text-align:center" id=hargaitem[]> <input type="hidden"  id="hargaitem_` + a + `"   name="hargaitem[]" value ="` + $('#hargaitem').val() + `">` + formatRupiah($('#hargaitem').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=dpp[]> <input type="hidden" id="hargabeli_` + a + `"  name="hargabeli[]" value ="` + $('#hargabeli').val() + `">  <input type="hidden" id="dpps[` + a + `]"   name="dpps[]" value ="` + $('#dpp').val() + `">` + formatRupiah($('#dpp').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=vat[]> <input type="hidden" id="vat_` + a + `"   name="vat[]" value ="` + $('#vat').val() + `">` + formatRupiah($('#vatx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=qtyorder[]> <input type="hidden" id="qtyorderx_` + a + `"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"><input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
			<td style="text-align:center" id=price[]> <input type="hidden" id="pricex_` + a + `" name="pricex[]" value ="` + $('#subtotal').val() + `">` + formatRupiah($('#subtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=disc[]> <input type="hidden" id="discx_` + a + `"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + formatRupiah($('#totaldiscountx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=subtotal[]> <input type="hidden" id="subtotalxx_` + a + `"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + formatRupiah($('#grandtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=Action[]><button class="btn btn-outline-danger" onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `,` + (Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val()))) + `,` + $('#totaldiscount').val() + `)">Delete</button></td>
									</tr>	
								 `
				}


				if ($('#editindex').val() == "") {
					$("#body").append(baris)
					$('#jmlitem').val(Number($('#jmlitem').val()) + 1);
					$('#qtys').val(Number($('#jmlitem').val()));
					$('#subtotals').val(Number($('#subtotals').val()) + Number($('#grandtotal').val()));
					$('#jmlitemx').val(Number($('#jmlitem').val()) + 1);
				} else {
					$('#item' + $('#editindex').val()).html();
					document.getElementById('item' + $('#editindex').val()).innerHTML = baris
					$('#subtotals').val(Number(Number($('#subtotals').val()) - oldsubtotals) + Number($('#grandtotal').val()));
				}

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
				$('#vatnom').val(Number($('#vatnom').val()) + Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val())))
				// $('#disnomx').val( Number($('#disnomx').val()) + Number($('#totaldiscount').val()))							
				// $('#disnomxy').val( Number($('#disnomxy').val()) + Number($('#totaldiscount').val()))							
				$("#nameitemx").html(baris);
				$("#secunder").html(secunder);
				$('#subtotal').val("")
				$('#grandtotal').val("")
				$('#subtotalx').val("")
				$('#grandtotalx').val("")
				$('#totaldiscountx').val("")
				$('#readystock').val("")
				$('#balance').val("")
				$('#qtyorder').val("")
				$('#disper').val("")
				$('#disnom').val("")
				$('#hargabeli').val("")
				$('#hargaitem').val("")
				$('#hargaitemx').val("")
				$('#vat').val("")
				$('#vatx').val("")
				$('#dpp').val("")
				$('#dppx').val("")
				$('#editindex').val("")


				document.getElementById('disnoms').readOnly = false;
				document.getElementById('dispers').readOnly = false;
				document.getElementById('vat').disabled = false;
				document.getElementById('vatx').disabled = true;

				count();
			}
		} else {
			var baris = '';
			if ($('#editindex').val() == "") {
				var a = $('#jmlitem').val()
				var b = Number($('#jmlitem').val()) + 1
			} else {
				var a = $('#editindex').val()
				var b = Number($('#editindex').val()) + Number(1)
				var oldsubtotals = $('#oldsub').val();
			}
			if (a % 2 == 0) {
				baris += `
									<tr id=item` + $('#jmlitemx').val() + ` style="height:40px;text-align:center;cursor:pointer;" onclick="edit(` + a + `, ` + $('#iditem').val() + `)">
										<td>` + b + `</td>
										<td style="text-align:center" id=nameitem[]><input type="hidden" id="nameitemx_` + a + `" name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
			<td style="text-align:center" id=sku[]> <input type="hidden" id="skux_` + a + `"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
			<td style="text-align:center" id=hargaitem[]> <input type="hidden"  id="hargaitem_` + a + `"   name="hargaitem[]" value ="` + $('#hargaitem').val() + `">` + formatRupiah($('#hargaitem').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=dpp[]> <input type="hidden" id="hargabeli_` + a + `"  name="hargabeli[]" value ="` + $('#hargabeli').val() + `">  <input type="hidden" id="dpps[` + a + `]"   name="dpps[]" value ="` + $('#dpp').val() + `">` + formatRupiah($('#dpp').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=vat[]> <input type="hidden" id="vat_` + a + `"   name="vat[]" value ="` + $('#vat').val() + `">` + formatRupiah($('#vatx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=qtyorder[]> <input type="hidden" id="qtyorderx_` + a + `"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"><input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
			<td style="text-align:center" id=price[]> <input type="hidden" id="pricex_` + a + `" name="pricex[]" value ="` + $('#subtotal').val() + `">` + formatRupiah($('#subtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=disc[]> <input type="hidden" id="discx_` + a + `"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + formatRupiah($('#totaldiscountx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=subtotal[]> <input type="hidden" id="subtotalxx_` + a + `"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + formatRupiah($('#grandtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=Action[]><button class="btn btn-outline-danger" onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `,` + (Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val()))) + `,` + $('#totaldiscount').val() + `)">Delete</button></td>
									</tr>	
								 `
			} else {
				baris += `
									<tr id=item` + $('#jmlitemx').val() + ` style = "background : #eeeeee">
									<td>` + b + `</td>
									<td style="text-align:center" id=nameitem[]><input type="hidden" id="nameitemx_` + a + `" name="nameitemx[]" value ="` + $('#nameitem').val() + `"> <input type="hidden"  name="idwh[]" value ="` + $('#idwh').val() + `"> <input type="hidden"  name="iditemx[]" value="` + $('#iditem').val() + `">` + $('#nameitem').val() + `</td>
			<td style="text-align:center" id=sku[]> <input type="hidden" id="skux_` + a + `"  name="skux[]" value ="` + $('#sku').val() + `">` + $('#sku').val() + `</td>
			<td style="text-align:center" id=hargaitem[]> <input type="hidden"  id="hargaitem_` + a + `"   name="hargaitem[]" value ="` + $('#hargaitem').val() + `">` + formatRupiah($('#hargaitem').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=dpp[]> <input type="hidden" id="hargabeli_` + a + `"  name="hargabeli[]" value ="` + $('#hargabeli').val() + `">  <input type="hidden" id="dpps[` + a + `]"   name="dpps[]" value ="` + $('#dpp').val() + `">` + formatRupiah($('#dpp').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=vat[]> <input type="hidden" id="vat_` + a + `"   name="vat[]" value ="` + $('#vat').val() + `">` + formatRupiah($('#vatx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=qtyorder[]> <input type="hidden" id="qtyorderx_` + a + `"  name="qtyorderx[]" value ="` + $('#qtyorder').val() + `"><input type="hidden"  name="qtyready[]" value ="` + $('#balance').val() + `">` + $('#qtyorder').val() + `</td>
			<td style="text-align:center" id=price[]> <input type="hidden" id="pricex_` + a + `" name="pricex[]" value ="` + $('#subtotal').val() + `">` + formatRupiah($('#subtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=disc[]> <input type="hidden" id="discx_` + a + `"  name="discx[]" value ="` + $('#totaldiscount').val() + `">` + formatRupiah($('#totaldiscountx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=subtotal[]> <input type="hidden" id="subtotalxx_` + a + `"  name="subtotalxx[]" value ="` + $('#grandtotal').val() + `">` + formatRupiah($('#grandtotalx').val(), "Rp. ") + `</td>
			<td style="text-align:center" id=Action[]><button class="btn btn-outline-danger" onclick="del(` + $('#jmlitemx').val() + `,` + $('#grandtotal').val() + `,` + (Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val()))) + `,` + $('#totaldiscount').val() + `)">Delete</button></td>
									</tr>	
								 `
			}

			if ($('#editindex').val() == "") {
				$("#body").append(baris)
				$('#jmlitem').val(Number($('#jmlitem').val()) + 1);
				$('#qtys').val(Number($('#jmlitem').val()));
				$('#subtotals').val(Number($('#subtotals').val()) + Number($('#grandtotal').val()));
				$('#jmlitemx').val(Number($('#jmlitem').val()) + 1);
			} else {
				console.log($('#subtotals').val() + " " + oldsubtotals + " " + $('#grandtotal').val())
				$('#item' + $('#editindex').val()).html();
				document.getElementById('item' + $('#editindex').val()).innerHTML = baris
				$('#subtotals').val(Number(Number($('#subtotals').val()) - oldsubtotals) + Number($('#grandtotal').val()));
			}
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

			$('#vatnom').val(Number($('#vatnom').val()) + Number($('#subtotal').val() - ($('#hargaitem').val() * $('#qtyorder').val())))
			// $('#disnomx').val( Number($('#disnomx').val()) + Number($('#totaldiscount').val()))
			// $('#disnomxy').val( Number($('#disnomxy').val()) + Number($('#totaldiscount').val()))
			$("#nameitemx").html(baris);
			$("#secunder").html(secunder);
			$('#subtotal').val("")
			$('#grandtotal').val("")
			$('#subtotalx').val("")
			$('#grandtotalx').val("")
			$('#totaldiscountx').val("")
			$('#readystock').val("")
			$('#balance').val("")
			$('#qtyorder').val("")
			$('#disper').val("")
			$('#disnom').val("")
			$('#hargabeli').val("")
			$('#hargaitem').val("")
			$('#hargaitemx').val("")
			$('#vat').val("")
			$('#vatx').val("")
			$('#dpp').val("")
			$('#dppx').val("")
			$('#editindex').val("")
			$('#oldsub').val("")

			document.getElementById('disnoms').readOnly = false;
			document.getElementById('dispers').readOnly = false;
			document.getElementById('vat').disabled = false;
			document.getElementById('vatx').disabled = true;

			count();
		}


	}


	function del(x, y, z, a, b) {
		if (confirm('Hapus Item Ini?')) {
			$('#item' + x + '').remove();
		}
		$('#jmlitem').val($('#jmlitem').val() - 1);
		$('#qtys').val($('#qtys').val() - 1);
		$('#subtotals').val($('#subtotals').val() - y);
		$('#vatnom').val($('#vatnom').val() - z);
		$('#disnomx').val($('#disnomx').val() - a);

		if (b <= 0) {
			$('#notready').val($('#notready').val() - 1);
		}


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

		if ($('#disnoms').val() != "") {
			$('#disnomx').val(Number($('#disnomxy').val()) + Number($('#disnoms').val()))
		} else {
			$('#disnomx').val(Number($('#disnomxy').val()) + Number(0))
		}
		var grantotal = Number($('#subtotals').val() - $('#disnomx').val());
		$('#grandtotals').val(grantotal);
		$('#grandtotalsx').val(grantotal);
	}

	function counts() {

		if ($('#disnoms').val() != "") {
			$('#disnomx').val(Number($('#disnomxy').val()) + Number($('#disnoms').val()))
		}
		var grantotal = Number($('#subtotals').val() - $('#disnomx').val());
		$('#grandtotals').val(grantotal);

	}

	function dispersy() {
		document.getElementById('disnoms').readOnly = true;
		document.getElementById('dispers').readOnly = false;
	}

	function disnomsy() {
		document.getElementById('disnoms').readOnly = false;
		document.getElementById('dispers').readOnly = true;
	}

	function discount1(x) {
		if (x >= 100) {
			x = 100
			$('#grandtotalsx').val(0)

		}
		if (x < 0) {
			x = 0
		}
		$('#dispers').val(x);
		$('#disperx').val(x);
		$('#disnoms').val($('#grandtotalsx').val() * (x / 100));
		$('#disnomx').val(Number($('#disnomxy').val()) + Number($('#subtotals').val() * (x / 100)));
		console.log(x)
		counts();
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