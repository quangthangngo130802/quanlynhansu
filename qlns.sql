-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 02:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `MaNV` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `MaNV`) VALUES
(1, 'nguyenhong31081@gmail.com', '$2y$12$QL4I7CHZ0ZeZb7trnoipPOTjrMXKd.OXWtZksipb44VyGAjlwiYz.', 1),
(2, 'a@gmail.com', '$2y$12$QL4I7CHZ0ZeZb7trnoipPOTjrMXKd.OXWtZksipb44VyGAjlwiYz.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bangluong`
--

CREATE TABLE `bangluong` (
  `MaBangLuong` int(11) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `NguoiTao` varchar(255) DEFAULT NULL,
  `TongSoNV` int(11) DEFAULT NULL,
  `TongLuong` float DEFAULT NULL,
  `DaTra` float DEFAULT NULL,
  `ConCanTra` float DEFAULT NULL,
  `KyLamViec` varchar(255) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangluong`
--

INSERT INTO `bangluong` (`MaBangLuong`, `Ten`, `NguoiTao`, `TongSoNV`, `TongLuong`, `DaTra`, `ConCanTra`, `KyLamViec`, `GhiChu`) VALUES
(6, 'Bảng lương 2024-05-03 đến 2024-05-05', '1', 9, 458250, 0, 0, '2024-05-03 đến 2024-05-05', 'ngu');

-- --------------------------------------------------------

--
-- Table structure for table `calam`
--

CREATE TABLE `calam` (
  `MaCa` bigint(20) NOT NULL,
  `TenCa` enum('Hành Chính','Sáng','Chiều','Tối') NOT NULL,
  `LoaiCa` enum('Cố Định','Linh Hoạt') NOT NULL,
  `GioBatDau` varchar(10) NOT NULL,
  `GioKetThuc` varchar(10) NOT NULL,
  `SoGioLamViec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calam`
--

INSERT INTO `calam` (`MaCa`, `TenCa`, `LoaiCa`, `GioBatDau`, `GioKetThuc`, `SoGioLamViec`) VALUES
(1, 'Hành Chính', 'Cố Định', '8:00 ', '17:30', 8),
(2, 'Sáng', 'Linh Hoạt', '8:00', '12:00', 4),
(3, 'Chiều', 'Linh Hoạt', '13:30', '17:30', 4),
(4, 'Tối', 'Linh Hoạt', '18:00', '22:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `chitietbangluong`
--

CREATE TABLE `chitietbangluong` (
  `MaCTLuong` bigint(20) NOT NULL,
  `MaBangLuong` int(11) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `NgayNhanLuong` datetime NOT NULL,
  `TongLuongCB` float NOT NULL,
  `TongLuongTC` float NOT NULL,
  `tienthuong` float DEFAULT NULL,
  `baohiem` float DEFAULT NULL,
  `TongPhuCap` float DEFAULT NULL,
  `TongThue` float DEFAULT NULL,
  `LuongThucLinh` float DEFAULT NULL,
  `giamtru` float DEFAULT NULL,
  `danhan` float DEFAULT NULL COMMENT 'lương đã nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietbangluong`
--

INSERT INTO `chitietbangluong` (`MaCTLuong`, `MaBangLuong`, `MaNV`, `NgayNhanLuong`, `TongLuongCB`, `TongLuongTC`, `tienthuong`, `baohiem`, `TongPhuCap`, `TongThue`, `LuongThucLinh`, `giamtru`, `danhan`) VALUES
(5, 6, 5, '2024-05-11 14:44:49', 8250, 0, 1000, 500, 100, 500, 4350, 4000, 4100),
(7, 6, 7, '2024-05-11 14:44:49', 100000, 350000, 0, 0, 0, 0, 450000, 0, 0),
(8, 6, 8, '2024-05-11 14:44:49', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 6, 9, '2024-05-11 14:44:49', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` bigint(20) NOT NULL,
  `TenCV` varchar(50) NOT NULL,
  `CapBac` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `MaPB` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `CapBac`, `updated_at`, `MaPB`) VALUES
(1, 'Giám đốc điều hành', 1, NULL, 1),
(2, 'Giám đốc kinh doanh', 1, NULL, 1),
(3, 'Trưởng phòng nhân sự', 2, NULL, 1),
(4, 'Trưởng phòng kế toán', 2, NULL, 1),
(5, 'Trưởng phòng lễ tân', 2, NULL, 1),
(6, 'Trưởng phòng kinh doanh', 2, NULL, 1),
(7, 'Trưởng phòng kiểm soát nội bộ', 2, NULL, 1),
(8, 'Trưởng phòng vận hành', 2, NULL, 1),
(9, 'Thư ký nhân sự', 3, NULL, 1),
(10, 'Thư ký kế toán', 3, NULL, 1),
(11, 'Thư ký kinh doanh', 3, NULL, 1),
(12, 'Thư ký vận hành', 3, NULL, 1),
(13, 'Thư ký', 2, NULL, 1),
(14, 'Nhân viên', 4, '2024-04-29', 2),
(18, 'Nhân Viên', 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dieuchuyennhanvien`
--

CREATE TABLE `dieuchuyennhanvien` (
  `MaPhieu` bigint(20) NOT NULL,
  `TenPhieu` varchar(50) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `CVHienTai` bigint(20) NOT NULL,
  `CVChuyenDen` bigint(20) NOT NULL,
  `NgayKT` date NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayDuyet` date DEFAULT NULL,
  `TrangThai` enum('Đã Duyệt','Đang Chờ','Từ Chối') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dieuchuyennhanvien`
--

INSERT INTO `dieuchuyennhanvien` (`MaPhieu`, `TenPhieu`, `MaNV`, `CVHienTai`, `CVChuyenDen`, `NgayKT`, `NgayBD`, `NgayDuyet`, `TrangThai`) VALUES
(1, 'ĐCPB - 01', 5, 5, 4, '2024-04-19', '2024-04-22', '2024-04-20', 'Từ Chối'),
(5, 'aaaa', 2, 11, 9, '2024-04-09', '2024-04-25', NULL, 'Đang Chờ');

-- --------------------------------------------------------

--
-- Table structure for table `hopdong`
--

CREATE TABLE `hopdong` (
  `MaHD` bigint(20) NOT NULL,
  `TenHD` varchar(50) NOT NULL,
  `MaLoaiHD` bigint(20) NOT NULL,
  `NgayKy` date NOT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `MaNV` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`MaHD`, `TenHD`, `MaLoaiHD`, `NgayKy`, `NgayBatDau`, `NgayKetThuc`, `MaNV`) VALUES
(1, 'HDTV - 01', 3, '2023-05-10', '2023-05-15', '2023-07-15', 2),
(2, 'HDKTH - 01', 3, '2023-10-21', '2023-10-23', '2024-04-30', 1),
(4, 'HDTtV - 01', 3, '2023-05-10', '2023-05-15', '2023-07-15', 2),
(5, 'HDTtV - 01', 3, '2023-05-10', '2023-05-15', '2023-07-15', 2),
(6, 'HDTtV - 01', 3, '2023-05-10', '2023-05-15', '2023-07-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `khenthuongkiluat`
--

CREATE TABLE `khenthuongkiluat` (
  `MaKTKL` bigint(20) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `MucKTKL` int(11) DEFAULT NULL,
  `ThoiGian` date DEFAULT NULL,
  `LyDo` varchar(255) DEFAULT NULL,
  `SoTien` float DEFAULT NULL,
  `theloai` int(11) DEFAULT 0 COMMENT '0-khen thưởng; 1- kỷ luật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khenthuongkiluat`
--

INSERT INTO `khenthuongkiluat` (`MaKTKL`, `MaNV`, `MucKTKL`, `ThoiGian`, `LyDo`, `SoTien`, `theloai`) VALUES
(2, 1, 3, '2024-05-21', 'frdrfre', 111333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laylaimatkhau`
--

CREATE TABLE `laylaimatkhau` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `laylaimatkhau`
--

INSERT INTO `laylaimatkhau` (`id`, `email`, `token`) VALUES
(7, 'nguyenhong31081@gmail.com', 'mfHaWfDrnCQFyiDR3zVUIJx0O3IBXa7cM0Zv09EB5udxy60CUt');

-- --------------------------------------------------------

--
-- Table structure for table `loaihopdong`
--

CREATE TABLE `loaihopdong` (
  `MaLoaiHD` bigint(20) NOT NULL,
  `TenLoaiHD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaihopdong`
--

INSERT INTO `loaihopdong` (`MaLoaiHD`, `TenLoaiHD`) VALUES
(1, 'Hợp đồng lao động không thời hạn'),
(2, 'Hợp đồng lao động có thời hạn'),
(3, 'Hợp đồng thử việc');

-- --------------------------------------------------------

--
-- Table structure for table `ngaynghi`
--

CREATE TABLE `ngaynghi` (
  `MaNgayNghi` bigint(20) NOT NULL,
  `TenNgayNghi` varchar(50) NOT NULL,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngaynghi`
--

INSERT INTO `ngaynghi` (`MaNgayNghi`, `TenNgayNghi`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, 'Ngày Chiến thắng 30/4 và ngày Quốc tế lao động 01/', '2024-04-27 15:39:37', '2024-05-01 15:39:37'),
(2, 'Ngày Quốc Khánh', '2024-08-31 15:48:24', '2024-09-03 15:48:24'),
(3, 'Tết Nguyên Đán', '2024-02-08 15:52:52', '2024-02-14 15:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` bigint(20) NOT NULL,
  `Hoten` varchar(50) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `SoCCCD` bigint(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `QueQuan` varchar(50) DEFAULT NULL,
  `MaCV` bigint(20) NOT NULL,
  `MaNgayNghi` bigint(20) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Hoten`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SoDienThoai`, `SoCCCD`, `Email`, `QueQuan`, `MaCV`, `MaNgayNghi`, `anh`) VALUES
(1, 'Nguyễn Kiên Cường', 'nam', '1985-06-20', 'Ngõ 90, Thanh Xuân Trung, Thanh Xuân, Hà Nội', '0989746945', 38083000385, 'cuongnk@gmail.com', 'Hà Nội', 5, 0, 'anh1.jpg'),
(2, 'Nguyễn Thị Hồng Nhung', 'nữ', '1989-09-10', NULL, '0899845934', NULL, 'nhungnguyen@gmail.com', 'Khánh Hoà', 3, NULL, NULL),
(3, 'Trần Thị Mỹ Anh', 'nữ', '1990-10-06', NULL, '0988747922', NULL, 'myanh@gmail.com', 'Thái Bình', 4, NULL, NULL),
(4, 'Nguyễn Văn Được', 'nam', '1987-04-11', NULL, '0890483764', NULL, 'duocnv@gmail.com', 'Ninh Bình', 10, NULL, NULL),
(5, 'Lê Thu Nhung', 'nữ', '1990-10-21', NULL, '0998497235', NULL, 'nhungthu@gmail.com', 'Hà Nội', 5, NULL, NULL),
(6, 'Phạm Thị Duyên', 'nữ', '1989-11-29', NULL, '0928497456', NULL, 'duyenpt@gmail.com', 'Bắc Ninh', 6, NULL, NULL),
(7, 'Nguyễn Thị Thuỳ Dung', 'nữ', '1990-02-26', NULL, '0898973946', NULL, 'thuydung@gmail.com', 'Hà Nội', 11, NULL, NULL),
(8, 'Trần Văn Nam', 'nam', '1990-05-19', NULL, '0975743987', NULL, 'namtv@gmail.com', 'Ninh Bình', 7, NULL, NULL),
(9, 'Trần Văn Minh', 'Nữ', '1986-05-19', 'bắc ninh', '0998595349', 435465, 'minhtran@gmail.com', 'Hà Nội', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_calam`
--

CREATE TABLE `nhanvien_calam` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `MaCa` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `sogiolamhanhchinh` float DEFAULT NULL,
  `sogiotangca` float DEFAULT NULL,
  `dilam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien_calam`
--

INSERT INTO `nhanvien_calam` (`Id`, `MaNV`, `MaCa`, `date`, `sogiolamhanhchinh`, `sogiotangca`, `dilam`) VALUES
(16, 5, 1, '2024-05-04', 0.33, 0, '1'),
(17, 4, 1, '2024-05-03', NULL, NULL, '0'),
(18, 6, 4, '2024-05-05', NULL, NULL, '1'),
(20, 9, 2, '2024-05-05', NULL, NULL, '0'),
(21, 7, 2, '2024-05-05', 4, 7, '1'),
(22, 3, 3, '2024-05-05', NULL, NULL, '2'),
(23, 5, 3, '2024-05-05', NULL, NULL, '2'),
(24, 6, 3, '2024-05-05', NULL, NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` bigint(20) NOT NULL,
  `TenPB` varchar(50) NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `updated_at`) VALUES
(1, 'Hành chính - Nhân sự', NULL),
(2, 'Kế toán', NULL),
(3, 'Lễ tân', NULL),
(4, 'Kinh doanh', NULL),
(5, 'Kiểm soát nội bộ', NULL),
(6, 'Vận hành', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Add'),
(3, 'Edit'),
(4, 'Delete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_manv` (`MaNV`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_admin` (`admin_id`),
  ADD KEY `Fk_role` (`role_id`);

--
-- Indexes for table `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`MaBangLuong`);

--
-- Indexes for table `calam`
--
ALTER TABLE `calam`
  ADD PRIMARY KEY (`MaCa`);

--
-- Indexes for table `chitietbangluong`
--
ALTER TABLE `chitietbangluong`
  ADD PRIMARY KEY (`MaCTLuong`),
  ADD KEY `fk_nhanvien_luong` (`MaNV`),
  ADD KEY `FK_bangluong` (`MaBangLuong`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`),
  ADD KEY `fk_phongban_` (`MaPB`);

--
-- Indexes for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  ADD PRIMARY KEY (`MaPhieu`),
  ADD KEY `fk_nhanvien_dieuchuyen` (`MaNV`),
  ADD KEY `fk_chucvu1` (`CVHienTai`),
  ADD KEY `fk_chucvu2` (`CVChuyenDen`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `fk_loai_hopdong` (`MaLoaiHD`),
  ADD KEY `fk_nhanvien_` (`MaNV`);

--
-- Indexes for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  ADD PRIMARY KEY (`MaKTKL`),
  ADD KEY `fk_nhanvien_ktkl` (`MaNV`);

--
-- Indexes for table `laylaimatkhau`
--
ALTER TABLE `laylaimatkhau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  ADD PRIMARY KEY (`MaLoaiHD`);

--
-- Indexes for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD PRIMARY KEY (`MaNgayNghi`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `fk_nhanvien_chucvu` (`MaCV`);

--
-- Indexes for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_nhanvien` (`MaNV`),
  ADD KEY `fk_calam` (`MaCa`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `MaBangLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calam`
--
ALTER TABLE `calam`
  MODIFY `MaCa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chitietbangluong`
--
ALTER TABLE `chitietbangluong`
  MODIFY `MaCTLuong` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaCV` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  MODIFY `MaPhieu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MaHD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  MODIFY `MaKTKL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laylaimatkhau`
--
ALTER TABLE `laylaimatkhau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  MODIFY `MaLoaiHD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  MODIFY `MaNgayNghi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `MaPB` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_manv` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `Fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `Fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `chitietbangluong`
--
ALTER TABLE `chitietbangluong`
  ADD CONSTRAINT `FK_bangluong` FOREIGN KEY (`MaBangLuong`) REFERENCES `bangluong` (`MaBangLuong`),
  ADD CONSTRAINT `fk_nhanvien_luong` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD CONSTRAINT `fk_phongban_` FOREIGN KEY (`MaPB`) REFERENCES `phongban` (`MaPB`);

--
-- Constraints for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  ADD CONSTRAINT `fk_chucvu1` FOREIGN KEY (`CVHienTai`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `fk_chucvu2` FOREIGN KEY (`CVChuyenDen`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `fk_nhanvien_dieuchuyen` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `fk_loai_hopdong` FOREIGN KEY (`MaLoaiHD`) REFERENCES `loaihopdong` (`MaLoaiHD`),
  ADD CONSTRAINT `fk_nhanvien_` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  ADD CONSTRAINT `fk_nhanvien_ktkl` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_chucvu` FOREIGN KEY (`MaCV`) REFERENCES `chucvu` (`MaCV`);

--
-- Constraints for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  ADD CONSTRAINT `fk_calam` FOREIGN KEY (`MaCa`) REFERENCES `calam` (`MaCa`),
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
