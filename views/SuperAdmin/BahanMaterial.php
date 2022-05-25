<html>
<!-- <?php print_r($data) ?> -->
<!-- <?php

		$idnew;
		if ($data != "Not Found") {
			foreach ($data as $key) {
				$idnew = $key["codecomm"];
				$idnew++;
			}
		} else {
			$idnew = "CR0001";
		}
		?> -->

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
						<form action="<?php echo base_url('MasterDataControler/additembom') ?>" method="POST" enctype="multipart/form-data">
							<div class="row ">
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
											<select name="itemgroup" class="form-control" onchange="location = this.options[this.selectedIndex].value;" required>
												<option value="">Pilih..</option>
												<option value="Produk"><a href="<?php echo base_url('SuperAdminControler/Produk') ?>">Produk</a></option>
												<option value="ProdukJadi"><a href="<?php echo base_url('SuperAdminControler/ProdukJadi') ?>">Produk Jadi</a></option>
												<option value="BahanMaterial" selected><a href="<?php echo base_url('SuperAdminControler/BahanMaterial') ?>">Bahan Baku/ Material </a></option>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Nama Item</p>
										<div class="col">
											<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">

										</div>
									</div>

									<div class="mb-3">
										<p class="m-0">SKU</p>
										<div class="col">
											<input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
										</div>
									</div>

									<div class="mb-3">
										<label class="mb-3">Unit Satuan</label>
										<div class="row">
											<div class="col-8">
												<select name="unit" id="" class="form-select" required>
													<option value="">Pilih Unit</option>
													<?php
													if ($data != 'Not Found') {
														foreach ($data as $key) : ?>
															<option value="<?php echo $key["idunit"] ?>"><?php echo $key["nameunit"] ?></option>
													<?php endforeach;
													} ?>
												</select>
											</div>
										</div>
										<br>
										<div class="mb-2" style="font-size:12px;">
											<p class="m-0">Note : Unit satuan digunakan saat inventory in & out</p>
										</div>
										<br>
										<div class="mb-2" style="font-size:12px;">
											<button type="submit" class="btn btn-primary">Buat Item</button>
										</div>
									</div>

								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">Stock Minimum</p>
										<div class="col">
											<input name="minstock" type="number" id="minstock" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Harga</p>
										<div class="col">
											<input name="hargaitem" type="text" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Deskripsi</p>
										<div class="col">
											<textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
										</div>
									</div>
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
		<!--<option value="" disabled selected>Select Item</option>-->
		<?php
		if ($data1 != 'Not Found') {
			foreach ($data1 as $key) {
		?>
				<option value="<?php echo $key["nameitem"] . '             Rp. ' . $key["priceitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-spec="<?php echo $key["spec"]; ?>" data-qty="<?php echo $key["qty"]; ?>"><?php echo $key["sku"]; ?></option>
		<?php }
		} ?>
	</datalist>
	<script type="text/javascript">
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

		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e) {
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value);
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? +rupiah : '');
		}

		function add_row_transaksi(xxid) {
			var lastid = 0;
			if (parseInt(xxid) != 0) {
				lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
			}
			var xid = (parseInt(xxid) + 1);
			lastid++;
			var tabel = '';
			// tabel += '<td class="p-0" style="border:none;width: 2%"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control  nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_' + xid + '_iditem" /></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_nameitem"  class="form-control nameitem" name="transaksi_' + xid + '_nameitem" placeholder="Search" list="xitem"  value=""/></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" type="text" readonly class="form-control " objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" value=""></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input type="text" readonly id="transaksi_' + xid + '_spec" objtype="_spec" class="form-control  _spec"name="transaksi_' + xid + '_spec" /></td>';
			tabel += '<td class="p-0" style="border:none;width: 3%"><input type="text" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control _qty"name="transaksi_' + xid + '_qty" /></td>';
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

		$(document).on('change', '_nameitem', function() {
			var xid = $(this).attr('id').replace("transaksi_", "").replace("_nameitem", "");
			var val = $(this).val();
			var xobj = $('#xitem option').filter(function() {
				return this.value == val;

			});
			console.log(xobj)

			if ((val == "") || (xobj.val() == undefined)) {
				$('#transaksi_' + xid + '_nameitem').val("");
				$('#transaksi_' + xid + '_sku').val("");
				$('#transaksi_' + xid + '_spec').val("");
				$('#transaksi_' + xid + '_qty').val("");
			} else {
				$('#transaksi_' + xid + '_nameitem').val("");
				$('#transaksi_' + xid + '_sku').val("");
				$('#transaksi_' + xid + '_spec').val("");
				$('#transaksi_' + xid + '_qty').val("");
			}
			calc();
		});
	</script>