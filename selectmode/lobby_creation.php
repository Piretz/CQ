<?php
include '../connection/connection.php';
session_start();
$language = $_GET['lang'];
$id = $_SESSION['ID'];
$Lobby_ID = rand();
$Status = 'Waiting';
$type = 'Owner';
$team = 'Left';
$turn = 1;

$Lobby_Query = "INSERT INTO queue (queue_id,player_id,team,turn,type,language,status) VALUES ('$Lobby_ID','$id','$team','$turn','$type','$language','$Status')";
$Lobby_result = mysqli_query($con, $Lobby_Query);
if($Lobby_result){
    $_SESSION['lobby_id'] = $Lobby_ID;
    header("Location: lobby.php");
} else {
    echo "<script> alert('Unknown Error Try Again Later') </script>";
}
?>