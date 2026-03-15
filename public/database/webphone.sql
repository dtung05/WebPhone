-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 06, 2026 lúc 05:07 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonho`
--

CREATE TABLE `bonho` (
  `masp` char(20) DEFAULT NULL,
  `bonho` varchar(50) DEFAULT NULL,
  `gia` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bonho`
--

INSERT INTO `bonho` (`masp`, `bonho`, `gia`) VALUES
('iphone12', '64GB', 3500000.00),
('iphone12', '128GB', 6950000.00),
('iphone12', '256GB', 7350000.00),
('iphone13', '128GB', 12450000.00),
('iphone13', '256Gb', 13250000.00),
('iphone13', '512GB', 13950000.00),
('iphone14', '128GB', 12290000.00),
('iphone14', '256GB', 21890000.00),
('iphone14', '512GB', 23290000.00),
('iphone14pro', '64GB', 25590000.00),
('iphone14pro', '128GB', 27990000.00),
('iphone14pro', '256GB', 31990000.00),
('iphone15plus', '64GB', 18790000.00),
('iphone15plus', '128GB', 21490000.00),
('iphone15plus', '512GB', 17990000.00),
('iphone16pro', '64GB', 30090000.00),
('iphone16pro', '128GB', 36590000.00),
('iphone16pro', '256GB', 42690000.00),
('iphone16', '64GB', 18790000.00),
('iphone16', '128GB', 21490000.00),
('iphone16', '256GB', 24990000.00),
('xiaomi15', '128GB', 19450000.00),
('xiaomi15', '256GB', 22450000.00),
('xiaomi15', '512GB', 25450000.00),
('xiaomi14', '12-256GB', 16190000.00),
('xiaomi14', '12GB-512GB', 14870000.00),
('xiaomi14', '16-512GB', 14590000.00),
('xiaomi14p', '12-256GB', 6750000.00),
('xiaomi14p', '12GB-512GB', 7550000.00),
('xiaomi14p', '16-512GB', 7550000.00),
('redmi14c', '12-256GB', 2350000.00),
('redmi14c', '12GB-512GB', 2650000.00),
('redmi14c', '16-512GB', 2950000.00),
('note14', '12-256GB', 3950000.00),
('note14', '12GB-512GB', 4650000.00),
('note14', '16-512GB', 5050000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `masp` char(20) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `sosao` tinyint(4) DEFAULT NULL CHECK (`sosao` between 1 and 5),
  `noidung` text DEFAULT NULL,
  `ngaydanhgia` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `masp`, `mataikhoan`, `sosao`, `noidung`, `ngaydanhgia`) VALUES
(4, 'iphone12', 3, 5, 'đức tùng hehehehehehehehehehehe', '2025-12-26'),
(5, 'iphone12', 3, 3, 'dfd', '2025-12-27'),
(12, 'iphone12', 3, 2, 'đức tùng', '2025-12-28'),
(13, 'iphone12', 3, 2, 'dfsdfsdf', '2025-12-28'),
(14, 'iphone12', 3, 5, 'gfgdfgdf', '2025-12-28'),
(15, 'iphone12', 3, 5, 'cvcxv', '2025-12-28'),
(16, 'iphone12', 3, 2, 'đgdgdg', '2025-12-28'),
(17, 'iphone12', 3, 2, 'đgdgdg', '2025-12-28'),
(18, 'iphone12', 3, 5, 'fgfegsggfdgfgfdg', '2025-12-28'),
(50, 'iphone16', 11, 5, 'đức tùng', '2026-01-22'),
(51, 'iphone16', 11, 5, 'gfgf', '2026-01-22'),
(52, 'iphone16', 11, 5, 'fgfdgdf', '2026-01-22'),
(54, 'iphone16', 11, 5, 'đức tungffff', '2026-01-22'),
(55, 'iphone16', 11, 5, 'đức tungffffkkkk', '2026-01-22'),
(56, 'iphone16', 11, 5, 'đức tungffffkkkk', '2026-01-22'),
(57, 'iphone16', 11, 5, 'dfgfg', '2026-01-22'),
(63, 'iphone14pro', 11, 5, 'bai1', '2026-01-22'),
(64, 'iphone14pro', 11, 5, 'bai3', '2026-01-22'),
(65, 'iphone14pro', 11, 5, 'bai4\r\n', '2026-01-22'),
(75, 'iphone12', 11, 5, 'sản phẩm tuyệt vời \r\n', '2026-02-21'),
(76, 'iphone15plus', 11, 5, 'hị hị', '2026-02-21'),
(77, 'xiaomi14', 11, 5, 'abc', '2026-02-26'),
(78, 'xiaomi14', 11, 5, 'abc', '2026-02-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` char(20) NOT NULL,
  `ten_danh_muc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `ten_danh_muc`) VALUES
('iphone', 'IPhone'),
('xiaomi', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idOrder` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `ngaydat` datetime DEFAULT current_timestamp(),
  `trangthai` enum('choxacnhan','danggiao','hoanthanh','huy') DEFAULT 'choxacnhan',
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idOrder`, `mataikhoan`, `ngaydat`, `trangthai`, `diachi`, `sdt`) VALUES
(66, 11, '2026-01-23 23:04:35', 'choxacnhan', 'fdfsdfdsfd', '3'),
(67, 11, '2026-01-24 10:34:57', 'choxacnhan', 'dfdfdf', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `masp` char(20) NOT NULL,
  `gia` decimal(15,0) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` decimal(15,0) NOT NULL,
  `ngaythem` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `mataikhoan`, `masp`, `gia`, `soluong`, `tongtien`, `ngaythem`) VALUES
