<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<h3 style="text-align: center;">CREATE PRODUCT</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=product&action=create" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="title">Product name:</label>
	    <input type="text" name="name" class="form-control" id="title" required="">
	  </div>
	  <div class="form-group">
	    <label for="image">Product image:</label>
	    <input type="file" name="image" class="form-control" id="image" required="">
	  </div>
	  <div class="form-group">
	    <label for="price">Product price:</label>
	    <input type="text" name="price" class="form-control" id="price" required="">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Product quantity:</label>
	    <input type="number" name="quantity" class="form-control" id="quantity" required="">
	  </div>
	  <div class="form-group">
	    <label for="desc">Product description:</label>
	    <textarea class="form-control" rows="5" style="resize: none;" name="desc" id="desc" required=""></textarea>
	  </div>
	  <div class="form-group">
	    <label for="status">Hot Product:</label>
	    <select name="status" class="form-control" id="status">
	    	<option value="0">No</option>
	    	<option value="1">Yes</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="category">Product category:</label>
	    <select name="category" class="form-control" id="category">
	    	<?php
	    	while ($category = $data['product_category']->fetch_assoc())
	    	{
	    		?>
	    		<option value="<?php echo $category['id_product_category']; ?>"><?php echo $category['name_product_category']; ?></option>
	    		<?php
	    	}

	    	?>
	    </select>
	  </div>
	  <button type="submit" name="create_product" class="btn btn-primary">Create</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=product" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>