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
                <img src="../img/avatar.png" alt="Profile Image" id="profile-avatar">
                <div class="user-info">
                  <span>Christopher Potter</span>
                  <div class="level-bar">
                    <div class="progress"></div>
                  </div>
                  <div class="level">Level 1</div>
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

            <!-- Sidebar -->
            <aside class="sidebar">
              <ul>
                <li>
                  <a href="../selectmode/index.php" class="nav-link">
                    <img src="../img/btnhome.png" alt="Home" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../lesson/lesson.php" class="nav-link">
                    <img src="../img/btnlesson.png" alt="Lesson" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../achievements/achievements.php" class="nav-link">
                    <img src="../img/btnachi.png" alt="Achievements" class="icon"> 
                  </a>
                </li>
                <li>
                  <a href="../chats/message.php" class="nav-link">
                    <img src="../img/btnchat.png" alt="Chat" class="icon"> 
                  </a>
                </li>
              </ul>
            
              <!-- Footer Section -->
              <footer class="sidebar-footer">
                <a href="#theme" class="nav-link">
                  <img src="../img/btndark.png" alt="Dark Mode" class="icon"> 
                </a>
                <a href="../info/information.php" class="nav-link">
                  <img src="../img/btninfo.png" alt="Info" class="icon">
                </a>
                <a href="#logout" class="nav-link" id="signout-btn">
                  <img src="../img/btnsignout.png" alt="Sign Out" class="icon"> 
                </a>
              </footer>
            </aside>

           <!-- ----------------------------------------------------------------FOR ALL POP UP MODAL ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
            <!------------------------------------------------- Profile Modal --------------------------------------->
          <div id="profileModal" class="profile-modal">
            <div class="profile-modal-content">
              <span class="profile-close" id="profile-closeModal"><img src="../img/btnback.png" alt="Close Button" class="close-icon"></span>
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
                  
                  <progress id="exp-progress" value="40" max="100" class="profile-progress"></progress> <!-- Adjust 'value' as needed -->
                  <span>1000/3000</span>
                </div>

                <div class="profile-background">
                  <div class="high"><img src="../img/highpanel.png"></div>
                  <div class="stats"><img src="../img/statspanel.png"></div>
                  <div class="achievement"><img src="../img/achievepanel.png"></div>
                </div>

              </div>
              <div class="profile-actions">
                <!-- <button class="edit-profile-btn">Edit Profile</button>
                <button class="close-profile-btn" id="closeProfileBtn">Close</button> -->
              </div>
            </div>
          </div>

           <!-- -------------------------------Notification Modal--------------------------------------- -->
          <div id="notificationModal" class="notification-modal">
            <div class="notification-modal-content">
              <span class="notification-close" id="notification-closeModal">&times;</span>
              <h2>Notifications</h2>
              <ul class="notification-list">
                <li>You have completed Lesson 1: Introduction to Programming!</li>
                <li>Your achievement "Code Beginner" is unlocked!</li>
                <li>New badge added: "5 Days Streak!"</li>
              </ul>
              <div class="notification-actions">
                <button class="close-notifications-btn" id="closeNotificationsBtn">Close</button>
              </div>
            </div>
          </div>

            <!--------------------------------------- Settings Modal -------------------------------------------------->
          <div id="settingsModal" class="settings-modal">
            <div class="settings-modal-content">
              <span class="settings-close" id="settings-closeModal">&times;</span>
              <h2>Settings</h2>
              <div class="settings-options">
                <label>
                  <input type="checkbox" id="darkModeToggle">
                  Enable Dark Mode
                </label>
                <br>
                <label>
                  <input type="checkbox" id="notificationsToggle">
                  Enable Notifications
                </label>
              </div>
              <div class="settings-actions">
                <button class="save-settings-btn" id="saveSettingsBtn">Save</button>
                <button class="close-settings-btn" id="closeSettingsBtn">Close</button>
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

            // ----------------------------------------------Notification and Settings Modal----------------------------------------------
            // Get elements
            // Get Notification and Settings modal elements
            const notificationIcon = document.getElementById("notification-icon");
            const settingsIcon = document.getElementById("settings-icon");

            const notificationModal = document.getElementById("notificationModal");
            const settingsModal = document.getElementById("settingsModal");

            const closeNotification = document.getElementById("notification-closeModal"); // Correct ID
            const closeSettings = document.getElementById("settings-closeModal"); // Correct ID

            // Open Notification Modal
            notificationIcon.addEventListener("click", () => {
              notificationModal.style.display = "block";
            });

            // Close Notification Modal
            closeNotification.addEventListener("click", () => {
              notificationModal.style.display = "none";
            });

            // Open Settings Modal
            settingsIcon.addEventListener("click", () => {
              settingsModal.style.display = "block";
            });

            // Close Settings Modal
            closeSettings.addEventListener("click", () => {
              settingsModal.style.display = "none";
            });

            // Close modals when clicking outside
            window.addEventListener("click", (event) => {
              if (event.target === notificationModal) {
                notificationModal.style.display = "none";
              }
              if (event.target === settingsModal) {
                settingsModal.style.display = "none";
              }
            });

          </script>

          
    </body>
</html>
