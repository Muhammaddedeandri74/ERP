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
	.nav-link{
		font-size:24px;
	}
</style>

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
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link rel="icon" type="image/x-icon" href="http://103.251.44.143:8099/ERP/assets/img/logo_daffina.ico">
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
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
	<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	<title>S-ERP</title>
</head>

<body class="body" >
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
  </ol>
  <h3 class="text-white">Update Gudang</h3>
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
				<form action="<?php echo base_url('MasterDataControler/editwarehouse') ?>" method="POST" enctype="multipart/form-data">
				<div class="row mb-2">
					<div class="col-2">
					  <div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					    <a style="text-decoration:none;color:black;" href="<?php echo base_url('SuperAdminControler/warehouse')?>">Kembali</a>
					  </div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-2">
						<p>Code Gudang</p>
					</div>
				</div>
				<div class="row ">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-3 mb-2">
					    <input type="text" name="codewarehouse" class="form-control" value="<?php echo $data['codewarehouse'] ?>" required readonly>
						<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
						<input type="hidden" name="id" class="form-control" value="<?php echo $data["idwarehouse"] ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-2">
						<p>Nama Gudang</p>
					</div>
				</div>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-3 mb-2">
					<input type="text" name="namewarehouse" class="form-control" value="<?php echo $data['namewarehouse'] ?>" required>
						<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-2">
						<p>Telepon Gudang</p>
					</div>
				</div>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-3 mb-2">
					<input type="text" name="phonewarehouse" class="form-control" value="<?php echo $data['phonewarehouse'] ?>" required>
					</div>
				</div>

				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-2">
						<p>Telepon Gudang</p>
					</div>
				</div>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-3 mb-2">
					<textarea name="addresswarehouse" id="" cols="5" rows="3" class="form-control"><?php echo $data["addresswarehouse"]?></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-2"></div>
					<div class="col-3"></div>
					<div class="col-3">
				    	<button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px;" >Update</button>
					</div>
				</div>
				</form>
			</div>
		</div>
			</div>
</div>
	
</div>
    </div>
	<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
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
		function refresh() {
			var con = confirm("Anda yakin ingin membatalkan perubahan data ?");
			if (con) {
				window.location.reload();
			}
		}

		function del() {
			var con = confirm("Anda yakin ingin menghapus pengguna ini ?");
			if (con) {
				document.forms["formx"].submit();
			}
		}

		function back() {
			window.location.href = "<?php echo base_url('SuperAdminControler/User') ?>";
		}


		photo.onchange = evt => {
			const [file] = photo.files
			if (file) {
				img.src = URL.createObjectURL(file)
			}
		}
	</script>