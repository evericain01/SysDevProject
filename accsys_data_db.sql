-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 08:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

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
(5, 11, 'Ebrahim', 'Vericain', 'evericain01@hotmail.com', '4385303188');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

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
(1, 1, 'Patrick', 'Vericain', 'primemail@gmail.com', '514-823-8889');

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE `printer` (
  `printer_id` int(11) NOT NULL,
  `printer_model` varchar(60) NOT NULL,
  `printer_brand` varchar(60) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rma_status` enum('check','unchecked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rma`
--

CREATE TABLE `rma` (
  `rma_id` int(11) NOT NULL,
  `printer_id` int(11) NOT NULL,
  `toner_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `rma_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toner`
--

CREATE TABLE `toner` (
  `toner_id` int(11) NOT NULL,
  `toner_model` varchar(60) NOT NULL,
  `toner_brand` varchar(60) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rma_status` enum('check','uncheck') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

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
(11, 'employee101', '$2y$10$Xzgtk/oKc6qNRK8AaX2LFOyoJ6nqKp04QDGGgyElUXVxuSzMpWLWm', 'Employee');

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
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `printer`
--
ALTER TABLE `printer`
  MODIFY `printer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rma`
--
ALTER TABLE `rma`
  MODIFY `rma_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toner`
--
ALTER TABLE `toner`
  MODIFY `toner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
