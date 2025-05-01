-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2025 at 03:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0' COMMENT '0: Khác\r\n1: Admin',
  `active` tinyint(1) DEFAULT '0' COMMENT '0: hiện\r\n1: Ẩn',
  `avatar` varchar(255) DEFAULT NULL,
  `id_district` int DEFAULT NULL,
  `id_province` int DEFAULT NULL,
  `id_wards` int DEFAULT NULL,
  `reset_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `address`, `sdt`, `role`, `active`, `avatar`, `id_district`, `id_province`, `id_wards`, `reset_code`, `reset_expires`) VALUES
(1, 'admin', '123456', '', '', '0999999999', 1, 0, 'uploads/users/673ef7bd74642-mèo hải âu.jpg', NULL, NULL, NULL, '', NULL),
(2, 'thanhvien', '123456', '', '', '', 0, 0, 'uploads/users/6748aaf81ed13-abc2.jpg', NULL, NULL, NULL, '', NULL),
(3, 'mỹ nhân', '123456', NULL, NULL, NULL, 0, 1, 'https://th.bing.com/th/id/OIP.2oQ9KqlKfyejQHQLx4QCBAHaJQ?rs=1&pid=ImgDetMain', NULL, NULL, NULL, '', NULL),
(4, 'Minh Hieu', '123456', 'abc123@gmail.com', 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 0, 0, 'uploads/users/675d5cd8bd613-Screenshot 2024-10-20 113401.png', NULL, NULL, NULL, NULL, '2024-11-25 10:41:26'),
(5, 'admin3', '123456', 'abc123@gmail.com', '', '0365016573', 0, 0, 'uploads/users/673eb3d07e24a-favicon.ico', NULL, NULL, NULL, NULL, '2024-11-25 10:41:26'),
(6, 'newAdmin', '111111', 'admin@gmail.com', 'Thanh Oai, Hà Nội', '0365016573', 0, 0, 'uploads/users/6743806c644c2-Hinh-anh-meo-cute-Anime.jpg', NULL, NULL, NULL, NULL, '2024-11-24 20:33:32'),
(8, 'admin3', '111111', 'doluong2005@gmail.com', NULL, '123456791', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'abc', '123456', 'hieum946@gmail.com', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'khachvip', '123456', 'mhieu67888@gmail.com', '', '0365016573', 0, 0, 'uploads/users/674ea8afc5cbb-Screenshot 2024-08-07 190024.png', NULL, NULL, NULL, NULL, '2024-12-15 06:33:00'),
(11, 'testmoi', '123456', 'mhieu67888@gmail.com', NULL, '0365016573', 0, 0, NULL, NULL, NULL, NULL, NULL, '2024-12-15 06:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int NOT NULL,
  `iduser` int DEFAULT '0',
  `bill_address` varchar(255) NOT NULL,
  `bill_sdt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) DEFAULT '0' COMMENT '0.Thanh toán trực tiếp\r\n1.Chuyển khoản\r\n',
  `total` int NOT NULL DEFAULT '0',
  `bill_status` tinyint(1) DEFAULT '0' COMMENT '0.Đơn hàng mới\r\n1.Đang xử lí\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `ngaydathang` varchar(50) NOT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `iduser`, `bill_address`, `bill_sdt`, `bill_email`, `bill_pttt`, `total`, `bill_status`, `ngaydathang`, `quantity`) VALUES
