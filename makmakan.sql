-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 08:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `makmakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_role` int(11) DEFAULT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `birthdate`, `image`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `auth_role`, `role`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Admin', '', '2015-10-20', 'uploads/admin/tsuwandi.jpg', 'admin', 'OKuvEY1apT2DxP6wuZZ2oI3lKf6NZT71', '$2y$13$/5Lvz5HFzZJBiC8ii/pAIevitXEr7Ysapt9uE16vZVyjiMS.6EMLu', '9zVKqvOSVoHlRBZSV18LgaXMdkqycQkW_1444157099', 'admin@gmail.com', 1, 'user', 1, 1444157099, 1444573463),
(14, 'dsffds', 'aaaaa', NULL, '', 'aaaaa', 'Wiy7LVM8xupD5e1026Ee3U2HHl93BUmA', '$2y$13$moERyOXm9sC3N504d0Jp4.USYHPs4EmmaOv1vGpq8yee3J.T9Il2u', '7daeO39RLm-EfuV1ROl5qX45tczRYXpp_1444315620', 'aaa@aa.com', 1, '', 0, 1444315620, 1444404634),
(15, 'aadad', 'aad', '2015-10-01', 'uploads/admin/aadad.jpg', 'aadad', 'lMlw7pFl9ydk2NH5wAoIREzGhfx-9hDQ', '$2y$13$lyWrCA881RD7Nsz1G8npBOMlsorCv870VpKJaLrnXB9JPabPoOF1q', 'wbRJIeXDbEfEqEEzYDxeyR3At_MNk8dK_1444402173', 'adaaamin123@gmail.com', 1, '', -1, 1444402173, 1444402815);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_operation`
--

CREATE TABLE IF NOT EXISTS `auth_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11406 ;

--
-- Dumping data for table `auth_operation`
--

INSERT INTO `auth_operation` (`id`, `parent_id`, `name`) VALUES
(111, 0, 'basic'),
(113, 0, 'user'),
(114, 0, 'role'),
(11101, 111, 'backendLogin'),
(11302, 113, 'viewUser'),
(11303, 113, 'createUser'),
(11304, 113, 'updateUser'),
(11305, 113, 'deleteUser'),
(11402, 114, 'viewRole'),
(11403, 114, 'createRole'),
(11404, 114, 'updateRole'),
(11405, 114, 'deleteRole');

-- --------------------------------------------------------

--
-- Table structure for table `auth_role`
--

CREATE TABLE IF NOT EXISTS `auth_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `operation_list` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `auth_role`
--

INSERT INTO `auth_role` (`id`, `name`, `description`, `operation_list`) VALUES
(1, 'Super Admin', '', 'all'),
(3, 'Normal Admin', '', 'backendLogin;viewUser;viewRole'),
(4, 'Test', 'faafafafaf', 'viewUser;createUser;updateUser;deleteUser'),
(5, 'Test2', 'sdsasda', 'viewUser');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_amount` tinyint(2) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `about_us` text,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `gplus_url` varchar(100) DEFAULT NULL,
  `terms_and_condition` text,
  `purchashing_guide` text,
  `payment_guide` text,
  `delivery_guide` text,
  `return_policy` text,
  `privacy_policy` text,
  `logo_path` varchar(100) DEFAULT NULL,
  `favicon_path` varchar(100) DEFAULT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` varchar(30) NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `slider_amount`, `title`, `name`, `about_us`, `phone`, `address`, `longitude`, `latitude`, `twitter_url`, `facebook_url`, `instagram_url`, `gplus_url`, `terms_and_condition`, `purchashing_guide`, `payment_guide`, `delivery_guide`, `return_policy`, `privacy_policy`, `logo_path`, `favicon_path`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`) VALUES
(1, NULL, NULL, NULL, '<p>ssadsdaasdsdasadsad</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>testdelivey guide</p>\r\n', NULL, '<p>testing</p>\r\n', NULL, NULL, 'makmakan', '2015-10-24 06:36:25', 'admin', '2015-10-24 06:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `faq_order` int(11) DEFAULT NULL,
  `is_disabled` tinyint(2) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `faq_order`, `is_disabled`, `is_deleted`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, '<p>test</p>\r\n', '<p>test</p>\r\n', NULL, 0, -1, 'admin', '2015-10-14 06:16:49', 'admin', '2015-10-13 23:10:54'),
(3, '<p>sdasad</p>\r\n', '<p>sadsda</p>\r\n', NULL, 1, 1, 'admin', '2015-10-14 00:10:18', 'admin', '2015-10-14 00:10:18'),
(4, '<p>sadsasda</p>\r\n', '<p>sdasadsad</p>\r\n', NULL, 0, 1, 'admin', '2015-10-14 00:10:12', 'admin', '2015-10-14 00:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1444050769),
('m130524_201442_init', 1444050773);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_by` varchar(30) NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `is_deleted` tinyint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `subject`, `message`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `is_deleted`) VALUES
(1, 'Test', '<p><strong>Ini news letter loh</strong></p>\r\n', 'tsuwandi', '2015-10-07 11:10:25', 'tsuwandi', '2015-10-07 11:10:25', -1),
(2, 'safsaasf', '<p>safsfasfasfa</p>\r\n', 'tsuwandi', '2015-10-09 03:10:10', 'tsuwandi', '2015-10-09 03:10:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sn_bank`
--

CREATE TABLE IF NOT EXISTS `sn_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bank` varchar(50) NOT NULL,
  `is_disabled` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sn_product_category`
--

CREATE TABLE IF NOT EXISTS `sn_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sn_product_category`
--

INSERT INTO `sn_product_category` (`id`, `category`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(5, 'Arabian Fooddd', -1, 'admin', '2015-10-16 07:52:00', 'admin', '2015-10-16 02:10:25'),
(6, 'Chinnese Food', 1, 'admin', '2015-10-16 03:10:40', 'admin', '2015-10-16 03:10:40'),
(7, 'Nasi Cane', -1, 'admin', '2015-10-16 10:00:42', 'admin', '2015-10-16 04:10:25'),
(8, 'asd', -1, 'admin', '2015-10-16 10:06:06', 'admin', '2015-10-16 05:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `last_login_date` timestamp NULL DEFAULT NULL,
  `image_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `makmakan_credit` int(11) DEFAULT NULL,
  `bank_account_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_bank_id` int(11) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `birthdate`, `phone`, `mobile`, `username`, `sex`, `last_login_date`, `image_path`, `address`, `featured`, `makmakan_credit`, `bank_account_number`, `bank_account_name`, `sn_bank_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, '', NULL, '0000-00-00', NULL, '', 'admin123', '', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 'dEKNVY5MRjBBzHk01NQtlCjghYutK7qP', '$2y$13$UzUF33ZOCD7cIvT3jUN75eVY57QYManypAbM79Rm0qIhuGshdU2uC', '4d6z43RnnPXI_1xtptu4vvOz8lvht3fv_1444146439', 'admin@gmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
