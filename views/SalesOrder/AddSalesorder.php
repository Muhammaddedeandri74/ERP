<?php
$idnew;
if ($data1 != "Not Found") {
	foreach ($data1 as $key) {
		$idnew = $key["codeso"];
		$idnew++;
	}
} else {
	$idnew = "SLS-20220412-001";
}
?>

<form action="<?php echo base_url('MasterDataControler/addsalesorder') ?>" method="POST" enctype="multipart/form-data" id="form">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Order</li>
			</ol>
			<h3 class="text-white">Register Order Confirmation</h3>
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
						<input type="hidden" name="idso" id="idso">
						<input type="hidden" name="codeso" id="codeso">
						<div class="row">
							<div class="col-4">
								<label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">No. Sales Order</label>
										<input type="text" name="codeso" class="form-control" value="<?php echo $idnew ?>" readonly>
										<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
										<input type="hidden" name="idso" class="form-control">
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">No Quotation</label>
										<input type="text" name="idquo" class="form-control" value="" autocomplete="off" readonly>
									</div>
									<div class="col-4">
										<p></p>
										<a href="" data-mdb-toggle="modal" data-mdb-target="#modaldata" class="btn btn-primary mt-3">Cari Data</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">Tipe Order</label>
										<select name="tipeorder" id="" class="form-select">
											<option value="E-Commerce">E-Commerce</option>
											<option value="B2B">B2B</option>
										</select>
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">Customer</label>
										<select name="supplier" id="supplier" class="form-select selectpicker" data-live-search="true" required onchange="supp(this.value)">
											<option value="">Pilih</option>
											<?php if ($data2 != "Not Found") : ?>
												<?php foreach ($data2 as $key) : ?>
													<option value="<?php echo $key["idsupp"] ?>"><?php echo $key["namesupp"] ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row">
									<div class="col-6">
										<a style="font-size:13px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary">+ Customer Baru</a>
									</div>
									<div class="col-6"></div>
								</div>
							</div>
							<div class="col-4">
								<label for="" class="form-label fs-3 mb-3">Informasi Detail Pesanan</label>
								<div class="row mb-3">
									<div class="col-5">
										<label for="" class="form-label">Tanggal Order</label>
										<input type="date" name="dateso" id="dateso" style="cursor: pointer;" class="form-control">
									</div>
									<div class="col-5">
										<label for="" class="form-label">Tanggal Pengiriman</label>
										<input type="date" name="delivdate" id="delivedate" style="cursor: pointer;" class="form-control">
									</div>
									<div class="col-2"></div>
								</div>
								<div class="row mb-3">
									<div class="col-10">
										<label for="" class="form-label">No Pesanan (E-Commerce)</label>
										<input type="text" name="nopesanan" class="form-control">
									</div>
									<div class="col-2"></div>
								</div>
								<div class="row mb-3">
									<div class="col-5">
										<label for="" class="form-label">No. Kontak</label>
										<input type="text" name="nokontak" class="form-control" placeholder="+62 xxxxxxxx">
									</div>
									<div class="col-5">
										<label for="" class="form-label">Ongkos Kirim</label>
										<input type="text" name="ongkir" id="ongkira" class="form-control" placeholder="Rp. -" name="" id="">
									</div>
									<div class="col-2"></div>
								</div>
								<div class="row mb-3">
									<div class="col-10">
										<label for="" class="form-label">Alamat Pengiriman</label>
										<textarea name="delivaddr" id="delivaddr" cols="4" rows="4" class="form-control"></textarea>
									</div>
									<div class="col-2"></div>
								</div>
							</div>
							<div class="col-4">
								<label for="" class="form-label fs-3 mb-3">Metode Pembayaran</label>
								<div class="row mb-3">
									<div class="col-5">
										<label for="" class="form-label">Metode Pembayaran</label>
										<select name="paymentmethod" id="paymentmethod" class="form-select" required>
											<?php if ($data3 != "Not Found") : ?>
												<?php foreach ($data3 as $key) : ?>
													<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-5">
										<label for="" class="form-label">Rekening Bank</label>
										<select name="norekening" id="norekening" class="form-select">
											<option value="">Pilih</option>
											<?php if ($data2 != "Not Found") : ?>
												<?php foreach ($data2 as $key) : ?>
													<option value="<?php echo $key["norekening"] ?>"><?php echo $key["norekening"] ?> - <?php echo $key["namabank"] ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-2"></div>
								</div>
								<div class="row mb-3">
									<label for="" class="form-label fs-4">Pajak</label>
									<div class="row">
										<div class="col-4">
											<label for="" class="form-label">Gunakan VAT</label>
										</div>
										<div class="col-8">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" name="vat" value="1" class="form-check-input" id="check" checked>
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<label for="" class="form-label fs-4 mb-3">Cetak & Download</label>
									<div class="col-3">
										<button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
									</div>
									<div class="col-3">
										<button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
									</div>
									<div class="col-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="" class="form-label fs-3">Item/Produk</label>
				<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
				<table class="table m-0">
					<thead class="border-0">
						<tr>
							<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">SKU</th>
							<th style="background:#1143d8;color:white;text-align:center;width:18.25rem;">Nama Item</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Deskripsi</th>
							<th style="background:#1143d8;color:white;text-align:center;width:15rem;">Harga</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10rem;">Qty</th>
							<th style="background:#1143d8;color:white;text-align:center;width:15rem;">Total</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10rem;">Disc Nominal</th>
							<th style="background:#1143d8;color:white;text-align:center;width:7rem;">Disc Persen</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Grand Total</th>
							<th style="background:#1143d8;color:white;text-align:center;">Action</th>
						</tr>
					</thead>
				</table>
				<table class="table table-striped table-hover">
					<tbody id="detailx">
					</tbody>
				</table>
				<div class="row">
					<div class="col-8"></div>
					<div class="col-4">
						<div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
							<div class="row">
								<div class="col-6">
									<p>Sub Total</p>
								</div>
								<div class="col-6">
									<input type="text" name="subtotal" id="subtotal" class="form-control border-0 bg-transparent" placeholder="Rp. -">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Discount Nominal</p>
								</div>
								<div class="col-6">
									<input type="text" name="disglob" id="disnoms" class="form-control" oninput="calc()">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Discount Persen</p>
								</div>
								<div class="col-6">
									<input type="text" name="dispers" id="dispers" class="form-control" oninput="calc()">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Total Setelah Discount </p>
								</div>
								<div class="col-6">
									<input type="text" name="totaldisc" id="totaldisc" placeholder="Rp. -" class="form-control border-0 bg-transparent">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>V.A.T </p>
								</div>
								<div class="col-6">
									<input type="text" name="vat" id="vat" placeholder="Rp. -" class="form-control border-0 bg-transparent">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Ongkos Kirim</p>
								</div>
								<div class="col-6">
									<input type="text" name="ongkir" id="ongkir" placeholder="Rp. -" class="form-control" oninput="calc()">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Grand Total</p>
								</div>
								<div class="col-6">
									<input type="text" name="grandtotal" placeholder="Rp. -" id="grandtotal" class="form-control border-0 bg-transparent">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="mr-4 mt-3" style="text-align:right;">
					<button type="button" class="btn btn-primary" style="font-size:13px;" id="addorder" onclick="addorder()">Simpan</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">TAMBAH CUSTOMER BARU</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<div class="modal-body">
					<div class="row mb-3">
						<div class="col-6">
							<label for="" class="form-label">User ID</label>
							<input type="text" class="form-control" placeholder="123121" name="" id="" readonly>
						</div>
						<div class="col-6">
							<label for="" class="form-label">Email</label>
							<input type="text" class="form-control" placeholder="Masukkan Email Pengguna" name="" id="">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-6">
							<label for="" class="form-label">Type Customer</label>
							<select class="form-select" aria-label="Default select example">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="col-6">
							<label for="" class="form-label">No. Telpon</label>
							<input type="text" class="form-control" placeholder="Masukkan Nomor Telepon Pengguna" name="" id="">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-6">
							<div class="row mb-3">
								<div class="col">
									<label for="" class="form-label">Nama Perusahaan</label>
									<input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" name="" id="">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="" class="form-label">Contact Person</label>
									<input type="text" class="form-control" placeholder="Masukkan Contact Person" name="" id="">
								</div>
							</div>
						</div>
						<div class="col-6">
							<label for="" class="form-label">Alamat</label>
							<textarea name="" class="form-control" id="" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" cols="30" rows="4"></textarea>
							<div class="text-end">
								<span style="font-size: 10px" class="text-muted">Maksimal 200 Karakter</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="" class="form-label fs-3 mb-3">Informasi Bank</label>
							<table class="table">
								<thead>
									<tr>
										<td>Pilih Bank</td>
										<td>Nomor Rekening</td>
										<td>Attr/Beneficiary</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>~</td>
										<td>~</td>
										<td>~</td>
										<td>
											<div class="row">
												<div class="col-6">
													<a href="" class="btn btn-danger"><i class="bx bx-trash"></i></a>
												</div>
												<div class="col-6">
													<a href="" class="btn btn-primary"><i class="bx bx-plus"></i></a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">SIMPAN</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modaldata" tabindex="-1" aria-labelledby="modaldataLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">PILIH DATA QUOTATION</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-5 mb-3">
							<label for="exampleFormControlInput1" class="form-label">Pencarian</label>
							<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Cari Berdasarkan Customer">
						</div>
						<div class="col-1"></div>
						<div class="col-6">
							<div class="row">
								<div class="col-4">
									<label for="exampleFormControlInput1" class="form-label">Pencarian</label>
									<input type="date" class="form-control" id="exampleFormControlInput1">
								</div>
								<div class="col-4">
									<label for="exampleFormControlInput1" class="form-label">Pencarian</label>
									<input type="date" class="form-control" id="exampleFormControlInput1">
								</div>
								<div class="col-4 mb-5">
									<p></p>
									<a href="" class="btn btn-primary mt-3">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<td>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
										</div>
									</td>
									<td>No. Quotation</td>
									<td>Judul Quotation</td>
									<td>Customer</td>
									<td>Qty Item</td>
									<td>Total Amount</td>
									<td>Status <i class='bx bx-down-arrow-alt'></i></td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>sscanf</td>
									<td>sscanf</td>
									<td>sscanf</td>
									<td>sscanf</td>
									<td>sscanf</td>
									<td>sscanf</td>
									<td>sscanf</td>
									<td><a href="" class="btn btn-primary">Pilih</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">SIMPAN</button>
				</div>
			</div>
		</div>
	</div>
