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
            <li><a href="../tables/supplier_table.php">Back</a></li>
        </ul>
        <h1>Supplier View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $supplier_id = $peices[0];
                $supplier_name = $peices[1];
                $supp_location_name = $peices[2];
                $product_type = $peices[3];
                $contact_name = $peices[4];
                $phone_number = $peices[5];
            }
        ?>
        <form action="supplier_submit.php" method="post">
            <div>
                <h3>Supplier ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='supplier_id' value='" . $supplier_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'suppliers';
                        $id_type = 'supplier_id';
                        echo "<input name='supplier_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Supplier Name</h3>
                <p><?php
                    echo "<input name='supplier_name' value='";
                    if ($argument1 != 'create') {
                         echo $supplier_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Supplier Location Name</h3>
                <p><?php
                    echo "<input name='supp_location_name' value='";
                    if ($argument1 != 'create') {
                        echo $supp_location_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Product Type</h3>
                <p><?php
                    echo "<input name='product_type' value='";
                    if ($argument1 != 'create') {
                        echo $product_type;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Contact Name</h3>
                <p><?php
                    echo "<input name='contact_name' value='";
                    if ($argument1 != 'create') {
                        echo $contact_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Contact Phone Number</h3>
                <p><?php
                    echo "<input name='phone_number' value='";
                    if ($argument1 != 'create') {
                        echo $phone_number;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>