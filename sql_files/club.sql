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
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `member_id` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`member_id`, `email`, `password`) VALUES
(1, 'das.madhura94@gmail.com', '$2y$10$YiEsHw4x6QNMq8rV64hcW.7HjcdLRnwOn9UKQQFiAfVUhyYRxWnti');

-- --------------------------------------------------------

--
-- Table structure for table `events_history`
--

CREATE TABLE IF NOT EXISTS `events_history` (
  `event_id` int(11) NOT NULL,
  `event_description` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horse_data`
--

CREATE TABLE IF NOT EXISTS `horse_data` (
`horse_id` int(11) NOT NULL,
  `horse_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jockey_data`
--

CREATE TABLE IF NOT EXISTS `jockey_data` (
  `jockey_id` int(11) NOT NULL DEFAULT '0',
  `jockey_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`member_id` int(11) NOT NULL,
  `ph_no` bigint(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `member_type` int(11) NOT NULL,
  `picture` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `ph_no`, `name`, `gender`, `dob`, `address`, `member_type`, `picture`) VALUES
(1, 9999999999, 'Madhura', 'F', '0000-00-00', 'White House Bangalore 560032', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `racing_history`
--

CREATE TABLE IF NOT EXISTS `racing_history` (
  `race_id` varchar(30) NOT NULL DEFAULT '',
  `race_name` varchar(30) DEFAULT NULL,
  `race_date` date DEFAULT NULL,
  `time` varchar(25) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `temperature` double NOT NULL,
  `humidity` double NOT NULL,
  `wind` double NOT NULL,
  `type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `events_history`
--
ALTER TABLE `events_history`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `horse_data`
--
ALTER TABLE `horse_data`
 ADD PRIMARY KEY (`horse_id`);

--
-- Indexes for table `jockey_data`
--
ALTER TABLE `jockey_data`
 ADD PRIMARY KEY (`jockey_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `racing_history`
--
ALTER TABLE `racing_history`
 ADD PRIMARY KEY (`race_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `horse_data`
--
ALTER TABLE `horse_data`
MODIFY `horse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
