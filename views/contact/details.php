<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<?php 
	if($data['contact']) {
		$contact = $data['contact']->fetch_assoc();
	}
?>

<h3 style="text-align: center;">EDIT CONTACT</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=contact&action=read&id=<?php echo $contact['id_contact'] ?>" method="POST">
	  <div class="form-group">
	    <label for="email">Contact name:</label>
	    <input readonly type="text" name="email" class="form-control" id="email" required="" value="<?php echo $contact['email_contact'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="content">Contact content:</label>
	    <textarea readonly class="form-control" rows="5" style="resize: none;" name="content" id="content" required=""><?php echo $contact['content_contact'] ?></textarea>
	  </div>
	  <div class="form-group">
	    <label for="status">Contact Status: <?php echo $contact['status_contact'] == 0 ? "Unread" : "Has read"; ?></label>
	  </div>
	  <button <?php echo $contact['status_contact'] == 0 ? "" : "Disabled"; ?> type="submit" name="read_contact" class="btn btn-primary">Mark as Read</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=contact" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>