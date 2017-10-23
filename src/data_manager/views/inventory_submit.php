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
            <li><a href="../tables/inventory_table.php">Back to Table</a></li>
        </ul>

        <?php
            $inventory_id = $_POST['inventory_id'];
            $inventory_type = $_POST['inventory_type'];
            $category = $_POST['category'];
            $number_of = $_POST['number_of'];
            $inv_supplier_name = $_POST['inv_supplier_name'];
            $inv_location_name = $_POST['inv_location_name'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "inventory";
                $fields = "inventory_id, inventory_type, category, number_of, inv_supplier_name, inv_location_name";
                $values = "" . $inventory_id . ",'" . $inventory_type . "',";
                if ($category == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $category . "',";
                }
                if ($number_of == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $number_of . ",";
                }
                if ($inv_supplier_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $inv_supplier_name . "',";
                }
                if ($inv_location_name == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'". $inv_location_name . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "inventory";
                $table_id = "inventory_id";
                $id_value = $inventory_id;
                $table_id_name = "inventory_type";
                $name_value = "'" . $inventory_type . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>