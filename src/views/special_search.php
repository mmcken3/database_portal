<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../styles/website.css">
<body>
    <?php 
        $table_name = $_GET['table'];
        // Ensure that the user is logged in, if not if will send them back to login page. 
        if ($_SESSION["login"] == "") {
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    ?>
    <nav>
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="../profile.php">Profile</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a <?php echo "href='table_view.php?table=" . $table_name . "'"?> >Back</a></li>
            <li><a href="../index.php?logout=true">Logout</a></li>
        </ul>
    </nav>
    <h1>Search Display</h1>
    <?php
    // This search page is modeled similarly to phpMyAdmin search, user can search of any field, with a list
    // of different comparisons and order by any field.

        // Connect to database off configuration. 
        $config = parse_ini_file("../data_manager/config.ini");

        $servername = $config['servername'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Grabs all of the columns from the database, and then sets them for users to search for. 
        $sql = "SHOW COLUMNS FROM " . $table_name;
        $result = $conn->query($sql);
        $column_array = array();
        $type_array = array();

        // Configure the table the users can edit for seaching. 
        echo "<table id='table'>";
        echo "<tr id='headers'>";
        while($row = $result->fetch_assoc()) {
            if ($row['Field'] != 'last_updated') {
                // Do not let users search by admin rights or passwords
                if ($row['Field'] != "user_pass" && $row['Field'] != "admin_rights") {
                    array_push($column_array, $row['Field']);
                    array_push($type_array, $row['Type']);
                }
            }
        }
        echo "</tr>";

        $conn->close();
    ?>
    <table class="data">
        <thead>
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Operator</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // This prints out all of the comparison operators and variable entry fields in the table for each column shown. 
                for ($i = 0; $i < count($column_array); $i++){
                    echo "<tr class='noclick even'>";
                    echo "<th name='columnList[" . $i . "]'>" . $column_array[$i] . "</th>";
                    echo "<td>" . $type_array[$i] . "</td>";
                    echo "<td><select id='fieldCriteria_" . $i . "' name='criteriaColumnOperators[" . $i . "]'><option value='null'></option>";
                    if ($type_array[$i] == "int(11)") { 
                        echo "<option value='='>=</option><option value='!='>!=</option><option value='>'>></option><option value='<'><</option><option value='>='>>=</option><option value='<='><=</option></select></td>";
                    }     
                    else {
                        echo "<option value='LIKE'>LIKE</option><option value='='>=</option><option value='!='>!=</option></td>";                            
                    }                   
                    echo "<td><input type='text' name='criteriaValues[" . $i . "]' size='40' class='textfield' id='fieldID_" . $i . "'></td>";
                }
            ?>
        </tbody>
    </table>
    <fieldset id="fieldset_display_order">
        <legend>Display order:</legend>
        <select id="orderBySelect" name="orderByColumn">
            <option value="--nil--"></option>
            <?php
                for ($i = 0; $i < count($column_array); $i++){
                    echo "<option value='" . $column_array[$i] . "'>" . $column_array[$i] . "</option>";
                }
            ?>
        </select>
        <div class="formelement"><input type="radio" name="order" id="order_ASC" value="ASC" checked="checked">
        <label for="order_ASC">Ascending</label></div>
        <div class="formelement"><input type="radio" name="order" id="order_DESC" value="DESC">
        <label for="order_DESC">Descending</label></div>
    </fieldset>
    <br style="clear: both;">
    </fieldset>
    <p hidden id="table_name"><?php echo $table_name;?></p>
    <input type="submit" value="Search" class="btn blue" onClick="searchFunction();">
    <div>
        <script>
            // Pulls all the column headers, comparisons, and entered values from the table. If anything is entered.
            function searchFunction() {
                var args = "args="
                var criteria = document.querySelectorAll("select[name^='criteriaColumnOperators[']")
                var values = document.querySelectorAll("input[name^='criteriaValues[']")
                var headers = document.querySelectorAll("th[name^='columnList[']")
                for (i = 0; i < criteria.length; i++) {
                    if (criteria[i].value != 'null') {
                        if (args != "args=") {
                            args += ","
                        }
                        args += headers[i].innerHTML + " " + criteria[i].value + " '" + values[i].value + "'"
                    }
                }

                // Gets the order value from the table if its selected. 
                var $order = "order=";
                var orderBy = document.getElementById("orderBySelect").value;
                if (orderBy != "--nil--") {
                    var radios = document.getElementsByName('order');
                    for (var i = 0, length = radios.length; i < length; i++) {
                        if (radios[i].checked) {
                            $order = $order + radios[i].value;
                            break;
                        }
                    }
                    $order = $order + "," + orderBy;
                }
                $key = "key=" + "where";

                // Opens up the search display with the table name, list of arguments to search by, where key word, and an
                // order if one was selected above. 
                var $table_name = document.getElementById("table_name").innerHTML
                window.open("search_display.php?table=" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>