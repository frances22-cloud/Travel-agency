<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: lightslategray;
            color: white;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        #box {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0px 200px 0px 200px;
        }
    </style>
</head>

<body>
    <!-- header section starts  -->

    <section class="header">

        <a href="index.php" class="logo">
            <img src="../images/Logo-3.png" alt="">
        </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="">About</a>
            <a href="">Contact</a>
            <a href="customers/login.php" class="login">Login/Register</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background:url(../images/home-slide-1.jpg) no-repeat">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>Karibuni Kenya</h3>
                        <a href="" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(../images/home-slide-2.jpg) no-repeat">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>discover nature</h3>
                        <a href="" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(../images/home-slide-3.jpg) no-repeat">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>experience the wild</h3>
                        <a href="" class="btn">discover more</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <div class="jumbotron text-center">
        <h1>Browse All Our Destinations</h1>
    </div>

    <div id="box">
        <form action="script.php" method="get">
            <?php
            include "dbconnection.php";
            include_once "Common.php";
            $common = new Common();
            $countries = $common->getCountry($con);
            ?>
            <label>Country <span style="color:red">*</span></label>
            <select name="country" id="country_id" required class="form-control" onchange="getCityByCountry();">
                <option value="">Select Country</option>
                <?php
                if ($countries->num_rows > 0) {
                    while ($country = $countries->fetch_object()) {
                        $country_name = $country->country_name; ?>
                        <option value="<?php echo $country->country_id; ?>"><?php echo $country_name; ?></option>
                <?php }
                }
                ?>
            </select>
            <label>City <span style="color:red">*</span></label>
            <select class="form-control" name="city" id="city_id" required>
                <option value="">Select City</option>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <script>
        function getCityByCountry() {
            var country_id = $("#country_id").val();
            $.post("ajax.php", {
                getCityByCountry: 'getCityByCountry',
                country_id: country_id
            }, function(response) {
                var data = response.split('^');
                $("#city_id").html(data[1]);
            });
        }
    </script>
    
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