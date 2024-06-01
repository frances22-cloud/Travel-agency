<table align="center" border="1" bgcolor="azure">
	
	<tr align="center">
		<td colspan="13"><h2>VIEW COUNTRIES</h2></td>
	</tr>

	<tr align="center">
        <th>ID</th>
		<th>Country Code</th>
		<th>Country Name</th>
        <th>Country Flag</th>
        <th>Country Description</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 

		include_once 'functions/dbconnection.php';

		$country = "SELECT * FROM country";

		$run_ctry = mysqli_query($con, $country);

		$i = 0;

		while ($row_ctry = mysqli_fetch_array($run_ctry)) {
            $ctry_id = $row_ctry['country_id'];
            $ctry_code = $row_ctry['country_code'];
			$ctry_name = $row_ctry['country_name'];
            $ctry_flag = $row_ctry['country_flag'];
            $ctry_desc = $row_ctry['country_description'];
	
			$i++;
		
	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $ctry_code; ?></td>
		<td><?php echo $ctry_name; ?></td>
		<td><?php echo "<img src='country_flags/".$ctry_flag."'width='150' height='80'"; ?></td>
		<td><?php echo $ctry_desc; ?></td>

		<td><a href="editcountries.php?edit_ctry=<?php echo $ctry_id; ?>">Edit </a></td>
		<td><a href="delete_country.php?dlt_ctry=<?php echo $ctry_id; ?>">Delete </a></td>
	</tr>

	<?php 
		}
	?>


</table>