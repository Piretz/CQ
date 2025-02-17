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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="styles.css">
  <title>CoDev</title>
</head>
<body>

<audio id="bg-music" autoplay>
  <source src="../audio/Voice.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>

<div class="container">    
<button class="leave-button">
    <img src="../img/btnLeave.png" alt="Leave" onclick="window.location.href='../practicemode_carousel/practice_mode.php';">
</button>

  <div class="game-area">
    <!-- Team 1 -->
    <div class="team team-1">
      <div class="player-profiles">
        <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
          <img src="../img/jane.png" alt="Player 1" class="profile-img">
        </div>
      </div>
      <h2>Team 1</h2>
      <textarea class="code-input" id="team1-code" placeholder="Enter your code here..."></textarea>
      <div class="buttons">
        <button class="pass">PASS</button>
        <button class="run">RUN</button>
      </div>
      <div class="chat-box">
        <div class="chat-messages" id="team1-chat-messages"></div>
        <div class="chat-input-container">
            <input type="text" id="team1-chat-input" placeholder="Type a message...">
            <button onclick="sendMessage('team1')">
                <img src="../img/btnsend.png" alt="Send">
            </button>
        </div>
    </div>

    </div>

    <!-- Instruction Panel -->
    <div class="instruction-panel">
      <!-- Output -->
      <div class="column-1">
        <div class="output-box">
          <h3>OUTPUT:</h3>
          <div id="output-area">Change the background color into green</div>
        </div>
      </div>
      <!-- Instruction -->
      <div class="column-2">
        <div class="instruction-box">
          <h3>INSTRUCTION</h3>
          <div id="task-area"><p>Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green Change the background color into green</p></div>
        </div>
        
        <!-- Expected output-->
        <div class="expected-output-box">
          <h2>EXPECTED OUTPUT:</h2>
          <div id="expected-output-area">Change the background color into greenChange the background color into greenChange the background color into greenChange the background color into greenChange the background color into green</div>
        </div>  
      </div>
  
      <!-- Timer Panel -->
      <div class="timer-panel">
        <h3></h3>
        <div id="timer">02:00</div>
      </div>
      <!-- Scoreboard -->
      <div class="scoreboard">
        <div class="team-score">
          <div class="lives">
            <span class="score team-1-score">5pts</span>
            <img src="../img/pvpLives-5.png" class="life"> 
          </div>
        </div>

        <div class="vs-section">
          <img src="../img/joybee.png" class="joybee-img">
          <div class="vs">VS</div>
        </div>

        <div class="team-score">
          <div class="lives">
            <span class="score team-2-score">5pts</span>
            <img src="../img/pvpLives-5.png" class="life"> 
          </div>
        </div>
        <button id="openModal">VICTORY</button>
      </div>
    </div>

    <!-- Team 2 -->
    <div class="team team-2">
      <div class="player-profiles">
        <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
          <img src="../img/jane.png" alt="Player 1" class="profile-img">
        </div>
      </div>
      <h2>Team 2</h2>
      <textarea class="code-input" id="team2-code" placeholder="Enter your code here..."></textarea>
      <div class="buttons">
        <button class="pass">PASS</button>
        <button class="run">RUN</button>
      </div>
      <!-- Chat Box for Team 2 -->
      <div class="chat-box">
        <div class="chat-messages" id="team1-chat-messages"></div>
        <div class="chat-input-container">
            <input type="text" id="team2-chat-input" placeholder="Type a message...">
            <button onclick="sendMessage('team2')">
                <img src="../img/btnsend.png" alt="Send">
            </button>
        </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  let timerElement = document.getElementById("timer");
  let instructionPanel = document.querySelector(".instruction-panel");
  let timeLeft = 120; // 2 minutes in seconds

  function updateTimer() {
    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;
    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

    if (timeLeft > 0) {
      timeLeft--;
    } else {
      clearInterval(timerInterval);
      alert("Time's up!"); // You can replace this with any other action
    }
  }

  let timerInterval = setInterval(updateTimer, 1000);

  // Align timer to the bottom of the instruction panel
  instructionPanel.style.position = "relative";
  timerElement.style.backgroundImage = "url('../img/bgPanelTimer.png')";
  timerElement.style.backgroundSize = "contain";
  timerElement.style.backgroundRepeat = "no-repeat";
  timerElement.style.position = "absolute";
  timerElement.style.bottom = "24%";
  timerElement.style.left = "60%";
  timerElement.style.color = "#fff";
  timerElement.style.fontSize = "clamp(20px, 4vw, 40px)";
  timerElement.style.padding = "1rem";
  timerElement.style.width = "80%";
  timerElement.style.maxWidth = "300px";
  timerElement.style.textAlign = "center";
  timerElement.style.transform = "translateX(-50%)";
  instructionPanel.appendChild(timerElement);
});

function sendMessage(team) {
  const input = document.getElementById(`${team}-chat-input`);
  const messages = document.getElementById(`${team}-chat-messages`);
  const message = input.value.trim();

  if (message) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message');
    messageElement.textContent = message;
    messages.appendChild(messageElement);
    input.value = '';
    messages.scrollTop = messages.scrollHeight; // Scroll to the bottom

    // Remove the message after 2-3 seconds
    setTimeout(() => {
      messageElement.remove();
    }, 5000 + Math.random() * 1000); // Randomly between 2-3 seconds
  }
}
</script>

<script>
  window.onload = function() {
    let audio = document.getElementById("bg-music");
    audio.play().catch(error => {
      console.log("Autoplay failed due to browser restrictions: ", error);
    });
  };
</script>

<!-- Victory Modal Container -->
<div id="victoryModal" class="victory-modal">
        <div class="victorymodal-content">
            <!-- <span class="close" id="closeVictory">&times;</span> -->

            <div class="header">
                <h1>VICTORY</h1>
            </div>

            <!-- Player Stats Section -->
            <div class="player-info">         
                <div class="mvp">
                    <img src="../img/lebron.png" alt="MVP">
                    <h2>MVP</h2>
                    <p><strong>Time:</strong> 1 Min</p>
                    <p><strong>Error:</strong> 2</p>
                    <p><strong>Efficiency:</strong> 70%</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="buttons">
                <button class="exit" id="closeModal">Exit</button>
                <button class="play-again">Play Again</button>
            </div>
        </div>
    </div>

     <!-- VICTORY SCRIPT -->
      <script>
      // Get elements
      const modal = document.getElementById("victoryModal");
      const openModalBtn = document.getElementById("openModal");
      const closeModalBtn = document.getElementById("closeModal");
      const closeSpan = document.querySelector(".close");

      // Open modal when clicking the button
      openModalBtn.addEventListener("click", function () {
          modal.style.display = "flex"; // Ipakita ang modal
      });

      // Close modal when clicking "Exit" button
      closeModalBtn.addEventListener("click", function () {
          modal.style.display = "none"; // Itago ang modal
      });

      // Close modal when clicking the close icon (X)
      closeSpan.addEventListener("click", function () {
          modal.style.display = "none";
      });

      // Close modal when clicking outside the modal content
      window.addEventListener("click", function (event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      });

      </script>

</body>
</html>