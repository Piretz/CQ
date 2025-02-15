function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const messageText = messageInput.value.trim();
    if (messageText === "") return; // Do nothing if input is empty

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "sendMessage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Add the message to the conversation
                const conversation = document.getElementById('conversation');
                const newMessage = document.createElement('div');
                newMessage.classList.add('message', 'me');
                newMessage.innerHTML = `
                    <img src="../img/john.png" alt="My Profile Image" class="profile-img">
                    <p class="message-text">${messageText}</p>
                    <span class="message-time">${response.time}</span>
                `;
                conversation.appendChild(newMessage);
                messageInput.value = ""; // Clear the input field
                conversation.scrollTop = conversation.scrollHeight; // Scroll to the bottom
            } else {
                alert("Failed to send message");
            }
        }
    };
    xhr.send(`message=${encodeURIComponent(messageText)}`);
}

function openConversation(userName, initialMessage, profileImg) {
    // Set up the conversation header
    const headerBox = document.querySelector('.header-box');
    const userNameLabel = document.getElementById('conversation-user-name');
    headerBox.innerHTML = `
        <img src="../img/${profileImg}" alt="Profile Image" class="profile-img">
        <p class="user-name">${userName}</p>
    `;
    userNameLabel.textContent = userName; // Ensure the name remains static

    // Fetch conversation messages from the backend
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `getMessages.php?user=${encodeURIComponent(userName)}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const messages = JSON.parse(xhr.responseText);
            const conversation = document.getElementById('conversation');
            conversation.innerHTML = messages.map(message => `
                <div class="message ${message.sender === 'me' ? 'me' : 'friend'}">
                    <img src="../img/${message.sender === 'me' ? 'john.png' : profileImg}" alt="Profile Image" class="profile-img">
                    <p class="message-text">${message.text}</p>
                    <span class="message-time">${message.time}</span>
                </div>
            `).join('');
        }
    };
    xhr.send();
}