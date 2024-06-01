<?php
	require('../dbconnection.php');

	if (isset($_POST['submit']) && isset($_FILES['image'])){

		$img_name = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$folder = '../images/'.$img_name;
		move_uploaded_file($tmp_name, $folder);

		$hotel_name = $_POST["name"];
		$city_id = $_POST["id"];
		$hotel_address = $_POST["address"];
		$hotel_image = $img_name;
		$hotel_details = $_POST["details"];

		$sql = "INSERT INTO `offer_hotel`(`hotel_name`, `city_id`, `hotel_address`, `hotel_image`, `details`) 
				VALUES ('$hotel_name','$city_id','$hotel_address', '$hotel_image', '$hotel_details')";

		$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
		
	}
	
	mysqli_close($con);

?>