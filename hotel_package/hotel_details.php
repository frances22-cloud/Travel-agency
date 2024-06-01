<?php
$conn = mysqli_connect('localhost', 'root', '','travel agency database');
$id = $_GET['id']?? 1;
$sql = "SELECT * FROM `hotel` ";
$result = mysqli_query($conn,$sql);
foreach($result as $row):
    if($row['id'] == $id):
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookings & Travel Agency Website</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="index.php" class="logo">
      <img src="images/Logo-3.png" alt="">
   </a>

   <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="">About</a>
      <a href="">Contact</a>
      <a href="customers/login.php" class="login">Login/Register</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>


<!-- header section ends  -->




<!-- hotel preview section ends -->

<!-----featured accomodation categories------>

<!---- hotel category begins ---->
<section class="home-packages">

   <h1 class="heading-title"> Accomodation </h1>

   <div class="small-container">
      <div class="box">
       <div class="row">
       <div class="column_2">
                    <img src = "<?php echo "images/".$row['hotel_image'] ?>" width = "100%">
                </div> 
         <div class="column_2">
            <?php
            echo"
            <h1 id = 'head'> ".$row['hotel_name']." </h1>
            <br>
            <p id = 'para2'>".$row['details']."</p>
            <br>
            <h1>Room Type: </h1>
            <h1>".$row['room_type']."</h1>
            <br>
            <h1>Service Price:  <input type ='hidden' class = 'iprice' value =".$row['service_price']."></h1>
            <h1>".$row['service_price']." per person</h1>
            <br>
            <h1>Nights stayed: </h1>
            <input type = 'number' class = 'inights' value = ".$row['nights']." onchange = 'subTotal();'>
            <br><br>
            <h1>Final Price: (per person)</h1>
            <h1 class = 'itotal'></h1>
            <br>
            <a href = 'hotel_booking_form.php' class = 'btn'>Go to Booking Page</a> 

            
            </div>
         
      </div>
   </div>
  ";
         endif;    
        endforeach;
        ?>

</section>

<!-- hotel category ends -->





<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="index.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href=""> <i class="fas fa-angle-right"></i> about</a>
         <a href=""> <i class="fas fa-angle-right"></i> package</a>
         <a href=""> <i class="fas fa-angle-right"></i> book</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 0759792595 </a>
         <a href="#"> <i class="fas fa-phone"></i> 0712345678 </a>
         <a href="#"> <i class="fas fa-envelope"></i> softeng.grp4@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Nairobi, Kenya</a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Software Engineering Group 4</span> | all rights reserved&copy; </div>

</section>

<!-- footer section ends -->

<script>
        var iprice=document.getElementsByClassName('iprice');
        var inights=document.getElementsByClassName('inights');
        var itotal=document.getElementsByClassName('itotal');

        function subTotal()
        {
            gt=0;
            for(i=0;i<iprice.length;i++)
            {
                itotal[i].innerText=(iprice[i].value)*(inights[i].value);
            }
        }

        subTotal();

    </script>";







<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
