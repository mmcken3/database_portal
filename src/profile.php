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

<body>

    <body style='background-color: rgb(163, 219, 217)'>
        <?php
            // Pulls down login info and ensures that the user is actually logged in. Otherwise
            // it sends the user back to login. 
            $user_name = $_SESSION["login"];
            $table_name = "employee";
            if ($_SESSION["login"] == "") {
                echo "<script>window.open('index.php', '_self')</script>";
            }
        ?>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="index.php?logout=true">Logout</a></li>
            </ul>
        </nav>
        <h1>Profile Edit Page</h1>
        <?php
            // Gets Login and Admin info, then connects to the DB
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

            // Grabs the table name from about, since this is an edit page, we need
            // to find all columns from the table that the user can edit 
            $sql = "SHOW COLUMNS FROM " . $table_name;
            $result = $conn->query($sql);
            $column_array = array();

            // Adds all of the columns that were found to a column array
            while($row = $result->fetch_assoc()) {
                array_push($column_array, $row['Field']);
            }

            // Builds a sql query to get all of the data from the table where the user matches the logged in user
            $sql = "select * from " . $table_name . " where user_name = '" . $user_name . "'";
            $result = $conn->query($sql);
        
            // Pull the data out of the query result
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }

            // builds the form based on what information was pulled down and displays
            // it in the edit form format
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
                // Do not make these fields editable in this page
                if ($column_array[$i] == 'admin_rights' || $column_array[$i] == 'employee_id' || $column_array[$i] == 'user_name') {
                    echo "<div>";
                    echo "<h3>" . $column_array[$i] . "</h3>";
                    echo "<p>";
                    echo "<input name='" . $column_array[$i] . "' value='" . $row[$column_array[$i]] ."' type='text' size='40' class='textfield' readonly>";                
                    echo "</p>";
                    echo "</div>";
                }
                else if ($column_array[$i] == "user_pass") { // Make sure password is of password type
                    echo "<div>";
                    echo "<h3>" . $column_array[$i] . "</h3>";
                    echo "<p>";
                    echo "<input name='" . $column_array[$i] . "' value='" . $row[$column_array[$i]] ."' type='password' size='40' class='textfield'>";                
                    echo "</p>";
                    echo "</div>";
                }
                else { // No need to be able to edit last updated as it will auto update if values change
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
            // Save this information so that the submit script can get it in the form, but the users do not need
            // to see this information on the screen
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