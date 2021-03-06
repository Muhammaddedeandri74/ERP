<form action="<?php echo base_url('MasterDataControler/editcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
			</ol>
			<h3 class="text-white">Tambah Customer Baru</h3>
		</nav>
	</div>
	<div class="content bg-white  mx-4">
		<div class="container-fluid">
			<div class="row">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>
			<div class="row mb-3">
				<input type="hidden" name="id" class="form-control" value="<?php echo $data["idcust"] ?>">
				<div class="col-6">
					<label for="" class="form-label fs-3">Tambah Customer Baru</label>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Code Customer</label>
							<input type="text" name="codecust" class="form-control" value="<?php echo $data["codecust"] ?>" readonly>
							<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Type Customer</label>
							<select name="typecust" class="form-select" aria-label="Default select example">
								<option value="Buyer">Buyer</option>
								<option value="Supplier">Supplier</option>
							</select>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Nama Customer</label>
							<input type="text" name="namecust" id="" value="<?php echo $data["namecust"] ?>" autocomplete="off" class="form-control" placeholder="Masukkan Nama Perusahaan">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Contact Person</label>
							<input type="text" name="nocontact" class="form-control" value="<?php echo $data["nocontact"] ?>" autocomplete="off" placeholder="Masukkan Contact Person">
						</div>
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
							<input type="email" name="email" id="email" value="<?php echo $data["email"] ?>" class="form-control" placeholder="Masukkan Email Pengguna" required autocomplete="off">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">No. Telpon</label>
							<input type="text" name="notelp" id="notelp" value="<?php echo $data["phonecust"] ?>" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Telepon Pengguna">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Alamat</label>
							<textarea name="alamat" class="form-control" id="" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" cols="30" rows="5"><?php echo $data["addresscust"] ?></textarea>
							<div class="text-end">
								<span style="font-size: 10px" class="text-muted">Maksimal 200 Karakter</span>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<div class="row">
								<div class="col-4">
									<p style="font-size: 16px">Status</p>
								</div>
								<div class="col-8">
									<?php if ($data["status"] == 0) : ?>
										<div class="form-check form-switch">
											<input name="status" class="form-check-input" type="checkbox" id="check">
										</div>
									<?php else : ?>
										<div class="form-check form-switch">
											<input name="status" class="form-check-input" type="checkbox" id="check" checked>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-6"></div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px;">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	// ========================REGISTER CUSTOMER======================
	add_row_customer(0);

	function add_row_customer(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td style="border:none;"><input style="text-align:center" autocomplete="off" type="text" class="form-control bank" name="namabank[]" value=""/></td>';
		tabel += '<td style="border:none;"><input style="text-align:center" type="text" class="form-control " name="norekening[]" value=""></td>';
		tabel += '<td style="border:none;"><input type="text" class="form-control" name="beneficiary[]" /></td>';
		tabel += '<td style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_customer(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailxnxx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_customer(' + xxid + ')"><b>+</b>', 'onclick="del_row_customer(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	$(function() {
		$("#check").click(function() {
			if ($(this).is(":checked")) {
				$("#check").val(1);
			} else {
				$("#check").val(0);
			}
			calc();
		});
	});

	$('forms button').on("click", function(e) {
		if ($(this).attr('id') == "addcust") {
			var xask = '';
			if ($("#idcust").val() == "") {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addcustx();
				}
			}
		}
		e.preventDefault();
	});

	function del_row_customer(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}

	function cancelorder() {
		location.reload();
	}

	function addcustx() {
		var cx = $('#forms').serialize();
		$.post("<?php echo base_url('MasterDataControler/newcustomer') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			});
	}
</script>