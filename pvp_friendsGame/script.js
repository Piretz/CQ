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
    let timeLeft = 120;
    let currentTaskIndex = 0;
    let team1TasksCompleted = 0;
    let team2TasksCompleted = 0;
    let gameOver = false; // To track if the game is over

    const taskInstructions = [
        "Debug the code: Change the background color into green",
        "Debug the code: Change the background color to blue",
        "Debug the code: Add a border around the box",
        "Debug the code: Change the text color to red",
        "Debug the code: Increase the width of the box to 200px"
    ];

    timerDisplay.className = "timer";
    timerDisplay.style.backgroundColor = "#011F2B";
    timerDisplay.style.border = "2px solid #fff";
    timerDisplay.style.padding = "8px";
    timerDisplay.style.fontSize = "24px";
    timerDisplay.style.color = "#fff";
    timerDisplay.style.textAlign = "center";
    timerDisplay.style.borderRadius = "8px";
    timerDisplay.style.position = "absolute";
    timerDisplay.style.top = "-60px";
    timerDisplay.style.left = "50%";
    timerDisplay.style.transform = "translateX(-50%)";
    document.querySelector(".instruction-panel").prepend(timerDisplay);

    const modal = document.getElementById("resultModal");
    const resultMessage = document.getElementById("resultMessage");
    const closeModal = document.querySelector(".close");

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        timerDisplay.textContent = ` ${minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
        
        if (timeLeft > 0 && !gameOver) {
            timeLeft--;
            setTimeout(updateTimer, 1000);
        } else if (!gameOver) {
            disableControls();
            checkWinner(); // Check for winner if time runs out
        }
    }

    function disableControls() {
        passButtons.forEach(button => button.disabled = true);
        runButtons.forEach(button => button.disabled = true);
        document.querySelectorAll(".code-input").forEach(input => input.disabled = true);
    }

    function showWinnerModal(team) {
        resultMessage.textContent = `Congratulations! Team ${team} has won!`;
        modal.style.display = "block";
        gameOver = true; // Set gameOver to true to prevent further actions
    }

    function checkWinner() {
        if (team1TasksCompleted === taskInstructions.length) {
            showWinnerModal(1);
        } else if (team2TasksCompleted === taskInstructions.length) {
            showWinnerModal(2);
        }
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

    function checkElimination() {
        if (scoreTeam1 <= 0) {
            resultMessage.textContent = "Your Team has been eliminated! Team 2 has won!";
            modal.style.display = "block";
            disableTeam(1);
            gameOver = true;
        } else if (scoreTeam2 <= 0) {
            resultMessage.textContent = "Your Team has been eliminated! Team 1 has won!";
            modal.style.display = "block";
            disableTeam(2);
            gameOver = true;
        }
    }
    
    function disableTeam(team) {
        if (team === 1) {
            document.getElementById("team1-code").disabled = true;
            document.querySelector(".team-1 .pass").disabled = true;
            document.querySelector(".team-1 .run").disabled = true;
        } else {
            document.getElementById("team2-code").disabled = true;
            document.querySelector(".team-2 .pass").disabled = true;
            document.querySelector(".team-2 .run").disabled = true;
        }
    }

    function runCode(team) {
        if (gameOver) return; // Prevent running code if game is over

        let codeInput = team === 1 ? document.getElementById("team1-code").value.trim() : document.getElementById("team2-code").value.trim();
        let outputArea = document.getElementById("output-area");

        let scoreChangeElement;

        // Check if the user input matches the current task
        if (checkCorrectTask(codeInput)) {
            if (team === 1) {
                scoreTeam1++;
                team1Score.textContent = scoreTeam1 + "pts";
                scoreChangeElement = document.createElement("div");
                scoreChangeElement.classList.add("floating-score");
                scoreChangeElement.textContent = "+1";
                team1Score.appendChild(scoreChangeElement);
                team1TasksCompleted++; // Increment completed task count for Team 1
            } else {
                scoreTeam2++;
                team2Score.textContent = scoreTeam2 + "pts";
                scoreChangeElement = document.createElement("div");
                scoreChangeElement.classList.add("floating-score");
                scoreChangeElement.textContent = "+1";
                team2Score.appendChild(scoreChangeElement);
                team2TasksCompleted++; // Increment completed task count for Team 2
            }

            // Update the output preview based on the task
            updateOutputPreview(codeInput);

            // Check if the team has completed all tasks
            if (team1TasksCompleted === taskInstructions.length) {
                showWinnerModal(1); // Team 1 wins
            } else if (team2TasksCompleted === taskInstructions.length) {
                showWinnerModal(2); // Team 2 wins
            } else {
                currentTaskIndex = (currentTaskIndex + 1) % taskInstructions.length;
                updateTaskInstruction(); // Move to the next task
            }
        } else {
            if (team === 1) {
                scoreTeam1--;
                team1Score.textContent = scoreTeam1 + "pts";
                scoreChangeElement = document.createElement("div");
                scoreChangeElement.classList.add("floating-score", "floating-minus");
                scoreChangeElement.textContent = "-1";
                team1Score.appendChild(scoreChangeElement);
            } else {
                scoreTeam2--;
                team2Score.textContent = scoreTeam2 + "pts";
                scoreChangeElement = document.createElement("div");
                scoreChangeElement.classList.add("floating-score", "floating-minus");
                scoreChangeElement.textContent = "-1";
                team2Score.appendChild(scoreChangeElement);
            }

            outputArea.style.backgroundColor = "#fff"; // Reset output area if incorrect
        }
        

        setTimeout(() => {
            if (scoreChangeElement) {
                scoreChangeElement.remove();
            }
        }, 1000);

        checkElimination();
    }

    function checkCorrectTask(codeInput) {
        if (currentTaskIndex === 0 && codeInput.toLowerCase().includes("background-color: green")) {
            return true;
        } else if (currentTaskIndex === 1 && codeInput.toLowerCase().includes("background-color: blue")) {
            return true;
        } else if (currentTaskIndex === 2 && codeInput.toLowerCase().includes("border:")) {
            return true;
        } else if (currentTaskIndex === 3 && codeInput.toLowerCase().includes("color: red")) {
            return true;
        } else if (currentTaskIndex === 4 && codeInput.toLowerCase().includes("width: 200px")) {
            return true;
        }
        return false;
    }

    function updateTaskInstruction() {
        const taskInstructionElement = document.querySelector(".instruction-panel p");
        taskInstructionElement.textContent = taskInstructions[currentTaskIndex];
    }

    // Update the output preview based on the task
    function updateOutputPreview(codeInput) {
        let outputArea = document.getElementById("output-area");

        switch (currentTaskIndex) {
            case 0:
                outputArea.style.backgroundColor = "green";
                outputArea.textContent = "Background color is green!";
                break;
            case 1:
                outputArea.style.backgroundColor = "blue";
                outputArea.textContent = "Background color is blue!";
                break;
            case 2:
                outputArea.style.border = "5px solid black";
                outputArea.textContent = "Border added!";
                break;
            case 3:
                outputArea.style.color = "red";
                outputArea.textContent = "Text color is red!";
                break;
            case 4:
                outputArea.style.width = "200px";
                outputArea.textContent = "Width is 200px!";
                break;
            default:
                outputArea.style.backgroundColor = "#fff";
                outputArea.textContent = "Output: No task!";
        }
    }

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
    updateTaskInstruction(); // Initialize with the first task
});
