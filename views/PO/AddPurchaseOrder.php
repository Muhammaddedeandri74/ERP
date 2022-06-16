<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management </a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Order</li>
			</ol>
			<h3 class="text-white">Register Purchase Order</h3>
		</nav>
	</div>
	<div class="content bg-white  mx-4">
		<div class="container-fluid">
			<div class="row">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>
			<div class="row mb-3">
				<div class="col-3 mb-3">
					<lable for="" class="form-label fs-3">Informasi Dasar</lable>
					<div class="row my-3" id="xnxx">
						<label for="" class="form-label">No. Purchase Order</label>
						<div class="col-8">
							<input type="text" name="codepo" id="codepo" class="form-control" autocomplete="off" readonly>
							<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
							<input type="hidden" name="idpo" id="idpo" class="form-control">
						</div>
						<div class="col-4">
							<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="loaddata()">Cari Data</button>
						</div>
					</div>
					<div class="row my-3" style="display: none;" id="xxx">
						<label for="" class="form-label">No. Purchase Order</label>
						<div class="col-8">
							<input type="text" name="codepox" id="codepox" value="<?php echo $data7; ?>" class="form-control" autocomplete="off" readonly>
						</div>
						<div class="col-4">
							<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="loaddata()">Cari Data</button>
						</div>
					</div>
					<div class="row mb-3">
						<label for="" class="form-label">No. Request PO</label>
						<div class="col-8">
							<input type="text" name="codereqpo" id="codereqpo" class="form-control" value="" autocomplete="off" readonly>
							<input type="hidden" name="idreqpo" id="idreqpo" class="form-control" value="" autocomplete="off" readonly>
						</div>
						<div class="col-4">
							<button type="button" data-mdb-toggle="modal" id="loadquo" data-mdb-target="#requestpo" class="btn btn-primary" onclick="loaddatax()">Cari Data</button>
						</div>
					</div>
					<div class="row mb-3">
						<label for="" class="form-label">No. Sales Order</label>
						<div class="col-8">
							<input type="text" name="codeso" id="codeso" class="form-control" readonly>
							<input type="hidden" name="idso" id="idsox" class="form-control" readonly>
						</div>
						<div class="col-4">
							<button type="button" data-mdb-toggle="modal" data-mdb-target="#requestso" class="btn btn-primary" onclick="loaddataso()">Cari Data</button>
						</div>
					</div>
					<div class="row mb-3" style="position: relative;">
						<div class="col-8">
							<label for="" class="form-label">Supplier</label>
							<input type="text" id="namesupp" class="form-control" objectype="supp" list="xsupp" name="namesupp" autocomplete="off" placeholder="Search" required>
							<input type="hidden" id="idsupp" name="idsupp">
						</div>
						<div class="col-4">
							<button class=" rounded-circle mt-4" style="position: absolute;top: 16px;left: 252px;font-size: 12px;border: 0;" onclick="document.getElementById('namesupp').value = ''">X</button>
						</div>
					</div>
				</div>
				<div class="col-3">
					<lable for="" class="form-label fs-3">Informasi Gudang & Mata Uang </lable>
					<div class="row my-3">
						<div class="col-5">
							<label for="" class="form-label">Tanggal PO</label>
							<input type="date" name="datepo" placeholder="dd-mm-yyyy" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="date form-control">
						</div>
						<div class="col-5">
							<label for="" class="form-label">Tanggal Pengiriman</label>
							<input type="date" name="delivedate" id="tanggalpengiriman" value="" style="cursor: pointer;" class="form-control">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-5">
							<label for="" class="form-label">Mata Uang</label>
							<select name="matauang" id="matauang" class="form-select" required>
								<?php if ($data2 != "Not Found") : ?>
									<?php foreach ($data2 as $key) : ?>
										<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
						</div>
						<div class="col-5">
							<label for="" class="form-label">Exchange Rate</label>
							<input type="text" name="exchange" id="exchange" value="" style="cursor: pointer;" class="form-control" autocomplete="off">
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-10">
							<label for="" class="form-label">Judul Purchase</label>
							<textarea name="judulpurchase" id="judulpurchase" cols="7" rows="4" class="form-control" placeholder="Contoh : Penawaran PT. ABC" style="font-size:13px;"></textarea>
							<div class="">
								<span class="text-muted" style="font-size: 13px;">Maksimal 250 Karakter</span>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-3">
					<lable for="" class="form-label fs-3">Akun Perbankan</lable>
					<div class="row my-3">
						<div class="col-10">
							<label for="" class="form-label">No. Rekening Customer </label>
							<select name="norekening" id="norekening" class="form-select" required>
								<option value="">Pilih</option>
							</select>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<lable for="" class="form-label fs-3">Pajak</lable>
						<div class="col-7">
							<label for="">Gunakan VAT</label>
						</div>
						<div class="col-3">
							<div class="form-check form-switch">
								<input type="checkbox" name="vat" value="11" class="form-check-input" id="check" checked>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-3" id="action" style="display: none;">
					<lable for="" class="form-label fs-3">Cetak & Download</lable>
					<div class="row ">
						<div class="col-3">
							<p></p>
							<a class="btn btn-light" id="btn_exportexcel"><i class='bx bxs-download'>Download</i></a>
						</div>
						<div class="col-3">
							<p></p>
							<a class="btn btn-light" onclick="printDiv('po')"><i class='bx bx-printer'>Cetak</i></a>
						</div>
						<div class="col-3">
							<p></p>
							<a href="<?php echo base_url('InventoryController/AddPo') ?>" class="btn btn-light"><i class='bx bx-reset'>Baru</i></a>
						</div>
						<div class="col-3"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<lable for="" class="form-label fs-3">Item/Produk</lable>
					<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
					<table class="table table-bordered table-striped " id="table-user">
						<thead class="text-white" style="background:#1143d8;">
							<tr>
								<td>Sku</td>
								<td>Nama Item</td>
								<td>Harga</td>
								<td>Qty</td>
								<td>Discount Percent</td>
								<td>Discount Nominal</td>
								<td>Sub Total</td>
								<td>Total Discount</td>
								<td>Grand Total</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody id="detail">

						</tbody>
					</table>
					<div class="row">
						<div class="col-8"></div>
						<div class="col-4 text-end">
							<div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
								<div class="row">
									<div class="col-6 ">
										<p>Sub Total</p>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
									</div>
								</div>
								<div class="row">
									<div class="col-6 ">
										<p>Discount Transaksi</p>
									</div>
									<div class="col-6">
										<input type="number" class="form-control" id="disnom" name="distrans" value="0" oninput="calc()">
									</div>
								</div>
								<div class="row">
									<div class="col-6 ">
										<p>Total Setelah Diskon</p>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="totaldisc" name="totaldis" readonly>
									</div>
								</div>
								<div class="row">
									<div class="col-6 ">
										<p>VAT</p>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="ppn" name="ppn" readonly>
									</div>
								</div>
								<div class="row">
									<div class="col-6 ">
										<p>Grand Total</p>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mr-4 mt-3" style="text-align:right;">
						<button type="submit" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
						<!-- <button type="button" class="btn btn-primary" id="update" style="display: none;" onclick="update()">Update</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">List Purchase Order</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<!-- <input type="hidden" name="idcust" id="idcust"> -->
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filter" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
											<option value="codepo">No.Po</option>
										</select>
										<input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
									</div>
								</div>
								<div class="col-4">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statuspo" aria-label="Default select example">
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
										<th>No. Request</th>
										<th>Tgl Request</th>
										<th>Nama Supplier</th>
										<th>Qty Item</th>
										<th>Total Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailx">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="requestpo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- <form action="<?php echo base_url('MasterDataControler/newcustomer') ?>" method="POST" enctype="multipart/form-data" id="forms"> -->
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">List Request Purchase Order</h5>
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
										<select name="filters" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filters">
											<option value="codereqpo">No.Request Po</option>
										</select>
										<input type="text" id="searchs" class="form-control" placeholder="Cari Berdasarkan code quotation, judul quotation, nama customer">
									</div>
								</div>
								<div class="col-4">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statusreqpos" aria-label="Default select example">
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
									<input type="date" class="form-control" name="" id="datestarts" value="<?php echo date('Y-m-01') ?>">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" class="form-control" name="" id="finishdates" value="<?php echo date('Y-m-t') ?>">
								</div>
								<div class="col-4">
									<p></p>
									<a href="#" class="btn btn-primary mt-3" onclick="loaddatax()">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table">
								<thead>
									<tr>
										<th>Code Request PO</th>
										<th>Tgl Request PO</th>
										<th>Deskripsi</th>
										<th>Status Request PO</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailreqpo">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="requestso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<div class="col-9">
									<label for="" class="form-label">Pencarian</label>
									<div class="input-group">
										<select name="filterx" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filterx">
											<option value="codeso">No.Sales Order</option>
											<option value="nopesanan">No.Pesanan</option>
											<option value="namecust">Nama Supplier</option>
										</select>
										<input type="text" id="searchx" class="form-control" placeholder="Cari Berdasarkan No Sales Order">
									</div>
								</div>
								<div class=" col-3">
									<label for="" class="form-label">Status</label>
									<select class="form-select" id="statusorder" aria-label="Default select example" style="width:auto;">
										<option value="">Pilih Status SO</option>
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
									<a href="#" class="btn btn-primary mt-3" onclick="loaddataso()">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table">
								<thead>
									<tr>
										<th>Code SO</th>
										<th>No. Pesanan</th>
										<th>Tanggal SO</th>
										<th>Customer</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="detailsox">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card bay" style="display: none;" id="po">
		<div class="card-header pl-5 border-0">
			<div class="row d-flex justify-content-between p-3">
				<div class="col-3">
				</div>
				<div class="col-8">
				</div>
				<div class="col-1">
				</div>
			</div>
		</div>
		<div class="card-body">
			<p style="border-top: 2px solid black;"></p>
			<div class="row d-flex justify-content-between">
				<div class="col-1">
				</div>
				<div class="col-5 mt-3">
					<div class="input-group">
						<p class="col-4" style="text-align: right;">FROM :</p>
						<p style="margin-left: 2vw;" id="pt"></p>
					</div>
					<div class="input-group">
						<p class="col-4" style="text-align: right;">ATTN :</p>
						<p style="margin-left: 2vw;" id="cust"></p>
					</div>
				</div>
				<div class="col-5 mt-3">
					<div class="input-group">
						<p class="col-4" style="text-align: right;">No :</p>
						<p style="margin-left: 2vw;" id="no"></p>
					</div>
					<div class="input-group">
						<p class="col-4" style="text-align: right;">DATE :</p>
						<p style="margin-left: 2vw;" id="dates"></p>
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col text-center mt-3">
					<label for="" class="form-label fs-3"><u>Purchase Order</u> </label>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col">
					<table class="table border">
						<thead style="border: 2px solid black">
							<tr>
								<td>No</td>
								<td>Sku</td>
								<td>Nama Item</td>
								<td>Harga</td>
								<td>Qty</td>
								<td>Discount Percent</td>
								<td>Discount Nominal</td>
								<td>Sub Total</td>
								<td>Total Discount</td>
								<td>Grand Total</td>
							</tr>
						</thead>
						<tbody id="bodys">

						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-6"></div>
				<div class="col-6 text-end">
					<div class="card p-3" style="background-color: white;border-radius: 8px">
						<div class="row">
							<div class="col-6 ">
								<p>Sub Total</p>
							</div>
							<div class="col-6">
								<!-- <input type="text" class="form-control border-0" id="subtotalx" name="subtotalx" readonly> -->
								<p id="subtotalx"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-6 ">
								<p>Discount Transaksi</p>
							</div>
							<div class="col-6">
								<!-- <input type="number" class="form-control border-0" id="disnomx" name="distrans" value="0"> -->
								<p id="disnomx"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-6 ">
								<p>Total Setelah Diskon</p>
							</div>
							<div class="col-6">
								<!-- <input type="text" class="form-control border-0" id="totaldiscx" name="totaldis" readonly> -->
								<p id="totaldiscx"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-6 ">
								<p>VAT</p>
							</div>
							<div class="col-6">
								<!-- <input type="text" class="form-control border-0" id="ppnx" name="ppn" readonly> -->
								<p id="ppnx"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-6 ">
								<p>Grand Total</p>
							</div>
							<div class="col-6">
								<!-- <input type="text" class="form-control border-0" id="grandtotalx" name="grandtotal" readonly> -->
								<p id="grandtotalx"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 20vh">
				<div class="col-8 mt-4" style="line-height: 0.5rem;">
				</div>
				<div class="col-4 mt-3" style="float: right;">
					<div class="input-group flex-nowrap">
						<p class="col-sm-4 " style="text-align: right;"></p>
						<p></p>
					</div>
					<div class="input-group flex-nowrap">
						<p class="col-sm-4 " style="text-align: right;"></p>
						<p></p>
					</div>
					<div class="input-group flex-nowrap">
						<p class="col-sm-4 " style="text-align: right;"></p>
						<p></p>
					</div>
					<div class="input-group flex-nowrap">
						<p class="col-sm-4" style="text-align: right;"></p>
						<p>( MARKETING )</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</form>

