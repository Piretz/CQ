<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
}
$team = $_SESSION['team'];

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
<style>
    .disabled-team {
        opacity: 0.5; /* Dim the inactive team */
        pointer-events: none; /* Prevent clicking */
    }

    .team-container {
        display: flex;
        justify-content: space-between;
    }

    .team-1-ui, .team-2-ui {
        width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        background: #f9f9f9;
    }

    textarea {
        width: 100%;
        height: 100px;
        margin-bottom: 10px;
    }
</style>
<body>

<div class="container">    
  <div class="game-area">
    <!-- Team 1 -->
    <div  id="team1-ui" class="team team-1">
      <div class="player-profiles">
        <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
          <img src="../img/jane.png" alt="Player 1" class="profile-img">
        </div>
      </div>
      <h2>Team 1</h2>
      <textarea class="code-input" id="team1-code" placeholder="Enter your code here..."></textarea>
      <div id="team1-button" class="buttons">
        <button id="team1-pass" class="pass">PASS</button>
        <button id="team1-run" class="run">RUN</button>
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
        <div id="output" class="output-box">
        <h3>OUTPUT:</h3>
          <div id="output-area">Change the background color into green</div>
        </div>
      </div>
      <!-- Instruction -->
      <div class="column-2">
        <div class="instruction-box">
          <h3>INSTRUCTION</h3>
          <div id="task-area"><p>Change the background color into green</p></div>
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
            <span class="score team-1-score">0pts</span>
            <img src="../img/pvpLives-0.png" class="life" id="team-1-life"> 
          </div>
        </div>

        <div class="vs-section">
          <img src="../img/joybee.png" class="joybee-img">
          <div class="vs">VS</div>
        </div>

        <div class="team-score">
          <div class="lives">
            <span class="score team-2-score">0pts</span>
            <img src="../img/pvpLives-0.png" class="life" id="team-2-life"> 
          </div>
        </div>
      </div>
    </div>

    <!-- Team 2 -->
    <div id="team2-ui" class="team team-2">
      <div class="player-profiles">
        <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
          <img src="../img/jane.png" alt="Player 1" class="profile-img">
        </div>
      </div>
      <h2>Team 2</h2>
      <textarea class="code-input" id="team2-code" placeholder="Enter your code here..."></textarea>
      <div id="team2-button" class="buttons">
        <button id="team2-pass" class="pass">PASS</button>
        <button id="team2-run" class="run">RUN</button>
      </div>
      <!-- Chat Box for Team 2 -->
      <div class="chat-box">
        <div class="chat-messages" id="team2-chat-messages"></div>
        <div class="chat-input-container">
            <input type="text" id="team2-chat-input" placeholder="Type a message...">
            <button onclick="sendMessage('team2')">
                <img src="../img/btnsend.png" alt="Send">
            </button>
        </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
/**
 * NOTE: Indent must be fix this creates visual hierarchy which means that any dev. can traverse the code easily ( see Uncle Bob - CLEAN CODE book )
 * */ 

// NOTE: Use let or Const avoid old implement of var for variable declaration as this will implement bugs
let scoreInterval;
let playerInCurrTeam;
let currentPlayerTurnId;

let team1MessagesLength = 0;
let team2MessagesLength = 0;

const currentTeam = "<?php echo $team; ?>";
const currentPlayerInScreen =  "<?php echo $id; ?>";

const btnTeam1CodeView = document.querySelector("#team1-code");
const btnTeam2CodeView = document.querySelector("#team2-code");

const btnTeam1Pass = document.querySelector("#team1-pass");
const btnTeam1Run = document.querySelector("#team1-run");

const btnTeam2Pass = document.querySelector("#team2-pass");
const btnTeam2Run = document.querySelector("#team2-run");

const team1Msgs = document.querySelector(`#team1-chat-messages`);
const team2Msgs = document.querySelector(`#team2-chat-messages`);

/**
 * Event listeners
 */

