-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2021 at 11:48 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

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
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31;


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
  `equipment_id` int NOT NULL AUTO_INCREMENT,
  `equipment_serial_no` varchar(15) DEFAULT NULL,
  `equipment_name` varchar(255) DEFAULT NULL,
  `equipment_model` varchar(255) DEFAULT NULL,
  `equipment_type` varchar(255) DEFAULT NULL,
  `equipment_status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_serial_no`, `equipment_name`, `equipment_model`, `equipment_type`, `equipment_status`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'LAPTOP', 'XP091PKL', 'ASUS', 0, '2021-04-02 22:13:00', '2021-04-02 23:15:00'),
(2, '1234442312', 'Printer', 'PPP0999KL', 'HP', 1, '2021-04-02 23:17:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `reservation_date_pickup` date NOT NULL,
  `reservation_time_pickup` time NOT NULL,
  `reservation_date_return` date NOT NULL,
  `reservation_time_return` time NOT NULL,
  `reservation_description` varchar(255) DEFAULT NULL,
  `reservation_status` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approve_by` int DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date_pickup`, `reservation_time_pickup`, `reservation_date_return`, `reservation_time_return`, `reservation_description`, `reservation_status`, `user_id`, `created_at`, `updated_at`, `approve_by`) VALUES
(1, '2021-04-05', '05:56:32', '2021-04-05', '07:53:33', NULL, 0, 1, '2021-04-05 15:56:18', NULL, NULL),
(2, '2021-04-05', '11:53:33', '2021-04-05', '11:42:33', NULL, 0, 2, '2021-04-05 15:56:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_item`
--

DROP TABLE IF EXISTS `reservation_item`;
CREATE TABLE IF NOT EXISTS `reservation_item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `reservation_date` date DEFAULT NULL,
  `reservation_id` int DEFAULT NULL,
  `equipment_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_role` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `user_staff_id` varchar(25) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_phoneNo` varchar(25) DEFAULT NULL,
  `user_status` int NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_role`, `department_id`, `user_staff_id`, `user_password`, `user_phoneNo`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'Mohd Fahmy Izwan Zulkhafri', 1, 1, '2016758447', '$2y$10$kMA20OcfWsZ8zUqXeLgdiu3oIn1O1jkStkZyEhs19z7Me8iFPdTt.', '01111401556', 1, '2021-04-01 13:48:00', '2021-04-01 13:50:00'),
(2, 'Muhammad Khairul islah Bin Md Salleh', 1, 2, '2017737135', '$2y$10$hAyt7AFLXzkfoiYJ8qodqu68wYV7WkZigeShXssxHzUPxHBKiIojW', '01111401556', 1, '2021-04-01 13:50:00', '2021-04-01 13:52:00'),
(5, 'adam', 2, 1, '8888', '$2y$10$QL/kWsKqPxMNOtPU44mLGuFj9kkSWJeC03e8RI.uAQj7DUkXUUmoO', '01111401556', 1, '2021-04-01 13:55:00', '2021-04-02 23:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
