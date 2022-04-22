<style type="text/css">
	form.example input[type=text] {
		padding: 10px;
		font-size: 17px;
		background: white;
		float: left;
		width: 50%;
		opacity: 0.7;

	}

	form.example input[type=text]:focus {
		width: 50%;
		outline: none;
		opacity: 1;

	}

	form.example button {
		float: left;
		width: 10%;
		padding: 10px;
		background: white;
		color: black;
		font-size: 17px;
		cursor: pointer;
	}

	form.example button:hover {
		background: #0b7dda;
	}

	form.example::after {
		content: "";
		clear: both;
		display: table;
	}

	form {

		width: 100%;
		margin-left: 20px;
	}
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">QUOTATION / Quotation</p>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">FORM QUOTATION</p>
</div>

<div class="container-fluid" style="padding-left: 6vw;">
	<div class="row d-flex justify-content-between">
		<div class="col-6">
			<form class="example" action="/action_page.php">
				<div class="mb-3 row">
					<label class="col-sm-2 col-form-label" style="text-align: left;">Pencarian</label>
					<div class="col-sm-10">
						<input type="text" id="search" placeholder="Cari Berdasarkan Customer atau lainnya" name="search" style="margin-left: 2.3%;border: 0.2px solid black">
						<button type="button" style="0.2px solid black" onclick="searchx()"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-6">
		</div>
	</div>
	<div class="row d-flex justify-content-between">
		<div class="col-6">
			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label" style="text-align: left;">Filter By Periode</label>
				<div class="col-sm-10">
					<input type="date" name="" oninput="sortdate(this.value)" class="form-control col-5" style="margin-left: 5%">
				</div>
			</div>
		</div>
		<div class="col-3">
		</div>
		<div class="col-3">
			<a class="btn btn-outline-success"  onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
			<a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
			<a class="btn btn-outline-dark"  onclick="pdfdatas()"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
		</div>
	</div>




	<table class="table" style="margin-top: 2%;width: 100%">
		<thead style="background: #3C2E8F;color: white ">
			<tr>
				<th>No.Quotation</th>
				<th>Tgl.Dibuat</th>
				<th>Tipe Order</th>
				<th>Judul Quotation</th>
				<th>Customer</th>
				<th>VAT Type</th>
				<th>Price</th>
				<th>Status</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody id="bodyx">
			<?php if ($data != "Not Found") : $a = 0; ?>
				<?php foreach ($data as $key) : ?>
					<?php if ($a % 2 == 0) { ?>
						<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
							<td><?php echo $key["codequo"] ?></td>
							<td><?php echo $key["datequo"] ?></td>
							<td><?php echo $key["nametypequo"] ?></td>
							<td><?php echo $key["namequotation"] ?></td>
							<td><?php echo $key["namecomm"] ?></td>
							<td>Normal</td>
							<td><?php echo $key["pricetotal"] ?></td>
							<td><?php echo $key["statusquo"] ?></td>
							<?php if ($key["statusquo"] == "Waiting") { ?>
								<td><a href="<?php echo base_url('Employe/editquotation?zzz=' . base64_encode($key["idquo"])) ?>" class="btn btn-warning">Edit</a></td>
							<?php } else { ?>
								<td></td>
							<?php } ?>

						</tr>
					<?php } else { ?>
						<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)">
							<td><?php echo $key["codequo"] ?></td>
							<td><?php echo $key["datequo"] ?></td>
							<td><?php echo $key["nametypequo"] ?></td>
							<td><?php echo $key["namequotation"] ?></td>
							<td><?php echo $key["namecomm"] ?></td>
							<td>Normal</td>
							<td><?php echo $key["pricetotal"] ?></td>
							<td><?php echo $key["statusquo"] ?></td>
							<?php if ($key["statusquo"] == "Waiting") { ?>
								<td><a href="<?php echo base_url('Employe/editquotation?zzz=' . base64_encode($key["idquo"])) ?>" class="btn btn-warning">Edit</a></td>
							<?php } else { ?>
								<td></td>
							<?php } ?>
						</tr>

					<?php };
					$a++ ?>

				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>


