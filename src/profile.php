<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>

    <body style='background-color: rgb(163, 219, 217)'>
        <?php
            $user_name = $_SESSION["login"];
            $table_name = "employee";
            if ($_SESSION["login"] == "") {
                echo "<script>window.open('../../index.php', '_self')</script>";
            }
        ?>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="index.php?logout=true">Logout</a></li>
            </ul>
        </nav>
        <h1>Profile Edit Page</h1>
        <?php
            $login_user =  $_SESSION["login"];
            $admin_rights = $_SESSION["admin"];
            $config = parse_ini_file("./data_manager/config.ini");

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

            $sql = "SHOW COLUMNS FROM " . $table_name;
            $result = $conn->query($sql);
            $column_array = array();

            while($row = $result->fetch_assoc()) {
                array_push($column_array, $row['Field']);
            }

            $sql = "select * from " . $table_name . " where user_name = '" . $user_name . "'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }

            $headers = "";
            echo "<div class='container' style='padding-top:10px'>";
            echo "<form id='row_edit' action='profile_submit.php' method='post'>";
            echo "<h1 style='color: #D9853B'>Profile</h1>";
            for ($i = 0; $i < sizeof($column_array); $i++){
                if ($i != sizeof($column_array) - 1){
                    $headers = $headers . $column_array[$i] . ",";
                }
                else {
                    $headers = $headers . $column_array[$i];
                }
                if ($column_array[$i] == 'admin_rights' || $column_array[$i] == 'employee_id') {
                    echo "<div>";
                    echo "<h3>" . $column_array[$i] . "</h3>";
                    echo "<p>";
                    echo "<input name='" . $column_array[$i] . "' value='" . $row[$column_array[$i]] ."' type='text' size='40' class='textfield' readonly>";                
                    echo "</p>";
                    echo "</div>";
                }
                else if ($column_array[$i] == "user_pass") {
                    echo "<div>";
                    echo "<h3>" . $column_array[$i] . "</h3>";
                    echo "<p>";
                    echo "<input name='" . $column_array[$i] . "' value='" . $row[$column_array[$i]] ."' type='password' size='40' class='textfield'>";                
                    echo "</p>";
                    echo "</div>";
                }
                else {
                    if ($column_array[$i] != 'last_updated') {
                        echo "<div>";
                        echo "<h3>" . $column_array[$i] . "</h3>";
                        echo "<p>";
                        echo "<input name='" . $column_array[$i] . "' value='" . $row[$column_array[$i]] ."' type='text' size='40' class='textfield'>";                
                        echo "</p>";
                        echo "</div>";
                    }
                }
            }
            echo "<input hidden name='table_name' value='" . $table_name ."' type='text' size='40' class='textfield' readonly>";            
            echo "<input hidden name='headers' value='" . $headers ."' type='text' size='40' class='textfield' readonly>";     
            echo "<input hidden name='profile_edit' value='profile_edit' type='text' size='40' class='textfield' readonly>";                        
        ?>
        <p></p>
        <input type="submit" name="save" value="Save" class="btn blue"/>
        <?php
            echo "</form>";
            echo "</div>";
        ?>
    </body>

</html>