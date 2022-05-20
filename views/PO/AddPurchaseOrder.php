<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Latest compiled and minified CSS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
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
	$idnew = "PO-TRS-1";
}
?>

<body class="body">
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">List Purchase Order</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<input type="hidden" name="idcust" id="idcust">
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
											<option value="codepo">No.Po</option>
										</select>
										<input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
									</div>
								</div>
								<div class="col-4">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statuspo" aria-label="Default select example">
										<option value="">Pilih Status Quotation</option>
										<option value="Waiting">Waiting</option>
										<option value="Process">Process</option>
										<option value="Finish">Finish</option>
										<option value="Cancel">Cancel</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-1"></div>
						<div class="col-5">
							<div class="row">
								<div class="col-4">
									<label for="" class="form-label">Mulai Dari</label>
									<input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
								</div>
								<div class="col-4">
									<p></p>
									<a href="#" class="btn btn-primary mt-3" onclick="loaddata()">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table">
								<thead>
									<tr>
										<th>No. Request</th>
										<th>Tgl Request</th>
										<th>Due Date</th>
										<th>Qty Item</th>
										<th>Total Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailx">
								</tbody>
							</table>
						</div>
					</div>
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
											<input type="text" name="codepo" id="codepo" class="form-control" value="<?php echo $idnew ?>" readonly>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
											<input type="hidden" name="idpo" id="idpo" class="form-control">
										</div>
										<button type="button" style="height:36px;font-size:12px;" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="loaddata()">Cari Data</button>

									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<label for="">No. Request PO</label>
											<input type="text" name="norequestpo" id="onclick=" printDiv('quot')" data-dismiss="modal"" class=" form-control" value="" readonly>
										</div>
										<!-- <button type="button" style="height:36px;font-size:12px;" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="loaddata()">Cari Data</button> -->
									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-2" style="width:75%;">
											<label for="">Supplier</label>
											<input type="text" id="namesupp" class="form-control" objectype="supp" list="xsupp" name="namesupp" autocomplete="off" required>
											<input type="hidden" id="idsupp" name="idsupp">
										</div>
										<!-- &nbsp;&nbsp;<button class="btn btn-primary" style="height:36px;font-size:13px;">Cari Data</button> -->
									</div>
								</div>

								<div class="col-4">
									<h5>Informasi Gudang & Mata Uang </h5>
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:50%;">
											<label for="">Tanggal PO</label>
											<input type="date" name="datepo" id="date1" style="cursor: pointer;" class="form-control">
										</div>
										<div class="" style=" width:50%;">
											<label for="">Tanggal Pengiriman</label>
											<input type="date" name="delivedate" id="tanggalpengiriman" value="" style="cursor: pointer;" class="form-control">
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
										<textarea name="judulpurchase" id="judulpurchase" cols="7" rows="4" class="form-control" placeholder="Contoh : Penawaran PT. ABC" style="font-size:13px;"></textarea>
									</div>
								</div>
								<div class="col-3">
									<h5>Akun Perbankan</h5>
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:75%;">
											<label for="">Pilih Akun </label>
											<select name="norekening" id="norekening" class="form-select" required>
												<option value="">Pilih</option>
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
							<table class="table table-bordered table-striped list-akses" id="table-user">
								<thead>
									<tr>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sku</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Nama Item</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Discount Percent</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Discount Nominal</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sub Total</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total Discount</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Grand Total</td>
										<td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
									</tr>
								</thead>
								<tbody id="detail">

								</tbody>
							</table>
							<div class="row">
								<div class="col-8"></div>
								<div class="col-4">
									<div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
										<div class="row">
											<div class="col-6">
												<p>Sub Total</p>
											</div>
											<div class="col-6">
												<input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<p>Discount Nominal</p>
											</div>
											<div class="col-6">
												<input type="number" class="form-control" id="disnom" name="disnoms" value="0" oninput="calc()">
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<p>Total Setelah Diskon</p>
											</div>
											<div class="col-6">
												<input type="text" class="form-control" id="distotal" name="distotal" readonly>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<p>PPN</p>
											</div>
											<div class="col-6">
												<input type="text" class="form-control" id="ppn" name="ppn" readonly>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<p>Grand Total</p>
											</div>
											<div class="col-6">
												<input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mr-4 mt-3" style="text-align:right;">
								<button type="submit" class="btn btn-primary" id="addorder" onclick="addorder()" style="font-size:13px;">Simpan</button>
								<button type="button" class="btn btn-primary" id="cancel" style="display: none;" onclick="cancelorder()">Cancel</button>
								<!-- <button type="button" class="btn btn-primary" style="font-size:13px;" id="addorder" onclick="addorder()">Buat Transaksi</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
	</form>

