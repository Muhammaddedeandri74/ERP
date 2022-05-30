<body class="body">
	<div class="header px-4 pt-2" style="height: 196px;">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Register Customer</h3>
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
						<form action="<?php echo base_url('MasterDataControler/editcustomer') ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-2">
									<div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
										<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" class="form-control" value="<?php echo $data["idcust"] ?>">
							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Code Customer</label>
									<input type="text" name="codecustomer" class="form-control" value="<?php echo $data["codecust"] ?>" required readonly>
									<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Type Customer</label>
									<select class="form-control" name="typecust" required>
										<option value="Buyer">Buyer</option>
										<option value="Supplier">Supplier</option>
									</select>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Nama Customer</label>
									<input type="text" name="namecust" value="<?php echo $data["namecust"] ?>" class="form-control">
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Email</label>
									<input type="email" name="email" value="<?php echo $data["email"] ?>" class="form-control" autocomplete="off" required>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">No Telepon</label>
									<input type="text" name="telepon" value="<?php echo $data["phonecust"] ?>" class="form-control" autocomplete="off" required>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Contact Person</label>
									<input type="text" name="contact" value="<?php echo $data["nocontact"] ?>" class="form-control">
								</div>
							</div>



							<div class="row mb-2">
								<div class="col-4"></div>
								<div class="col-4">
									<label for="">Alamat</label>
									<textarea name="alamat" id="" cols="5" rows="3" class="form-control"><?php echo $data["addresscust"] ?></textarea>
								</div>
							</div>

							<div class="row">
								<div class="col-4"></div>
								<div class="col-4">
									<button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px;">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		document.getElementById('typec').addEventListener('change', function() {
			if (this.value == "") {
				document.getElementById('email').readOnly = true;
				document.getElementById('telepon').readOnly = true;
				document.getElementById('nama').readOnly = true;
				document.getElementById('kontak').readOnly = true;
				document.getElementById('alamat').readOnly = true;
			} else {
				document.getElementById('email').readOnly = false;
				document.getElementById('telepon').readOnly = false;
				document.getElementById('nama').readOnly = false;
				document.getElementById('kontak').readOnly = false;
				document.getElementById('alamat').readOnly = false;
			}
		});
	</script>