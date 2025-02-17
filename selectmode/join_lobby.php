<?php
include '../connection/connection.php';
session_start();
$lobby_id =  $_GET['id'];
$id = $_SESSION['ID'];

$lobby_info = "SELECT * FROM queue WHERE queue_id = $lobby_id";
$result = mysqli_query($con, $lobby_info);
$row = mysqli_fetch_assoc($result);

$language = $row['language'];
$Status = $row['status'];
$type = 'Player';


$lobby_info = "SELECT COUNT(*) as total_players FROM queue WHERE queue_id = $lobby_id";
$result = mysqli_query($con, $lobby_info);
$row = mysqli_fetch_assoc($result);
$totalPlayers = $row['total_players'];

if ($totalPlayers >= 6) {
    echo "<script> alert('Lobby is full!'); window.location.href='lobby.php'; </script>";
    exit;
} else {

    $team_query = "SELECT team FROM queue WHERE queue_id = $lobby_id";
    $team_result = mysqli_query($con, $team_query);
    
    $leftCount = 0;
    $rightCount = 0;
    
    while ($team_row = mysqli_fetch_assoc($team_result)) {
        if ($team_row['team'] === 'Left') {
            $leftCount++;
        } else {
            $rightCount++;
        }
    }
$team = ($leftCount <= $rightCount) ? 'Left' : 'Right';

$query = "SELECT COUNT(*) as team_count FROM queue WHERE queue_id = $lobby_id AND team = '$team'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$turn_order = $row['team_count'] + 1;

$join_query = "INSERT INTO queue (queue_id,player_id,team, turn,type,language,status) VALUES ('$lobby_id','$id','$team','$turn_order','$type','$language','$Status')";
$join_result = mysqli_query($con, $join_query);

if($join_result){
    $_SESSION['lobby_id'] = $lobby_id;
    header("Location: lobby.php");
} else {
    echo "<script> alert('Unknown Error Try Again Later') </script>";
}

}
?>