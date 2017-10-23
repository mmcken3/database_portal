<!DOCTYPE html>
<html>

<body>
    <style>
        #employee {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #employee td,
        #employee th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #employee tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #employee tr:hover {
            background-color: #ddd;
        }
        
        #employee th {
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
            <li><a href="../../static_web_views/home.html">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1>Employees</h1>

        <h4><a href="../searches/employee_search.php">Search Table</a></h4>

        <h4><a href="../views/employee_view.php?argument1=create">Create</a></h4>

        <?php
            $config = parse_ini_file("../config.ini");
            
            $servername = $config['servername'];
            $username = $config['username'];
            $password = $config['password'];
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, 'mmcken3sql_d610');
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection to DB failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT * FROM employees ORDER BY user_id;";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table id='employee'>";
                echo "<tr>";
                    echo "<th>user_id</th>";
                    echo "<th>user_name</th>";
                    echo "<th>first_name</th>";
                    echo "<th>last_name</th>";
                    echo "<th>phone</th>";
                    echo "<th>user_address</th>";
                    echo "<th>emp_project_name</th>";
                    echo "<th>emp_department_name</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr id='row'>";
                        echo "<td id='user_id'>" . $row['user_id'] . "</td>";
                        echo "<td id='user_name'>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['user_address'] . "</td>";
                        echo "<td>" . $row['emp_project_name'] . "</td>";
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
        <script>
            var table = document.getElementsByTagName("table")[0];
            var tbody = table.getElementsByTagName("tbody")[0];
            tbody.onclick = function(e) {
                e = e || window.event;
                var data = [];
                var target = e.srcElement || e.target;
                while (target && target.nodeName !== "TR") {
                    target = target.parentNode;
                }
                if (target) {
                    var cells = target.getElementsByTagName("td");
                    for (var i = 0; i < cells.length; i++) {
                        data.push(cells[i].innerHTML);
                    }
                }
                window.open("../views/employee_view.php?argument1=" + data, "_self")
            };
        </script>
    </body>

</html>