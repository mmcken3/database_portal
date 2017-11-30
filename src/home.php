<?php
    if(!isset($_SESSION)) {
        session_start();
    }
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
    <div>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="index.php?logout=true">Logout</a></li>
        </ul>
    </nav>
    </div>
    <h1>Welcome to Homepage</h1>
    <h2>Build It Construction</h2>
    <h4>List of Tables To view</h4>
    <p><a href="./views/table_view.php?table=employee">Employees</a></p>
    <p><a href="./views/table_view.php?table=department">Departments</a></p>
    <p><a href="./views/table_view.php?table=project">Projects</a></p>
    <p><a href="./views/table_view.php?table=inventory">Inventory</a></p>
    <p><a href="./views/table_view.php?table=customer">Customers</a></p>
    <p><a href="./views/table_view.php?table=supplier">Suppliers</a></p>
    <p><a href="./views/table_view.php?table=location">Locations</a></p>
</body>
<?php
    if ($_SESSION["admin"]) {
        echo "<h4>Back up the database by clicking below!</h4>";
        echo "<input type='submit' value='Backup' onClick='backupDB();'>";
        if (isset($_GET['backup']) && $_GET["backup"] == "true") {
            include("./data_manager/data_manager.php");
            backup();
        }
    }
?>
<script>
    function backupDB() {
        window.open("home.php?backup=true", "_self")
    };
</script>

</html>