-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 02:35 AM
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
(33, 5, 'Rajkumari', '123456', 44, 800, 1, '', '', 'Touring', '44ferry', '2019-10-30 10:10:24', 1, '2019-10-30 12:10:48', 1),
(34, 5, 'Saraswati ', '3450', 40, 2800, 1, '', '', 'Touring', '40ferry', '2019-10-30 11:10:48', 1, '2019-10-30 11:10:06', 1),
(35, 6, 'Shivgamni', '3656', 44, 3080, 1, '', '', 'Touring', '44ferry', '2019-10-30 11:10:21', 1, NULL, NULL),
(36, 6, 'Avnush', '9654', 44, 3080, 1, '', '', 'Touring', '44ferry', '2019-10-30 11:10:52', 1, NULL, NULL);

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
(7, 'dalda', 'Dalda panwar', 'surti@gmail.com', '4568285698744', 'YE45E785', 7854695245, 'dalda', 1, 'Bank of India', 'BOI00701', 'Dalda panwar', '701001586', 3, 3, '', '', 'K-15 sec 3', 'Govind puram', 1, 6, 1, 201001, '2019-10-30 10:10:29', 1, NULL, NULL);

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
(29, 33, 1, '1:00', '1:30'),
(30, 33, 2, '', ''),
(31, 33, 3, '', ''),
(32, 33, 4, '', ''),
(33, 33, 5, '', ''),
(34, 33, 6, '', ''),
(35, 33, 7, '', ''),
(36, 34, 1, '6:00', '14:00'),
(37, 34, 2, '6:00', '14:00'),
(38, 34, 3, '6:00', '14:00'),
(39, 34, 4, '6:00', '14:00'),
(40, 34, 5, '4:00', '11:30'),
(41, 34, 6, '6:00', '16:00'),
(42, 34, 7, '6:00', '13:00'),
(43, 35, 1, '4:00', '14:00'),
(44, 35, 2, '6:00', '14:00'),
(45, 35, 3, '6:00', '14:00'),
(46, 35, 4, '6:00', '16:00'),
(47, 35, 5, '6:00', '14:00'),
(48, 35, 6, '6:00', '14:00'),
(49, 35, 7, '6:00', '14:00'),
(50, 36, 1, '6:00', '14:00'),
(51, 36, 2, '6:00', '14:00'),
(52, 36, 3, '6:00', '14:00'),
(53, 36, 4, '6:00', '14:00'),
(54, 36, 5, '6:00', '14:00'),
(55, 36, 6, '6:00', '14:30'),
(56, 36, 7, '6:00', '14:00');

-- --------------------------------------------------------

--
-- Table structure for table `boat_route`
--

CREATE TABLE `boat_route` (
  `routeid` int(10) NOT NULL,
  `boatid` int(10) NOT NULL,
  `portid` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boat_route`
--

INSERT INTO `boat_route` (`routeid`, `boatid`, `portid`, `status`) VALUES
(13, 33, 1, 1),
(14, 33, 2, 1),
(15, 33, 3, 1),
(16, 33, 4, 1),
(17, 33, 5, 1),
(18, 34, 1, 1),
(19, 34, 2, 1),
(20, 34, 3, 1),
(21, 34, 4, 1),
(22, 34, 5, 1),
(23, 35, 1, 1),
(24, 35, 2, 1),
(25, 35, 3, 1),
(26, 35, 4, 1),
(27, 35, 5, 1),
(28, 36, 1, 1),
(29, 36, 2, 1),
(30, 36, 3, 1),
(31, 36, 4, 1),
(32, 36, 5, 1);

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
(1, 'Chakeri', 6, 0, 0),
(2, 'Farukhabad', 6, 0, 0),
(3, 'Fatehgarh', 6, 0, 0),
(4, 'Kannauj', 6, 0, 0),
(5, 'Varanasi', 6, 0, 0);

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
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripid` bigint(12) NOT NULL,
  `tripnumber` int(10) DEFAULT NULL,
  `boatid` int(11) DEFAULT NULL,
  `tripdate` varchar(20) DEFAULT NULL,
  `availableseats` int(10) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 11, 3, 1, 3, 'Txas323', 2, 1, '2019-10-21 00:39:57'),
(2, 10, 2, 1, 5, 'Txas323', 3, 2, '2019-10-28 23:14:53');

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
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripid`);

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
  MODIFY `boatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `boatowner`
--
ALTER TABLE `boatowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `boatschedule`
--
ALTER TABLE `boatschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `boat_route`
--
ALTER TABLE `boat_route`
  MODIFY `routeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unreserved_ticket_log`
--
ALTER TABLE `unreserved_ticket_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
