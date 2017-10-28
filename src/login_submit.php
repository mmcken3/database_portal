<?php
    $user_name = trim($_POST['u']);
    $user_pass = trim($_POST['p']);
    /*
    if(!$this->CheckLoginInDB($username,$password))
    {
        return false;
    }
        
    session_start();
        
    $_SESSION[$this->GetLoginSessionVar()] = $username;
    */
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

    $admin_rights = 0;
    
    $sql = "select user_name, user_pass, admin_rights from employee where user_name = '" . $user_name . "' AND user_pass = '" . $user_pass . "'";
    $result = $conn->query($sql);

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
    
    if ($found) { 
        session_start();
        $_SESSION["login"] = $user_name;
        if ($admin_rights) {
            $_SESSION["admin"] = True;
        }
        else {
            $_SESSION["admin"] = False;
        }
        echo "<script>window.open('./home.php', '_self')</script>";
    }
    else {
        $message = "Username or password incorrect, please retry";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<a href='index.php?logout=true'>Retry</a></li>";
    }

    $conn->close();
?>