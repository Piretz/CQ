<?php
session_start();
include("connection.php");
if(isset($_SESSION['username'])){
    header("Location: ../selectmode/index.php");
 }

if(isset ($_POST['submit'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];
    $role = "Student";
    $levle = 1;
    $progress = 0;
    $next_level = 50;

    $query = "INSERT INTO users (First_Name, Last_Name, User_Name, Email, Birth_Date, User_Password, Role, Level, level_progress, next_level) VALUES ('$name', '$lastname', '$username', '$email', '$birthday', '$password', '$role', '$levle' , '$progress', '$next_level')";
    $result = mysqli_query($con, $query);

    echo "$query";

    if($result){
        header("Location: login.php");
    } else {
        echo "<script> alert('Something Whent Wrong') </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-container">
        <div class="register-panel">
            <img src="img/RegisterLogo.png" alt="Register Logo" class="register-logo">
            <form action="" method="POST" enctype="multipart/form-data" class="registration-form">
                <label for="name">First Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="password">Confirm Password:</label>
                <input type="password" id="password" name="password" required>

                <div class="button-container">
                    <button type="button" class="btn-back">
                        <img src="img/btnback.png" alt="Back">
                    </button>
                    <button type="submit" class="btn-register" name="submit">
                        <img src="img/btnregister.png" alt="Register">
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>