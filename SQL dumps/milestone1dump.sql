-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2017 at 09:54 PM
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
-- Database: `cryptocurrency`
--
CREATE DATABASE IF NOT EXISTS `cryptocurrency` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cryptocurrency`;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE IF NOT EXISTS `channel` (
  `CId` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(100) NOT NULL,
  `CDesc` varchar(200) NOT NULL,
  `CTag` varchar(50) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`CId`, `CName`, `CDesc`, `CTag`, `CreatedBy`, `TimeStamp`) VALUES
(1, 'Bitcoin', 'Know Bitcoin', '#bitcion', 'mater@rspings.gov', '2017-10-15 22:43:33'),
(2, 'Litecoin', 'Know your Litecoin', '#lite', 'porsche@rspring.gov', '2017-10-16 04:00:00'),
(3, 'Etherum', 'Know your Eth', '#Eth', 'ak@gmail.com', '2017-10-16 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `MId` int(50) NOT NULL AUTO_INCREMENT,
  `Message` longtext NOT NULL,
  `MessageType` varchar(10) NOT NULL,
  `CId` int(20) DEFAULT NULL,
  `UserId` int(20) NOT NULL,
  `WId` int(20) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`MId`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MId`, `Message`, `MessageType`, `CId`, `UserId`, `WId`, `Source`, `Destination`, `TimeStamp`) VALUES
(198, 'I have invested in BTC. What about you?', 'D', NULL, 5, 1, 'kachow@rusteze.com', 'hornet@rsprings.gov', '2017-10-17 18:28:57'),
(197, 'Agreed :)', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', '2017-10-17 18:28:34'),
(196, 'Price of BTC are rising quickly, I think it is the perfect time to invest.', 'G', 1, 3, 1, 'hornet@rsprings.gov', 'Bitcoin', '2017-10-17 18:27:11'),
(195, 'Yes I have invested in BTC.', 'D', NULL, 2, 1, 'porsche@rsprings.gov', 'mater@rsprings.gov', '2017-10-17 18:25:04'),
(194, 'Hi. Have you invested in BTC?', 'D', NULL, 1, 1, 'mater@rsprings.gov', 'porsche@rsprings.gov', '2017-10-17 18:24:03'),
(193, 'Are there any chance of Litecoin price to go up?', 'G', 2, 1, 1, 'mater@rsprings.gov', 'Litecoin', '2017-10-17 18:23:34'),
(192, 'What do you think about BTC?', 'G', 1, 1, 1, 'mater@rsprings.gov', 'Bitcoin', '2017-10-17 18:22:50'),
(191, 'Hi Everyone', 'G', 1, 1, 1, 'mater@rsprings.gov', 'Bitcoin', '2017-10-17 18:22:26'),
(199, 'Can I invest in 20% of a Bitcoin?', 'G', 1, 1, 1, 'mater@rsprings.gov', 'Bitcoin', '2017-10-18 21:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `RId` int(11) NOT NULL,
  `MId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userchannel`
--

DROP TABLE IF EXISTS `userchannel`;
CREATE TABLE IF NOT EXISTS `userchannel` (
  `UserID` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userchannel`
--

INSERT INTO `userchannel` (`UserID`, `CID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 3),
(3, 1),
(2, 1),
(4, 1),
(5, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) NOT NULL,
  `tagname` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Use this table to store basic user information.';

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `password`, `email`, `tagname`) VALUES
(1, 'Tow Mater', '613e1e96a09fb22d3355a47d5de06f10', 'mater@rsprings.gov', '@mater'),
(2, 'Sally Carrera', 'b8bba2baae4c2a08fdff4e223458577d', 'porsche@rsprings.gov', '@sally'),
(3, 'Doc Hudson', '9a09b4dfda82e3e665e31092d1c3ec8d', 'hornet@rsprings.gov', '@doc'),
(4, 'Finn McMissile', 'fac44014029578db2b6a54533571d3c0', 'topsecret@agent.org', '@mcmissile'),
(5, 'Lightning McQueen', '453e032e33e9d7ce4afb71c6d9b1e082', 'kachow@rusteze.com', '@mcqueen');

-- --------------------------------------------------------

--
-- Table structure for table `userworkspace`
--

DROP TABLE IF EXISTS `userworkspace`;
CREATE TABLE IF NOT EXISTS `userworkspace` (
  `UserID` int(20) NOT NULL,
  `WsID` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userworkspace`
--

INSERT INTO `userworkspace` (`UserID`, `WsID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

DROP TABLE IF EXISTS `workspace`;
CREATE TABLE IF NOT EXISTS `workspace` (
  `WsID` int(20) NOT NULL AUTO_INCREMENT,
  `WsName` varchar(100) NOT NULL,
  `WsDescription` varchar(200) NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`WsID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Use this table to store basic workspace information.';

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`WsID`, `WsName`, `WsDescription`, `CreatedBy`, `TimeStamp`) VALUES
(1, 'Bitcoin', 'Know Bitcoin', '1', '2017-10-15 22:34:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
