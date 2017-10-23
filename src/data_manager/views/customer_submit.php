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
            <li><a href="../tables/customer_table.php">Back to Table</a></li>
        </ul>

        <?php
            $customer_id = $_POST['customer_id'];
            $customer_name = $_POST['customer_name'];
            $contact_name = $_POST['contact_name'];
            $contact_number = $_POST['contact_number'];
            $cust_location_name = $_POST['cust_location_name'];
            if ($_REQUEST['save'] == "Save") {
                $table_name = "customers";
                $fields = "customer_id, customer_name, contact_name, contact_number, cust_location_name";
                $values = "" . $customer_id . ",'" . $customer_name . "',";
                if ($contact_name == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $contact_name . "',";
                }
                if ($contact_number == '') {
                    $values = $values . "null,";
                }
                else {
                    $values = $values . "'" . $contact_number . "',";
                }
                if ($cust_location_name == '') {
                    $values = $values . "null";
                }
                else {
                    $values = $values . "'" . $cust_location_name . "'";
                }
    
                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
    
                echo "Saved!";
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_name = "customers";
                $table_id = "customer_id";
                $id_value = $customer_id;
                $table_id_name = "customer_name";
                $name_value = "'" . $customer_name . "'";
                require_once("../php_scripts/delete.php");
                // put call to delete php script here
                echo "Deleted!";
            }
        ?>

    </body>

</html>