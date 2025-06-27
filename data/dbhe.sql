-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 03:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhe`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLoai`, `TenLoai`) VALUES
(1, 'Áo thể thao'),
(2, 'Giày chạy bộ'),
(3, 'Dây kháng lực'),
(4, 'Quần thể thao'),
(5, 'Găng tay tập gym');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(10) NOT NULL,
  `TenSanPham` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `GiaGoc` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `IDLoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `HinhAnh`, `GiaBan`, `GiaGoc`, `SoLuong`, `IDLoai`) VALUES
(2, 'Áo thể thao nam Nike Dri-FIT', 'ao_nike.jpg', 350000, 299000, 50, 1),
(3, 'Áo thể thao nữ Adidas Clima', 'ao_adidas.jpg', 370000, 315000, 30, 1),
(4, 'Áo tanktop thể hình', 'ao_tanktop.jpg', 250000, 210000, 40, 1),
(5, 'Áo thể thao có tay Puma', 'ao_puma.jpg', 400000, 349000, 25, 1),
(6, 'Áo chạy bộ thoáng khí', 'ao_chaybo.jpg', 320000, 275000, 35, 1),
(7, 'Giày chạy Nike Air Zoom', 'giay_nike.jpg', 2500000, 2200000, 20, 2),
(8, 'Giày Adidas Ultraboost', 'giay_adidas.jpg', 2700000, 2350000, 15, 2),
(9, 'Giày chạy ASICS Gel-Kayano', 'giay_asics.jpg', 2600000, 2300000, 18, 2),
(10, 'Giày chạy Mizuno Wave', 'giay_mizuno.jpg', 2400000, 2100000, 22, 2),
(11, 'Giày chạy New Balance 1080', 'giay_nb.jpg', 2450000, 2150000, 17, 2),
(12, 'Dây kháng lực 5 cấp độ', 'day_khangluc_5cap.jpg', 300000, 259000, 50, 3),
(13, 'Dây kháng lực mini band', 'day_mini.jpg', 200000, 169000, 45, 3),
(14, 'Dây kháng lực Loop Band', 'day_loop.jpg', 250000, 199000, 40, 3),
(15, 'Dây kháng lực dạng ống', 'day_ong.jpg', 280000, 239000, 30, 3),
(16, 'Dây kháng lực có tay cầm', 'day_taycam.jpg', 350000, 299000, 28, 3),
(17, 'Quần thể thao nam Adidas', 'quan_adidas.jpg', 450000, 399000, 35, 4),
(18, 'Quần tập gym short', 'quan_gym.jpg', 300000, 269000, 38, 4),
(19, 'Quần legging nữ', 'quan_legging.jpg', 370000, 329000, 30, 4),
(20, 'Quần thể thao Puma dài', 'quan_puma.jpg', 480000, 429000, 25, 4),
(21, 'Quần lửng chạy bộ', 'quan_lung.jpg', 350000, 310000, 40, 4),
(22, 'Găng tay tập gym chống trượt', 'gang_chongtruot.jpg', 180000, 149000, 50, 5),
(23, 'Găng tay có đệm lòng bàn tay', 'gang_dem.jpg', 220000, 189000, 42, 5),
(24, 'Găng tay da thật cao cấp', 'gang_dathat.jpg', 300000, 269000, 36, 5),
(25, 'Găng tay tập gym nữ', 'gang_nu.jpg', 200000, 169000, 38, 5),
(26, 'Găng tay full ngón bảo vệ', 'gang_full.jpg', 250000, 215000, 34, 5),
(32, 'san pham new', 'day_mini20250627024356.jpg', 140000, 160000, 23, 3),
(33, 'san pham new 2', 'day_khangluc_5cap20250627030202.jpg', 230000, 250000, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `rote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `gender`, `rote`) VALUES
(1, 'trieudev', '202cb962ac59075b964b07152d234b70', 'phan thanh trieu', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`IDLoai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loaisanpham` (`IDLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
