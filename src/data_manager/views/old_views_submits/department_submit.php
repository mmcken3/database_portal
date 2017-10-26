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
            <li><a href="../../static_web_views/home.html">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../tables/department_table.php">Back to Table</a></li>
        </ul>

        <?php
            $department_id = $_POST['department_id'];
            $department_name = $_POST['department_name'];
            $dept_manager_name = $_POST['dept_manager_name'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "departments";
                $fields = "department_id, department_name, dept_manager_name";
                $values = "" . $department_id . ",'" . $department_name . "',";
                if ($dept_manager_name == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'" . $dept_manager_name . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "departments";
                $table_id = "department_id";
                $id_value = $department_id;
                $table_id_name = "department_name";
                $name_value = "'" . $department_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>