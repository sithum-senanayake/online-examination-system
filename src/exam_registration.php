<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<?php 
    if (isset($_POST['submit'])) {

        //Getting form values and empID form session
        $empid = $_SESSION['user_ID'];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $date = $_POST["date"];
        $select_exam = $_POST["exam"];
        
        //Reading Exam ID
        $select = "SELECT examID FROM exam WHERE exam_name = '$select_exam'";

        $results = $con->query($select);

        $row = $results->fetch_assoc();

        $examID = $row['examID'];
        
        //Checking for Duplicate Values
        $sql = "SELECT * FROM employee_exam WHERE examID = '$examID' AND empID = '$empid'";

        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            echo '<script>alert("You are already registered to this exam!");</script>';
        } else {

            //checking user types
            if(isset($_SESSION['account']) && $_SESSION['account'] == "exam_admin"){
                echo '<script>alert("Sorry! only employees can register to exams.");</script>';
                
            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "admin"){
                echo '<script>alert("Sorry! only employees can register to exams.");</script>';

            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "employee"){

                //Insert Operation
                $insert = "INSERT INTO employee_exam (empID, examID, exam_name, edate, ename, email) 
                           VALUES ('$empid', '$examID', '$select_exam', '$date', '$name', '$email')";

                if ($con->query($insert)) {
                    echo '<script>alert("Successfully Registered to the Exam!");</script>';
                    echo '<script>window.location.href = "employee_profile.php";</script>';
                } else {
                    die($con->error);
                }

            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css file link-->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/exam_registration.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Exam Registration</title>

</head>
<body>

<!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="exam_registration.php" style="color: orange;">Registration</a></li>
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

<!--Exam Registration Content-->
    <div class="registration-container">
        <h2>Exam Registration</h2>
        <form method="post">
            
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo $_SESSION['user_name']?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['user_email']?>" required>

            <label for="exam">Select Exam:</label>

            <?php
                //getting exam names from the database
                $query = "SELECT exam_name FROM exam";
                $result = $con->query($query);

                if ($result->num_rows > 0) {
            ?>
                <select id="exam" name="exam" required>
                    <option value="" disabled selected>Select an exam</option>
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            $examName = $row['exam_name'];
                            echo "<option>$examName</option>";
                        }
                    ?>
                </select>
            <?php
                } else {
                    echo "No exams found.";
                }
            ?>

            <label for="date">Select Date:</label>
            <input type="date" name="date" required>

            <input type="submit" name="submit" value="Register Exam">
        </form>
    </div>

<!--Footer Content-->
<footer class="footer">
     <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="exam_registration.php">Exam Registration</a></li>
                    <li><a href="exam_results.php">Exam Results</a></li>
                    <li><a href="exam_information.php">Exam Information</a></li>
                    <li><a href="attempt_exam.php">Attempt Exam</a></li>
                    <li><a href="about.php">About Us</a></li>
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