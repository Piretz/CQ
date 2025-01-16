<?php
include("Connection.php");
session_start();

if(isset($_SESSION['username'])){
   header("Location: ../selectmode/index.php");
}

if(isset($_POST['submit'])){
$User = $_POST['username'];
$Pass = $_POST['password'];

$query = "SELECT * FROM users WHERE User_Name ='$User' AND User_Password ='$Pass'";
$result = mysqli_query ($con, $query);

if(mysqli_num_rows($result) == 1){
    $_SESSION['username'] = $User;
    header("Location: ../selectmode/index.php");
} else {
    echo "<script> alert('Invalid Username or Password') </script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form  action="" method="POST" class="login-email">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit"  name="submit" >Login</button>
        </form>
    </div>
</body>
</html>