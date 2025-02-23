<?php
include '../connection/connection.php';
session_start();

$user_id = $_SESSION['ID']; // Logged-in user
$receiver_id = $_POST['receiver_id'];

// Fetch conversation
$query = "SELECT sender_id, receiver_id, message, created_at 
          FROM Messages 
          WHERE (sender_id = ? AND receiver_id = ?) 
             OR (sender_id = ? AND receiver_id = ?) 
          ORDER BY created_at ASC";

$stmt = $con->prepare($query);
$stmt->bind_param("iiii", $user_id, $receiver_id, $receiver_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        'sender_id' => $row['sender_id'],
        'receiver_id' => $row['receiver_id'],
        'text' => $row['message'],
        'time' => date("h:i A", strtotime($row['created_at']))
    ];
}

echo json_encode(["success" => true, "messages" => $messages, "current_user" => $user_id]);
?>
