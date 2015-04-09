-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2015 at 10:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
  `third` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horse`
--

INSERT INTO `horse` (`horse_name`, `breeder`, `weight`, `power`, `age`, `colour`, `sex`, `mounts`, `wins`, `second`, `third`) VALUES
('Downey Gap', 'Eugene Melnyk (KY)', 121, 123.7, 4, 'brown/dark bay', 'gelding', 13, 1, 2, 2),
('Empire Knight', 'Dixiana Farms LLC (KY)', 121, 140.1, 5, 'brown/dark bay', 'gelding', 13, 3, 3, 0),
('Eton Blue', 'Marylou Whitney Stables L', 121, 119, 5, 'bay', 'gelding', 13, 1, 1, 3),
('Golden Rivet', 'Adena Springs (KY)', 121, 129.6, 5, 'chestnut', 'gelding', 9, 2, 1, 1),
('Kulboyz', 'Stephen Screnci (FL)', 121, 106.1, 4, 'chestnut', 'gelding', 10, 2, 0, 0),
('Lord Trondor', 'WinStar Farm LLC (KY)', 121, 129.8, 4, 'bay', 'colt', 4, 1, 0, 1),
('Los Borrachos', 'Preston Madden (KY)', 121, 130.8, 4, 'bay', 'colt', 14, 1, 4, 1),
('Market Outlook', 'Flaxman Holdings Limited ', 121, 131.6, 5, 'bay', 'horse', 3, 1, 1, 0),
('Powerful Instinct', 'Michael A Slezak &Basic I', 121, 136.6, 6, 'brown/dark bay', 'gelding', 27, 3, 1, 3),
('Saa Mi', 'Nesco II Ltd (KY)', 121, 132.8, 4, 'chestnut', 'colt', 10, 1, 1, 0),
('Sportscaster', 'Sanford R Robertson (KY)', 121, 126.6, 4, 'bay', 'colt', 12, 1, 1, 2),
('Sunset District', 'Stonestreet Thoroughbred ', 121, 128.4, 4, 'chestnut', 'gelding', 6, 1, 1, 1),
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
  `percent` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jockey`
--

INSERT INTO `jockey` (`jockey_name`, `mounts`, `wins`, `second`, `third`, `percent`) VALUES
('Bravo Joe', 109, 5, 11, 15, 5),
('Castellano Javier', 318, 81, 60, 40, 25),
('Contreras Luis', 158, 11, 16, 11, 7),
('Lanerie Corey J', 178, 24, 19, 18, 13),
('Lezcano Jose', 150, 18, 18, 13, 12),
('Lopez Paco', 298, 43, 31, 43, 14),
('Ortiz, Jr. Irad', 48, 5, 7, 5, 10),
('Pino Mario G', 22, 4, 5, 4, 18),
('Prado Edgar S', 189, 20, 24, 23, 11),
('Rosario Joel', 184, 26, 22, 33, 14),
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
  `percent` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_name`, `mounts`, `wins`, `second`, `third`, `percent`) VALUES
('Brown Chad C', 0, 31, 20, 20, 20),
('Carroll Josie', 0, 5, 7, 5, 10),
('Delgado Gustavo', 0, 40, 40, 23, 14),
('Maker Michael J', 0, 81, 60, 40, 25),
('Mott William I', 0, 26, 22, 33, 14),
('Pecoraro Anthony', 0, 20, 24, 23, 11),
('Pino Michael V', 0, 4, 5, 4, 18),
('Romans Dale L', 0, 24, 19, 18, 13),
('Tagg Barclay', 0, 43, 31, 43, 14),
('Tarrant Amy', 0, 11, 16, 11, 7),
('Walsh Brendan P', 0, 24, 19, 18, 13),
('Wilkes Ian R', 0, 5, 11, 15, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `horse`
--
ALTER TABLE `horse`
 ADD PRIMARY KEY (`horse_name`);

--
-- Indexes for table `jockey`
--
ALTER TABLE `jockey`
 ADD PRIMARY KEY (`jockey_name`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
 ADD PRIMARY KEY (`trainer_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
