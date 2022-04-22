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
			<p class="tu font-weight-bold upc" style="font-size: 25px">RETURN BARANG KE WAREHOUSE</p>
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
					<form action="<?php echo base_url("CounterController/addreturnitem") ?>" method='POST' id="post">
						<div class="row d-flex justify-content-between p-3">
							<div class="col-6">
								<p style="border-bottom: 3px solid orange;"><b> Masukan Informasi & Pilih Product</b></p>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-4 col-form-label tar">Deskripsi Return</label>
									<div class="col-sm-8">
										<textarea type="textarea" name="nareq" placeholder="Masukan Judul Return" class="form-control" required></textarea>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-4 col-form-label tar">Warehouse Tujuan</label>
									<div class="col-sm-8">
										<select name="idwh2" class="form-control">
											<?php if ($data1 != "Not Found") : ?>
												<?php foreach ($data1 as $key) : ?>
													<?php if ($key["attrib3"] == "mainwarehouse") : ?>
														<option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-6">
								<p style="border-bottom: 3px solid orange;" class="pl-5"><b> Pilih Product</b></p>
								<div class="row pb-3">
									<div class="col-4"></div>
									<select class=" selectpicker form-control col-8" data-live-search="true" onchange="chose(this.value)" id="selitem">
										<option value="" disabled selected>Cari Product atau Item</option>
										<?php if ($data != "Not Found") : ?>
											<?php foreach ($data as $key) : ?>
												<?php if ($key["qty"] > 0) : ?>
													<option value="<?php echo json_encode($key['iditem']) ?>"><?php echo $key["nameitem"] ?></option>
												<?php endif ?>

											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label tar">Name Product</label>
									<div class="col-sm-8">
										<input type="text" id="nameproduct" readonly class="form-control">
										<input type="hidden" id="usesn" readonly class="form-control">
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
								
								<div class="row">
									<div class="col-4">
									</div>
									<div class="col-8">
										<a href="#" class="btn btn-outline-info col-12" onclick="add()">+ Tambah Ke Daftar</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row d-flex justify-content-between">
							<div class="col-12 pl-5">
								<p>LIST PRODUCT</p>
								<input type="hidden" id="jmlitem" name="jmlitem" value="0">
								<table class="table border" id="table">
									<thead>
										<tr style="background: #999999; color: white">
											<td>Nama Product</td>
											<td>SKU</td>
											<td>SN AWAL</td>
											<td>SN AKHIR</td>
											<td>Qty</td>
											<td>EXP DATE</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody id="body">
									</tbody>
								</table>
								<div class="d-flex" style="float: right">
									<p>Jumlah Item </p>
									<p id="qtyitem">0</p>
									<input type="hidden" name="itemqty" id="itemqty" value="0">
								</div>
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
	const snawal = [];
	const snakhir = [];

	start()

	
	function add() {
		if ($('#nameproduct').val() == ""  ) {
			alert("Tolong Masukan Item, qty dan expired date dahulu")
		} else {
			var b = Number($('#jmlitem').val()) + Number(1);
			var baris = ''
			if ($('#usesn').val() == "Y")
			{

				baris += `
										<tr id="item` + b + `">
										<td><input type="hidden" name="iditem[]" id ="iditem-`+b+`" value="` + $('#idproduct').val() + `" ><input type="hidden" name="idwh[]" value="` + $('#idwh').val() + `" >` + $('#nameproduct').val() + `</td>
										<td>` + $('#skuproduct').val() + `</td>
										<td><input class ="form-control" type="text" name="snawal[]" id="snawal-`+b+`" onclick="move(`+b+`)" ></td>
										<td><input class ="form-control" type="text" name="snakhir[]" id="snakhir-`+b+`" onclick ="cekdatas(`+b+`)"></td>
										<td><input class ="form-control" type="text" name="qty[]" id="qty-`+b+`"  readonly></td>
										<td><input class ="form-control" type="text" name="expdate[]" id="expdate-`+b+`" readonly></td>
										<td><a href="#" class="btn btn-danger" onclick="del(` + b + `)">DELETE</a></td>
									</tr>

								 `

			}
			else{
				baris += `
										<tr id="item` + b + `">
										<td><input type="hidden" name="iditem[]" id ="iditem-`+b+`" value="` + $('#idproduct').val() + `" ><input type="hidden" name="idwh[]" value="` + $('#idwh').val() + `" >` + $('#nameproduct').val() + `</td>
										<td>` + $('#skuproduct').val() + `</td>
										<td><input class ="form-control" type="text" name="snawal[]" id="snawal-`+b+`" onclick="move(`+b+`)" value="0" readonly ></td>
										<td><input class ="form-control" type="text" name="snakhir[]" id="snakhir-`+b+`" onclick ="cekdatas(`+b+`)" value="0" readonly></td>
										<td><input class ="form-control" type="text" name="qty[]" id="qty-`+b+`"  ></td>
										<td><input class ="form-control" type="text" name="expdate[]" id="expdate-`+b+`" value="9999-12-31" readonly></td>
										<td><a href="#" class="btn btn-danger" onclick="del(` + b + `)">DELETE</a></td>
									</tr>

								 `
			}
			
			$('#jmlitem').val(Number($('#jmlitem').val()) + Number(1))
			$('#body').append(baris);
			$('#qtyitem').html(" " + $('#jmlitem').val())
		}

	}

	function chose(x) {
		var data = <?php echo json_encode($data) ?>;
		var baris = ''
		for (var i = 0; i < data.length; i++) {
			if (data[i]["iditem"] == x) {
				$('#idproduct').val(data[i]["iditem"])
				$('#idwh').val(data[i]["idwh"])
				$('#nameproduct').val(data[i]["nameitem"])
				$('#skuproduct').val(data[i]["sku"])
				$('#usesn').val(data[i]["usesn"])
				$('#qty').val(0)
				
				
				
			}
		}
		

	}

	function start() {
		var data = <?php echo json_encode($data) ?>;
		var id = <?php echo json_encode($iditem) ?>;
		var baris = '';
		var b = 0;
		console.log(data)
		for (var i = 0; i < data.length; i++) {
			
			for (var x = 0; x < data[i]["data1"].length; x++) {

				for (var a = 0; a < id.length; a++) {

					if (data[i]["data1"][x]["iditem"] == id[a]) {

						baris += `
									<tr id="item` + b + `">
										<td><input type="hidden" name="iditem[]" id ="iditem-`+b+`" value="` + data[i]["iditem"] + `" ><input type="hidden" name="idwh[]" value="` + data[i]["idwh"] + `" >` + data[i]["nameitem"] + `</td>
										<td>` + data[i]["sku"] + `</td>
										<td><input class ="form-control" type="text" name="snawal[]" id="snawal-`+b+`"  value="` + data[i]["data1"][x]["idsn"] + `" onclick="move(`+b+`)"></td>
										<td><input class ="form-control" type="text" name="snakhir[]" id="snakhir-`+b+`" value="` + data[i]["data1"][x]["idsn2"] + `" onclick ="cekdatas(`+b+`)"></td>
										<td><input class ="form-control" type="text" name="qty[]" id="qty-`+b+`" value="` + (data[i]["data1"][x]["idsn2"] - data[i]["data1"][x]["idsn"]) + `" readonly></td>
										<td><input class ="form-control" type="text" name="expdate[]" id="expdate-`+b+`" value="` + data[i]["data"][x]["expdate"] + `" readonly></td>
										<td><a href="#" class="btn btn-danger" onclick="del(` + b + `)">DELETE</a></td>
									</tr>

								 `
						b++;

						snawal.push(data[i]["data1"][x]["idsn"])
						snakhir.push(data[i]["data1"][x]["idsn2"])
					}
				}

			}

		}


		$('#body').html(baris);
		$('#jmlitem').val(0);
		$('#qtyitem').html(" 0")
	}


	function move(x)
	{
		console.log(x)
		$("#snawal-"+x+"").keyup(function(event) {
		    if (event.keyCode === 13) {
		      	$("#snakhir-"+x+"").focus();
		    }
		});
	}

	function cekdatas(x)
	{
		
		$("#snakhir-"+x+"").keyup(function(event) {
		    if (event.keyCode === 13) {
		      	ceksn(x);
		    }
		});
	}


	function ceksn(v)
	{
		
		if ($("#snawal-"+v+"").val() != "" && $("#snakhir-"+v+"").val() != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('CounterController/ceksn') ?>",
                data: 'snno1=' + $("#snawal-"+v+"").val() + '&snno2=' + $("#snakhir-"+v+"").val() + '&idso=0' ,
                dataType: "json",
                success: function(hasil) {

                    console.log(hasil);
                    var loop = 0;
                    var lebih = 0;

                    if (hasil["pesan"] == "Success") {

                    	if (hasil["data"][0]["iditem"] == $('#iditem-'+v).val())
                    	{
                    		 var snawal1; var snakhir1;
                                            if ($('#snakhir-'+v).val().length >= 20)
                                            {

                                                snakhir1 = $('#snakhir-'+v).val().slice(0,-1); 
                                            }
                                            else
                                            {
                                                snakhir1 =  $('#snakhir-'+v).val();  
                                            }
                                            if ($('#snawal-'+v).val().length >= 20)
                                            {
                                                snawal1 =   $('#snawal-'+v).val().slice(0,-1)
                                            }
                                            else
                                            {
                                                snawal1 =  $('#snawal-'+v).val()
                                            }
                                            
                                           console.log(snakhir1.substr(snakhir1.length - 5) +" "+snawal1.substr(snawal1.length - 5))
                                            var qty = Number(snakhir1.substr(snakhir1.length - 5) - snawal1.substr(snawal1.length - 5)) + Number(1)
                                            console.log(snakhir1.substr(snakhir1.length - 5) - snawal1.substr(snawal1.length - 5))
                                            

                    		loop = 0;
                    		for (var i = 0; i < snawal.length; i++) {
                    			if ($('#snawal-'+v).val() == snawal[i] || $('#snakhir-'+v).val() == snawal[i])
                    			{
                    				
                    				alert("SN Telah di Scan Sebelumnya");
                    				break;
                    			}	
                    		}

                    		for (var i = 0; i < snawal.length; i++) {
                    			if ($('#snawal-'+v).val() == snakhir[i] || $('#snakhir-'+v).val() == snakhir[i])
                    			{
                    				
                    				alert("SN Telah di Scan Sebelumnya");
                    				break;
                    			}	
                    		}

                    		snawal.push($('#snawal-'+v).val());
                    		snakhir.push($('#snakhir-'+v).val());
                    		 $('#expdate-' + v ).val(hasil["data"][0]["expdate"])                    		 
		                     $('#qty-' + v ).val(qty)
		                     calculate($('#qty-'+v).val(),"add");

                    	}
                    	else
                    	{
                    		console.log(snawal)
                    		alert("SN yang discan SALAH")
                    	}

                    } else {
                    	console.log(snawal)
                        alert(hasil["pesan"]);
                        
                    }


                }
            });
        } else {
            alert('Tolong input SN terlebih dahulu');
            
        }


	}

	function calculate(x,y)
	{
		if (y == "add")
		{
			$('#itemqty').val(Number($('#itemqty').val()) + Number(x));	
		}
		else
		{
			$('#itemqty').val(Number($('#itemqty').val()) - Number(x));
		}
		
	}


	function del(x) {
		if (confirm('Hapus Item Ini?')) {
			$('#item' + x + '').remove();
		}
		 calculate($('#qty-'+x).val(),"del");



	}

	function order() {
		var tbl = document.getElementById('table');

		if (tbl.rows.length == 1) {
			alert("Pilih Item Terlebih dahulu")
		} else {
			$('#post').submit();
		}
	}

	function back() {
		window.location.href = "<?php echo base_url('CounterController/expired') ?>";
	}
</script>