<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

$video_id = $_GET['id'];

$user = "SELECT * FROM users WHERE User_ID = $id";
$result = mysqli_query($con,$user);
$row = mysqli_fetch_assoc($result);

$user_type = $row['user_type'];

if($user_type == 'New'){
    $new_type = "UPDATE users SET  user_type = 'Old' WHERE User_ID = $id";
    $new_result = mysqli_query($con, $new_type);

    $unlock_level = "INSERT INTO unlocked_level(Level_ID, Users_ID) VALUES (1,$id)";
    $unlock = mysqli_query($con, $unlock_level);
    
    $stats = "INSERT INTO users_stats(User_id) VALUES ($id)";
    $stat_make = mysqli_query($con, $stats);
}

$query = "SELECT * FROM lesson where Lesson_ID = $video_id";
$result = mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);

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

        <div class="box-container">
            <!-- course title text-->
            <h1 class="course-title"><?php echo $row['Lesson_Title'] ?></h1>
            <div class="grid-container">
                    <!-- First Panel: Video -->
                    <div class="panel video-panel">
                    <iframe 
                        id="lesson-video" 
                        width="100%" 
                        height="330" 
                        src="<?php echo $row['Lesson_Vid']; ?>?autoplay=0&rel=0&controls=1" 
                        frameborder="2" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>

                    </div>
                     <!-- Second Panel: Lesson Details --> 
                    <div class="panel lesson-details-panel">
                        <?php
                        $video_list = "SELECT * FROM lesson WHERE Lesson_ID != $video_id";
                        $result = mysqli_query($con, $video_list);
                        while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        <button onclick="window.location.href='videolesson.php?id=<?php echo $row['Lesson_ID']?>'" class="lesson-button">
                            <div class="lesson-content">
                                <div class="lesson-info">
                                    <span id="lesson-title"><?php echo $rows['Lesson_Title'] ?></span> <br>
                                    <span class="instructor"> - <?php echo $rows['Lesson_Creator'] ?></span>
                                </div>
                            </div>
                        </button>
                            <?php
                            }
                            ?>
                    </div>

                    <!-- Third Panel: Lesson Info -->
                    <div class="panel lesson-info-panel">
                        <h2><?php echo $row['Lesson_Title'] ?></h2>
                        <p><?php echo $row['Lesson_Description'] ?></p>
                        <button onclick="openQuiz()">Open Quiz</button>
                        <!-- <button onclick="openCorrect()">Open Correct</button>
                        <button onclick="openIncorrect()">Open Incorrect</button> -->

                    </div>

                  <!-- Fourth Panel: Comments -->
                   <div class="panel comment-panel">
                        <h2>COMMENTS:</h2>
                        <div id="comment-section"></div>
                        <div class="input-area"> <!-- Wrapper for textarea, button, and profile image -->
                            <img src="../img/john.png" alt="User Profile" class="comment-profile-image">
                            <textarea id="comment-input" placeholder="Add your comment"></textarea>
                            <button onclick="addComment()"><img src="../img/btnsend.png" alt="Send Icon"></button>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Quiz Modal -->
        <div id="quiz-modal" class="quiz-modal">
            <div class="quiz-content">
                <!-- <span class="close-btn" onclick="closeQuiz()">&times;</span> -->
                <h2 class="quiz-question">Question 1: What does HTML stand for?</h2>
                    <form action="submit_quiz.php" method="POST">
                        <label><input type="radio" name="answer" value="a"> a. Hyperlink Text Management Language</label>
                        <label><input type="radio" name="answer" value="b"> b. Hypertext Markup Language</label>
                        <label><input type="radio" name="answer" value="c"> c. High-Level Text Management Language</label>
                        <label><input type="radio" name="answer" value="d"> d. Hyper Transfer Markup Logic</label>

                        <!-- Submit Button -->
                        <button type="button" class="btn-submit" onclick="checkAnswer()">
                            <img src="../img/btnSubmitAnswer.png" alt="Submit Answer">
                        </button>
                    </form>
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
