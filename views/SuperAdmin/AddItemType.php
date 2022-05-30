<?php
$idnew;
if ($data != "Not Found") {
	foreach ($data as $key) {
		$idnew = $key["codeitemgroup"];
		$idnew++;
	}
} else {
	$idnew = "CIG-01";
}
?>

<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">Add Item type</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
			<form action="<?php echo base_url('MasterDataControler/additemtype') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-3"></div>
					<div class="col-6">
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Code Item Type</label>
								<input type="text" name="codeitemgroup" class="form-control" required value="<?php echo $idnew ?>" readonly>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Nama Item Type</label>
								<input type="text" name="itemtype" class="form-control" required autocomplete="off" required>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Item Group</label>
								<select name="itemgroup" id="itemgroup" class="form-select">
									<option value="">Pilih</option>
									<?php if ($data != "Not Found") : ?>
										<?php foreach ($data as $key) : ?>
											<option value="<?php echo $key["itemgroup"] ?>"><?php echo $key["itemgroup"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-1"></div>
						</div>
						<!-- <div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Item Group</label>
								<div class="row mb-3">
									<div class="col-4">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="itemgroup" value="nonbom" id="flexRadioDefault1" checked>
											<label class="form-check-label" for="flexRadioDefault1">
												Produk
											</label>
										</div>
									</div>
									<div class="col-4">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="itemgroup" value="usebom" id="flexRadioDefault2">
											<label class="form-check-label" for="flexRadioDefault2">
												Produk Jadi
											</label>
										</div>
									</div>
									<div class="col-4">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="itemgroup" value="bom" id="flexRadioDefault3">
											<label class="form-check-label" for="flexRadioDefault3">
												Bahan Material
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-1"></div>
						</div> -->
						<div class="text-center mb-2">
							<button type="submit" class="btn btn-primary px-5">Simpan</button>
						</div>
					</div>
					<div class="col-3"></div>
				</div>
			</form>
		</div>
		<div class="row mt-3">
			<div class="col">
				<table id="table-user" class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Item Type</th>
							<th>Item Group</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $no = 1; ?>
						<?php if ($data != "Not Found") : ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key["itemtype"] ?></td>
									<td><?php echo $key["itemgroup"] ?></td>
									<td><a href="<?php echo base_url('MasterDataControler/getdataitemtypebyid?id=' . base64_encode($key['codeitemgroup'])) ?>" class="btn btn-primary">Edit</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	function hide1() {
		var x = document.getElementById("myInput1");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

	function hide2() {
		var x = document.getElementById("myInput2");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

	$(function() {
		$("#table-user").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>