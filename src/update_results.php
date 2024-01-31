<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<?php 

    //Read Results Details
    $resultID = $_GET['updateid'];

    $sql = "SELECT * FROM results WHERE resultID = '$resultID'";

    $result = $con->query($sql);

    $row = $result->fetch_assoc(); 

        $exam_name = $row['exam_name'];
        $employee_name = $row['employee_name'];
        $marks = $row['marks'];


    //Update Results Operation
    if (isset($_POST['submit'])){

        $exam = $_POST['selectExam'];
        $employee = $_POST['selectEmployee'];
        $marks = $_POST['marks'];

        $update = "UPDATE results SET exam_name ='$exam', employee_name = '$employee', marks = '$marks' WHERE resultID = '$resultID'";

        if($con->query($update)){
            echo '<script>alert("Successfully Updated!");</script>';
        }else{
            die($con->error);
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
    <link rel="stylesheet" type="text/css" href="styles/add_results.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Update Results</title>

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

<!--Update Results Content-->
    <div class="add-result-container">

    <h2>Update Results</h2>

    <form method="post">
        
        <label for="selectExam">Select Exam:</label>

        <?php
            // Getting exam names from the database
            $query = "SELECT exam_name FROM exam";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                $defaultExam = $exam_name; // Setting default value
            
                echo '<select name="selectExam" required>';
                echo '<option value="" disabled>Select an exam</option>';
            
                while ($row = $result->fetch_assoc()) {
                    $examName = $row['exam_name'];
                
                    if ($examName == $defaultExam) {
                        echo "<option value='$examName' selected>$examName</option>";
                    } else {
                        echo "<option value='$examName'>$examName</option>";
                    }
                }
            
                echo '</select>';
            } else {
                echo "No exams found.";
            }
        ?>

        
        <label for="selectEmployee">Select Employee:</label>
        
            <?php
                //getting employee names from the database
                $sql = "SELECT Ename FROM user_form WHERE User_type ='employee'";
                $results = $con->query($sql);

                if($results->num_rows > 0){

                    $defaultEmployee = $employee_name;

                    echo '<select name ="selectEmployee" required>';
                    echo '<option value = "" disabled selected>Select an employee</option>';
                    
                    while($row = $results->fetch_assoc()){
                        $employeeName = $row['Ename'];

                        if($employeeName == $employee_name){
                            echo "<option value='$employeeName' selected>$employeeName</option>";
                        }else{
                            echo "<option value='$employeeName'>$employeeName</option>";
                        }
                    }

                    echo'</select>';
                
                } else {
                    echo "No employees found.";
                }
            ?>


        <label for="marks">Enter Marks:</label>
        <input type="text" id="marks" value = "<?php echo $marks ?>" name="marks" placeholder="Enter Exam Marks" required>

        <input type="submit" name="submit" value="Update Results">
        
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