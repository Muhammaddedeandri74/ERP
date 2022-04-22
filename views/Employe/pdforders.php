<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
	form.example input[type=text] {
		padding: 10px;
		font-size: 17px;
		border: 2px solid orange;
		background: transparent;
		float: left;
		width: 80%;
		opacity: 0.7;

	}

	form.example input[type=text]:focus {
		width: 80%;
		outline: none;
		color: white;
		opacity: 1;

	}

	form.example button {
		float: left;
		width: 20%;
		padding: 10px;
		background: transparent;
		color: orange;
		font-size: 17px;
		border: 2px solid orange;
		border-left: none;
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

		width: 70%;
		margin-left: 20px;
	}

	::-webkit-input-placeholder {
		/* Edge */
		color: white;
	}

	a {
		margin: 20px;
		text-decoration: none;
	}

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

	@media print { 
 /* All your print styles go here */
    #header, #footer, #nav { display: none !important; } 
    #griddata, #reportHeader { display: block !important; } 
}
</style>




<div class="container-xxl" style="padding-left: 6vw;background-color:purple">
	<div class="row">
		<div class="col">
			<p style="font-size: 15px; margin: 0; padding: 20px;color: white">SALES ORDER / Sales Order page</p>
			<h1 style="color: white; padding-left: 20px"> SALES ORDER</h1>
		</div>
		<div class="col" style="margin: 3% ;">

			<div class="d-flex align-items-center">
				<p style="font-size: 20px; color: orange; margin: 0; ">Filter Pencarian</p>
				<form class="example" action="/action_page.php">
					<input type="text" placeholder="Cari Berdasarkan Customer atau lainnya" name="search" id="search" oninput="searchx(this.value)">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<!-- <div class="row">
					<div class="col">
						<p style="font-size: 20px; color: orange;padding-left: 150px; margin: 0">Filter Pencarian</p>
					</div>
					<div class="col" style="margin-left: : 0px">
						<input type="text" class="form-control search" name="" placeholder="Cari Berdasarkan Customer atau lainnya">
					</div>
				</div> -->
		</div>
	</div>
</div>

<div class="row d-flex justify-content-between">
	<div class="col-8 pt-4" style="padding-left: 6vw;">
		<a href="<?php echo base_url('Employe/neworder') ?>"><b style="color: purple">+ New Order</b></a>
		<a href="#" data-toggle="modal" data-target="#uploadModal"><b style="color: purple">+ Upload Data From Excel input</b></a>
		<a href="#" id="getquotation"><b style="color: purple">+ Ambil Dari Quotation</b></a>
	</div>
	<div class="col-4">
		<a class="btn"  onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
		<a class="btn" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
		<a class="btn" onclick="pdfdata()"><i class="fa fa-file-pdf-o" ></i> Export Pdf</a>
	</div>
