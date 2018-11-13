<?php
session_start();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600);
}

$_SESSION = array();
session_destroy();

if (isset($_POST['submit_logout'])) {
    setcookie('userid', '', time() - 3600);
    setcookie('hash', '', time() - 3600);
    header('Location: homepage.php');
}

if (!isset($_COOKIE['userid'])) {
    header('Location:  homepage.php');
}

