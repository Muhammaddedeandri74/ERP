<div>
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Master Menu</h3>
		</nav>
	</div>
	<div class="content bg-white mx-4">
		<div class="container-fluid" style="min-height: 100vh;">
			<div class="row mb-4">
				<div class="col-5">
					<label for="" class="form-label fs-5 mb-3">INFORMASI PENGGUNA</label>
					<div class="row">
						<div class="col-4">
							<div class="card border-left-primary shadow h-100">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/Adduser') ?>">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/user_logo.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">Register User</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-success shadow h-100">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/user') ?>">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_user.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">List User</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-success shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/addroleuser') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/acces_level.png') ?>" alt="">
											</div>
											</a>
											<label class="form-label fs-5">Access Level</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<label for="" class="form-label fs-5 mb-3" style="margin-left: 2.5vw;">INFORMASI CUSTOMER</label>
					<div class="row">
						<div class="col-1"></div>
						<div class="col-5">
							<div class="card border-left-warning shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/addcustomer') ?>">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_customer.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">Register Customer</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-5">
							<div class="card border-left-warning shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/customer') ?>">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_user.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">List Customer</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3">
					<label for="" class="form-label fs-5 mb-3">INFORMASI PERUSAHAAN</label>
					<div class="row">
						<div class="col-6">
							<div class="card border-left-warning shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/company') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/edit_profile.png') ?>" alt="">
												</a>
											</div>
											<label class="form-label fs-5">Edit Profile</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-5">
					<label for="" class="form-label fs-5 mb-3">INFORMASI PRODUK</label>
					<div class="row mb-3">
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/additemtype') ?>">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/item_type.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">Item Type</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<a href="<?php echo base_url('SuperAdminControler/additem') ?>">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/item_type.png') ?>" alt="">
												</div>
											</a>
											<label class="form-label fs-5">Register Produk</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<img ststyle="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_paket.png') ?>" alt="">
											</div>
											<label class="form-label fs-5">Register Paket</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/addbundling') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register.png') ?>" alt="">
											</div>
											</a>
											<label class="form-label" style="font-size: 19px;">Register Bundling</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/item') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_product.png') ?>" alt="">
											</div>
											</a>
											<label class="form-label fs-5">List Produk</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/bundling') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_product.png') ?>" alt="">
											</div>
											</a>
											<label class="form-label fs-5">List Bundling</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/register_paket.png') ?>" alt="">
											</div>
											<label class="form-label fs-5">List Paket</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-8"></div>
					</div>
				</div>
				<div class="col-4">
					<label for="" class="form-label fs-5 mb-3" style="margin-left: 2.5vw;">INFORMASI GUDANG</label>
					<div class="row">
						<div class="col-1"></div>
						<div class="col-5">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												<a href="<?php echo base_url('SuperAdminControler/warehouse') ?>">
													<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/list_gudang.png') ?>" alt="">
												</a>
											</div>
											<label class="form-label fs-5">List Gudang</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-5"></div>
						<div class="col-1"></div>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="col-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							<a href="<?php echo base_url('SuperAdminControler/addwarehouse') ?>">
								<img style="height: 56px; object-fit: cover;" src="<?php echo base_url('assets/icon/tambah_gudang.png') ?>" alt="">
							</a>
						</div>
						<label class="form-label fs-5">Tambah Gudang</label>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script>
	$(document).ready(function() {
		$('.dropdown-submenu test').on("click", function(e) {
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

<script type="text/javascript">
	function logout() {
		window.location.href = "<?php echo base_url('AuthControler/logout') ?>";
	}

	function move() {
		window.location.href = "<?php echo base_url('AuthControler/employe') ?>";
	}
</script>