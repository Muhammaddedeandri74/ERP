<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
	table,
	th {
		color: white;
		text-align: center;
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

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : purple">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">SALES ORDER / Pending List page</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">PENDING LIST</p>
</div>
<form action="<?php echo base_url('Employe/pendinglist') ?>" method="post">
	<div class="row d-flex pb-3 justify-content-between" style="padding-left: 6vw">
		<div class="col-6" style="margin-left: 1vw;">
			<div class="input-group">
				<select name="filter" class="form-select form-control col-2" style="background-color: purple;color: white" aria-label="Default select example" id="search">
					<option class="slc" value="codeso">No. Order</option>
					<option class="slc" value="nopesanan">No. Pesanan</option>
					<!-- <option class="slc" value="typeso">Tipe Order</option> -->
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
							<input placeholder="Pilih Tanggal" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" type="text" name="date1" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
						</div>
						<div class="col-3">
							<p>Hingga</p>
							<input placeholder="Pilih Tanggal" value="<?= set_value('date2') ?>" style="cursor: pointer;" class="form-control" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
						</div>
						<div class="col-3">
							<p>Sorting</p>
							<select name="status" class="form-control py-2 " style="cursor: pointer;" aria-label="Default select example" id="stat">
								<option selected value="">Sort By Status</option>
								<option value="Pending">Pending</option>
							</select>
						</div>
						<div class="col-3">
							<p><br></p>
							<a href="<?php echo base_url('Employe/pendinglist') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
							<button name="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
		</div>
		<div class="col-2" style="margin-top: 11vh">
			<a class="btn btn-outline-success" style="margin-left: 6vw;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
		</div>
	</div>
</form>
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
								<th>Alamat Pemesan</th>
								<th>Qty</th>
								<th>Total Amount</th>
								<th>Deliv. Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="isix">
							<?php
							if ($data2 != "Not Found") : $a = 1 ?>
								<?php foreach ($data2 as $key) : ?>
									<?php if ($key["statusorder"] == "Pending") :
										if ($key["statusx"] == "Ready") {
									?>
											<tr style="cursor: pointer; background-color:green;color:white;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
											<?php } else { ?>
											<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
											<?php } ?>
											<td><?php echo $key["codeso"] ?></td>
											<td><?php echo $key["nopesanan"] ?></td>
											<td><?php echo $key["dateso"] ?></td>
											<td><?php echo $key["nametypeso"] ?></td>
											<td><?php echo $key["namecomm"] ?></td>
											<td><?php echo $key["delivaddr"] ?></td>
											<td><?php echo $key["totalso"] ?></td>
											<td><?php echo number_format($key["totalprice"], 0, "", ",") ?></td>
											<td><?php echo $key["delivdate"] ?></td>
											<td><?php echo $key["statusorder"] ?></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								<?php endif ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col">
							<!--Tampilkan pagination-->
							<?php echo $pagination; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<form class="user ml-0" style="width:100%" method="post" action="<?php echo base_url('Employe/editsalesorder') ?>" id="form">
				<input type="hidden" id="idso" name="idso">
				<input type="hidden" id="from" name="from" value="pending">
				<div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Pending Order</h5>
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
										<a class="btn" id="update"><i class="fa fa-refresh"></i> Buat Sales Order</a>
										<a class="btn" id="del"><i class="fa fa-trash"></i> Cancel Pending List</a>
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
													<p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
														<span style="color: #3C2E8F" class="fn" id="jasa"></span>
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

<div class="excel" id="excel">
</div>
<div class="data" id="data">
	<table class="table table-striped table-hover">
		<thead style="background: purple">
			<tr>
				<th style="border: solid;background-color: purple;">No.Order</th>
				<th style="border: solid;background-color: purple;">No.Pesanan</th>
				<th style="border: solid;background-color: purple;">Tgl.Buat</th>
				<th style="border: solid;background-color: purple;">Tipe Order</th>
				<th style="border: solid;background-color: purple;">Nama Pemesan</th>
				<th style="border: solid;background-color: purple;">Alamat Pemesan</th>
				<th style="border: solid;background-color: purple;">Qty</th>
				<th style="border: solid;background-color: purple;">Total Amount</th>
				<th style="border: solid;background-color: purple;">Deliv. Date</th>
				<th style="border: solid;background-color: purple;">Status</th>
			</tr>
		</thead>
		<tbody id="prt">
			<?php if ($data2 != "Not Found") : $a = 1 ?>
				<?php foreach ($data2 as $key) : ?>
					<?php if ($key["statusorder"] == "Pending") : ?>
						<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
							<td style="border: solid;"><?php echo $key["codeso"] ?></td>
							<td style="border: solid;"><?php echo $key["nopesanan"] ?></td>
							<!-- <td style="border: solid;"><?php echo $key["sku"] ?></td> -->
							<td style="border: solid;"><?php echo $key["dateso"] ?></td>
							<td style="border: solid;"><?php echo $key["nametypeso"] ?></td>
							<td style="border: solid;"><?php echo $key["namecomm"] ?></td>
							<td style="border: solid;"><?php echo $key["delivaddr"] ?></td>
							<td style="border: solid;"><?php echo $key["totalso"] ?></td>
							<td style="border: solid;"><?php echo number_format($key["totalprice"], 0, "", ",") ?></td>
							<td style="border: solid;"><?php echo $key["delivdate"] ?></td>
							<td style="border: solid;"><?php echo $key["statusorder"] ?></td>
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
	$('#data').hide();

	function apply() {
		var baris = "";
		var bar = "";
		var a = 1;
		var data = <?php echo json_encode($data2) ?>;

		if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {

			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending") {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending") {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending") {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending") {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending") {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				}
			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
			console.log(2);
			for (var i = 0; i < data.length; i++) {
				if (data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
					if (data[i]["statusorder"] == "Pending") {
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
									</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else {
					console.log("NOT FOUND")
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
			console.log(3);
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] == "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
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
								</tr>`;
						bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
					}
				}
			}
		} else {
			alert("Masukan Filter Dengan Benar")
			return
		}

		$('#isix').html(baris);
		$('#prt').html(bar);

	}

	function reset() {
		var data = <?php echo json_encode($data2) ?>;
		var baris = "";
		var bar = "";
		var a = 1;
		for (var i = 0; i < data.length; i++) {
			if (data[i]["statusorder"] == "Pending") {
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
							</tr>`;
				bar += `<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td style="border: solid;">` + data[i]["codeso"] + `</td>
									<td style="border: solid;">` + data[i]["nopesanan"] + `</td>
									<td style="border: solid;">` + data[i]["dateso"] + `</td>
									<td style="border: solid;">` + data[i]["nametypeso"] + `</td>
									<td style="border: solid;">` + data[i]["namecomm"] + `</td>
									<td style="border: solid;">` + data[i]["delivaddr"] + `</td>
									<td style="border: solid;">` + data[i]["totalso"] + `</td>
									<td style="border: solid;">` + formatnum(parseFloat(data[i]["totalprice"]).toFixed(0)) + `</td>
									<td style="border: solid;">` + data[i]["delivdate"] + `</td>
									<td style="border: solid;">` + data[i]["statusorder"] + `</td>
								</tr>`;
			}
		}
		$('#isix').html(baris);
		$('#prt').html(bar);
	}

	function detail(x) {
		var data = <?php echo json_encode($data2) ?>;
		console.log(data);
		var baris = '';
		var bar = '';
		for (var i = 0; i < data.length; i++) {
			if (data[i]["idso"] == x) {
				document.getElementById('del').setAttribute('onclick', 'deletes(' + x + ')')
				document.getElementById('update').setAttribute('onclick', 'updates(' + x + ')')
				if (data[i]["statusorder"] == 'Pending') {
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
				$('#jasa').html(data[i]["jasapengirim"]);
				$('#qty').html(data[i]["totalso"] + ' Product');
				$('#tyso').html(data[i]["nametypeso"]);
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
				bar += `</tr>
							<tr>
								<th style="border-style:solid;">Type Pesanan</th>
								<th style="border-style:solid;">Nama Pemesan</th>
								<th style="border-style:solid;">Alamat</th>
								<th style="border-style:solid;">Delivery Date</th>
								<th style="border-style:solid;">Jasa Pengiriman</th>
								<th style="border-style:solid;">Qty Product</th>
								<th style="border-style:solid;">Order Type</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="border-style:solid;">` + data[i]["nametypeso"] + `</td>
								<td style="border-style:solid;">` + data[i]["namecomm"] + `</td>
								<td style="border-style:solid;">` + data[i]["delivdate"] + `</td>
								<td style="border-style:solid;">` + data[i]["jasapengirim"] + `</td>
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

				console.log(data[i]["data"]);
				for (var a = 0; a < data[i]["data"].length; a++) {
					// if (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"] < 0)
					// {
					// 	$('#update').hide();
					// }
					if (a % 2 == 0) {
						baris += '<tr>';
					} else {
						baris += '<tr>'
					}
					baris += `
								<td >` + data[i]["data"][a]["nameitem"] + `</td>
												<td >` + data[i]["data"][a]["sku"] + `</td>
												<td >` + data[i]["data"][a]["qtyready"] + `</td>
												<td >` + data[i]["data"][a]["qty"] + `</td>
												<td >` + formatnum(parseFloat((data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"])).toFixed(0)) + `</td>
											
											</tr>

								`
					bar += `<tr>
								<td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
												<td style="border-style:solid;">` + formatnum(parseFloat((data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"])).toFixed(0)) + `</td>
											
											</tr>

							</tr>`
				}

				bar += `</tbody>
					</table>`
				$('#body').html(baris);
				$('#excel').html(bar);
				$('#excel').hide();
				console.log(baris)
			}
		}
	}

	function deletes(x) {
		if (confirm("Anda Yakin Ingin Membatalkan Pending List Ini ?")) {
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

	$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "Pendinglist.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});
</script>