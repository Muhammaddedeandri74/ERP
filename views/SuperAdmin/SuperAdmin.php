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
        transform: translateY(-4.75rem);
        padding: 2rem;
    }
    .body {
        background: #F8FAFC 0% 0% no-repeat padding-box;
        opacity: 1;
		
    }
	.nav-link{
		font-size:20px;
	}
	.dropdown-submenu {
	position: relative;
	}

	.dropdown-submenu .dropdown-menu {
	top: 0;
	left: 100%;
	margin-top: -1px;
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

	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link rel="icon" type="image/x-icon" href="http://103.251.44.143:8099/ERP/assets/img/logo_daffina.ico">
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/Chart.js') ?>"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" /> -->

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/adminlte.min.css')?>"> -->

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 -->
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
  <h3 class="text-white">Master Menu</h3>
</nav>
</div>

<div class="content bg-white  mx-4">
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600">Informasi Pengguna</p>
		</div>
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600"></p>
		</div>
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600"></p>
		</div>
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600">Informasi Customer</p>
		</div>
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600"></p>
		</div>
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600">Informasi Perusahaan</p>
		</div>
	</div>
	
</div>

<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<a href="<?php echo base_url('SuperAdminControler/Adduser')?>">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/user_logo.png')?>" alt=""></div>
						</a>
						<p readonly>Register User</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Annual) Card Example -->
	<div class="col-2">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
				    	<a href="<?php echo base_url('SuperAdminControler/user')?>">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_user.png')?>" alt=""></div>
                        </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List User</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-2">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
					       	<a href="<?php echo base_url('SuperAdminControler/addroleuser')?>">
								<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/acces_level.png')?>" alt=""></div>
						    </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Access Level</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-2">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
					  <a href="<?php echo base_url('SuperAdminControler/addsupplier')?>">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						 <img
						style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_customer.png')?>" alt=""></div>
                     </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Register Supplier</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-2">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
				    	<a href="<?php echo base_url('SuperAdminControler/customer')?>">
						 <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						 <img
						style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_user.png')?>" alt=""></div>
                        </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List Supplier</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-2">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						<a href="<?php echo base_url('SuperAdminControler/company')?>">
						  <img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/edit_profile.png')?>" alt="">
                        </a>
						</div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Edit Profile</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600">Informasi Produk</p>
		</div>
	</div>
	<div class="col-2">
	</div>
	<div class="col-2">
	</div>
	<div class="col-2">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<p class="mb-1 text-gray-600">Informasi Gudang</p>
		</div>
	</div>
	<div class="col-2">
	</div>
	<div class="col-2">
	</div>
	
</div>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
					   <a href="<?php echo base_url('SuperAdminControler/additemtype')?>">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<img
						style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/item_type.png')?>" alt=""></div>
                        </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Item Type</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Annual) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
					  <a href="<?php echo base_url('SuperAdminControler/additem')?>">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<img
						style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/item_type.png')?>" alt=""></div>
                     </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Register Produk</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tasks Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<img
							ststyle="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_paket.png')?>" alt=""></div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Register Paket</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<a href="<?php echo base_url('SuperAdminControler/addwarehouse')?>">
						<img
						style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/tambah_gudang.png')?>" alt="">
                        </a>
					   </div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Tambah Gudang</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<a href="<?php echo base_url('SuperAdminControler/warehouse')?>">
						<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_gudang.png')?>" alt="">
                         </a>
					    </div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List Gudang</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
					      <a href="<?php echo base_url('SuperAdminControler/addbundling')?>">
							<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register.png')?>" alt=""></div>
                          </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">Register Bundling</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Annual) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						  <a href="<?php echo base_url('SuperAdminControler/item')?>">
							<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_product.png')?>" alt=""></div>
                          </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List Produk</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Annual) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						  <a href="<?php echo base_url('SuperAdminControler/bundling')?>">
							<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_product.png')?>" alt=""></div>
                          </a>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List Bundling</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	
</div>

<br>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<!-- Earnings (Annual) Card Example -->
	<div class="col-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							<img
							style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_paket.png')?>" alt=""></div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">List Paket</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
	
</div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<script>
		$(document).ready(function(){
		$('.dropdown-submenu test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		});
		});

		$(document).ready(function() {

			var data = <?php echo json_encode($this->session->userdata("data")) ?>;
			var title = <?php echo json_encode($title) ?>;
			console.log(data)
			if (data["role"] != 1) {

				$('a').click(function() {
					if ($(this).hasClass('disabled')) {
						alert("Maaf Anda Tidak diberikan Hak Akses Untuk Menu Ini")
						location.reload();
						return false;
					}
				});

				$("#logout").attr('class', '');
				$("#manage").attr('class', '');

				for (var i = 0; i < data["data"].length; i++) {
					if (data["data"][i]["menu"] == "Overview") {
						if (title == "Overview") {
							$("#Overview").attr('class', 'nav-item is-active ');
						} else {
							$("#Overview").attr('class', 'nav-item ');
						}


					}

					if (data["data"][i]["menu"] == "User") {
						if (title == "user") {
							$("#User").attr('class', 'nav-item is-active ');
						} else {
							$("#User").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Items") {
						if (title == "item") {
							$("#Items").attr('class', 'nav-item is-active ');
						} else {
							$("#Items").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Location Item") {
						if (title == "locitem") {
							$("#LocationItem").attr('class', 'nav-item is-active ');
						} else {
							$("#LocationItem").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Warehouse") {

						if (title == "warehouse") {
							$("#Warehouse").attr('class', 'nav-item is-active ');
						} else {
							$("#Warehouse").attr('class', 'nav-item ');
						}

					}
					if (data["data"][i]["menu"] == "Customer") {

						if (title == "customer") {
							$("#Customer").attr('class', 'nav-item is-active ');
						} else {
							$("#Customer").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Supplier") {
						if (title == "supplier") {
							$("#Supplier").attr('class', 'nav-item is-active ');
						} else {
							$("#Supplier").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Currancy") {
						if (title == "currency") {
							$("#Currancy").attr('class', 'nav-item is-active ');
						} else {
							$("#Currancy").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Unit") {
						if (title == "unit") {
							$("#Unit").attr('class', 'nav-item is-active ');
						} else {
							$("#Unit").attr('class', 'nav-item ');
						}



					}
					if (data["data"][i]["menu"] == "Bank") {
						if (title == "card") {
							$("#Bank").attr('class', 'nav-item is-active ');
						} else {
							$("#Bank").attr('class', 'nav-item ');
						}


					}
					if (data["data"][i]["menu"] == "Company Profile") {
						if (title == "company") {
							$("#Bank").attr('class', 'nav-item is-active ');
						} else {
							$("#Bank").attr('class', 'nav-item ');
						}

					}

				}
			}
		});
	
	</script>
	<script>
	document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth < 992) {

  // close all inner dropdowns when parent is closed
  document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
    everydropdown.addEventListener('hidden.bs.dropdown', function () {
      // after dropdown is hidden, then find all submenus
        this.querySelectorAll('.submenu').forEach(function(everysubmenu){
          // hide every submenu as well
          everysubmenu.style.display = 'none';
        });
    })
  });

.querySelectorAll('.dropdown-menu a').forEach(function(element){
    element.addEventListener('click', function (e) {  document
        let nextEl = this.nextElementSibling;
        if(nextEl && nextEl.classList.contains('submenu')) {	
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          if(nextEl.style.display == 'block'){
            nextEl.style.display = 'none';
          } else {
            nextEl.style.display = 'block';
          }

        }
    });
  })
}
// end if innerWidth
}); 
// DOMContentLoaded  end
	</script>