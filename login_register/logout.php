<?php
	
	session_start(); 
	require("../dbconnection.php");
	
	$_SESSION = array();
	session_destroy();
	
	header("location: ../index/index.php");
	exit;
	
	mysqli_close($con);
	
?>

