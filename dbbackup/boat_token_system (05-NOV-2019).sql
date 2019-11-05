-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 08:07 AM
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
-- Table structure for table `boatowner`
--

CREATE TABLE `boatowner` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `adhaarnumber` varchar(30) DEFAULT NULL,
  `pannumber` varchar(20) DEFAULT NULL,
  `mobilenumber` bigint(10) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `bankname` varchar(30) DEFAULT NULL,
  `ifsc` varchar(10) DEFAULT NULL,
  `accountname` varchar(20) DEFAULT NULL,
  `accountnumber` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `roleid` int(1) NOT NULL DEFAULT 3,
  `profilepicture` varchar(50) DEFAULT NULL,
  `profilepictureurl` varchar(50) DEFAULT NULL,
  `addressline1` varchar(30) DEFAULT NULL,
  `addressline2` varchar(30) DEFAULT NULL,
  `cityid` int(5) DEFAULT NULL,
  `stateid` int(5) DEFAULT NULL,
  `countryid` int(5) DEFAULT NULL,
  `zipcode` int(6) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boatowner`
--

INSERT INTO `boatowner` (`id`, `username`, `name`, `email`, `adhaarnumber`, `pannumber`, `mobilenumber`, `password`, `gender`, `bankname`, `ifsc`, `accountname`, `accountnumber`, `status`, `roleid`, `profilepicture`, `profilepictureurl`, `addressline1`, `addressline2`, `cityid`, `stateid`, `countryid`, `zipcode`, `createdat`, `createdby`, `updatedat`, `updatedby`) VALUES
(5, 'nathu', 'Nathu Lal', '', '458298567584', 'DF75W7851', 8456971357, 'nathu', 1, 'BANK OF INDIA', 'BOI0701', 'NATHU LAL', '70105001', 1, 3, '', '', 'H-21,SEC 3', 'govindpuram', 1, 6, 1, 201001, '2019-10-30 10:10:29', 1, NULL, NULL),
(6, 'bahadur', 'Bahadur Singh', '', '758642586548', 'RT45R7542', 7859642574, 'bahadur', 1, 'Allahabad', 'ALLA0058', 'Bahadur Singh', '58694586', 1, 3, '', '', 'D-33 sec 5', 'Govindpuram', 1, 6, 1, 201001, '2019-10-30 10:10:08', 1, NULL, NULL),
(7, 'dalda', 'Dalda panwar', 'surti@gmail.com', '4568285698744', 'YE45E785', 7854695245, 'dalda', 1, 'Bank of India', 'BOI00701', 'Dalda panwar', '701001586', 3, 3, '', '', 'K-15 sec 3', 'Govind puram', 1, 6, 1, 201001, '2019-10-30 10:10:29', 1, NULL, NULL),
(8, 'test', 'asdw', 'asdwqe@wemail.com', '123456789123', 'asdf1234', 321654987, 'asdf', 1, 'allahabad', 'alla12334', 'acc name', '12345487', 1, 3, '', '', 'govind puram', '', 0, 0, 0, 20302, '2019-11-04 06:11:43', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `stateid`, `cityname`) VALUES
(1, 6, 'Ghaziabad');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `role`, `created_by`, `created_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Employee', NULL, NULL),
(3, 'Boat Owner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `statename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `countryid`, `statename`) VALUES
(1, 1, 'Andhra Pradesh'),
(2, 1, 'Bihar'),
(3, 1, 'Chhattisgarh'),
(4, 1, 'Punjab'),
(5, 1, 'Rajasthan'),
(6, 1, 'Uttar Pradesh'),
(7, 1, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `roleid` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `roleid`, `password`, `email`, `mobilenumber`, `name`, `status`) VALUES
(1, 'admin', 1, 'admin', 'vishum.10m@gmail.com', 8076248299, 'Vishad Mandal', 1),
(4, 'gaurav', 2, 'asdf', 'sgaurav0999@gmail.com', 9953526971, 'Gaurav Sen', 1),
(5, 'shivam', 2, '', 'rshivam@gmail.com', 123456789, 'Shivam raput', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boatowner`
--
ALTER TABLE `boatowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boatowner`
--
ALTER TABLE `boatowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
