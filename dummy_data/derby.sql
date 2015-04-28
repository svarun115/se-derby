-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2015 at 03:33 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `derby`
--

-- --------------------------------------------------------

--
-- Table structure for table `horse`
--

CREATE TABLE IF NOT EXISTS `horse` (
  `horse_name` varchar(25) NOT NULL DEFAULT '',
  `breeder` varchar(25) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `power` float DEFAULT NULL,
  `age` float DEFAULT NULL,
  `colour` varchar(25) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `mounts` int(10) DEFAULT NULL,
  `wins` int(10) DEFAULT NULL,
  `second` int(10) DEFAULT NULL,
  `third` int(10) DEFAULT NULL,
  PRIMARY KEY (`horse_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horse`
--

INSERT INTO `horse` (`horse_name`, `breeder`, `weight`, `power`, `age`, `colour`, `sex`, `mounts`, `wins`, `second`, `third`) VALUES
('Always Kitten', 'Kenneth L Ramsey & Sarah ', 117, 145.9, 5, 'bay', 'mare', 21, 3, 3, 2),
('An Imaginary Road', 'Laurence Foggle (FL)', 123, 123.8, 6, 'gray/roan', 'gelding', 18, 2, 5, 3),
('Arch Avenger', 'Claiborne Farm (KY)', 121, 131.9, 4, 'brown/dark bay', 'colt', 11, 3, 2, 1),
('Artie Crasher', 'Fred W Hertrich III (KY)', 123, 127.1, 4, 'bay', 'colt', 3, 1, 1, 0),
('Awesome Dawson', 'Michael Daly (KY)', 121, 123.4, 4, 'bay', 'gelding', 2, 1, 0, 0),
('Bitty Kitty', 'Kenneth L Ramsey & Sarah ', 117, 145.6, 5, 'chestnut', 'mare', 15, 4, 2, 0),
('Caroline Thomas', 'Bonner Young (KY)', 117, 155.9, 5, 'chestnut', 'mare', 19, 4, 2, 5),
('Day Six', 'J Bonner Young (KY)', 121, 121.7, 4, 'bay', 'gelding', 6, 1, 0, 2),
('Downey Gap', 'Eugene Melnyk (KY)', 121, 123.7, 4, 'brown/dark bay', 'gelding', 13, 1, 2, 2),
('Empire Knight', 'Dixiana Farms LLC (KY)', 121, 140.1, 5, 'brown/dark bay', 'gelding', 13, 3, 3, 0),
('Eton Blue', 'Marylou Whitney Stables L', 121, 119, 5, 'bay', 'gelding', 13, 1, 1, 3),
('Golden Rivet', 'Adena Springs (KY)', 121, 129.6, 5, 'chestnut', 'gelding', 9, 2, 1, 1),
('Irish Mission', 'Sam-Son Farm (ON)', 121, 164.5, 6, 'chestnut', 'mare', 28, 6, 6, 3),
('Kulboyz', 'Stephen Screnci (FL)', 121, 106.1, 4, 'chestnut', 'gelding', 10, 2, 0, 0),
('Lord Trondor', 'WinStar Farm LLC (KY)', 121, 129.8, 4, 'bay', 'colt', 4, 1, 0, 1),
('Los Borrachos', 'Preston Madden (KY)', 121, 130.8, 4, 'bay', 'colt', 14, 1, 4, 1),
('Market Outlook', 'Flaxman Holdings Limited ', 121, 131.6, 5, 'bay', 'horse', 3, 1, 1, 0),
('Meri Shika', 'Christine Pastor (FR)', 117, 142.3, 5, 'brown/dark bay', 'mare', 21, 2, 2, 2),
('One Step Salsa', 'Emil Hagger (FL)', 121, 110.2, 4, 'brown/dark bay', 'gelding', 1, 1, 0, 0),
('Powerful Instinct', 'Michael A Slezak &Basic I', 121, 136.6, 6, 'brown/dark bay', 'gelding', 27, 3, 1, 3),
('Riposte', 'Juddmonte Farms Ltd (GB)', 121, 157.3, 5, 'bay', 'mare', 11, 4, 3, 1),
('Roman Approval', 'Glencrest Farm LLC & Fox-', 121, 134.6, 4, 'brown/dark bay', 'colt', 17, 4, 9, 1),
('Saa Mi', 'Nesco II Ltd (KY)', 121, 132.8, 4, 'chestnut', 'colt', 10, 1, 1, 0),
('Sportscaster', 'Sanford R Robertson (KY)', 121, 126.6, 4, 'bay', 'colt', 12, 1, 1, 2),
('Street Chief', 'Darley Robert Cowley & Na', 123, 122.9, 4, 'bay', 'gelding', 14, 1, 1, 2),
('Sunset District', 'Stonestreet Thoroughbred ', 121, 128.4, 4, 'chestnut', 'gelding', 6, 1, 1, 1),
('Tabreed', 'Shadwell Estate Company L', 117, 147.9, 6, 'bay', 'mare', 17, 3, 4, 6),
('Town Extension', 'Charles Fipke (KY)', 121, 142.6, 5, 'gray/roan', 'horse', 13, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jockey`
--

CREATE TABLE IF NOT EXISTS `jockey` (
  `jockey_name` varchar(25) NOT NULL DEFAULT '',
  `mounts` int(10) DEFAULT NULL,
  `wins` int(10) DEFAULT NULL,
  `second` int(10) DEFAULT NULL,
  `third` int(10) DEFAULT NULL,
  `percent` int(10) DEFAULT NULL,
  PRIMARY KEY (`jockey_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jockey`
--

INSERT INTO `jockey` (`jockey_name`, `mounts`, `wins`, `second`, `third`, `percent`) VALUES
('Bravo Joe', 109, 5, 11, 15, 5),
('Castellano Javier', 318, 81, 60, 40, 25),
('Contreras Luis', 158, 11, 16, 11, 7),
('Lanerie Corey J', 178, 24, 19, 18, 13),
('Leparoux Julien R', 137, 16, 13, 16, 12),
('Lezcano Jose', 150, 18, 18, 13, 12),
('Lopez Paco', 298, 43, 31, 43, 14),
('Maragh Rajiv', 79, 4, 4, 7, 5),
('Ortiz, Jr. Irad', 48, 5, 7, 5, 10),
('Pino Mario G', 22, 4, 5, 4, 18),
('Prado Edgar S', 189, 20, 24, 23, 11),
('Prat Flavien', 0, 0, 0, 0, 0),
('Rosario Joel', 184, 26, 22, 33, 14),
('Saez Gabriel', 181, 15, 16, 20, 8),
('Saez Luis', 300, 47, 39, 36, 16),
('Velazquez John R', 156, 31, 20, 20, 20),
('Zayas Edgard J', 296, 40, 40, 23, 14);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `trainer_name` varchar(25) NOT NULL DEFAULT '',
  `mounts` int(10) DEFAULT NULL,
  `wins` int(10) DEFAULT NULL,
  `second` int(10) DEFAULT NULL,
  `third` int(10) DEFAULT NULL,
  `percent` int(10) DEFAULT NULL,
  PRIMARY KEY (`trainer_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_name`, `mounts`, `wins`, `second`, `third`, `percent`) VALUES
('Attfield Roger L', 150, 18, 18, 13, 12),
('Bradley William B', 181, 15, 16, 20, 8),
('Brown Chad C', 156, 31, 20, 20, 20),
('Cannizzo David A', 289, 39, 39, 22, 13),
('Carroll Josie', 48, 5, 7, 5, 10),
('Clement Christophe', 156, 31, 20, 20, 20),
('Delgado Gustavo', 296, 40, 40, 23, 14),
('Hills Timothy A', 172, 22, 17, 17, 13),
('Kenneally Eddie', 179, 25, 22, 31, 14),
('Maker Michael J', 318, 81, 60, 40, 25),
('Motion H. Graham', 0, 0, 0, 0, 0),
('Mott William I', 184, 26, 22, 33, 14),
('Pecoraro Anthony', 189, 20, 24, 23, 11),
('Pino Michael V', 22, 4, 5, 4, 18),
('Pletcher Todd A', 311, 78, 60, 40, 25),
('Romans Dale L', 178, 24, 19, 18, 13),
('Tagg Barclay', 298, 43, 31, 43, 14),
('Tarrant Amy', 158, 11, 16, 11, 7),
('Walsh Brendan P', 178, 24, 19, 18, 13),
('Wilkes Ian R', 109, 5, 11, 15, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
