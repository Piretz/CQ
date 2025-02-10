<?php
include ('../auth/connection.php');
session_start();

// add for ofline online status

if(isset($_SESSION['ID'])){
session_unset();
session_destroy();

 header('location: ../index.php');
} else {
     echo "<script>alert('Error')</script>";
    header('location: ../index.php');
}
?>