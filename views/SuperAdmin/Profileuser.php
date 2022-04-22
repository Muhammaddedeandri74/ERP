<style type="text/css">
	.biodata,
	.photo {
		height: 80vh;
		width: 100%;
	}


	.photo {
		background: purple;
		padding: 20%;
	}

	.biodata {
		background: white;
		padding: 2%;

	}

	.custom-br {
		display: block;
		width: 100%;
		height: 5px;
		background-color: purple;
		/*change color*/

	}

	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: #2196F3;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	.bays {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		background-color: white;
	}
</style>

<!DOCTYPE html>
<html>

<head>
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/Chart.js') ?>"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>ERP</title>
</head>

<body style="overflow-x: hidden;">
	<form action="<?php echo base_url('AuthControler/editprofileuser') ?>" method="POST" enctype="multipart/form-data">
		<div class="container-xxl text-white pt-3" style="background-color: purple;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">Admin/Users/Profile User</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">Profile User</p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<div class="main py-4" style="margin-left:10%;margin-right:10%;">
			<div class="row no-gutters">
				<!-- <div class="col">
					<div class="photo">
						<img src="<?php echo base_url('assets/img/placeholder_image.png') ?>" style="margin-left: 30px; width: 300px ; height: 300px" id="img">
						<label class="btn btn-outline-secondary" style="margin-left: 30%; margin-top: 10%">
							<i cclass="fa fa-upload fa-2x" aria-hidden="true"></i>
							<p><b style="color: white">Upload Foto</b></p>
							<input type="file" name="photo" id="photo" style="display: none;">
						</label>
					</div>
				</div> -->
				<div class="col-12 bays">
					<div class="biodata">
						<div class="row">
							<?php echo $this->session->flashdata('message'); ?>
							<?php $this->session->set_flashdata('message', ''); ?>
						</div>
						<div class="row">
							<div class="col">
								<p><b>INFORMASI DASAR</b></p>
							</div>
							<div class="col-2" style="margin-top: 5px">
								<p style="font-size: 12px">Status</p>
							</div>
							<div class="col-2">
								<label class="switch">
									<input type="checkbox" checked disabled>
									<span class="slider round"></span>
								</label>
							</div>
						</div>
						<span class="custom-br"></span>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Nama Lengkap</p>
							</div>
							<div class="col">
								<input type="text" name="fullname" value="<?php echo $data['fullname'] ?>" class="form-control" required>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $data['iduser'] ?>">
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Nama Pengguna</p>
							</div>
							<div class="col">
								<input type="text" name="username" value="<?php echo $data['username'] ?>" class="form-control" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Email</p>
							</div>
							<div class="col">
								<input type="text" name="email" value="<?php echo $data['email'] ?>" class="form-control" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">No. Telephone</p>
							</div>
							<div class="col">
								<input type="text" name="phone" value="<?php echo $data['phone'] ?>" class="form-control" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Alamat</p>
							</div>
							<div class="col">
								<input type="text" name="address" value="<?php echo $data['address'] ?>" class="form-control" required>
							</div>
						</div>
						<div class="row" style="margin-top: 50px">
							<div class="col">
								<p><b>Kata Sandi</b></p>
							</div>
						</div>
						<span class="custom-br"></span>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Kata Sandi</p>
							</div>
							<div class="col">
								<input type="text" name="password" class="form-control" value="<?php echo $data['password'] ?>" placeholder="Masukan Sandi Min.3 character" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Ulang Kata Sandi</p>
							</div>
							<div class="col">
								<input type="text" name="repassword" class="form-control" placeholder="Masukan Ulang Sandi untuk memverifikasi" autocomplete="off" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Pilih Role</p>
							</div>
							<div class="col">
								<input type="hidden" name="role" value="<?php echo $data['role'] ?>">
							</div>
						</div>
						<button class="btn btn-outline-success" style="float: right; margin-top: 30px;" type="submit"> <i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>

<script type="text/javascript">
	function back() {
		window.location.href = "<?php echo base_url('AuthControler/employe') ?>";
	}


	photo.onchange = evt => {
		const [file] = photo.files
		if (file) {
			img.src = URL.createObjectURL(file)
		}
	}
</script>