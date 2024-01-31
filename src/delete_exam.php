<?php

include('php/config.php');

//Delete Exam Operation
if(isset($_GET['deleteid'])){

    $examID = $_GET['deleteid']; //$examID = 10

    $delete = "DELETE FROM exam WHERE examID ='$examID'";

    $result = $con->query($delete);

    if($result){
        header('location:exam_admin_profile.php');
    }else{
        die($con->error);
    }
}

?>