document.addEventListener("DOMContentLoaded", function () {
        let userTeam = "<?php echo $team; ?>"; // Get the team from PHP

        if (userTeam === "Left") {
            document.querySelectorAll("#team2-ui button, #team2-ui textarea").forEach(el => el.disabled = true);
            document.getElementById("team2-ui").classList.add("disabled-team");
        } else if (userTeam === "Right") {
            document.querySelectorAll("#team1-ui button, #team1-ui textarea").forEach(el => el.disabled = true);
            document.getElementById("team1-ui").classList.add("disabled-team");
        }
    });

  document.addEventListener("DOMContentLoaded", function() {
              let timerElement = document.getElementById("timer");
              let instructionPanel = document.querySelector(".instruction-panel");
              let defaultTime = 121; // 2 minutes in seconds
              let timeLeft = defaultTime;
              let timerInterval;

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

  function loadNewQuestion() {
      $.ajax({
          url: 'fetch_new_question.php',  // Your updated PHP endpoint
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              if (response.success) {
                  // Update the UI with the new question
                  $("#output-area").text(response.Given_Code);
                  $("#task-area p").text(response.Task);
                  $("#expected-output-area").text(response.Display);

                  // Update currentQuestionId for the next round
                  currentQuestionId = response.Level_Id;
              } else {
                  console.error("Error fetching new question:", response.error);
              }
          },
          error: function(xhr, status, error) {
              console.error("Error fetching new question:", error);
          }
  });

}

function initTurnAndUpdateUI() {
    console.log("initTurnAndUpdateUI");

    $.ajax({
        url: 'initial_turn.php',  // File to get the current turn for each team
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data?.error) {
                console.error(data.error);
                return;
            }

            // Get the current turn (1, 2, or 3) for the team
            currentPlayerTurnId = data?.current_turn_player_id;

            playerInCurrTeam = data?.team_turns?.length;

            /**
             * 
             * Multiple member in Team
             * 
             * 
             */
            userScreenUpdate(currentPlayerTurnId);
        },
        error: function(xhr, status, error) {
            console.error("Error checking turn:", error);
        }
    });
}

function userScreenUpdate(currentPlayerTurnId){

    console.log(currentPlayerTurnId, currentPlayerInScreen, currentTeam);

     /**
     * HIDE the "pass" btn if player is only one in team it 
     * doesn't make sense showing a pass button if you don't have someone from your team
     */
          
      if(playerInCurrTeam === 1 && currentTeam === "Left"){
        btnTeam1Pass.style.display = 'none';
        return;
      }
          
      if(playerInCurrTeam === 1 && currentTeam === "Right"){
        btnTeam2Pass.style.display =  'none';
        return;
      }

     /**
      *
      * TEAM 1
      * 
     */

    // Hide buttons if the player's not in 
    if(currentTeam === "Left"){
      if (Number(currentPlayerTurnId) !== Number(currentPlayerInScreen)) {
        btnTeam1Pass.style.display = 'none';
        btnTeam1Run.style.display = 'none';
        btnTeam1CodeView.value = "";
        btnTeam1CodeView.placeholder = "Teammate currently answering..."

        btnTeam1CodeView.setAttribute('disabled', "");
        return;
      }

      // Enable the buttons
      if (Number(currentPlayerTurnId) === Number(currentPlayerInScreen)) {
        btnTeam1Pass.style.display = 'block';
        btnTeam1Run.style.display = 'block';
        btnTeam1CodeView.placeholder = "Enter your code here..."

        btnTeam1CodeView?.removeAttribute('disabled');
        return;
      }
    }

    /**
     * 
     * Team 2
     * 
     */

    if(currentTeam === "Right"){
      if (Number(currentPlayerTurnId) !== Number(currentPlayerInScreen)) {
        btnTeam2Pass.style.display = 'none';
        btnTeam2Run.style.display = 'none';
        btnTeam2CodeView.value = "";
        btnTeam2CodeView.placeholder = "Teammate currently answering..."

        btnTeam2CodeView?.setAttribute('disabled', "");
        return;
      }

      // Enable button if player turn
      if (Number(currentPlayerTurnId) === Number(currentPlayerInScreen)) {
        btnTeam2Pass.style.display = 'block';
        btnTeam2Run.style.display = 'block';
        btnTeam2CodeView.placeholder = "Enter your code here..."

        btnTeam2CodeView?.removeAttribute('disabled');
        return;
      }
    }
}

