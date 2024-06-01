<?php
	include('../dbconnection.PHP');
?>

<!DOCTYPE html>
<html>
	<head>
	   <meta charset="UTF-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <title>Safari Tours & Travels</title>

	   <!-- swiper css link  -->
	   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

	   <!-- font awesome cdn link  -->
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	   <!-- custom css file link  -->
	   <link rel="stylesheet" href="../css/style.css">

	</head>
	
	<body>
	   
		<!-- header section starts  -->

		<?php if (isset($_GET['message'])) { ?>
			<p class = "message"><?php echo $_GET['message']; ?></p>
		<?php } ?>

		<section class="header">

		   <a href="index.php" class="logo">
			  <img src="../images/Logo-3.png" alt="">
		   </a>

		   <nav class="navbar">
			  <a href="../index/index.php">Home</a>
			  <a href="">About</a>
			  <a href="">Contact</a>
			  <a href="../customers/login.php" class="login">Login/Register</a>
		   </nav>

		   <div id="menu-btn" class="fas fa-bars"></div>

		</section>


		<!-- header section ends  -->


		<!-- hotel preview section starts  -->

		<section class="home">

			<div class="swiper home-slider">

				<div class="swiper-wrapper">

				 <div class="swiper-slide slide" style="background:url(../images/hotel1.jpg) no-repeat">
					<div class="content">
					   <span>Rest, Relax, Enjoy</span>
					   <h3>Welcome to the coast</h3>
					   <a href="" class="btn">discover more</a>
					</div>
				 </div>

				 <div class="swiper-slide slide" style="background:url(../images/hotel2.jpg) no-repeat">
					<div class="content">
					   <span>Looking for adventure?</span>
					   <h3>Explore the Rift Valley</h3>
					   <a href="" class="btn">discover more</a>
					</div>
				 </div>

				 <div class="swiper-slide slide" style="background:url(../images/hotel3.jpg) no-repeat">
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


		<!---- hotel category begins ---->
		<section class="home-packages">

		   <h1 class="heading-title"> Accomodation </h1>
		   
		   

			<div class="box-container">

				<!-- accomodation list -->
				<div class = "hotel">			
					<?php if (isset($_GET['status'])) { ?>
						<p class = "status"><?php echo $_GET['status']; ?></p>
					<?php } ?>
					
					<div class = "row">
						<?php
							$sql = 
							"SELECT offer_hotel_services.id, offer_hotel_services.offer_name, 
							offer_hotel_services.offer_hotel_id, offer_hotel_services.offer_room_type_id, 
							offer_hotel_services.days, offer_hotel_services.availability, 
							offer_hotel_services.price, 
							
							offer_hotel.hotel_image, offer_hotel.hotel_name, 

							offer_room_type.type_name, offer_room_type.desc, offer_room_type.max_guests
							FROM ((offer_hotel_services 
							INNER JOIN offer_hotel ON offer_hotel_services.offer_hotel_id = offer_hotel.id)
							INNER JOIN offer_room_type ON	offer_hotel_services.offer_room_type_id = offer_room_type.id)
							WHERE offer_hotel_services.availability > 0";
							
							$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
							
							if(mysqli_num_rows($result)>0){
								
								foreach($result as $offer){
								$id = $offer["id"];
								$offer_name = $offer["offer_name"];
								$hotel_id = $offer["offer_hotel_id"];
								$room_id = $offer["offer_room_type_id"];
								$days = $offer["days"];
								$avail = $offer["availability"];
								$price = $offer["price"];
								$hotel_name = $offer["hotel_name"];	
								$image = $offer["hotel_image"];							
								$room_name = $offer["type_name"];
								$guests = $offer["max_guests"];
								$room_desc = $offer["desc"];
						?>
					
						<div class = "hotel_box">
							<form action = "booking_hotel_offer.php" method = "post">
								<div class ="slide_img">
									<img src = "../images/<?php echo $image;?>" alt = "Hotel">
									
									<div class = "avail">
										<p>ONLY <?php echo $avail;?> PACKAGES LEFT!</p>
									</div>
								</div>
								
								<div class = "detail_box">
									<div class = "hotel_name">
										<h1> <?php echo strtoupper($hotel_name);?></h1>
									</div>

									<div class = "top_box">
										<div class = "type">
											<h1> <?php echo strtoupper($offer_name);?></h1>
										</div>
										
										<div class = "price">
											<p> <?php echo number_format($price,2);?> KSH</p>
										</div>
									</div>
									
									<div class = "room_details">
										<div class = "room_type">
											<p> <?php echo $room_name;?></p>
										</div>
										
										<div class = "room_desc">
											<p> <?php echo $guests;?> guest(s)</p>
											<br>
											<p> <?php echo $room_desc;?></p>
										</div>
									</div>
									
									<div class = "book_btn">
										<button type = "submit" name = "submit" id = "submit" value = "<?php echo $id;?>"> BOOK NOW </button>
									</div>
								</div>
							</form>
						</div>
							<?php
									}
								}
							
							else {
							?>

							<?php
								}
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
		<script src="../js/script.js"></script>

	</body>
</html>