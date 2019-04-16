-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 08:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecast`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirants`
--

CREATE TABLE `aspirants` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `slogan` varchar(45) NOT NULL,
  `manifesto` varchar(150) NOT NULL,
  `instid` int(11) NOT NULL,
  `elecid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  `createdat` int(11) NOT NULL,
  `updatedat` int(11) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspirants`
--

INSERT INTO `aspirants` (`id`, `uid`, `slogan`, `manifesto`, `instid`, `elecid`, `postid`, `deleted`, `createdat`, `updatedat`, `votes`) VALUES
(9, 0, 'ALUTA CONTINUA', 'ACCREDATION OF COURSES\r\nFAST RESULTS\r\nSOCIAL WELFARE\r\nSTUDENT BURSARY', 31, 3, 4, 0, 1550665204, 1550665204, 0),
(10, 0, 'SUCCESS IS A JOURNEY', 'ACCREDATION OF COURSES\r\nSTATE OF THE ART FACILITIES\r\nIMPROVED RELATIONS WITH ADMIN\r\nMAKE TUK GREAT AGAIN\r\n', 31, 3, 4, 0, 1550904365, 1550904365, 0),
(17, 32, 'ALUTA CONTINUA', 'MAKE TUK GREAT AGAIN', 31, 11, 7, 0, 1555144823, 1555144823, 0),
(18, 33, 'COMRADES POWER', 'TOGETHER WE WILL RISE', 31, 11, 7, 0, 1555144865, 1555144865, 0),
(19, 35, 'LIVE UP !!', 'WE COME HERE TO TAKE OVER', 31, 11, 7, 0, 1555151038, 1555151038, 0),
(20, 35, 'YOH ...TEY KEITH', 'RUNNING BACK..TURBO', 31, 12, 11, 0, 1555440588, 1555440588, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `instid` int(4) NOT NULL,
  `name` varchar(70) NOT NULL,
  `hod` varchar(50) NOT NULL,
  `hodemail` varchar(35) NOT NULL,
  `hodphone` int(11) NOT NULL,
  `voters` int(3) NOT NULL,
  `createdby` int(3) NOT NULL,
  `updatedby` int(3) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `instid`, `name`, `hod`, `hodemail`, `hodphone`, `voters`, `createdby`, `updatedby`, `createdat`, `updatedat`, `deleted`) VALUES