</body>
<datalist id="xsupp">
	<?php
	if ($data5 != 'Not Found' || !empty($data5)) {
		foreach ($data5 as $key) {
	?>
			<option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
	<?php }
	} ?>
</datalist>

<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function loaddata() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/getlistpo') ?>",
			data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statuspo=" + $('#statuspo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
			dataType: "JSON",
			success: function(hasil) {


				var baris = ""
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {


						baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
											<td> 1 </td>
                                            <td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpo(` + hasil[i]["idpo"] + `)">Pilih</a></td>
                                        </tr>`
					}


				}
				$('#detailx').html(baris)
			}

		});
	}

	function detailpo(x) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/detailpo') ?>",
			data: "idpo=" + x,
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				$('#namesupp').val(hasil["namecust"]);
				$('#date1').html(hasil["delivaddr"]);
				$('#tanggalpengiriman').val(hasil["delivedate"]);
				$('#matauang').val(hasil["idcurr"]);
				$('#exchange').val(hasil["exchange"]);
				$('#judulpurchase').val(hasil["deskripsi"]);
				$('#norekening').val(hasil["norek"]);
				$('#vat').val(hasil["vat"]);
				$('#action').show();
				$('#detail').html("")
				var val = hasil["namecust"];
				var xobj = $('#xsupp option').filter(function() {
					return this.value == val;
				});

				if ((val == "") || (xobj.val() == undefined)) {
					$('#idsupp').val("");
					$('#norekening').val("");
				} else {

					$('#idsupp').val(xobj.data('idsupp'));
					$('#norekening').val(xobj.data('norekening'));
				}

				for (let i = 0; i < hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1);
					$('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});

					if ((val == "") || (xobj.val() == undefined)) {

						$('#transaksi_' + xid + '_iditem').val("");
						$('#transaksi_' + xid + '_nameitem').val("");
						$('#transaksi_' + xid + '_harga').val("");
						$('#transaksi_' + xid + '_qty').val("");
						$('#transaksi_' + xid + '_discpercent').val("");
						$('#transaksi_' + xid + '_disnom').val("");
						$('#transaksi_' + xid + '_totaldisc').val("");
						$('#transaksi_' + xid + '_total').val("");
						$('#transaksi_' + xid + '_sub').val("");

						document.getElementById('transaksi_' + xid + '_qty').enable = true;
						document.getElementById('transaksi_' + xid + '_harga').enable = true;
						document.getElementById('transaksi_' + xid + '_discpercent').enable = true;
						document.getElementById('transaksi_' + xid + '_disnom').enable = true;
					} else {
						cal();
						$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
						$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
						$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
						$('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
						$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
						$('#transaksi_' + xid + '_discpercent').val(0);
						$('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnom"]);
						$('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["qty"] * hasil["data"][i]["disnom"]);
						$('#transaksi_' + xid + '_sub').val(hasil["data"][i]["qty"] * hasil["data"][i]["price"]);
						$('#transaksi_' + xid + '_total').val(hasil["data"][i]["qty"] * hasil["data"][i]["price"]);

						document.getElementById('transaksi_' + xid + '_action').disabled = true;
						document.getElementById('transaksi_' + xid + '_sku').readOnly = true;


					}
					calc();
					document.getElementById('codepo').enable = true;
					document.getElementById('namesupp').enable = true;
					document.getElementById('date1').enable = true;
					document.getElementById('tanggalpengiriman').enable = true;
					document.getElementById('matauang').enable = true;
					document.getElementById('exchange').enable = true;
					document.getElementById('tanggalpengiriman').enable = true;
					document.getElementById('judulpurchase').enable = true;
					document.getElementById('norekening').enable = true;
					$('#simpan').hide()
					if (hasil["statuspo"] == "Waiting") {
						$('#cancel').show()
					} else {
						$('#cancel').hide()
					}

				}

			}
		});
	}

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

	$(document).keypress(function(e) {
		if (e.which == 13) {
			e.preventDefault();
		}
	});

	$(document).on('input', '#namesupp', function() {
		var val = $(this).val();
		var xobj = $('#xsupp option').filter(function() {
			return this.value == val;
		});

		if ((val == "") || (xobj.val() == undefined)) {
			$('#idsupp').val("");
			$('#norekening').val("");
		} else {

			$('#idsupp').val(xobj.data('idcust'));
			// $('#norekening').val(xobj.data('norekening'));
			var data = <?php echo json_encode($data5) ?>;
			for (let i = 0; i < data.length; i++) {

				if (data[i]["idcust"] == xobj.data('idcust')) {
					var baris = '<option value="">Pilih</option>'
					for (let b = 0; b < data[i]["data"].length; b++) {

						baris += `<option value="` + data[i]["data"][b]["norekening"] + `">` + data[i]["data"][b]["norekening"] + ` - ` + data[i]["data"][b]["beneficiary"] + ` ( ` + data[i]["data"][b]["namabank"] + ` ) </option>`
					}
					$('#norekening').html(baris)
				}


			}
		}
	});

	add_row_transaksi(0)

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
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_discpercent" oninput="discx(' + xid + ')"  class="form-control"name="discpercent[]" value="" oninput="discp(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_disnom" oninput="discxx(' + xid + ')"  class="form-control"name="disnom[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_sub"  class="form-control"name="sub[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_totaldisc"  class="form-control"name="totaldisc[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';

		tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detail').append(tabel);
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



	$(document).on('input', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {

			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_harga').val("");
			$('#transaksi_' + xid + '_qty').val("");
			$('#transaksi_' + xid + '_discpercent').val("");
			$('#transaksi_' + xid + '_disnom').val("");
			$('#transaksi_' + xid + '_totaldisc').val("");
			$('#transaksi_' + xid + '_total').val("");
			$('#transaksi_' + xid + '_sub').val("");

			document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
			document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
			document.getElementById('transaksi_' + xid + '_discpercent').readOnly = true;
			document.getElementById('transaksi_' + xid + '_disnom').readOnly = true;
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('price'));
			$('#transaksi_' + xid + '_qty').val(1);
			$('#transaksi_' + xid + '_discpercent').val(0);
			$('#transaksi_' + xid + '_disnom').val(0);
			$('#transaksi_' + xid + '_totaldisc').val(0);
			$('#transaksi_' + xid + '_total').val(xobj.data('price'));
			$('#transaksi_' + xid + '_sub').val(xobj.data('price'));

			document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
			document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
			document.getElementById('transaksi_' + xid + '_discpercent').readOnly = false;
			document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
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

		xval = $("#qty").val();
		if ((xval == '0')) {
			alert('Input Produk');
			sts = 0;
			return false;
		}

		xval = $("#tanggalpengiriman").val();
		if ($("#tanggalpengiriman").val() == "") {
			alert('Input Tangal Pengiriman ');
			sts = 0;
			return false;
		}

		xval = $("#mataung").val();
		if ($("#matauang").val() == '') {
			alert('Input Matauang');
			sts = 0;
			return false;
		}

		xval = $("#exchange").val();
		if ($("#exchange").val() == '') {
			alert('Input Exchange Rate');
			sts = 0;
			return false;
		}

		if (sts == 1) {
			return true;
		} else {
			return false;
		}
	}

	function cal(x) {
		console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b " +
			$('#transaksi_' + x + '_disnom').val() + " c " + $('#transaksi_' + x + '_disnom').val() + " d ")
		$('#transaksi_' + x + '_sub').val($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val())
		$('#transaksi_' + x + '_totaldisc').val($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_disnom').val())
		$('#transaksi_' + x + '_total').val($('#transaksi_' + x + '_sub').val() - $('#transaksi_' + x + '_totaldisc').val())
		calc();
	}

	function discx(xid) {

		console.log($('#transaksi_' + xid + '_discpercent').val() + " " + xid)
		$('#transaksi_' + xid + '_disnom').val($('#transaksi_' + xid + '_harga').val() * $('#transaksi_' + xid + '_discpercent').val() / 100);
		cal(xid)
	}

	function discxx(xid) {
		$('#transaksi_' + xid + '_discpercent').val(0)
		cal(xid)
	}

	function calc() {
		var xttl = 0;
		var dpp = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll(',', ''));

			}

		});



		if ($("#check").is(":checked") == true) {
			vat = (xttl - $('#disnom').val()) * 11 / 100;
		} else {
			vat = 0;
		}
		disctotal = (xttl - $('#disnom').val());
		grandtot = Number((xttl - $('#disnom').val())) + Number(vat)

		$("#ppn").val(formatnum(vat))
		$("#subtotal").val(formatnum(xttl))
		$("#distotal").val(formatnum(disctotal))
		$("#grandtotal").val(formatnum(grandtot))

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

	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		if ($("#date1").val() == '') {
			$("#date1").val(date);
		}
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
		if ($("#date2").val() == '') {
			$("#date2").val(date);
		}
	});
</script>