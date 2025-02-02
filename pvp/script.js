
    document.addEventListener("DOMContentLoaded", function() {
        let currentPlayerTeam1 = 0;
        let currentPlayerTeam2 = 0;
        let playersTeam1 = document.querySelectorAll(".team-1 .profile");
        let playersTeam2 = document.querySelectorAll(".team-2 .profile");
        let passButtons = document.querySelectorAll(".pass");
        let runButtons = document.querySelectorAll(".run");
        let team1Score = document.querySelector(".team-1-score");
        let team2Score = document.querySelector(".team-2-score");
        let scoreTeam1 = 5;
        let scoreTeam2 = 5;
        let timerDisplay = document.createElement("div");
        let timeLeft = 10;
        timerDisplay.className = "timer";
        timerDisplay.style.background = "linear-gradient(to bottom, #FCAE00, #FCAE00, #F0A600, #EDA300, #966800)";
        timerDisplay.style.padding = "8px";
        timerDisplay.style.fontSize = "24px";
        timerDisplay.style.fontWeight = "bold";
        timerDisplay.style.color = "#fff";
        timerDisplay.style.textAlign = "center";
        timerDisplay.style.borderRadius = "8px"
        timerDisplay.style.position = "absolute"; // Make the timer absolute
        timerDisplay.style.top = "-60px"; // Align it to the top of the instruction panel
        timerDisplay.style.left = "50%"; // Center horizontally
        timerDisplay.style.transform = "translateX(-50%)"; // Adjust the centering
        document.querySelector(".instruction-panel").prepend(timerDisplay); // Prepend to instruction panel

        // Modal elements
        const modal = document.getElementById("resultModal");
        const resultMessage = document.getElementById("resultMessage");
        const closeModal = document.querySelector(".close");

        function updateTimer() {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            timerDisplay.textContent = `Time Left: ${minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
            
            if (timeLeft > 0) {
                timeLeft--;
                setTimeout(updateTimer, 1000);
            } else {
                disableControls();  // Disable controls when time runs out
                determineWinner();
            }
        }

        function disableControls() {
            passButtons.forEach(button => button.disabled = true);
            runButtons.forEach(button => button.disabled = true);
            document.querySelectorAll(".code-input").forEach(input => input.disabled = true); // Disable code input
        }
        
        function determineWinner() {
            if (scoreTeam1 > scoreTeam2) {
                resultMessage.textContent = "Team 1 Wins!";
            } else if (scoreTeam2 > scoreTeam1) {
                resultMessage.textContent = "Team 2 Wins!";
            } else {
                resultMessage.textContent = "It's a Tie!";
            }
            modal.style.display = "block";
        }

        function updateActivePlayer(team, currentIndex, players) {
            players.forEach((player, index) => {
                player.style.border = index === currentIndex ? "3px solid yellow" : "none";
            });
        }

        function passTurn(team) {
            if (team === 1) {
                currentPlayerTeam1 = (currentPlayerTeam1 + 1) % playersTeam1.length;
                updateActivePlayer(1, currentPlayerTeam1, playersTeam1);
            } else {
                currentPlayerTeam2 = (currentPlayerTeam2 + 1) % playersTeam2.length;
                updateActivePlayer(2, currentPlayerTeam2, playersTeam2);
            }
        }

        function runCode(team) {
            let codeInput = team === 1 ? document.getElementById("team1-code").value.trim() : document.getElementById("team2-code").value.trim();
            let outputArea = document.getElementById("output-area");

            let scoreChangeElement;

            if (codeInput.toLowerCase().includes("background-color: green")) {
                if (team === 1) {
                    scoreTeam1++;
                    team1Score.textContent = scoreTeam1 + "pts";
                    // Create and animate the +1 for Team 1
                    scoreChangeElement = document.createElement("div");
                    scoreChangeElement.classList.add("floating-score");
                    scoreChangeElement.textContent = "+1";
                    team1Score.appendChild(scoreChangeElement);
                } else {
                    scoreTeam2++;
                    team2Score.textContent = scoreTeam2 + "pts";
                    // Create and animate the +1 for Team 2
                    scoreChangeElement = document.createElement("div");
                    scoreChangeElement.classList.add("floating-score");
                    scoreChangeElement.textContent = "+1";
                    team2Score.appendChild(scoreChangeElement);
                }

                // Update the output preview area to show green background
                outputArea.style.backgroundColor = "green";
            } else {
                if (team === 1) {
                    scoreTeam1--;
                    team1Score.textContent = scoreTeam1 + "pts";
                    // Create and animate the -1 for Team 1
                    scoreChangeElement = document.createElement("div");
                    scoreChangeElement.classList.add("floating-score", "floating-minus");
                    scoreChangeElement.textContent = "-1";
                    team1Score.appendChild(scoreChangeElement);
                } else {
                    scoreTeam2--;
                    team2Score.textContent = scoreTeam2 + "pts";
                    // Create and animate the -1 for Team 2
                    scoreChangeElement = document.createElement("div");
                    scoreChangeElement.classList.add("floating-score", "floating-minus");
                    scoreChangeElement.textContent = "-1";
                    team2Score.appendChild(scoreChangeElement);
                }

                // Reset the output preview area to white
                outputArea.style.backgroundColor = "#fff";
            }

            // Remove the floating score after animation ends
            setTimeout(() => {
                if (scoreChangeElement) {
                    scoreChangeElement.remove();
                }
            }, 1000); // Matches the duration of the animation
        }

        // Modal close event
        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        passButtons.forEach((button, index) => {
            button.addEventListener("click", function() {
                passTurn(index + 1);
            });
        });
        
        runButtons.forEach((button, index) => {
            button.addEventListener("click", function() {
                runCode(index + 1);
            });
        });
        
        updateActivePlayer(1, currentPlayerTeam1, playersTeam1);
        updateActivePlayer(2, currentPlayerTeam2, playersTeam2);
        
        updateTimer();
    });

