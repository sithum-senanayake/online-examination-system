<?php

require('php/config.php'); 
include('php/functions.php');

if(isset($_POST['submit'])){

    //Getting Form Values
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $mobileNo = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $pass = md5($_POST["psw"]);
    $cpass = md5($_POST["repsw"]);
    $user_type = $_POST["user_type"];

    //Checking for Duplicate Values
    $select = "SELECT * FROM user_form WHERE Email = '$email' && password = '$pass'";

    $result = $con->query($select);

    if($result->num_rows > 0){

        msgErr("User already exist!"); 

    }else{

        //Insert Operation
        $insert = "INSERT INTO user_form(Ename,Egender,EPhoneNo,Email,Address,dob,password,User_type) VALUES ('$name', '$gender','$mobileNo','$email','$address','$dob','$pass','$user_type')";
            
        if($con->query($insert)){
            echo '<script>alert("Successfully Registered")</script>';
            // header('location:login.php');
            echo '<script>window.location.href = "login.php"</script>';
        }else{
            die($con->error);
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
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <style type="text/css">
        .nav-bar ul li a{
            cursor: not-allowed;
        }
    </style>

    <title>Register Form</title>

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

<!--Register Form Content-->
    <div class="register" onsubmit="checkPassword()">
        
        <center> <h1>Register Form</h1> </center><br>
    
        <form method="post">

            Full Name : <br>
            <input type="text" name="name" placeholder="Enter Full Name" required>

            Gender : 
            <input type="radio" id="Male" name="gender" value="Male">Male
            <input type="radio" id="Female" name="gender" value="Female">Female<br> <br>

            Mobile Number : <br>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="07XXXXXXXX" required>

            Email : <br>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>

            Address : <br>
            <textarea id="address" name="address" rows="4" cols="50" placeholder="Enter Address"></textarea> 

            Date of Birth : <br>
            <input type="date" name="dob" required>

            Password : <br>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

            Re-enter Password : <br>
            <input type="password" id="repsw" name="repsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

            User Type : <br>
            <select name="user_type" required>
                <option value="employee">Employee</option>
                <option value="exam_admin">Exam Admin</option> 
            </select>
                
            <input type="checkbox" id="checkbox" onclick="enableButton()"> Accept privacy policy and terms <br> <br>

            <input type="submit" name="submit" value="Register" id="submitbtn" disabled><br> 

            <center> <p style="color: black;">Already have an account? <a href="login.php">Login here</a></p> </center>

        </form>

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