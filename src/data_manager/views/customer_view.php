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
            <li><a href="../tables/customer_table.php">Back</a></li>
        </ul>
        <h1>Customer View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $customer_id = $peices[0];
                $customer_name = $peices[1];
                $contact_name = $peices[2];
                $contact_number = $peices[3];
                $cust_location_id = $peices[4];
                $cust_location_name = $peices[5];
            }
        ?>
        <form action="customer_submit.php" method="post">
            <div>
                <h3>Customer ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='customer_id' value='" . $customer_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'customers';
                        $id_type = 'customer_id';
                        echo "<input name='customer_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Customer Name</h3>
                <p><?php
                    echo "<input name='customer_name' value='";
                    if ($argument1 != 'create') {
                         echo $customer_name;
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
                    echo "<input name='contact_number' value='";
                    if ($argument1 != 'create') {
                        echo $contact_number;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Customer Location ID</h3>
                <p><?php
                    echo "<input name='cust_location_id' value='";
                    if ($argument1 != 'create') {
                        echo $cust_location_id;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Customer Location Name</h3>
                <p><?php
                    echo "<input name='cust_location_name' value='";
                    if ($argument1 != 'create') {
                        echo $cust_location_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>