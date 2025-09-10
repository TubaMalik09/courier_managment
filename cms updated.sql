-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `addcourier`
--

CREATE TABLE `addcourier` (
  `id` int(11) NOT NULL,
  `sender-name` varchar(100) NOT NULL,
  `sender-email` varchar(100) NOT NULL,
  `sender-phone` varchar(50) NOT NULL,
  `sender-address` varchar(500) NOT NULL,
  `receiver-name` varchar(50) NOT NULL,
  `receiver-email` varchar(50) NOT NULL,
  `receiver-phone` varchar(50) NOT NULL,
  `receiver-address` varchar(500) NOT NULL,
  `parcel-info` varchar(500) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `time-record` varchar(11) NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `trackingno` varchar(50) NOT NULL,
  `service-id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcourier`
--

INSERT INTO `addcourier` (`id`, `sender-name`, `sender-email`, `sender-phone`, `sender-address`, `receiver-name`, `receiver-email`, `receiver-phone`, `receiver-address`, `parcel-info`, `weight`, `time-record`, `price`, `tax`, `total`, `trackingno`, `service-id`, `branch`, `status`) VALUES
(2, 'John Doe', 'john.doe@example.com', '123-456-7890', '123 Sender St, Sometown', 'Jane Smith', 'jane.smith@example.com', '098-765-4321', '456 Receiver Ave, Anytown', 'Electronics Package', 3, '2023-10-27 ', 100, 10, 110, 'CX123456789', 0, 0, 'processing'),
(3, 'Alice Brown', 'alice@example.com', '111-222-3333', '789 Main St, Cityville', 'Bob White', 'bob@example.com', '444-555-6666', '101 Oak Ave, Villagetown', 'Documents', 1, '2023-10-26 ', 20, 2, 22, 'CX987654321', 0, 0, 'shipped');

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
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `username`, `password`, `created_at`) VALUES
(15, 'agent123@gmail.com', 'agent123', -214748);

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `submission_date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `submission_date`) VALUES
(1, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'support', 'gjhtyhikjkluyjhlui', 2147483647),
(3, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'support', 'hjnhgkli,o,kj,ikujm', 2147483647),
(4, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'support', 'ghgjkuykouykjhklujhl', 2147483647),
(7, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'support', 'ccccccccccccccccccc', 2147483647),
(8, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'complaint', 'blah blah  blah', 2147483647),
(9, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'general', 'hiiiiiiiiiiiiiiiiii123', 2147483647),
(10, 'kashmala khan', 'kashmalaengineer12@gmail.com', '03432604017', 'general', 'helooooooooooooooooooooooo', 2147483647);

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
-- Indexes for table `addcourier`
--
ALTER TABLE `addcourier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service-id` (`service-id`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BranchName` (`BranchName`) USING HASH;

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addcourier`
--
ALTER TABLE `addcourier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `addcourier`
--
ALTER TABLE `addcourier`
  ADD CONSTRAINT `addcourier_ibfk_1` FOREIGN KEY (`service-id`) REFERENCES `service` (`Id`),
  ADD CONSTRAINT `addcourier_ibfk_2` FOREIGN KEY (`branch`) REFERENCES `branch` (`id`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
