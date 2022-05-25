<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">List Gudang</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<div class="card-body">
			<label for="" class="form-label fs-3">List Gudang</label>
			<table id="table-user" class="table table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Code Gudang</th>
						<th>Nama Gudang</th>
						<th>Alamat Gudang</th>
						<th>Telepon Gudang</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php if ($data != "Not Found") { ?>
						<?php $a = 1;
						foreach ($data as $key) : ?>
							<tr>
								<td><?php echo $a++ ?></td>
								<td><?php echo $key["codewarehouse"] ?></td>
								<td><?php echo $key["namewarehouse"] ?></td>
								<td><?php echo $key["addresswarehouse"] ?></td>
								<td><?php echo $key["phonewarehouse"] ?></td>
								<td><a href="<?php echo base_url('MasterDataControler/getdatawarehousebyid?id=' . base64_encode($key['codewarehouse'])) ?>" class="btn btn-outline-primary">Edit</a>
							</tr>
						<?php endforeach ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>