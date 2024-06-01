<?php
	include('../dbconnection.PHP');

	session_start();

	if (!isset($_SESSION['role'])) {
		die( header('location:../admin_panel/admin_login.php?error=Please log in to access admin page') );
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="admin.css">
		<title>Add Hotels on Offer</title>
	</head>
	
	<body>

		<div class = "form_container" style="background:url(../images/inserthotel.jpg) repeat">
			<form action = "process_offer_hotel.php" method = "post" enctype = "multipart/form-data">
				<a href="../admin_panel/admin_panel.php" class = "links">
				  <p> BACK TO ADMIN PANEL </p>
				</a>
				
				<h2>Add Hotels on Offer </h2>
				
				<label for="name">Hotel Name</label>
				<input type="text" name="name" id="name" placeholder="Hotel Name">
				
				<label for="id">City ID</label>
				<input type="number" name="id" id="id" placeholder="City ID">
				
				<label for="address">Hotel Address</label>
				<input type="text" name="address" id="address" placeholder="Address">
				
				<label for="image">Hotel Image</label>
				<input type="file" name="image" id="image">

				<label for="details">Details</label>
				<input type="text" name="details" id="details" placeholder="Details">
			
				<button type = "submit" name = "submit" id = "submit"> Submit </button>
			</form>
		</div>
	</body>
</html>