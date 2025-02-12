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
        <!-- Sidebar Buttons HIDE MUNA ONTI DATA HAHAHAHAHAHAHA -->
        <div class="leaderboard-buttons">
            <button class="filter-btn">All</button>
            <button class="filter-btn">Top 10</button>
            <button class="filter-btn">Top 100</button>
        </div>

        <!-- Leaderboard Box -->
        <div class="leaderboard-box">
            <!-- <div class="leaderboard-header">
                <h2>Leaderboard</h2>
                <img src="../img/btnback.png" alt="Back Button" class="back-button">
            </div> -->

            <!-- Scrollable Leaderboard Table -->
            <div class="leaderboard-table">

                        <?php
                        $query = "SELECT leaderboards.Leaderboards_ID, users.First_Name ,users.Last_Name, users.Level, leaderboards.User_Rank FROM leaderboards LEFT JOIN users ON leaderboards.Users_ID = users.User_ID";
                        $result = mysqli_query($con, $query);
                        if(mysqli_num_rows($result) > 0){
                        ?>
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
                       <?php                      
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><img src="../img/lebron.png" class="profile-img"><?php echo $row['Leaderboards_ID']?></td>
                            <td><?php echo $row['First_Name'] . " " . $row['Last_Name']?></td>
                            <td><?php echo $row['Level'] ?></td>
                            <td><?php echo $row['User_Rank'] ?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
                        <?php
                        }else {
                        ?>
                        <h3 style="color:white" >No data found</h3>
                        <?php
                        }
                        ?>
            </div>
        </div>
    </div>

</body>
</html>