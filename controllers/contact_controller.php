<?php
    require_once('../models/contact.php');

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
            $contact = new Contact();
            $data['contact'] = $contact->index_contact();
            
            require_once('../views/contact/index.php');
            break;
        }
        case 'read': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $contact = new Contact();
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['read_contact']))
                {
                    $contact->read_contact($id);
                    header('location:'.BASE_URL.'admin/?controller=contact');
                    exit();
                } else {
                    $data['contact'] = $contact->details_contact($id);
                    require_once('../views/contact/details.php');
                }
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $contact = new Contact();
                $contact->delete_contact($id);
            }
            
            header('location:'.BASE_URL.'admin/?controller=contact');
            exit();
            break;
        }

        default: {
            $contact = new Contact();
            $data['contact'] = $contact->index_contact();
            
            require_once('../views/contact/index.php');
            break;
        }
    }
?>