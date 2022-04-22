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
<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">WAREHOUSE / Stock Balance Book</p>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">BALANCE STOCK</p>
</div>
<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-body ml-4">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="card bay p-4" width="80%">
				<div class="card-header border-0 bg-white">
					<div class="row pt-4 d-flex justify-content-between">
						<div class="col-6" style="margin-left: 1vw;">
							<input type="text" name="cari" id="cari" placeholder="filter" class="form-control" value="<?php echo $cari; ?> " />
							<div class="card">
								<div class="card-body bays">
									<div class="rwo d-flex justify-content-between">
										<!-- <div class="col-3">
											<p>Dari</p>
											<input type="date" name="date1" id="date1" class="form-control datetrans" value="<?php echo $date1; ?>">
										</div>
										<div class="col-3">
											<p>Hingga</p>
											<input type="date" name="date2" id="date2" class="form-control datetrans" value="<?php echo $date2; ?>">
										</div> -->
										<div class="col-4">
											<p>Item</p>
											<input type="text" class="form-control" id="sku" name="sku" placeholder="Search" list="xitem" value="<?php echo $sku; ?>">
										</div>
										<div class="col-4">
											<p>Gudang</p>
											<input type="text" class="form-control" id="codewh" name="codewh" placeholder="Search" list="xwh" value="<?php echo $codewh; ?>">
										</div>
										<div class="col-3">

										</div>
										<div class="col-1" style="padding-top: 4.2vh;">
											<a style="text-decoration: none" id="loadbtn" class="btn btn-outline-primary">Load</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-2">
						</div>
						<div class="col-3" style="margin-top: 11vh">
							<a class="btn btn-outline-success"><i class="fa fa-print"></i> Cetak Data</a>
							<a class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
							<a class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table cn">
						<thead style="background-color: #3C2E8F;color: white">
							<tr>
								<th style="width:50px">NO </th>
								<th style="width:50px">SKU</th>
								<th style="">Item</th>
								<th style="width:200px">Gudang</th>
								<th style="width:110px">Expired</th>
								<th style="width:100px">Balance</th>
								<th style="width:150px">Status</th>
							</tr>
						</thead>
						<tbody id="xdetail">
							<?php if ($data != "Not Found") {
								$idwh = '';
								$sku = '';
								$expdate = '';
								$nourut = 0;
							?>
								<?php $a = 0;
								foreach ($data as $key) :
									if ($sku != $key["sku"]) {
										$nourut++;
								?>
										<tr style="background:#aa9eaa; cursor: pointer;">
											<td style="text-align:right"><?php echo $nourut ?></td>
											<td><?php echo $key["sku"] ?></td>
											<td><?php echo $key["nameitem"] ?></td>
											<td></td>
											<td></td>
											<td style="text-align:right"><?php echo number_format($key["endqtya"], 0, ".", ",") ?></td>
											<td><?php
												if ($key["endqtya"] <= $key["minstock"]) {
													echo 'Stock Minimun';
												}
												if ($key["endqtya"] >= $key["maxstock"]) {
													echo 'Stock Maksimum';
												}
												?></td>
										</tr>
									<?php
									}
									if ($sku != $key["sku"] || $idwh != $key["idwh"]) { ?>
										<tr style="background:#889e88; cursor: pointer;">
											<td style="text-align:right"></td>
											<td></td>
											<td></td>
											<td><?php echo $key["namewh"] ?></td>
											<td></td>
											<td style="text-align:right"><?php echo number_format($key["endqtyw"], 0, ".", ",") ?></td>
											<td><?php
												if ($key["endqtyw"] <= $key["minstock"]) {
													echo 'Stock Minimun';
												}
												if ($key["endqtyw"] >= $key["maxstock"]) {
													echo 'Stock Maksimum';
												}
												?></td>
										</tr>
									<?php
									}
									if ($sku != $key["sku"] || $idwh != $key["idwh"] || $expdate != $key["expdate"]) { ?>
										<tr style="background:#669e66; cursor: pointer;">
											<td style="text-align:right"></td>
											<td></td>
											<td></td>
											<td></td>
											<td><?php echo $key["expdate"] ?></td>
											<td style="text-align:right"><?php echo number_format($key["endqtye"], 0, ".", ",") ?></td>
											<td><?php
												if ($key["expdate"] <= $datex) {
													echo 'Expired';
												} else if ($key["endqtye"] <= $key["minstock"]) {
													echo 'Stock Minimun';
												} else if ($key["endqtye"] >= $key["maxstock"]) {
													echo 'Stock Maksimum';
												}
												?></td>
										</tr>
								<?php
									}
									$sku = $key["sku"];
									$idwh = $key["idwh"];
									$expdate = $key["expdate"];
								endforeach;
								?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class=" isi">
	<div class="row" style=" margin-left:20px;margin-right:30px">
		<div class="col" style="box-shadow: 0.5px 2px #bbc6cb;background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 10px">
			<div style="background: #eeeeee; height: 10vh; width: *">
				<div class="d-flex" style="padding: 10px">
					<div>
						<p style="margin: 0px;width:150px">Item</p>
						<input type="text" class="form-control" id="sku" name="sku" placeholder="Search" list="xitem" value="<?php echo $sku; ?>">
					</div>
					<div>
						<p style="margin: 0px;width:150px">Gudang</p>
						<input type="text" class="form-control" id="codewh" name="codewh" placeholder="Search" list="xwh" value="<?php echo $codewh; ?>">
					</div>
					<div>
						<p style="margin: 0px;width:400px">Filter</p>
						<input type="text" name="cari" id="cari" class="form-control" value="<?php echo $cari; ?>" />
					</div>
					<div class="d-flex align-items-center" style="justify-content: space-between; width: 100%;padding: 10px">
						<button style="margin-top:14px" class="btn btn-outline-primary" id="loadbtn">Load</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 2px">

		<div class="col" style="box-shadow: 0.5px 2px #bbc6cb;background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 2px">
			<table style="width: 100% ; margin-top: 5px" class="table">
				<thead>
					<tr>
						<th style="color: purple;width:50px">NO </th>
						<th style="color: purple;width:50px">SKU</th>
						<th style="color: purple;width:*">Item</th>
						<th style="color: purple;width:200px">Gudang</th>
						<th style="color: purple;width:110px">Expired</th>
						<th style="color: purple;width:100px">Balance</th>
						<th style="color: purple;width:150px">Status</th>
					</tr>
				</thead>
				<tbody id="xdetail">
					<?php if ($data != "Not Found") {
						$idwh = '';
						$sku = '';
						$expdate = '';
						$nourut = 0;
					?>
						<?php $a = 0;
						foreach ($data as $key) :
							if ($sku != $key["sku"]) {
								$nourut++;
						?>
								<tr style="background:#aa9eaa; cursor: pointer;">
									<td style="text-align:right"><?php echo $nourut ?></td>
									<td><?php echo $key["sku"] ?></td>
									<td><?php echo $key["nameitem"] ?></td>
									<td></td>
									<td></td>
									<td style="text-align:right"><?php echo number_format($key["endqtya"], 0, ".", ",") ?></td>
									<td><?php
										if ($key["endqtya"] <= $key["minstock"]) {
											echo 'Stock Minimun';
										}
										if ($key["endqtya"] >= $key["maxstock"]) {
											echo 'Stock Maksimum';
										}
										?></td>
								</tr>
							<?php
							}
							if ($sku != $key["sku"] || $idwh != $key["idwh"]) { ?>
								<tr style="background:#889e88; cursor: pointer;">
									<td style="text-align:right"></td>
									<td></td>
									<td></td>
									<td><?php echo $key["namewh"] ?></td>
									<td></td>
									<td style="text-align:right"><?php echo number_format($key["endqtyw"], 0, ".", ",") ?></td>
									<td><?php
										if ($key["endqtyw"] <= $key["minstock"]) {
											echo 'Stock Minimun';
										}
										if ($key["endqtyw"] >= $key["maxstock"]) {
											echo 'Stock Maksimum';
										}
										?></td>
								</tr>
							<?php
							}
							if ($sku != $key["sku"] || $idwh != $key["idwh"] || $expdate != $key["expdate"]) { ?>
								<tr style="background:#669e66; cursor: pointer;">
									<td style="text-align:right"></td>
									<td></td>
									<td></td>
									<td></td>
									<td><?php echo $key["expdate"] ?></td>
									<td style="text-align:right"><?php echo number_format($key["endqtye"], 0, ".", ",") ?></td>
									<td><?php
										if ($key["expdate"] <= $datex) {
											echo 'Expired';
										} else if ($key["endqtye"] <= $key["minstock"]) {
											echo 'Stock Minimun';
										} else if ($key["endqtye"] >= $key["maxstock"]) {
											echo 'Stock Maksimum';
										}
										?></td>
								</tr>
						<?php
							}
							$sku = $key["sku"];
							$idwh = $key["idwh"];
							$expdate = $key["expdate"];
						endforeach;
						?>
					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</div> -->
<datalist id="xitem">
	<!--<option value=" " data-sku="">-</option>-->
	<?php
	foreach ($item as $key) {
	?>
		<option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["priceitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
	<?php } ?>
</datalist>

<datalist id="xwh">
	<!--<option value=" " data-idwh="">-</option>-->
	<?php
	foreach ($warehouse as $key) {
	?>
		<option value="<?php echo $key["codecomm"]; ?>" namewh="<?php echo $key["namecomm"]; ?>" data-idwh="<?php echo $key["idcomm"]; ?>" data-namewh="<?php echo $key["namecomm"]; ?>" data-codewh="<?php echo $key["codecomm"]; ?>"><?php echo $key["codecomm"] . ' - ' . $key["namecomm"]; ?></option>
	<?php } ?>
</datalist>

<script language="javascript">
	$('#loadbtn').on("click", function(e) {
		window.location.href = "<?php echo base_url('reporting/stockbook') ?>?cari=" + $('#cari').val() + "&sku=" + $('#sku').val() + "&codewh=" + $('#codewh').val() + "";
	});
</script>