<?php
 include("../landing_page/connection.php");
 session_start();
// $ID = $_SESSION['user_id'];
// $Status = 'Offline';
// $query = "SELECT * FROM player WHERE user_id ='$ID'";
// $result = mysqli_query ($con, $query);

// if($result){
//     $active_query = "UPDATE player SET Activity = '$Status' WHERE user_id='$ID'";
//     $action = mysqli_query ($con, $active_query);
//     session_unset();
//     session_destroy();

//     header("Location: LoginTest.php");
// } else {
//     echo "<script> alert('Something Whent Wrong') </script>";
// }
    unset($_SESSION['username']);
    header("Location:../landing_page/login.php");
?>