<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">List User</h3>
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
				<table id="table-user" class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Nama User</th>
							<th>Email</th>
							<th>Warehouse</th>
							<th>Hak Akses/Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $no = 1 ?>
						<?php if ($data != "Not Found") : ?>
							<?php foreach ($data as $key) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key["username"] ?></td>
									<td><?php echo $key["email"] ?></td>
									<td><?php echo $key["namewarehouse"] ?></td>
									<td><?php echo $key["namerole"] ?></td>
									<td><a href="<?php echo base_url('MasterDataControler/getdatauserbyid?id=' . base64_encode($key['iduser'])) ?>" class="btn btn-primary">Edit</a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>