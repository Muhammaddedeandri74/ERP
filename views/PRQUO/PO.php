<style type="text/css">
	.fontAwesome {
		font-family: 'Helvetica', FontAwesome, sans-serif;
	}

	.bays {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
	}

	.slc {
		background-color: #f3f3f3;
		color: black;
	}
</style>

<?php
$status = array('Waiting', 'Process', 'Finish', 'Cancel');
?>

<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Purchase Order page</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">PURCHASE ORDER</p>
</div>

<div class="container-xxl" style="padding-left: 6vw;">
	<?php echo $this->session->flashdata('message'); ?>
	<?php $this->session->set_flashdata('message', ''); ?>
	<div class="row">
		<div class="col">
			<div class="card bays my-4" style="margin-right: 2vw;">
				<form action="<?php echo base_url('PrQuo/po') ?>" method="post">
					<div class="row pt-4 d-flex justify-content-between">
						<div class="col-6" style="margin-left: 1vw;">
							<div class=" input-group">
								<select name="filter" class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
									<option class="slc" value="codepo">Order NO</option>
									<option class="slc" value="codepr">Request NO</option>
									<!-- <option class="slc" value="3">Supplier</option> -->
									<!-- <option class="slc" value="4">Status</option> -->
									<!-- <option class="slc" value="5">Issue By</option> -->
								</select>
								<input type="text" name="search" value="<?= set_value('search') ?>" class="form-control col-10" placeholder="&#xF002; Cari Berdasarkan Filter.." id="valsearch" style="font-family:Arial, FontAwesome">
								<!-- <button style="display:none" type="submit"><i class="fa fa-search"></i></button> -->
							</div>
							<div class="card">
								<div class="card-body bays">
									<div class="rwo d-flex justify-content-between">
										<div class="col-3">
											<p>Dari</p>
											<input placeholder="Pilih Tanggal" name="date1" value="<?= set_value('date1') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
										</div>
										<div class="col-3">
											<p>Hingga</p>
											<input placeholder="Pilih Tanggal" name="date2" value="<?= set_value('date2') ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
											<a href="<?php echo base_url('PrQuo/po') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
											<button type="submit" style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
										</div>
										<!-- <div class="col-2 pt-3 ">
										<a style="text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset()">Reset</a>
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
						<div class="col-3" style="margin-top: 12vh">
							<a href="<?php echo base_url('PRQUO/newpo') ?>" class="btn btn-outline-primary" style="margin-left: 3.5rem!important;margin-right: 2vw;">+ Purchase Order</a>
							<a data-toggle="modal" data-target="#modalopenshop" class="btn btn-outline-primary"> Purchase Request</a>
						</div>
				</form>

			</div>
			<!-- <div class="row d-flex justify-content-between mt-3">
					<div class="col-9">
					</div>
					<div class="col-3">
						<a href="<?php echo base_url('PRQUO/newpo') ?>" class="btn btn-outline-primary" style="margin-left: 3.5rem!important;margin-right: 1vw;">+ Purchase Order</a>
						<a data-toggle="modal" data-target="#modalopenshop" class="btn btn-outline-primary"> Purchase Request</a>
					</div>
				</div> -->
			<div class="card-body">
				<table class="table table-striped table-hover">
					<thead style="background-color: #3C2E8F;color:white">
						<tr>
							<th>NO </th>
							<th>Order NO</th>
							<th>Request NO</th>
							<th>Order Date</th>
							<th>Supplier</th>
							<th>Item Count</th>
							<th>Total Request</th>
							<th>Status</th>
							<th>Issue By</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($data != "Not Found") : $a = 1 ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $a++ ?></td>
									<td><?php echo $key["codepo"] ?></td>
									<td><?php echo $key["codepr"] ?></td>
									<td><?php echo $key["datepo"] ?></td>
									<td><?php echo $key["namesupp"] ?></td>
									<td><?php echo $key["itemcount"] ?></td>
									<td><?php echo number_format($key["totalpo"], 0, "", ",") ?></td>
									<td><?php echo $key["statuspo"] ?></td>
									<td><?php echo $key["nameuser"] ?></td>
									<td><a href="<?php echo base_url('PrQuo/changepo?idtrans=' . base64_encode($key["idpo"])) ?>" class="btn btn-secondary">Edit</a></td>
									</td>
								</tr>
							<?php endforeach ?>
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
<!-- Modal Open Shop -->
<div class="modal fade" id="modalopenshop" tabindex="-1" role="dialog" aria-labelledby="modalopenshopTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<form class="user ml-0" style="width:100%" method="post" action="">
				<div class="modal-header col-12" style="background-color : #3C2E8F; color: white">
					<h5 class="modal-title" id="exampleModalLongTitle">Purcase Request</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-xxl">
						<div class=" card border-0">
							<div class="card-header border-0 bg-transparent">
								<div class="row d-flex justify-content-between">
									<div class="col-5">
										<input type="text" class="form-control" oninput="searchh(this.value)" name="search" id="search" placeholder="&#xF002; Cari Berdasarkan Supplier atau lainnya" style="font-family:Arial, FontAwesome">
									</div>
									<div class="col-2">

									</div>
									<!-- <div class="col-5">
										<div class="mb-3 row">
											<label class="col-sm-4 col-form-label" style="text-align:right">Filter by</label>
											<div class="col-sm-8">
												<input type="date" name="" class="form-control" placeholder="<?php echo date('m-d') ?>">
											</div>
										</div>
									</div> -->
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped table-hover cn">
									<thead style="background-color: orange;color: white">
										<tr>
											<th>NO </th>
											<th>Request NO</th>
											<th>Request Date</th>
											<th>Supplier</th>
											<th>Item Count</th>
											<th>Total Request</th>
											<th>Status</th>
											<th>Issue By</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody id="xdetails">
										<tr>
											<td>NO </td>
											<td>Request NO</td>
											<td>Request Date</td>
											<td>Supplier</td>
											<td>Item Count</td>
											<td>Total Request</td>
											<td>Status</td>
											<td>Issue By</td>
											<td><a style="cursor: pointer;text-decoration:none" href="<?php echo base_url('PrQuo/changeprpo?idtrans=') ?>" class="btn btn-warning">Confirm</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script language="javascript">
	function apply() {
		var data = <?php echo json_encode($data) ?>;
		console.log(data)
		var baris = "";
		var ix = 0;
		var x1 = 0;
		var x2 = 0;
		var totalqty = 0;
		var totalprice = 0;

		if ($(' #valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				}
			}
			baris += ` <tr>
										<td colspan="5">Total Item</td>
										<td colspan='5'>` + totalqty + `</td>
								</tr>
								<tr>
									<td colspan="6">Total Price</td>
									<td colspan='4'>` + totalprice + `</td>
								</tr>

								`
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td style="cursor: pointer;"><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else {
					console.log("NOT FOUND")
				}
			}
			baris += ` <tr>
										<td colspan="1">Total Item</td>
										<td colspan="4"></td>
										<td colspan='1'>` + totalqty + `</td>
										<td colspan="4"></td>
										</tr>
										<tr>
											<td colspan="1">Total Price</td>
											<td colspan="5"></td>
											<td colspan='1'>` + totalprice + `</td>
											<td colspan="3"></td>
										</tr>`
		} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td style="cursor: pointer;"><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else {
					console.log("NOT FOUND")
				}
			}
			baris += ` <tr>
											<td colspan="1">Total Item</td>
											<td colspan="4"></td>
											<td colspan='1'>` + totalqty + `</td>
											<td colspan="4"></td>
											</tr>
											<tr>
												<td colspan="1">Total Price</td>
												<td colspan="5"></td>
												<td colspan='1'>` + totalprice + `</td>
												<td colspan="3"></td>
											</tr>`
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				}
			}
			baris += ` <tr>
																	<td colspan="5">Total Item</td>
																	<td colspan='5'>` + totalqty + `</td>
																	</tr>
																	<tr>
																		<td colspan="6">Total Price</td>
																		<td colspan='4'>` + totalprice + `</td>
																	</tr>

																	`

		} else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				}
			}
			baris += ` <tr>
																		<td colspan="5">Total Item</td>
																		<td colspan='5'>` + totalqty + `</td>
																		</tr>
																		<tr>
																			<td colspan="6">Total Price</td>
																			<td colspan='4'>` + totalprice + `</td>
																		</tr>

																		`
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val() && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase())) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td style="cursor: pointer;"><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else {
					console.log("NOT FOUND")
				}
			}
			baris += ` <tr>
																				<td colspan="1">Total Item</td>
																				<td colspan="4"></td>
																				<td colspan='1'>` + totalqty + `</td>
																				<td colspan="4"></td>
																				</tr>
																				<tr>
																					<td colspan="1">Total Price</td>
																					<td colspan="5"></td>
																					<td colspan='1'>` + totalprice + `</td>
																					<td colspan="3"></td>
																				</tr>`
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["codepo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["statuspo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["statuspo"].toLowerCase().includes($('#stat').val().toLowerCase()) && data[i]["datepo"] >= $('#date1').val() && data[i]["datepo"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				}
			}
			baris += ` <tr>
																										<td colspan="5">Total Item</td>
																										<td colspan='5'>` + totalqty + `</td>
																										</tr>
																										<tr>
																											<td colspan="6">Total Price</td>
																											<td colspan='4'>` + totalprice + `</td>
																										</tr>

																										`
		} else {
			alert("Masukan Filter Dengan Benar")
			return
		}


		$('#xdetail').html(baris);
	}


	function searchx(x) {
		var data = <?php echo json_encode($data) ?>;
		console.log(data)
		var baris = "";
		var ix = 0;
		var x1 = 0;
		var x2 = 0;
		var totalqty = 0;
		var totalprice = 0;
		if (data != 'Not Found') {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["codepo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["codepr"] != null && data[i]["codepr"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["namesupp"] != null && data[i]["namesupp"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["statuspo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 4) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				} else if (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 5) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpo"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr style="cursor: pointer;">';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepo"] + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepo"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
					totalqty = Number(totalqty) + Number(x1.replace(',', ''));
					totalprice = Number(totalprice) + Number(data[i]["totalpo"]);
				}
			}
		}
		baris += ` <tr>
																											<td colspan="5">Total Item</td>
																											<td colspan='5'>` + totalqty + `</td>
																											</tr>
																											<tr>
																												<td colspan="6">Total Price</td>
																												<td colspan='4'>` + totalprice + `</td>
																											</tr>

																											`

		$('#xdetail').html(baris);
	}
	// searchx('');
	// $('form button').on("click", function(e) {
	// //searchx($('#search').val());
	// e.preventDefault();
	// });


	// function reset() {

	// var data = <?php echo json_encode($data) ?>;
	// var baris = "";
	// var bar = "";
	// var a = 1;
	// var ix = 0;
	// var x1 = 0;
	// var x2 = 0;
	// var totalqty = 0;
	// var totalprice = 0;
	// for (var i = 0; i < data.length; i++) { // x1=formatnum(parseFloat(data[i]["itemcount"]).toFixed(0)); // x2=formatnum(parseFloat(data[i]["totalpo"]).toFixed(0)); // ix=(ix + 1); // baris +='<tr>' ; // baris +='<td>' + ix + '</td>' ; // baris +='<td>' + data[i]["codepo"] + '</td>' ; // baris +='<td>' + data[i]["codepr"] + '</td>' ; // baris +='<td>' + data[i]["datepo"] + '</td>' ; // baris +='<td>' + data[i]["namesupp"] + '</td>' ; // baris +='<td>' + x1 + '</td>' ; // baris +='<td>' + x2 + '</td>' ; // baris +='<td>' + data[i]["statuspo"] + '</td>' ; // baris +='<td>' + data[i]["nameuser"] + '</td>' ; // baris +='<td style="cursor: pointer;"><a style="color:black;text-decoration:none" href="<?php echo base_url('PrQuo/changepo?idtrans=') ?>' + btoa(data[i]["idpo"]) + '&stat=' + data[i]["codestatus"] + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>' ; // baris +='</tr>' ; // totalqty=Number(totalqty) + Number(x1.replace(',', '' )); // totalprice=Number(totalprice) + Number(data[i]["totalpo"]); // } // baris +=` // <tr>
	// <td colspan="1">Total Item</td>
	// <td colspan="4"></td>
	// <td colspan='1'>` + totalqty + `</td>
	// <td colspan="4"></td>
	// </tr>
	// <tr>
	// <td colspan="1">Total Price</td>
	// <td colspan="5"></td>
	// <td colspan='1'>` + totalprice + `</td>
	// <td colspan="3"></td>
	// </tr>`
	// $('#xdetail').html(baris);
	// $('#printt').html(bar);
	// }


	function searchh(x) {
		var data = <?php echo json_encode($data1) ?>;
		var baris = "";
		var ix = 0;
		var x1 = 0;
		var x2 = 0;
		if (data != 'Not Found') {
			for (var i = 0; i < data.length; i++) {
				if ((data[i]["codepr"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["statuspr"].toLowerCase().includes(x.toLowerCase()))) {
					if (data[i]["statuspr"] == "Waiting") {
						x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
						x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
						ix = (ix + 1);
						if (i % 2 == 0) {
							baris += '<tr style="background:#eeeeee;cursor: pointer;">';
							baris += '<td scope="row">' + ix + '</td>';
							baris += '<td>' + data[i]["codepr"] + '</td>';
							baris += '<td>' + data[i]["datepr"] + '</td>';
							baris += '<td>' + data[i]["namesupp"] + '</td>';
							baris += '<td>' + x1 + '</td>';
							baris += '<td>' + x2 + '</td>';
							baris += '<td>' + data[i]["statuspr"] + '</td>';
							baris += '<td>' + data[i]["nameuser"] + '</td>';
							baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/newpo?ccc=') ?>' + data[i]["idpr"] + '&ddd = ' + data[i]["datepr"] + '&eee=' + data[i]["idsupp"] + '" class="btn btn-warning"> confirm</a></td>';
							baris += '</tr>';
						} else {
							baris += '<tr style=" cursor: pointer;">';
							baris += '<td scope="row">' + ix + '</td>';
							baris += '<td>' + data[i]["codepr"] + '</td>';
							baris += '<td>' + data[i]["datepr"] + '</td>';
							baris += '<td>' + data[i]["namesupp"] + '</td>';
							baris += '<td>' + x1 + '</td>';
							baris += '<td>' + x2 + '</td>';
							baris += '<td>' + data[i]["statuspr"] + '</td>';
							baris += '<td>' + data[i]["nameuser"] + '</td>';
							baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/newpo?ccc=') ?>' + data[i]["idpr"] + '&ddd = ' + data[i]["datepr"] + '&eee=' + data[i]["idsupp"] + '" class="btn btn-warning">confirm</a></td>';
							baris += '</tr>';
						}
					}
				}
			}
		}
		$('#xdetails').html(baris);
		console.log(baris)
	}
	searchh(''); // $('form button').on("click", function(e) { // //searchx($('#search').val()); // e.preventDefault(); // }); 
</script>