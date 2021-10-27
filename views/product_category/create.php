<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">CREATE PRODUCT CATEGORY</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=product-category&action=create" method="POST">
	  <div class="form-group">
	    <label for="title">Product category name:</label>
	    <input type="text" name="name" class="form-control" id="title" required="">
	  </div>
	  <div class="form-group">
	    <label for="desc">Product category description:</label>
	    <textarea class="form-control" rows="5" style="resize: none;" name="desc" id="desc" required=""></textarea>
	  </div>
	  <button type="submit" name="create_product_category" class="btn btn-primary">Create</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=product-category" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>