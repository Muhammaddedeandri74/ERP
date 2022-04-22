<div class="container">
	<center>
		<h3>Sales Order</h3>
	</center>
</div>

<?php echo $this->session->flashdata('message'); ?>
<?php $this->session->set_flashdata('message', ''); ?>

<form id="form" action="<?php echo base_url('OrderControler/insertsalesorder') ?>" method="POST">
	<div style="margin: 10px">
		<div class="row">
			<div class="col">
				<label>Trans Date</label>
				<input type="date" name="transdate" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
			</div>

			<div class="col">
				<label>Trans Seq</label>
				<input type="text" name="transeq" class="form-control" value="<?php echo $seq ?>" readonly>
				<input type="hidden" class="form-control" value="0" id="listrow" name="listrow">
				<input type="hidden" class="form-control" value="<?php echo $iduser ?>" id="iduser" name="iduser">
			</div>

			<div class="col">
				<label>Customer List</label>
				<select class="form-control" id="cust" name="idcust" required>
					<option value="">Choosee</option>
					<?php foreach ($data as $key) : ?>
						<option value="<?php echo $key["idcust"] ?>"><?php echo $key["namecust"] ?></option>
					<?php endforeach ?>
				</select>

			</div>

			<div class="col">
				<label>Warehouse List</label>
				<select class="form-control" id="warehouse" name="warehouse" required>
					<option value="">Choosee</option>
					<?php foreach ($data3 as $key) : ?>
						<option value="<?php echo $key["idwarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
					<?php endforeach ?>
				</select>

			</div>

			<div class="col" style="width: 200%">

				<?php if ($data2 == "Not Found") { ?>
					<br>
				<?php } else { ?>
					<label>Request List</label>
					<br>
				<?php } ?>

				<div class="row">
					<div class="col">
						<?php if ($data2 != "Not Found") : ?>

							<select class="form-control" id="request" name="request">
								<option value="">Choosee</option>
								<?php foreach ($data2 as $key) : ?>
									<option value="<?php echo $key["norequest"] ?>"><?php echo $key["namemedia"]  ?> - <?php echo $key["norequest"] ?></option>
								<?php endforeach ?>
							</select>
						<?php endif ?>

					</div>
					<div class="col">
						<button class="btn btn-primary" type="submit">SAVE</button>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div>
		<table style="width: 100%" class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>
						<center>Action</center>
					</th>
					<th>
						<center>Name Item</center>
					</th>
					<th>
						<center>SKU</center>
					</th>
					<th>
						<center>Qty</center>
					</th>
					<th>
						<center>Price</center>
					</th>
					<th colspan="2">
						<center>Disc</center>
					</th>
					<th>
						<center>Total</center>
					</th>
				</tr>
			</thead>
			<tbody id="rowx">

			</tbody>
			<tfoot>
				<tr>
					<td colspan="5">Sub Total</td>
					<td colspan="3"><input type="" value="0" name="subtotal" id="subtotal" readonly required class="form-control"></td>
				</tr>
				<tr>
					<td colspan="5">Discount</td>
					<td colspan="1"><input type="" value="0" name="disc1ratio" id="disc1ratio" onchange="disc1ratioaction(this.value)" disabled class="form-control"></td>
					<td colspan="2"><input type="" value="0" name="disc1" id="disc1" onchange="disc1action(this.value)" disabled class="form-control"></td>
				</tr>
				<tr>
					<td colspan="5">PPN</td>
					<td colspan="1"><input type="" name="ppnratio" id="ppnratio" value="10%" readonly required class="form-control"></td>
					<td colspan="2"><input type="" value="0" name="ppn" id="ppn" readonly required class="form-control"></td>
				</tr>
				<tr>
					<td colspan="5">Grand Total</td>
					<td colspan="3"><input type="" value="0" name="grandtotal" id="grandtotal" readonly required class="form-control"></td>
				</tr>
			</tfoot>
		</table>
	</div>
</form>


