<div class="container">
	<center><h3>Supplier List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Item</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Name Supplier</center></th>
      <th scope="col"><center>Address Supplier</center></th>
      <th scope="col"><center>Phone Supplier</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["namesupp"] ?></center></td>
	  			<td><center><?php echo $key["addresssup"] ?></center></td>
	  			<td><center><?php echo $key["phonesupp"] ?></center></td>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["idsupp"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["idsupp"] ?>)">Delete</button></td>
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
            				<h4><i class="fas fa-book-medical"></i>  Form Supplier</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Supplier Name</td>
								<td class ="noborder">
									<input type="text" id="namesupp" name="namesupp" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
								<td class ="noborder">Supplier Address</td>
								<td class ="noborder">
									<input type="text" id="addresssupp" name="addresssupp"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Supplier Phone</td>
								<td class ="noborder">
									<input type="text" id="phonesupp" name="phonesupp"class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="addsupp()">Add Supplier</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="editsupp()">Edit Supplier</button> 
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
				url:'<?php echo base_url('MasterDataControler/getdatasupplierbyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.idsupp);
					$("[name ='namesupp']").val(hasil.namesupp);
					$("[name ='addresssupp']").val(hasil.addresssupp);
					$("[name ='phonesupp']").val(hasil.phonesupp);
					
					
				}
			})
		}
	}

	function addsupp()
	{
		var userid = <?php echo $iduser ?>;
		var namesupp = $("[name ='namesupp']").val();
		var addresssupp = $("[name ='addresssupp']").val();
		var phonesupp = $("[name ='phonesupp']").val();
	

		$.ajax({
			type:'POST',
			data :'namesupp='+namesupp+'&addresssupp='+addresssupp+'&phonesupp='+phonesupp+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/addsupplier') ?>',
			dataType :'json',
			success : function(hasil){
					// console.log(namesupp+" "+addresssupp+" "+phonesupp+" "+userid);
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

	function editsupp()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var namesupp = $("[name ='namesupp']").val();
		var addresssupp = $("[name ='addresssupp']").val();
		var phonesupp = $("[name ='phonesupp']").val();
	

		$.ajax({
			type:'POST',
			data :'id='+id+'&namesupp='+namesupp+'&addresssupp='+addresssupp+'&phonesupp='+phonesupp+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/editsupp') ?>',
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
				url:'<?php echo base_url('MasterDataControler/deletesupp') ?> ',
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