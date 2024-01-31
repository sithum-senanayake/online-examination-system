<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
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
    <link rel="stylesheet" type="text/css" href="styles/attempt_exam.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Attempt Exam</title>

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
                <li><a href="attempt_exam.php" style="color: orange;">Attempt Exam</a></li>
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

<!--Attempt Exam Content-->
    <div class="attempt-container">
        <h2>Attempt Exam</h2>
        <form>
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

            <label for="employee-id">Employee ID:</label>
            <input type="text" id="employee-id" name="employee-id" placeholder="Enter Employee ID" value="<?php echo $_SESSION['user_ID'] ?>" required >

            <label for="quiz-password">Quiz Password:</label>
            <input type="password" id="quiz-password" name="quiz-password" placeholder="Enter Quiz Password" required>

            <input type="button" value="Attempt Exam" onclick="errorMessage()">
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