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
<?php
    $idnew;
    if ($data3 != "Not Found") {
        foreach ($data3 as $key) {
            $idnew = $key["codein"];
            $idnew++;
        }
    } else {
        $idnew = "INVIN-TRS-001";
    }
?>
<!-- Modal -->
<div class="modal fade" id="modalinvin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background:#1143d8;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">LIST INGOING</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
      </div>
      <div class="modal-body">
		<div class="row mx-3">
			<div class="col-3 mb-3" style="width:25%;">
				<label for="">Tipe Ingoing</label>
				<select name="tipeingoing" id="" class="form-select mb-3">
					<option value="">Pilih</option>
					<option value="">Supplier</option>
					<option value="">Return</option>
					<option value="">Move Warehouse</option>
				</select>
				<label for="">Pencarian</label>
				<input type="text" name="" class="form-control" placeholder="Cari berdasarkan customer">
			</div>
			<div class="col-2" style="width:25%;">
				<label for="">Mulai Dari</label>
				<input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
			</div>
			<div class="col-2" style="width:25%;">
				<label for="">Sampai Dengan</label>
				<input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
			</div>
			<div class="col-2 mt-4"> 
				<button type="button" class="btn btn-primary">Terapkan</button>
			</div>
		</div>
		<div class="row mx-3" style="overflow-x: auto;">
			<table class="table table-bordered table-striped" id="table-user">
				<thead>
					<tr>
						<td>#</td>
						<td>No Transaksi</td>
						<td>Tanggal Transaksi</td>
						<td>Type Ingoing</td>
						<td>Qty Item</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
                </thead>
				<tbody>
					<?php if($data6 !="Not Found"):?>
						 <?php $no=1;?>
						  <?php foreach($data6 as $key):?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $key["codein"]?></td>
						<td><?php echo $key["datein"]?></td>
						<td><?php echo $key["typein"]?></td>
						<td><?php echo $key["qtyin"]?></td>
						<td><?php echo $key["status"]?></td>
						<td><a data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary" style="font-size:12px;">Detail</a>
						</td>
					</tr>
					<?php endforeach?>
					<?php endif?>
				</tbody>
			</table>
		</div>
	  </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background:#1143d8;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">PILIH DATA PURCHASE ORDER</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
      </div>
      <div class="modal-body">
		<div class="row mx-3">
			<div class="col-3 mb-3">
				<label for="">Pencarian</label>
				<input type="text" class="form-control" placeholder="Cari berdasarkan customer">
			</div>
			<div class="col-2"></div>
			<div class="col-2">
				<label for="">Mulai Dari</label>
				<input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
			</div>
			<div class="col-2">
				<label for="">Sampai Dengan</label>
				<input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
			</div>
			<div class="col-2 mt-4"> 
				<button type="button" class="btn btn-primary">Terapkan</button>
			</div>
		</div>
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
						<td>Action</td>
					</tr>
                </thead>
				<tbody>
					<?php if($data5 !="Not Found"):?>
						 <?php $no=1;?>
						  <?php foreach($data5 as $key):?>
					<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $key["codepo"]?></td>
							<td><?php echo $key["datepo"]?></td>
							<td><?php echo $key["datepo"]?></td>
							<td><?php echo $key["qty"]?></td>
							<td><?php echo number_format($key["subpo"])?></td>
							<td><?php echo $key["statuspo"]?></td>
							<td><a href="" class="btn btn-primary" style="font-size:12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Pilih</a></td>
					</tr>
					<?php endforeach?>
					<?php endif?>
				</tbody>
			</table>
		</div>
	  </div>
    </div>
  </div>
