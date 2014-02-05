-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2014 at 08:00 AM
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
-- Table structure for table `tbl_comment_mgnt`
--

CREATE TABLE IF NOT EXISTS `tbl_comment_mgnt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `comment` text NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_comment_mgnt`
--

INSERT INTO `tbl_comment_mgnt` (`id`, `type`, `comment`, `service`) VALUES
(1, 'test12', 'test comment', 'vfrvvverv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_upload`
--

CREATE TABLE IF NOT EXISTS `tbl_image_upload` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `alt` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_image_upload`
--

INSERT INTO `tbl_image_upload` (`id`, `name`, `category`, `description`, `alt`) VALUES
(1, 'ffer', 'bfbfd', 'parrot', ''),
(2, 'ac', 'dasdad', 'dsfsdfsad', ''),
(3, 'acsdsadasdsad', 'dsffdsfasaas', 'dsfsdfsad', ''),
(4, 'ac324', 'fdef', 'dsfsdfsad', ''),
(5, 'dwe32', 'feew', 'rtrhwsg', ''),
(6, 'chew1234', 'dfrthrhthrtrth', '0112fergr', ''),
(7, 'rty', 'fwfe', 'fwfe', ''),
(8, 'tan', 'gregr', 'ergegeg', ''),
(9, 'image', 'image', 'image', ''),
(10, 'image', 'image', 'image', ''),
(11, 'image', 'image', 'image', ''),
(12, 'image44', 'image', 'image', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_features`
--

CREATE TABLE IF NOT EXISTS `tbl_main_features` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_main_features`
--

INSERT INTO `tbl_main_features` (`id`, `name`, `description`) VALUES
(1, 'Header', 'Header Banner related info'),
(2, 'Services', 'Services Related info'),
(4, 'Events', 'Events managment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_hair_dress`
--

CREATE TABLE IF NOT EXISTS `tbl_main_hair_dress` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `service_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_main_hair_dress`
--

INSERT INTO `tbl_main_hair_dress` (`id`, `name`, `service_id`) VALUES
(1, 'Mens hair cut', 2),
(2, 'Ladies hair cut', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_services`
--

CREATE TABLE IF NOT EXISTS `tbl_main_services` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_main_services`
--

INSERT INTO `tbl_main_services` (`id`, `name`, `description`, `status`) VALUES
(13, 'Hairdress', 'Various Hair dresses  ', 'active'),
(14, 'Spray Tan', 'Spray Tan', 'active'),
(15, 'Waxing and Threading', 'Waxing and Threading', 'active'),
(16, 'Tint', 'Tint Service', 'active'),
(17, 'Facials & Makeups', 'Facials & Makeups Service', 'active'),
(18, 'Manicure', 'Manicure Service', 'active'),
(19, 'Pedicure', 'Pedicure Service', 'active'),
(20, 'Massage', 'Massage Service', 'active'),
(21, 'Bridal Dressing', 'Bridal Dressing Service', 'active');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_service_categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `service_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `tbl_service_categories`
--

INSERT INTO `tbl_service_categories` (`id`, `name`, `description`, `service_id`) VALUES
(56, 'Men''s Haircuts', 'Awesome Men''s Haircuts', 13),
(57, 'Ladies'' Haircuts', 'Awesome Ladies'' Haircuts', 13),
(58, 'Children''s Haircut', 'Awesome Children''s Haircut', 13),
(59, 'Cut & Shampoo', 'Cut & Shampoo From $15', 13),
(60, 'Hair Treatments', 'Hair Treatments ', 13),
(61, 'Full Color', 'Full Color (Short, Medium, Long)', 13),
(62, 'Regrowth', 'Regrowth ', 13);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
