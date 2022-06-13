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
			<form action="<?php echo base_url('MasterDataControler/addwarehouse') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-3"></div>
					<div class="col-6">
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Code Warehouse</label>
								<input type="text" name="codewh" class="form-control" required value="<?php echo $data1 ?>" readonly>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Nama Warehouse</label>
								<input type="text" name="namewh" class="form-control" required autocomplete="off" required>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Telepon Warehouse</label>
								<input type="text" name="notelpwh" class="form-control" required autocomplete="off" required>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-1"></div>
							<div class="col-10">
								<label for="" class="form-label">Alamat Warehouse</label>
								<textarea name="alamatwh" id="" cols="5" rows="3" class="form-control"></textarea>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mb-3">
							<div class="col-12">
								<div class="row">
									<div class="col-4">
										<label for="" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</label>
									</div>
									<div class="col-8">
										<div class="form-check form-switch">
											<input name="status" id="check" class="form-check-input" type="checkbox">
										</div>
									</div>
								</div>
							</div>
							<div class="col-2"></div>
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
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $no = 1; ?>
						<?php if ($data != "Not Found") : ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key["codewarehouse"] ?></td>
									<td><?php echo $key["namewarehouse"] ?></td>
									<td><?php echo $key["phonewarehouse"] ?></td>
									<td><?php echo $key["addresswarehouse"] ?></td>
									<?php if ($key["status"] == "1") : ?>
										<td>Aktif</td>
									<?php else : ?>
										<td>Tidak Aktif</td>
									<?php endif ?>
									<td><a href="<?php echo base_url('MasterDataControler/getdatawarehousebyid?id=' . base64_encode($key['codewarehouse'])) ?>" class="btn btn-primary">Edit</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		$("#check").click(function() {
			if ($(this).is(":checked")) {
				$("#check").val(1);
			} else {
				$("#check").val(0);
			}
			calc();
		});
	});
</script>