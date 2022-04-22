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
	<form action="<?php echo base_url('InOut/addinvinret') ?>" method="POST" id="form">
		<div class="container-fluid text-white pt-3" style="background-color: orange;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">Gudang Utama/Outgoing</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">INVENTORY OUT</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<input type="hidden" name="idinret" id="idinret">
		<input type="hidden" name="codeinret" id="codeinret">
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 2vh;padding-left:1rem">
				<div class="col-9 bays p-4">
					<p style="font-size: 30px"><b>INFORMASI OUT BARANG</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Dasar</b></p>
								<hr style="height: 2%; background: orange; opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="dateinret" id="dateinret" class="form-control datetrans" placeholder="Pilih Tanggal">
							</div>
							<div class="mb-3">
								<label>Code PO</label>
								<input type="hidden" class="form-control" id="idpo" name="idpo">
								<input type="text" class="form-control" id="codepo" name="codepo" placeholder="Search" list="xpo" value="">
							</div>
							<div class="mb-3">
								<label>Gudang</label>
								<select class="form-select" name="idwh" id="idwh">

									<?php
									if ($warehouse != 'Not Found') {
										foreach ($warehouse as $key) : ?>
											<?php if ($key["attrib3"] == "mainwarehouse") : ?>
												<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
											<?php endif ?>

									<?php endforeach;
									} ?>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Supplier / Customer</b></p>
								<hr style="height: 2%; background: orange; opacity:1">
							</div>
							<div class="mb-3">
								<label>Supplier / Customer</label>
								<input type="hidden" class="form-control" id="idsupp" name="idsupp">
								<input type="text" class="form-control" id="namesupp" name="namesupp" placeholder="Search" list="xpo" value="" readonly>
							</div>
							<div class="mb-3">
								<label>Deskripsi</label>
								<textarea type="text" name="descinfo" id="descinfo" style="height: 20vh;" class="form-control" placeholder="Deskripsi"></textarea>
							</div>
						</div>
					</div>
					<p style="font-size: 30px;margin: 0"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<div class="ju" style="height: 28vh;">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="table" style="width: 100%;">
							<thead style="background: orange; color: white">
								<tr style="height:40px;text-align:center">
									<th style="width: 4%">#</th>
									<th style="width: 10%">SKU</th>
									<th style="width: 25%;">Nama Item</th>
									<th style="width: 10%">Expired</th>
									<th>SN Awal</th>
									<th>SN Akhir</th>
									<th style="width: 10%">Qty</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="border-0" id="detailx">
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
									<input type="text" name="iteminret" id="iteminret" value="0" class="form-control" readonly>
									<input type="hidden" name="qtyinret" id="qtyinret" value="0" class="form-control" readonly>
								</div>
							</div>
							<button style="background: orange; width: 100%; color: white; margin-top: 5px" class="btn btn-warning" id="addorder" onclick="addorder();">Buat Transaksi</button>
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



<datalist id="xpo">
	<!--<option value="" disabled selected>Pilih Request</option>-->
	<?php
	if ($order != 'Not Found') {
		foreach ($order as $key) {
	?>
			<option value="<?php echo $key["codepo"]; ?>" namesupp="<?php echo $key["namesupp"]; ?>" data-idpo="<?php echo $key["idpo"]; ?>" data-idsupp="<?php echo $key["idsupp"]; ?>" data-datepo="<?php echo $key["datepo"]; ?>" data-namesupp="<?php echo $key["namesupp"]; ?>"><?php echo $key["codepo"] . ' - ' . $key["namesupp"]; ?> </option>
	<?php }
	} ?>
</datalist>

