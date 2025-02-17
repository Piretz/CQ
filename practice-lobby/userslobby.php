<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if (!isset($_SESSION['ID'])) {
  header("Location: ../index.php");
}
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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev - Lobby Full</title>
</head>
<body>

<div class="users-lobby-modal">
                      <div class="users-lobby-modal-content">
                          
                          <h2 class="users-lobby-title">User's Lobby</h2>
                          <!-- <h3 class="users-lobby-id">Lobby ID: 123456</h3> -->
                          
                          <!-- Close Button -->
                          <span class="users-lobby-close" id="usersLobbyCloseModal">
                              <img src="../img/btnback.png" alt="Close" onclick="window.location.href='../multiprac_course/multiplayer_practice.php';">
                          </span>

                          <!-- Player Slots -->
                          <div class="lobby-container">
                              <div class="team team-left">
                                  <div class="player-slot" data-slot="1"></div>
                                  <div class="player-slot" data-slot="2"></div>
                                  <div class="player-slot" data-slot="3"></div>
                              </div>
                              
                              <div class="vs-text"><img src="../img/VS.png"></div>

                              <div class="team team-right">
                                  <div class="player-slot" data-slot="4"></div>
                                  <div class="player-slot" data-slot="5"></div>
                                  <div class="player-slot" data-slot="6"></div>
                              </div>
                          </div>

                          <!-- Buttons -->
                          <div class="button-container">
                              <button id="usersLobbyReload" class="glow-button"><img src="../img/btnreload.png" alt="Reload"></button>
                              <button id="usersLobbyStart" class="glow-button"><img src="../img/btnstart.png" alt="Start" onclick="window.location.href='../pvp_friendsGame/multiplayer.php';"></button>
                          </div>
                      </div>
                  </div>

</body>
</html>
