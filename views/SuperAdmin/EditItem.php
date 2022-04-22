<style type="text/css">
	.biodata,
	.photos {
		height: 80vh;
		width: 100%;
	}


	.photos {
		background: purple;
		padding: 20%;
	}

	.biodata {
		background: white;
		padding: 2%;

	}

	.custom-br {
		display: block;
		width: 100%;
		height: 5px;
		background-color: purple;
		/*change color*/

	}

	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: #2196F3;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	.bays {
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
		background-color: white;
	}
</style>

<!DOCTYPE html>
<html>

<head>
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/Chart.js') ?>"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>ERP</title>
</head>

<body style="overflow-x:hidden;">
	<form action="<?php echo base_url('MasterDataControler/edititem') ?>" method="POST" enctype="multipart/form-data">
		<div class="container-xxl text-white pt-3" style="background-color: purple;">
			<div class="row d-flex justify-content-between">
				<div class="col-1">
					<a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
				</div>
				<div class="col-7">
					<p class="tu font-weight-bold " style="font-size: 13px">Admin/Item/Edit Item</p>
					<p class="tu font-weight-bold upc" style="font-size: 25px">EDIT ITEM </p>
				</div>
				<div class="col-4">
				</div>
			</div>
		</div>
		<div class="main py-4" style="margin-left:10%;margin-right:10%;">
			<div class="row no-gutters">
				<div class="col-12 bays">
					<div class="biodata">
						<div class="row d-flex justify-content-between">
							<div class="col-9">
							</div>
							<div class="col-3">
								<!-- <button class="btn btn-outline-danger" onclick="del()"> <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus Item </button> -->
								<button class="btn btn-outline-warning" style="margin-left: 2.5vw;margin-right: 0.5vw" onclick="refresh()"> <i class="fa fa-refresh" aria-hidden="true"></i> Batalkan Perubahan </button>
								<button class="btn btn-outline-success" type="submit"> <i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>
						<br><br>
						<div class="row">
							<?php echo $this->session->flashdata('message'); ?>
							<?php $this->session->set_flashdata('message', ''); ?>
						</div>
						<div class="row">
							<div class="col">
								<p><b>INFORMASI DASAR</b></p>
							</div>
							<div class="col-2" style="margin-top: 5px">
								<p style="font-size: 16px">Status</p>
							</div>
							<div class="col-2">
								<label class="switch">
									<?php if ($data['status'] == "1") { ?>
										<input type="checkbox" checked name="status">
									<?php } else { ?>
										<input type="checkbox" name="status">
									<?php } ?>

									<span class="slider round"></span>
								</label>
							</div>
						</div>
						<span class="custom-br"></span>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Nama Item</p>
							</div>
							<div class="col">
								<input type="text" name="itemname" class="form-control" value="<?php echo $data['itemname'] ?>" required>
								<input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
								<input type="hidden" name="id" class="form-control" value="<?php echo $data["iditem"] ?>">
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Harga Beli Item </p>
							</div>
							<div class="col">
								<input type="text" name="pricebuyitem" class="form-control" value="<?php echo $data['pricebuyitem'] ?>">
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Harga Item </p>
							</div>
							<div class="col">
								<input type="text" name="priceitem" class="form-control" value="<?php echo $data['priceitem'] ?>" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">SKU</p>
							</div>
							<div class="col">
								<input type="text" name="sku" class="form-control" value="<?php echo $data['sku'] ?>" required readonly>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Minimum Stock</p>
							</div>
							<div class="col">
								<input type="text" name="min" class="form-control" required value="<?php echo $data["minstock"] ?>">
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Maximum Stock</p>
							</div>
							<div class="col">
								<input type="text" name="max" class="form-control" required value="<?php echo $data["maxstock"] ?>">
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Item Type</p>
							</div>
							<div class="col">
								<select class="form-control" name="itemtype">
									<option value="" disabled selected>Pilih Item Type</option>
									<?php if ($data != "Not Found") : ?>
										<?php foreach ($data1 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>" <?php echo ($key["idcomm"] ==  $data["itemtype"]) ? ' selected="selected"' : ''; ?>><?php echo $key["namecomm"] ?>
											<?php endforeach ?>
										<?php endif ?>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="font-size: 16px;text-align: center">PPH22</p>
							</div>
							<div class="col input-group">
								<div class="col input-group">
									<div class="form-check col-2">
										<?php if ($data["pph22"] == 0.005) { ?>
											<input class="form-check-input" type="radio" name="pph" id="flexRadioDefault1" checked value="0.005">
										<?php } else { ?>
											<input class="form-check-input" type="radio" name="pph" id="flexRadioDefault1" value="0.005">
										<?php } ?>
										<label class="form-check-label" for="flexRadioDefault1">
											ON
										</label>
									</div>
									<div class="form-check">
										<?php if ($data["pph22"] == 0) { ?>
											<input class="form-check-input" type="radio" name="pph" id="flexRadioDefault1" checked value="0">
										<?php } else { ?>
											<input class="form-check-input" type="radio" name="pph" id="flexRadioDefault1" value="0">
										<?php } ?>

										<label class="form-check-label" for="flexRadioDefault1">
											OFF
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="font-size: 16px;text-align: center">Serial Number</p>
							</div>
							<div class="col input-group">
								<div class="form-check col-2">
									<?php if ($data["usesn"] == 'Y') { ?>
										<input class="form-check-input" type="radio" name="sn" id="flexRadioDefault1" checked value="Y">
									<?php } else { ?>
										<input class="form-check-input" type="radio" name="sn" id="flexRadioDefault1" value="Y">
									<?php } ?>
									<label class="form-check-label" for="flexRadioDefault1">
										YES
									</label>
								</div>
								<div class="form-check">
									<?php if ($data["usesn"] == 'N') { ?>
										<input class="form-check-input" type="radio" name="sn" id="flexRadioDefault1" checked value="N">
									<?php } else { ?>
										<input class="form-check-input" type="radio" name="sn" id="flexRadioDefault1" value="N">
									<?php } ?>

									<label class="form-check-label" for="flexRadioDefault1">
										NO
									</label>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="font-size: 16px;text-align: center">VAT</p>
							</div>
							<div class="col input-group">
								<div class="form-check col-2">
									<?php if ($data["VAT"] == 11) { ?>
										<input class="form-check-input" type="radio" name="vat" id="flexRadioDefault1" checked value="1.11">
									<?php } else { ?>
										<input class="form-check-input" type="radio" name="vat" id="flexRadioDefault1" value="1.11">
									<?php } ?>
									<label class="form-check-label" for="flexRadioDefault1">
										ON
									</label>
								</div>
								<div class="form-check">
									<?php if ($data["VAT"] == 0) { ?>
										<input class="form-check-input" type="radio" name="vat" id="flexRadioDefault1" checked value="0">
									<?php } else { ?>
										<input class="form-check-input" type="radio" name="vat" id="flexRadioDefault1" value="0">
									<?php } ?>

									<label class="form-check-label" for="flexRadioDefault1">
										OFF
									</label>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col">
								<p style="text-align: center">Location</p>
							</div>
							<div class="col">
								<input type="hidden" id="loc" value="<?= $data["idlocation"] ?>">
								<select class="form-control" name="idcomm" id="idcomm">
									<option value="" disabled selected>Pilih Location</option>
									<?php if ($data2 != "Not Found") : ?>
										<?php foreach ($data2 as $key) : ?>
											<option value="<?php echo $key["idcomm"] ?>"> <?php echo $key["namecomm"] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
	<form name=" formx" action="<?php echo base_url('MasterDataControler/deleteitem') ?>" method="POST">
		<input type="hidden" name="id" value="<?php echo $data["iditem"] ?>">
	</form>
</body>

</html>
<script type="text/javascript">
	$('#idcomm').val($('#loc').val());

	function back() {
		window.location.href = "<?php echo base_url('SuperAdminControler/item') ?>";
	}

	function refresh() {
		var con = confirm("Anda yakin ingin membatalkan perubahan data ?");
		if (con) {
			window.location.reload();
		}
	}

	function del() {
		var con = confirm("Anda yakin ingin menghapus item ini ?");
		if (con) {
			document.forms["formx"].submit();
		}
	}
</script>