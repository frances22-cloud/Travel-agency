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
-- Table structure for table `offer_hotel_services`
--

CREATE TABLE `offer_hotel_services` (
  `id` int(11) NOT NULL,
  `offer_name` varchar(200) NOT NULL,
  `offer_hotel_id` varchar(60) NOT NULL,
  `offer_room_type_id` varchar(60) NOT NULL,
  `days` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_hotel_services`
--

INSERT INTO `offer_hotel_services` (`id`, `offer_name`, `offer_hotel_id`, `offer_room_type_id`, `days`, `availability`, `price`) VALUES
(12, '5 days in Masaai Mara', '40', '6', 5, 9, '60000.00'),
(13, '6 days in Masaai Mara', '20', '4', 6, 13, '80000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer_hotel_services`
--
ALTER TABLE `offer_hotel_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer_hotel_services`
--
ALTER TABLE `offer_hotel_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
