-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 07:27 AM
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
-- Database: `pcbuild`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `mainboard` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `psu` varchar(100) NOT NULL,
  `score` int(255) NOT NULL,
  `Game_type` varchar(100) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `user_id`, `cpu`, `mainboard`, `ram`, `storage`, `psu`, `score`, `Game_type`, `createTime`) VALUES
(1, '6', '', '', '', '', '', 140, 'Timer', '2024-09-05 04:52:03'),
(2, '3', '', '', '', '', '', 190, 'Timer', '2024-09-05 05:00:51'),
(3, '3', '', '', '', '', '', 360, 'Timer', '2024-09-05 05:03:36'),
(4, '3', '', '', '', '', '', 700, 'Timer', '2024-09-05 05:06:18'),
(5, '3', '', '', '', '', '', 280, 'Timer', '2024-09-05 05:09:48'),
(6, '2', '', '', '', '', '', 520, 'Timer', '2024-09-05 05:19:59'),
(7, '2', '', '', '', '', '', 765, 'Timer', '2024-09-05 05:22:56'),
(8, '2', '', '', '', '', '', 405, 'Timer', '2024-09-05 05:54:28'),
(9, '3', '', '', '', '', '', 255, 'Timer', '2024-09-05 06:12:59'),
(10, '3', '1', '1', '1', '1', '2', 0, 'Classic', '2024-09-05 06:15:48'),
(11, '3', '', '', '', '', '', 425, 'Timer', '2024-09-05 06:17:58'),
(12, '3', '', '', '', '', '', 600, 'Timer', '2024-09-05 06:36:20'),
(13, '3', '', '', '', '', '', 605, 'Timer', '2024-09-05 06:39:35'),
(14, '7', '', '', '', '', '', 510, 'Timer', '2024-09-05 06:45:36'),
(15, '7', '', '', '', '', '', 85, 'Timer', '2024-09-05 06:47:59'),
(16, '7', '', '', '', '', '', 290, 'Timer', '2024-09-05 06:50:20'),
(17, '7', '', '', '', '', '', 230, 'Timer', '2024-09-05 06:53:16'),
(18, '2', '', '', '', '', '', 100, 'Timer', '2024-09-05 07:20:45'),
(19, '1', '', '', '', '', '', 45, 'Timer', '2024-09-05 07:30:19'),
(20, '1', '1', '1', '1', '2', '2', 0, 'Classic', '2024-09-05 08:00:43'),
(21, '1', '', '', '', '', '', 60, 'Timer', '2024-09-05 08:01:31'),
(22, '1', '', '', '', '', '', 730, 'Timer', '2024-09-05 08:03:59'),
(23, '1', '', '', '', '', '', 285, 'Timer', '2024-09-05 08:07:43'),
(24, '1', '', '', '', '', '', 300, 'Timer', '2024-09-05 08:10:25'),
(25, '1', '', '', '', '', '', 550, 'Timer', '2024-09-05 08:13:06'),
(41, '1', '', '', '', '', '', 30, 'Timer', '2024-09-15 15:26:44'),
(42, '1', '', '', '', '', '', 20, 'Timer', '2024-09-16 07:35:23'),
(43, '1', '', '', '', '', '', 30, 'Timer', '2024-09-16 07:35:47'),
(44, '1', '', '', '', '', '', 15, 'Timer', '2024-09-16 07:43:14'),
(45, '8', '', '', '', '', '', 135, 'Timer', '2024-09-17 07:41:53'),
(57, '1', '', '', '', '', '', 10, 'Timer', '2024-09-17 11:08:40'),
(58, '1', '', '', '', '', '', 20, 'Timer', '2024-09-17 11:10:08'),
(59, '1', '', '', '', '', '', 10, 'Timer', '2024-09-17 11:11:33'),
(60, '1', '', '', '', '', '', 20, 'Advance', '2024-09-17 11:11:48'),
(61, '1', '', '', '', '', '', 30, 'Timer', '2024-09-17 11:13:29'),
(62, '1', '', '', '', '', '', 10, 'Advance', '2024-09-17 11:16:52'),
(63, '1', '', '', '', '', '', 20, 'Advance', '2024-09-18 01:07:49'),
(64, '1', '', '', '', '', '', 50, 'Timer', '2024-09-18 14:09:30'),
(65, '1', '', '', '', '', '', 165, 'Advance', '2024-09-19 03:35:07'),
(66, '1', '', '', '', '', '', 0, 'Advance', '2024-09-19 03:35:37'),
(67, '1', '', '', '', '', '', 20, 'Advance', '2024-09-19 03:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Socket` varchar(10) NOT NULL,
  `Ghz` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `Name`, `Socket`, `Ghz`, `picture`, `detail`) VALUES
