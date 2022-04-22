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
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
	<nav class="navbar navbar-expand-lg navbar-light header text-white ">
		<div class="container-fluid px-4">
			<a class="navbar-brand text-white" href="#"><img src="<?php echo base_url('assets/icon/logo_yubi.png')?>"
					alt=""></a>
			<button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon "></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarNav">
				<ul class="navbar-nav w-100 justify-content-evenly">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dashboard
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Order
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Purchase
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Inventory
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Sales
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Book
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>
				<li class="nav-item ">
					<a class="nav-link text-white" href="#">
						<i class="fas fa-user-circle"></i>
					</a>
			</div>
		</div>
	</nav>
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Register Produk</h3>
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
						<form action="<?php echo base_url('MasterDataControler/additembom') ?>" method="POST"
							enctype="multipart/form-data">
							<div class="row ">
								<div class="col-3">
								<div class="col d-flex align-middle mb-3" style="align-items:center"><i
										class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
									<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
								  </div>
								</div>
								<div class="col-3">
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url("assets/icon/item.png")  ?>" alt="mdo"
										id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
										<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">Item Group</p>
										<div class="col">
											<select name="itemgroup" class="form-control" onchange="location = this.options[this.selectedIndex].value;" required>
												<option value="">Pilih..</option>
												<option value="Produk" ><a href="<?php echo base_url('SuperAdminControler/Produk')?>">Produk</a></option>
												<option value="BahanMaterial" selected><a href="<?php echo base_url('SuperAdminControler/BahanMaterial')?>">Bahan Baku/ Material </a></option>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Nama Item</p>
										<div class="col">
											<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
                                            <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
											
										</div>
									</div>
									
									<div class="mb-3">
										<label class="mb-3">Unit Satuan</label>
										<div class="row">
									    	<div class="col-3">
												<input type="radio" class="form-check-input" name="unitsatuan" id="flexRadioDefault1" value="kilogram">
												<label class="form-check-label" for="flexRadioDefault1">
													Kilogram
												</label>
											</div>
											<div class="col-3">
												<input type="radio" class="form-check-input" name="unitsatuan" id="flexRadioDefault1" value="gram">
												<label class="form-check-label" for="flexRadioDefault1">
													Gram
												</label>
											</div>
											<div class="col-6"></div>
										</div>
										<br>
										<div class="mb-2" style="font-size:12px;">
											<p class="m-0">Note : Unit satuan digunakan saat inventory in & out</p>
										</div>
									</div>
                                   
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">SKU Item</p>
										<div class="col">
											<input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Harga</p>
										<div class="col">
											<input name="hargaitem" type="text" id="rupiah" class="form-control" autocomplete="off" required >
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Deskripsi</p>
										<div class="col">
											<textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
										</div>
									</div>
                                    <div class="mb-3">
                                       <button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;font-size:19px;">Buat Item</button>
                                    </div>
								</div>
							</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<datalist id="xitem">
	<!--<option value="" disabled selected>Select Item</option>-->
	<?php
	if ($data1 != 'Not Found') {
		foreach ($data1 as $key) {
	?>
			<option value="<?php echo $key["nameitem"]. '             Rp. ' . $key["priceitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-spec="<?php echo $key["spec"]; ?>" data-qty="<?php echo $key["qty"]; ?>"><?php echo $key["sku"] ; ?></option>
	<?php }
	} ?>
</datalist>
	<script type="text/javascript">
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

		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value);
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
			return prefix == undefined ? rupiah : (rupiah ?  + rupiah : '');
		}

		function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		// tabel += '<td class="p-0" style="border:none;width: 2%"><input style="text-align:center" readonly type="text" id="transaksi_' + xid + '_nourut"  class="form-control  nourut" objtype="nourut" name="transaksi_' + xid + '_nourut" /><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_' + xid + '_iditem" /></td>';
		tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_nameitem"  class="form-control nameitem" name="transaksi_' + xid + '_nameitem" placeholder="Search" list="xitem"  value=""/></td>';
		tabel += '<td class="p-0" style="border:none;width: 3%"><input style="text-align:center" type="text" readonly class="form-control " objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_' + xid + '_sku" value=""></td>';
		tabel += '<td class="p-0" style="border:none;width: 3%"><input type="text" readonly id="transaksi_' + xid + '_spec" objtype="_spec" class="form-control  _spec"name="transaksi_' + xid + '_spec" /></td>';
		tabel += '<td class="p-0" style="border:none;width: 3%"><input type="text" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control _qty"name="transaksi_' + xid + '_qty" /></td>';
		tabel += '<td class="p-0" style="border:none;width: 3%;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	$(document).on('change', '_nameitem', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_nameitem", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
			
		});
		console.log(xobj)
		
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_spec').val("");
			$('#transaksi_' + xid + '_qty').val("");
		} else {
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_spec').val("");
			$('#transaksi_' + xid + '_qty').val("");
		}
		calc();
	});
	</script>
