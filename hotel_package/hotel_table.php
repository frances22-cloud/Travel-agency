<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive HTML Table</title>
    <link rel="stylesheet" href="css/table_style.css">
</head>
<body>
<div class="table_res">
    <table>
      <thead>
        <tr>
          <th>Sl</th>
          <th>Hotel Name</th>
          <th>City ID</th>
          <th>Hotel Address</th>
          <th>Hotel Image</th>
          <th>Hotel Details</th>
          <th>Room Type</th>
          <th>Service Price</th>
          <th>Capacity</th>
          <th>Nights</th>
          <th>Is Partner</th>
          <th>Is Active</th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
      <?php
				$conn = mysqli_connect("localhost","root","","travel agency database");

				$sql = "SELECT * FROM `hotel` ";
				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result)>0)
                {
                    foreach($result as $row)
                    {
                  
                        ?>
                       
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['hotel_name']; ?></td>
                            <td><?php echo $row['city_id']; ?></td>
                            <td><?php echo $row['hotel_address']; ?></td>
                            <td>
                               <img src = "<?php echo "images/".$row['hotel_image'];?>" alt = "image" width = "100px"> 
                            </td>
                            <td><?php echo $row['details']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['service_price']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td><?php echo $row['nights']; ?></td>
                            <td><?php echo $row['is_partner']; ?></td>
                            <td><?php echo $row['active']; ?></td>
                            <td>
                                <button class ="buttons" ><a href='update_hotels.php?updateid="<?php echo $row['id']?>"' >Update</a></button>
                            </td>
                            <td>
                                <button class ="buttons"><a href='delete.php?deleteid="<?php echo $row["id"]?>"'>Delete</a></button>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <tr>
                            <td>No record available<td>    
                        <tr>

                    <?php
                }
			?>
        </tbody>
    </table>
  </div>
</div>

</body>
</html>