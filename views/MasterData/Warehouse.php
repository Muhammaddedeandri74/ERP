<div class="container">
	<center><h3>Warehouse List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Item</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Name warehouse</center></th>
      <th scope="col"><center>Address Warehouse</center></th>
      <th scope="col"><center>Phone Warehouse</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["namewarehouse"] ?></center></td>
	  			<td><center><?php echo $key["addresswarehouse"] ?></center></td>
	  			<td><center><?php echo $key["phonewarehouse"] ?></center></td>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["idwarehouse"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["idwarehouse"] ?>)">Delete</button></td>
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
            				<h4><i class="fas fa-book-medical"></i>  Form Warehouse</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Warehouse Name</td>
								<td class ="noborder">
									<input type="text" id="namewarehouse" name="namewarehouse" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
								<td class ="noborder">Warehouse Address</td>
								<td class ="noborder">
									<input type="text" id="addresswarehouse" name="addresswarehouse"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Warehouse Phone</td>
								<td class ="noborder">
									<input type="text" id="phonewarehouse" name="phonewarehouse"class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="addwarehouse()">Add Warehouse</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="editwarehouse()">Edit Warehouse</button> 
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
				url:'<?php echo base_url('MasterDataControler/getdatawarehousebyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.idwarehouse);
					$("[name ='namewarehouse']").val(hasil.namewarehouse);
					$("[name ='addresswarehouse']").val(hasil.addresswarehouse);
					$("[name ='phonewarehouse']").val(hasil.phonewarehouse);
					
					
				}
			})
		}
	}

	function addwarehouse()
	{
		var userid = <?php echo $iduser ?>;
		var namewarehouse = $("[name ='namewarehouse']").val();
		var addresswarehouse = $("[name ='addresswarehouse']").val();
		var phonewarehouse = $("[name ='phonewarehouse']").val();
	

		$.ajax({
			type:'POST',
			data :'namewarehouse='+namewarehouse+'&addresswarehouse='+addresswarehouse+'&phonewarehouse='+phonewarehouse+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/addwarehouse') ?>',
			dataType :'json',
			success : function(hasil){
					// console.log(namewarehouse+" "+addresswarehouse+" "+phonewarehouse+" "+userid);
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

	function editwarehouse()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var namewarehouse = $("[name ='namewarehouse']").val();
		var addresswarehouse = $("[name ='addresswarehouse']").val();
		var phonewarehouse = $("[name ='phonewarehouse']").val();
	

		$.ajax({
			type:'POST',
			data :'id='+id+'&namewarehouse='+namewarehouse+'&addresswarehouse='+addresswarehouse+'&phonewarehouse='+phonewarehouse+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/editwarehouse') ?>',
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
		var  ask = confirm("Are You Sure Want Delete This Warehouse ?");

		if(ask){

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/deletewarehouse') ?> ',
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