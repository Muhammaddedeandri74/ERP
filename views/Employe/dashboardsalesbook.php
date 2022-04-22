<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
	.tu {
		text-transform: uppercase;
		color: white;
	}

	.tp {
		text-transform: uppercase;
		font-size: 25px;
		color: purple;
	}

	.fw {
		font-weight: bold;
	}

	.fn {
		font-weight: normal;
	}

	.cn {
		text-align: center;
	}

	.fontAwesome {
		font-family: 'Helvetica', FontAwesome, sans-serif;
	}

	.tb {
		text-transform: uppercase;
	}

	.lhfb {
		line-height: 0.8rem;
		font-size: 30px;
	}

	.brl {
		border: 2px solid white;
		margin-left: 2vw;
	}

	.bay {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		background-color: white;
	}

	.ba {
		border-radius: 10px;
	}

	.fontAwesome {
		font-family: 'Helvetica', FontAwesome, sans-serif;
	}

	.table {
		border-collapse: collapse;
		border-radius: 5px;
		overflow: hidden;
	}

	.slc {
		background-color: #f3f3f3;
		color: black;
	}
</style>


<?php


$status = array();
if ($data2 != "Not Found") {
	foreach ($data2 as $key) {
		array_push($status, $key["statusorder"]);
	}
}


