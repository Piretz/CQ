<?php

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

$player_turns = [];
while ($row = $result->fetch_assoc()) {
    $player_turns[] = $row;  // Store the turns for the team
}

$current_player_arr = array_filter($player_turns, function($player_info){
    if($player_info['is_current_turn'] == 1){
        return $player_info;
    }
});

// TRANSFER TURN
$current_player_turn = $current_player_arr[0]["turn"];
$next_player_turn = ($current_player_arr[0]["turn"] % 3) + 1;

foreach ($player_turns as $player) {
    $update_turn_query = "UPDATE queue SET is_current_turn = ? WHERE player_id = ? AND queue_id = ?";
    $stmt = $con->prepare($update_turn_query);

    // SET false to current player
    if($player['turn'] == $current_player_turn){
        $is_current_turn = false;
        $current_turn_player_id = $player['player_id'];
        $stmt->bind_param("iii", $is_current_turn, $player['player_id'], $match_id);
        $stmt->execute();
    } 
    
    // SET current turn for next player in team
    if($player['turn'] == $next_player_turn){
        $is_current_turn = true;
        $stmt->bind_param("iii", $is_current_turn, $player['player_id'], $match_id);
        $stmt->execute();
    }
}

echo json_encode($player_turns);
?>
