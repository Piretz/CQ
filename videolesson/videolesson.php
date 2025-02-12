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
$lesson = isset($_GET['lesson']) ? $_GET['lesson'] : 'No Lesson';
$video = isset($_GET['video']) ? $_GET['video'] : 'default';
$description = isset($_GET['description']) ? $_GET['description'] : 'No Description';
?>


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
                            src="https://www.youtube.com/embed/default" 
                            frameborder="2" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                     <!-- Second Panel: Lesson Details --> 
                    <div class="panel lesson-details-panel">
                        <button onclick="showContent('Lesson 1: Introduction to Hypertext Markup Language (HTML)', 'CA_7yoGZg0M', 'This lesson covers the basics of HTML structure and syntax.')" class="lesson-button">
                            <div class="lesson-content">
                                <div class="lesson-info">
                                    <span id="lesson-title">Lesson 1: Introduction to Hypertext Markup Language (HTML)</span> <br>
                                    <span class="instructor">Cipherion</span>
                                </div>
                                <span class="lesson-duration">(1:15)</span>
                            </div>
                        </button>

                        <button onclick="showContent('Lesson 1: Introduction to Computing', '9A1TETDUMIo', 'Learn about various HTML elements and their uses.')" class="lesson-button">
                            <div class="lesson-content">
                                <div class="lesson-info">
                                    <span id="lesson-title">Lesson 1: Introduction to Computing</span> <br>
                                    <span class="instructor">Cipherion</span>
                                </div>
                                <span class="lesson-duration">(0:16)</span>
                            </div>
                        </button>
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
                <script>
                    // Function to add a comment
                    function addComment() {
                    const commentInput = document.getElementById('comment-input');
                    const commentSection = document.getElementById('comment-section');

                    if (commentInput.value.trim() === '') {
                        alert('Please enter a comment before submitting.');
                        return;
                    }

                    // Create a comment container
                    const commentContainer = document.createElement('div');
                    commentContainer.className = 'comment';

                    // Add profile image
                    const profileImage = document.createElement('img');
                    profileImage.src = '../img/john.png';
                    profileImage.alt = 'User Profile';
                    profileImage.className = 'comment-profile-image';

                    // Add text content container
                    const textContent = document.createElement('div');
                    textContent.className = 'text-content';

                    // Add username
                    const username = document.createElement('span');
                    username.className = 'username';
                    username.textContent = 'User'; // Replace with dynamic username if available

                    // Add comment text
                    const commentText = document.createElement('span');
                    commentText.textContent = commentInput.value;

                    // Append username and comment text to text content container
                    textContent.appendChild(username);
                    textContent.appendChild(commentText);

                    // Append elements to the comment container
                    commentContainer.appendChild(profileImage);
                    commentContainer.appendChild(textContent);

                    // Append the comment container to the comment section
                    commentSection.appendChild(commentContainer);

                    // Clear the input field
                    commentInput.value = '';
                    }

                    // Function to display lesson content
                    function showContent(title, videoSrc, description) {
                        const video = document.getElementById('lesson-video');
                        const lessonInfoPanel = document.querySelector('.lesson-info-panel');

                        video.querySelector('source').src = videoSrc;
                        video.load();

                        lessonInfoPanel.querySelector('h2').textContent = title;
                        lessonInfoPanel.querySelector('p').textContent = description;
                    }

                    function showContent(title, videoSrc, description) {
                    const video = document.getElementById('lesson-video');
                    const lessonInfoPanel = document.querySelector('.lesson-info-panel');

                    // Update the YouTube video URL
                    video.src = `https://www.youtube.com/embed/${videoSrc}`;

                    // Update lesson title and description
                    lessonInfoPanel.querySelector('h2').textContent = title;
                    lessonInfoPanel.querySelector('p').textContent = description;
                    }

                    document.addEventListener("DOMContentLoaded", function () {
        const video = document.getElementById('lesson-video');
        video.src = `https://www.youtube.com/embed/<?php echo $video; ?>`;

        const lessonInfoPanel = document.querySelector('.lesson-info-panel');
        lessonInfoPanel.querySelector('h2').textContent = "<?php echo $lesson; ?>";
        lessonInfoPanel.querySelector('p').textContent = "<?php echo $description; ?>";
    });
                </script>
</body>
</html>
