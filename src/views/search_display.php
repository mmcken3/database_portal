<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../styles/website.css">
<body>
    </head>

    <body>
    <nav style="padding-bottom: 40px">
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="../profile.php">Profile</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a href="../index.php?logout=true">Logout</a></li>
        </ul>
    </nav>
    <h1>Advanced Search Display</h1>

    <?php
        $config = parse_ini_file("../data_manager/config.ini");

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

        include("../data_manager/data_manager.php");
        search($table_name, $key, $args, $order);
    ?>
    </body>

</html>