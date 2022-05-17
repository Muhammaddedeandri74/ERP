<html>

<head>

	<!-- Link Font dari adobe -->
	<link rel="stylesheet" href="https://use.typekit.net/vke3pqz.css">
	<!-- Link Box Icon -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css"> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>
	<title>S-ERP</title>
</head>
<?php
$idnew;
if ($data3 != "Not Found") {
	foreach ($data3 as $key) {
		$idnew = $key["codepo"];
		$idnew++;
	}
} else {
	$idnew = "PO-TRS-001";
}
?>

<body class="body">
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
				</div>
				<div class="modal-body">
					<div class="row mx-3">
						<div class="col-3 mb-3">
							<label for="">Pencarian</label>
							<input type="text" class="form-control" placeholder="Cari berdasarkan customer">
						</div>
						<div class="col-2"></div>
						<div class="col-2">
							<label for="">Mulai Dari</label>
							<input type="date" name="tanggalmasuk" class="form-control">
						</div>
						<div class="col-2">
							<label for="">Sampai Dengan</label>
							<input type="text" name="tanggalmasuk" class="form-control">
						</div>
						<div class="col-2 mt-4">
							<button type="button" class="btn btn-primary">Terapkan</button>
						</div>
					</div>
					<div class="row mx-3" style="overflow-x: auto;">
						<table class="table table-bordered table-striped" id="table-user">
							<thead>
								<tr>
									<td>#</td>
									<td>No. PO</td>
									<td>Tanggal Order</td>
									<td>Due Date</td>
									<td>Qty Item</td>
									<td>Total Amount</td>
									<td>Status</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php if ($data4 != "Not Found") : ?>
									<?php $no = 1; ?>
									<?php foreach ($data4 as $key) : ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $key["codepo"] ?></td>
											<td><?php echo $key["datepo"] ?></td>
											<td><?php echo $key["datepo"] ?></td>
											<td><?php echo $key["qty"] ?></td>
											<td><?php echo $key["grandtotal"] ?></td>
											<td><?php echo $key["statuspo"] ?></td>
											<td><a href="<?php echo base_url('MasterDataControler/getdatapobyid?id=' . base64_encode($key['idpo'])) ?>">Pilih</a></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
		<div class="header px-4 pt-2" style="height: 196px;">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management </a></li>
					<li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Order</li>
				</ol>
				<h3 class="text-white">Register Purchase Order</h3>
			</nav>
		</div>
		<div class="content bg-white  mx-4">
			<div class="container-fluid">
				<div class="row no-gutters">
					<div class="col-12 bays">
						<div class="biodata">
							<div class="row">
								<?php echo $this->session->flashdata('message'); ?>
								<?php $this->session->set_flashdata('message', ''); ?>
							</div>
							<input type="hidden" name="idpo" id="idpo">
							<input type="hidden" name="codepo" id="codepo">
							<div class="row">
								<div class="col-3">
									<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
										<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-1"></div>
								<div class="col-3 mb-3">
									<h5>Informasi Dasar</h5>
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<label for="">No. Purchase Order</label>
											<input type="text" name="codepo" class="form-control" value="<?php echo $idnew ?>" readonly>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
											<input type="hidden" name="idpo" class="form-control">
										</div>
									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<label for="">No. Request PO</label>
											<input type="text" name="aa" class="form-control" value="" readonly>
										</div>
										<!-- <button type="button" style="height:36px;font-size:13px;" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Cari Data</button> -->
									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-2" style="width:75%;">
											<label for="">Supplier</label>
											<select class="form-control selectpicker" name="supplier" id="supplier" data-live-search="true" required onchange="supp(this.value)">
												<option>Pilih Supplier</option>
												<?php
												if ($data5 != 'Not Found' || !empty($data5)) {
													foreach ($data5 as $key) : ?>
														<option value="<?php echo $key["idcust"] ?>"><?php echo $key["namecust"] ?></option>
												<?php endforeach;
												} ?>
											</select>
										</div>
										<!-- &nbsp;&nbsp;<button class="btn btn-primary" style="height:36px;font-size:13px;">Cari Data</button> -->
									</div>
								</div>

								<div class="col-4">
									<h5>Informasi Gudang & Mata Uang </h5>
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:50%;">
											<label for="">Tanggal PO</label>
											<input type="date" name="datepo" id="datepo" style="cursor: pointer;" class="form-control">
										</div>
										<div class="" style=" width:50%;">
											<label for="">Tanggal Pengiriman</label>
											<input type="date" name="delivedate" id="delivedate" value="" style="cursor: pointer;" class="form-control">
										</div>
									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:50%;">
											<label for="">Mata Uang</label>
											<select name="matauang" id="matauang" class="form-select" required>
												<option value="">Pilih</option>
												<?php if ($data2 != "Not Found") : ?>
													<?php foreach ($data2 as $key) : ?>
														<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>

										</div>
										<div class="" style="width:50%;">
											<label for="">Exchange Rate</label>
											<input type="text" name="exchange" id="exchange" value="" style="cursor: pointer;" class="form-control" autocomplete="off">
										</div>
									</div>
									<div class="me-3" style="width:100%;">
										<label for="">Judul Purchase</label>
										<textarea name="judulpurchase" id="" cols="7" rows="4" class="form-control" placeholder="Contoh : Penawaran PT. ABC" style="font-size:13px;"></textarea>
									</div>
								</div>
								<div class="col-3">
									<h5>Akun Perbankan</h5>
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<label for="">Pilih Akun </label>
											<select name="norekening" id="norekening" class="form-select" required>
												<option value="">Pilih</option>
												<?php if ($data5 != "Not Found") : ?>
													<?php foreach ($data5 as $key) : ?>
														<option value="<?php echo $key["norekening"] ?>"><?php echo $key["norekening"] ?> - <?php echo $key["namabank"] ?></option>
													<?php endforeach ?>
												<?php endif ?>
											</select>
										</div>
									</div>

									<div class="d-flex" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<div class="me-3 mb-3" style="width:fit-content;;">
												<h5>Pajak</h5>
											</div>
											<label for="">Gunakan VAT</label>
										</div>
										<div class="form-check form-switch">
											<input type="checkbox" name="vat" value="1" class="form-check-input" id="check" checked>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-1">
						</div>
						<div class="col-12">
							<h5>Item/Produk</h5>
							<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
							<table class="table m-0">
								<thead>
									<tr>
										<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
										<th style="background:#1143d8;color:white;text-align:center;">Nama Item</th>
										<th style="background:#1143d8;color:white;text-align:center;">Deskripsi</th>
										<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Harga</th>
										<!-- <th style="background:#1143d8;color:white;text-align:center;width:7.25rem;">VAT</th> -->
										<th style="background:#1143d8;color:white;text-align:center;width:7.25rem;">Qty</th>
										<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Total</th>
										<th style="background:#1143d8;color:white;text-align:center;width:7.25rem;">Disc Nominal</th>
										<th style="background:#1143d8;color:white;text-align:center;width:5.25rem;">Disc Persen</th>
										<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Grand Total</th>
										<th style="background:#1143d8;color:white;text-align:center;">Action</th>
									</tr>
								</thead>
								<tbody id="detailx">

								</tbody>
							</table>
							<div class="row rounded me-1" style="justify-content: end;">
								<div class="col-2  py-3" style="text-align: end;background:#E6ECFF; width:fit-content">
									<!-- <p>DPP</p> -->
									<p>Subtotal</p>
									<p>Discount Nominal</p>
									<p>Discount Persen</p>
									<p>Total Setelah Diskon</p>
									<p>VAT</p>
									<p>Grand Total</p>
								</div>
								<div class="col-2  py-3" style="text-align: end;background:#E6ECFF;">
									<!-- <input type="text" name="dpp" id="dpp" value="0" class="form-control" readonly> -->
									<input type="text" name="subtotal" id="subtotal" value="0" class="form-control" readonly>
									<input type="number" name="disglob" id="disnoms" value="0" class="form-control" oninput="calc()">
									<input type="number" name="dispers" id="disper" value="0" class="form-control" oninput="calc()">
									<input type="text" name="totaldisc" id="totaldisc" value="0" class="form-control" readonly>
									<input type="text" name="vat" id="vat" value="0" class="form-control" readonly>
									<input type="text" name="grandtotal" id="grandtotal" value="0" class="form-control" readonly>
								</div>
							</div>
							<div class="mr-4 mt-3" style="text-align:right;">
								<!-- <button type="button" class="btn btn-secondary" style="font-size:13px;" onclick="window.print()">Print</button> -->
								<button type="button" class="btn btn-primary" style="font-size:13px;" id="addorder" onclick="addorder()">Buat Transaksi</button>
							</div>
						</div>
					</div>
				</div>
			</div>
	</form>
	<datalist id="xitem">
		<?php
		if ($data != 'Not Found') {
			foreach ($data as $key) {
		?>
				<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
		<?php }
		} ?>
	</datalist>
