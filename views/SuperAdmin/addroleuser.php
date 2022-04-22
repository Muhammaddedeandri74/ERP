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

    .photo {
        background: white;
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
        background-color: white;
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
        position:relative;
    }

    .sckk {
        overflow-y: scroll;
        height: 56vh;
        border-radius: 0px 0px 10px 10px;
    }
    
    .list-akses thead tr td{
        font-weight: bolder;min-width:196px;
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
  <h3 class="text-white">Akses Level</h3>
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
				<form action="<?php echo base_url('MasterDataControler/addrole') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
                   <div class="col-3 mb-5" >
                    <div class="col-3"></div>
                        <div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
                        <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                   <div class="col">
                        <p>Role Baru</p>
                   </div>
                </div>
                <div class="row mb-5">
                   <div class="col-3">
                        <input type="text" name="namerole" class="form-control" placeholder="Masukan Role Pengguna" autocomplete="off">
                   </div>
                   <div class="col-3">
                     <button type="submit" class="btn btn-outline-primary">Tambah</button>
                   </div>
                </div>
                <div class="row mb-5" style="overflow-x: auto;">
                <table class="table table-bordered list-akses">
                    <thead >
                        <tr class="font-weight-bold">
                            <td>Nama Role</td>
                            <td>Informasi Pengguna</td>
                            <td>Informasi Produk</td>
                            <td>Informasi Gudang</td>
                            <td>Informasi Customer</td>
                            <td>Informasi Perusahaan</td>
                            <td>Quotation</td>
                            <td>Salesorder</td>
                            <td>Register Purchasing</td>
                            <td>Purchasing Invoice</td>
                            <td>Purchasing Book</td>
                            <td>Request Po</td>
                            <td>Inventory In</td>
                            <td>Inventory Out</td>
                            <td>Transaction Book</td>
                            <td>Inventory Closing</td>
                            <td>Sales Invoice</td>
                            <td>Sales Adjusment</td>
                            <td>Daily Book Of Sales</td>
                            <td>Month Book Of Sales</td>
                            <td>Action</td>
                    </thead>
                <tbody>
                <?php if($data !="Not Found"):?>
                     <?php foreach($data as $key) :?>
                        <tr>
                            <td><?php echo $key["namerole"]?></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InformasiPengguna" value="Informasi Pengguna" ></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InformasiProduk" value="Informasi Produk"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InformasiGudang" value="Informasi Gudang"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InformasiCustomer" value="Informasi Gudang"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InformasiPerusahaan" value="Informasi Perusahaan"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="Quotation" value="Quotation"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="Salesorder" value="Salesorder"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="RegisterPurchasing" value="Register Purchasing"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="PurchasingInvoice" value="Purchasing Invoice"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="PurchasingBook" value="Purchasing Book"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="RequestPo" value="Request Po"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InventoryIn" value="Inventory In"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InventoryOut" value="Inventory Out"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="TransactionBook" value="Transaction Book"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="InventoryClosing" value="Inventory Closing"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="SalesInvoice" value="Sales Invoice"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="SalesAdjusment" value="Sales Adjusment"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="DailyBookOfSales" value="Daily Book Of Sales"></td>
                            <td style="text-align:center;"><input type="checkbox" class="form-check-input" name="role[]" id="MonthBookOfSales" value="Month Book Of Sales"></td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <!-- <a href="" class="btn btn-danger">Hapus</a> -->
                            </td>
                        </tr>
                    <?php endforeach?>
                    <?php endif?>
             </tbody>
            </table>
          </div>
        </form>
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
		$(document).ready(function () {
            $('#dtHorizontalVerticalExample').DataTable({
                "scrollX": true,
                "scrollY": 200,
            });
            $('.dataTables_length').addClass('bs-select');
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