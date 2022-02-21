<?php
        $id =  $_POST['id'];
        $name1 =  $_POST['count'];
        setcookie($id, $id . '_' . $name1,  time() + 3600*24);
        header('Location: /?action=index');