// Run the turn checking function periodically or when needed
initTurnAndUpdateUI();

function pollSync() {
    $.ajax({
        url: 'poll_sync.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log("Server Response:", data); // Debugging log

            $(".team-1-score").text(data.team1 + "pts");
            $(".team-2-score").text(data.team2 + "pts");

            // Update images
            $("#team-1-life").attr("src", `../img/pvpLives-${data.team1}.png`);
            $("#team-2-life").attr("src", `../img/pvpLives-${data.team2}.png`);

            // Use the user's team directly from the response
            let userTeam = data.user_team;

            if(currentTeam === "Left"){
              userScreenUpdate(data?.team1_current_player);
              
              // Do not update message UI
              const team_msgs = data?.team1_messages.length || 0;
              if(team_msgs !== team1MessagesLength){
                team1MessagesLength = team_msgs;

                // Remove element first to prevent duplicate
                document.querySelector(".team1-msg-container")?.remove();
                team1Msgs.insertAdjacentHTML("beforeend", `<div class="team1-msg-container" style="display: flex; flex-direction: column;"></div>`)

                // Then insert
                data?.team1_messages?.forEach(({ message, first_name }) => {
                  document.querySelector(".team1-msg-container").insertAdjacentHTML("afterbegin", `<div>${first_name} : ${message}</div>`)
                })

                // Scroll to top
                team1Msgs.scrollTop = 0;
              }
            };

            if(currentTeam === "Right"){
              userScreenUpdate(data?.team2_current_player); 

              // Do not update message UI
              const team_msgs = data?.team2_messages.length || 0;
              
              if(team_msgs !== team2MessagesLength){
                team2MessagesLength = team_msgs;
                console.log(team_msgs, team2MessagesLength, "TEAM 2");
                
                // Remove element first to prevent duplicate
                document.querySelector(".team2-msg-container")?.remove();
                team2Msgs.insertAdjacentHTML("beforeend", `<div class="team2-msg-container" style="display: flex; flex-direction: column;"></div>`)

                // Then insert
                data?.team2_messages?.forEach(({ message, first_name }) => {
                  document.querySelector(".team2-msg-container").insertAdjacentHTML("afterbegin", `<div>${first_name} : ${message}</div>`)
                })

                // Reset view to top
                team2Msgs.scrollTop = 0;
              }
            };

            // Check if any team reached 10 points
            if (data.team1 >= 10) {
                declareWinner("Left", userTeam);
            } else if (data.team2 >= 10) {
                declareWinner("Right", userTeam);
            }
        }
    });
}

function declareWinner(winningTeam, userTeam) {
    clearInterval(scoreInterval); // Stop fetching scores after a winner is decided

    console.log("Declaring winner:", winningTeam, "User Team:", userTeam); // Debugging log
    if (userTeam === winningTeam) {
        console.log("Redirecting to victory.php"); // Debugging log
        window.location.href = "victory.php";
    } else {
        console.log("Redirecting to defeat.php"); // Debugging log
        window.location.href = "defeat.php";
    }
}

function startTimer() {
    clearInterval(timerInterval); // Clear existing timer
    timeLeft = defaultTime; // Reset time to default
    
    updateTimer(); // Immediately update UI
    timerInterval = setInterval(updateTimer, 1000); // Restart timer
}

setInterval(loadNewQuestion, 1000);
setInterval(pollSync, 1000);
        
// Start timer when the page loads
startTimer();
loadNewQuestion();

