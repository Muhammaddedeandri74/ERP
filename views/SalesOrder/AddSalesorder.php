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
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
		<title>S-ERP</title>
	</head>

<body class="body" >
<form action="<?php echo base_url('MasterDataControler/addpo') ?>" method="POST" enctype="multipart/form-data" id="form">
<div class="header px-4 pt-2" style="height: 196px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Order Management </a></li>
    <li class="breadcrumb-item m-0 bc-active" aria-current="page">Sales Order</li>
  </ol>
  <h3 class="text-white">Register Order Confirmation</h3>
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
		<input type="hidden" name="idpo" id="idpo">
		<input type="hidden" name="codepo" id="codepo">
		<div class="row">
			<div class="col-3">
				<div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
					<a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage')?>">Kembali</a>
				</div>
			</div>
		</div>
        <div class="row mb-3">
          <div class="col-1"></div>
          <div class="col-3 mb-3">
           <h5>Informasi Dasar</h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">No. Sales Order</label>
                  <input type="text" name="codepo" class="form-control" value="" readonly>
                  <input type="hidden" name="userid" class="form-control" value="">
                  <input type="hidden" name="idpo" class="form-control">
             </div>
           </div>

           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-2" style="width:50%;">
                  <label for="">No Quotation</label>
                  <input type="text" name="codepo" class="form-control" value="">
             </div>
             &nbsp;&nbsp;<button class="btn btn-primary" style="height:36px;font-size:13px;">Cari Data</button>
           </div>
           <div class="me-3 mb-3" style="width:50%;" >
                <label for="">Tipe Order</label>
                <select name="" id="" class="form-select">
                    <option value="">Pilih</option>
                    <option value="">E-Commerce</option>
                    <option value="">B2B</option>
                </select>
            </div>
            <div class="me-3 mb-3" style="width:50%;" >
                <label for="">Customer</label>
                <select name="" id="" class="form-select">
                    <option value="">Pilih</option>
                    <option value="">E-Commerce</option>
                    <option value="">B2B</option>
                </select>
            </div>
            <div class="me-3" style="width:50%;" >
               <a style="font-size:13px;" href="" class="btn btn-primary">+ Customer Baru</a>
            </div>
          </div>

          <div class="col-3">
           <h5>Informasi Detail Pesanan </h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
             <label for="">Tanggal Order</label>
                 <input type="text" name="tanggalmasuk" id="datepo" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control datetrans"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
             <div class="" style="width:50%;">
                  <label for="">Tanggal Pengiriman</label>
                  <input type="text" name="tanggalmasuk" id="datepo" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control datetrans"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
           </div>
           <div class="me-3 mb-3" style="width:fit-content;width:50%;">
              <label for="">No Pesanan (E-Commerce)</label>
                 <input type="text" name="" class="form-control">
           </div>
           <div class="me-3 mb-3" style="width:fit-content;width:100%;">
              <label for="">Alamat Pengiriman</label>
                 <textarea name="" id="" cols="4" rows="4" class="form-control"></textarea>
           </div>
          </div>
          <div class="col-1"></div>
          <div class="col-3">
           <h5>Metode Pembayaran </h5>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                 <label for="">Metode Pembayaran</label>
                 <input type="text" name="tanggalmasuk" id="datepo" value="<?= set_value('date1') ?>"  style="cursor: pointer;" class="form-control datetrans"  onfocus=" (this.type='date' )" onblur="(this.type='text')">
             </div>
             <div class="" style="width:50%;">
                  <label for="">Rekening Bank</label>
                  <select name="" id="" class="form-select">
                      <option value="">Pilih</option>
                  </select>
             </div>
           </div>
           <div class="me-3 mb-3" style="width:fit-content;;">
              <h5>Pajak</h5>
           </div>
           <div class="d-flex mb-3" style="align-items: flex-end;">
             <div class="me-3" style="width:50%;">
                  <label for="">Gunakan VAT</label>
             </div>
			 <div class="form-check form-switch">
                    <input type="checkbox" name="vat"  value="11" class="form-check-input"  id="flexSwitchCheckDefault" >
                </div>
           </div>
           <div class="me-3 mb-3" style="width:fit-content;;">
              <h5>Cetak & Download</h5>
           </div>
           <div class="d-flex" style="align-items: flex-end;">
             <div class="me-3 mb-3">
               <button class="btn btn-light"><i class='bx bxs-download' >Download</i></button> 
               <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button> 
             </div>
           </div>     
           </div>
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
			<th style="background:#1143d8;color:white;text-align:right;">Harga</th>
			<th style="background:#1143d8;color:white;text-align:right;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty</th>
			<th style="background:#1143d8;color:white;text-align:right;">Type Discount</th>
			<th style="background:#1143d8;color:white;text-align:right;">Discount Item</th>
			<th style="background:#1143d8;color:white;text-align:right;">Total</th>
			<th style="background:#1143d8;color:white;text-align:right;">Action</th>
			</tr>
			</thead>
          </table>
		<table class="table table-striped table-hover">
			<tbody id="detailx">
		      
			</tbody>
		</table>
		  <div class="row rounded me-1" style="justify-content: end;">
			  <div class="col-2" style="text-align: end;background:#E6ECFF; width:fit-content">
				  <p>Subtotal</p>
				  <p>Discount</p>
				  <p>PPN</p>
				  <p>Ongkos Kirim</p>
				  <p>Grand Total</p>
			  </div>
			  <div class="col-2" style="text-align: end;background:#E6ECFF;">
				  <input type="text" id="subtotal" value="0" class="form-control">
				  <input type="text" id="discount" value="0" class="form-control">
				  <input type="text" id="ppn" value="0" class="form-control">
				  <input type="text" id="ongkir" value="0" class="form-control">
				  <input type="text" id="_grangtot" value="0" class="form-control">
			  </div>
		  </div>
          <div class="mr-4 mt-3" style="text-align:right;">
            <button type="button" class="btn btn-primary" style="font-size:13px;" id="addorder" onclick="addorder()">Buat Transaksi</button>
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
			<option value="<?php echo $key["nameitem"]. '     Rp. ' . $key["hargaitem"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditembom="<?php echo $key["iditembom"]; ?>" data-price="<?php echo $key["hargaitem"]; ?>" data-nameitem="<?php echo $key["nameitem"]; ?>" data-sku="<?php echo $key["sku"]; ?>" data-hargaitem="<?php echo $key["hargaitem"]; ?>"><?php echo $key["sku"] ; ?></option>
	<?php }
	} ?>
