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
    <li><a href="../tables/location_table.php">Back</a></li>
    </ul>
    <h1>Search Location Table</h1>
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
                    <th>location_id</th>
                    <td>int(11)</td>
                    <td><select id='fieldCriteria_5' name="criteriaColumnOperators[5]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[5]" size="40" class="textfield" id="fieldID_5"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[5]" value="user_id"><input type="hidden" name="criteriaColumnTypes[5]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[5]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>location_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_0' name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>location_type</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_1' name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>loc_address</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_2' name="criteriaColumnOperators[2]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="last_name"><input type="hidden" name="criteriaColumnTypes[2]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[2]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>city</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_3' name="criteriaColumnOperators[3]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[3]" size="40" class="textfield" id="fieldID_3"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[3]" value="admin_rights"><input type="hidden" name="criteriaColumnTypes[3]" value="tinyint(1)"><input type="hidden" name="criteriaColumnCollations[3]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>loc_state</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_6' name="criteriaColumnOperators[6]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[6]" size="40" class="textfield" id="fieldID_6"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[6]" value="phone"><input type="hidden" name="criteriaColumnTypes[6]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[6]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>zip</th>
                    <td>int(11)</td>
                    <td><select id='fieldCriteria_7' name="criteriaColumnOperators[7]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[7]" size="40" class="textfield" id="fieldID_7"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[7]" value="user_address"><input type="hidden" name="criteriaColumnTypes[7]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[7]" value="latin1_swedish_ci"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div id="gis_editor"></div>
    <div id="popup_background"></div>
    <fieldset id="fieldset_display_order">
        <legend>Display order:</legend><select id="orderBySelect" name="orderByColumn"><option value="--nil--"></option>
<option value="location_id">location_id</option>
<option value="location_name">location_name</option>
<option value="location_type">location_type</option>
<option value="loc_address">loc_address</option>
<option value="city">city</option>
<option value="loc_state">loc_state</option>
<option value="zip">zip</option>
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
                var location_id = document.getElementById("fieldID_5").value;
                var location_id_func = document.getElementById("fieldCriteria_5").value;
                location_id = "location_id" + location_id_func + location_id; 
                if (location_id_func != "null") {
                    args = args + location_id
                }

                var location_name = document.getElementById("fieldID_0").value;
                var location_name_func = document.getElementById("fieldCriteria_0").value;
                location_name = "location_name " + location_name_func + " '" + location_name + "'"; 
                if (location_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + location_name
                    }
                    else {
                        args = args + location_name
                    }
                }

                var location_type = document.getElementById("fieldID_1").value;
                var location_type_func = document.getElementById("fieldCriteria_1").value;
                location_type = "location_type " + location_type_func + " '" + location_type + "'"; 
                if (location_type_func != "null") {
                    if (args != "args=") {
                        args = args + "," + location_type 
                    }
                    else {
                        args = args + location_type 
                    }
                }

                var loc_address = document.getElementById("fieldID_2").value;
                var loc_address_func = document.getElementById("fieldCriteria_2").value;
                loc_address = "loc_address " + loc_address_func + " '" + loc_address + "'"; 
                if (loc_address_func != "null") {
                    if (args != "args=") {
                        args = args + "," + loc_address 
                    }
                    else {
                        args = args + loc_address 
                    }
                }

                var city = document.getElementById("fieldID_3").value;
                var city_func = document.getElementById("fieldCriteria_3").value;
                city = "city " + city_func + " '" + city + "'"; 
                if (city_func != "null") {
                    if (args != "args=") {
                        args = args + "," + city 
                    }
                    else {
                        args = args + city 
                    }
                }

                var loc_state = document.getElementById("fieldID_6").value;
                var loc_state_func = document.getElementById("fieldCriteria_6").value;
                loc_state = "loc_state " + loc_state_func + " '" + loc_state + "'"; 
                if (loc_state_func != "null") {
                    if (args != "args=") {
                        args = args + "," + loc_state 
                    }
                    else {
                        args = args + loc_state 
                    }
                }

                var zip = document.getElementById("fieldID_7").value;
                var zip_func = document.getElementById("fieldCriteria_7").value;
                zip = "zip " + zip_func + " '" + zip + "'"; 
                if (zip_func != "null") {
                    if (args != "args=") {
                        args = args + "," + zip 
                    }
                    else {
                        args = args + zip 
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
                $table_name = "table=locations"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>