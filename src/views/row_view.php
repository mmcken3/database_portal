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

    <body style="background-color: rgb(163, 219, 217)">
        <?php
            if ($_SESSION["login"] == "") {
                echo "<script>window.open('../index.php', '_self')</script>";
            }
        ?>
        <?php 
            $argument1 = $_GET['argument1'];
            if ($argument1 != 'create') {
                $peices = explode(",", $argument1);
            }
            $table_name = $_GET['table'];
            $headers = $_GET['headers'];
            $headersList = explode(",", $headers);
        ?>
        <nav>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <li><a href="../profile.php">Profile</a></li>
                <li><a href="#about">About</a></li>
                <li><a href=<?php echo "table_view.php?table=" . $table_name;?> >Back</a></li>
                <li><a href="../index.php?logout=true">Logout</a></li>
            </ul>
        </nav>
        <h1>Row View Page</h1>
        <div class="container" style="padding-top:10px">
            <form id="row_edit" action="row_submit.php" method="post">
                <?php 
                    echo "<h1 style='color: #D9853B'>" . ucfirst($table_name) . " Edit</h1>";
                    echo "<fieldset>";
                    for ($i = 0; $i < count($headersList); $i++){
                        if ($i == 0) {
                            echo "<h3>" . $headersList[$i] . "</h3>";
                            echo "<p>";
                            if ($argument1 != 'create') {
                                echo "<input name='" . $headersList[$i] . "' value='" . $peices[$i] ."' type='text' size='40' class='textfield' readonly>";
                            }
                            else {
                                $table = $table_name;
                                $id_type = $table_name . '_id';
                                echo "<input name='" . $headersList[$i] . "' value='";
                                include('../data_manager/data_manager.php');
                                get_id($table, $id_type);
                                echo "' type='text' size='40' class='textfield' readonly>";
                            }
                            echo "</p>";
                        }
                        else {
                            echo "<h3>" . $headersList[$i] . "</h3>";
                            echo "<p>";
                            echo "<input name='" . $headersList[$i] . "' value='";
                            if ($argument1 != 'create') {
                                echo $peices[$i];
                            }
                            else if ($headersList[$i] == 'admin_rights'){
                                echo '0';
                            }
                            if ($headersList[$i] == 'user_name' || $headersList[$i] == 'last_updated') {
                                echo "' type='text' size='40' class='textfield' readonly>";
                            }
                            else if ($headersList[$i] == 'user_pass') {
                                echo "' type='password' size='40' class='textfield'>";
                            }
                            else {
                                echo "' type='text' size='40' class='textfield'>";
                            }
                            echo "</p>";
                        }
                    }
                    echo "<input hidden name='table_name' value='" . $table_name ."' type='text' size='40' class='textfield' readonly>";
                    echo "<input hidden name='headers' value='" . $headers ."' type='text' size='40' class='textfield' readonly>";
                    echo "</fieldset>";
                ?>
                <input type="submit" name="save" value="Save" class="btn blue"/>
                <?php
                    if ($argument1 != 'create') {
                        echo "<input type='submit' name='delete' value='Delete' class='btn blue'/>";
                    }
                ?>
            </form>
        </div>
    </body>

</html>