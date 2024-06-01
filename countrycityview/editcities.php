<?php
	include_once 'functions/dbconnection.php';

	if (isset($_GET['edit_city'])) {
		
		$city_id = $_GET['edit_city'];

		$get_city = "SELECT * FROM city WHERE city_id='$city_id'";

		$run_city = mysqli_query($con, $get_city);

		$row_city = mysqli_fetch_array($run_city);

		$cty_id = $row_city['city_id'];
		$cty_name = $row_city['city_name'];
        $ctry_name = $row_city['country_id'];
		$cty_img = $row_city["city_image"];
		$cty_desc = $row_city["city_description"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL | UPDATE city</title>
	<script src="https://cdn.tiny.cloud/1/j9qsnxxrm837k8tqb237gg3uxn4v8wy4rp3bc3620slxc0y6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>
</head>
<body style="background: linear-gradient(50deg, darkcyan, cornflower);">
	<form action="" method="POST" enctype="multipart/form-data">
		<table align="center" width="100%" border="1" bgcolor="azure">
			<tr align="center">
				<td colspan="2"><h2>EDIT CITY</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Country Name</b></td>
				<td align="left" colspan="">
					<select name="ctry_name" required style="width:100%; height: 50px;">
						<?php 
							$result = mysqli_query($con,"SELECT * FROM country");
							?>
							<option value="">Select Country</option>
							<?php
							while($row = mysqli_fetch_array($result)) {
							?>
							<option value="<?php echo $row["country_id"];?>"><?php echo $row["country_name"];?></option>
							<?php
							} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>City Name</b></td>
				<td><input type="text" name="city_name" value="<?php echo $cty_name; ?>" required></td>
			</tr>
			<tr>
				<td align="right"><b>City Image</b></td>
				<td align="left" colspan=""><input type="file" name="city_img" 
                    required> <img id="imgprv" src="city_images/<?php echo $cty_img; ?>" width="100" height="75" 
					alt="Image Preview" required></td>
			</tr>
			<tr>
				<td align="right"><b>City Description</b></td>
				<td><input type="text" name="city_desc" value="<?php echo $cty_desc; ?>" required></td>
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
		
		$update_id = $city_id;

		$city_name = $_POST['city_name'];
		$ctry_id = $_POST['ctry_name'];
		$city_desc = $_POST['city_desc'];

		//Get image from the field
		$city_img = $_FILES['city_img']['name'];
		$city_img_tmp = $_FILES['city_img']['tmp_name'];

		move_uploaded_file($city_img_tmp, "city_images/$city_img");

		$update_city = "UPDATE city SET city_name='$city_name', country_id='$ctry_id', 
		city_image ='$city_img', city_description='$city_desc' WHERE city_id='$update_id'";

		$run_update = mysqli_query($con, $update_city);

		if ($run_update) {
				echo "<script>alert('City successfully edited!')</script>";
				echo "<script>window.open('viewcities.php','_self')</script>";
		}
	}
?>

<?php mysqli_close($con); ?>