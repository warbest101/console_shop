<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<?php 
	if($data['order']) {
		$order = $data['order']->fetch_assoc();
	}
?>

<h3 style="text-align: center;">ORDER ID <?php echo $order['id_order'] ?></h3>
<div class="col-md-12">
	  <div class="form-group">
	    <label>Order name: <?php echo $order['name_order']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Order email: <?php echo $order['email_order']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Order phone : <?php echo $order['phone_order']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Order address: <?php echo $order['address_order']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Created at: <?php echo $order['created_at']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Checkout at: <?php echo $order['checkout_at']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Status: <?php echo $order['status_order'] == 0 ? "Pending" : "Has checkout"; ?></label>
	  </div>

	  <form action="<?php echo BASE_URL ?>admin/?controller=order&action=edit" method="POST">
			<div style="text-align: right;" class="form-group">
				<input type="hidden" name="id_order" value="<?php echo $order['id_order'] ?>">
			<?php
			if($order['status_order'] == 1)
			{
				?>
				<a class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=order&action=delete&id=<?php echo $order['id_order']; ?>">Delete Confirm</a>
				<?php
			}
			else
			{
				?>
				<input class="btn btn-primary" type="submit" name="update_order" value="Checkout Confirm">
				<?php
			}
			?>
				<a href="<?php echo BASE_URL ?>admin/?controller=order" class="btn btn-default" type="submit">Back to list</a>
			</div>		
	  </form>
	
</div>

<h4 style="text-align: center;">PRODUCT LIST</h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Image</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Subtotal</th>
		</tr>	
	</thead>
	<tbody>

	<?php 
	$i = 0;
	$total = 0;
	while ($product = $data['product']->fetch_assoc())
	{
		$i++;

		$subtotal = $product['order_quantity_product'] * $product['order_price_product'];
		$total += $subtotal;

		?>

		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $product['Name']; ?></td>
			<td>
				<img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $product['Pic']; ?>" width="100" height="100">
			</td>
			<td><?php echo $product['order_quantity_product']; ?></td>
			<td><?php echo number_format($product['order_price_product'], 0)."$"; ?></td>
			<td><?php echo number_format($subtotal, 0)."$"; ?></td>
		</tr>

		<?php
	}
	?>
		<tr>
			<td>

			</td>
			<td colspan="5" style="text-align: right;"><h3>TOTAL PRICE: <?php echo number_format($total, 0)."$"; ?></h3></td>
		</tr>

	</tbody>	
</table>

<?php require_once('../views/shared/admin/footer.php'); ?>