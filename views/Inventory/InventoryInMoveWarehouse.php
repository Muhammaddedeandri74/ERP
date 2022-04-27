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
		<form action="<?php echo base_url('MasterDataControler/AddInventoryin') ?>" method="POST" enctype="multipart/form-data" id="form">
		<div class="row">
			<div class="col-3">
				<div class="col d-flex align-middle mb-3" style="align-items:center"><i
						class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
				</div>
			</div>
		</div>
        <div class="row mb-4">
          <div class="col-1"></div>
          <div class="col-3">
           <h5>Informasi Dasar</h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">No. Transaksi</label>
                  <input type="text" name="notransaksi" class="form-control" style="font-size:1rem;" readonly>
             </div>
             <button class="btn btn-primary" style="height:36px; font-size:13px;">Cari Data</button>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-2" style="width:50%;">
                  <label for="" >Tipe Ingoing</label>
                  <select name="tipeingoing" id="tipeingoing" class="form-select" onchange="location = this.options[this.selectedIndex].value;">
                    <option value="Supplier">Supplier</option>
                    <option value="Return">Return</option>
                    <option value="Move Warehouse" selected>Move Warehouse</option>
                  </select>
             </div>
             <button class="btn btn-primary" style="height:36px;font-size:13px;">Cari Data</button>
           </div>
           <div class="me-3" style="width:50%;">
                  <label for="">Customer</label>
                  <input type="text" name="customer" class="form-control" style="font-size:1rem;" readonly>
             </div>
          </div>

          <div class="col-3">
           <h5>Informasi Gudang & Mata Uang </h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">Gudang Penerima</label>
                  <select name="namewarehouse" id="" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="Gudang 1">Gudang 1</option>
                  </select>
             </div>
             <div class="me-3" style="width:50%;">
                  <label for="">Gudang Penerim</label>
                  <select name="namewarehouse" id="" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="Gudang 1">Gudang 1</option>
                  </select>
             </div>
           </div>

            <div class="me-3" style="width:50%;">
                <div class="mb-3" >
                    <label for="">Tanggal Masuk</label>
                    <input type="text" name="tanggalmasuk" id="date1" value="<?= set_value('date1') ?>" placeholder="Pilih Tanggal"  style="cursor: pointer;" class="form-control"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
                </div>

                <label for="">Mata Uang</label>
                <select name="currency" id="" class="form-select" required>
                <option value="">Pilih</option>
                <?php if($data1 !="Not Found"):?>
                    <?php foreach($data1 as $key):?>
                    <option value="<?php echo $key["namecomm"]?>"><?php echo $key["namecomm"]?></option>
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
			<th style="background:#1143d8;color:white;text-align:right;">Nama Item</th>
			<th style="background:#1143d8;color:white;text-align:right;">Qty Order</th>
			<th style="background:#1143d8;color:white;text-align:right;">Expired Date</th>
			<th style="background:#1143d8;color:white;text-align:right;">Qty In</th>
			<th style="background:#1143d8;color:white;text-align:right;">Balance</th>
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
            <button type="button" class="btn btn-primary" style="font-size:13px;" data-toggle="modal" data-target=".bd-example-modal-xl">Buat Transaksi</button>
          </div>
      </div>
  </div>
</div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
<datalist id="xitem">
	<?php
	if ($data != 'Not Found') {
		foreach ($data as $key) {
	?>
			<option value="<?php echo $key["nameitem"]. '     Rp. ' . $key["hargaitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["hargaitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>" data-qty="<?php echo $key["qty"]; ?>"><?php echo $key["sku"] ; ?></option>
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
						$x = $x . '<option value="' . $key["iditem"] . '" price="' . $key["hargaitem"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
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


        $('input[type="radio"]').click(function () {
          var inputValue = $(this).attr("value");
          if (inputValue == "stock") {
            $("#service").hide();
            $("#stock").show();

          } else {
            $("#stock").hide();
            $("#service").show();
            $("#detailx").html("");
          }
        });

		function calc() {
		var xcnt = 0;
		var xqty = 0;
		var xid = 0;
		$('input[objtype=sku]').each(function(i, obj) {
			xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
			if ($('#transaksi_' + xid + '_iditem').val() != '') {
				xcnt++;
				xqty += parseFloat($('#transaksi_' + xid + '_qty').val().replaceAll(',', ''));
			}
			//$(this).val(i+1);
		});
		$('#qtyin').val(formatnum(xqty));
	  	$('#itemin').val(formatnum(xcnt));
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
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '">';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" readonly id="transaksi_' + xid + '_expireddate" objtype="_expireddate" class="form-control  _qty" name="transaksi_expireddate[]" /></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi_' + xid + '_qtyin" objtype="_qtyin" class="form-control  _qty" name="transaksi_qtyin[]" /></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="text" id="transaksi_' + xid + '_balance"  class="form-control _balance" name="transaksi_unit[]"  value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="text" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control _qty" name="transaksi_qty[]" / autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
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
		var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
		var val = $(this).val();
		var xobj = $('#xitem option').filter(function() {
			return this.value == val;
		});
		if ((val == "") || (xobj.val() == undefined)) {
			$('#transaksi_' + xid + '_sku').val("");
			$('#transaksi_' + xid + '_iditem').val("");
			$('#transaksi_' + xid + '_nameitem').val("");
			$('#transaksi_' + xid + '_deskripsi').val("");
			$('#transaksi_' + xid + '_qty').val(0);
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_deskripsi').val(xobj.data('deskripsi'));
			$('#transaksi_' + xid + '_qty').val(0);

		}
		calc();
	});

	function addorder() {
		var cx = $('#form').serialize();
			$.post("<?php echo base_url('MasterDataControler/additem') ?>", cx,
				function(data) {
					if (data == 'Success') {
						alert('Input Data Berhasil');
						cancelorder();
					} else {
						alert('Input Data Gagal. ' + data);
					}
				});
	}

	function cancelorder() {
		location.reload();
		//return false;
	}
	</script>