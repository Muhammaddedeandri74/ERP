<div class="container">
	<center><h3>Sales Order Detail</h3></center>
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
					<th><center>Warehouse</center></th>
					<th><center>Status</center></th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><center><?php echo $transdate?></center></td>
					<td><center><?php echo $transeq?></center></td>
					<td><center><?php echo $noorder?><input type="hidden" name="noorder" value="<?php echo $noorder ?>"></center></td>
					<td><center><?php echo $namecust?></center></td>
					<td><center><?php echo $total?></center></td>
					<td><center><?php echo $namewarehouse?></center></td>
					<td><center><?php echo $status?></center></td>
					<?php if ($status == "Waiting"){ ?>
						<td><center><button class="btn btn-primary">Process</button></center></td>	
					<?php }else{ ?>
						<td><center><button class="btn btn-primary">Cancel</button></center></td>	
					<?php } ?>					
				</tr>
			</tbody>
			
		</table>

		<div class="container" style="margin-top: 50px">
			<center><h3>Item Detail</h3></center>
		</div>

		<table class="table table-bordered" style="width: 100%">
			<thead class="thead-dark">
				<tr>
					<th><center>#</center></th>
					<th><center>Name Item</center></th>
					<th><center>SKU</center></th>
					<th><center>Price</center></th>
					<th><center>Discount</center></th>
					<th><center>Amount</center></th>
					<th><center>Qty Request</center></th>
					<th><center>Qty Ready</center></th>
					<th><center>Status</center></th>
				</tr>
			</thead>
			<tbody>
				<?php $cant = 0; $i = 1;  foreach ($data as $key ): ?>
					<tr>
						<td><center><?php echo $i++ ?></center></td>
						<td><center><?php echo $key["nameitem"] ?></center></td>
						<td><center><?php echo $key["sku"]?></center></td>
						<td><center><?php echo $key["price"] ?></center></td>
						<td><center><?php echo $key["disc"] ?></center></td>
						<td><center><?php echo $key["total"] ?></center></td>
						<td><center><?php echo $key["qty"] ?></center></td>
						<td><center><?php echo $key["qtyready"] ?></center></td>
						<?php if ($key["qty"] <= $key["qtyready"]){ ?>
							<td><center><h5 style="color:green">Ready For Process</h5></center></td>	
						<?php }else{ ?>
							<td><center><h5 style="color:red">Qty Ready Not Support</h5></center></td>
						<?php $cant++; } ?>							
					</tr>		
				<?php endforeach ?>
				<input type="hidden" name="cant" value="<?php echo $cant ?>">	
			</tbody>
			
		</table>
	</form>

</div>