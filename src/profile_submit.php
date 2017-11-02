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
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="index.php?logout=true">Logout</a></li>
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
                require_once("./data_manager/php_scripts/save.php");
                echo "<script>alert('Saved')</script>";
                echo "<script>window.open('./home.php', '_self')</script>";
            }
        ?>
    </body>

</html>