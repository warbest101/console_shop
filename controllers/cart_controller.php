<?php
    require_once('models/product.php');
    require_once('models/customer.php');
    require_once('models/order.php');
    require_once('models/product_category.php');
    Session::init();
    Session::checkSessionSite();

    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }

    switch ($action) {
        case 'index': {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            if(Session::get("customerId")) {
                $id = Session::get("customerId");
                $customer = new Customer();
                $data['customer'] = $customer->details_site($id);
                $customer = $data['customer']->fetch_assoc();
            }
            require_once('views/site/cart.php');
            break;
        }
        case 'add': {
            /*
            $id = $_POST['id_product'];
            $quantity = $_POST['quantity_product'];
            $product_model = new Product();

            $data['product_details'] = $product_model->get_product_details($id);

            $product = $data['product_details']->fetch_assoc();

            $item = array
            (
                'id' => $product['ID'],
                'name' => $product['Name'],
                'image' => $product['Pic'],
                'price' => $product['Price'],
                'quantity' => $quantity
            );

            if(Session::get("cart"))
            {
                $available = 0;
                $cart = Session::get("cart");
                foreach ($cart as $key => $product) {
                    if($id === $product['id']) {
                        $_SESSION['cart'][$key]['quantity'] += $quantity;
                        $available++;
                    }
                }
                if($available === 0) {
                    $_SESSION['cart'][] = $item;
                }
            }
            else
            {
                $_SESSION['cart'][] = $item;
            }
            header('Location:'.BASE_URL."?controller=cart");
            exit();
            */

            $id = $_POST['id_product'];
            $quantity = $_POST['quantity_product'];
            $product_model = new Product();

            $data['product_details'] = $product_model->get_product_details($id);

            $product = $data['product_details']->fetch_assoc();

            $item = array
            (
                'id' => $product['ID'],
                'name' => $product['Name'],
                'image' => $product['Pic'],
                'price' => $product['Price'],
                'quantity' => $quantity
            );

            if(Session::get("cart"))
            {
                $available = 0;
                $cart = Session::get("cart");
                foreach ($cart as $key => $product) {
                    if($id === $product['id']) {
                        $_SESSION['cart'][$key]['quantity'] += $quantity;
                        $available++;
                    }
                }
                if($available === 0) {
                    $_SESSION['cart'][] = $item;
                }
            }
            else
            {
                $_SESSION['cart'][] = $item;
            }

            break;
        }
        case 'update': {
            if(Session::get("cart"))
            {
                $cart = Session::get("cart");
                foreach ($cart as $key => $product)
                {
                    $update_quantity = $_POST['quantity-'.$product['id']];
                    if($update_quantity == 0)
                    {
                        unset($_SESSION['cart'][$key]);
                    }
                    else if($update_quantity > 0)
                    {
                        $_SESSION['cart'][$key]['quantity'] = $update_quantity;
                    }
                }

                if(count($cart) == 0) {
                    Session::unset("cart");
                }
            }
            header('Location:'.BASE_URL."?controller=cart");
            exit();
            break;
        }
        case 'remove': {
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
                $id = $_GET['id'];
                if(Session::get("cart"))
                {
                    $cart = Session::get("cart");
                    foreach ($cart as $key => $product) {
                        if($id === $product['id']) {
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                    
                    if(count($cart) == 0) {
                        Session::unset("cart");
                    }
                }

            }
            header('Location:'.BASE_URL."?controller=cart");
            exit();
            break;
        }
        case 'ordering': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnOrdering'])) {
                $order = new Order();
                $order->ordering($_POST);
                Session::unset("cart");
            }
            
            header('Location:'.BASE_URL."?controller=cart");
            exit();
            break;
        }
        default: {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->get_all_category();
            $category = $data['product_category']->fetch_all();
            if(Session::get("customerId")) {
                $id = Session::get("customerId");
                $customer = new Customer();
                $data['customer'] = $customer->details_site($id);
                $customer = $data['customer']->fetch_assoc();
            }
            
            //Session::unset("cart");
            require_once('views/site/cart.php');
            break;
        }
    }
?>