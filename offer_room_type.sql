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
-- Table structure for table `offer_room_type`
--

CREATE TABLE `offer_room_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(64) NOT NULL,
  `max_guests` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='single, double, etc.';

--
-- Dumping data for table `offer_room_type`
--

INSERT INTO `offer_room_type` (`id`, `type_name`, `max_guests`, `desc`) VALUES
(4, 'Single Room', 1, 'A room assigned to one person. May have one or more beds.'),
(5, 'Family Room', 4, 'A room assigned to four people. May have two or more beds.'),
(6, 'Double Room', 2, 'A room assigned to two people. May have one or more beds.'),
(7, 'Triple Room', 3, 'A room assigned to three people. May have two or more beds.'),
(8, 'Executive Suite', 2, 'A parlour or living room connected with to one or more bedrooms. '),
(9, 'Presidential Suite', 9, 'A room that has one or more bedrooms and a living space. The most expensive room provided by a hotel.'),
(10, 'Disabled Room', 2, 'A room that is mainly designed for disabled guests.'),
(12, 'Queen Room', 2, 'A room with a queen-sized bed. May be occupied by one or more people.'),
(14, 'Hollywood Twin Room', 2, 'A room that can accommodate two persons with two twin beds joined together by a common headboard. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer_room_type`
--
ALTER TABLE `offer_room_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_type_ak_1` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer_room_type`
--
ALTER TABLE `offer_room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
