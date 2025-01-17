<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

                <?php include '../components/navbar.php'; ?>

              <!-- Main Content -->
              <main class="main-content">
                <!-- Leaderboard Panel -->
                <div class="leaderboard-panel">
                  <h2>
                  Leaderboards
                  <!-- <span class="see-all"><a href="#">See All</a></span> -->
                </h2>
                  <!-- Top 1-3 in a row -->
                  <div class="top-3">
                    <div class="player">
                      <span class="rank rank-2">2</span>
                      <img src="../img/avatar.png" alt="Player 2" class="player-image">
                      <span class="player-name">Avatar</span>
                    </div>
                    <div class="player">
                      <span class="rank rank-1">1</span>
                      <img src="../img/annette.png" alt="Player 1" class="player-image player-image-1">
                      <span class="player-name">Annette</span>
                    </div>
                    <div class="player">
                      <span class="rank rank-3">3</span>
                      <img src="../img/john.png" alt="Player 3" class="player-image">
                      <span class="player-name">John</span>
                    </div>
                  </div>

                        <!-- Top 4-10 in a column -->
                  <div class="top-4-10">
                    <div class="player">
                      <span class="rank">4</span>
                      <img src="../img/annette.png" alt="Player 4" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS101</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">5</span>
                      <img src="../img/avatar.png" alt="Player 5" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS102</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">6</span>
                      <img src="../img/annette.png" alt="Player 6" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS103</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">7</span>
                      <img src="../img/john.png" alt="Player 7" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS104</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">8</span>
                      <img src="../img/avatar.png" alt="Player 8" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS105</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">9</span>
                      <img src="../img/annette.png" alt="Player 9" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS106</span> <!-- Player Course -->
                    </div>
                    <div class="player">
                      <span class="rank">10</span>
                      <img src="../img/avatar.png" alt="Player 10" class="player-image">
                      <span class="player-name">John Doe</span>
                      <span class="player-course">CS107</span> <!-- Player Course -->
                    </div>
                  </div>
                </div>

                
                <!-- Image at the top of the swiper slider -->
                <div class="intro-image">
                  <img src="../img/introtxt.png" alt="Intro Text">
                </div>
                <div class="swiper-container">    
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="picture">
                        <img src="../img/multimode.png" alt="Multiplayer Mode" id="multimodeImage">
                      </div>
                    </div>
                
                    <div class="swiper-slide">
                      <div class="picture">
                        <img src="../img/solomode.png" alt="Solo Mode" id="solomodeImage">
                      </div>
                    </div>
                
                    <div class="swiper-slide">
                      <div class="picture">
                        <img src="../img/practicemode.png" alt="" id="practiceModeImage">
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="picture">
                        <img src="../img/custommode.png" alt="" id="customModeImage">
                      </div>
                    </div>

                  </div>
                
                  <div class="swiper-pagination"></div>
                </div>
                
                <div class="panel-box">
                    <!-- Courses Container (Two columns) -->
                    <div class="courses-container">  
                      <!-- My Courses Table -->
                      <div class="courses-column">
                        <h4>My Courses</h4>
                        <table class="courses-table">
                          <tbody>
                            <tr>
                              <td>Web Development</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/annette.png" alt="Annette" class="profile-img">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Data Science</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Machine Learning</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>React.js Basics</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <!-- Popular Courses Table -->
                      <div class="courses-column">
                        <h4>Popular Courses</h4>
                        <table class="courses-table">
                          <tbody>
                            <tr>
                              <td>Advanced JavaScript</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/annette.png" alt="Annette" class="profile-img">
                              
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>React.js Basics</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>React.js Basics</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>React.js Basics</td>
                              <td class="avatar-group-container">
                                <div class="avatar-group">
                                  <img src="../img/john.png" alt="John" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                  <img src="../img/jane.png" alt="Jane" class="profile-img">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <script>
                    // Limit the number of visible avatars in each group
                document.addEventListener("DOMContentLoaded", function() {
                  const maxVisible = 5;  // Maximum number of avatars to display
                  const avatarGroups = document.querySelectorAll('.avatar-group');

                  avatarGroups.forEach(group => {
                    const avatars = group.querySelectorAll('.profile-img');
                    
                    avatars.forEach((avatar, index) => {
                      if (index >= maxVisible) {
                        avatar.classList.add('hidden'); // Hide avatars beyond the maxVisible count
                      }
                    });
                  });
                });
                </script>

                <!-- FOR SWIPER CARD -->
                <script>
                  var swiper = new Swiper(".swiper-container", {
                    effect: "coverflow",
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: "auto",
                    coverflowEffect: {
                      rotate: 20,
                      stretch: 0,
                      depth: 350,
                      modifier: 1,
                      slideShadows: true
                    },
                    pagination: {
                      el: ".swiper-pagination"
                    }
                  });
                </script>


                <!-- Solo Mode Modal -->
                <div id="soloModeModal" class="solo-modal">
                  <div class="solo-modal-content">
                    <span class="solo-close" id="soloCloseModal"><img src="../img/btnback.png" alt="Close Button"></span>
                    <button id="TakeLesson" class="solo-start-btn"><img src="../img/btntklesson.png" alt="Close Button" onclick="window.location.href='../lesson/lesson.php'"></button>
                    <button id="StartGame" class="solo-start-btn"><img src="../img/btnstart.png" alt="Close Button" onclick="window.location.href='../solomode-level/level1-15.php'"></button>
                  </div>
                </div>

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

                  <!---------------------------------- Custom Mode Modal --------------------------->
                <div id="customModeModal" class="custom-modal">
                  <div class="custom-modal-content">
                    <span class="custom-close" id="customCloseModal">&times;</span>
                    <h2>Custom Mode</h2>
                    <p>Welcome to Custom Mode! Personalize your game settings and start your challenge.</p>
                    <button id="startCustomBtn" class="custom-start-btn">Start Game</button>
                  </div>
                </div>

                <!-- JavaScript for Custom Mode Modal -->
                <script>
                  const customModeImage = document.getElementById("customModeImage");
                  const customModeModal = document.getElementById("customModeModal");
                  const customCloseModal = document.getElementById("customCloseModal");

                  // Open Custom Mode Modal when clicking on the image
                  customModeImage.addEventListener("click", () => {
                    customModeModal.style.display = "block";
                  });

                  // Close Custom Mode Modal when clicking on the close button
                  customCloseModal.addEventListener("click", () => {
                    customModeModal.style.display = "none";
                  });

                  // Close Custom Mode Modal when clicking outside the modal
                  window.addEventListener("click", (event) => {
                    if (event.target === customModeModal) {
                      customModeModal.style.display = "none";
                    }
                  });
                </script>

                <!------------------------------ FOR USER'S LOBBY -------------------------------->
                          <!-- Multiplayer Mode Modal
                  <div id="LobbyModal" class="Lobby-modal">
                    <div class="Lobby-modal-content">
                      <span class="Lobby-close">
                        <img src="../img/btnback.png" alt="Close Button">
                      </span>
                      <button id="createMultiplayerBtn" class="Lobby-start-btn">
                        <img src="../img/btncreate.png" alt="Create Button">
                      </button>
                      <button id="joinMultiplayerBtn" class="Lobby-start-btn">
                        <img src="../img/btnjoin.png" alt="Join Button">
                      </button>
                    </div>
                  </div> -->

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
                          <tr>
                            <td><img src="../img/avatar.png" alt="User 1" class="join-user-avatar"></td>
                            <td class="join-user-name">John Doe</td>
                          </tr>
                          <tr>
                            <td><img src="../img/avatar.png" alt="User 2" class="join-user-avatar"></td>
                            <td class="join-user-name">Jane Smith</td>
                          </tr>
                          <tr>
                            <td><img src="../img/avatar.png" alt="User 3" class="join-user-avatar"></td>
                            <td class="join-user-name">Alex Johnson</td>
                          </tr>
                          <tr>
                            <td><img src="../img/avatar.png" alt="User 4" class="join-user-avatar"></td>
                            <td class="join-user-name">Chris Lee</td>
                          </tr>
                          <tr>
                            <td><img src="../img/avatar.png" alt="User 5" class="join-user-avatar"></td>
                            <td class="join-user-name">Pat Morgan</td>
                          </tr>
                        </tbody>
                      </table>
                      <span class="users-join-close" id="usersJoinCloseModal">
                        <img src="../img/btnjoin.png" alt="Close Button">
                      </span>
                    </div>
                  </div>

                  <script>
                    
                    const JoinButton = document.getElementById("JoinButton");
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

                    </script>
                  
              </main>
  
</body>
</html>
