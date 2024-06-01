<?php
	include_once 'functions/dbconnection.php';

	if (isset($_GET['edit_ctry'])) {
		
		$ctry_id = $_GET['edit_ctry'];

		$get_ctry = "SELECT * FROM country WHERE country_id='$ctry_id'";

		$run_ctry = mysqli_query($con, $get_ctry);

		$row_ctry = mysqli_fetch_array($run_ctry);

		$ctry_code = $row_ctry['country_code'];
		$ctry_name = $row_ctry['country_name'];
		$ctry_flag = $row_ctry["country_flag"];
		$ctry_desc = $row_ctry["country_description"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL | UPDATE COUNTRY</title>
	<script src="https://cdn.tiny.cloud/1/j9qsnxxrm837k8tqb237gg3uxn4v8wy4rp3bc3620slxc0y6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>
</head>
<body style="background: linear-gradient(50deg, darkcyan, cornflower);">
	<form action="" method="POST" enctype="multipart/form-data">
		<table align="center" width="75%" border="1" bgcolor="azure">
			<tr align="center">
				<td colspan="2"><h2>EDIT COUNTRY</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Country Code</b></td>
				<td><input type="number" name="country_code" value="<?php echo $ctry_code; ?>" required></td>
			</tr>
			<tr>
				<td align="right"><b>Country Name</b></td>
				<td><input type="text" name="country_name" value="<?php echo $ctry_name; ?>" required></td>
			</tr>
			<tr>
				<td align="right"><b>Country Flag</b></td>
				<td align="left" colspan=""><input type="file" name="country_flag" 
                    required> <img id="imgprv" src="country_flags/<?php echo $ctry_flag; ?>" width="100" height="75" 
					alt="Image Preview" required></td>
			</tr>
			<tr>
				<td align="right"><b>Country Description</b></td>
				<td><input type="text" name="country_desc" value="<?php echo $ctry_desc; ?>" required></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" name="update" value="Confirm Changes"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	require 'functions/dbconnection.php';

	if (isset($_POST['update'])) {
		
		$update_id = $ctry_id;

		$country_code = $_POST['country_code'];
		$country_name = $_POST['country_name'];
		$country_desc = $_POST['country_desc'];

		//Get image from the field
		$country_flag = $_FILES['country_flag']['name'];
		$country_flag_tmp = $_FILES['country_flag']['tmp_name'];

		move_uploaded_file($country_flag_tmp, "country_flags/$country_flag");

		$update_country = "UPDATE country SET country_code='$country_code', country_name='$country_name',
		country_flag='$country_flag', country_description='$country_desc' WHERE country_id='$update_id'";

		$run_update = mysqli_query($con, $update_country);

		if ($run_update) {
				echo "<script>alert('country successfully edited!')</script>";
				echo "<script>window.open('viewcountries.php','_self')</script>";
		}
	}
?>

<?php mysqli_close($con); ?>