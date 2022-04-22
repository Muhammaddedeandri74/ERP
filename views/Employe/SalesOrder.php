<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
	table,
	th {
		color: white;
		text-align: center;
	}

	/* The Modal (background) */
	.modals {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 1;
		/* Sit on top */
		padding-top: 100px;
		/* Location of the box */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.4);
		/* Black w/ opacity */
	}

	/* Modal Content */
	.modal-contents {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 60%;
		height: 70%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 18px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}

	.slc {
		background-color: #f3f3f3;
		color: black;
	}

	@media print {

		/* All your print styles go here */
		#header,
		#footer,
		#nav {
			display: none !important;
		}

		#griddata,
		#reportHeader {
			display: block !important;
		}
	}
</style>

<?php
$status = array('Waiting', 'Process', 'Finish', 'Cancel');
?>

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : purple">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">SALES ORDER / Sales Order page</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">SALES ORDER</p>
</div>

<div class="row d-flex pb-3 justify-content-between" style="padding-left: 6vw">

	<div class="col-6" style="margin-left: 1vw;">
		<form action="<?php echo base_url('Employe/salesorder') ?>" method="post">
			<div class="input-group">
				<select name="filter" value="<?= set_value('filter') ?>" class="form-select form-control col-3" style="background-color: purple;color: white" aria-label="Default select example" id="search">
					<option class="slc" value="codeso">No. Order</option>
					<option class="slc" value="nopesanan">No. Pesanan</option>
					<option class="slc" value="typeso">Tipe Order</option>
					<option class="slc" value="namecomm">Nama Pemesan</option>
					<option class="slc" value="delivaddr">Alamat Pemesan</option>
				</select>
				<input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Filter" id="valsearch" style="font-family:Arial, FontAwesome">
			</div>
			<div class="card">
				<div class="card-body bays">
					<div class="d-flex justify-content-between">
						<div class="col-3">
							<p>Dari</p>
							<input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus=" (this.type='date' )" onblur="(this.type='text')" id="date1">
						</div>
						<div class="col-3">
							<p>Hingga</p>
							<input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus=" (this.type='date' )" onblur="(this.type='text')" id="date2">
						</div>
						<div class="col-3">
							<p>Sorting</p>
							<select name="status" class="form-control py-2 " style="cursor: pointer;" aria-label="Default select example" id="stat">
								<option selected value="">Sort By Status</option>
								<?php foreach (array_unique($status) as $key) : ?>
									<?php if ($key != "Pending") : ?>
										<option value="<?php echo $key ?>"><?php echo $key ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-3">
							<p><br></p>
							<a href="<?php echo base_url('Employe/salesorder') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
							<button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
	<div class=" col-5">
		<div class="row d-flex justify-content-between pr-5">
			<a style="text-decoration: none;" href="<?php echo base_url('Employe/neworder') ?>"><b style="color: purple">+ New Order</b></a>
			<a style="text-decoration: none;" href="#" data-toggle="modal" data-target="#uploadModal"><b style="color: purple">+ Upload Data From Excel input</b></a>
			<a style="text-decoration: none;" href="#" id="getquotation"><b style="color: purple">+ Ambil Dari Quotation</b></a>
		</div>
		<div class="row d-flex justify-content-between" style="padding-top: 10vh;">
			<div class="col-6"></div>
			<div class="col-6">
				<a class="btn btn-outline-danger" style="margin-right: 0.5vw;margin-left: 3vw" onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
				<a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
			</div>
		</div>
	</div>
