<?php
    require_once('../models/product.php');
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
            $product = new Product();
            
            $data['product'] = $product->index_product();
            
            require_once('../views/product/index.php');
            break;
        }
        case 'create': {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_product'])) {
                $product = new Product();
                $product->store_product($_POST, $_FILES);
                header('location:'.BASE_URL.'admin/?controller=product');
                exit();
            } else {
                $product_category = new ProductCategory();
                $data['product_category'] = $product_category->index_product_category();
                require_once('../views/product/create.php');
            }
            break;
        }
        case 'edit': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product']))
                {
                    $product = new Product();
                    $product->update_product($_POST, $_FILES, $id);
                    header('location:'.BASE_URL.'admin/?controller=product');
                    exit();
                } else {
                    $product = new Product();
                    $product_category = new ProductCategory();
                    $data['product'] = $product->details_product($id);
                    $data['product_category'] = $product_category->index_product_category();
                    require_once('../views/product/edit.php');
                }
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = new Product();
                $product->delete_product($id);
            }
            
            header('location:'.BASE_URL.'admin/?controller=product');
            exit();
            break;
        }

        default: {
            $product = new Product();
            $data['product'] = $product->index_product();
            
            require_once('../views/product/index.php');
            break;
        }
    }
?>