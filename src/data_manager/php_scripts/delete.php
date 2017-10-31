<?php
    $config = parse_ini_file("../config.ini");

    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $admin = $_SESSION["admin"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
?>