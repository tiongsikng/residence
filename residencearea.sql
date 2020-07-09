-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2018 at 05:36 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `residencearea`
--

-- --------------------------------------------------------

--
-- Table structure for table `houseregistration`
--

DROP TABLE IF EXISTS `houseregistration`;
CREATE TABLE IF NOT EXISTS `houseregistration` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HOUSE_ID` varchar(20) NOT NULL,
  `REGISTRATION_DATE` varchar(50) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houseregistration`
--

INSERT INTO `houseregistration` (`ID`, `HOUSE_ID`, `REGISTRATION_DATE`, `NAME`) VALUES
(2, '1-11', '2018-04-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HOUSE_ID` varchar(10) NOT NULL,
  `HOUSE_NO` int(10) NOT NULL,
  `ROAD_NM` varchar(50) NOT NULL,
  `AREA_NM` varchar(50) NOT NULL,
  `OWNER_NM` varchar(60) NOT NULL,
  `OWNER_TYPE` varchar(20) NOT NULL,
  `OWNER_EMAIL` varchar(60) NOT NULL,
  `OWNER_CONTACTNO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`ID`, `HOUSE_ID`, `HOUSE_NO`, `ROAD_NM`, `AREA_NM`, `OWNER_NM`, `OWNER_TYPE`, `OWNER_EMAIL`, `OWNER_CONTACTNO`) VALUES
(13, '1-11', 1, 'Du3/1', 'DU3', 'Rashid', 'Owner', 'asdfasdf@ggmail.com', '011-20117896'),
(14, '3-33', 3, 'DU 3/3', 'DU', 'Tan', 'Owner', 'tan@ggmail.com', '01298745619'),
(15, '4-44', 4, 'DU 4/4', 'DU', 'Lee', 'Owner', 'lee@ggmail.co', '01677882194'),
(16, '2-22', 2, 'DU 2/2', 'DU', 'Teh', 'Owner', 'teh@ggmail.com', '01180115948'),
(17, '1-11', 1, 'DU 1/1', 'DU', 'KLKL', 'Owner', 'kljkl@gmail', '0196644875'),
(20, '1-51', 1, 'DU 5/1', 'DU', 'Wong', 'Owner', 'wong@owner.com', '01958745896'),
(21, '1-52', 1, 'DU 5/2', 'DU', 'Wongg', 'Owner', 'wongg@ggmail.com', '01383125444'),
(22, '1-44', 1, 'DU 4/4', 'DU', 'Abu Bakar', 'Owner', 'abubakar@ashburn.com', '01399887756'),
(23, '1-77', 1, 'DU 7/7', 'DU', 'Lee', 'Tenant', 'lee@gg', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('1111', 'e10adc3949ba59abbe56e057f20f883e'),
('2222', 'e19d5cd5af0378da05f63f891c7467af'),
('1234', 'e19d5cd5af0378da05f63f891c7467af'),
('admin@security.com', 'e19d5cd5af0378da05f63f891c7467af');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HOUSE_ID` varchar(20) NOT NULL,
  `PAYMENT_DATE` varchar(20) NOT NULL,
  `DATE_TEXT` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `HOUSE_ID` (`HOUSE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `HOUSE_ID`, `PAYMENT_DATE`, `DATE_TEXT`) VALUES
(26, '3-33', '2018-04-23', 'June 2019'),
(29, '2-22', '2018-04-23', 'Oct 2011'),
(30, '2-22', '2018-04-23', 'Sep 2010'),
(31, '1-11', '2018-04-26', 'May 2018'),
(32, '2-22', '2018-04-26', 'Nov 2018'),
(33, '3-33', '2018-04-26', 'Jan 2020'),
(36, '3-33', '2018-05-05', 'Apr 2018'),
(37, '1-44', '2018-05-06', 'Registered'),
(38, '1-77', '2018-05-07', 'Registered'),
(39, '1-77', '2018-05-07', 'Jan 2020'),
(40, '1-77', '2018-05-07', 'Nov 2019'),
(41, '2-22', '2018-05-07', 'May 2019'),
(42, '1-44', '2018-05-09', 'Apr 2018'),
(43, '1-11', '2018-05-10', 'Sep 2018');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
