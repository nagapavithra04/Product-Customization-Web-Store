<div class="container-fluid">
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Size</th>
				<th>Order</th>
				<th>Amount</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$total = 0;
			include 'db_connect.php';
			$qry = $conn->query("SELECT o.id,o.order_id,o.qty,o.size,o.product_id,o.customize, p.name,ci.img_path,p.price FROM order_list o JOIN custom_image ci ON o.product_id = ci.id JOIN custom_product_list p ON ci.custom_product_id = p.id WHERE order_id = ".$_GET['id']." AND o.customize = 1 UNION SELECT o.id,o.order_id,o.qty,o.size,o.product_id,o.customize,  pl.name,pl.img_path,pl.price FROM order_list o JOIN product_list pl ON o.product_id = pl.id WHERE order_id = ".$_GET['id']." AND o.customize = 0");
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
			<tr>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo $row['size'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
				<?php 
					if($row['customize']==1){
				?>
				<td><img src="../<?php echo $row['img_path'] ?>"  width=250px height=250px><td>
				<?php
					}
					if($row['customize']==0){
						?>
				<td><img src="../assets/img/<?php echo $row['img_path'] ?>"  width=250px height=250px><td>
						<?php
					}
					?>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">TOTAL</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(){
		start_load()
		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp){
					alert_toast("Order confirmed.")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
</script>