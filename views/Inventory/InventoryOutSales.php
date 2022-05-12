<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory Out</li>
		</ol>
		<h3 class="text-white">Register Outgoing</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('MasterDataControler/AddInventoryin') ?>" method="POST" enctype="multipart/form-data" id="form">
			<div class="row mb-4">
				<div class="col-4">
					<label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
					<div class="row mb-3">
						<div class="col-5">
							<div class="row">
								<div class="col">
									<label for="" class="form-label">No. Transaksi</label>
									<input type="text" name="notransaksi" class="form-control" style="font-size:1rem;" readonly>
								</div>
							</div>
						</div>
						<div class="col-5">
							<label for="" class="form-label">Tipe Outgoing</label>
							<select name="tipeingoing" id="tipeingoing" class="form-select" onchange="ubah(this.value)">
								<option value="sales" selected>Sales</option>
								<option value="mvwh">Move Warehouse</option>
								<option value="ret">Return</option>
								<option value="outg">Out Gudang</option>
							</select>
						</div>
						<div class="col-2"></div>
					</div>
					<div id="sales">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">No. Sales Order</label>
								<input type="text" class="form-control" readonly>
							</div>
							<div class="col-5">
								<p></p>
								<a href="" class="btn btn-primary mt-3">Cari Data</a>
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Customer</label>
								<input type="text" name="customer" class="form-control" style="font-size:1rem;" readonly>
							</div>
							<div class="col-5">
								<label for="" class="form-label">No. Pesanan (E-Commerce)</label>
								<input type="text" class="form-control" placeholder="SLS-1231-001">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-10">
								<label for="" class="form-label">Alamat Pengirim</label>
								<textarea name="" class="form-control" placeholder="Ruko Inkopal" id="" cols="30" rows="4"></textarea>
							</div>
						</div>
					</div>
					<div id="mvwh"></div>
					<div id="ret"></div>
					<div id="outg"></div>
				</div>
				<div class="col-4">
					<label for="" class="form-label fs-3 mb-3">Informasi Gudang & Mata Uang </label>
					<div id="salesx">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang<span style="color: red;">*</span></label>
								<select name="namewarehouse" id="" class="form-select" required>
									<option value="">Pilih</option>
									<option value="Gudang 1">Gudang 1</option>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Mata Uang</label>
								<select name="currency" id="" class="form-select" required>
									<option value="">Pilih</option>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Exchange Rate</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">No. Delivery Order</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-7"></div>
						</div>
					</div>
					<div id="mvwhx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang Pengirim</label>
								<select name="namewarehouse" id="" class="form-select" required>
									<option value="">Pilih</option>
									<option value="Gudang 1">Gudang 1</option>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Gudang Penerima<span style="color: red;">*</span></label>
								<select name="namewarehouse" id="" class="form-select" required>
									<option value="">Pilih</option>
									<option value="Gudang 1">Gudang 1</option>
								</select>
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" class="form-control">
							</div>
							<div class="col-5"></div>
							<div class="col-2"></div>
						</div>
					</div>
					<div id="retx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang<span style="color: red;">*</span></label>
								<select name="namewarehouse" id="" class="form-select" required>
									<option value="">Pilih</option>
									<option value="Gudang 1">Gudang 1</option>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
					</div>
					<div id="outgx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang<span style="color: red;">*</span></label>
								<select name="namewarehouse" id="" class="form-select" required>
									<option value="">Pilih</option>
									<option value="Gudang 1">Gudang 1</option>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
					<div class="row">
						<div class="col-3">
							<button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
						</div>
						<div class="col-3">
							<button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
						</div>
						<div class="col-6"></div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col">
			<label for="" class="form-label fs-4">Item/Produk</label>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<div id="sale">
				<table class="table m-0">
					<thead class="border-0 text-center bg-primary" style="color: white">
						<tr>
							<th>Nama Item</th>
							<th>SKU</th>
							<th>Spesifikasi</th>
							<th>QTY Order</th>
							<th>QTY Out</th>
							<th>Harga</th>
							<th>Discount</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr>
						<td colspan="9" id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="row accordion-body">
								<div class="col-3">
									<label for="">Stock Minimum : X</label>
									<label for="">Stock Maksimum : X</label>
								</div>
								<div class="col-9">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Tipe</th>
												<th scope="col">No. Transaksi</th>
												<th scope="col">Tgl Transaksi</th>
												<th scope="col">Qty</th>
											</tr>
										</thead>
										<tbody>
											<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalino">
												<th scope="row">1</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</td>
						<tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="mvh" style="display: none;">
				<table class="table m-0">
					<thead class="border-0 text-center bg-primary" style="color: white">
						<tr>
							<th>Nama Item</th>
							<th>SKU</th>
							<th>Deskripsi</th>
							<th>QTY Order</th>
							<th>QTY Out</th>
							<th>Harga</th>
							<th>Discount</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="out" style="display: none;">
				<table class="table m-0">
					<thead class="border-0 text-center bg-primary" style="color: white">
						<tr>
							<th>Nama Item</th>
							<th>SKU</th>
							<th>Deskripsi</th>
							<th>QTY Order</th>
							<th>QTY Out</th>
							<th>Harga</th>
							<th>Discount</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="retr" style="display: none;">
				<table class="table m-0">
					<thead class="border-0 text-center bg-primary" style="color: white">
						<tr>
							<th>Nama Item</th>
							<th>SKU</th>
							<th>Deskripsi</th>
							<th>QTY Order</th>
							<th>QTY Out</th>
							<th>Harga</th>
							<th>Discount</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row mt-3" id="salesxy">
				<div class="col-9"></div>
				<div class="col-3">
					<div class="card p-3 border-0">
						<div class="card-header">
							<center>
								<label for="" class="form-label fs-4" style="color: #0E36AD;">Rincian</label>
							</center>
						</div>
						<div class="card-body" sty>
							<div class="row">
								<div class="col-6">
									<p>Sub Total</p>
								</div>
								<div class="col-6">
									<p>Rp -</p>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Onkos Kirim</p>
								</div>
								<div class="col-6">
									<p>Rp -</p>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Grand Total</p>
								</div>
								<div class="col-6">
									<p>Rp -</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="mvwhxy"></div>
			<div id="outgxy"></div>
			<div id="retxy"></div>
			<div class="mt-3" style="text-align:right;">
				<button type="button" class="btn btn-primary col-2" style="font-size:13px;" data-toggle="modal" data-target=".bd-example-modal-xl">Buat Transaksi</button>
			</div>
		</div>
	</div>
