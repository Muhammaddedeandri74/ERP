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
		<!-- <form action="<?php echo base_url('MasterDataControler/AddInventoryin') ?>" method="POST" enctype="multipart/form-data" id="form"> -->
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
             <div class="me-3" style="width:50%;">
                  <label for="">Pilih Gudang</label>
                  <select name="tipeingoing" id="tipeingoing" class="form-select">
                    <option value="">Pilih Gudang</option>
                    <?php if($data !="Not Found") :?>
                    <?php foreach($data as $key) :?>
                        <option value="<?php echo $key["namewarehouse"]?>"><?php echo $key["namewarehouse"]?></option>
                    <?php endforeach?>
                    <?php endif?>
                  </select>
             </div>
             <div class="">
             </div>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">Mulai Dari</label>
                  <input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')" style="width:100%;" placeholder="Pilih Tanggal">
             </div>
             <div class="" style="width:50%;">
                  <label for="">Sampai Dengan</label>
                  <input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')" style="width:100%;" placeholder="Pilih Tanggal">
             </div>
           </div>
           <div class="me-3" style="width:50%;">
                  <label for="">Item</label>
                  <input type="text" name="customer" class="form-control" style="font-size:1rem;width:95%;" placeholder="Pilih item yang dicari" readonly>
           </div>
          </div>
        
          <div class="col-3">
           <h5>&nbsp;</h5>
           <div class="d-flex" style="align-items: flex-end;">
             <div class="me-3 mb-3" style="width:50%;">
                  <label for="">Tipe Ingoing</label>
                  <select name="tipeingoing" id="tipeingoing" class="form-select">
                    <option value="">Pilih</option>
                    <option value="Supplier">Supplier</option>
                    <option value="Return">Return</option>
                    <option value="Move Warehouse">Move Warehouse</option>
                  </select>
             </div>
           </div>
           <div class="me-3 mb-3" style="width:fit-content;width:50%;">
            <label for="">Supplier</label>
                <select name="tipeingoing" id="tipeingoing" class="form-select">
                <option value="">Pilih</option>
                <?php if($data1 !="Not Found"):?>
                <?php foreach($data1 as $key):?>
                    <option value=""><?php echo $key["namecomm"]?></option>
                <?php endforeach?>
                <?php endif?>
                </select>
            </div>
            <div class="me-3" style="width:fit-content;width:50%;">
               <label for="">Tipe Item</label>
                 <select name="tipeingoing" id="tipeingoing" class="form-select">
                   <option value="">Pilih</option>
                   <option value="">Bahan Baku</option>
                   <option value="">Setengah Jadi</option>
                 </select>
            </div>
          </div>

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
      <div class="col-9">
        <h5>Item/Produk</h5>
        <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
          <table class="table m-0" >
		  <thead class="border-0">
			<tr>
                <th style="background:#1143d8;color:white;">No. Transaksi</th>
                <th style="background:#1143d8;color:white;">Nama Item</th>
                <th style="background:#1143d8;color:white;">SKU</th>
                <th style="background:#1143d8;color:white;">Tipe Item</th>
                <th style="background:#1143d8;color:white;">Unit</th>
                <th style="background:#1143d8;color:white;">Harga</th>
                <th style="background:#1143d8;color:white;">Expire Date</th>
                <th style="background:#1143d8;color:white;">Qty.In</th>
                <th style="background:#1143d8;color:white;">Supplier</th>
			</tr>
			</thead>
            <tbody>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Nama Item</th>
                    <th>SKU</th>
                    <th>Tipe Item</th>
                    <th>Unit</th>
                    <th>Harga</th>
                    <th>Expire Date</th>
                    <th>Qty.In</th>
                    <th>Supplier</th>
                </tr>
            </tbody>
          </table>
          <table class="table">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align:right;">Total Qty Ingoing</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Nama Item</th>
                    <th>SKU</th>
                    <th>Tipe Item</th>
                    <th>Unit</th>
                    <th>Harga</th>
                    <th>Expire Date</th>
                    <th>Qty.In</th>
                    <th>Supplier</th>
                </tr>
            </tbody>
            </table>
            <table class="table">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align:right;">Total Qty Ingoing</th>
                    <th></th>
                </tr>
            </thead>
            </table>
      </div>
  </div>
</div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    </div>
  </div>
</div>
<script></script>
