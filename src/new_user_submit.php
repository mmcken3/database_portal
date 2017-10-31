<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #dddddd;
        }
        
        li {
            float: left;
        }
        
        li a {
            display: block;
            padding: 8px;
        }
    </style>
</head>

<body>
        <?php
            $fields = "user_name, user_pass";
            $values = "";
            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            $user_pass2 = $_POST['user_pass2'];
            if ($user_pass != $user_pass2) {
                //alert and re ask
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
            require_once("./data_manager/php_scripts/save.php");
            //echo "<script>alert('Please login with your new account')</script>";
            //echo "<script>window.open('./index.php', '_self')</script>";
        ?>
    </body>

</html>