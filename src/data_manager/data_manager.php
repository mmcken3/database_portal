<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<?php

// This function starts up a connection to the database with the credentials
// and DB location specfied with the config.ini file. Update that as needed for
// connection changes.
function connect(){
    $config = parse_ini_file("config.ini");
    
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

    return $conn;
}

// This is the request manager function that is needed for updating databae. It will check to see if
// the values of the row of data have been updated since the user last viewed it. If they have
// been changed this will return false, if they have not then it returns true.
// current = the original last_updated time
// table = name of table to search for new last_updated time in
// id_val = the id of the row to find the last_updated time in
function checkTime($current, $table, $id_val) {
    if ($current != 'null'){
        $conn = connect(); // connect

        // Gets the value of last updated from the most current state in the table.
        $sql = "SELECT last_updated FROM " . $table . " WHERE " . $table . "_id = " . $id_val;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $found_time = $row["last_updated"];
            }
            // Free result set
            mysqli_free_result($result);
        }
        $current = substr($current, 1, -1); // removes the ' from the last updated string

        // converts the strings for each time into unix timestamps
        $current = strtotime(explode(" ", $current)[1]);
        $found_time = strtotime(explode(" ", $found_time)[1]);

        // returns false if the passed timestamps are old
        if ($found_time > $current){
            return false;
        }

        $conn->close();
    }
    return true;
}

// This function will backup the database to the system by taking town a full sql dump of
// the schema and data. 
function backup() {
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $config = parse_ini_file("config.ini");
    
    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    exec("mysqldump --user=" . $username . " --password=" . $password . " --host=" . $servername . " " . $database . " > ./backup_database.sql");
}

// Saves the passed data to the database based off the passed in table, field names, and values.
// Based on create it knows whether to update or fully insert new data. Along with that it pulls out
// the last_updated value from the viewed row in order to call checkTime before running the save. If
// checkTime is fasle then this will request the user to re check the data before saving. 
// It only edits yourself as an employee unless you are an admin, and in that case you can edit anything.
// table_name = name of table to save to
// fields = field headers with data to update
// values = values to update for each field
// create = this is set if this is a new creation and not a row update
function save($table_name, $fields, $values, $create) {
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $last_time = substr($values, strrpos($values, ',') + 1);
    $id_val = substr($values, 0, strpos($values, ','));
    if (!checkTime($last_time, $table_name, $id_val)){
        echo "Updated failed because the row has been updated since you viewed it.";
        echo "<br>";
        echo "Please go back to view the updated values.";
        return;
    }
    $conn = connect(); // connect

    // removes the timestamps from the values because we want that to auto update itself on save.
    $fields = substr($fields, 0, strrpos($fields, ','));
    $values = substr($values, 0, strrpos($values, ','));

    // inserts into the table, at the fields, with the values, and updates in duplicate case.
    $sql = "insert into " . $table_name . " (" . $fields . ") values (" . $values . ") on duplicate key update ";
    
    // rotates through the fields and values to set the on duplicate update part of the sql statement.
    if ($fields != "") {
        $peicesf = explode(",", $fields);
        $peicesv = explode(",", $values);
        for ($i = 0; $i < sizeof($peicesf); $i++) {
            if ($i != (sizeof($peicesf) - 1)) {
                $sql = $sql . $peicesf[$i] . "=" . $peicesv[$i] . ", ";
            }
            else {
                $sql = $sql . $peicesf[$i] . "=" . $peicesv[$i];
            }
        }
    }
    // runs check rules to make sure everything fits business rules.
    if (!checkRules($table_name, $peicesf, $peicesv)){
        echo "<p></p>";
        echo "<h4>Not saved!</h4>";
        return;
    }

    // does not update the employee table unless the user is admin.
    if ($table_name != 'employee') {
        $result = $conn->query($sql);
        if ($result != 1) {
            echo "Error saving, please try to change the data again";
            $conn->close();
            return;
        }
        echo "Saved!";
    }
    else if ($admin_rights || $create) {
        $result = $conn->query($sql);
        if ($result != 1) {
            echo "Error saving, please try to change the data again";
            $conn->close();
            return;
        }
        echo "Saved!";
    }
    else if ($login_user == substr($peicesv[1], 1, -1)) {
        $result = $conn->query($sql);
        if ($result != 1) {
            echo "Error saving, please try to change the data again";
            $conn->close();
            return;
        }
    }
    else {
        echo "<p>You are not admin, so you cannot edit employee tables</p>";
    }
    
    $conn->close();
}

// This will check a few rules to ensure that data has been entered and that users are
// following rules such as departments having managers, projects having locations,
// and inventory having suppliers. 
// table_name = table the fields and values are for
// fields = name of column headers with data
// values = value of data for each field
function checkRules($table_name, $fields, $values) {
    // if its department, it checks to be sure manager value is there.
    if ($table_name == 'department') {
        $department_manager_name = $values[2];
        if ($department_manager_name == 'null'){
            echo "<h4>Department's must have a manager!</h4>";
            return false;
        }
        return true;
    }
    else if ($table_name == 'project') { // if project, ensure a location value is there.
        $project_location_name = $values[4];
        if ($project_location_name == 'null'){
            echo "<h4>Project's must have a location!</h4>";
            return false;
        }
        return true;
    }
    else if ($table_name == 'inventory') { // if it is inventory, ensure a location and supplier are there.
        $inventory_location_name = $values[5];
        $inventory_supplier = $values[4];
        if ($inventory_location_name == 'null' || $inventory_supplier == 'null'){
            echo "<h4>Inventory must have a location and supplier!</h4>";
            return false;
        }
        return true;
    }
    else {
        return true;
    }
}