</datalist>
</body>
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

<script type="text/javascript">
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
		add_row_transaksi(0)
		var xitem = '';
	    xitem = '<?php
				$x = '';
				if ($data != 'Not Found') {
					foreach ($data as $key) {
						$x = $x . '<option value="' . $key["iditembom"] . '" price="' . $key["hargaitem"] . '" nameitem="' . $key["nameitem"] . '" sku="' . $key["sku"] . '">' . $key["sku"] . ' - ' . $key["nameitem"] . '</option>';
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
		tabel += '<tr class="result transaksi-row" style="border:none;text-align:center"height:1px" id="transaksi-' + xid + '"><input type="hidden" id="transaksi_' + xid + '_iditembom"  class="form-control  iditembom" name="transaksi_iditembom[]" / ></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text" class="form-control  sku" objtype="sku" id="transaksi_' + xid + '_sku" name="transaksi_sku[]" placeholder="Search" list="xitem" value="" autocomplete="off"></td>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" type="text"  readonly id="transaksi_' + xid + '_nameitem"  class="form-control "name="transaksi_nameitem[]" value=""/></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_harga" autocomplete="off" objtype="_harga" class="form-control  _harga" name="transaksi_harga[]' + xid + '_harga"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_qty" objtype="_qty" class="form-control  _qty" name="transaksi_qty[]' + xid + '_qty" autocomplete="off" value="0" onchange="count('+ xid +')"></td>';
		tabel += '<td class="p-0" style="border:none; width:12%;"><select class="form-control _typedisc" name="transaksi_typedisc[]"><option value="">Pilih</option><option value="Nominal">Nominal</option><option value="Persen">Persen</option></select>';
		tabel += '<td class="p-0" style="border:none;"><input style="text-align:center" autocomplete="off" type="number" id="transaksi_' + xid + '_disc"  class="form-control _disc" name="transaksi_disc[]' + xid + '_disc"  value="0" onchange="count('+ xid +')"></td>';
		tabel += '<td class="p-0" style="border:none;"><input type="number" id="transaksi_' + xid + '_total" objtype="_total" class="form-control _total" name="transaksi_total[]' + xid + '_total"  autocomplete="off" value="0" onchange="count('+ xid +')"></td>';
		tabel += '<td class="p-0" style="border:none;" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control " type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
		tabel += '</tr>';
		//return tabel;
		$('#line-transaksi').val(xid);
		$('#detailx').append(tabel);
		$('#transaksi_' + xid + '_nourut').val(lastid);
		// var i = document.getElementById("test").value = test1++;
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
			$('#transaksi_' + xid + 'qty').val(0);
		} else {
			$('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
			$('#transaksi_' + xid + '_iditembom').val(xobj.data('iditembom'));
			$('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
			$('#transaksi_' + xid + '_harga').val(xobj.data('hargaitem'));
			$('#transaksi_' + xid + 'qty').val(xobj.data('qty'));
		}
		calc();
	});

	$('form button').on("click", function(e) {
		if ($(this).attr('id') == "addorder") {
			var xask = '';
			if ($("#idpo").val() == "") {
				xask = "Simpan Transaksi?";
			} else {
				xask = "Ubah Transaksi?";
			}
			if (confirm(xask)) {
				if (validasi()) {
					addorder();
				}
			}
		} 
		e.preventDefault();
	});

	function validasi() {
		var xval = 0;
		var sts = 1;
		
		xval = $("#supplier").val();
		if (xval == "") {
			alert('Input Supplier');
			sts = 0;
			return false;
		}

		xval = $("#namewarehouse").val();
		if (xval == "") {
			alert('Input Gudang Penerima');
			sts = 0;
			return false;
		}

		xval = $("#datepo").val();
		if ($("#datepo").val() == '') {
			alert('Input Tanggal Masuk');
			sts = 0;
			return false;
		}

		xval = $("#mataung").val();
		if ($("#matauang").val() == '') {
			alert('Input Matauang');
			sts = 0;
			return false;
		}

		xval = $("#_qty").val();
		if ($("#_qty").val() == 0) {
			alert('Input QTY');
			sts = 0;
			return false;
		}

		xval = $("#_expiredate").val();
		if ($("#_expiredate").val() == "") {
			alert('Input Expiredate');
			sts = 0;
			return false;
		}

		$('input[objtype=expiredate]').each(function(i, obj) {

			xid = $(this).attr('id').replace("transaksi_", "").replace("_expiredate", "");
			if ($('#transaksi_' + xid + '_iditembom').val() != '') {
				if ($("#datepo").val() >= $(this).val()) {
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

	function count(xid)
	{
		var harga  = $('#transaksi_' + xid + '_harga').val();
		var qty    = $('#transaksi_' + xid + '_qty').val();
		var disc   = $('#transaksi_' + xid + '_disc').val();
		var totals = harga.replaceAll(".","") * qty - disc ;

		var tes   = $('#test').val(totals);


		$('#transaksi_' + xid + '_total').val(totals);

	}

	function addorder() {
		var cx = $('#form').serialize();
			$.post("<?php echo base_url('MasterDataControler/addpo') ?>", cx,
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
	}

	</script>