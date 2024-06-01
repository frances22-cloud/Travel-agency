<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings Table</title>
    <link rel="stylesheet" href="css/table_style.css">
</head>
<body>
<div class="table_res">
    <table>
      <thead>
        <tr>
          <th>Sl</th>
          <th>Customer ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Hotel Name</th>
          <th>Guest Number</th>
          <th>Check-in Date</th>
          <th>Check-out Date</th>
          <th>Room Type</th>
          <th>Total Package Price</th>
          <th>Payment Mode</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
      <?php
				$conn = mysqli_connect("localhost","root","","travel agency database");

				$sql = "SELECT * FROM `hotel_bookings` ";
				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result)>0)
                {
                    foreach($result as $row)
                    {
                  
                        ?>
                       
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['customer_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['hotel_name']; ?></td>
                            <td><?php echo $row['Guest_no']; ?></td>
                            <td><?php echo $row['check_in_date']; ?></td>
                            <td><?php echo $row['check_in_date']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['total_package_price']; ?></td>
                            <td><?php echo $row['payment_mode']; ?></td>
                            <td>
                                <button class = "buttons"><a href='update_hotel_booking.php?updateid="<?php echo $row['ID']?>"' >Update</a></button>
                            </td>
                            <td>
                                <button class = "buttons"><a href='delete1.php?deleteid="<?php echo $row["ID"]?>"'>Delete</a></button>
                            </td>
                            <td>
                                    <button class = "buttons"><a href='invoice_hotel.php?invoiceid="<?php echo $row['customer_id']?>"' >Issue Invoice</a></button>
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