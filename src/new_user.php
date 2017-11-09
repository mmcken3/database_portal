<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>

    <body>
        <nav>
            <ul>
                <li><a href="./index.php?logout=true">Login</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
        <h1>New User Account Creation</h1>
        <form action="new_user_submit.php" method="post">
            <div>
                <h3>User Name</h3>
                <input type="text" name="user_name" placeholder="User Name" required="required">
            </div>
            <div>
                <h3>First Name</h3>
                <input type="text" name="first_name" placeholder="First Name">
            </div>
            <div>
                <h3>Last Name</h3>
                <input type="text" name="last_name" placeholder="Last Name">
            </div>
            <div>
                <h3>Password</h3>
                <input type="password" name="user_pass" placeholder="Password" required="required">
            </div>
            <div>
                <h3>Confirm Password</h3>
                <input type="password" name="user_pass2" placeholder="Confirm Password" required="required">
            </div>
            <button type="submit">Login</button>
        </form>
    </body>

</html>