<?php
$db = mysqli_connect("localhost","root","","travel agency database");
$id = $_POST["id"];
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

$sql = "UPDATE `hotel_bookings` SET `ID`='$id',`customer_id`='$customer_id',`username`='$username',`email`='$email',`hotel_name`='$hotel_name',`Guest_no`='$guest',`check_in_date`='$check_in',`check_out_date`='$check_out',`room_type`='$room_type',`total_package_price`='$package',`payment_mode`='$payment_type' WHERE `id` = '".$id."'";

if (mysqli_query($db,$sql)){
	echo "Record updated successfully";
    header("location:bookings_table.php");
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>