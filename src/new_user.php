<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./styles/website.css">
</head>

<body>

    <body style='background-color: rgb(163, 219, 217)'>
        <nav>
            <ul>
                <li><a href="./index.php?logout=true">Login</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
        <h1>New User Account Creation</h1>
        <div class="container" style='padding-top:10px'>
            <form id='row_edit' action="new_user_submit.php" method="post">
                <h1 style='color: #D9853B'>New User</h1>
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
                <input type="submit" value="Create" class="btn blue"/>
            </form>
        </div>
    </body>

</html>