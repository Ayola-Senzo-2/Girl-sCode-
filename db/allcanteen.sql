-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 11:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allcanteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `canteen`
--


DROP DATABASE IF EXISTS `AllCanteen`;
CREATE DATABASE IF NOT EXISTS `AllCanteen`;
SET FOREIGN_KEY_CHECKS=0;

USE `AllCanteen`;


CREATE TABLE `canteen` (
  `canteen_id` int(11) NOT NULL,
  `canteen_name` varchar(25) NOT NULL,
  `canteen_address` text NOT NULL,
  `canteen_phone` int(9) NOT NULL,
  `canteen_email` varchar(30) NOT NULL,
  `canteen_logo` varchar(1000) NOT NULL,
  `canteen_minimum_order` float NOT NULL,
  `canteen_comission` char(3) NOT NULL,
  `canteen_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `canteen_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `canteen_opening_time` time NOT NULL,
  `canteen_closing_time` time NOT NULL,
  `canteen_status` varchar(10) NOT NULL,
  `canteen_ownerid` int(11) NOT NULL,
  `canteen_ownerpassword` char(32) NOT NULL,
  `canteen_delivery_type` varchar(10) NOT NULL,
  `canteen_take_away` varchar(15) NOT NULL,
  `canteen_food_section` varchar(25) NOT NULL,
  `canteen_earnings` float NOT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`canteen_id`, `canteen_name`, `canteen_address`, `canteen_phone`, `canteen_email`, `canteen_logo`, `canteen_minimum_order`, `canteen_comission`, `canteen_created_at`, `canteen_updated_at`, `canteen_opening_time`, `canteen_closing_time`, `canteen_status`, `canteen_ownerid`, `canteen_ownerpassword`, `canteen_delivery_type`, `canteen_take_away`, `canteen_food_section`, `canteen_earnings`, `zone_id`) VALUES
(1, 'Corridor cafe', 'zeekoewater 311-JS, Emalahleni, 1035', 817739896, 'coriidor@gmail.com', 'canteen.png', 0, '10%', '2021-10-30 12:11:01', '2021-10-30 12:11:01', '08:00:00', '20:00:00', 'Open', 1, 'corridorcanteen50', 'home', 'available', 'fast foods', 1050, 1),
(2, 'Khayalethu Canteen', '17 Dederichs St, Witbank, Emalahleni,1035', 767783957, 'khayalethu@gmail.com', 'canteen.png', 10, '10%', '2021-10-30 12:11:03', '2021-10-30 12:11:03', '08:00:00', '22:00:00', 'Open', 2, 'khayalethucanteen', 'home', 'available', 'sweets', 500, 2),
(3, 'emalahleni campus canteen', ' Mandela St, Witbank, Emalahleni, 1034', 827783957, 'emalahlenicanteen@gmail.com', 'canteen.png', 10, '10%', '2021-10-30 12:11:05', '2021-10-30 12:11:05', '07:00:00', '22:00:00', 'Open', 3, '00000000', 'home', 'available', 'meals', 16350, 3),
(4, 'Sosha canteen', '2 Aubrey Matlakala St, Soshanguve, 0001', 767783911, 'soshacanteen@gmail.com', 'canteen.png', 50, '20%', '2021-10-30 12:11:07', '2021-10-30 12:11:07', '07:00:00', '20:00:00', 'Open', 4, 'soshacampus', 'home', 'available', 'bakery', 1060, 4),
(5, 'polokwane canteen', '109 Market St, Polokwane Ext 67, Polokwane, 0699', 781355288, 'plkcanteen@gmail.com', 'canteen.png', 0, '10%', '2021-10-30 12:11:09', '2021-10-30 12:11:09', '08:00:00', '20:00:00', 'Open', 5, '00000000', 'home', 'available', 'Drinks', 150800, 5),
(6, 'Orion Canteen', '7584+GF, Philip Nel Park, Pretoria, 0029', 123824773, 'majedipm@tut.ac.za', 'canteen.png', 0, '11%', '2021-10-30 12:11:10', '2021-10-30 12:11:10', '08:00:00', '20:00:00', 'Open', 6, '000000000', 'home', 'available', 'Drinks', 10050, 6),
(7, 'Astra cCanteen', 'Staatsartillerie Rd, Pretoria West, Pretoria, 0183', 123824100, 'kamogelo@tut.ac.za', 'canteen.png', 0, '12%', '2021-10-30 12:11:12', '2021-10-30 12:11:12', '08:00:00', '21:00:00', 'Open', 7, '00000000', 'home', 'available', 'cooked meals', 1101, 7),
(8, 'Denise Canteen', 'Staatsrtillerie Rd, Pretoria West, Pretoria, 0183', 723825788, 'dladla@gmail.com', 'canteen.png', 15, '15%', '2021-10-30 12:11:14', '2021-10-30 12:11:14', '08:00:00', '22:00:00', 'Open', 8, '00000000', 'home', 'available', 'Drinks', 1150, 8),
(9, 'Jonete Canteen', 'Meyer St, Ptchefstroom, 2531', 713825905, 'minjonet157@gmail.com', 'canteen.png', 0, '12%', '2021-10-30 12:11:15', '2021-10-30 12:11:15', '08:00:00', '21:30:00', 'Open', 9, '00000', 'home', 'available', 'cooked meals', 2500, 9),
(10, 'Nise Canteen', '01 staatsartillerie road, 0183 Pretoria, South Africa', 825938557, 'nisecanteen@gmail.com', 'canteen.png', 0, '16%', '2021-10-30 12:11:17', '2021-10-30 12:11:17', '08:00:00', '20:30:00', 'Open', 10, '0000000000', 'home', 'available', 'cooked meals', 1234, 10);

