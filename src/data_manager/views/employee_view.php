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
            <li><a href="../tables/employee_table.php">Back</a></li>
        </ul>
        <h1>Employee View Page</h1>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
                $user_name = $peices[1];
                $user_id = $peices[0];
                $first_name = $peices[2];
                $last_name = $peices[3];
                $phone = $peices[4];
                $address = $peices[5];
                $emp_project_id = $peices[6];
                $emp_project_name = $peices[7];
                $emp_department_id = $peices[8];
                $emp_department_name = $peices[9];
            }
        ?>
        <form action="employee_submit.php" method="post">
            <div>
                <h3>User ID Number</h3>
                <p><?php
                    if ($argument1 != 'create') {
                        echo "<input name='user_id' value='" . $user_id ."' type='text' size='40' class='textfield' readonly>";
                    }
                    else {
                        $table = 'employees';
                        $id_type = 'user_id';
                        echo "<input name='user_id' value='";
                        include('../php_scripts/get_id.php');
                        echo "' type='text' size='40' class='textfield' readonly>";
                    }
                ?></p>
            </div>
            <div>
                <h3>User Name</h3>
                <p><?php
                        echo "<input name='user_name' value='";
                        if ($argument1 != 'create') {
                            echo $user_name;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>First Name</h3>
                <p><?php
                        echo "<input name='first_name' value='";
                        if ($argument1 != 'create') {
                            echo $first_name;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Last Name</h3>
                <p><?php
                        echo "<input name='last_name' value='";
                        if ($argument1 != 'create') {
                            echo $last_name;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Address</h3>
                <p><?php
                        echo "<input name='address' value='";
                        if ($argument1 != 'create') {
                            echo $address;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Phone Number</h3>
                <p><?php
                        echo "<input name='phone_number' value='";
                        if ($argument1 != 'create') {
                            echo $phone;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Project ID Number</h3>
                <p><?php
                        echo "<input name='emp_project_id' value='";
                        if ($argument1 != 'create') {
                            echo $emp_project_id;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Project Name</h3>
                <p><?php
                        echo "<input name='emp_project_name' value='";
                        if ($argument1 != 'create') {
                            echo $emp_project_name;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Department ID Number</h3>
                <p><?php
                        echo "<input name='emp_department_id' value='";
                        if ($argument1 != 'create') {
                            echo $emp_department_id;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <div>
                <h3>Department Name</h3>
                <p><?php
                        echo "<input name='emp_department_name' value='";
                        if ($argument1 != 'create') {
                            echo $emp_department_name;
                        }
                        echo "' type='text' size='40' class='textfield'>";
                ?></p>
            </div>
            <input type="submit" name="save" value="Save" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
        </form>
    </body>

</html>