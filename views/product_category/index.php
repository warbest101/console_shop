<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">PRODUCT CATEGORY LIST</h3>
<?php 
	if(Session::get("message_admin"))
	{
		$message_admin = Session::get("message_admin");
		echo '<span style="color:blue;font-weight:bold">'.$message_admin.'</span><br>';
		Session::unset("message_admin");
	}

?>
<a href="<?php echo BASE_URL ?>admin/?controller=product-category&action=create">Create new</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Manage</th>
		</tr>	
	</thead>
	<tbody>
	<?php 
		$i = 0;
		if($data['product_category']) {
			while ($product_category = $data['product_category']->fetch_assoc())
			{
				$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $product_category['name_product_category']; ?></td>
					<td><?php echo $product_category['desc_product_category']; ?></td>
					<td>
						<a class="btn btn-warning" href="<?php echo BASE_URL ?>admin/?controller=product-category&action=edit&id=<?php echo $product_category['id_product_category']; ?>">
							Edit
						</a>
						<a onclick="return confirm('Do you want to delete this?');" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=product-category&action=delete&id=<?php echo $product_category['id_product_category']; ?>">
							Delete
						</a>
					</td>
				</tr>

				<?php
			}		
		} else {
			?>
				<tr>
					<td colspan="4">No product category in list</td>
				</tr>
			<?php
		}
	?>
	</tbody>
	
</table>
<?php require_once('../views/shared/admin/footer.php'); ?>

