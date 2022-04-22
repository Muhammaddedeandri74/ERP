<style type="text/css">
	#ju {
		overflow-x: auto;
		overflow-y: auto;
	}

	.header {
		width: 100vw;
		background: purple;
		position: fixed;
	}

	.right,
	.left {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.4);
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
	<form action="<?php echo base_url('PrQuo/updatepr') ?>" method="POST" id="form">

		<div class="header">
			<div class="header" style="height: 10vh; background: purple">
				<div class="row">
					<div class="col-1">
						<img src="<?php echo base_url('assets/img/arrow_back.png') ?>" style="margin: 20%" onclick="back()">
					</div>
					<div class="col" style="margin-top: 20px">
						<div class="row">
							<p style="color: white">PURCHASE/Request/Update Request</p>
						</div>
						<!-- <div class="row">
						<p><b style="color: white">FORM ORDER</b></p>
					</div> -->
					</div>
				</div>

			</div>
		</div>
		<input type="hidden" name="idpr" id="idpr">
		<input type="hidden" name="codepr" id="codepr">
		<div class="row" style="width: 100%;height:75%">
			<div class="col" style="padding-left: 32px; margin-right: 20px; margin-top: 20px;">
				<div class="left" style="padding-left: 25px; padding-top: 25px; padding-bottom: 25px;padding-right: 5%; margin-top: 10vh">
					<p style="font-size: 30px;margin: 0;height:20px"><b>INFORMASI SUPPLIER</b></p>
					<hr style="height: 0.2%">
					<div class="d-flex">
						<div style="width: 25%">
							<p style="margin: 0;font-size: 20px"><b>Info Pesanan</b></p>
							<hr style="height: 2%; background: purple; margin: 0">
							<p style="margin-top: 20px;margin-bottom: 0">Tanggal Transaksi</p>
							<input type="date" name="datepr" id="datepr" class="form-control datetrans" placeholder="Pilih Tanggal">
							<p style="margin-top: 20px;margin-bottom: 0">Supplier</p>
							<select class="form-control" name="idsupp" id="idsupp">
								<option value="0" disabled selected>Pilih Supplier</option>
								<?php
								if ($supplier != 'Not Found' || !empty($supplier)) {
									foreach ($supplier as $key) : ?>
										<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
								<?php endforeach;
								} ?>
							</select>
							<p style="margin-top: 20px;margin-bottom: 0">Attn / Contact</p>
							<input type="text" name="nopo" id="nopo" class="form-control" placeholder="Masukan Attend / Kontak Supplier">
						</div>
						<div style="margin-left: 10%; width: 30%">
							<p style="margin: 0;font-size: 20px"><b>Pembayaran, Diskon & VAT</b></p>
							<hr style="height: 2%; background: purple; margin: 0">
							<div class="d-flex" style="margin-top: 20px">
								<div style="margin-right: 10px;width:180px">
									<p style="margin-bottom: 0">Mata Uang</p>
									<select class="form-control" name="idcurr" id="idcurr">
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
								<div>
									<p style="margin-bottom: 0">Metode Pembayaran</p>
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
							</div>


							<div class="d-flex" style="margin-top: 20px">
								<div style="margin-right: 10px;width:180px">
									<p style="margin-bottom: 0">Jangka Waktu</p>
									<input type="text" style="width:100px" name="period" id="period" value="0" class="form-control" placeholder="Tenor">
								</div>
								<div>
									<p style="margin-bottom: 0">VAT</p>
									<div class="d-flex" style="margin-top: 5px">
										<div>
											<label class="switch">
												<input type="checkbox" checked name="isvat" id="isvat">
												<span class="slider round"></span>
											</label>
										</div>
										<div style="margin-left: 20px;width:130px">
											<p>Klik untuk on / off</p>
										</div>
									</div>
								</div>
							</div>

							<div class="d-flex" style="margin-top: 20px">
								<div style="margin-right: 10px;width:180px">
									<p style="margin-bottom: 0">Tipe Request</p>
									<select class="form-control" name="typereq" id="typereq">
										<option value="" disabled selected>Tipe Request</option>
										<option value="1">Supplier</option>
										<option value="2">Gudang Utama</option>
									</select>
								</div>
								<div style="margin-right: 10px;width:180px">
									<p style="margin-bottom: 0">Status Request</p>
									<select class="form-control" name="statuspr" id="statuspr">
										<option value="" disabled selected>Status Request</option>
										<?php
										if ($status != 'Not Found' || !empty($status)) {
											foreach ($status as $key) : ?>
												<option value="<?php echo $key["codecomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach;
										} ?>
									</select>
								</div>
							</div>
						</div>
					</div>

					<p style="margin-top: 20px; font-size: 30px;height:20px"><b>INFORMASI PRODUK</b></p>
					<hr style="height: 0.2%">
					<p style="height:10px">
						<b>Detail Product</b>
						<span style="float:right">
							<button type="button" onclick="alert('Hello world!')"><b>+Tambah Produk</b></button>
						</span>
					</p>
					<hr style="width: 110px;height: 5px; background: orange; margin: 0">


					<div class="table-wrapper span12 tab-pane active ju" style="height:330px;width:100%;font-family:'Tahoma'" id="ju">
						<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
						<table class="txable" style="margin-top: 10px;border-spacing:0;border-collapse: collapse;width:100%" cellspacing="100px" rowspacing="110px">
							<thead style="background: purple; color: white">
								<tr style="height:40px;text-align:center">
									<th style="width:20px">#</th>
									<th style="width:200px">SKU</th>
									<th>Nama Item</th>
									<th style="width:60px">Qty</th>
									<th style="width:100px">Harga</th>
									<th style="width:200px">Sub Total</th>
									<th style="width:25px">Action</th>
								</tr>
							</thead>
							<tbody id="detailx">

							</tbody>
						</table>
					</div>
					<!-- <div class="d-flex" style="margin-top: 50px">
					<p style="margin-bottom: 0">Jumlah Item : </p>
					<input type="text" name="" value="0" style="margin-left: 20px">
				</div> -->
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

						<button style="background: orange; width: 100%; color: white; margin-top: 20px" class="btn btn-warning" id="addorder" onclick="addorder();">Ubah Request</button>
						<button style="background: orange; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="delorder" onclick="delorder();">Delete Request</button>
						<button style="background: red; width: 100%; color: white; margin-top: 3px" class="btn btn-warning" id="cancelorder" onclick="cancelorder();">Batal Ubah</button>
					</div>




				</div>
			</div>
		</div>
	</form>

