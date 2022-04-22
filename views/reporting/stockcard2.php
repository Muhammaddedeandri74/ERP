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

	<?php if ($title == 'gudang') { ?>
		<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">WAREHOUSE / STOCK</p>
	<?php } else { ?>
		<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">COUNTER / STOCK</p>
	<?php } ?>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">PRODUCT STOCK</p>
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
							<!-- <input type="text" name="cari" id="cari" placeholder="filter" placeholder="Search By name item" class="form-control" value="<?php echo $cari; ?> " /> -->
							<div class="card">
								<div class="card-body bays">
									<div class="rwo d-flex justify-content-between">
										<div class="col-3">
											<p>Dari</p>
											<input type="date" name="date1" id="date1" class="form-control datetrans" value="<?php echo $date1; ?>">
										</div>
										<div class="col-3">
											<p>Hingga</p>
											<input type="date" name="date2" id="date2" class="form-control datetrans" value="<?php echo $date2; ?>">
										</div>
										<div class="col-2-half">
											<p>Item</p>
											<input type="text" class="form-control" id="sku" name="sku" placeholder="Search" list="xitem" value="<?php echo $skus; ?>">
										</div>
										<div class="col-2-half">
											<p>Gudang</p>
											<input type="text" class="form-control" id="codewh" name="codewh" placeholder="Search" list="xwh" value="<?php echo $codewh; ?>" readonly>
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
						<div class="col-2" style="margin-top: 8vh">
							<a class="btn btn-outline-danger" onclick="printdata()"><i class="fa fa-print"></i> Cetak Data</a>
							<a class="btn btn-outline-success" id="btn_exportexcel"><i class="fa fa-file-excel-o"></i> Export Excel</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table cn">
						<thead style="background-color: #3C2E8F;color: white">
							<tr>
								<th style="width:50px">NO </th>
								<th style="width:150px">Gudang</th>
								<th style="width:50px">SKU</th>
								<th style="width:250px">Item</th>
								<th style="width:110px">Expired</th>
								<th style="width:200px">Trans NO</th>
								<th style="width:110px">Date Transaction</th>
								<th style="width:110px">Begin</th>
								<th style="width:100px">In</th>
								<th style="width:100px">Out</th>
								<th style="width:100px">Balance</th>
								<th>Deskripsi</th>
							</tr>
						</thead>
						<tbody id="xdetail">
							<?php if ($data != "Not Found") {

								$balwh = 0;
								$inwh = 0;
								$outwh = 0;
								$balsku = 0;
								$insku = 0;
								$outsku = 0;
								$bal = 0;
								$in = 0;
								$begin = 0;
								$beginsku = 0;
								$beginwh = 0;
								$out = 0;
								$idwh = '';
								$sku = '';
								$expdate = '';
								$nourut;
							?>
								<?php $a = 0;
								foreach ($data as $key) :
									if ($key["codewh"] == $codewh) :
										if ($key["sku"] == $skus) {
											if ($sku != $key["sku"] || $idwh != $key["codewh"] || $expdate != $key["expdate"]) {
												if ($expdate != '') {
								?>
													<tr style="background:#aa9eaa; cursor: pointer;">
														<td></td>
														<td><?php echo $idwh ?></td>
														<td><?php echo $sku ?></td>
														<td></td>
														<td><?php echo $expdate; ?></td>
														<td></td>
														<td></td>
														<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
														<td><?php echo $key["descinfo"] ?></td>
													</tr>
												<?php
												}
												$bal = 0;
												$begin = 0;
												$in = 0;
												$out = 0;
												$nourut = 0;
											}

											if ($sku != $key["sku"] || $idwh != $key["codewh"]) {
												if ($sku != '') {
												?>
													<tr style="background:#889e88; cursor: pointer;">
														<td></td>
														<td><?php echo $idwh ?></td>
														<td><?php echo $sku ?></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
														<td><?php echo $key["descinfo"] ?></td>
													</tr>
												<?php
												}
												$balsku = 0;
												$beginsku = 0;
												$insku = 0;
												$outsku = 0;
												$nourut = 0;
											}
											if ($idwh != $key["codewh"]) {
												if ($idwh != '') {
												?>
													<tr style="background:#669e66; cursor: pointer;">
														<td></td>
														<td><?php echo $idwh ?></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
														<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
														<td><?php echo $key["descinfo"] ?></td>
													</tr>
											<?php
												}
												$balwh = 0;
												$beginwh = 0;
												$inwh = 0;
												$outwh = 0;
												$nourut = 0;
											}
											$nourut++;
											$sku = $key["sku"];
											$idwh = $key["codewh"];
											$expdate = $key["expdate"];

											$balwh += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
											$inwh += $key["qtyin"];
											$outwh += $key["qtyout"];
											$balsku += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
											$insku += $key["qtyin"];
											$outsku += $key["qtyout"];
											$begin = $bal;
											$bal += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
											$in += $key["qtyin"];
											$out += $key["qtyout"];
											$beginwh = 0;
											$beginsku = $balsku;


											?>
											<?php if ($a % 2 == 0) { ?>
												<tr style="cursor: pointer;">
												<?php } else { ?>
												<tr style="background:#eeeeee; cursor: pointer;">
												<?php } ?>
												<td style="text-align:right"><?php echo $nourut;
																				$a++; ?></td>
												<td><?php echo $key["namewh"] ?></td>
												<td><?php echo $key["sku"] ?></td>
												<td><?php echo $key["nameitem"] ?></td>
												<td><?php echo $key["expdate"] ?></td>
												<td><?php echo $key["codetrans"] ?></td>
												<td><?php echo $key["datetrans"] ?></td>
												<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($key["qtyin"], 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($key["qtyout"], 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
												<td><?php echo $key["descinfo"] ?></td>
												</tr>



												<?php
												$begin = $bal;
											} else if ($skus == "") {

												if ($sku != $key["sku"] || $idwh != $key["codewh"] || $expdate != $key["expdate"]) {
													if ($expdate != '') { ?>
														<tr style="background:#aa9eaa; cursor: pointer;">
															<td></td>
															<td><?php echo $idwh ?></td>
															<td><?php echo $sku ?></td>
															<td></td>
															<td><?php echo $expdate; ?></td>
															<td></td>
															<td></td>
															<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
															<td><?php echo $key["descinfo"] ?></td>
														</tr>
													<?php
													}
													$bal = 0;
													$begin = 0;
													$in = 0;
													$out = 0;
													$nourut = 0;
												}

												if ($sku != $key["sku"] || $idwh != $key["codewh"]) {
													if ($sku != '') {
													?>
														<tr style="background:#889e88; cursor: pointer;">
															<td></td>
															<td><?php echo $idwh ?></td>
															<td><?php echo $sku ?></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
															<td><?php echo $key["descinfo"] ?></td>
														</tr>
													<?php
													}
													$balsku = 0;
													$beginsku = 0;
													$insku = 0;
													$outsku = 0;
													$nourut = 0;
												}
												if ($idwh != $key["codewh"]) {
													if ($idwh != '') {
													?>
														<tr style="background:#669e66; cursor: pointer;">
															<td></td>
															<td><?php echo $idwh ?></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
															<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
															<td><?php echo $key["descinfo"] ?></td>
														</tr>
												<?php
													}
													$balwh = 0;
													$beginwh = 0;
													$inwh = 0;
													$outwh = 0;
													$nourut = 0;
												}
												$nourut++;
												$sku = $key["sku"];
												$idwh = $key["codewh"];
												$expdate = $key["expdate"];
												$balwh += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
												$inwh += $key["qtyin"];
												$outwh += $key["qtyout"];
												$balsku += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
												$insku += $key["qtyin"];
												$outsku += $key["qtyout"];
												$begin = $bal;
												$bal += $key["beginqty"] + $key["qtyin"] - $key["qtyout"];
												$in += $key["qtyin"];
												$out += $key["qtyout"];
												$beginwh = $balwh;
												$beginsku = $balsku;


												?>
												<?php if ($a % 2 == 0) { ?>
													<tr style="cursor: pointer;">
													<?php } else { ?>
													<tr style="background:#eeeeee; cursor: pointer;">
													<?php } ?>
													<td style="text-align:right"><?php echo $nourut;
																					$a++; ?></td>
													<td><?php echo $key["namewh"] ?></td>
													<td><?php echo $key["sku"] ?></td>
													<td><?php echo $key["nameitem"] ?></td>
													<td><?php echo $key["expdate"] ?></td>
													<td><?php echo $key["codetrans"] ?></td>
													<td><?php echo $key["datetrans"] ?></td>
													<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
													<td style="text-align:right"><?php echo number_format($key["qtyin"], 0, ".", ",") ?></td>
													<td style="text-align:right"><?php echo number_format($key["qtyout"], 0, ".", ",") ?></td>
													<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
													<td><?php echo $key["descinfo"] ?></td>
													</tr>



											<?php
												$begin = $bal;
											};

										endif;

									endforeach;
									if ($expdate != '') {
											?>
											<tr style="background:#aa9eaa; cursor: pointer;">
												<td></td>
												<td><?php echo $idwh ?></td>
												<td><?php echo $sku ?></td>
												<td></td>
												<td><?php echo $expdate; ?></td>
												<td></td>
												<td></td>
												<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
												<td><?php echo $key["descinfo"] ?></td>
											</tr>
										<?php
									}
									if ($sku != '') {
										?>
											<tr style="background:#889e88; cursor: pointer;">
												<td></td>
												<td><?php echo $idwh ?></td>
												<td><?php echo $sku ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
												<td><?php echo $key["descinfo"] ?></td>
											</tr>
										<?php
									}
									if ($idwh != '') {
										?>
											<tr style="background:#669e66; cursor: pointer;">
												<td></td>
												<td><?php echo $idwh ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
												<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
												<td><?php echo $key["descinfo"] ?></td>
											</tr>
										<?php
									}

										?>
									<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<pre id="result"></pre>
<div class="excel" id="excel">
</div>
<div class="data" id="data">
	<table class="table table-striped table-hover">
		<thead style="background: purple">
			<tr style="border: solid;">
				<th style="width:50px">NO </th>
				<th style="width:150px">Gudang</th>
				<th style="width:50px">SKU</th>
				<th style="width:250px">Item</th>
				<th style="width:110px">Expired</th>
				<th style="width:200px">Trans NO</th>
				<th style="width:110px">Date</th>
				<th style="width:110px">Begin</th>
				<th style="width:100px">In</th>
				<th style="width:100px">Out</th>
				<th style="width:100px">Balance</th>
				<th>Deskripsi</th>
			</tr>
		</thead>
		<tbody id="prt">
			<?php if ($data != "Not Found") {

				$balwh = 0;
				$inwh = 0;
				$outwh = 0;
				$balsku = 0;
				$insku = 0;
				$outsku = 0;
				$bal = 0;
				$in = 0;
				$begin = 0;
				$beginsku = 0;
				$beginwh = 0;
				$out = 0;
				$idwh = '';
				$sku = '';
				$expdate = '';
				$nourut;
			?>
				<?php $a = 0;
				foreach ($data as $key) :
					if ($key["codewh"] == $codewh) :
						if ($key["sku"] == $skus) {
							if ($sku != $key["sku"] || $idwh != $key["codewh"] || $expdate != $key["expdate"]) {
								if ($expdate != '') {
				?>
									<tr style="background:#aa9eaa; cursor: pointer;">
										<td></td>
										<td><?php echo $idwh ?></td>
										<td><?php echo $sku ?></td>
										<td></td>
										<td><?php echo $expdate; ?></td>
										<td></td>
										<td></td>
										<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
										<td><?php echo $key["descinfo"] ?></td>
									</tr>
								<?php
								}
								$bal = 0;
								$begin = 0;
								$in = 0;
								$out = 0;
								$nourut = 0;
							}

							if ($sku != $key["sku"] || $idwh != $key["codewh"]) {
								if ($sku != '') {
								?>
									<tr style="background:#889e88; cursor: pointer;">
										<td></td>
										<td><?php echo $idwh ?></td>
										<td><?php echo $sku ?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
										<td><?php echo $key["descinfo"] ?></td>
									</tr>
								<?php
								}
								$balsku = 0;
								$beginsku = 0;
								$insku = 0;
								$outsku = 0;
								$nourut = 0;
							}
							if ($idwh != $key["codewh"]) {
								if ($idwh != '') {
								?>
									<tr style="background:#669e66; cursor: pointer;">
										<td></td>
										<td><?php echo $idwh ?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
										<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
										<td><?php echo $key["descinfo"] ?></td>
									</tr>
							<?php
								}
								$balwh = 0;
								$beginwh = 0;
								$inwh = 0;
								$outwh = 0;
								$nourut = 0;
							}
							$nourut++;
							$sku = $key["sku"];
							$idwh = $key["codewh"];
							$expdate = $key["expdate"];
							$balwh += $key["qtyin"] - $key["qtyout"];
							$inwh += $key["qtyin"];
							$outwh += $key["qtyout"];
							$balsku += $key["qtyin"] - $key["qtyout"];
							$insku += $key["qtyin"];
							$outsku += $key["qtyout"];
							$bal += $key["qtyin"] - $key["qtyout"];
							$in += $key["qtyin"];
							$out += $key["qtyout"];
							$beginwh = $balwh;
							$beginsku = $balsku;

							?>
							<?php if ($a % 2 == 0) { ?>
								<tr style="cursor: pointer;">
								<?php } else { ?>
								<tr style="background:#eeeeee; cursor: pointer;">
								<?php } ?>
								<td style="text-align:right"><?php echo $nourut;
																$a++; ?></td>
								<td><?php echo $key["namewh"] ?></td>
								<td><?php echo $key["sku"] ?></td>
								<td><?php echo $key["nameitem"] ?></td>
								<td><?php echo $key["expdate"] ?></td>
								<td><?php echo $key["codetrans"] ?></td>
								<td><?php echo $key["datetrans"] ?></td>
								<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($key["qtyin"], 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($key["qtyout"], 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
								<td><?php echo $key["descinfo"] ?></td>
								</tr>



								<?php
								$begin = $bal;
							} else if ($skus == "") {

								if ($sku != $key["sku"] || $idwh != $key["codewh"] || $expdate != $key["expdate"]) {
									if ($expdate != '') { ?>
										<tr style="background:#aa9eaa; cursor: pointer;">
											<td></td>
											<td><?php echo $idwh ?></td>
											<td><?php echo $sku ?></td>
											<td></td>
											<td><?php echo $expdate; ?></td>
											<td></td>
											<td></td>
											<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
											<td><?php echo $key["descinfo"] ?></td>
										</tr>
									<?php
									}
									$bal = 0;
									$begin = 0;
									$in = 0;
									$out = 0;
									$nourut = 0;
								}

								if ($sku != $key["sku"] || $idwh != $key["codewh"]) {
									if ($sku != '') {
									?>
										<tr style="background:#889e88; cursor: pointer;">
											<td></td>
											<td><?php echo $idwh ?></td>
											<td><?php echo $sku ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
											<td><?php echo $key["descinfo"] ?></td>
										</tr>
									<?php
									}
									$balsku = 0;
									$beginsku = 0;
									$insku = 0;
									$outsku = 0;
									$nourut = 0;
								}
								if ($idwh != $key["codewh"]) {
									if ($idwh != '') {
									?>
										<tr style="background:#669e66; cursor: pointer;">
											<td></td>
											<td><?php echo $idwh ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
											<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
											<td><?php echo $key["descinfo"] ?></td>
										</tr>
								<?php
									}
									$balwh = 0;
									$beginwh = 0;
									$inwh = 0;
									$outwh = 0;
									$nourut = 0;
								}
								$nourut++;
								$sku = $key["sku"];
								$idwh = $key["codewh"];
								$expdate = $key["expdate"];
								$balwh += $key["qtyin"] - $key["qtyout"];
								$inwh += $key["qtyin"];
								$outwh += $key["qtyout"];
								$balsku += $key["qtyin"] - $key["qtyout"];
								$insku += $key["qtyin"];
								$outsku += $key["qtyout"];
								$bal += $key["qtyin"] - $key["qtyout"];
								$in += $key["qtyin"];
								$out += $key["qtyout"];
								$beginwh = $balwh;
								$beginsku = $balsku;

								?>
								<?php if ($a % 2 == 0) { ?>
									<tr style="cursor: pointer;">
									<?php } else { ?>
									<tr style="background:#eeeeee; cursor: pointer;">
									<?php } ?>
									<td style="text-align:right"><?php echo $nourut;
																	$a++; ?></td>
									<td><?php echo $key["namewh"] ?></td>
									<td><?php echo $key["sku"] ?></td>
									<td><?php echo $key["nameitem"] ?></td>
									<td><?php echo $key["expdate"] ?></td>
									<td><?php echo $key["codetrans"] ?></td>
									<td><?php echo $key["datetrans"] ?></td>
									<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
									<td style="text-align:right"><?php echo number_format($key["qtyin"], 0, ".", ",") ?></td>
									<td style="text-align:right"><?php echo number_format($key["qtyout"], 0, ".", ",") ?></td>
									<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
									<td><?php echo $key["descinfo"] ?></td>
									</tr>



							<?php
								$begin = $bal;
							};

						endif;

					endforeach;
					if ($expdate != '') {
							?>
							<tr style="background:#aa9eaa; cursor: pointer;">
								<td></td>
								<td><?php echo $idwh ?></td>
								<td><?php echo $sku ?></td>
								<td></td>
								<td><?php echo $expdate; ?></td>
								<td></td>
								<td></td>
								<td style="text-align:right"><?php echo number_format($begin, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($in, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($out, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($bal, 0, ".", ",") ?></td>
								<td><?php echo $key["descinfo"] ?></td>
							</tr>
						<?php
					}
					if ($sku != '') {
						?>
							<tr style="background:#889e88; cursor: pointer;">
								<td></td>
								<td><?php echo $idwh ?></td>
								<td><?php echo $sku ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="text-align:right"><?php echo number_format($beginsku, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($insku, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($outsku, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($balsku, 0, ".", ",") ?></td>
								<td><?php echo $key["descinfo"] ?></td>
							</tr>
						<?php
					}
					if ($idwh != '') {
						?>
							<tr style="background:#669e66; cursor: pointer;">
								<td></td>
								<td><?php echo $idwh ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="text-align:right"><?php echo number_format($beginwh, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($inwh, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($outwh, 0, ".", ",") ?></td>
								<td style="text-align:right"><?php echo number_format($balwh, 0, ".", ",") ?></td>
								<td><?php echo $key["descinfo"] ?></td>
							</tr>
						<?php
					}

						?>
					<?php } ?>
		</tbody>
	</table>
</div>

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
	$('#data').hide();
	$('#loadbtn').on("click", function(e) {
		var title = <?php echo json_encode($title) ?>;
		if (title == 'gudang') {
			window.location.href = "<?php echo base_url('reporting/stockcard2') ?>?date1=" + $('#date1').val() + "&date2=" + $('#date2').val() + "&sku=" + $('#sku').val() + "&codewh=" + $('#codewh').val() + "";
		} else {
			window.location.href = "<?php echo base_url('reporting/stockcard3') ?>?date1=" + $('#date1').val() + "&date2=" + $('#date2').val() + "&sku=" + $('#sku').val() + "&codewh=" + $('#codewh').val() + "";
		}

	});
	$(document).ready(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
		if ($("#date2").val() == '') {
			$("#date2").val(date);
		}
		date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-01';
		if ($("#date1").val() == '') {
			$("#date1").val(date);
		}
	});

	function printdata() {
		var printContents = document.getElementById('data').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}

	$("#btn_exportexcel").click(function(e) {
		let file = new Blob([$('.data').html()], {
			type: "application/vnd.ms-excel"
		});
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: "Stock.xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});
</script>