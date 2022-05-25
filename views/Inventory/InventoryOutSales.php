<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory Out</li>
		</ol>
		<h3 class="text-white">Register Outgoing</h3>
	</nav>
</div>
<form action="<?php echo base_url('InventoryOutControler/AddInventoryout') ?>" method="POST" enctype="multipart/form-data" id="form">
	<div class="content bg-white  mx-4">
		<div class="container-fluid">
			<div class="row">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>

			<div class="row mb-4">
				<div class="col-4">
					<label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
					<div class="row mb-3">
						<div class="col-5">
							<div class="row">
								<div class="col">
									<label for="" class="form-label">No. Transaksi</label>
									<input type="text" name="notransaksi" class="form-control" style="font-size:1rem;" value="<?php echo $codeout ?>" readonly>
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
								<input type="text" class="form-control" id="codeso" readonly>
								<input type="hidden" class="form-control" id="idso" name="idso" readonly>
							</div>
							<div class="col-5">
								<p></p>
								<a href="#" data-mdb-toggle="modal" data-mdb-target="#modalsales" class="btn btn-primary mt-3" onclick="loaddatapo()">Cari Data</a>
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Customer</label>
								<input type="text" name="customer" id="namecust" class="form-control" style="font-size:1rem;" readonly>
								<input type="hidden" name="customer" id="idcust" class="form-control" style="font-size:1rem;" readonly>
							</div>
							<div class="col-5">
								<label for="" class="form-label">No. Pesanan (E-Commerce)</label>
								<input type="text" class="form-control" id="nopesanan" placeholder="SLS-1231-001">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-10">
								<label for="" class="form-label">Alamat Pengirim</label>
								<textarea name="" class="form-control" placeholder="Ruko Inkopal" id="delivaddr" cols="30" rows="4"></textarea>
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
								<select name="idwhsales" id="idwhsales" class="form-select" required>
									<option value="">Pilih</option>
									<?php if ($warehouse != "Not Found") {
										foreach ($warehouse as $key) { ?>
											<option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
									<?php }
									} ?>

								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" name="dateoutsales" id="dateoutsales" value="<?php echo date('Y-m-d') ?>" style="cursor: pointer;" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
						<!-- <div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Mata Uang</label>
								<select name="currency" id="currency" class="form-select" required>
									<option value="">Pilih</option>
									<?php if ($currency != "Not Found") {
										foreach ($currency as $key) { ?>
											<option value=<?php echo $key["idcomm"] ?>><?php echo $key["namecomm"] ?></option>
									<?php }
									} ?>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Exchange Rate</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-2"></div>
						</div> -->
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">No. Delivery Order</label>
								<input type="text" name="nodeliv" id="nodeliv" class="form-control">
							</div>
							<div class="col-5" style="display: none;">
								<label for="" class="form-label">Biaya Ongkir</label>
								<input type="text" name="ongkir" id="ongkir" class="form-control">
							</div>
							<div class="col-7"></div>
						</div>
					</div>
					<div id="mvwhx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang Pengirim</label>
								<select name="namewarehouse1" id="idwhmovewh" class="form-select" required onchange="calc()">
									<option value="">Pilih</option>
									<?php if ($warehouse != "Not Found") {
										foreach ($warehouse as $key) { ?>
											<option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
									<?php }
									} ?>

								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Gudang Penerima<span style="color: red;">*</span></label>
								<select name="namewarehouse2" id="idwh2" class="form-select" required>
									<option value="">Pilih</option>
									<?php if ($warehouse != "Not Found") {
										foreach ($warehouse as $key) { ?>
											<option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
									<?php }
									} ?>
								</select>
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" id="dateoutmovewh" name="dateoutmovewh" class="form-control">
							</div>
							<div class="col-5"></div>
							<div class="col-2"></div>
						</div>
					</div>
					<div id="retx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang<span style="color: red;">*</span></label>
								<select name="idwhret" id="idwhret" class="form-select" onclick="calc()" required>
									<option value="">Pilih</option>
									<?php if ($warehouse != "Not Found") {
										foreach ($warehouse as $key) { ?>
											<option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
									<?php }
									} ?>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" id="dateret" name="dateret" class="form-control">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Supplier</label>
								<select name="idsupp" id="idsupp" class="form-select" required>
									<option value="">Pilih</option>
									<?php if ($data1 != "Not Found") {
										foreach ($data1 as $key) {
											if ($key["typecust"] == "Supplier") { ?>
												<option value=<?php echo $key["idcust"] ?>><?php echo $key["namecust"] ?></option>
									<?php }
										}
									} ?>
								</select>
							</div>
							<div class="col-5"></div>
							<div class="col-2"></div>
						</div>
					</div>
					<div id="outgx" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang<span style="color: red;">*</span></label>
								<select name="idwhout" id="idwhout" class="form-select" required onchange="calc()">
									<option value="">Pilih</option>
									<?php if ($warehouse != "Not Found") {
										foreach ($warehouse as $key) { ?>
											<option value=<?php echo $key["idwarehouse"] ?>><?php echo $key["namewarehouse"] ?></option>
											<?php }
									} ?>>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Keluar</label>
								<input type="date" name="dateoutwh" id="dateoutwh" class="form-control">
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

		</div>
		<div class="row">
			<div class="col">
				<label for="" class="form-label fs-4">Item/Produk</label>
				<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
				<div id="sale">
					<table class="table m-0">
						<thead class="border-0 text-center bg-primary" style="color: white">
							<tr>
								<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
								<th style="background:#1143d8;color:white;text-align:center;">Nama Item</th>
								<!-- <th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Deskripsi</th>
							<th style="background:#1143d8;color:white;text-align:center;width:15rem;">Harga</th> -->
								<th style="background:#1143d8;color:white;text-align:center;">Qty Stock</th>
								<th style="background:#1143d8;color:white;text-align:center;">Qty Order</th>
								<th style="background:#1143d8;color:white;text-align:center;">Qty Out</th>
								<th style="background:#1143d8;color:white;text-align:center;">Exp Date</th>
								<!-- <th style="background:#1143d8;color:white;text-align:center;width:15rem;">Total</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10rem;">Disc Nominal</th>
							<th style="background:#1143d8;color:white;text-align:center;width:7rem;">Disc Persen</th>
							<th style="background:#1143d8;color:white;text-align:center;width:10.25rem;">Grand Total</th> -->
								<th style="background:#1143d8;color:white;text-align:center;">Action</th>
							</tr>
						</thead>
						<tbody class="text-center" id="bodysales">
							<!-- <tr>
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
									<label for="">List BOM Item</label> -->
							<!-- <label for="">Stock Maksimum : X</label> -->
							<!-- </div>
								<div class="col-9">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">SKU</th>
												<th scope="col">Name Item</th>
												<th scope="col">Qty Ready</th>
												<th scope="col">Qty Out</th>
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
						</td> -->
							<!-- <tr>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
							<td>~</td>
						</tr> -->
						</tbody>
					</table>
				</div>
				<div id="mvh" style="display: none;">
					<table class="table m-0">
						<thead class="border-0 text-center bg-primary" style="color: white">
							<tr>
								<th>SKU</th>
								<th>Nama Item</th>
								<th>Deskripsi</th>
								<th>QTY Stock</th>
								<th>QTY Out</th>
								<th>Expired Date</th>
								<!-- <th>Harga</th>
								<th>Discount</th>
								<th>Subtotal</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center" id="bodymovewh">
							<!-- <tr>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
							</tr> -->
						</tbody>
					</table>
				</div>
				<div id="out" style="display: none;">
					<table class="table m-0">
						<thead class="border-0 text-center bg-primary" style="color: white">
							<tr>
								<th>SKU</th>
								<th>Nama Item</th>
								<th>Deskripsi</th>
								<th>QTY Stock</th>
								<th>QTY Out</th>
								<th>Expired Date</th>
								<!-- <th>Harga</th>
								<th>Discount</th>
								<th>Subtotal</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center" id="bodyout">
							<tr>
								<!-- <td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td> -->
							</tr>
						</tbody>
					</table>
				</div>
				<div id="retr" style="display: none;">
					<table class="table m-0">
						<thead class="border-0 text-center bg-primary" style="color: white">
							<tr>
								<th>SKU</th>
								<th>Nama Item</th>
								<th>Deskripsi</th>
								<th>QTY Stock</th>
								<th>QTY Out</th>
								<th>Expired Date</th>
								<!-- <th>Harga</th>
								<th>Discount</th>
								<th>Subtotal</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center" id="bodyreturn">
							<tr>
								<!-- <td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td>
								<td>~</td> -->
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row mt-3" id="salesxy" style="display: none;">
					<div class="col-9"></div>
					<div class="col-3">
						<div class="card p-3 border-0">
							<div class="card-header">
								<center>
									<label for="" class="form-label fs-4" style="color: #0E36AD;">Rincian</label>
								</center>
							</div>
							<div class="card-body" sty>
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
					</div>
				</div>
				<div id="mvwhxy"></div>
				<div id="outgxy"></div>
				<div id="retxy"></div>
				<div class="mt-3" style="text-align:right;">
					<button type="button" id="addorder" class="btn btn-primary col-2" style="font-size:13px;" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="addorderx()">Buat Transaksi</button>
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
								<div class="col-12">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterx">
											<option value="codeso">No.Sales Order</option>

											<option value="namecust">Nama Customer</option>
										</select>
										<input type="text" id="searchx" class="form-control" placeholder="Cari Berdasarkan Filter">
									</div>
								</div>
								<!-- <div class="col-4">
								<label for="" class="form-label">Status</label>
								<select class="form-select" id="statusx" aria-label="Default select example">
									<option value="">Pilih Status Sales Order</option>
									<option value="Waiting">Waiting</option>
									<option value="Process">Process</option>
									<option value="Finish">Finish</option>
									<option value="Cancel">Cancel</option>
								</select>
							</div> -->
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
<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" price="<?php echo $key["price"]; ?>" data-typeqty="<?php echo $key["jenisqty"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?> "><?php echo $key["nameitem"] . ' - Rp. ' . number_format($key['price'], 0, '.', ','); ?></option>
	<?php }
	} ?>