</body>

</html>


<script type="text/javascript">
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
			$('#transaksi_' + xid + '_price').focus();
			e.preventDefault();
		}
	});

	$(document).on('keypress', '.price', function(e) {
		if (e.keyCode == 13) {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
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

	$(document).on('change', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var xobj = $(this).find(':selected');
		if ($(this).val() == "") {
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_price').val(0);
			$('#transaksi_' + xid + '_qty').val(0);
			$('#transaksi_' + xid + '_subpr').val(0);
		} else {
			$('#transaksi_' + xid + '_iditem').val($(this).val());
			$('#transaksi_' + xid + '_nameitem').val(xobj.attr('nameitem'));
			$('#transaksi_' + xid + '_price').val(formatnum(xobj.attr('price')));
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


	$(document).on('change', '.price', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_price", "");
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

	$(document).on('change', '.qty', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_qty", "");
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
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
		//tabel += '<td style="border:none"height:1px"><input style="width:50px;text-align:right" readonly type="text" id="transaksi_'+ xid +'_nourut"  class="form-control nourut" name="nourut" value="'+lastid+'"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:50px;text-align:right" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="transaksi_' + xid + '_iditem" /></td>';
		//tabel += '<td style="border:none"height:1px"><input style="width:200px" type="text" id="transaksi_'+ xid +'_sku"  class="form-control sku" name="transaksi_'+ xid +'_sku" objtype="sku" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><select name="transaksi_' + xid + '_sku" id="transaksi_' + xid + '_sku" class="form-control sku" objtype="sku">' + xitem + '</select></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="transaksi_' + xid + '_nameitem" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100px;text-align:right" type="text" id="transaksi_' + xid + '_price"  class="form-control price"name="transaksi_' + xid + '_price" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:70px;text-align:right" type="text" id="transaksi_' + xid + '_qty"  class="form-control qty"name="transaksi_' + xid + '_qty" value="0"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:200px;text-align:right" readonly type="text" id="transaksi_' + xid + '_subpr"  class="form-control"name="transaksi_' + xid + '_subpr" value="0"/></td>';
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
		$('input[name=nourut]').each(function(i, obj) {
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
		$('select[objtype=sku]').each(function(i, obj) {
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
		$('#transaksi-' + xid + '').remove();
		reorder();
	}


	//	alert("a");
	function back() {
		window.location.href = "<?php echo base_url('PrQuo/po') ?>";
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
		xval = $("#itempr").val();
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
		alert(cx);
		$.post("<?php echo base_url('PrQuo/updatepr') ?>", cx,
			function(data) {
				//Callback here
				if (data == 'Success') {
					alert('Ubah Data Berhasil');
					back();
				} else {
					alert('Ubah Data Gagal. ' + data);
				}
			}
		);
		// var xres=validasi();
		// if (xres=='ok'){
		// }
	}
	//});

	function delorder() {
		var cx = $('#idpr').serialize();
		$.post("<?php echo base_url('PrQuo/deletepr') ?>", cx,
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

	$(document).on('focus', 'input', function() {
		$(this).select();
	});
	$('form button').on("click", function(e) {
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Ubah?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			if (confirm("Ubah Request?")) {
				addorder();
			}
		} else if ($(this).attr('id') == 'delorder') {
			if (confirm("Hapus Request?")) {
				delorder();
			}
		}

		e.preventDefault();
	});

	function loaddata() {
		alert('');
		$("#idpr").val("<?php echo $idtrans ?>");
		$("#codepr").val("<?php echo $headertrans['codepr'] ?>");
		$("#idsupp").val("<?php echo $headertrans['idsupp'] ?>");
		$("#idcurr").val("<?php echo $headertrans['idcurr'] ?>");
		$("#attn").val("<?php echo $headertrans['attn'] ?>");
		$("#datepr").val("<?php echo $headertrans['datepr'] ?>");
		$("#typepr").val("<?php echo $headertrans['typepr'] ?>");
		$("#typereq").val("<?php echo $headertrans['typereq'] ?>");
		$("#statuspr").val("<?php echo $headertrans['statuspr'] ?>");
		$("#period").val("<?php echo number_format($headertrans['period'], 0, '.', ',') ?>");
		$("#qtypr").val("<?php echo number_format($headertrans['qtypr'], 0, '.', ',') ?>");
		$("#itempr").val("<?php echo number_format($headertrans['itempr'], 0, '.', ',') ?>");
		$("#subtotal").val("<?php echo number_format($headertrans['subtotal'], 0, '.', ',') ?>");
		$("#ppn").val("<?php echo number_format($headertrans['ppn'], 0, '.', ',') ?>");
		if ($("#ppn").val() == '0') {
			$("#isvat").attr('checked', false);
		} else {
			$("#isvat").attr('checked', true);
		}
		$("#ppntotal").val("<?php echo number_format($headertrans['ppntotal'], 0, '.', ',') ?>");
		$("#total").val("<?php echo number_format($headertrans['totalpr'], 0, '.', ',') ?>");
		var xid = 0;
		<?php if ($detailtrans != "Not Found") { ?>
			<?php $a = 0;
			foreach ($detailtrans as $key) : ?>
				//xid	=<?php echo $a; //$key['nourut'] 
							?>;
				add_row_transaksi(xid);
				xid = xid + 1;
				$("#transaksi_" + xid + "_iditem").val("<?php echo $key['iditem'] ?>");
				$("#transaksi_" + xid + "_sku").val("<?php echo $key['iditem'] ?>");
				//$("#transaksi_"+ xid +"_sku").val("<?php echo $key['sku'] ?>");
				$("#transaksi_" + xid + "_nameitem").val("<?php echo $key['nameitem'] ?>");
				$("#transaksi_" + xid + "_price").val("<?php echo number_format($key['price'], 0, '.', ',') ?>");
				$("#transaksi_" + xid + "_qty").val("<?php echo number_format($key['qty'], 0, '.', ',') ?>");
				$("#transaksi_" + xid + "_subpr").val("<?php echo number_format($key['subpr'], 0, '.', ',') ?>");
			<?php endforeach ?>
			calc();
		<?php } ?>
		add_row_transaksi(xid);

	}
	$(document).ready(function() {
		//loading('');
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + today.getDate();
		$(".datetrans").val(date);
	});
	loaddata();
</script>