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
  <title>CoDev</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../components/styles.css">
</head>
<body>

  <?php include '../components/navbar.php'; ?>

  <main class="main-content">
    <!-- Back Button -->
    <div class="back-course">
      <a href="../practicemode_carousel/practice_mode.php" class="back-button">
        <img src="../img/btnback.png" alt="Back Button" class="btn-back">
      </a>
    </div>

    <!-- Selection Cards -->
    <div class="selection-container">
      <div class="selection-card" onclick="window.location.href='../soloprac_game/soloprac_game.php';">
        <img src="../img/html.png" alt="HTML">
        <div class="overlay">HTML</div>
      </div>

      <div class="selection-card" onclick="window.location.href='../soloprac_game/soloprac_game.php';">
        <img src="../img/csscourse.png" alt="CSS">
        <div class="overlay">CSS</div>
      </div>

      <div class="selection-card" onclick="window.location.href='../soloprac_game/soloprac_game.php';">
        <img src="../img/js.png" alt="JavaScript">
        <div class="overlay">JavaScript</div>
      </div>

      <div class="selection-card" onclick="window.location.href='../soloprac_game/soloprac_game.php';">
        <img src="../img/python.png" alt="Python">
        <div class="overlay">Python</div>
      </div>
    </div>

  </main>

</body>
</html>
