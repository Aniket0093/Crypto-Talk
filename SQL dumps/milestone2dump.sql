-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2017 at 03:21 AM
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
  `Type` text NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`CId`, `CName`, `CDesc`, `CTag`, `Type`, `CreatedBy`, `TimeStamp`) VALUES
(1, 'Bitcoin', 'Know Bitcoin', '#bitcion', 'Private', 'mater@rsprings.gov', '2017-10-15 22:43:33'),
(2, 'Litecoin', 'Know your Litecoin', '#lite', 'Public', 'porsche@rspring.gov', '2017-10-16 04:00:00'),
(3, 'Etherum', 'Know your Eth', '#Eth', 'Public', 'ak@gmail.com', '2017-10-16 04:00:00'),
(45, 'Tow Mater\'s Tall Tales!?', 'k', 'k', 'Public', 'hornet@rsprings.gov', '2017-11-03 18:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `userid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

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
  `lcount` int(5) UNSIGNED NOT NULL,
  `dcount` int(5) UNSIGNED NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`MId`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MId`, `Message`, `MessageType`, `CId`, `UserId`, `WId`, `Source`, `Destination`, `lcount`, `dcount`, `TimeStamp`) VALUES
(298, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:19:14'),
(297, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:19:14'),
(296, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 1, '2017-11-11 04:17:09'),
(295, '\'\'', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'mater@rsprings.gov', 0, 1, '2017-11-10 04:47:33'),
(294, 'hi', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-10 04:46:58'),
(293, 'Lite', 'G', 2, 5, 1, 'kachow@rusteze.com', 'Litecoin', 0, 0, '2017-11-09 02:05:11'),
(292, 'Hey sally', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'porsche@rsprings.gov', 0, 0, '2017-11-09 01:40:58'),
(291, 'Hey sally', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'porsche@rsprings.gov', 0, 0, '2017-11-09 01:40:21'),
(290, 'Hey sally', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'porsche@rsprings.gov', 0, 0, '2017-11-09 01:34:18'),
(289, 'Hey', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'mater@rsprings.gov', 1, 0, '2017-11-09 01:20:54'),
(288, 'm', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'mater@rsprings.gov', 1, 0, '2017-11-03 18:48:15'),
(287, 'Hry doc', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-01 23:29:36'),
(299, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:19:15'),
(300, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:19:33'),
(301, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:19:47'),
(302, 'Hey', 'G', 1, 5, 1, 'kachow@rusteze.com', 'Bitcoin', 0, 0, '2017-11-11 04:20:50'),
(303, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 1, '2017-11-11 06:13:37'),
(304, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:14:29'),
(305, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:16:18'),
(306, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:16:56'),
(307, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:18:41'),
(308, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:22:04'),
(309, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:22:41'),
(310, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:22:50'),
(311, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:22:58'),
(312, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:23:16'),
(313, 'df', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:26:42'),
(314, 'Hello', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:26:45'),
(315, 'Hello', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:26:56'),
(316, 'aniket\'', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:33:11'),
(317, 'aniket\'', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:33:18'),
(318, 'aniket\'', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:33:22'),
(319, 'aniket\'', 'G', 3, 3, 1, 'hornet@rsprings.gov', 'Etherum', 0, 0, '2017-11-11 06:45:12'),
(320, 'fgh', 'D', NULL, 3, 1, 'hornet@rsprings.gov', 'mater@rsprings.gov', 0, 0, '2017-11-12 17:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `RId` text NOT NULL,
  `MId` int(11) NOT NULL,
  `cname` text,
  `uid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`RId`, `MId`, `cname`, `uid`) VALUES
('like', 289, 'Tow Mater', 3),
('dislike', 295, 'Tow Mater', 3),
('like', 288, 'Tow Mater', 3),
('dislike', 303, 'Etherum', 3),
('dislike', 296, 'Bitcoin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `submessage`
--

DROP TABLE IF EXISTS `submessage`;
CREATE TABLE IF NOT EXISTS `submessage` (
  `subid` int(20) NOT NULL AUTO_INCREMENT,
  `s_message` longtext NOT NULL,
  `mid` longtext NOT NULL,
  `userid` longtext NOT NULL,
  `destination` text NOT NULL,
  `lcount` int(3) UNSIGNED NOT NULL,
  `dcount` int(3) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submessage`
--

INSERT INTO `submessage` (`subid`, `s_message`, `mid`, `userid`, `destination`, `lcount`, `dcount`, `timestamp`) VALUES
(1, 'Reply functionality', '287', '3', 'Etherum', 0, 0, '2017-11-11 08:18:00'),
(32, 'dsfs', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:50:42'),
(31, '123', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:10:15'),
(7, 'Akshay', '303', '3', 'Etherum', 0, 0, '2017-11-14 00:20:13'),
(30, 'sadf', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:09:03'),
(29, 'sadf', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:09:01'),
(28, 'Akshay', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:03:35'),
(27, '224', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:02:28'),
(26, '123', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:02:24'),
(25, 'qwerty', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:01:54'),
(24, 'qw', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:01:51'),
(23, 'Hey', '287', '3', 'Etherum', 0, 0, '2017-11-14 01:00:18'),
(22, 'oye', '296', '3', 'Bitcoin', 0, 0, '2017-11-14 00:51:01'),
(21, 'Hey', '296', '3', 'Bitcoin', 0, 0, '2017-11-14 00:50:44');

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
(4, 1),
(5, 2),
(5, 1),
(3, 44),
(3, 45);

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
  `image` text NOT NULL,
  `imagetype` longblob NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Use this table to store basic user information.';

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `password`, `email`, `tagname`, `image`, `imagetype`) VALUES
(1, 'Tow Mater', '613e1e96a09fb22d3355a47d5de06f10', 'mater@rsprings.gov', '@mater', 'towmater.jpg', ''),
(2, 'Sally Carrera', 'b8bba2baae4c2a08fdff4e223458577d', 'porsche@rsprings.gov', '@sally', 'sallycarrera.png', ''),
(3, 'Doc Hudson', '9a09b4dfda82e3e665e31092d1c3ec8d', 'hornet@rsprings.gov', '@doc', 'dochudson.png', ''),
(4, 'Finn McMissile', 'fac44014029578db2b6a54533571d3c0', 'topsecret@agent.org', '@mcmissile', 'finnmcmissile.png', ''),
(5, 'Lightning McQueen', '453e032e33e9d7ce4afb71c6d9b1e082', 'kachow@rusteze.com', '@mcqueen', 'mcqueen.png', '');

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
