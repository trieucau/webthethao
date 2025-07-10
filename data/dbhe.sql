-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 06:19 AM
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
-- Database: `dbhe`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLoai`, `TenLoai`) VALUES
(1, 'Áo thể thao'),
(2, 'Giày chạy bộ'),
(3, 'Dây kháng lực'),
(4, 'Quần thể thao'),
(5, 'Găng tay tập gym'),
(9, 'Bình nước'),
(10, 'Nón thể thao update');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`IDRole`, `rolename`, `description`) VALUES
(1, 'khachhang', 'Người dùng mua hàng, quản lý tài khoản và theo dõi đơn hàng'),
(2, 'nhanvien', 'Nhân viên xử lý đơn hàng và hỗ trợ khách hàng'),
(3, 'quanli', 'Quản lý toàn bộ hệ thống, nhân viên và báo cáo');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `GiaGoc` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `IDLoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `HinhAnh`, `GiaGoc`, `GiaBan`, `SoLuong`, `IDLoai`) VALUES
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
(33, 'test  ', 'binhnuoc220250710051142.jpg', 11, 11, 11, 10),
(34, 'test2', 'binhnuoc20250710051334.jpg', 2, 2, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `IDRole` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `gender`, `IDRole`, `avatar`) VALUES
(1, 'trieudev', '202cb962ac59075b964b07152d234b70', 'Phan Thành Triều', 1, 1, 'quanAP20250709202951.jpg'),
(3, 'khach01', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn An', 1, 1, 'songtung20250709202933.jpg'),
(4, 'nhanvien01', '202cb962ac59075b964b07152d234b70', 'Lê Thị B', 0, 2, 'mytam.jpg'),
(5, 'quanli01', '21232f297a57a5a743894a0e4a801fc3', 'Trần Minh Cường', 1, 3, 'anhtuan.jpg'),
(14, 'quanli03', '202cb962ac59075b964b07152d234b70', 'Trần Thị Thủy', 0, 3, 'mytam20250710052944.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`IDLoai`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`);

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
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `IDRole` (`IDRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `IDLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loaisanpham` (`IDLoai`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
