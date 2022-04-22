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
	<form action="<?php echo base_url('InOut/addpakets') ?>" method="POST" id="form">
		<div class="container-fluid text-white pt-3" style="background-color: purple;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">INVENTORY/Split Bundle Item/New Trans</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">Tambah Bundle Split</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<input type="hidden" name="idpakets" id="idpakets">
		<input type="hidden" name="codepakets" id="codepakets">
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 2vh;padding-left:1rem">
				<div class="col bays p-4">
					<p style="font-size: 30px"><b>INFORMASI BUNDLE SPLIT</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Item</b></p>
								<hr style="height: 2%; background: purple;opacity:1">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="datepakets" id="datepakets" class="form-control datetrans" placeholder="Pilih Tanggal">
							</div>
							<div class="mb-3">
								<label>Item Bundle</label>
								<input type="hidden" class="form-control" id="iditems" name="iditems">
								<input type="text" class="form-control" id="sku" name="sku" placeholder="Search" list="xitem" value="">
							</div>
							<div class="mb-3">
								<label>Gudang</label>
								<select class="form-control" name="idwh" id="idwh">
									<option value="0" disabled selected>Pilih Gudang</option>
									<?php
									if ($warehouse != 'Not Found' || !empty($warehouse)) {
										foreach ($warehouse as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
									<?php endforeach;
									} ?>
								</select>
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Detail</b></p>
								<hr style="height: 2%; background: purple;opacity:1 ">
							</div>
							<div class="mb-3">
								<label>SN Awal</label>
								<input type="text" name="idsnp" id="idsnp" class="form-control" placeholder="Serial Number Awal">
							</div>
							<div class="mb-3">
								<label>SN Akhir</label>
								<input type="text" name="idsnp2" id="idsnp2" class="form-control" placeholder="Serial Number Akhir">
							</div>
							<div class="mb-3">
								<label>Qty</label>
								<input type="text" name="qtys" id="qtys" class="form-control" readonly>
							</div>
						</div>
						<div class="col-4">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Bundle</b></p>
								<hr style="height: 2%; background: purple;opacity:1 ">
							</div>
							<div class="mb-3">
								<label>Deskripsi</label>
								<input type="text" name="descinfo" id="descinfo" class="form-control" placeholder="Deskripsi">
							</div>
							<div class="mb-3">
								<label>Expired Date</label>
								<input type="date" name="expdates" id="expdates" class="form-control datetrans" placeholder="Expired Date">
							</div>
						</div>
					</div>
					<p class="mt-3" style="font-size: 30px;"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<div class="ju" style="height: 28vh;">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="table" style="width: 100%;">
							<thead style="background: purple; color: white">
								<tr style="height:40px;text-align:center">
									<th style="width: 8%">#</th>
									<th style="width: 22%">SKU</th>
									<th style="width: 35%;">Nama Item</th>
									<th style="width: 20%">Expired</th>
									<th style="width: 10%">Qty</th>
									<th style="width: 5%">Action</th>
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
							<p style="font-size: 20px;color:#444444">Quantity</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Jumlah Barang</p>
								</div>
								<div class="col-4">
									<input type="text" name="itempakets" id="itempakets" value="0" class="form-control" readonly>
									<input type="hidden" name="qtypakets" id="qtypakets" value="0" class="form-control" readonly>
								</div>
							</div>
							<button style="background: orange; width: 100%; color: white; margin-top: 5px" class="btn btn-warning" id="addorder" onclick="addorder();">Buat Transaksi</button>
							<button style="background: orange; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="delorder" onclick="delorder();">Hapus Transaksi</button>
							<button style="background: red; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="cancelorder" onclick="cancelorder();">Batal Transaksi</button>
						</div>
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
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>



<datalist id="xpo">
	<!--<option value="" disabled selected>Pilih Request</option>-->
	<?php
	if ($order != 'Not Found' || !empty($order)) {
		foreach ($order as $key) {
	?>
			<option value="<?php echo $key["codepo"]; ?>" namesupp="<?php echo $key["namesupp"]; ?>" data-idpo="<?php echo $key["idpo"]; ?>" data-idsupp="<?php echo $key["idsupp"]; ?>" data-datepo="<?php echo $key["datepo"]; ?>" data-namesupp="<?php echo $key["namesupp"]; ?>"><?php echo $key["codepo"] . ' - ' . $key["namesupp"]; ?> </option>
	<?php }
	} ?>
</datalist>

<script type="text/javascript">
	var today = new Date();
	var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
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
			if (isNaN(parseFloat($(this).val()).toFixed(0))) {
				$(this).val('');
			}
			if ($('#transaksi_' + xid + '_action').html() == '<b>+</b>') {
				$('#transaksi_' + xid + '_action').click();
				$('#transaksi_' + (xid2) + '_sku').focus();
			} else {
				$('#transaksi_' + (xid2) + '_sku').focus();
			}
			e.preventDefault();
		}
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
			$('#transaksi_' + xid + '_qty').val(0);
		} else {
			$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_qty').val(0);
		}
		calc();
	});

	$(document).on('input', '#sku', function() {
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#iditems').val("");
			$('#sku').val("");
		} else {

			$('#iditems').val(xobj.data('iditem'));
			$('#sku').val(xobj.data('sku'));
		}
	});

	$(document).on('blur', '#sku', function() {
		var val = $(this).val();
		if ($('#iditem').val() == '') {
			$('#sku').val("");
		}
	});

	$(document).on('change', '.qty', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
		calc();
	});

	$(document).on('change', '#idsnp', function() {
		if (isNaN(parseFloat(Right($(this).val(), 7)).toFixed(0))) {
			$(this).val('');
		}
		var x1 = parseFloat(Right($("#idsnp").val(), 7)).toFixed(0);
		var x2 = parseFloat(Right($("#idsnp2").val(), 7)).toFixed(0);
		$("#qtys").val(calcsn(x1, x2));
	});

	$(document).on('change', '#idsnp2', function() {
		if (isNaN(parseFloat(Right($(this).val(), 7)).toFixed(0))) {
			$(this).val('');
		}
		var x1 = parseFloat(Right($("#idsnp").val(), 7)).toFixed(0);
		var x2 = parseFloat(Right($("#idsnp2").val(), 7)).toFixed(0);
		$("#qtys").val(calcsn(x1, x2));
	});

	function calcsn(xsn, xsn2) {
		if (isNaN(xsn2 - xsn + 1)) {
			return '0';
		} else {
			return formatnum(xsn2 - xsn + 1);
		}
	}

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
		});
		$('#qtypakets').val(formatnum(xqty));
		$('#itempakets').val(formatnum(xcnt));
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
		tabel += '<td style="border:none"height:1px"><input type="date" id="transaksi_' + xid + '_expdate" objtype="expdate" class="form-control expdate"name="transaksi_' + xid + '_expdate" /></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" type="text" id="transaksi_' + xid + '_qty" class="form-control qty"name="transaksi_' + xid + '_qty" value="0"/></td>';
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

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}


	function back() {
		window.location.href = "<?php echo base_url('InOut/pakets') ?>";
	}

	function validasi() {
		var xval = 0;
		var sts = 1;
		xval = $("#qtypakets").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#qtys").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Qty Paket');
			sts = 0;
			return false;
		}
		if ($("#idsnp").val() == '') {
			alert('Input SN Awal Paket');
			sts = 0;
			return false;
		}
		if ($("#idsnp2").val() == '') {
			alert('Input SN Akhir Paket');
			sts = 0;
			return false;
		}
		xval = $("#itempakets").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#datepakets").val();
		if ($("#datepakets").val() == '') {
			alert('Input Tanggal');
			sts = 0;
			return false;
		}
		if ($("#datepakets").val() >= $("#expdates").val()) {
			alert('Tanggal Expired Dibawah Atau Sama Dengan Tanggal Transaksi');
			sts = 0;
			return false;
		}

		if (sts == 1) {
			return true;
		} else {
			return false;
		}
		//return 'ok';
	}

	function addorder() {
		var cx = $('#form').serialize();
		if ($("#idpakets").val() == '') {
			$.post("<?php echo base_url('InOut/updatepakets') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Input Data Berhasil');
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
		} else {
			$.post("<?php echo base_url('InOut/updatepakets') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Update Data Berhasil');
						cancelorder();
					} else {
						alert('Update Data Gagal. ' + data);
					}
				});
		}
	}

	function delorder() {
		var cx = $('#idpakets').serialize();
		$.post("<?php echo base_url('InOut/deletepakets') ?>", cx,
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
		<?php if ($headertrans != "Not Found") { ?>
			$('#detailx').html('');
			$("#idpakets").val("<?php echo $idtrans ?>");
			$("#iditems").val("<?php echo $headertrans['iditems'] ?>");
			$("#sku").val("<?php echo $headertrans['sku'] ?>");
			$("#codepakets").val("<?php echo $headertrans['codepakets'] ?>");
			$("#descinfo").val("<?php echo $headertrans['descinfo'] ?>");
			$("#datepakets").val("<?php echo $headertrans['datepakets'] ?>");
			$("#expdates").val("<?php echo $headertrans['expdates'] ?>");
			$("#idwh").val("<?php echo $headertrans['idwh'] ?>");
			$("#idsnp").val("<?php echo $headertrans['idsnp'] ?>");
			$("#idsnp2").val("<?php echo $headertrans['idsnp2'] ?>");
			$("#qtys").val("<?php echo number_format($headertrans['qtys'], 0, '.', ',') ?>");
			$("#qtypakets").val("<?php echo number_format($headertrans['qtypakets'], 0, '.', ',') ?>");
			$("#itempakets").val("<?php echo number_format($headertrans['itempakets'], 0, '.', ',') ?>");
			<?php if ($detailtrans != "Not Found") { ?>
				<?php $a = 0;
				foreach ($detailtrans as $key) : ?>
					add_row_transaksi(xid);
					xid = xid + 1;
					$("#transaksi_" + xid + "_iditem").val("<?php echo $key['iditem'] ?>");
					$("#transaksi_" + xid + "_sku").val("<?php echo $key['sku'] ?>");
					$("#transaksi_" + xid + "_nameitem").val("<?php echo $key['nameitem'] ?>");
					$("#transaksi_" + xid + "_expdate").val("<?php echo $key['expdate'] ?>");
					$("#transaksi_" + xid + "_qty").val("<?php echo number_format($key['qty'], 0, '.', ',') ?>");
				<?php endforeach ?>
			<?php } ?>
		<?php } ?>
		add_row_transaksi(xid);

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
			if ($("#idpakets").val() == '') {
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
		$(".datetrans").val(date);
		loaddata();
		if ($("#idpakets").val() == '') {
			$("#delorder").hide();
			$("#addorder").html('Buat Transaksi');
			$("#stss").html('INVENTORY/Split Bundle Item/New Trans');
		} else {
			$("#addorder").html('Ubah Transaksi');
			$("#stss").html('INVENTORY/Split Bundle Item/Update Trans');
		}
	});
</script>