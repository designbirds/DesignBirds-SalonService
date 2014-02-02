-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2014 at 07:55 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `designbirds_salon_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentmng`
--

CREATE TABLE IF NOT EXISTS `commentmng` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `comment` text NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `commentmng`
--

INSERT INTO `commentmng` (`id`, `type`, `comment`, `service`) VALUES
(1, 'test12', 'test comment', 'vfrvvverv');

-- --------------------------------------------------------

--
-- Table structure for table `imageupload`
--

CREATE TABLE IF NOT EXISTS `imageupload` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `alt` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `imageupload`
--

INSERT INTO `imageupload` (`id`, `name`, `category`, `description`, `alt`) VALUES
(1, 'ffer', 'bfbfd', 'parrot', ''),
(2, 'ac', 'dasdad', 'dsfsdfsad', ''),
(3, 'acsdsadasdsad', 'dsffdsfasaas', 'dsfsdfsad', ''),
(4, 'ac324', 'fdef', 'dsfsdfsad', ''),
(5, 'dwe32', 'feew', 'rtrhwsg', ''),
(6, 'chew1234', 'dfrthrhthrtrth', '0112fergr', '');

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

CREATE TABLE IF NOT EXISTS `image_category` (
  `id` int(10) NOT NULL,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
