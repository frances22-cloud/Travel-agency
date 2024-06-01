<?php
	include_once 'functions/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL | ADD COUNTRY</title>
	<script src="https://cdn.tiny.cloud/1/j9qsnxxrm837k8tqb237gg3uxn4v8wy4rp3bc3620slxc0y6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>
    <script src="js/imgpreview.js"></script>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body style="background: linear-gradient(50deg, darkcyan, cornflowerblu);">
	<div class="mainwrapper">
		<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" bgcolor="azure">
				<tr align="center">
					<td colspan="2"><h2 style="line-height: 100px; font-size: 25px;">ADD COUNTRY</h2></td>
				</tr>
                <tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    Country Code</b></td>
					<td align="left" colspan=""><input type="number" name="country_code" required 
                    style="width:100%; height: 50px;"></td>
				</tr>
				<tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    Country Name</b></td>
					<td align="left" colspan=""><input type="text" name="country_name" required 
                    style="width:100%; height: 50px;"></td>
				</tr>
                <tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    Country Flag</b></td>
					<td align="left" colspan=""><input type="file" onchange="readURL(this);" name="country_flag" 
                    required> <img id="imgprv" src="#" alt="Image Preview"></td>
				</tr>
                <tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    Country Description<br><span style="font-size: 18px">(Insert iframe from Wikipedia etc.)</span>
                    </b></td>
					<td><textarea name="country_desc" cols="80" rows="10"></textarea></td>
				<tr align="center">
					<td colspan="2" style="padding: 50px;"><input type="submit" name="submit_btn" 
                    value="CONFIRM" style="height: 75px; width: 100%;"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

<?php
	require 'functions/dbconnection.php';

	if (isset($_POST['submit_btn'])) {
		
		$ctry_code = $_POST['country_code'];
		$ctry_name = $_POST['country_name'];
		$ctry_desc = $_POST['country_desc'];
		
		$ctry_flag = $_FILES['country_flag']['name'];
		$ctry_flag_tmp = $_FILES['country_flag']['tmp_name'];

		move_uploaded_file($ctry_flag_tmp, "country_flags/$ctry_flag");

		$insert = "INSERT INTO country (country_code, country_name, country_flag, country_description) 
		VALUES ('$ctry_code', '$ctry_name', '$ctry_flag', '$ctry_desc')";

		$run_insert = mysqli_query($con, $insert);

		if ($run_insert) {
				echo "<script>alert('Country successfully added!')</script>";
				echo "<script>window.open('viewcountries.php','_self')</script>";
		}
	}
?>