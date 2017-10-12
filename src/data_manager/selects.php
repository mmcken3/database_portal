<?php
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

$sql = "SELECT * FROM employees ORDER BY user_id;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr>";
        echo "<th>user_id</th>";
        echo "<th>user_name</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>phone</th>";
        echo "<th>user_address</th>";
        echo "<th>emp_project_id</th>";
        echo "<th>emp_project_name</th>";
        echo "<th>emp_department_id</th>";
        echo "<th>emp_department_name</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['user_address'] . "</td>";
            echo "<td>" . $row['emp_project_id'] . "</td>";
            echo "<td>" . $row['emp_project_name'] . "</td>";
            echo "<td>" . $row['emp_department_id'] . "</td>";
            echo "<td>" . $row['emp_department_name'] . "</td>";
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