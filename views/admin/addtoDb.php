<?php
    use libs\Db;
    $db = new Db;
    $name =  $_POST['name']; 
    $description =  $_POST['description']; 
    $price = trim($_POST['price']); 
    $db->inserttDb(products, name, description, price, $name, $description, $price);

    
    header('Location: /?action=addpr');
    exit();