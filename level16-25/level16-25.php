<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>
  

  <div class="level-panel">
  <img src="../img/levelPanel.png" alt="Level Panel Image" class="level-panel-image">

  <!-- Back Button -->
  <!-- <div class="btn-back">
    <img src="../img/btnback.png" alt="Back Button" class="btn-back-image" onclick="window.location.href='../selectmode/mode.php';">
  </div> -->

  <!-- Prev Level Button -->
  <div class="btn-prev-level">
    <img src="../img/btnprev-level.png" alt="Prev Level Button" class="btn-prev-level-image" onclick="window.location.href='../level1-15/level1-15.php';">
  </div>

  <!-- Next Level Button -->
  <div class="btn-next-level">
    <!-- <img src="../img/btnnext-level.png" alt="Next Level Button" class="btn-next-level-image" > -->
  </div>

  <!-- Course Title -->
  <h1 class="course-level">CSS</h1>

  <!-- Level Cards Section -->
  <div class="level16-cards">
  <?php 
    $currentLevel = 0; 
    for ($i = 16; $i <= 25; $i++): 
  ?>
    <?php if ($i <= $currentLevel): ?>
      <a href="../solo-level/levels.php?level=<?php echo $i; ?>" class="level-card">
        <span class="level-number"><?php echo $i; ?></span>
      </a>
    <?php else: ?>
      <div class="level-card">
        <img src="../img/level-lock.png" alt="Level <?php echo $i; ?>" class="level-card-image">
      </div>
    <?php endif; ?>
  <?php endfor; ?>
  </div>
</div>

</body>
</html>
