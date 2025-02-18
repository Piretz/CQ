<?php
file_put_contents("debug_log.txt", print_r($_POST, true));
include '../connection/connection.php';
session_start();

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_answer = $_POST["answer"];
    $question_id = $_POST["question_id"];
    $Lobby_ID = $_SESSION['lobby_id'];
    $user_id = $_SESSION['ID'];
    $team = $_SESSION['team'];

    // Get the correct answer for the question
    $query = "SELECT OutPut FROM Solo_Level WHERE Level_Id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $correct_answer = $row['OutPut'];

    file_put_contents("debug_log.txt", "\nCorrect Answer from DB: " . $correct_answer, FILE_APPEND);

    if ($user_answer == $correct_answer) {
        // Get a new random question
        $new_question = "SELECT Level_Id FROM Solo_Level ORDER BY RAND() LIMIT 1";
        $new_question_result = mysqli_query($con, $new_question);
        if ($new_question_row = mysqli_fetch_assoc($new_question_result)) {
            $new_question_id = $new_question_row['Level_Id'];

            // Update the queue with the new question
            $question_update = "UPDATE queue SET question_id = ? WHERE team = ? AND queue_id = ?";
            $stmt = $con->prepare($question_update);
            $stmt->bind_param("isi", $new_question_id, $team, $Lobby_ID);
            $stmt->execute();

            // Update the score
            $score_update = "UPDATE queue SET score = score + 1 WHERE player_id = ? AND queue_id = ?";
            $stmt = $con->prepare($score_update);
            $stmt->bind_param("ii", $user_id, $Lobby_ID);
            $stmt->execute();

            // Send success response
            echo json_encode(["status" => "Correct"]);
        } else {
            // Handle case where a new random question is not found
            file_put_contents("debug_log.txt", "\nNo random question found.", FILE_APPEND);
            echo json_encode(["status" => "error", "message" => "No question found."]);
        }
    } else {
        echo json_encode(["status" => "wrong", "correct_answer" => $correct_answer]);
    }
}
?>
