<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">CONTACT LIST</h3>
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
			<th>Status</th>
			<th>Manage</th>
		</tr>	
	</thead>
	<tbody>
	<?php 
		$i = 0;
		if($data['contact']) {
			while ($contact = $data['contact']->fetch_assoc())
			{
				$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $contact['email_contact']; ?></td>
					<td><?php echo ($contact['status_contact'] == 0 ? "Unread" : "Has read");  ?></td>
					<td>
						<a class="btn btn-warning" href="<?php echo BASE_URL ?>admin/?controller=contact&action=read&id=<?php echo $contact['id_contact']; ?>">
							Read
						</a>
						<?php 
							if($contact['status_contact'] == 1) {
								?>
								<a onclick="return confirm('Do you want to delete this?');" class="btn btn-danger" href="<?php echo BASE_URL ?>admin/?controller=contact&action=delete&id=<?php echo $contact['id_contact']; ?>">
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
					<td colspan="4">No contact in list</td>
				</tr>
			<?php
		}
	?>
	</tbody>
	
</table>
<?php require_once('../views/shared/admin/footer.php'); ?>

