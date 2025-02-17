<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if (!isset($_SESSION['ID'])) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoDev</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../components/styles.css">
</head>
<body>

  <?php include '../components/navbar.php'; ?>

  <main class="main-content">
    <!-- Back Button -->
    <div class="back-course">
      <a href="../practicemode_carousel/practice_mode.php">
        <img src="../img/btnback.png" alt="Back Button" class="btn-back">
      </a>
    </div>

    <!-- Selection Cards -->
    <div class="selection-container">
      <div class="selection-card" >
        <img src="../img/html.png" alt="HTML">
        <div class="overlay">HTML</div>
      </div>

      <div class="selection-card" >
        <img src="../img/csscourse.png" alt="CSS">
        <div class="overlay">CSS</div>
      </div>

      <div class="selection-card" >
        <img src="../img/js.png" alt="JavaScript">
        <div class="overlay">JavaScript</div>
      </div>

      <div class="selection-card" >
        <img src="../img/python.png" alt="Python">
        <div class="overlay">Python</div>
      </div>
    </div>

  </main>

      <!-- Selection Modal Popup -->
    <div id="selectionModal" class="selection-modal">
        <div class="selection-modal-content">
            <span class="selection-close-modal"><img src="../img/btnback.png" alt="Close"></span>
            <div class="selection-button-container">
                <button class="selection-modal-btn">
                    <img src="../img/btnCreateLobby.png" alt="Create">
                </button>
                <button class="selection-modal-btn">
                    <img src="../img/btnJoinLobby.png" alt="Join">
                </button>
            </div>
        </div>
    </div>

<!-- Create Lobby Modal -->
<div id="createlobbyModal" class="creating-modal">
    <div class="createlobby-modal-content">
        <span class="createlobby-close-modal">
            <img src="../img/btnback.png" alt="Close">
        </span>
        <div class="createlobby-container">
            <input type="text" id="lobbyName" class="createlobby-input" placeholder="Enter Lobby Name">
            <button id="createLobbyBtn" class="createlobby-modal-btn">
                <img src="../img/btnCreate.png" alt="Create Lobby" onclick="window.location.href='../practice-lobby/userslobby.php';">
            </button>
        </div>
    </div>
</div>

<!-- Join Lobby Modal -->
<div id="joinlobbyModal" class="joining-modal">
    <div class="joinlobby-modal-content">
        <span class="joinlobby-close-modal">
            <img src="../img/btnback.png" alt="Close">
        </span>
        <div class="joinlobby-container">
            <input type="text" id="lobbyName" class="joinlobby-input" placeholder="Enter Lobby ID">
            <button id="joinLobbyBtn" class="joinlobby-modal-btn">
                <img src="../img/btnJoin.png" alt="Join Lobby"  onclick="window.location.href='../practice-lobby/userslobby.php';" >
            </button>
        </div>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
    // Get modals
    const selectionModal = document.getElementById("selectionModal");
    const createLobbyModal = document.getElementById("createlobbyModal");
    const joinLobbyModal = document.getElementById("joinlobbyModal");

    // Get buttons inside selection modal
    const createLobbyBtn = document.querySelector(".selection-modal-btn img[alt='Create']").parentElement;
    const joinLobbyBtn = document.querySelector(".selection-modal-btn img[alt='Join']").parentElement;

    // Get close buttons
    const closeSelectionModal = document.querySelector(".selection-close-modal img").parentElement;
    const closeCreateLobbyModal = document.querySelector(".createlobby-close-modal img").parentElement;
    const closeJoinLobbyModal = document.querySelector(".joinlobby-close-modal img").parentElement;

    // Show selection modal when a selection card is clicked
    document.querySelectorAll(".selection-card").forEach(card => {
        card.addEventListener("click", function () {
            selectionModal.style.display = "flex";
        });
    });

    // Show Create Lobby modal & close selection modal
    createLobbyBtn.addEventListener("click", function () {
        selectionModal.style.display = "none"; // Close selection modal
        createLobbyModal.style.display = "flex"; // Open create lobby modal
        joinLobbyModal.style.display = "none"; // Ensure join lobby modal is closed
    });

    // Show Join Lobby modal & close selection modal
    joinLobbyBtn.addEventListener("click", function () {
        selectionModal.style.display = "none"; // Close selection modal
        createLobbyModal.style.display = "none"; // Ensure create lobby modal is closed
        joinLobbyModal.style.display = "flex"; // Open join lobby modal
    });

    // Close selection modal
    closeSelectionModal.addEventListener("click", function () {
        selectionModal.style.display = "none";
    });

    // Close create lobby modal
    closeCreateLobbyModal.addEventListener("click", function () {
        createLobbyModal.style.display = "none";
        selectionModal.style.display = "flex";
    });

    // Close join lobby modal
    closeJoinLobbyModal.addEventListener("click", function () {
        joinLobbyModal.style.display = "none";
        selectionModal.style.display = "flex  ";
    });

    // Close modals when clicking outside content
    window.addEventListener("click", function (event) {
        if (event.target === selectionModal) {
            selectionModal.style.display = "none";
        }
        if (event.target === createLobbyModal) {
            createLobbyModal.style.display = "none";
        }
        if (event.target === joinLobbyModal) {  
            joinLobbyModal.style.display = "none";
        }
    });
});



</script>

</body>
</html>
