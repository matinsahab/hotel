-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 11:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dunya1`
--

-- --------------------------------------------------------

--
-- Table structure for table `house-keeping`
--

CREATE TABLE `house-keeping` (
  `hk-id` int(5) NOT NULL,
  `add-by` varchar(20) DEFAULT NULL,
  `passenger-id` int(5) DEFAULT NULL,
  `room-id` int(5) DEFAULT NULL,
  `type` enum('Singles','Family') DEFAULT NULL,
  `passenger-count` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `date` text DEFAULT NULL,
  `ex-date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house-keeping`
--

INSERT INTO `house-keeping` (`hk-id`, `add-by`, `passenger-id`, `room-id`, `type`, `passenger-count`, `date`, `ex-date`) VALUES
(1, 'assad', 4, 103, 'Singles', '3', '15-07-2021 22:16', '16-07-2021'),
(2, 'assad', 5, 809, 'Family', '5', '15-07-2021 22:23', '16-07-2021');

-- --------------------------------------------------------

--
-- Table structure for table `passenger-details`
--

CREATE TABLE `passenger-details` (
  `passenger-id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `father-name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `province` text NOT NULL,
  `district` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `tazkera` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger-details`
--

INSERT INTO `passenger-details` (`passenger-id`, `name`, `father-name`, `gender`, `province`, `district`, `village`, `telephone`, `tazkera`) VALUES
(1, 'sfd', 'dsgs', 'Male', '', 'sdfsdf', 'dsdsf', '3232', 'dfs23'),
(2, 'ds', '$fName', '', '', '$village', '$district', '4223', 'ef'),
(3, 'dsf', '', 'Male', '', '', '', '', 'fds'),
(4, 'Matin', 'Sahab', 'Male', '', 'sdf', 'fds', '24987', 'kjdfs3734'),
(5, 'Ahmad', 'Wali', 'Male', 'Kabul', 'kabul', 'kabul', '2398238328', 'P00238284'),
(6, 'fds', '', 'Male', '', '', '', '', 'dfs'),
(7, 'a', '', 'Male', '', '', '', '', 'a'),
(8, 'as', '', 'Male', '', '', '', '', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `room-specs`
--

CREATE TABLE `room-specs` (
  `room-id` int(5) NOT NULL,
  `room-floor` int(2) DEFAULT NULL,
  `beds` enum('1','2','3','4','5','6') DEFAULT NULL,
  `bathroom` enum('0','1','2','3') DEFAULT NULL,
  `room-price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room-specs`
--

INSERT INTO `room-specs` (`room-id`, `room-floor`, `beds`, `bathroom`, `room-price`) VALUES
(101, 1, '2', '1', 100),
(102, 2, '3', '1', 100),
(103, 3, '4', '1', 200),
(201, 2, '4', '1', 400),
(202, 4, '4', '1', 300),
(809, 14, '5', '2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `room-id` int(5) DEFAULT NULL,
  `room-status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`room-id`, `room-status`) VALUES
(102, 1),
(101, 1),
(103, 0),
(201, 1),
(202, 1),
(809, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user-account`
--

CREATE TABLE `user-account` (
  `user-id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `user-level` enum('Admin','Cashier') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-account`
--

INSERT INTO `user-account` (`user-id`, `username`, `password`, `user-level`) VALUES
(1, 'admin', '123', 'Admin'),
(3, 'assad', '123', 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house-keeping`
--
ALTER TABLE `house-keeping`
  ADD PRIMARY KEY (`hk-id`),
  ADD KEY `passenger-id` (`passenger-id`),
  ADD KEY `room-id` (`room-id`);

--
-- Indexes for table `passenger-details`
--
ALTER TABLE `passenger-details`
  ADD PRIMARY KEY (`passenger-id`);

--
-- Indexes for table `room-specs`
--
ALTER TABLE `room-specs`
  ADD PRIMARY KEY (`room-id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `room-id` (`room-id`);

--
-- Indexes for table `user-account`
--
ALTER TABLE `user-account`
  ADD PRIMARY KEY (`user-id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house-keeping`
--
ALTER TABLE `house-keeping`
  MODIFY `hk-id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passenger-details`
--
ALTER TABLE `passenger-details`
  MODIFY `passenger-id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user-account`
--
ALTER TABLE `user-account`
  MODIFY `user-id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house-keeping`
--
ALTER TABLE `house-keeping`
  ADD CONSTRAINT `house-keeping_ibfk_1` FOREIGN KEY (`passenger-id`) REFERENCES `passenger-details` (`passenger-id`),
  ADD CONSTRAINT `house-keeping_ibfk_2` FOREIGN KEY (`room-id`) REFERENCES `room-specs` (`room-id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`room-id`) REFERENCES `room-specs` (`room-id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
