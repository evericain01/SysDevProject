-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 10:33 PM
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
-- Database: `accsys_data_db`
--
CREATE DATABASE IF NOT EXISTS `accsys_data_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `accsys_data_db`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone_No` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `user_id`, `first_name`, `last_name`, `email`, `phone_No`) VALUES
(8, 12, 'Peter', 'Hill', 'pete321@gmail.com', '514-234-2444'),
(11, 15, 'Lucas', 'O\'Mally', 'luc123@hotmail.com', '438-825-6523'),
(12, 16, 'Brandon', 'Henry', 'bh1@outlook.com', '514-482-5244'),
(13, 17, 'Juliette', 'Brown', 'jBrown@hotmail.com', '514-353-7686'),
(16, 13, 'Jim', 'Robby', 'robby594@yahoo.com', '514-322-4442'),
(17, 11, 'Ebrahim', 'Vericain', 'evericain01@hotmail.com', '438-999-9999');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone_No` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `user_id`, `first_name`, `last_name`, `email`, `phone_No`) VALUES
(4, 14, 'Kyle', 'Timmisco', 'ky_T@gmail.com', '438-534-3466'),
(9, 1, 'Patrick', 'Vericain', 'primemail@gmail.com', '514-823-8889');

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

DROP TABLE IF EXISTS `printer`;
CREATE TABLE `printer` (
  `printer_id` int(11) NOT NULL,
  `printer_model` varchar(60) NOT NULL,
  `printer_brand` varchar(60) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`printer_id`, `printer_model`, `printer_brand`, `quantity`) VALUES
(1, 'MFC-L9570CDW', 'Brother', 12),
(2, 'Phaser 6510', 'XEROX', 0),
(3, 'CX923DXE', 'LEXMARK', 1),
(5, 'MFC-J491D', 'Brother', 4),
(6, 'ImageCLASS MF810', 'XEROX', 9),
(7, 'LaserJet Enterprise MFP M480f', 'HP', 2),
(8, 'LaserJet Enterprise MFP M776dn', 'HP', 1),
(9, 'VersaLink C9000/DT', 'XEROX', 12),
(10, 'Officejet Pro 7740 AIO', 'HP', 10),
(11, 'ImageCLASS MF644Cdw', 'CANON', 11),
(12, 'MFC-J6930DW', 'Brother', 8),
(13, 'PIXMA TR7020', 'CANON', 11),
(14, 'Officejet Pro 9020 AIO', 'HP', 5),
(15, 'VersaLink C7030/DS2', 'XEROX', 2),
(16, 'HL-L5000D', 'Brother', 8),
(17, 'Phaser 3330', 'XEROX', 12),
(18, 'VersaLink B7030/HS2', 'XEROX', 3),
(19, 'MC3426i', 'LEXMARK', 4),
(20, 'MFC-L6900DW', 'Brother', 12),
(21, 'MX622ade', 'LEXMARK', 1),
(22, 'MFC-L6900DW', 'LEXMARK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rma`
--

