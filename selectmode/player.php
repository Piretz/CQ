<?php
include '../connection/connection.php';
session_start();

$Lobby_ID = $_SESSION['lobby_id'];

//Left Team
$query_left = "SELECT * FROM queue WHERE queue_id = $Lobby_ID AND team ='Left'";
$result_left = mysqli_query($con, $query_left);

?>

<div class="team team-left">
<?php
if (mysqli_num_rows($result_left) > 0) {
while($rows = mysqli_fetch_assoc($result_left)){
?>
    <div class="player-slot"><img src='../img/avatar.png' alt='Player'></div>
<?php
} }
?>
</div>
<div class="vs-text"><img src="../img/VS.png"></div>
<?php
//right Team
$query_right = "SELECT * FROM queue WHERE queue_id = $Lobby_ID AND team ='Right'";
$result_right = mysqli_query($con, $query_right);
if (mysqli_num_rows($result_right) > 0) {
?>
    <div class="team team-right">
<?php
while($rows = mysqli_fetch_assoc($result_right)){
?>
        <div class="player-slot"><img src='../img/avatar.png' alt='Player'></div>
<?php
}
?>
    </div>
<?php
} else {
?>
    <div class="team team-right">
        <div class="player-slot" style="color:white">Finding Player</div>
    </div>
<?php
}

$lobby_info = $_SESSION['lobby_id'];

$user_query = "SELECT * FROM queue WHERE queue_id ='$lobby_info'";
$user_result = mysqli_query($con, $user_query);
$row = mysqli_fetch_assoc($user_result);
$status = $row['status'];

if(mysqli_num_rows($user_result) > 0 ){
    if($status == 'Playing'){
    ?> <script>window.location.href = "../pvp/multiplayer.php"; <?php
    }
} else {
    unset($_SESSION['lobby_id']);
?>
<script>window.location.href = "mode.php"
<?php
}
?>