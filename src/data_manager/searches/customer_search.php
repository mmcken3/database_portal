<!DOCTYPE html>
<html>
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
</style>

<body>
    <ul>
        <li><a href="../../static_web_views/home.html">Home</a></li>
        <li><a href="../views/profile.php">Profile</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="../tables/customer_table.php">Back</a></li>
    </ul>
    <h1>Search Customer Table</h1>
    <fieldset>
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
                <tr class="noclick even">
                    <th>customer_id</th>
                    <td>int(11)</td>
                    <td><select id='fieldCriteria_4' name="criteriaColumnOperators[4]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[4]" size="40" class="textfield" id="fieldID_4"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[4]" value="user_id"><input type="hidden" name="criteriaColumnTypes[4]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[4]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>customer_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_0' name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(25)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>contact_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_1' name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(25)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>contact_number</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_2' name="criteriaColumnOperators[2]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="last_name"><input type="hidden" name="criteriaColumnTypes[2]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[2]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>cust_location_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_5' name="criteriaColumnOperators[5]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[5]" size="40" class="textfield" id="fieldID_5"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[5]" value="last_name"><input type="hidden" name="criteriaColumnTypes[5]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[5]" value="latin1_swedish_ci"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div id="gis_editor"></div>
    <div id="popup_background"></div>
    <fieldset id="fieldset_display_order">
        <legend>Display order:</legend>
        <select id='orderBySelect' name="orderByColumn">
            <option value="--nil--"></option>
            <option value="customer_id">customer_id</option>
            <option value="customer_name">customer_name</option>
            <option value="contact_name">contact_name</option>
            <option value="contact_number">contact_number</option>
            <option value="cust_location_name">cust_location_name</option>
        </select>
        <div class="formelement"><input type="radio" name="order" id="order_ASC" value="ASC" checked="checked">
            <label for="order_ASC">Ascending</label></div>
        <div class="formelement"><input type="radio" name="order" id="order_DESC" value="DESC">
            <label for="order_DESC">Descending</label></div>
    </fieldset><br style="clear: both;"></div>
    </div>
    </fieldset>
    <input type="submit" value="Search" onClick="searchFunction();">
    <div>
        <script>
            function searchFunction() {
                var args = "args="
                var customer_id = document.getElementById("fieldID_4").value;
                var customer_id_func = document.getElementById("fieldCriteria_4").value;
                customer_id = "customer_id" + customer_id_func + customer_id; 
                if (customer_id_func != "null") {
                    args = args + customer_id
                }

                var customer_name = document.getElementById("fieldID_0").value;
                var customer_name_func = document.getElementById("fieldCriteria_0").value;
                customer_name = "customer_name " + customer_name_func + " '" + customer_name + "'"; 
                if (customer_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + customer_name
                    }
                    else {
                        args = args + customer_name
                    }
                }

                var contact_name = document.getElementById("fieldID_1").value;
                var contact_name_func = document.getElementById("fieldCriteria_1").value;
                contact_name = "contact_name " + contact_name_func + " '" + contact_name + "'"; 
                if (contact_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + contact_name 
                    }
                    else {
                        args = args + contact_name 
                    }
                }

                var contact_number = document.getElementById("fieldID_2").value;
                var contact_number_func = document.getElementById("fieldCriteria_2").value;
                contact_number = "contact_number " + contact_number_func + " '" + contact_number + "'"; 
                if (contact_number_func != "null") {
                    if (args != "args=") {
                        args = args + "," + contact_number 
                    }
                    else {
                        args = args + contact_number 
                    }
                }

                var cust_location_name = document.getElementById("fieldID_5").value;
                var cust_location_name_func = document.getElementById("fieldCriteria_5").value;
                cust_location_name = "cust_location_name " + cust_location_name_func + " '" + cust_location_name + "'"; 
                if (cust_location_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + cust_location_name 
                    }
                    else {
                        args = args + cust_location_name 
                    }
                }

                var $order = "order=";
                var orderBy = document.getElementById("orderBySelect").value;
                if (orderBy != "--nil--") {
                    var radios = document.getElementsByName('order');
                    for (var i = 0, length = radios.length; i < length; i++) {
                        if (radios[i].checked) {
                            //alert(radios[i].value);
                            $order = $order + radios[i].value;
                            break;
                        }
                    }
                    $order = $order + "," + orderBy;
                }
                $key = "key=" + "where";
                $table_name = "table=customers"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>