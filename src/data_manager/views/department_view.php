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
            <li><a href="../tables/department_table.php">Back</a></li>
        </ul>
        <h1>Department View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $department_id = $peices[0];
                $department_name = $peices[1];
                $dept_manager_id = $peices[2];
                $dept_manager_name = $peices[3];
            }
        ?>
        <div>
            <h3>Department ID Number</h3>
            <p><?php
                if ($argument1 == 'create') {
                    $table = 'departments';
                    $id_type = 'department_id';
                    include('../php_scripts/get_id.php');
                }
                else {
                    echo $department_id;
                }
            ?></p>
        </div>
        <div>
            <h3>Department Name</h3>
            <p><?php
                echo $department_name
            ?></p>
        </div>
        <div>
            <h3>Department Manager ID Number</h3>
            <p><?php
                echo $dept_manager_id
            ?></p>
        </div>
        <div>
            <h3>Department Manager User Name</h3>
            <p><?php
                echo $dept_manager_name
            ?></p>
        </div>
    </body>

</html>