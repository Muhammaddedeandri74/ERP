<style type="text/css">
	.fw {
		font-weight: bold;
	}

	.fn {
		font-weight: normal;
	}

	.bay {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
	}

	.cn {
		text-align: center;
	}

	.fontAwesome {
		font-family: 'Helvetica', FontAwesome, sans-serif;
	}
</style>

<?php
$status = array('Waiting', 'Process', 'Finish', 'Cancel');
?>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : orange">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Purchase Request page</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">REQUEST PURCHASE</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-header border-0 bg-transparent">
			<div class="row d-flex justify-content-between">
				<div class="col-10 pl-5">
					<a href="<?= base_url('PrQuo/pr') ?>" class="btn bay fw btn-transparent">REQUEST PURCHASE</a>
					<a href="<?= base_url('PrQuo/cr') ?>" class="btn fw btn-transparent">REQUEST COUNTER</a>
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
					<form action="<?php echo base_url('PrQuo/pr') ?>" method="post">
						<div class="row pt-4 d-flex justify-content-between">
							<div class="col-6 pt-2 pl-3">
								<div class="input-group">
									<select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" aria-label="Default select example" id="search">
										<option class="slc" value="codepr">Request No</option>
										<option class="slc" value="namecomm">Supplier</option>
										<option class="slc" value="username">Issue By</option>
									</select>
									<input type="text" value="<?= set_value('search') ?>" class="form-control col-10" value="<?= set_value('search') ?>" name="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" id="valsearch" style="font-family:Arial, FontAwesome">
								</div>
								<div class="card">
									<div class="card-body bays">
										<div class="rwo d-flex justify-content-between">
											<div class="col-3">
												<p>Dari</p>
												<input placeholder="Pilih Tanggal" value="<?= set_value('date1') ?>" class="form-control" type="text" name="date1" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
											</div>
											<div class="col-3">
												<p>Hingga</p>
												<input placeholder="Pilih Tanggal" value="<?= set_value('date2') ?>" class="form-control" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
												<a href="<?php echo base_url('PrQuo/pr') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
												<button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
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
					</form>
				</div>
				<div class="col-4"></div>
				<div class="col-2">
					<a href="<?php echo base_url('PRQUO/newpr') ?>" style="margin-top: 14vh;float :right" class="btn btn-outline-primary"><b>+ Purchase Request</b></a>
				</div>
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
				<tbody>
					<?php if ($data != "Not Found") : $a = 1;
						$getdata = array(); ?>
						<?php foreach ($data as $key) : ?>
							<th style="text-align:center;" scope="row"><?php echo $a++ ?></th>
							<td style="text-align:center;"><?php echo $key["codepr"] ?></td>
							<td style="text-align:center;"><?php echo $key["datepr"] ?></td>
							<td style="text-align:center;"><?php echo $key["namesupp"] ?></td>
							<td style="text-align:center;"><?php echo $key["itemcount"] ?></td>
							<td style="text-align:center;"><?php echo $key["totalpr"] ?></td>
							<td style="text-align:center;"><?php echo $key["namecomm"]  ?></td>
							<td style="text-align:center;"><?php echo $key["nameuser"]  ?></td>
							<td style="text-align:center;"><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=' . base64_encode($key["idpr"])) ?>"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>
							</td>
							</tr>
						<?php array_push($getdata, $key);
						endforeach ?>
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
<!-- <div class="container-xxl" style="padding-left: 6vw;background-color: #3C2E8F;">
	<div class="row">
		<div class="col">
			<p style="font-size: 15px; margin: 0; padding: 20px;color: white">PURCHASE / Purchase Request page</p>
			<h1 style="color: white; padding-left: 20px"> PURCHASE REQUEST</h1>
		</div>
		<div class="col" style="margin: 3% ;">
			<div class="d-flex align-items-center">
				<p style="font-size: 20px; color: orange; margin: 0; ">Filter Pencarian</p>
				<form class="example" action="">
					<input type="text" class="fontAwesome" placeholder="Cari Berdasarkan Supplier atau lainnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#xF002;" name="search" id="search" oninput="searchx(this.value)">
					<button style="display:none" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container-xxl" style="padding-left: 6vw;">
	<?php echo $this->session->flashdata('message'); ?>
	<?php $this->session->set_flashdata('message', ''); ?>
	<div class="row">
		<div class="col">
			<div class="card bays my-4" style="margin-right: 2vw;">
				<div class="row d-flex justify-content-between pt-4">
					<div class="col-9">
						<a href="<?php echo base_url('PRQUO/newpr') ?>" class="btn btn-outline-primary ml-5">+ Purchase Request</a>
					</div>
					<div class="col-3">
						<a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
						<a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
						<a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
					</div>
				</div>
				<div class="card-body ">
					<table class="table">
						<thead style="background-color: #3C2E8F;color:white">
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
						<tbody id="xdetail">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="excel" id="excel">
