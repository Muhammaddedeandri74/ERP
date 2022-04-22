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

	<title>ERP</title>
</head>

<body>
	<form action="<?php echo base_url('InOut/addmovewh') ?>" method="POST" id="form">
		<div class="container-fluid text-white pt-3" style="background-color: orange;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">Gudang Utama/Inventory Out/Detail</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">DETAIL INVENTORY OUT</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<input type="hidden" name="idmove" id="idmove">
		<input type="hidden" name="codemove" id="codemove">
		<?php if ($from == "warehouses") : ?>
			<input type="hidden" name="typemove" value="02">
		<?php endif ?>
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 2vh;padding-left:1rem">
				<div class="col bays p-4">
					<p style="font-size: 30px"><b>INFORMASI MOVE BARANG</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Dasar</b></p>
								<hr style="height: 2%; background: orange; opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="datemove" id="datepr" class="form-control datetrans" placeholder="Pilih Tanggal">
							</div>

							<?php $warehouses = "";
							$idwarehouse = "";
							$gudangutama = "";
							$idgudangutama = "";
							if ($data != "Not Found") : ?>
								<?php if ($warehouse != "Not Found") : ?>
									<?php foreach ($warehouse as $key) : ?>
										<?php if ($data[0]["idwh"] == $key["idcomm"]) : ?>
											<?php $warehouses = $key["codecomm"] ?>
											<?php $idwarehouse = $key["idcomm"] ?>
										<?php endif ?>
										<?php if ($key["attrib3"] == "mainwarehouse") : ?>
											<?php $gudangutama = $key["codecomm"] ?>
											<?php $idgudangutama = $key["idcomm"] ?>
										<?php endif ?>
									<?php endforeach ?>
								<?php endif ?>


							<?php endif ?>
							<!-- <div class="mb-3">
								<p style="margin-top: 20px;margin-bottom: 0">Gudang Asal</p>
								<?php if ($warehouses != "" && $idwarehouse != "") { ?>
									<input type="text" class="form-control" id="codewh" name="codewh" placeholder="Search" list="xwh" value="<?php echo $gudangutama ?>" readonly>
									<input type="hidden" class="form-control" id="idwh" name="idwh" value="<?php echo $idgudangutama ?>">
								<?php } else { ?>
									<input type="hidden" class="form-control" id="idwh" name="idwh">
									<input type="text" class="form-control" id="codewh" name="codewh" placeholder="Search" list="xwh" value="">
								<?php } ?>
							</div>
							<div class="mb-3">
								<p style="margin-top: 20px;margin-bottom: 0">Gudang Tujuan</p>
								<?php if ($warehouses != "" && $idwarehouse != "") { ?>
									<input type="text" class="form-control" id="codewh2" name="codewh2" placeholder="Search" list="xwh" value="<?php echo $warehouses ?>" readonly>
									<input type="hidden" class="form-control" id="idwh2" name="idwh2" value="<?php echo $idwarehouse ?>">
								<?php } else { ?>
									<input type="hidden" class="form-control" id="idwh2" name="idwh2">
									<input type="text" class="form-control" id="codewh2" name="codewh2" placeholder="Search" list="xwh" value="">
								<?php } ?>
							</div> -->
							<div class="mb-3">
								<p style="margin-top: 20px;margin-bottom: 0">Gudang Asal</p>
								<input type="text" class="form-control" id="codewh" name="codewh" value="Gudang Utama" readonly>
								<input type="hidden" class="form-control" id="idwh" name="idwh" value="82">
							</div>
							<div class="mb-3">
								<p style="margin-top: 20px;margin-bottom: 0">Gudang Tujuan</p>
								<input type="text" class="form-control" id="codewh2" name="codewh2" value="Counter" readonly>
								<input type="hidden" class="form-control" id="idwh2" name="idwh2" value="83">
							</div>
						</div>
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Order</b></p>
								<hr style="height: 2%; background: orange; opacity:1">
							</div>
							<div style="display:none">
								<p style="margin-top: 20px;margin-bottom: 0">Tanggal Request</p>
								<input type="text" name="datepr" id="datepr" disabled class="form-control datetrans">
							</div>
							<div class="mb-3">
								<p style="margin-top: 20px;margin-bottom: 0">Deskripsi</p>
								<?php if ($data != "Not Found") { ?>
									<input type="text" name="descinfo" id="descinfo" class="form-control" value="<?php echo $data[0]["namerequest"] ?>" placeholder="Deskripsi" readonly>

								<?php } else { ?>
									<input type="text" name="descinfo" id="descinfo" class="form-control" value="" placeholder="Deskripsi">
								<?php } ?>

							</div>
							<?php if ($data != "Not Found") : ?>
								<div class="mb-3">
									<p style="margin-top: 20px;margin-bottom: 0">List Request</p>
									<div style="height: 300px; overflow-y: scroll; ">
										<table class="table">
											<thead>
												<td>Name Item</td>
												<td>SKU</td>
												<td>Qty Request</td>
												<td>Qty Out</td>
												<td>Qty Total</td>
											</thead>
											<tbody>
												<?php foreach ($data[0]["data"] as $key) : ?>
													<tr>
														<td><?php echo $key["nameitem"] ?></td>
														<td><?php echo $key["sku"] ?></td>
														<td><?php echo $key["qty"] - $key["qtyin"] ?></td>
														<td><?php echo $key["qtyin"] ?></td>
														<td><?php echo $key["qty"] ?></td>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>

								</div>
							<?php endif ?>
						</div>
					</div>
					<p class="mt-3" style="font-size: 30px;"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<div class="ju" style="height: 28vh;">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="table" style="width: 100%;">
							<thead style="background: orange; color: white">
								<tr style="height:40px;text-align:center">
									<th style="width: 4%">#</th>
									<th>SKU</th>
									<th style="width: 25%">Nama Item</th>
									<th>SN Awal</th>
									<th>SN Akhir</th>
									<th style="width: 10%">Expired Date</th>
									<th style="width: 10%">Qty</th>
									<th id="action">Action</th>
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
									<?php if ($data != "Not Found") {
									?>
										<input type="text" name="itemmove" id="itemmove" value="<?php echo $data[0]["totalreq"] ?>" class="form-control" readonly>
										<input type="text" name="qtymove" id="qtymove" value="" class="form-control" readonly>
										<input type="hidden" name="idrequest" id="idrequest" value="<?php echo $data[0]["idrequestheader"] ?>" class="form-control" readonly>
										<input type="hidden" name="norequest" id="norequest" value="<?php echo $data[0]["norequest"] ?>" class="form-control" readonly>
									<?php } else {  ?>
										<input type="hidden" name="idrequest" id="idrequest" value="xx" class="form-control" readonly>
										<input type="hidden" name="norequest" id="norequest" value="xx" class="form-control" readonly>
										<input type="text" name="itemmove" id="itemmove" value="0" class="form-control" readonly>
										<input type="text" name="qtymove" id="qtymove" value="0" class="form-control" readonly>
									<?php } ?>
									<input type="hidden" name="acc" id="acc" value="0" class="form-control" readonly>
								</div>
							</div>
							<button style="background: orange; width: 100%; color: white; margin-top: 5px" class="btn btn-warning" id="addorder" onclick="addorder();">Buat Transaksi</button>
							<button style="background: green; width: 100%; color: white; margin-top: 5px" class="btn btn-success" id="confirm" onclick="addorders();">Confirm Ingoing</button>
							<button style="background: orange; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="delorder" onclick="delorder();">Hapus Transaksi</button>
							<button style="background: red; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="cancelorder" onclick="cancelorder();">Batal Transaksi</button>
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
	if ($item != 'Not Found') {
		foreach ($item as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-usesn="<?php echo $key["usesn"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>

<datalist id="xwh">
	<!--<option value="" disabled selected>Pilih Request</option>-->
	<?php
	if ($warehouse != 'Not Found') {
		foreach ($warehouse as $key) {

	?>
			<option value="<?php echo $key["codecomm"]; ?>" namecomm="<?php echo $key["namecomm"]; ?>" data-idcomm="<?php echo $key["idcomm"]; ?>" data-namecomm="<?php echo $key["namecomm"]; ?>"><?php echo $key["codecomm"] . ' - ' . $key["namecomm"]; ?> </option>

	<?php  }
	} ?>
</datalist>

<script type="text/javascript">
	$(document).on('keypress', '.sku', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			$('#transaksi_' + xid + '_expdate').focus();
			e.preventDefault();
		}
	});

	$(document).on('keypress', '.expdate', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_expdate", "");
			$('#transaksi_' + xid + '_qty').focus();
			e.preventDefault();
		}
	});

	$(document).on('keypress', '.qty', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_qty", "");
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
	$(document).on('input', '#codewh', function() {
		var val = $(this).val();
		var xobj = $('#xwh option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#idwh').val("");

		} else {
			$('#idwh').val(xobj.data('idcomm'));
		}
	});
	$(document).on('blur', '#codewh', function() {
		var val = $(this).val();
		if ($('#idwh').val() == "") {
			$('#codewh').val("");
		}
	});

	$(document).on('input', '#codewh2', function() {
		var val = $(this).val();
		var xobj = $('#xwh option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#idwh2').val("");

		} else {
			$('#idwh2').val(xobj.data('idcomm'));
		}
	});
	$(document).on('blur', '#codewh2', function() {
		var val = $(this).val();
		if ($('#idwh2').val() == "") {
			$('#codewh2').val("");
		}
	});

	$(document).on('input', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value === val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_qty').val(0);
			$('#transaksi_' + xid + '_idpodet').val(0);
			$('#transaksi_' + xid + '_expdate').val("");
		} else {
			var data = <?php echo json_encode($data) ?>;
			if (data != "Not Found") {
				console.log(data)
				var success = 0;
				for (var i = 0; i < data[0]["data"].length; i++) {
					if (data[0]["data"][i]["iditem"] == xobj.data('iditem')) {

						success++
						$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
						$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
						$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
						$('#transaksi_' + xid + '_idpodet').val(0);
						$('#transaksi_' + xid + '_expdate').val("");
						$('#transaksi_' + xid + '_qty').val(0);

						if (xobj.data('usesn') == "N") {

							$('#transaksi_' + xid + '_expdate').val("9999-12-31");
							$('#transaksi_' + xid + '_snawal').val("0");
							$('#transaksi_' + xid + '_snakhir').val("0");
							$('#transaksi_' + xid + '_qty').val(0);
							document.getElementById("transaksi_" + xid + "_snawal").readOnly = true;
							document.getElementById("transaksi_" + xid + "_snakhir").readOnly = true;
							document.getElementById("transaksi_" + xid + "_qty").readOnly = false;
						} else {
							document.getElementById("transaksi_" + xid + "_snawal").readOnly = false;
							document.getElementById("transaksi_" + xid + "_snakhir").readOnly = false;
							document.getElementById("transaksi_" + xid + "_qty").readOnly = true;
						}




					}

				}

				if (success == 0) {
					$('#transaksi_' + xid + '_sku').val("");
					alert("Item Ini tidak masuk kedalam request")
				}

			} else {

				$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
				$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
				$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
				$('#transaksi_' + xid + '_idpodet').val(0);
				$('#transaksi_' + xid + '_expdate').val("");
				$('#transaksi_' + xid + '_qty').val(0);
				if (xobj.data('usesn') == "N") {

					$('#transaksi_' + xid + '_expdate').val("9999-12-31");
					$('#transaksi_' + xid + '_snawal').val("0");
					$('#transaksi_' + xid + '_snakhir').val("0");
					$('#transaksi_' + xid + '_qty').val(0);
					document.getElementById("transaksi_" + xid + "_snawal").readOnly = true;
					document.getElementById("transaksi_" + xid + "_snakhir").readOnly = true;
					document.getElementById("transaksi_" + xid + "_qty").readOnly = false;
				} else {
					document.getElementById("transaksi_" + xid + "_snawal").readOnly = false;
					document.getElementById("transaksi_" + xid + "_snakhir").readOnly = false;
					document.getElementById("transaksi_" + xid + "_qty").readOnly = true;
				}


			}


			calc();
		}
	});

	$(document).on('blur', '.sku', function() {
		var val = $(this).val();
		if ($('#idpo').val() == '') {
			$('#codepo').val("");
		}
	});

	$(document).on('change', '.qty', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
		calc();
	});

	function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', ''));
			}
			//$(this).val(i+1);
		});
		$('#qtymove').val(formatnum(xqty));
		$('#itemmove').val(formatnum(xcnt));
	}


	function cancelorder() {
		location.reload();
		//return false;
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
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="transaksi_' + xid + '_iditem" /><input type="hidden" id="transaksi_' + xid + '_idpodet"  class="form-control idpodet" name="transaksi_' + xid + '_idpodet" /></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" placeholder="Search" list="xitem" value=""></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="transaksi_' + xid + '_nameitem" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" id="transaksi_' + xid + '_snawal" objtype="expdate" class="form-control expdate"name="transaksi_' + xid + '_snawal" onclick="move(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" id="transaksi_' + xid + '_snakhir" objtype="expdate" class="form-control expdate"name="transaksi_' + xid + '_snakhir" onclick ="cekdatas(' + xid + ')" /></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" id="transaksi_' + xid + '_expdate" objtype="expdate" class="form-control expdate"name="transaksi_' + xid + '_expdate" readonly/></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" type="text" id="transaksi_' + xid + '_qty" class="form-control qty"name="transaksi_' + xid + '_qty" value="0" readonly/></td>';
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


	function move(x) {
		$("#transaksi_" + x + "_snawal").keyup(function(event) {
			if (event.keyCode === 13) {
				$("#transaksi_" + x + "_snakhir").focus();
			}
		});
	}

	function cekdatas(x) {

		$("#transaksi_" + x + "_snakhir").keyup(function(event) {
			if (event.keyCode === 13) {
				ceksn(x);
			}
		});
	}

	const snawal = [];
	const snakhir = [];
	const iditem = [];

	function ceksn(v) {
		console.log($('#transaksi_' + v + '_snawal').val() + " " + $('#transaksi_' + v + '_snakhir').val())
		if ($('#transaksi_' + v + '_snawal').val() != "" && $('#transaksi_' + v + '_snakhir').val() != "") {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('CounterController/ceksn') ?>",
				data: 'snno1=' + $('#transaksi_' + v + '_snawal').val() + '&snno2=' + $('#transaksi_' + v + '_snakhir').val() + '&idso=0',
				dataType: "json",
				success: function(hasil) {

					console.log(hasil["data"]);
					var loop = 0;
					var salahwh = 0;
					var lebih = 0;

					if (hasil["pesan"] == "Success") {
						// console.log(hasil["data"])
						for (let b = 0; b < hasil["data"].length; b++) {

							console.log($('#transaksi_' + v + '_iditem').val() + " " + hasil["data"][b]["iditem"])

							if ($('#transaksi_' + v + '_iditem').val() == hasil["data"][b]["iditem"]) {
								var snawal1;
								var snakhir1;
								if ($('#transaksi_' + v + '_snakhir').val().length >= 20) {

									snakhir1 = parseFloat(Right($('#transaksi_' + v + '_snakhir').val().slice(0, -1), 7)).toFixed(0);
								} else {
									snakhir1 = parseFloat(Right($('#transaksi_' + v + '_snakhir').val(), 7)).toFixed(0);
								}
								if ($('#transaksi_' + v + '_snawal').val().length >= 20) {
									snawal1 = parseFloat(Right($('#transaksi_' + v + '_snawal').val().slice(0, -1), 7)).toFixed(0);
								} else {
									snawal1 = parseFloat(Right($('#transaksi_' + v + '_snawal').val(), 7)).toFixed(0);
								}
								var qty = Number(snakhir1 - snawal1) + Number(1)
								console.log(qty)
								var datax = <?php echo json_encode($data) ?>;
								if (datax != "Not Found") {
									var data = datax[0]["data"];
									for (var i = 0; i < data.length; i++) {

										if (data[i]["iditem"] == hasil["data"][b]["iditem"]) {
											if ((data[i]["qty"] - data[i]["qtyin"]) < qty) {
												alert("Item SN Lebih");

											} else {
												for (var a = 0; a < snawal.length; a++) {
													if (snawal[a] == $('#transaksi_' + v + '_snawal').val()) {

														loop++;
														break;


													}
												}
												for (var a = 0; a < snakhir.length; a++) {
													if (snakhir[a] == $('#transaksi_' + v + '_snawal').val()) {

														loop++;
														break;

													}
												}

												for (var a = 0; a < snawal.length; a++) {
													if (snawal[a] == $('#transaksi_' + v + '_snakhir').val()) {

														loop++;
														break;

													}
												}
												for (var a = 0; a < snakhir.length; a++) {
													if (snakhir[a] == $('#transaksi_' + v + '_snakhir').val()) {

														loop++;
														break;

													}
												}

												if (loop == 0) {
													var long = Number($('#transaksi_' + v + '_snakhir').val() - $('#transaksi_' + v + '_snawal').val()) + Number(1)
													for (var x = 0; x < long; x++) {
														iditem.push(hasil["data"][b]["iditem"]);
													}

													const aCount = new Map([...new Set(iditem)].map(
														n => [n, iditem.filter(m => m === n).length]
													));
													console.log(aCount.get(hasil["data"][b]["iditem"]) + " > " + data[i]["qty"])
													console.log(i)
													if (Number(aCount.get(hasil["data"][b]["iditem"])) > Number(data[i]["qty"])) {
														lebih++

														alert("Product yang discan telah melebihi qty order");
														var long = Number($('#transaksi_' + v + '_snakhir').val() - $('#transaksi_' + v + '_snawal').val()) + Number(1)
														for (var x = 0; x < long; x++) {
															iditem.splice(-1);
														}
														console.log(iditem)


													} else {
														console.log(i + "A")
														snawal.push($('#transaksi_' + v + '_snawal').val());
														snakhir.push($('#transaksi_' + v + '_snakhir').val());

														$('#snawal').val("");
														$('#snakhir').val("");
														$('#transaksi_' + v + '_expdate').val(hasil["data"][b]["expdate"])
														$('#transaksi_' + v + '_qty').val(qty)
														calc();
													}


												} else {
													var qty = Number($('#transaksi_' + v + '_snakhir').val() - $('#transaksi_' + v + '_snawal').val()) + Number(1)



													console.log(snawal)
													console.log(snakhir)
													console.log(iditem)
													if (snawal.length > 1) {
														snawal.splice(-1, qty);
													}
													if (snakhir.length > 1) {
														snakhir.splice(-1, qty);
													}
													if (snakhir.length > 1) {
														iditem.splice(-1, qty);
													}
													console.log(snawal)
													console.log(snakhir)
													console.log(iditem)
													alert('SN Telah Di Scan');
												}


											} //
										}
									}
								} else {

									for (var a = 0; a < snawal.length; a++) {
										if (snawal[a] == $('#transaksi_' + v + '_snawal').val()) {

											loop++;
											break;


										}
									}
									for (var a = 0; a < snakhir.length; a++) {
										if (snakhir[a] == $('#transaksi_' + v + '_snawal').val()) {

											loop++;
											break;

										}
									}

									for (var a = 0; a < snawal.length; a++) {
										if (snawal[a] == $('#transaksi_' + v + '_snakhir').val()) {

											loop++;
											break;

										}
									}
									for (var a = 0; a < snakhir.length; a++) {
										if (snakhir[a] == $('#transaksi_' + v + '_snakhir').val()) {

											loop++;
											break;

										}
									}


									if (hasil["data"][b]["idwh"] != 82) {

										loop++;
										salahwh++;

									}

									if (loop == 0) {
										// var long = Number( $('#transaksi_' + v + '_snakhir').val() -  $('#transaksi_' + v + '_snawal').val()) + Number(1)
										//       for (var x = 0; x < long; x++) {
										//           iditem.push(hasil["data"][b]["iditem"]);
										//       }

										//       const aCount = new Map([...new Set(iditem)].map(
										//       n => [n, iditem.filter(m => m === n).length]
										//    ));
										//    console.log(aCount.get(hasil["data"][b]["iditem"]) + " > "+ data[i]["qty"])
										//    console.log(i)
										//    if (Number(aCount.get(hasil["data"][b]["iditem"])) > Number(data[i]["qty"])) {
										//    	lebih++

										//       alert("Product yang discan telah melebihi qty order");
										//      var long = Number( $('#transaksi_' + v + '_snakhir').val() -  $('#transaksi_' + v + '_snawal').val()) + Number(1)
										//        for (var x = 0; x < long; x++) {
										//           iditem.splice(-1);
										//        }
										//       console.log(iditem)


										//    } 
										//    else
										//    {
										//    	console.log(i+"A")

										//    }
										snawal.push($('#transaksi_' + v + '_snawal').val());
										snakhir.push($('#transaksi_' + v + '_snakhir').val());

										$('#snawal').val("");
										$('#snakhir').val("");
										$('#transaksi_' + v + '_expdate').val(hasil["data"][b]["expdate"])
										$('#transaksi_' + v + '_qty').val(qty)
										calc();

									} else {
										var qty = Number($('#transaksi_' + v + '_snakhir').val() - $('#transaksi_' + v + '_snawal').val()) + Number(1)



										console.log(snawal)
										console.log(snakhir)
										console.log(iditem)
										if (snawal.length > 1) {
											snawal.splice(-1, qty);
										}
										if (snakhir.length > 1) {
											snakhir.splice(-1, qty);
										}
										if (snakhir.length > 1) {
											iditem.splice(-1, qty);
										}
										console.log(snawal)
										console.log(snakhir)
										console.log(iditem)
										if (salahwh == 0) {
											alert('SN Telah Di Scan');
										} else {
											alert("SN Ini Tidak Ada Di Gudang Asal");
										}

									}


								}



							} else {
								// alert("SN Ini tidak cocok dengan item yang dipilih")

							}

						};


					} else {
						alert(hasil["pesan"]);

					}


				}
			});
		} else {
			alert('Tolong input SN terlebih dahulu');

		}


	}

	function reorder() {
		$('input[objtype=nourut]').each(function(i, obj) {
			$(this).val(i + 1);
		});
	}

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}


	function back() {
		var data = <?php echo json_encode($data) ?>;
		if (data != "Not Found") {
			window.location.href = "<?php echo base_url('PrQuo/cr') ?>";
		} else {
			<?php if ($from == "counter") { ?>
				window.location.href = "<?php echo base_url('CounterController/ingoing') ?>";
			<?php } else if ($from == "warehouses") { ?>
				window.location.href = "<?php echo base_url('/InOut/return') ?>";
			<?php } else { ?>
				window.location.href = "<?php echo base_url('InOut/movewh') ?>";
			<?php } ?>

		}

	}

	function validasi() {
		var xval = 0;
		var sts = 1;
		xval = $("#qtymove").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#itemmove").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#datemove").val();
		if ($("#datemove").val() == '') {
			alert('Input Tanggal');
			sts = 0;
			return false;
		}
		$('input[objtype=expdate]').each(function(i, obj) {

			xid = $(this).attr('id').replace("transaksi_", "").replace("_expdate", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				if ($("#datemove").val() >= $(this).val()) {
					alert('Tanggal Expired Dibawah Atau Sama Dengan Tanggal Transaksi');
					sts = 0;
					return false;
				}
				if ($('#transaksi_' + xid + '_idsn').val() == '') {
					alert('Input Serial Number');
					sts = 0;
					return false;
				} else {
					if ($('#transaksi_' + xid + '_idsn2').val() == '') {
						$('#transaksi_' + xid + '_idsn2').val($('#transaksi_' + xid + '_idsn').val());
						calcsub(xid)
					}
				}
			}
		});
		if (sts == 1) {
			return true;
		} else {
			return false;
		}
		//return 'ok';
	}

	function addorder() {
		var cx = $('#form').serialize();
		console.log($('#qtymove').val())
		if ($('#qtymove').val() != 0) {

			if ($("#idmove").val() == '') {
				$.post("<?php echo base_url('InOut/updatemovewh') ?>", cx,
					function(data) {
						console.log(data);
						if (data == 'Success') {
							alert('Input Data Berhasil');

							var data = <?php echo json_encode($data) ?>;
							if (data != "Not Found") {
								back();
							} else {
								<?php if ($from == "counter") { ?>
									window.location.href = "<?php echo base_url('CounterController/ingoing') ?>";
								<?php } else if ($from == "warehouses") { ?>
									window.location.href = "<?php echo base_url('/InOut/return') ?>";
								<?php } else { ?>
									window.location.href = "<?php echo base_url('InOut/movewh') ?>";
								<?php } ?>

							}
						} else {
							alert('Input Data Gagal. ' + data);
						}
					});
			} else {
				$.post("<?php echo base_url('InOut/updatemovewh') ?>", cx,
					function(data) {
						console.log(data);
						if (data == 'Success') {
							alert('Update Data Berhasil');
							cancelorder();
						} else {
							alert('Update Data Gagal. ' + data);
						}
					});
			}


		} else {
			alert("Input Item Dengan Benar");
		}

	}

	function addorders() {
		var cx = $('#form').serialize();
		if ($("#idmove").val() == '') {
			$.post("<?php echo base_url('InOut/updatemovewh') ?>", cx,
				function(data) {
					console.log(data);
					if (data == 'Success') {
						alert('Input Data Berhasil');

						var data = <?php echo json_encode($data) ?>;
						if (data != "Not Found") {
							back();
						} else {
							cancelorder();
						}
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
		} else {
			$.post("<?php echo base_url('InOut/updatemovewh') ?>", cx,
				function(data) {
					console.log(data);
					if (data == 'Success') {

						alert('Update Data Berhasil');
						var data = <?php echo json_encode($data) ?>;
						if (data != "Not Found") {
							back();
						} else {
							<?php if ($from == "counter") { ?>
								window.location.href = "<?php echo base_url('CounterController/ingoing') ?>";
							<?php } else if ($from == "warehouses") { ?>
								window.location.href = "<?php echo base_url('/InOut/return') ?>";
							<?php } else { ?>
								window.location.href = "<?php echo base_url('InOut/movewh') ?>";
							<?php } ?>

						}
					} else {
						alert('Update Data Gagal. ' + data);
					}
				});
		}
	}

	function delorder() {
		var cx = $('#idmove').serialize();
		$.post("<?php echo base_url('InOut/deletemovewh') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Hapus Data Berhasil');
					back();
				} else {
					alert('Hapus Data Gagal. ' + data);
				}
			}
		);
	}

	function loaddata() {
		var xid = 0;
		var data = <?php echo json_encode($headertrans) ?>;
		console.log(data)

		<?php if ($headertrans != "Not Found") { ?>
			$('#detailx').html('');
			$("#idmove").val("<?php echo $idtrans ?>");
			$("#codemove").val("<?php echo $headertrans['codemove'] ?>");
			$("#idwh").val("<?php echo $headertrans['idwh'] ?>");
			$("#codewh").val("<?php echo $headertrans['codewh'] ?>");
			$("#idwh2").val("<?php echo $headertrans['idwh2'] ?>");
			$("#codewh2").val("<?php echo $headertrans['codewh2'] ?>");
			$("#descinfo").val("<?php echo $headertrans['descinfo'] ?>");
			$("#datepr").val("<?php echo $headertrans['datemove'] ?>");
			$("#qtymove").val("<?php echo number_format($headertrans['qtymove'], 0, '.', ',') ?>");
			$("#itemmove").val("<?php echo number_format($headertrans['itemmove'], 0, '.', ',') ?>");
			<?php if ($from == "counter" || $from == "warehouses") { ?>
				console.log(data["norequest"])
				document.getElementById("datepr").readOnly = true;
				document.getElementById("codewh").readOnly = true;
				document.getElementById("codewh2").readOnly = true;
				document.getElementById("descinfo").readOnly = true;
				$('#action').hide();
				$("#confirm").show();
				$("#addorder").hide();
				$("#delorder").hide();
				$("#cancelorder").hide();
				$('#acc').val(1);
			<?php } else { ?>
				<?php if (isset($headertrans)) { ?>
					<?php if ($headertrans['status'] == "Received") { ?>
						console.log(data["norequest"])
						document.getElementById("datepr").readOnly = true;
						document.getElementById("codewh").readOnly = true;
						document.getElementById("codewh2").readOnly = true;
						document.getElementById("descinfo").readOnly = true;
						$('#action').hide();
						$("#confirm").show();
						$("#addorder").hide();
						$("#delorder").hide();
						$("#cancelorder").hide();
						$('#acc').val(1);
					<?php } else { ?>
						document.getElementById("datepr").readOnly = false;
						document.getElementById("codewh").readOnly = false;
						document.getElementById("codewh2").readOnly = false;
						document.getElementById("descinfo").readOnly = false;
						$('#action').show();
						$("#delorder").show();
						$("#addorder").show();
						$("#cancelorder").show();
						$("#confirm").hide();
						$('#acc').val(0);

					<?php } ?>
				<?php } else { ?>
					document.getElementById("datepr").readOnly = false;
					document.getElementById("codewh").readOnly = false;
					document.getElementById("codewh2").readOnly = false;
					document.getElementById("descinfo").readOnly = false;
					$('#action').show();
					$("#delorder").show();
					$("#addorder").show();
					$("#cancelorder").show();
					$("#confirm").hide();
					$('#acc').val(0);

				<?php } ?>
			<?php } ?>

			console.log()

			<?php if ($detailtrans != "Not Found") { ?>
				<?php $a = 0;
				foreach ($detailtrans as $key) : ?>
					add_row_transaksi(xid);

					xid = xid + 1;
					$("#transaksi_" + xid + "_iditem").val("<?php echo $key['iditem'] ?>");
					$("#transaksi_" + xid + "_sku").val("<?php echo $key['sku'] ?>");
					$("#transaksi_" + xid + "_nameitem").val("<?php echo $key['nameitem'] ?>");
					$("#transaksi_" + xid + "_snawal").val("<?php echo $key['snawal'] ?>");
					$("#transaksi_" + xid + "_snakhir").val("<?php echo $key['snakhir'] ?>");
					$("#transaksi_" + xid + "_expdate").val("<?php echo $key['expdate'] ?>");

					$("#transaksi_" + xid + "_qty").val("<?php echo number_format($key['qty'], 0, '.', ',') ?>");

					<?php if ($from == "counter" || $from == "warehouses" || isset($headertrans) || $headertrans['status'] == "Received") { ?>


						document.getElementById("transaksi_" + xid + "_snawal").readOnly = true;
						document.getElementById("transaksi_" + xid + "_snakhir").readOnly = true;


						$("#transaksi_" + xid + "_action").hide();
					<?php } else { ?>



						document.getElementById("transaksi_" + xid + "_snawal").readOnly = false;
						document.getElementById("transaksi_" + xid + "_snakhir").readOnly = false;

						$("#transaksi_" + xid + "_action").show();

					<?php } ?>


				<?php endforeach ?>
			<?php } ?>

		<?php } ?>
		<?php if (isset($headertrans) && $headertrans != "Not Found") { ?>

			<?php if ($from != "counter" && $from != "warehouses" &&  $headertrans['status'] != "Received") { ?>

				add_row_transaksi(xid);
			<?php } ?>
		<?php } else { ?>
			<?php if ($from != "counter" && $from != "warehouses") { ?>
				add_row_transaksi(xid);
			<?php } ?>
		<?php } ?>



	}

	$(document).on('focus', 'input', function() {
		$(this).select();
	});
	$('form button').on("click", function(e) {
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Transaksi?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			var xask = '';
			if ($("#idmove").val() == '') {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addorder();
				}
			}
		} else if ($(this).attr('id') == 'delorder') {
			if (confirm("Delete Transaksi?")) {
				delorder();
			}
		}
		e.preventDefault();
	});



	$(document).ready(function() {
		console.log("OK")
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		$(".datetrans").val(date);
		loaddata();
		if ($("#idmove").val() == '') {
			$("#delorder").hide();
			$("#confirm").hide();
			$("#addorder").html('Buat Transaksi');
		} else {
			$("#addorder").html('Ubah Transaksi');
			<?php if ($from == "counter" || $from == "warehouses") { ?>
				$("#confirm").show();
			<?php } else { ?>
				$("#confirm").hide();
			<?php } ?>

		}
	});
</script>