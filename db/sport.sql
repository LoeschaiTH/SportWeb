-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 03:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_detail`
--

CREATE TABLE `sp_detail` (
  `detail_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `status_lend` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `lent_date_strat` datetime NOT NULL,
  `lend_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_detail`
--

INSERT INTO `sp_detail` (`detail_id`, `history_id`, `equipment_id`, `status_lend`, `fine`, `lent_date_strat`, `lend_date_end`) VALUES
(1, 2, 3, 1, 0, '2022-10-20 20:59:09', '2022-11-19 00:00:00'),
(2, 3, 4, 1, 0, '2022-10-20 20:59:25', '2022-11-19 00:00:00'),
(3, 4, 1, 1, 0, '2022-10-20 22:24:23', '2022-11-19 00:00:00'),
(4, 5, 1, 0, 0, '2022-10-21 13:26:17', '2022-11-20 00:00:00'),
(5, 5, 4, 0, 0, '2022-10-21 13:26:17', '2022-11-20 00:00:00'),
(6, 5, 30, 0, 0, '2022-10-21 13:26:17', '2022-11-20 00:00:00'),
(7, 6, 35, 0, 0, '2022-10-21 13:33:57', '2022-11-20 00:00:00'),
(8, 6, 36, 0, 0, '2022-10-21 13:33:57', '2022-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sp_equipment`
--

CREATE TABLE `sp_equipment` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `equipment_date` datetime NOT NULL,
  `equipment_status` varchar(20) NOT NULL,
  `equipment_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_equipment`
--

INSERT INTO `sp_equipment` (`equipment_id`, `equipment_name`, `equipment_date`, `equipment_status`, `equipment_code`) VALUES
(1, 'ลูกบาส', '2022-10-20 00:00:00', 'ถูกยืม', '001'),
(3, 'ไม้แบดมินตัน', '2022-10-20 00:00:00', 'หาย', '003'),
(4, 'ลูกเปตอง', '2022-10-20 00:00:00', 'ถูกยืม', '004'),
(30, 'ลูกวอลเลย์บอล', '2022-10-21 00:00:00', 'ถูกยืม', '005'),
(31, 'ลูกฟุตบอล', '2022-10-21 00:00:00', 'หาย', '006'),
(32, 'ลูกเทนนิส', '2022-10-21 00:00:00', 'ปกติ', '007'),
(33, 'ไม้ปิงปอง', '2022-10-21 00:00:00', 'ปกติ', '008'),
(34, 'ไม้เทนนิส', '2022-10-21 00:00:00', 'ปกติ', '08'),
(35, 'ตาข่ายแบดมินตัน', '2022-10-21 00:00:00', 'ถูกยืม', '009'),
(36, 'ลูกแบดมินตัน', '2022-10-21 00:00:00', 'ถูกยืม', '010');

-- --------------------------------------------------------

--
-- Table structure for table `sp_history`
--

CREATE TABLE `sp_history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_history`
--

INSERT INTO `sp_history` (`history_id`, `user_id`, `history_date`, `history_status`) VALUES
(1, 2, '2022-10-20 16:35:57', 0),
(2, 3, '2022-10-20 20:59:09', 0),
(3, 3, '2022-10-20 20:59:25', 0),
(4, 3, '2022-10-20 22:24:23', 0),
(5, 5, '2022-10-21 13:26:17', 0),
(6, 5, '2022-10-21 13:33:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sp_user`
--

CREATE TABLE `sp_user` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_user`
--

INSERT INTO `sp_user` (`user_id`, `student_id`, `password`, `name`, `lastname`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '', 1),
(3, '63313879', '1234', 'เลิศชาย', 'แสนประสิทธิ์', 0),
(4, '63314111', '1234', 'วัชรพงศ์', 'แพงอ่อน', 0),
(5, '63313480', '1234', 'ภควัต', 'เทพมะที', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_detail`
--
ALTER TABLE `sp_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `sp_equipment`
--
ALTER TABLE `sp_equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `sp_history`
--
ALTER TABLE `sp_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `sp_user`
--
ALTER TABLE `sp_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_detail`
--
ALTER TABLE `sp_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sp_equipment`
--
ALTER TABLE `sp_equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sp_history`
--
ALTER TABLE `sp_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_user`
--
ALTER TABLE `sp_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
