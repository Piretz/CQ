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
  <link rel="stylesheet" href="../defeat/styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev - Lobby Full</title>
</head>
<body>

  <!-- DEFEAT Modal Container -->
  <div class="defeat-modal">
          <div class="defeatmodal-content">
              <!-- <span class="close" id="closeDefeat">&times;</span> -->

              <div class="defeat-header">
                  <h1>DEFEAT</h1>
              </div>

              <!-- Player Stats Section -->
              <div class="player-info">
                  <div class="player">
                      <img src="../img/john.png" alt="Player 1">
                      <p><strong>Time:</strong> 1 Min</p>
                      <p><strong>Error:</strong> 2</p>
                      <p><strong>Efficiency:</strong> 70%</p>
                  </div>
                  <div class="mvp">
                      <img src="../img/lebron.png" alt="MVP">
                      <h2>MVP</h2>
                      <p><strong>Time:</strong> 1 Min</p>
                      <p><strong>Error:</strong> 2</p>
                      <p><strong>Efficiency:</strong> 70%</p>
                  </div>
                  <div class="player">
                      <img src="../img/annette.png" alt="Player 2">
                      <p><strong>Time:</strong> 1.5 Min</p>
                      <p><strong>Error:</strong> 4</p>
                      <p><strong>Efficiency:</strong> 50%</p>
                  </div>
              </div>

              <!-- Rank & Level Progress Bars -->
              <div class="progress-container">
                  <div class="progress-box">
                      <p><strong>Rank: Bronze I</strong></p>
                      <div class="progress-bar">
                          <div class="progress-fill rank-progress" style="width: 40%;"></div> <!-- Dynamic Width -->
                      </div>
                  </div>
                  <div class="progress-box">
                      <p><strong>Level: 3</strong></p>
                      <div class="progress-bar">
                          <div class="progress-fill level-progress" style="width: 55%;"></div> <!-- Dynamic Width -->
                      </div>
                  </div>
              </div>

              <!-- Action Buttons -->
              <div class="buttons">
                  <button class="exit" id="closeDefeatBtn">Exit</button>
                  <button class="play-again">Play Again</button>
              </div>
          </div>
      </div>
</body>
</html>