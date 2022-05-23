<?php
$idnew;
if ($data1 != "Not Found") {
	foreach ($data1 as $key) {
		$idnew = $key["codeso"];
		$idnew++;
	}
} else {
	$idnew = "SLS-TRS-1";
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
						<div class="row">
							<div class="col-4">
								<label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">No. Sales Order</label>
										<input type="text" name="codeso" id="codesox" class="form-control" value="<?php echo $idnew ?>" readonly>
										<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
										<input type="hidden" name="idso" id="idso" class="form-control" value="">
										<input type="hidden" name="statusso" id="statusso" class="form-control" value="">
									</div>
									<div class="col-4">
										<p></p>
										<a href="#" data-mdb-toggle="modal" data-mdb-target="#modalsales" class="btn btn-primary mt-3" onclick="loaddatapo()">Cari Data</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">No Quotation</label>
										<input type="text" name="codequo" id="codequox" class="form-control" value="" autocomplete="off" readonly>
										<input type="hidden" name="idquo" id="idquo" class="form-control" value="" autocomplete="off" readonly>
									</div>
									<div class="col-4">
										<p></p>
										<a href="#" data-mdb-toggle="modal" id="loadquo" data-mdb-target="#exampleModal" class="btn btn-primary mt-3" onclick="loaddata()">Cari Data</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">Tipe Order</label>
										<select name="tipeorder" id="tipeorder" class="form-select">
											<option value="">Pilih</option>
											<option value="E-Commerce">E-Commerce</option>
											<option value="B2B">B2B</option>
										</select>
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">Gudang</label>
										<select name="idwh" id="idwh" class="form-select" required onchange="gudangselect(this.value)">
											<option value="">Pilih</option>
											<?php if ($data6 != "Not Found") {
												foreach ($data6 as $key) { ?>
													<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>

											<?php }
											} ?>
										</select>
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row mb-3">
									<div class="col-8">
										<label for="" class="form-label">Customer</label>
										<select name="idcustx" id="idcust" class="form-select" required onchange="customer(this.value)">
											<option value="">Pilih</option>
											<?php if ($data2 != "Not Found") : ?>
												<?php foreach ($data2 as $key) : if ($key["typecust"] == "Buyer") { ?>
														<option value="<?php echo $key["idcust"] ?>"><?php echo $key["namecust"] ?></option>
												<?php }
												endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-4"></div>
								</div>
								<div class="row mb-3">
									<div class="col-6">
										<!-- <a style="font-size:13px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary" onclick="add_row_customer(0)">+ Customer Baru</a> -->
									</div>
									<div class="col-6"></div>
								</div>
							</div>
							<div class="col-4">
								<label for="" class="form-label fs-3 mb-3">Informasi Detail Pesanan</label>
								<div class="row mb-3">
									<div class="col-5">
										<label for="" class="form-label">Tanggal Order</label>
										<input type="date" name="dateso" id="dateso" style="cursor: pointer;" class="form-control" value="<?php echo date('Y-m-d') ?>">
									</div>
									<div class="col-5">
										<label for="" class="form-label">Tanggal Pengiriman</label>
										<input type="date" name="delivdate" id="delivdate" style="cursor: pointer;" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 days")) ?>">
									</div>
									<div class="col-2"></div>
								</div>
								<div class="row mb-3">
									<div class="col-5">
										<label for="" class="form-label">No Pesanan</label>
										<input type="text" name="nopesanan" id="nopesanan" style="cursor: pointer;" class="form-control" autocomplete="off" required>
									</div>
									<div class="col-5">
										<label for="" class="form-label">No. Kontak</label>
										<input type="text" name="nocontact" id="nocontact" class="form-control">
										<!-- <select name="nocontact" id="nocontact" class="form-select">
											<option value="">Pilih</option>
											<?php if ($data2 != "Not Found") : ?>
												<?php foreach ($data2 as $key) : ?>
													<option value="<?php echo $key["nocontact"] ?>"><?php echo $key["nocontact"] ?> </option>
												<?php endforeach ?>
											<?php endif ?>
										</select> -->
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
											<option value="">Pilih</option>
											<?php if ($data3 != "Not Found") : ?>
												<?php foreach ($data3 as $key) : ?>
													<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-5">
										<label for="" class="form-label">Rekening Bank</label>
										<select name="norekening" id="norekeningx" class="form-select">
											<option value="">Pilih No.Rekening</option>
											<?php if ($data5 != "Not Found") : ?>

												<?php foreach ($data5 as $key) : ?>
													<option value="<?php echo $key["norekening"] ?>"><?php echo  $key["beneficiary"] ?> - <?php echo $key["norekening"] ?> ( <?php echo $key["bank"]  ?> )</option>
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
												<input class="form-check-input" type="checkbox" class="form-check-input" id="check" checked onclick="calc()">
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-3" id="action" style="display: none;">
									<label for="" class="form-label fs-4 mb-3">Cetak & Download</label>
									<div class="col-3">
										<button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
									</div>
									<div class="col-3">
										<button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
									</div>
									<div class="col-3">
										<a href="" class="btn btn-light"><i class='bx bx-reset'> Buat Baru</i></a>

									</div>
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
							<th style="background:#1143d8;color:white;text-align:center;width:15rem;">Qty Stock</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10rem;">Qty Order</th>
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
									<input type="text" name="subtotal" id="subtotalx" class="form-control border-0 bg-transparent" placeholder="Rp. -">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Discount Nominal</p>
								</div>
								<div class="col-6">
									<input type="text" name="disnom" id="disnoms" class="form-control" oninput="disnomm()">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Discount Persen</p>
								</div>
								<div class="col-6">
									<input type="text" name="disper" id="disper" class="form-control" oninput="calc()">
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
					<button type="button" class="btn btn-danger" style="font-size:13px; display:none;" id="cancel" onclick="cancelso()">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">List Quotation</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<input type="hidden" name="idcust" id="idcust">
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
											<option value="codequo">No.Quotation</option>
											<option value="namequotation">Nama Quotation</option>
											<option value="namecust">Nama Customer</option>
										</select>
										<input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
									</div>
								</div>
								<div class="col-4">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statusquo" aria-label="Default select example">
										<option value="">Pilih Status Quotation</option>
										<option value="Waiting">Waiting</option>
										<option value="Process">Process</option>
										<option value="Finish">Finish</option>
										<option value="Cancel">Cancel</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-1"></div>
						<div class="col-5">
							<div class="row">
								<div class="col-4">
									<label for="" class="form-label">Mulai Dari</label>
									<input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
								</div>
								<div class="col-4">
									<p></p>
									<a href="#" class="btn btn-primary mt-3" onclick="loaddata()">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table">
								<thead>
									<tr>
										<th>No. Quotation</th>
										<th>Judul Quotation</th>
										<th>Customer</th>
										<th>Tanggal Exp</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailxx">
									<!-- <?php if ($data3 != "Not Found") {
												foreach ($data3 as $key) { ?>
                                        <tr>
                                            <td><?php echo $key["codequo"] ?></td>
                                            <td><?php echo $key["namequotation"] ?></td>
                                            <td><?php echo $key["namecust"] ?></td>
                                            <td><?php echo $key["expquo"] ?></td>
                                            <td><?php echo $key["statusquo"] ?></td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailquo(<?php echo $key["idquo"] ?>)">Pilih</a></td>
                                        </tr>
                                <?php }
											} ?> -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalsales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">List Sales Order</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<input type="hidden" name="idcust" id="idcust">
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterx">
											<option value="codeso">No.Sales Order</option>

											<option value="namecust">Nama Customer</option>
										</select>
										<input type="text" id="searchx" class="form-control" placeholder="Cari Berdasarkan Filter">
									</div>
								</div>
								<div class="col-4">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statusx" aria-label="Default select example">
										<option value="">Pilih Status Quotation</option>
										<option value="Waiting">Waiting</option>
										<option value="Process">Process</option>
										<option value="Finish">Finish</option>
										<option value="Cancel">Cancel</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-1"></div>
						<div class="col-5">
							<div class="row">
								<div class="col-4">
									<label for="" class="form-label">Mulai Dari</label>
									<input type="date" class="form-control" name="" id="datestartx" value="<?php echo date('Y-m-01') ?>">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" class="form-control" name="" id="finishdatex" value="<?php echo date('Y-m-t') ?>">
								</div>
								<div class="col-4">
									<p></p>
									<a href="#" class="btn btn-primary mt-3" onclick="loaddata()">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table">
								<thead>
									<tr>
										<th>No. Sales Order</th>
										<th>Tgl. Transaksi</th>
										<th>Customer</th>
										<th>Item</th>
										<th>Sub Total</th>
										<th>VAT</th>
										<th>Ongkos Kirim</th>
										<th>Total Amount</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailxxx">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
$idcust;
if ($data2 != "Not Found") {
	foreach ($data2 as $key) {
		$idcust = $key["codecust"];
		$idcust++;
	}
} else {
	$idcust = "CC01";
}
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
			<div class="modal-header" style="background:#1143d8;color:white;">
				<h5 class="modal-title" id="exampleModalLabel">TAMBAH CUSTOMER BARU</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
			</div>
			<input type="hidden" name="idcust" id="idcust">
			<div class="modal-body">
				<div class="row mb-3">
					<div class="col-6">
						<label for="" class="form-label">Code Customer</label>
						<input type="text" name="codecust" class="form-control" value="<?php echo $idcust ?>" readonly>
						<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
					</div>
					<div class="col-6">
						<label for="" class="form-label">Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Pengguna" required autocomplete="off">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-6">
						<label for="" class="form-label">Type Customer</label>
						<select name="typecust" class="form-select" aria-label="Default select example">
							<option Value="">Pilih</option>
							<option value="Buyer">Buyer</option>
							<option value="Supplier">Supplier</option>
						</select>
					</div>
					<div class="col-6">
						<label for="" class="form-label">No. Telpon</label>
						<input type="text" name="notelp" id="notelp" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Telepon Pengguna">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-6">
						<div class="row mb-3">
							<div class="col">
								<label for="" class="form-label">Nama Perusahaan</label>
								<input type="text" name="namaperusahaan" id="" autocomplete="off" class="form-control" placeholder="Masukkan Nama Perusahaan">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="" class="form-label">Contact Person</label>
								<input type="text" name="nocontact" class="form-control" autocomplete="off" placeholder="Masukkan Contact Person">
							</div>
						</div>
					</div>
					<div class="col-6">
						<label for="" class="form-label">Alamat</label>
						<textarea name="alamat" class="form-control" id="" placeholder="Nama Jalan, Kecamatan, Kota, Provinsi" cols="30" rows="4"></textarea>
						<div class="text-end">
							<span style="font-size: 10px" class="text-muted">Maksimal 200 Karakter</span>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-3">
					</div>
					<div class="col-12">
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
							<tbody id="detailxnxx">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="addcust" onclick="addcustx()">SIMPAN</button>

			</div>
			<!-- </form> -->
		</div>
	</div>
</div>
<!-- <?php print_r($data) ?> -->
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
	add_row_transaksi(0)
	disableForm(document.getElementById('form'))
	document.getElementById('idwh').disabled = false;
	// $(function() {
	// 	$('.selectpicker').selectpicker();
	// });

	function gudangselect(x) {
		if (x == "") {
			disableForm(document.getElementById('form'))
			document.getElementById('idwh').disabled = false;
		} else {
			enableform(document.getElementById('form'))
			calc()
		}

	}

	function loaddata() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('QuotationController/getlistquo') ?>",
			data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statusquo=" + $('#statusquo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
			dataType: "JSON",
			success: function(hasil) {

				console.log(hasil)
				var baris = ""
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {

						if (hasil[i]["statusquo"] == "Waiting") {
							baris += `  <tr>
                                            <td>` + hasil[i]["codequo"] + `</td>
                                            <td>` + hasil[i]["namequotation"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["expquo"] + `</td>
                                            <td>` + hasil[i]["statusquo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailquo(` + hasil[i]["idquo"] + `)">Pilih</a></td>
                                        </tr>`
						}

					}


				}
				$('#detailxx').html(baris)
			}

		});
	}



	function loaddatapo() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('OrderManagementController/orderreportload') ?>",
			data: "filter=" + $('#filterx').val() + "&search=" + $('#searchx').val() + "&status=" + $('#statusx').val() + "&date1=" + $('#datestartx').val() + "&date2=" + $('#finishdatex').val(),
			dataType: "JSON",
			success: function(hasil) {

				console.log(hasil)
				var baris = ""
				totalquo = 0
				totalitem = 0
				totalsub = 0
				totalvat = 0
				totalongkir = 0
				totalamount = 0
				waiting = 0
				finish = 0
				cancel = 0
				process = 0;
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {


						baris += `  <tr>
                                    
                                    <td>` + hasil[i]["codeso"] + `</td>
                                    <td>` + hasil[i]["dateso"] + `</td>
                                    <td>` + hasil[i]["namecust"] + `</td>
                                    <td>` + hasil[i]["data"].length + `</td>
                                    <td>` + formatRupiah(hasil[i]["subtotal"] + " ", "Rp.") + `</td>
                                    <td>` + formatRupiah(hasil[i]["vat"] + " ", "Rp.") + `</td>
                                    <td>` + formatRupiah(hasil[i]["ongkir"] + " ", "Rp.") + `</td>
                                    
                                    <td>` + formatRupiah(hasil[i]["grandtotalso"] + " ", "Rp.") + `</td>
                                    <td style="text-align:left;">
                                        ` + hasil[i]["statusorder"] + `
                                    </td>
                              
									<td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="cekdetail(` + hasil[i]["idso"] + `)">Pilih</a></td>
                                </tr>`


					}

					$('#detailxxx').html(baris)

				}




			}

		});
	}

	function cekdetail(x) {

		var ix = 1;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('OrderManagementController/detailsalesorder') ?>",
			data: "idso=" + x,
			dataType: "JSON",
			success: function(hasil) {
				var baris = "";
				$('#codesox').val(hasil["codeso"])
				$('#idso').val(hasil["idso"])
				$('#idwh').val(hasil["idwh"])
				$('#codequox').val(hasil["codequo"])
				$('#idquo').val(hasil["idquo"])
				$('#tipeorder').val(hasil["tipeorder"])
				$('#idcust').val(hasil["idcust"])
				$('#nopesanan').val(hasil["nopesanan"])
				$('#paymentmethod').val(hasil["typepayment"])
				$('#norekeningx').val(hasil["norekening"])
				$('#disnoms').val(hasil["disnomdet"]);
				$('#ongkir').val(hasil["ongkir"]);
				$('#action').show();
				customer(hasil["idcust"])
				if (hasil["vat"] == 0) {
					$("#check").prop("checked", false);
				} else {
					$("#check").prop("checked", true);
				}



				$('#detailx').html("")


				for (var i = 0; i <= hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1)
					if (hasil["data"][i] != null) {
						$('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
						var val = hasil["data"][i]["sku"];
						var xobj = $('#xitem option').filter(function() {
							return this.value == val;
						});
						$('#transaksiksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
						$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
						$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
						$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
						$('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
						$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qtyso"]);
						$('#transaksi_' + xid + '_discnominal').val(hasil["data"][i]["disnomdet"]);
						count(xid)
						calc();
					}



				}
				console.log(hasil)
				$('#xdetails').html(baris);

				if (hasil["statusorder"] == "Waiting" || hasil["statusorder"] == "Pending") {
					$('#addorder').show();
					$('#loadquo').show();
					$('#cancel').show();
					document.getElementById('tipeorder').readOnly = false;
					document.getElementById('idcust').readOnly = false;
					document.getElementById('dateso').readOnly = false;
					document.getElementById('delivdate').readOnly = false;
					document.getElementById('nocontact').readOnly = false;
					document.getElementById('nopesanan').readOnly = false;
					document.getElementById('delivaddr').readOnly = false;
					document.getElementById('paymentmethod').readOnly = false;
					document.getElementById('norekeningx').readOnly = false;
					document.getElementById('check').disabled = false;
					enableform(document.getElementById('form'))

				} else {
					$('#addorder').hide();
					$('#cancel').hide();
					$('#loadquo').hide();
					document.getElementById('tipeorder').readOnly = true;
					document.getElementById('idcust').readOnly = true;
					document.getElementById('dateso').readOnly = true;
					document.getElementById('delivdate').readOnly = true;
					document.getElementById('nocontact').readOnly = true;
					document.getElementById('nopesanan').readOnly = true;
					document.getElementById('delivaddr').readOnly = true;
					document.getElementById('paymentmethod').readOnly = true;
					document.getElementById('norekeningx').readOnly = true;
					document.getElementById('check').disabled = true;
					disableForm(document.getElementById('form'))

				}
			}
		})



	}

	function disableForm(form) {
		var length = form.elements.length,
			i;
		for (i = 0; i < length; i++) {
			form.elements[i].disabled = true;
		}
	}

	function enableform(form) {
		var length = form.elements.length,
			i;
		for (i = 0; i < length; i++) {
			form.elements[i].disabled = false;
		}
	}

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	function detailquo(x) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('QuotationController/detailquo') ?>",
			data: "idquo=" + x,
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				$('#custname').val(hasil["namecust"]);
				$('#address').html(hasil["delivaddr"]);
				$('#codequox').val(hasil["codequo"]);
				$('#idquo').val(hasil["idquo"]);
				$('#idcust').val(hasil["idcust"]);
				$('#disnoms').val(hasil["disc"]);
				$('#subtotalx').val(hasil["pricetotal"]);
				$('#norekeningx').val(hasil["norek"]);
				$('#detailx').html("")
				customer(hasil["idcust"])

				for (let i = 0; i <= hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1);
					$('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});

					$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
					$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
					$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
					$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
					$('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
					$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_discpercent').val(0);
					$('#transaksi_' + xid + '_discnominal').val(hasil["data"][i]["disc"] * hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["qty"] * hasil["data"][i]["disc"]);
					$('#transaksi_' + xid + '_total').val(hasil["data"][i]["price"] * hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_grandtotal').val(hasil["data"][i]["totalprice"]);


					calc();


				}

			}
		});
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

	function customer(x) {
		var data = <?php echo json_encode($data2) ?>;
		for (let i = 0; i < data.length; i++) {
			if (data[i]["idcust"] == x) {
				$('#nocontact').val(data[i]["nocontact"]);

				$('#delivaddr').val(data[i]["addresscust"]);
			}

		}
	}


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
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_price[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtystock" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtystock[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" oninput="disnomx(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="count(' + xid + ')" ></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_grandtotal" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_grandtotal[]' + xid + '_grandtotal"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#detailx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}


	function disnomx(x) {
		$('#transaksi_' + x + '_discpersen').val(0)
		count(x)
	}

	function disnomm(x) {
		$('#disper').val(0)
		calc()
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
			$('#transaksi_' + xid + '_qty').val(1);
			count(xid)
		}
		calc();
	});

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			console.log($("#idso").val())
			if ($("#idso").val() == "") {
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

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "cancel") {
			var xask = 'Cancel Sales Order ?';
			console.log($("#idso").val())

			if (confirm(xask)) {
				if (validasi()) {
					cancelorderx();
				}
			}
		}
		e.preventDefault();
	});

	function validasi() {
		var xval = 0;
		var sts = 1;
		var pending = 0;

		xval = $("#tipeorder").val();
		if (xval == "") {
			alert('Pilih Tipe Order');
			sts = 0;
			return false;
		}

		xval = $("#idcust").val();
		if (xval == "") {
			alert('Pilih Customer');
			sts = 0;
			return false;
		}

		xval = $("#dateso").val();
		if ($("#dateso").val() == '') {
			alert('Input Tanggal Order');
			sts = 0;
			return false;
		}

		xval = $("#delivdate").val();
		if ($("#delivdate").val() == '') {
			alert('Input Tanggal Pengiriman');
			sts = 0;
			return false;
		}

		xval = $("#nocontact").val();
		if ($("#nocontact").val() == '') {
			alert('Input No.Kontak');
			sts = 0;
			return false;
		}

		xval = $("#delivaddr").val();
		if ($("#delivaddr").val() == '') {
			alert('Input Alamat');
			sts = 0;
			return false;
		}
		xval = $("#paymentmethod").val();
		if ($("#paymentmethod").val() == '') {
			alert('Input Metode Pembayaran');
			sts = 0;
			return false;
		}

		xval = $("#norekeningx").val();
		if ($("#norekeningx").val() == '') {
			alert('Input Rekening Bank');
			sts = 0;
			return false;
		}

		xval = $("#idwh").val();
		if ($("#idwh").val() == '') {
			alert('Pilih Gudang Dahulu');
			sts = 0;
			return false;
		}


		// xval = $("#_qty").val();
		// if ($("#_qty").val() == 0) {
		// 	alert('Input QTY');
		// 	sts = 0;
		// 	return false;
		// }

		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			console.log($('#transaksi_' + xid + '_qtystock').val() + " " + $('#transaksi_' + xid + '_qty').val())
			if (Number($('#transaksi_' + xid + '_qtystock').val()) < Number($('#transaksi_' + xid + '_qty').val())) {
				pending = Number(pending) + Number(1);
				console.log("X")
			} else {
				console.log("Y")
			}

		});
		console.log(pending)
		if (pending == 0) {
			$('#statusso').val('Waiting');


		} else {
			$('#statusso').val('Pending');


		}

		if (sts == 1) {
			return true;
		} else {
			return false;
		}


		//return 'ok';
	}

	function count(xid) {

		console.log($('#transaksi_' + xid + '_discpersen').val())
		if ($('#transaksi_' + xid + '_discpersen').val() != "" && $('#transaksi_' + xid + '_discpersen').val() != 0) {
			if ($('#transaksi_' + xid + '_discpersen').val() > 100) {
				$('#transaksi_' + xid + '_discpersen').val(100);
				alert("Maaf Angka terlalu banyak");

			} else if ($('#transaksi_' + xid + '_discpersen').val() < 0) {
				$('#transaksi_' + xid + '_discpersen').val(0);
				alert("Masukan Discount");
			}
			$('#transaksi_' + xid + '_discnominal').val(($('#transaksi_' + xid + '_total').val() * $('#transaksi_' + xid + '_discpersen').val() / 100))
		}
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
				// ongkir = $('#disnoms').val();

				if ($("#check").is(":checked") == true) {
					vat = totaldisc * 11 / 100;
				} else {
					vat = 0;
				}


				totaldisc = xttl - $('#disnoms').val();
				grandtot = totaldisc + vat;

				var dataitem = <?php echo json_encode($data) ?>;

				for (let i = 0; i < dataitem.length; i++) {

					if (dataitem[i]["iditem"] == $('#transaksi_' + xid + '_iditem').val()) {
						console.log(dataitem[i])
						if (dataitem[i]["data"].length > 0) {
							for (let x = 0; x < dataitem[i]["data"].length; x++) {
								console.log(dataitem[i]["data"][x]["idwh"] + " " + $('#idwh').val() + "x")
								if (dataitem[i]["data"][x]["idwh"] == $('#idwh').val()) {
									$('#transaksi_' + xid + '_qtystock').val(dataitem[i]["data"][x]["balance"])
									break;
								} else {
									$('#transaksi_' + xid + '_qtystock').val(0)
								}

							}
						} else {
							$('#transaksi_' + xid + '_qtystock').val(0)
						}

					}

				}

			}

		});

		if ($('#disper').val() != 0 && $('#disper').val() != "") {
			if ($('#disper').val() < 0) {
				alert("Masukan Discount")
				$('#disper').val(0)
			} else if ($('#disper').val() > 100) {
				alert("Percent Melewati Maximal")
				$('#disper').val(100)
			}
			console.log(xttl + " " + $('#disper').val())
			$('#disnoms').val(xttl * $('#disper').val() / 100)
		}


		$('#dpp').val(formatnum(dpp));
		$('#subtotalx').val(formatnum(xttl));
		$('#totaldisc').val(formatnum(totaldisc));
		$('#vat').val(formatnum(vat));
		$('#grandtotal').val(formatnum(Number(grandtot) + Number($('#ongkir').val())));

	}

	function addorder() {
		if ($('#statusso').val() == "Pending") {
			if (confirm("Sales Ini akan menjadi pending, yakin ingin melanjutkan ??")) {
				addorderx()
			}
		} else {
			addorderx()
		}

	}

	function addorderx() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addsalesorder') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Input Data Berhasil');
					cancelorder();
				} else {
					alert('Input Data Gagal. ' + data);
				}
			});
	}

	function cancelorderx() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/cancelorder') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Cancel Data Berhasil');
					cancelorder();
				} else {
					alert('Cancel Data Gagal. ' + data);
				}
			});
	}

	function cancelorder() {
		location.reload();
	}



	// ========================REGISTER CUSTOMER======================


	function add_row_customer(xxid) {
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
		tabel += '<td class="p-0" style="border:none;" id="transaksi-trx-' + xid + '"><button id="transaksi_' + xid + '_actionx" name="action" class="form-control " type="button" onclick="add_row_customer(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailxnxx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-trx-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_customer(' + xxid + ')"><b>+</b>', 'onclick="del_row_customer(' + xxid + ')"><b>x</b>');
			$('#transaksi-trx-' + xxid + '').html(xdt);
		}
	}

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

		if (validasi()) {
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

	}
</script>