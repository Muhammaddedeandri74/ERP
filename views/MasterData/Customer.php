<div class="container">
	<center><h3>Customer List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Customer</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Name Customer</center></th>
      <th scope="col"><center>Phone Customer</center></th>
      <th scope="col"><center>Address Customer</center></th>
      <th scope="col"><center>Email YN</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["namecust"] ?></center></td>
	  			<td><center><?php echo $key["phonecust"] ?></center></td>
	  			<td><center><?php echo $key["addresscust"] ?></center></td>
	  			<td><center><?php echo $key["email"] ?></center></td>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["idcust"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["idcust"] ?>)">Delete</button></td>
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
            				<h4><i class="fas fa-book-medical"></i>  Form Customer</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Customer Name</td>
								<td class ="noborder">
									<input type="text" id="custname" name="custname" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
								<td class ="noborder">Phone Customer</td>
								<td class ="noborder">
									<input type="text" id="phonecust" name="phonecust"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Address Customer</td>
								<td class ="noborder">
									<input type="text" id="addresscust" name="addresscust"class="form-control" required/>
								</td>
							</tr><tr class ="noborder">
								<td class ="noborder">Email Customer</td>
								<td class ="noborder">
									<input type="text" id="email" name="email"class="form-control" required/>
								</td>
							</tr>
							
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="addcustomer()">Add Customer</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="editcustomer()">Edit Customer</button> 
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
				url:'<?php echo base_url('MasterDataControler/getdatacustomerbyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.idcust);
					$("[name ='custname']").val(hasil.custname);
					$("[name ='phonecust']").val(hasil.phonecust);
					$("[name ='addresscust']").val(hasil.addresscust);
					$("[name ='email']").val(hasil.email);
					
				}
			})
		}
	}

	function addcustomer()
	{
		var userid = <?php echo $iduser ?>;
		var custname = $("[name ='custname']").val();
		var phonecust = $("[name ='phonecust']").val();
		var addresscust = $("[name ='addresscust']").val();
		var email = $("[name ='email']").val();

		$.ajax({
			type:'POST',
			data :'custname='+custname+'&phonecust='+phonecust+'&addresscust='+addresscust+'&email='+email+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/addcustomer') ?>',
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

	function editcustomer()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var custname = $("[name ='custname']").val();
		var phonecust = $("[name ='phonecust']").val();
		var addresscust = $("[name ='addresscust']").val();
		var email = $("[name ='email']").val();

		$.ajax({
			type:'POST',
			data :'id='+id+'&custname='+custname+'&phonecust='+phonecust+'&addresscust='+addresscust+'&email='+email+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/editcustomer') ?>',
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
		var  ask = confirm("Are You Sure Want Delete This Customer ?");

		if(ask){

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/deletecustomer') ?> ',
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