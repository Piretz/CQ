<?php
include '../connection/connection.php';
session_start();

$lobby_id = $_SESSION['lobby_id'];
$user_team = $_SESSION['team']; // Get the team from session

// Fetch scores for both teams
$team1_query = "SELECT COALESCE(SUM(score), 0) AS team1_score FROM queue WHERE queue_id = $lobby_id AND team = 'Left'";
$team2_query = "SELECT COALESCE(SUM(score), 0) AS team2_score FROM queue WHERE queue_id = $lobby_id AND team = 'Right'";

$team1_result = mysqli_query($con, $team1_query);
$team2_result = mysqli_query($con, $team2_query);

$team1_score = mysqli_fetch_assoc($team1_result)['team1_score'];
$team2_score = mysqli_fetch_assoc($team2_result)['team2_score'];

// Send scores and user's team
echo json_encode([
    "team1" => $team1_score,
    "team2" => $team2_score,
    "user_team" => $user_team // Send the team from session
]);
?>
