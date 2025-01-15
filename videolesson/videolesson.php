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
            <div class="grid-container">
                    <!-- First Panel: Video -->
                    <div class="panel video-panel">
                        <video id="lesson-video" controls>
                            <source src="sample-video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <!-- Second Panel: Comments -->
                    <div class="panel comment-panel">
                        <h2>COMMENTS:</h2>
                        <div id="comment-section"></div>
                        <div class="input-area"> <!-- Wrapper for textarea and button -->
                            <textarea id="comment-input" placeholder="Add your comment"></textarea>
                            <button onclick="addComment()"><img src="../img/btnsend.png" alt="Send Icon"></button>
                        </div>
                    </div>

                    <!-- Third Panel: Lesson Info -->
                    <div class="panel lesson-info-panel">
                        <h2>Lesson 1</h2>
                        <p>This is a sample lesson description that will automatically break into the next line when necessary.</p>
                        <button onclick="downloadFile()">Download File</button>
                    </div>

                    <!-- Fourth Panel: Lesson Details -->
                    <div class="panel lesson-details-panel">
                        <button onclick="showContent()">
                            <span id="lesson-title">Lesson Title</span> <br>
                            Instructor: John Doe <br>
                            Video Duration: 10 minutes
                        </button>
                    </div>
            </div>
        </div>
                <script>
                    // Function to add a comment
                function addComment() {
                    const commentInput = document.getElementById('comment-input');
                    const commentSection = document.getElementById('comment-section');

                    if (commentInput.value.trim() !== '') {
                        const newComment = document.createElement('div');
                        newComment.className = 'comment';
                        newComment.textContent = commentInput.value;
                        commentSection.appendChild(newComment);
                        commentInput.value = ''; // Clear input after adding
                    } else {
                        alert('Please enter a comment!');
                    }
                }

                // Function to download file
                function downloadFile() {
                    const link = document.createElement('a');
                    link.href = 'sample-file.pdf'; // Replace with your file URL
                    link.download = 'Lesson 1 - Description.pdf';
                    link.click();
                }

                // Function to show video and lesson details
                function showContent() {
                    const videoPanel = document.querySelector('.video-panel');
                    const lessonInfoPanel = document.querySelector('.lesson-info-panel');

                    videoPanel.style.display = 'block';
                    lessonInfoPanel.style.display = 'block';
                }

                </script>
</body>
</html>