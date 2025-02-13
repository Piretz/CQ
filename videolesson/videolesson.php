<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

$video_id = $_GET['id'];

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
            <h1 class="course-title">HTML</h1>
            <div class="grid-container">
                    <!-- First Panel: Video -->
                    <div class="panel video-panel">
                        <iframe 
                            id="lesson-video" 
                            width="100%" 
                            height="330" 
                            src="<?php echo $row['Lesson_Vid'] ?>" 
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
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button onclick="window.location.href='videolesson.php?id=<?php echo $row['Lesson_ID']?>'" class="lesson-button">
                            <div class="lesson-content">
                                <div class="lesson-info">
                                    <span id="lesson-title"><?php echo $row['Lesson_Title'] ?></span> <br>
                                    <span class="instructor"><?php echo $row['Lesson_Creator'] ?></span>
                                </div>
                            </div>
                        </button>
                            <?php
                            }
                            ?>
                    </div>

                    <!-- Third Panel: Lesson Info -->
                    <div class="panel lesson-info-panel">
                        <h2>Lesson 1</h2>
                        <p>This is a sample lesson description that will automatically break into the next line when necessary.</p>
                        <!-- <button onclick="downloadFile()">Download File</button> -->
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
</body>
</html>
