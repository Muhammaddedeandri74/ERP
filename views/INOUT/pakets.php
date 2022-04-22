<style type="text/css">
	.fw {
		font-weight: bold;
	}

	.fn {
		font-weight: normal;
	}

	.bay {
		box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
		-moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
	}

	.cn {
		text-align: center;
	}
</style>
<!-- <div class="header" style="height: 17vh ; background: #3C2E8F; padding-left: 30px; margin-left: 60px; width: 100vw;  ">
	<div class="row">
		<div class="col">
			<p style="font-size: 15px; margin: 0; padding: 20px;color: white">GUDANG / Split Bundle Item page</p>
			<h1 style="color: white; padding-left: 20px"> Split Bundle Item</h1>
		</div>
		<div class="col" style="margin: 3% ;">

			<div class="d-flex align-items-center">
				<p style="font-size: 20px; color: orange; margin: 0; ">Filter Pencarian</p>
				<form class="example" action="">
					<input type="text" placeholder="Cari Berdasarkan Item atau lainnya" name="search" id="search" oninput="searchx(this.value)">
					<button style="display:none" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>
</div> -->

<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
	<p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">GUDANG / Split Bundle Item page</p>
	<p class="text-white font-weight-bold pl-2" style="font-size: 25px">SPLIT BUNDLE ITEM</p>
</div>

<div class="container-xxl ml-5">
	<div class=" card border-0">
		<div class="card-header border-0 bg-transparent">
			<div class="row d-flex justify-content-between">
				<div class="col-10 pl-5">
					<a href="<?= base_url('InOut/paket') ?>" class="btn fw btn-transparent">BUNDLE ITEM</a>
					<a href="<?= base_url('InOut/pakets') ?>" class="btn bay fw btn-transparent">SPLIT BUNDLE ITEM</a>
				</div>
				<div class="col-2">
				</div>
			</div>
		</div>
		<div class="card-body ml-4">
			<?php echo $this->session->flashdata('message'); ?>
			<?php $this->session->set_flashdata('message', ''); ?>
			<div class="card bay p-4" width="80%">
				<div class="card-header border-0 bg-white">
					<div class="row pt-4">
						<div class="col-1-half pt-2 pl-3">
							<P class="fw">Filter Pencarian</P>
						</div>
						<div class="col-4">
							<input type="text" class="form-control" oninput="searchx(this.value)" name="search" id="search" placeholder="&#xF002; Cari Berdasarkan Customer" style="font-family:Arial, FontAwesome">
						</div>
						<div class="col-3"></div>
						<div class="col-2"></div>
						<div class="col-2">
							<a href="<?php echo base_url('InOut/newpakets') ?>" class="btn btn-outline-primary" style="float :right"><b>+ Bundle Split</b></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table cn">
						<thead style="background-color: #3C2E8F;color: white">
							<tr>
								<th>NO </th>
								<th>Trans NO</th>
								<th>Order NO</th>
								<th>Trans Date</th>
								<th>Supplier</th>
								<th>Item Count</th>
								<th>Deskripsi</th>
								<th>Issue By</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="xdetail">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class=" isi">
	<?php echo $this->session->flashdata('message'); ?>
	<?php $this->session->set_flashdata('message', ''); ?>

	<div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">
		<div class="col" style="box-shadow: 0.5px 2px #bbc6cb;background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 10px">
			<div class="col" style="margin-right: 40px">
				<a href="<?php echo base_url('InOut/newpakets') ?>" class="btn btn-outline-success" style="float :right"><b style="color: purple">+ Bundle Split</b></a>
			</div>


		</div>
	</div>

	<div class="row" style=" margin-left:20px;margin-right:30px;margin-top: 10px">

		<div class="col" style="box-shadow: 0.5px 2px #bbc6cb;background: white ; border: 1px solid ; border-color: #eeeeee ;  margin-bottom: 10px">
			<table style="width: 100% ; margin-top: 20px" class="table">
				<thead>
					<tr>
						<th style="color: purple">NO </th>
						<th style="color: purple">Trans NO</th>
						<th style="color: purple">Trans Date</th>
						<th style="color: purple">Bundle SKU</th>
						<th style="color: purple">Bundle Item</th>
						<th style="color: purple">Gudang</th>
						<th style="color: purple">Qty</th>
						<th style="color: purple">Expired</th>
						<th style="color: purple">SN Awal</th>
						<th style="color: purple">SN Akhir</th>
						<th style="color: purple">Deskripsi</th>
						<th style="color: purple">Issue By</th>
						<th style="color: purple">Actions</th>
					</tr>
				</thead>
				<tbody id="xdetail">
				</tbody>

			</table>

		</div>
	</div>
</div> -->
<script language="javascript">
	function searchx(x) {
		var data = <?php echo json_encode($data) ?>;
		var baris = "";
		var ix = 0;
		var x1 = 0;
		for (var i = 0; i < data.length; i++) {
			if ((data[i]["namewh"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepakets"].toLowerCase().includes(x.toLowerCase())) || (data[i]["sku"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["idsnp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["idsnp2"].toLowerCase().includes(x.toLowerCase()))) {
				x1 = formatnum(parseFloat(data[i]["itempakets"]).toFixed(0));
				ix = (ix + 1);
				if (i % 2 == 0) {
					baris += '<tr style="cursor: pointer;">';
				} else {
					baris += '<tr style="background:#eeeeee; cursor: pointer;">';
				}
				baris += '<td>' + ix + '</td>';
				baris += '<td>' + data[i]["codepakets"] + '</td>';
				baris += '<td>' + data[i]["datepakets"] + '</td>';
				baris += '<td>' + data[i]["sku"] + '</td>';
				baris += '<td>' + data[i]["nameitem"] + '</td>';
				baris += '<td>' + data[i]["namewh"] + '</td>';
				baris += '<td>' + x1 + '</td>';
				baris += '<td>' + data[i]["expdates"] + '</td>';
				baris += '<td>' + data[i]["idsnp"] + '</td>';
				baris += '<td>' + data[i]["idsnp2"] + '</td>';
				baris += '<td>' + data[i]["descinfo"] + '</td>';
				baris += '<td>' + data[i]["nameuser"] + '</td>';
				baris += '<td><a href="<?php echo base_url('InOut/changepakets?idtrans=') ?>' + btoa(data[i]["idpakets"]) + '"><i class="fas fa-pencil-alt">EDIT</i></a></td>';
				baris += '</tr>';
				baris += '</tr>';
			}
		}

		$('#xdetail').html(baris);
		console.log(baris)
	}
	searchx('');
	$('form button').on("click", function(e) {
		e.preventDefault();
	});
</script>