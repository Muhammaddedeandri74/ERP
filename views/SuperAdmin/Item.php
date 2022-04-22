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
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
  </ol>
  <h3 class="text-white">List Produk</h3>
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
				<form action="<?php echo base_url('MasterDataControler/adduser') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
				   <div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					 <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
					</div>
				   </div>
				</div>

              <div class="card-body">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Item Group</th>
                    <th>SKU</th>
                    <th>Spesifikasi</th>
                    <th>Harga</th>
                    <th>Jenis QTY</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
				  <tbody>
						  <?php $a=1;?>
						    <?php if($data !="Not Found"):?>
						     <?php foreach ($data as $key) :?>
							 <tr>
							  <td><?php echo $a++;?></td>
							  <td><?php echo $key["nameitem"]?></td>
							  <td><?php echo $key["itemgroup"]?></td>
							  <td><?php echo $key["sku"]?></td>
							  <td><?php echo $key["deskripsi"]?></td>
							  <td><?php echo $key["hargaitem"]?></td>
							  <td><?php echo $key["jenisqty"]?></td>
							  <?php if($key["status"]==1):?>
							  <td>Active</td>
							  <?php else:?>
								<td>Non Active</td>
							  <?php endif?>
							  <td><a href="" class="btn btn-primary" style="font-size:13px;">Edit</a></td>
					          </tr>
						     <?php endforeach?>
						   <?php endif?>
				  </tbody>
                </table>
              </div>
		</div>
	</div>
</div>
	
</div>
    </div>
	<!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script> -->
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
			$('#data').hide();
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

		$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "Cutomer.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});



	</script>