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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
<title>CoDev</title>
</head>
<body>

          <?php include '../components/navbar.php'; ?>

                <?php
        if (isset($_GET['mode'])) {
          $mode = $_GET['mode'];
          
            }
        ?>

         <!-- Main Content -->
        <main class="main-content">
            <!-- Back Button (Top Right) -->
            <!-- <div class="back-course">
                <a href="../selectmode/mode.php" class="back-button">
                    <img src="../img/btnback.png" alt="Back Button" class="btnswiper-back-button">
                </a>
            </div> -->

            <!-- Course Cards Container -->
            <div class="course-container">
                <div class="course-card">
                <img src="../img/solo_Card.png" alt="Solo Practice" onclick="window.location.href='../soloprac_course/soloprac_carousel.php';">
                </div>

                <div class="course-card">
                <img src="../img/friends_Card.png" alt="PvP Mode" onclick="window.location.href='../multiprac_course/multiplayer_practice.php';">
                </div>
            </div>
        </main>
    </body>
</html>