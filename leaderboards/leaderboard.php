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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css'><link rel="stylesheet" href="../components/styles.css"> <!-- External CSS file -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js'></script>
  <title>CoDev</title>
</head>
<body>

<?php include '../components/navbar.php'; ?>
<div class="leaderboard-container">
        <!-- Sidebar Buttons -->
        <div class="leaderboard-buttons">
            <button class="filter-btn">All</button>
            <button class="filter-btn">Top 10</button>
            <button class="filter-btn">Top 100</button>
        </div>

        <!-- Leaderboard Box -->
        <div class="leaderboard-box">
            <div class="leaderboard-header">
                <h2>Leaderboard</h2>
                <!-- <img src="../img/btnback.png" alt="Back Button" class="back-button"> -->
            </div>

            <!-- Scrollable Leaderboard Table -->
            <div class="leaderboard-table">
                <table>
                    <thead>
                        <tr>
                            <th>Top</th>
                            <th>Player Name</th>
                            <th>Level</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Data, you can populate this dynamically -->
                        <tr>
                            <td><img src="../img/lebron.png" class="profile-img"> 1</td>
                            <td>Christopher Potter</td>
                            <td>50</td>
                            <td>Diamond</td>
                        </tr>
                        <tr>
                            <td><img src="../img/annette.png" class="profile-img"> 2</td>
                            <td>Michael Smith</td>
                            <td>48</td>
                            <td>Gold</td>
                        </tr>
                        <tr>
                            <td><img src="../img/john.png" class="profile-img"> 3</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/avatar.png" class="profile-img"> 4</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/john.png" class="profile-img"> 5</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/john.png" class="profile-img"> 6</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/john.png" class="profile-img"> 7</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/lebron.png" class="profile-img"> 8</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/john.png" class="profile-img"> 9</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                        <tr>
                            <td><img src="../img/avatar.png" class="profile-img"> 10</td>
                            <td>Jane Doe</td>
                            <td>45</td>
                            <td>Platinum</td>
                        </tr>
                       
                        <!-- More rows (up to 100) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>