//configure for team 1
btnTeam1Run.addEventListener("click", function() {

    let userAnswer = $("#team1-code").val().trim();
    let scoreElement = document.querySelector(".team-1-score");
    let currentScore = parseInt(scoreElement.textContent) || 0;
    let timerElement = document.getElementById("timer");
    let submitButton = document.getElementById("team1-run");
    let textArea = document.getElementById("team1-code");
    let lifeImage = document.getElementById("team-1-life");

    if (!userAnswer) {
        alert("Please enter your code!");
        return;
    }

    $.ajax({
        url: 'check_answer.php',  // Your backend PHP script to validate answer
        type: 'POST',
        data: { answer: userAnswer, question_id: currentQuestionId },
        dataType: 'json',
        success: function(response) {
            console.log("Server Response:", response); // Debugging log

            if (response.error) {
                alert("Error: " + response.error);
                return;
            }

            if (response.status === "Correct") {
                let newScore = Math.min(currentScore + 1, 10);
                scoreElement.textContent = newScore + "pts";
                lifeImage.src = `../img/pvpLives-${newScore}.png`;

                if (newScore === 10) {
                    alert("🎉 YOU WIN! 🎉");

                    clearInterval(timerInterval);  // Assuming you have a timer running
                    timerElement.textContent = "00:00";

                    submitButton.disabled = true;
                    textArea.disabled = true;

                } else {
                    setTimeout(() => {
                        // Reset input area for the next question
                        $("#team1-code").val("");
                        // Fetch and display the next question for the team
                        loadNewQuestion();  // Call to load new question after correct answer
                    }, 1000);
                }
            } else {
                alert("❌ Wrong! The correct answer is: " + response.correct_answer);
            }

            passTurn();
        }
    });

    startTimer();  // Assuming your timer is handled elsewhere
});

btnTeam1Pass.addEventListener("click", passTurn);

//configure for team 2
btnTeam2Run.addEventListener("click", function() {
              let userAnswer = $("#team2-code").val().trim();
              let scoreElement = document.querySelector(".team-2-score");
              let currentScore = parseInt(scoreElement.textContent) || 0;
              let timerElement = document.getElementById("timer");
              let submitButton = document.getElementById("team2-run");
              let textArea = document.getElementById("team2-code");
              let lifeImage = document.getElementById("team-2-life");

              if (!userAnswer) {
                  alert("Please enter your code!");
                  return;
              }
              
              $.ajax({
                url: 'check_answer.php',
                type: 'POST',
                data: { answer: userAnswer, question_id: currentQuestionId },
                dataType: 'json',
                success: function(response) {
                  console.log("Server Response:", response); // Debugging log

                  if (response.error) {
                      alert("Error: " + response.error);
                      return;
                  }

                  if (response.status === "Correct") {
                    let newScore = Math.min(currentScore + 1, 10);
                    scoreElement.textContent = newScore + "pts";
                    lifeImage.src = `../img/pvpLives-${newScore}.png`;

                    if (newScore === 10) {
                      alert("🎉 YOU WIN! 🎉");
                      
                      clearInterval(timerInterval);
                      timerElement.textContent = "00:00";

                      submitButton.disabled = true;
                      textArea.disabled = true;

                    } else {
                        setTimeout(() => {
                            $("#team2-code").val("");
                            loadNewQuestion();
                        }, 1000);
                    }
                }  else {
                  alert("❌ Wrong! The correct answer is: " + response.correct_answer);
                }

                passTurn();
              }
              })
                startTimer();
            });

            // Align timer to the bottom of the instruction panel
            instructionPanel.style.position = "relative";
            timerElement.style.backgroundImage = "url('../img/bgPanelTimer.png')";
            timerElement.style.backgroundSize = "contain";
            timerElement.style.backgroundRepeat = "no-repeat";
            timerElement.style.position = "absolute";
            timerElement.style.bottom = "34%";
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

btnTeam2Pass.addEventListener("click", passTurn);

function passTurn() {
  $.ajax({
        url: 'pass_turn.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log("Current team pass");
        }
    });
}

// Send Message
function sendMessage(team) {
  const input = document.getElementById(`${team}-chat-input`);
  const message = input.value.trim();

  if (message) {
    input.value = "";

    $.ajax({
        url: 'send_message.php',
        type: 'POST',
        data: { message, team: currentTeam },
        dataType: 'json',
        success: function(response) {
          console.log("Successfully Post message");
        },
    });

    // HIDE after sending message
    setTimeout(() => {
      document.querySelector(`.${team}-msg-container`).style.display = "0";
    }, 1000)
  }
}
</script>

<script>
  window.onload = function() {
    let audio = document.getElementById("bg-music");
    audio?.play()?.catch(error => {
      console.log("Autoplay failed due to browser restrictions: ", error);
    });
  };
</script>

<script src="button.js"></script>

</body>
</html>