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
    <li><a href="../tables/supplier_table.php">Back</a></li>
    </ul>
    <h1>Search Supplier Table</h1>
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
                    <th>supplier_id</th>
                    <td>int(11)</td>
                    <td><select id="fieldCriteria_5" name="criteriaColumnOperators[5]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[5]" size="40" class="textfield" id="fieldID_5"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[5]" value="user_id"><input type="hidden" name="criteriaColumnTypes[5]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[5]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>supplier_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_0" name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>product_type</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_1" name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>contact_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_2" name="criteriaColumnOperators[2]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="last_name"><input type="hidden" name="criteriaColumnTypes[2]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[2]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>supp_location_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_7" name="criteriaColumnOperators[7]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[7]" size="40" class="textfield" id="fieldID_7"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[7]" value="phone"><input type="hidden" name="criteriaColumnTypes[7]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[7]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>phone_number</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_6" name="criteriaColumnOperators[6]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[6]" size="40" class="textfield" id="fieldID_6"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[6]" value="phone"><input type="hidden" name="criteriaColumnTypes[6]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[6]" value="latin1_swedish_ci"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div id="gis_editor"></div>
    <div id="popup_background"></div>
    <fieldset id="fieldset_display_order">
        <legend>Display order:</legend>
        <select id="orderBySelect" name="orderByColumn">
            <option value="--nil--"></option>        
            <option value="supplier_id">supplier_id</option>
            <option value="supplier_name">supplier_name</option>
            <option value="supp_location_name">location_name</option>
            <option value="product_type">product_type</option>
            <option value="contact_name">contact_name</option>
            <option value="phone_number">phone_number</option>
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
                var supplier_id = document.getElementById("fieldID_5").value;
                var supplier_id_func = document.getElementById("fieldCriteria_5").value;
                supplier_id = "supplier_id" + supplier_id_func + supplier_id; 
                if (supplier_id_func != "null") {
                    args = args + supplier_id
                }

                var supplier_name = document.getElementById("fieldID_0").value;
                var supplier_name_func = document.getElementById("fieldCriteria_0").value;
                supplier_name = "supplier_name " + supplier_name_func + " '" + supplier_name + "'"; 
                if (supplier_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + supplier_name
                    }
                    else {
                        args = args + supplier_name
                    }
                }

                var product_type = document.getElementById("fieldID_1").value;
                var product_type_func = document.getElementById("fieldCriteria_1").value;
                product_type = "product_type " + product_type_func + " '" + product_type + "'"; 
                if (product_type_func != "null") {
                    if (args != "args=") {
                        args = args + "," + product_type 
                    }
                    else {
                        args = args + product_type 
                    }
                }

                var supp_location_name = document.getElementById("fieldID_7").value;
                var supp_location_name_func = document.getElementById("fieldCriteria_7").value;
                supp_location_name = "supp_location_name " + supp_location_name_func + " '" + supp_location_name + "'"; 
                if (supp_location_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + supp_location_name 
                    }
                    else {
                        args = args + supp_location_name 
                    }
                }

                var phone_number = document.getElementById("fieldID_6").value;
                var phone_number_func = document.getElementById("fieldCriteria_6").value;
                phone_number = "phone_number " + phone_number_func + " '" + phone_number + "'"; 
                if (phone_number_func != "null") {
                    if (args != "args=") {
                        args = args + "," + phone_number 
                    }
                    else {
                        args = args + phone_number 
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
                $table_name = "table=suppliers"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>