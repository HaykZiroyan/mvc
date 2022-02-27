<?php
use controllers\AdminController;

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require_once '../'.$class . '.php';
});

$action = $_GET['action'] ?? '';
if(!$action && $_SERVER['REQUEST_URI'] == '/') {
    $action = 'index';
}

if($action == 'index') {
    $controller = new AdminController();
    die($controller->index());
}

if($action == 'karzina') {
    $controller = new AdminController();
    die($controller->karzina());
}

if($action == 'orders') {
    $controller = new AdminController();
    die($controller->orders());
}

if($action == 'addpr') {
    $controller = new AdminController();
    die($controller->addpr());
}
if($action == 'addDb') {
    $controller = new AdminController();
    die($controller->addDb());
}

if($action == 'login') {
    $controller = new AdminController();
    die($controller->login());
}

if($action == 'logout') {
    $controller = new AdminController();
    die($controller->logout());
}

if($action == 'edit' && !empty($_GET['id'])) {
    $controller = new AdminController();
    die($controller->edit($_GET['id']));
}

if($action == 'approve' && !empty($_GET['id'])) {
    $controller = new AdminController();
    die($controller->approve($_GET['id']));
}

header("HTTP/1.0 404 Not Found");
exit;