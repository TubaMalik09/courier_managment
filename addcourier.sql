-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2025 at 11:53 AM
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
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcourier`
--
ALTER TABLE `addcourier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service-id` (`service-id`),
  ADD KEY `branch` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcourier`
--
ALTER TABLE `addcourier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addcourier`
--
ALTER TABLE `addcourier`
  ADD CONSTRAINT `addcourier_ibfk_1` FOREIGN KEY (`service-id`) REFERENCES `service` (`Id`),
  ADD CONSTRAINT `addcourier_ibfk_2` FOREIGN KEY (`branch`) REFERENCES `branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