</body>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js ') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script type="text/javascript">
	// $(function() {
	// 	$('.selectpicker').selectpicker();
	// });

	$(function() {
		$("#check").click(function() {
			if ($(this).is(":checked")) {
				$("#check").val(1);
			} else {
				$("#check").val(0);
			}
			calc();
		});
	});

	function supp(x) {
		var data = <?php echo json_encode($data5) ?>;
		for (let i = 0; i < data.length; i++) {
			if (data[i]["idcust"] == x) {
				$('#norekening').val(data[i]["norekening"], data[i]["namabank"])
			}

		}
	}

	add_row_transaksi(0)
	var xitem = '';
	xitem = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["price"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	var xunit = '';
	xunit = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '">' . $key["nameitem"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
			}
		});
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

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#uimg')
					.attr('src', e.target.result)
					.width(412)
					.height(309);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / >';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="discountpersent(' + xid + ',this.value)" ></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_grandtotal" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_grandtotal[]' + xid + '_grandtotal"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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

	function discountpersent(disc, disc1) {
		if (disc1 > 100) {
			$('#transaksi_' + disc + '_discpersen').val(100);
			alert("Maaf Angka terlalu banyak");

		} else if (disc1 < 1) {
			$('#transaksi_' + disc + '_discpersen').val(0);
			alert("Masukan Discount");
		}

	}



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
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_harga').val();
			$('#transaksi_' + xid + 'qty').val(0);
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('price'));
			$('#transaksi_' + xid + 'qty').val(xobj.data('qty'));
		}
		calc();
	});

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			if ($("#idpo").val() == "") {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addorder();
				}
			}
		}
		e.preventDefault();
	});

	function validasi() {
		var xval = 0;
		var sts = 1;

		xval = $("#supplier").val();
		if (xval == "") {
			alert('Input Supplier');
			sts = 0;
			return false;
		}

		xval = $("#namewarehouse").val();
		if (xval == "") {
			alert('Input Gudang Penerima');
			sts = 0;
			return false;
		}

		xval = $("#datepo").val();
		if ($("#datepo").val() == '') {
			alert('Input Tanggal Masuk');
			sts = 0;
			return false;
		}

		xval = $("#mataung").val();
		if ($("#matauang").val() == '') {
			alert('Input Matauang');
			sts = 0;
			return false;
		}

		xval = $("#_qty").val();
		if ($("#_qty").val() == 0) {
			alert('Input QTY');
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

	function count(xid) {
		var harga = $('#transaksi_' + xid + '_harga').val();
		var qty = $('#transaksi_' + xid + '_qty').val();
		var disnom = $('#transaksi_' + xid + '_discnominal').val();
		var disper = $('#transaksi_' + xid + '_discpersen').val();
		var totals = parseFloat(harga.replaceAll(".", "") * qty);
		var grandtot = parseFloat(harga.replaceAll(".", "") * qty - disnom);

		$('#transaksi_' + xid + '_total').val(totals);
		$('#transaksi_' + xid + '_grandtotal').val(grandtot);

		calc();

	}

	function calc() {
		var xttl = 0;
		var dpp = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xttl += parseFloat($('#transaksi_' + xid + '_grandtotal').val().replaceAll(',', ''));
				dpp += parseFloat($('#transaksi_' + xid + '_harga').val().replaceAll('.', '') * $('#transaksi_' + xid + '_qty').val());
				totaldisc = xttl - $('#disnoms').val();

				if ($("#check").val() == 1) {
					vat = totaldisc * 11 / 100;
				} else {
					vat = 0;
				}

				totaldisc = xttl - $('#disnoms').val();
				grandtot = totaldisc + vat;

			}

		});



		$('#dpp').val(formatnum(dpp));
		$('#subtotal').val(formatnum(xttl));
		$('#totaldisc').val(formatnum(totaldisc));
		$('#vat').val(formatnum(vat));
		$('#grandtotal').val(formatnum(grandtot));

	}

	function addorder() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addpo') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			});
	}

	function cancelorder() {
		location.reload();
	}
</script>