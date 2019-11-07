-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 08:26 PM
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
  `boatlogourl` varchar(350) DEFAULT NULL,
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
(33, 5, 'Rajkumari', '123456', 44, 800, 1, '0711025dummyimg.jpg', '../../includes/bo/boat_logo/07111250711025dummyimg.jpg', 'Touring', '44ferry', '2019-10-30 10:10:24', 1, '2019-11-05 07:11:12', 5),
(34, 5, 'Saraswati ', '3450', 40, 2800, 1, 'dummyimg.jpg', '../../includes/bo/boat_logo/0711175dummyimg.jpg', 'Touring', '40ferry', '2019-10-30 11:10:48', 1, '2019-11-05 07:11:17', 1),
(35, 6, 'Shivgamni', '3656', 44, 3080, 1, '0711175dummyimg.jpg', '../../includes/bo/boat_logo/06115460711175dummyimg.jpg', 'Touring', '44ferry', '2019-10-30 11:10:21', 1, '2019-11-06 06:11:54', 6),
(36, 6, 'Avnush', '9654', 44, 3080, 1, '0711175dummyimg.jpg', '../../includes/bo/boat_logo/06115960711175dummyimg.jpg', 'Touring', '44ferry', '2019-10-30 11:10:52', 1, '2019-11-06 06:11:59', 6),
(39, 5, 'Rajkumari', '123456', 20, 800, 2, 'asdsad.jpg', '../../includes/bo/boat_logo/0711295asdsad.jpg', 'brand', 'model', '2019-11-05 07:11:29', 1, '2019-11-05 07:11:49', 5),
(40, 5, 'nameupdatedagain', '3450', 20, 800, 2, 'dummyimg.jpg', '../../includes/bo/boat_logo/0711025dummyimg.jpg', 'brand', 'model', '2019-11-05 07:11:52', 5, '2019-11-05 07:11:02', 5),
(41, 5, 'name', '3450', 20, 800, 2, 'asdsad.jpg', '../../includes/bo/boat_logo/0711205asdsad.jpg', 'brand', 'model', '2019-11-05 07:11:20', 5, NULL, NULL),
(42, 9, 'Rajkumari', '123456', 44, 2800, 2, '0711025dummyimg.jpg', '../../includes/bo/boat_logo/02114190711025dummyimg.jpg', '', '', '2019-11-06 02:11:41', 1, NULL, NULL);

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
  `password` longtext DEFAULT NULL,
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
(5, 'nathu', 'Nathu Lal', '', '458298567584', 'DF75W7851', 8456971357, '$2y$10$W.C2pHzDpTJURDjRHqfIxuHYFolvDirdbfKEgm8cnmks85Kyw4TgC', 1, 'BANK OF INDIA', 'BOI0701', 'NATHU LAL', '70105001', 1, 3, '', '', 'H-21,SEC 3', 'govindpuram', 1, 6, 1, 201001, '2019-10-30 10:10:29', 1, '2019-11-06 06:11:41', 1),
(6, 'bahadur', 'Bahadur Singh', '', '758642586548', 'RT45R7542', 7859642574, '$2y$10$D8wdoeZpiDc5J/mB2OJTzeDI0nsMMd8qNuS3XZNtgCJLgLXqStj8.', 1, 'Allahabad', 'ALLA0058', 'Bahadur Singh', '58694586', 1, 3, '', '', 'D-33 sec 5', 'Govindpuram', 1, 6, 1, 201001, '2019-10-30 10:10:08', 1, '2019-11-06 06:11:31', 1),
(7, 'dalda', 'Dalda panwar', 'surti@gmail.com', '4568285698744', 'YE45E785', 7854695245, 'dalda', 1, 'Bank of India', 'BOI00701', 'Dalda panwar', '701001586', 3, 3, '', '', 'K-15 sec 3', 'Govind puram', 1, 6, 1, 201001, '2019-10-30 10:10:29', 1, NULL, NULL),
(8, 'test', 'asdw', 'asdwqe@wemail.com', '123456789123', 'asdf1234', 321654987, 'asdf', 1, 'allahabad', 'alla12334', 'acc name', '12345487', 2, 3, '', '', 'govind puram', '', 0, 0, 0, 20302, '2019-11-04 06:11:43', 0, NULL, NULL),
(9, 'chanchal', 'chanchal bhasker', 'asdasd@gmail.com', '1231231', 'asd', 123123, 'asdf', 2, '', '', '', '', 2, 3, '', '', '', '', 0, 0, 0, 0, '2019-11-06 02:11:50', 0, NULL, NULL),
(10, 'vishu', 'Vishu Mandal', 'vishum.10m@gmail.com', '12345678912', 'asdf45612', 7894561231, '$2y$10$djm1jdwz5Yxbi5ZXRKrn.ueDNgBFnUtrBa2ucjvjuuV', 1, '', '', '', '', 2, 3, '', '', 'govind puram', '', 1, 6, 1, 20302, '2019-11-06 06:11:58', 0, NULL, NULL);

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
(29, 33, 1, '', ''),
(30, 33, 2, '', ''),
(31, 33, 3, '', ''),
(32, 33, 4, '', ''),
(33, 33, 5, '', ''),
(34, 33, 6, '', ''),
(35, 33, 7, '', ''),
(36, 34, 1, '', ''),
(37, 34, 2, '', ''),
(38, 34, 3, '', ''),
(39, 34, 4, '', ''),
(40, 34, 5, '', ''),
(41, 34, 6, '', ''),
(42, 34, 7, '6:00', '13:00'),
(43, 35, 1, '', ''),
(44, 35, 2, '', ''),
(45, 35, 3, '', ''),
(46, 35, 4, '', ''),
(47, 35, 5, '', ''),
(48, 35, 6, '', ''),
(49, 35, 7, '6:00', '14:00'),
(50, 36, 1, '', ''),
(51, 36, 2, '', ''),
(52, 36, 3, '', ''),
(53, 36, 4, '', ''),
(54, 36, 5, '', ''),
(55, 36, 6, '', ''),
(56, 36, 7, '6:00', '14:00'),
(57, 37, 1, '', ''),
(58, 37, 2, '', ''),
(59, 37, 3, '', ''),
(60, 37, 4, '', ''),
(61, 37, 5, '', ''),
(62, 37, 6, '', ''),
(63, 37, 7, '', ''),
(64, 38, 1, '', ''),
(65, 38, 2, '', ''),
(66, 38, 3, '', ''),
(67, 38, 4, '', ''),
(68, 38, 5, '', ''),
(69, 38, 6, '', ''),
(70, 38, 7, '', ''),
(71, 39, 1, '', ''),
(72, 39, 2, '', ''),
(73, 39, 3, '', ''),
(74, 39, 4, '', ''),
(75, 39, 5, '', ''),
(76, 39, 6, '', ''),
(77, 39, 7, '', ''),
(78, 40, 1, '', ''),
(79, 40, 2, '', ''),
(80, 40, 3, '', ''),
(81, 40, 4, '', ''),
(82, 40, 5, '', ''),
(83, 40, 6, '', ''),
(84, 40, 7, '', ''),
(85, 41, 1, '', ''),
(86, 41, 2, '', ''),
(87, 41, 3, '', ''),
(88, 41, 4, '', ''),
(89, 41, 5, '', ''),
(90, 41, 6, '', ''),
(91, 41, 7, '', ''),
(92, 42, 1, '', ''),
(93, 42, 2, '', ''),
(94, 42, 3, '', ''),
(95, 42, 4, '', ''),
(96, 42, 5, '', ''),
(97, 42, 6, '', ''),
(98, 42, 7, '', '');

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
(33, 36, 3, 1),
(34, 36, 4, 1),
(35, 36, 5, 1),
(36, 39, 1, 2),
(37, 39, 2, 2),
(38, 39, 3, 2),
(39, 40, 1, 2),
(40, 40, 2, 2),
(41, 41, 1, 2),
(42, 42, 1, 2),
(43, 42, 2, 2);

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
-- Table structure for table `reserved_passengers`
--

