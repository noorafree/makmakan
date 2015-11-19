-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 03:48 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `id` int(11) NOT NULL,
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
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `birthdate`, `image`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `auth_role`, `role`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Admin', 'lalalalala', '2015-10-20', 'uploads/admin/tsuwandi.jpg', 'admin', 'OKuvEY1apT2DxP6wuZZ2oI3lKf6NZT71', '$2y$13$/5Lvz5HFzZJBiC8ii/pAIevitXEr7Ysapt9uE16vZVyjiMS.6EMLu', '9zVKqvOSVoHlRBZSV18LgaXMdkqycQkW_1444157099', 'admin@gmail.com', 1, 'user', 1, 1444157099, 1446979169),
(14, 'dsffds', 'aaaaa', NULL, '', 'aaaaa', 'Wiy7LVM8xupD5e1026Ee3U2HHl93BUmA', '$2y$13$moERyOXm9sC3N504d0Jp4.USYHPs4EmmaOv1vGpq8yee3J.T9Il2u', '7daeO39RLm-EfuV1ROl5qX45tczRYXpp_1444315620', 'aaa@aa.com', 1, '', 0, 1444315620, 1444404634),
(15, 'aadad', 'aad', '2015-10-01', 'uploads/admin/aadad.jpg', 'aadad', 'lMlw7pFl9ydk2NH5wAoIREzGhfx-9hDQ', '$2y$13$lyWrCA881RD7Nsz1G8npBOMlsorCv870VpKJaLrnXB9JPabPoOF1q', 'wbRJIeXDbEfEqEEzYDxeyR3At_MNk8dK_1444402173', 'adaaamin123@gmail.com', 1, '', -1, 1444402173, 1444402815),
(16, 'cacad', 'cacad', '2015-11-05', 'uploads/admin/cacad.jpg', 'cacad', '1_6s7SV7Dc-XbdktFOZuGC57XFYmbYfO', '$2y$13$VIWr/5rcZhVrCJn8hWb2F.hnPywfs8Ux5B6IftJInizi37k7ntG3m', 'GfCquADqh5eX7GcW-b3VYuHKvb7wxMP6_1446982176', 'cacad@yahoo.com', 1, '', 1, 1446982175, 1446982175);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `advertisement_type` enum('Right Menu','Left Menu','','') NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_picture`
--

CREATE TABLE IF NOT EXISTS `advertisement_picture` (
  `id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `advertisement_picture_order` int(10) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

CREATE TABLE IF NOT EXISTS `advertiser` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
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
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_operation`
--

CREATE TABLE IF NOT EXISTS `auth_operation` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11406 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `operation_list` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_role`
--

INSERT INTO `auth_role` (`id`, `name`, `description`, `operation_list`) VALUES
(1, 'Super Admin', '', 'all'),
(3, 'Normal Admin', '', 'backendLogin;viewUser;viewRole'),
(4, 'Test', 'faafafafaf', 'viewUser;createUser;updateUser;deleteUser;viewRole');

-- --------------------------------------------------------

--
-- Table structure for table `blocked_user`
--

CREATE TABLE IF NOT EXISTS `blocked_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `try_limit` int(1) NOT NULL,
  `last_login_try_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL,
  `is_target_self` tinyint(1) NOT NULL,
  `carousel_order` int(10) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL,
  `slider_amount` tinyint(2) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `about_us` text,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_1` varchar(50) DEFAULT NULL,
  `email_2` varchar(50) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `gplus_url` varchar(100) DEFAULT NULL,
  `terms_and_condition` text,
  `purchasing_guide` text,
  `payment_guide` text,
  `delivery_guide` text,
  `return_policy` text,
  `privacy_policy` text,
  `logo_path` varchar(255) DEFAULT NULL,
  `favicon_path` varchar(255) DEFAULT NULL,
  `meta_tag` text,
  `meta_description` text,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` varchar(30) NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `slider_amount`, `title`, `name`, `about_us`, `phone`, `address`, `email_1`, `email_2`, `longitude`, `latitude`, `twitter_url`, `facebook_url`, `instagram_url`, `gplus_url`, `terms_and_condition`, `purchasing_guide`, `payment_guide`, `delivery_guide`, `return_policy`, `privacy_policy`, `logo_path`, `favicon_path`, `meta_tag`, `meta_description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`) VALUES