</div>
<div class="container-xxl px-4 ml-3">
	<div class="row">
		<div class="col">
			<div class="card border-0" style="padding-left: 3vw;">
				<div class="card-body p-0">
					<?php echo $this->session->flashdata('message'); ?>
					<?php $this->session->set_flashdata('message', ''); ?>
					<table class="table table-striped table-hover">
						<thead style="background: purple; border-top-left-radius: 30px; border: 1px solid purple; border-radius: 20px;">
							<tr>
								<th>No.Order</th>
								<th>No.Pesanan</th>
								<th>Tgl.Buat</th>
								<th>Tipe Order</th>
								<th>Nama Pemesan</th>
								<th style="width: 30%">Alamat Pemesan</th>
								<th>Qty</th>
								<th>Total Amount</th>
								<th>Deliv. Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="isix">
							<?php if ($data2 != "Not Found") : $a = 0 ?>
								<?php foreach ($data2 as $key) : ?>
									<?php if ($key["statusorder"] != "Pending") : ?>
										<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
											<td><?php echo $key["codeso"] ?></td>
											<td><?php echo $key["nopesanan"] ?></td>
											<td><?php echo $key["dateso"] ?></td>
											<td><?php echo $key["typeso"] ?></td>
											<td><?php echo $key["namecomm"] ?></td>
											<td><?php echo $key["delivaddr"] ?></td>
											<td><?php echo $key["totalso"] ?></td>
											<td><?php echo number_format((float)$key['totalprice']) ?></td>
											<td><?php echo $key["delivdate"] ?></td>
											<!-- <?php if ($key["statusorder"] == "Finish") { ?>
												<td><a class="badge rounded-pill badge-success px-3 py-1"><?php echo $key["statusorder"] ?></a></td>
											<?php } else if ($key["statusorder"] == "Waiting") { ?>
												<td><a class="badge rounded-pill badge-warning px-3 py-1"><?php echo $key["statusorder"] ?></a></td>
											<?php } else if ($key["statusorder"] == "Process") { ?>
												<td><a class="badge rounded-pill badge-primary px-3 py-1"><?php echo $key["statusorder"] ?></a></td>
											<?php } else { ?>
												<td><a class="badge rounded-pill badge-danger px-3 py-1"><?php echo $key["statusorder"] ?></a></td>
											<?php } ?> -->
											<td><a><?php echo $key["statusorder"] ?></a></td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col">
							<!-- <?php echo $pagination; ?> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modals">
	<!-- Modal content -->
	<div class="modal-contents">
		<div>
			<div class="d-flex" style="justify-content: space-between;">
				<p style="font-size: 22px"><b>AMBIL DATA DATA QUOTATION</b></p>
				<p class="close">TUTUP</p>
			</div>
			<hr style="height: 0.5vh; background: #eeeeee; margin-top: 0">
			<div class="row d-flex justify-content-between">
				<div class="col-5">
					<input type="text" placeholder="Cari quotation berdasarkan Judul, Customer, Nomor" oninput="searcha(this.value)" name="search" id="search" class="form-control">
				</div>
				<div class="col-2">
				</div>
			</div>
		</div>
		<div style="margin-top: 30px">
			<table class="table table-striped table-hover">
				<thead style="background: purple">
					<tr>
						<th>No.Qtn</th>
						<th>Tgl.Buat</th>
						<th>Tipe Order</th>
						<th>Judul Quotation</th>
						<th>Customer</th>
						<th>Qty.Item</th>
						<th>VAT</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="xd">
					<?php if ($data != "Not Found") : $a = 0; ?>
						<?php foreach ($data as $key) : ?>
							<tr style="background: #eeeeee">
								<td><?php echo $key["codequo"] ?></td>
								<td><?php echo $key["datequo"] ?></td>
								<td><?php echo $key["nametypequo"] ?></td>
								<td><?php echo $key["namequotation"] ?></td>
								<td><?php echo $key["namecomm"] ?></td>
								<td><?php echo number_format($key["totalquo"], 0, "", ",") ?></td>
								<td><?php echo $key["VAT"] ?></td>
								<td><a href="<?php echo base_url("Employe/SalesOrderFromquotation?zzz=" . base64_encode($key["idquo"])) ?>">Select</a></td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
		<div>
			<button class="btn btn-warning" style="background: orange;float: right;color: white">Selesai</button>
		</div>
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
							<div class="card-body " id="cards">
								<div class="card bay" width="100%" id="header">
									<div class="card-header border-0 bg-white">
										<div class="row d-flex justify-content-between">
											<div class="col-6">
												<p class="fw" id="nopes">No. Pesanan 123123rr<br>
													<span style="color: #3C2E8F" class="fn" id="types">Sl22</span>
												</p>
											</div>

											<div class="col-4">
												<p class="fw">Referensi
													<span style="color: #3C2E8F" class="fn" id="noref">PT. Untung Jaya</span>
												</p>
											</div>

											<div class="col">
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
													<p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
														<span style="color: #3C2E8F" class="fn" id="jasa">Jasa</span>
													</p>
												</div>
												<div style="width: 40%;">
													<p class="fw p-3"> <i class="ms-Icon ms-Icon--ProductVariant"></i> Jumlah Product<br>
														<span style="color: #3C2E8F" class="fn" id="qty">X product</span>
													</p>
												</div>
												<div style="width: 40%;">
													<p class="fw p-3"> <i class="fa fa-shopping-cart"></i> Order Type<br>
														<span style="color: #3C2E8F" class="fn" id="tyso">Shopee</span>
													</p>
												</div>
												<div style="width: 30%;">
													<p class="fw p-3"> <i class="ms-Icon ms-Icon--ReopenPages"></i> Out Type<br>
														<span style="color: #3C2E8F" class="fn">OUT - Sales</span>
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
												<th scope="col">Harga Jual</th>
												<th scope="col">Balance</th>
											</tr>
										</thead>
										<tbody style="background-color: whtie" id="body">
										</tbody>
									</table>
								</div>
								<div class="pt-4">
									<p class="fw">DAFTAR ITEM YANG DIRETURN</p>
									<table class="table cn">
										<thead style="background-color: grey;color: white">
											<tr>
												<th scope="col">Kode Return</th>
												<th scope="col">QTY</th>
												<th scope="col">Tanggal Return</th>
												<th scope="col">Deskripsi</th>
											</tr>
										</thead>
										<tbody style="background-color: whtie" id="bodyx">
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

