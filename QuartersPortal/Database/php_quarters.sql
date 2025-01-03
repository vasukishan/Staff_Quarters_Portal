-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2024 at 06:44 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_quarters`
--
CREATE DATABASE IF NOT EXISTS `php_quarters` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_quarters`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `roomno` varchar(20) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `catname` varchar(300) NOT NULL,
  `atime` varchar(100) NOT NULL,
  `descr` varchar(2000) NOT NULL,
  `cstatus` varchar(50) NOT NULL DEFAULT 'InProgress',
  `cremarks` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `dt`, `roomno`, `userid`, `mobile`, `catname`, `atime`, `descr`, `cstatus`, `cremarks`) VALUES
(1, '2024-12-30', 'Q1000', 'ram@gmail.com', '9845389432', 'Plumbing', '08:00 to 09:00 AM', 'Tap not working', 'Rejected', 'Staff in leave');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ename` varchar(200) NOT NULL,
  `age` varchar(10) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ename`, `age`, `dept`, `desig`, `gender`, `mobile`, `stype`, `doj`, `userid`, `pwd`) VALUES
('Ram Kumar', '45', 'B.E.CS', 'Lecturer', 'Male', '9845389432', 'teaching', '2010-01-11', 'ram@gmail.com', 'r'),
('Samuel', '50', 'B.Tech IT', 'Senior Lecturer', 'Male', '8899849489', 'teaching', '2005-01-11', 'sam@gmail.com', 's'),
('Shanmugam', '39', 'B.E.Civil', 'Lecturer', 'Male', '9898293483', 'teaching', '2020-01-01', 'shanmugam@gmail.com', 's');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomno` varchar(50) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `purpose` varchar(1000) NOT NULL,
  `intime` varchar(100) NOT NULL,
  `outtime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `roomno`, `gname`, `purpose`, `intime`, `outtime`) VALUES
(2, 'Q1000', 'Vimal', 'Personal', '2024-12-31 10:14 am', '2024-12-31 12:04 pm');

-- --------------------------------------------------------

--
-- Table structure for table `quarters`
--

CREATE TABLE IF NOT EXISTS `quarters` (
  `rname` varchar(100) NOT NULL,
  PRIMARY KEY (`rname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quarters`
--

INSERT INTO `quarters` (`rname`) VALUES
('Q1000'),
('Q1001'),
('Q1002');

-- --------------------------------------------------------

--
-- Table structure for table `roomallot`
--

CREATE TABLE IF NOT EXISTS `roomallot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `userid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roomallot`
--

INSERT INTO `roomallot` (`id`, `dt`, `roomno`, `userid`) VALUES
(1, '2024-12-28', 'Q1000', 'ram@gmail.com'),
(3, '2024-12-28', 'Q1000', 'sam@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
