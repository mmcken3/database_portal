<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>
<?php
    // Ensure that the user is logged in, if not if will send them back to login page. 
        if ($_SESSION["login"] == "") {
            echo "<script>window.open('index.php', '_self')</script>";
        }
?>
<body>
        <?php
            // This php pages runs the script for submitting a new user request.
            // The first section pulls out the important fields of user_name and both password entries.
            $fields = "user_name, user_pass";
            $values = "";
            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            $user_pass2 = $_POST['user_pass2'];

            // Confirm that the two passwords match, otherwise ask user for retry.
            if ($user_pass != $user_pass2) {
                echo "<script>alert('Entered passwords do not match, please retry.')</script>";
                echo "<script>window.open('./new_user.php', '_self')</script>";
                return;
            }

            // Pull out the users name entires if they were entered.
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

            // Call save for the data manager with the new users information. 
            include("./data_manager/data_manager.php");
            save($table_name, $fields, $values, $create);

            // Request the user to login with their new account and redirect to login page.
            echo "<script>alert('Please login with your new account')</script>";
            echo "<script>window.open('./index.php', '_self')</script>";
        ?>
    </body>

</html>