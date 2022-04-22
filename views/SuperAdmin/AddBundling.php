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
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<title>S-ERP</title>
</head>
<!-- <?php print_r($data)?> -->
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


<body class="body">
	<div class="header px-4 pt-2" style="height: 196px;">


		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Register Bundling</h3>
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
						<form action="<?php echo base_url('MasterDataControler/addbundling') ?>" method="POST" enctype="multipart/form-data">
							<div class="row ">
								<div class="col-3">
								<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
									<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url("assets/img/lisa.jpg")  ?>" alt="mdo"
										id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
										<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">Item Group</p>
										<div class="col">
											<select class="form-control" name="itemgroup" id="item_group" required>
												<?php if($data !="Not Found"):?>
													<option value="">Pilih Tipe Item</option>
													<?php foreach($data as $key):?>
														<option value="<?php echo $key["namecomm"]?>"><?php echo $key["namecomm"]?></option>
													<?php endforeach?>
												<?php endif?>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Nama Item</p>
										<div class="col">
											<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required readonly="true"/>
										</div>
									</div>
                                    <div class="mb-3">
										<p class="m-0">Link Video Youtube</p>
										<div class="col">
											<input type="text" name="link" id="link" class="form-control" autocomplete="off" required readonly="true"/>
										</div>
									</div>
									<div class="mb-3">
										<div class="row mt-3">
											<div class="col-9">
												<p style="font-size: 16px">Status Item</p>
											</div>
											<div class="col-3">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckDefault">
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">SKU Item</p>
										<div class="col">
											<input type="text" name="sku" id="sku" class="form-control" readonly="true"/>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Harga</p>
										<div class="col">
											<input type="text" name="harga" id="rupiah" class="form-control" autocomplete="off" required readonly="true"/>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Spesifikasi</p>
										<div class="col">
											<textarea name="spec" id="spec" cols="6" rows="4" class="form-control" placeholder="Contoh: Penawaran PT. ABC" readonly="true"/></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
                              <div class="col-3">
							  </div>
							  <div class="col-3">
							  </div>
							  <div class="col-3">
							  <div class="row mt-3">
									<div class="col-9">
										<p style="font-size: 16px">Gunakan Material/Ingredient</p>
									</div>
									<div class="col-3">
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
										</div>
									</div>

								</div>
							  </div>
							</div>
							<div class="row">
							<div class="col-9">
							  <table class="table m-0">
					         	<thead class="border-0">
									<tr>
									<th style="background:#1143d8;color:white;">Nama Item</th>
									<th style="background:#1143d8;color:white;">SKU</th>
									<th style="background:#1143d8;color:white;">Deskripsi</th>
									<th style="background:#1143d8;color:white;">Qty</th>
									<th style="background:#1143d8;color:white;">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<td style="width:30%;"><select style="width:100%;" class="form-control">
										<option value="">Pilih</option>
									</select></td>
									<td style="width:20%;">-</td>
									<td style="width:30%;">-</td>
									<td style="width:30%;"><input type="number" style="width:30%;" class="form-control"></td>
									<td>
									<div class="d-flex m-0">	
									   <a href="" class="btn btn btn-danger"><i class='bx bx-trash'></i></a>
									   <a href="" class="mr-3 btn btn-primary " style="margin-right:16px;" ><i class='bx bx-plus'></i></a>
								    </td>
								   </div>
									</tr>
								</tbody>
								</table>
							</div>
                           </div>
							<div class="row">
                              <div class="col-3">
							  </div>
							  <div class="col-3">
							  </div>
							  <div class="col-3">
							     <button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;font-size:19px;">Simpan</button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#uimg')
						.attr('src', e.target.result)
						.width(412)
						.height(309);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		document.getElementById('item_group').addEventListener('change', function() {
			if (this.value =="") {
				document.getElementById('nameitem').readOnly = true;
				document.getElementById('sku').readOnly = true;
				document.getElementById('rupiah').readOnly = true;
				document.getElementById('spec').readOnly = true;
				document.getElementById('link').readOnly = true;
			} else {
				document.getElementById('nameitem').readOnly = false;
				document.getElementById('sku').readOnly = false;
				document.getElementById('rupiah').readOnly = false;
				document.getElementById('spec').readOnly = false;
				document.getElementById('link').readOnly = false;
			}
		});

		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

	</script>
