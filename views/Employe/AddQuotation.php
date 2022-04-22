<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>

<style type="text/css">
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

	/* The Modal (background) */
	.modal {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 1;
		/* Sit on top */
		padding-top: 100px;
		/* Location of the box */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.4);
		/* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;

		border: 1px solid #888;
		width: 60%;
	}

	/* The Close Button */
	.close {
		color: #ffff;
		float: right;
		font-size: 18px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}

	.bays {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
	}

	.input-control.success input {
		border-color: #09c372;
	}

	.input-control.error input {
		border-color: #ff3860;
	}

	.input-control .error {
		color: #ff3860;
		font-size: 9px;
		height: 13px;
	}
</style>

<?php
$codequo;
if ($data4 != "Not Found") {
	foreach ($data4 as $key) {
		$codequo = $key["codequo"];
		$codequo++;
	}
} else {
	$codequo = "QT0001";
}
?>

<div class="container-xxl" style="padding-left: 6vw;background: #3C2E8F;">
	<div class="row">
		<div class="col-6">
			<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">QUOTATION / New Quotation</p>
			<p class="text-white font-weight-bold pl-2" style="font-size: 32px">FORM QUOTATION</p>
		</div>
		<div class="col-6">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
	</div>
</div>
<div class="container-xxl my-3" style="padding-left: 6vw;">
	<div class="row mr-2">
		<div class="col">
			<div class="card bays">
				<div class="card-body">
					<p style="font-size: 26px;"><b>PENAWARAN BARU</b></p>
					<hr style="height: 0.5vh; background: #eeeeee; margin-top: 2%">
					<form action="<?php echo base_url('Employe/insertquotation') ?>" method="POST" id="form" class="needs-validation" novalidate>
						<div class="row d-flex justify-content-between">
							<div class="col-4">
								<p style="font-size: 22px;"><b>Product / Item</b></p>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"> <b>Informasi Dasar</b> </label>
									<div class="col-sm-9">
										<div class="mb-3">
											<label class="form-label">No. Pemesanan</label>
											<input type="text" name="noquo" class="form-control" readonly value="<?php echo $codequo ?>">
										</div>
										<div class="mb-3">
											<label class="form-label">Jenis Pemesanan</label>
											<select class="form-control" name="typequo">
												<option value="" disabled selected>Pilih Jenis Pemesanan</option>
												<?php if ($data5 != "Not Found") : ?>
													<?php foreach ($data5 as $key) : ?>
														<option value="<?php echo $key["codecomm"] ?>"><?php echo $key["namecomm"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
											<div class="invalid-feedback">
												Masukan Jenis Pemesanan
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Penawaran</label>
											<input type="text" name="judul" id="judul" class="form-control" required>
											<div class="invalid-feedback">
												Masukan Judul Penawaran
											</div>
											<div class="error"></div>
										</div>
										<div class="mb-3">
											<label class="form-label">Customer</label>
											<select class="form-control selectpicker" name="cust" data-live-search="true" required onchange="customer(this.value)">
												<option value="" selected>Pilih Customer</option>
												<?php if ($data != "Not Found") : ?>
													<?php foreach ($data as $key) : ?>
														<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
											<div class="invalid-feedback">
												Masukan Judul Penawaran
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"><b>Mata Uang & Pajak</b></label>
									<div class="col-sm-9">
										<div class="mb-3">
											<label class="form-label">Pilih Mata Uang</label>
											<!-- Hapus disable jika mata uang ada pilihan -->
											<select aria-label="Disabled select example" disabled class="form-control" name="cur" required>
												<option value="" disabled selected>Pilih Mata Uang</option>
												<?php if ($data1 != "Not Found") : ?>
													<?php foreach ($data1 as $key) : ?>
														<option value="<?php echo $key["idcomm"] ?>" <?php echo ($key["namecomm"] ==  'Rupiah') ? ' selected="selected"' : ''; ?> disabled><?php echo $key["namecomm"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
										</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"><b>Akun Perbankan</b></label>
									<div class="col-sm-9">
										<div class="mb-3">
											<label class="form-label">Nomor Buku Bank</label>
											<!-- <input type="number" class="form-control" name="norek" id="norek" required> -->
											<select class="form-control" name="norek" required>
												<option value="" selected disabled>Pilih Nomor Rekening</option>
												<?php if ($data6 != "Not Found") : ?>
													<?php foreach ($data6 as $key) : ?>
														<option value="<?php echo $key["attrib1"] ?>"><?php echo $key["attrib1"] ?>&nbsp;(<?php echo $key["attrib2"] ?>)</option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
											<div class="invalid-feedback">
												Masukan Buku Bank
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Metode Pembayaran</label>
											<select class="form-control" name="paymentmethod" required>
												<option value="" selected disabled>Pilih Metode Pembayaran</option>
												<?php if ($data3 != "Not Found") : ?>
													<?php foreach ($data3 as $key) : ?>
														<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
											<div class="invalid-feedback">
												Masukan Metode Pembayaran
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"><b>Pengiriman</b></label>
									<div class="col-sm-9">
										<div class="mb-3">
											<label class="form-label">Pilih Tanggal Pengiriman</label>
											<input type="date" name="delivdate" class="form-control" required>
											<div class="invalid-feedback">
												Masukan Tanggal
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Pilih Jasa Pengiriman</label>
											<input type="text" name="jasapengirim" class="form-control" required>
											<div class="invalid-feedback">
												Masukan Jasa Pengiriman
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat Pengiriman</label>
											<!-- <input type="text" name="delivaddr" id="alamat" readonly class="form-control"> -->
											<textarea name="delivaddr" id="alamat" cols="7" rows="3" class="form-control"></textarea>
											<div class="invalid-feedback">
												Masukan Alamat
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"><b>Masa Berlaku Penawaran</b></label>
									<div class="col-sm-9">
										<div class="mb-3">
											<label class="form-label">Pilih Tanggal</label>
											<input type="date" name="expquo" class="form-control" required>
											<div class="invalid-feedback">
												Pilih Tanggal
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label"><b>Global Discount</b></label>
									<div class="col-sm-9">
										<div class="row d-flex justify-content-between">
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Persentase</label>
													<input type="number" id="dispers" name="dispers" min="0" max="100" onclick="disper1()" oninput="discx(this.value)" class="form-control">
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Nominal</label>
													<input type="number" id="disnoms" name="disnoms" min="0" value="0" onclick="disnom1()" oninput="disc1(this.value)" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-8">
								<div class="row d-flex justify-content-between">
									<div class="col-9"></div>
									<div class="col-3"><a class="btn btn-outline-primary my-3 ml-3" style="float: right;" id="getitem"> <i class="fa fa-plus"></i> Tambah Product</a></div>
								</div>
								<div class="bays" style="width: 100%;">
									<table class=" table">
										<thead style="background: #3C2E8F;color: white">
											<tr>
												<th style="width: 20%">Nama</th>
												<th>SKU</th>
												<th>Harga Beli</th>
												<th>Harga Item</th>
												<th>VAT</th>
												<th>QTY</th>
												<th>Harga Jual</th>
												<th>Disc</th>
												<th>Sub Total</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="body">
										</tbody>
									</table>
								</div>
								<div class="mt-5">
									<div class="row d-flex justify-content-between">
										<div class="col-8">
										</div>
										<div class="col-4">
											<div class="mb-3 row">
												<label class="col-sm-5 col-form-label">Jumlah Item</label>
												<div class="col-sm-7">
													<input type="text" name="jmlitem" id="jmlitem" value="0" class="form-control-plaintext" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="row d-flex justify-content-between">
										<div class="col-8">
										</div>
										<div class="col-4">
											<div class="mb-3 row">
												<label class="col-sm-5 col-form-label">Price Item Total</label>
												<div class="col-sm-7">
													<input type="text" name="grandtotals" id="grandtotals" value="0" class="form-control-plaintext" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="row d-flex justify-content-between">
										<div class="col-8">
										</div>
										<div class="col-4">
											<div class="mb-3 row">
												<label class="col-sm-5 col-form-label">Grand Total</label>
												<div class="col-sm-7">
													<input type="text" name="grandtotalx" id="grandtotalx" value="0" class="form-control-plaintext" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div>
									<label class="ml-3"><b>Additional Info</b></label>
									<div class="col-sm-12">
										<div class="mb-3">
											<textarea class="form-control" style="height: 19.2vh;" name="moreinfo"></textarea>
										</div>
									</div>
									<button style="float: right;" type="submit" class="btn btn-outline-primary" type="submit" onclick="makeorder()">Buat Penawaran</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- The Modal -->
<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="d-flex align-items-center" style="justify-content: space-between; background: #0085ff;color: white;height: 10vh">
			<p>
				<center><b style="font-size: 30px">TAMBAH PRODUCT</b></center>
			</p>
		</div>
		<div class="row d-flex justify-content-between p-3">
			<div class="col">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label"><b>Pilih Product</b></label>
					<select class=" selectpicker form-control" data-live-search="true" onchange="chose(this.value)" id="selitem">
						<option value="" disabled selected>Cari Product atau Item</option>
						<?php if ($data2 != "Not Found") : ?>
							<?php foreach ($data2 as $key) : ?>
								<option value="<?php echo json_encode($key['iditem']) ?>"><?php echo $key["nameitem"] ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-2 col-form-label">Nama Product</label>
					<div class="col-sm-10">
						<input type="text" name="nameiem" id="nameitem" readonly class="form-control">
						<input type="hidden" name="iditem" id="iditem" readonly class="form-control">
						<input type="hidden" name="grandtotal" id="grandtotal" readonly value="0" class="form-control">
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-2 col-form-label">SKU</label>
					<div class="col-sm-10">
						<input type="text" name="sku" id="sku" readonly class="form-control">
					</div>
				</div>
				<div class="mb-3 row">
					<div class="col-sm-4">
						<div class="mb-3 row">
							<label class="col-sm-6 col-form-label">Qty. Order</label>
							<div class="col-sm-6">
								<input type="number" name="qty" id="qty" readonly class="form-control" oninput="qty(this.value)">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="mb-3 row">
							<label class="col-sm-4 col-form-label">Harga Beli</label>
							<div class="col-sm-8">
								<input type="text" name="price" id="price" min="0" readonly class="form-control">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="mb-3 row">
							<label class="col-sm-4 col-form-label">Harga Jual</label>
							<div class="col-sm-8">
								<input type="text" name="sellprice" id="sellprice" min="0" readonly class="form-control" onclick="pricefocus()">
							</div>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<div class="col-sm-6">
						<div class="mb-3 row">
							<label class="col-sm-4 col-form-label">VAT</label>
							<div class="col-sm-8">
								<input type="number" name="vat" id="vat" readonly class="form-control" oninput="vat(this.value)">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Sub Total</label>
							<div class="col-sm-9">
								<input type="text" name="subtotal" id="subtotal" min="0" readonly class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="mb-1 row">
					<div class="col-sm-12">
						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Discount</label>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-4">
										<input type="number" name="disper" id="disper" min="0" max="100" readonly class="form-control" placeholder="%" onclick="disper()" oninput="discount(this.value)">
									</div>
									<div class="col-8">
										<input type="number" name="disnom" id="disnom" min="0" readonly class="form-control" placeholder="Nominal" onclick="disnom()">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-outline-primary" style="float: right" type="button" onclick="additem()"> <i class="fa fa-plus"></i> Tambah Item</button>
			</div>
		</div>
		<input type="hidden" id="jmlcol" value="0">
		<div class="p-3">
			<table class="table" id="tablex">
				<thead class="text-white" style="background: #3C2E8F">
					<tr>
						<th>Nama</th>
						<th>SKU</th>
						<th>Harga Beli</th>
						<th>Harga Item</th>
						<th>VAT</th>
						<th>QTY</th>
						<th>Harga Jual</th>
						<th>Disc</th>
						<th>Sub Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="bodyx">
				</tbody>
			</table>
		</div>
		<div class="align-items-center" style="justify-content: space-between; background: #eeeeee;color: white;height: 10vh">
			<div class="d-flex align-items-center" style="padding: 2%; float: right;">
				<button type="button" class="close text-dark">Batal</button>
				<button type="button" class="btn btn-outline-primary" style="margin-left: 2vw;" onclick="submit()">Submit</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		$('.selectpicker').selectpicker();
	});

	function customer(x) {
		var data = <?php echo json_encode($data) ?>;
		console.log(data)
		for (let i = 0; i < data.length; i++) {
			if (data[i]["idcomm"] == x) {
				$('#alamat').val(data[i]["attrib1"])
			}

		}
	}

	// function metode(akun) {
	// 	var data3 = <?php echo json_encode($data3) ?>;
	// 	console.log(data3)
	// 	for (let i = 0; i < data3.length; i++) {
	// 		if (data3[i]["idcomm"] == akun) {
	// 			$('#alamat').val(data[i]["attrib1"])
	// 		}

	// 	}
	// }
	// Get the input field
	var input = document.getElementById("sellprice");

	// Execute a function when the user releases a key on the keyboard
	input.addEventListener("keyup", function(event) {
		// Number 13 is the "Enter" key on the keyboard
		if (event.keyCode === 13) {

			$('#subtotal').val((Number($('#vat').val()) + Number($('#sellprice').val())) * $('#qty').val())

		}
	});

	function pricefocus() {
		$('#sellprice').val("")
	}

	$(document).on("keydown", "form", function(event) {
		return event.key != "Enter";
	});


	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("getitem");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
		$('#bodyx').html("");



	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			alert("Klik Batal Atau Submit untuk menyelesaikan pemilihan barang");
		}
	}

	function chose(x) {

		const jArray = <?php echo json_encode($data2); ?>;
		console.log(jArray);
		if (jArray.length > 0) {
			for (var i = 0; i < jArray.length; i++) {
				if (x == jArray[i]['iditem']) {
					$('#iditem').val(jArray[i]['iditem']);
					$('#nameitem').val(jArray[i]['nameitem']);
					$('#sku').val(jArray[i]['sku']);
					$('#sellprice').val(jArray[i]['priceitem']);
					$('#price').val(jArray[i]['pricebuyitem']);
					$('#vat').val(jArray[i]['priceitem'] * jArray[i]['VAT'] / 100);
					$('#subtotal').val(jArray[i]['subprice']);
					$('#qty').val(1);
					$('#disper').val(0);
					$('#disnom').val(0);
					document.getElementById('qty').readOnly = false;
					document.getElementById('dispers').readOnly = false;
					document.getElementById('disnoms').readOnly = false;
					document.getElementById('sellprice').readOnly = false;

				}
			}
		} else {
			document.getElementById('qty').readOnly = true;
			document.getElementById('dispers').readOnly = true;
			document.getElementById('disnoms').readOnly = true;
			document.getElementById('sellprice').readOnly = true;
		}

	}

	function additem() {
		var jmlcol = $('#jmlcol').val();

		if ($('#vat').val() == 10) {
			vat = 10;
		}

		var disc = 0;
		if ($('#disnom').val() != "") {
			disc = $('#disnom').val();
		}

		if ($('#nameitem').val() == "") {
			alert("Tolong Pilih Item Terlebih Dahulu");
		} else if ($('#qty').val() == "" || $('#qty').val() == "0") {
			alert("Tolong masukan qty order Terlebih Dahulu");
		} else {
			var total = Number($('#subtotal').val() - $('#disnom').val());
			$('#grandtotal').val(Number($('#grandtotal').val()) + Number(total));
			var baris = '';
			if (jmlcol % 2 == 0) {
				baris += `	<tr id=item` + jmlcol + ` style='background:white'>
							
							<td ><input type ="hidden" id="nameitem[]" name="nameitem[]" value =" ` + $('#nameitem').val() + `" style="width:50%;" />` + $('#nameitem').val() + `<input type ="hidden" id="iditem[]" name = "iditem[]" value ="` + $('#iditem').val() + `" style="width:50%;" /></td>
							<td ><input type ="hidden" id= "sku[]" name="sku[]" value ="` + $('#sku').val() + `" style="width:50%;"/>` + $('#sku').val() + `</td>
							<td ><input type ="hidden" id= "hargabeli[]" name="hargabeli[]" value ="` + $('#price').val() + `" style="width:50%;"/>` + $('#price').val() + `</td>
							<td ><input type ="hidden" id= "hargajual[]" name="hargajual[]" value ="` + $('#sellprice').val() + `"style="width:50%;" />` + $('#sellprice').val() + `</td>
							<td ><input type ="hidden" id= "vat[]" name = "vat[]" value ="` + $('#vat').val() + `"style="width:50%;" />` + $('#vat').val() + `</td>
							<td ><input type ="hidden" id= "qty[]" name="qty[]" value ="` + $('#qty').val() + `" style="width:50%;"/>` + $('#qty').val() + `</td>
							<td ><input type ="hidden" id= "subtotal[]" name="subtotal[]" value ="` + $('#subtotal').val() + `" style="width:50%;"/>` + $('#subtotal').val() + `</td>
							<td ><input type ="hidden" id= "disc[]" name="discx[]" value ="` + disc + `"style="width:50%;" />` + disc + `</td>
							
							<td ><input type ="hidden" id= "total[]" name = "total[]" value ="` + total + `"style="width:50%;" />` + total + `</td>
							<td id= del[` + jmlcol + `]><a class="btn btn-outline-danger" style="border-radius: 8px" href = "#" onclick="del(` + jmlcol + `,` + total + `)">Delete</a></td>

						</tr>

					`;
			} else {
				baris += `	<tr id=item` + jmlcol + ` style='background:#eeeeee'>
							
							<td ><input type ="hidden" id="nameitem[]" name="nameitem[]" value =" ` + $('#nameitem').val() + `" style="width:50%;" />` + $('#nameitem').val() + `<input type ="hidden" id="iditem[]" name = "iditem[]" value ="` + $('#iditem').val() + `" style="width:50%;" /></td>
							<td ><input type ="hidden" id= "sku[]" name="sku[]" value ="` + $('#sku').val() + `" style="width:50%;"/>` + $('#sku').val() + `</td>
							<td ><input type ="hidden" id= "hargabeli[]" name="hargabeli[]" value ="` + $('#price').val() + `" style="width:50%;"/>` + $('#price').val() + `</td>
							<td ><input type ="hidden" id= "hargajual[]" name="hargajual[]" value ="` + $('#sellprice').val() + `"style="width:50%;" />` + $('#sellprice').val() + `</td>
							<td ><input type ="hidden" id= "vat[]" name = "vat[]" value ="` + $('#vat').val() + `"style="width:50%;" />` + $('#vat').val() + `</td>
							<td ><input type ="hidden" id= "qty[]" name="qty[]" value ="` + $('#qty').val() + `" style="width:50%;"/>` + $('#qty').val() + `</td>
							<td ><input type ="hidden" id= "subtotal[]" name="subtotal[]" value ="` + $('#subtotal').val() + `" style="width:50%;"/>` + $('#subtotal').val() + `</td>
							<td ><input type ="hidden" id= "disc[]" name="discx[]" value ="` + disc + `"style="width:50%;" />` + disc + `</td>
							
							<td ><input type ="hidden" id= "total[]" name = "total[]" value ="` + total + `"style="width:50%;" />` + total + `</td>
							<td id= del[` + jmlcol + `]><a class="btn btn-outline-danger" style="border-radius: 8px" href = "#" onclick="del(` + jmlcol + `,` + total + `)">Delete</a></td>

						</tr>

					`;
			}

			console.log($('#price').val() * $('#qty').val() - $('#disnom').val() * 0.1);
			$('#bodyx').append(baris);
			$('#jmlcol').val(Number(jmlcol) + Number(1));
			$('#iditem').val("");
			$('#price').val("");
			$('#sellprice').val("");
			$('#vat').val("");
			$('#subtotal').val("");
			$('#nameitem').val("");
			$('#sku').val("");
			$('#qty').val("");
			$('#price').val("");
			$('#disper').val("");
			$('#disnom').val("");
			$('#selitem').val("");
		}
	}


	function disper() {
		document.getElementById('disnom').readOnly = true;
		document.getElementById('disper').readOnly = false;
	}

	function disnom() {
		document.getElementById('disnom').readOnly = false;
		document.getElementById('disper').readOnly = true;
		$('#disper').val(0);
	}

	function discount() {
		$('#disnom').val(($('#subtotal').val()) * ($('#disper').val() / 100));
		if ($('#disper').val() < 0) {
			$('#disper').val(0)
		}

		if ($('#disper').val() > 100) {
			$('#disper').val(100)
		}

	}

	function disper1() {
		document.getElementById('disnoms').readOnly = true;
		document.getElementById('dispers').readOnly = false;
	}

	function disnom1() {
		document.getElementById('disnoms').readOnly = false;
		document.getElementById('dispers').readOnly = true;
		$('#disper').val(0);
	}

	function discx() {
		if ($('#grandtotals').val() == "0") {
			alert('Please Insert Item Please');
			$('#dispers').val("");
		} else {
			if ($('#dispers').val() < 0) {
				$('#dispers').val(0)
			}

			if ($('#dispers').val() > 100) {
				$('#dispers').val(100)
			}
			if ($('#dispers').val() == "" || $('#dispers').val() == "0") {
				$('#disnoms').val(0);
			} else {
				$('#disnoms').val(Number(($('#grandtotals').val()) * ($('#dispers').val() / 100)));
			}

			$('#grandtotalx').val(Number($('#grandtotals').val() - $('#disnoms').val()));
		}


	}

	function disc1() {
		if ($('#grandtotals').val() == "0") {
			alert('Please Insert Item Please');
			$('#disnoms').val("0");
		} else {
			$('#dispers').val("");
			$('#grandtotalx').val(Number($('#grandtotals').val() - $('#disnoms').val()));
		}
	}

	function vat() {
		if ($('#vats').val() == 10) {
			$('#vats').val(0);
		} else {
			$('#vats').val(10);
		}

		if ($('#disnoms').val() == "") {
			$('#grandtotalx').val(Number($('#grandtotals').val()));
		} else {
			$('#grandtotalx').val(Number($('#grandtotals').val() - $('#disnoms').val()));
		}

	}


	function del(x, y) {
		if (confirm('Hapus Item Ini?')) {
			$('#item' + x + '').remove();
		}
		$('#jmlcol').val($('#jmlcol').val() - 1);
		$('#grandtotal').val($('#grandtotal').val() - y);
		if ($('#jmlitem').val() > 0) {
			console.log($('#grandtotals').val() + " " + y)
			$('#jmlitem').val($('#jmlitem').val() - 1);
			$('#grandtotals').val($('#grandtotals').val() - y);

			if ($('#disnoms').val() == "") {
				$('#grandtotalx').val($('#grandtotals').val());
			} else {
				$('#grandtotalx').val($('#grandtotals').val() - $('#disnoms').val());
			}

		}
	}

	function submit() {
		var tbl = document.getElementById('tablex');
		if (tbl.rows.length > 0) {
			$('#body').append(document.getElementById("bodyx").innerHTML)
		}




		modal.style.display = "none";
		$('#grandtotals').val($('#grandtotal').val());
		$('#jmlitem').val($('#jmlcol').val());
		$('#bodyx').html("");

		if ($('#disnoms').val() == "") {
			$('#grandtotalx').val($('#grandtotals').val());
		} else {
			$('#grandtotalx').val($('#grandtotals').val() - $('#disnoms').val());
		}

		console.log($('#grandtotalx').val());
	}

	function qty(x) {
		if (x < 0) {
			$('#qty').val(0);
		}
		$('#subtotal').val((Number($('#sellprice').val()) + Number($('#vat').val())) * $('#qty').val())
	}

	function makeorder() {
		for (var i = 0; i < form.elements.length; i++) {
			if (form.elements[i].value === '' && form.elements[i].hasAttribute('required')) {
				var notyet = form.elements[i].getElementsByClassName;
				notyet.css('background-color', 'red')
				alert('Tolong lengkapi data dengan benar');
				return false;
			}
		}
		if ($('#jmlitem').val() == "0") {
			alert("Tolong Pilih Item Terlebih Dahulu");

		} else {
			$('#form').submit();
		}
	}

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
	})()
</script>