<?php

//require ('private/connectvars.php');
require ('../../../../../../private/connectvars.php');

// Hoort de bezoeker hier uberhaupt wel te zijn?
if (!isset($_POST['submit_registration'])) {
    header('Location: register.php');
}

// Zijn alle velden ingevuld?
if (empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['password-confirm'])) {
    echo 'You forgot to fill something in. <br>';
    echo 'Press <a href="register.php">here</a> to return to previous page';
    exit();
}

// Zijn beide wachtwoorden gelijk
if ($_POST['password'] != $_POST['password-confirm']) {
    echo 'Passwords did not match! . <br>';
    echo 'Press <a href="register.php">here</a> to return to previous page';
    exit();
}

// Heeft de gebruiker wel een ma-adres?
$position = strpos($_POST['email'], '@ma-web.nl');
if (!$position) {
    echo 'Sorry you can only register with a mail address from Media College. <br>';
    echo 'Press <a href="register.php">here</a> to return to previous page';
    exit();
}

// Bestaat deze username al?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$username);
$username = $_POST['username'];
$result = $stmt->execute() or die('Error querying username');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry but it looks like this username already exists. <br>';
    echo 'Press <a href="/register.php">here</a> to return to previous page';
    exit();
}


// Bestaat deze email al?
$query = "SELECT userid FROM users WHERE email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$email);
$email = $_POST['email'];
$result = $stmt->execute() or die('Error querying email');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry but it looks like you already have an account on this email address. <br>';
    echo 'Press <a href="register.php">here</a> to return to previous page';
    exit();
}

// Gebruiker tovoegen aan de database
$query = "INSERT INTO users VALUES (0, ?, ?, ?, ?, 0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss',$username, $email, $password, $hash);
$username = $_POST['username'];
$email = $_POST['email'];
$random_number = rand(0, 1000000);
$hash = hash('sha512', $random_number);
$password = hash('sha512', $_POST['password']);
$result = $stmt->execute() or die ('Error inserting user');
echo 'You are now Registered';

// Gebruiker mailen
$to = $_POST['email'];
$subject = 'Verify your account for The Wall';
$message = 'Press the next link to verify your account ';
$message .= 'http://22193.hosts.ma-cloud.nl/ma/bewijzenmap/periode1.3/proj/The%20WALL/verify.php?email=' . $email . '&hash=' . $hash ;
$headers = 'From: 22193@ma-web.nl';
mail ($to, $subject, $message, $headers) or die ('Error mailing.');
