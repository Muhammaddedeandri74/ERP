	<?php
	$namerole = array();
	$role = array();
	$active = 0;
	$noactive = 0;
	$activeitem = 0;
	$noactiveitem = 0;
	$activewarehouse = 0;
	$noactivewarehouse = 0;
	$activesupplier = 0;
	$noactivesupplier = 0;
	$activecustomer = 0;
	$noactivecustomer = 0;
	foreach ($data as $key) {

		if ($key["isactive"] == 0) {
			$noactive = $noactive + 1;
		} else {
			$active = $active + 1;
		}



		if (!in_array($key["namerole"], $namerole, true)) {
			array_push($namerole, $key["namerole"]);
		}
	}

	foreach ($data1 as $key) {

		if ($key["status"] == 0) {
			$noactiveitem = $noactiveitem + 1;
		} else {
			$activeitem = $activeitem + 1;
		}
	}

	foreach ($data2 as $key) {

		if ($key["isactive"] == 0) {
			$noactivewarehouse = $noactivewarehouse + 1;
		} else {
			$activewarehouse = $activewarehouse + 1;
		}
	}


	foreach ($data3 as $key) {

		if ($key["isactive"] == 0) {
			$noactivesupplier = $noactivesupplier + 1;
		} else {
			$activesupplier = $activesupplier + 1;
		}
	}


	foreach ($data4 as $key) {

		if ($key["isactive"] == 0) {
			$noactivecustomer = $noactivecustomer + 1;
		} else {
			$activecustomer = $activecustomer + 1;
		}
	}

	
	?>

	<div class="container-xxl bays mx-5 py-5 px-4" style="background: #fdfdfd; border-radius: 10px">
		<h1 style="margin-left: 20px;  text-transform: uppercase;">Overview</h1>
		<div class="row px-4">
			<div class="col">
				<div class="containerx">
					<a href="<?php echo base_url('SuperAdminControler/user') ?>"><img src="<?php echo base_url('assets/img/Group 654@2x.png') ?>"></a>
					<div class="top-left">
						<p><b><?php echo $active ?> Pengguna</b></p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="containerx">
					<a href="<?php echo base_url('SuperAdminControler/item') ?>"><img src="<?php echo base_url('assets/img/Group 653@2x.png') ?>"></a>
					<div class="top-left">
						<p><b><?php echo $activeitem ?> Product</b></p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="containerx">
					<a href="<?php echo base_url('SuperAdminControler/warehouse') ?>"><img src="<?php echo base_url('assets/img/Group 650x.png') ?>"></a>
					<div class="top-left">
						<p><b><?php echo $activewarehouse ?> Warehouse</b></p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="containerx">
					<a href="<?php echo base_url('SuperAdminControler/supplier') ?>"><img src="<?php echo base_url('assets/img/Supp_ilu@2x.png') ?>"></a>
					<div class="top-left">
						<p><b><?php echo $activesupplier ?> Supplier</b></p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="containerx">
					<a href="<?php echo base_url('SuperAdminControler/customer') ?>"><img src="<?php echo base_url('assets/img/Group 651x.png') ?>"></a>

					<div class="top-left">
						<p><b><?php echo $activecustomer ?> Customer</b></p>
					</div>
				</div>
			</div>
		</div>

		<div class="containter-xxl px-4">
			<div class="row mt-5" ;>
				<div class="col-5 bays" style="height:35vh ; background: white ; border-radius: 10px;height: 40vh;overflow-y: scroll;">
					<div class="col-md-6">
						<p style="font-size: 20px; border-bottom: 5px solid purple ; padding-top: 2vh" class="pr-2 col">Pengguna</p>
					</div>
					<table  style="width: 100%; ">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Role</th>
							</tr>
						</thead>
						<?php foreach ($data as $key) : ?>
							<tr>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["fullname"] ?></ul>
								</td>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["namerole"] ?></ul>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>

				<div class="col-3" style=" margin-left: 10px; margin-right: 10px;  ">
					<div class="row bays mb-4" style=" margin: 5; height:17vh ; background: white ; border-radius: 10px; overflow-y: scroll;">
						<p class="fw p-3">Product</p>
						<table  style="width: 100%;">
						<thead>
							<tr>
								<th>Nama</th>
								<th>SKU</th>
							</tr>
						</thead>
						<?php foreach ($data1 as $key) : ?>
							<tr>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["nameitem"] ?></ul>
								</td>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["sku"] ?></ul>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					</div>
					<div class="row bays" style=" height:17vh ; margin: 5; background: white; border-radius: 10px ; overflow-y: scroll;">
						<p class="fw p-3">Warehouse</p>
						<table  style="width: 100%;">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Phone</th>
							</tr>
						</thead>
						<?php foreach ($data2 as $key) : ?>
							<tr>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["namecomm"] ?></ul>
								</td>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["attrib2"] ?></ul>
								</td>
							</tr>
						<?php endforeach ?>
					</table>

					</div>
				</div>

				<div class="col-3" style=" margin-left: 10px; margin-right: 10px;  ">
					<div class="row bays mb-4" style=" margin: 5; height:17vh ; background: white ; border-radius: 10px;overflow-y: scroll;">
						<p class="fw p-3">Supllier</p>
						<table  style="width: 100%;">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Phone</th>
							</tr>
						</thead>
						<?php foreach ($data3 as $key) : ?>
							<tr>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["namecomm"] ?></ul>
								</td>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["attrib2"] ?></ul>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					</div>
					<div class="row bays" style=" height:17vh ; margin: 5; background: white; border-radius: 10px ; overflow-y: scroll;">
						<p class="fw p-3">Customer</p>
						<table  style="width: 100%;">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Phone</th>
							</tr>
						</thead>
						<?php foreach ($data4 as $key) : ?>
							<tr>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["namecomm"] ?></ul>
								</td>
								<td>
									<ul class="col-12" style="color:purple;padding-left: 1px;border-bottom: 4px solid grey"><?php echo $key["attrib2"] ?></ul>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					</div>
				</div>

			</div>
		</div>
	</div>
	<br><br>