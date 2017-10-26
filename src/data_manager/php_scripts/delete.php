<?php
    $config = parse_ini_file("../config.ini");

    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, 'mmcken3sql_d610');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "delete from " . $table_name . " where " . $table_id . "=" . $id_value;
    $result = $conn->query($sql);

    $conn->close();
?>