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
            <li><a href="../tables/department_table.php">Back to Table</a></li>
        </ul>

        <?php
            $department_id = $_POST['department_id'];
            $department_name = $_POST['department_name'];
            $dept_manager_id = $_POST['dept_manager_id'];
            $dept_manager_name = $_POST['dept_manager_name'];

            $table_name = "departments";
            $fields = "department_id, department_name, dept_manager_id, dept_manager_name";
            $values = "" . $department_id . ",'" . $department_name . "',";
            if ($dept_manager_id == '') {
                $values = $values . "null,";
            }
            else {
                $values = $values . "'" . $dept_manager_id . "'";
            }
            if ($dept_manager_name == '') {
                $values = $values . "null";
            }
            else {
                $values = $values . "'" . $dept_manager_name . "'";
            }

            require_once("../php_scripts/save.php");

            echo "Saved!";
        ?>

    </body>

</html>