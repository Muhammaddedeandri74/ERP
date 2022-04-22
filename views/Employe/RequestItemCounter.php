<style>
	.bays {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
		background-color: white;
	}

	.center {
		margin: auto;
		width: 60%;
		padding: 10px;
	}

	.tar {
		text-align: right;
	}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>

<div class="container-xxl text-white pt-3" style="background-color: orange;">
	<div class="row d-flex justify-content-between">
		<div class="col-1">
			<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
		</div>
		<div class="col-7">
			<p class="tu font-weight-bold " style="font-size: 13px">Counter / Stock / Stock Inventory</p>
			<p class="tu font-weight-bold upc" style="font-size: 25px">REQUEST BARANG KE WAREHOUSE</p>
		</div>
		<div class="col-4">
		</div>
	</div>
</div>
<div class="container-xxl center py-4" style="width: 95%;">
	<div class="row">
		<div class="col">
			<div class="card bays">
				<div class="card-body">
					<form action="<?php echo base_url("CounterController/addrequestitem") ?>" method='POST' id="post">
						<div class="row d-flex justify-content-between p-3">
							<div class="col-4">
								<p>Masukan Informasi & Pilih Product</p>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-4 col-form-label tar">Judul Permintaan</label>
									<div class="col-sm-8">
										<textarea type="textarea" name="nareq" placeholder="Masukan Judul Permintaan" class="form-control" required></textarea>
									</div>
								</div>
								<p class="pl-5">Pilih Product</p>
								<div class="row pb-3">
									<div class="col-4"></div>
									<select class=" selectpicker form-control col-8" data-live-search="true" onchange="chose(this.value)" id="selitem">
										<option value="" disabled selected>Cari Product atau Item</option>
										<?php if ($data != "Not Found") : ?>
											<?php foreach ($data as $key) : ?>
												<option value="<?php echo json_encode($key['iditem']) ?>"><?php echo $key["nameitem"] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label tar">Name Product</label>
									<div class="col-sm-8">
										<input type="text" id="nameproduct" readonly class="form-control">
										<input type="hidden" id="idproduct" readonly class="form-control">
										<input type="hidden" id="idwh" readonly class="form-control">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label tar">SKU</label>
									<div class="col-sm-8">
										<input type="text" id="skuproduct" readonly class="form-control">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label tar">Qty Product</label>
									<div class="col-sm-4">
										<input type="number" id="qtyproduct" readonly class="form-control">
									</div>
									<label class="col-sm-4 col-form-label" id="qty">Current Stock : X</label>
								</div>
								<div class="row">
									<div class="col-4">

									</div>
									<div class="col-8">
										<a href="#" class="btn btn-outline-info col-12" onclick="add()">+ Tambah Ke Daftar</a>
									</div>
								</div>

							</div>
							<div class="col-8 pl-5">
								<p>LIST PRODUCT</p>
								<input type="hidden" id="jmlitem">
								<table class="table border" id="table">
									<thead>
										<tr style="background: #999999; color: white">
											<td>Nama Product</td>
											<td>SKU</td>
											<td>Qty</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody id="body">

									</tbody>
								</table>
								
								<br><br><br>
								<div class="row d-flex align-items-center pt-5">
									<div class="col-10">
									</div>
									<div class="col-1">
										<p class="mt-2" style="cursor: pointer; color: #999999">Batal</p>
									</div>
									<div class="col-1">
										<button type="button" class="btn btn-primary" onclick="order()">Submit</button>
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

<script type="text/javascript">
	start()

	function add() {
		if ($('#nameproduct').val() == "" || $('#qtyproduct').val() == "0") {
			alert("Tolong Masukan Item dan qty dahulu")
		} else {
			var b = $('#jmlitem').val() + 1;
			var baris = ''
			baris += `
									<tr id="item` + b + `">
										<td><input type="hidden" name="iditem[]" value="` + $('#idproduct').val() + `" ><input type="hidden" name="idwh[]" value="` + $('#idwh').val() + `" >` + $('#nameproduct').val() + `</td>
										<td>` + $('#skuproduct').val() + `</td>
										<td><input type="text" name="qty[]" value="` + $('#qtyproduct').val() + `"></td>
										<td><a href="#" class="btn btn-danger" onclick="del(` + b + `)">DELETE</a></td>
									</tr>

								 `
			$('#jmlitem').val(Number($('#jmlitem').val()) + Number(1))
			$('#body').append(baris);
		}

	}

	function chose(x) {
		var data = <?php echo json_encode($data) ?>;
		for (var i = 0; i < data.length; i++) {
			if (data[i]["iditem"] == x) {
				$('#idproduct').val(data[i]["iditem"])
				$('#idwh').val(data[i]["idwh"])
				$('#nameproduct').val(data[i]["nameitem"])
				$('#skuproduct').val(data[i]["sku"])
				$('#qtyproduct').val(0)
				$('#qty').html("Current Stock : " + data[i]["qty"])
				document.getElementById('qtyproduct').readOnly = false
			}
		}

	}

	function start() {
		var data = <?php echo json_encode($data) ?>;
		var id = <?php echo json_encode($iditem) ?>;
		var baris = '';
		var b = 0;
		for (var i = 0; i < data.length; i++) {
			for (var a = 0; a < id.length; a++) {
				if (data[i]["iditem"] == id[a]) {
					baris += `
								<tr id="item` + b + `">
									<td><input type="hidden" name="iditem[]" value="` + data[i]["iditem"] + `" ><input type="hidden" name="idwh[]" value="` + data[i]["idwh"] + `" >` + data[i]["nameitem"] + `</td>
									<td>` + data[i]["sku"] + `</td>
									<td><input type="text" name="qty[]" value="` + data[i]["minstock"] + `"></td>
									<td><a href="#" class="btn btn-danger" onclick="del(` + b + `)">DELETE</a></td>
								</tr>

							 `
					b++;
				}
			}
		}


		$('#body').html(baris);
		$('#jmlitem').val(id.length);
	}

	function del(x) {
		if (confirm('Hapus Item Ini?')) {
			$('#item' + x + '').remove();
		}

	}

	function order() {
		var tbl = document.getElementById('table');
		for (var i = 0; i < post.elements.length; i++) {
			if (post.elements[i].value === '' && post.elements[i].hasAttribute('required')) {
				alert('Tolong Masukan Judul Permintaan');
				return false;
			}
		}
		if (tbl.rows.length == 1) {
			alert("Pilih Item Terlebih dahulu")
		} else {
			$('#post').submit();
		}
	}

	function back() {
		window.location.href = "<?php echo base_url('CounterController/stockhabis') ?>";
	}
</script>