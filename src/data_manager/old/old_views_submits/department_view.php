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
            <li><a href="../tables/department_table.php">Back</a></li>
        </ul>
        <h1>Department View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $department_id = $peices[0];
                $department_name = $peices[1];
                $dept_manager_name = $peices[2];
            }
        ?>
        <form action="department_submit.php" method="post">
            <div>
                <h3>Department ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='department_id' value='" . $department_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'departments';
                        $id_type = 'department_id';
                        echo "<input name='department_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>Department Name</h3>
                <p><?php
                    echo "<input name='department_name' value='";
                    if ($argument1 != 'create') {
                         echo $department_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Department Manager User Name</h3>
                <p><?php
                    echo "<input name='dept_manager_name' value='";
                    if ($argument1 != 'create') {
                        echo $dept_manager_name;
                    }
                    echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>