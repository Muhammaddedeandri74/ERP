<?php
$idnew;
if ($data != "Not Found") {
	foreach ($data as $key) {
		$idnew = $key["codeitemgroup"];
		$idnew++;
	}
} else {
	$idnew = "CB-01";
}
?>

<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">Register Bundling</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('MasterDataControler/addbundling') ?>" method="POST" enctype="multipart/form-data" id="form">
			<div class="row mb-3">
				<div class="col-4">
					<img src="<?= base_url("assets/img/lisa.jpg")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
					<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
				</div>
				<div class="col-4">
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Item Group</label>
							<select class="form-select" name="itemgroup" id="item_group" required>
								<option value="">Pilih</option>
								<?php if ($data != "Not Found") : ?>
									<?php foreach ($data as $key) : ?>
										<option value="<?php echo $key["codeitemgroup"] ?>"><?php echo $key["itemtype"] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Nama Item</label>
							<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required readonly="true" />
							<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Link Video Youtube</label>
							<input type="text" name="link" id="link" class="form-control" autocomplete="off" required readonly="true" />
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<div class="row mt-3">
								<div class="col-4">
									<p style="font-size: 16px">Status Item</p>
								</div>
								<div class="col-8">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckDefault" checked>
									</div>
								</div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-4">
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">SKU Item</label>
							<input type="text" name="sku" id="sku" class="form-control" readonly="true" />
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Harga</label>
							<input type="text" name="harga" id="rupiah" class="form-control" autocomplete="off" required readonly="true" />
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Spesifikasi</label>
							<textarea name="spec" id="spec" cols="6" rows="4" class="form-control" placeholder="Contoh: Penawaran PT. ABC" readonly="true" /></textarea>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<div class="row">
								<div class="col-7">
									<p style="font-size: 16px">Gunakan Material/Ingredient</p>
								</div>
								<div class="col-5">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
									</div>
								</div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table table-bordered table-striped">
						<thead class="text-white text-center" style="background:#1143d8;">
							<tr>
								<th>SKU</th>
								<th>Nama Item</th>
								<th>Deskripsi</th>
								<th>Qty</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="detail">

						</tbody>
					</table>
				</div>
			</div>
			<div class="text-end">
				<button type="button" class="btn btn-primary px-5" id="addorder" onclick="addorder()">Simpan</button>
			</div>
		</form>
	</div>
</div>
<datalist id="xitem">
	<?php
	if ($data1 != 'Not Found') {
		foreach ($data1 as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	add_row_transaksi(0);

	function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:100%;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku1[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem1[]" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_deskripsi"  class="form-control" name="deskripsi[]" value=""></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value=""/></td>';

		tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#detail').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}

	$(document).on('input', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_qty').val("");

		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));

		}
	});

	function addorder() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addbundling') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			});
	}

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			if ($("#iditem").val() == "") {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Simpan Transaksi?";
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

		xval = $("#namecomp").val();
		if ($("#namecomp").val() == '') {
			alert('Nama Perusahaan Wajib Diisi');
			sts = 0;
			return false;
		}


		xval = $("#nocontact").val();
		if ($("#nocontact").val() == '') {
			alert('Nocontact Wajib Diisi');
			sts = 0;
			return false;
		}


		if (sts == 1) {
			return true;
		} else {
			return false;
		}
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

	document.getElementById('item_group').addEventListener('change', function() {
		if (this.value == "") {
			document.getElementById('nameitem').readOnly = true;
			document.getElementById('sku').readOnly = true;
			document.getElementById('rupiah').readOnly = true;
			document.getElementById('spec').readOnly = true;
			document.getElementById('link').readOnly = true;
		} else {
			document.getElementById('nameitem').readOnly = false;
			document.getElementById('sku').readOnly = false;
			document.getElementById('rupiah').readOnly = false;
			document.getElementById('spec').readOnly = false;
			document.getElementById('link').readOnly = false;
		}
	});

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

	function cancelorder() {
		location.reload();
		//return false;
	}
</script>