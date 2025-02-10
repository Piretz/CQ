<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cq";

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(!$con){
    die("Failed to connect to the database");
}