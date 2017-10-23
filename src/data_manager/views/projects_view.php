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
            <li><a href="../tables/projects_table.php">Back</a></li>
        </ul>
        <h1>Project View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $project_id = $peices[0];
                $project_name = $peices[1];
                $proj_customer_name = $peices[2];
                $project_type = $peices[3];
                $proj_location_name = $peices[4];
            }
        ?>
        <form action="projects_submit.php" method="post">
            <div>
                <h3>Project ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='project_id' value='" . $project_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'projects';
                        $id_type = 'project_id';
                        echo "<input name='project_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Project Name</h3>
                <p><?php
                    echo "<input name='project_name' value='";
                    if ($argument1 != 'create') {
                         echo $project_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Project Customer Name</h3>
                <p><?php
                    echo "<input name='proj_customer_name' value='";
                    if ($argument1 != 'create') {
                        echo $proj_customer_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Project Type</h3>
                <p><?php
                    echo "<input name='project_type' value='";
                    if ($argument1 != 'create') {
                        echo $project_type;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Project Location Name</h3>
                <p><?php
                    echo "<input name='proj_location_name' value='";
                    if ($argument1 != 'create') {
                        echo $proj_location_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>