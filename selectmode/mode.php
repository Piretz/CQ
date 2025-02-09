<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          
            <!-- Walkthrough Overlay -->
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

            <!-- Mode Selection -->
            <div class="select-mode-images">
                <img src="../img/mdSolo.png" alt="Solo Mode" class="solo-mode walkthrough-item locked" id="solomodeImage">
                <img src="../img/mdpvp.png" alt="PvP Mode" class="pvp-mode walkthrough-item locked" id="multimodeImage"> 
                <img src="../img/mdLesson.png" alt="Lesson Mode" class="lesson-mode walkthrough-item unlocked" id="lessonModeImage" onclick="window.location.href='../lesson/lesson.php';">
                <img src="../img/mdpractice.png" alt="Practice Mode" class="practice-mode walkthrough-item locked" id="practiceModeImage">
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

                    nextBtn.addEventListener("click", function () {
                        currentStep++;
                        if (currentStep >= steps.length) {
                            overlay.style.background = "transparent";
                            overlay.style.backdropFilter = "none";
                            overlay.style.pointerEvents = "none"; 
                            overlay.style.removeProperty("z-index");
                            images.forEach(item => item.classList.remove("walkthrough-item"));
                            joybeeTextBox.style.display = "none";
                            // After finishing walkthrough, show lesson mode image with guide
                            document.getElementById("lessonModeImage").style.border = "2px solid red"; // Indicating to click
                            document.getElementById("lessonModeImage").style.boxShadow = "0 10px 20px #0286DF";
                        } else {
                            updateStep();
                        }
                    });

                    skipBtn.addEventListener("click", function () {
                        overlay.style.background = "transparent";
                        overlay.style.backdropFilter = "none";
                        overlay.style.pointerEvents = "none"; 
                        overlay.style.removeProperty("z-index");
                        images.forEach(item => item.classList.remove("walkthrough-item"));
                        joybeeTextBox.style.display = "none";
                        // After skipping walkthrough, show lesson mode image with guide
                        document.getElementById("lessonModeImage").style.border = "2px solid red"; // Indicating to click
                        document.getElementById("lessonModeImage").style.boxShadow = "0 10px 20px #0286DF";
                    });

                    updateStep();
                });

                // Apply Locked/Unlocked Styles
                document.querySelectorAll(".locked").forEach(mode => {
                    mode.style.opacity = "1";  // Locked modes appear faded
                    mode.style.pointerEvents = "none";  // Disable interaction
                });

                document.querySelectorAll(".unlocked").forEach(mode => {
                    mode.style.opacity = "1";  // Unlocked mode appears normal
                    mode.style.pointerEvents = "auto";  // Enable interaction
                });

              </script>

              <!-- Typewriter Text -->
              <div class="typewriter-container">
              <span class="globe-icon">
                🌐
              </span>
                <div class="typewriter-text">
                  Hi guys!! Let's play!
                </div>
              </div>

              <!-- ALL MODAL MODES (SOLO) (PVP) (LESSON) (PRACTICE)-->
                <!-- Solo Mode Modal -->
                <div id="soloModeModal" class="solo-modal">
                  <div class="solo-modal-content">
                    <span class="solo-close" id="soloCloseModal">
                      <img src="../img/btnback.png" alt="Close Button">
                    </span>
                    
                    <button id="TakeLesson" class="solo-start-btn">
                      <img src="../img/btntklesson.png" alt="Take Lesson">
                    </button>

                    <button id="StartGame" class="solo-start-btn">
                      <img src="../img/btnstart.png" alt="Start Game">
                    </button>
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

                  // Event listener para sa Take Lesson button
                  document.getElementById("TakeLesson").addEventListener("click", function() {
                    showLoadingAndRedirect('../lesson/lesson.php');
                  });

                  // Event listener para sa Start Game button
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
                    <button id="createMultiplayerBtn" class="multiplayer-start-btn"><img src="../img/btncreate.png" alt="Close Button"></button>
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
                <div id="practiceModeModal" class="practice-modal">
                  <div class="practice-modal-content">
                    <span class="practice-close" id="practiceCloseModal">&times;</span>
                    <h2>Practice Mode</h2>
                    <p>Welcome to Practice Mode! Personalize your game settings and start your challenge.</p>
                    <button id="startPracticeBtn" class="practice-start-btn">Start Game</button>
                  </div>
                </div>

                <!-- JavaScript for Practice Mode Modal -->
                <script>
                  const practiceModeImage = document.getElementById("practiceModeImage");
                  const practiceModeModal = document.getElementById("practiceModeModal");
                  const practiceCloseModal = document.getElementById("practiceCloseModal");

                  // Open Practice Mode Modal when clicking on the image
                  practiceModeImage.addEventListener("click", () => {
                    practiceModeModal.style.display = "block";
                  });

                  // Close Practice Mode Modal when clicking on the close button
                  practiceCloseModal.addEventListener("click", () => {
                    practiceModeModal.style.display = "none";
                  });

                  // Close Practice Mode Modal when clicking outside the modal
                  window.addEventListener("click", (event) => {
                    if (event.target === practiceModeModal) {
                      practiceModeModal.style.display = "none";
                    }
                  });
                </script>

                    <!-- User's Lobby Modal -->
                    <div id="usersLobbyModal" class="users-lobby-modal">
                      <div class="users-lobby-modal-content">
                        
                        <h2 class="users-lobby-title">Welcome to User's Lobby</h2>
                        <h3 class="users-lobby-id">Lobby ID: 123456</h3>
                        <span class="users-lobby-close" id="usersLobbyCloseModal">
                          <img src="../img/btnback.png" alt="Close Button">
                        </span>

                        <!-- User's List Table -->
                        <table class="users-lobby-table">
                          <thead>
                            <tr>
                              <th>Profile Image</th>
                              <th>User Name</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><img src="../img/avatar.png" alt="User 1" class="user-avatar"></td>
                              <td class="user-name">John Doe</td>
                            </tr>
                            <tr>
                              <td><img src="../img/avatar.png" alt="User 2" class="user-avatar"></td>
                              <td class="user-name">Jane Smith</td>
                            </tr>
                            <tr>
                              <td><img src="../img/avatar.png" alt="User 3" class="user-avatar"></td>
                              <td class="user-name">Alex Johnson</td>
                            </tr>
                            <tr>
                              <td><img src="../img/avatar.png" alt="User 4" class="user-avatar"></td>
                              <td class="user-name">Chris Lee</td>
                            </tr>
                            <tr>
                              <td><img src="../img/avatar.png" alt="User 5" class="user-avatar"></td>
                              <td class="user-name">Pat Morgan</td>
                            </tr>
                          </tbody>
                        </table>
                        <span class="users-lobby-reload" id="usersLobbyReload">
                        <img src="../img/btnreload.png" alt="Close Button">
                        </span>
                        <span class="users-lobby-reload" id="usersLobbyStart">
                        <img src="../img/btnstart1.png" alt="Close Button">
                        </span>
                      </div>
                    </div>
                  <script>
                    
                    const CreateButton = document.getElementById("CreateButton");
                    // Show User's Lobby Modal when the 'Create Multiplayer' button is clicked
                    document.getElementById('createMultiplayerBtn').addEventListener('click', function() {
                    // Close the Multiplayer Mode Modal
                    document.getElementById('multiplayerModeModal').style.display = 'none';

                    // Open the User's Lobby Modal
                    document.getElementById('usersLobbyModal').style.display = 'flex';
                  });

                  // Close the User's Lobby Modal
                  document.getElementById('usersLobbyCloseModal').addEventListener('click', function() {
                    document.getElementById('usersLobbyModal').style.display = 'none';
                  });

                  // Close the Multiplayer Mode Modal (if needed, added a listener for the close button in the modal)
                  document.getElementById('multiplayerCloseModal').addEventListener('click', function() {
                    document.getElementById('multiplayerModeModal').style.display = 'none';
                  });

                    </script>

                    <!-- ---------------------------FOR CHOOSING/Joining LOBBY MODAL------------------------- -->
                      <!-- User's Lobby Modal -->
                  <div id="usersJoinModal" class="users-join-modal">
                    <div class="users-join-modal-content">
                      <span class="users-back-close" id="usersJoinCloseModal">
                        <img src="../img/btnback.png" alt="Close Button">
                      </span>
                      <h2 class="users-Join-title">Choose Lobby</h2>

                      <!-- User's List Table -->
                      <table class="users-join-table">
                        <thead>
                          <tr>
                            <th>Lobby ID</th>
                            <th>Lobby Master</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="join-lobby-row">
                            <td class="join-ID">12345</td>
                            <td class="join-user-name">John Doe</td>
                          </tr>
                          <tr class="join-lobby-row">
                            <td class="join-ID">12346</td>
                            <td class="join-user-name">Jane Smith</td>
                          </tr>
                          <tr class="join-lobby-row">
                            <td class="join-ID">12347</td>
                            <td class="join-user-name">Alex Johnson</td>
                          </tr>
                          <tr class="join-lobby-row">
                            <td class="join-ID">12348</td>
                            <td class="join-user-name">Chris Lee</td>
                          </tr>
                          <tr class="join-lobby-row">
                            <td class="join-ID">12349</td>
                            <td class="join-user-name">Pat Morgan</td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <!-- Join Button (Initially Hidden) -->
                      <span class="users-join-btn" id="usersJoinBtn" style="display:none;">
                        <img src="../img/btnjoin.png" alt="Join Button">
                      </span>
                    </div>
                  </div>


                  <script>
                    // Show User's Lobby Modal when the 'Create Multiplayer' button is clicked
                    document.getElementById('joinMultiplayerBtn').addEventListener('click', function() {
                      // Close the Multiplayer Mode Modal
                      document.getElementById('multiplayerModeModal').style.display = 'none';

                      // Open the User's Lobby Modal
                      document.getElementById('usersJoinModal').style.display = 'flex';
                    });

                    // Close the User's Lobby Modal
                    document.getElementById('usersJoinCloseModal').addEventListener('click', function() {
                      document.getElementById('usersJoinModal').style.display = 'none';
                    });

                    // Close the Multiplayer Mode Modal (if needed, added a listener for the close button in the modal)
                    document.getElementById('multiplayerCloseModal').addEventListener('click', function() {
                      document.getElementById('multiplayerModeModal').style.display = 'none';
                    });

                    // Add click event for each lobby row
                    document.querySelectorAll('.join-lobby-row').forEach(row => {
                      row.addEventListener('click', function() {
                        // Remove the 'selected' class from all rows
                        document.querySelectorAll('.join-lobby-row').forEach(otherRow => {
                          otherRow.classList.remove('selected');
                        });

                        // Add 'selected' class to the clicked row
                        this.classList.add('selected');

                        const lobbyId = this.querySelector('.join-ID').textContent;
                        const lobbyMaster = this.querySelector('.join-user-name').textContent;

                        // Show the "Join" button
                        document.getElementById('usersJoinBtn').style.display = 'block';

                        // Store the selected lobby information for later use
                        this.setAttribute('data-lobby-id', lobbyId);
                        this.setAttribute('data-lobby-master', lobbyMaster);
                      });
                    });

                    // Add click event for the "Join" button
                    document.getElementById('usersJoinBtn').addEventListener('click', function() {
                      const selectedRow = document.querySelector('.join-lobby-row.selected');
                      
                      if (selectedRow) {
                        const lobbyId = selectedRow.getAttribute('data-lobby-id');
                        const lobbyMaster = selectedRow.getAttribute('data-lobby-master');

                        // Perform the action of joining the lobby (e.g., show a confirmation message)
                        console.log(`You have joined the lobby with ID: ${lobbyId}, hosted by ${lobbyMaster}`);

                        // Close the modal
                        document.getElementById('usersJoinModal').style.display = 'none';

                        // Show a confirmation message
                        alert(`You have joined the lobby with ID: ${lobbyId}, hosted by ${lobbyMaster}`);
                      }
                    });
                    </script>
</body>
</html>