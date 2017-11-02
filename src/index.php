<?php
    session_start();
?>
<?php
    if (isset($_GET['logout'])){
        session_unset(); 
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>
    </head>

    <body>
        <ul>
            <li><a href="index.php?logout=true">Login</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <div class="login">
            <h1>Built It Construction</h1>
            <h1>Login</h1>
            <form action="login_submit.php" method="post">
                <input type="text" name="u" placeholder="Username" required="required" />
                <input type="password" name="p" placeholder="Password" required="required" />
                <button type="submit">Login</button>
            </form>
            <div>
                <p><a href="new_user.php">Not a User?</a></p>
            </div>
        </div>
    </body>

</html>