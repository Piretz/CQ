<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="../components/styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>
  <?php include '../components/navbar.php'; ?>

  <div class="level-panel">
  <img src="../img/levelPanel.png" alt="Level Panel Image" class="level-panel-image">

  <!-- Back Button -->
  <div class="btn-back">
    <img src="../img/btnback.png" alt="Back Button" class="btn-back-image" onclick="window.location.href='../selectmode/index.php';">
  </div>

  <!-- Prev Level Button -->
  <div class="btn-prev-level">
    <img src="../img/btnprev-level.png" alt="Prev Level Button" class="btn-prev-level-image">
  </div>

  <!-- Next Level Button -->
  <div class="btn-next-level">
    <img src="../img/btnnext-level.png" alt="Next Level Button" class="btn-next-level-image" onclick="window.location.href='../level16-25/level16-25.php';">
  </div>

  <!-- Course Title -->
  <h1 class="course-level">HTML</h1>

 <!-- Level Cards Section -->
<div class="level-cards">
  <?php 
    $currentLevel = 5; 
    for ($i = 1; $i <= 15; $i++): 
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
