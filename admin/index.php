<?php
    require_once('../config/config.php');
    require_once('../lib/database.php');
    require_once('../lib/session.php');
    require_once('../lib/format.php');

    $db = new Database();

    if(isset($_GET['controller'])) {
       $controller=$_GET['controller'];
    }
    else{
        $controller='';
    }
    switch ($controller) {
        case 'admin':{
            require_once('../controllers/admin_controller.php');
            break;
        }
        case 'product':{
            require_once('../controllers/product_controller.php');
            break;
        }
        case 'product-category':{
            require_once('../controllers/product_category_controller.php');
            break;
        }
        case 'company':{
            require_once('../controllers/company_controller.php');
            break;
        }
        case 'customer':{
            require_once('../controllers/customer_controller.php');
            break;
        }
        case 'contact':{
            require_once('../controllers/contact_controller.php');
            break;
        }
        case 'order':{
            require_once('../controllers/order_controller.php');
            break;
        }
        default:{
            require_once('../controllers/admin_controller.php');
            break;
        }
    }
?>