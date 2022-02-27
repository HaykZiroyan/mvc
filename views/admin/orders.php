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
                
                $userInfo = $db->chooseRow(users, id, $userId);
                $productIn = $db->prepareTable(order_products, order_id, $row[id]); 
                $prod = $db->chooseRow(order_products, order_id, $row[id]);
                $productId = $prod[product_id];
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
                <?php
                $productIn->fetch(PDO::FETCH_ASSOC);
                while ($row1 = $productIn->fetch(PDO::FETCH_ASSOC)) {
                    $userId1 = $row1[user_id];
                    $prod1 = $db->chooseRow(order_products, order_id, $row1);
                    $productId1 = $row1[product_id];
                    $productInfo1 = $db->chooseRow(products, id, $productId1);
                    ?>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php 
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
        ?>
    </table>
</body>
</html>