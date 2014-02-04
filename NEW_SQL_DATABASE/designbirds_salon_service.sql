-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2014 at 08:30 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `commentmng`
--

INSERT INTO `commentmng` (`id`, `type`, `comment`, `service`) VALUES
(1, 'test12', 'test comment testing', 'vfrvvverv dukwhdwqad');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `imageupload`
--

INSERT INTO `imageupload` (`id`, `name`, `category`, `description`, `alt`) VALUES
(1, 'ffer', 'bfbfd', 'parrot', ''),
(2, 'ac', 'dasdad', 'dsfsdfsad', ''),
(3, 'acsdsadasdsad', 'dsffdsfasaas', 'dsfsdfsad', ''),
(4, 'ac324', 'fdef', 'dsfsdfsad', ''),
(5, 'dwe32', 'feew', 'rtrhwsg', ''),
(6, 'chew1234', 'dfrthrhthrtrth', '0112fergr', ''),
(7, '4gg', 'g4242 wekj', 'g23 keufhewkdiqwdf', ''),
(8, '4gg', 'g4242', 'g23', ''),
(9, '4gg', 'g4242', 'g23', ''),
(10, '4gg', 'g4242', 'g23', ''),
(11, '4gg', 'g4242', 'g23', ''),
(12, '4gg', 'g4242', 'g23', ''),
(13, '4gg', 'g4242', 'g23', ''),
(14, 'hui', 'jio', 'njdejnwfnjw', ''),
(15, 'hui', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_main_categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_main_categories`
--

INSERT INTO `tbl_main_categories` (`id`, `type_id`, `name`, `description`) VALUES
(1, 1, 'large image', ''),
(2, 1, 'small image', ''),
(3, 2, 'company logo', 'company related logo'),
(4, 2, 'service logo', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_features`
--

CREATE TABLE IF NOT EXISTS `tbl_main_features` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_main_features`
--

INSERT INTO `tbl_main_features` (`id`, `name`, `description`) VALUES
(1, 'Header Banner', 'Header Banner related info'),
(2, 'Services', 'Services Related info');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_hairdressing`
--

CREATE TABLE IF NOT EXISTS `tbl_main_hairdressing` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `service_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_service`
--

CREATE TABLE IF NOT EXISTS `tbl_main_service` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `feature_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_types`
--

CREATE TABLE IF NOT EXISTS `tbl_main_types` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `feature_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_main_types`
--

INSERT INTO `tbl_main_types` (`id`, `feature_id`, `name`, `description`) VALUES
(1, 1, 'header banner ', ''),
(2, 1, 'header logo', ''),
(3, 2, 'Hair dressing', 'Main hair dressing styles'),
(4, 2, 'Facials', 'Main service facials ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
