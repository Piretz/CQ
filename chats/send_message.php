<?php
include '../connection/connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senderId = $_SESSION['ID'];
    $receiverId = $_POST['receiver_id'];
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if (empty($message)) {
        echo json_encode(['success' => false, 'error' => 'Message cannot be empty']);
        exit;
    }

    // Insert message into the database
    $query = "INSERT INTO Messages (sender_id, receiver_id, message, created_at) VALUES ('$senderId', '$receiverId', '$message', NOW())";
    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to send message']);
    }
}
?>
