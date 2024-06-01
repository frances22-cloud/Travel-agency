<?php
	require('../dbconnection.PHP');

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
		<title>Add Offer </title>
	</head>
	
	<body>

		<div class = "form_container" style="background:url(../images/offer.jpg) repeat">
			<form action = "process_offer_hotel_service.php" method = "post">
				
				<a href="../admin_panel/admin_panel.php" class = "links">
				  <p> BACK TO ADMIN PANEL </p>
				</a>
				
				<h2>Add Offer Hotel Package Service </h2>
				
				<label for="name">Offer Name</label>
				<input type="text" name="offer_name" id="name" placeholder="Add Offer Name">
				
				<div class = "hotel_id_dropdown">
					<label for="hotel_id_dropdown"> Hotel </label>
					<br>
					<select class = "hotel_id_dropdown" id = "hotel_id_dropdown" name = "hotel_id_dropdown"> 
						<?php
							$sql = "SELECT * FROM offer_hotel";
							$result = mysqli_query($con,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
							while($row = mysqli_fetch_array($result)) {
						?>
						
						<option value="<?php echo $row['id'];?>"> <?php echo $row["hotel_name"];?> </option>
						
						<?php
							}
						?>
					</select>
				</div>
				<br>

				<main>
				<table class = "hotel">
					<thead>
						<th> Hotel Name </th>
						<th> Hotel Address </th>
					</thead>

					<tbody>
						<?php
							$sql  = "SELECT * FROM offer_hotel";
							$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);


							while($value = mysqli_fetch_array($result)){

							?>
						<tr>
							<td><?php echo $value["hotel_name"] ?></td>
							<td><?php echo $value["hotel_address"] ?></td>
						</tr>
						
						<?php 
							}
						?>
					</tbody>
				</table>
				</main>
				<br>
				
				<div class = "room_id_dropdown">
					<label for="room_id_dropdown"> Room Type </label>
					<br>
					<select class = "room_id_dropdown" id = "room_id_dropdown" name = "room_id_dropdown"> 
						<?php
							$result = mysqli_query($con,"SELECT * FROM offer_room_type") or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
							while($row = mysqli_fetch_array($result)) {
						?>
						
						<option value="<?php echo $row['id'];?>"> <?php echo $row["type_name"];?> </option>
						
						<?php
							}
						?>
					</select>
				</div>
				<br>
				
				<label for="days"> Days</label>
				<input type="number" name="days" id="days" placeholder="Days of offer">
				
				<label for="availability">Availability</label>
				<input type="number" name="availability" id="availability" placeholder="Available packages">

				<label for="price">Price</label>
				<input type="number" name="price" id="price" placeholder="Price">
			
				<button type = "submit" name = "submit" id = "submit"> Submit </button>
			</form>
		</div>
	</body>
</html>