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
                <textarea id="message-input" placeholder="Type a message" class="message-input"></textarea>
                <button class="send-btn" onclick="sendMessage()">
                    <img src="../img/btnsend.png" alt="Send Icon">
                </button>
            </div>
        </div>
    </div>

    <script>
       

        function openConversation(userName, initialMessage, profileImg) {
            // Set up the conversation header
            const headerBox = document.querySelector('.header-box');
            const userNameLabel = document.getElementById('conversation-user-name');
            headerBox.innerHTML = `
                <img src="../img/${profileImg}" alt="Profile Image" class="profile-img">
                <p class="user-name">${userName}</p>
            `;
            userNameLabel.textContent = userName; // Ensure the name remains static

            // Set up the conversation messages
            const conversation = document.getElementById('conversation');
            conversation.innerHTML = `
                <div class="message friend">
                   
                    <img src="../img/${profileImg}" alt="Friend's Profile Image" class="profile-img">
                    <p class="message-text">${initialMessage}</p>
                    <span class="message-time"></span>
                </div>
                <div class="message me">
                    <span class="message-label"></span>
                    <img src="../img/john.png" alt="My Profile Image" class="profile-img">
                    <p class="message-text">Yeah, what's up?</p>
                    <span class="message-time">10:36 AM</span>
                </div>
            `;
        }

        function sendMessage() {
        const messageInput = document.getElementById('message-input');
        const messageText = messageInput.value;
        if (messageText.trim() === "") return; // Do nothing if input is empty

        // Get current time
        const currentTime = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});

        // Add the message to the conversation
        const conversation = document.getElementById('conversation');
        const newMessage = document.createElement('div');
        newMessage.classList.add('message', 'me');
        newMessage.innerHTML = `
            
            <img src="../img/john.png" alt="My Profile Image" class="profile-img">
            <p class="message-text">${messageText}</p>
            <span class="message-time">${currentTime}</span>
        `;
        conversation.appendChild(newMessage);

        // Update the last message in the message details with "YOU: HI"
        const messageDetails = document.querySelector('.message-details');
        const messageTextElement = messageDetails.querySelector('.message-text');
        const messageTimeElement = messageDetails.querySelector('.message-times');

        if (messageTextElement) {
            // If message-text exists, just update it without removing the username
            messageTextElement.innerHTML = `<span class="message-label">You:</span> ${messageText}`;
            messageTimeElement.textContent = currentTime; // Update the message time in the message list
        } else {
            // If message-text doesn't exist (initial state), set it
            messageDetails.innerHTML = `  
                <p class="message-text">
                    <span class="message-label"></span> ${messageText}
                </p>
                <span class="message-time">${currentTime}</span>
            `;
        }

         // Update message-time in the messages list
            const messageItem = document.querySelector('.message-item');
            const messageTimeInList = messageItem.querySelector('.message-times');
            messageTimeInList.textContent = currentTime; // Update time in message list

            // Clear the input field
            messageInput.value = "";

            // Scroll to the bottom of the conversation
            conversation.scrollTop = conversation.scrollHeight;
        }


    </script>

</body>
</html>
