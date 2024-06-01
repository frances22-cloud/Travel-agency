<?php

	include('../dbconnection.PHP');
	session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Safari Tours & Travels Agency </title>

	<!-- swiper css link  -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="../css/style.css">

</head>

<body>

	<!-- header section starts  -->
	
	<section class="header">

		<a href="index.php" class="logo">
			<img src="../../images/Logo-3.png" alt="">
		</a>

		<nav class="navbar">
			<a href="">Home</a>
			<a href="">About</a>
			<a href="">Contact</a>

			<?php
			if (!isset($_SESSION['id'])) {
			?>
				<a href="../login_register/login.php" class="login">Login/Register</a>
			<?php
			}
			?>

			<?php
			if (isset($_SESSION['id'])) {
			?>
				<a href="../login_register/logout.php" class="login">Logout</a>
				<a href ="">Welcome, <?php echo ($_SESSION['first_name']);?></a>
			<?php
			}
			?>

		</nav>

		<div id="menu-btn" class="fas fa-bars"></div>

	</section>

	<!-- header section ends -->

	<!-- home section starts  -->

	<section class="home">

		<div class="swiper home-slider">

			<div class="swiper-wrapper">

				<div class="swiper-slide slide" style="background:url(../images/home-slide-1.jpeg) no-repeat">
					<div class="content">
						<span>explore, discover, travel</span>
						<h3>travel around the world</h3>
						<a href="package.php" class="btn">discover more</a>
					</div>
				</div>

				<div class="swiper-slide slide" style="background:url(../images/home-slide-2.jpg) no-repeat">
					<div class="content">
						<span>explore, discover, travel</span>
						<h3>discover new places</h3>
						<a href="package.php" class="btn">discover more</a>
					</div>
				</div>

				<div class="swiper-slide slide" style="background:url(../images/home-slide-3.jpg) no-repeat">
					<div class="content">
						<span>explore, discover, travel</span>
						<h3>make your tour worthwhile</h3>
						<a href="package.php" class="btn">discover more</a>
					</div>
				</div>

			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>

		</div>

	</section>

	<!-- home section ends -->

	<!-- services section starts  -->

	<section class="services">

		<h1 class="heading-title"> our services </h1>

		<div class="box-container">

			<div class="box">
				<img src="../../images/icon-7.png" alt="">
				<a href="index_hotel.php">
					<h3>Accomodation</h3>
				</a>
			</div>

			<div class="box">
				<img src="../../images/icon-8.png" alt="">
				<a href="index_transport.php">
					<h3>Transport</h3>
				</a>
			</div>

			<div class="box">
				<img src="../../images/icon-7.png" alt="">
				<a href="../hotel_offers/index_hotel.php">
					<h3>Accomodation Offers</h3>
				</a>
			</div>

			<div class="box">
				<img src="../../images/icon-8.png" alt="">
				<a href="index_transport.php">
					<h3>Transport Offers</h3>
				</a>
			</div>

		</div>

	</section>

	<!-- services section ends -->

	<!-- home about section starts  -->

	<section class="home-about">

		<div class="image">
			<img src="../../images/about-img.jpg" alt="">
		</div>

		<div class="content">
			<h3>about us</h3>
			<p>Established in 2006, Safari Tours & Travels is a full service travel, tour operator and destination management company which offers a wide array of services to cater the needs of travel connoisseurs. Feel free to visit our offices in Safari Building, Nairobi along Safari Rd.</p>
			<a href="" class="btn">read more</a>
		</div>

	</section>

	<!-- home about section ends -->

	<!-- home packages section starts  -->

	<section class="home-packages">

		<h1 class="heading-title"> The Experience </h1>

		<div class="box-container">

			<div class="box">
				<div class="image">
					<img src="../../images/img-1.jpg" alt="">
				</div>
				<div class="content">
					<h3>Wildlife Adventures</h3>
					<p>With our well trained Tourist Guides that have your safety in mind,
						experience the sintilating beauty and tranquil of what nature has to offer</p>
				</div>
			</div>

			<div class="box">
				<div class="image">
					<img src="../../images/img-2.jpg" alt="">
				</div>
				<div class="content">
					<h3>Visit Historical Sites</h3>
					<p>Embark on immersive and educative experiences as you learn more about cultures
						and traditions of the local communities
					</p>
				</div>
			</div>

			<div class="box">
				<div class="image">
					<img src="../../images/img-5.jpg" alt="">
				</div>
				<div class="content">
					<h3>Experience Luxury</h3>
					<p>What better way to relax than at the site of the most iconic scenaries and majaestic sites</p>
				</div>
			</div>

		</div>

	</section>

	<section class="home-offers">

		<h1 class="heading-title"> our newest hotel offers </h1>
		
		<div class="row">
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
						WHERE offer_hotel_services.availability > 0
						ORDER BY offer_hotel_services.id DESC LIMIT 4";

			$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con), E_USER_ERROR);

			if (mysqli_num_rows($result) > 0) {

				foreach ($result as $offer) {
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

					<div class="hotel_box">
						<form action="booking_hotel_offer.php" method="post">
							<div class="slide_img">
								<img src="../images/<?php echo $image; ?>" alt="Hotel">

								<div class="avail">
									<p>ONLY <?php echo $avail; ?> PACKAGES LEFT!</p>
								</div>
							</div>

							<div class="detail_box">
								<div class="hotel_name">
									<h1> <?php echo strtoupper($hotel_name); ?></h1>
								</div>

								<div class="top_box">
									<div class="type">
										<h1> <?php echo strtoupper($offer_name); ?></h1>
									</div>

									<div class="price">
										<p> <?php echo number_format($price, 2); ?> KSH</p>
									</div>
								</div>

								<div class="room_details">
									<div class="room_type">
										<p> <?php echo $room_name; ?></p>
									</div>

									<div class="room_desc">
										<p> <?php echo $guests; ?> guest(s)</p>
										<br>
										<p> <?php echo $room_desc; ?></p>
									</div>
								</div>

								<div class="book_btn">
									<button type="submit" name="submit" id="submit" value="<?php echo $id; ?>"> BOOK NOW </button>
								</div>
							</div>
						</form>
					</div>
				<?php
				}
			} else {
				?>

			<?php
			}
			?>
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

		<div class="credit"> created by <span>Software Engineering Group 4</span> | all rights reserved &copy; </div>

	</section>

	<!-- footer section ends -->









	<!-- swiper js link  -->
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

	<!-- custom js file link  -->
	<script src="../js/script.js"></script>

</body>

</html>