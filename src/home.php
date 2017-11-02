<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
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
    <h2>Build It Construction</h2>
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