<?php
	require('../dbconnection.php');

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
		<link rel="stylesheet" href="tp-service.css">
		<link rel="stylesheet" href="view.css">
		<title>View Hotel Bookings</title>
	</head>
	
	<body>
		<div class = "wrapper">
		
			<a href="../admin_panel/admin_panel.php" class = "header">
			  <p> BACK TO ADMIN PANEL </p>
			</a>
			
			<h2>View Hotel Bookings </h2>

			<table class = "hotel_details">
				<thead>
					<th> Booking ID </th>
					<th> Offer ID </th>
					<th> Customer ID </th>
					<th> Email </th>
					<th> Phone </th>
					<th> Guests </th>
					<th> Check In </th>
					<th> Check Out </th>
				</thead>
				
				<tbody>
					<?php
						$sql  = "SELECT * FROM offer_hotel_booking";
						$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);


						while($value = mysqli_fetch_array($result)){
							
						?>
					<tr>
						<td><?php echo $value["id"] ?></td>
						<td><?php echo $value["offer_id"] ?></td>
						<td><?php echo $value["customer_id"] ?></td>
						<td><?php echo $value["email"] ?></td>
						<td><?php echo $value["phone"] ?></td>
						<td><?php echo $value["guests"] ?></td>
						<td><?php echo $value["check_in"] ?></td>
						<td><?php echo $value["check_out"] ?></td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
			<br>
		</div>
	</body>
</html>