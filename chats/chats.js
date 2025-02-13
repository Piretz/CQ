 

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

