<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>

    <body>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="index.php?logout=true">Logout</a></li>
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
                include("./data_manager/data_manager.php");
                save($table_name, $fields, $values, false);
                echo "<script>alert('Saved')</script>";
                echo "<script>window.open('./home.php', '_self')</script>";
            }
        ?>
    </body>

</html>