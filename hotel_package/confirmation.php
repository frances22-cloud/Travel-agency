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
      <a href="../customers/login.php" class="login">Login/Register</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->



<section class="home-packages">

   <h1 class="heading-title"> Booking Status </h1>

   <div class="box-container">

      <div class="box">
         <div class="content">
            <h3>Your booking is successful</h3>
            <p>Your receipt will be issued to you in a moment</p>
            <a href="index.php" class="btn">Return to Home Page</a>
            <a class = "btn" href='delete2.php?deleteid="<?php echo $row["ID"]?>"'>Undo Booking</a>
         </div>
      </div>

      
</section>

<!-- home packages section ends -->


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









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>