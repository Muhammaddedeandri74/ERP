<style type="text/css">
	.slc {
		background-color: #f3f3f3;
		color: black;
	}
</style>

<?php
$status = array();
if ($data != "Not Found") {
	foreach ($data as $key) {
		array_push($status, $key["statusquo"]);
	}
}
?>

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 12px">QUOTATION / Quotation</p>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">LIST QUOTATION</p>
</div>

<div class="container-fluid" style="padding-left: 6vw;">
	<form action="<?php echo base_url('Employe/quotationlist') ?>" method="post">
		<div class="row pt-4 d-flex justify-content-between">
			<div class="col-6">
				<div class="input-group">
					<select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
						<option class="slc" value="codequo">No. Quotation</option>
						<!-- <option class="slc" value="typequo">Tipe Order</option> -->
						<option class="slc" value="namequotation">Judul Quotation</option>
						<option class="slc" value="namecomm">Customer</option>
					</select>
					<input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Filter" id="valsearch" style="font-family:Arial, FontAwesome" id="valsearch">
				</div>
				<div class="card">
					<div class="card-body bays">
						<div class="d-flex justify-content-between">
							<div class="col-3">
								<p>Dari</p>
								<input name="date1" placeholder="Pilih Tanggal" value="<?= set_value('date1') ?>" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
							</div>
							<div class="col-3">
								<p>Hingga</p>
								<input name="date2" placeholder="Pilih Tanggal" value="<?= set_value('date2') ?>" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
								<a href="<?php echo base_url('Employe/quotationlist') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
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
	</form>
</div>
<div class="col-4">
</div>
<div class="col-2" style="margin-top: 11vh">
	<a class="btn btn btn-outline-danger" onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
	<a class="btn btn-outline-success" id="btnexportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
</div>
</div>

<table class="table table-striped table-hover" style="margin-top: 2%;width: 100%">
	<thead style="background: #3C2E8F;color: white ">
		<tr>
			<th>No.Quotation</th>
			<th>Tgl.Dibuat</th>
			<th>Tipe Order</th>
			<th>Judul Quotation</th>
			<th>Customer</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="bodyx">
		<?php if ($data != "Not Found") : $a = 0;
			$grandtotal = 0; ?>
			<?php foreach ($data as $key) : $grandtotal = $grandtotal +  $key["pricetotal"]; ?>
				<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
					<td><?php echo $key["codequo"] ?></td>
					<td><?php echo $key["datequo"] ?></td>
					<td><?php echo $key["nametypequo"] ?></td>
					<td><?php echo $key["namequotation"] ?></td>
					<td><?php echo $key["namecomm"] ?></td>
					<td><?php echo number_format($key["pricetotal"], 0, "", ",") ?></td>
					<td><?php echo $key["statusquo"] ?></td>
					<?php if ($key["statusquo"] == "Waiting") { ?>
						<td><a href="<?php echo base_url('Employe/editquotation?zzz=' . base64_encode($key["idquo"])) ?>" class="btn btn-secondary">Edit</a></td>
					<?php } else { ?>
						<td></td>
					<?php } ?>
				</tr>
			<?php endforeach ?>
			<tr>
				<th>Total Price</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><?php echo number_format($grandtotal, 0, "", ",") ?></td>
				<td></td>
				<td></td>
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

