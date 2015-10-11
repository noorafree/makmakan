-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Okt 2015 pada 17.40
-- Versi Server: 5.6.24
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
-- Struktur dari tabel `admin`
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `birthdate`, `image`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `auth_role`, `role`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Admin', '', '2015-10-20', 'uploads/admin/tsuwandi.jpg', 'admin', 'OKuvEY1apT2DxP6wuZZ2oI3lKf6NZT71', '$2y$13$/5Lvz5HFzZJBiC8ii/pAIevitXEr7Ysapt9uE16vZVyjiMS.6EMLu', '9zVKqvOSVoHlRBZSV18LgaXMdkqycQkW_1444157099', 'admin@gmail.com', 1, 'user', 1, 1444157099, 1444573463),
(14, 'dsffds', 'aaaaa', NULL, '', 'aaaaa', 'Wiy7LVM8xupD5e1026Ee3U2HHl93BUmA', '$2y$13$moERyOXm9sC3N504d0Jp4.USYHPs4EmmaOv1vGpq8yee3J.T9Il2u', '7daeO39RLm-EfuV1ROl5qX45tczRYXpp_1444315620', 'aaa@aa.com', 1, '', 0, 1444315620, 1444404634),
(15, 'aadad', 'aad', '2015-10-01', 'uploads/admin/aadad.jpg', 'aadad', 'lMlw7pFl9ydk2NH5wAoIREzGhfx-9hDQ', '$2y$13$lyWrCA881RD7Nsz1G8npBOMlsorCv870VpKJaLrnXB9JPabPoOF1q', 'wbRJIeXDbEfEqEEzYDxeyR3At_MNk8dK_1444402173', 'adaaamin123@gmail.com', 1, '', -1, 1444402173, 1444402815);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
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
-- Struktur dari tabel `auth_operation`
--

CREATE TABLE IF NOT EXISTS `auth_operation` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11406 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_operation`
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
-- Struktur dari tabel `auth_role`
--

CREATE TABLE IF NOT EXISTS `auth_role` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `operation_list` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_role`
--

INSERT INTO `auth_role` (`id`, `name`, `description`, `operation_list`) VALUES
(1, 'Super Admin', '', 'all'),
(3, 'Normal Admin', '', 'backendLogin;viewUser;viewRole'),
(4, 'Test', 'faafafafaf', 'viewUser;createUser;updateUser;deleteUser'),
(5, 'Test2', 'sdsasda', 'viewUser');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1444050769),
('m130524_201442_init', 1444050773);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_by` varchar(30) NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `is_deleted` tinyint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `newsletter`
--

INSERT INTO `newsletter` (`id`, `subject`, `message`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `is_deleted`) VALUES
(1, 'Test', '<p><strong>Ini news letter loh</strong></p>\r\n', 'tsuwandi', '2015-10-07 11:10:25', 'tsuwandi', '2015-10-07 11:10:25', -1),
(2, 'safsaasf', '<p>safsfasfasfa</p>\r\n', 'tsuwandi', '2015-10-09 03:10:10', 'tsuwandi', '2015-10-09 03:10:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin123', 'dEKNVY5MRjBBzHk01NQtlCjghYutK7qP', '$2y$13$UzUF33ZOCD7cIvT3jUN75eVY57QYManypAbM79Rm0qIhuGshdU2uC', '4d6z43RnnPXI_1xtptu4vvOz8lvht3fv_1444146439', 'admin@gmail.com', 10, 1444051446, 1444146438);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `auth_operation`
--
ALTER TABLE `auth_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11406;
--
-- AUTO_INCREMENT for table `auth_role`
--
ALTER TABLE `auth_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
