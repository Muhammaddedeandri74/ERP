<div class="container">
	<center><h3>User List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Item</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Username</center></th>
      <th scope="col"><center>Fullname</center></th>
      <th scope="col"><center>Email</center></th>
      <th scope="col"><center>Phone</center></th>
      <th scope="col"><center>Address</center></th>
      <th scope="col"><center>Status</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["username"] ?></center></td>
	  			<td><center><?php echo $key["fullname"] ?></center></td>
	  			<td><center><?php echo $key["email"] ?></center></td>
	  			<td><center><?php echo $key["phone"] ?></center></td>
	  			<td><center><?php echo $key["address"] ?></center></td>
	  			<?php if ($key["isactive"] == 1){ ?>
	  				<td><center>Active</center></td>
	  			<?php }else{ ?>
	  				<td><center>No-Active</center></td>
	  			<?php } ?>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["iduser"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["iduser"] ?>)">Delete</button></td>
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
            				<h4><i class="fas fa-book-medical"></i>  Form User</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Fullname</td>
								<td class ="noborder">
									<input type="text" id="fullname" name="fullname" class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Username</td>
								<td class ="noborder">
									<input type="text" id="username" name="username" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder" id="passwordold">
								<td class ="noborder">Password</td>
								<td class ="noborder">
									<input type="password" id="password" name="password"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Email</td>
								<td class ="noborder">
									<input type="text" id="email" name="email"class="form-control" required/>
								</td>
							</tr>

							<tr class ="noborder">
								<td class ="noborder">phone</td>
								<td class ="noborder">
									<input type="text" id="phone" name="phone"class="form-control" required/>
								</td>
							</tr>

							<tr class ="noborder">
								<td class ="noborder">Address</td>
								<td class ="noborder">
									<input type="text" id="address" name="address"class="form-control" required/>
								</td>
							</tr>

							<tr class ="noborder">
								<td class ="noborder">Status</td>
								<td class ="noborder">
									<select name="isactive" id="isactive" class="form-control" required>
										<option value="">Choosee</option>
										<option value="1">Active</option>
										<option value="0">No-Active</option>
									</select>
								</td>
							</tr>
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="adduser()">Add Supplier</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="edituser()">Edit Supplier</button> 
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
			$('#passwordold').show();
			document.getElementById("username").readOnly = false;
		}else{
			document.getElementById("username").readOnly = true;
			$('#passwordold').hide();
			$('#btn-add').hide();
			$('#btn-edit').show();

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/getdatauserbyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.iduser);
					$("[name ='username']").val(hasil.username);
					$("[name ='email']").val(hasil.email);
					$("[name ='fullname']").val(hasil.fullname);
					$("[name ='address']").val(hasil.address);
					$("[name ='phone']").val(hasil.phone);
					$("[name ='isactive']").val(hasil.isactive);
					
					
				}
			})
		}
	}

	function adduser()
	{
		var userid = <?php echo $iduser ?>;
		var username = $("[name ='username']").val();
		var password = $("[name ='password']").val();
		var email = $("[name ='email']").val();
		var fullname = $("[name ='fullname']").val();
		var address = $("[name ='address']").val();
		var phone = $("[name ='phone']").val();
		var status = $("[name ='isactive']").val();
		


		$.ajax({
			type:'POST',
			data :'username='+username+'&password='+password+'&email='+email+'&fullname='+fullname+'&address='+address+'&phone='+phone+'&status='+status+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/adduser') ?>',
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

	function edituser()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var username = $("[name ='username']").val();
		var password = $("[name ='password']").val();
		var email = $("[name ='email']").val();
		var fullname = $("[name ='fullname']").val();
		var address = $("[name ='address']").val();
		var phone = $("[name ='phone']").val();
		var status = $("[name ='isactive']").val();
		


		$.ajax({
			type:'POST',
			data :'username='+username+'&password='+password+'&email='+email+'&fullname='+fullname+'&address='+address+'&phone='+phone+'&status='+status+'&userid='+userid+'&id='+id,
			url :'<?php echo base_url('MasterDataControler/edituser') ?>',
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

	function deletedata(x){
		var  ask = confirm("Are You Sure Want Delete This User ?");

		if(ask){

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/deleteuser') ?> ',
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