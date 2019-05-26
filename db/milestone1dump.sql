-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2017 at 11:46 PM
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
  `Message` varchar(2000) NOT NULL,
  `MessageType` varchar(10) NOT NULL,
  `CId` int(20) DEFAULT NULL,
  `UserId` int(20) NOT NULL,
  `WId` int(20) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`MId`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

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
(7, 1),
(7, 3),
(2, 1);

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
(1, 'Tow Mater', 'e10adc3949ba59abbe56e057f20f883e', 'mater@rsprings.gov', '@mater'),
(2, 'Sally Carrera', 'e10adc3949ba59abbe56e057f20f883e', 'porsche@rsprings.gov', '@sally'),
(3, 'Doc Hudson', 'e10adc3949ba59abbe56e057f20f883e', 'hornet@rsprings.gov', '@doc'),
(4, 'Finn McMissile', 'e10adc3949ba59abbe56e057f20f883e', 'topsecret@agent.org', '@mcmissile'),
(5, 'Lightning McQueen', 'e10adc3949ba59abbe56e057f20f883e', 'kachow@rusteze.com', '@mcqueen');

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
