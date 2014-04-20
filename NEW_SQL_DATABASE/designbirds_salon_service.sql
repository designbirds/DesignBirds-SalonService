-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2014 at 04:08 AM
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
-- Table structure for table `tbl_banner_design`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_design` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `member_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_customers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(25) NOT NULL,
  `mobile_no` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_booking_customers`
--

INSERT INTO `tbl_booking_customers` (`id`, `first_name`, `last_name`, `address`, `email`, `phone_no`, `mobile_no`) VALUES
(29, 'chirath', 'efwe', 'egewgwew', 'nikericky132456@gmail.com', 342434, 3433343),
(30, 'cecuwe', 'egewhgew', 'wehewew', 'nikericky1324567@gmail.com', 6632432, 3523523);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousal_design`
--

CREATE TABLE IF NOT EXISTS `tbl_carousal_design` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `member_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_carousal_design`
--

INSERT INTO `tbl_carousal_design` (`id`, `name`, `member_id`, `client_id`) VALUES
(3, 'banner-1395537072.png', 12, 1),
(4, 'banner-1395537089.png', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment_mgnt`
--

CREATE TABLE IF NOT EXISTS `tbl_comment_mgnt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_comment_mgnt`
--

INSERT INTO `tbl_comment_mgnt` (`id`, `comment`, `email`, `status`) VALUES
(3, 'Hay it works', 'vsdvsdvs@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confirm_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_confirm_booking` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `employ_id` int(100) NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `fixed_price` int(100) NOT NULL,
  `confirm_price` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_confirm_booking`
--

INSERT INTO `tbl_confirm_booking` (`id`, `employ_id`, `service_id`, `category_id`, `start_time`, `end_time`, `fixed_price`, `confirm_price`, `customer_id`, `status`) VALUES
(4, 1, 13, 56, '2014-03-01 14:00:00', '2014-03-01 15:00:00', 0, 20, 29, 1),
(25, 5, 13, 56, '2014-04-17 15:00:00', '2014-04-17 16:00:00', 12, 15, 29, 1),
(26, 5, 13, 56, '2014-04-17 18:00:00', '2014-04-17 19:00:00', 12, 20, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_details`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `imageupload_status` tinyint(1) NOT NULL,
  `image_name` text NOT NULL,
  `event_status` tinyint(1) NOT NULL,
  `comment_status` tinyint(1) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_customer_details`
--

INSERT INTO `tbl_customer_details` (`id`, `first_name`, `last_name`, `address`, `email`, `phone_no`, `mobile_no`, `imageupload_status`, `image_name`, `event_status`, `comment_status`, `member_id`) VALUES
(10, 'bunny', 'hjsbse', 'dvdvd', 'nikericky1@gmail.com', '212552', '554151', 1, 'service-1397712531.png', 1, 1, 12),
(13, 'nikeri', 'ckyu', 'gwege', 'vsdvsdvs@gmail.com', '12625', '616511', 1, 'service-1397712598.png', 1, 1, 12),
(16, 'chirath', 'efwe', 'egewgwew', 'nikericky132456@gmail.com', '342434', '3433343', 0, '', 0, 0, 0),
(17, 'cecuwe', 'egewhgew', 'wehewew', 'nikericky1324567@gmail.com', '6632432', '3523523', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo_design`
--

CREATE TABLE IF NOT EXISTS `tbl_logo_design` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `member_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_logo_design`
--

INSERT INTO `tbl_logo_design` (`id`, `name`, `member_id`, `client_id`) VALUES
(0, 'logo-1394773731.png', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_client_details`
--

CREATE TABLE IF NOT EXISTS `tbl_main_client_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `telephone` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_main_client_details`
--

INSERT INTO `tbl_main_client_details` (`id`, `first_name`, `last_name`, `address`, `telephone`, `email`, `member_id`) VALUES
(1, 'odel', 'salon', 'wefweewwvg', 515151, 'ghh@gmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_employ_details`
--

CREATE TABLE IF NOT EXISTS `tbl_main_employ_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(30) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_main_employ_details`
--

INSERT INTO `tbl_main_employ_details` (`id`, `first_name`, `last_name`, `address`, `email`, `telephone`, `member_id`) VALUES
(1, 'efefe', 'revrevr', 'vevervrevrev', 'chirathdevinda@gmail.com', 5511551, 12),
(5, 'wqfdewf', 'ewfewfwe', 'weerfgewr', 'lvchirathdevinda@gmail.com', 4125, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_features`
--

CREATE TABLE IF NOT EXISTS `tbl_main_features` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_main_features`
--

INSERT INTO `tbl_main_features` (`id`, `name`, `description`, `member_id`) VALUES
(2, 'Services', 'Services Related info', 0),
(4, 'Events', 'Events managment', 0),
(7, 'effwef', 'fefefe', 0),
(8, 'effwef', 'fefefe', 0),
(9, 'fwefw', 'efef', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_hair_dress`
--

CREATE TABLE IF NOT EXISTS `tbl_main_hair_dress` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `service_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_main_hair_dress`
--

INSERT INTO `tbl_main_hair_dress` (`id`, `name`, `service_id`, `member_id`) VALUES
(1, 'Mens hair cut', 2, 0),
(2, 'Ladies hair cut', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_membership`
--

CREATE TABLE IF NOT EXISTS `tbl_main_membership` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `telephone` int(20) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_type_id` int(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `client_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_main_membership`
--

INSERT INTO `tbl_main_membership` (`id`, `first_name`, `last_name`, `telephone`, `user_name`, `user_type_id`, `password`, `email`, `client_id`) VALUES
(3, 'hall', 'efwefefw', 145285857, 'devi', 3, '0a740cd12e445f4e9557cf45f4e5e21f', 'weffwe@gmail.com', 1),
(7, 'example', 'example', 120, 'nike', 3, '41fd220f05ed0d8c56e3b83af87d45d7', 'example@example.com', 1),
(11, 'man', 'nam', 14525, 'man', 0, '36f17c3939ac3e7b2fc9396fa8e953ea', 'man@gmail.com', 1),
(12, 'super', 'man', 6544514, 'admin', 2, '21232f297a57a5a743894a0e4a801fc3', 'nikericky@gmail.com', 1),
(13, 'mike', 'anderson', 556445, 'mike', 0, '36f17c3939ac3e7b2fc9396fa8e953ea', 'mike@gmail.com', 1),
(14, 'tan', 'tana', 52102, 'tan', 0, '56928064f24d58105a3df097df864078', 'tan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_roll_assign`
--

CREATE TABLE IF NOT EXISTS `tbl_main_roll_assign` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `member_id` int(100) NOT NULL,
  `screen_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_main_roll_assign`
--

INSERT INTO `tbl_main_roll_assign` (`id`, `member_id`, `screen_id`, `status`) VALUES
(1, 12, 9, 1),
(12, 12, 10, 1),
(23, 13, 5, 0),
(24, 11, 2, 1),
(25, 12, 2, 1),
(26, 12, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_screens`
--

CREATE TABLE IF NOT EXISTS `tbl_main_screens` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_main_screens`
--

INSERT INTO `tbl_main_screens` (`id`, `name`) VALUES
(1, 'Image Upload'),
(2, 'Content Management'),
(3, 'Event Management'),
(4, 'Comment Management'),
(5, 'Features'),
(6, 'Service List'),
(7, 'Service Category'),
(8, 'Service Price'),
(9, 'Customer Details'),
(10, 'User Rolls'),
(11, 'Time Allocation'),
(12, 'Logo'),
(13, 'Banner');

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
-- Table structure for table `tbl_recent_images`
--

CREATE TABLE IF NOT EXISTS `tbl_recent_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `alt` text NOT NULL,
  `member_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_recent_images`
--

INSERT INTO `tbl_recent_images` (`id`, `name`, `service_id`, `category_id`, `description`, `alt`, `member_id`, `client_id`) VALUES
(2, 'recent-1396178743.png', 13, 56, 'efewwv', 'fewfwfe', 12, 1),
(3, 'recent-1396179032.png', 14, 64, 'qefwqf', 'fewfewf', 12, 1),
(4, 'recent-1396179366.png', 13, 56, 'wewwefgg', 'g4g', 12, 1),
(5, 'recent-1396179403.png', 14, 64, 'wewwefggqwfwf', 'fwefqfe', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_service_categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `service_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbl_service_categories`
--

INSERT INTO `tbl_service_categories` (`id`, `name`, `description`, `service_id`, `member_id`) VALUES
(56, 'Men''s Haircuts', 'Awesome Men''s Haircuts', 13, 0),
(57, 'Ladies'' Haircuts', 'Awesome Ladies'' Haircuts', 13, 0),
(58, 'Children''s Haircut', 'Awesome Children''s Haircut', 13, 0),
(59, 'Cut & Shampoo', 'Cut & Shampoo From $15', 13, 0),
(60, 'Hair Treatments', 'Hair Treatments ', 13, 0),
(61, 'Full Color', 'Full Color (Short, Medium, Long)', 13, 0),
(62, 'Regrowth', 'Regrowth ', 13, 0),
(64, 'Spray Tan', 'Spray Tan', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_content`
--

CREATE TABLE IF NOT EXISTS `tbl_service_content` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `small_content` text NOT NULL,
  `large_content` text NOT NULL,
  `image_content` text NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_service_content`
--

INSERT INTO `tbl_service_content` (`id`, `small_content`, `large_content`, `image_content`, `service_id`, `category_id`, `status`, `member_id`) VALUES
(3, 'fwefwefwef\r\newgwegwe', 'geg\r\neg\r\newg\r\nwg\r\newgwgwg', 'weggewgwegewgwe\r\ngwgwegewgwegwe\r\negwegewgwgwewg', 13, 59, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_events`
--

CREATE TABLE IF NOT EXISTS `tbl_service_events` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `offer_price` int(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `phone_status` tinyint(1) NOT NULL,
  `email_status` tinyint(1) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_service_events`
--

INSERT INTO `tbl_service_events` (`id`, `name`, `description`, `service_id`, `category_id`, `offer_price`, `start_time`, `end_time`, `status`, `phone_status`, `email_status`, `member_id`) VALUES
(1, 'offerd-rtg', 'fwefewf', 0, 0, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 0),
(4, 'lazy beezy', 'wfwef', 13, 58, 10, '2014-02-19 11:00:00', '2014-02-19 16:00:00', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_images`
--

CREATE TABLE IF NOT EXISTS `tbl_service_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `alt` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `priority` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_service_images`
--

INSERT INTO `tbl_service_images` (`id`, `name`, `service_id`, `category_id`, `description`, `alt`, `member_id`, `client_id`, `priority`) VALUES
(38, 'service-1395317165.png', 13, 57, 'wweffwe', 'efwefew', 12, 1, 0),
(39, 'service-1395317188.png', 14, 64, 'gtrwweffwe', 'cfwewwe', 12, 1, 0),
(40, 'service-1395317212.png', 13, 58, '4tg', 'ceccvv', 12, 1, 0),
(41, 'service-1395317259.png', 13, 58, 'vwsvvr', 'dveww', 12, 1, 0),
(42, 'service-1396107867.png', 13, 57, 'dfwfwe', 'b nh', 12, 1, 0),
(43, 'service-1396109868.png', 13, 59, 'aveve', 'ddw', 12, 1, 1),
(45, 'service-1396110506.png', 13, 57, 'sdadas', '', 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_price`
--

CREATE TABLE IF NOT EXISTS `tbl_service_price` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `price` int(50) NOT NULL,
  `description` text NOT NULL,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_service_price`
--

INSERT INTO `tbl_service_price` (`id`, `price`, `description`, `service_id`, `category_id`, `discount`, `member_id`) VALUES
(1, 12, 'fewfwfe', 13, 56, 10, 12),
(3, 20, 'ewfwkwfw', 13, 0, 10, 0),
(4, 623, 'egfewgwgwe', 13, 0, 12, 0),
(5, 125, '1255', 0, 0, 12, 0),
(6, 1252, 'dgweew', 13, 0, 12, 0),
(7, 122, '122', 14, 0, 0, 0),
(8, 365, '365', 14, 0, 45, 0),
(9, 45, '55', 13, 0, 0, 0),
(10, 122, '121', 14, 64, 0, 0),
(11, 10, '123', 0, 0, 0, 0),
(12, 125, '1225', 13, 59, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_types`
--

CREATE TABLE IF NOT EXISTS `tbl_service_types` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `member_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_service_types`
--

INSERT INTO `tbl_service_types` (`id`, `name`, `description`, `status`, `member_id`) VALUES
(13, 'Hairdress', 'Various Hair dresses  ', 'active', 0),
(14, 'Spray Tan', 'Spray Tan', 'active', 0),
(15, 'Waxing and Threading', 'Waxing and Threading', 'active', 0),
(16, 'Tint', 'Tint Service', 'active', 0),
(17, 'Facials & Makeups', 'Facials & Makeups Service', 'active', 0),
(18, 'Manicure', 'Manicure Service', 'active', 0),
(19, 'Pedicure', 'Pedicure Service', 'active', 0),
(20, 'Massage', 'Massage Service', 'active', 0),
(21, 'Bridal Dressing', 'Bridal Dressing Service', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial_mgnt`
--

CREATE TABLE IF NOT EXISTS `tbl_testimonial_mgnt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `testimonial` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_testimonial_mgnt`
--

INSERT INTO `tbl_testimonial_mgnt` (`id`, `testimonial`, `email`, `status`) VALUES
(1, 'savsdavegvesagbewgbewewewgewgewgew', 'nikericky1@gmail.com', 1),
(2, 'vrverwbvrbwebr Works', 'nikericky1@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_allocation`
--

CREATE TABLE IF NOT EXISTS `tbl_time_allocation` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `employ_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_time_allocation`
--

INSERT INTO `tbl_time_allocation` (`id`, `service_id`, `category_id`, `start_time`, `end_time`, `employ_id`, `member_id`, `status`) VALUES
(8, 13, 56, '2014-04-17 18:00:00', '2014-04-17 19:00:00', 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tmp_booking_details`
--

CREATE TABLE IF NOT EXISTS `tbl_tmp_booking_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `service_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `employ_id` int(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `fixed_price` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
