-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: Oct 09, 2019 at 08:52 AM
-- Server version: 5.6.45-86.1
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_24608893_boat_token_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `boatonwer`
--

CREATE TABLE `boatonwer` (
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
  `status` int(1) NOT NULL DEFAULT '0',
  `roleid` int(1) NOT NULL DEFAULT '3',
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boatonwer`
--

INSERT INTO `boatonwer` (`id`, `username`, `name`, `email`, `adhaarnumber`, `pannumber`, `mobilenumber`, `password`, `gender`, `bankname`, `ifsc`, `accountname`, `accountnumber`, `status`, `roleid`, `profilepicture`, `profilepictureurl`, `addressline1`, `addressline2`, `cityid`, `stateid`, `countryid`, `zipcode`, `createdat`, `createdby`, `updatedat`, `updatedby`) VALUES
(1, 'user name', 'fullname', 'email', 'adhar num', 'pan numb', 0, 'pass', 1, 'bank name', 'ifsc', 'acc name', 'acc num', 3, 3, '', '', 'add1', 'add2', 0, 0, 0, 0, '2019-10-09 05:24:05', 1, NULL, NULL),
(2, 'user name', 'fullname', 'email', 'adhar num', 'pan numb', 0, 'pass', 1, 'bank name', 'ifsc', 'acc name', 'acc num', 3, 3, '', '', 'add1', 'add2', 0, 0, 0, 0, '2019-10-09 11:10:54', 1, NULL, NULL),
(3, 'surti', 'surti kumar mishra', 'surti@gmail.com', '12345678912', 'asdf45612', 7894561231, 'surti', 1, 'allahabad', 'alla12334', 'surti mishra', '12345487', 3, 3, '', '', 'govind puram', '', 0, 0, 0, 20302, '2019-10-09 11:10:42', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `roleid`, `password`, `email`, `mobilenumber`, `name`, `status`) VALUES
(1, 'admin', 1, 'admin', 'vishum.10m@gmail.com', 8076248299, 'Vishad Mandal', 1),
(4, 'gaurav', 2, 'asdf', 'sgaurav0999@gmail.com', 9953526971, 'Gaurav Sen', 1),
(5, 'shivam', 2, '', 'rshivam@gmail.com', 123456789, 'Shivam raput', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boatonwer`
--
ALTER TABLE `boatonwer`
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
-- AUTO_INCREMENT for table `boatonwer`
--
ALTER TABLE `boatonwer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
