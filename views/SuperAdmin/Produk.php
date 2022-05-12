<body class="body">
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
			<div class="row no-gutters">
				<div class="col-12 bays">
					<div class="biodata">
						<div class="row">
							<?php echo $this->session->flashdata('message'); ?>
							<?php $this->session->set_flashdata('message', ''); ?>
						</div>
						<form action="<?php echo base_url('MasterDataControler/additemproduk') ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-3">
									<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
										<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
									</div>
								</div>
								<div class="col-3">
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url("assets/icon/item.png")  ?>" alt="mdo" id="uimg" class="" style="object-fit:cover; width:412px;height:309px;border-radius: 4px;">
									<input type="file" class="form-control btn btn-outline-dark my-3 col-8" placeholder="Pilih Gambar" style="width:410px; " onchange="readURL(this)" id="inputGroupFile02">
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">Item Group</p>
										<div class="col">
											<select name="itemgroup" id="itemgroup" class="form-select" required onchange="location = this.options[this.selectedIndex].value;">
												<?php
												if ($data1 != 'Not Found') {
													foreach ($data1 as $key) : ?>
														<option value="<?php echo $key["namecomm"] ?>"><?php echo $key["attrib1"] ?></option>
												<?php endforeach;
												} ?>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Nama Item</p>
										<div class="col">
											<input type="text" name="nameitem" id="nameitem" class="form-control" autocomplete="off" required>
											<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
											<input type="hidden" name="iditem" class="form-control">
										</div>
									</div>
									<div class="mb-3">
										<label class="mb-3">Jenis Qty</label>
										<div class="row">
											<div class="col-3">
												<input type="radio" name="jenisqty" id="" value="stock" class="form-check-input" onchange=X"()">
												<label class="form-check-label" for="flexRadioDefault1">
													Stock
												</label>
											</div>
											<div class="col-4">
												<input type="radio" class="form-check-input" name="jenisqty" value="non stock">
												<label class="form-check-label" for="flexRadioDefault1">
													Non Stock
												</label>
											</div>

											<div class="col-6"></div>
										</div>
										<br>
										<label class="mb-3">Jenis Item</label>
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
										<br>
										<div class="mb-2" style="font-size:12px;">
											<p class="m-0">Note</p>
											<p>Service: Item bisa dijual tanpa quantity stock </p>
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<p class="m-0">SKU Item</p>
										<div class="col">
											<input name="sku" type="text" id="sku" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Harga</p>
										<div class="col">
											<input type="number" name="price" class="form-control" autocomplete="off" required>
										</div>
									</div>
									<div class="mb-3">
										<p class="m-0">Deskripsi</p>
										<div class="col">
											<textarea name="deskripsi" id="spesifikasi" cols="6" rows="4" class="form-control" style="font-size:13px;" placeholder="Nasi goreng + beef premium + rempah pilihan"></textarea>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-9">
											<p style="font-size: 16px">Status</p>
										</div>
										<div class="col-3">
											<div class="form-check form-switch">
												<input name="status" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
											</div>
										</div>
									</div>
									<div class="mb-3">
										<div class="col" style="font-size:15px;">
											<button type="submit" class="btn btn-primary" style="float: right; margin-top: 30px; padding-left:24px;padding-right:24px;">Buat Item</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>