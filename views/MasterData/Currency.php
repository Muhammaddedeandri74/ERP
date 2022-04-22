<div class="container">
	<center><h3>Currency List</h3></center>
</div>
<a href="#form" data-toggle = "modal" class="btn btn-primary" onclick="submit('add')"  style="float: right;"><i class="fas fa-plus-circle"></i>  Add New Currency</a>

<table class="table table-bordered" style="margin-top: 10px">
  <thead class="thead-light">
    <tr>
      <th scope="col"><center>#</center></th>
      <th scope="col"><center>Name Currency</center></th>
      <th scope="col"><center>Rate Currency</center></th>
      <th scope="col"><center>USE YN</center></th>
      <th scope="col" colspan="2"><center>Action</center></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php if ($data != "Not Found"){ $i =1; ?>
  		<?php foreach ($data as $key ): ?>
	  		<tr>
	  			<td><center><?php echo $i++ ?></center></td>
	  			<td><center><?php echo $key["namecurrency"] ?></center></td>
	  			<td><center><?php echo $key["kurscurrency"] ?></center></td>
	  			<td><center><?php echo $key["useyn"] ?></center></td>
	  			<td  style ="width: 5%"><a href="#form" class="btn btn-primary" onclick="submit(<?php echo $key["idcurrency"] ?>)"  data-toggle = "modal">Edit</a></td>
	  			<td  style ="width: 5%"><button class="btn btn-danger" onclick="deletedata(<?php echo $key["idcurrency"] ?>)">Delete</button></td>
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
            				<h4><i class="fas fa-book-medical"></i>  Form Currency</h4>
            				
            			</div>

            			
            			<table style="width:100%;border-collapse: collapse;"  class ="table"	>
		
							<tr class ="noborder">
								<center><p id="message"></p></center>
								<input type="hidden" id="id" name="id" class="form-control" class="form-control" />
								<input type="hidden" id="userid" name="userid" class="form-control" value="<?php echo $iduser?>" class="form-control" />
								
							</tr>
							<tr class ="noborder">
								<td class ="noborder">Currency Name</td>
								<td class ="noborder">
									<input type="text" id="currencyname" name="currencyname" class="form-control" required/>
								</td>
							</tr>
							
							<tr class ="noborder">
								<td class ="noborder">Rate Currency</td>
								<td class ="noborder">
									<input type="text" id="kurs" name="kurs"class="form-control" required/>
								</td>
							</tr>
							<tr class ="noborder" >
								<td class ="noborder">USE YN</td>
								<td class ="noborder">
									<select name="useyn" id="useyn" class="form-control" required>
										<option value="">Choose</option>
										<option value="Y">Y</option>
										<option value="N">N</option>
									</select>
								</td>
							</tr>
							
							<tr class ="noborder">
							<td class ="noborder"></td>
							<td class ="noborder">
								<button type="button" id="btn-add" class="btn btn-primary" onclick="addcurrency()">Add Currency</button> 
								<button type="button" id="btn-edit" class="btn btn-primary" onclick="editcurency()">Edit Currency</button> 
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
				url:'<?php echo base_url('MasterDataControler/getdatacurrencybyid') ?> ',
				dataType :'json',
				success :function(hasil){
					console.log(hasil);
					$('[name="id"]').val(hasil.idcurrency);
					$("[name ='currencyname']").val(hasil.currencyname);
					$("[name ='kurs']").val(hasil.kurs);
					$("[name ='useyn']").val(hasil.useyn);
					
				}
			})
		}
	}

	function addcurrency()
	{
		var userid = <?php echo $iduser ?>;
		var currencyname = $("[name ='currencyname']").val();
		var kurs = $("[name ='kurs']").val();
		var useyn = $("[name ='useyn']").val();

		$.ajax({
			type:'POST',
			data :'currencyname='+currencyname+'&kurs='+kurs+'&useyn='+useyn+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/addcurrency') ?>',
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

	function editcurency()
	{
		var id = $("[name ='id']").val();
		var userid = <?php echo $iduser ?>;
		var currencyname = $("[name ='currencyname']").val();
		var kurs = $("[name ='kurs']").val();
		var useyn = $("[name ='useyn']").val();

		$.ajax({
			type:'POST',
			data :'id='+id+'&currencyname='+currencyname+'&kurs='+kurs+'&useyn='+useyn+'&userid='+userid,
			url :'<?php echo base_url('MasterDataControler/editcurrency') ?>',
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
		var  ask = confirm("Are You Sure Want Delete This Currency ?");

		if(ask){

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('MasterDataControler/deletecurrency') ?> ',
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