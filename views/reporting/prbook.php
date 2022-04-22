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
</style>
<div class="container-fluid py-2 mb-4" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">PURCHASE / Purchase Request Book</p>
	<p class="text-white font-weight-bold pl-2 tu" style="font-size: 25px">PURCHASE REQUEST BOOK</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-body ml-4">
			<div class="card bay p-4" width="80%">
				<div class="card-header border-0 bg-white">
					<div class="row pt-4 d-flex justify-content-between">
						<div class="col-6" style="margin-left: 1vw;">
							<div class="card">
								<div class="card-body bay">
									<div class="d-flex justify-content-between">
										<div class="col-3-half">
											<p>Dari</p>
											<input type="date" name="date1" id="date1" class="form-control datetrans" value="<?php echo $date1; ?>">
										</div>
										<div class="col-3-half">
											<p>Hingga</p>
											<input type="date" name="date2" id="date2" class="form-control datetrans" value="<?php echo $date2; ?>">
										</div>
										<div class="col-4">
											<p>Status</p>
											<select class="form-control" name="status" id="status" style="margin-top:3px">
												<option value="">-</option>
												<?php foreach ($status as $key) : ?>
													<option value="<?php echo $key["codecomm"] ?>" <?php if ($key["codecomm"] == $statusbook) { ?>selected <?php } ?>><?php echo $key["namecomm"] ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-1" style="margin-top: 4.4vh;">
											<button type="button" class="btn btn-outline-primary" id="loadbtn">Load</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
						</div>
						<div class="col-3" style="margin-top: 6vh">
							<a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
							<a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
							<a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
						</div>

					</div>
					<div class="card-body pt-4">
						<table class="table cn border">
							<thead style="background-color: #3C2E8F;color: white">
								<tr>
									<th style="width:50px">NO </th>
									<th style="width:200px">Request NO</th>
									<th style="width:110px">Date</th>
									<th>Supplier</th>
									<th style="width:120px">Total</th>
									<th style="width:50px">Item</th>
									<th style="width:100px">Qty</th>
									<th style="width:100px">PO</th>
									<th style="width:100px">Status</th>
									<th style="width:100px">Issue</th>
								</tr>
							</thead>
							<tbody id="xdetail">
								<?php if ($data != "Not Found") { ?>
									<?php $a = 0;
									foreach ($data as $key) : ?>
										<?php if ($a % 2 == 0) { ?>
											<tr style="cursor: pointer;">
											<?php } else { ?>
											<tr style="background:#eeeeee; cursor: pointer;">
											<?php } ?>
											<td style="text-align:right"><?php echo ++$a;
																			$a; ?></td>
											<td><?php echo $key["codepr"] ?></td>
											<td><?php echo $key["datepr"] ?></td>
											<td><?php echo $key["namesupp"] ?></td>
											<td style="text-align:right"><?php echo number_format($key["totalpr"], 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($key["itemcount"], 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($key["qtypr"], 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($key["qtypo"], 0, ".", ",") ?></td>
											<td><?php echo $key["statuspr"] ?></td>
											<td><?php echo $key["madeuser"] ?></td>
											</tr>
										<?php endforeach ?>
									<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
	$('#loadbtn').on("click", function(e) {
		window.location.href = "<?php echo base_url('reporting/bookpr') ?>?date1=" + $('#date1').val() + "&date2=" + $('#date2').val() + "&status=" + $('#status').val() + "";
	});
	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + today.getDate();
		if ($("#date2").val() == '') {
			$("#date2").val(date);
		}
		date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-01';
		if ($("#date1").val() == '') {
			$("#date1").val(date);
		}
	});
</script>