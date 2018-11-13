<?php
session_start();

//echo $_POST['username'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Checken of de gebruiker verdwaald is
if (!isset($_POST['submit_login'])) {
    header("Location: login.php");
}

// Checken of de gebruiker alles heeft ingevuld
if (empty($_POST['username']) OR empty($_POST['password'])) {
    echo 'You forgot to fill something in';
    echo 'Press <a href="login.php">here</a> to try again.';
    exit();
}

// Checken of de gebruiker bestaat (en of zijn wachtwoord klopt)
//require ('private/connectvars.php');
require ('../../../../../../private/connectvars.php');
$query = "SELECT userid, hash, active FROM users WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing.');
$stmt->bind_param('ss',$username,$password) or die ('Error binding params.');
$stmt->bind_result($userid,$hash,$active) or die ('Error binding results.');
$username = $_POST['username'];
$password = $_POST['password'];
$password = hash('sha512', $password) or die ('Error hashing.');
$stmt->execute() or die ('Error executing.');
$fetch_success = $stmt->fetch();

if (!$fetch_success) {
    echo 'Sorry something went wrong.';
    echo 'Press <a href="login.php">here</a> to try again.';
    exit();
} else if ($active == 0) {
    echo 'Sorry your account is not activated. Check your mail';
    echo 'Press <a href="login.php">here</a> to try again.';
    exit();
}

setcookie('userid',$userid, time() + 3600 * 24 * 7);
$_SESSION['userid'] = $userid;
setcookie('hash',$hash, time() + 3600 * 24 * 7);
$_SESSION['hash'] = $hash;
header('Location: homepage.php');
