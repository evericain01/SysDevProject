-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 08:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_db`
--
CREATE DATABASE IF NOT EXISTS `marketplace_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `marketplace_db`;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `budget` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `user_id`, `first_name`, `last_name`, `budget`) VALUES
(6, 47, 'Jon', 'White', 83819.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_of_arrival` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` double(10,2) NOT NULL,
  `status` enum('Delivered','In Transit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `seller_id`, `buyer_id`, `product_id`, `timestamp`, `date_of_arrival`, `total`, `status`) VALUES
(172, 6, 6, 12, '2021-05-07 19:48:30', '2021-05-14 04:00:00', 260.00, 'Delivered'),
(173, 6, 6, 11, '2021-05-07 19:55:58', '2021-05-14 04:00:00', 1400.00, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `caption` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `seller_id`, `filename`, `caption`, `description`, `quantity`, `price`) VALUES
(11, 6, '6092bb3913f37.png', 'i9 9700k', 'Coffee Lake 8-Core 3.6 GHz (4.9 GHz Turbo) LGA 1151', 120, 700.00),
(12, 6, '6092bb8f50d19.png', 'Sennheiser Headphones', 'HD 450BT. 18 Hz - 22,000 Hz; Bluetooth® 5.0.', 1, 260.00),
(13, 6, '6092bd52523e9.png', 'Gaming Mouse', 'Natec Genesis G66 NMG-0662', 0, 20.00),
(14, 6, '6092bdc0bb85f.png', 'RT-AC68U', 'AC1900 Dual Band Gigabit WiFi Router', 23, 250.00),
(15, 6, '6092be4d54a35.png', 'USB Key', 'Kingston 32GB DataTraveler Kyson', 92, 15.00),
(16, 6, '6092bf3d9293d.png', 'Samsung TV', '55\" 2020 TU8000 Smart 4K UHD TV', 14, 1100.00),
(23, 8, '60936cc78ca5f.png', 'Samsung Galaxy S20', 'FE 5G SM-G781U 128GB Smartphone (Unlocked)\r\n', 37, 1150.00),
(24, 8, '60936ce791b0d.png', 'Canon Camera', 'Canon EOS Rebel T7i EF-S 18-55mm IS STM Lens Kit', 15, 800.00),
(25, 8, '60936d097a485.png', 'SD Card', 'SanDisk 128GB Extreme PRO SDXC', 50, 40.00),
(26, 8, '60936d2aefef2.png', 'Apple Watch', 'Series 6 Gold Aluminium Case with Sport Band', 17, 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `rate` enum('1/5','2/5','3/5','4/5','5/5') NOT NULL,
  `text_review` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `buyer_id`, `rate`, `text_review`, `date`) VALUES
(36, 12, 6, '4/5', 'Pretty Good. A+', '2021-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `brand_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `user_id`, `first_name`, `last_name`, `brand_name`) VALUES
(6, 32, 'Timmy ', 'Matthews', 'TechoBiz'),
(8, 49, 'Anthony', 'Brown', 'Electric.co');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password_hash` varchar(225) NOT NULL,
  `user_role` enum('seller','buyer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `user_role`) VALUES
(32, 'seller123', '$2y$10$aRqNv9EcVM0GywLNYa/WIuc5Ulp/zFAsse0T4zndu5VzwcXSkiFbS', 'seller'),
(47, 'buyer123', '$2y$10$CFOBBS1MDET8416x0/vHuuEA2YyLy6oi3iWr6VnTtndIYxV6EeKaK', 'buyer'),
(49, 'seller1234', '$2y$10$hJbEmT84CeW3XKNPDh4V..58dP7XcsZozPhYMQttLLu6ZAg/WmToy', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`),
  ADD KEY `userFK` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `product_id_FK` (`product_id`),
  ADD KEY `buyer_FK` (`buyer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `sellerID_FK` (`seller_id`),
  ADD KEY `buyerID_FK` (`buyer_id`),
  ADD KEY `productID_FK` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id_FK` (`seller_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_FK` (`product_id`),
  ADD KEY `buyer_FK_ID` (`buyer_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `user_id_FK` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `buyer_FK` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `product_id_FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `buyerID_FK` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `productID_FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `sellerID_FK` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `seller_id_FK` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `buyer_FK_ID` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `product_FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
