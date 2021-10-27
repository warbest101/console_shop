<?php

class Product extends Database
{
	//admin site start
	//get all product
	public function index_product()
	{
		$query = "SELECT * FROM product 
					JOIN product_category ON product.Type = product_category.id_product_category 
					ORDER BY ID DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//save product
	public function store_product($request, $file)
	{
		$name = $request['name'];	
		$price = $request['price'];
		$quantity = $request['quantity'];
		$desc = $request['desc'];
		$status = $request['status'];
		$category = $request['category'];


		$image = $file['image']['name'];
		$tmp_image = $file['image']['tmp_name'];

		$div = explode('.', $image);
		$file_ext = strtolower(end($div));
		$unique_image = $div[0].time().'.'.$file_ext;

		$path_uploads = "../public/uploads/product/".$unique_image;

		$query = "INSERT INTO product(Name,Price,Quantity,Description,Status,Type,Pic) VALUES('$name','$price','$quantity','$desc','$status','$category','$unique_image')";

		$result = $this->insert($query);

		if($result) {
			move_uploaded_file($tmp_image, $path_uploads);
			$message_admin = 'Created success.';
		} else {
			$message_admin = 'Created fail.';
		}
		Session::set("message_admin", $message_admin);

	}
	public function details_product($id)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM product 
					JOIN product_category ON product.Type = product_category.id_product_category 
					WHERE id = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//update product
	public function update_product($request,$file,$id)
	{
		$name = $request['name'];	
		$price = $request['price'];
		$quantity = $request['quantity'];
		$desc = $request['desc'];
		$status = $request['status'];
		$category = $request['category'];


		$image = $file['image']['name'];
		$tmp_image = $file['image']['tmp_name'];

		$div = explode('.', $image);
		$file_ext = strtolower(end($div));
		$unique_image = $div[0].time().'.'.$file_ext;

		$path_uploads = "../public/uploads/product/".$unique_image;
		if($image)
		{
			$product = $this->details_product($id)->fetch_assoc();
			$path_unlink = "../public/uploads/product/".$product['Pic'];
			unlink($path_unlink);
			move_uploaded_file($tmp_image, $path_uploads);
			$query = "UPDATE product SET 
						Name='$name',
						Price='$price',
						Quantity='$quantity',
						Description='$desc',
						Status='$status',
						Type='$category',
						Pic='$unique_image' 
						WHERE ID='$id'";
		}
		else
		{
			$query = "UPDATE product SET 
						Name='$name',
						Price='$price',
						Quantity='$quantity',
						Description='$desc',
						Status='$status',
						Type='$category' 
						WHERE ID='$id'";
		}

		

		$result = $this->update($query);

		if($result) {
			$message_admin = 'Update success.';
		} else {
			$message_admin = 'Update fail.';
		}
		Session::set("message_admin", $message_admin);		                     
	}
	//delete product
	public function delete_product($id)
	{
		$query = "DELETE FROM product WHERE ID = '$id'";

		$product = $this->details_product($id)->fetch_assoc();

		$result = $this->delete($query);
		if($result) {
			$path_unlink = "../public/uploads/product/";
			unlink($path_unlink.$product['Pic']);
			$message_admin = 'Delete success.';
		} else {
			$message_admin = 'Delete fail.';
		}
		Session::set("message_admin", $message_admin);          
	}
	//admin site end
	//home site start

	//Get sản phẩm trang index
	public function get_all_product()//Lấy tất cả sản phẩm ra trang index
	{
		$query = "SELECT * FROM product";
        $get_all = $this->select($query);

        return $get_all;                       
	}

	//Get x sản phẩm theo loại
	public function get_product_with_type($type)
	{
		$query = "SELECT * FROM product WHERE Type='$type'";
        $get_result = $this->select($query);

        return $get_result;                   
	}


	public function get_product_featured()
	{
		$query = "SELECT * FROM product WHERE status=1";
        $get_result = $this->select($query);

        return $get_result;                   
	}
			
	//Get sản phẩm trang single-product
	public function get_product_details($id)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM product 
					JOIN product_category ON product.Type = product_category.id_product_category 
					WHERE id = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	public function get_product_with_key($key)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM product WHERE Name like '%".$key."%' ";
		$result = $this->select($query);
				
        return $result;
	}
	//home site end
}

?>