<?php require_once('../views/shared/admin/header.php'); ?>
<?php require_once('../views/shared/admin/menu.php'); ?>

<?php 
	if($data['product']) {
		$product = $data['product']->fetch_assoc();
	}
?>

<h3 style="text-align: center;">EDIT PRODUCT</h3>
<div class="col-md-6">
	<form autocomplete="off" action="<?php echo BASE_URL ?>admin/?controller=product&action=edit&id=<?php echo $product['ID']; ?>" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="name">Product name:</label>
	    <input type="text" name="name" class="form-control" id="name" required="" value="<?php echo $product['Name']; ?>">
	  </div>
	  <div class="form-group">
		    <label for="image">Hình ảnh sản phẩm:</label>
		    <p style="text-align: center;">
		    	<img class="img-thumbnail" src="<?php echo BASE_URL; ?>/public/uploads/product/<?php echo $product['Pic']; ?>" width="250" height="250" alt="<?php echo $product['Name']; ?>">
		    </p>
		    <input type="file" name="image" class="form-control" id="image" >
	  </div>
	  <div class="form-group">
	    <label for="price">Product price:</label>
	    <input type="text" name="price" class="form-control" id="price" required="" value="<?php echo $product['Price']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Product quantity:</label>
	    <input type="number" name="quantity" class="form-control" id="quantity" required="" value="<?php echo $product['Quantity']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="desc">Product description:</label>
	    <textarea class="form-control" rows="5" style="resize: none;" name="desc" id="desc" required=""><?php echo $product['Description']; ?></textarea>
	  </div>
	  <div class="form-group">
	    <label for="status">Hot Product:</label>
	    <select name="status" class="form-control" id="status">
	    	<option <?php echo ($product['Status'] == 0 ? 'Selected' : "");  ?> value="0">No</option>
	    	<option <?php echo ($product['Status'] == 1 ? 'Selected' : "");  ?> value="1">Yes</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="category">Product category:</label>
	    <select name="category" class="form-control" id="category">
	    	<?php
	    	while ($category = $data['product_category']->fetch_assoc())
	    	{
	    		?>
	    		<option 
	    			<?php echo ($product['Type'] == $category['id_product_category'] ? 'Selected' : "");  ?> 
	    			value="<?php echo $category['id_product_category']; ?>">
	    				<?php echo $category['name_product_category']; ?>
	    		</option>
	    		<?php
	    	}

	    	?>
	    </select>
	  </div>
	  <button type="submit" name="update_product" class="btn btn-primary">Update</button>
	  <a href="<?php echo BASE_URL ?>admin/?controller=product" class="btn btn-default">Back to list</a>
	</form>	
</div>
<?php require_once('../views/shared/admin/footer.php'); ?>