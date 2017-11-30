<?php
    if(!isset($_SESSION)) {
        session_start();
    }
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
            // Parses the field values set up in the POST form. 
            $table_name = $_POST['table_name']; // name of table.
            $fields = $_POST['headers']; // list of field headers from edit page.
            $headerList = explode(",", $fields); // turns comma list of headers into an array. 
            
            // Runs this branch if the user pressed save.
            if ($_REQUEST['save'] == "Save") {
                $headersCount = count($headerList);
                $values = "";

                if ($_POST[$table_name . '_id'] == '1') {
                    echo "No changes can be made to the main admin account.";
                    return;
                }

                // Iterate through the headers and values and build out a list of header=value, ...
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
                    else { // on last one no need for trailing comma.
                        if ($fieldValue == '') {
                            $values = $values . "null";
                        }
                        else {
                            $values = $values . "'" . $fieldValue . "'";
                        }
                    }
                }

                // call save from the data manager. it will check last updated time. 
                include("./data_manager/data_manager.php");
                save($table_name, $fields, $values, false);

                // Alert the user upon success and redirect them to the home page.
                echo "<script>alert('Saved')</script>";
                echo "<script>window.open('./home.php', '_self')</script>";
            }
        ?>
    </body>

</html>