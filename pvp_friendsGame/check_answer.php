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

$query = "SELECT * FROM Solo_Level WHERE Level_Id = $question_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$correct_answer = $row['OutPut'];

file_put_contents("debug_log.txt", "\nCorrect Answer from DB: " . $correct_answer, FILE_APPEND);

if($user_answer == $correct_answer ) {
    $score_update = "UPDATE queue SET score = score+1 WHERE player_id = $user_id AND queue_id = $Lobby_ID";
    $query_result = mysqli_query($con, $score_update);

    echo json_encode(["status" => "Correct",]);
} else {
    echo json_encode(["status" => "wrong", "correct_answer" => $correct_answer]);
}
}
?>