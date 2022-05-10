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

          <!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<title>S-ERP</title>
</head>

<body class="body" >
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
  </ol>
  <h3 class="text-white">Ingoing Status</h3>
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
		<form action="<?php echo base_url('InventoryController/ingoingstatus') ?>" method="POST" enctype="multipart/form-data" id="form">
        <div class="row">
			<div class="col-3">
				<div class="col d-flex align-middle mb-3" style="align-items:center"><i
						class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
				</div>
			</div>
		</div>
        <div class="row mb-3">
          <div class="col-1"></div>
          <div class="col-3">
           <h5>Filter Status</h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:100%;">
                <input type="text" name="nameitem" value="<?= set_value('nameitem') ?>" placeholder="Cari berdasarkan namaitem.." class="form-control" autocomplete="off">
             </div>
             <div class="">
             </div>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:75%;">
                  <label for="">Mulai Dari</label>
                  <input type="text" name="date1" id="date1" value="<?= set_value('date1') ?>" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')" style="width:100%;" placeholder="Pilih Tanggal">
             </div>
             <div class="" style="width:75%;">
                  <label for="">Sampai Dengan</label>
                  <input type="text" name="date2" id="date1" value="<?= set_value('date1') ?>" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')" style="width:100%;" placeholder="Pilih Tanggal">
             </div>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <a href="<?php echo base_url('InventoryController/ingoingstatus')?>" class="btn btn-danger">Reset</a>
                  <button type="submit" name="submit" class="btn btn-primary">Pencarian</button>
             </div>
           </div>
          </div>
         <div class="col-1"></div>
          <div class="col-3">
           <h5>&nbsp;</h5>
           <div class="d-flex" style="align-items: flex-end;">
             <div class="me-3 mb-3" style="width:75%;">
                  <label for="">Tipe Ingoing</label>
                  <select name="tipein" class="form-select">
                    <option value="">Pilih</option>
                    <option value="Supplier">Supplier</option>
                    <option value="Return">Return</option>
                    <option value="Move Warehouse">Move Warehouse</option>
                  </select>
             </div>
           </div>
           <div class="me-3 mb-3" style="width:fit-content;width:75%;">
            <label for="">Supplier</label>
                <select name="namesupp" id="namesupp" class="form-select">
                <option value="">Pilih</option>
                <?php if($data2 !="Not Found"):?>
                <?php foreach($data2 as $key):?>
                    <option value="<?php echo $key["namecomm"]?>"><?php echo $key["namecomm"]?></option>
                <?php endforeach?>
                <?php endif?>
                </select>
            </div>
            <div class="me-3 mb-2" style="width:fit-content;width:75%;">
               <label for="">Tipe Item</label>
                 <select name="itemgroup" id="itemgroup" class="form-select">
                   <option value="">Pilih</option>
                   <option value="BahanMaterial">Bahan Baku</option>
                   <option value="BahanSetengahJadi">Setengah Jadi</option>
                 </select>
            </div>
            
          </div>
          <div class="col-1"></div>
          <div class="col-3">
           <h5>Cetak & Download</h5>
           <div class="d-flex" style="align-items: flex-end;">
             <div class="me-3 mb-3">
               <button class="btn btn-light"><i class='bx bxs-download' >Download</i></button> 
               <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button> 
             </div>
           </div>
			</div>
		</div>
	</div>
  <div class="row">
    <div class="col-1">
    </div>
      <div class="col-12">
        <h5>Item/Produk</h5>
        <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
      <table class="table table-bordered table-striped list-akses"  id="table-user" >
		  <thead class="border-0">
			<tr>
          <td style="background:#1143d8;color:white;min-width: auto;">#</td>
          <td style="background:#1143d8;color:white;min-width: auto;">No. Transaksi</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Supplier</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Nama Item</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Tangal InventoryIn</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Tipe Ingoing</td>
          <td style="background:#1143d8;color:white;min-width: auto;">SKU</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Tipe Item</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Unit</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Harga</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Qty.In</td>
          <td style="background:#1143d8;color:white;min-width: auto;">Expire Date</td>
			</tr>
			</thead>
      <tbody>
        <?php if($data != "Not Found"):?>
        <?php $no=1;?>
        <?php foreach($data as $key):?>
          <tr>
              <td><?php echo $no++;?></td>
              <td><?php echo $key["codein"]?></td>
              <td><?php echo $key["namesupp"]?></td>
              <td><?php echo $key["nameitem"]?></td>
              <td><?php echo $key["datein"]?></td>
              <td><?php echo $key["typein"]?></td>
              <td><?php echo $key["sku"]?></td>
              <td><?php echo $key["itemgroup"]?></td>
              <td><?php echo $key["unitsatuan"]?></td>
              <td><?php echo $key["hargaitem"]?></td>
              <td><?php echo $key["qtyin"]?></td>
              <td><?php echo $key["expdate"]?></td>
             
          </tr>
          <?php endforeach?>
          <?php endif?>
      </tbody>
      <tfoot>
          <tr>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:left;font-size:18px;">&nbsp;&nbsp;&nbsp;Total Qty Ingoing</td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
              <td style="background:#CFDBFF;color:black;text-align:center;min-width: auto;"></td>
          </tr>
      </tfoot>
    </table>
      </div>
  </div>
</div>
</div>
</form>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
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
