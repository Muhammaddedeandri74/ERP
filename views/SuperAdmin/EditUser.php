<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">Edit User</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('MasterDataControler/edituser') ?>" method="POST" enctype="multipart/form-data">
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6 text-center">
					<p>
						<img src="<?php echo base_url('assets/icon/users.png') ?>" alt="" style="height:96px;">
					</p>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Nama Pengguna</label>
							<input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" required autocomplete="off">
							<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
							<input type="hidden" name="id" class="form-control" value="<?php echo $data["iduser"] ?>">
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $data['email'] ?>" required autocomplete="off">
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Gudang</label>
							<select class="form-select" name="warehouse" required>
								<?php if ($data2 != "Not Found") {
									foreach ($data2 as $key) : ?>
										<option value="<?php echo $key["idwarehouse"] ?>" <?php echo ($key["idwarehouse"] ==  $key["idwarehouse"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namewarehouse"] ?></option>
								<?php endforeach;
								} ?>
							</select>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Hak Akses/Role</label>
							<select class="form-select" name="role" required>
								<?php if ($data1 != "Not Found") {
									foreach ($data1 as $key) : ?>
										<option value="<?php echo $key["idrole"] ?>" <?php echo ($key["idrole"] ==  $data["role"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namerole"] ?></option>
								<?php endforeach;
								} ?>
							</select>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>

			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Kata Sandi</label>
							<div class=" input-group flex-nowrap">
								<input class="input form-control" type="password" name="password" id="myInput1" value="<?php echo $data["password"] ?>">
								<span class="input-group-text bg-transparent"><i class='bx bx-low-vision' onclick="hide1()"></i></span>
								<?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row mb-3">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-10">
							<label for="" class="form-label">Ulangi Kata Sandi</label>
							<div class=" input-group flex-nowrap">
								<input type="text" name="repassword" placeholder="Masukan Ulang Kata Sandi" id="myInput2" class="input form-control" autocomplete="off" required>
								<span class="input-group-text bg-transparent"><i class='bx bx-low-vision' onclick="hide2()"></i></span>
								<?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary px-5">Simpan</button>
			</div>
		</form>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
</script>