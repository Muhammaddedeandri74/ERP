<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">List Bundling</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('MasterDataControler/adduser') ?>" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<label for="" class="form-label fs-3">List Bundling</label>
				<table id="table-user" class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Nama Item</th>
							<th>Item Group</th>
							<th>SKU</th>
							<th>Spesifikasi</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $no = 1; ?>
						<?php if ($data != "Not Found") : ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key["nameitem"] ?></td>
									<td><?php echo $key["itemgroup"] ?></td>
									<td><?php echo $key["sku"] ?></td>
									<td><?php echo $key["spec"] ?></td>
									<td><?php echo number_format($key['harga']) ?></td>
									<?php if ($key["status"] == 1) : ?>
										<td>Active</td>
									<?php else : ?>
										<td>Non Active</td>
									<?php endif ?>
									<td><a href="" class="btn btn-primary">Edit</a></td>

								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>