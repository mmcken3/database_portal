<!DOCTYPE html>
<html>
<style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #table tr:hover {
            background-color: #ddd;
        }
        
        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        
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
        td {
            cursor: pointer;
        }
        tr:nth-child(odd) { 
            background-color : #EAF2D3; 
        }
        tr:nth-child(even) { 
            background-color : #A7C942; 
        }
        tr:hover { 
            background-color : #89ae37; 
        }
</style>
<body>
    </head>

    <body>
    <ul>
        <li><a href="../home.html">Home</a></li>
        <li><a href="../profile.html">Profile</a></li>
        <li><a href="#about">About</a></li>
    </ul>
    <h1>Advanced Search Display</h1>

    <?php
        $config = parse_ini_file("../config.ini");

        $servername = $config['servername'];
        $username = $config['username'];
        $password = $config['password'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, 'mmcken3sql_d610');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $table_name = $_GET['table'];
        $key = $_GET['key'];
        $args = $_GET['args'];

        require_once("../php_scripts/search.php");
    ?>
    </body>

</html>