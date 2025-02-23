<?php
include '../connection/connection.php';
session_start();
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $message = trim($_POST["message"]);
    $user_id = $_SESSION['ID'] ?? null;

    if (!$user_id) {
        echo json_encode(['success' => false, 'error' => 'User not logged in']);
        exit;
    }

    if (empty($message)) {
        echo json_encode(['success' => false, 'error' => 'Message cannot be empty']);
        exit;
    }

    $query = "INSERT INTO Global_Chat (user_id, message) VALUES (?, ?)";
    $stmt = $con->prepare($query);

    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'SQL Prepare failed: ' . $con->error]);
        exit;
    }

    $stmt->bind_param("is", $user_id, $message);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Could not save the message']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