<!-- Modal UPLOAD EXCEL-->
<div id="uploadModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">File upload form</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<label for="exampleFormControlInput1" style="padding-left: 2.1rem;" class="form-label">Form Select file :</label>
				<form method='post' action='' style="margin-left: 1vw;margin-bottom: 1vh" enctype="multipart/form-data">
					<div class="input-group">
						<input type='file' name='import' id='import' class='form-control border-0' accept=".xls,.xlsx">
						<input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
					</div>
				</form>
				<a class="btn btn-outline-primary" style="margin-left: 1.7vw;" href="<?php echo base_url('assets/excel/Form Data Sales Order.xlsx') ?>"> <i class="fa fa-print"></i> Download Form Excel</a>
				<!-- Preview-->
				<div id='preview' style="display: none;"></div>
			</div>
		</div>
	</div>
</div>

<div style="margin-left: 50%">
	<form action="<?php echo base_url('Employe/editsalesorder') ?>" method='POST' id="form">
		<input type="hidden" name="idso" id="idso">
		<input type="hidden" name="from" id="from" value="sales">
	</form>
</div>
<pre id="result" style="display: none"></pre>
<div class="excel" id="excel">
</div>
<div class="data" id="data">
	<table class="table table-striped table-hover">
		<thead style="background: purple">
			<tr>
				<th style="border:solid;background-color:purple">No.Order</th>
				<th style="border:solid;background-color:purple">No.Pesanan</th>
				<th style="border:solid;background-color:purple">Tgl.Buat</th>
				<th style="border:solid;background-color:purple">Tipe Order</th>
				<th style="border:solid;background-color:purple">Nama Pemesan</th>
				<th style="border:solid;background-color:purple">Alamat Pemesan</th>
				<th style="border:solid;background-color:purple">Qty</th>
				<th style="border:solid;background-color:purple">Total Amount</th>
				<th style="border:solid;background-color:purple">Deliv. Date</th>
				<th style="border:solid;background-color:purple">Status</th>
			</tr>
		</thead>
		<tbody id="printt">
			<?php if ($data2 != "Not Found") : $a = 0 ?>
				<?php foreach ($data2 as $key) : ?>
					<?php if ($key["statusorder"] != "Pending") : ?>
						<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
							<td style="border:solid;"><?php echo $key["codeso"] ?></td>
							<td style="border:solid;"><?php echo $key["nopesanan"] ?></td>
							<td style="border:solid;"><?php echo $key["dateso"] ?></td>
							<td style="border:solid;"><?php echo $key["typeso"] ?></td>
							<td style="border:solid;"><?php echo $key["namecomm"] ?></td>
							<td style="border:solid;"><?php echo $key["delivaddr"] ?></td>
							<td style="border:solid;"><?php echo $key["totalso"] ?></td>
							<td style="border:solid;"><?php echo number_format($key["totalprice"], 0, "", ",") ?></td>
							<td style="border:solid;"><?php echo $key["delivdate"] ?></td>
							<td style="border:solid;"><?php echo $key["statusorder"] ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<form action=" <?php echo base_url('Employe/upload') ?>" method="POST" id="forms">
	<input type="hidden" name="long" id="long">
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
	function clearsearch() {
		$('#valsearch').val("")
	}

	$('#data').hide();

	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("getquotation");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}


	$("#import").on("change", function(e) {
		var file = e.target.files[0];
		// input canceled, return
		if (!file) return;

		var FR = new FileReader();
		FR.onload = function(e) {
			var data = new Uint8Array(e.target.result);
			var workbook = XLSX.read(data, {
				type: 'array'
			});
			var firstSheet = workbook.Sheets[workbook.SheetNames[0]];

			// header: 1 instructs xlsx to create an 'array of arrays'
			var result = XLSX.utils.sheet_to_json(firstSheet, {
				header: 2,
				blankRows: false
			});



			// data preview
			var output = document.getElementById('result');




			$('#long').val(window.btoa(unescape(encodeURIComponent(JSON.stringify(result, null, 2)))))
			$('#forms').submit()


			output.innerHTML = JSON.stringify(result, null, 2);
		};
		FR.readAsArrayBuffer(file);
	});

	function reset() {
		var data = <?php echo json_encode($data2) ?>;
		var baris = "";
		var bar = "";
		var a = 1;
		for (var i = 0; i < data.length; i++) {
			baris += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
									<td>` + data[i]["dateso"] + `</td>
									<td>` + data[i]["nametypeso"] + `</td>
									<td>` + data[i]["namecomm"] + `</td>
									<td>` + data[i]["delivaddr"] + `</td>
									<td>` + data[i]["totalso"] + `</td>
									<td>` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td>` + data[i]["delivdate"] + `</td>
									<td>` + data[i]["statusorder"] + `</td>
								</tr>`
			bar += `<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
									<td>` + data[i]["dateso"] + `</td>
									<td>` + data[i]["nametypeso"] + `</td>
									<td>` + data[i]["namecomm"] + `</td>
									<td>` + data[i]["delivaddr"] + `</td>
									<td>` + data[i]["totalso"] + `</td>
									<td>` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td>` + data[i]["delivdate"] + `</td>
									<td>` + data[i]["statusorder"] + `</td>
                                    <td colspan="3">
                                        <table class="table">
                                            <tbody>`;
			for (var a = 0; a < data[i]["data"].length; a++) {
				bar += `<tr style="border: solid;">
                            <td>` + data[i]["data"][a]["nameitem"] + `</td>
                            <td>` + data[i]["data"][a]["sku"] + `</td>
                            <td>` + data[i]["data"][a]["qty"] + `</td>
                        </tr>`
			}
			bar += `</tbody>
                            </table>
                        </td>
                    </tr>`
		}
		$('#isix').html(baris);
		$('#printt').html(bar);
	}

	function detail(x) {
		var data = <?php echo json_encode($data2) ?>;
		console.log(data);
		var baris = '';
		var barisx = '';
		var bar = '';
		for (var i = 0; i < data.length; i++) {
			if (data[i]["idso"] == x) {
				document.getElementById('del').setAttribute('onclick', 'deletes(' + x + ')')
				document.getElementById('update').setAttribute('onclick', 'updates(' + x + ')')
				if (data[i]["statusorder"] == 'Waiting') {
					$('#update').show();
					$('#del').show();
				} else {
					$('#update').hide();
					$('#del').hide();
				}

				if (data[i]['nopesanan'] != "") {
					$('#nopes').html('No.Pesanan ' + data[i]["nopesanan"])
					$('#noref').html(data[i]["nopesananreferensi"]);
				} else {
					$('#nopes').html('No.Pesanan' + data[i]["codeso"]);
					$('#noref').html(data[i]["codesoreferensi"]);
				}

				$('#types').html(data[i]["nametypeso"]);

				$('#status').html(data[i]["statusorder"]);
				$('#napes').html(data[i]["namecomm"]);
				$('#addr').html(data[i]["delivaddr"]);
				$('#date').html(data[i]["delivdate"]);
				$('#jasa').html(data[i]["jasapengirim"]);
				$('#qty').html(data[i]["totalso"] + ' Product');
				$('#tyso').html(data[i]["nametypeso"]);
				bar += `<table class="table">
						<thead>
							<tr>
								<th style="border-style:solid;">No Pesanan</th>`
				if (data[i]['nopesanan'] != "") {
					bar += `<th style="border-style:solid;">` + data[i]["nopesanan"] + `</th>`
				} else {
					bar += `<th style="border-style:solid;">` + data[i]["codeso"] + `</th>`
				}
				bar += `</tr>
							<tr>
								<th style="border-style:solid;">Type Pesanan</th>
								<th style="border-style:solid;">Nama Pemesan</th>
								<th style="border-style:solid;">Alamat</th>
								<th style="border-style:solid;">Delivery Date</th>
								<th style="border-style:solid;">Jasa Pengirim</th>
								<th style="border-style:solid;">Jumlah Product</th>
								<th style="border-style:solid;">Order Type</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
								<td style="border-style:solid;">` + data[i]["namecomm"] + `</td>
								<td style="border-style:solid;">` + data[i]["delivdate"] + `</td>
								<td style="border-style:solid;">` + data[i]["jasapengiriman"] + `</td>
								<td style="border-style:solid;">` + data[i]["totalso"] + ` Product</td>
								<td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
								<td style="border-style:solid;">OUT - Sales</td>
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
							</tr>`;
				for (var a = 0; a < data[i]["data"].length; a++) {
					baris += `<tr>
								<td >` + data[i]["data"][a]["nameitem"] + `</td>
								<td >` + data[i]["data"][a]["sku"] + `</td>
								<td >` + data[i]["data"][a]["qtyactual"] + `</td>
								<td >` + data[i]["data"][a]["qty"] + `</td>
								<td >` + formatnum(parseFloat(data[i]["data"][a]["totalprice"]).toFixed(0)) + `</td>
								<td >` + (data[i]["data"][a]["qtyactual"] - data[i]["data"][a]["qty"]) + `</td>
							</tr>`

					if (data[i]["codeinret"] != 0) {
						barisx += `<tr>
								<td >` + data[a]["codeinret"] + `</td>
								<td >` + data[a]["qtyinret"] + `</td>
								<td >` + data[a]["dateinret"] + `</td>
								<td >` + data[a]["descinfo"] + `</td>
							</tr>`
					} else {
						barisx += `<tr>
								<td ></td>
								<td ></td>
								<td ></td>
								<td ></td>
							</tr>`
					}
					bar += `<tr>
								<td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
								<td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
								<td style="border-style:solid;">` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
							</tr>`
				}
				bar += `</tbody>
					</table>`
				$('#body').html(baris);
				$('#bodyx').html(barisx);
				$('#excel').html(bar);
				$('#excel').hide();
				console.log(baris)
			}
		}
	}

	function deletes(x) {
		if (confirm("Anda Yakin Ingin Membatalkan Sales Order Ini ?")) {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url('Employe/cancelorder') ?>',
				data: 'idso=' + x,
				dataType: 'json',
				success: function(hasil) {
					if (hasil == "Success") {
						location.reload();
					} else {
						alert(hasil)
					}
				}
			});
		}
	}

	function updates(x) {
		$('#idso').val(x);
		$('#form').submit();
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
		var HTML_Width = $("#cards").width();
		var HTML_Height = $("#cards").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($("#cards")[0]).then(function(canvas) {
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
		var printContents = document.getElementById('cards').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}

	function pdfdatas() {
		window.open("<?php echo base_url('Employe/cetakpdf') ?>");
	}

	function printdata() {
		var printContents = document.getElementById('data').innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}

	function searcha(x) {
		var data = <?php echo json_encode($data) ?>;
		console.log(data)
		var baris = "";
		var ix = 0;
		if (data != 'Not Found') {
			for (var i = 0; i < data.length; i++) {
				if ((data[i]["codequo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nametypequo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namequotation"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase()))) {
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + data[i]["codequo"] + '</td>';
					baris += '<td>' + data[i]["datequo"] + '</td>';
					baris += '<td>' + data[i]["nametypequo"] + '</td>';
					baris += '<td>' + data[i]["namequotation"] + '</td>';
					baris += '<td>' + data[i]["namecomm"] + '</td>';
					baris += '<td>' + formatnum(parseFloat(data[i]["totalquo"]).toFixed(0)) + '</td>';
					baris += '<td>' + formatnum(parseFloat(data[i]["VAT"]).toFixed(0)) + '</td>';
					baris += '<td><a style="color:black" href="<?php echo base_url('Employe/SalesOrderFromquotation?zzz=') ?>' + btoa(data[i]["idquo"]) + '"> Select</a></td>';
					baris += '</tr>';
				}
			}

		}
		$('#xd').html(baris);
	}
</script>