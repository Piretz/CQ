<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];
$level_id = $_SESSION['level_id'];

$level_info = "SELECT * FROM Solo_Level WHERE Level_Id = $level_id";
$level_result = mysqli_query($con, $level_info);

$row = mysqli_fetch_assoc($level_result);
$exp_gain = $row['Reward'];

$user_info = "UPDATE users SET level_progress = $exp_gain WHERE User_ID = $id";
$user_result = mysqli_query($con, $user_info);

if($user_result){
    $user_check = "SELECT * FROM users WHERE User_ID = $id";
    $check_result = mysqli_query($con, $user_check);
    $rows = mysqli_fetch_assoc($check_result);

    $progress = $rows['level_progress'];
    $next_level = $rows['next_level'];

    if($progress > $next_level){
        $reset_exp = 0;

        $user_info = "UPDATE users SET level_progress = $reset_exp, Level = Level+1 WHERE User_ID = $id";
        $user_result = mysqli_query($con, $user_info);
    }
}
$new_level = $level_id + 1;

$unlocked_level = "INSERT INTO unlocked_level (Level_ID, Users_ID) VALUE ($new_level,$id)";
$unlocked_query = mysqli_query($con,$unlocked_level);

?>