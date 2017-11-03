<?php
    session_start();
?>
<?php

//search($table_name, $key, $args, $order);
//get_id($table, $id_type);

function connect(){
    $config = parse_ini_file("config.ini");
    
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

    return $conn;
}

function save($table_name, $fields, $values, $create) {
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $conn = connect();
    
    $sql = "insert into " . $table_name . " (" . $fields . ") values (" . $values . ") on duplicate key update ";
    if ($fields != "") {
        $peicesf = explode(",", $fields);
        $peicesv = explode(",", $values);
        for ($i = 0; $i < sizeof($peicesf); $i++) {
            if ($i != (sizeof($peicesf) - 1)) {
                $sql = $sql . $peicesf[$i] . "=" . $peicesv[$i] . ", ";
            }
            else {
                $sql = $sql . $peicesf[$i] . "=" . $peicesv[$i];
            }
        }
    }
    if ($table_name != 'employee') {
        $result = $conn->query($sql);
        echo "Saved!";
    }
    else if ($admin_rights || $create) {
        $result = $conn->query($sql);
        echo "Saved!";
    }
    else if ($login_user == substr($peicesv[1], 1, -1)) {
        $result = $conn->query($sql);
    }
    else {
        echo "<p>You are not admin, so you cannot edit employee tables</p>";
    }
    
    $conn->close();
}

function delete($table_name, $table_id, $id_value){
    $login_user =  $_SESSION["login"];
    $admin = $_SESSION["admin"];

    $conn = connect();

    if ($table_name != 'employee') {
        $sql = "delete from " . $table_name . " where " . $table_id . "=" . $id_value;
        $result = $conn->query($sql);
        echo "Deleted!";
    } 
    else if ($admin) {
        $sql = "delete from " . $table_name . " where " . $table_id . "=" . $id_value;
        $result = $conn->query($sql);
        echo "Deleted!";
    }
    else {
        echo "<p>You are not admin, so you cannot edit employee tables</p>";
    }

    $conn->close();
}

function get_id($table, $id_type) {
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $conn = connect();
    
    $sql = "SELECT " . $id_type . " FROM " . $table . " ORDER BY " . $id_type . " desc limit 1;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo (intval($row[$id_type]) + 1);
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "0 results";
    }
    
    $conn->close();
}

function search($table_name, $key, $args, $order){
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $conn = connect();

    $sql = "SHOW COLUMNS FROM " . $table_name;
    $result = $conn->query($sql);
    $column_array = array();

    echo "<table id='table'>";
    echo "<tr id='headers'>";
    while($row = $result->fetch_assoc()) {
        if ($row['Field'] != 'last_updated') {
            if ($row['Field'] != "user_pass" && $row['Field'] != "admin_rights") {
                array_push($column_array, $row['Field']);
                echo "<th>" . $row['Field'] . "</th>";
            }
            else if ($admin_rights) {
                array_push($column_array, $row['Field']);
                echo "<th>" . $row['Field'] . "</th>";
            }
        }
    }
    echo "</tr>";

    $peices = explode(",", $args);
    $myArgs = "";
    for ($i = 0; $i < sizeof($peices) - 1; $i++){
        $myArgs = $myArgs . $peices[0] . " AND ";
    }
    $myArgs = $myArgs . $peices[(sizeof($peices) - 1)];

    $sql = "SELECT * FROM " . $table_name;
    if ($args != '') {
        $sql = $sql . " " . $key . " " . $myArgs;
    }
    if ($order != "") {
        $orderParts = explode(",", $order);
        $sql = $sql . " ORDER BY " . $orderParts[1] . " " . $orderParts[0];
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr id='row'>";
                for ($i = 0; $i < sizeof($column_array); $i++) {
                    echo "<td>" . $row[$column_array[$i]] . "</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "0 results";
    }

    $conn->close();
}

?>