<script type="text/javascript">
	var xitem = '';
	xitem = '<?php
				$x = ''; //'<option value="" disabled selected>Select Item</option>';
				if ($item != 'Not Found') {
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
			$('#transaksi_' + xid + '_idsn').focus();
			e.preventDefault();
		}
	});

	// $(document).on('keypress', '.idsn', function(e) {
	// 	if (e.keyCode == 13) {
	// 		var xid = $(this).attr('id').replace("transaksi_", "").replace("_idsn", "");
	// 		$('#transaksi_' + xid + '_idsn2').focus();
	// 		e.preventDefault();
	// 	}
	// });

	// $(document).on('keypress', '.idsn2', function(e) {
	// 	if (e.keyCode == 13) {
	// 		var xid = $(this).attr('id').replace("transaksi_", "").replace("_idsn2", "");
	// 		var xid2 = (parseInt(xid) + 1);
	// 		if (isNaN(parseFloat(Right($(this).val(), 7)).toFixed(0))) {
	// 			$(this).val('');
	// 		}
	// 		if ($('#transaksi_' + xid + '_idsn2').val() == '') {
	// 			$('#transaksi_' + xid + '_idsn2').val($('#transaksi_' + xid + '_idsn').val());
	// 			//$( '#transaksi_'+xid+'_qty' ).val(1);
	// 			calcsub(xid)
	// 		}



	// 		if ($('#transaksi_' + xid + '_action').html() == '<b>+</b>') {
	// 			$('#transaksi_' + xid + '_action').click();
	// 			$('#transaksi_' + (xid2) + '_sku').focus();
	// 		} else {
	// 			$('#transaksi_' + (xid2) + '_sku').focus();
	// 		}
	// 		e.preventDefault();
	// 	}
	// });

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
			$('#transaksi_' + xid + '_idpodet').val(0);
			$('#transaksi_' + xid + '_expdate').val("");
			$('#transaksi_' + xid + '_idsn').val("");
			$('#transaksi_' + xid + '_idsn2').val("");
		} else {
			$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_idpodet').val(0);
			$('#transaksi_' + xid + '_expdate').val("");
			$('#transaksi_' + xid + '_idsn').val("");
			$('#transaksi_' + xid + '_idsn2').val("");
			$('#transaksi_' + xid + '_qty').val(0);
			if (xobj.data('usesn') == 'N') {
				$('#transaksi_' + xid + '_expdate').val('9999-12-31');
				$('#transaksi_' + xid + '_idsn').val(0);
				$('#transaksi_' + xid + '_idsn2').val(0);
				document.getElementById("transaksi_" + xid + "_idsn").readOnly = true;
				document.getElementById("transaksi_" + xid + "_idsn2").readOnly = true;
				document.getElementById("transaksi_" + xid + "_qty").readOnly = false;
			} else {
				document.getElementById("transaksi_" + xid + "_idsn").readOnly = false;
				document.getElementById("transaksi_" + xid + "_idsn2").readOnly = false;
				document.getElementById("transaksi_" + xid + "_qty").readOnly = true;
			}

		}
		calc();
	});

	$(document).on('input', '#codepo', function() {
		var val = $(this).val();
		var xobj = $('#xpo option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#idpo').val("");
			//$('#codepo').val("");
			$('#idsupp').val("0");
			$('#datepo').val("");
		} else {

			$('#idpo').val(xobj.data('idpo'));
			$('#codepo').val(xobj.data('codepo'));
			$('#idsupp').val(xobj.data('idsupp'));
			$('#namesupp').val(xobj.data('namesupp'));
			$('#datepo').val(xobj.data('datepo'));
			loadreq();
		}
	});

	// $(document).on('blur', '#codepo', function() {
	// 	var val = $(this).val();
	// 	if ($('#idpo').val() == '') {
	// 		$('#codepo').val("");
	// 	}
	// });

	$(document).on('change', '.qty', function() {
		if (isNaN(parseFloat($(this).val().replaceAll(",", "")).toFixed(0))) {
			$(this).val(formatnum(0));
		}
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
		calc()
	});

	// $(document).on('change', '.idsn', function() {
	// 	var xid = $(this).attr('id').replace("transaksi_", "").replace("_idsn", "");
	// 	if (isNaN(parseFloat(Right($(this).val(), 7)).toFixed(0))) {
	// 		$(this).val('');
	// 	}
	// 	var xx = checksn(xid);
	// 	if (xx == '0') {
	// 		$(this).val('');
	// 	}

	// 	calcsub(xid)
	// });

	// $(document).on('change', '.idsn2', function() {
	// 	var xid = $(this).attr('id').replace("transaksi_", "").replace("_idsn2", "");
	// 	if (isNaN(parseFloat(Right($(this).val(), 7)).toFixed(0))) {
	// 		$(this).val('');
	// 	}
	// 	var xx = checksn(xid);
	// 	if (xx == '0') {
	// 		$(this).val('');
	// 	}

	// 	if ($('#transaksi_' + xid + '_idsn2').val() == '') {
	// 		$('#transaksi_' + xid + '_idsn2').val($('#transaksi_' + xid + '_idsn').val());
	// 		//$( '#transaksi_'+xid+'_qty' ).val(1);
	// 	}
	// 	calcsub(xid)
	// });

	// function checksn(xid2) {
	// 	var xsn = $('#transaksi_' + xid2 + '_idsn').val();
	// 	var xsn2 = $('#transaksi_' + xid2 + '_idsn2').val();

	// 	var ysn = '';
	// 	var ysn2 = '';
	// 	var res = '1';

	// 	$('input[objtype=sku]').each(function(i, obj) {
	// 		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
	// 		if (xid != xid2) {
	// 			ysn = $('#transaksi_' + xid + '_idsn').val();
	// 			ysn2 = $('#transaksi_' + xid + '_idsn2').val();
	// 			if (ysn != '') {
	// 				if (ysn == xsn) {
	// 					alert("Duplicate SN");
	// 					res = '0';
	// 					return;
	// 				}
	// 				if (ysn == xsn2) {
	// 					alert("Duplicate SN");
	// 					res = '0';
	// 					return;
	// 				}
	// 			}
	// 			if (ysn2 != '') {
	// 				if (ysn2 == xsn) {
	// 					alert("Duplicate SN");
	// 					res = '0';
	// 					return;
	// 				}
	// 				if (ysn2 == xsn2) {
	// 					alert("Duplicate SN");
	// 					res = '0';
	// 					return;
	// 				}
	// 			}
	// 		}
	// 	});
	// 	return res;
	// }


	function calcsub(xid) {
		var xsn = parseFloat(Right($('#transaksi_' + xid + '_idsn').val(), 7)).toFixed(0);
		var xsn2 = parseFloat(Right($('#transaksi_' + xid + '_idsn2').val(), 7)).toFixed(0);
		if (isNaN(xsn2 - xsn + 1)) {
			$('#transaksi_' + xid + '_qty').val(0);
		} else {
			$('#transaksi_' + xid + '_qty').val(formatnum(xsn2 - xsn + 1));
		}
		calc();
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
			//$(this).val(i+1);
		});
		$('#qtyinret').val(formatnum(xqty));
		$('#iteminret').val(formatnum(xcnt));
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
		tabel += '<td class="p-0 border-0"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="transaksi_' + xid + '_iditem" /><input type="hidden" id="transaksi_' + xid + '_idpodet"  class="form-control idpodet" name="transaksi_' + xid + '_idpodet" /></td>';
		tabel += '<td class="p-0 border-0"><input type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" placeholder="Search" list="xitem" value=""></td>';
		tabel += '<td class="p-0 border-0"><input type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="transaksi_' + xid + '_nameitem" value=""/></td>';
		tabel += '<td class="p-0 border-0"><input type="date" id="transaksi_' + xid + '_expdate" readonly objtype="expdate" class="form-control expdate"name="transaksi_' + xid + '_expdate" /><input type="hidden" id="transaksi_' + xid + '_snid" readonly objtype="snid" class="form-control expdate"name="transaksi_' + xid + '_snid" /></td>';
		tabel += '<td class="p-0 border-0"><input type="text" id="transaksi_' + xid + '_idsn"  class="form-control idsn"name="transaksi_' + xid + '_idsn" onclick="move(' + xid + ')"  /></td>';
		tabel += '<td class="p-0 border-0"><input type="text" id="transaksi_' + xid + '_idsn2"  class="form-control idsn2" name="transaksi_' + xid + '_idsn2" onclick ="cekdatas(' + xid + ')" /></td>';
		tabel += '<td class="p-0 border-0"><input style="text-align:center" type="text" id="transaksi_' + xid + '_qty" readonly  class="form-control qty"name="transaksi_' + xid + '_qty" value="0"/></td>';
		tabel += '<td class="p-0 border-0" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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


	$(document).keypress(
		function(event) {
			if (event.which == '13') {
				event.preventDefault();
			}
		});

	function move(x) {
		$("#transaksi_" + x + "_idsn").keyup(function(event) {
			if (event.keyCode === 13) {
				$("#transaksi_" + x + "_idsn2").focus();
			}
		});
	}

	function cekdatas(x) {

		$("#transaksi_" + x + "_idsn2").keyup(function(event) {
			if (event.keyCode === 13) {
				ceksn(x);
			}
		});
	}

	const snawal = [];
	const snakhir = [];
	const iditem = [];

	function ceksn(v) {

		if ($('#transaksi_' + v + '_idsn').val() != "" && $('#transaksi_' + v + '_idsn2').val() != "") {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('CounterController/ceksn') ?>",
				data: 'snno1=' + $('#transaksi_' + v + '_idsn').val() + '&snno2=' + $('#transaksi_' + v + '_idsn2').val() + '&idso=0',
				dataType: "json",
				success: function(hasil) {

					console.log(hasil);
					var loop = 0;
					var lebih = 0;

					if (hasil["pesan"] == "Success") {
						console.log($('#transaksi_' + v + '_iditem').val() + " " + hasil["data"][0]["iditem"])

						if ($('#transaksi_' + v + '_iditem').val() == hasil["data"][0]["iditem"]) {
							var snawal1;
							var snakhir1;
							if ($('#transaksi_' + v + '_idsn2').val().length >= 20) {

								snakhir1 = parseFloat(Right($('#transaksi_' + v + '_idsn2').val().slice(0, -1), 7)).toFixed(0);
							} else {
								snakhir1 = parseFloat(Right($('#transaksi_' + v + '_idsn2').val(), 7)).toFixed(0);
							}
							if ($('#transaksi_' + v + '_idsn').val().length >= 20) {
								snawal1 = parseFloat(Right($('#transaksi_' + v + '_idsn').val().slice(0, -1), 7)).toFixed(0);
							} else {
								snawal1 = parseFloat(Right($('#transaksi_' + v + '_idsn').val(), 7)).toFixed(0);
							}
							var qty = Number(snakhir1 - snawal1) + Number(1)
							var datax = <?php echo json_encode($data) ?>;
							if (datax != "Not Found") {
								var data = datax[0]["data"];
								for (var i = 0; i < data.length; i++) {

									if (data[i]["iditem"] == hasil["data"][0]["iditem"]) {
										if (data[i]["qty"] < qty) {
											alert("Item SN Lebih");

										} else {
											for (var a = 0; a < snawal.length; a++) {
												if (snawal[a] == $('#transaksi_' + v + '_idsn').val()) {

													loop++;
													break;


												}
											}
											for (var a = 0; a < snakhir.length; a++) {
												if (snakhir[a] == $('#transaksi_' + v + '_idsn').val()) {

													loop++;
													break;

												}
											}

											for (var a = 0; a < snawal.length; a++) {
												if (snawal[a] == $('#transaksi_' + v + '_idsn2').val()) {

													loop++;
													break;

												}
											}
											for (var a = 0; a < snakhir.length; a++) {
												if (snakhir[a] == $('#transaksi_' + v + '_idsn2').val()) {

													loop++;
													break;

												}
											}

											if (loop == 0) {
												var long = Number($('#transaksi_' + v + '_idsn2').val() - $('#transaksi_' + v + '_idsn').val()) + Number(1)
												for (var x = 0; x < long; x++) {
													iditem.push(hasil["data"][0]["iditem"]);
												}

												const aCount = new Map([...new Set(iditem)].map(
													n => [n, iditem.filter(m => m === n).length]
												));
												console.log(aCount.get(hasil["data"][0]["iditem"]) + " > " + data[i]["qty"])
												console.log(i)
												if (Number(aCount.get(hasil["data"][0]["iditem"])) > Number(data[i]["qty"])) {
													lebih++

													alert("Product yang discan telah melebihi qty order");
													var long = Number($('#transaksi_' + v + '_idsn2').val() - $('#transaksi_' + v + '_idsn').val()) + Number(1)
													for (var x = 0; x < long; x++) {
														iditem.splice(-1);
													}
													console.log(iditem)


												} else {
													console.log(i + "A")


													if ($('#idpo').val() == "") {
														$('#idpo').val(hasil["data"][0]["idpo"]);
														$('#codepo').val(hasil["data"][0]["codepo"]);

														snawal.push($('#transaksi_' + v + '_idsn').val());
														snakhir.push($('#transaksi_' + v + '_idsn2').val());

														$('#snawal').val("");
														$('#snakhir').val("");
														$('#transaksi_' + v + '_expdate').val(hasil["data"][0]["expdate"])
														$('#transaksi_' + v + '_qty').val(qty)
														calc();


													} else {

														if ($('#idpo').val() != hasil["data"][0]["idpo"]) {
															alert("PO tidak Sama")
														} else {

															snawal.push($('#transaksi_' + v + '_idsn').val());
															snakhir.push($('#transaksi_' + v + '_idsn2').val());

															$('#snawal').val("");
															$('#snakhir').val("");
															$('#transaksi_' + v + '_expdate').val(hasil["data"][0]["expdate"])
															$('#transaksi_' + v + '_qty').val(qty)
															calc();
														}
													}



												}


											} else {
												var qty = Number($('#transaksi_' + v + '_idsn2').val() - $('#transaksi_' + v + '_idsn').val()) + Number(1)



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
									if (snawal[a] == $('#transaksi_' + v + '_idsn').val()) {

										loop++;
										break;


									}
								}
								for (var a = 0; a < snakhir.length; a++) {
									if (snakhir[a] == $('#transaksi_' + v + '_idsn').val()) {

										loop++;
										break;

									}
								}

								for (var a = 0; a < snawal.length; a++) {
									if (snawal[a] == $('#transaksi_' + v + '_idsn2').val()) {

										loop++;
										break;

									}
								}
								for (var a = 0; a < snakhir.length; a++) {
									if (snakhir[a] == $('#transaksi_' + v + '_idsn2').val()) {

										loop++;
										break;

									}
								}

								if (loop == 0) {
									// var long = Number( $('#transaksi_' + v + '_idsn2').val() -  $('#transaksi_' + v + '_idsn').val()) + Number(1)
									//       for (var x = 0; x < long; x++) {
									//           iditem.push(hasil["data"][0]["iditem"]);
									//       }

									//       const aCount = new Map([...new Set(iditem)].map(
									//       n => [n, iditem.filter(m => m === n).length]
									//    ));
									//    console.log(aCount.get(hasil["data"][0]["iditem"]) + " > "+ data[i]["qty"])
									//    console.log(i)
									//    if (Number(aCount.get(hasil["data"][0]["iditem"])) > Number(data[i]["qty"])) {
									//    	lebih++

									//       alert("Product yang discan telah melebihi qty order");
									//      var long = Number( $('#transaksi_' + v + '_idsn2').val() -  $('#transaksi_' + v + '_idsn').val()) + Number(1)
									//        for (var x = 0; x < long; x++) {
									//           iditem.splice(-1);
									//        }
									//       console.log(iditem)


									//    } 
									//    else
									//    {
									//    	console.log(i+"A")

									//    }
									console.log(i + "A")


									if ($('#idpo').val() == "") {
										$('#idpo').val(hasil["data"][0]["idpo"]);
										$('#codepo').val(hasil["data"][0]["codepo"]);
										$('#idsupp').val(hasil["data"][0]["idsupp"]);
										$('#namesupp').val(hasil["data"][0]["namesupp"]);



										snawal.push($('#transaksi_' + v + '_idsn').val());
										snakhir.push($('#transaksi_' + v + '_idsn2').val());

										$('#snawal').val("");
										$('#snakhir').val("");
										$('#transaksi_' + v + '_snid').val(hasil["data"][0]["snid"])
										$('#transaksi_' + v + '_expdate').val(hasil["data"][0]["expdate"])
										$('#transaksi_' + v + '_qty').val(qty)
										calc();


									} else {

										if ($('#idpo').val() != hasil["data"][0]["idpo"]) {
											alert("PO tidak Sama")
										} else {

											snawal.push($('#transaksi_' + v + '_idsn').val());
											snakhir.push($('#transaksi_' + v + '_idsn2').val());

											$('#snawal').val("");
											$('#snakhir').val("");
											$('#transaksi_' + v + '_expdate').val(hasil["data"][0]["expdate"])
											$('#transaksi_' + v + '_qty').val(qty)
											calc();
										}
									}


								} else {
									var qty = Number($('#transaksi_' + v + '_idsn2').val() - $('#transaksi_' + v + '_idsn').val()) + Number(1)



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


							}



						} else {
							alert("SN Ini tidak cocok dengan item yang dipilih")

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
		window.location.href = "<?php echo base_url('InOut/invinret') ?>";

	}

	function validasi() {
		var xval = 0;
		var sts = 1;
		xval = $("#qtyinret").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#iteminret").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}
		xval = $("#dateinret").val();
		if ($("#dateinret").val() == '') {
			alert('Input Tanggal');
			sts = 0;
			return false;
		}
		$('input[objtype=expdate]').each(function(i, obj) {

			xid = $(this).attr('id').replace("transaksi_", "").replace("_expdate", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				console.log($("#dateinret").val() + " " + $(this).val())
				if ($("#dateinret").val() >= $(this).val()) {
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
						//$( '#transaksi_'+xid+'_qty' ).val(1);
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
		if ($("#idinret").val() == '') {
			$.post("<?php echo base_url('InOut/updateinvinret') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Input Data Berhasil');
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
		} else {
			$.post("<?php echo base_url('InOut/updateinvinret') ?>", cx,
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
		var cx = $('#idinret').serialize();
		$.post("<?php echo base_url('InOut/deleteinvinret') ?>", cx,
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
			$("#idinret").val("<?php echo $idtrans ?>");
			$("#idpo").val("<?php echo $headertrans['idpo'] ?>");
			$("#codepo").val("<?php echo $headertrans['codepo'] ?>");
			$("#codeinret").val("<?php echo $headertrans['codeinret'] ?>");
			$("#idsupp").val("<?php echo $headertrans['idsupp'] ?>");
			$("#descinfo").val("<?php echo $headertrans['descinfo'] ?>");
			$("#dateinret").val("<?php echo $headertrans['dateinret'] ?>");
			$("#idwh").val("<?php echo $headertrans['idwh'] ?>");
			$("#qtyinret").val("<?php echo number_format($headertrans['qtyinret'], 0, '.', ',') ?>");
			$("#iteminret").val("<?php echo number_format($headertrans['iteminret'], 0, '.', ',') ?>");

			document.getElementById("dateinret").readOnly = true;
			document.getElementById("codepo").readOnly = true;
			document.getElementById("idwh").disabled = true;
			$('#addorder').hide();
			$('#delorder').hide();
			$('#cancelorder').hide();


			<?php if ($detailtrans != "Not Found") { ?>
				<?php $a = 0;
				foreach ($detailtrans as $key) : ?>
					add_row_transaksi(xid);
					xid = xid + 1;

					$("#transaksi_" + xid + "_iditem").val("<?php echo $key['iditem'] ?>");
					$("#transaksi_" + xid + "_sku").val("<?php echo $key['sku'] ?>");
					$("#transaksi_" + xid + "_nameitem").val("<?php echo $key['nameitem'] ?>");
					$("#transaksi_" + xid + "_snid").val("<?php echo $key['snid'] ?>");
					$("#transaksi_" + xid + "_expdate").val("<?php echo $key['expdate'] ?>");
					$("#transaksi_" + xid + "_idsn").val("<?php echo $key['idsn'] ?>");
					$("#transaksi_" + xid + "_idsn2").val("<?php echo $key['idsn2'] ?>");
					$("#transaksi_" + xid + "_qty").val("<?php echo number_format($key['qty'], 0, '.', ',') ?>");
					$("#transaksi_" + xid + "_idpodet").val("<?php echo number_format($key['idpodet'], 0, '.', ',') ?>");

					document.getElementById("transaksi_" + xid + "_sku").readOnly = true;
					document.getElementById("transaksi_" + xid + "_idsn").readOnly = true;
					document.getElementById("transaksi_" + xid + "_idsn2").readOnly = true;
					document.getElementById("transaksi_" + xid + "_action").disabled = true;
				<?php endforeach ?>
			<?php } ?>
		<?php } else { ?>
			add_row_transaksi(xid);
		<?php } ?>


	}

	function loadreq() {
		var xid = $('#idpo').val();
		$.post("<?php echo base_url('PrQuo/getpo?'); ?>", {
			id: xid
		}, function(result) {
			// alert(result);
			// var data = $.parseJSON(result);
			// alert(data.detailtrans[0]['iditem']);

			var data = $.parseJSON(result);
			console.log(data)
			if (data.headertrans != "Not Found") {
				$('#detailx').html('');
				$("#idpo").val(data.headertrans['idpo']);
				$("#codepo").val(data.headertrans['codepo']);
				$("#idsupp").val(data.headertrans['idsupp']);
				var supp = <?php echo json_encode($supplier) ?>;

				$("#datepo").val(data.headertrans['datepo']);
				//$( "#idwh" ).val(data.headertrans['idwh']);
				var xiddet = 0;
				var xlost = 0;
				if (data.detailtrans != "Not Found") {

					for (var xiddet2 = 0; xiddet2 < data.detailtrans.length; xiddet2++) {

						if (parseFloat(data.detailtrans[(xiddet2)]['qtyin']).toFixed(0) > 0) {
							add_row_transaksi(xiddet);
							xiddet = xiddet + 1;

							$('#transaksi_' + xiddet + '_idpodet').val(data.detailtrans[(xiddet + xlost - 1)]['idpodet']);
							$('#transaksi_' + xiddet + '_iditem').val(data.detailtrans[(xiddet + xlost - 1)]['iditem']);
							$('#transaksi_' + xiddet + '_sku').val(data.detailtrans[(xiddet + xlost - 1)]['sku']);
							$('#transaksi_' + xiddet + '_nameitem').val(data.detailtrans[(xiddet + xlost - 1)]['nameitem']);
							$('#transaksi_' + xiddet + '_qty').val(0);

							if (data.detailtrans[(xiddet + xlost - 1)]['usesn'] == 'N') {
								$('#transaksi_' + xiddet + '_expdate').val('9999-12-31');
								$('#transaksi_' + xiddet + '_idsn').val(0);
								$('#transaksi_' + xiddet + '_idsn2').val(0);
								document.getElementById("transaksi_" + xiddet + "_idsn").readOnly = true;
								document.getElementById("transaksi_" + xiddet + "_idsn2").readOnly = true;
								document.getElementById("transaksi_" + xiddet + "_qty").readOnly = false;
							} else {
								document.getElementById("transaksi_" + xiddet + "_idsn").readOnly = false;
								document.getElementById("transaksi_" + xiddet + "_idsn2").readOnly = false;
								document.getElementById("transaksi_" + xiddet + "_qty").readOnly = true;
							}
						} else {
							xlost = xlost + 1;
						}
					}
				}

			}
		});
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
			if ($("#idinret").val() == '') {
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
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		$(".datetrans").val(date);
		loaddata();
		if ($("#idinret").val() == '') {
			$("#delorder").hide();
			$("#addorder").html('Buat Transaksi');
		} else {
			$("#addorder").html('Ubah Transaksi');
		}
	});
</script>