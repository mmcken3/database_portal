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
            <li><a href="../tables/employee_table.php">Back to Table</a></li>
        </ul>

        <?php
            $user_name = $_POST['user_name'];
            $user_id = $_POST['user_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone_number'];
            $address = $_POST['address'];
            $emp_project_id = $_POST['emp_project_id'];
            $emp_project_name = $_POST['emp_project_name'];
            $emp_department_id = $_POST['emp_department_id'];
            $emp_department_name = $_POST['emp_department_name'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "employees";
                $fields = "user_id, user_name, first_name, last_name, phone, user_address, emp_project_id, emp_project_name, emp_department_id, emp_department_name";
                $values = "" . $user_id . ",'" . $user_name . "',";
                if ($first_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $first_name . "',";
                }
                if ($last_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $last_name . "',";
                }
                if ($phone == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $phone . "',";
                }
                if ($address == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $address . "',";
                }
                if ($emp_project_id == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $emp_project_id . ",";
                }
                if ($emp_project_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'". $emp_project_name . "',";
                }
                if ($emp_department_id == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $emp_department_id . ",";
                }
                if ($emp_department_name == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'". $emp_department_name . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "employees";
                $table_id = "user_id";
                $id_value = $user_id;
                $table_id_name = "user_name";
                $name_value = "'" . $user_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>