-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2021 at 12:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbk_ict`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'JABATAN PERKHIDMATAN PERBANDARAN / BAHAGIAN PERKHIDMATAN PERBANDARAN', '2021-03-31 12:49:30', NULL),
(2, 'JABATAN PERKHIDMATAN PERBANDARAN / BAHAGIAN KESIHATAN PERSEKITARAN', '2021-03-31 12:49:30', NULL),
(3, 'JABATAN PEMBANGUNAN PERNIAGAAN DAN PELESENAN / BAHAGIAN PELESENAN', NULL, NULL),
(4, 'JABATAN PEMBANGUNAN PERNIAGAAN DAN PELESENAN / BAHAGIAN PENJAJA DAN KAWALAN PERNIAGAAN', NULL, NULL),
(5, 'SEKSYEN PERHUBUNGAN AWAM DAN KORPORAT', NULL, NULL),
(6, 'JABATAN PERANCANGAN PEMBANGUNAN / BAHAGIAN BANGUNAN', NULL, NULL),
(7, 'JABATAN PERANCANGAN PEMBANGUNAN / BAHAGIAN KAWALAN BANGUNAN', NULL, NULL),
(8, 'JABATAN PERANCANGAN PEMBANGUNAN / BAHAGIAN PEMBANGUNAN LESTARI', NULL, NULL),
(9, 'JABATAN LANDSKAP / BAHAGIAN PEMBANGUNAN LANDSKAP', NULL, NULL),
(10, 'JABATAN LANDSKAP / BAHAGIAN PENYELENGGARAAN LANDSKAP', NULL, NULL),
(11, 'SEKSYEN PESURUHJAYA BANGUNAN (COB)', NULL, NULL),
(12, 'SEKSYEN AUDIT DALAM', NULL, NULL),
(13, 'SEKSYEN PUSAT SETEMPAT (OSC)', NULL, NULL),
(14, 'JABATAN PENGURUSAN DAN PENGUATKUASAAN / BAHAGIAN TEKNOLOGI MAKLUMAT', NULL, NULL),
(15, 'JABATAN PENGURUSAN DAN PENGUATKUASAAN / BAHAGIAN PENGUATKUASAAN DAN KESELAMATAN', NULL, NULL),
(16, 'SEKSYEN PERUNDANGAN DAN PENDAKWAAN', NULL, NULL),
(17, 'SEKSYEN PENSWASTAAN DAN ASET KHAS', NULL, NULL),
(18, 'JABATAN PERBENDAHARAAN / BAHAGIAN LETAK KERETA', NULL, NULL),
(19, 'JABATAN PERBENDAHARAAN / BAHAGIAN BELANJAWAN DAN PEROLEHAN', NULL, NULL),
(20, 'JABATAN PERBENDAHARAAN / BAHAGIAN KEWANGAN DAN AKAUN', NULL, NULL),
(21, 'JABATAN PERBENDAHARAAN / BAHAGIAN CUKAI TAKSIRAN', NULL, NULL),
(22, 'JABATAN KEJURUTERAAN / BAHAGIAN PROJEK DAN KERJA AWAM', NULL, NULL),
(23, 'JABATAN KEJURUTERAAN / BAHAGIAN INFRASTRUKTUR DAN JALAN', NULL, NULL),
(24, 'JABATAN KEJURUTERAAN / BAHAGIAN REKABENTUK DAN PROJEK KHAS', NULL, NULL),
(25, 'PENGURUSAN BANGUNAN', NULL, NULL),
(26, 'BAHAGIAN KHIDMAT PENGURUSAN', NULL, NULL),
(27, 'JABATAN PEMBANGUNAN KOMUNITI DAN PELANCONGAN / BAHAGIAN KOMUNITI DAN SUKAN', NULL, NULL),
(28, 'JABATAN PEMBANGUNAN KOMUNITI DAN PELANCONGAN / BAHAGIAN PELANCONGAN DAN KEBUDAYAAN', NULL, NULL),
(29, 'JABATAN PENILAIAN / BAHAGIAN PENILAIAN', NULL, NULL),
(30, 'JABATAN PENILAIAN / BAHAGIAN PENGURUSAN HARTA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_serial_no` varchar(15) DEFAULT NULL,
  `equipment_name` varchar(255) DEFAULT NULL,
  `equipment_model` varchar(255) DEFAULT NULL,
  `equipment_type` varchar(255) DEFAULT NULL,
  `equipment_status` int(11) DEFAULT NULL COMMENT '0-All, 1-Baik, 2-Lupus, 3-Diselenggara, 4-Dipinjam',
  `type_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_serial_no`, `equipment_name`, `equipment_model`, `equipment_type`, `equipment_status`, `type_id`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'LAPTOP A', 'XP091PKL', 'ASUS', 4, 1, '2021-04-02 22:13:00', '2021-08-04 19:47:44'),