</body>
<datalist id="xsupp">
	<?php
	if ($data5 != 'Not Found' || !empty($data5)) {
		foreach ($data5 as $key) {
	?>
			<option value="<?php echo $key["namecust"]; ?>" namecust="<?php echo $key["namecust"]; ?>" data-idcust="<?php echo $key["idcust"]; ?>" data-email="<?php echo $key["email"]; ?>" data-address="<?php echo $key["addresscust"]; ?>" data-phone="<?php echo $key["phonecust"]; ?>"><?php echo $key["codecust"] . ' - ' . $key["namecust"]; ?></option>
	<?php }
	} ?>
</datalist>

<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	function loaddata() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/getlistpo') ?>",
			data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statuspo=" + $('#statuspo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				var baris = ""
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {


						baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["qtypo"] + `</td>
                                            <td>` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailpo('` + hasil[i]["codepo"] + `')">Pilih</a></td>
                                        </tr>`
					}
				}
				$('#detailx').html(baris)
			}

		});
	}

	function loaddatax() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/getlistreqpo') ?>",
			data: "filters=" + $('#filters').val() + "&searchs=" + $('#searchs').val() + "&statusreqpos=" + $('#statusreqpos').val() + "&datestarts=" + $('#datestarts').val() + "&finishdates=" + $('#finishdates').val(),
			dataType: "JSON",
			success: function(hasil) {
				var baris = ""
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {
						baris += `  <tr>
                                            <td>` + hasil[i]["codereqpo"] + `</td>
                                            <td>` + hasil[i]["datereqpo"] + `</td>
                                            <td>` + hasil[i]["deskripsi"] + `</td>
											<td>` + hasil[i]["statusreqpo"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailreqpo(` + hasil[i]["idreqpo"] + `)">Pilih</a></td>
                                        </tr>`
					}
				}
				$('#detailreqpo').html(baris)
			}

		});
	}

	function loaddataso() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/getlistso') ?>",
			data: "filterx=" + $('#filterx').val() + "&searchx=" + $('#searchx').val() + "&statusorder=" + $('#statusorder').val() + "&datestartx=" + $('#datestartx').val() + "&finishdatex=" + $('#finishdatex').val(),
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				var baris = ""
				if (hasil != "Not Found") {

					for (let i = 0; i < hasil.length; i++) {
						baris += `  <tr>
                                            <td>` + hasil[i]["codeso"] + `</td>
                                            <td>` + hasil[i]["nopesanan"] + `</td>
                                            <td>` + hasil[i]["dateso"] + `</td>
											<td>` + hasil[i]["namecust"] + `</td>
											<td>` + hasil[i]["statusorder"] + `</td>
                                            <td><a href="#" class="btn btn-outline-primary" data-mdb-dismiss="modal" onclick="detailso('` + hasil[i]["codeso"] + `')">Pilih</a></td>
                                        </tr>`
					}
				}
				$('#detailsox').html(baris)
			}

		});
	}

	function detailpo(x) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/detailpo') ?>",
			data: "idpo=" + x,
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				var baris = "";
				var ix = 1;
				$('#idpo').val(hasil["idpo"]);
				$('#codepo').val(hasil["codepo"]);
				$('#idsupp').val(hasil["idcust"]);
				$('#namesupp').val(hasil["namecust"]);
				$('#pt').html(hasil["namecust"]);
				$('#no').html(hasil["codepo"]);
				$('#dates').html(hasil["datepo"]);
				$('#cust').html(hasil["namecust"]);
				$('#date1').html(hasil["delivaddr"]);
				$('#tanggalpengiriman').val(hasil["delivedate"]);
				$('#matauang').val(hasil["idcurr"]);
				$('#exchange').val(hasil["exchange"]);
				$('#judulpurchase').val(hasil["deskripsi"]);

				$('#idreqpo').val(0);
				$('#idsox').val("");
				$('#codreqpo').val("");

				$('#subtotalx').html(formatnum(hasil["subtotal"]));
				$('#disnomx').html(formatnum(hasil["disctrans"]));
				$('#totaldiscx').html(formatnum(hasil["total"]));
				$('#ppnx').html(hasil["vat"]);
				$('#grandtotalx').html(formatnum(hasil["grandtotal"]));

				for (var a = 0; a < hasil["data"].length; a++) {
					var totaldisc = hasil["data"][a]["totaldisc"];
					var subtotal = hasil["data"][a]["subpo"];
					baris += `<tr>
					            <td scope="row">` + ix++ + `</td>;
                                <td>` + hasil["data"][a]["sku"] + `</td>
                                <td>` + hasil["data"][a]["nameitem"] + `</td>
                                <td>Rp. ` + formatnum(parseFloat(hasil["data"][a]["price"]).toFixed(0)) + `</td>
                                <td>` + hasil["data"][a]["qty"] + `</td>
                                <td>` + hasil["data"][a]["disper"] + `</td>
                                <td>Rp. ` + formatnum(parseFloat(hasil["data"][a]["disnom"]).toFixed(0)) + `</td>
                                <td>Rp. ` + formatnum(subtotal) + `</td>
                                <td>Rp. ` + formatnum(totaldisc) + `</td>
                                <td>Rp. ` + formatnum(parseFloat(hasil["data"][a]["grandtotal"]).toFixed(0)) + `</td>
                            </tr>`;
				}


				$('#vat').val(hasil["vat"]);
				if (hasil["vat"] == 0) {
					$('#check').prop('checked', false);
				} else {
					$('#check').prop('checked', true);
				}
				$('#action').show();
				$('#addorder').hide();
				$('#update').show();
				$('#detail').html("")

				var val = hasil["namecust"];
				var xobj = $('#xsupp option').filter(function() {
					return this.value == val;
				});

				if ((val == "") || (xobj.val() == undefined)) {
					$('#idsupp').val("");
					$('#norekening').val("");
				} else {

					$('#idsupp').val(xobj.data('idcust'));
					var data = <?php echo json_encode($data5) ?>;
					for (let i = 0; i < data.length; i++) {

						if (data[i]["idcust"] == xobj.data('idcust')) {
							var barisx = '<option value="">Pilih</option>'
							for (let b = 0; b < data[i]["data"].length; b++) {

								barisx += `<option value="` + data[i]["data"][b]["norekening"] + `">` + data[i]["data"][b]["norekening"] + ` - ` + data[i]["data"][b]["beneficiary"] + ` ( ` + data[i]["data"][b]["namabank"] + ` ) </option>`
							}
							$('#norekening').html(barisx)
						}
					}
				}
				$('#norekening').val(hasil["norekening"]);

				for (let i = 0; i < hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1);
					$('#transaksi_' + xid + '_sku').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});

					if ((val == "") || (xobj.val() == undefined)) {
						$('#transaksi_' + xid + '_iditem').val("");
						$('#transaksi_' + xid + '_sku').val("");
						$('#transaksi_' + xid + '_nameitem').val("");
						$('#transaksi_' + xid + '_harga').val("");
						$('#transaksi_' + xid + '_qty').val("");
						$('#transaksi_' + xid + '_discpercent').val("");
						$('#transaksi_' + xid + '_disnom').val("");
						$('#transaksi_' + xid + '_totaldisc').val("");
						$('#transaksi_' + xid + '_total').val("");
						$('#transaksi_' + xid + '_sub').val("");
					} else {
						$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
						$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
						$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
						$('#transaksi_' + xid + '_harga').val(formatRupiahx(hasil["data"][i]["price"]) + '');
						$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
						$('#transaksi_' + xid + '_discpercent').val(0);
						$('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnom"]);
						$('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["totaldisc"]);
						$('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["data"][i]["subpo"]) + "");
						$('#transaksi_' + xid + '_total').val(formatRupiah(hasil["data"][i]["grandtotal"]) + "");

					}
					calc();
					document.getElementById('codepo').disabled = true;
					document.getElementById('namesupp').disabled = true;
					document.getElementById('date1').disabled = true;
					document.getElementById('norekening').disabled = true;
					document.getElementById('tanggalpengiriman').disabled = true;
					document.getElementById('matauang').disabled = true;
					document.getElementById('exchange').disabled = true;
					document.getElementById('tanggalpengiriman').disabled = true;
					document.getElementById('judulpurchase').disabled = true;
					document.getElementById('check').disabled = true;
					document.getElementById('transaksi_' + xid + '_qty').disabled = true;
					document.getElementById('transaksi_' + xid + '_discpercent').disabled = true;
					document.getElementById('transaksi_' + xid + '_disnom').disabled = true;
					document.getElementById('transaksi_' + xid + '_sub').disabled = true;
					document.getElementById('transaksi_' + xid + '_totaldisc').disabled = true;
					document.getElementById('transaksi_' + xid + '_total').disabled = true;
					$('#simpan').hide()
					if (hasil["statuspo"] == "Waiting") {
						$('#cancel').show()
					} else {
						$('#cancel').hide()
					}

				}
				$('#bodys').html(baris);

			}
		});
	}

	function detailreqpo(x) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/detailreqpo') ?>",
			data: "idreqpo=" + x,
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				$('#codereqpo').val(hasil["codereqpo"]);
				$('#idreqpo').val(hasil["idreqpo"]);
				$('#date1').val(hasil["datereqpo"]);
				$('#judulpurchase').val(hasil["deskripsi"]);
				$('#idsox').val(0);
				$('#idpo').val(0);
				$('#detail').html("");

				for (let i = 0; i <= hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1);
					$('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});
					$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
					$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
					$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
					$('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + '');
					$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_discpercent').val(0);
					$('#transaksi_' + xid + '_disnom').val(0);
					$('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["subtotal"]) + '');
					$('#transaksi_' + xid + '_totaldisc').val(0);
					$('#transaksi_' + xid + '_total').val(formatRupiah(hasil["grandtotal"]) + '');
					calc();

				}
			}
		});
	}

	function detailso(x) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('InventoryController/detailso') ?>",
			data: "idso=" + x,
			dataType: "JSON",
			success: function(hasil) {
				console.log(hasil)
				$('#idsox').val(hasil["idso"]);
				$('#codeso').val(hasil["codeso"]);
				$('#dateso').val(hasil["dateso"]);
				$('#delivedate').val(hasil["delivedate"]);
				$('#idsupp').val(hasil["idcust"]);
				$('#idreqpo').val(0);
				$('#idpo').val(0);
				$('#detail').html("");

				var val = hasil["namecust"];
				var xobj = $('#xsupp option').filter(function() {
					return this.value == val;
				});


				for (let i = 0; i <= hasil["data"].length; i++) {
					add_row_transaksi(i)
					var xid = Number(i) + Number(1);
					$('#transaksi_' + xid + '_iditem').val(hasil["data"][i]["sku"]);
					var val = hasil["data"][i]["sku"];
					var xobj = $('#xitem option').filter(function() {
						return this.value == val;
					});
					$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
					$('#transaksi_' + xid + '_sku').val(xobj.data('sku'));
					$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
					$('#transaksi_' + xid + '_harga').val(formatRupiah(hasil["data"][i]["price"]) + "");
					$('#transaksi_' + xid + '_qty').val(hasil["data"][i]["qty"]);
					$('#transaksi_' + xid + '_discpercent').val(hasil["data"][i]["disnomdet"]);
					$('#transaksi_' + xid + '_disnom').val(hasil["data"][i]["disnomdet"]);
					$('#transaksi_' + xid + '_sub').val(formatRupiah(hasil["data"][i]["totalso"]) + "");
					$('#transaksi_' + xid + '_totaldisc').val(hasil["data"][i]["totaldisc"]);
					$('#transaksi_' + xid + '_total').val(formatRupiah(hasil["data"][i]["grandtotaldet"]) + "");
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

	$(document).keypress(function(e) {
		if (e.which == 13) {
			e.preventDefault();
		}
	});

	$(document).on('input', '#namesupp', function() {
		var val = $(this).val();
		var xobj = $('#xsupp option').filter(function() {
			return this.value == val;
		});

		if ((val == "") || (xobj.val() == undefined)) {
			$('#idsupp').val("");
			$('#norekening').val("");
		} else {

			$('#idsupp').val(xobj.data('idcust'));
			var data = <?php echo json_encode($data5) ?>;
			for (let i = 0; i < data.length; i++) {

				if (data[i]["idcust"] == xobj.data('idcust')) {
					var baris = '<option value="">Pilih</option>'
					for (let b = 0; b < data[i]["data"].length; b++) {

						baris += `<option value="` + data[i]["data"][b]["norekening"] + `">` + data[i]["data"][b]["norekening"] + ` - ` + data[i]["data"][b]["beneficiary"] + ` ( ` + data[i]["data"][b]["namabank"] + ` ) </option>`
					}
					$('#norekening').html(baris)
				}


			}
		}
	});

	add_row_transaksi(0)

	function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xqty += $('#transaksi_' + xid + '_qty').val();
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
		tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:150px;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_discpercent" oninput="discx(' + xid + ')"  class="form-control"name="discpercent[]" value="" oninput="discp(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="number" id="transaksi_' + xid + '_disnom" oninput="discxx(' + xid + ')"  class="form-control"name="disnom[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_sub"  class="form-control"name="sub[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_totaldisc"  class="form-control"name="totaldisc[]" value="" oninput="disn(' + xid + ')"/></td>';
		tabel += '<td style="border:none"height:1px"><input style="width:100%" type="text" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';
		tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		// return tabel;
		$('#line-transaksi').val(xid);
		$('#detail').append(tabel);
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



	$(document).on('input', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {

			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_harga').val("");
			$('#transaksi_' + xid + '_qty').val("");
			$('#transaksi_' + xid + '_discpercent').val("");
			$('#transaksi_' + xid + '_disnom').val("");
			$('#transaksi_' + xid + '_totaldisc').val("");
			$('#transaksi_' + xid + '_total').val("");
			$('#transaksi_' + xid + '_sub').val("");

			document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
			document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
			document.getElementById('transaksi_' + xid + '_discpercent').readOnly = true;
			document.getElementById('transaksi_' + xid + '_disnom').readOnly = true;
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_harga').val(formatRupiah(xobj.data('price') + ''));
			$('#transaksi_' + xid + '_qty').val(1);
			$('#transaksi_' + xid + '_discpercent').val(0);
			$('#transaksi_' + xid + '_disnom').val(0);
			$('#transaksi_' + xid + '_totaldisc').val(0);
			$('#transaksi_' + xid + '_total').val(formatRupiah(xobj.data('price') + ''));
			$('#transaksi_' + xid + '_sub').val(formatRupiah(xobj.data('price') + ''));

			document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
			document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
			document.getElementById('transaksi_' + xid + '_discpercent').readOnly = false;
			document.getElementById('transaksi_' + xid + '_disnom').readOnly = false;
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

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "update") {
			var xask = '';
			if ($("#idpo").val() == "") {
				xask = "Ubah Transaksi?";
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

		xval = $("#namesupp").val();
		if ($("#namesupp").val() == '') {
			alert('Input Supplier');
			sts = 0;
			return false;
		}

		xval = $("#tanggalpengiriman").val();
		if ($("#tanggalpengiriman").val() == '') {
			alert('Input Tanggal Pengiriman');
			sts = 0;
			return false;
		}


		xval = $("#mataung").val();
		if ($("#matauang").val() == '') {
			alert('Input Matauang');
			sts = 0;
			return false;
		}

		xval = $("#norekening").val();
		if ($("#norekening").val() == '') {
			alert('Input No rekening');
			sts = 0;
			return false;
		}


		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");

			if (Number($('#transaksi_' + xid + '_disnom').val()) > Number($('#transaksi_' + xid + '_total').val())) {
				alert('Discount Tidak Boleh Lebih Besar Dari Grand Total !!');
				sts = 0;
				return false;
			}

		});



		if (sts == 1) {
			return true;
		} else {
			return false;
		}
	}

	function cal(x) {
		console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b " +
			$('#transaksi_' + x + '_disnom').val() + " c " + $('#transaksi_' + x + '_disnom').val() + " d ")
		$('#transaksi_' + x + '_sub').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val().replaceAll(".", "") + ""))
		$('#transaksi_' + x + '_totaldisc').val(formatRupiah($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_disnom').val().replaceAll(".", "") + ""))
		$('#transaksi_' + x + '_total').val(formatRupiah($('#transaksi_' + x + '_sub').val().replaceAll(".", "") - $('#transaksi_' + x + '_totaldisc').val().replaceAll(".", "") + ""))
		calc();
	}

	function discx(xid) {
		console.log($('#transaksi_' + xid + '_discpercent').val() + " " + xid)
		$('#transaksi_' + xid + '_disnom').val(formatRupiah($('#transaksi_' + xid + '_harga').val().replaceAll(".", "") * $('#transaksi_' + xid + '_discpercent').val() / 100 + ""));
		cal(xid)
	}

	function discxx(xid) {
		console.log($('#transaksi_' + xid + '_disnom').val() + " " + $('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))
		$('#transaksi_' + xid + '_discpercent').val(0)

		if (Number($('#transaksi_' + xid + '_disnom').val()) > Number($('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))) {
			console.log("O")
			alert("diskon melebihi total harga")
			$('#transaksi_' + xid + '_disnom').val($('#transaksi_' + xid + '_sub').val().replaceAll(".", ""))
		}
		cal(xid)
	}

	function calc() {
		var xttl = 0;
		var dpp = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll('.', ''));
			}
		});

		if ($("#check").is(":checked") == true) {
			vat = (xttl - $('#disnom').val().replaceAll(".", "")) * 11 / 100;
		} else {
			vat = 0;
		}
		grandtot = Number((xttl - $('#disnom').val().replaceAll(".", ""))) + Number(vat)
		$("#ppn").val(formatRupiah(vat + ""))
		$("#subtotal").val(formatRupiah(xttl + ""))
		$("#grandtotal").val(formatRupiah(grandtot + ""))
	}

	function addorder() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addpo') ?>", cx,
			function(data) {
				console.log(data)
				if (data == 'Success') {
					alert('Data Berhasil Dengan No. PO');
					$('#action').show();
					$('#xxx').show();
					$('#xnxx').hide();
					// cancelorder();
				} else {
					alert('' + data);
					$('#action').show();
					$('#xxx').show();
					$('#xnxx').hide();
					detailpo(data.replace("Success Dengan No. ", ""));

				}
			});
	}

	function update() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/addpo') ?>", cx,
			function(data) {
				if (data == 'Success') {
					alert('Update Data Berhasil');
					cancelorder();
				} else {
					alert('Update Data Gagal. ' + data);
				}
			});
	}


	function cancelorder() {
		location.reload();
	}

	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		if ($("#date1").val() == '') {
			$("#date1").val(date);
		}
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
		if ($("#tanggalpengiriman").val() == '') {
			$("#tanggalpengiriman").val(date);
		}
	});

	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		location.reload();
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
</script>