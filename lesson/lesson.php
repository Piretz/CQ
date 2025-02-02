<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <div class="box-container">
    <div class="box-box-1">
        <!-- Centered Box -->
        <div class="centered-box">
            <div class="lesson-details">
                <h3>Lesson: Introduction to Programming</h3>
                <h5>
                    <img src="../img/john.png" alt="Profile Icon" style="width: 3%; height: 2%; margin-right: 8px; vertical-align: middle; border-radius: 10px;">
                    <strong>Mr.</strong> John Doe
                </h5>
                <p>This lesson provides an overview of programming basics, including variables, data types, and control structures.</p>
                <!-- Watch Lesson Button with Play Icon aligned to the right side inside the button -->
                <button class="view-button" onclick="showLesson()">
                    Watch Lesson
                    <img src="../img/btnplay.png" alt="Play Icon" class="play-icon">
                </button>
            </div>
        </div>    

    </div>

    <div class="box-box-2" id="lesson-display">
    <script src="lesson.js"></script>
    </div>
</div>



    </main>
</body>
</html>
