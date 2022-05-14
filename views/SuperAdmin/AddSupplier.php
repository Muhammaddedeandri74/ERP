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

	.nav-link {
		font-size: 24px;
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
	<link rel="icon" type="image/x-icon" href="http://103.251.44.143:8099/ERP/assets/img/logo_daffina.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<title>S-ERP</title>
</head>
<?php
$idnew;
if ($data != "Not Found") {
	foreach ($data as $key) {
		$idnew = $key["codesupp"];
		$idnew++;
	}
} else {
	$idnew = "SR001";
}
?>



<body class="body">
	<div class="header px-4 pt-2" style="height: 196px;">


		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Register Supplier</h3>
		</nav>

	</div>
	<form action="<?php echo base_url('MasterDataControler/addsupplier') ?>" method="POST" id="form" enctype="multipart/form-data">
		<div class="content bg-white  mx-4">
			<div class="container-fluid">
				<div class="row no-gutters">
					<div class="col-12 bays">
						<div class="biodata">
							<div class="row">
								<?php echo $this->session->flashdata('message'); ?>
								<?php $this->session->set_flashdata('message', ''); ?>
							</div>
							<div class="row">
								<div class="col-3 mb-3">
									<div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
										<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
									</div>
								</div>
							</div>
							<input type="hidden" name="idsupp" id="idsupp">
							<input type="hidden" name="codesupp" id="codesupp">
							<div class="row mb-3">
								<div class="col-1"></div>
								<div class="col-3 mb-3">
								</div>
								<div class="col-4">
									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:50%;">
											<label for="">Code Supplier</label>
											<input type="text" name="codesupp" class="form-control" value="<?php echo $idnew ?>" readonly>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
										</div>
										<div class="" style=" width:50%;">
											<label for="">Nama Supplier</label>
											<input type="text" name="namesupp" class="form-control" autocomplete="off">
										</div>
									</div>

									<div class="d-flex mb-3" style="align-items: flex-end;">
										<div class="me-3" style="width:50%;">
											<label for="">PIC/Nama Contact</label>
											<input type="text" name="namacontact" class="form-control" autocomplete="off">

										</div>
										<div class="" style="width:50%;">
											<label for="">No. Telepon</label>
											<input type="text" name="notelp" class="form-control" autocomplete="off">
										</div>
									</div>
									<div class="me-3" style="width:100%;">
										<label for="">Alamat</label>
										<textarea name="addressupp" id="" cols="5" rows="3" class="form-control" placeholder="Masukan Alamat Lengkap"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
							</div>
							<div class="col-6">
								<table class="table m-0">
									<thead class="border-0">
										<tr>
											<th style="background:#1143d8;color:white;text-align:right;">Nama Bank</th>
											<th style="background:#1143d8;color:white;text-align:right;">Nomor Rekening</th>
											<th style="background:#1143d8;color:white;text-align:right;">Attn/Beneficiary</th>
											<th style="background:#1143d8;color:white;text-align:right;">Action</th>
										</tr>
									</thead>
								</table>
								<table class="table table-striped table-hover">
									<tbody id="detailx">
									</tbody>
								</table>
								<button type="button" class="btn btn-primary" style="float: right; margin-top: 30px;" id="addorder" onclick="addorder()">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</form>
	<script>
		add_row_transaksi(0);

		function add_row_transaksi(xxid) {
			var lastid = 0;
			if (parseInt(xxid) != 0) {
				lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
			}
			var xid = (parseInt(xxid) + 1);
			lastid++;
			var tabel = '';
			tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '">';
			tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="text" class="form-control bank" name="namabank[]" value=""/></td>';
			tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control " name="norekening[]" value=""></td>';
			tabel += '<td class="p-0" style="border:none;"><input type="text" class="form-control" name="beneficiary[]" /></td>';
			tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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

		$('form button').on("click", function(e) {
			if ($(this).attr('id') == "addorder") {
				var xask = '';
				if ($("#idsupp").val() == "") {
					xask = "Simpan Transaksi?";
				} else {
					xask = "Ubah Transaksi?";
				}
				if (confirm(xask)) {
					if (validasi()) {
						addorder();
					}
				}
			}
			e.preventDefault();
		});


		function validasi() {
			var xval = 0;
			var sts = 1;

			if (sts == 1) {
				return true;
			} else {
				return false;
			}
			//return 'ok';
		}

		function addorder() {
			var cx = $('#form').serialize();
			$.post("<?php echo base_url('MasterDataControler/addsupplier') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Input Data Berhasil');
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
		}

		function del_row_transaksi(xid) {
			$('#transaksi-' + xid + '').remove();
			reorder();
			calc();
		}

		function reorder() {
			$('input[objtype=nourut]').each(function(i, obj) {
				$(this).val(i + 1);
			});
		}
	</script>