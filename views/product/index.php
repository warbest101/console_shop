<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">PRODUCT LIST</h3>
<?php 
	if(Session::get("message_admin"))
	{
		$message_admin = Session::get("message_admin");
		echo '<span style="color:blue;font-weight:bold">'.$message_admin.'</span><br>';
		Session::unset("message_admin");
	}

?>
<a href="<?php echo BASE_URL ?>admin/?controller=product&action=create">Create new</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Hot</th>
			<th>Type</th>
			<th>Manage</th>
		</tr>	
	</thead>
	<tbody>
	<?php 
		$i = 0;
		if($data['product']) {
			while ($product = $data['product']->fetch_assoc())
			{
				$i++;
				?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $product['Name']; ?></td>
					<td>
						<img src="<?php echo BASE_URL; ?>/public/uploads/product/<?php echo $product['Pic']; ?>" width="100" height="100" alt="<?php echo $product['Name']; ?>">
					</td>
					<td><?php echo $product['Price']; ?></td>
					<td><?php echo $product['Quantity']; ?></td>
					<td><?php echo ($product['Status'] == 1 ? "Yes" : "No" ); ?></td>
					<td><?php echo $product['name_product_category'];?></td>
					<td>
						<a class="btn btn-warning" href="<?php echo BASE_URL ?>admin/?controller=product&action=edit&id=<?php echo $product['ID']; ?>">
							Edit
						</a>
						<a onclick="return confirm('Do you want to delete this?');" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=product&action=delete&id=<?php echo $product['ID']; ?>">
							Delete
						</a>
					</td>
				</tr>

				<?php
			}		
		} else {
			?>
				<tr>
					<td colspan="8">No product in list</td>
				</tr>
			<?php
		}
	?>
	</tbody>
	
</table>
<?php require_once('../views/shared/admin/footer.php'); ?>

