-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2017 at 02:09 PM
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
  `Type` text NOT NULL,
  `Status` text,
  `CreatedBy` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`CId`, `CName`, `CDesc`, `CTag`, `Type`, `Status`, `CreatedBy`, `TimeStamp`) VALUES
(1, 'Bitcoin', 'Know Bitcoin', '#bitcion', 'Private', 'unarchived', 'mater@rsprings.gov', '2017-10-15 22:43:33'),
(2, 'Litecoin', 'Know your Litecoin', '#lite', 'Public', 'unarchived', 'porsche@rspring.gov', '2017-10-16 04:00:00'),
(3, 'Etherum', 'Know your Eth', '#Eth', 'Public', 'unarchived', 'ak@gmail.com', '2017-10-16 04:00:00'),
(4, 'general', 'General Discussion', '#gen', 'Public', 'unarchived', 'default', '2017-12-01 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `mid` text NOT NULL,
  `imagename` text,
  `imagetype` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`mid`, `imagename`, `imagetype`) VALUES
('', 'laxmi-ganesha-saraswati.JPG', 0x696d6167652f6a706567),
('', 'Business-Problem-Puja.jpg', 0x696d6167652f6a706567),
('', 'laxmi-ganesha-saraswati.JPG', 0x696d6167652f6a706567),
('', 'Business-Problem-Puja.jpg', 0x696d6167652f6a706567),
('470', 'Business-Problem-Puja.jpg', 0x696d6167652f6a706567);

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
  `messageformat` text NOT NULL,
  PRIMARY KEY (`MId`)
) ENGINE=MyISAM AUTO_INCREMENT=727 DEFAULT CHARSET=utf8;

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
('dislike', 296, 'Bitcoin', 3),
('like', 313, 'Etherum', 1),
('dislike', 315, 'Etherum', 1),
('like', 297, 'Bitcoin', 1),
('like', 326, 'Litecoin', 1),
('like', 454, 'Bitcoin', 1),
('dislike', 588, 'Bitcoin', 1),
('dislike', 589, 'Bitcoin', 1),
('like', 612, 'Bitcoin', 1),
('dislike', 603, 'Bitcoin', 1),
('like', 610, 'Bitcoin', 1),
('dislike', 587, 'Litecoin', 1),
('like', 618, 'Etherum', 3),
('like', 669, 'Etherum', 3),
('like', 676, 'Bitcoin', 1),
('dislike', 646, 'Bitcoin', 1),
('dislike', 646, 'Bitcoin', 16),
('like', 679, 'Litecoin', 1),
('dislike', 650, 'Bitcoin', 2),
('dislike', 650, 'Bitcoin', 16),
('like', 652, 'Bitcoin', 16),
('like', 685, 'Bitcoin', 1),
('like', 650, 'Bitcoin', 1),
('dislike', 689, 'Etherum', 3),
('like', 697, 'Litecoin', 5),
('like', 694, 'Bitcoin', 1),
('like', 703, 'Sally Carrera', 33),
('like', 717, 'Tow Mater', 33);

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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subreaction`
--

DROP TABLE IF EXISTS `subreaction`;
CREATE TABLE IF NOT EXISTS `subreaction` (
  `rid` text NOT NULL,
  `sid` text NOT NULL,
  `cname` text NOT NULL,
  `uid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subreaction`
--

INSERT INTO `subreaction` (`rid`, `sid`, `cname`, `uid`) VALUES
('like', '43', 'Bitcoin', '1'),
('', '', '', ''),
('like', '44', 'Bitcoin', '1'),
('like', '45', 'Bitcoin', '1'),
('like', '41', 'Bitcoin', '1'),
('like', '42', 'Bitcoin', '1'),
('dislike', '46', 'Bitcoin', '1'),
('like', '46', 'Bitcoin', '2'),
('dislike', '47', 'Bitcoin', '2'),
('like', '48', 'Bitcoin', '2'),
('dislike', '49', 'Bitcoin', '1'),
('dislike', '52', 'Bitcoin', '1'),
('dislike', '53', 'Bitcoin', '1'),
('dislike', '58', 'Bitcoin', '1'),
('like', '56', 'Bitcoin', '1'),
('dislike', '68', 'Etherum', '1'),
('dislike', '78', 'Bitcoin', '1'),
('dislike', '62', 'Litecoin', '2'),
('like', '80', 'Bitcoin', '1'),
('dislike', '47', 'Bitcoin', '1'),
('dislike', '48', 'Bitcoin', '1'),
('like', '49', 'Bitcoin', '2'),
('dislike', '50', 'Litecoin', '16'),
('dislike', '51', 'Bitcoin', '16'),
('dislike', '53', 'Bitcoin', '16'),
('like', '54', 'Bitcoin', '16'),
('like', '55', 'Tow Mater', '3'),
('like', '56', 'Tow Mater', '24'),
('dislike', '58', 'general', '33');

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
(2, 1),
(5, 2),
(5, 1),
(3, 44),
(3, 45),
(3, 46),
(1, 16),
(16, 1),
(16, 2),
(16, 3),
(2, 2),
(2, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(16, 4),
(33, 4);

-- --------------------------------------------------------

--
-- Table structure for table `userimage`
--

DROP TABLE IF EXISTS `userimage`;
CREATE TABLE IF NOT EXISTS `userimage` (
  `userid` int(11) NOT NULL,
  `image` text NOT NULL,
  `flag` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userimage`
--

INSERT INTO `userimage` (`userid`, `image`, `flag`) VALUES
(1, 'towmater.jpg', '1'),
(3, 'dochudson.png', '1'),
(2, 'sallycarrera.png', '1'),
(4, 'finnmcmissile.png', '1'),
(5, 'mcqueen.png', '1'),
(22, 'https://www.gravatar.com/avatar/bfcf66bab661cb114780ad6b349fbcb7?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F00000000000000000000000000000000&s=40', '1'),
(23, 'https://www.gravatar.com/avatar/96349bcd41bb7d5963af88a3e392bcf4?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F00000000000000000000000000000000&s=40', '1');

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
  `usertype` text,
  `image` longtext NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='Use this table to store basic user information.';

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `password`, `email`, `tagname`, `usertype`, `image`) VALUES
(1, 'Tow Mater', '613e1e96a09fb22d3355a47d5de06f10', 'mater@rsprings.gov', '@mater', 'user', 'Images/towmater.jpg'),
(2, 'Sally Carrera', 'b8bba2baae4c2a08fdff4e223458577d', 'porsche@rsprings.gov', '@sally', 'user', 'Images/sallycarrera.png'),
(3, 'Doc Hudson', '9a09b4dfda82e3e665e31092d1c3ec8d', 'hornet@rsprings.gov', '@doc', 'user', 'Images/dochudson.png'),
(4, 'Finn McMissile', 'fac44014029578db2b6a54533571d3c0', 'topsecret@agent.org', '@mcmissile', 'user', 'Images/finnmcmissile.png'),
(5, 'Lightning McQueen', '453e032e33e9d7ce4afb71c6d9b1e082', 'kachow@rusteze.com', '@mcqueen', 'user', 'Images/mcqueen.png'),
(16, 'Tex Dinoco', '5df398e7946db5ded47290cbb43c5028', 'tex@dinoco.gov', '@tex', 'superuser', 'Images/texdinoco.png'),
(33, 'test', '202cb962ac59075b964b07152d234b70', 'test@test.gov', '@test', NULL, 'Images/91qvAndeVYL._RI_.jpg');

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
