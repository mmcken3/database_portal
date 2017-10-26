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

    $sql = "SHOW COLUMNS FROM " . $table_name;
    $result = $conn->query($sql);
    $column_array = array();

    echo "<table id='table'>";
    echo "<tr id='headers'>";
    while($row = $result->fetch_assoc()) {
        array_push($column_array, $row['Field']);
        echo "<th>" . $row['Field'] . "</th>";
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
?>