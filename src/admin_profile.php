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
    <link rel="stylesheet" type="text/css" href="styles/admin_profile.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Admin Profile</title>

</head>
<body>

<!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <a href="index.php"><img src="images/logo.png" class="logo"></a>
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

<!--Admin Profile Content-->
    <h1 class="heading">Admin Control</h1>

    <!-- Employee table content-->
    <div class="employee-table">
        <h2>Employee Details</h2> <br>
        <table class="table-style">
        <thead>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Address</th>
            <th>DOB</th>
            <th width="18%">Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php
                //getting employee details to display
                $sql = "SELECT * FROM user_form WHERE User_type = 'employee';";

                $result = $con->query($sql);

                if($result && $result->num_rows > 0 ){

                    while($row = $result->fetch_assoc()){
                        
                        $Eid = $row['id'];
                        $EName = $row['Ename'];
                        $Egender = $row['Egender'];
                        $EPhoneNo = $row['EPhoneNo'];
                        $Email = $row['Email'];
                        $EAddress = $row['Address'];
                        $EDOB = $row['dob'];

                        echo '<tr>
                              <td>'.$Eid.'</th>
                              <td>'.$EName.'</td>
                              <td>'.$Egender.'</td>
                              <td>'.$EPhoneNo.'</td>
                              <td>'.$Email.'</td>
                              <td>'.$EAddress.'</td>
                              <td>'.$EDOB.'</td>
                              <td>
                              <center>
                              <button class = "update-btn"><a href="update_employee.php?updateid='.$Eid.'">Update</a></button>
                              <button class = "delete-btn" onclick=" return confirmDelete()"><a href="delete_user.php?deleteid='.$Eid.'">Delete</a></button>
                              </center>
                              </td>
                              </tr>';
                    }
                }
            ?>
        </tbody> 
        </table>    
    </div>

    <!-- Exam admin table content ( using the same styles form the employee table) -->
    <div class="employee-table">
        <h2>Exam Admin Details</h2> <br>
        <table class="table-style">
        <thead>
        <tr>
            <th>Exam Admin ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Address</th>
            <th>DOB</th>
            <th width="18%">Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php
                //getting exam admin details to display 
                $sql = "SELECT * FROM user_form WHERE User_type = 'exam_admin';";

                $result = $con->query($sql);

                if($result && $result->num_rows > 0 ){

                    while($row = $result->fetch_assoc()){

                        $Eid = $row['id'];
                        $EName = $row['Ename'];
                        $Egender = $row['Egender'];
                        $EPhoneNo = $row['EPhoneNo'];
                        $Email = $row['Email'];
                        $EAddress = $row['Address'];
                        $EDOB = $row['dob'];

                        echo '<tr>
                              <td>'.$Eid.'</th>
                              <td>'.$EName.'</td>
                              <td>'.$Egender.'</td>
                              <td>'.$EPhoneNo.'</td>
                              <td>'.$Email.'</td>
                              <td>'.$EAddress.'</td>
                              <td>'.$EDOB.'</td>
                              <td>
                              <center>
                              <button class = "update-btn"><a href="update_exam_admin.php?updateid='.$Eid.'">Update</a></button>
                              <button class = "delete-btn" onclick=" return confirmDelete()"><a href="delete_user.php?deleteid='.$Eid.'">Delete</a></button>
                              </center>
                              </td>
                              </tr>';
                    }
                }
            ?>
        </tbody> 
        </table>    
    </div>

    <!-- Exam table content-->
    <div class="exam-table">
        <h2>Exam Details</h2> <br>
        <a class = "add-exam-btn" href="add_exam.php">Add Exam</a>
        <table class="table-style">
        <thead>
        <tr>
            <th>Exam ID</th>
            <th>Exam Name</th>
            <th>Exam Date</th>
            <th>Exam Instructions</th>
            <th width="18%">Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php
                //getting exam details to display  
                $sql = "SELECT * FROM exam";

                $result = $con->query($sql);

                if($result && mysqli_num_rows($result) > 0 ){

                    while($row = $result->fetch_assoc()){ 

                        $examID = $row['examID'];
                        $exam_name = $row['exam_name']; 
                        $exam_date = $row['exam_date'];
                        $instructions = $row['instructions'];

                        echo '<tr>
                              <td>'.$examID.'</td>
                              <td>'.$exam_name.'</td>
                              <td>'.$exam_date.'</td>
                              <td>'.$instructions.'</td>
                              <td>
                              <center>
                              <button class = "update-btn"><a href="update_exam.php?updateid='.$examID.'">Update</a></button>
                              <button class = "delete-btn" onclick=" return confirmDelete()"><a href="delete_exam.php?deleteid='.$examID.'">Delete</a></button>
                              </center>
                              </td>
                              </tr>';
                    }
                }
            ?>
        </tbody> 
        </table> 
    </div>

    <!-- Exam results table content -->
    <div class="result-table">
        <h2>Employee Results</h2> <br>
        <a class = "add-exam-btn" href="add_results.php">Add Results</a>
        <table class="table-style">
        <thead>
        <tr>
            <th>Result ID</th>
            <th>Exam ID</th>
            <th>Exam Name</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Marks</th>
            <th width="25.5%">Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php
                //getting exam results details to display   
                $sql = "SELECT * FROM results";

                $result = $con->query($sql);

                if($result && mysqli_num_rows($result) > 0 ){

                    while($row = $result->fetch_assoc()){ 

                        $resultID = $row['resultID'];
                        $examID = $row['examID'];
                        $exam_name = $row['exam_name'];
                        $empID = $row['empID'];
                        $emp_name = $row['employee_name'];
                        $marks = $row['marks'];
                        
                        echo '<tr>
                              <td>'.$resultID.'</td>
                              <td>'.$examID.'</td>
                              <td>'.$exam_name.'</td>
                              <td>'.$empID.'</td>
                              <td>'.$emp_name.'</td>
                              <td>'.$marks.'</td>
                              <td>
                              <center>
                              <button class = "update-btn"><a href="update_results.php?updateid='.$resultID.'">Update</a></button>
                              <button class = "delete-btn" onclick=" return confirmDelete()"><a href="delete_results.php?deleteid='.$resultID.'">Delete</a></button>
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