CREATE TABLE `reserved_passengers` (
  `passengerid` int(10) NOT NULL,
  `ticketid` int(10) NOT NULL,
  `name` text NOT NULL,
  `age` int(10) NOT NULL,
  `gender` int(10) NOT NULL,
  `idtype` text DEFAULT NULL,
  `idnumber` text DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `bookedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_passengers`
--

INSERT INTO `reserved_passengers` (`passengerid`, `ticketid`, `name`, `age`, `gender`, `idtype`, `idnumber`, `contact`, `bookedat`) VALUES
(14, 7, 'vishad', 21, 1, 'pan', 'asd123', 7894561231, '2019-11-06 20:59:46'),
(15, 7, 'gaurav', 21, 1, '', '', 0, '2019-11-06 20:59:46'),
(16, 7, 'shivam', 21, 1, '', '', 0, '2019-11-06 20:59:46'),
(17, 8, 'vishad', 21, 1, 'pan', 'asd123', 7894561231, '2019-11-07 03:03:34'),
(18, 9, 'surti kumar mishra', 21, 1, 'pan', 'asdf', 7894561231, '2019-11-07 15:23:41'),
(19, 9, 'gaurab', 52, 1, '', '', 0, '2019-11-07 15:23:41'),
(20, 10, '', 0, 1, '', '', 0, '2019-11-07 15:41:05'),
(21, 11, '', 0, 1, '', '', 0, '2019-11-07 15:41:24'),
(22, 12, 'surti kumar mishra', 21, 1, 'pan', 'asd123', 7894561231, '2019-11-07 17:41:50'),
(23, 12, 'shhh', 22, 1, '', '', 0, '2019-11-07 17:41:50'),
(24, 13, 'surti kumar mishra', 21, 1, 'pan', 'asd123', 7894561231, '2019-11-07 17:42:28'),
(25, 13, 'shi', 22, 1, '', '', 0, '2019-11-07 17:42:28'),
(26, 14, 'vishad', 21, 1, 'pan', 'asd123', 7894561231, '2019-11-07 17:42:57'),
(27, 14, 'shhh', 21, 1, '', '', 0, '2019-11-07 17:42:57'),
(28, 15, 'vishad', 12, 1, '', '', 0, '2019-11-07 18:58:36'),
(29, 16, 'vishad', 21, 1, '', '', 0, '2019-11-07 19:05:16'),
(30, 17, 'shhh', 12, 1, '', '', 0, '2019-11-07 19:14:20'),
(31, 18, 'surti kumar mishra', 0, 1, '', '', 7894561231, '2019-11-07 19:25:29'),
(32, 18, '', 0, 1, '', '', 0, '2019-11-07 19:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_ticket_log`
--

CREATE TABLE `reserved_ticket_log` (
  `id` int(10) NOT NULL,
  `boatid` int(10) NOT NULL,
  `number_of_passenger` int(10) NOT NULL,
  `portfrom` int(10) NOT NULL,
  `portto` int(10) NOT NULL,
  `ticket` text NOT NULL,
  `paymentid` int(10) NOT NULL,
  `bookedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_ticket_log`
--

INSERT INTO `reserved_ticket_log` (`id`, `boatid`, `number_of_passenger`, `portfrom`, `portto`, `ticket`, `paymentid`, `bookedat`) VALUES
(8, 33, 1, 1, 4, '33_EBYD_2560', 0, '2019-11-07 03:03:34'),
(9, 33, 2, 1, 3, '33_JHPZ_4817', 0, '2019-11-07 15:23:41'),
(12, 33, 2, 2, 3, '33_BAHV_6208', 0, '2019-11-07 17:41:50'),
(13, 34, 2, 1, 2, '34_XZQH_8401', 0, '2019-11-07 17:42:28'),
(14, 33, 2, 1, 4, '33_JZYF_2019', 0, '2019-11-07 17:42:57'),
(15, 33, 1, 1, 3, '33_WRZT_0621', 0, '2019-11-07 18:58:36'),
(16, 34, 1, 1, 3, '34_LMGN_2078', 0, '2019-11-07 19:05:16'),
(17, 33, 1, 1, 4, '33_KLAO_6983', 0, '2019-11-07 19:14:20'),
(18, 33, 2, 1, 3, '33_YGLM_3849', 0, '2019-11-07 19:25:29');

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

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `tripnumber`, `boatid`, `tripdate`, `availableseats`, `createdat`, `updatedat`) VALUES
(18, 1, 33, '2019-11-03', 35, '2019-11-03 19:29:57', '2019-11-07 04:01:10'),
(19, 1, 34, '2019-11-03', 35, '2019-11-03 19:31:58', '2019-11-07 04:01:10'),
(20, 1, 35, '2019-11-03', 35, '2019-11-03 19:33:03', '2019-11-07 04:01:10'),
(21, 1, 33, '2019-11-04', 35, '2019-11-04 18:01:25', '2019-11-07 04:01:10'),
(22, 2, 34, '2019-11-04', 35, '2019-11-04 18:05:51', '2019-11-07 04:01:10'),
(23, 1, 35, '2019-11-04', 35, '2019-11-04 18:06:59', '2019-11-07 04:01:10'),
(24, 1, 36, '2019-11-04', 35, '2019-11-04 18:07:06', '2019-11-07 04:01:10'),
(25, 1, 33, '2019-11-06', 35, '2019-11-06 17:00:29', '2019-11-07 04:01:10'),
(26, 1, 33, '2019-11-07', 35, '2019-11-07 03:27:35', '2019-11-07 04:01:10'),
(33, 1, 34, '2019-11-07', 35, '2019-11-07 04:00:00', '2019-11-07 04:01:10'),
(34, 2, 34, '2019-11-07', 35, '2019-11-07 04:00:41', '2019-11-07 04:01:10'),
(35, 1, 35, '2019-11-07', 42, '2019-11-07 19:47:26', NULL);

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
  `token` varchar(40) NOT NULL,
  `tripid` int(10) NOT NULL,
  `paymentid` int(10) NOT NULL,
  `bookedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unreserved_ticket_log`
--

INSERT INTO `unreserved_ticket_log` (`id`, `boatid`, `number_of_passenger`, `portfrom`, `portto`, `token`, `tripid`, `paymentid`, `bookedat`) VALUES
(21, 35, 2, 1, 2, '3656_NKH_592', 20, 0, '2019-11-03 14:03:03'),
(22, 33, 2, 1, 2, '123456_MJS_526', 21, 0, '2019-11-04 12:31:25'),
(23, 34, 1, 1, 4, '3450_VRZ_602', 22, 0, '2019-11-04 12:35:51'),
(24, 35, 3, 1, 3, '3656_ULO_179', 23, 0, '2019-11-04 12:36:59'),
(25, 36, 5, 1, 2, '9654_USX_976', 24, 0, '2019-11-04 12:37:06'),
(26, 33, 2, 1, 2, '123456_DEH_863', 25, 0, '2019-11-06 11:30:29'),
(27, 33, 42, 1, 2, '123456_KYE_047', 26, 0, '2019-11-06 21:57:35'),
(34, 34, 5, 1, 2, '3450_JCN_938', 33, 0, '2019-11-06 22:30:00'),
(35, 34, 3, 1, 3, '3450_GCZ_423', 34, 0, '2019-11-06 22:30:41'),
(36, 34, 2, 2, 1, '3450_VFP_247', 34, 0, '2019-11-06 22:31:10'),
(37, 35, 2, 1, 3, '3656_ECZ_175', 35, 0, '2019-11-07 14:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `roleid` int(11) NOT NULL,
  `password` longtext NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `roleid`, `password`, `email`, `mobilenumber`, `name`, `status`) VALUES
(1, 'admin', 1, '$2y$10$x5vHjSAij2xrWrHoI2HsEeDzv4thERyZfhK45B1qUwmvUP8ZDlx0y', 'vishum.10m@gmail.com', 8076248299, 'Vishad Mandal', 1),
(4, 'gaurav', 2, '$2y$10$uuN6SDw0DYyYgDOxC2t7Se2O3CtxF4Il/.C6sLvca6s3IfrrgEh4W', 'sgaurav0999@gmail.com', 9953526971, 'Gaurav Sen', 1),
(7, 'shivam', 2, '$2y$10$j5HO8cSk8TPkBmZKu1noEudPhSm.UUmmguVk7Ql.No2umj/.T2z4e', 'shivam@gmail.com', 7894561231, 'Shivam raput', 1),
(8, 'test', 2, '$2y$10$I8WG3rrpmnbsyqczeNI2JeoZrlm2ncRiYG0BVmBAgqCRQePrTSNNq', 'asd@gmail.ccmo', 7894561231, 'asdasd', 1);

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
-- Indexes for table `reserved_passengers`
--
ALTER TABLE `reserved_passengers`
  ADD PRIMARY KEY (`passengerid`);

--
-- Indexes for table `reserved_ticket_log`
--
ALTER TABLE `reserved_ticket_log`
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
  MODIFY `boatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `boatowner`
--
ALTER TABLE `boatowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boatschedule`
--
ALTER TABLE `boatschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `boat_route`
--
ALTER TABLE `boat_route`
  MODIFY `routeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
-- AUTO_INCREMENT for table `reserved_passengers`
--
ALTER TABLE `reserved_passengers`
  MODIFY `passengerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reserved_ticket_log`
--
ALTER TABLE `reserved_ticket_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `tripid` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `unreserved_ticket_log`
--
ALTER TABLE `unreserved_ticket_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
