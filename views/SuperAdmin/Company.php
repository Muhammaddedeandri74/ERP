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
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('SuperAdminControler/addcompany') ?>" method="POST" enctype="multipart/form-data" id="form">
			<div class="row">
				<div class="col-4"></div>
				<div class="col-4">
					<div class="row">
						<div class="col">
							<p>
								<center><img src="<?php echo base_url('assets/icon/users.png') ?>" alt="" style="height:96px;"></center>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col" style="justify-content: center; display: flex;">
							<!-- <img src="<?= base_url("assets/img/lisa.jpg")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;"> -->
							<input type="file" name="logo" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
						</div>
					</div>
				</div>
				<div class="col-4"></div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="" class="form-label fs-3">Informasi Dasar</label>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Nama Perusahaan (Wajib)</label>
							<input type="hidden" class="form-control" id="idcomp" name="idcomp" value="<?php echo $data["idcomp"] ?>" placeholder="Masukan Nama Perusahaan" autocomplete="off" required>
							<input type="text" class="form-control" id="namecomp" name="namecomp" value="<?php echo $data["namecomp"] ?>" placeholder="Masukan Nama Perusahaan" autocomplete="off" required>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">No. Kantor (Wajib)</label>
							<input type="text" name="nokantor" id="nokantor" class="form-control" value="<?php echo $data["nokantor"] ?>" placeholder="Masukan Nomor Kantor" autocomplete="off" required>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">No. Handphone</label>
							<input type="text" name="nohandphone" id="nohandphone" class="form-control" value="<?php echo $data["nohandphone"] ?>" placeholder="Masukan No Handphone" autocomplete="off" required>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-10"></div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-6">
					<div class="mt-5">
						<p></p>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $data["email"] ?>" placeholder="Masukan Email Perusahaan" autocomplete="off" required>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Alamat (Wajib)</label>
							<textarea name="alamat" id="alamat" cols="6" rows="5" class="form-control" value="<?php echo $data["alamat"] ?>" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" required><?php echo $data["alamat"] ?></textarea>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<div class="row mb-3">
				<div class="col">
					<label for="" class="form-label fs-3">Informasi Bank</label>
					<table class="table table-bordered">
						<thead class="text-white text-center " style="background:#1143d8">
							<tr>
								<th>Pilih Bank</th>
								<th>Nomor Rekening</th>
								<th>Attn/Beneficiary</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="detailx">
						</tbody>
					</table>
				</div>
			</div>
			<div class="row mb-3">
				<label for="" class="form-label fs-3">Remark Invoice & Quotation</label>
				<div class="col-6">
					<div class="row">
						<div class="col-10">
							<label for="" class="form-label">Remark Invoice</label>
							<textarea name="remarkinvoice" id="" cols="6" rows="4" value="<?php echo $data["remarkinvoice"] ?>" class="form-control"><?php echo $data["remarkinvoice"] ?></textarea>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-10">
							<label for="" class="form-label">Remark Quotation</label>
							<textarea name="remarkquotation" id="" cols="6" rows="4" value="<?php echo $data["remarkquotation"] ?>" class="form-control"><?php echo $data["remarkquotation"] ?></textarea>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<div class="text-end">
				<button type="button" class="btn btn-primary px-5" id="addorder" onclick="addorder()">Simpan</button>
			</div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
	// add_row_transaksi(0);
	var data = <?php echo json_encode($data) ?>;
	console.log(data)
	if (data["detail"] != "Not Found") {
		for (let i = 0; i < data["detail"].length; i++) {
			var xid = Number(i) + Number(1);
			add_row_transaksi(i)
			$('#transaksi_' + xid + '_bank').val(data["detail"][i]["bank"]);
			$('#transaksi_' + xid + '_norekening').val(data["detail"][i]["norekening"]);
			$('#transaksi_' + xid + '_beneficiary').val(data["detail"][i]["beneficiary"]);
		}

	} else {
		add_row_transaksi(0);

	}

	// add_row_transaksi(0);


	function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_idcompdet"  class="form-control  idcompdet" name="idcompdet" / >';
		tabel += '<td style="border:none;"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_bank"  class="form-control bank" name="bank[]" value=""/></td>';
		tabel += '<td style="border:none;"><input style="text-align:center" type="text" class="form-control " objtype="norekening" id="transaksi_' + xid + '_norekening" name="norekening[]" value=""></td>';
		tabel += '<td style="border:none;"><input type="text" id="transaksi_' + xid + '_beneficiary" objtype="_beneficiary" class="form-control  _beneficiary" name="beneficiary[]" /></td>';
		tabel += '<td style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			if ($("#idcomp").val() == "") {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Simpan Transaksi?";
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

		xval = $("#namecomp").val();
		if ($("#namecomp").val() == '') {
			alert('Nama Perusahaan Wajib Diisi');
			sts = 0;
			return false;
		}


		xval = $("#nocontact").val();
		if ($("#nocontact").val() == '') {
			alert('Nocontact Wajib Diisi');
			sts = 0;
			return false;
		}


		if (sts == 1) {
			return true;
		} else {
			return false;
		}
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