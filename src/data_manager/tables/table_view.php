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
        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }
    </style>
    </head>

    <body>
        <?php 
            $table_name = $_GET['table'];
        ?>
        <ul>
            <li><a href="../../home.html">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1><?php echo ucfirst($table_name);?></h1>

        <h4><a href=<?php echo "../searches/special_search.php?table=" . $table_name;?> class="button">Search Table</a></h4>

        <input type="submit" value="Create" onClick="createFunction();">
        <h4></h4>

        <?php
            $key = "order by";
            $args = $table_name . "_id";
            require_once("../php_scripts/search.php");
        ?>
        <p hidden id="table_name"><?php echo $table_name;?></p>
        <script>
            function createFunction() {
                var headData = [];
                var headers = document.getElementsByTagName("th");
                for (var i = 0; i < headers.length; i++) {
                        headData.push(headers[i].innerHTML);
                }
                window.open("../views/row_view.php?argument1=create" + "&table=" + table_name + "&headers=" + headData, "_self")
            }
        </script>
        <script>
            var table_name = document.getElementById("table_name").innerHTML
            var table = document.getElementsByTagName("table")[0];
            var tbody = table.getElementsByTagName("tbody")[0];
            tbody.onclick = function(e) {
                e = e || window.event;
                var data = [];
                var headData = [];
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
                var headers = document.getElementsByTagName("th");
                    for (var i = 0; i < headers.length; i++) {
                        headData.push(headers[i].innerHTML);
                }
                window.open("../views/row_view.php?argument1=" + data + "&table=" + table_name + "&headers=" + headData, "_self")
            };
        </script>
    </body>

</html>