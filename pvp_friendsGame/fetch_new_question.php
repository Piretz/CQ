<?php
include '../connection/connection.php';
session_start();

$match_id = $_SESSION['lobby_id'];
$team_name = $_SESSION['team'];

$response = ['success' => false];

if ($match_id && $team_name) {
    // Get the next question assigned to the team (it could be the first or a new one after a correct answer)
    $query = "SELECT q.question_id
              FROM queue q
              WHERE q.team = ? AND q.question_id IS NOT NULL
              ORDER BY q.turn ASC
              LIMIT 1";

    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $team_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $question_id = $row['question_id'];

        // Fetch the full question details from the questions table
        $questionQuery = "SELECT Level_Id, Given_Code, Task, Display FROM Solo_Level WHERE Level_Id = ?";
        $stmt = $con->prepare($questionQuery);
        $stmt->bind_param("i", $question_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($questionRow = $result->fetch_assoc()) {
            $response['success'] = true;
            $response['Level_Id'] = $questionRow['Level_Id'];
            $response['Given_Code'] = $questionRow['Given_Code'];
            $response['Task'] = $questionRow['Task'];
            $response['Display'] = $questionRow['Display'];
        } else {
            $response['error'] = "Question not found.";
        }
    } else {
        $response['error'] = "No assigned question for this team.";
    }
}

echo json_encode($response);
?>
