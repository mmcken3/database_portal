<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../styles/website.css">
</head>

<body>

    <body>
        <nav>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <li><a href="../profile.php">Profile</a></li>
                <li><a href="#about">About</a></li>
                <li><a href=<?php echo "table_view.php?table=" . $_POST['table_name'];?> >Back to Table</a></li>
                <li><a href="../index.php?logout=true">Logout</a></li>
            </ul>
        </nav>

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
                include("../data_manager/data_manager.php");
                save($table_name, $fields, $values, false);
            }
            else if ($_REQUEST['delete'] == "Delete") {
                $table_id = $headerList[0];
                $id_value = $_POST[$headerList[0]];
                include("../data_manager/data_manager.php");
                delete($table_name, $table_id, $id_value);
            }
        ?>
    </body>

</html>