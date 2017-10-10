<?php
function selectDepartments($conn) {
    $sql = "SELECT * FROM departments;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table>";
        echo "<tr>";
            echo "<th>department_id</th>";
            echo "<th>department_name</th>";
            echo "<th>dept_manager_id</th>";
            echo "<th>dept_manager_name</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row['department_id'] . "</td>";
                echo "<td>" . $row['department_name'] . "</td>";
                echo "<td>" . $row['dept_manager_id'] . "</td>";
                echo "<td>" . $row['dept_manager_name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "0 results";
    }
}

$config = parse_ini_file("config.ini");

$servername = $config['servername'];
$username = $config['username'];
$password = $config['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, 'mmcken3sql_d610');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully\n";
selectDepartments($conn);
$conn->close();
?>