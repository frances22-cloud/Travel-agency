<?php 
include 'functions/dbconnection.php';   
	if (isset($_GET['dlt_city'])) {
		
		$dlt_id = $_GET['dlt_city'];

		$delete_city = "DELETE FROM city WHERE city_id='$dlt_id'";

		$run_delete = mysqli_query($con, $delete_city);

		if ($run_delete) {
			echo "<script>alert('City has been successfully deleted')</script>";
			echo "<script>window.open('viewcities.php','_self')</script>";
		}
	}
?>