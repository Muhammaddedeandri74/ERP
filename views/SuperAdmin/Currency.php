<div class="container-xxl ml-5" style="width: 96%;">
	<div class=" row">
		<div class="col py-3" style="border-radius: 5px;">
			<h1 style="margin-top: 30px; margin-left: 20px;text-transform: uppercase;">Currency</h1>

			<?php
			// $namerole = array();
			$role = array();
			$active = 0;
			$noactive = 0;
			if ($data != "Not Found") {
				foreach ($data as $key) {

					if ($key["isactive"] == 0) {
						$noactive = $noactive + 1;
					} else {
						$active = $active + 1;
					}
				}
			}
			?>

			<div class="row">
				<div class="col-9">
					<div style="box-shadow: 0.5px 2px #bbc6cb;background: #d5a6bd ; height: 25vh; margin-left:20px;margin-right:10px ;margin-top: 20px; padding: 10px">
						<div class="row">
							<div class="col" style="margin-top: 10px; margin-left: 30px">
								<div class="row">
									<p><b style="font-size: 25px">Halo, <?php echo $fullname ?> !</b></p>
									<p>Anda bisa mengatur (Tambah, Hapus, Aktif, non-Aktif) Currency untuk sistem ERP disini.</p>
								</div>
								<div class="row" style="margin-top: 20px">
									<div class="col">
										<div class="row">
											<p><b>Currency Aktif</b></p>
										</div>
										<div class="row">
											<p><?php echo $active ?> Currency</p>
										</div>
									</div>
									<div class="col">
										<div class="row">
											<p><b>Currency Non-Aktif</b></p>
										</div>
										<div class="row">
											<p><?php echo $noactive ?> Currency</p>
										</div>
									</div>
									<div class="col">
										<div class="row">
											<p><b>Total Currency</b></p>
										</div>
										<div class="row">
											<p><?php echo $active + $noactive ?> Currency</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<img src="<?php echo base_url('assets/img/logouser.png') ?>" style="float: right; margin-top: 20px;margin-right: 50px">
							</div>
						</div>
					</div>
				</div>
				<div class="col-2">
					<img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
				</div>
			</div>
			<div class="row" style=" margin-left:20px;margin-right:10px;margin-top: 20px">
				<div class="col-9">
					<div class="row">
						<div class="col">
							<p class="col-4 pt-3" style="border-bottom: 5px solid purple; font-size: 22px">List Currency</p>
						</div>
						<div class="col pt-3">
							<a href="<?php echo base_url('SuperAdminControler/addcurrency') ?>" class="btn mt-2" style="float :right;border:1px solid purple;color:purple;">+ Tambah Currency</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
				<div class="col-9 bays" style="background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 10px;border-radius: 5px">
					<table style="width: 100% ; margin-top: 20px" class="table">
						<thead>
							<tr>
								<th style="color: purple">NO </th>
								<th style="color: purple">ID Currency</th>
								<th style="color: purple">Name Currecy</th>
								<th style="color: purple">Kurs Currency</th>
								<th style="color: purple">Status</th>
								<th style="color: purple">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data != "Not Found") { ?>
								<?php $a = 1;
								foreach ($data as $key) : ?>
									<tr>
										<td style="color: purple"><?php echo $a++ ?></td>
										<td style="color: purple"><?php echo $key["codecomm"] ?></td>
										<td style="color: purple"><?php echo $key["namecomm"] ?></td>
										<td style="color: purple"><?php echo str_replace(".0000", "", $key["attrib7"]) ?></td>
										<?php if ($key['isactive'] == "1") { ?>
											<td style="color: purple">Active</td>
										<?php } else { ?>
											<td style="color: purple">No-Active</td>
										<?php } ?>
										<td><a href="<?php echo base_url('MasterDataControler/getdatacurrencybyid?id=' . base64_encode($key['codecomm'])) ?>" class="btn btn-secondary">Edit</a>
									</tr>
								<?php endforeach ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- <div class="col-2" style="box-shadow: 0.5px 2px #bbc6cb;background: white ; border: 1px solid ; border-color: #eeeeee ; height: 50vh; margin-left:80px;  margin-bottom: 10px">
				<table style="width: 100% ; margin-top: 20px" class="table">
					<thead>
						<tr>
							<th style="color: purple">Role User</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($namerole as $key) : ?>
							<tr>
								<td><?php echo $key ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>-->
			</div>
		</div>
	</div>
</div>