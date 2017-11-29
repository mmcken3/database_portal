<?php
    // This handles the submit from the login form when the user presses login. 

    // This grabs the user name and password from the form and connects to DB.
    $user_name = trim($_POST['u']);
    $user_pass = trim($_POST['p']);
    $config = parse_ini_file("data_manager/config.ini");
    
    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $admin_rights = 0; // default admin setting is 0
    
    // Queries the DB to check and see if there is a user matching the entered user name with the password
    $sql = "select user_name, user_pass, admin_rights from employee where user_name = '" . $user_name . "' AND user_pass = '" . $user_pass . "'";
    $result = $conn->query($sql);

    // Grabs the query information from the return. 
    if ($result->num_rows > 0) {
        $found = True;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($user_name != ($row["user_name"])){
                $found = False;
            }
            else if ($user_pass != ($row["user_pass"])){
                $found = False;
            }
            $admin_rights = $row["admin_rights"];
        }
        // Free result set
        mysqli_free_result($result);
    }
    
    // If found, log the user in with session variables for user name and admin
    if ($found) { 
        session_start();
        $_SESSION["login"] = $user_name;
        if ($admin_rights) {
            $_SESSION["admin"] = True;  // If user is admin, set this to true
        }
        else {
            $_SESSION["admin"] = False; // Otherwise user cannot have admin views.
        }
        // Direct the user to home on success
        echo "<script>window.open('./home.php', '_self')</script>";
    }
    else { // If the login does not exist, ask the user to retry. And send back to login. 
        $message = "Username or password incorrect, please retry";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>window.open('./index.php?logout=true', '_self')</script>";
    }

    $conn->close();
?>