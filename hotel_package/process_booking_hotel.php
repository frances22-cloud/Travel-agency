<?php
$db = mysqli_connect("localhost","root","","travel agency database");
$customer_id = $_POST["customer_id"];
$username = $_POST["username"];
$email = $_POST["email"];
$hotel_name = $_POST["hotel_name"];
$guest = $_POST["guest"];
$check_in = $_POST["check_in_date"];
$check_out = $_POST["check_out_date"];
$room_type = $_POST["room_type"];
$package = $_POST["total_package_price"];
$payment_type = $_POST["payment_type"];

$sql = "INSERT INTO `hotel_bookings`( `customer_id`,`username`,`email`, `hotel_name`,`Guest_no`, `check_in_date`, `check_out_date`,  `room_type`, `total_package_price`, `payment_mode`) VALUES ('$customer_id','$username','$email','$hotel_name','$guest','$check_in','$check_out','$room_type','$package','$payment_type')";

if (mysqli_query($db,$sql)){
	echo "New record created successfully";
	header("location:confirmation.php");
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
}


mysqli_close($db);
?>