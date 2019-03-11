-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 01:46 AM
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
(9, 32, 'ALUTA CONTINUA', 'ACCREDATION OF COURSES\r\nFAST RESULTS\r\nSOCIAL WELFARE\r\nSTUDENT BURSARY', 31, 3, 4, 0, 1550665204, 1550665204, 0),
(10, 33, 'SUCCESS IS A JOURNEY', 'ACCREDATION OF COURSES\r\nSTATE OF THE ART FACILITIES\r\nIMPROVED RELATIONS WITH ADMIN\r\nMAKE TUK GREAT AGAIN\r\n', 31, 3, 4, 0, 1550904365, 1550904365, 0);

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
(10, 31, 0, 'ANNUAL ELECTIONS', 0, 1551160800, 1551283200, 1551308400, 31, 0, 1550918352, 1550918352);

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
(6, 'SPEAKER', 0, 31, 0, '', 1550634468, 1550634468, 3, 0);

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
  `gender` text NOT NULL,
  `password` varchar(25) NOT NULL,
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

INSERT INTO `usermaster` (`id`, `usertype`, `iname`, `initials`, `iaddress`, `iincharge`, `firstname`, `lastname`, `gender`, `password`, `institution`, `department`, `regno`, `email`, `phoneno`, `updatedat`, `createdat`, `banned`, `deleted`) VALUES
(1, '', '', '', '', '', 'jhg', 'ghjk', '', '', 'ghjk', '', 'gtyhjk', 'hjkl;', 6789, '2019-02-11 21:17:56', 0, 0, 0),
(2, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '', 'TUK', '', 'sccj/00248/2015', 'cfvgbhj', 0, '2019-02-11 21:17:56', 0, 0, 0),
(3, '', '', '', '', '', '', '', '', '', '', '', '', 'cfvgbhj', 0, '2019-02-11 21:17:56', 0, 0, 0),
(4, '', '', '', '', '', 'kuhygtf', 'lkjhg', '', '', 'TUK', '', 'sdfghjk', 'cfvgbhj', 0, '2019-02-11 21:17:56', 0, 0, 0),
(5, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', '', '', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '0000-00-00 00:00:00', 0, 0, 0),
(6, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', '', '123456MB', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '0000-00-00 00:00:00', 0, 0, 0),
(7, '', '', '', '', '', 'ELIUD', 'KIPCHIGE', '', '123456MB', 'TUK', '', 'TR', 'EK@TUKENYA.AC.KE', 714359693, '2019-02-11 21:26:39', 0, 0, 0),
(8, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:37', 0, 0, 0),
(9, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:49', 0, 0, 0),
(10, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:38:56', 0, 0, 0),
(11, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:39:20', 0, 0, 0),
(12, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:48:36', 0, 0, 0),
(13, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:52:05', 0, 0, 0),
(14, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:55:35', 0, 0, 0),
(15, '', '', '', '', '', 'brian', 'mutugi', '', '123456mb', 'TUK', '', 'jhgfrd', 'briantugz@gmail.com', 655678999, '2019-02-11 21:55:46', 0, 0, 0),
(16, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:26:37', 0, 0, 0),
(17, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:26:40', 0, 0, 0),
(18, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:26:42', 0, 0, 0),
(19, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:26:44', 0, 0, 0),
(20, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:26:45', 0, 0, 0),
(21, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:29:04', 0, 0, 0),
(22, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:29:06', 0, 0, 0),
(23, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:29:07', 0, 0, 0),
(24, '', '', '', '', '', 'BRIAN', 'MUTUGI', '', '123456MB', 'TUK', '', 'sccj/00248/2015', 'briantugz@gmail.com', 714359693, '2019-02-12 09:29:09', 0, 0, 0),
(25, '', '', '', '', '', 'NEW', 'USER', '', '123456mb', 'TUK', '', 'newuser', 'new@gmal.com', 789757976, '2019-02-12 10:59:54', 0, 0, 0),
(26, '', '', '', '', '', 'TEST', 'USER', '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:23', 0, 0, 0),
(27, '', '', '', '', '', 'TEST', 'USER', '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:24', 0, 0, 0),
(28, '', '', '', '', '', 'TEST', 'USER', '', '123456mb', 'TUK', '', 'newuser', 'tu@gmail.com', 745635436, '2019-02-12 11:37:32', 0, 0, 0),
(29, '', '', '', '', '', 'ns', 'ns', '', '00000000mb', 'TUK', '', 'juhygtf', 'ns@gmailcom', 679483474, '2019-02-12 11:51:28', 0, 0, 0),
(30, '', '', '', '', '', 'try', 'try', '', 'try123456', 'TUK', '', 'try123', 'try@gmail.com', 456783434, '2019-02-12 12:04:55', 1549973095, 0, 0),
(31, 'institution', 'Technical University of Kenya', 'T.U.K', 'Haile Sellasie avenue, Nairobi', 'Mutugi Brian', '', '', '', '123456tuk', 'uni', '', 'ISO9000wdh', 'mail@tukenya.ac.ke', 732373473, '2019-02-12 16:41:21', 1549989681, 0, 0),
(32, 'voter', '', '', '', '', 'SHELTON', 'KERTICH', '', '123456sk', '31', '5', 'sccj/00251/2015', 'shelton@gmail.com', 723434435, '2019-02-16 20:28:12', 1550348892, 0, 0),
(33, 'voter', '', '', '', '', 'CLINTON', 'NYAMBATTI', '', '12345678', '31', '7', 'scci/00251/2015', 'clintshirtliff@gmail.com', 743262332, '2019-02-23 06:30:31', 1550903431, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirants`
--
ALTER TABLE `aspirants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `uid_2` (`uid`),
  ADD KEY `uid_3` (`uid`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirants`
--
ALTER TABLE `aspirants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
