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

<body class="body" >
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
  </ol>
  <h3 class="text-white">Edit Company Profile</h3>
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
				<form action="<?php echo base_url('SuperAdminControler/addcompany') ?>" method="POST" enctype="multipart/form-data" id="form">
				<div class="row">
					<div class="col-3">
					 <div class="col d-flex align-middle" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					   <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
					</div>
				</div>
				<div class="row">
				 <div class="col">
						<p ><center><img src="<?php echo base_url('assets/icon/users.png')?>" alt="" style="height:96px;" ></center></p>
				  </div>
                </div>
				<div class="row" >
			    	<div class="col"  style="justify-content: center; display: flex;">
						<!-- <img src="<?= base_url("assets/img/lisa.jpg")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;"> -->
							<input type="file" name="logo" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
					</div>
                </div>
				<div class="row mb-2">
                   <div class="col-3"></div>
                   <div class="col-3"><h5>Informasi Dasar</h5></div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-3">
						<div class="mb-3">
							<p style="font-size:13px">Nama Perusahaan (Wajib)</p>
							<!-- <input type="hidden" name="idcomp" value="<?php echo $data["idcomp"] ?>"> -->
							<input type="text" class="form-control" id="namecomp" name="namecomp" value="<?= set_value('namecomp') ?>" placeholder="Masukan Nama Perusahaan" autocomplete="off" required>
						</div>
						<div class="mb-3">
							<p style="font-size:13px">No. Kantor (Wajib)</p>
							<input type="text" name="nokantor" id="nokantor" class="form-control" value="<?= set_value('nokantor') ?>" placeholder="Masukan Nomor Kantor" autocomplete="off" required>
						</div>
						<div class="mb-3">
							<p style="font-size:13px">No. Handphone</p>
							<input type="text" name="nohandphone" id="nohandphone" class="form-control"  value="<?= set_value('nohandphone') ?>" placeholder="Masukan No Handphone" autocomplete="off" required>
						</div>
					</div>
					<div class="col-3">
					<div class="mb-3">
							<p style="font-size:13px">Email</p>
							<input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Masukan Email Perusahaan" autocomplete="off" required>
						</div>
						<div class="mb-3">
							<p style="font-size:13px">Alamat (Wajib)</p>
							<textarea name="alamat" id="alamat" cols="6" rows="5" class="form-control" value="<?= set_value('alamat') ?>" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" required></textarea>
							<!-- <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email Pengguna" autocomplete="off" required> -->
						</div>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-3">
					</div>
					<div class="col-3">
					  <h5>Informasi Bank</h5>
					</div>
				</div>
				<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
				<div class="row mb-3">
					<div class="col-3">
					</div>
						<div class="col-6">
							<table class="table m-0">
								<thead class="border-0">
									<tr>
									<th style="background:#1143d8;color:white;text-align:right;">Pilih Bank</th>
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
							</table>
						</div>
				</div>
				<div class="row">
					<div class="col-3"></div>
					<div class="col-3"><h5>Remark Invoicce & Quotation</h5></div>
				</div>
				
				<div class="row">
					<div class="col-3"></div>
					<div class="col-3">
						<p>Remark Invoice</p>
						<textarea name="remarkinvoice" id="" cols="6" rows="4" value="<?= set_value('remarkinvoice') ?>" class="form-control"></textarea>
				    </div>
					<div class="col-3">
						<p>Remark Quotation</p>
						<textarea name="remarkquotation" id="" cols="6" rows="4" value="<?= set_value('remarkquotation') ?>" class="form-control"></textarea>
				    </div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-3">
					</div>
					<div class="col-3">
					<button type="button" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;font-size:15px;" onclick="addorder()">Simpan</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
</div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
	<script type="text/javascript">
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
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_bank"  class="form-control bank" name="transaksi_bank[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control " objtype="norekening" id="transaksi_' + xid + '_norekening" name="transaksi_norekening[]" value=""></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi_' + xid + '_beneficiary" objtype="_beneficiary" class="form-control  _beneficiary" name="transaksi_beneficiary[]" /></td>';
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

	$(document).on('change', '_nameitem', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_nameitem", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
			
		});
		
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

	function addorder() {
		var cx = $('#form').serialize();
			$.post("<?php echo base_url('SuperAdminControler/addcompany') ?>", cx,
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

	function cancelorder() {
		location.reload();
		//return false;
	}
	</script>