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
  <link rel="stylesheet" href="style.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev - Quiz</title>
</head>
<body>

 <!-- Quiz Correct -->
 <div class="quiz-correct">
            <div class="quiz-content-completed">
                <h2 class="quiz-completed">QUIZ COMPLETED!</h2>
                <p class="quiz-result">5/5</p>
                
                <!-- Rewards Section -->
            <div class="quiz-rewards">
                <!-- Rank Progress -->
                <div class="progress-container">
                    <span class="progress-label">Rank:</span>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo min(100, ($rank_points / 100) * 100); ?>%;"></div>
                        <span class="progress-points">+<?php echo $rank_points; ?></span>
                    </div>
                </div>

                <!-- Level Progress -->
                <div class="progress-container">
                    <span class="progress-label">Level:</span>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo min(100, ($level_points / 100) * 100); ?>%;"></div>
                        <span class="progress-points">+<?php echo $level_points; ?></span>
                    </div>
                </div>
            </div>
                
                <!-- Earned Badges -->
                <div class="quiz-badge-container">
                    <div class="quiz-badges">
                        <img src="../img/diamond.png" class="quiz-badge-image">
                        <img src="../img/diamond.png" class="quiz-badge-image">
                        <img src="../img/diamond.png" class="quiz-badge-image">
                        <img src="../img/diamond.png" class="quiz-badge-image">
                    </div>
                </div>
                
                <!-- Buttons -->
                <div class="quiz-buttons-completed">
                    <button class="btn-exit" onclick="window.location.href='../lesson/lesson.php';">
                        Exit
                    </button>
                    <button class="btn-back-lesson" onclick="window.location.href='../lesson/lesson.php';">
                        Back to Lesson
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>