(1, 'Intel i7', 'LGA1700', '4.8', 'uploads/INTEL i7_1.png', 'test'),
(2, 'Intel i5-12400F', 'LGA1700', '4.40', 'uploads/INTEL i5.png', 'จำนวน P-core 6\r\nจำนวน E-core 0\r\nเธรดทั้งหมด 12'),
(3, 'Ryzen 5 5600G', 'AM4', '3.6', 'uploads/AMD.png', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `infomationdata`
--

CREATE TABLE `infomationdata` (
  `id` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `timeUpdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FileName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `infomationdata`
--

INSERT INTO `infomationdata` (`id`, `head`, `content`, `picture`, `timeUpdate`, `FileName`) VALUES
(1, 'คอมพิวเตอร์ คืออะไร?', 'หรือศัพท์บัญญัติราชบัณฑิตยสภาว่า คณิตกรณ์ เป็นเครื่องจักรแบบสั่งการได้ที่ออกแบบมาเพื่อดำเนินการกับลำดับตัวดำเนินการทางตรรกศาสตร์หรือคณิตศาสตร์ โดยอนุกรมนี้อาจเปลี่ยนแปลงได้เมื่อพร้อม ส่งผลให้คอมพิวเตอร์สามารถแก้ปัญหาได้มากมาย\r\n\r\nคอมพิวเตอร์ถูกประดิษฐ์ออกมาให้ประกอบไปด้วยความจำรูปแบบต่าง ๆ เพื่อเก็บข้อมูล อย่างน้อยหนึ่งส่วนที่มีหน้าที่ดำเนินการคำนวณเกี่ยวกับตัวดำเนินการทางตรรกศาสตร์ และตัวดำเนินการทางคณิตศาสตร์ และส่วนควบคุมที่ใช้เปลี่ยนแปลงลำดับของตัวดำเนินการโดยยึดสารสนเทศที่ถูกเก็บไว้เป็นหลัก อุปกรณ์เหล่านี้จะยอมให้นำเข้าข้อมูลจากแหล่งภายนอก และส่งผลจากการคำนวณตัวดำเนินการออกไป', 'infoimg/computer.jpg', '2024-08-23 07:47:23', 'computer.jpg'),
(2, 'แรม(RAM) คืออะไร?', 'แรม หรือ หน่วยความจำเข้าถึงโดยสุ่ม (อังกฤษ: random access memory: RAM) เป็นหน่วยความจำหลัก ที่ใช้ในระบบคอมพิวเตอร์ยุคปัจจุบัน หน่วยความจำชนิดนี้ อนุญาตให้เขียนและอ่านข้อมูลได้ในตำแหน่งต่าง ๆ อย่างอิสระ และรวดเร็วพอสมควร โดยคำว่าเข้าถึงโดยสุ่มหมายความว่าสามารถเข้าถึงข้อมูลแต่ละตำแหน่งได้เร็วซึ่งต่างจากสื่อเก็บข้อมูลชนิดอื่น ๆ อย่างเทป หรือดิสก์ ที่มีข้อจำกัดของความเร็วในการอ่านและเขียนข้อมูลและความเร็วในการเข้าถึงข้อมูล ที่ต้องทำตามลำดับก่อนหลังตามที่จัดเก็บไว้ในสื่อ หรือมีข้อจำกัดแบบรอม ที่อนุญาตให้อ่านเพียงอย่างเดียว', 'infoimg/IMG_9582.jpg', '2024-08-23 07:56:55', 'IMG_9582.jpg'),
(3, 'เมนบอร์ด(Mainboard) คืออะไร', 'เมนบอร์ด (Mainboard): หัวใจสำคัญของคอมพิวเตอร์\r\nเมนบอร์ด หรือ แผงวงจรหลัก เปรียบเสมือนแผ่นกระดานที่รวบรวมส่วนประกอบสำคัญต่างๆ ของคอมพิวเตอร์เข้าไว้ด้วยกัน ทำหน้าที่เป็นตัวเชื่อมต่อและควบคุมการทำงานของชิ้นส่วนเหล่านั้นให้ทำงานร่วมกันได้อย่างมีประสิทธิภาพ', 'infoimg/IMG_9588.jpg', '2024-08-23 08:15:05', 'IMG_9588.jpg'),
(4, 'ฮาร์ดดิสไดร์ฟ (Hard Disk Drive) (H.D.D) คืออะไร?', 'ฮาร์ดดิสก์ หรือ จานบันทึกแบบแข็ง (อังกฤษ: hard disk drive) คือ อุปกรณ์คอมพิวเตอร์ที่บรรจุข้อมูลแบบไม่ลบเลือน มีลักษณะเป็นจานโลหะที่เคลือบด้วยสารแม่เหล็กซึ่งหมุนอย่างรวดเร็วเมื่อทำงาน การติดตั้งเข้ากับตัวคอมพิวเตอร์สามารถทำได้ผ่านการต่อเข้ากับแผงวงจรหลัก (motherboard) ที่มีอินเตอร์เฟซแบบขนาน (PATA) , แบบอนุกรม (SATA) และแบบเล็ก (SCSI) ทั้งยังสามารถต่อเข้าเครื่องจากภายนอกได้ผ่านทางสายยูเอสบี, สายไฟร์ไวร์ รวมไปถึงอินเตอร์เฟซอนุกรมแบบต่อนอก (eSATA) ซึ่งทำให้การใช้ฮาร์ดดิสก์ทำได้สะดวกยิ่งขึ้นเมื่อไม่มีคอมพิวเตอร์ถาวรเป็นของตนเอง', 'infoimg/IMG_9583.png', '2024-09-03 03:35:22', 'IMG_9583.png');

-- --------------------------------------------------------

--
-- Table structure for table `loggeruser`
--

CREATE TABLE `loggeruser` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `time_logger` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loggeruser`
--

INSERT INTO `loggeruser` (`id`, `user_id`, `username`, `role`, `time_logger`) VALUES
(1, '1', 'Admin', 'admin', '2024-08-03 12:36:26'),
(2, '1', 'Admin', 'admin', '2024-08-03 12:37:20'),
(3, '1', 'Admin', 'admin', '2024-08-04 10:33:22'),
(4, '1', 'Admin', 'admin', '2024-08-08 14:16:28'),
(5, '1', 'Admin', 'admin', '2024-08-09 06:47:17'),
(6, '1', 'Admin', 'admin', '2024-08-21 13:43:23'),
(7, '1', 'Admin', 'admin', '2024-08-23 07:18:39'),
(8, '1', 'Admin', 'admin', '2024-08-25 09:55:12'),
(9, '1', 'Admin', 'admin', '2024-08-25 10:13:10'),
(10, '1', 'Admin', 'admin', '2024-08-26 04:34:49'),
(11, '1', 'Admin', 'admin', '2024-08-26 08:43:58'),
(12, '1', 'Admin', 'admin', '2024-08-26 13:38:51'),
(13, '1', 'Admin', 'admin', '2024-08-26 15:31:05'),
(14, '1', 'Admin', 'admin', '2024-08-27 14:30:20'),
(15, '2', 'Rinsagi', 'user', '2024-08-28 04:32:46'),
(16, '1', 'Admin', 'admin', '2024-08-28 04:47:50'),
(17, '1', 'Admin', 'admin', '2024-08-28 05:32:00'),
(18, '2', 'Rinsagi', 'user', '2024-08-28 08:23:20'),
(19, '1', 'Admin', 'admin', '2024-08-28 08:31:49'),
(20, '1', 'Admin', 'admin', '2024-08-28 11:40:06'),
(21, '1', 'Admin', 'admin', '2024-08-29 04:28:54'),
(22, '1', 'Admin', 'admin', '2024-08-29 09:33:56'),
(23, '1', 'Admin', 'admin', '2024-08-29 12:17:54'),
(24, '3', 'cordelia', 'user', '2024-08-29 12:21:40'),
(25, '1', 'Admin', 'admin', '2024-08-29 13:19:53'),
(26, '1', 'Admin', 'admin', '2024-08-29 14:20:10'),
(27, '1', 'Admin', 'admin', '2024-08-30 05:37:26'),
(28, '3', 'cordelia', 'user', '2024-08-30 06:00:20'),
(29, '2', 'Rinsagi', 'user', '2024-08-30 06:11:09'),
(30, '2', 'Rinsagi', 'user', '2024-08-30 06:14:07'),
(31, '4', 'lux na', 'user', '2024-08-30 06:24:41'),
(32, '3', 'cordelia', 'user', '2024-08-30 07:04:16'),
(33, '1', 'Admin', 'admin', '2024-08-30 07:08:15'),
(34, '1', 'Admin', 'admin', '2024-09-02 13:03:12'),
(35, '1', 'Admin', 'admin', '2024-09-03 01:52:03'),
(36, '1', 'Admin', 'admin', '2024-09-03 02:58:14'),
(37, '2', 'Rinsagi', 'user', '2024-09-03 03:05:08'),
(38, '1', 'Admin', 'admin', '2024-09-03 03:21:04'),
(39, '1', 'Admin', 'admin', '2024-09-03 03:30:51'),
(40, '1', 'Admin', 'admin', '2024-09-03 04:09:03'),
(41, '1', 'Admin', 'admin', '2024-09-03 05:06:10'),
(42, '1', 'Admin', 'admin', '2024-09-03 05:06:38'),
(43, '5', 'vier2550', 'user', '2024-09-03 05:58:09'),
(44, '1', 'Admin', 'admin', '2024-09-03 06:05:43'),
(45, '1', 'Admin', 'admin', '2024-09-03 06:58:08'),
(46, '1', 'Admin', 'admin', '2024-09-03 13:52:16'),
(47, '1', 'Admin', 'admin', '2024-09-05 02:03:04'),
(48, '6', 'Night', 'user', '2024-09-05 04:49:41'),
(49, '1', 'Admin', 'admin', '2024-09-05 04:52:54'),
(50, '3', 'cordelia', 'user', '2024-09-05 04:56:20'),
(51, '2', 'Rinsagi', 'user', '2024-09-05 05:17:41'),
(52, '2', 'Rinsagi', 'user', '2024-09-05 05:20:27'),
(53, '2', 'Rinsagi', 'user', '2024-09-05 05:52:07'),
(54, '1', 'Admin', 'admin', '2024-09-05 06:00:28'),
(55, '3', 'cordelia', 'user', '2024-09-05 06:10:45'),
(56, '7', 'kittisak', 'user', '2024-09-05 06:43:10'),
(57, '1', 'Admin', 'admin', '2024-09-05 07:13:22'),
(58, '2', 'Rinsagi', 'user', '2024-09-05 07:19:05'),
(59, '1', 'Admin', 'admin', '2024-09-05 07:29:38'),
(60, '1', 'Admin', 'admin', '2024-09-05 07:36:38'),
(61, '2', 'Rinsagi', 'user', '2024-09-06 07:48:51'),
(62, '1', 'Admin', 'admin', '2024-09-06 08:40:51'),
(63, '1', 'Admin', 'admin', '2024-09-06 12:11:12'),
(64, '1', 'Admin', 'admin', '2024-09-07 07:04:40'),
(65, '1', 'Admin', 'admin', '2024-09-07 09:56:53'),
(66, '1', 'Admin', 'admin', '2024-09-09 03:07:55'),
(67, '1', 'Admin', 'admin', '2024-09-09 03:55:06'),
(68, '2', 'Rinsagi', 'user', '2024-09-13 08:31:51'),
(69, '8', 'wa4llrock', 'admin', '2024-09-13 08:33:44'),
(70, '1', 'Admin', 'admin', '2024-09-13 08:39:30'),
(71, '1', 'Admin', 'admin', '2024-09-13 09:17:22'),
(72, '1', 'Admin', 'admin', '2024-09-13 13:53:03'),
(73, '1', 'Admin', 'admin', '2024-09-13 15:26:06'),
(74, '1', 'Admin', 'admin', '2024-09-15 15:07:47'),
(75, '1', 'Admin', 'admin', '2024-09-15 15:26:14'),
(76, '1', 'Admin', 'admin', '2024-09-16 07:29:09'),
(77, '1', 'Admin', 'admin', '2024-09-16 07:32:00'),
(78, '1', 'Admin', 'admin', '2024-09-16 11:40:37'),
(79, '1', 'Admin', 'admin', '2024-09-17 06:41:42'),
(80, '1', 'Admin', 'admin', '2024-09-18 01:07:27'),
(81, '1', 'Admin', 'admin', '2024-09-18 14:08:29'),
(82, '1', 'Admin', 'admin', '2024-09-19 03:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `mainboard`
--

CREATE TABLE `mainboard` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Ram_ddr` varchar(10) NOT NULL,
  `Cpu_socket` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mainboard`
--

INSERT INTO `mainboard` (`id`, `Name`, `Ram_ddr`, `Cpu_socket`, `picture`, `detail`) VALUES
(1, 'PRIME B760M-A', 'DDR5', 'LGA1700', 'uploads/Mainboard_3.png', 'test1'),
(2, 'Asrock B760M-HDV/M.2 D4', 'DDR4', 'LGA1700', 'uploads/Mainboard (1).png', 'สนับสนุน Dual Channel, up to 5333+ (OC)\r\n1 PCIe 4.0 x16, 2 PCIe 3.0 x1, 1 M.2 Key E สำหรับโมดูล WiFi\r\nช่องเชื่อมต่อกราฟิก: HDMI, DisplayPort, D-Sub'),
(3, 'PRIME B760M', 'DDR4', 'AM4', 'uploads/Mainboard_1.png', 'test'),
(4, 'Asrock Z790', 'DDR5', 'AM5', 'uploads/Mainboard_2.png', 'test\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `watt` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`id`, `Name`, `watt`, `picture`, `detail`) VALUES
(2, 'SUPER FLOWER ZILLION DW WHITE', '650', 'uploads/Power Supply (1).png', 'dasda'),
(3, 'POWER SUPPLY (FULL) 450W DTECH PW006', '450', 'uploads/Power Supply (1)_1.png', 'edsad');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `bus` varchar(10) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `ddr` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `Name`, `bus`, `Size`, `ddr`, `picture`, `detail`) VALUES
(1, 'Corsair Vengeance', '3200', '16', 'DDR4', 'uploads/ram_1.png', 'das'),
(2, 'Corsair Vengeance DDR5', '5200', '8', 'DDR5', 'uploads/ram_2.png', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `storge`
--

CREATE TABLE `storge` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `storge`
--

INSERT INTO `storge` (`id`, `Name`, `Size`, `Type`, `picture`, `detail`) VALUES
(1, 'Samsung 990 EVO', '2048', 'Nvme M.2', 'uploads/SSD.jpg', 'test'),
(2, 'WDS250G2B0A', '250', 'SSD SATA', 'uploads/SSD512.png', 'Sequential Read Performance\r\n560MB/s\r\nSequential Write Performance\r\n530MB/s'),
(3, 'WD10EZEX', '1024', 'HDD', 'uploads/Hard disk drive.png', '\r\nForm Factor	\r\n3.5\"\r\nRotational Speed	\r\n7200RPM');

-- --------------------------------------------------------

--
-- Table structure for table `timermodetmp`
--

CREATE TABLE `timermodetmp` (
  `id` int(11) NOT NULL,
  `userid` varchar(1000) NOT NULL,
  `gameid` varchar(1000) NOT NULL,
  `score` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`user_id`, `username`, `email`, `password`, `firstname`, `lastname`, `tel`, `role`, `date`) VALUES
(1, 'Admin', 'mink69875@gmail.com', '$2y$10$nkDuZAp/BwttvV7oNJqUeOpgV/DGzgdkLL7.kZZ/1uRQYs.0.s5wS', 'ระพีพัฒน์', 'วรรณสำราญ', '0993673106', 'admin', '2024-08-03 12:39:01'),
(2, 'Rinsagi', 'Rinsagi7@gmail.com', '$2y$10$erPvF7fNMmRbL107m3sxH.kOEp3Mxg0g0DKIzXl9a3db7QMtpW4MK', 'Rinsagi', 'Nigga', '0665554444', 'user', '2024-09-13 08:31:18'),
(3, 'cordelia', 'teenkung88@gmail.com', '$2y$10$8RGxxHbEin4yAb7eNOGGC.8SxMuJbSQDxEBCqIGxR5JqcItqtHCPe', 'ศุภาพิช', 'สมภพ', '0665554444', 'user', '2024-08-29 12:21:33'),
(4, 'lux na', 'fuckyou@gmail.com', '$2y$10$TgVRf.RNnQ7pD90N0oZf7e/IgTum7VrSNGKK7qCLjvWHtmsSPefSW', 'ระพีพัฒน์', 'สมภพ', '0123456789', 'user', '2024-08-30 06:24:14'),
(5, 'vier2550', 'FBI@gmail.com', '$2y$10$Ceia3q42SrIKuajGV/vBN.MgjHfPvZVud3tXDGRk9T437a0J/.fv6', 'ปรเมศวร์', 'gay', '0993673106', 'user', '2024-09-03 05:57:58'),
(6, 'Night', 'xokichiki@gmail.com', '$2y$10$LJ6xfsJKlKi9Mw2pLCFyf..fdb16tDUVNiQwnK.ZDTHYbvYTSIsXW', 'Night', 'Novasia', '0962808314', 'user', '2024-09-05 04:49:24'),
(7, 'kittisak', 'kkkkkkk@gmail.com', '$2y$10$QKUPGEJ9Nx8NB4zFoRmhi.4j1gCAYLeM0c1E/rsLjX8qNwTTYQNyq', 'kong', 'ooooo', '0993673106', 'user', '2024-09-05 06:42:45'),
(8, 'wa4llrock', 'kritsada.b2259@outlook.com', '$2y$10$FkjHbP0LkwkbZI60XITA5OKizJLLXYMku7uHNHaKElW3bQ3EoMIX6', 'kitsada', 'buakeaw', '0812345679', 'admin', '2024-09-13 08:33:37'),
(9, 'Nozomi', 'Nozomi@gmail.com', '$2y$10$3YUfj3HHXN76o./9Ef5Szu0wVOeFG8yt/iqgKwMaFQZyNSRGNilde', 'Nozomi', 'Ayaze', '0993673106', 'user', '2024-09-15 16:04:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infomationdata`
--
ALTER TABLE `infomationdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loggeruser`
--
ALTER TABLE `loggeruser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainboard`
--
ALTER TABLE `mainboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storge`
--
ALTER TABLE `storge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timermodetmp`
--
ALTER TABLE `timermodetmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `infomationdata`
--
ALTER TABLE `infomationdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loggeruser`
--
ALTER TABLE `loggeruser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `mainboard`
--
ALTER TABLE `mainboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storge`
--
ALTER TABLE `storge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timermodetmp`
--
ALTER TABLE `timermodetmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
