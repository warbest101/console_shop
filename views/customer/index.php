<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">CUSTOMER LIST</h3>
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
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Manage</th>
		</tr>	
	</thead>
	<tbody>
	<?php 
		$i = 0;
		if($data['customer']) {
			while ($customer = $data['customer']->fetch_assoc())
			{
				$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $customer['Name']; ?></td>
					<td><?php echo $customer['Username']; ?></td>
					<td><?php echo $customer['Email']; ?></td>
					<td><?php echo $customer['Address']; ?></td>
					<td><?php echo $customer['Phone']; ?></td>
					<td>
						<a class="btn btn-warning" href="<?php echo BASE_URL ?>admin/?controller=customer&action=edit&id=<?php echo $customer['ID']; ?>">
							Edit
						</a>
						<a onclick="return confirm('Do you want to delete this?');" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=customer&action=delete&id=<?php echo $customer['ID']; ?>">
							Delete
						</a>
					</td>
				</tr>

				<?php
			}
		} else {
			?>
				<tr>
					<td colspan="7">No customer in list</td>
				</tr>
			<?php
		}
	?>
	</tbody>
	
</table>
<?php require_once('../views/shared/admin/footer.php'); ?>

