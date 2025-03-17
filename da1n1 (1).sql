-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 17, 2025 lúc 01:11 PM
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
(1, 1, 'p-1.png'),
(2, 1, 'ao_thun_den_2.jpg'),
(3, 2, 'ao_so_mi_trang.jpg'),
(4, 3, 'quan_jeans_xanh.jpg'),
(5, 4, 'ao_thun_nu_hong.jpg');

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

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_dh`, `id_ct_sp`, `so_luong`, `don_gia`, `thanh_tien`) VALUES
(1, 1, 1, 2, 220000.00, 440000.00),
(2, 1, 4, 1, 400000.00, 400000.00),
(3, 2, 2, 1, 220000.00, 220000.00),
(4, 2, 7, 1, 500000.00, 500000.00),
(5, 3, 9, 2, 180000.00, 360000.00);

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
(1, 1, 1, 2, 20, 250000, 220000),
(2, 1, 1, 3, 30, 250000, 220000),
(3, 1, 2, 2, 15, 250000, 220000),
(4, 2, 2, 3, 25, 450000, 400000),
(5, 2, 2, 4, 20, 450000, 400000),
(6, 3, 3, 2, 10, 550000, 500000),
(7, 3, 3, 3, 15, 550000, 500000),
(8, 4, 4, 1, 30, 200000, 180000),
(9, 4, 4, 2, 40, 200000, 180000),
(10, 5, 4, 2, 15, 350000, 320000);

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
(1, 'Áo thun nam', 'Các loại áo thun dành cho nam giới'),
(2, 'Áo sơ mi nam', 'Các loại áo sơ mi dành cho nam giới'),
(3, 'Quần jeans nam', 'Các loại quần jeans dành cho nam giới'),
(4, 'Áo thun nữ', 'Các loại áo thun dành cho nữ giới'),
(5, 'Váy đầm', 'Các loại váy đầm dành cho nữ giới');

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

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_tai_khoan`, `ngay_dat`, `trang_thai`, `dia_chi`, `so_dien_thoai`, `tong_tien`, `id_pt_van_chuyen`, `id_km`, `ghi_chu`, `id_pt_thanh_toan`) VALUES
(1, 2, '2025-03-10', 2, 'Số 123, Đường Nguyễn Văn Cừ, Quận 5, TP. HCM', '0912345678', 670000.00, 1, 2, 'Giao hàng giờ hành chính', 1),
(2, 3, '2025-03-12', 1, 'Số 45, Đường Lê Lợi, Quận Hải Châu, Đà Nẵng', '0976543210', 400000.00, 2, 1, NULL, 2),
(3, 4, '2025-03-13', 0, 'Số 67, Đường Trần Phú, Quận Ngô Quyền, Hải Phòng', '0965432109', 500000.00, 3, 3, 'Gọi trước khi giao', 3);

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

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `id_tai_khoan`, `id_ct_sp`, `so_luong`) VALUES
(1, 2, 3, 1),
(2, 2, 5, 1),
(3, 3, 7, 2),
(4, 4, 9, 1),
(5, 4, 10, 1);

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
(1, 'Giảm 10% tất cả sản phẩm', 'SALE10', 1, '2025-03-01', '2025-03-31', 1),
(2, 'Giảm 50K cho đơn hàng từ 500K', 'SALE50K', 0, '2025-03-01', '2025-04-15', 1),
(3, 'Miễn phí vận chuyển', 'FREESHIP', 0, '2025-03-10', '2025-03-20', 1);

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
(2, 'Trắng'),
(3, 'Xanh dương'),
(4, 'Đỏ'),
(5, 'Xám');

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
(2, 'Chuyển khoản ngân hàng'),
(3, 'Ví điện tử (MoMo, ZaloPay)'),
(4, 'Thẻ tín dụng/ghi nợ');

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
(3, 'Giao hàng hỏa tốc');

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
  `id_anh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `id_dm`, `so_luong`, `mo_ta`, `hinh_anh`, `trang_thai`, `id_anh`) VALUES
(1, 'Áo thun Cotton Compact', 1, 100, 'Áo thun nam chất liệu cotton 100%, thoáng mát', 'p-1.png', 1, 1),
(2, 'Áo sơ mi Oxford Regular Fit', 2, 80, 'Áo sơ mi nam chất liệu Oxford, kiểu dáng Regular Fit', 'ao_so_mi_trang.jpg', 1, 3),
(3, 'Quần Jeans Slim Fit', 3, 50, 'Quần jeans nam kiểu dáng Slim Fit, chất liệu co giãn', 'quan_jeans_xanh.jpg', 1, 4),
(4, 'Áo thun Basic Nữ', 4, 120, 'Áo thun nữ kiểu dáng cơ bản, chất liệu cotton mềm mại', 'ao_thun_nu_hong.jpg', 1, 5),
(5, 'Váy Đầm Suông', 5, 40, 'Váy đầm kiểu dáng suông, phù hợp cho mùa hè', 'vay_dam_suong.jpg', 1, 5);

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
(1, 'Nguyễn Văn Admin', 'admin@example.com', '123456', 'Hà Nội', '0987654321', 'admin.jpg', 0),
(2, 'Trần Thị Hương', 'huong@example.com', '123456', 'Hồ Chí Minh', '0912345678', 'huong.jpg', 1),
(3, 'Lê Văn Minh', 'minh@example.com', '123456', 'Đà Nẵng', '0976543210', 'minh.jpg', 1),
(4, 'Phạm Thị Lan', 'lan@example.com', '123456', 'Hải Phòng', '0965432109', 'lan.jpg', 1);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `pt_van_chuyen`
--
ALTER TABLE `pt_van_chuyen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_anh`) REFERENCES `anh_sp` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