(13, '1111111', 'LAPTOP B', 'QQQQQQQQQQQ', 'HP', 4, 1, '2021-07-19 21:56:45', '2021-08-04 19:47:53'),
(14, '1111111', 'PRINTER A', 'TRRFFRR', 'HP', 2, 2, '2021-07-28 20:21:42', '2021-08-05 10:36:58'),
(15, '888998900', 'LCD A', 'RYUQQKASA', 'CASIO', 1, 5, '2021-08-04 18:36:32', NULL),
(16, '2020230202', 'LCD B', 'YUOPIALS', 'ASUS', 0, 5, '2021-08-04 18:37:15', '2021-08-04 18:39:22'),
(17, '3030321203', 'PRINTER B', 'LOP123POP', 'HP', 4, 2, '2021-08-04 18:38:48', '2021-08-05 11:11:26'),
(18, '12345678', 'LAPTOP C', 'XP091PKL', 'HP', 0, 1, '2021-08-11 10:23:47', '2021-08-11 10:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `master_equipment_type`
--

DROP TABLE IF EXISTS `master_equipment_type`;
CREATE TABLE IF NOT EXISTS `master_equipment_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_equipment_type`
--

INSERT INTO `master_equipment_type` (`type_id`, `type_name`, `created_at`, `update_at`) VALUES
(1, 'LAPTOP5', NULL, '2021-08-06 01:28:57'),
(2, 'PRINTER', NULL, NULL),
(8, 'SKRIN', '2021-07-28 13:16:32', '2021-07-28 13:24:48'),
(5, 'LCD PROJEKTOR', '2021-07-28 12:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date_pickup` date DEFAULT NULL,
  `reservation_time_pickup` time DEFAULT NULL,
  `reservation_date_return` date DEFAULT NULL,
  `reservation_time_return` time DEFAULT NULL,
  `reservation_description` varchar(255) DEFAULT NULL,
  `reservation_status` int(11) DEFAULT NULL COMMENT '0-All, 1-New, 2-Lulus, 3-Tolak, 4-Selesai',
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date_pickup`, `reservation_time_pickup`, `reservation_date_return`, `reservation_time_return`, `reservation_description`, `reservation_status`, `user_id`, `created_at`, `updated_at`, `approve_by`) VALUES
(3, '2021-07-23', NULL, '2021-07-26', '04:18:00', 'saas', 4, 12, '2021-07-14 16:38:51', '2021-07-22 23:15:27', NULL),
(4, '2021-07-19', NULL, NULL, NULL, 'qqweqeqe', 3, 12, '2021-07-19 21:53:50', '2021-07-19 21:54:34', NULL),
(5, '2021-07-20', NULL, '2021-07-24', '23:57:00', 'WWWWWWWWW', 4, 12, '2021-07-19 21:58:01', '2021-07-22 22:33:07', NULL),
(6, '2021-07-30', NULL, NULL, NULL, 'RRRRRRRRR', 3, 12, '2021-07-20 16:23:20', '2021-07-21 19:49:06', NULL),
(7, '2021-07-21', NULL, NULL, NULL, 'RRRRRRRQQQQQ', 3, 12, '2021-07-20 20:32:55', '2021-07-21 19:49:08', NULL),
(8, '2021-07-25', '21:00:00', NULL, NULL, 'LALALALAALA', 2, 12, '2021-07-20 20:35:18', '2021-08-04 19:47:53', NULL),
(9, '2021-07-23', '00:35:00', '2021-08-04', '18:35:00', 'BABABABAA', 4, 12, '2021-07-22 22:34:37', '2021-08-04 18:34:52', NULL),
(10, '2021-07-28', '15:00:00', NULL, NULL, 'SAJA SAJA', 1, 12, '2021-07-28 14:54:40', NULL, NULL),
(11, '2021-07-28', '20:00:00', NULL, NULL, 'TRY TRY', 2, 13, '2021-07-28 16:08:28', '2021-08-04 19:47:44', NULL),
(12, '2021-07-31', '00:10:00', NULL, NULL, 'CUBA CUBA', 1, 13, '2021-07-28 21:15:03', NULL, NULL),
(13, '2021-08-03', '11:00:00', NULL, NULL, 'Pinjam untuk meeting', 2, 13, '2021-08-05 11:11:06', '2021-08-05 11:11:26', NULL),
(14, '2021-08-06', '09:25:00', NULL, NULL, 'kkjkjkj', 1, 12, '2021-08-06 09:25:29', NULL, NULL),
(15, '2021-08-11', '10:21:00', '2021-08-12', '11:15:00', 'PINJAM PERALATAN ...', 4, 12, '2021-08-11 10:22:00', '2021-08-11 10:27:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_item`
--

DROP TABLE IF EXISTS `reservation_item`;
CREATE TABLE IF NOT EXISTS `reservation_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` date DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `master_equipment_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_item`
--

INSERT INTO `reservation_item` (`item_id`, `reservation_date`, `reservation_id`, `master_equipment_id`, `equipment_id`, `created_at`, `update_at`) VALUES
(3, '2021-07-23', 3, 1, 12, '2021-07-14 16:38:51', '2021-07-19 21:29:33'),
(4, '2021-07-23', 3, 2, 13, '2021-07-14 16:38:51', NULL),
(5, '2021-07-19', 4, 1, NULL, '2021-07-19 21:53:50', NULL),
(6, '2021-07-20', 5, 1, 13, '2021-07-19 21:58:01', '2021-07-20 20:40:28'),
(7, '2021-07-30', 6, 2, NULL, '2021-07-20 16:23:20', NULL),
(8, '2021-07-21', 7, 1, NULL, '2021-07-20 20:32:55', NULL),
(9, '2021-07-25', 8, 1, 13, '2021-07-20 20:35:18', '2021-08-04 19:47:53'),
(10, '2021-07-23', 9, 1, 12, '2021-07-22 22:34:37', '2021-07-22 22:35:02'),
(11, '2021-07-28', 10, 1, NULL, '2021-07-28 14:54:40', NULL),
(12, '2021-07-28', 11, 1, 1, '2021-07-28 16:08:28', '2021-08-04 19:47:44'),
(13, '2021-07-31', 12, 2, NULL, '2021-07-28 21:15:03', NULL),
(14, '2021-08-03', 13, 1, NULL, '2021-08-05 11:11:06', NULL),
(15, '2021-08-03', 13, 2, 17, '2021-08-05 11:11:06', '2021-08-05 11:11:26'),
(16, '2021-08-06', 14, 1, NULL, '2021-08-06 09:25:29', NULL),
(17, '2021-08-11', 15, 1, 18, '2021-08-11 10:22:00', '2021-08-11 10:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_staff_id` varchar(25) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_phoneNo` varchar(25) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_role`, `department_id`, `user_staff_id`, `user_password`, `user_phoneNo`, `user_status`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 1, 2, '2017737135', '$2y$10$hAyt7AFLXzkfoiYJ8qodqu68wYV7WkZigeShXssxHzUPxHBKiIojW', '01111401556', 1, '2021-07-06 16:28:38', '2021-04-01 13:52:00'),
(12, 'Pekerja A', 2, 13, '123456', '$2y$10$hkQpB/gO.W6Pp4CzYpBgQemWHbevuJh5xVcwceY6.1SB4ivmTiTwC', '01111401556', 1, '2021-07-28 20:23:37', NULL),
(13, 'Pekerja B', 2, 12, '1111', '$2y$10$o9jbievOrfd5pLJEc.yNKOvv3oRb69vkYijDP4Aaeq.uyMKP11zCW', '0235452', 1, '2021-07-28 20:23:43', NULL),
(14, 'Pekerja C', 2, 9, '8888', '$2y$10$ohfB0hfuoNhe0F0bjYfO3erTrLmts73pMblZYplNREcJwk5sj6FGO', '0198829321', 0, '2021-08-04 18:40:21', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
