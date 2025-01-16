<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

    <?php include '../components/navbar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Leaderboard Panel -->
    <div class="leaderboard-panel">
      <h2>
      Leaderboards
      <!-- <span class="see-all"><a href="#">See All</a></span> -->
    </h2>
      <!-- Top 1-3 in a row -->
      <div class="top-3">
        <div class="player">
          <span class="rank rank-2">2</span>
          <img src="../img/avatar.png" alt="Player 2" class="player-image">
          <span class="player-name">Avatar</span>
        </div>
        <div class="player">
          <span class="rank rank-1">1</span>
          <img src="../img/annette.png" alt="Player 1" class="player-image player-image-1">
          <span class="player-name">Annette</span>
        </div>
        <div class="player">
          <span class="rank rank-3">3</span>
          <img src="../img/john.png" alt="Player 3" class="player-image">
          <span class="player-name">John</span>
        </div>
      </div>

            <!-- Top 4-10 in a column -->
      <div class="top-4-10">
        <div class="player">
          <span class="rank">4</span>
          <img src="../img/annette.png" alt="Player 4" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS101</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">5</span>
          <img src="../img/avatar.png" alt="Player 5" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS102</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">6</span>
          <img src="../img/annette.png" alt="Player 6" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS103</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">7</span>
          <img src="../img/john.png" alt="Player 7" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS104</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">8</span>
          <img src="../img/avatar.png" alt="Player 8" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS105</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">9</span>
          <img src="../img/annette.png" alt="Player 9" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS106</span> <!-- Player Course -->
        </div>
        <div class="player">
          <span class="rank">10</span>
          <img src="../img/avatar.png" alt="Player 10" class="player-image">
          <span class="player-name">John Doe</span>
          <span class="player-course">CS107</span> <!-- Player Course -->
        </div>
      </div>
    </div>

    
    <!-- Image at the top of the swiper slider -->
    <div class="intro-image">
      <img src="../img/introtxt.png" alt="Intro Text">
    </div>
    <div class="swiper-container">    
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="picture">
            <img src="../img/multimode.png" alt="">
          </div>
        </div>
    
        <div class="swiper-slide">
          <div class="picture">
            <img src="../img/solomode.png" alt="">
          </div>
        </div>
    
        <div class="swiper-slide">
          <div class="picture">
            <img src="../img/practicemode.png" alt="">
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
      <h3>Panel Title</h3>
      <p>This is a description inside the panel box.</p>
    </div>
    
    
  </main>
  
</body>
</html>
