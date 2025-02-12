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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css"> <!-- External CSS file -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

    <?php include '../components/navbar.php'; ?>

    <!-- <div class="Title">
      <h1>My Achievements</h1>
    </div> -->

    <div class="panel-box">
      <div class="badge-container">
      <?php
        $queryunlocked = "SELECT *
        FROM unlocked_badges
        JOIN badges
        ON badges.Badge_ID = unlocked_badges.Badge_ID
        WHERE unlocked_badges.User_ID= $id;";
        $resultunlocked = mysqli_query($con, $queryunlocked);
        while($rows = mysqli_fetch_array($resultunlocked)){
        ?>
        <div class="badge unlocked" title="<?php echo $rows['Badge_Description'] ?> Unlocked IN:<?php echo $rows['Unlocked_Date'] ?>" >
          <img src="../img/<?php echo $rows['Badge_Pic'] ?>" alt="Badge 1">
          <p><?php echo $rows['Badge_Name'] ?></p>
        </div>
        <?php
        }
        $query = "SELECT * 
        FROM badges
        where badges.Badge_ID NOT IN (
        SELECT Badge_ID
        FROM unlocked_badges
        WHERE User_ID = $id
        );";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
        ?>
        <!-- Diamond Badge (locked) -->
        <div class="badge locked" title="<?php echo $row['Badge_Description'] ?>. Requirements:<?php echo $row['Badge_Requirements'] ?>">
          <img src="../img/<?php echo $row['Badge_Pic'] ?>" alt="Badge 2">
          <p><?php echo $row['Badge_Name'] ?></p>
          <img src="../img/lock.png" class="lock-icon" alt="Lock Icon">
        </div>
        <?php
        }
        ?>
      </div>
    </div>

</body>
</html>
