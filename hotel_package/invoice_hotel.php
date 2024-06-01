<?php 
$db = mysqli_connect("localhost","root","","travel agency database");
    $id = $_GET['invoiceid'];
$query = "SELECT * FROM hotel_bookings WHERE `customer_id` =$id";
$result = mysqli_query($db, $query); 

while($row = mysqli_fetch_assoc($result))
{
    $booking_id = $row["ID"];
    $customer_id = $row["customer_id"];
    $username = $row["username"];
    $email = $row["email"];
    $hotel_name = $row["hotel_name"];
    $guest = $row["Guest_no"];
    $check_in = $row["check_in_date"];
    $check_out = $row["check_out_date"];
    $room_type = $row["room_type"];
    $package = $row["total_package_price"];
    $payment_mode = $row["payment_mode"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/invoice.css">
    <title>Invoice</title>
</head>
<body>
    <div class="page_1" size = "A4">
        <div class="top_section">
            <div class="address">
                <div class="address_content">
                    <h2>Safari Tours and Travels</h2>
                    <p>Address</p>
                </div>
            </div>
            <div class="contact">
                <div class="contact_content">
                    <div class="email">
                        Email: <span class = "span">safaris@gmail.com</span>
                    </div>
                    <div class="numbers">
                        Number: <span class = "span">0794775831</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="billing_invoice">
            <div class="title">
                Billing Invoice
            </div>
        </div>
        
        <?php

        $db = mysqli_connect("localhost","root","","travel agency database");
        $sql = "SELECT * FROM `hotel_bookings`";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result)>0){
            foreach($result as $row){
        ?>
        
        <div class="billed_to">
            <div class="title">Billed To</div>
            <div class="billed_section">
                <div class="name">
                    
                </div>
                <p>Customer Name: <?php echo $username?></p>
                <p>Customer ID: <?php echo $customer_id?></p>
                <p>Email address: <?php echo $email?></p>
            </div>
        </div>

        <div class="table">
        <table>
            <tr>
                <th>ID</th>
                <th>Hotel Name</th>
                <th>Guest Numbers</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Room Type</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td><?php echo $booking_id?></td>
                <td><?php echo $hotel_name?></td>
                <td><?php echo $guest?></td>
                <td><?php echo $check_in?></td>
                <td><?php echo $check_out?></td>
                <td><?php echo $room_type?></td>
                <td><?php echo $package?></td>
            </tr>
        </table>
    </div>

    <div class="bottom_section">
        <div class="status_content">
            <h4>Payment Details: </h4>
            <p class = "status free"></p>
            <p>Payment Method: <span><?php echo $payment_mode?></span></p>
            <p class = "tnx"></p>
        </div>
    </div>
    </div>
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


</body>
</html>