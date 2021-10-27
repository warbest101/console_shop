<?php
    require_once('config/config.php');
    require_once('lib/database.php');
    require_once('lib/session.php');
    require_once('lib/format.php');

    $db = new Database();

    if(isset($_GET['controller'])) {
       $controller=$_GET['controller'];
    }
    else{
        $controller='';
    }
    switch ($controller) { 
        case 'site':{
            require_once('controllers/site_controller.php');
            break;
        }
        case 'cart':{
            require_once('controllers/cart_controller.php');
            break;
        }
        case 'account':{
            require_once('controllers/account_controller.php');
            break;
        }
        default:{
            require_once('controllers/site_controller.php');
            break;
        }
    }
?>
