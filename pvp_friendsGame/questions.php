<?php
include '../connection/connection.php';
session_start();

$query = "SELECT * FROM Solo_Level ORDER BY RAND() LIMIT 1";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(mysqli_fetch_assoc($result));
} else {
    echo json_encode(["error" => "No questions found"]);
}



?>