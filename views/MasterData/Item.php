<div class="container">
	<center><h3>Item List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Item</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Name Item</center></th>
      <th scope="col"><center>Price Item</center></th>
      <th scope="col"><center>SKU</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["nameitem"] ?></center></td>
	  			<td><center><?php echo $key["priceitem"] ?></center></td>
	  			<td><center><?php echo $key["sku"] ?></center></td>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["iditem"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["iditem"] ?>)">Delete</button></td>
	  		</tr>	
  		<?php endforeach ?>
  		
  	<?php }else{ ?>
  		<tr>
  			<td colspan="5"><center>No Data</center></td>
  		</tr>
  	<?php } ?>	
  </tbody>
</table>


 <!-- Content Modal -->
            <div class="modal fade" id="form" role="dialog">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h4><i class="fas fa-book-medical"></i>  Form Item</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Item Name</td>
								<td class ="noborder">
									<input type="text" id="itemname" name="itemname" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
								<td class ="noborder">Item Price</td>
								<td class ="noborder">
									<input type="text" id="priceitem" name="priceitem"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">SKU</td>
								<td class ="noborder">
									<input type="text" id="sku" name="sku"class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="additem()">Add Item</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="edititem()">Edit Item</button> 
								<button class="btn btn-primary" data-dismiss="modal" type="button">Cancel</button>
							</tr>
							<br>
						</table>

            		</div>
            	</div>
            </div>

<script type="text/javascript">
	function submit(x){
		let inputs = document.querySelectorAll('input');
  		inputs.forEach(input => input.value = '');
		if(x=='add'){
			$('#btn-add').show();
			$('#btn-edit').hide();
		}else{

			$('#btn-add').hide();
			$('#btn-edit').show();

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/getdataitembyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.iditem);
					$("[name ='itemname']").val(hasil.itemname);
					$("[name ='priceitem']").val(hasil.priceitem);
					$("[name ='sku']").val(hasil.sku);
					
					
				}
			})
		}
	}

	function additem()
	{
		var userid = <?php echo $iduser ?>;
		var itemname = $("[name ='itemname']").val();
		var priceitem = $("[name ='priceitem']").val();
		var sku = $("[name ='sku']").val();
	

		$.ajax({
			type:'POST',
			data :'itemname='+itemname+'&priceitem='+priceitem+'&sku='+sku+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/additem') ?>',
			dataType :'json',
			success : function(hasil){
				 if (hasil == "Success")
				 {
				 	location.reload();
				 }
				 else
				 {
				 	alert(hasil);
				 }
			
			}
		})
		
	}

	function edititem()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var itemname = $("[name ='itemname']").val();
		var priceitem = $("[name ='priceitem']").val();
		var sku = $("[name ='sku']").val();
	

		$.ajax({
			type:'POST',
			data :'id='+id+'&itemname='+itemname+'&priceitem='+priceitem+'&sku='+sku+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/edititem') ?>',
			dataType :'json',
			success : function(hasil){
				 if (hasil == "Success")
				 {
				 	location.reload();
				 }
				 else
				 {
				 	alert(hasil);
				 }
			
			}
		})
		
	}

	function deletedata(x){
		var  ask = confirm("Are You Sure Want Delete This Item ?");

		if(ask){

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/deleteitem') ?> ',
				dataType :'json',
				success :function(hasil){
					if (hasil == "Success")
					{
						location.reload();
					}
					else{
						alert(hasil);
					}
				}
			})

		}

	}

</script>