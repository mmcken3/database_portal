<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
<link rel="stylesheet" type="text/css" href="./styles/login_form.css">
</head>

<body>
    </head>

    <body style="background-color: rgb(163, 219, 217)">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="index.php?logout=true">Login</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
        <div class="login">
            <h1>About the Site</h1>
            <div class="about_container" style="padding-top: 75px; width: 55%;">
                <form class="login_form">
                    <p>This web portal is a project for CPSC 4620 at Clemson University.</p>
                    <p>The goal of this project is to learn about and use database management skills,
                    while also implementing these functions into a web portal. As this was my focus,
                    I apologize for the site not being a beautiful as it could be with more time.<p>
                    <p>Feel free to create a user account and check out the web portal for inventory,
                    employee, supplier, project, and customer management for Build It Construction.</p>
                </form>
            </div>
        </div>
    </body>

</html>