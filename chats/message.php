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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css">
  <link rel="stylesheet" href="../components/styles.css"> <!-- Link to external CSS file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js"></script>
  <title>CoDev</title>
</head>
<body>

    <?php include '../components/navbar.php'; ?>

    <div class="panel-container">
        <!-- Panel Box for Messages List -->
         
        <div class="messages-list">
                <div class="list-header">
                    <h2>My Messages</h2>
                    <div class="search-bar">
                        <input type="text" placeholder="Search..." id="search-input">
                        <button class="search-btn">
                            <img src="../img/iconsearch.png" alt="Search Icon" style="width: 30px; height: 30px;">
                        </button>
                    </div>
                </div>

            <div class="messages-container">
                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>
                <!-- More message items can be added here -->
                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>

                <div class="message-item" onclick="openConversation('Jane Smith', 'Hello, are you free to talk?', 'annette.png')">
                    <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name">Jane Smith</p>
                        <p class="message-text">Hello, are you free to talk?</p>
                        <p class="user-text"></p>
                        <span class="message-times">10:30 AM</span>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Panel Box for Conversation Body -->
        <div class="conversation-body" id="conversation-body">
            <div class="header-box">
                <img src="../img/annette.png" alt="Profile Image" class="profile-img">
                <p class="user-name" id="conversation-user-name">Jane Smith</p>
            </div>
            <div class="conversation" id="conversation">
                <!-- Conversation will appear here -->
            </div>
            <div class="bottom-box">
                <textarea id="message-input" placeholder="Type a message..." class="message-input"></textarea>
                <button class="send-btn" onclick="sendMessage()">
                    <img src="../img/btnsend.png" alt="Send Icon">
                </button>
            </div>
        </div>
    </div>
    <script src="chats.js"></script>
</body>
</html>
