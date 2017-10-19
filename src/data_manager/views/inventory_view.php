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

        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }
    </style>
</head>

<body>

    <body>
        <ul>
            <li><a href="../../static_web_views/home.html">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../tables/inventory_table.php">Back</a></li>
        </ul>
        <h1>Inventory View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $inventory_id = $peices[0];
                $inventory_type = $peices[1];
                $category = $peices[2];
                $number_of = $peices[3];
                $inv_supplier_id = $peices[4];
                $inv_supplier_name = $peices[5];
                $inv_location_name = $peices[6];
                $inv_location_id = $peices[7];
            }
        ?>
        <form action="inventory_submit.php" method="post">
            <div>
                <h3>Inventory ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='inventory_id' value='" . $inventory_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'inventory';
                        $id_type = 'inventory_id';
                        echo "<input name='inventory_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Inventory Type</h3>
                <p><?php
                    echo "<input name='inventory_type' value='";
                    if ($argument1 != 'create') {
                         echo $inventory_type;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Category</h3>
                <p><?php
                    echo "<input name='category' value='";
                    if ($argument1 != 'create') {
                        echo $category;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Number of Item</h3>
                <p><?php
                    echo "<input name='number_of' value='";
                    if ($argument1 != 'create') {
                        echo $number_of;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Inventory Supplier ID</h3>
                <p><?php
                    echo "<input name='inv_supplier_id' value='";
                    if ($argument1 != 'create') {
                        echo $inv_supplier_id;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Inventory Supplier Name</h3>
                <p><?php
                    echo "<input name='inv_supplier_name' value='";
                    if ($argument1 != 'create') {
                        echo $inv_supplier_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Inventory Location ID</h3>
                <p><?php
                    echo "<input name='inv_location_id' value='";
                    if ($argument1 != 'create') {
                        echo $inv_location_id;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Inventory Location Name</h3>
                <p><?php
                    echo "<input name='inv_location_name' value='";
                    if ($argument1 != 'create') {
                        echo $inv_location_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>