</div>

<script>
	function ubah(x) {
		if (x == "sales") {
			$('#sale').show();
			$('#sales').show();
			$('#salesx').show();
			$('#salesxy').show();
			$('#mvh').hide();
			$('#mvwh').hide();
			$('#mvwhx').hide();
			$('#mvwhxy').hide();
			$('#ret').hide();
			$('#retr').hide();
			$('#retx').hide();
			$('#retxy').hide();
			$('#out').hide();
			$('#outg').hide();
			$('#outgx').hide();
			$('#outgxy').hide();
		} else if (x == "mvwh") {
			$('#sale').hide();
			$('#sales').hide();
			$('#salesx').hide();
			$('#salesxy').hide();
			$('#mvh').show();
			$('#mvwh').show();
			$('#mvwhx').show();
			$('#mvwhxy').show();
			$('#ret').hide();
			$('#retr').hide();
			$('#retx').hide();
			$('#retxy').hide();
			$('#out').hide();
			$('#outg').hide();
			$('#outgx').hide();
			$('#outgxy').hide();
		} else if (x == "ret") {
			$('#sale').hide();
			$('#sales').hide();
			$('#salesx').hide();
			$('#salesxy').hide();
			$('#mvh').hide();
			$('#mvwh').hide();
			$('#mvwhx').hide();
			$('#mvwhxy').hide();
			$('#ret').show();
			$('#retr').show();
			$('#retx').show();
			$('#retxy').show();
			$('#out').hide();
			$('#outg').hide();
			$('#outgx').hide();
			$('#outgxy').hide();
		} else if (x == "outg") {
			$('#sale').hide();
			$('#sales').hide();
			$('#salesx').hide();
			$('#salesxy').hide();
			$('#mvh').hide();
			$('#mvwh').hide();
			$('#mvwhx').hide();
			$('#mvwhxy').hide();
			$('#ret').hide();
			$('#retr').hide();
			$('#retx').hide();
			$('#retxy').hide();
			$('#out').show();
			$('#outg').show();
			$('#outgx').show();
			$('#outgxy').show();
		}
	}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>