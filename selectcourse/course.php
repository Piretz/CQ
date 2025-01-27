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
          // Now, you can use $mode to load specific content or handle the selected mode
        }
      ?>

            <!-- Main Content -->
        <main class="main-content">
            <!-- Image at the top of the swiper slider -->
          <!-- <div class="intro-image">
            <img src="../img/lblcourse.png" alt="Intro Text">
          </div> -->
          <div class="swiper-container">    
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/csscourse.png" alt="" id="">
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/html.png" alt="" id="">
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="picture">
                  <img src="../img/jscourse.png" alt="" id="">
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