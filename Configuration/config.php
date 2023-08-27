<?php


$host = "localhost";
$user = "root";
$pwd = "";
$db_name = "citadel_corporation";



$connection =  mysqli_connect($host, $user, $pwd, $db_name);

if (!$connection) {
    die('connection to database failed');
}
