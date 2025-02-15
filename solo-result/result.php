<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CoDev - Solo Result</title>
</head>
<body>

    <!-- Solo Result - Level Completed -->
    <div class="solo-result-panel-completed">
        <div class="solo-result-content-completed">
            <h2 class="solo-result-completed">LEVEL COMPLETED!</h2>
            <p class="title">Code Wizards</p>
            <!-- Rewards Section -->
            <div class="rewards-section">
                <div class="progress-container">
                    <label>Rank:</label>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 70%;"></div>
                    </div>
                    <span>+10</span>
                </div>

                <div class="progress-container">
                    <label>Level:</label>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 80%;"></div>
                    </div>
                    <span>+1</span>
                </div>

                <div class="progress-container">
                    <label>Energy:</label>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 90%;"></div>
                    </div>
                    <span>+20</span>
                </div>

                <div class="badge-container">
                    <label></label>
                    <img src="../img/diamond.png" class="badge-image">
                    <img src="../img/diamond.png" class="badge-image">
                    <img src="../img/diamond.png" class="badge-image">
                    <img src="../img/diamond.png" class="badge-image">
                </div>
            </div>

            
        </div>
        <!-- Buttons -->
        <div class="solo-result-buttons-completed">
            <button class="btn-solo-exit">Exit</button>
            <button class="btn-solo-nextlevel">Next Level</button>
        </div>
    </div>

    <!-- Solo Result - Level Failed -->
    <div class="solo-result-panel-failed">
        <div class="solo-result-content-failed">
            <h2 class="solo-result-failed">LEVEL FAILED!</h2>
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
                    <label>Level</label>
                    <div class="progress-bar">
                        <div class="progress-fill failed" style="width: 60%;"></div>
                    </div>
                    <span>-1</span>
                </div>

                <div class="progress-container">
                    <label>Energy:</label>
                    <div class="progress-bar">
                        <div class="progress-fill failed" style="width: 60%;"></div>
                    </div>
                    <span>-15</span>
                </div>
            </div>

           
           
        </div>
         <!-- Buttons -->
        <div class="solo-result-buttons-failed">
            <button class="btn-solo-exit">Exit</button>
            <button class="btn-solo-retry">Retry</button>
        </div>
    </div>

</body>
</html>