</div>
<form action="<?php echo base_url('MasterDataControler/AddInventoryin') ?>" method="POST" enctype="multipart/form-data" id="form">
<body class="body" >
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
  </ol>
  <h3 class="text-white">Register Ingoing</h3>
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
			<div class="col-3">
				<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
				</div>
			</div>
		</div>
		<input type="hidden" name="idin" id="idin">
		<input type="hidden" name="codein" id="codein">
        <div class="row mb-3">
          <div class="col-1"></div>
          <div class="col-3 mb-3">
           <h5>Informasi Dasar</h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">No. Transaksi</label>
				  <input type="text" name="codein" class="form-control" value="<?php echo $idnew ?>" readonly>
                  <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
             </div>
			 <button type="button" class="btn btn-primary" style="height:36px;font-size:13px;" data-mdb-toggle="modal" data-mdb-target="#modalinvin">Cari Data</button>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-2" style="width:50%;">
                  <label for="">Tipe Ingoing</label>
                  <select name="tipeingoing" id="tipeingoing" class="form-select" onchange="location = this.options[this.selectedIndex].value;">
                    <option value="Supplier">Supplier</option>
                    <option value="Return">Return</option>
                    <option value="Move Warehouse">Move Warehouse</option>
                  </select>
             </div>
           </div>
		   <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-2" style="width:50%;">
                  <label for="">No. Purchase Order</label>
				  <input type="hidden" class="form-control" id="idpo" name="idpo">
                  <input type="text" id="codepo" name="codepo" class="form-control" list="xpo" autocomplete="off">
             </div>
             &nbsp;&nbsp;<button type="button" class="btn btn-primary" style="height:36px;font-size:13px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Cari Data</button>
           </div>
           <div class="me-3" style="width:50%;">
                  <label for="">Customer</label>
                  <select name="namesupp" class="form-select" required>
                    <option value="">Pilih</option>
                    <?php if($data4 !="Not Found"):?>
                     <?php foreach($data4 as $key):?>
						<option value="<?php echo $key["idsupp"]?>"><?php echo $key["namesupp"]?></option>
					 <?php endforeach?>
					 <?php endif?>
                  </select>
             </div>
          </div>

          <div class="col-3">
           <h5>Informasi Gudang & Mata Uang </h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">Gudang Penerima</label>
                  <select name="namewarehouse" id="" class="form-select" required>
                    <option value="">Pilih</option>
					<?php if($data2 !="Not Found"):?>
						<?php foreach($data2 as $key) :?>
                           <option value="<?php echo $key["idwarehouse"]?>"><?php echo $key["namewarehouse"]?></option>
						<?php endforeach?>
					<?php endif?>
                  </select>
             </div>
             <div class="">
                  <label for="">Tanggal Masuk</label>
                  <input type="text" name="datein" id="datein" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
           </div>

            <div class="me-3" style="width:fit-content;width:50%;">
                  <label for="">Mata Uang</label>
                  <select name="currency" id="" class="form-select" required>
                    <option value="">Pilih</option>
					<?php if($data1 !="Not Found"):?>
					 <?php foreach($data1 as $key):?>
                       <option value="<?php echo $key["idcomm"]?>"><?php echo $key["namecomm"]?></option>
					 <?php endforeach?>
					<?php endif?>
                  </select>
             </div>
          </div>

          <div class="col-3">
           <h5>Cetak & Download</h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3">
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
			<th style="background:#1143d8;color:white;text-align:right;">SKU</th>
			<th style="background:#1143d8;color:white;text-align:center;">Nama Item</th>
			<th style="background:#1143d8;color:white;text-align:right;">Unit</th>
			<th style="background:#1143d8;color:white;text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harga</th>
			<th style="background:#1143d8;color:white;text-align:right;">&nbsp;&nbsp;&nbsp;Qty Po</th>
			<th style="background:#1143d8;color:white;text-align:right;">&nbsp;&nbsp;&nbsp;Qty In</th>
			<th style="background:#1143d8;color:white;text-align:right;">&nbsp;&nbsp;&nbsp;Selisih</th>
			<th style="background:#1143d8;color:white;text-align:right;">Expire Date</th>
			<th style="background:#1143d8;color:white;text-align:right;">Action</th>
			</tr>
			</thead>
          </table>
              <table class="table table-striped table-hover">
                  <tbody id="detailx">
                  </tbody>
              </table>
          </table>
          <div class="mr-4" style="text-align:right;">
            <button type="button" class="btn btn-primary" id="addorder" onclick="addorder()">Buat Transaksi</button>
          </div>
      </div>
  </div>
</div>
</div>
</form>
<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["nameitem"]. '     Rp. ' . $key["hargaitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditembom="<?php echo $key["iditembom"]; ?>" data-price="<?php echo $key["hargaitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-hargaitem="<?php echo $key["hargaitem"]; ?>" data-unitsatuan="<?php echo $key["unitsatuan"]; ?>"><?php echo $key["sku"] ; ?></option>
	<?php }
	} ?>
