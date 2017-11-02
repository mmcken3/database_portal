<?php
    $config = parse_ini_file("/Users/Mitchell/Sites/database_portal/src/data_manager/config.ini");

    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $admin = $_SESSION["admin"];
    $user = $_SESSION["login"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

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
    if ($table_name != 'employee') {
        $result = $conn->query($sql);
        echo "Saved!";
    }
    else if ($admin || $create) {
        $result = $conn->query($sql);
        echo "Saved!";
    }
    else if ($user == substr($peicesv[1], 1, -1)) {
        $result = $conn->query($sql);
    }
    else {
        echo "<p>You are not admin, so you cannot edit employee tables</p>";
    }

    $conn->close();
?>