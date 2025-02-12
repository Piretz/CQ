<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['level_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "SELECT * FROM Solo_Level WHERE Level_Id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $correct_answer = $row['OutPut'];
    $user_answer = trim($_POST['answer']);

    if ($user_answer === $correct_answer) {
        echo "Correct!";
    } else {
        echo "Incorrect! Try again.";

    }
}
?>