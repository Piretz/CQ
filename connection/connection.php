<?php
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "cq";

// $dbhost = "sql12.freesqldatabase.com";
// $dbuser = "sql12762129";
// $dbpass = "Rcf2xaDFC4";
// $dbname = "sql12762129";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sql12762129";

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(!$con){
    die("Failed to connect to the database");
}