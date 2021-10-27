<?php

class Admin extends Database
{
	//admin site start
	//admin site end

	//home site start

	//Get sản phẩm trang index
	public function login($request)//Lấy tất cả sản phẩm ra trang index
	{
		$username = $request['username_admin'];
	    $password = md5($request['password_admin']);

	    if($username == "" || $password == "")
	    {
	    	$message = ["Login Failed", "Please type in username/email and password"]; 
	    } 
	    else
	    {
		    $query = "SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$password' LIMIT 1";
		    $result = $this->select($query);

		    if($result){ 
		    	$admin = $result->fetch_assoc();
		    	Session::set('login_admin', true);
	            Session::set('username_admin', $admin['username_admin']);
	            Session::set('id_admin', $admin['id_admin']);     
		    }
		    else
		    {
		    	$message = ["Login Failed", "Invalid username/password."];  
		    }
	    }

	    if(isset($message)) {
	    	Session::set("message", $message);
	    }                     
	}

	//Get x sản phẩm theo loại
	public function logout()
	{
		if(Session::get('id_admin') && Session::get('username_admin')) {
	    	Session::unset('login_admin');
	    	Session::unset('username_admin');
	    	Session::unset('id_admin');
	    }                  
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