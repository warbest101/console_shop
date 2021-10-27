<?php
    require_once('../models/customer.php');

    Session::init();
    Session::checkSessionAdmin();
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }
    switch ($action) {
        case 'index': {
            $customer = new Customer();
            $data['customer'] = $customer->index_customer();
            
            require_once('../views/customer/index.php');
            break;
        }
        case 'edit': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $customer = new Customer();
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_customer']))
                {
                    $customer->update_customer($_POST, $id);
                    header('location:'.BASE_URL.'admin/?controller=customer');
                    exit();
                } else {
                    $data['customer'] = $customer->details_customer($id);
                    require_once('../views/customer/edit.php');
                }
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $customer = new Customer();
                $customer->delete_customer($id);
            }
            
            header('location:'.BASE_URL.'admin/?controller=customer');
            exit();
            break;
        }

        default: {
            $customer = new Customer();
            $data['customer'] = $customer->index_customer();
            
            require_once('../views/customer/index.php');
            break;
        }
    }
?>