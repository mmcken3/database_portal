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
    <li><a href="../tables/employee_table.php">Back</a></li>
    </ul>
    <h1>Search Employee Table</h1>
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
                    <th>user_id</th>
                    <td>int(11)</td>
                    <td><select id="fieldCriteria_5" name="criteriaColumnOperators[5]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[5]" size="40" class="textfield" id="fieldID_5"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[5]" value="user_id"><input type="hidden" name="criteriaColumnTypes[5]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[5]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>user_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_0" name="criteriaColumnOperators[0]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>first_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_1" name="criteriaColumnOperators[1]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>last_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_2" name="criteriaColumnOperators[2]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="last_name"><input type="hidden" name="criteriaColumnTypes[2]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[2]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>admin_rights</th>
                    <td>tinyint(1)</td>
                    <td><select id="fieldCriteria_3" name="criteriaColumnOperators[3]"><option value="null"></option><option value="=">=</option><option value="!=">!=</option></select></td>
                    <td><input type="text" name="criteriaValues[3]" size="40" class="textfield" id="fieldID_3"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[3]" value="admin_rights"><input type="hidden" name="criteriaColumnTypes[3]" value="tinyint(1)"><input type="hidden" name="criteriaColumnCollations[3]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>phone</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_6" name="criteriaColumnOperators[6]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[6]" size="40" class="textfield" id="fieldID_6"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[6]" value="phone"><input type="hidden" name="criteriaColumnTypes[6]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[6]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>user_address</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_7" name="criteriaColumnOperators[7]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[7]" size="40" class="textfield" id="fieldID_7"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[8]" value="project_id"><input type="hidden" name="criteriaColumnTypes[8]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[8]" value=""></td>
                </tr>
                <tr class="noclick even">
                    <th>emp_project_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_10" name="criteriaColumnOperators[10]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[10]" size="40" class="textfield" id="fieldID_10"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[9]" value="department_id"><input type="hidden" name="criteriaColumnTypes[9]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[9]" value=""></td>
                </tr>
                <tr class="noclick even">
                    <th>emp_department_name</th>
                    <td>varchar(40)</td>
                    <td><select id="fieldCriteria_11" name="criteriaColumnOperators[11]"><option value="null"></option><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[11]" size="40" class="textfield" id="fieldID_11"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[11]" value="user_address"><input type="hidden" name="criteriaColumnTypes[11]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[11]" value="latin1_swedish_ci"></td>
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
            <option value="user_name">user_name</option>
            <option value="first_name">first_name</option>
            <option value="last_name">last_name</option>
            <option value="admin_rights">admin_rights</option>
            <option value="user_id">user_id</option>
            <option value="phone">phone</option>
            <option value="user_address">user_address</option>
            <option value="emp_project_name">project_name</option>
            <option value="emp_department_name">department_name</option>
        </select>
                        <div class="formelement"><input type="radio" name="order" id="order_ASC" value="ASC" checked="checked">
                            <label for="order_ASC">Ascending</label></div>
                        <div class="formelement"><input type="radio" name="order" id="order_DESC" value="DESC">
                            <label for="order_DESC">Descending</label></div>
    </fieldset><br style="clear: both;"></div>
    </div>
    </fieldset>
    <input type="submit" value="Search" onClick="searchFunction();">
    <script>
            function searchFunction() {
                var args = "args="
                var user_id = document.getElementById("fieldID_5").value;
                var user_id_func = document.getElementById("fieldCriteria_5").value;
                user_id = "user_id" + user_id_func + user_id; 
                if (user_id_func != "null") {
                    args = args + user_id
                }

                var user_name = document.getElementById("fieldID_0").value;
                var user_name_func = document.getElementById("fieldCriteria_0").value;
                user_name = "user_name " + user_name_func + " '" + user_name + "'"; 
                if (user_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + user_name
                    }
                    else {
                        args = args + user_name
                    }
                }

                var first_name = document.getElementById("fieldID_1").value;
                var first_name_func = document.getElementById("fieldCriteria_1").value;
                first_name = "first_name " + first_name_func + " '" + first_name + "'"; 
                if (first_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + first_name 
                    }
                    else {
                        args = args + location_type 
                    }
                }

                var last_name = document.getElementById("fieldID_2").value;
                var last_name_func = document.getElementById("fieldCriteria_2").value;
                last_name = "last_name " + last_name_func + " '" + last_name + "'"; 
                if (last_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + last_name 
                    }
                    else {
                        args = args + last_name 
                    }
                }

                var admin_rights = document.getElementById("fieldID_3").value;
                var admin_rights_func = document.getElementById("fieldCriteria_3").value;
                admin_rights = "admin_rights " + admin_rights_func + " " + admin_rights; 
                if (admin_rights_func != "null") {
                    if (args != "args=") {
                        args = args + "," + admin_rights 
                    }
                    else {
                        args = args + admin_rights 
                    }
                }

                var phone = document.getElementById("fieldID_6").value;
                var phone_func = document.getElementById("fieldCriteria_6").value;
                phone = "phone " + phone_func + " '" + phone + "'"; 
                if (phone_func != "null") {
                    if (args != "args=") {
                        args = args + "," + phone 
                    }
                    else {
                        args = args + phone 
                    }
                }

                var user_address = document.getElementById("fieldID_7").value;
                var user_address_func = document.getElementById("fieldCriteria_7").value;
                user_address = "user_address " + user_address_func + " '" + user_address + "'"; 
                if (user_address_func != "null") {
                    if (args != "args=") {
                        args = args + "," + user_address 
                    }
                    else {
                        args = args + user_address 
                    }
                }

                var emp_project_name = document.getElementById("fieldID_10").value;
                var emp_project_name_func = document.getElementById("fieldCriteria_10").value;
                emp_project_name = "emp_project_name " + emp_project_name_func + " '" + emp_project_name + "'"; 
                if (emp_project_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + emp_project_name 
                    }
                    else {
                        args = args + emp_project_name 
                    }
                }

                var emp_department_name = document.getElementById("fieldID_11").value;
                var emp_department_name_func = document.getElementById("fieldCriteria_11").value;
                emp_department_name = "emp_department_name " + emp_department_name_func + " '" + emp_department_name + "'"; 
                if (emp_department_name_func != "null") {
                    if (args != "args=") {
                        args = args + "," + emp_department_name 
                    }
                    else {
                        args = args + emp_department_name 
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
                $table_name = "table=employees"
                window.open("../tables/search_display.php?" + $table_name + "&" + args + "&" + $key + "&" + $order, "_self")
            }
        </script>
</body>

</html>