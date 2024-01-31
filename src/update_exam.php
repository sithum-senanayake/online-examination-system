<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<?php 

    //Read Exam Details
    $examID = $_GET['updateid']; 
    
    $sql = "SELECT * FROM exam WHERE examID = '$examID'";

    $results = $con->query($sql);

    $row = $results->fetch_assoc();

        $exam_name = $row['exam_name'];
        $exam_date = $row['exam_date']; 
        $instructions = $row['instructions']; 

    //Update Exam Operation
    if (isset($_POST['submit'])){

        $examName = $_POST['examName']; 
        $examDate = $_POST['examDate'];
        $Einstructions = $_POST['instructions'];

        $update = "UPDATE exam SET exam_name = '$examName', exam_date = '$examDate', instructions = '$Einstructions' WHERE examID = '$examID'";

        if ($con->query($update)) {
            echo '<script>alert("Successfully Updated!");</script>';
        } else {
            die($con->error);
        }

        //Update exam_name in employee_exam table
        $update2 = "UPDATE employee_exam SET exam_name = '$examName' WHERE examID = '$examID'";

        $con->query($update2);

        //Update exam_name in results table
        $update3 = "UPDATE results SET exam_name = '$examName' WHERE examID = '$examID'";

        $con->query($update3);
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
    <link rel="stylesheet" type="text/css" href="styles/update_exam.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Update Exam</title>

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

<!--Update Exam Content-->
    <div class="add-exam-container">
    <h2>Update Exam</h2>
    <form method="post">
        <label for="examName">Exam Name:</label> 
        <input type="text" id="examName" value="<?php echo $exam_name; ?>" name="examName" placeholder="Enter Exam Name" required>

        <label for="ExamDate">Exam Date:</label>
        <input type="date" name="examDate" value="<?php echo $exam_date;?>" required>

        <label for="instructions">Exam Instructions:</label>
        <textarea id="instructions" name="instructions" rows="4" cols="50" placeholder="Enter Instructions"><?php echo $instructions ?></textarea>

        <input type="submit" name="submit" value="Update Exam">
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