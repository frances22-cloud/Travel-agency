-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer_hotel`
--

CREATE TABLE `offer_hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `hotel_image` varchar(60) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `is_partner` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_hotel`
--

INSERT INTO `offer_hotel` (`id`, `hotel_name`, `city_id`, `hotel_address`, `hotel_image`, `details`, `is_partner`, `active`) VALUES
(20, 'Angama Mara', 1, 'The Mara Triangle Conservancy Maasai Mara Game Reserve, Lolgorien', 'mara.jpg', 'The luxurious Angama Mara is perched high on the rim of Africas Great Rift Valley with a sensational vantage point overlooking the Mara Triangle', 1, 1),
(21, 'Sarova Whitesands Beach Resort & Spa Mombasa', 1, 'Off Malindi Road, Mombasa County, Mombasa', 'sarova.jpg', 'Sarova Whitesands Beach Resort and Spa is located in Mombasa on the Bamburi Beach.', 1, 1),
(23, 'Four Points by Sheraton Nairobi Airport ', 1, 'Tower Avenue, Jomo Kenyatta International Airport', 'four.jpg', 'Set in Nairobi, 6.4 km from Syokimau Railway Station, Four Points by Sheraton Nairobi Airport features an outdoor swimming pool and complimentary on site private parking. ', 1, 1),
(24, 'Villa Rosa Kempinski', 1, 'Chiromo Rd, Nairobi', 'villa.jpg', 'Just 10 minutes drive from Nairobis CBD, Villa Rosa Kempinski offers guests a 24 hour front desk, a spa and a fitness center.', 1, 1),
(25, 'Swahili Beach Resort', 1, 'Swahili Beach Resort, Ukunda, Diani Beach Road, Kwale', 'swahili.webp', 'Upscale rooms in a beachfront resort featuring free breakfast, plus fine dining, a spa & pools.', 1, 1),
(39, 'Enashipai Resort & Spa', 1, 'Moi S Lake Rd, Naivasha', 'ensh.jpg', 'Enashipai Resort & Spa is a must stay in a hotel in Naivasha with stunning views of the beautiful Lake Naivasha.', 1, 1),
(40, 'Mahali Mzuri', 1, ' Motorogi Conservancy, Masai Mara', 'mahali.jpg', 'Mahali Mzuri is a luxury tented camp and the tents are very comfortable with a sleeping area and a lovely deck overlooking the valley where there is wildlife.', 1, 1),
(41, 'The Sands at Nomad Hotel', 1, 'Diani Beach Road, Diani Beach', 'dianisands.png', 'Polished beachfront hotel with 2 restaurants, an outdoor pool & a spa, plus a fitness centre.', 1, 1),
(42, 'Giraffe Manor', 1, 'Gogo Falls Road, Nairobi', 'giraffe.jpg', 'Giraffe Manor is an iconic boutique hotel set in a leafy suburb of Nairobi.', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer_hotel`
--
ALTER TABLE `offer_hotel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer_hotel`
--
ALTER TABLE `offer_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
