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


<script type="text/javascript">
	
	function logout() {
		window.location.href = "<?php echo base_url('AuthControler/logout') ?>";
	}

	function move() {
		window.location.href = "<?php echo base_url('AuthControler/employe') ?>";
	}
</script>


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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


<body class="body" >
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
				<form action="<?php echo base_url('MasterDataControler/addcustomer') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-2">
					  <div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					    <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
					  </div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Code Customer</label>
						  <input type="text" name="codecustomer" class="form-control" required value="<?php echo $idnew ?>" readonly>
					      <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
					  </div>
				</div>

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Type Customer</label>
							<select name="type" id="type" class="form-control">
							<option value="">Pilih</option>
							<option value="Buyer">Buyer</option>
							<option value="Supplier">Supplier</option>
						</select>
					  </div>
				</div>

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Nama Customer</label>
						  <input type="text" name="namecomm" class="form-control" id="nama" autocomplete="off" required readonly="true"/>
					  </div>
				</div>

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Email</label>
						  <input type="email" name="attrib3" id="email" class="form-control" autocomplete="off" required readonly="true"/>
					  </div>
				</div>

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">No Telepon</label>
						  <input type="text" name="phonecustomer" id="telepon" class="form-control" autocomplete="off" required readonly="true"/>
					  </div>
				</div>

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Contact Person</label>
						  <input type="text" name="attrib5" class="form-control" id="kontak" autocomplete="off" required readonly="true"/> 
					  </div>
				</div>

				

				<div class="row mb-2">
					<div class="col-4"></div>
					  <div class="col-4">
						  <label for="">Alamat</label>
						  <textarea name="addresscustomer" id="alamat" cols="5" rows="3" class="form-control" required readonly="true"/></textarea>
					  </div>
				</div>

				<div class="row">
					<div class="col-4"></div>
					  <div class="col-4">
					   <button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px;" >Simpan</button>
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
		document.getElementById('type').addEventListener('change', function() {
			if (this.value =="") {
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