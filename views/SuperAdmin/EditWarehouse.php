<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">Warehouse</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
			<form action="<?php echo base_url('MasterDataControler/editwarehouse') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-3"></div>
					<div class="col-6">
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Code Warehouse</label>
								<input type="text" name="codewh" class="form-control" required value="<?php echo $data["codewarehouse"] ?>" readonly>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
								<input type="hidden" name="id" class="form-control" value="<?php echo $data["idwarehouse"] ?>">
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Nama Warehouse</label>
								<input type="text" name="namewh" class="form-control" value="<?php echo $data['namewarehouse'] ?>" required autocomplete="off" required>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Telepon Warehouse</label>
								<input type="text" name="notelpwh" class="form-control" value="<?php echo $data['phonewarehouse'] ?>" required autocomplete="off" required>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Alamat Warehouse</label>
								<textarea name="alamatwh" id="" cols="5" rows="3" class="form-control"><?php echo $data["addresswarehouse"] ?></textarea>
							</div>
							<div class="col-1"></div>
						</div>
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
							<th>Code Warehouse</th>
							<th>Name Warehouse</th>
							<th>No Telepon Warehouse</th>
							<th>Alamat Warehouse</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $no = 1; ?>
						<?php if ($data2 != "Not Found") : ?>
							<?php foreach ($data2 as $key) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key["codewarehouse"] ?></td>
									<td><?php echo $key["namewarehouse"] ?></td>
									<td><?php echo $key["phonewarehouse"] ?></td>
									<td><?php echo $key["addresswarehouse"] ?></td>
									<td><a href="<?php echo base_url('MasterDataControler/getdatawarehousebyid?id=' . base64_encode($key['idwarehouse'])) ?>" class="btn btn-primary">Edit</a>
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