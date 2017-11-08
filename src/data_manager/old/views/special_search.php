<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../styles/website.css">
<body>
    <?php 
        $table_name = $_GET['table'];
    ?>
    <ul>
    <li><a href="../../home.php">Home</a></li>
    <li><a href="../../profile.php">Profile</a></li>
    <li><a href="#about">About</a></li>
    <li><a <?php echo "href='table_view.php?table=" . $table_name . "'"?> >Back</a></li>
    <li><a href="../../index.php?logout=true">Logout</a></li>
    </ul>
    <h1>Search Display</h1>
    <?php
        $config = parse_ini_file("../config.ini");

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

        $sql = "SHOW COLUMNS FROM " . $table_name;
        $result = $conn->query($sql);
        $column_array = array();
        $type_array = array();

        echo "<table id='table'>";
        echo "<tr id='headers'>";
        while($row = $result->fetch_assoc()) {
            if ($row['Field'] != 'last_updated') {
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
    <input type="submit" value="Search" onClick="searchFunction();">
    <div>
        <script>
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
                var $table_name = document.getElementById("table_name").innerHTML
                window.open("search_display.php?table=" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>