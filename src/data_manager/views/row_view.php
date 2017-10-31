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

    <body>
        <?php
            if ($_SESSION["login"] == "") {
                echo "<script>window.open('../../index.php', '_self')</script>";
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
        <ul>
            <li><a href="../../home.php">Home</a></li>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href=<?php echo "../tables/table_view.php?table=" . $table_name;?> >Back</a></li>
            <li><a href="../../index.php?logout=true">Logout</a></li>
        </ul>
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
                            include('../php_scripts/get_id.php');
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
                        echo "' type='text' size='40' class='textfield'>";
                        echo "</p>";
                    }
                }
                echo "<input hidden name='table_name' value='" . $table_name ."' type='text' size='40' class='textfield' readonly>";
                echo "<input hidden name='headers' value='" . $headers ."' type='text' size='40' class='textfield' readonly>";
            ?>
            <input type="submit" name="save" value="Save" class="button"/>
            <?php
                if ($argument1 != 'create') {
                    echo "<input type='submit' name='delete' value='Delete' class='button'/>";
                }
            ?>
        </form>
    </body>

</html>