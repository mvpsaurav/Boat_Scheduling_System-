-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 02:41 AM
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

INSERT INTO `boatdetails` (`boatid`, `boatowner`, `boatname`, `boatnumber`, `personcapacity`, `weightcapacity`, `status`, `boatlogo`, `boatlogourl`, `brandname`, `modelname`, `createdat`, `createdby`, `updatedat`, `updatedby`) VALUES
(4, 0, 'name', 'number', 0, 0, 1, '', '', 'brand', 'model', '2019-10-13 08:10:56', 1, NULL, NULL),
(5, 0, 'name', 'number', 0, 0, 1, '', '', 'brand', 'model', '2019-10-13 08:10:13', 1, NULL, NULL),
(6, 1, 'name', '1231', 20, 800, 1, '', '', 'brand', 'model', '2019-10-15 09:10:45', 1, NULL, NULL),
(7, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 09:10:07', 1, NULL, NULL),
(8, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 09:10:07', 1, NULL, NULL),
(9, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 09:10:05', 1, NULL, NULL),
(10, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:59', 1, NULL, NULL),
(11, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:52', 1, NULL, NULL),
(12, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:12', 1, NULL, NULL),
(13, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:17', 1, NULL, NULL),
(14, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:29', 1, NULL, NULL),
(15, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:47', 1, NULL, NULL),
(16, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:53', 1, NULL, NULL),
(17, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:19', 1, NULL, NULL),
(18, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:59', 1, NULL, NULL),
(19, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:19', 1, NULL, NULL),
(20, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:17', 1, NULL, NULL),
(21, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:25', 1, NULL, NULL),
(22, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:32', 1, NULL, NULL),
(23, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:39', 1, NULL, NULL),
(24, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:20', 1, NULL, NULL),
(25, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:47', 1, NULL, NULL),
(26, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:47', 1, NULL, NULL),
(27, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:02', 1, NULL, NULL),
(28, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:18', 1, NULL, NULL),
(29, 0, '', '', 0, 0, 3, '', '', '', '', '2019-10-15 10:10:38', 1, NULL, NULL),
(30, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:48', 1, NULL, NULL),
(31, 1, 'name', '1231', 20, 800, 3, '', '', 'brand', 'model', '2019-10-15 10:10:18', 1, NULL, NULL);

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
(1, 'newuser', 'surti kumar mishra', 'surti@gmail.com', '12345678912', 'asdf45612', 7894561231, 'asdf', 1, 'allahabad', 'alla12334', 'surti mishra', '12345487', 1, 3, '', '', 'govind puram', '', 1, 6, 1, 20302, '2019-10-09 05:24:05', 1, '2019-10-13 04:10:52', 1),
(2, 'surti', 'surti kumar mishra', 'surti@gmail.com', '12345678912', 'asdf45612', 7894561231, 'asdf', 1, 'allahabad', 'alla12334', 'surti mishra', '12345487', 1, 3, '', '', 'govind puram', '', 1, 6, 1, 20302, '2019-10-09 11:10:54', 1, '2019-10-13 04:10:52', 1),
(3, 'Surti', 'surti kumar mishra', 'surti@gmail.com', '12345678912', 'asdf45612', 7894561231, 'asdf', 1, 'allahabad', 'alla12334', 'surti mishra', '12345487', 3, 3, '', '', 'govind puram', '', 1, 6, 1, 20302, '2019-10-09 11:10:42', 1, '2019-10-13 04:10:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boatschedule`
--

CREATE TABLE `boatschedule` (
  `id` int(11) NOT NULL,
  `boatid` int(11) NOT NULL,
  `day` int(1) DEFAULT NULL,
  `departuretime` varchar(20) DEFAULT NULL,
  `arrivaltime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boatschedule`
--

INSERT INTO `boatschedule` (`id`, `boatid`, `day`, `departuretime`, `arrivaltime`) VALUES
(1, 10, 1, '9:00', '8:30'),
(2, 10, 2, '10:00', '8:30'),
(3, 10, 3, '11:00', '10:00'),
(4, 10, 4, '11:00', '9:00'),
(5, 10, 5, '10:00', '8:00'),
(6, 10, 6, '9:30', '17:00'),
(7, 10, 7, '7:00', '7:00'),
(8, 30, 1, '9:00', '8:30'),
(9, 30, 2, '10:00', '8:30'),
(10, 30, 3, '11:00', '10:00'),
(11, 30, 4, '11:00', '9:00'),
(12, 30, 5, '10:00', '8:00'),
(13, 30, 6, '9:30', '17:00'),
(14, 30, 7, '7:00', '7:00'),
(15, 31, 1, '9:00', '8:30'),
(16, 31, 2, '10:00', '8:30'),
(17, 31, 3, '11:00', '10:00'),
(18, 31, 4, '11:00', '9:00'),
(19, 31, 5, '10:00', '8:00'),
(20, 31, 6, '9:30', '17:00'),
(21, 31, 7, '7:00', '7:00');

-- --------------------------------------------------------

--
-- Table structure for table `boat_route`
--

CREATE TABLE `boat_route` (
  `routeid` int(10) NOT NULL,
  `boatid` int(10) NOT NULL,
  `portid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boat_route`
--

INSERT INTO `boat_route` (`routeid`, `boatid`, `portid`) VALUES
(1, 10, 1),
(2, 11, 1),
(3, 10, 2),
(4, 10, 3),
(5, 10, 4),
(6, 10, 5),
(7, 11, 2),
(8, 11, 5);

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
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `portid` int(10) NOT NULL,
  `portname` varchar(30) NOT NULL,
  `stateid` int(10) NOT NULL,
  `portlongitude` bigint(20) NOT NULL,
  `portlatitude` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`portid`, `portname`, `stateid`, `portlongitude`, `portlatitude`) VALUES
(1, 'testing port 1', 7, 0, 0),
(2, 'testing port 2', 7, 0, 0),
(3, 'testing port 3', 7, 0, 0),
(4, 'testing port 4', 7, 0, 0),
(5, 'testing port 5', 7, 0, 0);

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
-- Table structure for table `unreserved_ticket_log`
--

CREATE TABLE `unreserved_ticket_log` (
  `id` int(10) NOT NULL,
  `boatid` int(10) NOT NULL,
  `number_of_passenger` int(10) NOT NULL,
  `portfrom` int(10) NOT NULL,
  `portto` int(10) NOT NULL,
  `token` varchar(10) NOT NULL,
  `tripid` int(10) NOT NULL,
  `paymentid` int(10) NOT NULL,
  `bookedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unreserved_ticket_log`
--

INSERT INTO `unreserved_ticket_log` (`id`, `boatid`, `number_of_passenger`, `portfrom`, `portto`, `token`, `tripid`, `paymentid`, `bookedat`) VALUES
(1, 3, 20, 1, 3, 'Txas323', 1, 1, '2019-10-16 00:39:57');

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
(5, 'shivam', 2, '', 'rshivam@gmail.com', 123456789, 'Shivam raput', 2),
(6, '', 2, '', '', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boatdetails`
--
ALTER TABLE `boatdetails`
  ADD PRIMARY KEY (`boatid`),
  ADD KEY `boatowner` (`boatowner`);

--
-- Indexes for table `boatowner`
--
ALTER TABLE `boatowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boatschedule`
--
ALTER TABLE `boatschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boatid` (`boatid`);

--
-- Indexes for table `boat_route`
--
ALTER TABLE `boat_route`
  ADD PRIMARY KEY (`routeid`),
  ADD KEY `boatid` (`boatid`),
  ADD KEY `portid` (`portid`);

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
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`portid`);

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
-- Indexes for table `unreserved_ticket_log`
--
ALTER TABLE `unreserved_ticket_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boatdetails`
--
ALTER TABLE `boatdetails`
  MODIFY `boatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `boatowner`
--
ALTER TABLE `boatowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boatschedule`
--
ALTER TABLE `boatschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `boat_route`
--
ALTER TABLE `boat_route`
  MODIFY `routeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `portid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `unreserved_ticket_log`
--
ALTER TABLE `unreserved_ticket_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boatschedule`
--
ALTER TABLE `boatschedule`
  ADD CONSTRAINT `boatschedule_ibfk_1` FOREIGN KEY (`boatid`) REFERENCES `boatdetails` (`boatid`);

--
-- Constraints for table `boat_route`
--
ALTER TABLE `boat_route`
  ADD CONSTRAINT `boat_route_ibfk_1` FOREIGN KEY (`boatid`) REFERENCES `boatdetails` (`boatid`),
  ADD CONSTRAINT `boat_route_ibfk_2` FOREIGN KEY (`portid`) REFERENCES `ports` (`portid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
