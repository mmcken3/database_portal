<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../styles/website.css">
<body>
    </head>

    <body>
    <ul>
        <li><a href="../../home.php">Home</a></li>
        <li><a href="../views/profile.php">Profile</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="../../index.php?logout=true">Logout</a></li>
    </ul>
    <h1>Advanced Search Display</h1>

    <?php
        $config = parse_ini_file("../config.ini");

        $servername = $config['servername'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $table_name = $_GET['table'];
        $key = $_GET['key'];
        $args = $_GET['args'];
        $order = $_GET['order'];

        require_once("../php_scripts/search.php");
    ?>
    </body>

</html>