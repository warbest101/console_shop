<?php

class Contact extends Database
{
	//admin site start
	//Get contact
	public function index_contact()
	{
		$query = "SELECT * FROM contact ORDER BY id_contact DESC";
        $get_all = $this->select($query);

        return $get_all;                       
	}
	//contact details
	public function details_contact($id)
	{
		$query = "SELECT * FROM contact WHERE id_contact = '$id' LIMIT 1";
		$result = $this->select($query);
				
        return $result;
	}
	//update contact
	public function read_contact($id)
	{

		$query = "UPDATE contact SET status_contact=1 WHERE id_contact='$id'";
		$result = $this->update($query);

		if($result) {
			$message_admin = 'Read success.';
		} else {
			$message_admin = 'Read fail.';
		}
		Session::set("message_admin", $message_admin);		                     
	}
	//delete contact
	public function delete_contact($id)
	{
		$query = "DELETE FROM contact WHERE id_contact = '$id'";

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
	public function send_contact($request)
	{

	    $email = $request['txtEmail'];
	    $content = $request['txtContent'];
	    $status = 0;
        

        //Kiểm tra thông tin đã được điền đầy đủ không 
        if($email == "" || $content == "") 
        {
        	$message = ["Send Contact failed", "Please fill up all information."]; 
        }
        //Kiểm tra tài khoản đăng kí
        else 
        {
        	$message = ["Send Contact failed", ""]; 

        	//Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message[1] .= "<p>Invalid Email.</p>";
            }
			if($message[1] === "")
			{
				$query = "INSERT INTO contact(email_contact, content_contact, status_contact) VALUES ('$email','$content','$status')";
				$result = $this->insert($query);
				if($result) {
					$message = ["Your contact has send", "We will read it as soon as possible."]; 

				} else {
					$message = ["Send Contact failed", "Error! Please try again."]; 
				}
			}

        }

       	Session::set("message", $message);
	}


	//home site end
}

?>