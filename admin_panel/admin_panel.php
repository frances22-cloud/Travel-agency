<?php

session_start();

if (!isset($_SESSION['role'])) {
    die( header('location:admin_login.php?error=Please log in to access admin page') );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <ul>
                <li><h1>Admin Panel</h1></li>

                <li>
                    <div class="user">
                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                           <a href="../login_register/logout.php" class="login">Logout</a>
                        <?php
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>


    <div class="content">
        <div class="cards">
            <div class="card">
                <a href="../hotel_offers/insert_offer_hotel.php">Add Hotel for Offers</a>
            </div>

            <div class="card">
                <a href="../hotel_offers/insert_room_type.php">Add Room Types for Offers</a>
            </div>

            <div class="card">
                <a href="../hotel_offers/insert_offer_hotel_services.php">Add Hotel Offers Services</a>
            </div>

            <div class="card">
                <a href="../hotel_offers/view_hotel_offers.php">View Hotel Offer Services</a>
            </div>

            <div class="card">
                <a href="../hotel_offers/view_hotel_offer_bookings.php">View Hotel Offer Bookings</a>
            </div>

            <div class="card">
                <a href="../agent/admin_page_agents.php">Add Agents</a>
            </div>

            <div class="card">
                <a href="../countrycityview/viewcities.php">View Cities</a>
            </div>

            <div class="card">
                <a href="../countrycityview/viewcountries.php">View Countries</a>
            </div>
             <div class="card">
                <a href="../customer/delete_users.php">View Users</a>
            </div>

        </div>
    </div>

    </div>
</body>

</html>