</div>
<div class="data" id="data" style="display: none">
	<table class="table">
		<thead style="background: purple">
			<tr>
				<th style="text-align:center;border:1px solid;">NO </th>
				<th style="text-align:center;border:1px solid;">Request NO</th>
				<th style="text-align:center;border:1px solid;">Request Date</th>
				<th style="text-align:center;border:1px solid;">Supplier</th>
				<th style="text-align:center;border:1px solid;">Item Count</th>
				<th style="text-align:center;border:1px solid;">Total Request</th>
				<th style="text-align:center;border:1px solid;">Status</th>
				<th style="text-align:center;border:1px solid;">Issue By</th>
			</tr>
		</thead>
		<tbody style="background-color: whtie" id="prt">
			<?php if ($data != "Not Found") : $a = 1;
				$getdata = array(); ?>
				<?php foreach ($data as $key) : ?>
					<th style="text-align:center;border:1px solid;" scope="row"><?php echo $a++ ?></th>
					<td style="text-align:center;border:1px solid;"><?php echo $key["codepr"] ?></td>
					<td style="text-align:center;border:1px solid;"><?php echo $key["datepr"] ?></td>
					<td style="text-align:center;border:1px solid;"><?php echo $key["namesupp"] ?></td>
					<td style="text-align:center;border:1px solid;"></td>
					<td style="text-align:center;border:1px solid;"></td>
					<td style="text-align:center;border:1px solid;"><?php echo $key["statuspr"]  ?></td>
					<td style="text-align:center;border:1px solid;"><?php echo $key["nameuser"]  ?></td>
					<td style="text-align:center;border:1px solid;"><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=' . base64_encode($key["idpr"])) ?>"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>
					</td>
					</tr>
				<?php array_push($getdata, $key);
				endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<script language="javascript">
	// function apply() {
	// 	var data = <?php echo json_encode($data) ?>;

	// 	var baris = "";
	// 	var bar = "";
	// 	var ix = 0;
	// 	var x1 = 0;
	// 	if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if ((data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) || (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2)) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if (data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val()) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if (data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase())) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if ((data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val()) || (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val())) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if ((data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase()))) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if (data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val() && data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase())) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
	// 		for (var i = 0; i < data.length; i++) {
	// 			if ((data[i]["codepr"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val()) && data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase()) || (data[i]["namesupp"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 2 && data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val()) && data[i]["statuspr"].toLowerCase().includes($('#stat').val().toLowerCase())) {
	// 				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
	// 				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
	// 				ix = (ix + 1);
	// 				baris += '<tr>';
	// 				baris += '<td scope="row">' + ix + '</td>';
	// 				baris += '<td>' + data[i]["codepr"] + '</td>';
	// 				baris += '<td>' + data[i]["datepr"] + '</td>';
	// 				baris += '<td>' + data[i]["namesupp"] + '</td>';
	// 				baris += '<td>' + x1 + '</td>';
	// 				baris += '<td>' + x2 + '</td>';
	// 				baris += '<td>' + data[i]["statuspr"] + '</td>';
	// 				baris += '<td>' + data[i]["nameuser"] + '</td>';
	// 				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
	// 				baris += '</tr>';

	// 				bar += `<tr>
	// 		              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
	//                         <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
	//                         <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
	//                         </tr>`;
	// 			}
	// 		}
	// 	} else {
	// 		alert("Masukan Filter Dengan Benar")
	// 		return
	// 	}


	// 	$('#xdetail').html(baris);
	// 	$('#prt').html(bar);

	// }

	function searchx(x) {
		var data = <?php echo json_encode($data) ?>;

		var baris = "";
		var bar = "";
		var ix = 0;
		var x1 = 0;
		for (var i = 0; i < data.length; i++) {
			if ((data[i]["codepr"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 2)) {
				x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
				x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
				ix = (ix + 1);
				baris += '<tr>';
				baris += '<td scope="row">' + ix + '</td>';
				baris += '<td>' + data[i]["codepr"] + '</td>';
				baris += '<td>' + data[i]["datepr"] + '</td>';
				baris += '<td>' + data[i]["namesupp"] + '</td>';
				baris += '<td>' + x1 + '</td>';
				baris += '<td>' + x2 + '</td>';
				baris += '<td>' + data[i]["statuspr"] + '</td>';
				baris += '<td>' + data[i]["nameuser"] + '</td>';
				baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
				baris += '</tr>';

				bar += `<tr>
			              	<td style="text-align:center;width: 1%;border:1px solid">` + ix + `</td>
                            <td style="text-align:center;width: 21%;border:1px solid">` + data[i]["codepr"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["datepr"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["namesupp"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + x1 + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + x2 + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["statuspr"] + `</td>
                            <td style="text-align:center;width: 5%;border:1px solid">` + data[i]["nameuser"] + `</td>
                            </tr>`;
			}
		}

		$('#xdetail').html(baris);
		$('#prt').html(bar);
	}
	searchx('');
	$('form button').on("a", function(e) {
		//searchx($('#search').val());
		e.preventDefault();
	});

	function date() {
		if ($('#date1').val() == "" || $('#date2').val() == "") {
			alert("Masukan Periode dengan benar")
		} else {
			var data = <?php echo json_encode($data) ?>;
			var baris = "";
			var bar = "";
			var ix = 0;
			var x1 = 0;
			for (var i = 0; i < data.length; i++) {
				if (data[i]["datepr"] >= $('#date1').val() && data[i]["datepr"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
					x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td scope="row">' + ix + '</td>';
					baris += '<td>' + data[i]["codepr"] + '</td>';
					baris += '<td>' + data[i]["datepr"] + '</td>';
					baris += '<td>' + data[i]["namesupp"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + x2 + '</td>';
					baris += '<td>' + data[i]["statuspr"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
					baris += '</tr>';
				} else {
					console.log("NOT FOUND")
				}
			}
			$('#xdetail').html(baris);
		}
	}

	function reset() {
		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var bar = "";
		var ix = 0;
		var x1 = 0;
		for (var i = 0; i < data.length; i++) {
			x1 = formatnum(parseFloat(data[i]["itemcount"]).toFixed(0));
			x2 = formatnum(parseFloat(data[i]["totalpr"]).toFixed(0));
			ix = (ix + 1);
			baris += '<tr>';
			baris += '<td scope="row">' + ix + '</td>';
			baris += '<td>' + data[i]["codepr"] + '</td>';
			baris += '<td>' + data[i]["datepr"] + '</td>';
			baris += '<td>' + data[i]["namesupp"] + '</td>';
			baris += '<td>' + x1 + '</td>';
			baris += '<td>' + x2 + '</td>';
			baris += '<td>' + data[i]["statuspr"] + '</td>';
			baris += '<td>' + data[i]["nameuser"] + '</td>';
			baris += '<td><a style="text-decoration:none" href="<?php echo base_url('PrQuo/changepr?idtrans=') ?>' + btoa(data[i]["idpr"]) + '"><i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a></td>';
			baris += '</tr>';
		}
		$('#xdetail').html(baris);
	}

	$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "StockPR.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});
</script>