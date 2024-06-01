<?php
if (isset($_POST['submit']) && isset($_FILES['hotel_image'])){
	$file = $_FILES['hotel_image'];
	$file_name = $_FILES['hotel_image']['name'];
	$file_size = $_FILES['hotel_image']['size'];
	$file_tmpname = $_FILES['hotel_image']['tmp_name'];
	$file_error = $_FILES['hotel_image']['error'];
	
	$file_ext = explode('.',$file_name);
	$file_actualext = strtolower(end($file_ext));
	
	$allowed = array('jpg','png','jpeg');
	
	if(in_array($file_actualext,$allowed)){
		if($file_error===0){
			if($file_size <1000000){
				$file_destination = 'images/'.$file_name;
				move_uploaded_file($file_tmpname,$file_destination);
			}else{
				echo "Your file is too big";
			}
		}else{
			echo "There was an error uploading your file";
		}
	}else{
		echo "You cant upload files of that type";
	}
	
}
$db = mysqli_connect("localhost","root","","travel agency database");
$id = $_POST["id"];
$hotel_name = $_POST["hotel_name"];
$city_id = $_POST["city_id"];
$hotel_address = $_POST["hotel_address"];
$hotel_img = $_FILES['hotel_image']['name'];
$hotel_details = $_POST["hotel_details"];
$room_type = $_POST["room_type"];
$service_price = $_POST["service_price"];
$capacity = $_POST["capacity"];
$nights = $_POST["nights"];
$is_partner = $_POST["is_partner"];
$is_active = $_POST["is_active"];


$sql = "UPDATE `hotel` SET `id`='$id',`hotel_name`='$hotel_name',`city_id`='$city_id',`hotel_address`='$hotel_address',`hotel_image`='$hotel_img',`details`='$hotel_details', `room_type` = '$room_type' , `service_price` = '$service_price',`capacity` = '$capacity',`nights` = '$nights',`is_partner`='$is_partner',`active`='$is_active' WHERE `id` = '".$id."'";
if (mysqli_query($db,$sql)){
	echo "New record created successfully";
    header("location:hotel_table.php");
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);


?>