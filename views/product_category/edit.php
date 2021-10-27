<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<?php 
	if($data['product_category']) {
		$product_category = $data['product_category']->fetch_assoc();
	}
?>

<h3 style="text-align: center;">EDIT PRODUCT CATEGORY</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=product-category&action=edit&id=<?php echo $product_category['id_product_category'] ?>" method="POST">
	  <div class="form-group">
	    <label for="title">Product category name:</label>
	    <input type="text" name="name" class="form-control" id="title" required="" value="<?php echo $product_category['name_product_category'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="desc">Product category description:</label>
	    <textarea class="form-control" rows="5" style="resize: none;" name="desc" id="desc" required=""><?php echo $product_category['desc_product_category'] ?></textarea>
	  </div>
	  <button type="submit" name="update_product_category" class="btn btn-primary">Update</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=product-category" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>