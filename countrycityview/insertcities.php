<?php
	include_once 'functions/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL | ADD CITY</title>
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
					<td colspan="2"><h2 style="line-height: 100px; font-size: 25px;">ADD CITY</h2></td>
				</tr>
				<tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    Country Name</b></td>
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
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    City Name</b></td>
					<td align="left" colspan=""><input type="text" name="city_name" required 
                    style="width:100%; height: 50px;"></td>
				</tr>
                <tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    City Image</b></td>
					<td align="left" colspan=""><input type="file" onchange="readURL(this);" name="city_img" 
                    required> <img id="imgprv" src="#" alt="Image Preview"></td>
				</tr>
                <tr>
					<td align="left" style="padding: 25px;"><b style="font-size: 25px; line-height: 75px">
                    City Description<br><span style="font-size: 18px">(Embed iframe of your choice.)</span>
                    </b></td>
					<td><textarea name="city_desc" cols="80" rows="10"></textarea></td>
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
		
		$ctry_id = $_POST['ctry_name'];
		$cty_name = $_POST['city_name'];
		$cty_desc = $_POST['city_desc'];

		$cty_img = $_FILES['city_img']['name'];
		$cty_img_tmp = $_FILES['city_img']['tmp_name'];

		move_uploaded_file($cty_img_tmp, "city_images/$cty_img");


		$insert = "INSERT INTO city (country_id, city_name, city_image, city_description) 
		VALUES ('$ctry_id', '$cty_name', '$cty_img', '$cty_desc')";

		$run_insert = mysqli_query($con, $insert);

		if ($run_insert) {
				echo "<script>alert('City successfully added!')</script>";
				echo "<script>window.open('viewcities.php','_self')</script>";
		}
	}
?>