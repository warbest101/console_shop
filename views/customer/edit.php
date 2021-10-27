<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<?php 
	if($data['customer']) {
		$customer = $data['customer']->fetch_assoc();
	}
?>

<h3 style="text-align: center;">EDIT CUSTOMER</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=customer&action=edit&id=<?php echo $customer['ID'] ?>" method="POST">
	  <div class="form-group">
	    <label for="name">Customer name:</label>
	    <input type="text" name="name" class="form-control" id="name" required="" value="<?php echo $customer['Name'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="username">Customer username:</label>
	    <input type="text" name="username" class="form-control" id="username" required="" value="<?php echo $customer['Username'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="email">Customer email:</label>
	    <input type="text" name="email" class="form-control" id="email" required="" value="<?php echo $customer['Email'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="address">Customer address:</label>
	    <input type="text" name="address" class="form-control" id="address" required="" value="<?php echo $customer['Address'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="phone">Customer phone:</label>
	    <input type="text" name="phone" class="form-control" id="phone" required="" value="<?php echo $customer['Phone'] ?>">
	  </div>
	  <button type="submit" name="update_customer" class="btn btn-primary">Update</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=customer" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>