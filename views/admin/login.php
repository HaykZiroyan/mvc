<?php
/* @var  \models\Admin $adminModel*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">

        <p><?=$errors['wrongCredentials'] ?? ''?></p>

        <form method="post">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?=$adminModel->username?>">
                <p><?= $errors['username'] ?? ''?></p>
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" value="">
                <p><?= $errors['password'] ?? ''?></p>
            </div>


            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>