// The delete function will take a table, and id number and then delete that row
// from the table. It will only delete from the employee table if the logged in user
// is an admin account.
// table_name = name of table to delete from
// table_id = header of id key from the specified table
// id_value = value of key of a row to delete
function delete($table_name, $table_id, $id_value){
    $login_user =  $_SESSION["login"];
    $admin = $_SESSION["admin"];

    $conn = connect(); // connects.

    // does not delete from employee unless the user is admin.
    // deletes in table, the row with id_value.
    if ($table_name != 'employee') {
        $sql = "delete from " . $table_name . " where " . $table_id . "=" . $id_value;
        $result = $conn->query($sql);
        echo "Deleted!";
    } 
    else if ($admin) {
        if ($id_value != 1) {
            $sql = "delete from " . $table_name . " where " . $table_id . "=" . $id_value;
            $result = $conn->query($sql);
            echo "Deleted!";
        }
        else {
            echo "You cannot delete the main admin account!";
        }
    }
    else {
        echo "<p>You are not admin, so you cannot edit employee tables</p>";
    }

    $conn->close();
}

// This will get the next up id. It does this by getting the last ID, and then looks
// for the next one in the count.
// table = name of table to search for an id in.
// id_type = header of id key from the specified table
function get_id($table, $id_type) {
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $conn = connect(); // connects.
    
    // Gets only the id number of the highest id number in table.
    $sql = "SELECT " . $id_type . " FROM " . $table . " ORDER BY " . $id_type . " desc limit 1;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo (intval($row[$id_type]) + 1);
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "0 results";
    }
    
    $conn->close();
}

// This will search the database for a table, with the specified arguments passed in
// that are comma delimted and then will follow the specified order in the the order
// variable. The fields are limited in display if a user is not an admin.
// table_name = name of table to search in
// key = usually equal to where
// args = this is a comma list of header=value, header1=value1, ...
// order = order by (asc, desc) and then name of column header, or it is blank
function search($table_name, $key, $args, $order){
    $login_user =  $_SESSION["login"];
    $admin_rights = $_SESSION["admin"];

    $conn = connect(); // connects.

    // Gets a list of column names from the passed table.
    $sql = "SHOW COLUMNS FROM " . $table_name;
    $result = $conn->query($sql);
    $column_array = array();

    // Sets up a table and headers, showing admin and password info only to admins.
    echo "<table id='table'>";
    echo "<thead>";
    echo "<tr id='headers'>";
    while($row = $result->fetch_assoc()) {
        if ($row['Field'] != 'last_updated') {
            if ($row['Field'] != "user_pass" && $row['Field'] != "admin_rights") {
                array_push($column_array, $row['Field']);
                echo "<th>" . $row['Field'] . "</th>";
            }
            else if ($admin_rights) {
                if ($row['Field'] != "user_pass"){
                    array_push($column_array, $row['Field']);
                    echo "<th>" . $row['Field'] . "</th>";
                }
                else {
                    array_push($column_array, $row['Field']);
                    echo "<th hidden>" . $row['Field'] . "</th>";
                }
            }
        }
        else {
            array_push($column_array, $row['Field']);
            echo "<th hidden>" . $row['Field'] . "</th>";
        }
    }
    echo "</tr></thead>";
    echo "<tbody>";
    // Seperates the arguments on commas to get each specifc part of data.
    $peices = explode(",", $args);
    $myArgs = "";
    for ($i = 0; $i < sizeof($peices) - 1; $i++){
        // iterates through args building column_name = column_value AND ...
        $myArgs = $myArgs . $peices[0] . " AND ";
    }
    $myArgs = $myArgs . $peices[(sizeof($peices) - 1)];

    // Builds a specific select statement based on the passed key, arguments, and order.
    $sql = "SELECT * FROM " . $table_name;
    if ($args != '') {
        $sql = $sql . " " . $key . " " . $myArgs; // key is where.
    }

    // Gets the order by value and column to order by if it is selected.
    if ($order != "") {
        $orderParts = explode(",", $order);
        $sql = $sql . " ORDER BY " . $orderParts[1] . " " . $orderParts[0];
    }
    $result = $conn->query($sql);

    // Adds the results from the seach query to the table for display.
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr id='row'>";
                for ($i = 0; $i < sizeof($column_array); $i++) {
                    if ($column_array[$i] == 'user_pass' || $column_array[$i] == 'last_updated'){
                        echo "<td hidden>" . $row[$column_array[$i]] . "</td>";
                    }
                    else {
                        echo "<td>" . $row[$column_array[$i]] . "</td>";
                    }
                }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "0 results";
    }

    $conn->close();
}

?>