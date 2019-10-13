-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 06:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boat_token_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `boatdetails`
--

CREATE TABLE `boatdetails` (
  `boatid` int(11) NOT NULL,
  `boatowner` int(11) DEFAULT NULL,
  `boatname` varchar(30) DEFAULT NULL,
  `boatnumber` varchar(30) DEFAULT NULL,
  `personcapacity` bigint(20) DEFAULT NULL,
  `weightcapacity` bigint(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `boatlogo` varchar(50) DEFAULT NULL,
  `boatlogourl` varchar(50) DEFAULT NULL,
  `brandname` varchar(30) DEFAULT NULL,
  `modelname` varchar(30) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boatdetails`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `boatdetails`
--
ALTER TABLE `boatdetails`
  ADD PRIMARY KEY (`boatid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boatdetails`
--
ALTER TABLE `boatdetails`
  MODIFY `boatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
