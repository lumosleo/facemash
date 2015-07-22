-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2014 at 11:06 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imagerank`
--
CREATE DATABASE IF NOT EXISTS `imagerank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `imagerank`;

-- --------------------------------------------------------

--
-- Table structure for table `imagename`
--

CREATE TABLE IF NOT EXISTS `imagename` (
  `imgno` int(11) NOT NULL,
  `imgname` varchar(100) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  PRIMARY KEY (`imgno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagename`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