(64, 1, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 1, 4907835, 2, '28-11-2024 13:37:50', NULL),
(65, 1, 'Quảng nam', '0999999999', 'mhieu67888@gmail.com', 1, 4907835, 1, '28-11-2024 13:44:35', NULL),
(66, 1, 'Quảng nam', '0999999999', 'mhieu67888@gmail.com', 1, 4907835, 1, '28-11-2024 13:48:02', NULL),
(67, 1, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 1, 4907835, 1, '28-11-2024 13:49:45', NULL),
(68, 1, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 1, 4907835, 1, '28-11-2024 13:52:57', NULL),
(69, 1, 'gnehej', '0999999999', 'doanhieu1625@gmail.com', 1, 4907835, 1, '28-11-2024 13:58:48', NULL),
(70, 1, 'gnehej', '0999999999', 'doanhieu1625@gmail.com', 1, 4907835, 1, '28-11-2024 14:03:42', NULL),
(71, 1, 'gnehej', '0999999999', 'doanhieu1625@gmail.com', 1, 4907835, 1, '28-11-2024 14:04:27', NULL),
(72, 1, 'gnehej', '0999999999', 'doanhieu1625@gmail.com', 1, 4897853, 1, '28-11-2024 14:05:38', NULL),
(73, 1, 'abc123@gmail.com', '0999999999', 'abc123@gmail.com', 1, 4897853, 2, '28-11-2024 14:07:28', NULL),
(74, 1, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 1, 9982, 2, '28-11-2024 16:30:55', 1),
(75, 2, '35', '0365016573', 'mhieu67888@gmail.com', 2, 229584, 3, '28-11-2024 19:45:22', 2),
(76, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '28-11-2024 23:29:22', 1),
(77, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '28-11-2024 23:31:58', 1),
(78, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 9982, 1, '28-11-2024 23:48:00', 1),
(79, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '28-11-2024 23:51:31', 1),
(80, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 998, 1, '28-11-2024 23:52:31', 1),
(81, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 998, 1, '28-11-2024 23:54:19', 1),
(82, 2, 'Trung Quốc', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '28-11-2024 23:56:12', 1),
(83, 1, 'Trung Quốc', '0999999999', 'abc123@gmail.com', 1, 10980, 1, '29-11-2024 00:00:09', 2),
(84, 1, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 1, 9982, 1, '29-11-2024 00:02:09', 1),
(85, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 998, 3, '29-11-2024 00:52:56', 1),
(86, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 998, 2, '29-11-2024 01:04:24', 1),
(87, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 998, 3, '29-11-2024 12:21:55', 1),
(88, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 9795706, 1, '29-11-2024 13:57:12', 1),
(89, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 9795706, 1, '29-11-2024 14:01:54', 1),
(90, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 9795706, 1, '29-11-2024 14:03:26', 1),
(91, 2, 'Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 998, 1, '29-11-2024 15:31:14', 1),
(92, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 1993995, 1, '29-11-2024 17:51:14', 1),
(93, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 2009981, 1, '29-11-2024 23:19:34', 2),
(94, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 998, 1, '29-11-2024 23:30:48', 2),
(95, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 998, 1, '30-11-2024 00:38:49', 1),
(96, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 998, 1, '30-11-2024 00:40:10', 1),
(97, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 14983873, 3, '30-11-2024 00:41:39', 2),
(98, 2, 'Thanh HOá', '0365016573', 'abc123@gmail.com', 1, 399998, 3, '30-11-2024 01:58:26', 1),
(99, 2, '35', '0365016573', 'abc123@gmail.com', 1, 199999, 1, '30-11-2024 19:08:13', 1),
(100, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 399998, 1, '30-11-2024 19:27:10', 1),
(101, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 399998, 1, '30-11-2024 19:33:18', 1),
(102, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 19999997, 5, '30-11-2024 19:33:49', 1),
(103, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 3993994, 5, '30-11-2024 19:34:21', 2),
(104, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 0, 3, '01-12-2024 01:05:04', 0),
(105, 2, '', '', '', 0, 9982, 1, '30-11-2024 18:22:49', 1),
(106, 2, '', '', '', 0, 9982, 1, '30-11-2024 18:23:32', 1),
(107, 2, '', '', '', 0, 1999999, 1, '30-11-2024 18:23:54', 1),
(108, 2, '', '', '', 0, 9982, 1, '30-11-2024 18:25:42', 1),
(109, 2, '', '', '', 0, 48357843, 1, '30-11-2024 18:28:24', 1),
(110, 2, '', '', '', 0, 9982, 1, '30-11-2024 18:30:14', 1),
(111, 2, '', '', '', 0, 1999999, 1, '30-11-2024 18:32:34', 1),
(112, 2, '', '', '', 0, 1999999, 1, '01-12-2024 02:14:23', 1),
(113, 2, '', '', '', 0, 1999999, 1, '01-12-2024 02:14:57', 1),
(114, 2, '', '', '', 0, 1999999, 1, '01-12-2024 02:15:09', 1),
(115, 2, '', '', '', 0, 1993995, 1, '01-12-2024 02:16:42', 1),
(116, 2, '', '', '', 0, 1993995, 1, '01-12-2024 02:17:44', 1),
(117, 2, '', '', '', 0, 1993995, 1, '01-12-2024 02:17:57', 1),
(118, 2, '', '', '', 0, 14, 1, '01-12-2024 02:18:14', 1),
(119, 2, '', '', '', 0, 14, 1, '01-12-2024 02:19:46', 1),
(120, 2, '', '', '', 0, 14, 1, '01-12-2024 02:20:07', 1),
(121, 2, '', '', '', 0, 14, 1, '01-12-2024 02:21:29', 1),
(122, 2, '', '', '', 0, 14, 1, '01-12-2024 02:22:06', 1),
(123, 2, '', '', '', 0, 3988988, 1, '01-12-2024 13:18:15', 3),
(124, 4, 'titi', '0365016573', 'abc123@gmail.com', 0, 1993995, 5, '01-12-2024 17:51:51', 1),
(125, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 1993995, 3, '01-12-2024 17:51:57', 1),
(126, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 1993995, 3, '01-12-2024 17:52:00', 1),
(127, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 1993995, 3, '01-12-2024 17:55:02', 1),
(128, 2, 'mhieu67888@gmail.com', '0999999999', 'mhieu67888@gmail.com', 2, 998, 1, '01-12-2024 20:08:49', 1),
(129, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '01-12-2024 20:14:04', 1000),
(130, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 1, '01-12-2024 20:19:09', 1000),
(131, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 998, 2, '01-12-2024 20:20:19', 1000),
(132, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 1993995, 1, '01-12-2024 20:23:02', 1),
(133, 9, 'Hà Nội', '0365016573', 'hieum946@gmail.com', 1, 1999999, 1, '02-12-2024 14:02:48', 1),
(134, 2, '7457', '0365016573', 'doanhieu1625@gmail.com', 1, 400996, 3, '02-12-2024 17:51:03', 2),
(135, 2, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 1, '03-12-2024 11:37:30', 1),
(136, 2, 'Quảng Ninh', '0473743763', 'mhieu67888@gmail.com', 2, 19964, 1, '03-12-2024 12:29:15', 1),
(137, 2, 'Thanh Hoá', '0473743763', 'mhieu67888@gmail.com', 2, 2193994, 2, '03-12-2024 12:42:57', 2),
(138, 10, 'Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 4907835, 3, '03-12-2024 13:44:50', 2),
(139, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '03-12-2024 14:55:26', 1),
(140, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 199999, 1, '03-12-2024 15:03:16', 1),
(141, 10, '48785947', '0365016573', 'mhieu67888@gmail.com', 2, 14783874, 1, '03-12-2024 15:17:09', 100),
(142, 10, 'Nghệ an', '0365016573', 'mhieu67888@gmail.com', 1, 1993995, 1, '03-12-2024 15:17:50', 1),
(143, 10, '68789', '0365016573', 'mhieu67888@gmail.com', 1, 9982, 1, '03-12-2024 15:23:09', 100),
(144, 10, '568p', '0365016573', 'mhieu67888@gmail.com', 2, 9982, 1, '03-12-2024 15:23:40', 100),
(145, 10, 'hihi', '0365016573', 'mhieu67888@gmail.com', 2, 1993995, 1, '03-12-2024 15:49:46', 1),
(146, 10, 'huu', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '03-12-2024 15:51:01', 1000),
(147, 10, 'Nghệ an', '0365016573', 'mhieu67888@gmail.com', 1, 1993995, 1, '03-12-2024 16:20:10', 1),
(148, 10, 'vip', '0365016573', 'mhieu67888@gmail.com', 1, 1993995, 1, '03-12-2024 16:21:27', 1),
(149, 10, 'vip', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '03-12-2024 16:21:44', 1000),
(150, 10, 'Hà Tĩnh', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '03-12-2024 16:23:13', 1000),
(151, 10, 'hii', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '03-12-2024 16:25:31', 1000),
(152, 10, 'Nam Định', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '03-12-2024 16:25:54', 1000),
(153, 10, 'hy', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '03-12-2024 16:27:58', 1000),
(154, 2, 'udshjkfds', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 1, '03-12-2024 20:05:14', 1000),
(155, 2, 'Nghệ an', '0999999999', 'hieum946@gmail.com', 1, 14783874, 1, '03-12-2024 20:12:45', 1),
(156, 2, 'Hà Tĩnh', '0365016573', 'mhieu67888@gmail.com', 2, 1012, 1, '04-12-2024 09:52:22', 2),
(157, 2, 'Ninh Bình', '0365016573', 'doanhieu1625@gmail.com', 2, 199999, 1, '04-12-2024 09:54:11', 1),
(158, 2, 'Ninh Bình', '0365016573', 'doanhieu1625@gmail.com', 2, 14, 1, '04-12-2024 09:56:22', 1),
(159, 2, 'Nam Định', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 09:58:02', 1),
(160, 2, 'Nam Định', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 1, '04-12-2024 09:58:44', 1),
(161, 2, 'Nam Định', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 10:00:05', 1),
(162, 2, 'Sách sịn lắm', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 10:02:22', 1),
(163, 2, 'abc@gmail.com', '0365016573', 'abc@gmail.com', 2, 1999999, 1, '04-12-2024 10:06:02', 1),
(164, 10, 'abc@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 1993995, 1, '04-12-2024 10:09:20', 1),
(165, 10, 'abc@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 6182982, 1, '04-12-2024 10:16:39', 3),
(166, 10, 'Nghệ an', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '04-12-2024 10:30:55', 1000),
(167, 10, 'Ngheje an', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 10:31:13', 1000),
(168, 10, 'abc@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 1993995, 1, '04-12-2024 10:31:56', 1),
(169, 10, 'hieum946@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '04-12-2024 10:32:15', 1000),
(170, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 1993995, 1, '04-12-2024 10:32:43', 1),
(171, 10, 'Hà Tĩnh', '0365016573', 'mhieu67888@gmail.com', 2, 1993995, 1, '04-12-2024 10:44:16', 1),
(172, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '04-12-2024 10:52:52', 1000),
(173, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 1, '04-12-2024 10:53:21', 1000),
(174, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 11:23:48', 1),
(175, 10, 'Bình Dương', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '04-12-2024 11:27:13', 1000),
(176, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 998, 1, '04-12-2024 11:29:12', 1000),
(177, 10, 'Ninh Ninh', '0365016573', 'mhieu67888@gmail.com', 2, 14, 1, '04-12-2024 11:47:27', 1),
(178, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 9982, 1, '04-12-2024 12:09:29', 100),
(179, 10, 'Ninh ', '0365016573', 'mhieu67888@gmail.com', 2, 1993995, 1, '04-12-2024 12:24:10', 1),
(180, 10, 'Hà Nam', '0365016573', 'mhieu67888@gmail.com', 2, 1999999, 1, '04-12-2024 12:25:31', 1),
(181, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 2, 998, 6, '04-12-2024 12:31:44', 1),
(182, 10, 'mhieu67888@gmail.com', '0365016573', 'mhieu67888@gmail.com', 1, 199999, 1, '05-12-2024 10:15:01', 1),
(183, 10, 'N', '0365016573', 'mhieu67888@gmail.com', 1, 199999, 1, '05-12-2024 10:17:38', 1),
(184, 10, '8', '0365016573', 'mhieu67888@gmail.com', 2, 9982, 1, '05-12-2024 17:48:32', 1),
(185, 10, 'Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 9982, 1, '05-12-2024 19:38:18', 59),
(186, 2, 'Nga Sơn', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '06-12-2024 17:33:23', 1),
(187, 10, 'NGhệ an', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '06-12-2024 17:44:09', 1),
(188, 10, 'Nghệ tĩnh', '0365016573', 'mhieu67888@gmail.com', 1, 998, 1, '06-12-2024 17:46:11', 1),
(189, 2, 'Ninh Thuận', '0365016573', 'abc123@gmail.com', 1, 998, 1, '06-12-2024 17:51:52', 1),
(190, 2, 'Thanh Oai', '0365016573', 'hieum946@gmail.com', 1, 0, 1, '09-12-2024 22:31:55', 85),
(191, 2, 'abc123@gmail.com', '0365016573', 'abc123@gmail.com', 1, 0, 1, '11-12-2024 01:46:23', 60),
(192, 2, 'abc123@gmail.com', '0365016573', 'abc123@gmail.com', 1, 7975980, 1, '11-12-2024 01:52:00', 59),
(193, 4, 'titi', '0365016573', 'abc123@gmail.com', 1, 3799981, 2, '11-12-2024 11:22:55', 82),
(194, 2, 'Yên Mô, Ninh Bình', '0365016573', 'minhdh68@gmail.com', 1, 0, 1, '14-12-2024 10:29:31', 128),
(195, 2, 'Yên Mô, Ninh Bình', '0365016573', 'minhdh68@gmail.com', 1, 4897853, 1, '14-12-2024 10:33:19', 128),
(196, 2, 'Yên Mô, Ninh Bình', '0365016573', 'minhdh68@gmail.com', 1, 4897853, 1, '14-12-2024 10:34:08', 127),
(197, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 9795706, 1, '14-12-2024 10:34:42', 126),
(198, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:39:42', 1),
(199, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:40:37', 123),
(200, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:42:38', 122),
(201, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:42:43', 121),
(202, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:44:03', 120),
(203, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:44:52', 119),
(204, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 2, '14-12-2024 10:46:19', 118),
(205, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 1, '14-12-2024 10:47:20', 117),
(206, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 5, '14-12-2024 10:48:10', 116),
(207, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 5, '14-12-2024 10:49:38', 115),
(208, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 4897853, 5, '14-12-2024 10:52:00', 114),
(209, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 6891848, 5, '14-12-2024 11:58:10', 2),
(210, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 19601394, 3, '14-12-2024 12:21:01', 2),
(211, 2, 'Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 1993995, 3, '14-12-2024 13:21:26', 52),
(216, 4, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 599997, 4, '14-12-2024 17:27:29', 1),
(217, 4, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 1993995, 5, '14-12-2024 17:43:21', 1),
(218, 4, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 1999999, 4, '14-12-2024 17:51:17', 1),
(219, 4, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 3999998, 4, '14-12-2024 18:45:42', 1),
(220, 4, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'abc123@gmail.com', 1, 11795705, 5, '14-12-2024 20:44:48', 2),
(221, 2, 'Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 4897853, 5, '14-12-2024 22:26:51', 1),
(222, 2, 'Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 1999999, 0, '15-12-2024 09:12:33', 1),
(223, 2, 'Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 19999997, 5, '15-12-2024 09:18:41', 56),
(224, 2, 'Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 4897853, 5, '15-12-2024 11:15:16', 1),
(225, 11, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 64351619, 4, '15-12-2024 13:06:10', 2),
(226, 11, 'Yên Lâm, Yên Mô, Ninh Bình', '0365016573', 'mhieu67888@gmail.com', 1, 18888, 3, '15-12-2024 13:07:58', 1),
(227, 2, 'uhfhfhfhhf', '09876456777', 'hieudm05@gmail.com', 2, 199999, 0, '26-04-2025 09:40:25', 1),
(228, 2, 'uhfhfhfhhf', '09876456777', 'hieudm05@gmail.com', 1, 16777869, 4, '26-04-2025 10:01:11', 2),
(229, 2, 'uhfhfhfhhf', '09876456777', 'hieudm05@gmail.com', 2, 0, 0, '26-04-2025 10:04:29', 96);

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `id` int NOT NULL,
  `bill_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) GENERATED ALWAYS AS ((`quantity` * `price`)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`id`, `bill_id`, `product_id`, `quantity`, `price`) VALUES
(1, 96, 22, 1, '998.00'),
(2, 97, 30, 1, '14783874.00'),
(3, 97, 27, 1, '199999.00'),
(4, 98, 27, 2, '199999.00'),
(5, 99, 27, 1, '199999.00'),
(6, 100, 27, 2, '199999.00'),
(7, 101, 27, 2, '199999.00'),
(8, 102, 26, 1, '19999997.00'),
(9, 103, 25, 1, '1999999.00'),
(10, 103, 31, 1, '1993995.00'),
(11, 105, 20, 1, '9982.00'),
(12, 106, 20, 1, '9982.00'),
(13, 107, 25, 1, '1999999.00'),
(14, 108, 20, 1, '9982.00'),
(15, 109, 23, 1, '48357843.00'),
(16, 110, 20, 1, '9982.00'),
(17, 111, 25, 1, '1999999.00'),
(18, 112, 25, 1, '1999999.00'),
(19, 113, 25, 1, '1999999.00'),
(20, 114, 25, 1, '1999999.00'),
(21, 115, 31, 1, '1993995.00'),
(22, 116, 31, 1, '1993995.00'),
(23, 117, 31, 1, '1993995.00'),
(24, 118, 28, 1, '14.00'),
(25, 119, 28, 1, '14.00'),
(26, 120, 28, 1, '14.00'),
(27, 121, 28, 1, '14.00'),
(28, 122, 28, 1, '14.00'),
(29, 123, 31, 1, '1993995.00'),
(30, 123, 31, 1, '1993995.00'),
(31, 123, 22, 1, '998.00'),
(32, 124, 31, 1, '1993995.00'),
(33, 125, 31, 1, '1993995.00'),
(34, 126, 31, 1, '1993995.00'),
(35, 127, 31, 1, '1993995.00'),
(36, 128, 22, 1, '998.00'),
(37, 129, 22, 1, '998.00'),
(38, 130, 25, 1, '1999999.00'),
(39, 131, 22, 1, '998.00'),
(40, 132, 31, 1, '1993995.00'),
(41, 133, 25, 1, '1999999.00'),
(42, 134, 27, 2, '199999.00'),
(43, 134, 22, 1, '998.00'),
(44, 135, 25, 1, '1999999.00'),
(45, 136, 20, 2, '9982.00'),
(46, 137, 27, 1, '199999.00'),
(47, 137, 31, 1, '1993995.00'),
(48, 138, 24, 1, '4897853.00'),
(49, 138, 20, 1, '9982.00'),
(50, 139, 22, 1, '998.00'),
(51, 140, 27, 1, '199999.00'),
(52, 141, 30, 1, '14783874.00'),
(53, 142, 31, 1, '1993995.00'),
(54, 143, 20, 1, '9982.00'),
(55, 144, 20, 1, '9982.00'),
(56, 145, 31, 1, '1993995.00'),
(57, 146, 25, 1, '1999999.00'),
(58, 147, 31, 1, '1993995.00'),
(59, 148, 31, 1, '1993995.00'),
(60, 149, 25, 1, '1999999.00'),
(61, 150, 22, 1, '998.00'),
(62, 151, 22, 1, '998.00'),
(63, 152, 22, 1, '998.00'),
(64, 153, 25, 1, '1999999.00'),
(65, 154, 25, 1, '1999999.00'),
(66, 155, 30, 1, '14783874.00'),
(67, 156, 28, 1, '14.00'),
(68, 156, 22, 1, '998.00'),
(69, 157, 27, 1, '199999.00'),
(70, 158, 28, 1, '14.00'),
(71, 159, 22, 1, '998.00'),
(72, 160, 25, 1, '1999999.00'),
(73, 161, 22, 1, '998.00'),
(74, 162, 22, 1, '998.00'),
(75, 163, 25, 1, '1999999.00'),
(76, 164, 31, 1, '1993995.00'),
(77, 165, 22, 1, '998.00'),
(78, 165, 27, 1, '199999.00'),
(79, 165, 31, 3, '1993995.00'),
(80, 166, 25, 1, '1999999.00'),
(81, 167, 22, 1, '998.00'),
(82, 168, 31, 1, '1993995.00'),
(83, 169, 25, 1, '1999999.00'),
(84, 170, 31, 1, '1993995.00'),
(85, 171, 31, 1, '1993995.00'),
(86, 172, 25, 1, '1999999.00'),
(87, 173, 25, 1, '1999999.00'),
(88, 174, 22, 1, '998.00'),
(89, 175, 25, 1, '1999999.00'),
(90, 176, 22, 1, '998.00'),
(91, 177, 28, 1, '14.00'),
(92, 178, 20, 1, '9982.00'),
(93, 179, 31, 1, '1993995.00'),
(94, 180, 25, 1, '1999999.00'),
(95, 181, 22, 1, '998.00'),
(96, 182, 27, 1, '199999.00'),
(97, 183, 27, 1, '199999.00'),
(98, 184, 20, 1, '9982.00'),
(99, 185, 20, 1, '9982.00'),
(100, 186, 22, 1, '998.00'),
(101, 187, 22, 1, '998.00'),
(102, 188, 22, 1, '998.00'),
(103, 189, 22, 1, '998.00'),
(104, 192, 31, 4, '1993995.00'),
(105, 193, 27, 19, '199999.00'),
(106, 195, 24, 1, '4897853.00'),
(107, 196, 24, 1, '4897853.00'),
(108, 197, 24, 2, '4897853.00'),
(109, 198, 24, 1, '4897853.00'),
(110, 199, 24, 1, '4897853.00'),
(111, 200, 24, 1, '4897853.00'),
(112, 201, 24, 1, '4897853.00'),
(113, 202, 24, 1, '4897853.00'),
(114, 203, 24, 1, '4897853.00'),
(115, 204, 24, 1, '4897853.00'),
(116, 205, 24, 1, '4897853.00'),
(117, 206, 24, 1, '4897853.00'),
(118, 207, 24, 1, '4897853.00'),
(119, 208, 24, 1, '4897853.00'),
(120, 209, 24, 1, '4897853.00'),
(121, 209, 31, 1, '1993995.00'),
(122, 210, 20, 1, '9982.00'),
(123, 210, 24, 4, '4897853.00'),
(124, 211, 31, 1, '1993995.00'),
(125, 216, 27, 3, '199999.00'),
(126, 217, 31, 1, '1993995.00'),
(127, 218, 25, 1, '1999999.00'),
(128, 219, 25, 2, '1999999.00'),
(129, 220, 25, 1, '1999999.00'),
(130, 220, 24, 2, '4897853.00'),
(131, 221, 24, 1, '4897853.00'),
(132, 222, 25, 1, '1999999.00'),
(133, 223, 26, 1, '19999997.00'),
(134, 224, 24, 1, '4897853.00'),
(135, 225, 29, 1, '19999997.00'),
(136, 225, 30, 3, '14783874.00'),
(137, 226, 32, 1, '18888.00'),
(138, 227, 27, 1, '199999.00'),
(139, 228, 30, 1, '14783874.00'),
(140, 228, 31, 1, '1993995.00');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation_reasons`
--

CREATE TABLE `cancellation_reasons` (
  `id` int NOT NULL,
  `idBill` int DEFAULT NULL,
  `idUser` int DEFAULT NULL,
  `reasons` text,
  `at_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cancellation_reasons`
--

INSERT INTO `cancellation_reasons` (`id`, `idBill`, `idUser`, `reasons`, `at_time`) VALUES
(1, 102, 4, 'Tôi không thích nó', '2024-12-14 20:10:59'),
(2, 220, 4, 'Hơi tệ í', '2024-12-14 21:04:42'),
(3, 221, 2, 'Hàng không được như í lắm', '2024-12-15 00:08:03'),
(4, 207, 2, 'Tôi muốn huỷ hàng', '2024-12-15 00:10:31'),
(5, 223, 2, 'tệ lắm', '2024-12-15 09:21:29'),
(6, 224, 2, 'tệ lắm', '2024-12-15 11:15:38'),
(7, 225, 11, 'tệ', '2024-12-15 13:07:00'),
(8, 225, 11, 'huỷ', '2024-12-15 13:07:09'),
(9, 225, 11, 'huỷ', '2024-12-15 13:07:41'),
(10, 228, 2, 'dfghjgfj', '2025-04-26 10:01:40'),
(11, 228, NULL, NULL, '2025-04-26 10:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `idUser` int DEFAULT NULL,
  `idpro` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT '0.00',
  `soluong` int DEFAULT NULL,
  `thanhtien` decimal(20,2) DEFAULT NULL,
  `idbill` int DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime DEFAULT NULL,
  `status` int DEFAULT '0',
  `remaining_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `idUser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`, `mota`, `created_at`, `status`, `remaining_quantity`) VALUES
(302, 10, 24, 'uploads/674052ddc1907-favicon-16x16.png', 'Đoàn Minh Hiếu', 4897853.00, 1, '4897853.00', NULL, 'hii', '2024-12-06 18:04:52', 0, 1),
(506, 2, 31, 'uploads/6749936e81ee0-2023_12_11_09_40_27_1-390x510_9359c05768544cf3ab724dac55ffd8c2_medium.webp', 'Dậy thì ơi', 1993995.00, 1, '1993995.00', NULL, 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn.', '2025-04-26 10:02:50', 0, 46);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Sách tôn giáo 6'),
(16, 'Sách văn học'),
(17, 'Sách thiếu nhi');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `idpro` int NOT NULL,
  `idUser` int NOT NULL,
  `noidung` text NOT NULL,
  `time` varchar(30) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `idpro`, `idUser`, `noidung`, `time`, `status`) VALUES
(5, 20, 2, 'sản phẩm đẹp tuyệt', '2024-11-25 09:23:47', 1),
(9, 20, 4, 'sản phẩm như cặc\r\n', '2024-11-28 21:44:05', 1),
(13, 24, 2, 'Đểu', '2024-12-10 22:38:01', 1),
(14, 22, 2, 'tuyệt với ', '2024-12-15 00:34:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `pro_id` int NOT NULL,
  `added_at` datetime NOT NULL COMMENT 'Thời gian yêu thích'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `pro_id`, `added_at`) VALUES
(2, 1, 24, '2024-11-27 23:57:38'),
(4, 1, 24, '2024-11-29 00:05:04'),
(5, 1, 20, '2024-11-29 02:42:21'),
(8, 9, 28, '2024-12-01 14:59:13'),
(10, 10, 22, '2024-12-05 11:30:44'),
(11, 2, 25, '2024-12-15 00:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `namesp` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `img` varchar(255) DEFAULT NULL,
  `mota` text,
  `luotxem` int NOT NULL DEFAULT '0',
  `iddm` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `namesp`, `price`, `img`, `mota`, `luotxem`, `iddm`, `quantity`, `created_at`) VALUES
(20, 'Sách tiếng việt', '9982.00', 'uploads/673f5e7bcc4a5-favicon.ico', 'hay lắm', 0, 16, 94, NULL),
(22, 'Sách hiện đại', '998.00', 'uploads/673f60226e0a5-information5.jpg', 'hiid', 0, 3, 0, NULL),
(23, 'Đất rừng phương nam', '48357843.00', 'uploads/673f678d8fbcb-dat-rung-phuong-nam-phien-ban-dien-anh.jpg', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn. Chúng có thể thuộc nhiều thể loại khác nhau, từ giả tưởng đến thực tế, từ khoa học đến văn học, từ hướng dẫn thực hành đến nghệ thuật sáng tạo.', 0, 16, 1000, NULL),
(24, 'Đoàn Minh Hiếu', '4897853.00', 'uploads/674052ddc1907-favicon-16x16.png', 'hii', 0, 3, 1, NULL),
(25, 'Những kẻ âu lo', '1999999.00', 'uploads/67498c1a410ee-8934974175643-1-1_6d2bd6f20e2c4230aad175aff5231c6a_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn. Chúng có thể thuộc nhiều thể loại khác nhau, từ giả tưởng đến thực tế, từ khoa học đến văn học, từ hướng dẫn thực hành đến nghệ thuật sáng tạo.', 0, 16, 4, NULL),
(26, 'Những đàn ông mang tên OVE', '19999997.00', 'uploads/67498d79b5aec-8934974182375_c4541188573a4a24b9d454c91deeb9ba_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn. Chúng có thể thuộc nhiều thể loại khác nhau, từ giả tưởng đến thực tế, từ khoa học đến văn học, từ hướng dẫn thực hành đến nghệ thuật sáng tạo.', 0, 16, 56, NULL),
(27, 'Bà ngoại gửi lời xin lỗi', '199999.00', 'uploads/67499014f129b-8934974185086_1_01db5450a212484da9b6cf4139c4a867_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn. Chúng có thể thuộc nhiều thể loại khác nhau, từ giả tưởng đến thực tế, từ khoa học đến văn học, từ hướng dẫn thực hành đến nghệ thuật sáng tạo.', 0, 17, 81, NULL),
(28, 'Dư hoa', '14.00', 'uploads/6749910769dea-8935235242951_cb17500af736472d80c3d24a64712d24_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn. Chúng có thể thuộc nhiều thể loại khác nhau, từ giả tưởng đến thực tế, từ khoa học đến văn học, từ hướng dẫn thực hành đến nghệ thuật sáng tạo.', 0, 3, 0, NULL),
(29, 'Thế giới huyền ảo', '19999997.00', 'uploads/674991e9193c6-the-gioi-rat-huyen-nao_-la-chinh-minh-duoc-roi-01_b9b0e69077524371a6c311e0a9890de4_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn.', 0, 17, 878899, NULL),
(30, 'Đầu tư vàng', '14783874.00', 'uploads/6749926b0e09b-untitled_-_2024-11-18t111622.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn.', 0, 17, 96, NULL),
(31, 'Dậy thì ơi', '1993995.00', 'uploads/6749936e81ee0-2023_12_11_09_40_27_1-390x510_9359c05768544cf3ab724dac55ffd8c2_medium.webp', 'Sách là những “kho tàng tri thức” dưới dạng văn bản, hình ảnh hoặc đồ họa được đóng thành cuốn.', 0, 17, 46, NULL),
(32, 'Thế lợi cạnh tranh tập 1', '18888.00', 'uploads/675e694080ecd-Sach-loi-the-canh-tranh.jpg', 'Sách độc quyền duy nhất có tại website này!', 0, 3, 50, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cancellation_reasons`
--
ALTER TABLE `cancellation_reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBill` (`idBill`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idbill` (`idbill`),
  ADD KEY `idpro` (`idpro`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `cancellation_reasons`
--
ALTER TABLE `cancellation_reasons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `bill_items_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`);

--
-- Constraints for table `cancellation_reasons`
--
ALTER TABLE `cancellation_reasons`
  ADD CONSTRAINT `cancellation_reasons_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bills` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cancellation_reasons_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`idpro`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
