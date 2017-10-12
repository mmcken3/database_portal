<!DOCTYPE html>
<html>

<body>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #table tr:hover {
            background-color: #ddd;
        }
        
        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        
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
        td {
            cursor: pointer;
        }
        tr:nth-child(odd) { 
            background-color : #EAF2D3; 
        }
        tr:nth-child(even) { 
            background-color : #A7C942; 
        }
        tr:hover { 
            background-color : #89ae37; 
        }
    </style>
    </head>

    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../profile.html">Profile</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1>Deparments</h1>

        <h4><a href="../searches/department_search.php">Search Table</a></h4>

        <h4><a href="../views/employee_view.php?argument1=create">Create</a></h4>

        <?php
            $table_name = "departments";
            $key = "order by";
            $args = "department_id";
            require_once("../php_scripts/search.php");
        ?>
        <script>
            var table = document.getElementsByTagName("table")[0];
            var tbody = table.getElementsByTagName("tbody")[0];
            tbody.onclick = function(e) {
                e = e || window.event;
                var data = [];
                var target = e.srcElement || e.target;
                while (target && target.nodeName !== "TR") {
                    target = target.parentNode;
                }
                if (target) {
                    var cells = target.getElementsByTagName("td");
                    for (var i = 0; i < cells.length; i++) {
                        data.push(cells[i].innerHTML);
                    }
                }
                window.open("../views/department_view.php?argument1=" + data, "_self")
            };
        </script>
    </body>

</html>