<style type="text/css">
	.fw {
		font-weight: bold;
	}

	.upc {
		text-transform: uppercase;
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

	.slc {
		background-color: #f3f3f3;
		color: black;
	}
</style>

<?php
$status = array('Waiting', 'Received');
?>
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : orange">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">GUDANG / Move Warehouse page</p>
	<p class="text-white font-weight-bold pl-2 upc" style="font-size: 25px">Move Warehouse</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-body ml-4">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="card bay p-4" width="80%">
				<div class="card-header border-0 bg-white">
					<form action="<?php echo base_url('InOut/movewh') ?>" method="post">
						<div class="row pt-4">
							<div class="col-6 pt-2 pl-3">
								<div class="input-group">
									<select name="filter" class="form-select form-control col-2" style="background-color: orange;color: white" id="search" aria-label="Default select example">
										<option class="slc" value="codemove">Trans NO</option>
										<option class="slc" value="typemove">Type Move</option>
										<option class="slc" value="descinfo">Deskripsi</option>
									</select>
									<input type="text" name="search" value="<?= set_value('search') ?>" class="form-control" name="search" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Filter" style="font-family:Arial, FontAwesome">
								</div>
								<div class="card">
									<div class="card-body bays">
										<div class="rwo d-flex justify-content-between">
											<div class="col-3">
												<p>Dari</p>
												<input name="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
											</div>
											<div class="col-3">
												<p>Hingga</p>
												<input name="date2" value="<?= set_value('date2') ?>" placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
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
												<a href="<?php echo base_url('InOut/movewh') ?>" style="text-decoration: none;" class=" btn btn-outline-danger">Reset</a>
												<button style="text-decoration: none" class="btn btn-outline-primary">Apply</button>
											</div>
											<!-- <div class=" col-2 pt-3 ">
											<a style=" text-decoration: none;color: purple" class="btn btn-outline-danger" onclick="reset('')">Reset</a>
											</div>
											<div class="col-2 pt-3">
												<a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-1"></div>
						<div class="col-3">
						</div>
						<div class="col-2">
							<a href="<?php echo base_url('InOut/newmovewh') ?>" class="btn btn-outline-primary" style="float :right"><b>+ Move Warehouse</b></a>
						</div> -->
							<div class="col-4"></div>
							<div class="col-2">
								<a href="<?php echo base_url('InOut/newmovewh') ?>" class="btn btn-outline-primary" style="margin-top: 14vh;float :right"><b>+ Move Warehouse</b></a>
							</div>
						</div>
				</div>
				<div class="card-body">
					<table class="table cn table-striped table-hover">
						<thead style="background-color: orange;color: white">
							<tr>
								<th>NO </th>
								<th>Trans NO</th>
								<th>Type Move</th>
								<th>Trans Date</th>
								<th>Warehouse Awal</th>
								<th>Warehouse Tujuan</th>
								<th>Item Count</th>
								<th>Deskripsi</th>
								<th>Issue By</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data != "Not Found") : $a = 1 ?>
								<?php foreach ($data as $key) : ?>
									<tr>
										<td><?php echo $a++ ?></td>
										<td><?php echo $key["codemove"] ?></td>
										<?php if ($key['norequest'] == "" && $key['norequest'] == NULL) : ?>
											<td>Move Out</td>
										<?php else : ?>
											<td>Request</td>
										<?php endif ?>
										<td><?php echo $key["datemove"] ?></td>
										<td><?php echo $key["namewh"] ?></td>
										<td><?php echo $key["namewh2"] ?></td>
										<td><?php echo $key["itemmove"] ?></td>
										<td><?php echo $key["descinfo"] ?></td>
										<td><?php echo $key["nameuser"] ?></td>
										<td><?php echo $key["status"] ?></td>
										<?php if ($key["status"] == "Waiting") : ?>
											<td><a href="<?php echo base_url('InOut/changemovewh?idtrans=' . base64_encode($key["idmove"])) ?>" class="btn btn-warning">Edit</a></td>
										<?php else : ?>
											<td><a href="<?php echo base_url('InOut/changemovewh?idtrans=' . base64_encode($key["idmove"])) ?>" class="btn btn-warning">Detail</a></td>
										<?php endif ?>
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
	</form>
</div>
<script language="javascript">
	function apply() {
		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var ix = 0;
		var x1 = 0;
		if ($(' #valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1) || (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3) || (data[i]["namewh2"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4) || (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 6) || (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5)) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if (data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if ((data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()))) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) || (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) || (data[i]["namewh2"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) || (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 6 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val()) || (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val())) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namewh2"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 6 && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()))) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if (data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "" && $('#stat').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["typemove"] == 1) {
					if ((data[i]["codemove"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 1 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 3 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["namewh2"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 4 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 6 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && $('#search').val() == 5 && data[i]["datemove"] >= $('#date1').val() && data[i]["datemove"] <= $('#date2').val() && data[i]["status"].toLowerCase().includes($('#stat').val().toLowerCase()))) {
						x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codemove"] + '</td>';
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td>Move Out</td>';
						} else {
							baris += '<td>Request</td>';
						}
						baris += '<td>' + data[i]["datemove"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + data[i]["namewh2"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td>' + data[i]["status"] + '</td>';
						if (data[i]["status"] == "Waiting") {
							if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
								baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
								baris += '</tr>';
							} else {
								baris += '<td></td>';
								baris += '</tr>';
							}
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					}
				}
			}
		} else {
			alert("Masukan Filter Dengan Benar")
		}
		$('#xdetail').html(baris);
	}

	function reset(x) {
		var data = <?php echo json_encode($data) ?>;
		console.log(data) var baris = "";
		var ix = 0;
		var x1 = 0;
		for (var i = 0; i < data.length; i++) {
			if (data[i]["typemove"] == 1) {
				if ((data[i]["codemove"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 1) || (data[i]["namewh"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 3) || (data[i]["namewh2"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 4) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 6) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()) && $('#search').val() == 5)) {
					x1 = formatnum(parseFloat(data[i]["itemmove"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codemove"] + '</td>';
					if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
						baris += '<td>Move Out</td>';
					} else {
						baris += '<td>Request</td>';
					}
					baris += '<td>' + data[i]["datemove"] + '</td>';
					baris += '<td>' + data[i]["namewh"] + '</td>';
					baris += '<td>' + data[i]["namewh2"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + data[i]["descinfo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td>' + data[i]["status"] + '</td>';
					if (data[i]["status"] == "Waiting") {
						if (data[i]["norequest"] == "" || data[i]["norequest"] == null) {
							baris += '<td style="cursor: pointer;"><a style="color:black" href="<?php echo base_url('InOut/changemovewh?idtrans=') ?>' + btoa(data[i]["idmove"]) + '&from=warehouse"><i class="fa fa-pencil"> EDIT</i></a></td>';
							baris += '</tr>';
						} else {
							baris += '<td></td>';
							baris += '</tr>';
						}
					} else {
						baris += '<td></td>';
						baris += '</tr>';
					}
				}
			}
		}
		$('#xdetail').html(baris);
		console.log(baris)
	}

	reset('');
	$('form ').on("clicka", function(e) {
		e.preventDefault();
	});
</script>