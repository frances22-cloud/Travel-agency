<?php 
include 'dbconnection.php';   
	if (isset($_GET['delete_cat'])) {
		
		$delete_id = $_GET['dlt_ctry'];

		$delete_ctry = "DELETE FROM country WHERE country_id='$delete_id'";

		$run_delete = mysqli_query($con, $delete_ctry);

		if ($run_delete) {
			echo "<script>alert('Country has been successfully deleted')</script>";
			echo "<script>window.open('viewcountries.php','_self')</script>";
		}
	}
?>