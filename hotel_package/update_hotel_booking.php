<?php 
$db = mysqli_connect("localhost","root","","travel agency database");
    $id = $_GET['updateid'];
$query = "SELECT * FROM hotel_bookings WHERE `id` =$id";
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
<HTML lang="en">
    <head>
        
        <title>Update Booking</title>
       <style>
        body {
    background-image: url("images/hotel1.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
    color: #333333;
  }
  
  .box-form {
    margin: 0 auto;
    width: 40%; 
    background: #FFFFFF;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex: 1 1 100%;
    align-items: stretch;
    justify-content: space-between;
    box-shadow: grey;
  }
  @media (max-width: 980px) {
    .box-form {
      flex-flow: wrap;
      text-align: center;
      align-content: center;
      align-items: center;
    }
  }
  .box-form div {
    height: auto;
  }
  .box-form .left {
    color: orangered;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url("#.jpg");
    overflow: hidden;
  }
  .box-form .left .overlay {
    padding: 30px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-sizing: border-box;
  }
  .box-form .left .overlay h1 {
    font: size 70px;
    line-height: 1;
    font-weight: 900;
    margin-top: 40px;
    margin-bottom: 20px;
  }

  .box-form .left .overlay span a {
    background: #3b5998;
    color: #FFFFFF;
    margin-top: 10px;
    padding: 14px 50px;
    border-radius: 100px;
    display: inline-block;
    box-shadow: 0 3px 6px 1px #042d4657;
  }
  .box-form .left .overlay span a:last-child {
    background: #1dcaff;
    margin-left: 30px;
  }
  .box-form .right {
    padding: 40px;
    overflow: hidden;
  }
  @media (max-width: 980px) {
    .box-form .right {
      width: 100%;
    }
  }
  .box-form .right h5 {
    font-size: 6vmax;
    line-height: 0;
  }
  .box-form .right p {
    font-size: 14px;
    color: #B0B3B9;
  }
  .box-form .right .inputs {
    overflow: hidden;
  }
  .box-form .right input {
    width: 100%;
    padding: 10px;
    margin-top: 25px;
    font-size: 16px;
    border: none;
    outline: none;
    border-bottom: 2px solid #B0B3B9;
  }
  
  .box-form .right button {
    float: right;
    color: #fff;
    font-size: 16px;
    padding: 12px 35px;
    border-radius: 50px;
    display: inline-block;
    border: 0;
    outline: 0;
    box-shadow: orangered;
    background-image: linear-gradient(135deg, orangered 10%, orangered 100%);
  }

       </style>
    </head>

    <body>
        <form action="update_process_booking.php?id=<?php echo $hotel_id?>" method="POST" enctype = 'multipart/form-data'>
        <div class="box-form">
            <div class="left">
                <div class="overlay">
                <h1>UPDATE BOOKING</h1>
                </div>
            </div>
                        
            <div class="right">
                <h5></h5>
               
                <div class="inputs">

                    <input type="number" id="id" name="id" placeholder="Enter Hotel Booking ID" value = "<?php echo $booking_id?>">
                    <br>
                    <input type="number" id="customer_id" name="customer_id" placeholder="Enter Customer ID" value = "<?php echo $customer_id?>">
                    <br>
                    <input type="text" id="username" name="username" placeholder="Enter Username" value = "<?php echo $username?>">
                    <br>
                    <input type="text" id="email" name="email" placeholder="Enter Email Address" value = "<?php echo $email?>">
                    <br>
                    <input type="text" id="hotel_name" name="hotel_name" placeholder="Enter Hotel Name" value = "<?php echo $hotel_name?>">
                    <br>
                    <input type="number" id="guest" name="guest" placeholder="Enter Guest Numbers" value = "<?php echo $guest?>">
                    <br>
                    <input type="date" id="check_in_date" name="check_in_date" value = "<?php echo $check_in?>">
                    <br>
                    <input type="date" id="check_out_date" name="check_out_date" value = "<?php echo $check_out?>">
                    <br>
                    <input type="text" id="room_type" name="room_type" placeholder="Enter Room Type" value = "<?php echo $room_type?>">
                    <br>
                    <input type="number" id="total_package_price" name="total_package_price" placeholder="Enter Total Package Price" value = "<?php echo $package?>">
                    <br>
                    <input type="text" id="payment_type" name="payment_type" placeholder="Enter Payment Method" value = "<?php echo $payment_mode?>">

                </div>
                <br><br><br>

                <button type = 'submit'>Update</button>

            </div>
            
        </div>
        <!-- partial -->
      

</body>
</HTML>