(5, 31, 'SCHOOL OF COMPUTING AND INFORMATION TECHNOLOGIES', 'DAKTARI', 'dscs@gmail.com', 98765456, 0, 31, 31, '2019-02-16 10:03:34', '2019-02-16 10:03:34', 1),
(6, 31, 'SCHOOL OF ELECTRICAL AND ELECTRONIC ENGINEERING', 'ENG. MWAURA', 'dscs@gmail.com', 98765567, 0, 31, 31, '2019-02-16 10:06:45', '2019-02-16 10:06:45', 1),
(7, 31, 'SCHOOL OF COMPUTING AND INFORMATION TECHNOLOGIES', 'BRIAN MUTUGI', 'briantugz@gmail.com', 1234567890, 0, 31, 31, '2019-02-16 10:31:43', '2019-02-16 10:31:43', 0),
(9, 31, 'SCHOOL OF ELECTRICAL AND ELECTRONIC ENGINEERING', 'ENG. MWAURA', 'dscs@gmail.com', 9876543, 0, 31, 31, '2019-02-16 11:33:13', '2019-02-16 11:33:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(11) NOT NULL,
  `instid` int(11) NOT NULL,
  `deptid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `voters` int(4) NOT NULL,
  `startdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `announcedate` int(11) NOT NULL,
  `createdby` int(3) NOT NULL,
  `deleted` int(1) NOT NULL,
  `createdat` int(11) NOT NULL,
  `updatedat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `instid`, `deptid`, `name`, `voters`, `startdate`, `enddate`, `announcedate`, `createdby`, `deleted`, `createdat`, `updatedat`) VALUES
(1, 4, 0, 'SATUK elec', 32, 456788765, 456788765, 456788765, 4, 0, 765656788, 765479999),
(2, 4, 0, 'SATUK elec', 32, 456788765, 456788765, 456788765, 4, 0, 765656788, 765479999),
(3, 31, 0, 'SATUK GENERAL ELECTIONS', 0, 1550358000, 1550876400, 1551394800, 31, 0, 1550321585, 1550321585),
(4, 31, 0, 'SATUK GENERAL ELECTIONS', 0, 1550617200, 1550876400, 1551394800, 31, 1, 1550321647, 1550321647),
(5, 31, 0, 'SATUK GENERAL ELECTIONS', 0, 1550444400, 1550876400, 1551394800, 31, 1, 1550321771, 1550321771),
(6, 31, 0, 'TEST ELECTION', 0, 1550358000, 1550617200, 1550876400, 31, 0, 1550340754, 1550340754),
(7, 31, 7, 'SEC GEN ELECTIONS', 0, 1550444400, 1550444400, 1550530800, 31, 0, 1550387318, 1550387318),
(8, 31, 0, 'KUSCA ELECTIONS', 0, 0, 0, 1551049200, 31, 0, 1550892440, 1550892440),
(9, 31, 0, 'JKUSA ELECTIONS', 0, 1550988000, 1551024000, 1551049200, 31, 0, 1550897918, 1550897918),
(10, 31, 0, 'ANNUAL ELECTIONS', 0, 1551160800, 1551283200, 1551308400, 31, 0, 1550918352, 1550918352),
(11, 31, 0, 'SATUK 2019 ELECTIONS', 0, 1555219800, 1555342200, 1555365600, 31, 0, 1555142870, 1555142870),
(12, 31, 7, 'TUK ELECTIONS', 0, 1555475400, 1555558200, 1555538400, 31, 0, 1555436800, 1555436800);

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `aspirants` int(11) NOT NULL,
  `instid` int(3) NOT NULL,
  `deptid` int(3) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `createdat` int(11) NOT NULL,
  `updatedat` int(11) NOT NULL,
  `elecid` int(3) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `aspirants`, `instid`, `deptid`, `gender`, `createdat`, `updatedat`, `elecid`, `deleted`) VALUES
(1, 'SECRETARY GENERAL', 0, 34, 1, '', 876545, 765456, 43, 0),
(2, '', 0, 31, 0, '', 1550431198, 1550431198, 3, 1),
(3, 'SPEAKER', 0, 31, 0, '', 1550431280, 1550431280, 3, 1),
(4, 'SCHOOL PRESIDENT', 0, 31, 0, '', 1550434250, 1550434250, 3, 0),
(5, 'FINANCE SECRETARY', 0, 31, 0, '', 1550435185, 1550435185, 3, 0),
(6, 'SPEAKER', 0, 31, 0, '', 1550634468, 1550634468, 3, 0),
(7, 'SATUK CHAIRMAN', 0, 31, 0, '', 1555142901, 1555142901, 11, 0),
(8, 'SPEAKER', 0, 31, 0, '', 1555436708, 1555436708, 11, 0),
(9, 'SPEAKER', 0, 31, 0, '', 1555436819, 1555436819, 12, 0),
(10, 'SPEAKER', 0, 31, 0, '', 1555440102, 1555440102, 12, 1),
(11, 'SCHOOL PRESIDENT', 0, 31, 0, '', 1555440114, 1555440114, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL,
  `usertype` varchar(14) NOT NULL,
  `iname` varchar(45) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `iaddress` varchar(40) NOT NULL,
  `iincharge` varchar(90) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `gender` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `regno` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` int(9) NOT NULL,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdat` int(10) NOT NULL,
  `banned` int(1) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`id`, `usertype`, `iname`, `initials`, `iaddress`, `iincharge`, `firstname`, `lastname`, `image`, `gender`, `password`, `institution`, `department`, `regno`, `email`, `phoneno`, `updatedat`, `createdat`, `banned`, `deleted`) VALUES
(1, '', '', '', '', '', 'jhg', 'ghjk', NULL, '', '', 'ghjk', '', 'gtyhjk', 'hjkl;', 6789, '2019-02-11 21:17:56', 0, 0, 0),
(3, '', '', '', '', '', '', '', NULL, '', '', '', '', '', 'cfvgbhj', 0, '2019-02-11 21:17:56', 0, 0, 0),
(4, '', '', '', '', '', 'kuhygtf', 'lkjhg', NULL, '', '', 'TUK', '', 'sdfghjk', 'cfvgbhj', 0, '2019-02-11 21:17:56', 0, 0, 0),
(5, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', NULL, '', '', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '0000-00-00 00:00:00', 0, 0, 0),
(6, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', NULL, '', '123456MB', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '0000-00-00 00:00:00', 0, 0, 0),
(7, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', NULL, '', '123456MB', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '2019-02-11 21:26:39', 0, 0, 0),
(8, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:37', 0, 0, 0),
(9, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:49', 0, 0, 0),
(10, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:56', 0, 0, 0),
(11, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:39:20', 0, 0, 0),
(12, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:48:36', 0, 0, 0),
(13, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:52:05', 0, 0, 0),
(14, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:55:35', 0, 0, 0),
(15, '', '', '', '', '', 'brian', 'mutugi', NULL, '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:55:46', 0, 0, 0),
(25, '', '', '', '', '', 'NEW', 'USER', NULL, '', '123456mb', 'TUK', '', 'newuser', 'new@gmal.com', 789757976, '2019-02-12 10:59:54', 0, 0, 0),
(26, '', '', '', '', '', 'TEST', 'USER', NULL, '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:23', 0, 0, 0),
(27, '', '', '', '', '', 'TEST', 'USER', NULL, '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:24', 0, 0, 0),
(28, '', '', '', '', '', 'TEST', 'USER', NULL, '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:32', 0, 0, 0),
(29, '', '', '', '', '', 'ns', 'ns', NULL, '', '00000000mb', 'TUK', '', 'juhygtf', 'ns@gmailcom', 679483474, '2019-02-12 11:51:28', 0, 0, 0),
(30, '', '', '', '', '', 'try', 'try', NULL, '', 'try123456', 'TUK', '', 'try123', 'try@gmail.com', 456783434, '2019-02-12 12:04:55', 1549973095, 0, 0),
(31, 'institution', 'Technical University of Kenya', 'T.U.K', 'Haile Sellasie avenue, Nairobi', 'Mutugi Brian', '', '', NULL, '', 'adda197bcf082fe2a48de4a2f5c0eefc', 'uni', '', 'ISO9000wdh', 'mail@tukenya.ac.ke', 732373473, '2019-04-13 14:13:09', 1549989681, 0, 0),
(32, 'voter', '', '', '', '', 'SHELTON', 'KERTICH', NULL, '', '123456sk', '31', '5', 'sccj/00251/2015', 'shelton@gmail.com', 723434435, '2019-02-16 20:28:12', 1550348892, 0, 0),
(33, 'voter', '', '', '', '', 'CLINTON', 'NYAMBATTI', NULL, '', '12345678', '31', '7', 'scci/00251/2015', 'clintshirtliff@gmail.com', 743262332, '2019-02-23 06:30:31', 1550903431, 0, 0),
(35, 'voter', '', '', '', '', 'BRIAN', 'MUTUGI', 'images/uploads/profileimages/155515075737358750_1306445279490952_7754574198936174592_n.jpg', '', '05a88bf0b95e119b4cc79c1e6c6747f2', '31', '7', 'SCCJ/00248/2015', 'briantugz@gmail.com', 714359693, '2019-04-13 10:32:01', 1555150757, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vid` int(11) NOT NULL,
  `instid` int(11) NOT NULL,
  `vreg` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vid`, `instid`, `vreg`, `pid`, `aid`, `eid`, `createdat`, `updatedat`) VALUES
(1, 3, 'sccj/00456/2017', 43, 5, 5, '2019-04-13 15:55:09', '2019-04-13 15:55:09'),
(2, 31, 'SCCJ/00248/2015', 7, 19, 11, '2019-04-13 16:17:58', '2019-04-13 16:17:58'),
(3, 31, 'SCCJ/00248/2015', 11, 20, 12, '2019-04-16 18:50:31', '2019-04-16 18:50:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirants`
--
ALTER TABLE `aspirants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirants`
--
ALTER TABLE `aspirants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
