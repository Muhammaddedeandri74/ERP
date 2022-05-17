<style type="text/css">
	* {
		font-family: proxima-nova, sans-serif !important;
	}

	.header {
		background: #1143d8 0% 0% no-repeat padding-box;
	}

	.bc-active {
		color: white;
	}

	.content {
		background: #FFFFFF 0% 0% no-repeat padding-box;
		border: 1px solid #0000001E;
		border-radius: 12px;
		opacity: 1;
		min-height: 70vh;
		transform: translateY(-5.75rem);
		padding: 2rem;
	}

	.body {
		background: #F8FAFC 0% 0% no-repeat padding-box;
		opacity: 1;

	}

	.nav-link {
		font-size: 24px;
	}
</style>


<script type="text/javascript">
	function logout() {
		window.location.href = "<?php echo base_url('AuthControler/logout') ?>";
	}

	function move() {
		window.location.href = "<?php echo base_url('AuthControler/employe') ?>";
	}
</script>
<!DOCTYPE html>

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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<title>S-ERP</title>
</head>

<body class="body">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Register Produk</h3>
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
						<form action="<?php echo base_url('MasterDataControler/additem') ?>" method="POST" enctype="multipart/form-data" id="form">
							<div class="row">
								<div class="col-3">
									<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
										<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
									</div>
								</div>
								<div class="col-3">
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url("assets/icon/item.png")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
									<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">Item Group</p>
										<div class="col">
											<select name="itemgroup" class="form-control" id="item_group" onchange="location = this.options[this.selectedIndex].value;" required>
												<option value="">Pilih..</option>
												<option value="Produk" selected><a href="<?php echo base_url('SuperAdminControler/Produk') ?>">Produk</a></option>
												<option value="BahanMaterial"><a href="<?php echo base_url('SuperAdminControler/Bahan') ?>">Bahan Baku/Material</a></option>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Nama Item</p>
										<div class="col">
											<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
											<input type="hidden" name="iditem" class="form-control">
										</div>
									</div>
									<div class="mb-3">
										<label class="mb-3">Jenis Qty</label>
										<div class="row">
											<div class="col-3">
												<input type="radio" name="jenisqty" value="stock" class="form-check-input">
												<label class="form-check-label" for="flexRadioDefault1">
													Stock
												</label>
											</div>
											<div class="col-3">
												<input type="radio" class="form-check-input" name="jenisqty" id="jenisqty" value="non stock" checked>
												<label class="form-check-label" for="flexRadioDefault1">
													Non Stock
												</label>
											</div>
											<div class="col-6"></div>
										</div>
										<label class="mb-3">Jenis Qty</label>
										<div class="row">
											<div class="col-3">
												<input type="radio" name="jenisqty" value="stock" class="form-check-input">
												<label class="form-check-label" for="flexRadioDefault1">
													Stock
												</label>
											</div>
											<div class="col-3">
												<input type="radio" class="form-check-input" name="jenisqty" id="jenisqty" value="non stock" checked>
												<label class="form-check-label" for="flexRadioDefault1">
													Non Stock
												</label>
											</div>
											<div class="col-6"></div>
										</div>
										<br>
										<div class="mb-2" style="font-size:12px;">
											<p class="m-0">Note</p>
											<p>Service: Item bisa dijual tanpa quantity stock </p>
										</div>
										<div class="row mt-3">
											<div class="col-9">
												<p style="font-size: 16px">Status</p>
											</div>
											<div class="col-3">
												<div class="form-check form-switch">
													<input name="status" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">SKU Item</p>
										<div class="col">
											<input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Harga</p>
										<div class="col">
											<input name="price" type="text" id="price" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Deskripsi</p>
										<div class="col">
											<textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px;" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
								</div>
								<div class="col-3">
								</div>
								<div class="col-3">
								</div>
								<div class="row" id="stock">
									<div class="row">
										<div class="col-2">
											<p></p>
										</div>
										<div class="col-2">
											<p></p>
										</div>
										<div class="col-2">
											<p></p>
										</div>
										<div class="col-2">
											<p style="font-size: 16px">Gunakan Material/Ingredient</p>
										</div>
										<div class="col-2">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="">
											</div>
										</div>
									</div>
									<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
									<div class="col-9">
										<table class="table m-0">
											<thead class="border-0">
												<tr>
													<th style="background:#1143d8;color:white;width: 1%">No</th>
													<th style="background:#1143d8;color:white;width: 3%">SKU</th>
													<th style="background:#1143d8;color:white;width: 6%">Nama Item</th>
													<th style="background:#1143d8;color:white;width: 6%">Deskripsi</th>
													<th style="background:#1143d8;color:white;width: 5%">Satuan/Unit</th>
													<th style="background:#1143d8;color:white;width: 4%">Qty</th>
													<th style="background:#1143d8;color:white;width: 3%">Action</th>
												</tr>
											</thead>
										</table>
										<table class="table table-striped table-hover">
											<tbody id="detailx">
											</tbody>
										</table>
										</table>
									</div>
								</div>
								<div class="row" id="stock">
								</div>
								<div class="row">
									<div class="col-3">
									</div>
									<div class="col-3">
									</div>
									<div class="col-3">
										<button type="button" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;font-size:19px;" onclick="addorder()">Buat Item</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<datalist id="xitem">
		<?php
		if ($data != 'Not Found') {
			foreach ($data as $key) {
		?>
				<option value="<?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditembom"]; ?>" data-price="<?php echo $key["nameitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"]; ?></option>
		<?php }
		} ?>
	</datalist>
	<datalist id="xunit">
		<!--<option value="" disabled selected>Select Item</option>-->
		<?php
		if ($data1 != 'Not Found') {
			foreach ($data1 as $key) {
		?>
				<option value="<?php echo $key["nameunit"] ?>" nameunit="<?php echo $key["nameunit"]; ?>" data-idunit="<?php echo $key["idunit"]; ?>" data-nameunit="<?php echo $key["nameunit"]; ?>" data-unitvoume="<?php echo $key["unitvolume"]; ?>"></option>
		<?php }
		} ?>
	</datalist>
	<script type="text/javascript">
		add_row_transaksi(0)
		var xitem = '';
		xitem = '<?php
					$x = '';
					if ($data != 'Not Found') {
						foreach ($data as $key) {
							$x = $x . '<option value="' . $key["iditembom"] . '" price="' . $key["hargaitem"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
						}
					}
					echo $x;
					?>';

		var xunit = '';
		xunit = '<?php
					$x = '';
					if ($data1 != 'Not Found') {
						foreach ($data1 as $key) {
							$x = $x . '<option value="' . $key["nameunit"] . '" nameunit="' . $key["nameunit"] . '" nameunit="' . $key["nameunit"] . '">' . $key["nameunit"] . ' - ' . $key["nameunit"] . '</option>';
						}
					}
					echo $x;
					?>';


		$('input[type="radio"]').click(function() {
			var inputValue = $(this).attr("value");
			if (inputValue == "stock") {
				$("#service").hide();
				$("#stock").show();
				add_row_transaksi(0);

			} else {
				$("#stock").hide();
				$("#service").show();
				$("#detailx").html("");
				add_row_transaksi(0);
			}
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
			tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '">';
			tabel += '<td class="p-0" style="border:none;width: 1%"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control  nourut" objtype="nourut" name="transaksi_nourut[]" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / ></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
			tabel += '<td class="p-0" style="border:none;width: 6%"><input type="text" readonly id="transaksi_' + xid + '_deskripsi" objtype="_deskripsi" class="form-control  _deskripsi" name="transaksi_deskripsi[]" /></td>';
			tabel += '<td class="p-0" style="border:none;width: 5%"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_unit"  class="form-control _unit" name="transaksi_unit[]" placeholder="Search" list="xunit"  value=""/></td>';
			tabel += '<td class="p-0" style="border:none;width: 4%"><input type="text" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control _qty" name="transaksi_qty[]" / autocomplete="off"></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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
				$('#transaksi_' + xid + '_qty').val(0);
			} else {
				$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
				$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
				$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
				$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
				$('#transaksi_' + xid + '_qty').val(0);

			}
			calc();
		});

		function addorder() {
			var cx = $('#form').serialize();
			$.post("<?php echo base_url('MasterDataControler/additem') ?>", cx,
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
			//return false;
		}
	</script>