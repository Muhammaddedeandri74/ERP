<div class="container">
	<center><h3>Quotation</h3></center>
</div>

 <?php echo $this->session->flashdata('message'); ?> 
 <?php $this->session->set_flashdata('message',''); ?>

<form id="form" action="<?php echo base_url('RequestControler/quotationinsert') ?>" method = "POST">
<div style="margin: 10px">
	<div class="row">
		<div class="col">
			<label>Trans Date</label>
			<input type="date" name="transdate" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
		</div>

		<div class="col">
			<label>Trans Seq</label>
			<input type="text" name="transeq" class="form-control" readonly value="<?php echo $seq ?>">
			<input type="hidden" class="form-control" value="0" id="listrow" name ="listrow">
			<input type="hidden" class="form-control" value="<?php echo $iduser ?>" id="iduser" name ="iduser">
		</div>

		<div class="col">
			<label>Customer List</label>
			<br>
			<div class="row">
				<div class="col">
						<select class="form-control" style="width:100%" id="cust" name = "idcust" required>
							<option value="">Choosee</option>
							<?php foreach ($data as $key): ?>
								<option value="<?php echo $key["idcust"] ?>" ><?php echo $key["namecust"] ?></option>
							<?php endforeach ?>
						</select>
				</div>
				<div class="col">
					<button class="btn btn-primary" type="submit" >SAVE</button>
				</div>
			</div>
		
		</div>
	</div>
</div>

<div>
	<table style="width: 100%" class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th><center>Action</center></th>
				<th><center>Name Item</center></th>
				<th><center>SKU</center></th>
				<th><center>Qty</center></th>
				<th><center>Price</center></th>
			</tr>
		</thead>
		<tbody id="rowx">
			
		</tbody>
	</table>
</div>
</form>


<script type="text/javascript">
	$("#cust").select2();
	addrow();

	function addrow()
	{
		var xrow = document.getElementById("listrow").value;
		var xrowx = Number(xrow) + 1;
		var baris = `<tr id="transaksi-` + xrowx + `">
							<td class="wd30" id="transaksi-` + xrowx + `-actionmn" ><center><input type="button" value="+" id="transaksi-` + xrowx + `-action" onclick="javaScript:addrow();"/></center></td>
							<td id="items`+xrowx+`"><select onchange= "itemselect(this.value,`+xrowx+`)" id="item[`+xrowx+`]" name="item[]" class="form-control" required>
							<option value="">Choosee</option>
							<?php foreach ($data1 as $key ): ?>
								<option value='<?php echo $key["iditem"] ?>'><?php echo $key["nameitem"] ?></option>
							<?php endforeach ?>
						</select></td>
						<td id="skus`+xrowx+`"><input type="text"  readonly class = "form-control" id="sku[`+xrowx+`]" name="sku[]" required></td>
						<td id="qtys`+xrowx+`"><input type="number"  class = "form-control" required id="qty[`+xrowx+`]" name="qty[]" onchange ="qtycount(this.value,`+xrowx+`)"></td>
						<td id="prices`+xrowx+`"><input type="text"  readonly class = "form-control" required id="price[`+xrowx+`]" name="price[]"></td>
						<td id="prices`+xrowx+`"><input type="hidden"  readonly class = "form-control" required id="pricex[`+xrowx+`]" name="pricex[]"></td>
					</tr>`;
					$("#rowx").append(baris);
					document.getElementById("listrow").value = xrowx; 
					if (xrow != 0) {
					    var xold = $('#transaksi-' + xrow   + '-actionmn').html();
					    $('#transaksi-' + xrow  + '-actionmn').html(xold.replace('javaScript:addrow();', 'javaScript:removerow(' + xrow + ');').replace('value="+"', 'value="x"'));
					};			

	}

	function removerow(numrow)
	{
		 
            if (confirm('Remove Line?')) {
            	$('#transaksi-' + numrow + '').remove(); 
     		}      
        
	}

	function itemselect(x,y)
	{
		$.ajax({
		  type: "POST",
		  url: "<?php echo base_url('RequestControler/getitemdata') ?>",
		  data: 'id='+x,
		  dataType: "json",
		  success :function(hasil){
		  	
		  	document.getElementById("sku["+y+"]").value = hasil.sku; 
		  	document.getElementById("qty["+y+"]").value = 1; 
		  	document.getElementById("price["+y+"]").value = hasil.priceitem; 
		  	document.getElementById("pricex["+y+"]").value = hasil.priceitem; 
		  }
		});
	}

	function qtycount(x,y)
	{
			document.getElementById("price["+y+"]").value = Number(x) * Number(document.getElementById("pricex["+y+"]").value) ;
	}



</script>