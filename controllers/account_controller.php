<?php
    require_once('models/customer.php');
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
            if(Session::get('customerId')) {

                $id = Session::get('customerId');

                $product_category = new ProductCategory();
                $data['product_category'] = $product_category->get_all_category();
                $category = $data['product_category']->fetch_all();

                $customer = new Customer();
                $data['customer'] = $customer->details_site($id);

            }

            require_once('views/site/account.php');
            break;
        }

        case 'update': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnUpdateAccount'])) {
                if(Session::get('customerId')) {
                    $id = Session::get('customerId');

                    $customer = new Customer();
                    $customer->update_account($_POST, $id);
                }
            }

            header('location:'.BASE_URL.'?controller=account');
            exit();
            break;
        }

        case 'change-password': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnChangePassword'])) {
                if(Session::get('customerId')) {
                    $id = Session::get('customerId');

                    $customer = new Customer();
                    $customer->change_password($_POST, $id);
                }
            }

            header('location:'.BASE_URL.'?controller=account');
            exit();
            break;
        }

        default: {
            if(Session::get('customerId')) {

                $id = Session::get('customerId');

                $product_category = new ProductCategory();
                $data['product_category'] = $product_category->get_all_category();
                $category = $data['product_category']->fetch_all();

                $customer = new Customer();
                $data['customer'] = $customer->details_site($id);

            }
            require_once('views/site/account.php');
            break;
        }
    }
?>