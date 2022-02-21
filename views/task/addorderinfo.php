<?php
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];
    $email =  $_POST['email'];


    use libs\Db;
    $db = new Db;
    $db->inserttDb(users, first_name, last_name, email, $fname, $lname, $email);


    // $pdo = $db->getDb();
    $user = $db->chooseRow(users, email, $email);
    $user_id = $user['id'];
    // var_dump($user_id);
    // $pdo->query("SELECT * FROM `users` WHERE `email`='$email'");
    

    $sum = 0;
    foreach($_COOKIE as $k => $v) {
        $str = (explode("_", $_COOKIE[$k]));
        $price = $db->chooseRow(products, id, $str[0]);
        // $price = $pdo->query("SELECT * FROM `products` WHERE `id`='$str[0]'");
        $prices = $price['price'];

        $sum = $sum + $str[1] * $price1;

    }
    $mydate=getdate(date("U"));
    $mydate[hours] = $mydate[hours] + 1;
    $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year], $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

    $db->inserttDb(orders, user_id, sum, order_date, $user_id, $sum, $date);

    // $order = $pdo->query("SELECT * FROM `orders` ORDER BY id DESC LIMIT 1");
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

    // header('Location: http://ended/browser/buy.php');

    // exit();
?>