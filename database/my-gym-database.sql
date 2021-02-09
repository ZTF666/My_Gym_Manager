-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 06:13 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my-gym-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `cnie_admin` varchar(8) NOT NULL,
  `phone` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `cnie_admin` (`cnie_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `cnie_admin`, `phone`, `fullname`, `bdate`, `pwd`, `picture`) VALUES
(1, 'z@tf.jp', 55555512, 'Iron Ghost Skull', '1993-02-02', 'xcfv', 'vue.png');

-- --------------------------------------------------------

--
-- Table structure for table `inactive_members`
--

CREATE TABLE IF NOT EXISTS `inactive_members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `cnie_member` varchar(8) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `bdate` date NOT NULL,
  `jdate` date NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `cnie_member` (`cnie_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `cnie_member` varchar(8) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `bdate` date NOT NULL,
  `jdate` date NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `cnie_member` (`cnie_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `cnie_member`, `phone`, `fname`, `lname`, `bdate`, `jdate`, `picture`) VALUES
(11, 'TEST1234', '123456789', 'Tester', 'Test-Man', '1993-01-01', '2021-01-01', 'gg.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `cnie_admin` varchar(8) DEFAULT NULL,
  `cnie_member` varchar(8) NOT NULL,
  `month` varchar(15) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_payment`, `cnie_admin`, `cnie_member`, `month`, `amount`, `notes`) VALUES
(11, 'z@tf.jp', 'TEST1234', 'january', '250', 'Subscription & insurance payed .');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