?>

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">SALES Management / Sales Book</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">Sales Book</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-header border-0 bg-transparent">
			<div class="row d-flex justify-content-between">
				<div class="col-10 pl-5">
					<a href="<?= base_url('Employe/salesbook') ?>" class="btn fw tb bay btn-light">Sales Order</a>
					<a href="<?= base_url('Employe/salesbooks') ?>" class="btn fw tb btn-transparent">Invoice</a>
				</div>
				<div class="col-2">
				</div>
			</div>
		</div>
		<div class="card-body ml-4">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="card bay p-4" width="80%">
				<div class="card-header border-0 bg-white">
					<form action="<?php echo base_url('Employe/salesbook') ?>" method="post">
						<div class="row pt-4 d-flex justify-content-between">
							<div class="col-6" style="margin-left: 1vw;">
								<div class="input-group">
									<select name="filter" class="form-select form-control col-3" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search" onchange="clearsearch()">
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
												<input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
											</div>
											<div class="col-3">
												<p>Hingga</p>
												<input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
											</div>
											<div class="col-3">
												<p>Sorting</p>
												<select value="<?= set_value('date2') ?>" class="form-control py-2 " style="cursor: pointer;" aria-label="Default select example" id="stat">
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
												<a href="<?php echo base_url('Employe/salesbook') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
												<button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
											</div>
											<!-- <div class="col-1 pt-4 d-flex justify-content-between">
											<a style="text-decoration: none;color: purple;cursor: pointer;" class="pr-2" onclick="reset()">Reset</a>
										</div>
										<div class="col-2 pt-3">
											<a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
										</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-2">
							</div>
							<div class="col-3" style="margin-top: 11vh">
								<a class="btn btn-outline-success" style="margin-left:63%;" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
							</div>
						</div>
					</form>
					<div class="card-body">
						<table class="table table-striped table-hover">
							<thead class="text-white" style="background-color: #3C2E8F;">
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
								<?php if ($data2 != "Not Found") : $a = 0;
									$grandtotal = 0;
									$grandqty = 0;  ?>
									<?php foreach ($data2 as $key) : ?>
										<?php if ($key["statusorder"] != "Pending") : ?>


											<?php if ($a % 2 == 0) {  ?>
												<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
												<?php } else { ?>
												<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">

												<?php }
											$a++; ?>
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
											<?php endif;
										$grandtotal = $grandtotal + $key["totalprice"];
										$grandqty = $grandqty + $key["totalso"] ?>
										<?php endforeach ?>
										<tr>
											<td colspan="6"> Total Qty </td>
											<td colspan="4"> <?php echo $grandqty ?> </td>
										</tr>
										<tr>
											<td colspan="7"> Total Amount </td>
											<td colspan="3"> <?php echo number_format($grandtotal, 0, "", ",")  ?> </td>
										</tr>
									<?php endif ?>
							</tbody>
						</table>
						<div class="row">
							<div class="col">
								<?php echo $pagination; ?>
							</div>
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
													<p class="fw p-3"> <i class="fa fa-truck"></i> Jasa Pengiriman<br>
														<span style="color: #3C2E8F" class="fn" id="jasa">Jasa</span>
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
												<th scope="col">Qty. Order</th>
												<th scope="col">Harga Jual</th>
												<th scope="col">PPN</th>
												<th scope="col">Total PPN</th>
												<th scope="col">Total Jual</th>
												<th scope="col">Qty. Return</th>
												<th scope="col">Harga Return</th>
												<th scope="col">Grand Total</th>

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
				<label for="exampleFormControlInput1" style="padding-left: 2.1rem;" class="form-label">Form Select file :</label>
				<form method='post' action='' enctype="multipart/form-data">
					<div class="input-group">
						<input type='file' name='import' id='import' class='form-control border-0' accept=".xls,.xlsx">
						<input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
					</div>
				</form>
				<a class="btn btn-outline-primary" style="margin-left: 1.7vw;" href="<?php echo base_url('assets/excel/Form Data excel.xlsx') ?>"> <i class="fa fa-print"></i> Download Form Excel</a>
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
				<th style="border:solid;background-color:purple">Nama Produk</th>
				<th style="border:solid;background-color:purple">SKU</th>
				<th style="border:solid;background-color:purple">Qty Order</th>
			</tr>
		</thead>
		<tbody id="printt">
			<?php if ($data2 != "Not Found") : $a = 0 ?>
				<?php foreach ($data2 as $key) : ?>
					<?php if ($key["statusorder"] != "Pending") : ?>
						<?php if ($a % 2 == 0) { ?>
							<tr style=" cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">
							<?php } else { ?>
							<tr style="background: #eeeeee;cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(<?php echo $key['idso'] ?>)">

							<?php }
						$a++; ?>
							<td style="border:solid;"><?php echo $key["codeso"] ?></td>
							<td style="border:solid;"><?php echo $key["nopesanan"] ?></td>
							<td style="border:solid;"><?php echo $key["dateso"] ?></td>
							<td style="border:solid;"><?php echo $key["nametypeso"] ?></td>
							<td style="border:solid;"><?php echo $key["namecomm"] ?></td>
							<td style="border:solid;"><?php echo $key["delivaddr"] ?></td>
							<td style="border:solid;"><?php echo $key["totalso"] ?></td>
							<td style="border:solid;"><?php echo number_format($key["totalprice"], 0, "", ",") ?></td>
							<td style="border:solid;"><?php echo $key["delivdate"] ?></td>
							<td style="border:solid;"><?php echo $key["statusorder"] ?></td>
							<td style="border:solid;" colspan="3">
								<table class="table">
									<tbody>
										<?php foreach ($key["data"] as $keyx) : ?>
											<tr>
												<td style="border:solid;"><?php echo $keyx["nameitem"] ?></td>
												<td style="border:solid;"><?php echo $keyx["sku"] ?></td>
												<td style="border:solid;"><?php echo $keyx["qty"] ?></td>
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
	function clearsearch() {
		$('#valsearch').val("")
	}

	$('#data').hide();

	function apply() {
		var data = <?php echo json_encode($data2) ?>;
		var baris = "";
		var bar = "";
		var a = 1;
		if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending") {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending") {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending") {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending") {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending") {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				}


			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {

				if (data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val() && data[i]["statusorder"] != "Pending") {

					if (i % 2 == 0) {
						baris += '<tr>';
					} else {
						baris += '<tr style = "background :#eeeeee">'
					}
					if (i % 2 == 0) {
						baris += `
				<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
				</tr>

			`
						bar += `
				<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
											<tr style="border: solid;">
												<td>` + data[i]["data"][a]["nameitem"] + `</td>
												<td>` + data[i]["data"][a]["sku"] + `</td>
												<td>` + data[i]["data"][a]["qty"] + `</td>
											</tr>`
						}
						bar += `</tbody>
						</table>
					</td>
				</tr>`
					} else {
						baris += `
				<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
				</tr>

			`
						bar += `
				<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
											<tr style="border: solid;">
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

				} else {
					console.log("NOt FOUND")
				}


			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				console.log(data[i])
				if (data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {

					if (i % 2 == 0) {
						baris += '<tr>';
					} else {
						baris += '<tr style = "background :#eeeeee">'
					}
					if (i % 2 == 0) {
						baris += `
								<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								</tr>

							`
						bar += `
								<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
                                                            <tr style="border: solid;">
                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
                                                            </tr>`
						}
						bar += `</tbody>
                                        </table>
                                    </td>
                                </tr>`
					} else {
						baris += `
								<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								</tr>

							`
						bar += `
								<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
                                                            <tr style="border: solid;">
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

				} else {
					console.log("NOt FOUND")
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"] != "Pending" && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				}


			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {

				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				}


			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {

				if (data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val() && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase())) {

					if (i % 2 == 0) {
						baris += '<tr>';
					} else {
						baris += '<tr style = "background :#eeeeee">'
					}
					if (i % 2 == 0) {
						baris += `
						<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
						</tr>

					`
						bar += `
				<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
											<tr style="border: solid;">
												<td>` + data[i]["data"][a]["nameitem"] + `</td>
												<td>` + data[i]["data"][a]["sku"] + `</td>
												<td>` + data[i]["data"][a]["qty"] + `</td>
											</tr>`
						}
						bar += `</tbody>
						</table>
					</td>
				</tr>`
					} else {
						baris += `
				<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
				</tr>

			`
						bar += `
				<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
							bar += `
											<tr style="border: solid;">
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

				} else {
					console.log("NOt FOUND")
				}


			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["nopesanan"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nametypeso"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["delivaddr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["statusorder"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["dateso"] >= $('#date1').val() && data[i]["dateso"] <= $('#date2').val()) {
						if (i % 2 == 0) {
							baris += `
									<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
	                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
	                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
	                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
	                                                            </tr>`
							}
							bar += `</tbody>
	                                        </table>
	                                    </td>
	                                </tr>`
						} else {
							baris += `
									<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
									</tr>

								`
							bar += `
									<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
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
								bar += `
	                                                            <tr style="border: solid;">
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
					}
				}


			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() == "" && $('#stat').val() == "") {
			alert("Masukan Tanggal Akhir")
			return;
		} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() != "" && $('#stat').val() == "") {
			alert("Masukan Tanggal Awal")
			return;
		} else {
			alert("Masukan Filter Dengan Benar")
			return;
		}


		$('#isix').html(baris);
		$('#printt').html(bar);
		console.log($('#valsearch').val())
		console.log($('#date1').val())
		console.log($('#date2').val())
		console.log($('#stat').val())

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

	function reset() {

		var data = <?php echo json_encode($data2) ?>;
		var baris = "";
		var bar = "";
		var a = 1;
		for (var i = 0; i < data.length; i++) {
			if (i % 2 == 0) {
				baris += `
								<tr style="cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
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
				bar += `
								<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
									<td>` + data[i]["dateso"] + `</td>
									<td>` + data[i]["nametypeso"] + `</td>
									<td>` + data[i]["namecomm"] + `</td>
									<td>` + data[i]["delivaddr"] + `</td>
									<td>` + data[i]["totalso"] + `</td>
									<td>` + data[i]["totalprice"] + `</td>
									<td>` + data[i]["delivdate"] + `</td>
									<td>` + data[i]["statusorder"] + `</td>
                                    <td colspan="3">
                                        <table class="table">
                                            <tbody>`;
				for (var a = 0; a < data[i]["data"].length; a++) {
					bar += `
                                                            <tr style="border: solid;">
                                                                <td>` + data[i]["data"][a]["nameitem"] + `</td>
                                                                <td>` + data[i]["data"][a]["sku"] + `</td>
                                                                <td>` + data[i]["data"][a]["qty"] + `</td>
                                                            </tr>`
				}
				bar += `</tbody>
                                        </table>
                                    </td>
                                </tr>`
			} else {
				baris += `
								<tr style="background: #eeeeee;cursor: pointer;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
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
				bar += `
								<tr style="cursor: pointer;border: solid;" data-toggle="modal" data-target="#modalopenshop" onclick="detail(` + data[i]["idso"] + `)">
									<td>` + data[i]["codeso"] + `</td>
									<td>` + data[i]["nopesanan"] + `</td>
									<td>` + data[i]["dateso"] + `</td>
									<td>` + data[i]["nametypeso"] + `</td>
									<td>` + data[i]["namecomm"] + `</td>
									<td>` + data[i]["delivaddr"] + `</td>
									<td>` + data[i]["totalso"] + `</td>
									<td>` + data[i]["totalprice"] + `</td>
									<td>` + data[i]["delivdate"] + `</td>
									<td>` + data[i]["statusorder"] + `</td>
                                    <td colspan="3">
                                        <table class="table">
                                            <tbody>`;
				for (var a = 0; a < data[i]["data"].length; a++) {
					bar += `
                                                            <tr style="border: solid;">
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
		}
		$('#isix').html(baris);
		$('#printt').html(bar);


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

				if (data[i]["statusorder"] == 'Waiting') {
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
				bar += `		
								
							</tr>
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




				for (var a = 0; a < data[i]["data"].length; a++) {
					if (a % 2 == 0) {
						baris += '<tr style="background :#eeeeee">';
					} else {
						baris += '<tr>'
					}
					baris += `
												<td >` + data[i]["data"][a]["nameitem"] + `</td>
												<td >` + data[i]["data"][a]["qty"] + `</td>
												<td >` + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + `</td>
												<td >` + formatnum(parseFloat(data[i]["data"][a]["vat"]).toFixed(0)) + `</td>
												<td >` + formatnum(parseFloat(((data[i]["data"][a]["vat"] * data[i]["data"][a]["qty"])).toFixed(0))) + `</td>
												<td >` + formatnum(parseFloat(data[i]["data"][a]["totalprice"]).toFixed(0)) + `</td>
												<td >` + (data[i]["data"][a]["qtyinret"]) + `</td>
												<td >` + formatnum(parseFloat(((data[i]["data"][a]["price"] * data[i]["data"][a]["qtyinret"])).toFixed(0))) + `</td>
												<td >` + formatnum(parseFloat(((data[i]["data"][a]["totalprice"]) - (data[i]["data"][a]["qtyinret"] * data[i]["data"][a]["price"])).toFixed(0))) + `</td>
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
</script>