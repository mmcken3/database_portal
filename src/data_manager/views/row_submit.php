<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
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
</head>

<body>

    <body>
        <ul>
            <li><a href="../../home.php">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href=<?php echo "../tables/table_view.php?table=" . $_POST['table_name'];?> >Back to Table</a></li>
            <li><a href="../../index.php?logout=true">Logout</a></li>
        </ul>

        <?php
            $table_name = $_POST['table_name'];
            $fields = $_POST['headers'];
            $headerList = explode(",", $fields);
            if ($_REQUEST['save'] == "Save") {
                $headersCount = count($headerList);
                $values = "";
                for ($i = 0; $i < $headersCount; $i++){
                    $fieldValue = $_POST[$headerList[$i]];
                    if ($i != ($headersCount - 1)) {
                        if ($fieldValue == '') {
                            $values = $values . "null,";
                        }
                        else {
                            $values = $values . "'" . $fieldValue . "',";
                        }
                    }
                    else {
                        if ($fieldValue == '') {
                            $values = $values . "null";
                        }
                        else {
                            $values = $values . "'" . $fieldValue . "'";
                        }
                    }
                }

                // throw call to request manager here, and it will handle alert or save off this
                require_once("../php_scripts/save.php");
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_id = $headerList[0];
                $id_value = $_POST[$headerList[0]];
                require_once("../php_scripts/delete.php");
            }
        ?>
    </body>

</html>