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
        <li><a href="../tables/department_table.php">Back</a></li>
    </ul>
    <h1>Search Department Table</h1>
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
                    <th>department_id</th>
                    <td>int(11)</td>
                    <td><select id="fieldCriteria_2" name="criteriaColumnOperators[2]"><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[2]" size="40" class="textfield" id="fieldID_2"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[2]" value="user_id"><input type="hidden" name="criteriaColumnTypes[2]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[2]" value=""></td>
                </tr>
                <tr class="noclick odd">
                    <th>department_name</th>
                    <td>varchar(40)</td>
                    <td><select name="criteriaColumnOperators[0]"><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[0]" size="40" class="textfield" id="fieldID_0"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[0]" value="user_name"><input type="hidden" name="criteriaColumnTypes[0]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[0]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick even">
                    <th>dept_manager_id</th>
                    <td>int(11)</td>
                    <td><select name="criteriaColumnOperators[1]"><option value="=">=</option><option value="!=">!=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option></select></td>
                    <td><input type="text" name="criteriaValues[1]" size="40" class="textfield" id="fieldID_1"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[1]" value="first_name"><input type="hidden" name="criteriaColumnTypes[1]" value="int(11)"><input type="hidden" name="criteriaColumnCollations[1]" value="latin1_swedish_ci"></td>
                </tr>
                <tr class="noclick odd">
                    <th>dept_manager_name</th>
                    <td>varchar(40)</td>
                    <td><select name="criteriaColumnOperators[3]"><option value="LIKE">LIKE</option><option value="=">=</option><option value="!=">!=</option></td>
                    <td><input type="text" name="criteriaValues[3]" size="40" class="textfield" id="fieldID_3"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="criteriaColumnNames[3]" value="user_name"><input type="hidden" name="criteriaColumnTypes[3]" value="varchar(40)"><input type="hidden" name="criteriaColumnCollations[3]" value="latin1_swedish_ci"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div id="gis_editor"></div>
    <div id="popup_background"></div>
    <fieldset id="fieldset_display_order">
        <legend>Display order:</legend>
        <select name="orderByColumn"><option value="--nil--"></option>
            <option value="department_id">department_id</option>
            <option value="department_name">project_name</option>
            <option value="dept_manager_id">dept_manager_id</option>
        </select>
        <div class="formelement"><input type="radio" name="order" id="order_ASC" value="ASC" checked="checked">
        <label for="order_ASC">Ascending</label></div>
        <div class="formelement"><input type="radio" name="order" id="order_DESC" value="DESC">
        <label for="order_DESC">Descending</label></div>
    </fieldset>
    <br style="clear: both;">
    </div>
    </div>
    </fieldset>
    <input type="submit" value="Search" onClick="searchFunction();">
    <div>
        <script>
            function searchFunction() {
                var department_id = document.getElementById("fieldID_2").value;
                var department_id_func = document.getElementById("fieldCriteria_2").value;
                department_id = "department_id" + department_id_func + department_id; 
                window.open("../searches/department_search.php?search=" + department_id, "_self")
            }
        </script>
    </div>
    <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo "<p>";
            echo $search;
            echo "</p>";
        }
    ?>
</body>

</html>