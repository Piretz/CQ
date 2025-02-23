<?php

# NOTE: a much more generic poll syncing this includes scores, turn, etc... this will update the UI of each users

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

// Fetch current user with turn
$team1_turn_query = "SELECT is_current_turn, player_id, team FROM queue WHERE queue_id = $lobby_id AND team = 'Left' AND is_current_turn = 1";
$team2_turn_query = "SELECT is_current_turn, player_id, team FROM queue WHERE queue_id = $lobby_id AND team = 'Right' AND is_current_turn = 1";

$team1_turn_result = mysqli_query($con, $team1_turn_query);
$team2_turn_result = mysqli_query($con, $team2_turn_query);

$team1_current_player = mysqli_fetch_assoc($team1_turn_result)['player_id'];
$team2_current_player = mysqli_fetch_assoc($team2_turn_result)['player_id'];

// Fetch current msgs in room
$team1_msg_query = "SELECT ing.message, ing.team, users.first_name FROM in_game_chat ing JOIN users ON users.User_ID = ing.player_id WHERE ing.queue_id = $lobby_id AND ing.team = 'Left'";
$team2_msg_query = "SELECT ing.message, ing.team, users.first_name FROM in_game_chat ing JOIN users ON users.User_ID = ing.player_id WHERE ing.queue_id = $lobby_id AND ing.team = 'Right'";

$team1_msg_result = mysqli_query($con, $team1_msg_query);
$team2_msg_result = mysqli_query($con, $team2_msg_query);

$team1_messages;
while($row = mysqli_fetch_array($team1_msg_result)) {
    $team1_messages[] = $row;
}

$team2_messages;
while($row = mysqli_fetch_array($team2_msg_result)) {
    $team2_messages[] = $row;
}


// Send scores and user's team
echo json_encode([
    "team1" => $team1_score,
    "team2" => $team2_score,
    "user_team" => $user_team, // Send the team from session

    "team1_current_player" => $team1_current_player,
    "team2_current_player" => $team2_current_player, 

    "team1_messages" => $team1_messages ?? [],
    "team2_messages" => $team2_messages ?? [],
]);
?>
