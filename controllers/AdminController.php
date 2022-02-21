<?php


namespace controllers;


use libs\Db;
use libs\Session;
use libs\Cookies;
use models\Admin;
// use models\Task;

class AdminController extends DefaultController
{

    protected function checkAdmin()
    {
        $session = Session::getInstance();
        if (!$session->get('isAdmin')) {
            $this->redirect('/?action=login');
        }
    }

    public function raful() {
        return $this->loadView('task/raful', compact('adminModel', 'errors'));
    }
    public function addorderinfo() {
        return $this->loadView('task/addorderinfo', compact('adminModel', 'errors'));
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

    public function addDb() {
        return $this->loadView('admin/addtoDb', compact('adminModel', 'errors'));
    }
    public function addtoDb() {
        return $this->loadView('admin/addtoDb', compact('adminModel', 'errors'));
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
    public function allCookies() {
        
    }

    // public function edit($id) {
    //     $this->checkAdmin();
    //     $id = intval($id);
    //     if ($id) {
    //         $db = Db::getInstance();
    //         $table = Task::getTableName();
    //         $task = $db->queryOne("SELECT * FROM $table WHERE id = ?", [$id]);
    //         if ($task) {
    //             $taskModel = new Task();
    //             $taskModel->message = $task->message;
    //             $taskModel->setId($id);

    //             if (!empty($_POST['message'])) {

    //                 $taskModel->message = $_POST['message'] ?? '';
    //                 $taskModel->status = 1;
    //                 $taskModel->filterField('message');
    //                 $taskModel->checkRequiredAndLength('message', 1000);
    //                 if (!$taskModel->getErrors()) {
    //                     $taskModel->updateMessage();
    //                     $this->redirect('/');
    //                 }
    //             }
    //             $errors = $taskModel->getErrors();


    //             return $this->loadView('admin/edit', compact('taskModel', 'errors'));
    //         }
    //     }
    //     header("HTTP/1.0 404 Not Found");
    //     die;
    // }

    // public function approve($id)
    // {
    //     $this->checkAdmin();
    //     $id = intval($id);
    //     if ($id) {
    //         $db = Db::getInstance();
    //         $table = Task::getTableName();
    //         $task = $db->queryOne("SELECT * FROM $table WHERE id = ?", [$id]);
    //         if ($task) {
    //             $taskModel = new Task();
    //             $taskModel->setId($id);
    //             $taskModel->approve();
    //             $this->redirect('/');

    //         }
    //     }
    //     header("HTTP/1.0 404 Not Found");
    //     die;
    // }


}