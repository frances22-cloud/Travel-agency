<?php      
    require('../dbconnection.php');  
  
	if (isset($_POST['submit'])){
		
		function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		
		$offer_name = validate($_POST['offer_name']);
		$hotel_id = validate($_POST['hotel_id_dropdown']);
		$room_id = validate($_POST['room_id_dropdown']);
		$days = validate($_POST['days']);
		$avail = validate($_POST['availability']);
		$price = validate($_POST['price']); 
	  
		$sql  = "INSERT INTO `offer_hotel_services` (`offer_name`, `offer_hotel_id`, `offer_room_type_id`, `days`, `availability`, `price`) 
				VALUES ('$offer_name', '$hotel_id', '$room_id', '$days', '$avail', '$price')";
		
		$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
	
		if ($result) {
		  echo "You are registered successfully.";
		} else {
		  echo "Required fields are missing.";
		}
	}
?>  