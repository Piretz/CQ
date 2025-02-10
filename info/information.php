<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>
              <!-- REUSABLE SIDEBAR AND HEADER -->
            <?php include '../components/navbar.php'; ?>

            <!-- Main Content -->
            <div class="container">
              <div class="content">

               <!-- Fixed Welcome Header -->
                <h1 class="fixed-header">Welcome to <span class="highlight">CoDev</span> Help Center</h1>
                
                <!-- Fixed Description Paragraph -->
                <p class="fixed-description">
                  - Having trouble navigating CodeQuest? Don’t worry! This page will guide you through the most common questions and issues.
                </p>
              
                <!-- Getting Started -->
                <details class="details">
                  <summary>1. Getting started<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I log in?</strong> <br>
                        - Use your university email and the password provided during registration. Forgot your password? Click <b>"Forgot Password"</b> on the login page to reset it.
                      </li>
                      <li>
                        <strong>How do I create my profile?</strong> <br>
                        - Once logged in, <b>go to Profile</b> → <b>Edit Profile.</b> Fill out your details and upload an avatar.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Completing Quests -->
                <details class="details">
                  <summary>2. Completing Quests<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I complete quests?</strong> <br>
                        - Access quests from your dashboard and follow the instructions provided.
                      </li>
                      <li>
                        <strong>How do I track progress?</strong> <br>
                        - Use the "Progress" tab to monitor your achievements.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Team Challenges -->
                <details class="details">
                  <summary>3. Team Challenges<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I join a team challenge?</strong> <br>
                        - Navigate to the "Challenges" section, select a team challenge, and click "Join Team."
                      </li>
                      <li>
                        <strong>How do I create a team?</strong> <br>
                        - Go to "Teams" → "Create Team" and invite members.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Rewards and Badges -->
                <details class="details">
                  <summary>4. Rewards and Badges<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I earn badges?</strong> <br>
                        - Complete quests and challenges to earn badges based on achievements.
                      </li>
                      <li>
                        <strong>How do I redeem rewards?</strong> <br>
                        - Go to the "Rewards" section and select available items.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Tracking Progress -->
                <details class="details">
                  <summary>5. Tracking Progress<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I view my progress?</strong> <br>
                        - Use the "Progress" tab to see a detailed breakdown of your performance.
                      </li>
                      <li>
                        <strong>How do I improve my score?</strong> <br>
                        - Retake quests or complete additional challenges.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Troubleshooting -->
                <details class="details">
                  <summary>6. Troubleshooting<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>What if I encounter an error?</strong> <br>
                        - Report the issue using the "Help" tab or contact support.
                      </li>
                      <li>
                        <strong>How do I reset my password?</strong> <br>
                        - Click "Forgot Password" on the login page and follow the instructions.
                      </li>
                    </ul>
                  </div>
                </details>

                <!-- Need More Help -->
                <details class="details">
                  <summary>7. Need More Help?<span class="icon">&#x25B6;</span></summary>
                  <div class="details-content">
                    <ul>
                      <li>
                        <strong>How do I contact support?</strong> <br>
                        - Use the "Contact Us" form available in the "Help" tab.
                      </li>
                      <li>
                        <strong>Can I suggest improvements?</strong> <br>
                        - Yes, submit suggestions via the "Feedback" section.
                      </li>
                    </ul>
                  </div>
                </details>
              </div>
            </div>
          </div>
           <!-- JavaScript for Toggling Icons -->
          <script>
            document.querySelectorAll('.details').forEach(details => {
              const icon = details.querySelector('.icon');
              details.addEventListener('toggle', () => {
                if (details.open) {
                  icon.innerHTML = '&#x25BC;'; // Down Arrow
                } else {
                  icon.innerHTML = '&#x25B6;'; // Right Arrow
                }
              });
            });
          </script>
    </body>
</html>