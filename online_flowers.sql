-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2013 at 11:50 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_flowers`
--
CREATE DATABASE IF NOT EXISTS `online_flowers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `online_flowers`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE IF NOT EXISTS `tbl_ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`ads_id`, `name`, `url`, `image`, `date_start`, `date_end`, `content`) VALUES
(55, 'demo', 'demo', 'templates/admin/images/Penguins.jpg', '2013-11-03', '2013-11-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `name`, `parent_id`) VALUES
(12, 'Dá»‹p Táº·ng Hoa', 0),
(13, 'Hoa cÆ°á»›i', 15),
(14, 'Äiá»‡n hoa sinh nháº­t', 12),
(15, 'Hoa Theo Chá»§ Äá»', 0),
(16, 'Hoa bÃ³', 15),
(17, 'Äiá»‡n hoa tÃ¬nh yÃªu', 12),
(18, 'Ká»‡ hoa khai trÆ°Æ¡ng', 12),
(19, 'Ká»‡ hoa chia buá»“n', 12),
(20, 'Hoa sá»± kiá»‡n', 15),
(21, 'Hoa Ä‘á»ƒ bÃ n', 15),
(22, 'Hoa Ä‘á»ƒ bÃ n', 15),
(23, 'Hoa Ä‘á»ƒ bÃ n', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `post_date` date NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `resetkey` varchar(150) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `title`, `email`, `password`, `phone`, `address`, `gender`, `dob`, `avatar`, `active`, `resetkey`, `first_name`, `last_name`, `post_date`) VALUES
(2, '', 'admin@gmail.com', '77bd8f2aa2a43f92d8c2a0f26db5672f', '0979156591', '1A Yet Kieu', 1, '2013-11-06', '0', 1, '', 'Loan', 'Ta Bich', '2013-11-19 00:00:00'),
(12, '', 'nus3399@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '09999999999', 'fsfsfs', 0, '0000-00-00', '', 1, '', 'sfsfsf', 'fsfsfsf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(300) DEFAULT NULL,
  `news_content` longtext,
  `news_start_date` date DEFAULT NULL,
  `news_end_date` date DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_del_flag` tinyint(4) DEFAULT '0',
  `news_active_flag` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `name_recipient` varchar(200) NOT NULL,
  `address_recipient` varchar(200) NOT NULL,
  `requirement` text NOT NULL,
  `email_recipient` varchar(200) DEFAULT NULL,
  `phone_recipient` int(20) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`order_id`,`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_method`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_method` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `thumb` varchar(300) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `description` longtext,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `name`, `thumb`, `cat_id`, `description`, `price`, `status`, `post_date`) VALUES
(1, 'Sp A', NULL, 0, NULL, 12, 0, '2013-11-13 00:00:00'),
(2, 'Sp B', NULL, 0, NULL, 30, 0, '0000-00-00 00:00:00'),
(3, 'sp C', NULL, 0, NULL, 12, 0, '0000-00-00 00:00:00'),
(4, 'sp D', NULL, 1, NULL, 12, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `name`, `content`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Editor', 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_user`
--

CREATE TABLE IF NOT EXISTS `tbl_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_role_user`
--

INSERT INTO `tbl_role_user` (`id`, `user_id`, `role_id`) VALUES
(4, 26, 2),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `content` text,
  `percent_decrease` int(11) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sale_id`, `pro_id`, `date_start`, `date_end`, `content`, `percent_decrease`, `image`, `status`) VALUES
(4, 0, '2013-11-03 00:00:00', '2013-11-10 00:00:00', '<p>hung</p>\r\n', 30, 'templates/admin/images/Hydrangeas.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_support`
--

CREATE TABLE IF NOT EXISTS `tbl_support` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nick_name` varchar(100) NOT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `email` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`email`, `full_name`, `password`, `phone`, `user_id`) VALUES
('admin@gmail.com', 'Admin', '8e469f8b1abbb53e5b72f68b6de0de46', 2147483647, 1),
('hunglk@gmail.com', 'bbbbbbb', 'e10adc3949ba59abbe56e057f20f883e', 987677877, 26);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
