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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</body>
</html>
