<!DOCTYPE html>
<html>

<head>
    <style>
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
    </style>
</head>

<body>

    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../profile.html">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../tables/employee_table.php">Back</a></li>
        </ul>
        <h1>Employee View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $user_name = $peices[0];
                $user_id = $peices[1];
                $first_name = $peices[2];
                $last_name = $peices[3];
                $phone = $peices[4];
                $address = $peices[5];
                $emp_project_id = $peices[6];
                $emp_project_name = $peices[7];
                $emp_department_id = $peices[8];
                $emp_department_name = $peices[9];
            }
        ?>
        <div>
            <h3>User ID Number</h3>
            <p><?php
                if ($argument1 == 'create') {
                    $table = 'employees';
                    $id_type = 'user_id';
                    include('../php_scripts/get_id.php');
                }
                else {
                    echo $user_id;
                }
            ?></p>
        </div>
        <div>
            <h3>User Name</h3>
            <p><?php
                echo $user_name
            ?></p>
        </div>
        <div>
            <h3>First Name</h3>
            <p><?php
                echo $first_name;
            ?></p>
        </div>
        <div>
            <h3>Last Name</h3>
            <p><?php
                echo $last_name;
            ?></p>
        </div>
        <div>
            <h3>Address</h3>
            <p><?php
                echo $address;
            ?></p>
        </div>
        <div>
            <h3>Phone Number</h3>
            <p><?php
                echo $phone;
            ?></p>
        </div>
        <div>
            <h3>Project ID Number</h3>
            <p><?php
                echo $emp_project_id;
            ?></p>
        </div>
        <div>
            <h3>Project Name</h3>
            <p><?php
                echo $emp_project_name;
            ?></p>
        </div>
        <div>
            <h3>Department ID Number</h3>
            <p><?php
                echo $emp_department_id;
            ?></p>
        </div>
        <div>
            <h3>Department Name</h3>
            <p><?php
                echo $emp_department_name;
            ?></p>
        </div>
    </body>

</html>