</div>
</div>


<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<form class="user ml-0" style="width:100%" method="post" action="">
				<div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Sales Order</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-xxl ml-5">
						<div class=" card border-0">
							<div class="card-header border-0 bg-transparent">
								<div class="row d-flex justify-content-between">
									<div class="col-5"> </div>
									<div class="col-12">
										<a class="btn" onclick="printDiv('card-body')"><i class="fa fa-print"></i> Cetak Data</a>
										<a class="btn" id="btnExport"><i class="fa fa-file-excel-o"></i> Export Excel</a>
										<a class="btn" id="cmd" onclick="pdf()"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
										<a class="btn" id="update"><i class="fa fa-refresh"></i> Update Data</a>
										<a class="btn" id="del"><i class="fa fa-trash"></i> Cancel Sales Order</a>

									</div>
								</div>
							</div>
							<div class="card-body" id="card-body">

								<div class="card bay" width="100%" id="header">
									<div class="card-header border-0 bg-white">
										<div class="row d-flex justify-content-between">
											<div class="col-10">
												<p class="fw" id="nopes">No. Pesanan 123123rr<br>
													<span class="fn" id="types">Sl22</span>
												</p>
											</div>
											<div class="col-2">
												<p class="badge bg-warning text-dark" id="status">Outstanding</p>
											</div>
											<div class="col-12">
												<p class="fw">Nama Pesanan<br>
													<span style="color: #3C2E8F" class="fn" id="napes">PT. Untung Jaya</span>
												</p>
											</div>
											<div class="d-flex justify-content-between" style="width: 100%;">
												<div style="width: 40%;">
													<p class="fw p-3">Alamat<br>
														<span style="color: #3C2E8F" class="fn" id="addr">PT. Untung Jaya</span>
													</p>
												</div>
												<div style="width: 40%;">
													<p class="fw p-3"> <i class="fa fa-truck"></i> Delivery Date<br>
														<span style="color: #3C2E8F" class="fn" id="date">Tanggal</span>
													</p>
												</div>
												<div style="width: 40%;">
													<p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Qty. Product<br>
														<span style="color: #3C2E8F" class="fn" id="qty">X product</span>
													</p>
												</div>
												<div style="width: 40%;">
													<p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
														<span style="color: #3C2E8F" class="fn" id="tyso">Shopee</span>
													</p>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="pt-4" id="dataitem">
									<p class="fw">DAFTAR ITEM YANG DIPESAN</p>
									<table class="table cn">
										<thead style="background-color: grey;color: white">
											<tr>
												<th scope="col">Nama Produk</th>
												<th scope="col">SKU</th>
												<th scope="col">Ready Stock</th>
												<th scope="col">Qty. Order</th>
												<th scope="col">Balance</th>

											</tr>
										</thead>
										<tbody style="background-color: whtie" id="body">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="excel" class="excel"></div>


