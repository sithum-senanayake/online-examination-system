<?php

include('php/config.php');

//Delete Results Operation
if(isset($_GET['deleteid'])){
    $resultID = $_GET['deleteid'];

    $delete = "DELETE FROM results WHERE resultID = '$resultID'";
    
    $result = $con->query($delete);

    if($result){
        header('location:exam_admin_profile.php');
    }else{
        die($con->error);
    }
}

?>