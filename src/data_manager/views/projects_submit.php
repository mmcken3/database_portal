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
            <li><a href="../tables/projects_table.php">Back to Table</a></li>
        </ul>

        <?php
            $project_id = $_POST['project_id'];
            $project_name = $_POST['project_name'];
            $proj_customer_id = $_POST['proj_customer_id'];
            $proj_customer_name = $_POST['proj_customer_name'];
            $project_type = $_POST['project_type'];
            $proj_location_id = $_POST['proj_location_id'];
            $proj_location_name = $_POST['proj_location_name'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "projects";
                $fields = "project_id, project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name";
                $values = "" . $project_id . ",'" . $project_name . "',";
                if ($proj_customer_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $proj_customer_name . "',";
                }
                if ($proj_customer_id == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $proj_customer_id . ",";
                }
                if ($project_type == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $project_type . "',";
                }
                if ($proj_location_id == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $proj_location_id . ",";
                }
                if ($proj_location_name == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'" . $proj_location_name . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "projects";
                $table_id = "project_id";
                $id_value = $project_id;
                $table_id_name = "project_name";
                $name_value = "'" . $project_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>