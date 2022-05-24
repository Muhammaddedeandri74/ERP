<div class="header px-4 pt-2" style="height: 196px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
			<li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
		</ol>
		<h3 class="text-white">Register Produk</h3>
	</nav>
</div>
<div class="content bg-white  mx-4">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
		</div>
		<form action="<?php echo base_url('MasterDataControler/additemproduk') ?>" method="POST" enctype="multipart/form-data">
			<div class="row mb-3">
				<div class="col-4">
					<img src="<?= base_url("assets/icon/item.png")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
					<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
				</div>
				<div class="col-4">
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Item Group</label>
							<select name="itemgroup" id="itemgroup" class="form-select" required onchange="location = this.options[this.selectedIndex].value;">
								<?php
								if ($data1 != 'Not Found') {
									foreach ($data1 as $key) : ?>
										<option value="<?php echo $key["namegroup"] ?>"><?php echo $key["namegroup"] ?></option>
								<?php endforeach;
								} ?>
							</select>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Nama Item</label>
							<div class="col">
								<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
								<input type="hidden" name="iditem" class="form-control">
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label class="form-label mb-3">Jenis Item</label>
							<div class="row">
								<div class="col-3">
									<input type="radio" name="jenisitem" value="service" class="form-check-input">
									<label class="form-check-label" for="flexRadioDefault1">
										Service
									</label>
								</div>
								<div class="col-4">
									<input type="radio" class="form-check-input" name="jenisitem" value="non service">
									<label class="form-check-label" for="flexRadioDefault1">
										Non Service
									</label>
								</div>
								<div class="col-6"></div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<span class="text-muted">Note</span>
						<span class="text-muted">Service: Item bisa dijual tanpa quantity stock </span>
					</div>
				</div>
				<div class="col-4">
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">SKU Item</label>
							<div class="col">
								<input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Harga</label>
							<div class="col">
								<input type="number" name="price" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<label for="" class="form-label">Deskripsi</label>
							<div class="col">
								<textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px;" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<div class="row">
								<div class="col-4">
									<p style="font-size: 16px">Status</p>
								</div>
								<div class="col-8">
									<div class="form-check form-switch">
										<input name="status" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
									</div>
								</div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-end">
					<button type="submit" class="btn btn-primary px-5">Buat Item</button>
				</div>
			</div>
		</form>
	</div>
</div>