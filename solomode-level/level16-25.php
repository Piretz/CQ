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

  <!-- Level Panel Image Centered -->
  <div class="level-panel">
    <img src="../img/level-panel.png" alt="Level Panel Image" class="level-panel-image">
  </div>

  <!-- Back Button -->
  <div class="btn-back">
    <img src="../img/btnback.png" alt="Back Button" class="btn-back-image" onclick="window.location.href='../selectmode/index.php';">
  </div>

  <!-- Prev Level Button -->
  <div class="btn-prev-level">
    <img src="../img/btnprev-level.png" alt="Prev Level Button" class="btn-prev-level-image" onclick="window.location.href='level1-15.php';">
  </div>

  <!-- Next Level Button -->
  <div class="btn-next-level">
    <img src="../img/btnnext-level.png" alt="Next Level Button" class="btn-next-level-image">
  </div>

  <!-- Level Cards Section -->
  <div class="level-cards">
    <?php 
      // Example: User's current unlocked level (can be retrieved from a database)
      $currentLevel = 1; 

      for ($i = 16; $i <= 25; $i++): 
        // Determine image based on unlocked level
        $image = ($i <= $currentLevel) ? "../img/level-unlock.png" : "../img/level-lock.png";
    ?>
      <div class="level-card">
        <img src="<?php echo $image; ?>" alt="Level <?php echo $i; ?>" class="level-card-image">
        <h3 class="level-title">Level <?php echo $i; ?></h3>
      </div>
    <?php endfor; ?>
  </div>
</body>
</html>
