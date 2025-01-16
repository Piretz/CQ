<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "game";

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(!$con){
    die("Failed to connect to the database");
}
