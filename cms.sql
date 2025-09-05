-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2025 at 11:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `Record_time` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `Record_time`) VALUES
(16, 'CMS', 'Courier Managment System', '2025-08-25 15:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `gender` longtext NOT NULL,
  `phone number` longtext NOT NULL,
  `branch_id` int(100) NOT NULL,
  `Record_Inserted_At` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `name`, `email`, `password`, `gender`, `phone number`, `branch_id`, `Record_Inserted_At`) VALUES
(2, 'Dorothy Pearsons', 'ticojizibi@mailinator.com', 'Quia impedit unde l', 'Other', '+1 (172) 349-7517', 17, '2025-08-29 15:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `BranchName` varchar(1000) NOT NULL,
  `BranchCity` varchar(100) NOT NULL,
  `BranchPhnum` varchar(15) NOT NULL,
  `BranchEmail` varchar(50) NOT NULL,
  `BranchAddress` varchar(500) NOT NULL,
  `record_time` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `BranchName`, `BranchCity`, `BranchPhnum`, `BranchEmail`, `BranchAddress`, `record_time`, `status`) VALUES
(17, 'Leonard Cruz', 'Karachi', '+1 (578) 325-20', 'aryanimransheikh@gmail.co', '123 street nazimabad', '2025-08-25 16:19:34', 'Close'),
(18, 'Gil Page', 'Nulla modi eu id no', '+1 (223) 404-92', 'zanoc@mailinator.com', 'Consequuntur enim al', '2025-08-29 15:43:22', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `Price` int(11) NOT NULL,
  `record_time` int(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Id`, `Title`, `Description`, `Price`, `record_time`) VALUES
(2, 'Overnight Express', 'This service delivers the shipments the day after TCS receives them. Covering 90% of destinations on TCS network, the shipments are delivered in daylight,', 500, 2147483647),
(3, 'Same Day Delivery', 'With over 4,500 delivery vehicles on the road and a dedicated air freighter covering Karachi, Lahore and Islamabad, TCS offers same-day (24 hours) documents delivery service,', 399, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Contect no` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Time record` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `Email`, `Password`, `Contect no`, `Role`, `Time record`) VALUES
(1, 'aiman', 'admin123@gmail.com', 'admin12345', '0312345675', 'admin', 'current_timestamp()');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinfo`
--

CREATE TABLE `websiteinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phnum` varchar(15) NOT NULL,
  `record_time` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`id`, `name`, `description`, `email`, `phnum`, `record_time`) VALUES
(1, 'SwiftShip Courier', 'Fast, reliable, and secure delivery services for documents and parcels nationwide.', 'support@swiftship.com', '+92 300 1234567', '2025-08-13 16:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BranchName` (`BranchName`) USING HASH;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Indexes for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
