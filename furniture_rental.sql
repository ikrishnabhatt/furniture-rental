-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `total` float NOT NULL,
  `disc_perc` float NOT NULL,
  `disc_amt` float NOT NULL,
  `grand_total` float NOT NULL,
  `booking_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_type_id`, `user_id`, `booking_date`, `date_updated`, `total`, `disc_perc`, `disc_amt`, `grand_total`, `booking_status_id`) VALUES
(5, 1, 2, '2024-06-29 10:55:22', '2024-06-29 14:55:22', 250, 0, 0, 250, 0),
(6, 1, 2, '2024-06-29 10:01:18', '2024-06-29 14:01:18', 570, 0, 0, 570, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_map`
--

CREATE TABLE `booking_product_map` (
  `bpm_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `rate` float NOT NULL,
  `gst` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_product_map`
--

INSERT INTO `booking_product_map` (`bpm_id`, `booking_id`, `product_id`, `qty`, `from_date`, `to_date`, `rate`, `gst`, `total`) VALUES
(6, 5, 1, 1, '2024-06-29 10:55:22', '2024-06-29 15:55:22', 120, 0, 120),
(7, 5, 2, 1, '2024-06-29 10:55:22', '2024-06-29 15:55:22', 130, 0, 130),
(8, 6, 3, 1, '2024-06-29 10:01:18', '2024-06-29 14:01:18', 120, 0, 120),
(9, 6, 5, 1, '2024-06-29 10:01:18', '2024-06-29 14:01:18', 120, 0, 120),
(10, 6, 6, 1, '2024-06-29 10:01:18', '2024-06-29 14:01:18', 130, 0, 130),
(11, 6, 9, 1, '2024-06-29 10:01:18', '2024-06-29 14:01:18', 200, 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`, `date_created`, `date_updated`) VALUES
(1, 'chair', '2024-06-29 11:10:00', '2024-06-29 15:00:00'),
(2, 'table', '2024-06-29 11:19:54', '2024-06-29 15:49:54'),
(3, 'sofa', '2024-06-29 11:11:47', '2024-06-29 15:51:47'),
(4, 'dining', '2024-06-29 11:11:47', '2024-06-29 15:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `buying_price` float NOT NULL,
  `renting_price_per_day` float NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `buying_price`, `renting_price_per_day`, `date_created`, `date_updated`) VALUES
(1, 'Chair 1', 1, 10000, 120, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(2, 'Chair 2', 1, 11000, 130, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(3, 'Chair 3', 1, 11000, 120, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(4, 'Chair 4', 1, 11000, 130, '2024-06-29 11:50:41', '2024-06-29 13:58:41'),
(5, 'Table 1', 2, 10000, 120, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(6, 'Table 2', 2, 11000, 130, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(7, 'Table 3', 2, 11000, 120, '2024-06-29 11:50:52', '2024-06-29 13:56:52'),
(8, 'Table 4', 2, 11000, 130, '2024-06-29 11:50:41', '2024-06-29 13:58:41'),
(9, 'Sofa 1', 3, 15000, 200, '2024-06-29 11:56:52', '2024-06-29 15:56:52'),
(10, 'Sofa 2', 3, 20000, 300, '2024-06-29 11:56:52', '2024-06-29 15:56:52'),
(11, 'Sofa 3', 3, 25000, 500, '2024-06-29 11:56:52', '2024-06-29 15:56:52'),
(12, 'Sofa 4', 3, 13000, 130, '2024-06-29 11:58:41', '2024-06-29 15:58:41'),
(13, 'Dining 1', 4, 30000, 1000, '2024-06-29 11:56:52', '2024-06-29 14:56:52'),
(14, 'Dining 2', 4, 25000, 700, '2024-06-29 11:56:52', '2024-06-29 14:56:52'),
(15, 'Dining 3', 4, 28000, 500, '2024-06-29 11:56:52', '2024-06-29 14:56:52'),
(16, 'Dining 4', 4, 24000, 450, '2024-06-29 11:58:41', '2024-06-29 04:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pin_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `email_id`, `password`, `first_name`, `last_name`, `phone`, `city`, `address`, `pin_code`) VALUES
(1, 1, 'userid1', 'kb01', 'name1', 'surname', 9632813323, 'ahmedabad', 'addI', 390019),
(2, 1, 'userid2', 'hm21', 'name2', 'surname', 9737047650, 'vadodara', 'addII, Waghodia', 390025);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_name`, `date_created`, `date_updated`) VALUES
(1, 'User', '2024-06-29 11:22:07','2024-06-29 12:22:07'),
(2, 'Admin', '2024-06-29 11:23:03', '2024-06-29 12:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_product_map`
--
ALTER TABLE `booking_product_map`
  ADD PRIMARY KEY (`bpm_id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_product_map`
--
ALTER TABLE `booking_product_map`
  MODIFY `bpm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
