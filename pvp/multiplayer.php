<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'>
  <link rel="stylesheet" href="styles.css">
  <title>CoDev</title>
</head>
<body>

<div class="container">    
        <div class="game-area">
            <!-- Team 1 -->
            <div class="team team-1">
                <div class="player-profiles">
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/jane.png" alt="Player 1" class="profile-img">
                    </div>
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/john.png" alt="Player 2" class="profile-img">
                    </div>
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/annette.png" alt="Player 3" class="profile-img">
                    </div>
                </div>
                <h2>Team 1</h2>
                <textarea class="code-input" id="team1-code" placeholder="Enter your code here..."></textarea>
                <div class="buttons">
                    <button class="pass">PASS</button>
                    <button class="run">RUN</button>
                </div>
            </div>

            <!-- Instruction Panel -->
            <div class="instruction-panel">
                <h3>INSTRUCTION</h3>
                <p>Debug the code:</p>
                <p><strong>Bonus XP:</strong> Change the background color into green</p>
                <div class="output-preview">
                    <!-- Example of the output preview image -->
                    <p>Output:</p>
                    <img src="../img/bgGreen.png" alt="Green Background Preview" class="output-img">
                </div>
                <div class="scoreboard">
                    <div class="score team-1-score">9pts</div>
                    <div class="vs">VS</div>
                    <div class="score team-2-score">6pts</div>
                </div>
            </div>

            <!-- Team 2 -->
            <div class="team team-2">
                <div class="player-profiles">
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/jane.png" alt="Player 1" class="profile-img">
                    </div>
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/john.png" alt="Player 2" class="profile-img">
                    </div>
                    <div class="profile" style="background-image: url('../img/bgUnactivePlay.png');">
                        <img src="../img/annette.png" alt="Player 3" class="profile-img">
                    </div>
                </div>
                <h2>Team 2</h2>
                <textarea class="code-input" id="team2-code" placeholder="Enter your code here..."></textarea>
                <div class="buttons">
                    <button class="pass">PASS</button>
                    <button class="run">RUN</button>
                </div>
            </div>
        </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const runButtons = document.querySelectorAll(".run");

        runButtons.forEach((button, index) => {
            button.addEventListener("click", function() {
                let code;
                if (index === 0) {
                    code = document.getElementById("team1-code").value;
                } else {
                    code = document.getElementById("team2-code").value;
                }

                try {
                    eval(code); // ⚠️ Note: Gamitin ito nang may pag-iingat (sandboxing is recommended)
                    alert("Code executed successfully!");
                } catch (error) {
                    alert("Error: " + error.message);
                }
            });
        });
    });
</script>

</body>
</html>
