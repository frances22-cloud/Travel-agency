<?php      
    include('../dbconnection.PHP');  
  
	if (isset($_POST['submit'])){
		
		$id = $_POST['submit'];
		
		function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		
		$offer_id = validate($_POST['submit']);
		$customer_id = "01";
		$email = validate($_POST['email']);
		$phone = validate($_POST['phone']);
		$guests = validate($_POST['guests']);

		$raw_check_in = validate($_POST['check_in']);
		$check_in = date('Y-m-d', strtotime($raw_check_in));	
		
		$raw_check_out = validate($_POST['check_out']);
		$check_out = date('Y-m-d', strtotime($raw_check_out));
	  
		$quantity = 1;
 
		$sql  = "INSERT INTO `offer_hotel_booking` (`offer_id`, `customer_id`, `email`, `phone`, `guests`, `check_in`, `check_out`) 
				VALUES ('$offer_id', '$customer_id', '$email', '$phone', '$guests', '$check_in','$check_out')";
		$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
	
		$sql2 = "UPDATE `offer_hotel_services` SET `availability` = `availability` - 1 WHERE `id` = '$id'";
		$result = mysqli_query($con, $sql2) or trigger_error("Query Failed! SQL: $sql2 - Error: ".mysqli_error($con), E_USER_ERROR);
	
		if ($result) {
			header("Location: index_hotel.php?message=booking successful");
		    exit();
		} else {
		  echo "Required fields are missing.";
		}
	}
?>  