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
        <li><a href="../home.html">Home</a></li>
        <li><a href="../profile.html">Profile</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="../tables/inventory_table.html">Back</a></li>
    </ul>
    <h1>Search Inventory Table</h1>
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
                    <th>inventory_id</th>
                    <td>int(11)</td>
                    <td><select id="fieldCriteria_5" name="criteriaColumnOperators[5]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[5]" size="40" class="textfield" id="fieldID_5"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[5]" value="user_id"><input type="hidden" name="criteriaColumnTypes[5]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[5]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>inventory_type</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_0" name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>category</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_1" name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>inv_supplier_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_8" name="criteriaColumnOperators[8]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[8]" size="40" class="textfield" id="fieldID_8"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[8]" value="first_name"><input type="hidden" name="criteriaColumnTypes[8]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[8]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>inv_location_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_7" name="criteriaColumnOperators[7]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[7]" size="40" class="textfield" id="fieldID_7"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[7]" value="first_name"><input type="hidden" name="criteriaColumnTypes[7]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[7]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>number_of</th>
                    <td>int(11)</td>
                    <td><select id="fieldCriteria_6" name="criteriaColumnOperators[6]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></td>
                    <td><input type="text" name="criteriaValues[6]" size="40" class="textfield" id="fieldID_6"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[6]" value="phone"><input type="hidden" name="criteriaColumnTypes[6]" value="varchar(25)"><input type="hidden" name="criteriaColumnCollations[6]" value="latin1_swedish_ci"></td>
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
            <option value="inventory_id">inventory_id</option>
            <option value="inventory_type">inventory_type</option>
            <option value="category">category</option>
            <option value="inv_supplier_name">supplier_name</option>
            <option value="inv_location_name">location_name</option>
            <option value="number_of">number_of</option>
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
                var inventory_id = document.getElementById("fieldID_5").value;
                var inventory_id_func = document.getElementById("fieldCriteria_5").value;
                inventory_id = "inventory_id" + inventory_id_func + inventory_id; 
                if (inventory_id_func != "null") {
                    args = args + inventory_id
                }

                var inventory_type = document.getElementById("fieldID_0").value;
                var inventory_type_func = document.getElementById("fieldCriteria_0").value;
                inventory_type = "inventory_type " + inventory_type_func + " '" + inventory_type + "'"; 
                if (inventory_type_func != "null") {
                    if (args != "args=") {
                        args = args + "," + inventory_type
                    }
                    else {
                        args = args + inventory_type
                    }
                }

                var category = document.getElementById("fieldID_1").value;
                var category_func = document.getElementById("fieldCriteria_1").value;
                category = "category " + category_func + " '" + category + "'"; 
                if (category_func != "null") {
                    if (args != "args=") {
                        args = args + "," + category 
                    }
                    else {
                        args = args + category 
                    }
                }

                var inv_supplier_name = document.getElementById("fieldID_8").value;
                var inv_supplier_name_func = document.getElementById("fieldCriteria_8").value;
                inv_supplier_name = "inv_supplier_name " + inv_supplier_name_func + " '" + inv_supplier_name + "'"; 
                if (inv_supplier_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + inv_supplier_name 
                    }
                    else {
                        args = args + inv_supplier_name 
                    }
                }

                var inv_location_name = document.getElementById("fieldID_7").value;
                var inv_location_name_func = document.getElementById("fieldCriteria_7").value;
                inv_location_name = "inv_location_name " + inv_location_name_func + " '" + inv_location_name + "'"; 
                if (inv_location_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + inv_location_name 
                    }
                    else {
                        args = args + inv_location_name 
                    }
                }

                var number_of = document.getElementById("fieldID_6").value;
                var number_of_func = document.getElementById("fieldCriteria_6").value;
                number_of = "number_of " + number_of_func + " " + number_of; 
                if (number_of_func != "null") {
                    if (args != "args=") {
                        args = args + "," + number_of 
                    }
                    else {
                        args = args + number_of 
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
                $table_name = "table=inventory"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>