<div class="data" id="data" >
	<table class="table" style="margin-top: 2%;width: 100%">
		<thead style="background: #3C2E8F;color: white ">
			<tr>
				<th>No.Quotation</th>
				<th>Tgl.Dibuat</th>
				<th>Tipe Order</th>
				<th>Judul Quotation</th>
				<th>Customer</th>
				<th>VAT Type</th>
				<th>Price</th>
				<th>Status</th>
				<th>Nama Produk</th>
				<th>SKU</th>
				<th>Qty Order</th>
			</tr>

		</thead>
		<tbody id="bodyx">
			<?php if ($data != "Not Found") : $a = 0; ?>
				<?php foreach ($data as $key) : ?>
					<?php if ($a % 2 == 0) { ?>
						<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer; border: solid;">
							<td><?php echo $key["codequo"] ?></td>
							<td><?php echo $key["datequo"] ?></td>
							<td><?php echo $key["nametypequo"] ?></td>
							<td><?php echo $key["namequotation"] ?></td>
							<td><?php echo $key["namecomm"] ?></td>
							<td>Normal</td>
							<td><?php echo $key["pricetotal"] ?></td>
							<td><?php echo $key["statusquo"] ?></td>
							<td colspan="3">
								<table class="table" >
									<tbody>
										<?php foreach ($key["data"] as $keyx) : ?>
											<tr style="background: #eeeeee;cursor: pointer;border: solid;">
												<td><?php echo $keyx["nameitem"] ?></td>
												<td><?php echo $keyx["sku"] ?></td>
												<td><?php echo $keyx["qty"] ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>

							</td>

						</tr>
					<?php } else { ?>
						<tr style="background: #eeeeee;cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)">
							<td><?php echo $key["codequo"] ?></td>
							<td><?php echo $key["datequo"] ?></td>
							<td><?php echo $key["nametypequo"] ?></td>
							<td><?php echo $key["namequotation"] ?></td>
							<td><?php echo $key["namecomm"] ?></td>
							<td>Normal</td>
							<td><?php echo $key["pricetotal"] ?></td>
							<td><?php echo $key["statusquo"] ?></td>
							<td colspan="3">
								<table class="table">
									<tbody>
										<?php foreach ($key["data"] as $keyx) : ?>
											<tr style="background: #eeeeee;cursor: pointer;border: solid;">
												<td><?php echo $keyx["nameitem"] ?></td>
												<td><?php echo $keyx["sku"] ?></td>
												<td><?php echo $keyx["qty"] ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>

							</td>
							
						</tr>

					<?php };
					$a++ ?>

				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">

	pdfdata();
	function sortdate(x) {
		var data = <?php echo json_encode($data) ?>;
		if (data != "Not Found") {
			var baris = '';
			$a = 0;
			for (var i = 0; i < data.length; i++) {

				if (data[i]["datequo"] == x) {
					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				}
			}

			$('#bodyx').html(baris);
		} else {
			alert("Empty Data")
		}
	}

	function searchx() {
		var search = $('#search').val();
		var data = <?php echo json_encode($data) ?>;
		console.log(data[0]["namecomm"] + " " + search);
		var baris = '';
		if (data != "Not Found") {
			for (var i = 0; i < data.length; i++) {

				if (data[i]["namecomm"] == search) {
					$a = 0;

					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				} else if (data[i]["codequo"] == search) {
					$a = 0;

					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				} else if (data[i]["namequotation"] == search) {
					$a = 0;

					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				} else if (data[i]["nametypequo"] == search) {
					$a = 0;

					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				} else if (search == "") {
					$a = 0;

					if ($a % 2 == 0) {
						baris += `
									<tr>
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					} else {
						baris += `
									<tr style="background : #eeeeee">
										<td>` + data[i]["codequo"] + `</td>
										<td>` + data[i]["datequo"] + `</td>
										<td>` + data[i]["nametypequo"] + `</td>
										<td>` + data[i]["namequotation"] + `</td>
										<td>` + data[i]["namecomm"] + `</td>
										<td>Normal</td>
										<td>` + data[i]["pricetotal"] + `</td>
										<td>` + data[i]["statusquo"] + `</td>
										<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>
									</tr>
								`
					}
				}
			}
			$('#bodyx').html(baris);
		} else {
			alert("Data Kosong");
		}


	}


	function detail(x) {
		window.location.href = "<?php echo base_url('Employe/editquotation?zzz=') ?>" + btoa(x);
	}


	function details(x) {

		var data = <?php echo json_encode($data) ?>;

		console.log(data);
		var baris = '';
		var bar = '';

		for (var i = 0; i < data.length; i++) {
			if (data[i]["idquo"] == x) {

				document.getElementById('del').setAttribute('onclick', 'deletes(' + x + ')')
				document.getElementById('update').setAttribute('onclick', 'updates(' + x + ')')

				if (data[i]["statusorder"] == 'Waiting' || data[i]["statusorder"] == 'Cancel') {
					$('#update').show();
					$('#del').show();
				} else {
					$('#update').hide();
					$('#del').hide();
				}

				$('#nopes').html('No.Pesanan ' + data[i]["codequo"] + '\n' + data[i]["namequotation"])

				$('#types').html(data[i]["typequo"]);
				$('#status').html(data[i]["statusorder"]);
				$('#napes').html(data[i]["namecomm"]);
				$('#addr').html(data[i]["delivaddr"]);
				$('#date').html(data[i]["delivdate"]);
				$('#qty').html(data[i]["totalquo"] + ' Product');
				$('#tyso').html(data[i]["nametypequo"]);


				bar += `

						<table class="table ">
						<thead>
							<tr>
								<th style="border-style:solid;">No Pesanan</th>
						`
				if (data[i]['codequo'] != "") {
					bar += `<th style="border-style:solid;">` + data[i]["codequo"] + `</th>`
				} else {
					bar += `<th style="border-style:solid;">` + data[i]["codequo"] + `</th>`
				}
				bar += `		
								
							</tr>
							<tr>
								<th style="border-style:solid;">Type Pesanan</th>
								<th style="border-style:solid;">Nama Pemesan</th>
								<th style="border-style:solid;">Alamat</th>
								<th style="border-style:solid;">Date Quotation</th>
								<th style="border-style:solid;">Exp Quotation</th>
								<th style="border-style:solid;">Qty Product</th>
								
								
							</tr>
						</thead>
						
						<tbody>
							<tr>
								<td style="border-style:solid;">` + data[i]["nametypequo"] + `</td>
								<td style="border-style:solid;">` + data[i]["namecomm"] + `</td>
								<td style="border-style:solid;">` + data[i]["delivaddr"] + `</td>
								<td style="border-style:solid;">` + data[i]["datequo"] + `</td>
								<td style="border-style:solid;">` + data[i]["expquo"] + `</td>
								<td style="border-style:solid;">` + data[i]["totalquo"] + ` Product</td>
								
								
							</tr>
							<tr></tr>
							<tr>
								<td colspan='5'>DAFTAR ITEM YANG DIPESAN</td>
							</tr>
							<tr>
								<td style="border-style:solid;">Nama Product</td>
								<td style="border-style:solid;">SKU</td>
								<td style="border-style:solid;">Ready Stock</td>
								<td style="border-style:solid;">Qty Order</td>
								<td style="border-style:solid;">Balance</td>
							</tr>
							`;




				for (var a = 0; a < data[i]["data"].length; a++) {
					if (a % 2 == 0) {
						baris += '<tr style="background :#eeeeee">';
					} else {
						baris += '<tr>'
					}
					baris += `
								<td >` + data[i]["data"][a]["nameitem"] + `</td>
												<td >` + data[i]["data"][a]["sku"] + `</td>
												<td >` + data[i]["data"][a]["qtyready"] + `</td>
												<td >` + data[i]["data"][a]["qty"] + `</td>
												<td >` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
											
											</tr>

								`
					bar += `<tr>
								<td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
												<td style="border-style:solid;">` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
											
											</tr>

							</tr>`
				}

				bar += `</tbody>
					</table>

					`
				$('#body').html(baris);
				$('#excel').html(bar);
				$('#excel').hide();
				console.log(baris)

			}
		}

	}

	$("#btnExport").click(function(e) {
		let file = new Blob([$('.excel').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "SalesOrder.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});

	$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "SalesOrder.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});



	function pdf() {
		var HTML_Width = $(".card-body").width();
		var HTML_Height = $(".card-body").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($(".card-body")[0]).then(function(canvas) {
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
			for (var i = 1; i <= totalPDFPages; i++) {
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
			}
			pdf.save("Sales Order.pdf");
			$(".html-content").hide();
		});
	}

	function printDiv() {
		var printContents = document.getElementById('card-body').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}

	function pdfdata() {
		console.log("OK")
		var HTML_Width = $("#data").width();;
		var HTML_Height = $("#data").height();;
		var top_left_margin = 15;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($(".data")[0]).then(function(canvas) {
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
			for (var i = 1; i <= totalPDFPages; i++) {
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
			}
			pdf.save("Quotation.pdf");
			$(".html-content").hide();
			setTimeout(() => {  close() }, 100);
		});

	}

	function printdata() {
		var printContents = document.getElementById('data').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>