DROP TABLE IF EXISTS `rma`;
CREATE TABLE `rma` (
  `rma_id` int(11) NOT NULL,
  `printer_id` int(11) DEFAULT NULL,
  `toner_id` int(11) DEFAULT NULL,
  `date` varchar(16) NOT NULL,
  `rma_reason` text NOT NULL,
  `rma_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rma`
--

INSERT INTO `rma` (`rma_id`, `printer_id`, `toner_id`, `date`, `rma_reason`, `rma_quantity`) VALUES
(5, 1, NULL, '2021-05-12 06:27', 'Stopped working after 2 weeks. Needs fixing asap.', 1),
(7, NULL, 1, '2021-05-12 06:29', 'They cartridges are not compatible with my printer. I did know this, so they broken now', 4),
(8, NULL, 11, '2021-05-12 06:30', 'The black ink started to leak in my printer for some reason. Need replacement ASAP.', 1),
(9, NULL, 11, '2021-05-12 06:31', 'The toner cartridge doesn\'t fit into my printer. Need an exchange. ', 2),
(10, 8, NULL, '2021-05-12 14:41', 'Printer jammed. Printer is making weird sound when trying to print something.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stock_history`
--

DROP TABLE IF EXISTS `stock_history`;
CREATE TABLE `stock_history` (
  `stock_history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `printer_id` int(11) DEFAULT NULL,
  `toner_id` int(11) DEFAULT NULL,
  `worker_name` varchar(64) NOT NULL,
  `date` varchar(16) NOT NULL,
  `type_of_change` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toner`
--

DROP TABLE IF EXISTS `toner`;
CREATE TABLE `toner` (
  `toner_id` int(11) NOT NULL,
  `toner_model` varchar(60) NOT NULL,
  `toner_brand` varchar(60) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toner`
--

INSERT INTO `toner` (`toner_id`, `toner_model`, `toner_brand`, `quantity`) VALUES
(1, 'Phaser 6250 High Capacity', 'XEROX', 12),
(2, '056 Black', 'CANON', 21),
(3, 'TN433BK High Yield Black', 'Brother', 50),
(4, 'TN431Y Yellow', 'Brother', 24),
(5, '16A Black', 'HP', 10),
(6, '131 Magenta', 'CANON', 7),
(7, 'TN550 Black', 'Brother', 15),
(8, '054H High Capacity Black', 'CANON', 12),
(9, '055 Yellow', 'CANON', 4),
(10, 'TN439BK Ultra High Yield Black', 'Brother', 13),
(11, 'Extra High Yield Black', 'LEXMARK', 20),
(12, '42X Black High Yield', 'HP', 12),
(13, 'Solid Ink 8500 / 8550 Black', 'XEROX', 4),
(14, 'Solid Ink 8400 Magenta', 'XEROX', 16),
(15, 'Phaser 7400 Magenta', 'XEROX', 8),
(16, 'TN580 Black High Yield', 'Brother', 5),
(17, '24A (Q6000A) Black LaserJet', 'HP', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password_hash` varchar(225) NOT NULL,
  `user_role` enum('Manager','Employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `user_role`) VALUES
(1, 'manager101', '$2y$10$gxgjx4JPly7e/wzf/Lmjoe/is7wDfNtFmhPXNLzqWYT8Xpg8/96Im', 'Manager'),
(11, 'employee101', '$2y$10$Xzgtk/oKc6qNRK8AaX2LFOyoJ6nqKp04QDGGgyElUXVxuSzMpWLWm', 'Employee'),
(12, 'peter123', '$2y$10$jpnrIP9p3I96jW/KMeh96.OhK8Z/PGDT5a9bMLpziseQaDSFvocya', 'Employee'),
(13, 'jimmy123', '$2y$10$8j6kQ7Tu4QIxZxLxvT.dQOo.nAnFxX7riIBpyFFstBNAKNRFsXc9W', 'Employee'),
(14, 'kyleT99', '$2y$10$Lx4KpOjNpXLeCUrL//DVbureI2206CqlbF/yGzoL/uTHczWFVRrvW', 'Manager'),
(15, 'luca32', '$2y$10$gbJQTR6pjiN9jptObRKBDeirQ2YBflfQI9Hfxa9D07vc655b6w/4a', 'Employee'),
(16, 'branny101@gmail.com', '$2y$10$pqqkpeDegqPcRg2N377xdOBNgYMoiIRr14O0DdvTmQz93Kuog8m8K', 'Employee'),
(17, 'jules22', '$2y$10$ynbLpq713H4H9hACukwO2uEkFgl1R4hDUsZZyrrwQqtiL9RmIYKry', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employeeUser_id_FK` (`user_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `managerUser_id_FK` (`user_id`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`printer_id`);

--
-- Indexes for table `rma`
--
ALTER TABLE `rma`
  ADD PRIMARY KEY (`rma_id`),
  ADD KEY `printerID_FK` (`printer_id`),
  ADD KEY `tonerID_FK` (`toner_id`);

--
-- Indexes for table `stock_history`
--
ALTER TABLE `stock_history`
  ADD PRIMARY KEY (`stock_history_id`),
  ADD KEY `user_id_FK` (`user_id`),
  ADD KEY `printer_id_FK` (`printer_id`),
  ADD KEY `toner_id_FK` (`toner_id`);

--
-- Indexes for table `toner`
--
ALTER TABLE `toner`
  ADD PRIMARY KEY (`toner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `printer`
--
ALTER TABLE `printer`
  MODIFY `printer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rma`
--
ALTER TABLE `rma`
  MODIFY `rma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stock_history`
--
ALTER TABLE `stock_history`
  MODIFY `stock_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `toner`
--
ALTER TABLE `toner`
  MODIFY `toner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employeeUser_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `managerUser_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rma`
--
ALTER TABLE `rma`
  ADD CONSTRAINT `printerID_FK` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`printer_id`),
  ADD CONSTRAINT `tonerID_FK` FOREIGN KEY (`toner_id`) REFERENCES `toner` (`toner_id`);

--
-- Constraints for table `stock_history`
--
ALTER TABLE `stock_history`
  ADD CONSTRAINT `printer_id_FK` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`printer_id`),
  ADD CONSTRAINT `toner_id_FK` FOREIGN KEY (`toner_id`) REFERENCES `toner` (`toner_id`),
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
