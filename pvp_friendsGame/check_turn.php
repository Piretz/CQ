<?php
include '../connection/connection.php';
session_start();

header("Content-Type: application/json");

$match_id = $_SESSION['lobby_id'];
$team_name = $_SESSION['team'];

// Fetch the current turn for each team (allowing 3 players per team)
$query = "SELECT player_id, turn FROM queue WHERE team = ? AND queue_id = ? ORDER BY turn ASC";
$stmt = $con->prepare($query);
$stmt->bind_param("si", $team_name, $match_id);
$stmt->execute();
$result = $stmt->get_result();

$turns = [];
while ($row = $result->fetch_assoc()) {
    $turns[] = $row;  // Store the turns for the team
}

// Find the current player's turn
$current_turn = 0;
foreach ($turns as $turn) {
    if ($turn['player_id'] == $_SESSION['ID']) {
        $current_turn = $turn['turn'];  // Get the player's current turn number
        break;
    }
}

// Determine the next turn based on current turn (wrap around after turn 3)
$next_turn = ($current_turn % 3) + 1;  // If turn is 3, next turn will be 1

// Update the turn for the next player in the database
$update_turn_query = "UPDATE queue SET turn = ? WHERE player_id = ? AND queue_id = ?";
$stmt = $con->prepare($update_turn_query);
$stmt->bind_param("iii", $next_turn, $_SESSION['ID'], $match_id);
$stmt->execute();

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
$data['current_turn'] = $current_turn;  // Send the current turn info for the team

echo json_encode($data);
?>
