<?php
	require('../dbconnection.php');

	if (isset($_POST['submit'])){

		$type_name = $_POST["name"];
        $max_guests = $_POST["guest"];
		$desc = $_POST["desc"];
		

		$sql = "INSERT INTO `offer_room_type`(`type_name`, `max_guests`, `desc`) 
				VALUES ('$type_name','$max_guests', '$desc')";

		$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
		
	}
	
	mysqli_close($con);

?>