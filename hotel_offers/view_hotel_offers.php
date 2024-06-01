<?php
include('../dbconnection.php');

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
	<title>View Offer</title>
</head>

<body>
	<div class="wrapper">

		<a href="../admin_panel/admin_panel.php" class="header">
			<p> BACK TO ADMIN PANEL </p>
		</a>

		<h2>View Hotel Offer Service</h2>

		<table class="offer_details">
			<thead>
				<th> Offer ID </th>
				<th> Offer Name </th>
				<th> Offer Hotel ID </th>
				<th> Offer Room Type ID </th>
				<th> Days </th>
				<th> Available Packages </th>
				<th> Price </th>
				<th> Edit </th>
			</thead>

			<tbody>
				<?php
				$sql  = "SELECT * FROM offer_hotel_services";
				$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con), E_USER_ERROR);


				while ($value = mysqli_fetch_array($result)) {

				?>
					<tr>
						<form action="edit_hotel_offers.php" method="post">
							<td><?php echo $value["id"] ?></td>
							<td><?php echo $value["offer_name"] ?></td>
							<td><?php echo $value["offer_hotel_id"] ?></td>
							<td><?php echo $value["offer_room_type_id"] ?></td>
							<td><?php echo $value["days"] ?></td>
							<td><?php echo $value["availability"] ?></td>
							<td><?php echo $value["price"] ?></td>
							<td><button type="submit" name="submit" id="submit" value="<?php echo $value["id"]; ?>"> Edit Offer </button></td>
						</form>
					</tr>

				<?php
				}
				mysqli_close($con);
				?>
			</tbody>
		</table>
		<br>

	</div>
</body>

</html>