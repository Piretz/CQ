<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="styles.css">
  <title>CoDev</title>
</head>
<body>

  <button onclick="openModal('modal1')">Open Level 1</button>
  <button onclick="openModal('modal2')">Open Level 2</button>
  <button onclick="openModal('modal3')">Open Level 3</button>
  <button onclick="openModal('modal4')">Open Level 4</button>
  <button onclick="openModal('modal5')">Open Level 5</button>
  <button onclick="openModal('modal6')">Open Level 6</button>
  <button onclick="openModal('modal7')">Open Level 7</button>
  <button onclick="openModal('modal8')">Open Level 8</button>
  <button onclick="openModal('modal9')">Open Level 9</button>
  <button onclick="openModal('modal10')">Open Level 10</button>
  <button onclick="openModal('modal11')">Open Level 11</button>
  <button onclick="openModal('modal12')">Open Level 12</button>
  <button onclick="openModal('modal13')">Open Level 13</button>
  <button onclick="openModal('modal14')">Open Level 14</button>
  <button onclick="openModal('modal15')">Open Level 15</button>
  

  <!-- Modals -->
  <div id="modals-container">
    <script>
      for (let i = 1; i <= 20; i++) {
        document.write(`
          <div id="modal${i}" class="modal">
            <div class="modal-content">
              <span class="close" onclick="closeModal('modal${i}')">&times;</span>
              <h2>Level ${i}</h2>
              <p>Description for Level ${i} goes here.</p>
            </div>
          </div>
        `);
      }
    </script>
  </div>

  <script>
    function openModal(id) {
      document.getElementById(id).style.display = "block";
    }
    function closeModal(id) {
      document.getElementById(id).style.display = "none";
    }
  </script>

<!-- FOR WEB SYSTEM TOPIC -->

    <!-- LEVEL 1 MODAL -->

    <!-- LEVEL 2 MODAL -->

    <!-- LEVEL 3 MODAL -->

    <!-- LEVEL 4 MODAL -->

    <!-- LEVEL 5 MODAL -->

    <!-- LEVEL 6 MODAL -->

    <!-- LEVEL 7 MODAL -->

    <!-- LEVEL 8 MODAL -->

    <!-- LEVEL 9 MODAL -->

    <!-- LEVEL 10 MODAL -->

    
<!-- FOR WEB SYSTEM TOPIC -->
    <!-- LEVEL 11 MODAL -->

    <!-- LEVEL 12 MODAL -->

    <!-- LEVEL 13 MODAL -->

    <!-- LEVEL 14 MODAL -->

    <!-- LEVEL 15 MODAL -->

    <!-- LEVEL 16 MODAL -->

    <!-- LEVEL 17 MODAL -->

    <!-- LEVEL 18 MODAL -->

    <!-- LEVEL 19 MODAL -->

    <!-- LEVEL 20 MODAL -->



</body>
</html>