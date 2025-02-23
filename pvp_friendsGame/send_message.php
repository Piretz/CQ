<?php
include '../connection/connection.php';
session_start();

$lobby_id = $_SESSION['lobby_id'];
$id = $_SESSION['ID'];

$message = $_POST["message"];
$team = $_POST["team"];

if($message !== ""){
    $join_query = "INSERT INTO in_game_chat (queue_id, player_id, message, team) VALUES ('$lobby_id','$id', '$message', '$team')";
    $join_result = mysqli_query($con, $join_query);
}

?>