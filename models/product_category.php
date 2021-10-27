<?php

class ProductCategory extends Database
{
	//admin site start
	//get all product category
	public function index_product_category()
	{
		$query = "SELECT * FROM product_category ORDER BY id_product_category DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//save product category
	public function store_product_category($request)
	{
		$name = $request['name'];	
		$desc = $request['desc'];

		$query = "INSERT INTO product_category(name_product_category,desc_product_category) VALUES('$name','$desc')";

		$result = $this->insert($query);

		if($result) {
			$message_admin = 'Created success.';
		} else {
			$message_admin = 'Created fail.';
		}
		Session::set("message_admin", $message_admin);

	}
	public function details_product_category($id)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM product_category WHERE id_product_category = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//update product category
	public function update_product_category($request,$id)
	{
		$name = $request['name'];	
		$desc = $request['desc'];

		$query = "UPDATE product_category SET name_product_category='$name',desc_product_category='$desc' WHERE id_product_category='$id'";
		
		$result = $this->update($query);

		if($result) {
			$message_admin = 'Update success.';
		} else {
			$message_admin = 'Update fail.';
		}
		Session::set("message_admin", $message_admin);		                     
	}
	//delete product category
	public function delete_product_category($id)
	{
		$query = "DELETE FROM product_category WHERE id_product_category = '$id'";

		$result = $this->delete($query);
		if($result) {
			$message_admin = 'Delete success.';
		} else {
			$message_admin = 'Delete fail.';
		}
		Session::set("message_admin", $message_admin);          
	}
	//admin site end
	//home site start

	//Get sản phẩm trang index
	public function get_all_category()//Lấy tất cả sản phẩm ra trang index
	{
		$query = "SELECT * FROM product_category ORDER BY id_product_category DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//home site end
}

?>