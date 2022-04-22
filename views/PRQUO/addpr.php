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
	<form action="<?php echo base_url('PrQuo/addpr') ?>" method="POST" id="form">
		<div class="container-fluid text-white pt-3" style="background-color: orange;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">PURCHASE/Request/New Request</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">Tambah Request Baru</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row d-flex justify-content-between" style="margin-top: 2vh;padding-left:1rem">
				<div class="col bays p-4">
					<p style="font-size: 30px"><b>INFORMASI SUPPLIER</b></p>
					<hr style="height: 0.2%">
					<div class="row d-flex justify-content-between">
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Info Pesanan</b></p>
								<hr style="height: 2%; background: orange; opacity: 1">
							</div>
							<div class="mb-3">
								<label>Tanggal Transaksi</label>
								<input type="date" name="datepr" id="datepr" class="form-control datetrans" placeholder="Pilih Tanggal">
							</div>
							<div class="mb-3">
								<label>Supplier</label>
								<select class="form-control selectpicker" name="idsupp" id="idsupp" data-live-search="true">
									<option value="0" disabled selected>Pilih Supplier</option>
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
						<div class="col-6">
							<div class="mb-3">
								<p style="font-size: 20px"><b>Pembayaran, Diskon & VAT</b></p>
								<hr style="height: 2%; background: orange; opacity: 1">
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-6">
									<label>Mata Uang</label>
									<select class="form-select" name="idcurr" id="idcurr">
										<option value="0" disabled selected>Mata Uang</option>
										<?php
										if ($currency != 'Not Found' || !empty($currency)) {
											foreach ($currency as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>" xrate="<?php echo $key["attrib7"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
									<!--<input type="text" style="width:100px" name="kurs" id="kurs" class="form-control" placeholder="Kurs"> -->
								</div>
								<div class="col-6">
									<label>Metode Pembayaran</label>
									<select class="form-select" name="typepr" id="typepr">
										<option value="0" disabled selected> Pilih Metode Pembayaran</option>
										<?php
										if ($payment != 'Not Found' || !empty($payment)) {
											foreach ($payment as $key) : ?>
												<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
								</div>
							</div>
							<div class="row d-flex justify-content-between mb-3">
								<div class="col-5">
									<label>Jangka Waktu</label>
									<input type="text" name="period" id="period" value="0" class="form-control" placeholder="Tenor">
								</div>
								<div class="col-7">
									<label>VAT</label>
									<div class="d-flex">
										<div>
											<label class="switch">
												<input type="checkbox" checked name="isvat" id="isvat">
												<span class="slider round"></span>
											</label>
										</div>
										<p style="margin-left: 1vw;margin-top: 0.4vh;">Klik untuk on / off</p>
									</div>
								</div>
							</div>
							<!-- <div class="row d-flex justify-content-between mb-3">
								<div class="col-6">
									<label>Tipe Request</label>
									<select class="form-select" name="typereq" id="typereq">
										<option value="" disabled selected>Tipe Request</option>
										<option value="1">Supplier</option>
										<option value="2">Gudang Utama</option>
									</select>
								</div>
								<div class="col-6">
									<label>Status Request</label>
									<select class="form-select" name="statuspr" id="statuspr">
										<option value="" disabled selected>Status Request</option>
										<?php
										if ($status != 'Not Found' || !empty($status)) {
											foreach ($status as $key) : ?>
												<option value="<?php echo $key["codecomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
								</div>
							</div> -->
						</div>
					</div>
					<p class="mt-3" style="font-size: 30px;margin: 0"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<div class="ju" style="height: 28vh;">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="table" style="width: 100%;">
							<thead style="background: orange; color: white">
								<tr style="height:40px;text-align:center">
									<th style="width: 5%">#</th>
									<th style="width: 15%">SKU</th>
									<th style="width: 30%;">Nama Item</th>
									<th style="width: 10%">Qty</th>
									<th style=""></th>
									<th style="width: 20%">Sub Total</th>
									<th style="width: 15%">Action</th>
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
									<input type="text" name="itempr" id="itempr" value="0" class="form-control" readonly>
									<input type="hidden" name="qtypr" id="qtypr" value="0" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">Total Harga</p>
							<hr>
							<div class="row">
								<div class="col-8">
									<p>Sub Total</p>
								</div>
								<div class="col-4">
									<input type="text" name="subtotal" id="subtotal" value="0" class="form-control" readonly>
								</div>
							</div>
							<p style="margin-bottom: 0; font-size: 20px;color:#444444; margin-top: 10px">VAT</p>
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
							<div class="row">
								<div class="col-8">
									<p><b>Grand Total</b></p>
								</div>
								<div class="col-4">
									<input type="text" name="total" id="total" value="0" class="form-control" readonly>
								</div>
							</div>
							<button style="width: 100%; margin-top: 20px" class="btn btn-warning" id="addorder" onclick="addorder();">Buat Request</button>
							<button style="width: 100%; margin-top: 3px" class="btn btn-danger" id="cancelorder" onclick="cancelorder();">Batal Request</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>
<datalist id="xitem">
	<option value="" disabled selected>Select Item</option>
	<?php
	if ($item != 'Not Found' || !empty($item)) {
		foreach ($item as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>

<script type="text/javascript">
	$(function() {
		$('.selectpicker').selectpicker();
	});
	var xitem = '';
	xitem = '<?php
				$x = '<option value="" disabled selected>Select Item</option>';
				if ($item != 'Not Found' || !empty($item)) {
					foreach ($item as $key) {
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["priceitem"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	// $( document ).on( 'click', '.detail_transaksi', function() {

	// var str = $( this ).attr( 'id' );
	// if (Left(str,11)=='tambah-line'){
	// 	var num = str.replace( "tambah-line-transaksi-", "" );

	// 	// Change action
	// 	$( "#action"+str.replace( "tambah", "" ) ).html(
	// 		'<a href="#void()" class="tombol tombol-small hapus-line hapus-line-transaksi detail_transaksi" id="hapus-line-transaksi-'+num+'"><i class="icon-remove"></i></a>'
	// 	);

	// 	// Insert row
	// 	$( '#detailx' ).append(
	// 		add_row_transaksi( Number( str.replace( 'tambah-line-transaksi-', '' ) ))
	// 	);
	// 	setfocus(Number(num)+1,'id','transaksi');
	// }else if (Left(str,10)=='hapus-line'){
	// 	if( confirm( 'Anda yakin untuk menghapus baris ini?' ) ){
	// 		var str = $( this ).attr( 'id' );
	// 		var num = str.split('-')[3];
	// 		$( "#"+str.replace( "hapus-line-", "" ) ).remove();
	// 		setfocus(Number(num),'id','transaksi');
	// 	}
	// }
	// });

	$(document).on('keypress', '.sku', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			$('#transaksi_' + xid + '_qty').focus();
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

	$(document).on('keypress', '.price', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
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
			$('#transaksi_' + xid + '_subpr').val(0);
		} else {
			$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_price').val(formatnum(xobj.data('price')));
			if ($('#transaksi_' + xid + '_qty').val() == '0') {
				$('#transaksi_' + xid + '_qty').val(1);
			}
			var xqty = parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(",", "")).toFixed(0);
			var xprice = parseFloat($('#transaksi_' + xid + '_price').val().replaceAll(",", "")).toFixed(0);
			if (isNaN(xqty * xprice)) {
				$('#transaksi_' + xid + '_subpr').val(0);
			} else {
				$('#transaksi_' + xid + '_subpr').val(formatnum(xqty * xprice));
			}
		}
		calc();
	});

	// 	$( document ).on( 'change', '.sku', function() {
	// //		alert('s');
	// 		var xid = $( this ).attr( 'id' ).replace("transaksi_","").replace("_sku","");
	// 		//alert($( this ).attr( 'nameitem' ));
	// //		var filter=$( "#transaksi_"+ xid + "_sku" ).val();
	// 		var xobj =$( this ).find(':selected');
	// 		//alert(xobj.attr( 'nameitem' ));
	// 		if( $( this ).val()=="") {
	// 			//$('#transaksi_'+ xid +'_sku').val("");
	// 			$('#transaksi_'+ xid +'_iditem').val("");
	// 			$('#transaksi_'+ xid +'_nameitem').val("");
	// 			$('#transaksi_'+ xid +'_price').val(0);
	// 			$('#transaksi_'+ xid +'_qty').val(0);
	// 			$('#transaksi_'+ xid +'_subpr').val(0);
	// 		}else{
	// 			$('#transaksi_'+ xid +'_iditem').val($( this ).val());
	// 			//$('#transaksi_'+ xid +'_sku').val(data.sku);
	// 			$('#transaksi_'+ xid +'_nameitem').val(xobj.attr( 'nameitem' ));
	// 			$('#transaksi_'+ xid +'_price').val(formatnum(xobj.attr( 'price' )));
	// 			if($('#transaksi_'+ xid +'_qty').val()=='0'){
	// 				$('#transaksi_'+ xid +'_qty').val(1);
	// 			}
	// 			var xqty=parseFloat($('#transaksi_'+ xid +'_qty').val().replaceAll(",","")).toFixed(0);
	// 			var xprice=parseFloat($('#transaksi_'+ xid +'_price').val().replaceAll(",","")).toFixed(0);
	// 			if (isNaN(xqty*xprice)){
	// 				$('#transaksi_'+ xid +'_subpr').val(0);
	// 			}else{
	// 				$('#transaksi_'+ xid +'_subpr').val(formatnum(xqty*xprice));
	// 			}
	// 			//$('#transaksi_'+ xid +'_price').focus();
	// 		}
	// 		//$('#transaksi_'+ xid +'_price').select();
	// 		calc();
	// 	});

	// $( document ).on( 'change', '.sku', function() {
	// var xid = $( this ).attr( 'id' ).replace("transaksi_","").replace("_sku","");
	// var filter=$( "#transaksi_"+ xid + "_sku" ).val();
	// $.post( "<?php echo base_url('CommonMaster/getitembyskuname?'); ?>", { search: filter}, function( result ){
	// 	var data = $.parseJSON(result);
	// 		if( data=="Not Found") {
	// 			$('#transaksi_'+ xid +'_sku').val("");
	// 			$('#transaksi_'+ xid +'_iditem').val("");
	// 			$('#transaksi_'+ xid +'_nameitem').val("");
	// 			$('#transaksi_'+ xid +'_price').val(0);
	// 			$('#transaksi_'+ xid +'_qty').val(0);
	// 			$('#transaksi_'+ xid +'_subpr').val(0);
	// 		}else{
	// 			$('#transaksi_'+ xid +'_iditem').val(data.iditem);
	// 			$('#transaksi_'+ xid +'_sku').val(data.sku);
	// 			$('#transaksi_'+ xid +'_nameitem').val(data.nameitem);
	// 			$('#transaksi_'+ xid +'_price').val(formatnum(data.priceitem));
	// 			$('#transaksi_'+ xid +'_qty').val(1);
	// 			var xqty=parseFloat($('#transaksi_'+ xid +'_qty').val().replaceAll(",","")).toFixed(0);
	// 			var xprice=parseFloat($('#transaksi_'+ xid +'_price').val().replaceAll(",","")).toFixed(0);
	// 			if (isNaN(xqty*xprice)){
	// 				$('#transaksi_'+ xid +'_subpr').val(0);
	// 			}else{
	// 				$('#transaksi_'+ xid +'_subpr').val(formatnum(xqty*xprice));
	// 			}
	// 			//$('#transaksi_'+ xid +'_price').focus();
	// 		}
	// 		$('#transaksi_'+ xid +'_price').select();
	// 		calc();
	// });
	// });


	$(document).on('change', '.qty', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_qty", "");
		var xqty = parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(",", "")).toFixed(0);
		var xprice = parseFloat($('#transaksi_' + xid + '_price').val().replaceAll(",", "")).toFixed(0);
		if (isNaN(xqty * xprice)) {
			$('#transaksi_' + xid + '_subpr').val(0);
		} else {
			$('#transaksi_' + xid + '_subpr').val(formatnum(xqty * xprice));
		}
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
		calc();
	});

	$(document).on('change', '.price', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
		var xqty = parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(",", "")).toFixed(0);
		var xprice = parseFloat($('#transaksi_' + xid + '_price').val().replaceAll(",", "")).toFixed(0);
		if (isNaN(xqty * xprice)) {
			$('#transaksi_' + xid + '_subpr').val(0);
		} else {
			$('#transaksi_' + xid + '_subpr').val(formatnum(xqty * xprice));
		}
		if ($('#transaksi_' + xid + '_action').html() == '<b>+</b>') {
			$('#transaksi_' + xid + '_action').click();
		}
		$(this).val(formatnum($(this).val().replaceAll(',', '')));
		calc();
	});

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
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px;" id="transaksi-' + xid + '">';
		//tabel += '<td style="border:none"height:1px"><input style="width:50px;text-align:right" readonly type="text" id="transaksi_'+ xid +'_nourut"  class="form-control nourut" name="nourut" value="'+lastid+'"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="transaksi_' + xid + '_iditem" /></td>';
		//tabel += '<td style="border:none"height:1px"><input style="width:200px" type="text" id="transaksi_'+ xid +'_sku"  class="form-control sku" objtype="sku" name="transaksi_'+ xid +'_sku" value=""/></td>';
		//tabel += '<td style="border:none"height:1px"><select name="transaksi_'+ xid +'_sku" id="transaksi_'+ xid +'_sku" class="form-control sku" objtype="sku">'+ xitem +'</select></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center; wid" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" placeholder="Search" list="xitem" value=""></td>';
		tabel += '<td style="border:none"height:1px"><input type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="transaksi_' + xid + '_nameitem" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" type="text" id="transaksi_' + xid + '_qty"  class="form-control qty"name="transaksi_' + xid + '_qty" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" type="hidden" value="0" id="transaksi_' + xid + '_price"  class="form-control price"name="transaksi_' + xid + '_price" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_subpr"  class="form-control"name="transaksi_' + xid + '_subpr" value="0"/></td>';
		tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px;margin-left:35%;" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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
		var xtppn = 0;
		if ($('#isvat').is(":checked")) {
			xppn = 10;
		}
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xttl += parseFloat($('#transaksi_' + xid + '_subpr').val().replaceAll(',', ''));
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', ''));
			}
			//$(this).val(i+1);
		});
		xtppn = xttl * xppn / 100;
		$('#qtypr').val(formatnum(xqty));
		$('#itempr').val(formatnum(xcnt));
		$('#subtotal').val(formatnum(xttl));
		$('#ppn').val(formatnum(xppn));
		$('#ppntotal').val(formatnum(xtppn));
		$('#total').val(formatnum(xttl + xtppn));
	}

	function del_row_transaksi(xid) {
		// $('#transaksi_'+ xid +'_sku').val("");
		// $('#transaksi_'+ xid +'_nameitem').val("");
		// $('#transaksi_'+ xid +'_price').val(0);
		// $('#transaksi_'+ xid +'_qty').val(0);
		// $('#transaksi_'+ xid +'_subpr').val(0);
		calc();
		$('#transaksi-' + xid + '').remove();
		reorder();
	}


	//	alert("a");
	function back() {
		window.location.href = "<?php echo base_url('PrQuo/pr') ?>";
	}

	// function loading(filter){
	// $( ".transaksi-row" ).remove();
	// //var text = '<tr id="" class="loadnew"><td colspan="22">Loading...</td></tr>';
	// $( '#detailx' ).html( "" );
	// $.post( "<?php ''; //echo base_url('CommonMaster/listitem?');
				?>", { search: filter}, function( result ){
	// 	//alert(result);
	// 	var data = $.parseJSON(result);
	// 		var tabel = '';
	// 		if( data!="Not Found") {
	// 			var number2=0;
	// 			for( var i = 0; i < data.length; i++ ){
	// 				tabel += '<tr class="result transaksi-row" id="transaksi-'+data[i].iditem+'">';

	// 				tabel += '<td style="height:20px">'+ data[i].nameitem + '</br>SKU.' + data[i].sku +'</td>';
	// 				number2 = parseFloat(data[i].priceitem).toFixed(0);
	// 				tabel += '<td style="text-align:right">Rp.'+ formatnum(number2) +'</td>';
	// 				tabel += '</tr>';
	// 			}
	// 		}
	// 	$( '#detailx' ).html( tabel );
	// });
	// }



	function validasi() {
		var xval = $("#period").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '')) {
			alert('Input Period');
			return '';
		}
		xval = $("#itempr").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			return '';
		}
		xval = $("#qtypr").val();
		if (isNaN(xval.replaceAll(',', '')) || (xval == '0')) {
			alert('Input Produk');
			return '';
		}
		return 'ok';
	}
	//$( document ).on( 'click', '#addorder', function() {
	function addorder() {
		//$.post with jQuery
		var cx = $('#form').serialize();
		//alert(cx);
		$.post("<?php echo base_url('PrQuo/addpr') ?>", cx,
			function(data) {
				//Callback here
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			}
		);
		// var xres=validasi();
		// if (xres=='ok'){
		// }
	}
	//});

	$(document).on('focus', 'input', function() {
		$(this).select();
	});
	$('form button').on("click", function(e) {
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Request?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			if (confirm("Simpan Request?")) {
				addorder();
			}
		}

		e.preventDefault();
	});
	$(document).ready(function() {
		//loading('');
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + today.getDate();
		$(".datetrans").val(date);
		add_row_transaksi(0);
	});
</script>