<?php
include '../connection/connection.php';
session_start();

$Lobby_ID = $_SESSION['lobby_id'];
$user_id = $_SESSION['ID'];

//lobby info
$query = "SELECT * FROM queue WHERE queue_id = $Lobby_ID AND type = 'Owner'";
$result = mysqli_query($con, $query);
$lobby_info = mysqli_fetch_assoc($result);
$owner_id = $lobby_info['player_id'];

//owner info
$owner_query = "SELECT * FROM users WHERE User_ID = $owner_id";
$owner_result = mysqli_query($con, $owner_query);
$owner_info = mysqli_fetch_assoc($owner_result);
$owner_name = $owner_info['First_Name'];

//Is The User Player?
$info = "SELECT * FROM queue WHERE queue_id = $Lobby_ID AND player_id = $user_id";
$info_result = mysqli_query($con, $info);
$player_info = mysqli_fetch_assoc($info_result);
$team = $player_info ['team'];
$_SESSION['team'] = $team;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shepherd.js/8.4.0/css/shepherd.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/shepherd.js/8.4.0/js/shepherd.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
  <title>CoDev</title>
</head>
<body>
<?php include '../components/navbar.php'; ?>


<div id="usersLobbyModal" class="users-lobby-modal">
    <div class="users-lobby-modal-content">
                          
    <h2 class="users-lobby-title"><?php echo $owner_name?>'s Lobby</h2>
    <!-- <h3 class="users-lobby-id">Lobby ID: 123456</h3> -->

    <!-- Close Button -->
    <span class="users-lobby-close" id="usersLobbyCloseModal">
        <img src="../img/btnback.png" alt="Close">
    </span>

    <!-- Player Slots -->
    <div id="lobby-container" class="lobby-container">

    </div>

    <!-- Buttons -->
     <div id="closer">

     </div>
    <div class="button-container">
        <?php
        if($player_info['type'] == 'Owner') {
        ?>
        <!-- <button id="usersLobbyReload" class="glow-button"><img src="../img/btnreload.png" alt="Reload"></button> -->
        <button id="usersLobbyStart" class="glow-button"><img src="../img/btnstart.png" alt="Start" onclick="window.location.href = 'redirection.php'" ></button>
        <?php
        }
        ?>
    </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="lobby_players.js"></script>
<script>
usersLobbyCloseModal.addEventListener("click", async function () {
    try{
        const response = await fetch("close_lobby.php", {
        method: "POST"
        });
        usersLobbyModal.style.display = "none";
        const text = await response.text(); // Read as plain text
        console.log("Response from PHP:", text); // Log response for debugging
        } catch (error) {
            console.error("Error:", error);
            alert("An error occurred.");
        }
    window.location.href='mode.php'
});
</script>
</html>