<html>

<head>
	<!-- Link Font dari adobe -->
	<link rel="stylesheet" href="https://use.typekit.net/vke3pqz.css">
	<!-- Link Box Icon -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
        <!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">

	<title>S-ERP</title>
</head>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background:#1143d8;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">DETAIL PURCHASE ORDER</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
      </div>
      <div class="modal-body">
		<div class="row mx-3" style="overflow-x: auto;">
			<table class="table table-bordered table-striped" id="table-user">
				<thead>
					<tr>
						<td>#</td>
						<td>No. PO</td>
						<td>Tanggal Order</td>
						<td>Due Date</td>
						<td>Qty Item</td>
						<td>Total Amount</td>
						<td>Status</td>
					</tr>
                </thead>
				<tbody>
					<?php if($data !="Not Found"):?>
						 <?php $no=1;?>
						  <?php foreach($data as $key):?>
					<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $key["codepo"]?></td>
							<td><?php echo $key["datepo"]?></td>
							<td><?php echo $key["datepo"]?></td>
							<td><?php echo $key["qty"]?></td>
							<td><?php echo $key["subpo"]?></td>
							<td><?php echo $key["statuspo"]?></td>
					</tr>
					<?php endforeach?>
					<?php endif?>
				</tbody>
			</table>
		</div>
	  </div>
    </div>
  </div>
</div> -->
<body class="body" >
<!-- Modal -->

<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Transaction Book</li>
  </ol>
  <h3 class="text-white">Stock Card Report</h3>
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
        <div class="row">
        <div class="col-1">
        </div>
          <div class="col-6 mb-3">
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">Pilih Gudang</label>
                  <select name="namewarehouse" id="" class="form-select" required>
                    <option value="">Pilih</option>
					<?php if($data1 !="Not Found"):?>
						<?php foreach($data1 as $key) :?>
                           <option value="<?php echo $key["idwarehouse"]?>"><?php echo $key["namewarehouse"]?></option>
						<?php endforeach?>
					<?php endif?>
                  </select>
             </div>
             <div class="me-3" style="width:50%;">
                  <label for="">Mulai Dari</label>
                  <input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
             <div class="me-3" style="width:50%;">
                  <label for="">Sampai Dengan</label>
                  <input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
             <div class="me-3" style="width:50%;">
                  <label for=""></label>
                  <button class="btn btn-outline-primary">Terapkan</button>
             </div>
           </div>
          </div>
         <div class="col-3"></div>
          <div class="col-2" style="text-align: end;">
          <h5>Cetak & Download</h5>
             <div class="">
               <button class="btn btn-light"><i class='bx bxs-download' >Download</i></button> 
               <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button> 
             </div>
    	</div>
</div>
</div>
<div class="row">
</div>
<div class="row">
  <hr>
    <div class="row mb-5" style="overflow-x: auto;">
    <h5>SKU-ITEM | SAYUR KOL</h5>
        <table class="table table-bordered table-striped">
		  <thead>
				<tr>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">No Transaksi</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Tanggal</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Unit</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Masuk</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Keluar</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Balance</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
				</tr>
			</thead>
            <tbody>
            <?php if($data !="Not Found"):?>
				<?php $no=1;?>
				 <?php foreach($data as $key):?>
				 <tr>
					<td><?php echo $key["codein"]?></td>
					<td><?php echo $key["datein"]?></td>
					<td><?php echo $key["itemgroup"]?></td>
					<td><?php echo $key["qtypo"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
					<td><?php echo $key["qty"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
					<td><?php echo $key["hargaitem"]?></td>
				 </tr>
				 <?php endforeach?>
				 <?php endif?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;font-size:17px;">TOTAl SAYUR</td>
					<td style="background:#CFDBFF;color:black;text-align:left;min-width: auto;">260</td>
					<td style="background:#CFDBFF;color:black;text-align:left;min-width: auto;">Rp. 32.000</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">Rp. 240.000</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">50</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">Rp. 8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">Rp. 480.000</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">0</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">Rp. 8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:width;min-width: auto;">0</td>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
  </div>
 <div class="row">
  <hr>
    <div class="row mb-5" style="overflow-x: auto;">
    <h5>SKU-ITEM | AYAM POTONG</h5>
        <table class="table table-bordered table-striped">
		  <thead>
				<tr>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">No Transaksi</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Tanggal</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Unit</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Masuk</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Keluar</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Balance</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
				</tr>
			</thead>
            <tbody>
              <?php if($data !="Not Found"):?>
				<?php $no=1;?>
				 <?php foreach($data as $key):?>
				 <tr>
					<td><?php echo $key["codein"]?></td>
					<td><?php echo $key["datein"]?></td>
					<td><?php echo $key["itemgroup"]?></td>
					<td><?php echo $key["sku"]?></td>
					<td><?php echo $key["qtypo"]?></td>
					<td><?php echo $key["qty"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
				 </tr>
				 <?php endforeach?>
				 <?php endif?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;font-size:17px;">TOTAl AYAM POTONG</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">30</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">240.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">50</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">480.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">0</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">0</td>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
 </div>

 <div class="row">
  <hr>
    <div class="row mb-5" style="overflow-x: auto;">
    <h5>SKU-ITEM | BEEF</h5>
        <table class="table table-bordered table-striped">
		  <thead>
				<tr>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">No Transaksi</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Tanggal</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Unit</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Masuk</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Keluar</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Balance</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Harga Pokok</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">Nilai</td>
				</tr>
			</thead>
            <tbody>
            <?php if($data !="Not Found"):?>
				<?php $no=1;?>
				 <?php foreach($data as $key):?>
				 <tr>
					<td><?php echo $key["codein"]?></td>
					<td><?php echo $key["datein"]?></td>
					<td><?php echo $key["itemgroup"]?></td>
					<td><?php echo $key["sku"]?></td>
					<td><?php echo $key["qtypo"]?></td>
					<td><?php echo $key["qty"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
					<td><?php echo $key["balance"]?></td>
				 </tr>
				 <?php endforeach?>
				 <?php endif?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;font-size:17px;">TOTAl BEEF</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">30</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">240.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">50</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">480.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">0</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">8.000</td>
					<td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;">0</td>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
  </div>
 </div>
 
</div>

<script src="<?php echo base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js ')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<script>
    $('#data').hide();
			$(function () {
				$("#table-user").DataTable({
				"responsive": true, "lengthChange": false, "autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
				$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
				});
			});

</script>
