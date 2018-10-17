-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2018 at 05:36 AM
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
-- Database: `dbmsproject`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `updatepeople`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepeople` (IN `ppl1` INT(11), IN `oid1` INT(11))  NO SQL
UPDATE offers SET people = ppl1 where oid = oid1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(255) NOT NULL AUTO_INCREMENT,
  `ausername` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `ausername`, `apassword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 if cust cancels/1 if live/2 if ht cancels/3 if attended',
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  KEY `bid` (`bid`),
  KEY `bid_2` (`bid`),
  KEY `cid` (`cid`,`hid`),
  KEY `hid` (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `date`, `creation`, `cid`, `hid`, `time`, `discount`, `people`, `status`, `rating`) VALUES
(1, '2018/09/27', '2018-09-27 11:56:20', 18, 19, '10:30', 50, 2, 3, 3),
(4, '2018/09/27', '2018-09-27 13:17:46', 18, 19, '08:00', 10, 9, 0, 3),
(5, '2018/09/28', '2018-09-28 06:09:22', 18, 19, '08:00', 10, 8, 2, 3),
(6, '2018/09/28', '2018-09-28 12:43:14', 18, 21, '19:00', 20, 8, 0, 3),
(9, '2018/09/29', '2018-09-29 07:05:35', 18, 19, '13:00', 30, 4, 3, 3),
(10, '2018/10/01', '2018-10-01 03:35:58', 18, 19, '10:00', 30, 9, 3, 5),
(11, '2018/10/03', '2018-10-03 10:32:52', 18, 18, '18:30', 10, 5, 0, 5),
(12, '2018/10/03', '2018-10-03 10:33:09', 18, 18, '20:00', 50, 4, 3, 5),
(13, '2018/10/03', '2018-10-03 11:13:38', 18, 18, '18:30', 10, 2, 2, 5),
(14, '2018/10/03', '2018-10-03 11:13:49', 18, 18, '18:30', 10, 4, 0, 5),
(15, '2018/10/03', '2018-10-03 11:14:01', 18, 18, '18:30', 10, 9, 3, 5),
(16, '2018/10/03', '2018-10-03 11:14:49', 18, 18, '18:30', 10, 20, 3, 5),
(17, '2018/10/03', '2018-10-03 13:33:43', 18, 18, '20:00', 50, 8, 3, 5),
(18, '2018/10/03', '2018-10-03 13:33:55', 18, 18, '20:00', 50, 4, 2, 5),
(19, '2018/10/04', '2018-10-04 04:13:30', 18, 18, '18:00', 50, 2, 3, 5),
(20, '2018/08/12', '2018-10-04 04:22:21', 18, 18, '18:00', 10, 4, 3, 5),
(21, '2018/09/20', '2018-10-04 04:23:17', 18, 18, '15:30', 50, 4, 3, 5),
(22, '2018/09/09', '2018-10-04 04:24:28', 27, 18, '13:00', 10, 5, 3, 5),
(23, '2018/09/09', '2018-10-04 04:24:59', 26, 18, '15:30', 20, 5, 2, 5),
(24, '2018/10/04', '2018-10-04 11:49:57', 18, 18, '18:00', 50, 4, 3, 5),
(25, '2018/10/04', '2018-10-04 11:50:10', 18, 18, '18:30', 10, 2, 2, 5),
(26, '2018/10/04', '2018-10-04 13:13:34', 18, 18, '20:00', 50, 8, 3, 5),
(28, '2018/10/05', '2018-10-05 11:53:56', 18, 18, '18:30', 10, 8, 3, 5),
(29, '2018/10/05', '2018-10-05 11:54:08', 18, 18, '18:30', 10, 2, 3, 5),
(30, '2018/10/05', '2018-10-05 11:59:00', 18, 18, '18:30', 10, 8, 2, 5),
(31, '2018/10/05', '2018-10-05 11:59:11', 18, 18, '18:30', 10, 2, 2, 5),
(32, '2018/10/05', '2018-10-05 12:04:28', 18, 18, '18:30', 10, 4, 3, 5),
(33, '2018/10/05', '2018-10-05 12:07:23', 18, 18, '18:30', 10, 4, 2, 5),
(34, '2018/10/08', '2018-10-08 05:47:16', 18, 18, '15:00', 20, 4, 3, 5),
(35, '2018/10/08', '2018-10-08 05:53:13', 18, 18, '12:00', 30, 2, 3, 5),
(36, '2018/10/08', '2018-10-08 05:56:04', 18, 18, '12:00', 30, 4, 2, 5),
(37, '2018/10/08', '2018-10-08 06:06:59', 18, 18, '15:00', 20, 4, 3, 5),
(38, '2018/10/08', '2018-10-08 07:13:00', 18, 18, '20:00', 50, 4, 3, 5),
(39, '2018/10/09', '2018-10-09 12:12:18', 18, 18, '18:00', 50, 7, 3, 5),
(43, '2018/10/13', '2018-10-13 14:11:36', 18, 18, '20:30', 20, 4, 1, 5),
(44, '2018/10/13', '2018-10-13 14:12:37', 18, 18, '20:30', 20, 6, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `clientph`
--

DROP TABLE IF EXISTS `clientph`;
CREATE TABLE IF NOT EXISTS `clientph` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `hphno` bigint(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientph`
--

INSERT INTO `clientph` (`cid`, `hphno`) VALUES
(1, 9098765422);

-- --------------------------------------------------------

--
-- Table structure for table `clogin`
--

DROP TABLE IF EXISTS `clogin`;
CREATE TABLE IF NOT EXISTS `clogin` (
  `cphno` bigint(20) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  PRIMARY KEY (`cphno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clogin`
--

INSERT INTO `clogin` (`cphno`, `cpassword`) VALUES
(1, '1'),
(14, '1090'),
(123, '1090'),
(567, 'v'),
(121212, '1'),
(963852741, '81dc9bdb52d04dc20036dbd8313ed055'),
(7020701013, '81dc9bdb52d04dc20036dbd8313ed055'),
(7894561230, '81dc9bdb52d04dc20036dbd8313ed055'),
(9536256589, '81dc9bdb52d04dc20036dbd8313ed055'),
(9638527410, '81dc9bdb52d04dc20036dbd8313ed055'),
(9638527419, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(15) NOT NULL AUTO_INCREMENT,
  `cusername` varchar(255) NOT NULL,
  `cphno` bigint(20) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `cphno` (`cphno`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cusername`, `cphno`, `cemail`) VALUES
(18, 'adarsh', 7020701013, 'a@g.com'),
(24, 'dhoni', 123, 'dhoni@g.c'),
(25, 'hcjhdsbvh', 567, 'email'),
(26, 'Sase', 9638527410, 'eefr@ksjbds.com'),
(27, 'Aayush Virkar', 7894561230, 'aayush@gmail.com'),
(29, 'Mihir Sase', 9536256589, 'mihir@sase.com');

-- --------------------------------------------------------

--
-- Table structure for table `hlogin`
--

DROP TABLE IF EXISTS `hlogin`;
CREATE TABLE IF NOT EXISTS `hlogin` (
  `hphno` bigint(11) NOT NULL,
  `hpassword` varchar(32) NOT NULL,
  PRIMARY KEY (`hphno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hlogin`
--

INSERT INTO `hlogin` (`hphno`, `hpassword`) VALUES
(7020701013, '1234'),
(7038405403, '1234'),
(8698407745, '1234'),
(8888888888, '1234'),
(8965326598, '1234'),
(9423072162, '1234'),
(9638527410, '1234'),
(9762375482, '1234'),
(9990909090, '1234'),
(9999999999, '1234');

--
-- Triggers `hlogin`
--
DROP TRIGGER IF EXISTS `savecontact`;
DELIMITER $$
CREATE TRIGGER `savecontact` AFTER DELETE ON `hlogin` FOR EACH ROW insert into clientph(hphno) values(OLD.hphno)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `hname` varchar(25) NOT NULL,
  `hemail` varchar(50) NOT NULL,
  `hlocation` varchar(25) NOT NULL,
  `hdescription` varchar(1000) NOT NULL,
  `vegnonveg` int(11) NOT NULL DEFAULT '1',
  `haddress` varchar(1000) NOT NULL,
  `hcategory` varchar(30) NOT NULL,
  `people` int(11) DEFAULT NULL,
  `hphno` bigint(11) NOT NULL,
  `hwebsite` varchar(500) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hid`),
  KEY `hphno` (`hphno`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `hname`, `hemail`, `hlocation`, `hdescription`, `vegnonveg`, `haddress`, `hcategory`, `people`, `hphno`, `hwebsite`, `creation_time`) VALUES
(1, 'Khandeshi Darbar', 'wanianurag2@gmail.com', 'Kothrud', 'Feast brings you home to one of the finest dining experiences with a variety of savory cuisines, namely North Indian, Asian and European. Feast has upped the multi-star restaurant game with its top-notch service and ambience that is designed to enthral. While the ample variety of food will leave you full, remember to save some appetite for the desserts because they are quite the cherries on the cake!', 1, '', 'Continental', NULL, 9762375482, 'anurag@mysite.com', '2018-09-06 20:03:32'),
(14, 'Tawa Street', 'www@gcom.edu', 'Hadapsar', 'The Urban Club is a casual dining restaurant in Kalyani Nagar, serving North Indian and Continental dishes. The place has a well-lit dance floor that will make your feet move even if you’re not much of a Nach Baliye fan and their service is something beyond words. Although all the spread is awesome here, the starters are still quite a thing!', 1, '', 'Italian and French', NULL, 9990909090, 'http://99.com', '2018-09-07 14:55:10'),
(15, 'Onesta', 'www@gcom.edu', 'Swargate', 'JM Road has some really wonderful bars and restaurants hidden in its hive of buildings and complexes. However, to find Hakuna Matata, you’ll fortunately not have to go through that ordeal as it is located in the Deccan Royaale Hotel. The place has great décor and lights, which make the ambience, feel pretty blissful. If you like pasta, eat the Pasta le Pesto here.', 1, '', 'Street Food', NULL, 9423072162, 'http://99.com', '2018-09-07 14:56:37'),
(16, 'Pandora Bar', 'www@g.com', 'PMC', 'Rude Lounge has been operating since quite a while and absolutely everyone who has visited the place multiple times only speaks of how unmistakable the taste and flavor of food is—what we are trying to get at here, is the consistency with which the restaurant operates. This is one of those few places where you can even take your family once in a while and they would enjoy it too! Oriental food fans could try the Chicken in Devil Sauce. Its lovely!', 1, '', 'South Indian', NULL, 9999999999, 'http://99.com', '2018-09-07 14:58:18'),
(17, 'CAFE PETER', 'adarsh@gmail.com', 'Pimpri', 'JM Road has some really wonderful bars and restaurants hidden in its hive of buildings and complexes. However, to find Hakuna Matata, you’ll fortunately not have to go through that ordeal as it is located in the Deccan Royaale Hotel. The place has great décor and lights, which make the ambience, feel pretty blissful. If you like pasta, eat the Pasta le Pesto here.', 1, '', 'South Indian', NULL, 8888888888, 'http://ass.com', '2018-09-09 19:35:53'),
(18, 'Hayyat', 'hayyat@hayyat.com', 'Hinjewadi', 'The Hayyat is a casual dining restaurant in Kalyani Nagar, serving North Indian and Continental dishes. The place has a well-lit dance floor that will make your feet move even if you\'re not much of a Nach Baliye fan and their service is something beyond words. Although all the spread is awesome here, the starters are still quite a thing!', 1, 'Near Mumbai Pune Express Way', 'Italian and French', 80, 7038405403, 'http://www.h.com', '2018-09-15 11:15:28'),
(19, 'Tea Villa Cafe', 'admin@gmail.com', 'Deccan', 'The Space Pub at Kharadi, is no late-night greasepit. It’s a bar and a none-too-serious party diner. With North Indian, Italian, Continental, Burger, Desserts, Finger Food, Pizza, Asian, it sure is a game changer. The live entertainment and popping nightlife as every bit the inspiration to go out and let your hair loose.', 1, 'saS', 'Bakery', NULL, 7020701013, 'http://asaS', '2018-09-15 11:18:33'),
(20, 'Dominos', 'domins@dominos.in', 'Kothrud', 'Rude Lounge has been operating since quite a while and absolutely everyone who has visited the place multiple times only speaks of how unmistakable the taste and flavor of food is—what we are trying to get at here, is the consistency with which the restaurant operates. This is one of those few places where you can even take your family once in a while and they would enjoy it too! Oriental food fans could try the Chicken in Devil Sauce. It’s lovely!', 0, 'near kothrud depo', 'Pizzas and Cafeteria', NULL, 8965326598, 'www.dominos.in', '2018-09-20 06:22:26'),
(21, 'Richie Rich', 'hvdsvh@ksbvk.jdscb', 'Kothrud', 'The Urban Club is a casual dining restaurant in Kalyani Nagar, serving North Indian and Continental dishes. The place has a well-lit dance floor that will make your feet move even if you’re not much of a Nach Baliye fan and their service is something beyond words. Although all the spread is awesome here, the starters are still quite a thing!', 1, 'Near MIT College', 'Coffee and Beverages', NULL, 9638527410, 'https://www.richierich.com', '2018-09-22 07:48:45'),
(22, 'Palvi', 'palvi@gmail.com', 'Kothrud', 'Best in Kothrud', 1, 'Near Durga Cafe', 'Sab Milata', NULL, 8698407745, 'https://www.palvi.com', '2018-09-26 06:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `hotelbackup`
--

DROP TABLE IF EXISTS `hotelbackup`;
CREATE TABLE IF NOT EXISTS `hotelbackup` (
  `hid` int(11) NOT NULL,
  `hname` varchar(25) NOT NULL,
  `hemail` varchar(50) NOT NULL,
  `hlocation` varchar(25) NOT NULL,
  `hdescription` varchar(1000) NOT NULL,
  `vegnonveg` int(11) NOT NULL DEFAULT '1',
  `haddress` varchar(1000) NOT NULL,
  `hcategory` varchar(30) NOT NULL,
  `people` int(11) DEFAULT NULL,
  `hphno` bigint(11) NOT NULL,
  `hwebsite` varchar(500) NOT NULL,
  `creation_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hoteltime`
--

DROP TABLE IF EXISTS `hoteltime`;
CREATE TABLE IF NOT EXISTS `hoteltime` (
  `hid` int(11) NOT NULL COMMENT 'will be foreign key',
  `day` int(11) NOT NULL COMMENT '1 to 7',
  `status` int(11) NOT NULL COMMENT '0 or 1',
  `stime` varchar(255) DEFAULT NULL COMMENT 'hh:mm',
  `etime` varchar(255) DEFAULT NULL COMMENT 'hh:mm',
  PRIMARY KEY (`hid`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoteltime`
--

INSERT INTO `hoteltime` (`hid`, `day`, `status`, `stime`, `etime`) VALUES
(18, 1, 0, '', ''),
(18, 2, 1, '09:00', '22:00'),
(18, 3, 1, '08:00', '21:00'),
(18, 4, 1, '09:00', '21:00'),
(18, 5, 1, '07:00', '21:00'),
(18, 6, 1, '12:00', '21:00'),
(18, 7, 1, '09:00', '00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  PRIMARY KEY (`iid`),
  KEY `hid` (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`iid`, `hid`, `imagename`) VALUES
(1, 18, '18.jpeg'),
(2, 18, '18.jpeg'),
(3, 18, '18.jpeg'),
(4, 18, '18.jpeg'),
(5, 18, '18.jpeg'),
(6, 18, '18.jpeg'),
(7, 18, '18.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `people` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `hid` (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`oid`, `hid`, `time`, `discount`, `people`) VALUES
(16, 19, '10:00', 30, 60),
(17, 19, '12:00', 10, 60),
(18, 19, '15:00', 50, 70),
(19, 19, '08:00', 10, 60),
(20, 19, '04:00', 30, 60),
(21, 19, '02:00', 50, 60),
(22, 19, '10:30', 50, 60),
(23, 18, '23:00', 10, 80),
(25, 22, '10:00', 100, 60),
(26, 22, '03:30', 10, 60),
(27, 22, '12:00', 20, 60),
(28, 19, '13:00', 30, 56),
(29, 19, '14:00', 50, 60),
(30, 21, '21:00', 30, 60),
(31, 21, '20:00', 10, 60),
(32, 21, '19:00', 20, 52),
(33, 18, '21:00', 20, 70),
(34, 18, '18:30', 10, 80),
(36, 18, '20:00', 50, 76),
(40, 18, '18:00', 50, 80),
(42, 18, '20:30', 20, 70),
(46, 18, '12:00', 30, 80),
(47, 18, '22:30', 10, 80);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cphno`) REFERENCES `clogin` (`cphno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`hphno`) REFERENCES `hlogin` (`hphno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoteltime`
--
ALTER TABLE `hoteltime`
  ADD CONSTRAINT `hoteltime_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