(35, 11, 'note14', 4650000, 6, 23250000, '2026-02-26 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id` int(11) NOT NULL,
  `masp` char(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `masp`, `url`) VALUES
(1, 'iphone12', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-12-den-didongviet_1_1_2.jpg&w=640&q=75'),
(2, 'iphone12', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-12-didongviet-mau-tim.jpg&w=640&q=75'),
(3, 'iphone12', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-12-hinh-anh1_2.jpg&w=640&q=75'),
(4, 'iphone12', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-12-hinh-anh2_3.jpg&w=640&q=75'),
(5, 'iphone12', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-12-hinh-anh3_1_1.jpg&w=640&q=75'),
(18, 'iphone13', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-13-128gb-didongviet_1.jpg&w=640&q=75'),
(20, 'iphone13', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F25%2F1%2F1737787426697_iphone_13.png&w=640&q=75'),
(21, 'iphone13', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-13-aar-xanh-la-didongviet_1.jpeg&w=640&q=75'),
(22, 'iphone13', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-13-red-10-didongviet.jpg&w=640&q=75'),
(23, 'iphone13', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-13-midnight-didongviet.jpg&w=640&q=75'),
(24, 'iphone14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-128gb-didongviet_1_1.jpg&w=640&q=75'),
(25, 'iphone14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-256gb-mau-do-cha-1-didongviet.jpg&w=384&q=75'),
(26, 'iphone14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-256gb-mau-do-cha-2-didongviet.jpg&w=384&q=75'),
(27, 'iphone14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-256gb-mau-do-cha-3-didongviet.jpg&w=384&q=75'),
(28, 'iphone14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-128gb-mau-den-didongviet_1.jpg&w=384&q=75'),
(29, 'iphone14pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F1%2F1%2F1727769793444_iphone_14pro_max_128gb_likenew_1.png&w=640&q=75'),
(30, 'iphone14pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-pro-128gb-likenew-3-didongviet_4.jpg&w=384&q=75'),
(31, 'iphone14pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-pro-128gb-likenew-2-didongviet_4.jpg&w=384&q=75'),
(32, 'iphone14pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-pro-128gb-likenew-5-didongviet_4.jpg&w=384&q=75'),
(33, 'iphone14pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fp%2Fiphone-14-pro-128gb-likenew-6-didongviet_4.jpg&w=384&q=75'),
(34, 'iphone15plus', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2023%2F8%2F29%2F1%2F1695953356175_thumb_iphone_15_didongviet.jpg&w=640&q=75'),
(35, 'iphone15plus', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2023%2F8%2F13%2F1%2F1694575451709_2_iphone_15_hong_didongviet.jpg&w=384&q=75'),
(36, 'iphone15plus', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2023%2F8%2F13%2F1%2F1694575461273_5_iphone_15_hong_didongviet.jpg&w=384&q=75'),
(37, 'iphone15plus', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2023%2F8%2F13%2F1%2F1694575466012_7_iphone_15_hong_didongviet.jpg&w=384&q=75'),
(38, 'iphone15plus', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2023%2F8%2F13%2F1%2F1694575468354_8_iphone_15_hong_didongviet.jpg&w=384&q=75'),
(39, 'iphone16pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F2%2F1%2F1727855468669_thumb_iphone_16_pro_didongviet.jpg&w=640&q=75'),
(40, 'iphone16pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F14%2F1%2F1736822440812_iphone_16promax.png&w=384&q=75'),
(41, 'iphone16pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F10%2F1%2F1725964028743_7_iphone_16_pro_den_didongviet.jpg&w=384&q=75'),
(42, 'iphone16pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F10%2F1%2F1725964038488_9_iphone_16_pro_den_didongviet.jpg&w=384&q=75'),
(43, 'iphone16pro', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F10%2F1%2F1725964033098_8_iphone_16_pro_sa_mac_didongviet.jpg&w=384&q=75'),
(44, 'iphone16', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F1%2F20%2F1%2F1740019709014_iphone_16e_trang.png&w=640&q=75'),
(45, 'iphone16', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F1%2F20%2F1%2F1740021598103_iphone_16e_white_pdp_image_position_5_colors_vn_vi.png&w=384&q=75'),
(46, 'iphone16', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F1%2F20%2F1%2F1740021610427_iphone_16e_white_pdp_image_position_7_features_and_specs_vn_vi.png&w=384&q=75'),
(47, 'iphone16', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F1%2F20%2F1%2F1740021551502_iphone_16e_white_pdp_image_position_1_white_color_vn_vi.png&w=384&q=75'),
(48, 'iphone16', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F1%2F20%2F1%2F1740021605181_iphone_16e_white_pdp_image_position_6_feature_story_vn_vi.png&w=384&q=75'),
(49, 'xiaomi15', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F2%2F2%2F1%2F1740929502926_xiaomi_15_ultra_bac_didongviet.png&w=640&q=75'),
(50, 'xiaomi15', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F2%2F2%2F1%2F1740929482520_xiaomi_15_ultra_didongviet.png&w=384&q=75'),
(51, 'xiaomi15', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F2%2F2%2F1%2F1740929500033_xiaomi_15_ultra_trang_didongviet.png&w=384&q=75'),
(52, 'xiaomi15', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F2%2F2%2F1%2F1740929491621_thumb_4_xiaomi_15_ultra_didongviet.png&w=384&q=75'),
(53, 'xiaomi15', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F2%2F2%2F1%2F1740929489272_thumb_3_xiaomi_15_ultra_didongviet.png&w=384&q=75'),
(54, 'xiaomi14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F17%2F1%2F1729146049439_xiaomi_14t_pro_thumb_moi_w_dummy_1.png&w=640&q=75'),
(55, 'xiaomi14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F1%2F1%2F1727756006865_xaomi_14t_pro_2_min.png&w=384&q=75'),
(56, 'xiaomi14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F1%2F1%2F1727756020507_xaomi_14t_pro_5_min.png&w=384&q=75'),
(57, 'xiaomi14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F1%2F1%2F1727756203338_xaomi_14t_pro_min_min_min.png&w=384&q=75'),
(58, 'xiaomi14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F9%2F1%2F1%2F1727756217580_xaomi_14t_pro_3_min_min_min.png&w=384&q=75'),
(59, 'xiaomi14p', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F16%2F1%2F1737000045636_1736924238327_xiaomi_redmi_note_14_pro_plus_5g_256gb_didongviet.png&w=1080&q=75'),
(60, 'xiaomi14p', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736532462606_pkcn_1_10.png&w=640&q=75'),
(61, 'xiaomi14p', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736532465623_pkcn_1_09.png&w=640&q=75'),
(62, 'xiaomi14p', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736532460026_pkcn_1_11.png&w=640&q=75'),
(63, 'xiaomi14p', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736532452676_pkcn_1_13.png&w=640&q=75'),
(69, 'redmi14c', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F7%2F30%2F1%2F1725008926155_redmi_14c_blue_didongviet_dummy_min.png&w=1080&q=75'),
(70, 'redmi14c', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F7%2F30%2F1%2F1725008915535_redmi_14c_black_didongviet_dummy_min.png&w=640&q=75'),
(71, 'redmi14c', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F16%2F1%2F1726479238885_xiaomi_redmi_14c_didongviet_1.jpg&w=640&q=75'),
(72, 'redmi14c', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F16%2F1%2F1726479241440_xiaomi_redmi_14c_didongviet_2.jpg&w=640&q=75'),
(73, 'redmi14c', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2024%2F8%2F16%2F1%2F1726479245393_xiaomi_redmi_14c_didongviet_3.jpg&w=640&q=75'),
(74, 'note14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F16%2F1%2F1737001950246_xiaomi_redmi_note_14_128gb_didongviet.png&w=1080&q=75'),
(75, 'note14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736531694997_pkcn_1_13.png&w=640&q=75'),
(76, 'note14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736531697704_pkcn_1_11.png&w=640&q=75'),
(77, 'note14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736531672392_pkcn_1_10.png&w=640&q=75'),
(78, 'note14', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fproducts%2F2025%2F0%2F11%2F1%2F1736531700749_pkcn_1_12.png&w=640&q=75');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `idOrderDetail` int(11) NOT NULL,
  `masp` char(30) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `idOrder` int(11) DEFAULT NULL,
  `tensp` varchar(200) DEFAULT NULL,
  `giathanh` double DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`idOrderDetail`, `masp`, `soluong`, `idOrder`, `tensp`, `giathanh`, `img`) VALUES
(1, 'iphone12', 4, 66, 'Iphone 12 pro max', 1000000, 'data:image/jpeg;base64,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'),
(2, 'iphone13', 4, 66, 'Iphone 12 pro max', 1000000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTizu2L1JAtbxnrVGUO9GN01j6BOZmXXrtIzQ&s');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `product`
-- (See below for the actual view)
--
CREATE TABLE `product` (
`masp` char(20)
,`tensp` varchar(255)
,`gia` decimal(15,2)
,`mota` text
,`soluong` int(11)
,`tendanhmuc` varchar(100)
,`manhinh` text
,`hedieuhanh` text
,`camarasau` text
,`camaratruoc` text
,`cpu` text
,`ram` text
,`dungluongpin` text
,`thesim` text
,`thietke` text
,`danhmuc_id` char(20)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` char(20) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` decimal(15,2) NOT NULL,
  `mota` text DEFAULT NULL,
  `soluong` int(11) DEFAULT 0,
  `danhmuc_id` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `mota`, `soluong`, `danhmuc_id`) VALUES
('iphone12', 'Điện thoại iPhone 12 Pro Max cũ', 10650000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2021/10/w300/iphone-12-pro-max-cu-vang.jpg.webp', 95, 'iphone'),
('iphone13', 'Điện thoại iPhone 13 mini Chính hãng VN/A', 20950000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2021/10/w300/iphone-13-pro-max-vang.jpg.webp', 51, 'iphone'),
('iphone14', 'Điện thoại iPhone 14 128GB', 12390000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2023/11/w300/iphone-14-plus-cu-mau-vang.jpg.webp', 8, 'iphone'),
('iphone14pro', 'Điện thoại iPhone 14 Pro Max Chính hãng VN/A', 24490000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2022/09/w300/iphone-14-pro-max-purple.jpg.webp', 32, 'iphone'),
('iphone15plus', 'Điện thoại iPhone 15 Plus', 15850000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2023/09/w300/iphone-15-plus-xanh-la-cu.jpg.webp', 67, 'iphone'),
('iphone16', 'Điện thoại iPhone 16e Chính hãng', 18790000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2025/02/w300/iphone-16e-trang.jpg.webp', 18, 'iphone'),
('iphone16hehe', 'Điện thoại iPhone 16 Plus cũ Chính hãng (99% - Trả góp 0%)', 18790000.00, 'data:image/jpeg;base64,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', 3, 'iphone'),
('iphone16pro', 'Điện thoại iPhone 16 Pro Max Chính hãng', 29350000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2024/09/w300/iphone-16-pro-max-titan-sa-mac.jpg.webp', 9, 'iphone'),
('note14', 'Điện thoại Xiaomi REDMI Note 14 Chính hãng', 3950000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2025/01/w300/redmi-note-14-chinh-hang-tim.jpg.webp', 17, 'xiaomi'),
('redmi14c', 'Điện thoại Xiaomi Redmi 14C Chính hãng', 2350000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2024/08/w300/redmi-14c-dac-biet-1.jpg.webp', 16, 'xiaomi'),
('xiaomi14', 'Điện thoại Xiaomi 14T Pro chính hãng', 16190000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2024/09/w300/xiaomi-14t-pro-titan-xanh.jpg.webp', 21, 'xiaomi'),
('xiaomi14p', 'Điện thoại Xiaomi Redmi Note 14 Pro Plus 5G', 6750000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2024/09/w300/xiaomi-redmi-note-14-pro-plus-xanh.jpg.webp', 15, 'xiaomi'),
('xiaomi15', 'Điện thoại Xiaomi 15 Ultra 5G - Chính hãng', 19450000.00, 'https://cdn.mobilecity.vn/mobilecity-vn/images/2025/02/w300/xiaomi-15-ultra-bac-den.jpg.webp', 22, 'xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `chucvu` enum('admin','nguoidung','nhanvien') NOT NULL DEFAULT 'nguoidung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hoten`, `email`, `taikhoan`, `matkhau`, `chucvu`) VALUES
(3, 'duc tung', 'ductunng05@gmail.com', 'ductung', 'ductung05', 'admin'),
(11, 'nhân viên', 'dtungg2e1@gmail.com', 'nhanvien', 'nhanvien', 'nhanvien'),
(12, 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin'),
(13, 'Nguoidung', 'nguoidung@gmail.com', 'nguoidung', 'nguoidung', 'nguoidung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsokythuat`
--

CREATE TABLE `thongsokythuat` (
  `masp` char(20) DEFAULT NULL,
  `manhinh` text DEFAULT NULL,
  `hedieuhanh` text DEFAULT NULL,
  `camarasau` text DEFAULT NULL,
  `camaratruoc` text DEFAULT NULL,
  `cpu` text DEFAULT NULL,
  `ram` text DEFAULT NULL,
  `dungluongpin` text DEFAULT NULL,
  `thesim` text DEFAULT NULL,
  `thietke` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsokythuat`
--

INSERT INTO `thongsokythuat` (`masp`, `manhinh`, `hedieuhanh`, `camarasau`, `camaratruoc`, `cpu`, `ram`, `dungluongpin`, `thesim`, `thietke`) VALUES
('iphone12', '	Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak) 6.7 inches (1284 x 2778 pixels), tỷ lệ 19.5:9 Kính Ceramic chống xước True-tone', 'iOS 14', '12 MP, f/1.6, 26mm (góc rộng), dual pixel PDAF, sensor-shift OIS 12 MP, f/2.2, 65mm (chân dung), PDAF, OIS, 2.5x optical zoom 12 MP, f/2.4, 13mm, 120˚ (góc siêu rộng) TOF 3D LiDAR scanner (đo độ sâu) Quay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps, 10‑bit HDR, Dolby Vision HDR (up to 60fps)', '12 MP, f/2.2, 23mm (góc rộng) Quay phim: 4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', '	Apple A14 Bionic (5 nm) 6 nhân (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm) GPU: Apple GPU (4 nhân đồ họa)', '6GB', 'Li-Ion 3687 mAh Sạc nhanh PD2.0, 50% trong 30ph (quảng cáo) Sạc không dây Qi2 15W (iOS 17.4) MagSafe không dây 15W', '	2 SIM', '	Thiết kế 2 mặt kính, khung thép không gỉ'),
('iphone13', '	Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision 6.7 inches (1284 x 2778 pixels), tỷ lệ 19.5:9 Kính cường lực Ceramic Shield True-tone', '	iOS 15', '12 MP, f/1.5, 26mm (góc rộng), dual pixel PDAF, sensor-shift OIS 12 MP, f/2.8, 77mm (chân dung), PDAF, OIS, 3x optical zoom 12 MP, f/1.8, 13mm, 120˚ (góc siêu rộng), PDAF Quay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps, 10‑bit HDR, Cinematic mode', '12 MP, f/2.2, 23mm (góc rộng) SL 3D, (đo chiều sâu) Quay phim: 4K@24/25/30/60fps, 1080p@30/60/120fps, gyro-EIS', '	Apple A15 Bionic (5 nm) 6 nhân (2x3.22 GHz Avalanche + 4xX.X GHz Blizzard) GPU: Apple GPU (5 nhân đồ họa)', '	6GB', '	128GB-1TB NVMe', '	2 SIM (1 eSIM)', 'Thanh + cảm ứng'),
('iphone14', 'Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (tối đa) 6.7 inches, 1.5K (1284 x 2778 pixels) KÍnh Ceramic Shield glass True-tone', 'iOS 16 Được lên iOS 26', '12 MP, f/1.5, 26mm (góc rộng), dual pixel PDAF, sensor-shift OIS 12 MP, f/2.4, 13mm, 120˚ (góc siêu rộng) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps), Cinematic mode (4K@30fps), stereo sound rec.', '12 MP, f/1.9, 23mm (góc rộng), PDAF SL 3D, (đo độ sâu / sinh trắc học) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', '	Apple A15 Bionic (5 nm) 6 nhân (2x3.23 GHz + 4x1.82 GHz) GPU: Apple GPU (5 nhân đồ hoạ)', '	6GB', 'Li-Ion 4323 mAh Sạc nhanh PD2.0, 50% trong 30ph (QC) Sạc không dây MagSafe 15W Sạc không dây Qi2 15W', '	1 NanoSIM và eSIM (Quốc tế) 2 eSIM (Mỹ) 2 Nano SIM (Trung Quốc)', 'Khung nhôm vuông vức Mặt lưng kính Corning-made Kính màn hình Ceramic Shield Kháng nước, bụi IP68'),
('iphone14pro', '	LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision 6.7 inches, Full HD+ (1290 x 2796 pixels) Thủy tinh gốm chống xước, lớp phủ oleophobic Always-On display', '	iOS 16', '48 MP, f/1.5, 26mm (góc rộng), dual pixel PDAF, cảm biến OIS 12 MP, f/1.8, 13mm, 120˚ (góc siêu rộng),dual pixel PDAF 12 MP, f/2.8, 77mm (telephoto), PDAF, OIS, 3x optical zoom TOF 3D LiDAR (đo chiều sâu) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, 10-bit HDR, Dolby Vision HDR (up to 60fps), ProRes, Cinematic mode (4K@30fps), stereo sound rec.', '12 MP, f/2.2 (góc rộng), PDAF SL 3D (đo độ sâu/sinh trắc học) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', 'Apple A16 Bionic (4 nm)', '	6GB', 'Sạc nhanh 20W, 50% in 30 min (Quảng cáo) USB Power Delivery 2.0 Sạc không dây MagSafe 15W Sạc không dây từ tính Qi 7.5W', '', ''),
('iphone15plus', '	Super Retina XDR OLED, HDR10, Dolby Vision, 1000 nits (HBM), 2000 nits (tối đa) 6.7 inches, 1.5K (1290 x 2796 pixels) Tỷ lệ 19.5:9, mật độ điểm ảnh ~460 ppi Ceramic Shield glass', '	iOS 17 Được lên iOS 18', '	48 MP, f/1.6, 26mm (góc rộng), dual pixel PDAF, sensor-shift OIS 12 MP, f/2.4, 13mm, 120˚ (góc siêu rộng) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps), Cinematic mode (4K@30fps), stereo sound rec.', '12 MP, f/1.9, 23mm (góc rộng), PDAF SL 3D (độ sâu/sinh trắc học) HDR, Cinematic mode (4K@30fps) Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', '	Apple A16 Bionic (4 nm) 6 nhân (2x3.46 GHz & 4x2.02 GHz) GPU: Apple GPU (5 lõi đồ họa)', '	6GB', '	Li-Ion 4383 mAh Sạc nhanh > 20W, 50% trong 30 ph (QC) Sạc không dây (MagSafe) 15W Sạc không dây (Qi2) 15W Sạc ngược 4.5W (dây)', '	Nano SIM và eSIM (Quốc tế) Chỉ eSIM (bản Mỹ) 2 SIM,Nano SIM (Trung Quốc)', 'Khung nhôm vuông vức Kính sau Corning-made Kính trước Ceramic Shield Thiết kế màn hình Dynamic Island Kháng nước, bụi IP68'),
('iphone16pro', 'LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM) 6.9 inches, 1.5K (1320 x 2868 pixels) Tỷ lệ 19.5:9, mật độ điểm ảnh ~460 ppi Always-on Display Ceramic Shield glass (2024 gen)', 'iOS 18', '48 MP, f/1.8, 24mm (góc rộng), dual pixel PDAF, sensor-shift OIS 12 MP, f/2.8, 120mm (tele tiềm vọng), dual pixel PDAF, 3D sensor‑shift OIS, zoom quang 5x 48 MP, f/2.2, 13mm (góc siêu rộng), dual pixel PDAF TOF 3D LiDAR scanner (độ sâu) Quay phim: 4K@24/25/30/60/100/120fps, 1080p@25/30/60/120/240fps, 10-bit HDR, Dolby Vision HDR (up to 60fps), ProRes, 3D (spatial) video/audio, stereo sound rec.', '	12 MP, f/1.9, 23mm (góc rộng), PDAF, OIS SL 3D (độ sâu/Cảm biến sinh trắc học) HDR, Dolby Vision HDR, 3D (spatial) audio, stereo sound rec. Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', 'Apple A18 Pro (3 nm) 6 nhân (2x4.04 GHz + 4x2.X GHz) Apple GPU (6 nhân đồ họa)', '	8GB', 'Li-Ion 4685 mAh Sạc nhanh (dây) Sạc 25W (không dây MagSafe) Sạc 15W (không dây Qi2) Sạc 4.5W ngược (dây)', 'Quốc tế: Nano SIM và eSIM Mỹ: 2 eSIM với nhiều số Trung Quốc: 2 SIM Nano', 'Khung titanium (grade 5) Mặt kính sau Corning-made Mặt kính trước Ceramic Shield (2024) Kháng nước, bụi IP68'),
('iphone16', 'Super Retina XDR OLED, HDR10, 800 nits (HBM), 1200 nits (peak) 6.1 inches, 1.5K (1170 x 2532 pixels) Tỷ lệ 19.5:9, mật độ điểm ảnh ~457 ppi', 'iOS 18.4', '48 MP, f/1.6, 26mm (góc rộng), PDAF, OIS Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, HDR, OIS, stereo sound rec.', '	12 MP, f/1.9 (góc rộng) SL 3D, (độ sâu/sinh trắc học)', '	Apple A18 (3 nm) 6 nhân (2x4.04 GHz + 4x2.20 GHz)', '8GB', '	Li-Ion 4005 mAh Sạc nhanh (dây) >20W Sạc không dây (Qi) 7.5W', '	Nano SIM + eSIM', '	Khung nhôm phẳng 2 mặt kính cường lực phẳng (Ceramic Shield) Kháng nước, bụi IP68 (dưới 6m trong 30 phút)'),
('xiaomi15', '	LTPO AMOLED, 68 tỷ màu, 120Hz, Dolby Vision, HDR10+, HDR Vivid, 3200 nits (peak) 6.73 inches, 2K (1440 x 3200 pixels) Tỷ lệ 20:9, mật độ điểm ảnh ~522 ppi', 'Android 15, HyperOS 2 (Hỗ trợ cập nhật 4 bản Android chính)', '	50 MP, f/1.6, 23mm (góc rộng), kích thước 1\", 1.6µm, dual-pixel PDAF, UIS 200 MP, f/2.6, 100mm (tiềm vọng tele), zoom quang 4.3x, 1/1.4\", 0.56µm, multi-directional PDAF, OIS', '32 MP, f/2.0, 21mm (góc rộng), 1/3.14\", 0.7µm HDR, panorama Quay phim: 4K@30/60fps, 1080p@30/60fps, gyro-EIS', '	Qualcomm SM8750-AB Snapdragon 8 Elite (3 nm) 8 nhân (2x4.32 GHz & 6x3.53 GHz) GPU: Adreno 830', '	12-16GB, LPDDR5X', 'Si/C Li-Ion 6000/5410 mAh Sạc nhanh 90W, PD3.0, QC3+ Sạc không dây 80W Sạc ngược 10W (không dây)', '	2 SIM Nano Hoặc 2 SIM Nano + 2 eSIM', '	Khung nhôm phẳng Mặt lưng kính/da cong nhẹ Kinh màn hình Xiaomi Shield Glass 2.0 cong nhẹ 4 cạnh Kháng nước, bụi IP68'),
('xiaomi14', '	AMOLED, 68 tỷ màu, 144Hz, Dolby Vision, HDR10+, 1600 nits (HBM), 4000 nits (peak) 6.67 inches, 1.5K (1220 x 2712 pixels)', 'Android 14, HyperOS', '	50 MP, f/1.6, 23mm (góc rộng), 1/1.31\", 1.2µm, PDAF, OIS 50 MP, f/2.0, 60mm (tele), 1/2.88\", 0.61µm, PDAF, zoom quang 2.6x 12 MP, f/2.2, 15mm (góc siêu rộng), 1/3.06\", 1.12µm', '	32 MP, f/2.0, 25mm (góc rộng), HDR Quay phim: 4K@30fps, 1080p@30/60fps, HDR10+', 'MediaTek Dimensity 9300 Plus (4 nm) 8 nhân (1x3.4 GHz & 3x2.85 GHz &4x2.0 GHz) GPU: Immortalis-G720 MC12', '	12-16GB, LPDDR5X (8533Mbps)', 'Li-Po 5000 mAh Sạc nhanh 120W, PD3.0, QC4, 100% trong 19 phút (QC) Sạc không dây 50W, sạc 100% trong 45 phút (QC)', '	Nano SIM, eSIM Hoặc eSIM Hoặc 2 Nano SIM', '	Khung nhôm vuông vức Mặt lưng kính bo cong nhẹ Kháng nước, bụi IP68 (ngâm nước dưới 2m trong 30 phút)'),
('xiaomi14p', '	AMOLED, 68 tỷ màu, 120Hz, HDR10+, Dolby Vision, 3000 nits (peak) 6.67 inches, 1.5K (1220 x 2712 pixels) Tỷ lệ 20:9, mật độ điểm ảnh ~446 ppi Always-on Display', 'Android 14, HyperOS Hỗ trợ cập nhật 3 bản Android chính', '50 MP, f/1.6 (góc rộng), 1/1.55\", 1.0µm, PDAF, OIS 8 MP, f/2.2, 120˚ (góc siêu rộng), 1/4.0\", 1.12µm 50 MP, f/2.0, 60mm (tele), PDAF (50cm - ∞), zoom quang 2.5x', '	20 MP (góc rộng) HDR, panorama Quay phim: 1080p@30/60fps', 'Qualcomm SM7635 Snapdragon 7s Gen 3 (4 nm) 8 nhân (1x2.5 GHz & 3x2.4 GHz & 4x1.80 GHz) GPU: Adreno 710 (940 MHz)', '12-16GB LPDDR4X/LPDDR5', '256-512GB U	Si/C 6200 mAh Sạc nhanh 90W, PDFS2.2/UFS3.1', '	2 SIM, Nano SIM', '	Khung nhựa bo cong Mặt lưng nhựa bo cong Màn hình cong + Cảm biến vân tay dưới màn hình Kháng nước, bụi IP68/IP69K (ngâm dưới nước 2m trong 24 giờ)'),
('redmi14c', 'IPS LCD, 120Hz, 450 nits (thông thường), 600 nits (HBM) 6.88 inches, HD+ (720 x 1640 pixels) Mật độ điểm ảnh ~260ppi', 'Android 14, HyperOS', '	50 MP, f/1.8 (góc rộng) x MP (Ống kính phụ) Quay phim: 1080p@30fps', '13 MP, f/2.0 (góc rộng) Quay phim: 1080p@30fps', 'MediaTek Helio G81 Ultra (12 nm) 8 nhân, (2×2.0 GHz & 6x1.7 GHz) GPU: Mali-G52 MC2', '	4-8GB, LPDDR4X	128GB, eMMC 5.1', '	5160 mAh Sạc nhanh 18W Tặng sạc 33W', '	2 SIM, Nano SIM', 'Khung nhựa vuông vức Mặt lưng phẳng giả kính/giả da Cảm biến vân tay cạnh bên Mở khóa bằng khuôn mặt AI'),
('note14', '	AMOLED, 120Hz, 1200 nits (HBM), 1800 nits (peak) 6.67 inches, Full HD+ (1080 x 2400 pixels) Tỷ lệ 20:9; Mật độ điểm ảnh ~395 ppi Always-on Display', 'Android 14, HyperOS', '	108 MP, f/1.7 (góc rộng), 1/1.67\", 0.64µm, PDAF 2 MP, f/2.4, (macro) 2 MP, f/2.4, (độ sâu) Quay phim: 1080p@30fps', '	20 MP, f/2.2 (góc rộng), 1/4.0\", 0.7µm Quay phim: 1080p@30fps', 'MediaTek MT8781 Helio G99 Ultra (6 nm) 8 nhân (2x2.2 GHz & 6x2.0 GHz) GPU: Mali-G57 MC2', '	6-8GB, LPDDR4X', '5500 mAh Sạc nhanh 33W Củ sạc 33W đi kèm', '2 SIM, Nano SIM', 'Khung nhựa phẳng Mặt lưng nhựa phẳng Màn hình phẳng kính Corning Gorilla 5 Kháng nước, bụi IP54'),
('iphone16hehe', 'LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 1600 nits (HBM), 3000 nits (peak) 6.3 inches, 1.5K (1206 x 2622 pixels) Tỷ lệ 19.5:9, mật độ điểm ảnh ~460 ppi Ceramic Shield 2; Lớp phủ chống phản xạ', 'iOS 18', '48 MP, f/2.2, 13mm, 120˚ (góc siêu rộng), PDAF TOF 3D LiDAR scanner (độ sâu) Quay phim: 4K@24/25/30/60/100/120fps, 1080p@25/30/60/120/240fps, 10-bit HDR, Dolby Vision HDR (up to 60fps), ProRes, ProRes RAW, Apple Log 2, 3D (spatial) video/audio, stereo sound rec.', '18 MP multi-aspect, f/1.9 (góc rộng), PDAF, OIS SL 3D (độ sâu/Cảm biến sinh trắc học) HDR, Dolby Vision HDR, 3D (spatial) audio, stereo sound rec., ProRes RAW, Apple Log 2 Quay phim: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', 'Apple A19 Pro (3 nm) 6 nhân (2x4.26 GHz + 4xX.X GHz) Apple GPU (6 lõi đồ họa)', '8GB', 'Li-Ion 3988 mAh (bản có Nano SIM) Li-Ion 4252 mAh (bản chỉ có eSIM) Sạc nhanh (dây) PD2.0 Sạc 25W (không dây MagSafe) Sạc 4.5W ngược (dây)', '2 SIM, Nano SIM', 'Khung hợp kim nhôm phẳng Mặt lưng phẳng bằng hợp kim nhôm + kính Kháng nước bụi, IP68 Bảo mật, mở khóa Face ID');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videodanhgia`
--

CREATE TABLE `videodanhgia` (
  `id` int(11) NOT NULL,
  `masp` char(20) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videodanhgia`
--

INSERT INTO `videodanhgia` (`id`, `masp`, `url`) VALUES
(9, 'iphone12', 'https://www.youtube.com/embed/z4CVsVF9bnk'),
(10, 'iphone12', 'https://www.youtube.com/embed/CUl58SCvBaw'),
(11, 'iphone12', 'https://www.youtube.com/embed/uVSDuVOKQzs'),
(12, 'iphone13', 'https://www.youtube.com/embed/EYaLk-yQy_Y'),
(13, 'iphone13', 'https://www.youtube.com/embed/m8jp_VQQsJM'),
(14, 'iphone13', 'https://www.youtube.com/embed/_9p5zcMf9vw'),
(15, 'iphone14', 'https://www.youtube.com/embed/wcmHyp5n7e8'),
(16, 'iphone14', 'https://www.youtube.com/embed/-B7OpGd5AvA'),
(17, 'iphone14', 'https://www.youtube.com/embed/zOkHIwea19s'),
(18, 'iphone14pro', 'https://www.youtube.com/embed/lOo1z5Ts_38'),
(19, 'iphone14pro', 'https://www.youtube.com/embed/NWkcFHY-DyM'),
(20, 'iphone14pro', 'https://www.youtube.com/embed/zOkHIwea19s'),
(21, 'iphone15plus', 'https://www.youtube.com/embed/waRzIuAEs30'),
(22, 'iphone15plus', 'https://www.youtube.com/embed/E2igD6AWNrU'),
(23, 'iphone15plus', 'https://www.youtube.com/embed/O0czMdLN8C0'),
(27, 'iphone16pro', 'https://www.youtube.com/embed/4jgk-1A_f6A'),
(28, 'iphone16pro', 'https://www.youtube.com/embed/RfakDAwVdRw'),
(29, 'iphone16pro', 'https://www.youtube.com/embed/hNNvgGSbVqQ'),
(30, 'iphone16', 'https://www.youtube.com/embed/xGHU9Cp5r04'),
(31, 'iphone16', 'https://www.youtube.com/embed/ekcskL7Z3S8'),
(32, 'iphone16', 'https://www.youtube.com/embed/dhCc0Av2U50'),
(33, 'xiaomi15', 'https://www.youtube.com/embed/M7oSnXJmRfQ'),
(34, 'xiaomi15', 'https://www.youtube.com/embed/M7oSnXJmRfQ'),
(35, 'xiaomi15', 'https://www.youtube.com/embed/M7oSnXJmRfQ'),
(36, 'xiaomi14', 'https://www.youtube.com/embed/qxsE4YQVQak'),
(37, 'xiaomi14', 'https://www.youtube.com/embed/6p6X-Pf6OvA'),
(38, 'xiaomi14', 'https://www.youtube.com/embed/eOWE-WaV-qw'),
(39, 'xiaomi14p', 'https://www.youtube.com/embed/IlnVvslypCI'),
(40, 'xiaomi14p', 'https://www.youtube.com/embed/IlnVvslypCI'),
(41, 'xiaomi14p', 'https://www.youtube.com/embed/jSiLn_4HHpo'),
(45, 'redmi14c', 'https://www.youtube.com/embed/pc3iOzipSJg'),
(46, 'redmi14c', 'https://www.youtube.com/embed/UN1sQ4H9fAo'),
(47, 'redmi14c', 'https://www.youtube.com/embed/pc3iOzipSJg'),
(48, 'note14', 'https://www.youtube.com/embed/Ehd4svUyftQ'),
(49, 'note14', 'https://www.youtube.com/embed/CqE-u8yJ0OM'),
(50, 'note14', 'https://www.youtube.com/embed/6E2_fB-paGg');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `product`
--
DROP TABLE IF EXISTS `product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product`  AS SELECT `sp`.`masp` AS `masp`, `sp`.`tensp` AS `tensp`, `sp`.`gia` AS `gia`, `sp`.`mota` AS `mota`, `sp`.`soluong` AS `soluong`, `dm`.`ten_danh_muc` AS `tendanhmuc`, `ts`.`manhinh` AS `manhinh`, `ts`.`hedieuhanh` AS `hedieuhanh`, `ts`.`camarasau` AS `camarasau`, `ts`.`camaratruoc` AS `camaratruoc`, `ts`.`cpu` AS `cpu`, `ts`.`ram` AS `ram`, `ts`.`dungluongpin` AS `dungluongpin`, `ts`.`thesim` AS `thesim`, `ts`.`thietke` AS `thietke`, `sp`.`danhmuc_id` AS `danhmuc_id` FROM ((`sanpham` `sp` join `danhmuc` `dm` on(`dm`.`danhmuc_id` = `sp`.`danhmuc_id`)) join `thongsokythuat` `ts` on(`sp`.`masp` = `ts`.`masp`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bonho`
--
ALTER TABLE `bonho`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masp` (`masp`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mataikhoan` (`mataikhoan`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`idOrderDetail`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `videodanhgia`
--
ALTER TABLE `videodanhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masp` (`masp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `idOrderDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `videodanhgia`
--
ALTER TABLE `videodanhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bonho`
--
ALTER TABLE `bonho`
  ADD CONSTRAINT `bonho_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `donhang` (`idOrder`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`danhmuc_id`);

--
-- Các ràng buộc cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD CONSTRAINT `thongsokythuat_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `videodanhgia`
--
ALTER TABLE `videodanhgia`
  ADD CONSTRAINT `videodanhgia_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

alter table donhang
add column nameuser varchar (80)
alter table donhang
add column thanhtoan varchar (20)