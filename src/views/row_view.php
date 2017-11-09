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
        <h1><?php echo ucfirst($table_name) . " View Page";?></h1>
        <form action="row_submit.php" method="post">
            <?php 
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
                        echo "' type='text' size='40' class='textfield'>";
                        echo "</p>";
                    }
                }
                echo "<input hidden name='table_name' value='" . $table_name ."' type='text' size='40' class='textfield' readonly>";
                echo "<input hidden name='headers' value='" . $headers ."' type='text' size='40' class='textfield' readonly>";
            ?>
            <input type="submit" name="save" value="Save" class="btn blue"/>
            <?php
                if ($argument1 != 'create') {
                    echo "<input type='submit' name='delete' value='Delete' class='btn blue'/>";
                }
            ?>
        </form>
    </body>

</html>