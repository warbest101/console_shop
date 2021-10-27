<?php

class Customer extends Database
{
	//admin site start
	public function index_customer()
	{
		$query = "SELECT * FROM customer ORDER BY ID DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//save product category
	public function store_customer($request)
	{

	    $username = $request['username'];
	    $email = $request['email'];
	    $name = $request['name'];
	    $phone = $request['phone'];
	    $password = md5($request['password']);
        $address = $request['address']; 
        
        $check = true; 
		//Kiểm tra số điện thoại 10 và theo đầu số các nhà mạng
		if(!preg_match("/^((09|03|07|08|05)+([0-9]{8}))$/", $phone)) {
            $check = false;
        }

        //Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = false;
        }
        //Kiểm tra username và email không được trùng
		$check_email = "SELECT * FROM customer WHERE Email='$email'  LIMIT 1";
		$check_user_name = "SELECT * FROM customer WHERE Username='$username'  LIMIT 1";
		$result_check_email = $this->select($check_email);
		$result_check_user_name = $this->select($check_user_name);
		if($result_check_email || $result_check_user_name)
		{
			$check = false;			
		}
		if($check)
		{
			$query = "INSERT INTO customer(Name, Username, Email, Phone, Address, Password) VALUES ('$name','$user','$email','$phone','$address','$password')";
			$result = $this->insert($query);
			if($result) {
				$message_admin = "Created success"; 
			} else {
				$message_admin = "Created fail"; 
			}
		} else {
			$message_admin = "Created fail";
		}


       	Session::set("message_admin", $message_admin);
	}
	public function details_customer($id)//Lấy thông tin chi tiết ra trang single-product
	{
		$query = "SELECT * FROM customer WHERE ID = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//update product category
	public function update_customer($request,$id)
	{
		$username = $request['username'];
	    $email = $request['email'];
	    $name = $request['name'];
	    $phone = $request['phone'];
        $address = $request['address']; 

        $message = "";

        $check = true; 
		//Kiểm tra số điện thoại 10 và theo đầu số các nhà mạng
		if(!preg_match("/^((09|03|07|08|05)+([0-9]{8}))$/", $phone)) {
            $check = false;
        }

        //Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = false;
        }

		if($check) {
			$query = "UPDATE customer SET Name='$name',Username='$username',Email='$email',Phone='$phone',Address='$address' WHERE ID='$id'";
		
			$result = $this->update($query);

			if($result) {
				$message_admin = 'Updated success.';
			} else {
				$message_admin = 'Updated fail.';
			}
		} else {
			$message_admin = "Updated fail";
		}

		
		Session::set("message_admin", $message_admin);		                     
	}
	//delete product category
	public function delete_customer($id)
	{
		$query = "DELETE FROM customer WHERE ID = '$id'";

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
	public function update_account($request, $id)
	{
	    $email = $request['txtEmail'];
	    $name = $request['txtName'];
	    $phone = $request['txtPhone'];
        $address = $request['txtAddress']; 

        if($address == "" || $email == "" || $name == "" || $phone == "") 
        {
        	$message = ["Update Failed", "Please fill up all required information."]; 
        }
        else
        {
        	$message = ["Update Failed", ""]; 
			//Kiểm tra số điện thoại 10 và theo đầu số các nhà mạng
			if(!preg_match("/^((09|03|07|08|05)+([0-9]{8}))$/", $phone)) {
	            $message[1] .= "<p>Invalid Phone number.</p>";
	        }

	        //Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	            $message[1] .= "<p>Invalid Email.</p>";
	        }

			if($message[1] === "") {
				$query = "UPDATE customer SET Name='$name',Email='$email',Phone='$phone',Address='$address' WHERE ID='$id'";
			
				$result = $this->update($query);

				if($result) {
					$message = ["Update Success", "Please check your information"]; 
				} else {
					$message = ["Update Failed", "Error! Please try again."]; 
				}
			}
        }

		Session::set("message", $message);    
	}
	public function change_password($request, $id)
	{
		$old_password = $request['old_password'];
		$new_password = $request['new_password'];
		$new_password_confirm = $request['new_password_confirm'];

		//Kiểm tra thông tin đã được điền đầy đủ không 
        if($old_password == "" || $new_password == "" || $new_password_confirm == "") 
        {
        	$message = ["Change password failed", "Please fill up all required information."]; 
        }
        else
        {
        	$message = ["Change password failed", ""]; 

        	$old_password = md5($old_password);
        	$check_password = "SELECT * FROM customer WHERE ID='$id' AND Password='$old_password' LIMIT 1";
        	$result_check_password = $this->select($check_password);

        	if($result_check_password)
        	{
        		if($new_password != $new_password_confirm)
        		{
        			$message[1] = "<p>New password and New password confirm not match.</p>";
        		}
        		else
        		{
        			$password = md5($new_password);
        			$query = "UPDATE customer SET Password='$password' WHERE ID='$id'";
        			$result = $this->update($query);
        			if($result)
        			{
        				$message = ["Change password success", "Please check your information."]; 
        			} 
        			else
        			{
        				$message[1] = ["Error! Please try again."]; 
        			}
        		}
        	}
        	else
        	{
        		$message[1] = "<p>Invalid Old password.</p>";
        	}
        }

	    Session::set("message", $message);
	}

