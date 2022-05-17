<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
	<div class="header px-4 pt-2" style="height: 196px;">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
				<li class="breadcrumb-item m-0 bc-active" aria-current="page">Transaction Book</li>
			</ol>
			<h3 class="text-white">IN/OUT REPORT</h3>
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
						<div class="row mb-5">
							<div class="col-4">
								<div class="row">
									<div class="col-5">
										<label for="" class="form-label">Pilih Gudang</label>
										<select name="namewarehouse" id="" class="form-select" required>
											<?php if ($data1 != "Not Found") : ?>
												<?php foreach ($data1 as $key) : ?>
													<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
									<div class="col-5">
										<label for="" class="form-label">Item Type</label>
										<select name="" id="" class="form-select" onchange="ubah(this.value)">
											<option value="bahbak">Bahan Baku</option>
											<option value="produk">Produk</option>
										</select>
									</div>
									<div class="col-2"></div>
								</div>
							</div>
							<div class="col-4">
								<div class="row">
									<div class="col-4">
										<label for="" class="form-label">Mulai Dari</label>
										<input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
									</div>
									<div class="col-4">
										<label for="" class="form-label">Sampai Dengan</label>
										<input type="date" name="tanggalmasuk" id="date1" style="cursor: pointer;" class="form-control">
									</div>
									<div class="col-4">
										<p></p>
										<a href="" class="btn btn-outline-primary mt-3">Terapkan</a>
									</div>
								</div>
							</div>
							<div class="col-4">
								<label for="" class="form-label">Cetak & Download</label>
								<div class="row">
									<div class="col">
										<button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
										<button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="bahbakx" class="row mb-5" style="overflow-x: auto;">
						<table class="table table-bordered table-striped " id="table-user">
							<thead style="background:#1143d8;color:white">
								<tr>
									<td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
									<td>Namas Item</td>
									<td>Spesifikasi</td>
									<td>Item Type</td>
									<td>SKU</td>
									<td>Unit</td>
									<td>Min Stock</td>
									<td>Begin</td>
									<td>QTY In</td>
									<td>QTY Out</td>
									<td>Balance</td>
								</tr>
							</thead>
							<tbody>
								<?php if ($data != "Not Found") : ?>
									<?php foreach ($data as $key) : ?>
										<tr>
											<td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
											<td><?php echo $key["nameitem"] ?></td>
											<td><?php echo $key["deskripsi"] ?></td>
											<td><?php echo $key["itemgroup"] ?></td>
											<td><?php echo $key["sku"] ?></td>
											<td><?php echo $key["qtypo"] ?></td>
											<td><?php echo $key["qtyindet"] ?></td>
											<td><?php echo $key["balance"] ?></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
					<div id="produkx" class="row mb-5" style="overflow-x: auto;display : none">
						<table class="table table-bordered table-striped " id="table-user">
							<thead style="background:#1143d8;color:white">
								<tr>
									<td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
									<td>Nama Item</td>
									<td>Spesifikasi</td>
									<td>Item Type</td>
									<td>SKU</td>
									<td>QTY In</td>
									<td>QTY Out</td>
									<td>Balance</td>
								</tr>
							</thead>
							<tbody>
								<?php if ($data != "Not Found") : ?>
									<?php foreach ($data as $key) : ?>
										<tr>
											<td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
											<td><?php echo $key["nameitem"] ?></td>
											<td><?php echo $key["deskripsi"] ?></td>
											<td><?php echo $key["itemgroup"] ?></td>
											<td><?php echo $key["sku"] ?></td>
											<td><?php echo $key["qtypo"] ?></td>
											<td><?php echo $key["qtyindet"] ?></td>
											<td><?php echo $key["balance"] ?></td>
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

<script>
	function ubah(x) {
		if (x == "produk") {
			$('#produkx').show();
			$('#bahbakx').hide();
		} else if (x == "bahbak") {
			$('#produkx').hide();
			$('#bahbakx').show();
		}
	}
</script>