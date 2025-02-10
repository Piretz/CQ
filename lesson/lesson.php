<?php
include '../connection/connection.php';
session_start();
$user_id = $_SESSION['ID'];

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
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>
    <!-- header and sidebar -->
    <?php include '../components/navbar.php'; ?>
    
    <!-- main content -->
    <main class="main-content">
      <!-- New Box at the Top -->
      <div class="top-box">
        <div class="button-container">
          <button class="action-button">All</button>
          <button class="action-button">Complete</button>
          <button class="action-button">Continue</button>
        </div>
        
        <!-- Search Bar -->
        <div class="search-bar-container">
          <input type="text" placeholder="Search..." class="search-bar">
        </div>
      </div>

          <!-- Container to hold the panels -->
          <div class="lesson-box-container">
                <!-- Lesson 1 -->
                <div class="box-box-1">
                    <!-- start? -->
                    <?php
                        $lesson = "SELECT * FROM lesson";
                        $result = mysqli_query($con, $lesson);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="centered-box">
                            <div class="lesson-details">
                                <h3>Lesson: <?php echo $row['Lesson_Title']?></h3>
                                <h5>
                                    <img src="../img/john.png" alt="Profile Icon" style="width: 3%; height: 2%; margin-right: 8px; vertical-align: middle; border-radius: 10px;">
                                    <strong><?php echo $row['Lesson_Creator'] ?></strong>
                                </h5>
                                <p><?php echo $row['Lesson_Description'] ?></p>
                                <button class="view-button" onclick="showLesson(<?php echo $row['Lesson_ID'] ?>)">
                                    View Lesson
                                    <img src="../img/btnplay.png" alt="Play Icon" class="play-icon">
                                </button>
                            </div>
                        </div>

                    <?php }?> 
                    <!-- end?? -->
                </div>
    <div class="box-box-2" id="lesson-display">
    <script>
        function showLesson(lessonId) {
            const box2 = document.getElementById("lesson-display");

            const lessons = [
                <?php
                    $lesson = "SELECT * FROM lesson";
                    $result = mysqli_query($con, $lesson);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                {
                    title: "<?php echo $row['Lesson_Title'] ?>",
                    description: "This lesson provides an overview of programming basics, including variables, data types, and control structures.",
                    videoId: "qz0aGYrrlhU"
                },
                <?php }?>
            ];

            const lesson = lessons[lessonId - 1];

            box2.innerHTML = `
                <div class="video-container">
                    <iframe 
                        width="100%" 
                        height="315" 
                        src="https://www.youtube.com/embed/${lesson.videoId}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                        style="pointer-events: none;">
                    </iframe>
                </div>
                <h3>Lesson: ${lesson.title}</h3>
                <h5><img src="../img/john.png" alt="Profile Icon" style="width: 3%; height: 2%; margin-right: 8px; vertical-align: middle; border-radius: 10px;"><strong>Mr.</strong> John Doe</h5>
                <p>${lesson.description}</p>
                <div class="box2experience-bar">
                    <div class="badge">
                        <img src="../img/bronze.png" alt="Badge Icon">
                    </div>
                    <div class="box2progress-container">
                        <div class="box2progress-bar">
                            <div class="box2-progress"></div>
                            <div class="box2progress-text" style="position: absolute; left: calc(100% - 20px); top: -18px; font-size: 12px; color: #fff;">100%</div>
                        </div>
                    </div>
                </div>
                <button class="view-button" style="position: relative; top: 30px; left: 400px; border-left: 1px solid #FCAE00; border-right: 1px solid #FCAE00; border-top: 1px solid #FCAE00; border-bottom: 4px solid #FCAE00;" onclick="videolesson.php">
                    Watch Lesson
                    <img src="../img/btnplay.png" alt="Play Icon" class="box2-play-icon">
                </button>
            `;
        }
    </script>

    </div>
</div>



    </main>
</body>
</html>
