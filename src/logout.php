<?php
session_start();

//unsetting user login details
if(isset($_SESSION['user_email']) && isset($_SESSION['account']))
{
	unset($_SESSION['user_email']);
	unset($_SESSION['account']);
	header("location: login.php");
}
die;
?>