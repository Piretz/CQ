<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
  exit();
}
$level_id = $_GET['level'];
$_SESSION['level_id'] = $level_id;

$query = "SELECT * FROM Solo_Level WHERE Level_Id = $level_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$next_level = $level_id + 1;

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
  <link rel="stylesheet" href="styles.css">
  <title>CoDev</title>
</head>
<body>
    <div class="game-container">
      <div class="level-title">
    <h2>Level - <?php echo $row['Level_Id'] ?></h2>
    </div>
      <div class="top-bar">
        <div class="hint-btn"></div>
        <div  onclick="window.location.href='../selectmode/mode.php'" class="leave-btn"></div>
      </div>

      <div class="task-output-container">
  
    <!-- Task Panel Box -->
    <div class="task-panel">
        <p><?php echo $row['Task'] ?></p>
        <pre><?php echo htmlspecialchars($row['Given_Code']) ?></pre>
        <form method="POST">
          <input type="text" id="anwser" name="asnwer" placeholder="Enter Answer" required>
          <button class="submit-btn" id="check-answer">Turn in</button>
        </form>
        <!-- <button class="open-modal-btn" id="openCompleted">Level Completed</button>
        <button class="open-modal-btn" id="openFailed">Level Failed</button> -->
      </div>

        <!-- Output Container (Stacked Expected Output & Output Box) -->
        <div class="output-container">
          
                <!-- Lives -->
                <div class="lives">
                  <!-- <img src="../img/0-lives.png" alt="lives Icon" class="lives-icon"> -->
                  <!-- <img src="../img/1-lives.png" alt="lives Icon" class="lives-icon"> -->
                  <!-- <img src="../img/2-lives.png" alt="lives Icon" class="lives-icon"> -->
                  <!-- <img src="../img/3-lives.png" alt="lives Icon" class="lives-icon"> -->
                  <!-- <img src="../img/4-lives.png" alt="lives Icon" class="lives-icon"> -->
                  <img id="life-image" src="../img/5-lives.png" alt="lives Icon" class="lives-icon">
                  </div>
                <!-- Expected Output Box -->
                <div class="expected-output-box">
                  <strong>Expected Output:</strong>
                  <p><?php echo $row['Display'] ?></p>
                </div>
                
                <!-- Output Box -->
                <div class="output-box">
                  <strong>Output:</strong>
                  <p id="result"></p>
                </div>

        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        function level(){
            $.ajax({
                url: 'level-up.php',
                type: 'GET',
                dataType: 'json',
                success: function(respnse) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

      $(document).ready(function() {
          $("#check-answer").click(function() {
            event.preventDefault();
              var userAnswer = $("#anwser").val();
              console.log("User Answer: " + userAnswer); // Debugging

              $.ajax({
                  url: "check_answer.php",
                  type: "POST",
                  data: { answer: userAnswer },
                  success: function(response) {
                    console.log("✅ Server Response:", response);

                    $("#result").html(response); // Show result text

                    if (response.trim() === "Incorrect! Try again.") {

                        var currentImage = $("#life-image").attr("src");
                        var match = currentImage.match(/(\d+)-lives\.png/);

                        if (match) {
                              var currentLife = parseInt(match[1]);

                          if (currentLife > 0) {
                              var newLife = currentLife - 1;
                              var newLifeImage = "../img/" + newLife + "-lives.png";

                              $("#life-image").attr("src", newLifeImage);
                              if (newLife === 0) {
                                  // Game over: Show message & disable input/button
                                  $("#result").html("❌ Game Over! Better luck next time.");
                                  $("#answer").prop("readonly", true); // Prevent typing
                                  $("#check-answer").prop("disabled", true).css("cursor", "not-allowed");
                              }
                            }
                        }
                    } else {
                        var completedModal = document.getElementById("levelCompletedModal");
                        level();
                        completedModal.style.display = "flex";
                    }
                  },
                  error: function(xhr, status, error) {
                      console.error("AJAX Error:", error); // Debugging
                      $("#result").text("Error checking answer.");
                  }
              });
          });
      });
      </script>

      <!-- Level Completed Modal -->
      <div id="levelCompletedModal" class="modal">
          <div class="modal-content">
          <div class="completed-container">
              <!-- <span class="close" id="closeCompleted">&times;</span> -->
              <h2 class="title-result">LEVEL COMPLETED!</h2>
              <p class="title">Code Wizards</p>
              <!-- Rewards Section -->
              <div class="rewards-section">
                  <div class="progress-container">
                      <label>Level Reward:</label>
                      <span><?php echo $row['Reward']?> EXP</span>
                  </div>

              </div>
              
              <!-- Buttons -->
              <div class="solo-result-buttons">
                  <button class="btn-solo-exit" id="closeCompleted">Exit</button>
                  <button class="btn-solo-nextlevel" onclick="window.location.href='levels.php?level=<?php echo $next_level ?>'">Next Level</button>
              </div>
            </div>
          </div>
      </div>

      <!-- Level Failed Modal -->
      <div id="levelFailedModal" class="modal">
          <div class="modal-content">
            <div class="failed-container">
              <!-- <span class="close" id="closeFailed">&times;</span> -->
              <h2 class="title-result">LEVEL FAILED!</h2>
              <p class="title">Code Wizards</p>
              <!-- Penalties Section -->
              <div class="rewards-section">
                  <div class="progress-container">
                      <label>Rank:</label>
                      <div class="progress-bar">
                          <div class="progress-fill failed" style="width: 50%;"></div>
                      </div>
                      <span>-5</span>
                  </div>

                  <div class="progress-container">
                      <label>Level:</label>
                      <div class="progress-bar">
                          <div class="progress-fill failed" style="width: 60%;"></div>
                      </div>
                      <span></span>
                  </div>
              </div>

              <!-- Buttons -->
              <div class="solo-result-buttons">
                  <button class="btn-solo-exit" id="closeFailed">Exit</button>
                  <button class="btn-solo-retry">Retry</button>
              </div>
           </div>
          </div>
      </div>


      <script>
      document.addEventListener("DOMContentLoaded", function() {
          // Get modals
          var completedModal = document.getElementById("levelCompletedModal");
          var failedModal = document.getElementById("levelFailedModal");

          // Get buttons to open modals
          var openCompletedBtn = document.getElementById("openCompleted");
          var openFailedBtn = document.getElementById("openFailed");

          // Get close buttons
          var closeCompletedBtn = document.getElementById("closeCompleted");
          var closeFailedBtn = document.getElementById("closeFailed");

          // Open Completed Modal
          openCompletedBtn.addEventListener("click", function() {
              completedModal.style.display = "flex";
          });

          // Open Failed Modal
          openFailedBtn.addEventListener("click", function() {
              failedModal.style.display = "flex";
          });

          // Close Completed Modal
          closeCompletedBtn.addEventListener("click", function() {
              completedModal.style.display = "none";
          });

          // Close Failed Modal
          closeFailedBtn.addEventListener("click", function() {
              failedModal.style.display = "none";
          });

          // Close Modal if user clicks outside content
          window.addEventListener("click", function(event) {
              if (event.target == completedModal) {
                  completedModal.style.display = "none";
              }
              if (event.target == failedModal) {
                  failedModal.style.display = "none";
              }
          });
      });
    </script>


</body>
</html>