<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<form class="user ml-0" style="width:100%" method="post" action="">
				<div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Quotation</h5>
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
										<a class="btn" onclick="printDiv('quot')" data-dismiss="modal"><i class="fa fa-print"></i> Cetak Data</a>
										<a class="btn" id="update"><i class="fa fa-refresh"></i> Update Data</a>
										<a class="btn" id="del"><i class="fa fa-trash"></i> Cancel Sales Order</a>
									</div>
								</div>
							</div>
							<div class="card-body">
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
										<tbody id="body">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card bay" style="display: none;" id="quot">
					<div class="card-header pl-5 border-0">
						<div class="row d-flex justify-content-between p-3">
							<div class="col-3">
								<?php if ($data1 == "Not Found") { ?>
									<img style="opacity: 0.8;width:14vw" alt="">
								<?php } else { ?>
									<img src="<?= base_url($data1["logo"]) ?>" style="opacity: 0.8;width:14vw" alt="">
								<?php } ?>
								<!-- <img src="<?= base_url('assets/img/df.png') ?>" style="opacity: 0.8;width:14vw" alt=""> -->
							</div>
							<div class="col-8">
								<?php if ($data1 == "Not Found") { ?>
									<p></p>
									<p style="font-size:22px;text-align:center"></p>
								<?php } else { ?>
									<p style="font-weigth:bold;color:purple;font-size:36px;opacity:0.6;text-align:center"><?= $data1['namecomp'] ?></p>
									<p style="font-size:22px;text-align:center"><?php echo $data1["addr"] ?> &nbsp;&nbsp;&nbsp;&nbsp; Telp : <?php echo $data1["phone"] ?></p>
								<?php } ?>
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
							<div class="col-5">
								<div class="input-group flex-nowrap">
									<p class="col-sm-4 mt-2" style="text-align: right;">TO :</p>
									<p id="pt" class="mt-2">PT. DRS</p>
								</div>
								<div class="input-group flex-nowrap">
									<p class="col-sm-4 mt-2" style="text-align: right;">ATTN :</p>
									<p id="cust" class="mt-2">ANDREY</p>
								</div>
							</div>
							<div class="col-5">
								<div class="input-group flex-nowrap">
									<p class="col-sm-4 mt-2" style="text-align: right;">No :</p>
									<p id="no" class="mt-2">Sj14045</p>
								</div>
								<div class="input-group flex-nowrap">
									<p class="col-sm-4 mt-2" style="text-align: right;">DATE :</p>
									<p id="dates" class="mt-2">21/12/2021</p>
								</div>
							</div>
							<div class="col-1">

							</div>
							<div class="col">
								<p style="text-align: center;font-size: 24px;font-weight:bold"><u>QUOTATION</u> </p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table class="table border">
									<thead style="border: 2px solid black">
										<tr>
											<th class="tc" style="width: 2%;border: 2px solid black" scope="col">NO</th>
											<th class="tc" style="width: 30%;border: 2px solid black" scope="col">NAMA PRODUCT</th>
											<th class="tc" style="width: 10%;border: 2px solid black" scope="col">SKU</th>
											<!-- <th class="tc" style="width: 18%;border: 2px solid black" scope="col">DESCRIPTION</th> -->
											<th class="tc" style="width: 5%;border: 2px solid black" scope="col">QTY</th>
											<th class="tc" style="width: 5%;border: 2px solid black" scope="col">UNIT</th>
											<th class="tc" style="width: 10%;border: 2px solid black" scope="col">PRICE</th>
											<th class="tc" style="width: 10%;border: 2px solid black" scope="col">AMOUNT</th>
										</tr>
									</thead>
									<tbody id="bodys">
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-8 mt-4" style="line-height: 0.5rem;">
								<?php if ($data2 == "Not Found") { ?>
									<p style="padding-left: 1vw;"></p>
								<?php } else { ?>
									<?php foreach ($data2 as $key) : ?>
										<!-- <p style="padding-left: 1vw;">BCA : 540-5540077 a/n : DAFFINA RITELINDO SEMESTA</p>
									<p style="padding-left: 1vw;">Mandiri : 127 001 011 4039 : DAFFINA RITELINDO SEMESTA</p>
									<p style="padding-left: 1vw;">Bri : 0443 0100 0973 302 : DAFFINA RITELINDO SEMESTA</p> -->
										<p style="padding-left: 1vw;"><?php echo $key["namecomm"] ?> : <?php echo $key["attrib1"] ?></p>
									<?php endforeach ?>
								<?php } ?>
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
									<p style="padding-top: 2.5vh;">( MARKETING )</p>
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
<div class="data" id="data" style="display: none">
	<table class="table table-striped table-hover" style="margin-top: 2%;width: 100%">
		<thead style="background: #3C2E8F;color: white ">
			<tr>
				<th style="border: solid;background-color: green;">No.Quotation</th>
				<th style="border: solid;background-color: green;">Tgl.Dibuat</th>
				<th style="border: solid;background-color: green;">Tipe Order</th>
				<th style="border: solid;background-color: green;">Judul Quotation</th>
				<th style="border: solid;background-color: green;">Customer</th>
				<th style="border: solid;background-color: green;">Price</th>
				<th style="border: solid;background-color: green;">Status</th>
				<th style="border: solid;background-color: green;">Nama Produk</th>
				<th style="border: solid;background-color: green;">SKU</th>
				<th style="border: solid;background-color: green;">Qty Order</th>
			</tr>
		</thead>
		<tbody id="prt">
			<?php if ($data != "Not Found") : $a = 0;
				$grandtotal = 0; ?>
				<?php foreach ($data as $key) : $grandtotal = $grandtotal +  $key["pricetotal"]; ?>
					<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
						<td style="border: solid;"><?php echo $key["codequo"] ?></td>
						<td style="border: solid;"><?php echo $key["datequo"] ?></td>
						<td style="border: solid;"><?php echo $key["nametypequo"] ?></td>
						<td style="border: solid;"><?php echo $key["namequotation"] ?></td>
						<td style="border: solid;"><?php echo $key["namecomm"] ?></td>
						<td style="border: solid;"><?php echo number_format($key["pricetotal"], 0, "", ",") ?></td>
						<td style="border: solid;"><?php echo $key["statusquo"] ?></td>
						<td style="border: solid;" colspan="3">
							<table class="table">
								<tbody>
									<?php foreach ($key["data"] as $keyx) : ?>
										<tr>
											<td style="width: 40%;border: solid;"><?php echo $keyx["nameitem"] ?></td>
											<td style="width: 30%;border: solid;"><?php echo $keyx["sku"] ?></td>
											<td style="width: 30%;border: solid;"><?php echo $keyx["qty"] ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php endforeach ?>
				<tr>
					<th style="border: solid;">Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td style="border: solid;"><?php echo number_format($grandtotal, 0, "", ",") ?></td>
					<td></td>
					<td></td>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">
	function clearsearch() {
		$('#valsearch').val("");
	}


	function apply() {
		var data = <?php echo json_encode($data) ?>;
		var baris = ""
		var bar = ""
		var grandtotal = 0;
		var a = 1;
		if (data != 'Not Found') {
			if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
				for (var i = 0; i < data.length; i++) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + formatnum(parseFloat(data[i]["pricetotal"]).toFixed(0)) + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["codequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["namequotation"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["nametypequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
				for (var i = 0; i < data.length; i++) {
					if (data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else {
						console.log("NOt FOUND")
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
				for (var i = 0; i < data.length; i++) {
					console.log(data[i])
					if (data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
							<td>` + data[i]["codequo"] + `</td>
							<td>` + data[i]["datequo"] + `</td>
							<td>` + data[i]["nametypequo"] + `</td>
							<td>` + data[i]["namequotation"] + `</td>
							<td>` + data[i]["namecomm"] + `</td>
							<td>` + data[i]["pricetotal"] + `</td>
							<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
							<td>` + data[i]["codequo"] + `</td>
							<td>` + data[i]["datequo"] + `</td>
							<td>` + data[i]["nametypequo"] + `</td>
							<td>` + data[i]["namequotation"] + `</td>
							<td>` + data[i]["namecomm"] + `</td>
							<td>` + data[i]["pricetotal"] + `</td>
							<td>` + data[i]["statusquo"] + `</td>`;
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else {
						console.log("NOt FOUND")
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
				for (var i = 0; i < data.length; i++) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["codequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["namequotation"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["nametypequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
				for (var i = 0; i < data.length; i++) {
					if (data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val() && data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else {
						console.log("NOt FOUND")
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
				for (var i = 0; i < data.length; i++) {
					if (data[i]["namecomm"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val() && data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["codequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val() && data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["namequotation"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val() && data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					} else if (data[i]["nametypequo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val() && data[i]["statusquo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
						var a = 0;
						baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						if (data[i]["statusquo"] != "Finish") {
							baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
						} else {
							baris += `<td></td>`
						}
						baris += `	</tr>`
						bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
						bar += `<td colspan="3">
							<table class="table">
								<tbody>`
						for (var a = 0; a < data[i]["data"].length; a++) {
							bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
							bar += `</tbody>
							</table>
						</td>`;
						}
					}
				}
				baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
				bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>` + grandtotal + `</td>
					<td></td>
					<td></td>
				</tr>`
			}
		}



		$('#bodyx').html(baris);
		$('#prt').html(bar);
	}

	function status(x) {
		console.log("ok")
		var data = <?php echo json_encode($data) ?>;
		var baris = ""
		var bar = ""
		var grandtotal = 0;
		var a = 1;
		for (var i = 0; i < data.length; i++) {
			console.log(data[i])
			if (data[i]["statusquo"].toLowerCase().includes(x.toLowerCase())) {
				grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
				baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
							<td>` + data[i]["codequo"] + `</td>
							<td>` + data[i]["datequo"] + `</td>
							<td>` + data[i]["nametypequo"] + `</td>
							<td>` + data[i]["namequotation"] + `</td>
							<td>` + data[i]["namecomm"] + `</td>
							<td>` + data[i]["pricetotal"] + `</td>
							<td>` + data[i]["statusquo"] + `</td>`
				if (data[i]["statusquo"] != "Finish") {
					baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
				} else {
					baris += `<td></td>`
				}
				baris += `	</tr>`
				bar += `<tr>
							<td>` + data[i]["codequo"] + `</td>
							<td>` + data[i]["datequo"] + `</td>
							<td>` + data[i]["nametypequo"] + `</td>
							<td>` + data[i]["namequotation"] + `</td>
							<td>` + data[i]["namecomm"] + `</td>
							<td>` + data[i]["pricetotal"] + `</td>
							<td>` + data[i]["statusquo"] + `</td>`;
				bar += `<td colspan="3">
							<table class="table">
								<tbody>`
				for (var a = 0; a < data[i]["data"].length; a++) {
					bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
					bar += `</tbody>
							</table>
						</td>`;
				}
			} else {
				console.log("NOt FOUND")
			}
		}
		baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
		bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
		$('#bodyx').html(baris);
		$('#prt').html(bar);

	}

	function dates() {
		if ($('#date1').val() == "" || $('#date2').val() == "") {
			alert("Masukan Periode dengan benar")
		} else {
			var data = <?php echo json_encode($data) ?>;
			var baris = "";
			var bar = "";
			var grandtotal = 0;
			var a = 1;
			for (var i = 0; i < data.length; i++) {
				if (data[i]["datequo"] >= $('#date1').val() && data[i]["datequo"] <= $('#date2').val()) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				} else {
					console.log("NOt FOUND")
				}
			}
			baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
			bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
			$('#bodyx').html(baris);
			$('#prt').html(bar);
		}
	}

	function reset() {

		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var bar = "";
		var a = 1;
		var grandtotal = 0;
		for (var i = 0; i < data.length; i++) {
			grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
			baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
						<td>` + data[i]["codequo"] + `</td>
						<td>` + data[i]["datequo"] + `</td>
						<td>` + data[i]["nametypequo"] + `</td>
						<td>` + data[i]["namequotation"] + `</td>
						<td>` + data[i]["namecomm"] + `</td>
						<td>` + data[i]["pricetotal"] + `</td>
						<td>` + data[i]["statusquo"] + `</td>`
			if (data[i]["statusquo"] != "Finish") {
				baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
			} else {
				baris += `<td></td>`
			}
			baris += `	</tr>`
			bar += `<tr>
						<td>` + data[i]["codequo"] + `</td>
						<td>` + data[i]["datequo"] + `</td>
						<td>` + data[i]["nametypequo"] + `</td>
						<td>` + data[i]["namequotation"] + `</td>
						<td>` + data[i]["namecomm"] + `</td>
						<td>` + data[i]["pricetotal"] + `</td>
						<td>` + data[i]["statusquo"] + `</td>`
			bar += `<td colspan="3">
							<table class="table">
								<tbody>`
			for (var a = 0; a < data[i]["data"].length; a++) {
				bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
				bar += `</tbody>
							</table>
						</td>`;
			}
		}
		baris += `<tr>
					<td colspan="5">Total Price</td>
					<td colspan="3">` + grandtotal + `</td>
				</tr>`
		bar += `<tr>
					<td colspan="5">Total Price</td>
					<td colspan="3">` + grandtotal + `</td>
				</tr>`
		$('#bodyx').html(baris);
		$('#prt').html(bar);
	}

	function sortdate(x) {
		var data = <?php echo json_encode($data) ?>;
		if (data != "Not Found") {
			var baris = '';
			var bar = '';
			var grandtotal = 0;
			var a = 0;
			for (var i = 0; i < data.length; i++) {
				if (data[i]["datequo"] == x) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				}
			}
			baris += `<tr>
					<td colspan="5">Total Price</td>
					<td colspan="3">` + grandtotal + `</td>
				</tr>`
			bar += `<tr>
					<td colspan="5">Total Price</td>
					<td colspan="3">` + grandtotal + `</td>
				</tr>`
			$('#bodyx').html(baris);
			$('#prt').html(bar);
		} else {
			alert("Empty Data")
		}
	}

	function searchx(x) {

		var data = <?php echo json_encode($data) ?>;
		var grandtotal = 0;
		var baris = '';
		var bar = '';
		if (data != "Not Found") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["namecomm"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 4) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					var a = 0;
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				} else if (data[i]["codequo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					var a = 0;
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				} else if (data[i]["namequotation"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					var a = 0;
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>	
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				} else if (data[i]["nametypequo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
					grandtotal = Number(grandtotal) + Number(data[i]["pricetotal"])
					var a = 0;
					baris += `<tr data-toggle="modal" data-target="#modalopenshop" onclick="details(<?php echo $key['idquo'] ?>)" style="cursor: pointer;">
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					if (data[i]["statusquo"] != "Finish") {
						baris += `	<td><a href="#" onclick = "detail(` + data[i]["idquo"] + `)" class="btn btn-warning">Edit</a></td>`
					} else {
						baris += `<td></td>`
					}
					baris += `	</tr>`
					bar += `<tr>
								<td>` + data[i]["codequo"] + `</td>
								<td>` + data[i]["datequo"] + `</td>
								<td>` + data[i]["nametypequo"] + `</td>
								<td>` + data[i]["namequotation"] + `</td>
								<td>` + data[i]["namecomm"] + `</td>
								<td>` + data[i]["pricetotal"] + `</td>
								<td>` + data[i]["statusquo"] + `</td>`
					bar += `<td colspan="3">
							<table class="table">
								<tbody>`
					for (var a = 0; a < data[i]["data"].length; a++) {
						bar += `<tr>
								<td style="width: 40%;">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["sku"] + `</td>
								<td style="width: 30%;">` + data[i]["data"][a]["qty"] + `</td>
							</tr>`;
						bar += `</tbody>
							</table>
						</td>`;
					}
				}
			}
			baris += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
			bar += `<tr>
					<th>Total Price</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $grandtotal ?></td>
					<td></td>
					<td></td>
				</tr>`
			$('#bodyx').html(baris);
			$('#prt').html(bar);
		} else {
			alert("Data Kosong");
		}
	}

	function detail(x) {
		window.location.href = "<?php echo base_url('Employe/editquotation?zzz=') ?>" + btoa(x);
	}

	function details(x) {
		var data = <?php echo json_encode($data) ?>;
		// var data1 = <?php echo json_encode($data1) ?>;
		console.log(data);
		// console.log(data1);
		var baris = '';
		var bars = '';
		var bar = '';
		var ix = 0;
		var b = 1;
		var ppn = 10;
		if (data != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["idquo"] == x) {
					ix = (ix + 1);
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
					$('#jasa').html(data[i]["jasapengirim"]);
					$('#qty').html(data[i]["totalquo"] + ' Product');
					$('#tyso').html(data[i]["nametypequo"]);
					$('#pt').html(data[i]["namecomm"]);
					$('#cust').html(data[i]["namecomm"]);
					$('#no').html(data[i]["codequo"]);
					$('#dates').html(data[i]["datequo"]);
					bar += `
						<table class="table ">
						<thead>
							<tr>
								<th style="border-style:solid;">No Pesanan</th>`
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
								<td style="border-style:solid;">` + data[i]["jasapengirim"] + `</td>
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
						baris += '<tr>'
						baris += `<td >` + data[i]["data"][a]["nameitem"] + `</td>
								<td >` + data[i]["data"][a]["sku"] + `</td>
								<td >` + data[i]["data"][a]["qtyready"] + `</td>
								<td >` + data[i]["data"][a]["qty"] + `</td>
								<td >` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
							</tr>`
						bar += `<tr>
								<td style="border-style:solid;">` + data[i]["data"][a]["nameitem"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["sku"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qtyready"] + `</td>
												<td style="border-style:solid;">` + data[i]["data"][a]["qty"] + `</td>
												<td style="border-style:solid;">` + (data[i]["data"][a]["qtyready"] - data[i]["data"][a]["qty"]) + `</td>
											</tr>
							</tr>`
						bars += `
						<tr>
								<td style="border: 2px solid black">` + ix + `</td>
								<td style="border: 2px solid black">` + data[i]["data"][a]["nameitem"] + `</td>
								<td style="border: 2px solid black">` + data[i]["data"][a]["sku"] + `</td>
								<td style="border: 2px solid black">` + data[i]["data"][a]["qty"] + `</td>
								<td style="border: 2px solid black"> PCS </td>
								<td style="border: 2px solid black">` + data[i]["data"][a]["price"] + `</td>
								<td style="border: 2px solid black">` + data[i]["data"][a]["totalprice"] + `</td>
						</tr>`
					}
					bars += `<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">DISC</th>
											<td style="border: 2px solid black">` + data[i]["discs"] + `</td>
										</tr>
										<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">SUBTOTAL</th>
											<td style="border: 2px solid black">` + data[i]["pricetotal"] + `</td>
										</tr>
										<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">PPN</th>
											<td style="border: 2px solid black">` + (data[i]["pricetotal"] / 10) + `</td>
										</tr>
										<tr>
											<th style="border: 2px solid black"class="" colspan="5"></th>
											<th style="border: 2px solid black">TOTAL</th>
											<td style="border: 2px solid black">` + (Number(data[i]["pricetotal"]) + Number((data[i]["pricetotal"] / 10))) + `</td>
										</tr>`
					bar += `</tbody>
					</table>
					`
					$('#body').html(baris);
					$('#bodys').html(bars);
					$('#excel').html(bar);
					$('#excel').hide();
					console.log(baris)

				}
			}
		}

	}

	$("#btnexportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "Quotation.xls"
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
			download: "DetailQuotation.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});

	function printDiv(divName) {


		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
		location.reload();

	}

	function printdata() {
		var printContents = document.getElementById('data').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;

	}
</script>