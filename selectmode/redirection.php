<?php
include '../connection/connection.php';
session_start();

$Lobby_ID = $_SESSION['lobby_id'];

$query = "UPDATE queue SET status = 'Playing' WHERE queue_id = $Lobby_ID";
$result  = mysqli_query($con , $query);

if($result){
    header('Location: ../pvp_friendsGame/multiplayer.php');
} else {
    header('Location: mode.php');
}

?>