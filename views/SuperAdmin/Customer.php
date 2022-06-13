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
				<div class="row mb-3">
					<div class="col-4">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Pencarian</label>
							<div class="input-group">
								<div class="col-4">
									<select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
										<option value="codepo">Code Customer</option>
										<option value="namecust">Nama Customer</option>
										<option value="Type Customer">Type Customer</option>
									</select>
								</div>
								<div class="col-8">
									<input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Filter">
								</div>
							</div>
						</div>
					</div>
					<div class="col-1"></div>
					<div class="col-7">
						<div class="row">
							<div class="col-3">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Status</label>
									<select class="form-select" id="statuspo" aria-label="Default select example">
										<option value="">Pilih Customer</option>
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
									</select>
								</div>
							</div>
							<div class="col-3 mt-3">
								<p></p>
								<a href="#" class="btn btn-primary" onclick="loaddata()">Terapkan</a>
							</div>
						</div>

					</div>
				</div>
				<table id="table-user" class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Code Customer</th>
							<th>Nama Customer</th>
							<th>Type Customer</th>
							<th>No. Telepon</th>
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
										<td style="text-align:left;"><?php echo $key["namecust"] ?></td>
										<td><?php echo $key["typecust"] ?></td>
										<td><?php echo $key["phonecust"] ?></td>
										<td style="text-align:left;"><?php echo $key["addresscust"] ?></td>
										<?php if ($key["status"] == "1") : ?>
											<td>Aktif</td>
										<?php else : ?>
											<td>Tidak Aktif</td>
										<?php endif ?>
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