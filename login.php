<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>
<body class="login">
    <div class="wrapper">
        <div class="backbutton_l">
            <button class="b-button_l"><a href="homepage.php">Go back to the homepage</a></button>
        </div>
         <div class="login_form">
            <form class="login-form" action="login_action.php" method="post">
                <label for="username" id="username_label">Username</label> <br>
                <input type="text" id="username" name="username"  autofocus> <br>
                <label for="password" id="password_label">Password</label> <br>
                <input type="password" id="password" name="password"> <br> <br>
                <input type="submit" name="submit_login" id="submit" value="Login">
            </form>
            <a href="forgot_password.php">Forgot password?</a>
            <p>Not on The Wall yet? <a href="register.php">Sign up!</a> </p>

        </div>
    </div>
</body>
</html>
