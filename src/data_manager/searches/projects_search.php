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
    <li><a href="../tables/projects_table.php">Back</a></li>
    </ul>
    <h1>Search Project Table</h1>
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
                    <th>project_id</th>
                    <td>int(11)</td>
                    <td><select id='fieldCriteria_4' name="criteriaColumnOperators[4]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[4]" size="40" class="textfield" id="fieldID_4"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[4]" value="user_id"><input type="hidden" name="criteriaColumnTypes[4]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[4]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>project_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_0' name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>proj_customer_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_1' name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="last_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>project_type</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_2' name="criteriaColumnOperators[2]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="last_name"><input type="hidden" name="criteriaColumnTypes[2]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[2]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>proj_location_name</th>
                    <td>varchar(40)</td>
                    <td><select id='fieldCriteria_5' name="criteriaColumnOperators[5]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
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
            <option value="project_id">project_id</option>
            <option value="project_name">project_name</option>
            <option value="proj_customer_name">customer_name</option>
            <option value="project_type">project_type</option>
            <option value="proj_location_name">location_name</option>
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
                var project_id = document.getElementById("fieldID_4").value;
                var project_id_func = document.getElementById("fieldCriteria_4").value;
                project_id = "project_id" + project_id_func + project_id; 
                if (project_id_func != "null") {
                    args = args + project_id
                }

                var project_name = document.getElementById("fieldID_0").value;
                var project_name_func = document.getElementById("fieldCriteria_0").value;
                project_name = "project_name " + project_name_func + " '" + project_name + "'"; 
                if (project_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + project_name
                    }
                    else {
                        args = args + project_name
                    }
                }

                var proj_customer_name = document.getElementById("fieldID_1").value;
                var proj_customer_name_func = document.getElementById("fieldCriteria_1").value;
                proj_customer_name = "proj_customer_name " + proj_customer_name_func + " '" + proj_customer_name + "'"; 
                if (proj_customer_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + proj_customer_name 
                    }
                    else {
                        args = args + proj_customer_name 
                    }
                }

                var project_type = document.getElementById("fieldID_2").value;
                var project_type_func = document.getElementById("fieldCriteria_2").value;
                project_type = "project_type " + project_type_func + " '" + project_type + "'"; 
                if (project_type_func != "null") {
                    if (args != "args=") {
                        args = args + "," + project_type 
                    }
                    else {
                        args = args + project_type 
                    }
                }

                var proj_location_name = document.getElementById("fieldID_5").value;
                var proj_location_name_func = document.getElementById("fieldCriteria_5").value;
                proj_location_name = "proj_location_name " + proj_location_name_func + " '" + proj_location_name + "'"; 
                if (proj_location_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + proj_location_name 
                    }
                    else {
                        args = args + proj_location_name 
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
                $table_name = "table=projects"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
    </div>
</body>

</html>