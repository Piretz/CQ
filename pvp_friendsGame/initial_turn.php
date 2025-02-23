<?php
// NOTE: Please INVOKE this file only once upon starting the game do not call this repeatedly
// NOTE: check_turn file is for initial config only

include '../connection/connection.php';
session_start();

header("Content-Type: application/json");

$match_id = $_SESSION['lobby_id'];
$team_name = $_SESSION['team'];

// Fetch the current turn for each team (allowing 3 players per team)
$query = "SELECT player_id, turn, is_current_turn FROM queue WHERE team = ? AND queue_id = ? ORDER BY turn ASC";
$stmt = $con->prepare($query);
$stmt->bind_param("si", $team_name, $match_id);
$stmt->execute();
$result = $stmt->get_result();

$turns = [];
while ($row = $result->fetch_assoc()) {
    $turns[] = $row;  // Store the turns for the team
}

// SET the initial current player's turn into 1 for player 1
$current_turn_player_id;
foreach ($turns as $turn) {

    $update_turn_query = "UPDATE queue SET is_current_turn = ? WHERE player_id = ? AND queue_id = ?";
    $stmt = $con->prepare($update_turn_query);

    if($turn['turn'] == 1){
        $is_current_turn = true;
        $current_turn_player_id = $turn['player_id'];
        $stmt->bind_param("iii", $is_current_turn, $current_turn_player_id, $match_id);
        $stmt->execute();
    }
}

// Fetch the updated turn for the team
$query = "SELECT turn FROM queue WHERE team = ? AND queue_id = ? ORDER BY turn ASC";
$stmt = $con->prepare($query);
$stmt->bind_param("si", $team_name, $match_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
$turns = [];
while ($row = $result->fetch_assoc()) {
    $turns[] = $row['turn'];  // Fetch all the updated turn values
}

$data['team_turns'] = $turns;
$data['current_turn_player_id'] = $current_turn_player_id;  // Send the current turn info for the team

echo json_encode($data);
?>
