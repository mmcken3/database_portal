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
            <li><a href="../tables/supplier_table.php">Back to Table</a></li>
        </ul>

        <?php
            $supplier_id = $_POST['supplier_id'];
            $supplier_name = $_POST['supplier_name'];
            $supp_location_id = $_POST['supp_location_id'];
            $supp_location_name = $_POST['supp_location_name'];
            $product_type = $_POST['product_type'];
            $contact_name = $_POST['contact_name'];
            $phone_number = $_POST['phone_number'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "suppliers";
                $fields = "supplier_id, supplier_name, supp_location_id, supp_location_name, product_type, contact_name, phone_number";
                $values = "" . $supplier_id . ",'" . $supplier_name . "',";
                if ($supp_location_id == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . $supp_location_id . ",";
                }
                if ($supp_location_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $supp_location_name . "',";
                }
                if ($product_type == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $product_type . "',";
                }
                if ($contact_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'". $contact_name . "',";
                }
                if ($phone_number == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'" . $phone_number . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "suppliers";
                $table_id = "supplier_id";
                $id_value = $supplier_id;
                $table_id_name = "supplier_name";
                $name_value = "'" . $supplier_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>