<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<body>
    <link rel="stylesheet" type="text/css" href="../styles/website.css">
    </head>

    <body>
        <?php
            if ($_SESSION["login"] == "") {
                echo "<script>window.open('../index.php', '_self')</script>";
            }
        ?>
        <?php 
            $table_name = $_GET['table'];
        ?>
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="../profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../index.php?logout=true">Logout</a></li>
        </ul>
        <h1><?php echo ucfirst($table_name);?></h1>

        <h4><a href=<?php echo "special_search.php?table=" . $table_name;?> class="button">Search Table</a></h4>

        <input type="submit" value="Create" onClick="createFunction();" class="button">
        <h4></h4>

        <?php
            $key = "order by";
            $args = $table_name . "_id";
            include("../data_manager/data_manager.php");
            search($table_name, $key, $args, $order);
        ?>
        <p hidden id="table_name"><?php echo $table_name;?></p>
        <script>
            function createFunction() {
                var headData = [];
                var headers = document.getElementsByTagName("th");
                for (var i = 0; i < headers.length; i++) {
                        headData.push(headers[i].innerHTML);
                }
                window.open("row_view.php?argument1=create" + "&table=" + table_name + "&headers=" + headData, "_self")
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
                window.open("row_view.php?argument1=" + data + "&table=" + table_name + "&headers=" + headData, "_self")
            };
        </script>
    </body>

</html>