-- --------------------------------------------------------

--
-- Table structure for table `canteen_employee`
--

CREATE TABLE `canteen_employee` (
  `cant_emp_id` int(11) NOT NULL,
  `cant_emp_f_name` varchar(25) NOT NULL,
  `cant_emp_lname` varchar(25) NOT NULL,
  `cant_emp_phone` int(9) NOT NULL,
  `cant_emp_email` varchar(35) NOT NULL,
  `canteen_id` int(11) NOT NULL,
  `cant_emp_image` varchar(10000) DEFAULT NULL,
  `cant_emp_password` char(32) NOT NULL,
  `cant_emp_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cant_emp_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canteen_employee`
--

INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(1, 'Senzo', 'Makoti', 767783957, 'senzo@gmail.com', 1, NULL, 'Makoti587', '2021-10-24 07:50:51', '2021-10-24 07:50:51');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(3, 'Lucky', 'Mazi', 827583779, 'luckymazi@gmail.com', 2, NULL, 'luckymazi@gmail.com', '2021-10-24 07:54:21', '2021-10-24 07:54:21');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(4, 'Mike', 'Salami', 765879968, 'salami.mike@gmail.com', 3, NULL, 'salami.mike@gmail.com', '2021-10-24 07:54:21', '2021-10-24 07:54:21'),
(5, 'Mazwi', 'Shabangu', 736458068, 'shabangu@gmail.com', 4, NULL, 'shabangu@gmail.com', '2021-10-24 07:57:23', '2021-10-24 07:57:23');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(6, 'Given', 'Dludlu', 667689874, 'givendludlu@gmail.com', 5, NULL, 'dludlu1234', '2021-10-24 07:57:23', '2021-10-24 07:57:23');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(7, 'Nomsa', 'Msiza', 739785101, 'nomsa@gmail.com', 6, NULL, 'nomsa@gmail.com', '2021-10-24 08:25:00', '2021-10-24 08:25:00');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(8, 'Hlengiwe', 'Masiza', 658367876, 'hlehlemaz@gmail.com', 7, NULL, 'Hlengiwe147', '2021-10-24 08:25:00', '2021-10-24 08:25:00');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(9, 'Gratitude', 'Manyaka', 769855456, 'manyakagrats@gmail.com', 8, NULL, 'Gratitude784', '2021-10-24 08:26:44', '2021-10-24 08:26:44'),
(10, 'Amanda', 'Gali', 764957882, 'amandagali@gmail.com', 9, NULL, 'amandagali123', '2021-10-24 08:49:51', '2021-10-24 08:49:51');
INSERT INTO `canteen_employee` (`cant_emp_id`, `cant_emp_f_name`, `cant_emp_lname`, `cant_emp_phone`, `cant_emp_email`, `canteen_id`, `cant_emp_image`, `cant_emp_password`, `cant_emp_created_at`, `cant_emp_updated_at`) VALUES
(11, 'Alicia', 'Modest', 789495756, 'aliciamodest@gmail.com', 10, NULL, '0789495756', '2021-10-24 08:51:46', '2021-10-24 08:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `category_image` varchar(1000) NOT NULL,
  `category_status` int(1) NOT NULL,
  `category_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `category_status`, `category_created_at`, `category_updated_at`) VALUES
(1, 'Drinks', 'null', 1, DEFAULT, '2021-10-24 06:45:00'),
(2, 'Meals', 'null', 1, DEFAULT, '2021-10-24 06:48:02'),
(3, 'Sweets and Snacks', 'null', 0, DEFAULT, '2021-10-24 06:48:02'),
(4, 'Burgers', 'null', 1, DEFAULT, '2021-10-24 07:06:52'),
(5, 'Fast foods', 'null', 1,DEFAULT, '2021-10-24 07:10:24'),
(6, 'Breads', 'null', 0, DEFAULT, '2021-10-24 07:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `customer_f_name` varchar(64) NOT NULL,
  `customer_l_name` varchar(64) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_order_count` int(3) NOT NULL,
  `customer_interest` varchar(64) NOT NULL,
  `customer_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_f_name`, `customer_l_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_order_count`, `customer_interest`, `customer_created_at`, `customer_update_at`, `customer_image`) VALUES
(1, 'Dingaan', 'Letjane', 764821064, 'velly.dingaan17@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(2, 'Sam', 'Ndlovu', 764821064, 'samndlovu@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(3, 'Thami', 'Mogane', 764821064, 'thamimogane@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(4, 'Mathew', 'Mlimi', 764821064, 'mathewbow@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(5, 'Smanga', 'Letjane', 764821064, 'smangaletjane@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(6, 'Jabulani', 'Smith', 764821064, 'jabulasm@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(7, 'Deon', 'Nkosi', 764821064, 'deonnkosi@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(8, 'Olgah', 'Mhulu', 764821064, 'olgah344@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(9, 'Vukes', 'Vulani', 764821064, 'vukes384@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(10, 'Thabang', 'Ngema', 764821064, 'thabanga457@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(11, 'Sbusiso', 'Mthabi', 764821064, 'sbumthabi@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(12, 'Aletta', 'Nkosi', 764821064, 'alettankosi@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(13, 'Zeno', 'Khumalo', 764821064, 'zenk3453@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(14, 'Musa', 'Khumalo', 764821064, 'musik984@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(15, 'Sandra', 'Sandra', 764821064, 'sandra374@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(16, 'Sli', 'Nkosi', 764821064, 'sli4492@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(17, 'Dennis', 'Smith', 764821064, 'dennis9021@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(18, 'Jack', 'Mlimi', 764821064, 'jackmlimi34@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(19, 'Fanana', 'John', 764821064, 'fanajohn@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png'),
(20, 'Kenny', 'Mnisi', 764821064, 'mkenny34@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', 0, 'fast food', '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'customer.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `cust_address_id` int(20) NOT NULL,
  `cust_add_portalcode` int(4) NOT NULL,
  `cust_add_city` varchar(255) DEFAULT NULL,
  `cust_street` varchar(255) DEFAULT NULL,
  `cust_address_created_at` timestamp NULL DEFAULT NULL,
  `cust_address_updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `zone_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`cust_address_id`, `cust_street`, `cust_add_city`, `cust_add_portalcode`, `cust_address_created_at`, `cust_address_updated_at`, `customer_id`, `zone_id`) VALUES
(1, '75 Mashaba drive', 'Witbank', 1034, '2021-10-01 18:13:02', '0000-00-00 00:00:00', 1, 2),
(2, 'Duhva Park ext8', 'Witbank', 1035, '0000-00-00 00:00:00', '2021-10-04 09:48:00', 2, 5),
(3, '1919 Mashaba Str', 'Witbank', 1034, '2021-10-13 20:43:00', '2021-10-14 05:00:00', 1, 4),
(4, 'Janlion Cachet Ave Str', 'Witbank', 1035, '2021-09-30 23:04:00', '2021-10-01 10:04:00', 5, 1),
(5, '2026 Mtjali', 'Witbank', 1034, '2021-10-03 02:00:00', '2021-10-03 09:00:00', 5, 3),
(6, '2026 Mulula Street', 'Witbank', 1035, '2021-10-09 04:30:00', '2021-10-09 10:30:00', 6, 3),
(7, '63 Watermeyer Street', 'Witbank', 1034, '2021-10-16 08:00:00', '2021-10-16 18:00:00', 1, 6),
(8, '32 Amaryllis, ext 10', 'Witbank', 1035, '2021-10-18 01:40:00', '2021-10-18 11:47:00', 2, 3),
(9, '40 Amaryllis, ext 10', 'Witbank', 1034, '2021-10-18 01:40:00', '2021-10-18 11:47:00', 4, 4),
(10, 'Rose-Innes street,ext10', 'Witbank', 1034, '2021-10-20 04:17:00', '2021-10-20 16:17:00', 1, 1),
(11, 'PTN2024/03 Tasbet park ext2', 'Witbank', 1032, '2021-10-22 03:50:00', '2021-10-22 14:00:00', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `dman_id` int(20) NOT NULL,
  `dman_f_name` varchar(64) NOT NULL,
  `dman_l_name` varchar(64) NOT NULL,
  `dman_phone` int(10) NOT NULL,
  `dman_email` varchar(255) NOT NULL,
  `dman_password` varchar(255) NOT NULL,
  `dman_identity_number` varchar(13) NOT NULL,
  `dman_identity_type` varchar(20) NOT NULL,
  `dman_status` int(1) NOT NULL,
  `dman_active` int(1) NOT NULL,
  `dman_earnings` int(7) NOT NULL,
  `dman_current_orders` int(11) NOT NULL,
  `dman_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `dman_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `dman_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_man`
--

INSERT INTO `delivery_man` (`dman_id`, `dman_f_name`, `dman_l_name`, `dman_phone`, `dman_email`, `dman_password`, `dman_identity_number`, `dman_identity_type`, `dman_status`, `dman_active`, `dman_earnings`, `dman_current_orders`, `dman_created_at`, `dman_update_at`, `dman_image`) VALUES
(1, 'Senzo', 'Mngcaleka', 100000000, 'senzo@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(2, 'Natasha', 'Bloom', 100000000, 'Natasha@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(3, 'Ephraim', 'Martin', 100000000, 'Ephraim@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(4, 'Branden', 'Schofield', 100000000, 'Branden@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(5, 'Maggie', 'Gibbs', 100000000, 'Maggie@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(6, 'Ray', 'Farley', 100000000, 'Ray@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(7, 'Annabell', 'Larsen', 100000000, 'Annabell@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(8, 'Ammar', 'Bruce', 100000000, 'Ammar@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(9, 'Jordi', 'Stanley', 100000000, 'Jordi@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(10, 'Haleema', 'Hardin', 100000000, 'Haleema@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(11, 'Karl ', 'Monroe', 100000000, 'Karl@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(12, 'Anjali', 'Vu', 100000000, 'Anjali@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(13, 'Gregor', 'Read', 100000000, 'Gregor@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(14, 'Randy', 'Ware', 100000000, 'Randy@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(15, 'Kitty', 'Bannister', 100000000, 'Kitty@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(16, 'Ava-Grace', 'Knapp', 100000000, 'Knapp@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(17, 'Diogo', 'Lancaster', 100000000, 'Lancaster@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(18, 'Tymon', 'Gibbons', 100000000, 'Gibbons@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(19, 'Cayden', 'Doyle', 100000000, 'Doyle@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png'),
(20, 'Serena', 'Stubbs', 100000000, 'stubbs@gmail.com', '$2y$10$mokD0e/GQUXsPAcT9vDlvujHxD4cIiLibL3X.IWkUNwssP/4/GIhy', '1234567891012', 'ID Document', 1, 1, 0, 0, '2021-10-24 06:48:02', '2021-10-24 06:48:02', 'dman.png');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(20) NOT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_desc` varchar(3000) DEFAULT NULL,
  `food_image` varchar(100) DEFAULT NULL,
  `food_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `food_status` int(1) DEFAULT NULL,
  `food_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `food_discount_type` varchar(20) NOT NULL DEFAULT 'percent',
  `food_avail_time_starts` time DEFAULT NULL,
  `food_avail_time_ends` time DEFAULT NULL,
  `food_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `food_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(20) NOT NULL,
  `canteen_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_desc`, `food_image`, `food_price`, `food_status`, `food_discount`, `food_discount_type`, `food_avail_time_starts`, `food_avail_time_ends`, `food_created_at`, `food_update_at`, `category_id`, `canteen_id`) VALUES
(1, 'Brown Bread', 'Fresh bread...', 'food.png', '15.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 6, 1),
(2, 'White Bread', 'White Fresh bread...', 'food.png', '17.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 6, 1),
(3, 'Cheese Burger', 'Cheese burger...', 'food.png', '27.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 2),
(4, 'Big Burger', 'Sweet big burger...', 'food.png', '33.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 2),
(5, 'Happy Meal', 'Get the Taste of...', 'food.png', '45.00', 1, '0.00', 'percent', '08:45:00', '16:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 2, 1),
(6, 'Fanta 75ml', 'Drink all day...', 'food.png', '10.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 1),
(7, 'Local Brown Bread', 'Fresh bread...', 'food.png', '15.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 6, 1),
(8, 'White Bread', 'White Fresh bread...', 'food.png', '17.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 6, 1),
(9, 'Cheese Burger', 'Cheese burger...', 'food.png', '32.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 2),
(10, 'Big Burger', 'Sweet big burger...', 'food.png', '32.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 2),
(11, 'Plate Meal', 'Get the Taste of...', 'food.png', '40.00', 1, '0.00', 'percent', '08:45:00', '16:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 2, 1),
(12, 'Coke 75ml', 'Drink all day...', 'food.png', '10.00', 1, '0.00', 'percent', '08:45:00', '17:59:00', '2021-10-25 20:01:37', '2021-10-25 20:01:37', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `cust_address_id` int(20) NOT NULL,
  `order_amount` decimal(8,0) NOT NULL,
  `order_payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_total_tax_amount` decimal(8,0) NOT NULL,
  `order_payment_method` varchar(30) DEFAULT NULL,
  `order_rans_reference` varchar(30) DEFAULT NULL,
  `dman_id` int(20) DEFAULT NULL,
  `order_note` text DEFAULT NULL,
  `order_type` varchar(255) NOT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `order_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `cust_address_id`, `order_amount`, `order_payment_status`, `order_status`, `order_total_tax_amount`, `order_payment_method`, `order_rans_reference`, `dman_id`, `order_note`, `order_type`, `order_created_at`, `order_updated_at`) VALUES
(1, 1, 2, '38', 'unpaid', 'pending', '43', 'cash on delivery', '', 1, 'schedule for later', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(2, 3, 6, '31', 'paid', 'processing', '35', 'cash on delivery', '', 4, '', 'takeaway', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(3, 2, 4, '69', 'unpaid', 'pending', '79', 'cash on delivery', '', 8, 'delivery ASAP', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(4, 1, 2, '42', 'unpaid', 'pending', '48', 'cash on delivery', '', 2, 'new complexes', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(5, 3, 6, '69', 'unpaid', 'accepted', '75', 'cash on delivery', '', 3, '', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(6, 2, 4, '40', 'paid', 'accepted', '57', 'cash on delivery', '', 2, '', 'takeaway', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(7, 2, 4, '102', 'unpaid', 'processing', '148', 'cash on delivery', '', 3, '', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(8, 5, 1, '92', 'unpaid', 'accepted', '157', 'cash on delivery', '', 1, '', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(9, 2, 4, '16', 'paid', 'accepted', '23', 'cash on delivery', '', 2, '', 'takeaway', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(10, 2, 4, '16', 'paid', 'accepted', '23', 'cash on delivery', '', 2, '', 'takeaway', '2021-10-18 01:40:00', '2021-10-18 11:47:00'),
(11, 6, 3, '47', 'paid', 'processing', '50', 'cash on delivery', '', 2, '', 'delivery', '2021-10-18 01:40:00', '2021-10-18 11:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderitem_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `food_id` int(20) NOT NULL,
  `orderitem_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `orderitem_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderitem_id`, `order_id`, `food_id`, `orderitem_price`, `orderitem_quantity`) VALUES
(1, 1, 1, '15.00', 2),
(2, 2, 5, '45.00', 1),
(3, 3, 2, '15.00', 1),
(4, 4, 4, '33.00', 3),
(5, 5, 6, '10.00', 1),
(6, 6, 6, '10.00', 2),
(7, 7, 7, '15.00', 1),
(8, 8, 5, '45.00', 2),
(9, 9, 3, '27.00', 2),
(10, 10, 7, '10.00', 1),
(11, 11, 4, '33.00', 2),
(12, 12, 8, '17.00', 1),
(13, 13, 1, '15.00', 1),
(14, 14, 3, '27.00', 3),
(15, 15, 5, '45.00', 1),
(16, 16, 6, '10.00', 3),
(17, 17, 7, '15.00', 1),
(18, 18, 1, '15.00', 2),
(19, 19, 2, '15.00', 2),
(20, 20, 1, '15.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(20) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `zone_portal_code` int(4) NOT NULL,
  `zone_status` tinyint(1) NOT NULL DEFAULT 1,
  `zone_created_at` timestamp NULL DEFAULT NULL,
  `zone_updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `zone_name`,`zone_portal_code`,  `zone_status`, `zone_created_at`, `zone_updated_at`) VALUES
(1, 'Witbank',1034,1, '2021-10-01 19:44:04', '2021-10-01 19:44:04'),
(2, 'Corrido hills', 1034, 1, '2021-10-01 19:52:03', '2021-10-01 19:52:03'),
(3, 'Downtown',1035, 1, '2021-10-01 19:54:07', '2021-10-01 19:54:07'),
(4, 'Klipfonten',1034, 1, '2021-10-01 19:54:07', '2021-10-01 19:54:07'),
(5, 'TUT eMalahleni',1032, 1, '2021-10-01 19:54:07', '2021-10-01 19:54:07'),
(6, 'Mandela drive',1037,1, '2021-10-01 19:54:07', '2021-10-01 19:54:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canteen`
--
ALTER TABLE `canteen`
  ADD PRIMARY KEY (`canteen_id`);

--
-- Indexes for table `canteen_employee`
--
ALTER TABLE `canteen_employee`
  ADD PRIMARY KEY (`cant_emp_id`),
  ADD KEY `canteen_id` (`canteen_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`cust_address_id`),
  ADD KEY `customer_id_fk` (`customer_id`),
  ADD KEY `zone_id_fk` (`zone_id`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`dman_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `food_canteen_fk` (`canteen_id`),
  ADD KEY `category_fk` (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderitem_id`),
  ADD KEY `food_id_fk` (`food_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canteen`
--
ALTER TABLE `canteen`
  MODIFY `canteen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `canteen_employee`
--
ALTER TABLE `canteen_employee`
  MODIFY `cant_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `cust_address_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `dman_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderitem_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canteen_employee`
--
ALTER TABLE `canteen_employee`
  ADD CONSTRAINT `canteen_employee_ibfk_1` FOREIGN KEY (`canteen_id`) REFERENCES `canteen` (`canteen_id`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `zone_id_fk` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `food_canteen_fk` FOREIGN KEY (`canteen_id`) REFERENCES `canteen` (`canteen_id`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `food_id_fk` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
