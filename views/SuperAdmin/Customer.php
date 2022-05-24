<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">List Customer</h3>
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
							<th>Code Supplier</th>
							<th>Nama Perusahaan</th>
							<th>No. Telepon</th>
							<th>Nomor Rekening</th>
							<th>Bank</th>
							<th>Beneficiary</th>
							<th>Alamat Customer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if ($data != "Not Found") { ?>
							<?php $a = 1;
							foreach ($data as $key) : ?>
								<?php foreach ($key['data'] as $kez) : ?>
									<tr>
										<td><?php echo $a++ ?></td>
										<td><?php echo $key["codecust"] ?></td>
										<td><?php echo $key["namecust"] ?></td>
										<td><?php echo $key["phonecust"] ?></td>
										<td><?php echo $kez["norekening"] ?></td>
										<td><?php echo $kez["namabank"] ?></td>
										<td><?php echo $kez["beneficiary"] ?></td>
										<td><?php echo $key["addresscust"] ?></td>
										<td><a href="<?php echo base_url('MasterDataControler/getdatacustomerbyid?id=' . base64_encode($key['idcust'])) ?>" class="btn btn-primary" style="font-size:13px;">Edit</a></td>
									</tr>
								<?php endforeach ?>
							<?php endforeach ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>