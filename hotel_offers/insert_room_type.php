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
		<title>Add Room Type on Offer</title>
	</head>
	
	<body>

		<div class = "form_container" style="background:url(../images/insertroom.jpg) repeat">
			<form action = "process_room.php" method = "post" enctype = "multipart/form-data">
				<a href="../admin_panel/admin_panel.php" class = "links">
				  <p> ADMIN PANEL </p>
				</a>
				
				<h2>Add Room Types on Offer </h2>
				
				<label for="name">Room Type Name</label>
				<input type="text" name="name" id="name" placeholder="Room Type Name">
				
				<label for="guest">Maximum Number of Guests</label>
				<input type="text" name="guest" id="guest" placeholder="Maximum Number of Guests">

				<label for="desc">Room Description</label>
				<input type="text" name="desc" id="desc" placeholder="Room Description">
			
				<button type = "submit" name = "submit" id = "submit"> Submit </button>
			</form>
		</div>
	</body>
</html>