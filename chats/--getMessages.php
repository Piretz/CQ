<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

$user = $_GET['user'];

// Fetch messages from the database
$query = "SELECT * FROM messages WHERE user_id = '$id' OR user_id = (SELECT id FROM users WHERE username = '$user')";
$result = mysqli_query($con, $query);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'sender' => $row['user_id'] == $id ? 'me' : 'friend',
        'text' => $row['message'],
        'time' => $row['time']
    ];
}

echo json_encode($messages);
?>