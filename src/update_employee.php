<?php

require('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

//Reading Employee Details
$id = $_GET['updateid'];

$sql = "SELECT * FROM user_form WHERE id = $id";

$results = $con->query($sql);

$row = $results->fetch_assoc();

$name = $row['Ename'];
$user_gender = $row['Egender'];
$phone = $row['EPhoneNo'];
$email = $row['Email'];
$address = $row['Address'];
$dob = $row['dob'];
$user_type = $row['User_type'];

//Update Employee Details
if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $mobileNo = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["w3review"];
    $dob = $_POST["dob"];
    $user_type = $_POST["user_type"];

    $sql = "UPDATE user_form set id=$id, Ename='$name', Egender='$gender', EPhoneNo=$mobileNo, Email='$email',Address='$address',dob='$dob',User_type='$user_type' WHERE id = $id"; 

    $results = $con->query($sql);

    if($results){
        echo '<script>alert("Updated Successfully");</script>';

        //Checking the user to redirect
        if($_SESSION['account'] == 'employee'){

            echo '<script>window.location.href = "employee_profile.php";</script>';
        }elseif($_SESSION['account'] == 'exam_admin'){

            echo '<script>window.location.href = "exam_admin_profile.php";</script>';
        }elseif($_SESSION['account'] == 'admin'){

            echo '<script>window.location.href = "admin_profile.php";</script>';
        }
    }else{
        die($con->error);
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
    <link rel="stylesheet" type="text/css" href="styles/update_employee.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>


    <title>Update Page</title>

</head>
<body>

<!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="exam_registration.php">Registration</a></li>
                <li><a href="exam_results.php">Results</a></li>
                <li><a href="exam_information.php">Information</a></li>
                <li><a href="attempt_exam.php">Attempt Exam</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <!--displaying user email and directing to user profile-->
            <?php

            $logOut = "<a href='logout.php' class='logout'>Log Out</a>";

            if(isset($_SESSION['account']) && $_SESSION['account'] == "employee"){

                echo('  <p>
                        <a href="employee_profile.php" class="user-display">
                                '.$_SESSION['user_email'].'
                        </a> </p>');
                echo($logOut);

            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "exam_admin"){
                
                echo('  <p>
                        <a href="exam_admin_profile.php" class="user-display">
                                '.$_SESSION['user_email'].'
                        </a> </p>');
                echo($logOut);

            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "admin"){
                
                echo('  <p>
                        <a href="admin_profile.php" class="user-display" style="text-transform: uppercase;">
                        Admin Profile</a> </p>');
                echo($logOut);
            }

            ?>
        </div>
    </nav>

<!--Update Form Content-->
    <div class="Update" onsubmit="checkPassword()">
        
        <center> <h1>Update Employee Profile</h1> </center><br>
        
        <form method="post">

            Full Name : <br>
            <input type="text" name="name" placeholder="Enter Full Name" value ="<?php echo $name?>" required>

            Gender:
            <input type="radio" id="Male" name="gender" value="Male" <?php if ($user_gender == "Male") echo "checked" ?>>Male
            <input type="radio" id="Female" name="gender" value="Female" <?php if ($user_gender == "Female") echo "checked" ?>>Female<br><br>

            Mobile Number : <br>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="07XXXXXXXX" value="<?php echo "0".$phone ?>" required>

            Email : <br>
            <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo $email?>"required>

            Address : <br>
            <textarea id="w3review" name="w3review" rows="4"cols="50" placeholder="Enter Address"><?php echo $address ?></textarea> 

            Date of Birth : <br>
            <input type="date" name="dob" value="<?php echo $dob ?>" required>

            User Type : <br>
            <select name="user_type" required>
                <option value="employee" selected>Employee</option>
                <option value="exam_admin">Exam Admin</option> 
            </select>

            <input type="submit" name="submit" value="Update" id="submitbtn"><br> 

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