(1, 5, 'Makmakan', 'Makmakan', '<p>lorem ipsum dolore sit amet</p>\r\n', '42880478', 'Jalan Kebon Kosong Raya No.1', 'asdasd@yahoo.com', 'a@yahoo.com', '1', '2', 'twitter.com', 'facebook.com', 'instagram.com', 'gplus.com', NULL, NULL, NULL, NULL, NULL, NULL, 'image/logo', 'image/favicon', 'asdasdas', 'dasdasdasdasd', 'makmakan', '2015-11-08 11:57:33', 'admin', '2015-11-08 05:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `amount` decimal(5,2) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

CREATE TABLE IF NOT EXISTS `discount_product` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `faq_order` int(10) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `faq_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, '<p>test</p>\r\n', '<p>test</p>\r\n', 0, 0, 'admin', '2015-10-14 06:16:49', 'admin', '2015-10-13 23:10:54'),
(3, '<p>sdasad</p>\r\n', '<p>sadsda</p>\r\n', 0, 0, 'admin', '2015-10-14 00:10:18', 'admin', '2015-10-14 00:10:18'),
(4, '<p>sadsasda</p>\r\n', '<p>sdasadsad</p>\r\n', 0, 0, 'admin', '2015-10-14 00:10:12', 'admin', '2015-10-14 00:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient`, `product_id`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Garam', 1, 1, 'admin', '2015-11-10 19:11:30', 'admin', '2015-11-10 19:11:30'),
(2, 'Buah', 1, 1, 'admin', '2015-11-10 19:11:30', 'admin', '2015-11-10 19:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `varchar` text NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_by` varchar(30) NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `status` tinyint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `varchar`, `message`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `status`) VALUES
(1, 'Makmakan', '<p>asdasdasdasdasd</p>\r\n', 'admin', '2015-11-08 02:11:13', 'admin', '2015-11-08 02:11:13', -1),
(2, 'asdasd', '<p>asdasd</p>\r\n', 'admin', '2015-11-08 04:11:24', 'admin', '2015-11-08 04:11:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner_bank_account`
--

CREATE TABLE IF NOT EXISTS `owner_bank_account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `sn_bank_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `plu` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `selling_price` int(10) NOT NULL,
  `sn_product_category_id` int(11) NOT NULL,
  `selling_type` enum('Ready Stock','Ready Order','Purchase Order','') NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen` int(10) NOT NULL,
  `sold` int(10) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `po_start_date` date DEFAULT NULL,
  `po_end_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `expired_time` int(5) DEFAULT NULL,
  `is_non_halal` tinyint(1) NOT NULL,
  `minimum_order` int(5) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `description` text,
  `meta_tag` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE IF NOT EXISTS `product_photo` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_photo_order` int(10) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `stars` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_type` enum('Baik','Sedang','Buruk','') NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sn_bank`
--

CREATE TABLE IF NOT EXISTS `sn_bank` (
  `id` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sn_bank`
--

INSERT INTO `sn_bank` (`id`, `bank`, `status`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'BCA', 1, '2015-10-31 22:11:53', 'admin', '2015-10-31 22:11:53', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sn_delivery_agent`
--

CREATE TABLE IF NOT EXISTS `sn_delivery_agent` (
  `id` int(11) NOT NULL,
  `delivery_agent` varchar(100) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sn_delivery_agent`
--

INSERT INTO `sn_delivery_agent` (`id`, `delivery_agent`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'JNE', 'admin', '2015-10-28 16:06:28', 'admin', '2015-10-27 22:10:02', -1),
(2, 'asd', 'admin', '2015-10-27 22:10:36', 'admin', '2015-10-27 22:10:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sn_geostructure`
--

CREATE TABLE IF NOT EXISTS `sn_geostructure` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `post_code` varchar(5) DEFAULT NULL,
  `sn_geostructure_parent_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sn_payment_method`
--

CREATE TABLE IF NOT EXISTS `sn_payment_method` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sn_payment_method`
--

INSERT INTO `sn_payment_method` (`id`, `payment_method`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'Kredit', 'admin', '2015-10-27 22:10:14', 'admin', '2015-10-27 22:10:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sn_product_category`
--

CREATE TABLE IF NOT EXISTS `sn_product_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sn_product_category`
--

INSERT INTO `sn_product_category` (`id`, `category`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(5, 'Arabian Fooddd', -1, 'admin', '2015-10-16 07:52:00', 'admin', '2015-10-16 02:10:25'),
(6, 'Chinnese Food', 1, 'admin', '2015-10-16 03:10:40', 'admin', '2015-10-16 03:10:40'),
(7, 'Nasi Cane', -1, 'admin', '2015-10-16 10:00:42', 'admin', '2015-10-16 04:10:25'),
(8, 'asd', -1, 'admin', '2015-10-16 10:06:06', 'admin', '2015-10-16 05:10:33'),
(9, 'alamakk', -1, 'admin', '2015-10-25 16:30:52', 'admin', '2015-10-24 22:10:25'),
(10, 'asd', -1, 'admin', '2015-10-25 17:23:42', 'admin', '2015-10-24 22:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'sandy_lalalala@yahoo.comm', 'admin', '2015-10-28 16:58:07', 'admin', '2015-10-27 22:10:56', -1),
(2, 'zasdasd@yahoo.com', 'admin', '2015-11-08 14:50:34', 'admin', '2015-11-07 20:11:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_date` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `featured` tinyint(1) DEFAULT NULL,
  `makmakan_credit` int(11) DEFAULT NULL,
  `bank_account_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_bank_id` int(11) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sn_geostructure_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `birthdate`, `phone`, `mobile`, `username`, `sex`, `last_login_date`, `image_path`, `address`, `description`, `featured`, `makmakan_credit`, `bank_account_number`, `bank_account_name`, `sn_bank_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `sn_geostructure_id`, `status`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, '', NULL, '0000-00-00', NULL, '', 'admin123', '', NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, 'dEKNVY5MRjBBzHk01NQtlCjghYutK7qP', '$2y$13$UzUF33ZOCD7cIvT3jUN75eVY57QYManypAbM79Rm0qIhuGshdU2uC', '4d6z43RnnPXI_1xtptu4vvOz8lvht3fv_1444146439', 'admin@gmail.com', 0, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'qweqwe', 'qweqweqwe', '2015-11-05', '12312312', '3123123123', 'sandy', 'Male', NULL, 'uploads/user/abb2079.jpg', '123123123', NULL, 1, NULL, '', '', NULL, '123', '202cb962ac59075b964b07152d234b70', '', '123123@yahoo.com', 0, 1, '2015-10-31 22:11:35', '2015-10-31 22:11:35', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_complaint`
--

CREATE TABLE IF NOT EXISTS `user_complaint` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_type` enum('Kualitas Produk','Kesegaran Produk','Pengiriman Produk','Pelayanan','Alasan Lain') NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_complaint`
--

INSERT INTO `user_complaint` (`id`, `description`, `user_id`, `complaint_type`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'Makanannya ngga enak', 1, 'Kesegaran Produk', 'Sandy', '2015-11-08 14:47:16', 'Sandy', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE IF NOT EXISTS `user_review` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `stars` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_reviewer` int(11) NOT NULL,
  `review_type` enum('Baik','Sedang','Buruk') NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_percentage` tinyint(1) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `voucher_type` enum('Nominal','Percentage','','') NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_picture`
--
ALTER TABLE `advertisement_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertiser`
--
ALTER TABLE `advertiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `type` (`type`);

--
-- Indexes for table `auth_operation`
--
ALTER TABLE `auth_operation`
  ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `auth_role`
--
ALTER TABLE `auth_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocked_user`
--
ALTER TABLE `blocked_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_bank_account`
--
ALTER TABLE `owner_bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sn_bank`
--
ALTER TABLE `sn_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sn_delivery_agent`
--
ALTER TABLE `sn_delivery_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sn_geostructure`
--
ALTER TABLE `sn_geostructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sn_payment_method`
--
ALTER TABLE `sn_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sn_product_category`
--
ALTER TABLE `sn_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_complaint`
--
ALTER TABLE `user_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertisement_picture`
--
ALTER TABLE `advertisement_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertiser`
--
ALTER TABLE `advertiser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_operation`
--
ALTER TABLE `auth_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11406;
--
-- AUTO_INCREMENT for table `auth_role`
--
ALTER TABLE `auth_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blocked_user`
--
ALTER TABLE `blocked_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discount_product`
--
ALTER TABLE `discount_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owner_bank_account`
--
ALTER TABLE `owner_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sn_bank`
--
ALTER TABLE `sn_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sn_delivery_agent`
--
ALTER TABLE `sn_delivery_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sn_geostructure`
--
ALTER TABLE `sn_geostructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sn_payment_method`
--
ALTER TABLE `sn_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sn_product_category`
--
ALTER TABLE `sn_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_complaint`
--
ALTER TABLE `user_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
