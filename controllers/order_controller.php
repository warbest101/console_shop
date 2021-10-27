<?php
    require_once('../models/order.php');

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
            $order = new order();
            $data['order'] = $order->index_order();
            
            require_once('../views/order/index.php');
            break;
        }
        case 'edit': {
            $order = new order();
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                $data['order'] = $order->details_order($id);
                $data['product'] = $order->product_order($id);
                require_once('../views/order/edit.php');

            } else {
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_order'])) {
                    $order->update_order($_POST);
                    header('location:'.BASE_URL.'admin/?controller=order');
                    exit();
                }
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $order = new order();
                $order->delete_order($id);
            }
            
            header('location:'.BASE_URL.'admin/?controller=order');
            exit();
            break;
        }

        default: {
            $order = new order();
            $data['order'] = $order->index_order();
            
            require_once('../views/order/index.php');
            break;
        }
    }
?>