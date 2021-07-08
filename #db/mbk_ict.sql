-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2021 at 03:57 AM
-- Server version: 10.4.13-MariaDB
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'JABATAN PERKHIDMATAN PERBANDARAN / BAHAGIAN PERKHIDMATAN PERBANDARAN', '2021-03-31 12:49:30', NULL),
(2, 'JABATAN PERKHIDMATAN PERBANDARAN / BAHAGIAN KESIHATAN PERSEKITARAN', '2021-03-31 12:49:30', NULL);

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
  `equipment_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_serial_no`, `equipment_name`, `equipment_model`, `equipment_type`, `equipment_status`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'LAPTOP', 'XP091PKL', 'ASUS', 0, '2021-04-02 22:13:00', '2021-07-07 22:28:33'),
(2, '1234442312', 'Printer', 'PPP0999KL', 'HP', 1, '2021-04-02 23:17:00', '2021-07-07 22:29:29'),
(3, 'a213', 'asdas', 'asdas', '123', 1, '2021-07-07 22:32:11', '2021-07-07 22:39:27'),
(4, 'Cumque qua', 'Thor Dotson', 'Omnis quis ', 'Enim anim dolor maxime rerum fugit ut ea repudiandae adipisci est culpa similique ea eius et possi', 2, '2021-07-07 22:36:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date_pickup` date NOT NULL,
  `reservation_time_pickup` time NOT NULL,
  `reservation_date_return` date NOT NULL,
  `reservation_time_return` time NOT NULL,
  `reservation_description` varchar(255) DEFAULT NULL,
  `reservation_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_item`
--

DROP TABLE IF EXISTS `reservation_item`;
CREATE TABLE IF NOT EXISTS `reservation_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` date DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_staff_id` varchar(25) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_phoneNo` varchar(25) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_staff_id`, `user_password`, `user_phoneNo`, `user_role`, `department_id`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'Mohd Fahmy Izwan Zulkhafri', '2016758447', '$2y$12$4F7s9diGOmSKiMYcdjfwEun123CnNJ0VdBDQGvxBEYbVH3Aasmkqi', '01111401556', 1, 1, 1, '2021-04-01 13:48:00', '2021-04-01 13:50:00'),
(2, 'Muhammad Khairul islah Bin Md Salleh', '2017737135', '$2y$10$hAyt7AFLXzkfoiYJ8qodqu68wYV7WkZigeShXssxHzUPxHBKiIojW', '01111401556', 1, 2, 1, '2021-04-01 13:50:00', '2021-04-01 13:52:00'),
(5, 'adam', '8888', '$2y$10$QL/kWsKqPxMNOtPU44mLGuFj9kkSWJeC03e8RI.uAQj7DUkXUUmoO', '01111401556', 2, 1, 1, '2021-07-07 22:29:39', '2021-04-02 23:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
