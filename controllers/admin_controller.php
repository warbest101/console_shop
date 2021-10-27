<?php
    require_once('../models/product.php');
    require_once('../models/customer.php');
    require_once('../models/admin.php');

    Session::init();
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }

    switch ($action) {
        case 'index': {
            Session::checkSessionAdmin();
            require_once('../views/admin/index.php');
            break;
        }
        case 'login': {
            Session::checkLoginAdmin();
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnAdminLogin'])) {
                $admin = new Admin();
                $admin->login($_POST);
                header('location:'.BASE_URL."admin");
                exit();
            } else {
                require_once('../views/admin/login.php');
            }
            
            break;
        }
        case 'logout': {
            $admin = new Admin();
            $admin->logout();
            header('location:'.BASE_URL."admin/?action=login");
            exit();
            break;
        }
        default: {
            Session::checkSessionAdmin();
            require_once('../views/admin/index.php');
            break;
        }
    }
?>