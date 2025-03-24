-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 24, 2025 lúc 02:08 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1n1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh_sp`
--

CREATE TABLE `anh_sp` (
  `id` int NOT NULL,
  `id_sp` int NOT NULL,
  `hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `anh_sp`
--

INSERT INTO `anh_sp` (`id`, `id_sp`, `hinh_anh`) VALUES
(1, 1, 'p-1.jpg'),
(2, 2, 'p-2.jpg'),
(3, 3, 'p-3.jpg'),
(4, 4, 'p-4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int NOT NULL,
  `id_dh` int DEFAULT NULL,
  `id_ct_sp` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL,
  `thanh_tien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_sp`
--

CREATE TABLE `chi_tiet_sp` (
  `id` int NOT NULL,
  `id_sp` int DEFAULT NULL,
  `id_mau` int DEFAULT NULL,
  `id_kich_co` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `don_gia` int NOT NULL,
  `gia_km` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_sp`
--

INSERT INTO `chi_tiet_sp` (`id`, `id_sp`, `id_mau`, `id_kich_co`, `so_luong`, `don_gia`, `gia_km`) VALUES
(18, 25, 3, 2, 123, 1231231000, 123121000),
(19, 24, 1, 4, 1221, 1257777555, 1234),
(22, 28, 3, 2, 1111, 100000, 100),
(25, 29, 1, 4, 112, 111111111, 1223111),
(28, 30, 5, 5, 1, 11, 1),
(30, 32, 4, 3, 132, 111111, 111000),
(31, 33, 4, 1, 234234, 23423234, 2324),
(34, 35, 4, 1, 554, 100000, 99000),
(35, 35, 1, 5, 6, 120000, 100000),
(38, 37, 4, 2, 12, 121212, 111111),
(39, 37, 1, 3, 123, 111222, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int NOT NULL,
  `ten_dm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_dm`, `mo_ta`) VALUES
(9, 'Áo1111', 'Các loại áo thời trang nam nữ'),
(10, 'Túi xách', 'Túi xách thời trang nam nữ các loại'),
(11, 'Đầm', 'Đầm thời trang nữ'),
(13, 'Quần', 'Quần thời trang nam nữ'),
(14, 'Áo đá bóng', '111'),
(15, 'Hoàng HOàng', '1'),
(16, 'Áo pro', 'pro'),
(17, 'Áo thu đông', 'Áo thu đông 2025');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `id_tai_khoan` int DEFAULT NULL,
  `ngay_dat` date DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '0',
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `id_pt_van_chuyen` int DEFAULT NULL,
  `id_km` int DEFAULT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_pt_thanh_toan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `id_tai_khoan` int DEFAULT NULL,
  `id_ct_sp` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id` int NOT NULL,
  `ten_km` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ma_km` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loai_km` tinyint(1) DEFAULT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`id`, `ten_km`, `ma_km`, `loai_km`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`) VALUES
(2, 'Freeship toàn quốc', 'FREESHIP11111', 0, '2025-03-15', '2025-04-15', 0),
(3, 'Giảm 50K cho đơn từ 500K', 'SAVE50', 0, '2025-03-10', '2025-03-25', 0),
(8, '1', '1222', 1, '2025-03-24', '2025-03-25', 1),
(9, 'a', 'b', 0, '2025-03-24', '2025-03-23', 1),
(10, '123', '321', 0, '2025-03-24', '2025-03-28', 0),
(11, 'Mã tăng giá', 'HOANG18', 0, '2025-03-24', '2025-03-30', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kich_co`
--

CREATE TABLE `kich_co` (
  `id` int NOT NULL,
  `ten_kich_co` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kich_co`
--

INSERT INTO `kich_co` (`id`, `ten_kich_co`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sac`
--

CREATE TABLE `mau_sac` (
  `id` int NOT NULL,
  `ten_mau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mau_sac`
--

INSERT INTO `mau_sac` (`id`, `ten_mau`) VALUES
(1, 'Đen'),
(2, 'Xanh lá'),
(3, 'Vàng'),
(4, 'Trắng'),
(5, 'Nâu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_thanh_toan`
--

CREATE TABLE `pt_thanh_toan` (
  `id` int NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `pt_thanh_toan`
--

INSERT INTO `pt_thanh_toan` (`id`, `name`) VALUES
(1, 'Thanh toán khi nhận hàng (COD)'),
(2, 'Thẻ tín dụng/Ghi nợ'),
(3, 'Ví điện tử (MoMo, ZaloPay)'),
(4, 'Chuyển khoản ngân hàng'),
(5, 'Trả góp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_van_chuyen`
--

CREATE TABLE `pt_van_chuyen` (
  `id` int NOT NULL,
  `phuong_thuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pt_van_chuyen`
--

INSERT INTO `pt_van_chuyen` (`id`, `phuong_thuc`) VALUES
(1, 'Giao hàng tiêu chuẩn'),
(2, 'Giao hàng nhanh'),
(3, 'Giao hàng hỏa tốc'),
(4, 'Nhận tại cửa hàng'),
(5, 'Chuyển phát quốc tế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int NOT NULL,
  `ten_sp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_dm` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1',
  `id_anh` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `id_dm`, `so_luong`, `mo_ta`, `hinh_anh`, `trang_thai`, `id_anh`) VALUES
(24, 'qưe', 13, 11, 'qưe', '1742547825_leverkusen 04.png', 1, NULL),
(25, 'pique', 16, 123, 'hoang taoooo', '1742547388_dejong.png', 1, NULL),
(28, 'iPhone 17', 9, 1111111, '12233221', '1742775575_f75e63d2c0188b8a98c6cbf27c20cbe6.jpg', 1, NULL),
(29, 'iPhone 1999', 11, 11111, 'ádasfdsdfas', '1742776941_e619b283cb94dfb6f480179f4e8913fd.jpg', 1, NULL),
(30, 'sp01', 14, 1, 'sp01', '1742777969_Untitled-1.jpg', 0, NULL),
(32, 'Hoàng Elkun', 15, 12, 'h', '1742821223_Untitled-1.jpg', 0, NULL),
(33, 'ưfasdfsg', 11, 23432, 'sfdgdg', '1742821294_2 (17).png', 0, NULL),
(35, 'iPhone 15', 10, 3, 'kkkk', '1742822756_messi (14).png', 0, NULL),
(37, 'sileva', 17, 135, '123', '1742823613_david silva .png', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mat_kkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `name`, `email`, `mat_kkhau`, `dia_chi`, `so_dien_thoai`, `hinh_anh`, `role`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@email.com', 'hashed_password_1', 'Hà Nội', '0901234567', 'avatar1.jpg', 1),
(2, 'Trần Thị B', 'tranthib@email.com', 'hashed_password_2', 'Hồ Chí Minh', '0912345678', 'avatar2.jpg', 1),
(3, 'Admin', 'admin@shop.com', 'admin_password', 'Hà Nội', '0987654321', 'admin.jpg', 0),
(4, 'Lê Văn C', 'levanc@email.com', 'hashed_password_3', 'Đà Nẵng', '0923456789', 'avatar3.jpg', 1),
(5, 'Phạm Thị D', 'phamthid@email.com', 'hashed_password_4', 'Cần Thơ', '0934567890', 'avatar4.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh_sp`
--
ALTER TABLE `anh_sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaDonHang` (`id_dh`),
  ADD KEY `MaChiTiet` (`id_ct_sp`);

--
-- Chỉ mục cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSP` (`id_sp`),
  ADD KEY `MaMau` (`id_mau`),
  ADD KEY `MaKichCo` (`id_kich_co`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKH` (`id_tai_khoan`),
  ADD KEY `MaPhiVanChuyen` (`id_pt_van_chuyen`),
  ADD KEY `MaKhuyenMai` (`id_km`),
  ADD KEY `don_hang_ibfk_4` (`id_pt_thanh_toan`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKH` (`id_tai_khoan`),
  ADD KEY `MaChiTiet` (`id_ct_sp`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pt_thanh_toan`
--
ALTER TABLE `pt_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pt_van_chuyen`
--
ALTER TABLE `pt_van_chuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaDanhMuc` (`id_dm`),
  ADD KEY `san_pham_ibfk_2` (`id_anh`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh_sp`
--
ALTER TABLE `anh_sp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `pt_thanh_toan`
--
ALTER TABLE `pt_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `pt_van_chuyen`
--
ALTER TABLE `pt_van_chuyen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_ct_sp`) REFERENCES `chi_tiet_sp` (`id`);

--
-- Các ràng buộc cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD CONSTRAINT `chi_tiet_sp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `chi_tiet_sp_ibfk_2` FOREIGN KEY (`id_mau`) REFERENCES `mau_sac` (`id`),
  ADD CONSTRAINT `chi_tiet_sp_ibfk_3` FOREIGN KEY (`id_kich_co`) REFERENCES `kich_co` (`id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_pt_van_chuyen`) REFERENCES `pt_van_chuyen` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`id_km`) REFERENCES `khuyen_mai` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`id_pt_thanh_toan`) REFERENCES `pt_thanh_toan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_ct_sp`) REFERENCES `chi_tiet_sp` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_anh`) REFERENCES `anh_sp` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
