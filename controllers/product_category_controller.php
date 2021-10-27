<?php
    require_once('../models/product_category.php');

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
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->index_product_category();
            
            require_once('../views/product_category/index.php');
            break;
        }
        case 'create': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_product_category'])) {
                $product_category = new ProductCategory();
                $product_category->store_product_category($_POST);
                header('location:'.BASE_URL.'admin/?controller=product-category');
                exit();
            } else {
                require_once('../views/product_category/create.php');
            }
            break;
        }
        case 'edit': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product_category = new ProductCategory();
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product_category']))
                {
                    $product_category->update_product_category($_POST, $id);
                    header('location:'.BASE_URL.'admin/?controller=product-category');
                    exit();
                } else {
                    $data['product_category'] = $product_category->details_product_category($id);
                    require_once('../views/product_category/edit.php');
                }
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product_category = new ProductCategory();
                $product_category->delete_product_category($id);
            }
            
            header('location:'.BASE_URL.'admin/?controller=product-category');
            exit();
            break;
        }

        default: {
            $product_category = new ProductCategory();
            $data['product_category'] = $product_category->index_product_category();
            
            require_once('../views/product_category/index.php');
            break;
        }
    }
?>