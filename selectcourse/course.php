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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

          <?php include '../components/navbar.php'; ?>

                <?php
        if (isset($_GET['mode'])) {
          $mode = $_GET['mode'];
          
        }
      ?>

            <!-- Main Content -->
        <main class="main-content">
          <!-- back button and align at the top of right -->
          
            <a href="../selectmode/mode.php" class="back-button" style="position: absolute; top: 150px; right: 300px;">
              <img src="../img/btnback.png" alt="Back Button" class="btnswiper-back-button">
            </a>
        
          <div class="swiper-container">
            
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/csscourse.png" alt="CSS" id="">
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/html.png" alt="HTML" id="">
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/js.png" alt="JS" id="">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/python.png" alt="PYTHON" id="">
                </div>
              </div>
            </div>
          
            <div class="swiper-pagination"></div>
          </div>
          
          <script>
            var swiper = new Swiper(".swiper-container", {
              effect: "coverflow",
              grabCursor: true,
              centeredSlides: true,
              slidesPerView: "auto",
              initialSlide: 1, // Make sure the first slide (HTML) is visible on load
              coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 350,
                modifier: 1,
                slideShadows: true
              },
              pagination: {
                el: ".swiper-pagination"
              }
            });
          </script>
          
          <div class="panel-box">
            
          </div>

         

        </main>
    </body>
</html>