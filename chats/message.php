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
            <?php
                $query = "SELECT * FROM users WHERE User_ID != $id";
                $result = mysqli_query($con,$query);
                while($rows = mysqli_fetch_assoc($result)){
                    $receiver_id = $rows['User_ID'];
                    $query_message = "SELECT * FROM Messages WHERE receiver_id = $receiver_id  LIMIT 1";
                    $result_message = mysqli_query($con,$query_message);
                    $last_send = mysqli_fetch_assoc($result_message)

            ?>
                <div class="message-item" onclick="openConversation('<?php echo $rows['First_Name']; ?>', <?php echo $rows['User_ID']; ?>)">
                    <img src="../img/lebron.png" alt="Profile Image" class="profile-img">
                    <div class="message-details">
                        <p class="user-name"><?php echo $rows['First_Name']; ?> <?php echo $rows['Last_Name']; ?></p>
                        <?php
                        if($last_send) {
                        ?>
                        <p class="message-text"><?php echo $last_send['message'] ?></p>
                        <p class="user-text"></p>
                        <span class="message-times"><?php echo date("h:i A", strtotime($last_send['created_at'])) ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>

        </div>

        <!-- Panel Box for Conversation Body -->
        <div class="conversation-body" id="conversation-body">
            <div class="header-box">
                <img src="../img/lebron.png" alt="Profile Image" class="profile-img">
                <p class="user-name" id="conversation-user-name">Lebron James</p>
            </div>
            <div class="conversation" id="conversation" style="color: white">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
let receiverId = null; // Store the receiver's ID here

// Function to open the conversation and set the receiverId
function openConversation(userName, userId) {
    receiverId = userId; // Store receiverId when conversation is opened
    document.getElementById("conversation-user-name").textContent = userName;
    document.getElementById("conversation-user-name").setAttribute("data-user-id", userId); // Store receiverId in a data attribute
    fetchMessages(userId); // Fetch previous messages for the conversation
}

// Function to fetch messages from the server
function fetchMessages(receiverId) {
    $.ajax({
        url: 'fetch_messages.php', // Your PHP script to get messages
        type: 'POST',
        data: { receiver_id: receiverId },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                let conversationBox = document.getElementById("conversation");
                conversationBox.innerHTML = ""; // Clear previous messages

                response.messages.forEach(message => {
                    let messageDiv = document.createElement("div");
                    messageDiv.classList.add("message");

                    if (message.sender_id == response.current_user) {
                        messageDiv.classList.add("sent"); // Message from the logged-in user
                    } else {
                        messageDiv.classList.add("received"); // Message from the other user
                    }

                    messageDiv.innerHTML = `<p>${message.text}</p><span>${message.time}</span>`;
                    conversationBox.appendChild(messageDiv);
                });

                // Scroll to the bottom to show the latest messages
                conversationBox.scrollTop = conversationBox.scrollHeight;
            } else {
                console.error("Error fetching messages:", response.error);
            }
        },
        error: function() {
            console.error("AJAX error while fetching messages.");
        }
    });
}

// Function to send a message
function sendMessage() {
    let messageInput = document.getElementById("message-input");
    let messageText = messageInput.value.trim();

    // Ensure receiverId is set
    if (receiverId === null) {
        alert("No recipient selected!");
        return;
    }

    if (messageText === "") return; // Don't send empty messages

    // Send the message via AJAX
    $.ajax({
        url: 'send_message.php',
        type: 'POST',
        data: { receiver_id: receiverId, message: messageText },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                fetchMessages(receiverId); // Refresh the conversation with the new message
                messageInput.value = ""; // Clear the message input field
            } else {
                alert("Error: " + response.error);
            }
        },
        error: function() {
            alert("An error occurred while sending the message.");
        }
    });
}

    </script>
</body>
</html>
