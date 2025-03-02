-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(7) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_user` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_user`, `a_pwd`) VALUES
(1, 'อนุตราพร', 'admin', '1234'),
(2, 'ฮาเล่ย์', 'admin1', '4321');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` float(9,2) NOT NULL,
  `p_ext` varchar(50) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES
(1, 'เสื้อฮูด', 'เสื้อฮูดลำลองสำหรับสัตว์เลี้ยง', 800.00, 'jfif', 1),
(2, 'ปลอกคอ', 'ปลอกคอสำหรับสัตว์เลี้ยง', 100.00, 'jfif', 1),
(3, 'ชามสำหรับใส่อาหาร', 'ชามใส่อาหารเซรามิก รักฟดลก', 70.00, 'jfif', 2),
(4, 'ครีมอาบน้ำ', 'ครีมอาบน้ำช่วยขจัดเห็บหมัด', 200.00, 'jfif', 3),
(5, 'หมวก', 'หมวกขนปุยสำหรับสัตว์เลี้ยง', 60.00, 'jfif', 1),
(6, 'วิตามินบำรุงขน', 'วิตามินรวมบำรุงขน และสุขภาพ', 150.00, 'jpg', 3),
(7, 'อาหารเม็ด', 'อาหารเม็ดคุณภาพเยี่ยม ช่วยในส่วนของขนสวย เงางาน', 120.00, 'webp', 3),
(8, 'หวีแปรง', 'หวีสำหรับแปรงขอสัตว์เลี่บง', 80.00, 'webp', 2),
(9, 'ขนม', 'ขนมสุดอร่อยที่จะทำให้วัตว์เลี้ยงของคูนมีความสุข', 100.00, 'jfif', 3),
(10, 'น้ำพุ', 'น้ำพุให้น้องแมว เพื่อให้สามารถดื่มนได้เร็วขึ้น', 100.00, 'jfif', 2),
(11, 'ของเล่น', 'ของเล่ยมราสามารถช่วยสุนัขได้ผ่อนคลาย', 120.00, 'jpg', 2),
(12, 'กระดาษรองฉี่', 'กระดาษซึมซัม ที่สารถใช้งานได้กบอีกลสั', 200.00, 'jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
