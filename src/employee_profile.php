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
    <link rel="stylesheet" type="text/css" href="styles/employee_profile.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Employee Profile</title>

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

<!--Employee Profile Content-->

    <!--User details start-->
    <div class="user-details">
        <span> <b>User Name :</b> <?php echo $_SESSION['user_name']; ?> </span>
        <a id="editProf" href="update_employee.php?updateid=<?php echo $_SESSION['user_ID']?>"> Edit Profile </a>
    </div>
    
    <!-- Employee exam table content -->
    <div class="user-table">
        <h2>Registered Exams</h2> <br>
        <table class="table-style">
        <thead>
        <tr>
            <th>Exam Name</th>
            <th>Exam Date</th>
            <th width="10%">Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                $empID = $_SESSION['user_ID'];

                //getting employee_exam details for the empID
                $sql = "SELECT * FROM employee_exam WHERE empID = '$empID';";

                $result = $con->query($sql);

                if($result && mysqli_num_rows($result) > 0 ){

                    while($row = mysqli_fetch_assoc($result)){

                        $exam_name = $row['exam_name'];
                        $edate = $row['edate'];

                        echo '<tr>
                              <td>'.$exam_name.'</td>
                              <td>'.$edate.'</td>
                              <td>
                              <center>
                              <button class = "delete-btn" onclick=" return confirmDelete()"><a href="delete_employee_exam.php?deletename='.$exam_name.'">Delete</a></button>
                              </center>
                              </td>
                              </tr>';
                    }
                }
            ?>
        </tbody> 
        </table> 
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