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
            <li><a href="../tables/location_table.php">Back to Table</a></li>
        </ul>

        <?php
            $location_id = $_POST['location_id'];
            $location_name = $_POST['location_name'];
            $location_type = $_POST['location_type'];
            $loc_address = $_POST['loc_address'];
            $city = $_POST['city'];
            $loc_state = $_POST['loc_state'];
            $zip = $_POST['zip'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "locations";
                $fields = "location_id, location_name, location_type, loc_address, city, loc_state, zip";
                $values = "" . $location_id . ",'" . $location_name . "',";
                if ($location_type == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $location_type . "',";
                }
                if ($loc_address == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $loc_address . "',";
                }
                if ($city == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $city . "',";
                }
                if ($loc_state == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $loc_state . "',";
                }
                if ($zip == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . $zip;
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "locations";
                $table_id = "location_id";
                $id_value = $location_id;
                $table_id_name = "location_name";
                $name_value = "'" . $location_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>