</datalist>
<datalist id="xpo">
	<?php
	if ($order != 'Not Found') {
		foreach ($order as $key) {

	?>
			<option value="<?php echo $key["codepo"]; ?>" data-idpo="<?php echo $key["idpo"]; ?>"  data-datepo="<?php echo $key["datepo"]; ?>" data-qty="<?php echo $key["qty"]; ?>" >( <?php echo $key["datepo"] ?> ) <?php echo $key["codepo"] ?> </option>
	<?php }
	} ?>
</datalist>
<script type="text/javascript">
		add_row_transaksi(0)
		var xitem = '';
	    xitem = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["iditembom"] . '" price="' . $key["hargaitem"] . '" nameitem="' . $key["nameitem"] . '"  sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

		var xunit = '';
	    xunit = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '" nameitem="' . $key["nameitem"] . '">' . $key["nameitem"] . ' - ' . $key["nameitem"] . '</option>';
					}
				}
				echo $x;
				?>';

		function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditembom').val() != '') {
				xcnt++;
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
			}
			//$(this).val(i+1);
		});
	}

		function reorder() {
		$('input[objtype=nourut]').each(function(i, obj) {
			$(this).val(i + 1);
		});
	   }

		function del_row_transaksi(xid) {
		$('#transaksi-' + xid + '').remove();
		reorder();
		calc();
	     }

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#uimg')
						.attr('src', e.target.result)
						.width(412)
						.height(309);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function add_row_transaksi(xxid) {
		var lastid = 0;
		if (parseInt(xxid) != 0) {
			lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
		}
		var xid = (parseInt(xxid) + 1);
		lastid++;
		var tabel = '';
		tabel +='<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditembom"  class="form-control  iditembom" name="transaksi_iditembom[]" / ></td>';
		tabel +='<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel +='<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control _nameitem" name="transaksi_nameitem[]" value=""/></td>';
		tabel +='<td class="p-0" style="border:none;"><input type="text" id="transaksi_' + xid + '_unitsatuan" autocomplete="off" objtype="_unitsatuan" class="form-control  _unitsatuan" name="transaksi_unitsatuan[]' + xid + '_unitsatuan"></td>';
		tabel +='<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga"></td>';
		tabel +='<td class="p-0" style="border:none;"><input type="number" readonly id="transaksi_' + xid + '_qtypo" class="form-control  _qtypo" name="transaksi_qtypo[]" value="0" onchange="count('+ xid +')"></td>';
		tabel +='<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_qtyin" class="form-control  _qtyin" name="transaksi_qtyin[]" value="0" onchange="count('+ xid +')"></td>';
		tabel +='<td class="p-0" style="border:none;"><input type="text" readonly id="transaksi_' + xid + '_balance" class="form-control _balance" name="transaksi_balance[]"  value="0" onchange="count('+ xid +')"></td>';
		tabel +='<td class="p-0" style="border:none;"><input  autocomplete="off" type="date" id="transaksi_' + xid + '_expiredate" objtype="expiredate"  class="form-control _expiredate" name="transaksi_expiredate[]"></td>';
		tabel +='<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel +='</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		if (parseInt(xxid) != 0) {
			var olddata = $('#transaksi-tr-' + xxid + '').html();
			var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
			$('#transaksi-tr-' + xxid + '').html(xdt);
		}
	}
 
	$(document).on('change', '.sku', function() {
		var xid  = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val  = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_iditembom').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_harga').val(0);
			$('#transaksi_' + xid + '_unitsatuan').val("");
			$('#transaksi_' + xid + '_qtypo').val("");
			$('#transaksi_' + xid + '_expiredate').val("");
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditembom').val(xobj.data('iditembom'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('hargaitem'));
			$('#transaksi_' + xid + '_unitsatuan').val(xobj.data('unitsatuan'));
			$('#transaksi_' + xid + '_expiredate').val(xobj.data('expiredate'));
		}
		calc();
	});

	$(document).on('input', '#codepo', function() {
		var val = $(this).val();
		var xobj = $('#xpo option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#idpo').val("");
			$('#datepo').val("");
		} else {

			$('#idpo').val(xobj.data('idpo'));
			$('#codepo').val(xobj.data('codepo'));
			$('#datepo').val(xobj.data('datepo'));
			loadreq();
		}
	});

	function loadreq() {
		var xid = $('#idpo').val();
		$.post("<?php echo base_url('InventoryController/getpo?'); ?>", {
			id: xid
		}, function(result) {
			var data = $.parseJSON(result);
			if (data.headertrans != "Not Found") {
				$('#detailx').html('');
				$("#idpo").val(data.headertrans['idpo']);
				$("#codepo").val(data.headertrans['codepo']);
				$("#datepo").val(data.headertrans['datepo']);
				var xiddet = 0;
				var xlost = 0;
				if (data.detailtrans != "Not Found") {
					for (var xiddet2 = 0; xiddet2 < data.detailtrans.length; xiddet2++) {

						if (parseFloat(data.detailtrans[(xiddet2)]['qtystd']).toFixed(0) > 0) {
							add_row_transaksi(xiddet);
							xiddet = xiddet + 1;
							$('#transaksi_' + xiddet + '_idpodet').val(data.detailtrans[(xiddet + xlost - 1)]['idpodet']);
							$('#transaksi_' + xiddet + '_iditembom').val(data.detailtrans[(xiddet + xlost - 1)]['iditembom']);
							$('#transaksi_' + xiddet + '_sku').val(data.detailtrans[(xiddet + xlost - 1)]['sku']);
							$('#transaksi_' + xiddet + '_nameitem').val(data.detailtrans[(xiddet + xlost - 1)]['nameitem']);
							$('#transaksi_' + xiddet + '_unitsatuan').val(data.detailtrans[(xiddet + xlost - 1)]['unitsatuan']);
							$('#transaksi_' + xiddet + '_harga').val(data.detailtrans[(xiddet + xlost - 1)]['price'].replace(".0000", ""));
							$('#transaksi_' + xiddet + '_qtypo').val(data.detailtrans[(xiddet + xlost - 1)]['qty']);
							$('#transaksi_' + xiddet + '_expiredate').val(data.detailtrans[(xiddet + xlost - 1)]['expiredate']);
						} else {
							xlost = xlost + 1;
						}
					}
				}
				// add_row_transaksi(xiddet);
				calc();
			}
		});
	}

	function addorder() {
		var cx = $('#form').serialize();
			$.post("<?php echo base_url('MasterDataControler/AddInventoryin') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Input Data Berhasil');
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
			});
	}

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == 'cancelorder') {
			if (confirm("Batalkan Transaksi?")) {
				cancelorder();
			}
		} else if ($(this).attr('id') == 'addorder') {
			var xask = '';
			if ($("#idin").val() == '') {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addorder();
				}
			}
		} else if ($(this).attr('id') == 'delorder') {
			if (confirm("Delete Transaksi?")) {
				delorder();
			}
		}
		e.preventDefault();
	});

	function validasi() {
		var xval = 0;
		var sts = 1;
		xval = $("#qtyin").val();
		if (xval == '0') {
			alert('Masukan Qty In');
			sts = 0;
			return false;
		}
		xval = $("#datein").val();
		if ($("#datein").val() == '') {
			alert('Input Tanggal Masuk');
			sts = 0;
			return false;
		}

		$('input[objtype=expiredate]').each(function(i, obj) {

			xid = $(this).attr('id').replace("transaksi_", "").replace("_expiredate", "");
			if ($('#transaksi_' + xid + '_iditembom').val() != '') {
				if ($("#datein").val() >= $(this).val()) {
					alert('Tanggal Expired Dibawah Atau Sama Dengan Tanggal Transaksi');
					sts = 0;
					return false;
				}
			}
		});
		if (sts == 1) {
			return true;
		} else {
			return false;
		}
		//return 'ok';
	}

	function cancelorder() {
		location.reload();
		//return false;
	}

	function count(xid)
	{
		var qtypos    = $('#transaksi_' + xid + '_qtypo').val();
		var qtyins    = $('#transaksi_' + xid + '_qtyin').val();
		var totals    = qtypos - qtyins ;
		$('#transaksi_' + xid + '_balance').val(totals);
	}

	</script>