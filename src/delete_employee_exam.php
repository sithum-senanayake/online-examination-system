<?php

include('php/config.php');

//Delete Employee Exams
if(isset($_GET['deletename'])){
    $exam_name = $_GET['deletename'];

    $delete = "DELETE FROM employee_exam WHERE exam_name='$exam_name'";

    $result = $con->query($delete);

    if($result){
        header('location:employee_profile.php');
    }else{
        die($con->error);
    }
}

?>
