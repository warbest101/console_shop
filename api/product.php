<?php  
	header('Access-Control-Allow-Origin:*');
	header('Content-Type:application/json');
	header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Method,Content-Type,Authorization,X-Requested-With');

    require_once('../lib/database.php');
    $db = new Database();

    require_once('../models/product.php');
    require_once('../models/product_category.php');



    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }
    switch ($action) {
        case 'get-all': {
            $product = new Product();
            $data['product'] = $product->index_product();

            $product_list = [];
            
            while($row = $data['product']->fetch_assoc()){
            	$p = [
            		'product_id' => $row['ID'],
            		'product_name' => $row['Name'],
            		'product_price' => $row['Price'],
            		'product_quantity' => $row['Quantity'],
            		'product_status' => $row['Status'],
            		'product_desc' => $row['Description'],
            		'product_image' => $row['Pic'],
            		'product_category_name' => $row['name_product_category'],
            	];

            	$product_list[] = $p;

            }

            echo json_encode($product_list);
            break;
        }
        case 'create': {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

            	//$data = file_get_contents("php://input");
                $product = new Product();
                $product->store_product($_POST, $_FILES);
                //move_uploaded_file(, destination)
                echo json_encode("Create Product Success.");
            }
            
            break;
        }
        case 'get': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                $product = new Product();
                $product_category = new ProductCategory();
                $data['product'] = $product->details_product($id);

                //$data['product_category'] = $product_category->index_product_category();
	            
	            $p = $data['product']->fetch_assoc();

	            echo json_encode($p);  
                
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = new Product();
                $product->delete_product($id);
            }
            
            break;
        }

        default: {
            $product = new Product();
            $data['product'] = $product->index_product();

            $product_list = [];
            
            while($row = $data['product']->fetch_assoc()){
            	$p = [
            		'product_id' => $row['ID'],
            		'product_name' => $row['Name'],
            		'product_price' => $row['Price'],
            		'product_quantity' => $row['Quantity'],
            		'product_status' => $row['Status'],
            		'product_desc' => $row['Description'],
            		'product_image' => $row['Pic'],
            		'product_category_name' => $row['name_product_category'],
            	];

            	$product_list[] = $p;

            }

            echo json_encode($product_list);           

            break;
        }
    }

?>