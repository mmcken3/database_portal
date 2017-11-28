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
<link rel="stylesheet" type="text/css" href="./styles/login_form.css">
</head>

<body>
    </head>

    <body style="background-color: rgb(163, 219, 217)">
        <nav>
            <ul>
                <li><a href="index.php?logout=true">Login</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
        <div class="login">
            <h1>Built It Construction Login</h1>
            <div class="login_container" style="padding-top: 75px">
                <form class="login_form" action="login_submit.php" method="post">
                    <input type="text" name="u" placeholder="Username" required="required" />
                    <input type="password" name="p" placeholder="Password" required="required" />
                    <button type="submit">Login</button>
                    <p class="message">Not registered? <a href="new_user.php">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>

</html>