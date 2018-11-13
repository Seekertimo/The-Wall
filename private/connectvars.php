<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

define('HOST','localhost');
define('USER','22193_db');
define('PASS','lariekoek1_');
define('DBNAME','22193_db');

$mysqli = new mysqli(HOST, USER, PASS, DBNAME);

if ($mysqli->errno) {
    echo 'Connection error: ' . $mysqli->errno;
}
