<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="container">
	<center><h3>Import Data</h3></center>
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
			</div>
		
		</div>

		<div class="col">
			<label>Import Excel</label>
			<br>
			<div class="row">
				<div class="col">
					
						<input type="file" name="import" id="import" accept=".xls,.xlsx,.ods">
					
				</div>
				<div class="col">
					<button class="btn btn-primary" type="button" onclick="confirm()" >SAVE</button>
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
				<th><center>From</center></th>
			</tr>
		</thead>
		<?php $i = 0; ?>
		<tbody id="rowx">
			
			<?php
			if ($random != "") {
				if ($random[0][0] == null) {
					echo '<script>alert("Wow Your Excel Wrong Format For Upload") ;location.reload()</script>';
				}
				else{
				
			foreach ($random as $key ) :
				foreach ($data1 as $keys) :
					if (strtolower($keys["nameitem"]) == strtolower($key[0])) {
						$i++;
				?>

				<tr id="data<?php echo $i ?>" name="data<?php echo $i ?>">
					<td><input type="checkbox" id="selectx<?= $i?>" name="select[<?php echo $i ?>]" value="1" class="form-control" checked ></td>
					<td><input type="text"  class="form-control" readonly value="<?php echo $keys['nameitem']  ?>"> <input type="hidden" name="item[]" readonly value="<?php echo $keys['iditem'] ?>"></td>
					<td><input type="text" class="form-control" readonly value="<?php echo $keys["sku"] ?>"></td>
					<td><input type="text"  class="form-control" readonly value="<?php echo $key["Qty"] ?>" name="qty[]"></td>
					<td><input type="text"  class="form-control" readonly value="<?php echo $key["Price"] ?>" name="price[]"></td>
					<td><input type="text"  class="form-control" readonly value="<?php echo $key["From"] ?>"></td>
				</tr>

			<?php  }
				endforeach;
			endforeach; } ; }?>
			<input type="hidden" name="row" id="row" value="<?php echo $i ?>">
		</tbody>
	</table>
</div>
</form>

<pre id="result"></pre>


<script type="text/javascript">
	
	$("#import").on("change", function (e) {
   var file = e.target.files[0];
   // input canceled, return
   if (!file) return;
   
   var FR = new FileReader();
   FR.onload = function(e) {
     var data = new Uint8Array(e.target.result);
     var workbook = XLSX.read(data, {type: 'array'});
     var firstSheet = workbook.Sheets[workbook.SheetNames[0]];
     
     // header: 1 instructs xlsx to create an 'array of arrays'
     var result = XLSX.utils.sheet_to_json(firstSheet, { header: 2, blankRows :false});
     


     // data preview
     var output = document.getElementById('result');
     
     console.log(result);

     $.ajax({
        type:"POST",
        url:"",
        data:{id:XLSX.utils.sheet_to_json(firstSheet, { header: 2, blankRows :false })},
        success:function(result){
        $("#content").html(result);
        $("#submit").hide();
        }
        });


     // output.innerHTML = JSON.stringify(result, null, 2);
   };
   FR.readAsArrayBuffer(file);
});


	function confirm()
	{

		var row = $('#row').val();
		var cust = $('#cust').val();
		if (row == "0")
		{
			alert("Please Import Excel Data");
		}
		else
		{
			

			if (cust != "")
			{
				for (var i = 1; i <= row; i++) {
						if ($('#selectx'+i+'').is(":checked")) {
				            
				        }
				        else
				        {
				        	$('#data' + i + '').remove(); 
				        }
					}
	            	$('#form').submit();
			}
			else
			{
				alert("Please Insert Customer");
			}
		}
		

	}

	
</script>