	public function register($request)
	{

	    $user = $request['txtUser'];
	    $email = $request['txtEmail'];
	    $name = $request['txtName'];
	    $phone = $request['txtPhone'];
	    $pass = md5($request['txtPass']);
        $address = $request['txtAddress']; 
        

        //Kiểm tra thông tin đã được điền đầy đủ không 
        if($address == "" || $email == "" || $name == "" || $user == "" || $pass == "" || $phone == "") 
        {
        	$message = ["Registration Failed", "Please fill up all required information."]; 
        }
        //Kiểm tra tài khoản đăng kí
        else 
        {
        	$message = ["Registration Failed", ""]; 
			//Kiểm tra số điện thoại 10 và theo đầu số các nhà mạng
			if(!preg_match("/^((09|03|07|08|05)+([0-9]{8}))$/", $phone)) {
            	$message[1] .= "<p>Invalid Phone number.</p>";
        	}

        	//Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message[1] .= "<p>Invalid Email.</p>";
            }
            //Kiểm tra username và email không được trùng
			$check_email = "SELECT * FROM customer WHERE Email='$email'  LIMIT 1";
			$check_user_name = "SELECT * FROM customer WHERE Username='$user'  LIMIT 1";
			$result_check_email = $this->select($check_email);
			$result_check_user_name = $this->select($check_user_name);
			if($result_check_email || $result_check_user_name)
			{
				if($result_check_email)
				{
					$message[1] .= "<p>This Username is already exist.</p>";

				}
				if($check_user_name)
				{
					$message[1] .= "<p>This Email is already exist.</p>";
				}
							
			}
			if($message[1] === "")
			{
				$query = "INSERT INTO customer(Name, Username, Email, Phone, Address, Password) VALUES ('$name','$user','$email','$phone','$address','$pass')";
				$id = $this->insert_id($query);
				if($id) {
					$message = ["Registration Success", "Welcome to ÒwÓ!"]; 
					Session::set('login', true);
	            	Session::set('customerName', $user);
	            	Session::set('customerId', $id);
				} else {
					$message = ["Registration Failed", "Error! Please try again."]; 
				}
			}

        }

       	Session::set("message", $message);
	}

	public function login($request)
	{
	    $username = $request['txtLoginUser'];
	    $pass = md5($request['txtLoginPass']);

	    if($username==""||$pass=="")
	    {
	    	$message = ["Login Failed", "Please type in username/email and password"]; 
	    } 
	    else
	    {
		    $query = "SELECT * FROM customer WHERE (Username='$username' OR Email='$username') AND Password='$pass' LIMIT 1";
		    $result = $this->select($query);

		    if($result){ 
		    	$customer = $result->fetch_assoc();
		    	Session::set('login', true);
	            Session::set('customerName', $customer['Username']);
	            Session::set('customerId', $customer['ID']);     
		    }
		    else
		    {
		    	$message = ["Login Failed", "Username/Email or Password is Invalid"];  
		    }
	    }

	    if(isset($message)) {
	    	Session::set("message", $message);
	    }
	}

	public function logout()
	{
	    if(Session::get('customerId') && Session::get('customerName')) {
	    	Session::unset('login');
	    	Session::unset('customerId');
	    	Session::unset('customerName');
	    }    
	}

	public function details_site($id)
	{
	    $query = "SELECT * FROM customer WHERE id = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;   
	}
	//home site end
}

?>