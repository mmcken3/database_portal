<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>
        <?php
            $fields = "user_name, user_pass";
            $values = "";
            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            $user_pass2 = $_POST['user_pass2'];
            if ($user_pass != $user_pass2) {
                echo "<script>alert('Entered passwords do not match, please retry.')</script>";
                echo "<script>window.open('./new_user.php', '_self')</script>";
                return;
            }
            $values = "'" . $user_name . "','" . $user_pass . "'";
            if (isset($_POST['first_name'])) {
                $first_name = $_POST['first_name'];
                $fields = $fields . ", first_name";
                $values = $values . ",'" . $first_name . "'";
            }
            if (isset($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
                $fields = $fields . ", last_name";
                $values = $values . ",'" . $last_name . "'";
            }
            $table_name = 'employee';
            $create = true;
            // throw call to request manager here, and it will handle alert or save off this
            include("./data_manager/data_manager.php");
            save($table_name, $fields, $values, $create);
            echo "<script>alert('Please login with your new account')</script>";
            echo "<script>window.open('./index.php', '_self')</script>";
        ?>
    </body>

</html>