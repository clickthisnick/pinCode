-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2015 at 07:26 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pinCode`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attemptid` char(36) NOT NULL,
  `image` char(36) NOT NULL,
  `code` varchar(50) NOT NULL,
  `timefirstentered` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageid` char(36) NOT NULL,
  `imageurl` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `imageid`, `imageurl`) VALUES
(1, '136e74a9-619b-11e5-b607-04014aabd801', 'http://localhost/images/dog.jpg'),
(2, '2b775b7d-619e-11e5-b607-04014aabd801', 'http://localhost/images/oranges.jpg'),
(3, '5f765e7d-619e-11e5-b607-04216aabd101', 'http://localhost/images/flower.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginid` char(36) NOT NULL,
  `image` char(36) NOT NULL,
  `code` varchar(50) NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `loginid`, `image`, `code`, `user`) VALUES
(1, '194884df-6536-11e5-b607-04014aabd801', '136e74a9-619b-11e5-b607-04014aabd801', '111', 'Dog'),
(2, '3e2de45b-80f8-11e5-aaf9-04014aabd801', '5f765e7d-619e-11e5-b607-04216aabd101', '123', 'Flower');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