</div>
<div class="container-xxl px-4 ml-3">
	<div class="row">
		<div class="col">
			<div class="card border-0" style="padding-left: 3vw;">
				<div class="card-body p-0">
					<?php echo $this->session->flashdata('message'); ?>
					<?php $this->session->set_flashdata('message', ''); ?>
					<table class="table">
						<thead style="background: purple; border-top-left-radius: 30px; border: 1px solid purple; border-radius: 20px;">
							<tr>
								<th>No.Order</th>
								<th>Tgl.Buat</th>
								<th>Tipe Order</th>
								<th>Nama Pemesan</th>
								<th>Alamat Pemesan</th>
								<th>Qty</th>
								<th>Total Amount</th>
								<th>Deliv. Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="isix">
							<?php if ($data2 != "Not Found") : $a = 0 ?>
								<?php foreach ($data2 as $key) : ?>
									<?php if ($a % 2 == 0) { ?>
										<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
										<?php } else { ?>
										<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">

										<?php }
									$a++; ?>
										<td><?php echo $key["codeso"] ?></td>
										<td><?php echo $key["dateso"] ?></td>
										<td><?php echo $key["nametypeso"] ?></td>
										<td><?php echo $key["namecomm"] ?></td>
										<td><?php echo $key["delivaddr"] ?></td>
										<td><?php echo $key["totalso"] ?></td>
										<td><?php echo $key["totalprice"] ?></td>
										<td><?php echo $key["delivdate"] ?></td>
										<td><?php echo $key["statusorder"] ?></td>
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

			<div class="d-flex" style="justify-content: space-between;">
				<input type="text" name="" placeholder="Cari quotation berdasarkan Judul, Customer, Nomor" class="form-control" style="width: 40%">
				<div class="d-flex align-items-center" style=" width: 25%;">
					<p style="margin-bottom: 0; margin-right: 2%">Filer by</p>
					<input type="date" name="" class="form-control" placeholder="<?php echo date('m-d') ?>">
				</div>
			</div>

			<div style="margin-top: 30px">
				<table class="table">
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
					<tbody>
						<?php if ($data != "Not Found") : $a = 0; ?>
							<?php foreach ($data as $key) : ?>
								<?php if ($a % 2 == 0) { ?>
									<tr style="background: #eeeeee">
										<td><?php echo $key["codequo"] ?></td>
										<td><?php echo $key["datequo"] ?></td>
										<td><?php echo $key["nametypequo"] ?></td>
										<td><?php echo $key["namequotation"] ?></td>
										<td><?php echo $key["namecomm"] ?></td>
										<td><?php echo $key["totalquo"] ?></td>
										<td><?php echo $key["VAT"] ?></td>
										<td><a href="<?php echo base_url("Employe/SalesOrderFromquotation?zzz=" . base64_encode($key["idquo"])) ?>">Select</a></td>
									</tr>
								<?php } else { ?>
									<tr>
										<td><?php echo $key["codequo"] ?></td>
										<td><?php echo $key["datequo"] ?></td>
										<td><?php echo $key["nametypequo"] ?></td>
										<td><?php echo $key["namequotation"] ?></td>
										<td><?php echo $key["namecomm"] ?></td>
										<td><?php echo $key["totalquo"] ?></td>
										<td><?php echo $key["VAT"] ?></td>
										<td><a href="<?php echo base_url("Employe/SalesOrderFromquotation?zzz=" . base64_encode($key["idquo"])) ?>">Select</a></td>
									</tr>
								<?php } ?>

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
				Form
				<form method='post' action='' enctype="multipart/form-data">
					Select file : <input type='file' name='import' id='import' class='form-control' accept=".xls,.xlsx"><br>
					<input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
				</form>
				<a href="<?php echo base_url('assets/excel/Form-Input Excel.xlsx') ?>">Download Form Excel</a>

				<!-- Preview-->
				<div id='preview'></div>
			</div>

		</div>

	</div>
</div>


<div style="margin-left: 50%">
	<form action="<?php echo base_url('Employe/editsalesorder') ?>" method='POST' id="form">
		<input type="hidden" name="idso" id="idso">
	</form>
</div>

<pre id="result"></pre>

<div class="excel" id="excel">

</div>


