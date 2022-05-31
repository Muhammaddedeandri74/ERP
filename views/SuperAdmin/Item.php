<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">List Produk</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('SuperAdminControler/filteritem') ?>" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-3">
						<label for="" class="form-label">Pencarian</label>
						<div class="row">
							<div class="col-6">
								<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example">
									<option value="nameitem">Nameitem</option>
									<option value="sku">SKU</option>
								</select>
							</div>
							<div class="col-6">
								<input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Filter">
							</div>
						</div>
					</div>
					<div class="col-7">
						<p></p>
						<a href="<?php echo base_url('SuperAdminControler/item') ?>" class="btn btn-danger mt-3" style="font-size: 13px;">Reload</a>
						<button type="submit" class="btn btn-primary mt-3" style="font-size: 13px;">Terapkan</button>
					</div>
					<div class="col-2">
						<a class="btn btn-light mt-4" id="btn_exportexcel" style="font-size: 13px;float: right;"><i class='bx bxs-download'>Download</i></a>
						<a class="btn btn-light mt-4" onclick="printdata()" style="font-size: 13px;float: right;"><i class='bx bx-printer'>Cetak</i></a>
					</div>
				</div>
				<table id="example" class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Nama Item</th>
							<th>SKU</th>
							<th>Item Group</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Jenis QTY</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $a = 1; ?>
						<?php if ($data != "Not Found") : ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $a++; ?></td>
									<td><?php echo $key["nameitem"] ?></td>
									<td><?php echo $key["sku"] ?></td>
									<td><?php echo $key["itemgroup"] ?></td>
									<td><?php echo $key["deskripsi"] ?></td>
									<td><?php echo number_format($key['price'], 0, '.', ',') ?></td>
									<td><?php echo $key["jenisqty"] ?></td>
									<?php if ($key["status"] == 1) : ?>
										<td>Active</td>
									<?php else : ?>
										<td>Non Active</td>
									<?php endif ?>
									<td><a href="<?php echo base_url('MasterDataControler/getdataitembyid?id=' . base64_encode($key['iditem'])) ?>" class="btn btn-outline-primary" style="font-size:13px;">Edit</a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
			<pre id="result" style="display: none"></pre>
			<div class="excel" id="excel">
			</div>
			<div class="data" id="data">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">#</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Nameitem</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">SKU</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Item Group</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Deskripsi</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Harga</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Jenis QTY</td>
							<td style="border:solid;background-color:green;color:black;text-align:center;min-width: auto;">Status</td>
						</tr>
					</thead>
					<tbody id="printt">
						<?php if ($data != "Not Found") { ?>
							<?php $a = 1;
							foreach ($data as $key) : ?>
								<tr>
									<td style="border:solid;text-align:center;"><?php echo $a++ ?></td>
									<td style="border:solid;text-align:left;"><?php echo $key["nameitem"] ?></td>
									<td style="border:solid;text-align:left;"><?php echo $key["sku"] ?></td>
									<td style="border:solid;text-align:left;"><?php echo $key["itemgroup"] ?></td>
									<td style="border:solid;text-align:left;"><?php echo $key["deskripsi"] ?></td>
									<td style="border:solid;text-align:left;">Rp. <?php echo number_format($key['price'], 0, '.', ',') ?></td>
									<td style="border:solid;text-align:left;"><?php echo $key["jenisqty"] ?></td>
									<?php if ($key["status"] == 1) : ?>
										<td style="border:solid;">Active</td>
									<?php else : ?>
										<td style="border:solid;">Non Active</td>
									<?php endif ?>

								</tr>
							<?php endforeach ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$('#data').hide();

	function printdata() {
		var printContents = document.getElementById('data').innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}

	$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		console.log(file)
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "Item.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});
</script>