-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 09:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilatech_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `checkin` varchar(200) DEFAULT NULL,
  `checkout` varchar(200) DEFAULT NULL,
  `leave_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `leave_date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`) VALUES
(1, 'Trichy - KK Nagar'),
(2, 'Karur - Thirukkampuliyur'),
(3, 'Karur - Mahadhanapuram'),
(4, 'Trichy - Thiruvallarai');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_code` varchar(200) NOT NULL,
  `task_count` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_code`, `task_count`, `status`, `created_at`, `updated_at`, `active`) VALUES
(2, 'RAS i4 PLC-v5.01', 'NR24100', 13, 0, '2025-01-23 05:20:47', '2025-01-23 10:50:47', 0),
(3, 'ANALOG-v1.0', 'NR24101', 13, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0),
(4, 'MOTION CONT-v3.0', 'NR24108', 13, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0),
(5, 'Eight Channel-v3.0', 'NR24106', 13, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0),
(6, 'GOGGLES-v2.0', 'NR24114', 13, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0),
(7, 'FPGA', 'NR24113', 3, 0, '2025-01-23 05:33:00', '2025-01-23 11:03:00', 0),
(8, 'HYDRAULIC CONTROLLER', 'NR24110', 4, 0, '2025-01-23 05:33:47', '2025-01-23 11:03:47', 0),
(9, 'WELDING CONTROLLER', 'NR24119', 4, 0, '2025-01-23 05:34:33', '2025-01-23 11:04:33', 0),
(10, 'NRAX65_RCI', 'NR24103', 9, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0),
(11, 'RANE-DISK PAD', 'NR24118', 13, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0),
(12, 'FLICKERING(SK)v2.0', 'NR24107', 13, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0),
(13, 'WELDING WIRE FEEDR', 'NR24117', 13, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0),
(14, 'TERMINAL BLOCK', 'NR24116', 3, 0, '2025-01-23 05:42:56', '2025-01-23 11:12:56', 0),
(15, 'LINA Battery', 'NR24105', 4, 0, '2025-01-23 05:43:53', '2025-01-23 11:13:53', 0),
(16, 'UI DESIGN', 'NR24120', 4, 0, '2025-01-23 05:45:13', '2025-01-23 11:15:13', 0),
(18, 'Smart Bag Count', 'NR24104', 4, 0, '2025-01-25 00:24:57', '2025-01-25 05:54:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'software '),
(3, 'embedded'),
(4, 'designer'),
(5, 'designer_autoCAD');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `duration` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `project_id`, `user_id`, `status`, `created_at`, `updated_at`, `duration`, `active`) VALUES
(2, 'PCB design', 2, 9, 1, '2025-01-23 05:20:47', '2025-01-23 10:50:47', 0, 1),
(3, 'Support', 2, 20, 1, '2025-01-23 05:20:47', '2025-01-23 10:50:48', 0, 0),
(4, 'PCB QC', 2, 8, 1, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(5, 'PURCHASE', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(6, 'Soldering', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(7, 'Soldering QC', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(8, 'Software', 2, 1, 1, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(9, 'Programme', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(10, 'CAD Design', 2, 24, 1, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(11, '3D Print', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(12, 'Matel case', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(13, 'Testing in LAB', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(14, 'Testing in FAC', 2, NULL, 0, '2025-01-23 05:20:48', '2025-01-23 10:50:48', 0, 0),
(15, 'R & D', 3, 17, 1, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(16, 'PCB design', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(17, 'Support', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(18, 'PCB QC', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(19, 'PURCHASE', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(20, 'Soldering', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(21, 'Soldering QC', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(22, 'Software', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(23, 'Programme', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(24, 'CAD Design', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(25, '3D Print', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(26, 'Matel Case', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(27, 'Testing in LAB', 3, NULL, 0, '2025-01-23 05:23:36', '2025-01-23 10:53:36', 0, 0),
(28, 'R & D', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(29, 'PCB design', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(30, 'Support', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(31, 'PCB QC', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(32, 'PURCHASE', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(33, 'Soldering', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(34, 'Soldering QC', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(35, 'Software OTA', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(36, 'Programme', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(37, 'CAD Design', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(38, '3D Print', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(39, 'Matel case', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(40, 'Testing in LAB', 4, NULL, 0, '2025-01-23 05:26:48', '2025-01-23 10:56:48', 0, 0),
(41, 'R & D', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(42, 'PCB design', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(43, 'Support', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(44, 'PCB QC', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(45, 'PURCHASE', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(46, 'Soldering', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(47, 'Soldering QC', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(48, 'Software OTA', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(49, 'Programme', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(50, 'CAD Design', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(51, '3D Print', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(52, 'Matel case', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(53, 'Testing in LAB', 5, NULL, 0, '2025-01-23 05:28:38', '2025-01-23 10:58:38', 0, 0),
(54, 'R & D', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(55, 'Testing 2', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(56, 'PURCHASE', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(57, 'Client Feedback', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(58, 'CAD Design 2', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(59, '3D Print', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(60, 'Discussion', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(61, 'Client Feedback', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(62, 'CAD Design 3', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(63, '3D Print', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(64, 'Discussion', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(65, 'Client Feedback', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(66, 'Testing 3', 6, NULL, 0, '2025-01-23 05:32:26', '2025-01-23 11:02:26', 0, 0),
(67, 'R & D', 7, NULL, 0, '2025-01-23 05:33:00', '2025-01-23 11:03:00', 0, 0),
(68, 'PCB design', 7, NULL, 0, '2025-01-23 05:33:00', '2025-01-23 11:03:00', 0, 0),
(69, 'Testing in LAB', 7, NULL, 0, '2025-01-23 05:33:00', '2025-01-23 11:03:00', 0, 0),
(70, 'R & D', 8, NULL, 0, '2025-01-23 05:33:47', '2025-01-23 11:03:47', 0, 0),
(71, 'PCB design', 8, NULL, 0, '2025-01-23 05:33:47', '2025-01-23 11:03:47', 0, 0),
(72, 'Testing in LAB', 8, NULL, 0, '2025-01-23 05:33:47', '2025-01-23 11:03:47', 0, 0),
(73, 'Design', 8, NULL, 0, '2025-01-23 05:33:47', '2025-01-23 11:03:47', 0, 0),
(74, 'R & D', 9, NULL, 0, '2025-01-23 05:34:33', '2025-01-23 11:04:33', 0, 0),
(75, 'PCB design', 9, NULL, 0, '2025-01-23 05:34:33', '2025-01-23 11:04:33', 0, 0),
(76, 'Testing in LAB', 9, NULL, 0, '2025-01-23 05:34:33', '2025-01-23 11:04:33', 0, 0),
(77, 'Design', 9, NULL, 0, '2025-01-23 05:34:33', '2025-01-23 11:04:33', 0, 0),
(78, 'R & D', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(79, 'Testing MECH', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(80, 'PURCHASE', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(81, 'CAD Design', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(82, '3D Print', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(83, 'Testing 2', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(84, 'Software', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(85, 'Testing', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(86, 'Programme', 10, NULL, 0, '2025-01-23 05:36:16', '2025-01-23 11:06:16', 0, 0),
(87, 'R & D', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(88, 'Meeting', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(89, 'Demo', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(90, 'Programme', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(91, 'Programme QC', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(92, 'PURCHASE', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(93, 'Soldering', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(94, 'Soldering QC', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(95, 'Software', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(96, 'Software QC', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(97, 'CAD Design', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(98, '3D Print', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(99, 'Matel Case', 11, NULL, 0, '2025-01-23 05:38:15', '2025-01-23 11:08:15', 0, 0),
(100, 'R & D', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(101, 'PCB design', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(102, 'Support', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(103, 'PCB QC', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(104, 'PURCHASE', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(105, 'Soldering', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(106, 'Soldering QC', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(107, 'Software', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(108, 'Programme', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(109, 'CAD Design', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(110, '3D Print', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(111, 'Matel Case', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(112, 'Testing in LAB', 12, NULL, 0, '2025-01-23 05:39:54', '2025-01-23 11:09:54', 0, 0),
(113, 'R & D', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(114, 'DEMO', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(115, 'PCB design', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(116, 'PCB QC', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(117, 'Quotation', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(118, 'Customer order', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(119, 'Soldering', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(120, 'Soldering QC', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(121, 'Software', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(122, 'Software QC', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(123, 'CAD Design', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(124, '3D Print', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(125, 'Testing in LAB', 13, NULL, 0, '2025-01-23 05:41:57', '2025-01-23 11:11:57', 0, 0),
(126, 'Supplier Check', 14, NULL, 0, '2025-01-23 05:42:56', '2025-01-23 11:12:56', 0, 0),
(127, 'CAD Design', 14, NULL, 0, '2025-01-23 05:42:56', '2025-01-23 11:12:56', 0, 0),
(128, '3D Print', 14, NULL, 0, '2025-01-23 05:42:56', '2025-01-23 11:12:56', 0, 0),
(129, 'Testing', 15, NULL, 0, '2025-01-23 05:43:53', '2025-01-23 11:13:53', 0, 0),
(130, 'Client Feedback', 15, NULL, 0, '2025-01-23 05:43:53', '2025-01-23 11:13:53', 0, 0),
(131, 'CAD Design', 15, NULL, 0, '2025-01-23 05:43:53', '2025-01-23 11:13:53', 0, 0),
(132, '3D Print', 15, NULL, 0, '2025-01-23 05:43:53', '2025-01-23 11:13:53', 0, 0),
(133, 'Display Design', 16, NULL, 0, '2025-01-23 05:45:13', '2025-01-23 11:15:13', 0, 0),
(134, 'Games Design', 16, NULL, 0, '2025-01-23 05:45:13', '2025-01-23 11:15:13', 0, 0),
(135, 'Academy LOGO', 16, NULL, 0, '2025-01-23 05:45:13', '2025-01-23 11:15:13', 0, 0),
(136, 'PPT', 16, NULL, 0, '2025-01-23 05:45:13', '2025-01-23 11:15:13', 0, 0),
(137, 'as', 17, NULL, 0, '2025-01-25 00:13:44', '2025-01-25 05:43:44', 0, 0),
(138, 'R & D', 18, NULL, 0, '2025-01-25 00:24:57', '2025-01-25 05:54:57', 0, 0),
(139, 'Testing 2', 18, NULL, 0, '2025-01-25 00:24:57', '2025-01-25 05:54:57', 0, 0),
(140, 'CAD Design', 18, NULL, 0, '2025-01-25 00:24:57', '2025-01-25 05:54:57', 0, 0),
(141, '3D Print', 18, NULL, 0, '2025-01-25 00:24:57', '2025-01-25 05:54:57', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `joiningdate` date NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `role_id` varchar(11) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `active` int(11) DEFAULT 0 COMMENT '0=active,1=inactive',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `dob`, `address`, `bloodgroup`, `mail`, `contact`, `joiningdate`, `emp_id`, `role_id`, `gender`, `active`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '$2y$10$ty/KpGlXQxcqNl.1Zqaq9.Vf0G14ZC1VK9RDbiaDU5hf2OxERiRrm', '1999-02-15', 'Pudukkottai', 'AB+ve', 'male', '9876543211', '0000-00-00', 'EMP01', '1', 'male', 0, NULL, NULL),
(2, 'JAWAHAR P', '$2y$10$ehzK/dOOBlsAQyT03W/Ql.CwMa8wVj/iVUPlQx2HT/BQuBiJ3l8dy', '1974-11-27', 'Trichy', 'O-', 'jawa@nilatech.com', '7305972711', '2025-07-07', 'NR001', '1', 'Male', 0, NULL, NULL),
(3, 'SENTHILVELAN J', '$2y$10$OsIA7WlISKZjfMDMnzsGGOMnl.GUJohqkqb4t5cQegrPRutGBbn/W', '1980-01-09', 'Trichy', 'O+ve', 'senthil@nilatech.com', '9363359922', '2025-07-07', 'NR002', '1', 'Male', 0, NULL, NULL),
(4, 'THULASIMANI V', '$2y$10$IJjTj/z6kGX3znhMazU3zuwuNPqIt1d6ypkGRlpUh/u6OTa5x6ZMa', '1992-06-30', 'Trichy', 'B+ve', 'thulasi@nilatech.com', '7358825385', '2025-07-07', 'NR003', '2', 'Female', 0, NULL, NULL),
(5, 'KANAGARAJ P', '$2y$10$j5EU8UZrkDm9uYT7LJQliOhjTRkW456BtFFvXVThOCTt7G2bOwz6y', '2025-01-16', 'Trichy', 'O+ve', 'gemtrichypolish@gmail.com', '9543870300', '2025-07-07', 'NR004', '2', 'Male', 0, NULL, NULL),
(6, 'KAMARUDDIN S', '$2y$10$nybQrXayIx3XzK/Q6pwc0OfSInAbQ8P8O3wIG.beUWbIm/IlwQ.mK', '1987-12-06', 'Trichy', 'O+ve', 'kamar@nilatech.com', '9865620926', '2025-01-24', 'NR005', '2', 'Male', 0, NULL, NULL),
(7, 'SHANMUGASUNDARAM N', '$2y$10$t0bLTA1iYNm9mf2/y7kdeOYLCDODMcFaZpTE60ud//SbcRjm525U.', '1972-08-05', 'Trichy', 'A1B-', 'kumarnilatech@gmail.com', '9750254524', '2025-01-24', 'NR006', '2', 'Male', 0, NULL, NULL),
(8, 'MALVINO T', '$2y$10$oxyi88p6T4amKIIHwwiKe.yL6aei4k6GU.i7UrY5Bx1GigAiBEpTO', '1990-11-30', 'Trichy', 'O+ve', 'malvino@nilatech.com', '8667337672', '2025-01-24', 'NR007', '2', 'Male', 0, NULL, NULL),
(9, 'VEERABHAGU MURUGAN E', '$2y$10$ZEzX.l3sf/oaoWKnOXM3duQ6ULjkhNRMKK2ofj6CC63N4vuEFJc7.', '1988-12-31', 'Trichy', 'B+ve', 'veera@nilatech.com', '9087654321', '2025-01-24', 'NR008', '2', 'Male', 1, NULL, NULL),
(10, 'VAIRAMOORTHY K', '$2y$10$XT2EYV9tHc7qPpu2xQAwyetiTxY1RiHuo2qL25MecclnF.DOlqUHa', '1990-09-12', 'Trichy', 'O+ve', 'kathanamutha@gmail.com', '7010100912', '2025-01-24', 'NR009', '2', 'Male', 0, NULL, NULL),
(11, 'SANTHIYA SS', '$2y$10$lYJ8fuyZNA.GaQAQ5cC5Xu5MBs/dS.TqqCYPSPSaEheuLqjqpNqZ2', '1999-02-15', 'Trichy', 'AB+', 'santhiya@nilatech.com', '9003442702', '2025-01-24', 'NR010', '1', 'Male', 0, NULL, NULL),
(12, 'LOGANATHAN K', '$2y$10$99UOJtIxkQCmisAWi1frDOL5MEQSDi.xJ/j4gcLPQUStKL6G9DFwa', '1992-02-11', 'Trichy', 'O+ve', 'loganathan@nilatech.com', '8300750337', '2025-01-24', 'NR011', '2', 'Male', 0, NULL, NULL),
(13, 'VISHNU M', '$2y$10$nZLrk9.S7k8zHuWY.5PqAO.fxM63S9dnH/77YI6rLAALeoZWGgs2S', '2003-11-10', 'Trichy', 'B+ve', 'vishnutn472003@gmail.com', '9344308005', '2025-01-24', 'NR013', '2', 'Male', 0, NULL, NULL),
(14, 'SATHISH S', '$2y$10$SrHtcvfQpRAxNjWzXk/UC.7nm8lLlHtMhGizaRP/Fp857VMVGK3ze', '2000-07-23', 'Trichy', 'AB+', 'ssathish0723@gmail.com', '8608566964', '2025-01-24', 'NR014', '2', 'Male', 0, NULL, NULL),
(16, 'SRI KRISHNA KUMAR S', '$2y$10$8uCAohifLVOV0aJ5.iMXJ.3WzqoLWjfd9NOcXfNHQ9aNJjYfmNV4a', '2005-06-19', 'Trichy', 'O+ve', 'krishna@nilatech.com', '9566796184', '2024-05-03', 'NR0017', '2', 'Male', 0, NULL, NULL),
(17, 'PRAVEEN K', '$2y$10$P/UOE/hswxNJ9Wj2YiM1J.tSFWHK1wUfIGCEbexNxt6uQ0j.A/oKW', '1995-05-09', 'Trichy', 'B+ve', 'praveen09291995@gmail.com', '9750358190', '2025-01-24', 'NR018', '2', 'Male', 0, NULL, NULL),
(18, 'ARUMUGAM S', '$2y$10$AJoxVOaAoEyYj0fEYqqfeuCyAYpe4GGBprv4j7EdCTY/hybB/YlH.', '2025-01-07', 'Trichy', 'B+ve', 'arumugavel55881@gmail.com', '9442728744', '2025-01-24', 'NR0019', '2', 'Male', 0, NULL, NULL),
(19, 'BALAJI R', '$2y$10$xX2lj89VxEAw/KYiesNmOesXvjwfok64M0URmBoP8CsDvGDk0KrBG', '2003-09-06', 'Trichy', 'B+ve', 'electro@nilatech.com', '6382138391', '2025-01-24', 'NR0020', '2', 'Male', 0, NULL, NULL),
(20, 'THOWFIK RAHMAN J', '$2y$10$uns4Bp5amxXE0V0avFj2ueNpZh8O95zkUaI.dozciigOCTkcuqr9u', '1999-10-18', 'Trichy', 'B+ve', 'thowfik@nillatech.com', '9788529118', '2025-01-24', 'NR0022', '2', 'Male', 0, NULL, NULL),
(21, 'SANTHOSH KUMAR A', '$2y$10$i4sv8p5Ic3/O8VmQOaqMuuVs9CH0G1867.uqdcdnO9YeRvLewqwuO', '2004-03-21', 'Trichy', 'O+ve', 'asanthosh2134@gmail.com', '9629173872', '2025-01-24', 'NR0023', '2', 'Male', 0, NULL, NULL),
(22, 'SHARAN SS', '$2y$10$Nlagvfx19eqEYbQ9h6V2xu6BsLxFna1wu4OXR1owmmiId1atH8qUe', '2002-05-05', 'Trichy', 'A1+', 'sharanshiva2002@gmail.com', '6383260073', '2025-01-24', 'NR024', '2', 'Male', 0, NULL, NULL),
(23, 'RAMESH S', '$2y$10$XiEIyVGCgW0RxaYx2yvM5unCYJEJbuV17k3Wupt8n9wpUDaWu7U4S', '2003-06-20', 'Trichy', 'B+ve', 'ramesh@nilatech.com', '6384536475', '2025-01-24', 'NR015', '2', 'Male', 0, NULL, NULL),
(24, 'ABDUL SATHAR A', '$2y$10$O3.K1egQXWcLPejdKVuuDe/vW7w1BBCJYdd85I8UtShjgJmmZTBlG', '1985-03-05', 'Trichy', 'A1B+', 'abdul@nilatech.com', '9092238990', '2025-01-24', 'NR016', '2', 'Male', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