<div class="data" id="data">
	<table class="table">
		<thead style="background: purple">
						<tr style="border: solid;">
								<th>No.Order</th>
								<th>Tgl.Buat</th>
								<th>Tipe Order</th>
								<th>Nama Pemesan</th>
								<th>Alamat Pemesan</th>
								<th>Qty</th>
								<th>Total Amount</th>
								<th>Deliv. Date</th>
								<th>Status</th>
								<th>Nama Produk</th>
								<th>SKU</th>
								<th>Qty Order</th>
							</tr>
					</thead>
		<tbody >
								<?php if ($data2 != "Not Found") : $a = 0 ?>
								<?php foreach ($data2 as $key) : ?>
									<?php if ($key["statusorder"] != "Pending"): ?>
										
									
										<?php if ($a % 2 == 0) { ?>
											<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)" >
											<?php } else { ?>
											<tr style="background: #eeeeee;cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">

											<?php }
										$a++; ?>
											<td><?php echo $key["codeso"] ?></td>
											<td><?php echo $key["dateso"] ?></td>
											<td><?php echo $key["nametypeso"] ?></td>
											<td><?php echo $key["namecomm"] ?></td>
											<td><?php echo $key["delivaddr"] ?></td>
											<td><?php echo $key["totalso"] ?></td>
											<td><?php echo $key["totalprice"] ?></td>
											<td><?php echo $key["delivdate"] ?></td>
											<td><?php echo $key["statusorder"] ?></td>
											<td colspan="3">
												<table class="table">
													<tbody>
														<?php foreach ($key["data"] as $keyx ): ?>
															<tr>
																<td><?php echo $keyx["nameitem"] ?></td>
																<td><?php echo $keyx["sku"] ?></td>
																<td><?php echo $keyx["qty"] ?></td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>

											</td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								<?php endif ?>
						</tbody>
	</table>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>

	// $('#data').hide();
	pdfdata();
	

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


	function searchx(x) {
		console.log(x)
		var data = <?php echo json_encode($data2) ?>;
		var baris = "";
		for (var i = 0; i < data.length; i++) {
			if (data[i]["namecomm"].toLowerCase().includes(x)) {
				if (i % 2 == 0) {
					baris += `
							<tr style="cursor: pointer;">
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				} else {
					baris += `
							<tr style="background:#eeeeee; cursor: pointer;" >
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				}
			} else if (data[i]["nametypeso"].toLowerCase().includes(x)) {
				if (i % 2 == 0) {
					baris += `
							<tr style="cursor: pointer;">
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				} else {
					baris += `
							<tr style="background:#eeeeee; cursor: pointer;" >
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				}
			} else if (data[i]["delivaddr"].toLowerCase().includes(x)) {
				if (i % 2 == 0) {
					baris += `
							<tr style="cursor: pointer;">
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				} else {
					baris += `
							<tr style="background:#eeeeee; cursor: pointer;" >
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				}
			} else if (data[i]["codeso"].toLowerCase().includes(x)) {
				if (i % 2 == 0) {
					baris += `
							<tr style="cursor: pointer;">
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				} else {
					baris += `
							<tr style="background:#eeeeee; cursor: pointer;" >
								<td>` + data[i]["codeso"] + `</td>
								<td>` + data[i]["dateso"] + `</td>
								<td>` + data[i]["nametypeso"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["delivaddr"] + `</td>
								<td>` + data[i]["totalso"] + `</td>
								<td>` + data[i]["totalprice"] + `</td>
								<td>` + data[i]["delivdate"] + `</td>
								<td>` + data[i]["statusorder"] + `</td>
							</tr>

						`
				}
			}

		}

		$('#isix').html(baris);
		console.log(baris)
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

			console.log(JSON.stringify(result, null, 2));
			window.location.href = '<?php echo base_url("Employe/upload?long=") ?>' + btoa(JSON.stringify(result, null, 2));




			output.innerHTML = JSON.stringify(result, null, 2);
		};
		FR.readAsArrayBuffer(file);
	});




	function detail(x) {

		var data = <?php echo json_encode($data2) ?>;

		console.log(data);
		var baris = '';
		var bar = '';

		for (var i = 0; i < data.length; i++) {
			if (data[i]["idso"] == x) {

				document.getElementById('del').setAttribute('onclick', 'deletes(' + x + ')')
				document.getElementById('update').setAttribute('onclick', 'updates(' + x + ')')

				if (data[i]["statusorder"] == 'Waiting' || data[i]["statusorder"] == 'Cancel') {
					$('#update').show();
					$('#del').show();
				} else {
					$('#update').hide();
					$('#del').hide();
				}

				if (data[i]['nopesanan'] != "") {
					$('#nopes').html('No.Pesanan ' + data[i]["nopesanan"])
				} else {
					$('#nopes').html('No.Pesanan' + data[i]["codeso"]);
				}

				$('#types').html(data[i]["nametypeso"]);
				$('#status').html(data[i]["statusorder"]);
				$('#napes').html(data[i]["namecomm"]);
				$('#addr').html(data[i]["delivaddr"]);
				$('#date').html(data[i]["delivdate"]);
				$('#qty').html(data[i]["totalso"] + ' Product');
				$('#typeso').html(data[i]["nametypeso"]);


				bar += `

						<table class="table ">
						<thead>
							<tr>
								<th style="border-style:solid;">No Pesanan</th>
						`
				if (data[i]['nopesanan'] != "") {
					bar += `<th style="border-style:solid;">` + data[i]["nopesanan"] + `</th>`
				} else {
					bar += `<th style="border-style:solid;">` + data[i]["codeso"] + `</th>`
				}
				bar += `		
								
							</tr>
							<tr>
								<th style="border-style:solid;">Type Pesanan</th>
								<th style="border-style:solid;">Nama Pemesan</th>
								<th style="border-style:solid;">Alamat</th>
								<th style="border-style:solid;">Delivery Date</th>
								<th style="border-style:solid;">Qty Product</th>
								<th style="border-style:solid;">Order Type</th>
								
							</tr>
						</thead>
						
						<tbody>
							<tr>
								<td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
								<td style="border-style:solid;">` + data[i]["namecomm"] + `</td>
								<td style="border-style:solid;">` + data[i]["delivdate"] + `</td>
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
			window.close();
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
			pdf.save("Sales Order.pdf");
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