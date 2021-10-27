<?php
    require_once('models/product.php');
    require_once('models/customer.php');
    require_once('models/contact.php');
    require_once('models/product_category.php');
    Session::init();

    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }

    switch ($action) {
        case 'index': {
            $product = new Product();
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            foreach ($category as $key => $value) {
                $data['category-'.$value[0]] = $product->get_product_with_type($value[0]);
            }
            /*
            while ($category = $data['product_category']->fetch_assoc()) {
                $data[$category['name_product_category']] = $product->get_product_with_type($category['id_product_category']);
                print_r($data[$category['name_product_category']]);
            }*/
            $data['featured'] = $product->get_product_featured();
            require_once('views/site/index.php');
            break;
        }
        case 'product-details': {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = new Product();
                $data['product_details'] = $product->get_product_details($id);
            }
            //print_r($data['product_details']);
            require_once('views/site/product_details.php');
            break;
        } 
        case 'login': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnLogin'])) {
                $customer = new Customer();
                $customer->login($_POST);

            }
            header('location:'.BASE_URL);
            exit();
            break;
        }
        case 'logout': {
            $customer = new Customer();
            $customer->logout();
            header('location:'.BASE_URL);
            exit();
            break;
        }
        case 'register': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnRegister'])) {
                $customer = new Customer();
                $customer->register($_POST);
            }
            header('location:'.BASE_URL);
            exit();
            break;
        }
        case 'search': {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $product = new Product();
                if(!empty($_POST['key'])) {
                    $data['key'] = $_POST['key'];
                    $data['product'] = $product->get_product_with_key($data['key']);

                } else {
                    $data['key'] = '';
                    $data['product'] = $product->get_all_product();

                }
                
            }
            require_once('views/site/search.php');
            break;
        }
        case 'contact': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnContact'])) {
                $contact = new Contact();
                $contact->send_contact($_POST);
            }
            header('location:'.BASE_URL);
            exit();
            break;
        }
        case 'about': {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            require_once('views/site/about.php');
            break;
        }

        default: {
            $product = new Product();
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            foreach ($category as $key => $value) {
                $data['category-'.$value[0]] = $product->get_product_with_type($value[0]);
            }
            /*
            while ($category = $data['product_category']->fetch_assoc()) {
                $data[$category['name_product_category']] = $product->get_product_with_type($category['id_product_category']);
                print_r($data[$category['name_product_category']]);
            }*/
            $data['featured'] = $product->get_product_featured();
            //$data['game'] = $product->get_product_with_type("Game");
           // $data['nintendo'] = $product->get_product_with_type("Nintendo");
            //$data['ps4'] = $product->get_product_with_type("PS4");
            //$data['accessories'] = $product->get_product_with_type("Accessories");
            require_once('views/site/index.php');
            break;
        }
    }
?>