</datalist>

<datalist id="xitemx">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
			if ($key["usebom"] == "n") {

	?>
				<option value="<?php echo $key["sku"]; ?>" price="<?php echo $key["price"]; ?>" data-typeqty="<?php echo $key["jenisqty"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?> "><?php echo $key["nameitem"] . ' - Rp. ' . number_format($key['price'], 0, '.', ','); ?></option>
	<?php }
		}
	} ?>
</datalist>


<script>
	function ubah(x) {
		if (x == "sales") {
			$('#bodysales').html("")
			$('#bodymovewh').html("")
			$('#bodyreturn').html("")
			$('#bodyout').html("")
			add_item(0)
			$('#sale').show();
			$('#sales').show();
			$('#salesx').show();
			$('#salesxy').hide();
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
			$('#bodysales').html("")
			$('#bodymovewh').html("")
			$('#bodyreturn').html("")
			$('#bodyout').html("")
			add_itemmovewh(0)
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
			$('#bodysales').html("")
			$('#bodymovewh').html("")
			$('#bodyreturn').html("")
			$('#bodyout').html("")
			add_itemret(0)
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
			$('#bodysales').html("")
			$('#bodymovewh').html("")
			$('#bodyreturn').html("")
			$('#bodyout').html("")
			add_itemout(0)
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


<script>
	function loaddatapo() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('OrderManagementController/orderreportload') ?>",
			data: "filter=" + $('#filterx').val() + "&search=" + $('#searchx').val() + "&status=&date1=" + $('#datestartx').val() + "&date2=" + $('#finishdatex').val(),
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

						if (hasil[i]["statusorder"] == "Waiting" || hasil[i]["statusorder"] == "Process") {
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
				console.log(hasil)
				$('#codeso').val(hasil["codeso"]);
				$('#disnoms').val(hasil["disnomdet"]);
				$('#check').val(hasil["vat"]);
				$('#idso').val(hasil["idso"]);
				$('#idwhsales').val(hasil["idwh"]);
				$('#namecust').val(hasil["namecust"]);
				$('#idcust').val(hasil["idcust"]);
				$('#delivaddr').val(hasil["delivaddr"]);
				$('#nopesanan').val(hasil["nopesanan"]);
				$('#ongkir').val(hasil["ongkir"]);

				$('#bodysales').html("")
				var baris = ""

				var dataitem = <?php echo json_encode($data) ?>;

				for (let i = 0; i < hasil["data"].length; i++) {
					for (let b = 0; b < dataitem.length; b++) {
						if (dataitem[b]["iditem"] == hasil["data"][i]["iditem"]) {
							baris += `<option value="` + dataitem[b]["sku"] + `" price="` + dataitem[b]["price"] + `" data-typeqty="` + dataitem[b]["jenisqty"] + `" data-iditem="` + dataitem[b]["iditem"] + `" data-price="` + dataitem[b]["price"] + `" data-nameitem="` + dataitem[b]["nameitem"] + `" data-sku="` + dataitem[b]["sku"] + `" data-price="` + dataitem[b]["price"] + `" data-deskripsi="` + dataitem[b]["deskripsi"] + `" data-qty="` + hasil["data"][i]["qty"] + `">` + dataitem[b]["nameitem"] + ` - Rp. ` + dataitem[b]["price"] + `</option>`
						}
					}
					add_item(i)
					var xid = Number(i) + Number(1)
					$('#transaksi_' + xid + '_qtysox').val(hasil["data"][i]["qty"])
					$('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});
					$('#transaksiksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
					$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
					$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
					$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
					$('#transaksi_' + xid + '_typeqty').val(xobj.data('typeqty'));
					$('#transaksi_' + xid + '_harga').val(hasil["data"][i]["price"]);
					$('#transaksi_' + xid + '_qty').val(1);
					$('#transaksi_' + xid + '_qtysox').val(hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_discnominal').val(hasil["data"][i]["disnomdet"]);
					// count(xid)
					calc();




				}
				$('#xitem').html(baris)


			}
		})



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


	function add_item(xxid) {
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
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_price[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtystock" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtystock[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtysox" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtysox[]' + xid + '_qtysox" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" oninput="disnomx(' + xid + ')" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="count(' + xid + ')" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="date" style="text-align:center" id="transaksi_' + xid + '_expdate" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_expdate[]"  autocomplete="off" value="0" > <input type="hidden" style="text-align:center" id="transaksi_' + xid + '_typeqty" objtype="_typeqty" class="form-control _grandtotal" name="transaksi_typeqty[]' + xid + '_typeqty"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_item(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#bodysales').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_item(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	function add_itemmovewh(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / >';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitemx" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_price[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtystock" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtystock[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtysox" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtysox[]' + xid + '_qtysox" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" oninput="disnomx(' + xid + ')" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="count(' + xid + ')" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="date" style="text-align:center" id="transaksi_' + xid + '_expdate" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_expdate[]"  autocomplete="off" value="0" > <input type="hidden" style="text-align:center" id="transaksi_' + xid + '_typeqty" objtype="_typeqty" class="form-control _grandtotal" name="transaksi_typeqty[]' + xid + '_typeqty"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_itemmovewh(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#bodymovewh').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_itemmovewh(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	function add_itemret(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / >';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitemx" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_price[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtystock" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtystock[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtysox" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtysox[]' + xid + '_qtysox" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" oninput="disnomx(' + xid + ')" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="count(' + xid + ')" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="date" style="text-align:center" id="transaksi_' + xid + '_expdate" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_expdate[]"  autocomplete="off" value="0" > <input type="hidden" style="text-align:center" id="transaksi_' + xid + '_typeqty" objtype="_typeqty" class="form-control _grandtotal" name="transaksi_typeqty[]' + xid + '_typeqty"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_itemret(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#bodyreturn').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_itemret(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}

	function add_itemout(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / >';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitemx" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_price[]' + xid + '_harga" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center;" type="text"  readonly id="transaksi_' + xid + '_deskripsi"  class="form-control "name="transaksi_deskripsi[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtystock" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtystock[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';

		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qtysox" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qtysox[]' + xid + '_qtysox" autocomplete="off" value="0" onchange="count(' + xid + ')" readonly> </td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_qty" min="0" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count(' + xid + ')"></td>';
		// tabel += '<td class="p-0" style="border:none;"><input type="number" style="text-align:center" id="transaksi_' + xid + '_total" objtype="_total" class="form-control  _total" name="transaksi_total[]' + xid + '_total" autocomplete="off" value="0" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discnominal"  class="form-control _discnominal" name="transaksi_discnominal[]' + xid + '_discnominal"  value="0" oninput="disnomx(' + xid + ')" readonly></td>';
		// tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_discpersen"  class="form-control _discpersen" name="transaksi_discpersen[]' + xid + '_discpersen"  max="100" min="0" oninput="count(' + xid + ')" readonly></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="date" style="text-align:center" id="transaksi_' + xid + '_expdate" objtype="_grandtotal" class="form-control _grandtotal" name="transaksi_expdate[]"  autocomplete="off" value="0" > <input type="hidden" style="text-align:center" id="transaksi_' + xid + '_typeqty" objtype="_typeqty" class="form-control _grandtotal" name="transaksi_typeqty[]' + xid + '_typeqty"  autocomplete="off" value="0" readonly></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_itemret(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		$('#line-transaksi').val(xid);
		$('#bodyout').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_itemret(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
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
			$('#transaksi_' + xid + '_qtysox').val(0);
			$('#transaksi_' + xid + '_harga').val();
			$('#transaksi_' + xid + 'qty').val(0);
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_qtysox').val(xobj.data('qty'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('price'));
			$('#transaksi_' + xid + '_qty').val(1);

		}
		calc();
	});


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

		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {

				var dataitem = <?php echo json_encode($data) ?>;
				for (let i = 0; i < dataitem.length; i++) {

					if (dataitem[i]["iditem"] == $('#transaksi_' + xid + '_iditem').val()) {
						console.log(dataitem[i])
						if (dataitem[i]["data"].length > 0) {
							for (let x = 0; x < dataitem[i]["data"].length; x++) {
								console.log(dataitem[i]["data"][x]["idwh"] + " " + $('#idwhsales').val() + "x" + $('#idwhmovewh').val() + " y " + $('#idwhret').val())
								if (dataitem[i]["data"][x]["idwh"] == $('#idwhsales').val()) {
									$('#transaksi_' + xid + '_qtystock').val(Number(dataitem[i]["data"][x]["balance"]) + Number($('#transaksi_' + xid + '_qtysox').val()))
									break;
								} else if (dataitem[i]["data"][x]["idwh"] == $('#idwhmovewh').val()) {

									$('#transaksi_' + xid + '_qtystock').val(Number(dataitem[i]["data"][x]["balance"]))
									break;
								} else if (dataitem[i]["data"][x]["idwh"] == $('#idwhret').val()) {

									$('#transaksi_' + xid + '_qtystock').val(Number(dataitem[i]["data"][x]["balance"]))
									break;
								} else if (dataitem[i]["data"][x]["idwh"] == $('#idwhout').val()) {

									$('#transaksi_' + xid + '_qtystock').val(Number(dataitem[i]["data"][x]["balance"]))
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


	}

	function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	}





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

	function validasisales() {

		var xval = 0;
		var sts = 1;
		var pending = 0;

		xval = $("#codeso").val();
		if (xval == "") {
			alert('Pilih No. Sales Order');
			sts = 0;
			return false;
		}

		xval = $("#nodeliv").val();
		if (xval == "") {
			alert('Masukan No. Delivery Order');
			sts = 0;
			return false;
		}

		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

			if ($('#transaksi_' + xid + '_typeqty').val() == "stock") {
				if (Number($('#transaksi_' + xid + '_qtysox').val()) < Number($('#transaksi_' + xid + '_qty').val())) {
					alert('Qty Out Lebih Besar Dari Stock');
					sts = 0;
					return false;
				}
			}

			if ($('#transaksi_' + xid + '_expdate').val() == "") {
				alert('EXP DATE KOSONG');
				sts = 0;
				return false;
			}

		});


		if (sts == 1) {
			return true;
		} else {
			return false;
		}


		//return 'ok';
	}

	function validasimovewh() {

		var xval = 0;
		var sts = 1;
		var pending = 0;

		xval = $("#idwhmovewh").val();
		if (xval == "") {
			alert('Pilih Gudang Pegirim');
			sts = 0;
			return false;
		}

		xval = $("#idwh2").val();
		if (xval == "") {
			alert('Pilih Gudang Penerima');
			sts = 0;
			return false;
		}

		xval = $("#dateoutmovewh").val();
		if (xval == "") {
			alert('Masukan Tanggal Pengeluaran');
			sts = 0;
			return false;
		}

		if ($("#idwhmovewh").val() == $("#idwh2").val()) {
			alert("Gudang Penerima dan pengirim tidak boleh sama");
			sts = 0;
			return false;
		}

		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

			if ($('#transaksi_' + xid + '_typeqty').val() == "stock") {
				if (Number($('#transaksi_' + xid + '_qtystock').val()) < Number($('#transaksi_' + xid + '_qty').val())) {
					alert('Qty Out Lebih Besar Dari Stock');
					sts = 0;
					return false;
				}
			}
			if ($('#transaksi_' + xid + '_expdate').val() == "") {
				alert('EXP DATE KOSONG');
				sts = 0;
				return false;
			}

		});


		if (sts == 1) {
			return true;
		} else {
			return false;
		}


		//return 'ok';
	}

	function validasiret() {

		var xval = 0;
		var sts = 1;
		var pending = 0;

		xval = $("#idwhret").val();
		if (xval == "") {
			alert('Pilih Gudang Asal');
			sts = 0;
			return false;
		}

		xval = $("#dateret").val();
		if (xval == "") {
			alert('Masukan Tanggal Return');
			sts = 0;
			return false;
		}

		xval = $("#idsupp").val();
		if (xval == "") {
			alert('Pilih Supplier');
			sts = 0;
			return false;
		}

		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

			if ($('#transaksi_' + xid + '_typeqty').val() == "stock") {
				if (Number($('#transaksi_' + xid + '_qtystock').val()) < Number($('#transaksi_' + xid + '_qty').val())) {
					alert('Qty Out Lebih Besar Dari Stock');
					sts = 0;
					return false;
				}
			}
			if ($('#transaksi_' + xid + '_expdate').val() == "") {
				alert('EXP DATE KOSONG');
				sts = 0;
				return false;
			}

		});


		if (sts == 1) {
			return true;
		} else {
			return false;
		}


		//return 'ok';
	}

	function validasiout() {

		var xval = 0;
		var sts = 1;
		var pending = 0;

		xval = $("#idwhout").val();
		if (xval == "") {
			alert('Pilih Gudang Asal');
			sts = 0;
			return false;
		}

		xval = $("#dateoutwh").val();
		if (xval == "") {
			alert('Masukan Tanggal Keluar');
			sts = 0;
			return false;
		}



		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

			if ($('#transaksi_' + xid + '_typeqty').val() == "stock") {
				if (Number($('#transaksi_' + xid + '_qtystock').val()) < Number($('#transaksi_' + xid + '_qty').val())) {
					alert('Qty Out Lebih Besar Dari Stock');
					sts = 0;
					return false;
				}
			}
			if ($('#transaksi_' + xid + '_expdate').val() == "") {
				alert('EXP DATE KOSONG');
				sts = 0;
				return false;
			}

		});


		if (sts == 1) {
			return true;
		} else {
			return false;
		}


		//return 'ok';
	}

	function addorderx() {
		var xask = '';
		console.log($("#idso").val())
		if ($("#idso").val() == "") {
			xask = "Simpan Transaksi?";
		} else {
			xask = "Ubah Transaksi?";
		}
		if (confirm(xask)) {

			if ($('#tipeingoing').val() == "sales") {
				if (validasisales()) {
					var cx = $('#form').serialize();
					$.post("<?php echo base_url('InventoryOutControler/AddInventoryout') ?>", cx,
						function(data) {
							if (data == 'Success') {
								alert('Input Data Berhasil');
								cancelorder();
							} else {
								alert('Input Data Gagal. ' + data);
							}
						});
				}
			} else if ($('#tipeingoing').val() == "mvwh") {
				if (validasimovewh()) {
					var cx = $('#form').serialize();
					$.post("<?php echo base_url('InventoryOutControler/AddInventoryoutmovewh') ?>", cx,
						function(data) {
							if (data == 'Success') {
								alert('Input Data Berhasil');
								cancelorder();
							} else {
								alert('Input Data Gagal. ' + data);
							}
						});
				}
			} else if ($('#tipeingoing').val() == "ret") {
				if (validasiret()) {
					var cx = $('#form').serialize();
					$.post("<?php echo base_url('InventoryOutControler/AddInventoryoutret') ?>", cx,
						function(data) {
							if (data == 'Success') {
								alert('Input Data Berhasil');
								cancelorder();
							} else {
								alert('Input Data Gagal. ' + data);
							}
						});
				}
			} else if ($('#tipeingoing').val() == "outg") {
				if (validasiout()) {
					var cx = $('#form').serialize();
					$.post("<?php echo base_url('InventoryOutControler/AddInventoryoutgoing') ?>", cx,
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

		}
	}

	function cancelorder() {
		location.reload();
	}
</script>