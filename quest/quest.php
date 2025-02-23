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
  <link rel="stylesheet" href="styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev - Quiz</title>
</head>
<body>

    <!-- Quiz Panel Box -->
    <div class="quiz-panel">
        <!-- Quiz Content -->
            <div class="quiz-container">
                <div class="quiz-content">
                    <h2 class="quiz-question">Question 1: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                        
                    </form>
                </div>

                <div class="quiz-content">
                    <h2 class="quiz-question">Question 2: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                        
                    </form>
                </div>

                <div class="quiz-content">
                    <h2 class="quiz-question">Question 3: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                    
                    </form>
                </div>

                <div class="quiz-content">
                    <h2 class="quiz-question">Question 4: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                    
                    </form>
                </div>

                <div class="quiz-content">
                    <h2 class="quiz-question">Question 5: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                    
                    </form>
                     <!-- Submit Button -->
                     <button type="button" class="btn-submit" onclick="checkAnswer()">
                        <img src="../img/btnSubmitAnswer.png" alt="Submit Answer">
                     </button>
                </div>
            </div>
    </div>

     <!-- Quiz Correct -->
        <div id="quiz-correct" class="quiz-correct" style="display: none;">
            <div class="quiz-content-completed">
                <h2 class="quiz-completed">QUIZ COMPLETED!</h2>
                <p class="quiz-result">1/1</p>
                
                <!-- Rewards Section -->
                <div class="quiz-rewards">
                    <!-- Rank Progress -->
                    <div class="progress-container">
                        <span class="progress-label">Rank:</span>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <span class="progress-points">+15</span> <!-- Added +15 -->
                        </div>
                    </div>

                    <!-- Level Progress -->
                    <div class="progress-container">
                        <span class="progress-label">Level:</span>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <span class="progress-points">+15</span> <!-- Added +15 -->
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

        <!-- Quiz Incorrect -->
        <div id="quiz-incorrect" class="quiz-incorrect" style="display: none;">
            <div class="quiz-content-failed">
                <h2 class="quiz-failed">QUIZ FAILED!</h2>
                <p class="quiz-result">0/1</p>

                <!-- BUTTONS -->
                <div class="quiz-buttons-failed">
                    <button class="btn-exit" onclick="window.location.href='../lesson/lesson.php';">
                        Exit
                    </button>
                    <button class="btn-retake" onclick="retakeQuiz()">
                        Retake Quiz
                    </button>
                </div>
            </div>
        </div>

        <script>
    function checkAnswer() {
        var correctAnswer = "b";
        var selectedAnswer = document.querySelector('input[name="answer"]:checked');
        
        if (selectedAnswer) {
            if (selectedAnswer.value === correctAnswer) {
                document.getElementById("quiz-modal").style.display = "none";
                document.getElementById("quiz-correct").style.display = "flex";
            } else {
                document.getElementById("quiz-modal").style.display = "none";
                document.getElementById("quiz-incorrect").style.display = "flex";
            }
        } else {
            alert("Please select an answer before submitting.");
        }
    }

    function retakeQuiz() {
    document.getElementById("quiz-incorrect").style.display = "none";
    document.getElementById("quiz-modal").style.display = "flex";
}

</script>
                
        <script>
            // quiz
        function openQuiz() {
            document.getElementById("quiz-modal").style.display = "flex";
        }

        function closeQuiz() {
            document.getElementById("quiz-modal").style.display = "none";
        }

        // correct
        function openCorrect() {
            document.getElementById("quiz-correct").style.display = "flex";
        }

        function closeCorrect() {
            document.getElementById("quiz-correct").style.display = "none";
        }

        // incorrect
        function openIncorrect() {
            document.getElementById("quiz-incorrect").style.display = "flex";
        }

        function closeIncorrect() {
            document.getElementById("quiz-incorrect").style.display = "none";
        }
        </script>
</body>
</html>
