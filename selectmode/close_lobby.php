<?php
include '../connection/connection.php';
session_start();

$id = $_SESSION['ID'];
$lobby_info = $_SESSION['lobby_id'];

$user_query = "SELECT * FROM queue WHERE player_id ='$id'";
$user_result = mysqli_query($con, $user_query);
$user_info = mysqli_fetch_assoc($user_result);
$User_type = $user_info['type'];

if($user_result){
//check if owner
if($User_type == "Owner"){
    $cancel_id = $lobby_info;
    $lobby_cancel = "DELETE FROM queue WHERE queue_id =$cancel_id";
    $cancel_result = mysqli_query($con, $lobby_cancel);
    unset($_SESSION['lobby_id']);
} else {
    $cancel_id = $lobby_info;
    $lobby_cancel = "DELETE FROM queue WHERE queue_id =$cancel_id AND player_id=$id";
    $cancel_result = mysqli_query($con, $lobby_cancel);
    unset($_SESSION['lobby_id']);
} } else {
    unset($_SESSION['lobby_id']);
}



?>