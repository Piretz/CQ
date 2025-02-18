<?php
include '../connection/connection.php';
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoDev</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css">
    <link rel="stylesheet" href="../components/styles.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js"></script>
</head>
<body>
<?php include '../components/navbar.php'; ?>
    
    <main class="main-content">
        <div class="lesson-box-container">
            <div class="box-box-1">
                <div class="top-box">
                    <div class="button-container">
                        <button class="action-button">All</button>
                        <button class="action-button">Complete</button>
                        <button class="action-button">Continue</button>
                    </div>
                    <div class="search-bar-container">
                        <input type="text" placeholder="Search..." class="search-bar">
                    </div>
                </div>
                
                <div class="lesson-list-container">
                    <?php
                    $lesson_query = "SELECT * FROM lesson";
                    $result = mysqli_query($con, $lesson_query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="centered-box">
                            <div class="lesson-details">
                                <h3>Lesson: <?php echo htmlspecialchars($row['Lesson_Title']); ?></h3>
                                <h5>
                                    <img src="../img/joybee.png" alt="Profile Icon" class="profile-icon">
                                    <strong><?php echo htmlspecialchars($row['Lesson_Creator']); ?></strong>
                                </h5>
                                <p><?php echo htmlspecialchars($row['Lesson_Description']); ?></p>
                                <button class="view-button" onclick="window.location.href='../videolesson/videolesson.php?id=<?php echo $row['Lesson_ID']; ?>'">
                                    Watch Lesson
                                    <img src="../img/btnplay.png" alt="Play Icon" class="play-icon">
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>
