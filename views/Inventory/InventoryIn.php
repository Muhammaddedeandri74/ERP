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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
	<!-- Latest compiled and minified JavaScript -->

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
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
  </ol>
  <h3 class="text-white">List Ingoing</h3>
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
			</div>
		</div>
	</div>
</div>
<div class="row">
  <div class="col">
    <div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
      <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-2">
        <label for="">Pilih Gudang</label>
        <select name="" id="" class="form-control">
            <option value="" class="form-control col-4">Pilih</option>
            <option value="" class="form-control col-4">A</option>
        </select>
    </div>
    <div class="col-2">
        <label for="">Mulai Dari</label>
        <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus=" (this.type='date' )" onblur="(this.type='text')" id="date1">
    </div>
    <div class="col-2">
        <label for="">Sampai Dengan</label>
        <input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus=" (this.type='date' )" onblur="(this.type='text')" id="date1">
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary" style="margin-top:3vh;position:relative;">Terapkan</button>
    </div>
</div>
<div class="row">
    <div class="card-body">
        <table id="table-user" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>No Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Type Ingoing</th>
            <th>Qty Item</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php $no=1?>
            <?php if($data !="Not Found"):?>
            <?php foreach($data as $key):?>
                <tr>
                <td><?php echo $no++;?></td>	
                <td><?php echo $key["username"]?></td>	
                <td><?php echo $key["email"]?></td>	
                <td><?php echo $key["namerole"]?></td>	
                <td><?php echo $key["namerole"]?></td>	
                <td>Paid</td>	
                <td><a href="<?php echo base_url('InventoryController/getdatainventorybyid') ?>" class="btn btn-primary">Detail</a></td>	
                </tr>
            <?php endforeach?>
            <?php endif?>
        </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-2">
      <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download</label>
    </div>
    <div class="col-2">
      <label for="">Total in Supplier (Finish - Partial)</label>
    </div>
    <div class="col-2">
      <label for="">Total in Supplier (Finish - Partial)</label>
    </div>
    <div class="col-2">
      <label for="">Total in Supplier (Finish - Partial)</label>
    </div>
</div>
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-2">
      <i class='bx bxs-download'></i>
      <label for="">Download</label>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <i class='bx bx-printer' ></i>
     <label for="">Cetak</label>
    </div>
    <div class="col-2">
      <label for="">23 (10 - 13)</label>
    </div>
    <div class="col-2">
      <label for="">14</label>
    </div>
    <div class="col-2">
      <label for="">10</label>
    </div>
</div>
</div>
    </div>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js ')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/jszip/jszip.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/pdfmake.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/vfs_fonts.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
		<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
	    <script>

			$(function () {
				$("#table-user").DataTable({
				"responsive": true, "lengthChange": false, "autoWidth": false,
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