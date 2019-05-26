-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2017 at 07:57 PM
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
(3, 'Etherum', 'Know your Eth', '#Eth', 'Public', 'unarchived', 'ak@gmail.com', '2017-10-16 04:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=781 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MId`, `Message`, `MessageType`, `CId`, `UserId`, `WId`, `Source`, `Destination`, `lcount`, `dcount`, `TimeStamp`, `messageformat`) VALUES
(770, 'Hi', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 0, '2017-11-21 19:42:17', 'text'),
(771, 'hey', 'G', 2, 16, 1, 'tex@dinoco.gov', 'Litecoin', 0, 0, '2017-11-21 19:42:44', 'text'),
(772, 'hello', 'G', 3, 16, 1, 'tex@dinoco.gov', 'Etherum', 0, 0, '2017-11-21 19:42:56', 'text'),
(775, 'Backup_of_mn-3d.png', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 1, '2017-11-21 19:46:09', 'image'),
(776, 'Batm.jpg', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 0, '2017-11-21 19:46:16', 'image'),
(777, '91qvAndeVYL._RI_.jpg', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 1, '2017-11-21 19:47:37', 'image'),
(778, '@bTestb@', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 0, '2017-11-21 19:55:30', 'text'),
(779, '@iTesti@', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 0, '2017-11-21 19:55:39', 'text'),
(780, '@mTestm@', 'G', 1, 16, 1, 'tex@dinoco.gov', 'Bitcoin', 0, 0, '2017-11-21 19:55:51', 'text');

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
('like', 724, 'Litecoin', 5),
('like', 769, 'Etherum', 3),
('dislike', 709, 'Bitcoin', 16),
('like', 708, 'Bitcoin', 16),
('like', 707, 'Bitcoin', 16),
('dislike', 706, 'Bitcoin', 16),
('dislike', 705, 'Bitcoin', 16),
('like', 773, 'Bitcoin', 16),
('dislike', 775, 'Bitcoin', 16),
('dislike', 777, 'Bitcoin', 16);

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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

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
(21, 'Hey', '296', '3', 'Bitcoin', 0, 0, '2017-11-14 00:50:44'),
(33, 'as', '297', '1', 'Bitcoin', 0, 0, '2017-11-18 03:28:13'),
(34, 'asas', '293', '1', 'Litecoin', 0, 0, '2017-11-18 03:28:36'),
(35, 'sasasssacx', '293', '1', 'Litecoin', 0, 0, '2017-11-18 03:28:40'),
(36, 'as', '326', '1', 'Litecoin', 0, 0, '2017-11-18 07:08:44'),
(37, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '378', '1', 'Bitcoin', 0, 0, '2017-11-18 20:01:05'),
(38, 'what does <!-- mean', '378', '1', 'Bitcoin', 0, 0, '2017-11-18 20:01:47'),
(39, 'what does <!-- mean', '378', '1', 'Bitcoin', 0, 0, '2017-11-18 20:02:03'),
(40, 'what does <!-- mean', '379', '1', 'Bitcoin', 0, 0, '2017-11-18 20:02:15'),
(41, 'asd', '588', '1', 'Bitcoin', 0, 1, '2017-11-19 08:48:51'),
(42, 'ojoj', '588', '1', 'Bitcoin', 1, 0, '2017-11-19 09:02:38'),
(43, 'as', '614', '1', 'Litecoin', 0, 1, '2017-11-19 09:39:59'),
(45, 'sdfsf', '673', '1', 'Bitcoin', 1, 0, '2017-11-20 00:36:23'),
(46, 'sdfsdf', '675', '1', 'Bitcoin', 0, 1, '2017-11-20 00:36:36'),
(47, 'sdfsdf', '646', '1', 'Bitcoin', 0, 1, '2017-11-20 00:38:43'),
(55, 'asd', '617', '3', 'Etherum', 0, 0, '2017-11-21 00:30:43'),
(56, 'f', '617', '3', 'Etherum', 0, 0, '2017-11-21 00:33:50'),
(57, '&lt;!--', '617', '3', 'Etherum', 0, 0, '2017-11-21 00:33:58'),
(58, '	 what does &lt;!-- mean', '617', '3', 'Etherum', 0, 0, '2017-11-21 00:34:34'),
(59, 'Hey', '618', '3', 'Etherum', 0, 0, '2017-11-21 09:03:43');

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
('like', '54', 'Bitcoin', '16');

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
(2, 3);

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
  `image` text NOT NULL,
  `imagetype` longblob NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Use this table to store basic user information.';

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `password`, `email`, `tagname`, `usertype`, `image`, `imagetype`) VALUES
(1, 'Tow Mater', '613e1e96a09fb22d3355a47d5de06f10', 'mater@rsprings.gov', '@mater', NULL, 'towmater.jpg', 0x696d6167652f6a706567),
(2, 'Sally Carrera', 'b8bba2baae4c2a08fdff4e223458577d', 'porsche@rsprings.gov', '@sally', NULL, 'sallycarrera.png', ''),
(3, 'Doc Hudson', '9a09b4dfda82e3e665e31092d1c3ec8d', 'hornet@rsprings.gov', '@doc', NULL, 'dochudson.png', ''),
(4, 'Finn McMissile', 'fac44014029578db2b6a54533571d3c0', 'topsecret@agent.org', '@mcmissile', NULL, 'finnmcmissile.png', ''),
(5, 'Lightning McQueen', '453e032e33e9d7ce4afb71c6d9b1e082', 'kachow@rusteze.com', '@mcqueen', NULL, 'mcqueen.png', ''),
(16, 'Tex Dinoco', '5df398e7946db5ded47290cbb43c5028', 'tex@dinoco.gov', '@tex', 'superuser', 'texdinoco.png', '');

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
