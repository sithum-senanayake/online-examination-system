<?php

include('php/config.php');

//Delete User Operation
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $delete = "DELETE FROM user_form WHERE id=$id";
    
    $result = $con->query($delete);

    if($result){
        header('location:admin_profile.php');
    }else{
        die($con->error);
    }
}

?>
