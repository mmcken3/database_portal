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
            <li><a href="../tables/location_table.php">Back</a></li>
        </ul>
        <h1>Location View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $location_id = $peices[0];
                $location_name = $peices[1];
                $location_type = $peices[2];
                $loc_address = $peices[3];
                $city = $peices[4];
                $loc_state = $peices[5];
                $zip = $peices[6];
            }
        ?>
        <form action="location_submit.php" method="post">
            <div>
                <h3>Location ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='location_id' value='" . $location_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'locations';
                        $id_type = 'location_id';
                        echo "<input name='location_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Location Name</h3>
                <p><?php
                    echo "<input name='location_name' value='";
                    if ($argument1 != 'create') {
                         echo $location_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Location Type</h3>
                <p><?php
                    echo "<input name='location_type' value='";
                    if ($argument1 != 'create') {
                        echo $location_type;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Address</h3>
                <p><?php
                    echo "<input name='loc_address' value='";
                    if ($argument1 != 'create') {
                        echo $loc_address;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>City</h3>
                <p><?php
                    echo "<input name='city' value='";
                    if ($argument1 != 'create') {
                        echo $city;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>State</h3>
                <p><?php
                    echo "<input name='loc_state' value='";
                    if ($argument1 != 'create') {
                        echo $loc_state;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Zip</h3>
                <p><?php
                    echo "<input name='zip' value='";
                    if ($argument1 != 'create') {
                        echo $zip;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>