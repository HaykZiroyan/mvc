<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>busket</title>
    <link rel="icon" href="/images/basket.png">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

        <table class="table1">
            <tr>
                <th>Products</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php

            use libs\Db;
            $db = new Db;
            use controllers\AdminController;
            $admcont = new AdminController();
            // $cont->cookies();
            // var_dump($cont->cookies());
            // print_r($_COOKIE);
            // $pdo = $db->getDb();
            foreach($_COOKIE as $k => $v) {
                $str = (explode("_", $_COOKIE[$k]));
                ?>
                <tr>
                        <th><?php 
                            $result = $db->chooseRow(products, id, $str[0]);
                            echo ($result['name']);
                            ?>
                        </th>
                        <th><?php echo $str[1] ?></th>
                        <th><?php echo($result['price'] * $str[1]) ; ?></th>
                    </tr>
            <?php
            }
            ?> 
        </table>
       <!-- action="/?action=addorderinfo" -->
        <form class="contacts" action="<?php $admcont->feelDb() ?>" method="post">
            <div class="contact">
                <div>
                    <p>first name</p>
                    <p>last name</p>
                    <p>email</p>
                </div>
                <div>
                    <input type="text" placeholder="Enter first name" name="fname" required>
                    <input type="text" placeholder="Enter last name" name="lname" required>
                    <input type="text" placeholder="Enter Email" name="email" required>
                </div>
            </div>

            <button class="set-busket" type="submit">confirm the order</button>
    </form>
</body>
</html>