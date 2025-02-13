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
    <img src="../img/btnback.png" alt="Back Button" class="btn-back-image" onclick="window.location.href='../selectmode/mode.php';">
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
 <?php
        $queryunlocked = "SELECT *
          FROM unlocked_level
          JOIN Solo_Level
          ON unlocked_level.Level_ID = Solo_Level.Level_Id
          WHERE unlocked_level.Users_ID = $id;";
        $resultunlocked = mysqli_query($con, $queryunlocked);
        while($rows = mysqli_fetch_array($resultunlocked)){
  ?>
    <div class="level-cards">
      <a href="../solo-level/levels.php?level=<?php echo $rows['Level_ID']?>" class="level-card">
        <span class="level-number"><?php echo $rows['Level_ID']?></span>
      </a>
      <?php
        }
        $query = "SELECT * 
          FROM Solo_Level
          WHERE Solo_Level.Level_Id NOT IN (
          SELECT Level_Id 
          FROM unlocked_level
          WHERE unlocked_level.Users_ID = $id);";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
      ?>
      <div class="level-card">
        <img src="../img/level-lock.png" alt="Level " class="level-card-image">
      </div>
      <?php
        }
      ?>
    </div>
</div>

</body>
</html>
