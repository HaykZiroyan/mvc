<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
    <div class="button">
        <a href="/?action=addpr">Add products</a>
        <a href="/?action=index">logout</a>
    </div>
    <table>
        <tr>
            <th>order id</th>
            <th>order date</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>product name</th>
            <th>description</th>
            <th>price</th>
            <th>Quantity</th>
            <th>total price</th>
        </tr>
        <?php
            use libs\Db;
            $db = new Db;
            $table = $db->getTable(orders);

            while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
                $userId = $row[user_id];
                // $users = $db->chooseRow(users, id, $userId);
                // $pdo->query("SELECT * FROM `users` WHERE `id` = $userId"); //users info
                $userInfo = $db->chooseRow(users, id, $userId);
                $productIn = $db->prepareTable(order_products, order_id, $row[id]); 
                // $pdo->query("SELECT * FROM `order_products` WHERE `order_id` = $row[id]"); //products included in order
                $prod = $db->chooseRow(order_products, order_id, $row[id]);
                $productId = $prod[product_id];
                // $info =  $pdo->query("SELECT * FROM `products` WHERE `id` = $productId"); //product info
                $productInfo =$db->chooseRow(products, id, $productId);
                
                ?>
                <tr>
                    <th><?php echo($row[id]) ?></th>
                    <th><?php echo($row[order_date]) ?></th>
                    <th><?php echo($userInfo[first_name]) ?></th>
                    <th><?php echo($userInfo[last_name]) ?></th>
                    <th><?php echo($userInfo[email]) ?></th>
                    <th><?php echo($productInfo[name]) ?></th>
                    <th><?php echo($productInfo[description]) ?></th>
                    <th><?php echo($productInfo[price]) ?></th>
                    <th><?php echo($prod[qty]) ?></th>
                    <th><?php echo($productInfo[price] * $prod[qty]) ?></th>
                </tr>
<!-- $productIn->fetch(PDO::FETCH_ASSOC) -->
                <?php
                $productIn->fetch(PDO::FETCH_ASSOC);
                while ($row1 = $productIn->fetch(PDO::FETCH_ASSOC)) {
                    $userId1 = $row1[user_id];
                    // // $users1 =  $pdo->query("SELECT * FROM `users` WHERE `id` = $userId1"); //users info
                    // $userInfo1 = mysqli_fetch_assoc($users1);
                    // // $productIn1 =  $pdo->query("SELECT * FROM `order_products` WHERE `order_id` = $row1[id]"); //products included in order
                    $prod1 = $db->chooseRow(order_products, order_id, $row1);
                    $productId1 = $row1[product_id];
                    // // $info1 =  $pdo->query("SELECT * FROM `products` WHERE `id` = $productId1"); //product info
                    $productInfo1 = $db->chooseRow(products, id, $productId1);
                    ?>
                    

                    <tr>
                        <th><?php  ?> </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php 
                        // echo("1")
                         echo($productInfo1[name]) ?></th>
                        <th><?php 
                        echo($productInfo1[description]) ?></th>
                        <th><?php
                         echo($productInfo1[price]) ?></th>
                        <th><?php 
                        echo($row1[qty]) ?></th>
                        <th><?php 
                        echo($productInfo1[price] * $row1[qty]) ?></th>
                    </tr>
                    <?php
                }
            }
            print_r($db->chooseRow(users, email, 'haik_ziroyan@mail.ru'));
        ?>
    </table>
</body>
</html>