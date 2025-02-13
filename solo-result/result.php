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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="style.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev - Solo Result</title>
</head>
<body>
    <!-- quiz panel completed result -->
    <div class="solo-panel-completed">
        <div class="solo-content-completed">
            <h2 class="solo-completed">LEVEL COMPLETED!</h2>
            <p class="solo-result">1/1</p>
            <!-- BUTTONS (Left & Right) -->
            <div class="solo-buttons">
                <button class="btn-exit" onclick="window.location.href='../selectcourse/course.php';">
                    Exit
                </button>
                <button class="btn-back-lesson" onclick="window.location.href='../videolesson/videolesson.php';">
                    Next Level
                </button>
            </div>

        </div>
    </div>

    <!-- quiz panel failed result -->
    <div class="solo-panel-failed">
        <div class="solo-content-failed">
            <h2 class="solo-failed">LEVEL FAILED!</h2>
            <p class="solo-result">0/1</p>
            <!-- BUTTONS (Left & Right) -->
            <div class="solo-buttons">
                <button class="btn-exit" onclick="window.location.href='../selectcourse/course.php';">
                    Exit
                </button>
                <button class="btn-back-lesson" onclick="window.location.href='../videolesson/videolesson.php';">
                    Back to Lesson
                </button>
            </div>
        </div>

</body>
</html>
