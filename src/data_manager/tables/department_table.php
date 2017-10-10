<!DOCTYPE html>
<html>

<body>
    <style>
        #departments {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #departments td,
        #departments th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #departments tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #departments tr:hover {
            background-color: #ddd;
        }
        
        #departments th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #dddddd;
        }
        
        li {
            float: left;
        }
        
        li a {
            display: block;
            padding: 8px;
        }
        td {
            cursor: pointer;
        }
        tr:nth-child(odd) { 
            background-color : #EAF2D3; 
        }
        tr:nth-child(even) { 
            background-color : #A7C942; 
        }
        tr:hover { 
            background-color : #89ae37; 
        }
    </style>
    </head>

    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../profile.html">Profile</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1>Deparments</h1>
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

            $sql = "SELECT * FROM departments ORDER BY department_id;";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table id='departments'>";
                echo "<tr>";
                    echo "<th>department_id</th>";
                    echo "<th>department_name</th>";
                    echo "<th>dept_manager_id</th>";
                    echo "<th>dept_manager_name</th>";
                    echo "<th>Edit</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>" . $row['department_id'] . "</td>";
                        echo "<td>" . $row['department_name'] . "</td>";
                        echo "<td>" . $row['dept_manager_id'] . "</td>";
                        echo "<td>" . $row['dept_manager_name'] . "</td>";
                        echo "<td><a href='../views/department_view.html'>edit</a></td>";
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
    </body>

</html>