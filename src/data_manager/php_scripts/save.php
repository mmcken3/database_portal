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
    $result = $conn->query($sql);

    $conn->close();
?>