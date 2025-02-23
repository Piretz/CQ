<?php
include '../connection/connection.php';
session_start();
$user_id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
}

$user_query = "SELECT * FROM users WHERE User_ID = $user_id";
$user_result = mysqli_query($con, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$user_type = $user_row['user_type'];
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shepherd.js/8.4.0/css/shepherd.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/shepherd.js/8.4.0/js/shepherd.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
  <title>CoDev</title>
</head>
<body>

          <?php include '../components/navbar.php'; ?>

          <!-- dailyquest animated button image -->
          <div class="dailyquest-container">
            <img src="../img/dailyquest.png" alt="Daily Quest" class="dailyquest-image" onclick="window.location.href='../dailyquest/dailyquest.php';">
            <div class="dailyquest-text">Daily Quest</div>
          </div>
            <!-- Walkthrough Overlay -->
            <?php
                if($user_type == "New"){
            ?>
                <div id="walkthrough-overlay" class="walkthrough-overlay">
                <div class="joybee-container">
                    <img src="../img/joybee.png" alt="Joybee" class="joybee-character" id="joybeeImage">

                    <div class="joybee-text-box">
                        <p id="joybee-text">Hi User, Welcome to CoDev!</p>
                        <div class="walkthrough-buttons">
                            <button id="skip-btn">Skip</button>
                            <button id="next-btn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                } else {
            ?>
                <div id="walkthrough-overlay" class="walkthrough-overlay">
                  <div class="joybee-container">
                  <img src="../img/joybee.png" alt="Joybee" class="joybee-character" id="joybeeImage">
                  </div>
                </div> 
            <?php
                    }
            ?>
            <!-- Mode Selection -->
            <div class="select-mode-images">
                <img src="../img/mdSolo.png" alt="Solo Mode" class="solo-mode walkthrough-item locked" id="solomodeImage">
                <img src="../img/mdpvp.png" alt="PvP Mode" class="pvp-mode walkthrough-item locked" id="multimodeImage"> 
                <img src="../img/mdLesson.png" alt="Lesson Mode" class="lesson-mode walkthrough-item unlocked" id="lessonModeImage" onclick="window.location.href='../lesson/lesson.php';">
                <img src="../img/mdpractice.png" alt="Practice Mode" class="practice-mode walkthrough-item locked" id="practiceModeImage" onclick="window.location.href='../selectcourse/course.php';">
            </div>

            <!-- FOR NEW USER WALKTHROUGH NewUserLoad DOMContentLoaded-->
              <script>
                 document.addEventListener("DOMContentLoaded", function () {
                    const steps = [
                        { text: "Hi User, Welcome to CoDev!", highlight: null },
                        { text: "This is Solo Mode, where you can practice coding alone!", highlight: "solomodeImage" },
                        { text: "This is Multiplayer Mode, where you can compete with others!", highlight: "multimodeImage" },
                        { text: "Lesson Mode helps you learn new programming concepts!", highlight: "lessonModeImage" },
                        { text: "Practice Mode lets you test your skills with exercises!", highlight: "practiceModeImage" },
                        { text: "Now, click on Lesson Mode to begin your learning journey!", highlight: "lessonModeImage" }
                    ];

                    let currentStep = 0;
                    <?php
                    if($user_type == "New"){
                    ?>
                      let shouldSkip = false;
                    <?php
                    } else {
                    ?>
                      let shouldSkip = true;
                    <?php
                    }
                    ?>
                    const joybeeText = document.getElementById("joybee-text");
                    const nextBtn = document.getElementById("next-btn");
                    const skipBtn = document.getElementById("skip-btn");
                    const overlay = document.getElementById("walkthrough-overlay");
                    const images = document.querySelectorAll(".walkthrough-item");
                    const joybeeTextBox = document.querySelector(".joybee-text-box");

                    function updateStep() {
                        images.forEach(item => item.classList.remove("walkthrough-active"));
                        joybeeText.innerText = steps[currentStep].text;

                        if (steps[currentStep].highlight) {
                            document.getElementById(steps[currentStep].highlight).classList.add("walkthrough-active");
                        }
                    }

                    function skipWalkthrough() {
                        overlay.style.background = "transparent";
                        overlay.style.backdropFilter = "none";
                        overlay.style.pointerEvents = "none"; 
                        overlay.style.removeProperty("z-index");
                        images.forEach(item => item.classList.remove("walkthrough-item"));
                        joybeeTextBox.style.display = "none";
                        // After skipping walkthrough, show lesson mode image with guide
                        document.getElementById("lessonModeImage").style.backgroundColor = "transparent";
                        

                       // Apply bounce animation
                        lessonModeImage.style.transform = "scale(1.2)";
                        lessonModeImage.animate([
                            { transform: "scale(1.2)" }, 
                            { transform: "scale(1.4)" }, 
                            { transform: "scale(1.2)" }
                        ], {
                            duration: 1200, // Animation duration in milliseconds
                            iterations: Infinity, // Play animation once
                            easing: "ease-in-out" // Smooth bounce effect
                        });
                    }
                    if (shouldSkip) {
                        skipWalkthrough();
                    } else {
                    skipBtn.addEventListener("click", function () {
                      skipWalkthrough();
                    });
                    nextBtn.addEventListener("click", function () {
                      currentStep++;
                      if (currentStep >= steps.length) {
                          skipWalkthrough();
                      } else {
                          updateStep();
                      }
                    });
                    }
                    updateStep();
                });

                // Apply Locked/Unlocked Styles
                <?php
                  if($user_type == "New"){
                ?>
                document.querySelectorAll(".locked").forEach(mode => {
                    mode.style.opacity = "1";  // Locked modes appear faded
                    mode.style.pointerEvents = "none";  // Disable interaction
                });
                <?php
                  } else {
                ?>
                document.querySelectorAll(".unlocked").forEach(mode => {
                    mode.style.opacity = "1";  // Unlocked mode appears normal
                    mode.style.pointerEvents = "auto";  // Enable interaction
                });
                <?php
                  }
                ?>

              </script>

          <!-- Global Chat Input Text with Global Icon and Send Button -->
          <div class="global-chat-container">
              <button class="global-chat-icon" onclick="toggleChatPanel()">
                  <img src="../img/global.png" alt="Global Chat" class="global-chat-image">
              </button>
              <input type="text" placeholder="Type your message here..." class="global-chat-input" id="chatInput">
              <button class="global-chat-send" onclick="sendMessage()">
                  <img src="../img/btnGsend.png" alt="Send">
              </button>
          </div>

          <!-- Chat Panel Box Conversation -->
          <div class="chat-panel-box" id="chatPanelBox">
              <!-- Header Title -->
              <div class="chat-header">
                  <img src="../img/logo.png" alt="User Icon" class="user-icon">
                  <h2>Welcome to Code Quest!</h2>
              </div>
              <!-- Add your chat messages here -->
              <div id = "chat-message" class="chat-message">

              </div>
              <!-- Add more chat messages as needed -->
                </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="message.js"></script>             
          <script>
            function toggleChatPanel() {
                var chatPanelBox = document.getElementById('chatPanelBox');
                if (chatPanelBox.style.display === 'none' || chatPanelBox.style.display === '') {
                    chatPanelBox.style.display = 'block';
                } else {
                    chatPanelBox.style.display = 'none';
                }
            }

            function sendMessage() {
              let message = document.getElementById("chatInput").value.trim();

              if (message === "") {
                  alert("Please enter a message!");
                  return;
              }

              $.ajax({
                  url: 'send_message.php',
                  type: 'POST',
                  data: { message: message },
                  dataType: 'json',
                  success: function(response) {
                      console.log("Server Response:", response); // Debugging
                      if (response.success) {
                          console.log("Message sent successfully!");
                          document.getElementById("chatInput").value = ""; // Clear input
                      } else {
                          alert("Error: " + response.error);
                      }
                  },
                  error: function(xhr, status, error) {
                      console.error("AJAX Error:", status, error);
                      alert("AJAX error: " + error);
                  }
              });
          }


          </script>

                  
              <!-- ALL MODAL MODES (SOLO) (PVP) (LESSON) (PRACTICE)-->
                <!-- Solo Mode Modal -->
                <div id="soloModeModal" class="solo-modal">
                <div class="solo-modal-content">
                  <span class="solo-close" id="soloCloseModal">
                    <img src="../img/btnback.png" alt="Close Button">
                  </span>

                  <div class="solo-buttons">
                    <button id="TakeLesson" class="solo-start-btn">
                      <img src="../img/btntklesson.png" alt="Take Lesson">
                    </button>

                    <button id="StartGame" class="solo-start-btn">
                      <img src="../img/btnstartgame.png" alt="Start Game">
                    </button>
                  </div>
                </div>
              </div>

                <!-- JavaScript to Control Loading and Redirect -->
                <script>
                  function showLoadingAndRedirect(url) {
                
                    document.getElementById("loading").style.display = "flex";
                    setTimeout(function() {
                      window.location.href = url;
                    }, 2000);
                  }

                  // Event listener for Take Lesson button
                  document.getElementById("TakeLesson").addEventListener("click", function() {
                    showLoadingAndRedirect('../lesson/lesson.php');
                  });

                  // Event listener for Start Game button
                  document.getElementById("StartGame").addEventListener("click", function() {
                    showLoadingAndRedirect('../level1-15/level1-15.php');
                  });
                </script>


                <!-- JavaScript for Solo Mode Modal -->
                <script>
                  const soloModeImage = document.getElementById("solomodeImage");
                  const soloModeModal = document.getElementById("soloModeModal");
                  const soloCloseModal = document.getElementById("soloCloseModal");

                  // Open Solo Mode Modal when clicking on the image
                  soloModeImage.addEventListener("click", () => {
                    soloModeModal.style.display = "block";
                  });

                  // Close Solo Mode Modal when clicking on the close button
                  soloCloseModal.addEventListener("click", () => {
                    soloModeModal.style.display = "none";
                  });

                  // Close Solo Mode Modal when clicking outside the modal
                  window.addEventListener("click", (event) => {
                    if (event.target === soloModeModal) {
                      soloModeModal.style.display = "none";
                    }
                  });
                </script>

                  <!------------------------ Multiplayer Mode Modal --------------------------------->
                <div id="multiplayerModeModal" class="multiplayer-modal">
                  <div class="multiplayer-modal-content">
                    <span class="multiplayer-close" id="multiplayerCloseModal"><img src="../img/btnback.png" alt="Close Button"></span>
                    <button id="createMultiplayerBtn"  onclick="window.location.href='pvpCourse.php'" class="multiplayer-start-btn"><img src="../img/btncreate.png" alt="Close Button"></button>
                    <button id="joinMultiplayerBtn" class="multiplayer-start-btn"><img src="../img/btnjoin.png" alt="Close Button"></button>
                  </div>
                </div>

                <!-- JavaScript for Multiplayer Mode Modal -->
                <script>
                  const multiplayerModeImage = document.getElementById("multimodeImage");
                  const multiplayerModeModal = document.getElementById("multiplayerModeModal");
                  const multiplayerCloseModal = document.getElementById("multiplayerCloseModal");

                  // Open Multiplayer Mode Modal when clicking on the image
                  multiplayerModeImage.addEventListener("click", () => {
                    multiplayerModeModal.style.display = "block";
                  });

                  // Close Multiplayer Mode Modal when clicking on the close button
                  multiplayerCloseModal.addEventListener("click", () => {
                    multiplayerModeModal.style.display = "none";
                  });

                  // Close Multiplayer Mode Modal when clicking outside the modal
                  window.addEventListener("click", (event) => {
                    if (event.target === multiplayerModeModal) {
                      multiplayerModeModal.style.display = "none";
                    }
                  });
                </script>

                <!---------------------- Practice Mode Modal ------------------------------->
                <!-- <div id="practiceModeModal" class="practice-modal">
                  <div class="practice-modal-content">
                    <span class="practice-close" id="practiceCloseModal">&times;</span>
                    <h2>Practice Mode</h2>
                    <p>Welcome to Practice Mode! Personalize your game settings and start your challenge.</p>
                    <button id="startPracticeBtn" class="practice-start-btn">Start Game</button>
                  </div>
                </div> -->

                <!-- JavaScript for Practice Mode Modal -->
                <!-- <script>
                  const practiceModeImage = document.getElementById("practiceModeImage");
                  const practiceModeModal = document.getElementById("practiceModeModal");
                  const practiceCloseModal = document.getElementById("practiceCloseModal"); -->

                  <!-- // Open Practice Mode Modal when clicking on the image -->
                  <!-- practiceModeImage.addEventListener("click", () => {
                    practiceModeModal.style.display = "block";
                  }); -->

                  <!-- // Close Practice Mode Modal when clicking on the close button -->
                  <!-- practiceCloseModal.addEventListener("click", () => {
                    practiceModeModal.style.display = "none";
                  }); -->

                  <!-- // Close Practice Mode Modal when clicking outside the modal -->
                  <!-- window.addEventListener("click", (event) => {
                    if (event.target === practiceModeModal) {
                      practiceModeModal.style.display = "none";
                    }
                  }); -->
                <!-- </script> -->
                <!-- For Lobby Creation Design -->

                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script>
                      document.addEventListener("DOMContentLoaded", function () {
                          // Get the modal elements
                          const usersLobbyModal = document.getElementById("usersLobbyModal");
                          const createMultiplayerBtn = document.getElementById("createMultiplayerBtn");
                          const usersLobbyCloseModal = document.getElementById("usersLobbyCloseModal");
                          
                          // Ensure the modal is hidden when the page loads
                          usersLobbyModal.style.display = "none";
                      });
                    </script>

                  <!-- ---------------------------FOR CHOOSING/Joining LOBBY MODAL------------------------- -->
                  <div id="usersJoinModal" class="users-join-modal">
                  <div class="users-join-modal-content">
                    <span class="users-back-close" id="usersJoinCloseModal">
                        <img src="../img/btnback.png" alt="Close Button">
                    </span>
                    <!-- <h2 class="users-Join-title">Choose Lobby</h2> -->

                    <!-- User's List Table -->
                <table id = "lobby-list" class="users-join-table">

                </table>
                                      
                    <!-- Join Button -->
                <span class="users-join-btn" id="usersJoinBtn" style="display:none;">
                <img src="../img/btnjoin.png" alt="Join Button" onclick="window.location.href='../pvp/multiplayer.php'">
                </span>
                </div>
                  </div>
                    <!-- Open Join Modal -->
                  <script>
                    document.getElementById('joinMultiplayerBtn').addEventListener('click', async function() {
                      document.getElementById('multiplayerModeModal').style.display = 'none';
                      document.getElementById('usersJoinModal').style.display = 'flex';
                      try {
                      const response3 = await fetch("lobby_list.php", {
                      method: "POST"
                      });
                        $(document).ready (function(){
                          setInterval(function(){
                          $("#lobby-list").load("lobby_list.php");
                        }, 1000 );
                          $("#lobby-list").load("lobby_list.php");
                        })
                        const text = await response3.text(); // Read as plain text
                        console.log("Response from PHP:", text); // Log response for debugging     
                      } catch (error) {
                        console.error("Error:", error);
                        alert("An error occurred.");
                      }                  
                    });
                    
                    document.getElementById('usersJoinCloseModal').addEventListener('click', async function() {
                      document.getElementById('usersJoinModal').style.display = 'none';   
                    });

                    document.querySelectorAll('.join-lobby-row').forEach(row => {
                      row.addEventListener('click', function() {
                        document.querySelectorAll('.join-lobby-row').forEach(otherRow => {
                          otherRow.classList.remove('selected');
                        });
                        this.classList.add('selected');
                        document.getElementById('usersJoinBtn').style.display = 'block';
                      });
                    });
                  </script>

                  <!-- FULL SCREEN MODE -->
                   <script>
                    function goFullscreen() {
    if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
    }
}

document.addEventListener("DOMContentLoaded", function() {
    goFullscreen();
});
</script>
</body>
</html>