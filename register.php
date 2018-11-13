<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Register</title>
  </head>
  <body class="register">
    <div class="wrapper">
        <div class="backbutton">
            <button class="b-button"><a href="homepage.php">Go back to the homepage</a></button>
        </div>
      <div class="register_form">
      <form action="register_action.php" method="post">
        <label for="username" id="username_label_1"> Username
          <input type="text" id="username_1" name="username" autofocus> <br>
        </label>
        <label for="email" id="email_label_1"> E-mail
          <input type="email" id="email_1" name="email"> <br>
        </label>
        <label for="password" id="password_label_1"> Password
          <input type="password" id="password_1" name="password"> <br>
        </label>
        <label for="password-repeat" id="password_label_1"> Confirm Password
          <input type="password" id="password-confirm" name="password-confirm"> <br>
        </label>
          <input type="submit" id="submit_1" name="submit_registration" value="Register">
        </form>
            <p>Already a Member?<a href="login.php"> Log in!</a></p>
      </div>
    </div>
  </body>
</html>
