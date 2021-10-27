<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">ORDER LIST</h3>
<?php 
	if(Session::get("message_admin"))
	{
		$message_admin = Session::get("message_admin");
		echo '<span style="color:blue;font-weight:bold">'.$message_admin.'</span><br>';
		Session::unset("message_admin");
	}

?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Created at</th>
			<th>Delivered at</th>
			<th>Status</th>
			<th>Manage</th>
		</tr>	
	</thead>
	<tbody>
	<?php 
		$i = 0;
		if($data['order']) {
			while ($order = $data['order']->fetch_assoc())
			{
				$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $order['email_order']; ?></td>
					<td><?php echo $order['phone_order']; ?></td>
					<td><?php echo $order['created_at']; ?></td>
					<td><?php echo $order['checkout_at']; ?></td>
					<td><?php echo $order['status_order'] == 0 ? "Pending" : "Has checkout"; ?></td>
					<td>
						<a class="btn btn-warning" href="<?php echo BASE_URL ?>admin/?controller=order&action=edit&id=<?php echo $order['id_order']; ?>">
							Read
						</a>
						<?php
							if($order['status_order'] == 1) {
								?>
									<a onclick="return confirm('Do you want to delete this?');" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=order&action=delete&id=<?php echo $order['id_order']; ?>">
										Delete
									</a>
								<?php
							} 
												
						?>

					</td>
				</tr>

				<?php
			}		
		} else {
			?>
				<tr>
					<td colspan="3">No order in list</td>
				</tr>
			<?php
		}
	?>
	</tbody>
	
</table>
<?php require_once('../views/shared/admin/footer.php'); ?>

