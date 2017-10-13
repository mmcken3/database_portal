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
            <li><a href="../home.html">Home</a></li>
            <li><a href="../profile.html">Profile</a></li>
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
                $dept_manager_id = $peices[2];
                $dept_manager_name = $peices[3];
            }
        ?>
        <div>
            <h3>Department ID Number</h3>
            <p><?php
                if ($argument1 != 'create') {
                    echo $department_id;
                }
                else {
                    $table = 'departments';
                    $id_type = 'department_id';
                    include('../php_scripts/get_id.php');
                }
            ?></p>
        </div>
        <div>
            <h3>Department Name</h3>
            <p><?php
                if ($argument1 != 'create') {
                    echo "<input id='department_name' value='" . $department_name ."' type='text' size='40' class='textfield' id='fieldID_2'>";
                }
            ?></p>
        </div>
        <div>
            <h3>Department Manager ID Number</h3>
            <p><?php
                if ($argument1 != 'create') {
                    echo "<input id='dept_manager_id' value='" . $dept_manager_id ."' type='text' size='40' class='textfield' id='fieldID_2'>";
                }
            ?></p>
        </div>
        <div>
            <h3>Department Manager User Name</h3>
            <p><?php
                if ($argument1 != 'create') {
                    echo "<input id='dept_manager_name' value='" . $dept_manager_name ."' type='text' size='40' class='textfield' id='fieldID_2'>";
                }
            ?></p>
        </div>
        <h4><a class="button" onClick="searchFunction();">Save</a></h4>
        <script>
            function searchFunction() {
                var fields = "fields="
                var values = "values="
                
                var department_name = document.getElementById("department_name").value;
                if (department_name != "") {
                    values = values + "'" + department_name + "'"
                }
            
                var dept_manager_id = document.getElementById("dept_manager_id").value;
                if (dept_manager_id != "") {
                    if (values != "values=") {
                    values = values + ","
                    }
                    values = values + dept_manager_id 
                }

                var dept_manager_name = document.getElementById("dept_manager_name").value;
                if (dept_manager_name) {
                    if (values != "values=") {
                    values = values + ","
                    }
                    values = values + "'" + dept_manager_name + "'"
                }

                table_name = "table=departments"
                window.open("../views/department_view.php?" + table_name + "&" + fields + "&" + values, "_self")
            }
        </script>
        <?php
            if (isset($_GET['table'])) {
                $table_name = $_GET['table'];
                echo "<p>" . $table_name . "</p>";
            }
            if (isset($_GET['fields'])) {
                $fields = $_GET['fields'];
                echo "<p>" . $fields . "</p>";
            }
            if (isset($_GET['values'])) {
                $values = $_GET['values'];
                echo "<p>" . $values . "</p>";
            }
        ?>
    </body>

</html>