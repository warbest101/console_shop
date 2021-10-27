<?php

class Order extends Database
{
	//admin site start
	//get all product category
	public function index_order()
	{
		$query = "SELECT * FROM tbl_order ORDER BY id_order DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//save product category
	public function details_order($id)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM tbl_order WHERE id_order = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//update product category
	public function update_order($request)
	{
		$date_time = new DateTime('NOW');

		$id = $request['id_order'];
		$checkout_at = $date_time->format('Y-m-d H:i:s');
		$status = 1;	

		$query = "UPDATE tbl_order SET status_order='$status',checkout_at='$checkout_at' WHERE id_order='$id'";
		
		$result = $this->update($query);

		if($result) {
			$message_admin = 'Update success.';
		} else {
			$message_admin = 'Update fail.';
		}
		Session::set("message_admin", $message_admin);		                     
	}
	//delete product category
	public function delete_order($id)
	{
		$query = "DELETE FROM tbl_order_details WHERE id_order = '$id'";
		$result = $this->delete($query);
		if($result) {
			$query = "DELETE FROM tbl_order WHERE id_order = '$id'";

			$result = $this->delete($query);
			if($result) {
				$message_admin = 'Delete success.';
			} else {
				$message_admin = 'Delete fail.';
			}
		} else {
			$message_admin = 'Delete fail.';
		}
		
		Session::set("message_admin", $message_admin);          
	}
	public function product_order($id)
	{

		$query = "SELECT * FROM tbl_order_details 
					JOIN product on tbl_order_details.id_product = product.ID 
					WHERE id_order = '$id'  ORDER BY id_order DESC";
        $get_all = $this->select($query);

        return $get_all;               
	}
	//admin site end

	//home site start

	//Get sản phẩm trang index
	public function ordering($request)//Lấy tất cả sản phẩm ra trang index
	{
		$date_time = new DateTime('NOW');

		$name_order = $request['txtName'];
		$email_order = $request['txtEmail'];
		$phone_order = $request['txtPhone'];
		$address_order = $request['txtAddress'];
		if($name_order == "" || $email_order == "" || $phone_order == "" || $address_order == "")
		{
			$message = ['Order failed','Please fill all the required information for ordering.'];
		}
		else
		{
			$status_order = 0;
			$created_at = $date_time->format('Y-m-d H:i:s');

			$query = "INSERT INTO tbl_order(name_order, email_order, phone_order, address_order, status_order, created_at) VALUES('$name_order','$email_order','$phone_order','$address_order','$status_order', '$created_at')";
	        $id_order = $this->insert_id($query);
	        if($id_order)
	        {
				if(Session::get("cart"))
				{
					$cart = Session::get("cart");
					foreach ($cart as $key => $product)
					{
						$id_product = $product['id'];
						echo $id_product;
						$order_price_product = $product['price'];
						$order_quantity_product = $product['quantity'];
						$query = "INSERT INTO tbl_order_details(id_order, id_product, order_price_product, order_quantity_product) VALUES('$id_order', '$id_product', '$order_price_product', '$order_quantity_product')";
						$this->insert($query);
					}

					$message = ['Order success','Thank you for choose this website for ordering online.'];
				}
				else
				{
					$message = ['Order failed','Please try again later.'];
				}
				
			}
			else
			{
				$message = ['Order failed','Please try again later.'];
			}			
		}
		Session::set("message", $message);
                         
	}

	//Get x sản phẩm theo loại
	public function get_product_with_type($type)
	{
		$query = "SELECT * FROM product WHERE type='$type'";
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
		$query = "SELECT * FROM product WHERE id = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//home site end
}

?>