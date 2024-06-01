<?php 
include_once('functions/dbconnection.php');
?>

<table align="center" border="1" bgcolor="azure">
	
	<tr align="center">
		<td colspan="13"><h2>VIEW CITIES</h2></td>
	</tr>

	<tr align="center">
        <th>City ID</th>
		<th>City Name</th>
        <th>City Image</th>
        <th>City Description</th>
		<th>Country Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 

		include_once 'functions/dbconnection.php';

		$city = "SELECT * FROM city";

		$run_city = mysqli_query($con, $city);

		$i = 0;

		while ($row_city = mysqli_fetch_array($run_city)) {
            $city_id = $row_city['city_id'];
			$city_name = $row_city['city_name'];
            $city_img = $row_city['city_image'];
            $city_desc = $row_city['city_description'];
			$ctry_id = $row_city['country_id'];
	
			$i++;
		
	?>
	<tr align="center">
		<td><?php echo $city_id; ?></td>
		<td><?php echo $city_name; ?></td>
		<<td><?php echo "<img src='city_images/".$city_img."'width='150' height='80'"; ?></td>
		<td><?php echo $city_desc; ?></td>
		<td><?php echo $ctry_id; ?></td>
		

		<td><a href="editcities.php?edit_city=<?php echo $city_id; ?>">Edit </a></td>
		<td><a href="deletecities.php?dlt_city=<?php echo $city_id; ?>">Delete </a></td>
	</tr>

	<?php 
		}
	?>

