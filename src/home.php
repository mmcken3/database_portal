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
    </style>
</head>

<body>
    <?php
        if ($_SESSION["login"] == "") {
            echo "<script>window.open('./index.php', '_self')</script>";
        }
    ?>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="index.php?logout=true">Logout</a></li>
    </ul>
    <h1>Welcome to Homepage</h1>
    <h2>Database Name</h2>
    <h4>Edit profile <a href="profile.php">here</a></h4>
    <h4>List of Tables To view</h4>
    <p><a href="./data_manager/tables/table_view.php?table=employee">Employees</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=department">Departments</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=project">Projects</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=inventory">Inventory</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=customer">Customers</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=supplier">Suppliers</a></p>
    <p><a href="./data_manager/tables/table_view.php?table=location">Locations</a></p>
    <h4>Want to design your own query?</h4>
    <p><a href="query_custom.html">Click Here</a></p>
</body>

</html>