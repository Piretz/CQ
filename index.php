<?php
include("connection/connection.php");
session_start();
if (isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE Email='$username' AND User_Password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1){
        $rows = mysqli_fetch_array($result);
        $_SESSION['ID'] = $rows['User_ID'];
        header("Location: ../selectmode/mode.php");
    } else {
        echo "<script>alert('Invalid username or password. Please try again.')</script>";
    }
}

if (isset($_POST['signup'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if ($password != $confirmPassword){
        echo "<script>alert('Passwords do not match. Please try again.')</script>";
    } else {
        $query = "INSERT INTO users (First_Name, Last_Name, Birth_Date, Efmail, Role, user_type, Level, level_progress, next_level, User_Password) VALUES ('$firstName', '$lastName', '$birthday', '$email', 'Student','New', 1, 0, 50, '$password')";
        $result = mysqli_query($con, $query);
        if ($result){
            echo "<script>alert('success')</script>";
        } else {
            echo "<script>alert('not success')</script>";
        }
    }
}    

  

if(isset($_SESSION['ID'])){
    header("Location: selectmode/mode.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Landing Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

            <header>
                <div class="logo"><img src="./img/logo.png" alt="Description of Image"></div>
                <nav>
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#courses" class="nav-link">Courses</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </nav>
                <div>
                    <button class="btn login-btn" id="loginBtn">Login</button>
                    <button class="btn signup-btn" id="signupBtn">Sign Up</button>
                </div>
            </header>

            <div class="main-section" id="home">
                <div class="images-container">
                <img src="./img/Cipherion.png" alt="Cipherion Image" class="cipherion-img">
                <img src="./img/play.png" alt="Play Image" class="play-img" id="playBtn" >
                </div>
            </div>


            <div class="content-about" id="about">
                <div class="images-container">
                    <img src="./img/Ellipse2.png" alt="Ellipse 1" class="ellipse-1">
                    <img src="./img/aboutellipse.png" alt="Ellipse 2" class="ellipse-2">
                    <div class="grid-container">
                        <div class="logo-container">
                            <img src="./img/logoabout.png" alt="Logo" class="logo-about">
                        </div>
                        <div class="text-container">
                            <h1>CoDev</h1>
                            <p>Welcome to CIPHERION, a revolutionary learning platform designed exclusively for Information Technology and Computer Sciencce students at Quezon City University. This gamified project transforms traditional programming lessons into an immersive, quest-driven experience.
                                Students will embark on exciting missions, tackling progressively challenging coding puzzles, collaborating on dynamic group projects, and mastering essential programming concepts through hands-on exploration. CIPHERION promotes teamwork, problem-solving, and creative thinking while fostering a vibrant community of future tech leaders.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-testimonial">
                <div class="testimonial-column">
                    <h2>500+</h2>
                    <p>Happy users who trust our platform to achieve their learning goals.</p>
                </div>
                <div class="testimonial-column">
                    <h2>500+</h2>
                    <p>Hours of content available to enhance your knowledge and skills.</p>
                </div>
                <div class="testimonial-column">
                    <h2>700+</h2>
                    <p>Courses covering various fields, from technology to personal development.</p>
                </div>
                <div class="testimonial-column">
                    <h2>800+</h2>
                    <p>Positive reviews from learners worldwide, appreciating our quality content.</p>
                </div>
            </div>


            <div class="content-courses" id="courses">
                <div class="courses-container">
                    <div class="text-content">
                        <h1>Courses Offered</h1>
                        <p>Cipherion offers a diverse range of courses designed to equip IT students with essential skills for the tech industry. From foundational topics like HTML, CSS, and JavaScript for building responsive and interactive websites to advanced programming in Java and Python, students gain hands-on experience in solving real-world problems. Additional courses in database management and game development provide opportunities to explore specialized fields, ensuring a well-rounded and engaging learning journey.</p>
                    </div>
                    <div class="image-content">
                        <img src="./img/courses.png" alt="Courses" class="courses-img">
                    </div>
                </div>
            </div>

            <div class="content-feedback">
                <div class="feedback-container">
                    <!-- Left Section -->
                    <div class="feedback-left">
                        <h1>What People Say</h1>
                        <div class="review-wrapper">
                            <div class="ellipse-read"></div>
                            <div class="review-image">
                                <h2>Read Review on Steam</h2>
                                <p>95% Positive Reviews</p>
                            </div>
                        </div>
                    </div>
                    <!-- Right Section -->
                    <div class="feedback-right">
                        <p class="quote">"This platform is amazing! It has transformed the way I learn and grow."</p>
                        <p class="author">- John Doe</p>
                        <p class="quote">"This platform is amazing! It has transformed the way I learn and grow."</p>
                        <p class="author">- John Doe</p>
                        <p class="quote">"This platform is amazing! It has transformed the way I learn and grow."</p>
                        <p class="author">- John Doe</p>
                        <p class="quote">"This platform is amazing! It has transformed the way I learn and grow."</p>
                        <p class="author">- John Doe</p>
                        <p class="quote">"This platform is amazing! It has transformed the way I learn and grow."</p>
                        <p class="author">- John Doe</p>
                    </div>
                </div>
            </div>

            <div class="content-contact" id="contact">
                <div class="contact-container">
                    <!-- Column 1 -->
                    <div class="contact-column">
                        <h3>ON OUR SITE</h3>
                        <p>Discover the best learning materials and resources on our platform.</p>
                    </div>
                    <!-- Column 2 -->
                    <div class="contact-column">
                        <h3>SUPPORT</h3>
                        <p>Need help? Reach out to our support team for assistance.</p>
                    </div>
                    <!-- Column 3 -->
                    <div class="contact-column">
                        <h3>USES</h3>
                        <p>Explore how our platform enhances your learning experience.</p>
                    </div>
                    <!-- Column 4 -->
                    <div class="contact-column">
                        <h3>GET IN TOUCH</h3>
                        <p>
                            <a href="capstone.gamified@gmail.com" class="contact-link">capstone.gamified@gmail.com</a>
                        </p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://plus.google.com" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="contact-footer">
                    <p class="footer-left">©2024 All Rights Reserved</p>
                    <p class="footer-right">
                        <a href="#" class="footer-link">Terms and Conditions</a>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </p>
                </div>
            </div>

            <script>
                // Select all nav links
            const navLinks = document.querySelectorAll('.nav-link');

            // Add an event listener to each link
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Remove active class from all links
                    navLinks.forEach(link => link.classList.remove('active'));
                    
                    // Add active class to the clicked link
                    this.classList.add('active');
                });
            });

            </script>

          <!-- Login Modal -->
            <div class="login-modal" id="loginModal">
                <div class="loginmodal-content">
                    
                    <!-- Login Logo -->
                    <img src="./img/loginlogo.png" alt="Login Logo" class="login-logo">
                    
                    <!-- Close Button -->
                    <span class="close-btn" id="closeBtn">
                        <img src="./img/btnbackcourse.png" alt="Close">
                    </span>

                    <h2>LOGIN</h2>

                    <div class="form-container">
                        <form method="POST">
                            
                            <!-- Username Input -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <div class="input-group">
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" id="username" placeholder="Ex: John Doe" name="username" required>
                                </div>
                            </div>
                            
                            <!-- Password Input -->
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input type="password" id="password" placeholder="********" name="password" required>
                                    <i class="fas fa-eye-slash eye-icon" id="togglePassword"></i>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="Submit" name="login" value="login" class="btn login-submit">
                                <img src="./img/btnlogin.png" alt="Login" class="btn-img">
                            </button>
                        </form>
                    </div>
                </div>
            </div>


          <!-- Sign Up Modal Structure -->
        <div class="signup-modal" id="signupModal">
            <div class="signupmodal-content">
                
                <!-- Header Section -->
                <div class="signupmodal-header">
                    <!-- Close Button -->
                    <span class="close-btn" id="closeSignupBtn"><img src="./img/btnbackcourse.png" alt="Close"></span>
                    <h2>SIGN UP</h2>
                </div>

                <!-- Signup Logo -->
                <img src="./img/signuplogo.png" alt="Login Logo" class="signup-logo">

                <!-- Form Container -->
                <div class="signupform-container">
                    <form method="POST">
                        
                        <!-- First Row -->
                        <div class="signupform-row">
                            <div class="signupform-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" id="firstName" name="firstName" required placeholder="Ex: John">
                            </div>
                            <div class="signupform-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" id="lastName" name="lastName" required placeholder="Ex: Doe">
                            </div>
                            <div class="signupform-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required placeholder="Ex: johndoe123">
                            </div>
                        </div>

                        <!-- Second Row -->
                        <div class="signupform-row">
                            <div class="signupform-group">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email" required placeholder="Ex: johndoe@example.com">
                            </div>
                            <div class="signupform-group">
                                <label for="birthday">Birthday:</label>
                                <input type="date" id="birthday" name="birthday" required>
                            </div>
                        </div>

                        <!-- Third Row -->
                        <div class="signupform-row">
                            <div class="signupform-group">
                                <label for="password">Password:</label>
                                <div class="password-container">
                                    <input type="password" id="password" name="password" required placeholder="********">
                                    <i class="fas fa-eye-slash" id="togglePassword" onclick="togglePasswordVisibility('password')"></i>
                                </div>
                            </div>
                            <div class="signupform-group">
                                <label for="confirmPassword">Confirm Password:</label>
                                <div class="password-container">
                                    <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="********">
                                    <i class="fas fa-eye-slash" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirmPassword')"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="signupform-group terms-container">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I have read the Terms and Conditions</label>
                        </div>

                        <!-- Sign up button -->
                        <div class="btnsignupform-group">
                            <button type="Submit" name="signup" value="signup" class="btn signup-submit">
                                <img src="./img/btnregister.png" alt="signup">
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

            <script>
                // Get the modal
                var modal = document.getElementById("loginModal");
                var closeBtn = document.getElementById("closeBtn");
                

                // Get the button that opens the modal
                var btn = document.getElementById("loginBtn");
                

                // Get the <span> element that closes the modal
                var closeBtn = document.getElementById("closeBtn");

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "flex";  // Show the modal
                    
                }

                // When the user clicks on <span> (x), close the modal
                closeBtn.onclick = function() {
                    modal.style.display = "none";  // Hide the modal
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";  // Hide the modal
                    }
                }
            </script>

            <script>
                var playmodal = document.getElementById("loginModal");
                
                var btn = document.getElementById("playBtn");

                btn.onclick = function() {
                    playmodal.style.display = "flex";  // Show the modal
                    
                }
                </script>

            <script>
                // Show/Hide password functionality
            const togglePassword = document.getElementById("togglePassword");
            const passwordField = document.getElementById("password");

            togglePassword.addEventListener("click", function () {
                const type = passwordField.type === "password" ? "text" : "password";
                passwordField.type = type;

                // Toggle eye icon between show/hide
                togglePassword.classList.toggle("fa-eye-slash");
                togglePassword.classList.toggle("fa-eye");
            });

            </script>

            <script>
                // Get the body and modal
            var body = document.body;
            var modal = document.getElementById("loginModal");

            // When the user clicks the button, open the modal and blur the background
            btn.onclick = function() {
                modal.style.display = "flex";  // Show the modal
                body.classList.add("blur-background");  // Apply the blur effect
            }

            // When the user clicks on <span> (x), close the modal and remove the blur effect
            closeBtn.onclick = function() {
                modal.style.display = "none";  // Hide the modal
                body.classList.remove("blur-background");  // Remove the blur effect
            }

            // When the user clicks anywhere outside of the modal, close it and remove the blur
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";  // Hide the modal
                    body.classList.remove("blur-background");  // Remove the blur effect
                }
            }

            </script>

            <!-- SIGN UP MODAL SCRIPT -->
            <script>
            // SIGN UP MODAL SCRIPT
            var signupModal = document.getElementById("signupModal");
            var modal = document.getElementById("loginModal");
            var signupBtn = document.getElementById("signupBtn");
            var closeSignupBtn = document.getElementById("closeSignupBtn");

            // When the user clicks the Sign Up button, open the modal
            signupBtn.onclick = function() {
                signupModal.style.display = "flex";  // Show the modal
            }

            // When the user clicks on the close button (Sign Up modal), close the modal
            closeSignupBtn.onclick = function() {
                signupModal.style.display = "none";  // Hide the modal
                loginModal.style.display = "flex";
            }

            // When the user clicks anywhere outside the modal (signup), close it
            window.onclick = function(event) {
                if (event.target == signupModal) {
                    signupModal.style.display = "none";  // Hide the modal
                }
            }

            </script>

            <!-- sign up confirm password -->
            <script>
            // Function to toggle password visibility
            function togglePasswordVisibility(id) {
                const passwordField = document.getElementById(id);
                const icon = document.getElementById('toggle' + id.charAt(0).toUpperCase() + id.slice(1));

                // Check if the input type is 'password' and toggle to 'text'
                if (passwordField.type === "password") {
                    passwordField.type = "text"; // Show the password
                    icon.classList.remove('fa-eye-slash'); // Change icon to eye
                    icon.classList.add('fa-eye');
                } else {
                    passwordField.type = "password"; // Hide the password
                    icon.classList.remove('fa-eye'); // Change icon back to eye-slash
                    icon.classList.add('fa-eye-slash');
                }
            }


            </script>
</body>
</html>
