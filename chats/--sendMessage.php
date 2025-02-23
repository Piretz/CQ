<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $time = date('h:i A');

    // Insert the message into the database
    $query = "INSERT INTO messages (user_id, message, time) VALUES ('$id', '$message', '$time')";
    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true, 'time' => $time]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>