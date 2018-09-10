-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 02:10 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dw_00162357`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `usr` text NOT NULL,
  `p_name` text NOT NULL,
  `p_price` text NOT NULL,
  `p_location` text NOT NULL,
  `p_id` text NOT NULL,
  `str-dt` text NOT NULL,
  `end-dt` text NOT NULL,
  `child` text NOT NULL,
  `adult` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `usr`, `p_name`, `p_price`, `p_location`, `p_id`, `str-dt`, `end-dt`, `child`, `adult`) VALUES
(22, '', 'Testing', '1500', 'New York', '14', '2017-10-02', '2017-10-17', '2', '1'),
(26, '', 'Testing', '1500', 'New York', '14', '2017-10-17', '2017-10-20', '2', '1'),
(27, '', 'Luxury', '1500', 'New York', '14', '2017-10-17', '2017-10-20', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `post_title` varchar(70) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `post_description` varchar(250) NOT NULL,
  `post_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `post_title`, `user_id`, `user_name`, `post_description`, `post_img`) VALUES
(12, 'food feedback', 0, 'rakib', 'sakib er basay buar ranna valona', ''),
(13, 'french fry', 0, 'saikka', 'quite good', ''),
(21, 'luxury cabin', 12, 'nakib', 'Get discount if Booked 2 Luxury cabin', '');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `pack_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `pack_img` varchar(1000) NOT NULL,
  `cabin_des` varchar(250) NOT NULL,
  `park_des` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pack_name`, `location`, `price`, `pack_img`, `cabin_des`, `park_des`) VALUES
(3, 'Contemporary', 'coxbazar', 2000, '20171016055129_GF-Indigo-Moon-Ldg-br3_result.jpg', 'Suitable for 2 adults and 1 children.', 'yes'),
(4, 'Luxury', 'Comilla', 3200, '20171016055150_luxury-cabin-rentals-near-kamloops-canada.jpg', 'This cabin is for 2 adults and 2 childs', 'yes'),
(5, 'Original', 'dhaka', 1200, '20171016055458_Lighthouse.jpg', 'This cabin is for 2 adults only', 'no'),
(6, 'Original', 'kaptai', 1500, '20171016055536_property4.jpg', 'This cabin is for 2 adults only', 'no'),
(7, 'Original', 'Dhaka', 1800, '20171016055348_The-Point-Mohawk_Elite-Traveler-462x346.jpg', 'This is for two adults only', 'no'),
(12, 'Luxury', 'dhaka', 3000, '20171016055317_1BD-Luxury-Cabin4.jpg', 'This cabin is very comfortable for 2 adults and 2 childrens. ', 'yes'),
(14, 'Luxury', 'New York', 1500, '20171016131123_property1.jpg', 'modify Test.', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `user_name` varchar(70) NOT NULL,
  `cmnt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `postID`, `userID`, `user_name`, `cmnt`) VALUES
(12, 0, 0, '', 'gregr'),
(16, 13, 9, 'rakib', 'grgregergerger'),
(17, 13, 9, 'rakib', 'grgregergerger'),
(18, 13, 9, 'rakib', 'ewtw4t43'),
(19, 13, 9, 'rakib', 'ewtw4t43'),
(20, 0, 9, 'rakib', 'gery5y5y'),
(21, 14, 12, 'nakib', 'sdfsdf'),
(22, 20, 12, 'nakib', 'valani?');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `type` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`id`, `name`, `email`, `password`, `gender`, `postal`, `type`) VALUES
(2, 'Mamo', 'misujon@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '123', 1),
(4, 'faruk', 'faruk@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '1209', 1),
(5, 'saikka', 'sakib@gmail.com', '202cb962ac59075b964b07152d234b70', 'female', '1208', 1),
(6, 'nakib', 'farfuk@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '120', 1),
(7, 'tazu', 'tazul@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '1234', 1),
(8, 'vatija', 'vatija@gmail.com', '202cb962ac59075b964b07152d234b70', '', '1234', 1),
(9, 'rakib', 'mango@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '12089', 1),
(10, 'tazu', 'tazu@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '123', 1),
(11, 'nakib', 'nakibstranger12@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '123', 1),
(12, 'nakib', 'nakib@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '1205', 0),
(13, 'nakib', 'nakibstranger@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '1233', 1),
(14, 'nokib', 'nakibstranger@yahoo.com', '202cb962ac59075b964b07152d234b70', 'male', '1209', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
