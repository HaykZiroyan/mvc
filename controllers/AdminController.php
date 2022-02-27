<?php
namespace controllers;

use libs\Db;
use libs\Session;
use models\Admin;
use models\connectDb;

class AdminController extends DefaultController {

    protected function checkAdmin() {
        $session = Session::getInstance();
        if (!$session->get('isAdmin')) {
            $this->redirect('/?action=login');
        }
    }

    public function karzina() {
        return $this->loadView('task/karzina', compact('adminModel', 'errors'));

    }

    public function index() {
        return $this->loadView('task/index', compact('adminModel', 'errors'));
    }
    
    public function orders() {
        return $this->loadView('admin/orders', compact('adminModel', 'errors'));
    }

    public function addpr() {
        return $this->loadView('admin/addProducts', compact('adminModel', 'errors'));
    }

    public function login() {
        $session = Session::getInstance();
        if ($session->get('isAdmin')) {
            $this->redirect('/');
        }
        $adminModel = new Admin();

        if ($_POST) {
            $adminModel->username = $_POST['username'] ?? '';
            $adminModel->password = $_POST['password'] ?? '';
            if ($adminModel->validate()) {
                $session->set('isAdmin', true);
                return $this->loadView('admin/addProducts', compact('adminModel', 'errors'));
            }
        }

        $errors = $adminModel->getErrors();
        return $this->loadView('admin/login', compact('adminModel', 'errors'));
    }

    public function logout()
    {
        $session = Session::getInstance();
        $session->remove('isAdmin');
        $this->redirect('/');
    }
  
    public function addtoDb() {
        if(isset($_POST['name'])) {
            $name =  $_POST['name']; 
            $description =  $_POST['description']; 
            $price = trim($_POST['price']);
            $db = new Db;
            $db->inserttDb(products, name, description, price, $name, $description, $price);

        }
    }

    public function feelDb() {
        if(isset($_POST['fname'])) {
            $fname =  $_POST['fname'];
            $lname =  $_POST['lname'];
            $email =  $_POST['email'];
        
            $db = new Db;
            $db->inserttDb(users, first_name, last_name, email, $fname, $lname, $email);        
            $user = $db->orderby(users);
            $user_id = $user['id'];
        
            $sum = 0;
            foreach($_COOKIE as $k => $v) {
                $str = (explode("_", $_COOKIE[$k]));
                $price = $db->chooseRow(products, id, $str[0]);
                $prices = $price['price'];
                $sum = $sum + $str[1] * $prices;
            }

            $mydate=getdate(date("U"));
            $mydate[hours] = $mydate[hours] + 1;
            $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year], $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
        
            $db->inserttDb(orders, user_id, sum, order_date, $user_id, $sum, $date);
        
            $orders_id =  $db->orderby(orders);
            $order_id = $orders_id['id'];
            foreach($_COOKIE as $k => $v) {
                $str = (explode("_", $_COOKIE[$k]));
                $db->inserttDb(order_products, order_id, product_id, qty, $order_id, $str[0], $str[1]);
            }
        
            foreach($_COOKIE as $k => $v) {
                setcookie($k, $_COOKIE[$k], time() - 2);
            }
            header('Location: /?action=index');
        }
    }
}