</form>
<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" price="<?php echo $key["price"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["nameitem"] . ' - Rp. ' . number_format($key['price'], 0, '.', ','); ?></option>
	<?php }
	} ?>
</datalist>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	// $(function() {
	// 	$('.selectpicker').selectpicker();
	// });

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

	function supp(x) {
		var data = <?php echo json_encode($data2) ?>;
		for (let i = 0; i < data.length; i++) {
			if (data[i]["idsupp"] == x) {
				$('#norekening').val(data[i]["norekening"], data[i]["namabank"])
			}

		}
	}

	add_row_transaksi(0)
	var xitem = '';
	xitem = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["price"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	var xunit = '';
	xunit = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '">' . $key["nameitem"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
			}
		});
	}

	function reorder() {
		$('input[objtype=nourut]').each(function(i, obj) {
			$(this).val(i + 1);
		});
	}

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#uimg')
					.attr('src', e.target.result)
					.width(412)
					.height(309);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / >';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="discountpersent(' + xid + ',this.value)" ></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_grandtotal" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_grandtotal[]' + xid + '_grandtotal"  autocomplete="off" value="0" readonly></td>';
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

	function discountpersent(disc, disc1) {
		if (disc1 > 100) {
			$('#transaksi_' + disc + '_discpersen').val(100);
			alert("Maaf Angka terlalu banyak");

		} else if (disc1 < 1) {
			$('#transaksi_' + disc + '_discpersen').val(0);
			alert("Masukan Discount");
		}

	}



	$(document).on('change', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_harga').val();
			$('#transaksi_' + xid + 'qty').val(0);
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('price'));
			$('#transaksi_' + xid + 'qty').val(xobj.data('qty'));
		}
		calc();
	});

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			if ($("#idpo").val() == "") {
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

		xval = $("#supplier").val();
		if (xval == "") {
			alert('Input Supplier');
			sts = 0;
			return false;
		}

		xval = $("#namewarehouse").val();
		if (xval == "") {
			alert('Input Gudang Penerima');
			sts = 0;
			return false;
		}

		xval = $("#datepo").val();
		if ($("#datepo").val() == '') {
			alert('Input Tanggal Masuk');
			sts = 0;
			return false;
		}

		xval = $("#mataung").val();
		if ($("#matauang").val() == '') {
			alert('Input Matauang');
			sts = 0;
			return false;
		}

		xval = $("#_qty").val();
		if ($("#_qty").val() == 0) {
			alert('Input QTY');
			sts = 0;
			return false;
		}

		if (sts == 1) {
			return true;
		} else {
			return false;
		}
		//return 'ok';
	}

	function count(xid) {
		var harga = $('#transaksi_' + xid + '_harga').val();
		var qty = $('#transaksi_' + xid + '_qty').val();
		var disnom = $('#transaksi_' + xid + '_discnominal').val();
		var disper = $('#transaksi_' + xid + '_discpersen').val();
		var totals = parseFloat(harga.replaceAll(".", "") * qty);
		var grandtot = parseFloat(harga.replaceAll(".", "") * qty - disnom);

		$('#transaksi_' + xid + '_total').val(totals);
		$('#transaksi_' + xid + '_grandtotal').val(grandtot);

		calc();

	}

	function calc() {
		var xttl = 0;
		var dpp = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xttl += parseFloat($('#transaksi_' + xid + '_grandtotal').val().replaceAll(',', ''));
				dpp += parseFloat($('#transaksi_' + xid + '_harga').val().replaceAll('.', '') * $('#transaksi_' + xid + '_qty').val());
				totaldisc = xttl - $('#disnoms').val();

				if ($("#check").val() == 1) {
					vat = totaldisc * 11 / 100;
				} else {
					vat = 0;
				}

				totaldisc = xttl - $('#disnoms').val();
				grandtot = totaldisc + $('#ongkir').val() + vat;

			}

		});



		$('#dpp').val(formatnum(dpp));
		$('#subtotal').val(formatnum(xttl));
		$('#totaldisc').val(formatnum(totaldisc));
		$('#vat').val(formatnum(vat));
		$('#grandtotal').val(formatnum(grandtot));

	}

	function addorder() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addpo') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			});
	}

	function cancelorder() {
		location.reload();
	}
</script>