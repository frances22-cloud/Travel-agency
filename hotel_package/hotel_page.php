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


<!-- hotel preview section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/hotel1.jpg) no-repeat">
            <div class="content">
               <span>Rest, Relax, Enjoy</span>
               <h3>Welcome to the coast</h3>
               <a href="" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/hotel2.jpg) no-repeat">
            <div class="content">
               <span>Looking for adventure?</span>
               <h3>Explore the wild</h3>
               <a href="" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/hotel3.jpg) no-repeat">
            <div class="content">
               <span>Want the authentic experience?</span>
               <h3>Camp in the outdoors</h3>
               <a href="" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- hotel preview section ends -->

<!-----featured accomodation categories------>

<!---- hotel category begins ---->
<section class="home-packages">

   <h1 class="heading-title"> Accomodation </h1>

   <div class="small-container">
      <div class="box">
       <div class="row"> 
            <?php
            $connect = mysqli_connect('localhost', 'root', '','travel agency database');
            $query = 'SELECT * FROM hotel';
            $result = mysqli_query($connect,$query);
            
            if($result):
               if(mysqli_num_rows($result)>0):
                  while($hotel = mysqli_fetch_assoc($result)):
					?>
         <div class="column_4">
            <form action="" method = "POST">
            <a href = "<?php printf('%s?id=%s','hotel_details.php',$hotel['id'])?>"><img src = "<?php echo "images/".$hotel['hotel_image'];?>"></a>
                        <h1 class = ><?php echo $hotel['hotel_name']; ?></h1>
                
                        <p class = "para"><?php echo $hotel['details']; ?></p>
                        <a href="<?php printf('%s?id=%s','hotel_details.php',$hotel['id'])?>" class="btn" text-align= "center">book now</a>

            
            </div>
            
         </form>
         
         <?php
                endwhile;
            endif;
        endif;
                ?>
      </div>
   </div>
      

   </div>

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









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
