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
  <title>CoDev - Quiz</title>
</head>
<body>

    <!-- Quiz Panel Box -->
    <div class="quiz-panel">
        <!-- Back Button -->
        <!-- <div class="btn-back">
            <img src="../img/btnback.png" alt="Back Button" class="btn-back-image" onclick="window.location.href='../selectcourse/course.php';">
        </div> -->

        <!-- Quiz Content -->
        <div class="quiz-content">
            <h2 class="quiz-question">Question 1: What does HTML stand for?</h2>
            <form action="submit_quiz.php" method="POST">
                <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">
                    <img src="../img/btnSubmitAnswer.png" alt="Submit Answer">
                </button>
            </form>
        </div>

    </div>

    <!-- quiz panel completed result -->
    <div class="quiz-panel-completed">
        <div class="quiz-content-completed">
            <h2 class="quiz-completed">QUIZ COMPLETED!</h2>
            <p class="quiz-result">1/1</p>
            <!-- BUTTONS (Left & Right) -->
            <div class="quiz-buttons">
                <button class="btn-exit" onclick="window.location.href='../selectcourse/course.php';">
                    Exit
                </button>
                <button class="btn-back-lesson" onclick="window.location.href='../videolesson/videolesson.php';">
                    Back to Lesson
                </button>
            </div>

        </div>
    </div>

    <!-- quiz panel failed result -->
    <div class="quiz-panel-failed">
        <div class="quiz-content-failed">
            <h2 class="quiz-failed">QUIZ FAILED!</h2>
            <p class="quiz-result">0/1</p>
            <!-- BUTTONS (Left & Right) -->
            <div class="quiz-buttons">
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
