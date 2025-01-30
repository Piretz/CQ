<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="styles.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

            <header class="header">
              <!-- Start Section -->
              <div class="start">
                <img src="../img/avatar.png" alt="Profile" id="profile-avatar">
                <div class="user-info">
                  <span>Christopher Potter</span>
                  <div class="level-bar">
                    <div class="progress" id="progress-bar"></div>
                  </div>
                  <div class="level">Level <span id="user-level"></span></div>
                </div>
              </div>

              <!-- Middle Section -->
              <div class="middle">
                <span class="badges">🏅</span>
                <h1>Code Wizard</h1>
                <span>5</span>
              </div>

              <!-- End Section -->
              <div class="end">
                <img src="../img/bell.png" alt="Notifications" id="notification-icon">
                <img src="../img/setting.png" alt="Settings" id="settings-icon">
              </div>
            </header>

            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const userLevel = 1; // Example user level
                const maxLevel = 10;
                const progressBar = document.getElementById("progress-bar");
                const userLevelSpan = document.getElementById("user-level");
                
                userLevelSpan.textContent = userLevel;
                const progressPercentage = (userLevel / maxLevel) * 100;
                progressBar.style.width = progressPercentage + "%";
              });
            </script>

            <!-- Sidebar -->
            <aside class="sidebar">
              <ul>
                <li>
                  <a href="../selectmode/index.php" class="nav-link">
                    <img src="../img/btnHome.png" alt="Home" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../lesson/lesson.php" class="nav-link">
                    <img src="../img/btnLesson.png" alt="Lesson" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../achievements/achievements.php" class="nav-link">
                    <img src="../img/btnAchi.png" alt="Achievements" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../chats/message.php" class="nav-link">
                    <img src="../img/btnChat.png" alt="Chat" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link">
                    <img src="../img/btnleaderboards.png" alt="Leaderboards" class="icon"> 
                  </a>
                </li>
              </ul>
            
              <!-- Footer Section -->
              <footer class="sidebar-footer">
                <a href="../info/information.php" class="nav-link">
                  <img src="../img/btnInfo.png" alt="Info" class="icon">
                </a>
                <a href="#logout" class="nav-link" id="signout-btn">
                  <img src="../img/btnlogout.png" alt="Sign Out" class="icon"> 
                </a>
              </footer>
            </aside>

           <!-- ----------------------------------------------------------------FOR ALL POP UP MODAL ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
            <!------------------------------------------------- Profile Modal --------------------------------------->
            <div id="profileModal" class="profile-modal">
                <div class="profile-modal-content">
                    <span class="profile-close" id="profile-closeModal">
                        <img src="../img/btnback.png" alt="Close Button" class="close-icon">
                    </span>
                    <h2>Profile</h2>
                    <div class="profile-details">
                        <img src="../img/avatar.png" alt="Profile Image" class="profile-image">
                        <h3><strong></strong> Christopher Potter</h3>
                        
                        <!-- Achievements (Badge Images) -->
                        <div class="profile-badges">
                            <strong></strong>
                            <div class="badges">
                                <img src="../img/diamond.png" alt="Badge 1" class="badge">
                            </div>
                        </div>

                        <div class="profile-labels">
                            <label for="text"><strong>Code Wizard</strong></label>
                        </div>

                        <!-- Level Progress -->
                        <div class="level-container">
                            <progress id="exp-progress" value="3000" max="5000" class="profile-progress"></progress>
                            <span>3000/5000</span>
                        </div>

                        <div class="profile-background">
                            <div class="high">
                                <img src="../img/highpanel.png" alt="High Panel">
                                <div class="badge-container">
                                    <img src="../img/diamond.png" alt="High Badge" class="high-badge">
                                    <span class="badge-title">Master 1</span>
                                </div>
                            </div>
                            <div class="stats">
                                <img src="../img/statspanel.png" alt="Stats Panel">
                                <div class="stats-data">
                                    <div class="column">
                                        <p><strong>Mastery:</strong> 85%</p>
                                        <p><strong>QuestPoints:</strong> 12,450</p>
                                        <p><strong>Bugs Fixed:</strong> 320</p>
                                        <p><strong>Teamwork:</strong> 92%</p>
                                    </div>
                                    <div class="column">
                                        <p><strong>Logic:</strong> 75%</p>
                                        <p><strong>XP:</strong> 24,800</p>
                                        <p><strong>Streak:</strong> 15 Days</p>
                                        <p><strong>Badges:</strong> 18</p>
                                    </div>
                                </div>
                            </div>
                            <div class="achievement">
                                <img src="../img/achievepanel.png" alt="Achievement Panel">
                                <!-- Badge images added here -->
                                <div class="badges-container">
                                    <img src="../img/bronze.png" alt="Badge 1" class="badge-image">
                                    <img src="../img/silver.png" alt="Badge 2" class="badge-image">
                                    <img src="../img/platinum.png" alt="Badge 3" class="badge-image">
                                    <img src="../img/gold.png" alt="Badge 4" class="badge-image">
                                    <img src="../img/diamond.png" alt="Badge 5" class="badge-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
           <!---------------- Notification Modal ------------------>
          <div id="notificationModal" class="notification-modal">
            <div class="notification-modal-content">
              <span class="notification-close">&times;</span>
              <h2>Notifications</h2>
              <div class="box-container" id="box-container">
                <div class="box">
                  <img src="../img/bronze.png" alt="Bronze Badge" class="badge-image" />
                  <div class="badge-details">
                    <p class="badge-type">Bronze Badge</p>
                    <ul class="badge-description">
                      <li>Completed your first lesson</li>
                      </ul>
                    <p class="badge-time">5 minutes ago</p>
                  </div>
                </div>
                <div class="box">
                  <img src="../img/gold.png" alt="Silver Badge" class="badge-image" />
                  <div class="badge-details">
                    <p class="badge-type">Silver Badge</p>
                    <ul class="badge-description">
                      <li>Achieved Unlocked</li>
                      </ul>
                    <p class="badge-time">2 hours ago</p>
                  </div>
                </div>
                <div class="box">
                  <img src="../img/gold.png" alt="Silver Badge" class="badge-image" />
                  <div class="badge-details">
                    <p class="badge-type">Silver Badge</p>
                    <ul class="badge-description">
                      <li>Achieved Unlocked</li>
                      </ul>
                    <p class="badge-time">2 hours ago</p>
                  </div>
                </div>
                <div class="box">
                  <img src="../img/gold.png" alt="Silver Badge" class="badge-image" />
                  <div class="badge-details">
                    <p class="badge-type">Silver Badge</p>
                    <ul class="badge-description">
                      <li>Achieved Unlocked</li>
                      </ul>
                    <p class="badge-time">2 hours ago</p>
                  </div>
                </div>
                <div class="box">
                  <img src="../img/gold.png" alt="Silver Badge" class="badge-image" />
                  <div class="badge-details">
                    <p class="badge-type">Silver Badge</p>
                    <ul class="badge-description">
                      <li>Achieved Unlocked</li>
                      </ul>
                    <p class="badge-time">2 hours ago</p>
                  </div>
                </div>
                
              </div>
              <button id="clearButton" class="clear-button">Clear All</button>
            </div>
          </div>

        <!------------------------ Settings Modal ------------------------------->
        <div id="settingsModal" class="settings-modal">
          <div class="settings-modal-content">
            <span class="settings-close">&times;</span>
            <h2>Settings</h2>
            <div class="settings-options">
              <label>
                <input type="checkbox"> Enable Notifications
              </label>
              <label>
                <input type="checkbox"> Dark Mode
              </label>
              <label>
                <input type="checkbox"> Auto-update Lessons
              </label>
            </div>
          </div>
        </div>


            <!--------------------------------- Modal for logout confirmation ------------------------------------->
        <div id="logoutModal" class="logout-modal">
          <div class="logout-modal-content">
            <span class="logout-close" id="logout-closeModal"></span>
            <h2>Are you sure you want to logout?</h2>
            <div class="logout-modal-footer">
              <button class="cancel-btn" id="cancelBtn">Cancel</button>
              <button class="logout-btn" id="logoutBtn">Logout</button>
            </div>
          </div>
        </div>

        <!-- ------------------------------SCRIPT------------------------------------------ -->
        <!-- tooltip -->
        <script>
          document.querySelectorAll('.icon, #profile-avatar, #notification-icon, #settings-icon').forEach((element) => {
          element.addEventListener('mouseenter', function () {
            const tooltipText = this.getAttribute('alt') || 'Tooltip';
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.textContent = tooltipText;

            // Position the tooltip dynamically
            const rect = this.getBoundingClientRect();
            tooltip.style.position = 'absolute';
            tooltip.style.top = `${rect.top - 15 + window.scrollY}px`;
            tooltip.style.left = `${rect.left + rect.width / 2 - 50}px`;
            tooltip.style.padding = '5px 10px';
            tooltip.style.backgroundColor = '#333';
            tooltip.style.color = '#fff';
            tooltip.style.borderRadius = '5px';
            tooltip.style.fontSize = '12px';
            tooltip.style.zIndex = '1000';
            tooltip.style.whiteSpace = 'nowrap';

            document.body.appendChild(tooltip);

            this.addEventListener('mouseleave', () => {
              tooltip.remove();
            });
          });
        });

        </script>
          <script>
            // Get modal, buttons, and close icon for logout
            const modal = document.getElementById("logoutModal");
            const signoutBtn = document.getElementById("signout-btn");
            const closeModal = document.getElementById("logout-closeModal");
            const cancelBtn = document.getElementById("cancelBtn");
            const logoutBtn = document.getElementById("logoutBtn");

            // --------------------------------------Profile modal----------------------------------------------------------------------
            const profileModal = document.getElementById("profileModal");
            const profileAvatar = document.getElementById("profile-avatar");
            const profileCloseModal = document.getElementById("profile-closeModal");
            const closeProfileBtn = document.getElementById("closeProfileBtn");

            // Get modal elements of notification and settings
            const notificationModal = document.getElementById("notificationModal");
            const settingsModal = document.getElementById("settingsModal");

            // Get buttons for notification and settings
            const notificationIcon = document.getElementById("notification-icon");
            const settingsIcon = document.getElementById("settings-icon");

            // Get close icons for notif and settings
            const notificationClose = document.querySelector(".notification-close");
            const settingsClose = document.querySelector(".settings-close");

                                  // Get the Clear All button and box container
            const clearButton = document.getElementById("clearButton");
            const boxContainer = document.getElementById("box-container");

            // Notification Modal Events
            notificationIcon.addEventListener("click", () => {
              notificationModal.style.display = "block";
            });
            notificationClose.addEventListener("click", () => {
              notificationModal.style.display = "none";
            });
            window.addEventListener("click", (event) => {
              if (event.target === notificationModal) {
                notificationModal.style.display = "none";
              }
            });

 

            // Add event listener to the Clear All button
            clearButton.addEventListener("click", () => {
              // Remove all the box elements inside the box container
              boxContainer.innerHTML = "";
            });


            // Settings Modal Events
            settingsIcon.addEventListener("click", () => {
              settingsModal.style.display = "block";
            });
            settingsClose.addEventListener("click", () => {
              settingsModal.style.display = "none";
            });
            window.addEventListener("click", (event) => {
              if (event.target === settingsModal) {
                settingsModal.style.display = "none";
              }
            });

            // When the user clicks the signout button, show the modal
            signoutBtn.addEventListener("click", function() {
              modal.style.display = "block";
            });

            // When the user clicks the close (X) button, close the modal
            closeModal.addEventListener("click", function() {
              modal.style.display = "none";
            });

            // When the user clicks the cancel button, close the modal
            cancelBtn.addEventListener("click", function() {
              modal.style.display = "none";
            });

            // When the user clicks the logout button, trigger logout functionality
            logoutBtn.addEventListener("click", function() {
              // Implement your logout functionality here, e.g.:
              window.location.href = '/logout'; // Redirect to logout page
            });

            // Close the modal if the user clicks outside of it
            window.addEventListener("click", function(event) {
              if (event.target === modal) {
                modal.style.display = "none";
              }
            });

            // -----------------------------Open the profile modal-------------------------------------------------------------
            profileAvatar.addEventListener("click", function () {
              profileModal.style.display = "block";
            });

            // Close the profile modal (close icon)
            profileCloseModal.addEventListener("click", function () {
              profileModal.style.display = "none";
            });

            // Close the profile modal (Close button)
            closeProfileBtn.addEventListener("click", function () {
              profileModal.style.display = "none";
            });

            // Close the modal if the user clicks outside of it
            window.addEventListener("click", function (event) {
              if (event.target === profileModal) {
                profileModal.style.display = "none";
              }
            });

          // Close modals if clicked outside
          window.addEventListener('click', (event) => {
            if (event.target === notificationModal) {
              notificationModal.style.display = 'none';
            }
            if (event.target === settingsModal) {
              settingsModal.style.display = 'none';
            }
          });
          </script>

                  
    </body>
</html>