<script type="text/javascript">
	$("#cust").select2();
	$("#warehouse").select2();
	$("#request").select2();

	addrow();

	$('#form').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) {
			e.preventDefault();
			return false;
		}
	});

	function addrow() {
		var xrow = document.getElementById("listrow").value;
		var xrowx = Number(xrow) + 1;
		var baris = `<tr id="transaksi-` + xrowx + `">
							<td class="wd30" id="transaksi-` + xrowx + `-actionmn" ><center><input type="button" value="+" id="transaksi-` + xrowx + `-action" onclick="javaScript:addrow();"/></center></td>
							<td id="items` + xrowx + `"  style="width:410px"><select onchange= "itemselect(this.value,` + xrowx + `)" id="item[` + xrowx + `]" name="item[]" class="form-control" required>
							<option value="">Choosee</option>
							<?php foreach ($data1 as $key) : ?>
								<option value='<?php echo $key["iditem"] ?>'><?php echo $key["nameitem"] ?></option>
							<?php endforeach ?>
						</select></td>
						<td id="skus` + xrowx + `"  style="width:310px"><input type="text"  readonly class = "form-control" id="sku[` + xrowx + `]" name="sku[]" required></td>
						<td id="qtys` + xrowx + `" style="width:110px"><input type="number"  class = "form-control" required id="qty[` + xrowx + `]" name="qty[]" onchange ="qtycount(this.value,` + xrowx + `)"></td>
						<td id="prices` + xrowx + `"><input type="text"  readonly class = "form-control" required id="price[` + xrowx + `]" name="price[]"></td>
						<td id="prices` + xrowx + `"  style="width:110px"><input type="text"   class = "form-control" value ="0%" required id="discratio[` + xrowx + `]" name="discratio[]" onchange="discratioaction(this.value,` + xrowx + `)" disabled></td>
						<td id="prices` + xrowx + `"><input type="text"   class = "form-control" value ="0" required id="disc[` + xrowx + `]" name="disc[]" onchange ="discaction(this.value,` + xrowx + `)" disabled></td>
						<td id="prices` + xrowx + `"><input type="text" value="0"  readonly class = "form-control" required id="total[` + xrowx + `]" name="total[]"></td>
						<td id="prices` + xrowx + `"><input type="hidden"  readonly class = "form-control" required id="pricex[` + xrowx + `]" name="pricex[]"></td>
					</tr>`;
		$("#rowx").append(baris);


		document.getElementById("listrow").value = xrowx;
		if (xrow != 0) {
			var xold = $('#transaksi-' + xrow + '-actionmn').html();
			$('#transaksi-' + xrow + '-actionmn').html(xold.replace('javaScript:addrow();', 'javaScript:removerow(' + xrow + ');').replace('value="+"', 'value="x"'));
		};
		count();

	}

	function removerow(numrow) {

		if (confirm('Remove Line?')) {
			$('#transaksi-' + numrow + '').remove();

		}
		count();
	}

	function itemselect(x, y) {
		if (x != "") {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('RequestControler/getitemdata') ?>",
				data: 'id=' + x,
				dataType: "json",
				success: function(hasil) {

					document.getElementById("sku[" + y + "]").value = hasil.sku;
					document.getElementById("qty[" + y + "]").value = 1;
					document.getElementById("price[" + y + "]").value = hasil.priceitem;
					document.getElementById("pricex[" + y + "]").value = hasil.priceitem;
					document.getElementById("total[" + y + "]").value = hasil.priceitem;
					document.getElementById("disc[" + y + "]").disabled = false;
					document.getElementById("discratio[" + y + "]").disabled = false;
					document.getElementById("disc1").disabled = false;
					document.getElementById("disc1ratio").disabled = false;
					count();
				}
			});
		} else {
			document.getElementById("sku[" + y + "]").value = 0;
			document.getElementById("qty[" + y + "]").value = 0;
			document.getElementById("price[" + y + "]").value = 0;
			document.getElementById("pricex[" + y + "]").value = 0;
			document.getElementById("total[" + y + "]").value = 0;
			document.getElementById("disc[" + y + "]").disabled = true;
			document.getElementById("discratio[" + y + "]").disabled = true;
			document.getElementById("disc1").disabled = true;
			document.getElementById("disc1ratio").disabled = true;
			count();
		}



	}

	function qtycount(x, y) {
		document.getElementById("total[" + y + "]").value = Number(x) * Number(document.getElementById("pricex[" + y + "]").value);
		document.getElementById("price[" + y + "]").value = Number(x) * Number(document.getElementById("pricex[" + y + "]").value);
		count();
	}


	function discratioaction(x, y) {
		var disc = document.getElementById("price[" + y + "]").value * document.getElementById("discratio[" + y + "]").value.replace("%") / 100;
		document.getElementById("disc[" + y + "]").value = disc;
		document.getElementById("total[" + y + "]").value = document.getElementById("price[" + y + "]").value - document.getElementById("disc[" + y + "]").value;
		count();
	}

	function discaction(x, y) {
		document.getElementById("total[" + y + "]").value = document.getElementById("price[" + y + "]").value - document.getElementById("disc[" + y + "]").value;
		document.getElementById("discratio[" + y + "]").value = 0;
		count();
	}


	function count() {

		var count = document.getElementById("listrow").value;
		var sum = 0;
		for (var i = 1; i <= count; i++) {
			if (document.getElementById("total[" + i + "]") != null) {
				sum = Number(sum) + Number(document.getElementById("total[" + i + "]").value);
			}

		}
		document.getElementById("subtotal").value = sum;
		document.getElementById("ppn").value = (document.getElementById("subtotal").value - document.getElementById("disc1").value) * (document.getElementById("ppnratio").value.replace("%", "") / 100);
		document.getElementById("grandtotal").value = document.getElementById("subtotal").value - document.getElementById("disc1").value + Number(document.getElementById("ppn").value);

	}

	function disc1ratioaction(x) {
		var disc = document.getElementById("subtotal").value * document.getElementById("disc1ratio").value.replace("%") / 100;
		document.getElementById("disc1").value = disc;
		count();
	}

	function disc1action(x) {
		document.getElementById("disc1ratio").value = 0;
		count();
	}
</script>