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

<body>
	<form action="<?php echo base_url('PrQuo/addpo') ?>" method="POST" id="form">
		<div class="container-fluid text-white pt-3" style="background-color: purple;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">PURCHASE/Order/New Order</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">Tambah Purchase Baru</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<input type="hidden" name="idpo" id="idpo">
		<input type="hidden" name="codepo" id="codepo">
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 1vh;padding-left:1rem">
				<div class="col-9 bays p-4">
					<p style="font-size: 30px"><b>INFORMASI SUPPLIER</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Pesanan</b></p>
								<hr style="height: 2%; background: #8F2E80; opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="datepo" id="datepo" class="form-control datetrans" placeholder="Pilih Tanggal">
							</div>
							<div class="mb-3">
								<label>Purchase Request</label>
								<input type="hidden" class="form-control" id="idpr" name="idpr">
								<input type="text" class="form-control" id="codepr" name="codepr" placeholder="Search" list="xpr" value="">
							</div>
							<div class="mb-3">
								<label>Remark</label>
								<input type="text" class="form-control" id="remark" name="remark" placeholder="Remark Purchase Order" value="">
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Order</b></p>
								<hr style="height: 2%; background: purple;opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Request</label>
								<input type="text" name="datepr" id="datepr" disabled class="form-control datetrans">
							</div>
							<div class="mb-3">
								<label>Supplier</label>
								<select class="form-control selectpicker" name="idsupp" id="idsupp" data-live-search="true">
									<option value="0" selected>Pilih Supplier</option>
									<?php
									if ($supplier != 'Not Found' || !empty($supplier)) {
										foreach ($supplier as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
									<?php endforeach;
									} ?>
								</select>
							</div>
							<div class="mb-3">
								<label>Attn / Contact</label>
								<input type="text" name="nopo" id="nopo" class="form-control" placeholder="Masukan Attend / Kontak Supplier">
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Pembayaran, Diskon & VAT</b></p>
								<hr style="height: 2%; background: purple;opacity: 1">
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-7">
									<label>Mata Uang</label>
									<select class="form-control" name="idcurr" id="idcurr">
										<option value="0" disabled selected>Mata Uang</option>
										<?php
										if ($currency != 'Not Found' || !empty($currency)) {
											foreach ($currency as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>" xrate="<?php echo $key["attrib7"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
								</div>
								<div class="col-5">
									<label>Discount Nominal</label>
									<input type="hidden" name="kurs" id="kurs" value="1" class="form-control" placeholder="Kurs">
									<input type="text" name="disnom" id="disnom" value="0" class="form-control" placeholder="Discount Nominal">
								</div>
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-7">
									<label>Metode Pembayaran</label>
									<select class="form-control" name="typepr" id="typepr">
										<option value="0" disabled selected> Pilih Metode Pembayaran</option>
										<?php
										if ($payment != 'Not Found' || !empty($payment)) {
											foreach ($payment as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
								</div>
								<div class="col-5">
									<label>Discount Persentase</label>
									<input type="text" name="disc" id="disc" class="form-control" placeholder="0%">
								</div>
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-5">
									<label>Jangka Waktu</label>
									<input type="text" name="period" id="period" value="0" class="form-control" placeholder="Tenor">
								</div>
								<div style="display: none;">
									<div class="col-7">
										<label>VAT</label>
										<div class="d-flex">
											<div>
												<label class="switch">
													<input type="checkbox" name="isvat" id="isvat">
													<span class="slider round"></span>
												</label>
											</div>
											<p style="margin-left: 1vw;margin-top: 0.4vh;">Klik untuk on / off</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<p class="mt-3" style="font-size: 30px;margin: 0"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<div class="ju" style="height: 30.5vh;">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="table" style="width: 100%;">
							<thead style="background: purple; color: white">
								<tr style="height:40px;text-align:center">
									<th>#</th>
									<th style="width:150px">SKU</th>
									<th>Nama Item</th>
									<th>Qty</th>
									<th>Harga</th>
									<th>DPP</th>
									<th>VAT</th>
									<th>Discount(%)</th>
									<th>Discount(Rp)</th>
									<th>PPH22</th>
									<th>Sub Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="detailx">
							</tbody>
						</table>
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
									<input type="text" name="itempo" id="itempo" value="0" class="form-control" readonly>
									<input type="hidden" name="qtypo" id="qtypo" value="0" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 0px">Total Harga</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Sub Total</p>
								</div>
								<div class="col-4">
									<input type="text" name="subtotal" id="subtotal" value="0" class="form-control" readonly>
								</div>
								<div class="col-8">
									<p>PPH22</p>
								</div>
								<div class="col-4">
									<input type="text" name="pph" id="pph" value="0" class="form-control" readonly>
								</div>
								<div class="col-8">
									<p>Sub VAT</p>
								</div>
								<div class="col-4">
									<input type="text" name="sub_vat" id="sub_vat" value="0" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 0px">Discount</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Persen</p>
								</div>
								<div class="col-4">
									<input type="text" name="discper" id="discper" value="0" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<p>Nominal</p>
								</div>
								<div class="col-4">
									<input type="text" name="disctotal" id="disctotal" value="0" class="form-control" readonly>
								</div>
							</div>
							<div style="display: none;">
								<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 0px">VAT</p>
								<hr>
								<div class="row">
									<div class="col-8">
										<p>Persen</p>
									</div>
									<div class="col-4">
										<input type="text" name="ppn" id="ppn" value="0" class="form-control" readonly>
									</div>
								</div>
								<div class="row">
									<div class="col-8">
										<p>Nominal</p>
									</div>
									<div class="col-4">
										<input type="text" name="ppntotal" id="ppntotal" value="0" class="form-control" readonly>
									</div>
								</div>
								<hr>
							</div>
							<div class="row">
								<div class="col-8">
									<p><b>Grand Total</b></p>
								</div>
								<div class="col-4">
									<input type="text" name="total" id="total" value="0" class="form-control" readonly>
								</div>
							</div>
							<button style="background: orange; width: 100%; color: white; margin-top: 5px" class="btn btn-warning" id="addorder" onclick="addorder();">Buat Order</button>
							<?php if ($detailtrans != "Not Found") { ?>
								<button style="background: orange; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="delorder" onclick="delorder(<?php echo $detailtrans[0]['idpo'] ?>);">Status Cancel Order</button>
							<?php } else { ?>
								<button style="background: orange; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="delorder">Status Cancel Order</button>
							<?php } ?>
							<button style="background: red; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="cancelorder" onclick="cancelorder();">Batal Perubahan</button>
						</div>
					</div>
				</div>
			</div>
	</form>
</body>

</html>

<datalist id="xitem">
	<!--<option value="" disabled selected>Select Item</option>-->
	<?php
	if ($item != 'Not Found' || !empty($item)) {
		foreach ($item as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["pricebuyitem"]; ?>" data-pph22="<?php echo $key["pph22"]; ?>" data-vat="<?php echo $key["vat"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>
<datalist id="xpr">
	<!--<option value="" disabled selected>Pilih Request</option>-->
	<?php
	if ($request != 'Not Found' || !empty($request)) {
		foreach ($request as $key) {
	?>
			<option value="<?php echo $key["codepr"]; ?>" namesupp="<?php echo $key["namesupp"]; ?>" data-idpr="<?php echo $key["idpr"]; ?>" data-idsupp="<?php echo $key["idsupp"]; ?>" data-idcurr="<?php echo $key["idcurr"]; ?>" data-datepr="<?php echo $key["datepr"]; ?>" data-namesupp="<?php echo $key["namesupp"]; ?>">( <?php echo $key["datepr"] ?> ) <?php echo $key["codepr"] . ' - ' . $key["namesupp"] . ' - ' . number_format($key["totalpr"], 0, '.', ','); ?> </option>
	<?php }
	} ?>
</datalist>

<script type="text/javascript">
	$(function() {
		$('.selectpicker').selectpicker();
	});

	var idpr = <?php echo json_encode($idpr) ?>;
	var idsupp = <?php echo json_encode($idsupp) ?>;
	var datepr = <?php echo json_encode($datepr) ?>;
	if (idpr != "") {
		$('#idpr').val(idpr);
		$('#idsupp').val(idsupp);
		$('#datepr').val(datepr);
		loadreq();
	}
	var xitem = '';
	xitem = '<?php
				$x = ''; //'<option value="" disabled selected>Select Item</option>';
				if ($item != 'Not Found' || !empty($item)) {
					foreach ($item as $key) {
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["priceitem"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	$(document).on('keypress', '.sku', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			$('#transaksi_' + xid + '_qty').focus();
			e.preventDefault();
		}
	});

	$(document).on('keypress', '.price', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
			$('#transaksi_' + xid + '_disc').focus();
			e.preventDefault();
		}
	});
	$(document).on('keypress', '.qty', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_qty", "");
			$('#transaksi_' + xid + '_price').focus();
			e.preventDefault();
		}
	});
	$(document).on('keypress', '.disc', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_disc", "");
			var xid2 = (parseInt(xid) + 1);
			if ($('#transaksi_' + xid + '_action').html() == '<b>+</b>') {
				$('#transaksi_' + xid + '_action').click();
				$('#transaksi_' + (xid2) + '_sku').focus();
			} else {
				$('#transaksi_' + (xid2) + '_sku').focus();
			}
			e.preventDefault();
		}
	});

	$(document).on('keypress', '.disnom', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_disnom", "");
			var xid2 = (parseInt(xid) + 1);
			if ($('#transaksi_' + xid + '_action').html() == '<b>+</b>') {
				$('#transaksi_' + xid + '_action').click();
				$('#transaksi_' + (xid2) + '_sku').focus();
			} else {
				$('#transaksi_' + (xid2) + '_sku').focus();
			}
			e.preventDefault();
		}
	});

	$(document).on('change', '#isvat', function() {
		calc();
	});

	$(document).on('change', '#disc', function() {
		calc();
	});

	$(document).on('change', '#disnom', function() {
		calc();
	});

	$(document).on('change', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_price').val(0);
			$('#transaksi_' + xid + '_qty').val(0);
			$('#transaksi_' + xid + '_subpo').val(0);
			$('#transaksi_' + xid + '_pph').val(0);
			$('#transaksi_' + xid + '_pph22').val(0);
			$('#transaksi_' + xid + '_disc').val(0);
			$('#transaksi_' + xid + '_idprdet').val(0);
			$('#transaksi_' + xid + '_idprdet').val(0);
			$('#transaksi_' + xid + '_vatx').val(0);
			$('#transaksi_' + xid + '_vat').val(0);
		} else {
			$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_price').val(formatnum(xobj.data('price')));
			$('#transaksi_' + xid + '_pph22').val(xobj.data('pph22'));
			$('#transaksi_' + xid + '_disc').val(0);
			$('#transaksi_' + xid + '_idprdet').val(0);
			$('#transaksi_' + xid + '_qty').val(1);
			$('#transaksi_' + xid + '_pph').val(0);
			$('#transaksi_' + xid + '_vat').val(xobj.data('vat'));



			countpph(1, xobj.data('price'), xid, xobj.data('pph22'))
		}
		calc();
	});

	function countpph(z, x, y, a) {
		console.log(a)
		var xqty = z;
		var xprice = x;
		$('#transaksi_' + y + '_pph').val(formatnum((x * a) * xqty));
		calcsub(y)
		$('#transaksi_' + y + '_subpo').val(formatnum(Number(x * z)));
	}


	$(document).on('change', '#codepr', function() {
		var val = $(this).val();
		var xobj = $('#xpr option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#idpr').val("");
			$('#codepr').val("");
			$('#idsupp').val("0");
			$('#datepr').val("");
		} else {

			$('#idpr').val(xobj.data('idpr'));
			$('#idsupp').val(xobj.data('idsupp'));
			$('#datepr').val(xobj.data('datepr'));
			loadreq();
		}
	});

	$(document).on('change', '.price', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
		calcsub(xid);
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
	});

	$(document).on('change', '.disc', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_disc", "");
		calcsub(xid);

		$(this).val(formatnum($(this).val().replaceAll(',', '')));
	});

	$(document).on('change', '.disnom', function() {

		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_disnom", "");

		calcsub(xid);

		$(this).val(formatnum($(this).val().replaceAll(',', '')));
	});

	$(document).on('change', '.qty', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_qty", "");
		calcsub(xid);
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
	});



	function calcsub(xid) {
		var pph = $('#transaksi_' + xid + '_pph22').val();
		var xqty = parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(",", "")).toFixed(0);
		var xprice = parseFloat($('#transaksi_' + xid + '_price').val().replaceAll(",", "")).toFixed(0);
		var xdisc = parseFloat($('#transaksi_' + xid + '_disc').val().replaceAll(",", "")).toFixed(0);
		if (!isNaN(xprice)) {
			var dpp = (xprice / 1.11)
			$('#transaksi_' + xid + '_dpp').val(dpp.toFixed(3));
			if ($('#transaksi_' + xid + '_vat').val() != 0) {
				var vat = xprice - dpp.toFixed(3);
				$('#transaksi_' + xid + '_vatx').val(vat.toFixed(3));
			} else {
				$('#transaksi_' + xid + '_vatx').val(0);
			}

			var pphs = (dpp * pph);
			$('#transaksi_' + xid + '_pph').val(pphs.toFixed(3));

		} else {
			$('#transaksi_' + xid + '_vatx').val(0);
		}

		// 1881.800
		if (isNaN((xqty * xprice) * (100 - xdisc) / 100)) {
			$('#transaksi_' + xid + '_subpo').val(0);
		} else {
			if (xdisc > 0) {
				$('#transaksi_' + xid + '_disnom').val(formatnum((xqty * xprice) * (xdisc) / 100))
			}
			var hasil = Number((xqty * xprice) - $('#transaksi_' + xid + '_disnom').val().replaceAll(",", ""))

			if (hasil == 0) {
				$('#transaksi_' + xid + '_subpo').val(hasil);
			} else {
				$('#transaksi_' + xid + '_subpo').val(formatnum(hasil));
			}

		}





		calc();
	}


	$(document).on('change', '#typereq,#idsupp', function() {
		if ($('#typereq').val() == '2') {
			$('#idsupp').val('0');
		}
	});

	function cancelorder() {
		location.reload();
		return;
	}

	function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td style="border:none"height:1px"><input style="width:50px;text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="transaksi_' + xid + '_iditem" /><input type="hidden" id="transaksi_' + xid + '_idprdet"  class="form-control idprdet" name="transaksi_' + xid + '_idprdet" /></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" placeholder="Search" list="xitem" value=""></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="transaksi_' + xid + '_nameitem" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:70px;text-align:center" type="text" id="transaksi_' + xid + '_qty"  class="form-control qty"name="transaksi_' + xid + '_qty" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100px;text-align:center" type="text" id="transaksi_' + xid + '_price"  class="form-control price"name="transaksi_' + xid + '_price" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100px;text-align:center" type="text" id="transaksi_' + xid + '_dpp"  class="form-control price"name="transaksi_' + xid + '_dpp" value="0"/ readonly></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100px;text-align:center" type="text" id="transaksi_' + xid + '_vatx"  class="form-control price"name="transaksi_' + xid + '_vatx" value="0" readonly/><input style="width:100px;text-align:center" type="hidden" id="transaksi_' + xid + '_vat"  class="form-control price"name="transaksi_' + xid + '_vat" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:80px;text-align:center" type="text" id="transaksi_' + xid + '_disc"  class="form-control disc"name="transaksi_' + xid + '_disc" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:80px;text-align:center" type="text" id="transaksi_' + xid + '_disnom"  class="form-control disnom"name="transaksi_' + xid + '_disnom" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:80px;text-align:center" class="form-control " readonly type="text" id="transaksi_' + xid + '_pph" name="transaksi_' + xid + '_pph" value="0"><input type="hidden" style="width:80px;text-align:center" class="form-control " readonly type="text" id="transaksi_' + xid + '_pph22" name="transaksi_' + xid + '_pph22" > </td>'
		tabel += '<td style="border:none"height:1px"><input style="width:170px;text-align:center" readonly type="text" id="transaksi_' + xid + '_subpo"  class="form-control"name="transaksi_' + xid + '_subpo" value="0"/></td>';
		tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	function reorder() {
		$('input[objtype=nourut]').each(function(i, obj) {
			$(this).val(i + 1);
		});
	}

	function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xttl = 0;
		var xppn = 0;
		var sub_vat = 0;
		var xpph = 0;
		var xdisc = parseFloat($('#disc').val().replaceAll(',', ''));
		if (isNaN(xdisc)) {
			xdisc = 0;
			$('#disc').val('0');
		}
		var tdisc = 0;
		var xtppn = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xttl += parseFloat($('#transaksi_' + xid + '_subpo').val().replaceAll(',', ''));
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', ''));
				xpph += parseFloat($('#transaksi_' + xid + '_pph').val().replaceAll(',', '') * parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', '')));
				console.log(sub_vat + ", " + $('#transaksi_' + xid + '_vatx').val() + " * " + xqty + " = " + parseFloat($('#transaksi_' + xid + '_vatx').val().replaceAll(',', '') * xqty));
				sub_vat += parseFloat($('#transaksi_' + xid + '_vatx').val().replaceAll(',', '') * parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', '')));
				console.log(sub_vat);

			}
		});
		if (xdisc > 0) {
			tdisc = xttl * xdisc / 100;
			$('#disnom').val(tdisc);
		}

		xtppn = (xttl - $('#disnom').val()) * xppn / 100;
		$('#discper').val(formatnum(xdisc));
		$('#pph').val(formatnum(xpph));
		$('#disctotal').val(formatnum($('#disnom').val()));
		$('#qtypo').val(formatnum(xqty));
		$('#itempo').val(formatnum(xcnt));
		$('#subtotal').val(formatnum(xttl));
		$('#ppn').val(formatnum(xppn));
		$('#sub_vat').val(formatnum(sub_vat.toFixed(2)));
		$('#ppntotal').val(formatnum(xtppn));
		$('#total').val(formatnum(xttl - $('#disnom').val() + xtppn + xpph));
	}

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		calc();
		reorder();
	}


	function back() {
		window.location.href = "<?php echo base_url('PrQuo/po') ?>";
	}

	function validasi() {
		var xval = $("#period").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '')) {
			alert('Input Period');
			return '';
		}
		xval = $("#qtypo").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			return '';
		}
		xval = $("#itempo").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			return '';
		}
		return 'ok';
	}

	function addorder() {
		var cx = $('#form').serialize();
		if ($("#idpo").val() == '') {
			//$.post("<?php //echo base_url('PrQuo/addpo') 
						?>",cx,
			$.post("<?php echo base_url('PrQuo/updatepo') ?>", cx,
				function(data) {
					if (data.includes("Success")) {
						alert(data);
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
		} else {
			$.post("<?php echo base_url('PrQuo/updatepo') ?>", cx,
				function(data) {
					if (data.includes("Success")) {
						alert('Update Data Berhasil');
						cancelorder();
					} else {
						alert('Update Data Gagal. ' + data);
					}
				});
		}
	}

	function delorder() {
		var cx = $('#idpo').serialize();
		// console.log(cr)
		$.post("<?php echo base_url('PrQuo/deletepo') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Cancel Status Berhasil');
					back();
				} else {
					alert('Cancel Status Gagal. ' + data);
				}
			}
		);
	}

	function loaddata() {
		var xid = 0;
		var headertrans = <?php echo json_encode($headertrans) ?>;
		// console.log(headertrans);
		// console.log(detailtrans);
		<?php if ($headertrans != "Not Found") { ?>
			$('#detailx').html('');
			$("#idpo").val("<?php echo $idtrans ?>");
			$("#idpr").val("<?php echo $headertrans['idpr'] ?>");
			$("#codepr").val("<?php echo $headertrans['codepr'] ?>");
			$("#codepo").val("<?php echo $headertrans['codepo'] ?>");
			$("#idsupp").val("<?php echo $headertrans['idsupp'] ?>");
			$("#idcurr").val("<?php echo $headertrans['idcurr'] ?>");
			$("#kurs").val("<?php echo $headertrans['kurs'] ?>");
			$("#attn").val("<?php echo $headertrans['attn'] ?>");
			$("#datepo").val("<?php echo $headertrans['datepo'] ?>");
			$("#typepo").val("<?php echo $headertrans['typepo'] ?>");
			$("#remark").val("<?php echo $headertrans['remark'] ?>");
			$("#statuspo").val("<?php echo $headertrans['statuspo'] ?>");
			$("#period").val("<?php echo number_format($headertrans['period'], 0, '.', ',') ?>");
			$("#qtypo").val("<?php echo number_format($headertrans['qtypo'], 0, '.', ',') ?>");
			$("#itempo").val("<?php echo number_format($headertrans['itempo'], 0, '.', ',') ?>");
			$("#subtotal").val("<?php echo number_format($headertrans['subtotal'], 0, '.', ',') ?>");
			$("#ppn").val("<?php echo number_format($headertrans['ppn'], 0, '.', ',') ?>");
			$("#disc").val("<?php echo number_format($headertrans['disc'], 0, '.', ',') ?>");
			$("#disnom").val("<?php echo number_format($headertrans['disctotal'], 0, '.', ',') ?>");
			$("#disctotal").val("<?php echo number_format($headertrans['disctotal'], 0, '.', ',') ?>");
			if ($("#ppn").val() == '0') {
				$("#isvat").attr('checked', false);
			} else {
				$("#isvat").attr('checked', true);
			}
			$("#ppntotal").val("<?php echo number_format($headertrans['ppntotal'], 0, '.', ',') ?>");
			$("#total").val("<?php echo number_format($headertrans['totalpo'], 0, '.', ',') ?>");
			<?php if ($detailtrans != "Not Found") { ?>
				<?php $a = 0;
				$subpph = 0;
				$subvat = 0;
				foreach ($detailtrans as $key) :
					$subpph = $subpph + $key['pph22'] * $key['qty'];
					$subvat = $subvat + $key['vat'] *  $key['qty'];
				?>
					add_row_transaksi(xid);
					xid = xid + 1;
					$("#transaksi_" + xid + "_iditem").val("<?php echo $key['iditem'] ?>");
					$("#transaksi_" + xid + "_pph22").val("<?php echo $key['pph22'] ?>");
					$("#pph").val("<?php echo  $subpph   ?>");
					$("#sub_vat").val("<?php echo  $subvat   ?>");
					$("#transaksi_" + xid + "_pph").val("<?php echo  number_format(($key['pph22']), 0, '.', ',')   ?>");
					$("#transaksi_" + xid + "_sku").val("<?php echo $key['sku'] ?>");
					$("#transaksi_" + xid + "_nameitem").val("<?php echo $key['nameitem'] ?>");
					$("#transaksi_" + xid + "_price").val("<?php echo number_format($key['price'], 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_qty").val("<?php echo number_format($key['qty'], 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_disc").val("<?php echo number_format($key['disc'], 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_vatx").val("<?php echo  $key['vat'] ?>");
					$("#transaksi_" + xid + "_vat").val("<?php echo $key['vats'] ?>");
					$("#transaksi_" + xid + "_dpp").val($("#transaksi_" + xid + "_price").val().replaceAll(",", "") - $("#transaksi_" + xid + "_vatx").val().replaceAll(",", ""));
					$("#transaksi_" + xid + "_disnom").val("<?php echo number_format(($key['price'] * $key['qty']) * ($key['disc'] / 100), 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_subpo").val("<?php echo number_format(($key['subpo']), 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_idprdet").val("<?php echo number_format($key['idprdet'], 0, '.', ',') ?>");
				<?php endforeach ?>
			<?php } ?>
		<?php } ?>

		var stat = <?php echo json_encode($stat)  ?>;
		if (stat == "02" || stat == "03" || stat == "04") {
			$('#addorder').hide();
			$('#delorder').hide();
			$('#cancelorder').hide();
			$('form *').prop('disabled', true);
		} else {
			add_row_transaksi(xid);
		}




	}

	function loadreq() {
		var xid = $('#idpr').val();

		$.post("<?php echo base_url('PrQuo/getpr?'); ?>", {
			id: xid
		}, function(result) {

			//alert(result);
			// var data = $.parseJSON(result);
			// alert(data.detailtrans[0]['iditem']);
			var data = $.parseJSON(result);
			console.log(data);
			if (data.headertrans != "Not Found") {
				$('#detailx').html('');
				$("#idpr").val(data.headertrans['idpr']);
				$("#codepr").val(data.headertrans['codepr']);
				$("#idsupp").val(data.headertrans['idsupp']);
				$("#idcurr").val(data.headertrans['idcurr']);
				$("#attn").val(data.headertrans['attn']);
				$("#datepr").val(data.headertrans['datepr']);
				$("#typepr").val(data.headertrans['typepr']);
				$("#period").val(data.headertrans['period']);
				if (data.headertrans['ppn'] == '0') {
					$("#isvat").attr('checked', false);
				} else {
					$("#isvat").attr('checked', true);
				}
				var xiddet = 0;
				var xlost = 0;
				if (data.detailtrans != "Not Found") {
					for (var xiddet2 = 0; xiddet2 < data.detailtrans.length; xiddet2++) {

						if (parseFloat(data.detailtrans[(xiddet2)]['qtystd']).toFixed(0) != 0) {
							add_row_transaksi(xiddet);
							xiddet = xiddet + 1;
							var dpp = data.detailtrans[(xiddet + xlost - 1)]['price'] / 1.11;
							var pph = 0;
							var vat = 0;
							if (data.detailtrans[(xiddet + xlost - 1)]['price'] != 0) {
								vat = data.detailtrans[(xiddet + xlost - 1)]['price'] - dpp;
							}
							if (data.detailtrans[(xiddet + xlost - 1)]['pph22'] != 0) {
								pph = dpp * 0.005;
							}


							$('#transaksi_' + xiddet + '_idprdet').val(data.detailtrans[(xiddet + xlost - 1)]['idprdet']);
							$('#transaksi_' + xiddet + '_iditem').val(data.detailtrans[(xiddet + xlost - 1)]['iditem']);
							$('#transaksi_' + xiddet + '_sku').val(data.detailtrans[(xiddet + xlost - 1)]['sku']);
							$('#transaksi_' + xiddet + '_nameitem').val(data.detailtrans[(xiddet + xlost - 1)]['nameitem']);
							$('#transaksi_' + xiddet + '_dpp').val(dpp.toFixed(3));
							$('#transaksi_' + xiddet + '_pph22').val(pph.toFixed(3));
							$('#transaksi_' + xiddet + '_vatx').val(vat.toFixed(3));
							// $('#pph').val(data.detailtrans[(xiddet + xlost - 1)]['pph22']);
							$('#transaksi_' + xiddet + '_price').val(formatnum(parseFloat(data.detailtrans[(xiddet + xlost - 1)]['price']).toFixed(0)));
							$('#transaksi_' + xiddet + '_qty').val(formatnum(parseFloat(data.detailtrans[(xiddet + xlost - 1)]['qtystd']).toFixed(0)));

							var xqty = parseFloat($('#transaksi_' + xiddet + '_qty').val().replaceAll(",", "")).toFixed(0);
							var xprice = parseFloat($('#transaksi_' + xiddet + '_price').val().replaceAll(",", "")).toFixed(0);
							$('#transaksi_' + xiddet + '_pph').val(formatnum(xqty * (xprice * $('#transaksi_' + xiddet + '_pph22').val())))
							if (isNaN(xqty * xprice)) {
								$('#transaksi_' + xiddet + '_subpo').val(0);
							} else {
								$('#transaksi_' + xiddet + '_subpo').val(formatnum(Number(xqty * xprice) + Number(xqty * (xprice * $('#transaksi_' + xiddet + '_pph22').val()))));
							}


						} else {
							xlost = xlost + 1;
						}
					}
					//alert(data.detailtrans[0]['iditem']);
				}
				add_row_transaksi(xiddet);
				calc();
			}
			//$('#transaksi_'+ xid +'_price').select();
		});
		// calc();
		// add_row_transaksi(xid);

	}


	$(document).on('focus', 'input', function() {
		$(this).select();
	});
	$('form button').on("click", function(e) {
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Order?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			var xask = '';
			if ($("#idpo").val() == '') {
				xask = "Simpan Order?";
			} else {
				xask = "Ubah Order?";
			}
			if (confirm(xask)) {
				addorder();
			}
		} else if ($(this).attr('id') == 'delorder') {
			if (confirm("Cancel Status Order?")) {
				delorder();
			}
		}
		e.preventDefault();
	});

	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + today.getDate();
		$(".datetrans").val(date);
		//		add_row_transaksi(0);
		loaddata();
		if ($("#idpo").val() == '') {
			$("#delorder").hide();
			$("#addorder").html('Buat Order');
			$("#sts").html('PURCHASE/Order/New Order');
		} else {
			$("#addorder").html('Ubah Order');
			$("#sts").html('PURCHASE/Order/Update Order');
		}
	});
</script>