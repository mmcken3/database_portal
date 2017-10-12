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
?>