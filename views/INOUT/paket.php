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

	.slc {
		background-color: #f3f3f3;
		color: black;
	}
</style>
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">GUDANG / Bundle Item page</p>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">BUNDLE ITEM</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-header border-0 bg-transparent">
			<div class="row d-flex justify-content-between">
				<div class="col-10 pl-5">
					<!-- 	<a href="<?= base_url('InOut/paket') ?>" class="btn bay fw btn-transparent">BUNDLE ITEM</a>
					<a href="<?= base_url('InOut/pakets') ?>" class="btn fw btn-transparent">SPLIT BUNDLE ITEM</a> -->
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
					<div class="row pt-4">
						<div class="col-6">
							<div class="input-group">
								<select class="form-select form-control col-2" style="background-color: #3C2E8F;color: white" aria-label="Default select example" id="search">
									<option class="slc" value="1">Bundle No</option>
									<option class="slc" value="2">SKU Bundle</option>
									<option class="slc" value="3">Name Bundle</option>
									<option class="slc" value="4">Location Bundle</option>
									<option class="slc" value="5">Issue By</option>
								</select>
								<input type="text" class="form-control col-10" id="valsearch" placeholder="&#xF002; Cari Berdasarkan Bundle No dan lainnya" style="font-family:Arial, FontAwesome">
							</div>
							<div class="card">
								<div class="card-body bays">
									<div class="rwo d-flex justify-content-between">
										<div class="col-3">
											<p style="text-align :left">Dari</p>
											<input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
										</div>
										<div class="col-3">
											<p style="text-align :left">Hingga</p>
											<input placeholder="Pilih Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
										</div>
										<div class="col-3">
											<p><br></p>
											<a style="text-decoration: none;" class=" btn btn-outline-danger" onclick="reset()">Reset</a>
											<a style="text-decoration: none" class="btn btn-outline-primary" onclick="apply()">Apply</a>
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
						<div class="col-1"></div>
						<div class="col-3">
						</div>
						<div class="col-2">
							<a href="<?php echo base_url('InOut/newpaket') ?>" class="btn btn-outline-primary" style="float :right;margin-top: 12vh"><b>+ Bundle</b></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table cn">
						<thead style="background-color: #3C2E8F;color: white">
							<tr>
								<th>NO </th>
								<th>Bundle No</th>
								<th>Bundle Date</th>
								<th>SKU Bundle</th>
								<th>Name Bundle</th>
								<th>Location Bundle</th>
								<th>Qty Bundle</th>
								<th>Exp Bundle</th>
								<th>Sn Awal Bundle</th>
								<th>Sn Akhir Bundle</th>
								<th>Deskripsi</th>
								<th>Issue By</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="xdetail">
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

<script language="javascript">
	function apply(x) {
		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var ix = 0;
		var x1 = 0;
		if ($('#valsearch').val() != "" && $('#date1').val() == "" && $('#date2').val() == "") {
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codepaket"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["sku"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nameitem"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase())) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				}
			}
		} else if ($('#valsearch').val() == "" && $('#date1').val() != "" && $('#date2').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if (data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
					x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
					ix = (ix + 1);
					baris += '<tr>';
					baris += '<td>' + ix + '</td>';
					baris += '<td>' + data[i]["codepaket"] + '</td>';
					baris += '<td>' + data[i]["datepaket"] + '</td>';
					baris += '<td>' + data[i]["sku"] + '</td>';
					baris += '<td>' + data[i]["nameitem"] + '</td>';
					baris += '<td>' + data[i]["namewh"] + '</td>';
					baris += '<td>' + x1 + '</td>';
					baris += '<td>' + data[i]["expdatep"] + '</td>';
					baris += '<td>' + data[i]["idsnp"] + '</td>';
					baris += '<td>' + data[i]["idsnp2"] + '</td>';
					baris += '<td>' + data[i]["descinfo"] + '</td>';
					baris += '<td>' + data[i]["nameuser"] + '</td>';
					baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
					baris += '</tr>';
				}
			}
		} else if ($('#valsearch').val() != "" && $('#date1').val() != "" && $('#date2').val() != "") {
			for (var i = 0; i < data.length; i++) {
				if ($('#search').val() == 1) {
					if (data[i]["codepaket"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 2) {
					if (data[i]["sku"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 3) {
					if (data[i]["nameitem"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 4) {
					if (data[i]["namewh"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				} else if ($('#search').val() == 5) {
					if (data[i]["nameuser"].toLowerCase().includes($('#valsearch').val().toLowerCase()) && data[i]["expdatep"] >= $('#date1').val() && data[i]["expdatep"] <= $('#date2').val()) {
						x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
						ix = (ix + 1);
						baris += '<tr>';
						baris += '<td>' + ix + '</td>';
						baris += '<td>' + data[i]["codepaket"] + '</td>';
						baris += '<td>' + data[i]["datepaket"] + '</td>';
						baris += '<td>' + data[i]["sku"] + '</td>';
						baris += '<td>' + data[i]["nameitem"] + '</td>';
						baris += '<td>' + data[i]["namewh"] + '</td>';
						baris += '<td>' + x1 + '</td>';
						baris += '<td>' + data[i]["expdatep"] + '</td>';
						baris += '<td>' + data[i]["idsnp"] + '</td>';
						baris += '<td>' + data[i]["idsnp2"] + '</td>';
						baris += '<td>' + data[i]["descinfo"] + '</td>';
						baris += '<td>' + data[i]["nameuser"] + '</td>';
						baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
						baris += '</tr>';
					}
				}
			}
		} else {
			alert("Masukan Filter Dengan Benar")
			return;
		}

		$('#xdetail').html(baris);
		console.log($('#valsearch').val())
		console.log($('#date1').val())
		console.log($('#date2').val())
	}

	function searchx(x) {
		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var ix = 0;
		var x1 = 0;
		for (var i = 0; i < data.length; i++) {
			if ((data[i]["namewh"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepaket"].toLowerCase().includes(x.toLowerCase())) || (data[i]["sku"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["idsnp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["idsnp2"].toLowerCase().includes(x.toLowerCase()))) {
				x1 = formatnum(parseFloat(data[i]["itempaket"]).toFixed(0));
				ix = (ix + 1);
				if (i % 2 == 0) {

				} else {
					baris += '<tr style="background:#eeeeee; cursor: pointer;">';
				}
				baris += '<tr>';
				baris += '<td>' + ix + '</td>';
				baris += '<td>' + data[i]["codepaket"] + '</td>';
				baris += '<td>' + data[i]["datepaket"] + '</td>';
				baris += '<td>' + data[i]["sku"] + '</td>';
				baris += '<td>' + data[i]["nameitem"] + '</td>';
				baris += '<td>' + data[i]["namewh"] + '</td>';
				baris += '<td>' + x1 + '</td>';
				baris += '<td>' + data[i]["expdatep"] + '</td>';
				baris += '<td>' + data[i]["idsnp"] + '</td>';
				baris += '<td>' + data[i]["idsnp2"] + '</td>';
				baris += '<td>' + data[i]["descinfo"] + '</td>';
				baris += '<td>' + data[i]["nameuser"] + '</td>';
				baris += '<td><a href="<?php echo base_url('InOut/changepaket?idtrans=') ?>' + btoa(data[i]["idpaket"]) + '" class="btn btn-secondary">Edit</a></td>';
				baris += '</tr>';
				baris += '</tr>';
			}
		}

		$('#xdetail').html(baris);
		console.log(baris)
	}
	searchx('');
	$('form button').on("click", function(e) {
		e.preventDefault();
	});
</script>