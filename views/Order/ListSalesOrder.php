<div class="container">
	<center><h3>List Sales Order</h3></center>
</div>

<div>
	<form action="<?php echo base_url('OrderControler/salesorderdetail') ?>" method="POST">
		<table class="table table-bordered" style="width: 100%">
			<thead class="thead-dark">
				<tr>
					<th><center>Trans Date</center></th>
					<th><center>Trans Seq</center></th>
					<th><center>No Order</center></th>
					<th><center>Name Customer</center></th>
					<th><center>Amount</center></th>
					<th><center>Status</center></th>
					<th ><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
				<?php if ($data != "Not Found"){ ?>
					<?php foreach ($data as $key): ?>
						<tr>
							<td><center><?php echo $key["transdate"] ?><input type="hidden" name="transdate" value="<?php echo $key['transdate'] ?>"></center></td>
							<td><center><?php echo $key["transeq"] ?><input type="hidden" name="transeq" value="<?php echo $key['transeq'] ?>"></center></td>
							<td><center><?php echo $key["noorder"] ?><input type="hidden" name="noorder" value="<?php echo $key['noorder'] ?>"></center></td>
							<td><center><?php echo $key["namecust"] ?><input type="hidden" name="namecust" value="<?php echo $key['namecust'] ?>"></center></td>
							<td><center><?php echo $key["total"] ?><input type="hidden" name="total" value="<?php echo $key['total'] ?>"></center></td>
							<td><center><?php echo $key["status"] ?><input type="hidden" name="status" value="<?php echo $key['status'] ?>"><input type="hidden" name="namewarehouse" value="<?php echo $key['namewarehouse'] ?>"><input type="hidden" name="idwarehouse" value="<?php echo $key['idwarehouse'] ?>"></center></td>
							<td><center><button class="btn btn-primary" type="submit">Detail</button></center></td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr>
						<td colspan="8"><center>No Data</center></td>
					</tr>
				<?php } ?>	
			</tbody>
			
		</table>
	</form>

</div>