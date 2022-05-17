<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
$idnew;
if ($data3 != "Not Found") {
	foreach ($data3 as $key) {
		$idnew = $key["codein"];
		$idnew++;
	}
} else {
	$idnew = "INVIN-TRS-001";
}
?>

<form action="<?php echo base_url('MasterDataControler/newinvin') ?>" method="POST" enctype="multipart/form-data" id="form">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
			</ol>
			<h3 class="text-white">Register Ingoing</h3>
		</nav>
	</div>
	<div class="content bg-white mx-4">
		<div class="container-fluid">
			<div class="row">
				<?php echo $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			</div>
			<input type="hidden" name="idin" id="idin">
			<input type="hidden" name="codein" id="codein">
			<div class="row mb-3">
				<div class="col-4">
					<div class="row">
						<label for="" class="form-label fs-3 mb-3">Informasi Dasar</label>
						<div class="col-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">No. Transaksi</label>
								<input type="text" name="codein" class="form-control" value="<?php echo $idnew ?>" readonly>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
							</div>
						</div>
						<div class="col-4 mb-3"></div>
					</div>
					<div class="row">
						<div class="col-8 mb-3">
							<label for="exampleFormControlInput1" class="form-label">Tipe Ingoing</label>
							<select name="typein" id="myDIV" onchange="ubah(this.value)" class="form-select">
								<option value="supplier">Supplier</option>
								<option value="warehousex">Move Warehouse</option>
								<option value="return">Return</option>
								<option value="inititalstock">Initial Stock</option>
							</select>
						</div>
						<div class="col-4"></div>
					</div>
					<div class="row mb-3">
						<div class="col-8">
							<label for="" class="form-label">Customer</label>
							<select name="namecust1" id="" class="form-select" required>
								<option value="">Pilih</option>
								<?php if ($data4 != "Not Found") : ?>
									<?php foreach ($data4 as $key) : ?>
										<option value="<?php echo $key["idcust"] ?>"><?php echo $key["namecust"] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
						</div>
						<div class="col-4 mb-3"></div>
					</div>
					<div id="supplierx">
						<div class="row">
							<div class="col-8">
								<div class="mb-3">
									<label for="" class="form-label">No. Purchase Order</label>
									<input type="hidden" class="form-control" id="idpo" name="idpo">
									<input type="text" id="codepo" name="codepo" class="form-control" readonly>
								</div>
							</div>
							<div class="col-4 mb-3">
								<p></p>
								<a href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary mt-3">Cari Data</a>
							</div>
						</div>

					</div>
					<div id="warehousexx" style="display: none;">
						<div class="row">
							<div class="col-8">
								<div class="mb-3">
									<label for="" class="form-label">Data Move WH</label>
									<input type="hidden" class="form-control" id="idmove" name="idmove">
									<input type="text" id="codemove" name="codemove" class="form-control" readonly>
								</div>
							</div>
							<div class="col-4 mb-3">
								<p></p>
								<a href="" data-mdb-toggle="modal" data-mdb-target="#modalgudang" class="btn btn-primary mt-3">Cari Data</a>
							</div>
						</div>
					</div>
					<div id="returnx" style="display: none;">
						<div class="row">
							<div class="col-8">
								<label for="" class="form-label">Customer</label>
								<select class="form-select" aria-label="Default select example">
									<option selected>Open this select menu</option>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
							</div>
							<div class="col-4"></div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<label for="" class="form-label fs-3 mb-3">Informasi Gudang & Mata Uang</label>
					<div id="supplier">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang Penerima</label>
								<select name="namewarehouse" id="" class="form-select" required>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data2 as $key) : ?>
											<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Masuk</label>
								<input type="date" name="datein" id="date" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row">
							<div class="col-5">
								<label for="" class="form-label">Mata Uang</label>
								<select name="currency" id="" class="form-select" required>
									<?php if ($data1 != "Not Found") : ?>
										<?php foreach ($data1 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-5"></div>
						</div>
					</div>
					<div id="warehousex" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang Pengirim</label>
								<select name="namewarehouse1" id="" class="form-select" aria-label="Disabled select example">
									<option value="">Pilih</option>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data2 as $key) : ?>
											<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Gudang Penerima</label>
								<select name="namewarehouse1" id="" class="form-select" aria-label="Disabled select example">
									<option value="">Pilih</option>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data2 as $key) : ?>
											<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row">
							<div class="col-5">
								<label for="" class="form-label">Tanggal Masuk</label>
								<input type="date" class="form-control" name="datein1" id="datein1">
							</div>
							<div class="col-5">
								<label for="" class="form-label">Mata Uang</label>
								<select name="currency1" id="" class="form-select" required>
									<?php if ($data1 != "Not Found") : ?>
										<?php foreach ($data1 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-2"></div>
						</div>
					</div>
					<div id="return" style="display: none;">
						<div class="row mb-3">
							<div class="col-5">
								<label for="" class="form-label">Gudang Penerima</label>
								<select name="namewarehouse" id="" class="form-select" aria-label="Disabled select example" disabled>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data2 as $key) : ?>
											<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-5">
								<label for="" class="form-label">Tanggal Masuk</label>
								<input type="date" name="" id="" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
							</div>
							<div class="col-2"></div>
						</div>
						<div class="row">
							<div class="col-5">
								<label for="" class="form-label">Mata Uang</label>
								<select name="currency" id="" class="form-select" required>
									<?php if ($data1 != "Not Found") : ?>
										<?php foreach ($data1 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
							<div class="col-5"></div>
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
		<div class="row" id="suptable">
			<label for="" class="form-label fs-5 mt-3">Item/Produk</label>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<table class="table">
				<thead>
					<tr>
						<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
						<th style="background:#1143d8;color:white;text-align:right;">Nama Item</th>
						<th style="background:#1143d8;color:white;text-align:right;">Deskripsi</th>
						<th style="background:#1143d8;color:white;text-align:right;">Harga</th>
						<th style="background:#1143d8;color:white;text-align:right;">Qty Po</th>
						<th style="background:#1143d8;color:white;text-align:right;">Qty In</th>
						<th style="background:#1143d8;color:white;text-align:right;">Selisih</th>
						<th style="background:#1143d8;color:white;text-align:right;">Expire Date</th>
						<th style="background:#1143d8;color:white;text-align:right;">Action</th>
					</tr>
				</thead>
			</table>
			<table class="table table-striped table-hover">
				<tbody id="detailx">
				</tbody>
			</table>
			</table>
			<div class="mr-4" style="text-align:right;">
				<button type="button" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
			</div>
		</div>


		<div class="row" id="movewhtable" style="display: none;">
			<label for="" class="form-label fs-5 mt-3">Item/Produk</label>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<table class="table">
				<thead>
					<tr>
						<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
						<th style="background:#1143d8;color:white;text-align:right;">Nama Item</th>
						<th style="background:#1143d8;color:white;text-align:right;">Unit</th>
						<th style="background:#1143d8;color:white;text-align:right;">Harga</th>
						<th style="background:#1143d8;color:white;text-align:right;">Qty In</th>
						<th style="background:#1143d8;color:white;text-align:right;">Selisih</th>
						<th style="background:#1143d8;color:white;text-align:right;">Expire Date</th>
						<th style="background:#1143d8;color:white;text-align:right;">Action</th>
					</tr>
				</thead>
			</table>
			<table class="table table-striped table-hover">
				<tbody id="detailmovewh">
				</tbody>
			</table>
			</table>
			<div class="mr-4" style="text-align:right;">
				<button type="button" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
			</div>
		</div>

		<div class="row" id="returntable" style="display: none;">
			<label for="" class="form-label fs-5 mt-3">Item/Produk</label>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<table class="table">
				<thead>
					<tr>
						<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
						<th style="background:#1143d8;color:white;text-align:center;">Nama Item</th>
						<th style="background:#1143d8;color:white;text-align:center;">Unit</th>
						<th style="background:#1143d8;color:white;text-align:center;">Qty In</th>
						<th style="background:#1143d8;color:white;text-align:center;">Expire Date</th>
						<th style="background:#1143d8;color:white;text-align:center;">Action</th>
					</tr>
				</thead>
			</table>
			<table class="table table-striped table-hover">
				<tbody id="detailreturn">
				</tbody>
			</table>
			</table>
			<div class="mr-4" style="text-align:right;">
				<button type="button" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
			</div>
		</div>

		<div class="row" id="initialtable" style="display: none;">
			<label for="" class="form-label fs-5 mt-3">Item/Produk</label>
			<input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
			<table class="table">
				<thead>
					<tr>
						<th style="background:#1143d8;color:white;text-align:center;">SKU</th>
						<th style="background:#1143d8;color:white;text-align:right;">Nama Item</th>
						<th style="background:#1143d8;color:white;text-align:right;">Deskripsi</th>
						<th style="background:#1143d8;color:white;text-align:right;">Harga</th>
						<th style="background:#1143d8;color:white;text-align:right;">Qty Po</th>
						<th style="background:#1143d8;color:white;text-align:right;">Qty In</th>
						<th style="background:#1143d8;color:white;text-align:right;">Selisih</th>
						<th style="background:#1143d8;color:white;text-align:right;">Expire Date</th>
						<th style="background:#1143d8;color:white;text-align:right;">Action</th>
					</tr>
				</thead>
			</table>
			<table class="table table-striped table-hover">
				<tbody id="detailreturn">
				</tbody>
			</table>
			</table>
			<div class="mr-4" style="text-align:right;">
				<button type="button" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalgudang" tabindex="-1" aria-labelledby="modalgudangLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">DAFTAR MOVE ITEM</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-5">
							<label for="" class="form-label">Pencarian</label>
							<input type="text" class="form-control" placeholder="Cari berdasarkan customer">
						</div>
						<div class="col-1"></div>
						<div class="col-6">
							<div class="row">
								<div class="col-4">
									<label for="" class="form-label">Mulai Dari</label>
									<input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
								</div>
								<div class="col-4">
									<p></p>
									<a href="" class="btn btn-primary mt-3">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mx-1" style="overflow-x: auto;">
						<table class="table table-bordered table-striped" id="table-user">
							<thead>
								<tr>
									<td style="text-align:center;">No. Outgoing (DO)</td>
									<td style="text-align:center;">Gudang Pengirim</td>
									<td style="text-align:center;">Qty Item</td>
									<td style="text-align:center;">Total Amount</td>
									<td style="text-align:center;">Status <i class='bx bx-down-arrow-alt'></i></td>
									<td style="text-align:center;">Action</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><a href="" class=" btn btn-primary">Pilih</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header" style="background:#1143d8;color:white;">
					<h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;">X</button>
				</div>
				<div class="modal-body">
					<div class="row mb-4">
						<div class="col-5">
							<label for="" class="form-label">Pencarian</label>
							<input type="text" class="form-control" placeholder="Cari berdasarkan customer">
						</div>
						<div class="col-1"></div>
						<div class="col-6">
							<div class="row">
								<div class="col-4">
									<label for="" class="form-label">Mulai Dari</label>
									<input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
								</div>
								<div class="col-4">
									<label for="" class="form-label">Sampai Dengan</label>
									<input type="date" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" onfocus=" (this.type='date' )" onblur="(this.type='text')">
								</div>
								<div class="col-4">
									<p></p>
									<a href="" class="btn btn-primary mt-3">Terapkan</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mx-1" style="overflow-x: auto;">
						<table class="table table-bordered table-striped" id="table-user">
							<thead>
								<tr>
									<td>No</td>
									<td>No. Purchase Order</td>
									<td>Tgl Order</td>
									<td>Tgl Delivery</td>
									<td>Qty PO</td>
									<td>Qty IN</td>
									<td>Total Amount</td>
									<td>Status <i class='bx bx-down-arrow-alt'></i></td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php if ($data7 != "Not Found") : ?>
									<?php $no = 1; ?>
									<?php foreach ($data7 as $key) : ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $key["codepo"] ?></td>
											<td><?php echo $key["datepo"] ?></td>
											<td><?php echo $key["delivedate"] ?></td>
											<td><?php echo $key["qtypo"] ?></td>
											<td><?php echo $key["qtyin"] ?></td>
											<td><?php echo $key["grandtotal"] ?></td>
											<td><?php echo $key["statuspo"] ?></td>
											<td><a data-mdb-dismiss="modal" class="btn btn-primary" onclick="poselect('<?php echo $key['codepo'] ?>','<?php echo $key['idpo'] ?>','<?php echo $key['datepo'] ?>')">Pilih</a></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	var datax = <?php echo json_encode($data7); ?>;
	console.log(datax)

	function ubah(x) {
		if (x == "supplier") {
			$('#supplier').show();
			$('#supplierx').show();
			$('#warehousex').hide();
			$('#warehousexx').hide();
			$('#return').hide();
			$('#returnx').hide();
			$('#suptable').show();
			$('#movewhtable').hide();
			$('#returntable').hide();
			$('#initialtable').hide();
		} else if (x == "warehousex") {
			$('#supplier').hide();
			$('#supplierx').hide();
			$('#warehousex').show();
			$('#warehousexx').show();
			$('#return').hide();
			$('#returnx').hide();
			$('#suptable').hide();
			$('#movewhtable').show();
			$('#returntable').hide();
			$('#initialtable').hide();
		} else if (x == "return") {
			$('#supplier').hide();
			$('#supplierx').hide();
			$('#warehousex').hide();
			$('#warehousexx').hide();
			$('#return').show();
			$('#returnx').show();
			$('#suptable').hide();
			$('#movewhtable').hide();
			$('#returntable').show();
			$('#initialtable').hide();
		}
	}
</script>

<datalist id="xitem">
	<?php if ($data != 'Not Found') {
		foreach ($data as $key) { ?>
			<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php }
	} ?>
</datalist>
<script type="text/javascript">
	add_row_transaksi(0)
	add_row_transaksi1(0)
	add_row_transaksi2(0)

	function poselect(x, y, z) {
		$('#codepo').val(x);
		$('#idpo').val(y);
		$('#datepo').val(z);
		loadreq();
	}

	var xitem = '';
	xitem = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["price"] . '" nameitem="' . $key["nameitem"] . '"  sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

	var xunit = '';

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
			//$(this).val(i+1);
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

	function del_row_transaksi1(xid) {
		$('#transaksi1-' + xid + '').remove();
		reorder();
		calc();
	}

	function del_row_transaksi2(xid) {
		$('#transaksi2-' + xid + '').remove();
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
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi1-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control  iditem" name="transaksi_iditem[]" / ></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control _nameitem" name="transaksi_nameitem[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi_' + xid + '_deskripsi" autocomplete="off" objtype="_deskripsi" class="form-control  _deskripsi" name="transaksi_deskripsi[]' + xid + '_deskripsi"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" readonly id="transaksi_' + xid + '_qtypo" class="form-control  _qtypo" value="0" name="transaksi_qtypo[]" onchange="count(' + xid + ')" value="0"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_qtyin" class="form-control  _qtyin" value="0" name="transaksi_qtyin[]" onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" readonly id="transaksi_' + xid + '_balance" class="form-control _balance" value="0" name="transaksi_balance[]"  onchange="count(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input  autocomplete="off" type="date" id="transaksi_' + xid + '_expiredate" objtype="expiredate"  class="form-control _expiredate" name="transaksi_expiredate[]"></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
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

	function add_row_transaksi1(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi1_" + xxid + "_nourut1").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi1-' + xid + '"><input type="hidden" id="transaksi1_' + xid + '_iditem1"  class="form-control  iditem1" name="transaksi_iditem1[]" / ></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi1_' + xid + '_sku1" name="transaksi_sku1[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi1_' + xid + '_nameitem1"  class="form-control _nameitem" name="transaksi_nameitem1[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi1_' + xid + '_deskripsi1" autocomplete="off" class="form-control  _deskripsi1" name="transaksi_unit1[]' + xid + '_deskripsi"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi1_' + xid + '_harga1" autocomplete="off" class="form-control  _harga" name="transaksi_harga1[]' + xid + '_harga"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi1_' + xid + '_qtyin1" class="form-control  _qtyin1" value="0" name="transaksi_qtyin1[]" onchange="count1(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" readonly id="transaksi1_' + xid + '_balance1" class="form-control _balance1" value="0" name="transaksi_balance1[]"  onchange="count1(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input  autocomplete="off" type="date" id="transaksi1_' + xid + '_expiredate" objtype="expiredate"  class="form-control _expiredate" name="transaksi_expiredate1[]"></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi1-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi1(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailmovewh').append(tabel);
		$('#transaksi1_' + xid + '_nourut1').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi1-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi1(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi1(' + xxid + ')"><b>x</b>');
			$('#transaksi1-tr-' + xxid + '').html(xdt);
		}
	}

	function add_row_transaksi2(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi2_" + xxid + "_nourut2").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi2-' + xid + '"><input type="hidden" id="transaksi2_' + xid + '_iditem2"  class="form-control  iditem2" name="transaksi_iditem2[]" / ></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku2" objtype="sku2" id="transaksi2_' + xid + '_sku2" name="transaksi_sku2[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi2_' + xid + '_nameitem2"  class="form-control _nameitem2" name="transaksi_nameitem2[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi2_' + xid + '_deskripsi2" autocomplete="off" class="form-control  _deskripsi2" name="transaksi_unit1[]' + xid + '_deskripsi"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi2_' + xid + '_qtyin2" class="form-control  _qtyin2" value="0" name="transaksi_qtyin2[]" onchange="count2(' + xid + ')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input  autocomplete="off" type="date" id="transaksi2_' + xid + '_expiredate2" class="form-control _expiredate2" name="transaksi_expiredate2[]"></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi2-tr-' + xid + '"><button style="width:60px" id="transaksi2_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi2(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailreturn').append(tabel);
		$('#transaksi2_' + xid + '_nourut2').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi2-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi2(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi2(' + xxid + ')"><b>x</b>');
			$('#transaksi2-tr-' + xxid + '').html(xdt);
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
			$('#transaksi_' + xid + '_harga').val(0);
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_qtypo').val("");
			$('#transaksi_' + xid + '_expiredate').val("");
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('price'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_expiredate').val(xobj.data('expiredate'));
		}
		calc();
	});

	$(document).on('change', '.sku', function() {
		var xid = $(this).attr('id').replace("transaksi1_", "").replace("_sku1", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi1_' + xid + '_sku1').val("");
			$('#transaksi1_' + xid + '_iditem1').val("");
			$('#transaksi1_' + xid + '_nameitem1').val("");
			$('#transaksi1_' + xid + '_harga1').val(0);
			$('#transaksi1_' + xid + '_deskripsi1').val("");
			$('#transaksi1_' + xid + '_expiredate1').val("");
		} else {
			$('#transaksi1_' + xid + '_sku1').val(xobj.data('sku'));
			$('#transaksi1_' + xid + '_iditem1').val(xobj.data('iditem'));
			$('#transaksi1_' + xid + '_nameitem1').val(xobj.data('nameitem'));
			$('#transaksi1_' + xid + '_harga1').val(xobj.data('price'));
			$('#transaksi1_' + xid + '_deskripsi1').val(xobj.data('deskripsi'));
			$('#transaksi1_' + xid + '_expiredate1').val(xobj.data('expiredate'));
		}
		calc();
	});

	$(document).on('change', '.sku2', function() {
		var xid = $(this).attr('id').replace("transaksi2_", "").replace("_sku2", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi2_' + xid + '_sku2').val("");
			$('#transaksi2_' + xid + '_iditem2').val("");
			$('#transaksi2_' + xid + '_nameitem2').val("");
			$('#transaksi2_' + xid + '_harga2').val(0);
			$('#transaksi2_' + xid + '_deskripsi2').val("");
			$('#transaksi2_' + xid + '_expiredate2').val("");
		} else {
			$('#transaksi2_' + xid + '_sku2').val(xobj.data('sku'));
			$('#transaksi2_' + xid + '_iditem2').val(xobj.data('iditem'));
			$('#transaksi2_' + xid + '_nameitem2').val(xobj.data('nameitem'));
			$('#transaksi2_' + xid + '_harga2').val(xobj.data('price'));
			$('#transaksi2_' + xid + '_deskripsi2').val(xobj.data('deskripsi'));
			$('#transaksi2_' + xid + '_expiredate2').val(xobj.data('expiredate'));
		}
		calc();
	});

	function loadreq() {
		var xid = $('#idpo').val();

		$.post("<?php echo base_url('InventoryController/getpo?'); ?>", {
			id: xid
		}, function(result) {
			var data = $.parseJSON(result);
			if (data.headertrans != "Not Found") {
				$('#detailx').html('');
				$("#idpo").val(data.headertrans['idpo']);
				$("#codepo").val(data.headertrans['codepo']);
				$("#datepo").val(data.headertrans['datepo']);

				console.log(xid);


				var xiddet = 0;
				var xlost = 0;
				if (data.detailtrans != "Not Found") {
					for (var xiddet2 = 0; xiddet2 < data.detailtrans.length; xiddet2++) {

						if (parseFloat(data.detailtrans[(xiddet2)]['qtystd']).toFixed(0) > 0) {
							add_row_transaksi(xiddet);
							xiddet = xiddet + 1;
							$('#transaksi_' + xiddet + '_idpodet').val(data.detailtrans[(xiddet + xlost - 1)]['idpodet']);
							$('#transaksi_' + xiddet + '_iditem').val(data.detailtrans[(xiddet + xlost - 1)]['iditem']);
							$('#transaksi_' + xiddet + '_sku').val(data.detailtrans[(xiddet + xlost - 1)]['sku']);
							$('#transaksi_' + xiddet + '_nameitem').val(data.detailtrans[(xiddet + xlost - 1)]['nameitem']);
							$('#transaksi_' + xiddet + '_deskripsi').val(data.detailtrans[(xiddet + xlost - 1)]['deskripsi']);
							$('#transaksi_' + xiddet + '_harga').val(data.detailtrans[(xiddet + xlost - 1)]['price'].replace(".0000", ""));
							$('#transaksi_' + xiddet + '_qtypo').val(data.detailtrans[(xiddet + xlost - 1)]['qty']);
							$('#transaksi_' + xiddet + '_expiredate').val(data.detailtrans[(xiddet + xlost - 1)]['expiredate']);
						} else {
							xlost = xlost + 1;
						}
					}
				}
				// add_row_transaksi(xiddet);
				calc();
			}
		});
	}

	function addorder() {
		var cx = $('#form').serialize();
		$.post("<?php echo base_url('MasterDataControler/newinvin') ?>", cx,
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
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Transaksi?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			var xask = '';
			if ($("#idin").val() == '') {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addorder();
				}
			}
		} else if ($(this).attr('id') == 'delorder') {
			if (confirm("Delete Transaksi?")) {
				delorder();
			}
		}
		e.preventDefault();
	});

	function validasi() {
		var xval = 0;
		var sts = 1;
		xval = $("#qtyin").val();
		if (xval == '0') {
			alert('Masukan Qty In');
			sts = 0;
			return false;
		}
		// xval = $("#datein").val();
		// if ($("#datein").val() == '') {
		// 	alert('Input Tanggal Masuk');
		// 	sts = 0;
		// 	return false;
		// }

		$('input[objtype=expiredate]').each(function(i, obj) {

			xid = $(this).attr('id').replace("transaksi_", "").replace("_expiredate", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				if ($("#datein").val() >= $(this).val()) {
					alert('Tanggal Expired Dibawah Atau Sama Dengan Tanggal Transaksi');
					sts = 0;
					return false;
				}
			}
		});
		if (sts == 1) {
			return true;
		} else {
			return false;
		}
		//return 'ok';
	}

	function cancelorder() {
		location.reload();
		//return false;
	}

	function count(xid) {
		var qtypos = $('#transaksi_' + xid + '_qtypo').val();
		var qtyins = $('#transaksi_' + xid + '_qtyin').val();
		var totals = qtypos - qtyins;
		$('#transaksi_' + xid + '_balance').val(totals);
	}

	function count1(xid) {
		var qtyins = $('#transaksi1_' + xid + '_qtyin1').val();
		var totals = qtyins;
		$('#transaksi1_' + xid + '_balance1').val(totals);
	}

	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		if ($("#date").val() == '') {
			$("#date").val(date);
		}
	});
</script>