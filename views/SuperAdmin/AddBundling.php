<?php
$idnew;
if ($data != "Not Found") {
	foreach ($data as $key) {
		$idnew = $key["codecomm"];
		$idnew++;
	}
} else {
	$idnew = "CR0001";
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
		<form action="<?php echo base_url('MasterDataControler/addbundling') ?>" method="POST" enctype="multipart/form-data">
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
								<?php if ($data != "Not Found") : ?>
									<?php foreach ($data as $key) : ?>
										<option value="<?php echo $key["namecomm"] ?>"><?php echo $key["namecomm"] ?></option>
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
								<th>Nama Item</th>
								<th>SKU</th>
								<th>Deskripsi</th>
								<th>Qty</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select class="form-control">
										<option value="">Pilih</option>
									</select>
								</td>
								<td>-</td>
								<td>-</td>
								<td><input type="number" class="form-control"></td>
								<td>
									<div class="row">
										<div class="col-6">
											<a href="" class="btn btn btn-danger"><i class='bx bx-trash'></i></a>
										</div>
										<div class="col-6">
											<a href="" class="mr-3 btn btn-primary " style="margin-right:16px;"><i class='bx bx-plus'></i></a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="text-end">
				<button type="submit" class="btn btn-primary px-5">Simpan</button>
			</div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
		rupiah.value = formatRupiah(this.value, 'Rp. ');
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
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>