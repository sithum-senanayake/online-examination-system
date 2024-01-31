<?php
require('php/config.php'); 
include('php/functions.php');

session_start();

if(isset($_POST['submit'])){

    //getting login form values
    $email = $_POST["email"];
    $pass = md5($_POST["password"]);

    //checking user type
    if ($email == "admin@gmail.com"){
        $_SESSION['user_email'] = "admin@gmail.com";
        $_SESSION['user_ID'] = "0";
        $_SESSION['user_name'] = "Admin";
        $_SESSION['account'] = "admin";
        header("location: admin_profile.php");
        die;
    }else{

    //reading user data using email and password
    $select = "SELECT * FROM user_form WHERE Email = '$email' AND password = '$pass'";

    $result = $con->query($select);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        //checking user type
        if ($row['User_type'] == 'employee') { 

            $_SESSION['user_email'] = $row['Email'];
            $_SESSION['user_ID'] = $row['id'];
            $_SESSION['user_name'] = $row['Ename'];
            $_SESSION['account'] = "employee";
            header('location:index.php');
            die;
        
        //checking user type
        }elseif ($row['User_type'] == 'exam_admin') {

            $_SESSION['user_email'] = $row['Email'];
            $_SESSION['user_ID'] = $row['id'];
            $_SESSION['user_name'] = $row['Ename'];
            $_SESSION['account'] = "exam_admin";
            header('location:exam_admin_profile.php'); 
            die;
        }
    }else{ 
        //calling msgErr function from functions.php file
        msgErr("Login Failed. Please enter the correct email and password. (Please check the READ ME file for the password)"); 
    }
    
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css file link-->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <style type="text/css">
        .nav-bar ul li a{
            cursor: not-allowed;
        }
    </style>

    <title>Login Page</title>

</head>
<body>

<!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Results</a></li>
                <li><a href="#">Information</a></li>
                <li><a href="#">Attempt Exam</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <button class="nav-btn" onclick="location.href='login.php'">Log In</button>
            <button class="nav-btn" onclick="location.href='register.php'">Sign In</button>
        </div>
    </nav>

<!--Login form content-->
    <div class="banner-login">
        <div class="login-container">
            <h1>Login</h1>

            <form method="post">

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required autocomplete="off">

                <label for="password">Password :</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="off">

                <input type="submit" name="submit" value="Log in">

                <center> <p style="color: black;">Don't have an account?  <a href="register.php" class="create-account">Create Account</a></p> </center>
            </form>
        </div>
    </div>

<!--Footer Content-->
<footer class="footer">
     <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Exam Registration</a></li>
                    <li><a href="#">Exam Results</a></li>
                    <li><a href="#">Exam Information</a></li>
                    <li><a href="#">Attempt Exam</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Gamil</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Account</h4>
                <ul>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
     </div> <br>
     <center><p>IWT Final Project - 2023</p></center>
  </footer>

</body>
</html>