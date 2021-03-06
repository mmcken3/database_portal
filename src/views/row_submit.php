<?php
    if(!isset($_SESSION)) {
        session_start();
    }
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
                <li><a href="../about.php">About</a></li>
                <li><a href=<?php echo "table_view.php?table=" . $_POST['table_name'];?> >Back to Table</a></li>
                <li><a href="../index.php?logout=true">Logout</a></li>
            </ul>
        </nav>

        <?php
            // Parses the field values set up in the POST form. 
            $table_name = $_POST['table_name'];     // name of table.
            $fields = $_POST['headers']; // list of field headers from edit page.
            $create = $_POST['create']; // whether this is a creation or not
            $headerList = explode(",", $fields); // turns comma list of headers into an array. 

            // Runs this branch if the user pressed save.
            if (isset($_REQUEST['save']) && $_REQUEST['save'] == "Save") {
                $headersCount = count($headerList);
                $values = "";

                if ($_POST[$table_name . '_id'] == '1' && $table_name == 'employee') {
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
                    else {  // on last one no need for trailing comma.
                        if ($fieldValue == '') {
                            $values = $values . "null";
                        }
                        else {
                            $values = $values . "'" . $fieldValue . "'";
                        }
                    }
                }

                // call save from the data manager. it will check last updated time. 
                include("../data_manager/data_manager.php");
                save($table_name, $fields, $values, $create);
            }
            else if ($_REQUEST['delete'] == "Delete") {  // takes this branch if user presses delete.
                // first header and value in the list is the ID value.
                $table_id = $headerList[0];
                $id_value = $_POST[$headerList[0]];

                // call delete from the data manager. it will check last updated time.
                include("../data_manager/data_manager.php");
                delete($table_name, $table_id, $id_value);
            }
        ?>
    </body>

</html>