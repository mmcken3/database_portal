<!DOCTYPE html>
<html>

<body>
    <style>
        #departments {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #departments td,
        #departments th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #departments tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #departments tr:hover {
            background-color: #ddd;
        }
        
        #departments th {
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
    </style>
    </head>

    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../profile.html">Profile</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <h1>Deparments</h1>
        <?php
            require_once('selects.php')
        ?>
    </body>

</html>