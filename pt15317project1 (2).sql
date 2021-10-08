-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2020 lúc 04:43 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pt15317project1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ten_hh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `yeu_cau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_hd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `ten_hh`, `ma_kh`, `dia_chi`, `so_luong`, `yeu_cau`, `image`, `tenloai`, `gia`, `phone_number`, `ten_kh`, `ma_hd`, `code_sale`) VALUES
(450, 'Harry Potter và hòn đá Phù thủy', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 216000, '0365791629', 'Huy Phan', 'Mk0mQe', ''),
(451, 'Thế giới sẽ chẳng có gì thay đổi kể cả khi bạn khóc', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0dee5d1215-5fbe687245f6a-sp14.jpg', '', 270000, '0365791629', 'Huy Phan', 'Mk0mQe', ''),
(452, 'Harry Potter và Hoàng tử lai', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0debf6f82f-5fbb5fcb5058d-sp8.jpg', '', 216000, '0365791629', 'Huy Phan', 'Mk0mQe', ''),
(484, 'Nobless', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '3', 'public/uploads/5fc0ded55d63b-5fbe6731c2e67-ma-ca-rong-quy-toc.jpg', '', 280000, '0365791629', 'Huy Phan', 'lQj5Y0', ''),
(485, 'Hyouka', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '3', 'public/uploads/5fc0de3d15db9-5fbb623bd3f6b-sp13.jpg', '', 750000, '0365791629', 'Huy Phan', 'lQj5Y0', ''),
(486, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '3', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan', 'lQj5Y0', ''),
(487, 'Nobless', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'lú', 'public/uploads/5fc0ded55d63b-5fbe6731c2e67-ma-ca-rong-quy-toc.jpg', '', 280000, '0365791629', 'Huy Phan', 'bk3J02', ''),
(488, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 2, 'lú', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan', 'bk3J02', ''),
(489, 'Hyouka', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'lú', 'public/uploads/5fc0de3d15db9-5fbb623bd3f6b-sp13.jpg', '', 675000, '0365791629', 'Huy Phan', 'bk3J02', ''),
(496, 'Nobless', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0ded55d63b-5fbe6731c2e67-ma-ca-rong-quy-toc.jpg', '', 280000, '0365791629', 'Huy Phan', 'VpeHgW', 'FREESHIP1'),
(497, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 2, '55555', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan', 'VpeHgW', 'FREESHIP1'),
(498, 'Hyouka', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0de3d15db9-5fbb623bd3f6b-sp13.jpg', '', 675000, '0365791629', 'Huy Phan', 'VpeHgW', 'FREESHIP1'),
(499, 'Nobless', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0ded55d63b-5fbe6731c2e67-ma-ca-rong-quy-toc.jpg', '', 280000, '0365791629', 'Huy Phan', 'mkJTjC', 'FREESHIP1'),
(500, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 2, '55555', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan', 'mkJTjC', 'FREESHIP1'),
(501, 'Hyouka', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0de3d15db9-5fbb623bd3f6b-sp13.jpg', '', 675000, '0365791629', 'Huy Phan', 'mkJTjC', 'FREESHIP1'),
(502, 'Harry Potter và hòn đá Phù thủy', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'hmFkc1', 'FREESHIP1'),
(503, 'Tôi muốn ăn tụy của bạn', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc7b770a4018-sp35.jpg', '', 350000, '0365791629', 'Huy Phan hu', 'hmFkc1', 'FREESHIP1'),
(504, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan hu', 'hmFkc1', 'FREESHIP1'),
(505, 'Harry Potter và hòn đá Phù thủy', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'YJ9Hy6', 'FREESHIP1'),
(506, 'Another', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '', 150000, '0365791629', 'Huy Phan hu', 'YJ9Hy6', 'FREESHIP1'),
(507, 'Những Cuộc Phiêu Lưu Của Pinocchio', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '4255', 'public/uploads/5fc11ca9d1ab0-sp32.jpg', '', 350000, '0365791629', 'Huy Phan hu', 'dGvoH3', 'FREESHIP1'),
(508, 'Hello world', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '4255', 'public/uploads/5fc7b47c8a422-sp34.jpg', '', 360000, '0365791629', 'Huy Phan hu', 'dGvoH3', 'FREESHIP1'),
(509, 'Sherlock Homes', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '4255', 'public/uploads/5fc7bbce23e84-sp37.jpg', '', 360000, '0365791629', 'Huy Phan hu', 'dGvoH3', 'FREESHIP1'),
(510, 'Harry Potter và Hoàng tử lai', 'PQH29', 'rssssg', 1, 'r', 'public/uploads/5fc0debf6f82f-5fbb5fcb5058d-sp8.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'Bu1rhQ', 'FREESHIP1'),
(511, 'Harry Potter và Hoàng tử lai', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0debf6f82f-5fbb5fcb5058d-sp8.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'XhVsxl', 'FREESHIP1'),
(512, 'Hello world', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc7b47c8a422-sp34.jpg', '', 360000, '0365791629', 'Huy Phan hu', 'uSkSCD', 'FREESHIP1'),
(513, 'Harry Potter và hòn đá Phù thủy', 'PQH29', '20 bà trưng', 1, '55555', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'UoaNka', 'FREESHIP1'),
(514, 'Hello world', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc7b47c8a422-sp34.jpg', '', 360000, '0365791629', 'Huy Phan hu', 'or7YlN', 'FREESHIP1'),
(515, 'Chân Trời Đảo Ngược', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc0f52c3d506-sp28.jpg', '', 350000, '0365791629', 'Huy Phan hu', 'mYJVjJ', 'FREESHIP1'),
(516, 'Tôi muốn ăn tụy của bạn', 'PQH29', 'khối 8 phường quỳnh thiện', 1, '55555', 'public/uploads/5fc7b770a4018-sp35.jpg', '', 350000, '0365791629', 'Huy Phan hu', 'CzOc9o', 'FREESHIP1'),
(517, 'Harry Potter và hòn đá Phù thủy', 'PQH29', 'khối 8 phường quỳnh thiện', 2, '55555', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'c8DwiR', 'FREESHIP1'),
(518, 'Harry Potter và Hoàng tử lai', 'PQH29', 'khối 8 phường quỳnh thiện', 1, 'nope', 'public/uploads/5fc0debf6f82f-5fbb5fcb5058d-sp8.jpg', '', 225000, '0365791629', 'Huy Phan hu', 'Cu9DAO', 'FREESHIP1'),
(519, 'Harry Potter và hòn đá Phù thủy', '', 'khối 8 phường quỳnh thiện', 2, 'nope', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '', 225000, '0365791629', 'Phan Quốc Huy', 'B1KhEV', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code_sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_thang` date DEFAULT NULL,
  `het_han` date DEFAULT NULL,
  `percent` int(11) NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `code`
--

INSERT INTO `code` (`id`, `code_sale`, `ngay_thang`, `het_han`, `percent`, `kich_hoat`) VALUES
(1, 'FREESHIP1', '2020-12-04', '2020-12-05', 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hh` int(11) NOT NULL,
  `ma_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `noi_dung`, `id_hh`, `ma_kh`, `ngay_bl`) VALUES
(2, 'chó', 2, 'PQH29', '2020-11-24'),
(3, 'ẻtyui', 27, 'thuytn2222', '2020-11-26'),
(4, 'uiu', 2, 'PQH29', '2020-12-06'),
(5, 'chó huy', 2, 'PQH29', '2020-12-06'),
(6, 'huy chó', 2, 'PH11301', '2020-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `chu_de` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dang` datetime NOT NULL,
  `nguoi_dang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `library`
--

INSERT INTO `library` (`id`, `chu_de`, `image`, `noi_dung`, `ngay_dang`, `nguoi_dang`) VALUES
(12, 'Ngắm nàng coser Việt hóa nữ quỷ trong Fate/Grand Order đẹp nhức mắt không thể rời', 'public/uploads/5fc0b98d8e3d4-5fbe8b88288de-photo-1-1606133323450696914369 (1).jpg', '<p>Nếu nhắc đến những tựa game mobile được l&ograve;ng người h&acirc;m mộ anime - manga nhất, Fate/Grand Order chắc chắn l&agrave; c&aacute;i t&ecirc;n kh&ocirc;ng thể thiếu, khi n&oacute; kh&ocirc;ng chỉ tỏa s&aacute;ng tại Nhật Bản m&agrave; c&ograve;n vươn tầm thế giới. B&ecirc;n cạnh lối chơi đầy th&uacute; vị, việc sở hữu những nh&acirc;n vật nữ... cũng g&oacute;p phần kh&ocirc;ng nhỏ khiến tựa game n&agrave;y trở n&ecirc;n nổi danh. V&agrave; 1 trong số đ&oacute;, chắc chắn c&aacute;c fan kh&ocirc;ng thể kh&ocirc;ng biết đến nữ quỷ vương Shuten Doji.</p>\r\n<p>Bộ ảnh cosplay Shuten Doji được thực hiện bởi Độc Huyền Cầm (c&ocirc; n&agrave;ng sinh năm 2000 đến từ H&agrave; Nội) đ&atilde; t&aacute;i hiện 1 c&aacute;ch ho&agrave;n hảo nữ quỷ n&agrave;y. Mời c&aacute;c bạn xem ở dưới đ&acirc;y!</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/5fbe8a42d9fbc-4967188898816be754cbfo-16061331631531278268691.jpg\" alt=\"\" width=\"640\" height=\"960\" /></p>\r\n<p>C&ocirc; c&oacute; t&ecirc;n thật l&agrave; Phan Quỳnh Trang, sở th&iacute;ch l&agrave; chụp ảnh, cosplay c&aacute;c nh&acirc;n vật giả tưởng v&agrave; hiện đang l&agrave;m người mẫu ảnh. C&aacute;c bộ ảnh m&agrave; c&ocirc; thực hiện đều dễ d&agrave;ng đốn tim những người kh&aacute;c bằng vẻ đẹp quyến rũ v&agrave; dễ thương của m&igrave;nh.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/5fbe8b88288de-photo-1-1606133323450696914369 (1).jpg\" alt=\"\" width=\"640\" height=\"427\" /></p>\r\n<p>Shuten Douji l&agrave; một trong Tam đại qu&aacute;i vật của Nhật Bản. Quỷ vương thống lĩnh đội qu&acirc;n Oni trong l&acirc;u đ&agrave;i tr&ecirc;n n&uacute;i. C&oacute; nhiều giả thuyết về nguồn gốc của Shuten-douji. C&oacute; giả thuyết cho rằng c&ocirc; được coi l&agrave; con của một con người v&agrave; Đại Thần Ibuki của N&uacute;i Ibuki, v&agrave; c&oacute; giả thuyết kh&aacute;c cho rằng c&ocirc; được coi l&agrave; đứa con do thi&ecirc;n đường gửi đến của N&uacute;i Togakushi. D&ugrave; sao đi nữa, c&ocirc; ấy cũng l&agrave; con của một Thần Long, c&oacute; c&ugrave;ng nguồn gốc với Sakata Kintoki.</p>\r\n<p><em><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/5fbe8b5a5f2a0-photo-2-1606132546829554990030.jpg\" alt=\"\" width=\"640\" height=\"960\" /> </em></p>\r\n<p style=\"text-align: center;\"><em>Nữ quỷ vương m&agrave; đ&aacute;ng y&ecirc;u thế n&agrave;y th&igrave; ai m&agrave; chả m&ecirc;</em></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/5fbe8bf516101-photo-1-16061333570961378036480.jpg\" alt=\"\" width=\"640\" height=\"960\" /></p>\r\n<p>Thế n&agrave;o, anh em c&oacute; h&agrave;i l&ograve;ng với m&agrave;n cosplay n&agrave;ng Shuten đầy quyến rũ trong tựa game Fate/Grand Order của nữ coser Việt Nam Độc Huyền Cầm kh&ocirc;ng ?</p>', '2020-11-27 04:54:47', 'Phan Quốc Huy'),
(13, 'BOM TẤN THANH GƯƠM DIỆT QUỶ: CHUYẾN TÀU VÔ TẬN SẼ ĐƯỢC KHỞI CHIẾU SỚM TẠI VIỆT NAM', 'public/uploads/5fc12d6d3f2df-728cf2e4cb00ab72_17b27b7942f9e6bf_7390816063962651185710.jpg', '<p>Tr&ecirc;n trang web chính thức của Galaxy Cinema đã c&ocirc;ng b&ocirc;́ sẽ chi&ecirc;́u sớm dự án \"Thanh Gươm Di&ecirc;̣t Quỷ: Chuy&ecirc;́n Tàu V&ocirc; T&acirc;̣n\" tại 4 cụm rạp ở 4 khu vực khác nhau tr&ecirc;n cả nước, cụ th&ecirc;̉ sẽ được c&acirc;̣p nh&acirc;̣t dưới đ&acirc;y. Giá vé ước tính khoảng 700 nghìn đ&ocirc;̀ng.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/c3c18646ce0ae010_782ae5ccc86aeb2a_15350616063960187185710.jpg\" alt=\"\" width=\"605\" height=\"403\" /></p>\r\n<p>4 cụm rạp sẽ khởi chi&ecirc;́u sớm bao g&ocirc;̀m:</p>\r\n<ul>\r\n<li>Tại Tp. H&ocirc;̀ Chí Minh:&nbsp;<strong>Galaxy Nguyễn Du</strong></li>\r\n<li>Tại Đà Nẵng:&nbsp;<strong>Galaxy Đà Nẵng</strong></li>\r\n<li>Tại Hải Phòng:&nbsp;<strong>Galaxy Hải Phòng</strong></li>\r\n<li>Tại Hà N&ocirc;̣i:&nbsp;<strong>Galaxy Tràng Thi</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/c621944288eeacbc_5c9d1d9e69038485_13537816063960922185710.jpg\" alt=\"\" width=\"640\" height=\"400\" /></p>\r\n<p>Theo th&ocirc;ng tin ghi nh&acirc;̣n tr&ecirc;n website, dự án sẽ được chi&ecirc;́u sớm duy nh&acirc;́t lúc 19h ngày 05 tháng 12 sắp tới. Giá vé cho&nbsp;<strong>su&acirc;́t chi&ecirc;́u sớm sẽ là 700 nghìn đ&ocirc;̀ng</strong>.&nbsp;</p>\r\n<p>Trong thời gian chờ đợi ngoài rạp chi&ecirc;́u, c&aacute;c fan của bộ truyện Thanh Gươm Diệt Quỷ cũng c&oacute; thể t&igrave;m đọc c&aacute;c ấn phẩm manga nguy&ecirc;n t&aacute;c từ NXB Kim Đồng ph&aacute;t h&agrave;nh v&agrave;o cuối th&aacute;ng 11. Đồng thời, tới tham dự sự kiện Offline \"<strong>Kimetsu no Yaiba - Thanh Gươm Diệt Quỷ Fan Meeting</strong>\" diễn ra v&agrave;o l&uacute;c 15h00 ng&agrave;y 28.11.2020 trong khu&ocirc;n khổ của \"Vietnam - Japan COMIC FES\" - Nh&agrave; thi đấu Nguyễn Du, 116 Nguyễn Du, phường Bến Th&agrave;nh, Quận 1, Th&agrave;nh phố Hồ Ch&iacute; Minh với rất nhiều c&aacute;c phần qu&agrave; v&agrave; nội dung hấp dẫn.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../public/uploads/dfb97f5a3b63f91c_e2772be0489dba4a_22702316063961708185710.jpg\" alt=\"\" width=\"656\" height=\"973\" /></p>', '2020-11-27 11:54:02', 'Huy Phan'),
(14, 'TOP 10 ANIME MÙA THU 2020 TUẦN 6 - RỚT HẠNG VÀ TĂNG HẠNG', 'public/uploads/5fc133444efa5-e2223fe4794d5793_263336b7c5adee18_5565116063151573185710.jpg', '<p>Ở tu&acirc;̀n trước, Akudama Drive đã vươn l&ecirc;n, c&ocirc;ng kích ng&ocirc;i vương và giành l&acirc;́y nó từ vị trí thứ tư, đưa Jujutsu Kaisen rớt hạng. Trong khi đó, cựu vương tu&acirc;̀n thứ 3, Tonikaku Kawaii, đã ti&ecirc;́p tục rớt hạng v&ecirc;̀ t&acirc;̣n vị trí thứ 4. Trong tu&acirc;̀n này, các cựu vương sẽ giành lại vị trí hay c&acirc;u chuy&ecirc;̣n sẽ v&acirc;̃n ti&ecirc;́p di&ecirc;̃n như th&ecirc;́?</p>\r\n<p><strong>10. Love Live! Nijigasaki High School Idol Club</strong></p>\r\n<p><span style=\"color: #9c0000;\">Ꙭ \"Rớt 2 hạng\" ↙</span></p>\r\n<p><span style=\"color: #9c0000;\"><img src=\"../../public/uploads/a1084913a4a0e607_df505b0c697ff736_21168716063149045185710.jpg\" alt=\"\" width=\"721\" height=\"481\" />Thứ hạng tu&acirc;̀n trước: 08 | Thứ hạng cao nh&acirc;́t: 08</span></p>\r\n<p><strong>9. Yuukoku no Moriarty</strong></p>\r\n<p><span style=\"color: #b56308;\">Ꙭ \"Lag hạng\" ↗↙</span></p>\r\n<p><span style=\"color: #b56308;\"><img src=\"../../public/uploads/4fc9247fb770d1ef_b9279531d9cffcf2_9647816063149166185710.jpg\" alt=\"\" width=\"800\" height=\"450\" /></span></p>\r\n<p><span style=\"color: #9c0000;\">Thứ hạng tu&acirc;̀n trước: 09 | Thứ hạng cao nh&acirc;́t: 09</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>8. Haikyuu!</strong></p>\r\n<p><span style=\"color: #9c0000;\">Ꙭ \"Rớt 1 hạng\" ↙</span></p>\r\n<p><span style=\"color: #9c0000;\"><img src=\"../../public/uploads/1cf8ef4bcb6a07ba_3091e4f2842ee37c_13064016063149231185710.jpg\" alt=\"\" width=\"728\" height=\"410\" />Thứ hạng tu&acirc;̀n trước: 07 | Thứ hạng cao nh&acirc;́t: 03</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>7. Adachi to Shimamura&nbsp;</strong></p>\r\n<p><span style=\"color: #397b21;\">Ꙭ \"Tăng 3 hạng\" ↗</span></p>\r\n<p><span style=\"color: #397b21;\"><img src=\"../../public/uploads/324544b96e9d34c4_207773cf1d5314b1_7928016063149432185710.jpg\" alt=\"\" width=\"800\" height=\"450\" />Thứ hạng tu&acirc;̀n trước: 10 | Thứ hạng cao nh&acirc;́t: 07</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>6. Munou na Nana</strong></p>\r\n<p><span style=\"color: #9c0000;\">Ꙭ \"Rớt 1 hạng\" ↙</span></p>\r\n<p><img src=\"../../public/uploads/ab4635f1aec3f026_0398b652ea539f8e_9916216063149527185710.jpg\" alt=\"\" width=\"800\" height=\"410\" />Thứ hạng tu&acirc;̀n trước: 05 | Thứ hạng cao nh&acirc;́t: 05</p>\r\n<p>&nbsp;</p>\r\n<p><strong>5. Jujutsu Kaisen&nbsp;</strong></p>\r\n<p><span style=\"color: #9c0000;\">Ꙭ \"Rớt 3 hạng\" ↙</span></p>\r\n<p><span style=\"color: #9c0000;\"><img src=\"../../public/uploads/be776d01f5a05a64_61c5690cbc7e0a41_11813816063149587185710.jpg\" alt=\"\" width=\"800\" height=\"419\" />Thứ hạng tu&acirc;̀n trước: 02 | S&ocirc;́ l&acirc;̀n đạt đỉnh ANITREND: 03 (Tu&acirc;̀n 1 - Tu&acirc;̀n 2 - Tuần 4)</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>4. Tonikaku Kawaii&nbsp;</strong></p>\r\n<p><span style=\"color: #b56308;\">Ꙭ \"Lag hạng\" ↗↙</span><img src=\"../../public/uploads/60ba22244ead85c2_22d84e20f2dbb54d_6428616063149645185710.jpg\" alt=\"\" width=\"800\" height=\"450\" />Thứ hạng tu&acirc;̀n trước: 04 | S&ocirc;́ l&acirc;̀n đạt đỉnh ANITREND: 01 (Tu&acirc;̀n 3)</p>\r\n<p>&nbsp;</p>\r\n<p><strong>3. Kami-sama ni Natta Hi</strong></p>\r\n<p><span style=\"color: #397b21;\">Ꙭ \"Tăng 3 hạng\" ↗</span></p>\r\n<p><span style=\"color: #397b21;\"><img src=\"../../public/uploads/a6766f4052a97c96_d261f2c671d777d8_10645016063150355185710.jpg\" alt=\"\" width=\"800\" height=\"450\" />Thứ hạng tu&acirc;̀n trước: 06 | Thứ hạng cao nh&acirc;́t: 03</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. Majo no Tabitabi</strong></p>\r\n<p><span style=\"color: #397b21;\">Ꙭ \"Tăng 1 hạng\" ↗</span></p>\r\n<p><span style=\"color: #397b21;\"><img src=\"../../public/uploads/e4caf117efcd1f71_01ae0376178c71cc_13620616063150244185710.jpg\" alt=\"\" width=\"800\" height=\"453\" /></span></p>\r\n<p><span style=\"color: #397b21;\">Thứ hạng tu&acirc;̀n trước: 03 | Thứ hạng cao nh&acirc;́t: 02</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>1. Akudama Drive</strong></p>\r\n<p><span style=\"color: #b56308;\">Ꙭ \"Max hạng\" ↗↙</span></p>\r\n<p><span style=\"color: #b56308;\"><img src=\"../../public/uploads/c327c55ca698d410_a497e10bccadcbab_11914616063151165185710 (1).jpg\" alt=\"\" width=\"800\" height=\"450\" />Thứ hạng tu&acirc;̀n trước: 01 | S&ocirc;́ l&acirc;̀n đạt đỉnh ANITREND: 02 (Tu&acirc;̀n 5 - Tu&acirc;̀n 6)</span></p>', '2020-11-28 12:12:29', 'Huy Phan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manage_img`
--

CREATE TABLE `manage_img` (
  `id` int(11) NOT NULL,
  `banner1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manage_img`
--

INSERT INTO `manage_img` (`id`, `banner1`, `banner2`, `banner3`, `logo`) VALUES
(8, 'public/uploads/5fc0e3952b858-5fbd22755b683-hyouka_21.jpg', 'public/uploads/5fc0e3952bb1f-5fbcfc5606354-5fbcfc184f4ef-5fbca789508d0-images1.jpg', 'public/uploads/5fc0e3952bdb4-5fbca78950c5e-images6.jpg', 'public/uploads/5fc0e3952bf88-5fbca07ec1530-logoduan1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_thang` date NOT NULL,
  `chu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `noi_dung`, `ngay_thang`, `chu_de`, `image`) VALUES
(1, 'Dưới đây là bộ ảnh cosplay nàng Shuten đầy quyến rũ trong tựa game Fate/Grand Order của nữ coser Việt Nam Độc Huyền Cầm.', '2020-11-25', 'Ngắm nàng coser Việt hóa nữ quỷ trong Fate/Grand Order đẹp nhức mắt không thể rời', 'publics/uploads/5fbe8125b1a79-photo-1-1606133323450696914369.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yeu_cau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_hd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_mua` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_products`
--

INSERT INTO `orders_products` (`id`, `dia_chi`, `yeu_cau`, `phone_number`, `ma_hd`, `ngay_mua`) VALUES
(148, 'khối 8 phường quỳnh thiện', 'nope', '0365791629', 'Mk0mQe', NULL),
(171, 'khối 8 phường quỳnh thiện', '3', '0365791629', 'lQj5Y0', NULL),
(172, 'khối 8 phường quỳnh thiện', 'lú', '0365791629', 'bk3J02', NULL),
(177, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'VpeHgW', NULL),
(178, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'mkJTjC', '2020-12-03'),
(179, 'khối 8 phường quỳnh thiện', 'nope', '0365791629', 'hmFkc1', '0000-00-00'),
(180, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'YJ9Hy6', '2020-05-12'),
(181, 'khối 8 phường quỳnh thiện', '4255', '0365791629', 'dGvoH3', '2020-12-03'),
(182, 'rssssg', 'r', '0365791629', 'Bu1rhQ', '0000-00-00'),
(183, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'XhVsxl', '2020-05-12'),
(184, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'uSkSCD', '2020-12-05'),
(185, '20 bà trưng', '55555', '0365791629', 'UoaNka', '2020-12-03'),
(186, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'or7YlN', '2020-12-03'),
(187, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'mYJVjJ', '2020-12-03'),
(188, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'CzOc9o', '2020-12-03'),
(189, 'khối 8 phường quỳnh thiện', '55555', '0365791629', 'c8DwiR', '2020-12-06'),
(190, 'khối 8 phường quỳnh thiện', 'nope', '0365791629', 'Cu9DAO', '2020-12-06'),
(191, 'khối 8 phường quỳnh thiện', 'nope', '0365791629', 'B1KhEV', '2020-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ma_hh` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` int(11) NOT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `luot_xem` int(11) NOT NULL,
  `mo_ta` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theloailq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luot_mua` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ma_hh`, `name`, `don_gia`, `sale`, `image`, `tenloai`, `trang_thai`, `ngay_nhap`, `luot_xem`, `mo_ta`, `theloailq`, `so_luot_mua`, `giam_gia`) VALUES
(1, 'Another', 150000, '0', 'public/uploads/5fc0de2c34d0a-5fbb63e535c56-sp3.jpg', '2', 0, '2020-10-30', 122, 'Nội dung xoay quanh Kouichi Sakakibara, khi chuyển về nhà ông bà sống vì bố phải công tác xa thì vào ngày đầu tiên của năm học cậu bị tràn khí phổi và phải nằm viện. Ở đó cậu gặp Mei Misaki, một cô bé kì lạ. Sau khi bình phục cậu phát hiện cô bé học cùng ', 'Kinh dị - Tình cảm - Viễn tưởng ', 5, 150000),
(2, 'Hyouka', 750000, '10', 'public/uploads/5fc0de3d15db9-5fbb623bd3f6b-sp13.jpg', '3', 0, '2020-11-02', 301, '222fg', ' Anime - Tình cảm - Hài hước - Phiêu lưu - Học đường - Đời thường               ', 2, 675000),
(3, 'Rewrite', 750000, '0', 'public/uploads/5fc0de458cb3e-5fbb5f277d027-sp5.jpg', '5', 1, '2020-11-17', 103, 'try', ' Anime Kinh dị Tình cảm Hài hước Phiêu lưu Học đường Hành động Viễn tưởng                ', 0, 750000),
(20, 'Harry Potter và hòn đá Phù thủy', 250000, '10', 'public/uploads/5fc0de572a90d-5fbb5f3ae60ca-sp6.jpg', '9', 0, '2020-10-29', 190, 'Phù thủy bóng tối ác độc và quyền năng nhất lịch sử, Chúa tể Voldemort, đã ám sát vợ chồng James Potter và Lily Potter nhưng biến mất bí ẩn sau khi không giết được con trai nhỏ của họ là Harry. Trong khi thế giới phù thủy ăn mừng sự sụp đổ của đế chế Vold', 'Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 2, 225000),
(21, 'Harry potter và phòng chứa bí mật', 250000, '10', 'public/uploads/5fc0de7e05619-5fbb5f66027dd-sp10.jpg', '9', 0, '2020-10-29', 74, 'Harry Potter nghỉ hè tại gia đình dì dượng Dursley trước khi nhập học năm thứ hai tại Học viện Pháp thuật và Ma thuật Hogwarts. Gia tinh Dobby xuất hiện bất ngờ và gây nhiều rắc rối, dẫn đến việc Harry bị khóa kín trong căn phòng trên lầu. Harry được giải', ' Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 225000),
(22, 'Harry Potter và tên tù nhân ngục Azkaban', 240000, '0', 'public/uploads/5fc0de8f5e970-5fbb607f4a2eb-sp12.jpg', '9', 0, '2020-10-29', 92, 'Mùa hè năm thứ ba ở gia đình dì dượng Dursley của Harry thực sự trở thành địa ngục khi có sự xuất hiện của cô Marge. Bằng những lời lẽ thô bỉ, bà ta đã xúc phạm ba mẹ Harry, khiến cậu bị tổn thương và trong một phút nóng giận, Harry đã làm phép cho bà cô ', ' Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 0),
(23, 'Harry Potter và Chiếc cốc lửa', 140000, '0', 'public/uploads/5fc0de9bd2cd9-5fbb5fa503870-sp9.jpg', '9', 0, '2020-10-29', 112, 'Harry Potter, cùng gia đình Weasley, đi xem trận chung kết Quidditch thế giới lần thứ 422, nơi diễn ra một hiện tượng kì bí làm mọi người đều run sợ, đó là sự xuất hiện của những Tử Thần Thực Tử. Cậu đã mơ thấy một giấc mơ lạ trong ngôi nhà của Riddle với', 'Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 0),
(24, 'Harry Potter và Hội Phượng Hoàng', 140000, '0', 'public/uploads/5fc0deaec5b37-5fbb5fbc04d75-sp11.jpg', '9', 0, '2020-10-29', 107, 'Trong kỳ nghỉ hè tại gia đình dì dượng Dursley trước khi bước vào năm thứ năm tại Hogwarts, Harry Potter không nhận được nhiều tin tức từ thế giới phù thủy. Harry rất bực mình vì Voldemort vừa mới được sống dậy mà hai người bạn của Harry, Hermione Granger', ' Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 0),
(25, 'Harry Potter và Hoàng tử lai', 250000, '10', 'public/uploads/5fc0debf6f82f-5fbb5fcb5058d-sp8.jpg', '9', 1, '2020-11-01', 143, 'Một thời đại tăm tối đã mở ra sau khi tên Chúa tể Hắc ám ngang nhiên tái xuất giang hồ. Thế giới phù thủy và Muggle đan xen vào nhau với những rắc rối đau đầu, khiến cho nhà lãnh đạo của cả hai xứ phải hợp sức với nhau giải quyết.\r\nSeverus Snape vốn đang ', ' Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 225000),
(26, 'Harry Potter và Bảo bối Tử thần', 140000, '0', 'public/uploads/5fc0dec902e63-5fbb5fdc7e592-sp7.jpg', '9', 1, '2020-10-29', 38, 'Harry Potter và Bảo bối Tử thần tiếp tục cuộc tìm kiếm những Trường Sinh Linh Giá còn lại mà Harry chưa phá hủy trong tập 6. Sau cái chết của Albus Dumbledore, Chúa tể Voldemort và các Tử thần Thực tử đã xâm nhập vào được Bộ Pháp thuật, giết chết Bộ trưởn', ' Tình cảm  Hài hước  Phiêu lưu  Học đường  Hành động  Viễn tưởng ', 0, 0),
(27, 'Nobless', 280000, '0', 'public/uploads/5fc0ded55d63b-5fbe6731c2e67-ma-ca-rong-quy-toc.jpg', '8', 0, '2020-11-25', 11, 'Sau 820 năm chìm trong giấc ngủ dài, Cadis Etrama Di Raizel (hay Rai) đã thức tỉnh. Rai là một Vampire và vì đã ngủ quá lâu nên chẳng biết gì về thế giới bên ngoài. Sau khi thức tỉnh anh ta đã hòa mình vào cùng những học sinh khác, có nhiều bạn bè. Nhưng ', ' Anime -  Tình cảm -  Hài hước -  Phiêu lưu -  Học đường -  Hành động -  Viễn tưởng', 1, 0),
(28, 'Thế giới sẽ chẳng có gì thay đổi kể cả khi bạn khóc', 300000, '10', 'public/uploads/5fc0dee5d1215-5fbe687245f6a-sp14.jpg', '10', 0, '2020-11-25', 1, 'Khởi đầu và kết thúc của tình yêu không bao giờ rõ ràng. Ta có thể tổ chức kỉ niệm ngày bắt đầu tình yêu, một trăm ngày, một năm, hay một ngàn ngày, nhưng để ghi nhớ được ngày đầu tiên tình yêu chớm nở quả không phải việc dễ.', ' Tình cảm - Đời thường', 1, 270000),
(29, 'Don Quixote', 250000, '0', 'public/uploads/5fc0df3ad497c-5fc07bcd7570a-donquixote.jpg', '10', 2, '2020-11-27', 0, 'Don Quixote thực chất không chỉ là một con người đầu óc hoang tưởng, nhìn ở đâu cũng thấy kẻ xấu cần diệt trừ, mà còn là một ẩn dụ sâu sắc về cái thiện, cái đẹp trong cuộc đời nhiều thay đổi này. Cuốn truyện khá dài, nhưng một khi bạn đã bị hút vào nó thì', ' Hài hước -  Phiêu lưu -  Đời thường -Viễn tưởng', 0, 0),
(30, 'Sự im lặng của bầy cừu', 275000, '0', 'public/uploads/5fc0dfb86b929-SP15.jpg', '10', 2, '2020-10-29', 1, 'Những cuộc phỏng vấn ở xà lim với kẻ ăn thịt người ham thích trò đùa trí tuệ, những tiết lộ nửa chừng hắn chỉ dành cho kẻ nào thông minh, những cái nhìn xuyên thấu thân phận và suy tư của cô mà đôi khi cô muốn lảng tránh... Clarice Starling đã dấn thân và', 'Kinh dị -  Phiêu lưu -  Đời thường -  Hành động -  Văn học nước ngoài  - Trinh thám', 0, 0),
(31, 'nếu chỉ còn một ngày để sống sách', 300000, '10', 'public/uploads/5fc0e619bcb01-sp16.jpg', '10', 0, '2020-10-29', 0, 'Nếu Chỉ Còn Một Ngày Để Sống, câu chuyện kể về một cô gái – Madeline – mắc phải một chứng bệnh hiếm gặp ( Serve Combined Immunodeficiency), mà có lẽ suốt cuộc đời cô gái đó phải sống trong nhà, nơi mà mẹ cô cho xây dựng và thiết lập các thiết bị để khử tr', 'Tình cảm -  Đời thường -  Văn học nước ngoài ', 0, 270000),
(32, 'Bắt trẻ đồng xanh', 275000, '0', 'public/uploads/5fc0e714c700e-sp17.jpg', '10', 2, '2020-10-29', 0, 'Bắt Trẻ Đồng Xanh là một cuốn sách nhỏ, mỏng và chẳng giống ai. Điều đó cũng là tính cách của nhân vật chính, Holden – nổi loạn, thiếu giáo dục, và lạ lùng. Holden không thích cái gì cả, cậu chỉ muốn đứng trên mép vực của một cánh đồng bao la, để trông ch', ' Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(33, 'Colorful', 350000, '10', 'public/uploads/5fc0e80178d69-sp18.jpg', '10', 0, '2020-11-29', 0, 'Cuốn sách thật sự rất ý nghĩa, cái cách mà tác giả mang đến một thế giới đơn sắc ngay từ đầu và cách nó chuyển thành 1 thế giới muôn màu đột ngột, bài học là đừng nhìn thế giới từ 1 phía mà nhìn nó bằng tất cả giác quan, đừng bồng bột mà hành động, cái kế', ' Anime -  Tình cảm -  Phiêu lưu -  Viễn tưởng -  Văn học nước ngoài', 0, 315000),
(34, 'Người Đua Diều', 300000, '0', 'public/uploads/5fc0e88500f26-sp19.jpg', '10', 2, '2020-10-29', 0, 'Người Đua Diều có lẽ là cuốn sách đầu tiên giúp người đọc Việt Nam nhìn nhận một cách đầy đủ và chân thực nhất về vẻ đẹp cũng như nỗi đau của Afghanistan, một đất nước, một dân tộc, một nền văn hóa lâu đời bị tàn phá bởi những kẻ cuồng tín. Người Đua Diều', 'Tình cảm -  Đời thường -  Hành động -  Văn học nước ngoài', 0, 0),
(35, 'Bố Con Cá Gai', 300000, '0', 'public/uploads/5fc0e8eb98604-sach-bo-con-ca-gai.jpg', '10', 0, '2020-10-29', 0, 'Ông bố ấy đích thị là bố cá gai – một cá bố rất kỳ lạ – cả nguồn sống chỉ co cụm quẩn quanh cá gai con tí xíu. Như một ông bố ngốc!', ' Anime -  Kinh dị -  Tình cảm -  Hài hước -  Phiêu lưu -   Đời thường -  Hành động -  Viễn tưởng -  Văn học nước ngoài -  Trinh thám - ', 0, 300000),
(36, 'Hachiko: Chú Chó Đợi Chờ', 450000, '10', 'public/uploads/5fc0e9dd8ec06-sp21.jpg', '10', 0, '2020-10-29', 2, 'Hachiko đã trở thành biểu tượng về lòng trung thành. Tượng của chú được đặt trang trọng tại nhà ga Shibuya. Câu chuyện về Hachiko được kể lại với lời văn sâu lắng của nhà văn Luis Prats cùng hình minh họa màu nước ấn tượng của Zuzanna Celej sẽ làm lay độn', ' Anime -  Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 405000),
(37, 'Tiếng Gọi Nơi Hoang Dã', 350000, '0', 'public/uploads/5fc0ea86732b4-sp22.jpg', '10', 0, '2020-10-29', 1, 'Nguyên tác của tác phẩm văn học nước ngoài này là The Call of the Wild đã luôn nằm trong danh sách bán chạy và khuyên đọc trên khắp thế giới. Đây là câu chuyện về một chú chó Bấc trung thành, qua nhiều biến cố Bấc đã dần đánh mất mối liên hệ với con người', ' Anime -  Tình cảm -  Hài hước -  Phiêu lưu -  Đời thường -  Hành động -  Văn học nước ngoài', 0, 0),
(38, 'Bay Trên Tổ Chim Cúc Cu', 350000, '0', 'public/uploads/5fc0eb1cdaaa3-sp23.jpg', '10', 2, '2020-10-29', 0, 'Lại một lần nữa, hình ảnh một kẻ điên cuồng to lớn và có mái tóc đỏ hung được khắc hoạ vào cuốn Bay trên tổ chim cúc cu. Đây là lần thứ hai tôi gặp hình ảnh mái tóc đỏ ấy, lần đầu tiên ở tác phẩm Suối Nguồn.', 'Tình cảm -  Phiêu lưu -  Đời thường -  Hành động -  Văn học nước ngoài- ', 0, 0),
(39, 'Phía Nam Biên Giới, Phía Tây Mặt Trời', 250000, '0', 'public/uploads/5fc0ec4d98a09-sp24.jpg', '10', 2, '2020-10-29', 0, 'Vẫn là Haruki, vẫn độc, hay và gây nghiện không tưởng. Bằng giọng trần thuật ngôi thứ nhất gần gũi, đây là câu chuyện về “tôi” như bao cái “tôi” khác chúng ta đầy biến động và cuốn hút. Đây không phải là một cuốn tiểu thuyết cảm động sâu sắc gì cả, đây là', ' Tình cảm -  Phiêu lưu -  Đời thường -  Hành động -  Văn học nước ngoài', 0, 0),
(40, 'Và Rồi Núi Vọng', 300000, '0', 'public/uploads/5fc0ed9f7af26-sp25.jpg', '10', 2, '2020-10-29', 5, 'Abdullah và Pari sống cùng cha, mẹ kế và em khác mẹ trong ngôi làng nhỏ xác xơ Shadbagh, nơi đói nghèo và mùa đông khắc nghiệt luôn chực chờ cướp đi sinh mệnh lũ trẻ. Abdullah yêu thương em vô ngần, còn với Pari, anh trai chẳng khác gì người cha, chăm lo ', 'Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(41, 'Thế Gian Này, Nếu Chẳng Còn Mèo', 350000, '0', 'public/uploads/5fc0f3133b374-sp26.jpg', '10', 2, '2020-10-29', 0, '“Thế gian này nếu chẳng còn mèo” là cuốn tiểu thuyết đầu tay của một đạo diễn phim trẻ tuổi nổi tiếng người Nhật có tên Kawamura Genki. Một cuốn tiểu thuyết ngắn với tiêu đề khá “dị” có thể gây tò mò với một số người nhưng cũng hoàn toàn có thể bị bỏ qua ', 'Tình cảm -  Hài hước -  Đời thường -  Văn học nước ngoài', 0, 0),
(42, 'Một mảnh trăng', 300000, '0', 'public/uploads/5fc0f48e295c1-sp27.jpg', '3', 2, '2020-10-29', 0, 'Tôi muốn nói với tất thảy những “vầng trăng khuyết” trên thế gian này rằng chúng ta tuy là trăng khuyết nhưng vẫn đầy đủ vẻ đẹp. Mong các bạn đừng quá gồng mình để trở thành trăng tròn. Ánh trăng rằm tròn trịa cũng chỉ xuất hiện một ngày trong tháng mà thôi. Nó chỉ tồn tại trong thoáng chốc ngắn ngủi, vụt qua rồi biến mất.', 'Tình cảm', 0, 0),
(43, 'Chân Trời Đảo Ngược', 350000, '0', 'public/uploads/5fc0f52c3d506-sp28.jpg', '10', 2, '2020-10-29', 0, 'Ý thức của chúng ta nằm ở đâu? Liệu chúng ta có thể sao chép và lưu giữ ký ức bên ngoài thân xác con người không? Liệu tình yêu có thể đảo ngược quy luật khắc nghiệt về sự hữu hạn của cuộc sống trong thời gian và không gian? Trong Chân Trời Đảo Ngược, Marc Levy sẽ dẫn dắt chúng ta đến với câu chuyện tình thách thức thời gian, không gian và bệnh tật, khiến ta trân trọng hơn những điều tưởng chừng nhỏ bé trong cuộc sống. Có thể nói tác phẩm văn học nước ngoài này là một trong những tiểu thuyết xúc động nhất của Marc Levy. Người đẹp ngủ trong rừng phiên bản 2.0, với một trong những nhân vật nữ thành công nhất.', ' Tình cảm -  Phiêu lưu -  Viễn tưởng -  Văn học nước ngoài', 0, 0),
(44, 'Hai Số Phận', 300000, '0', 'public/uploads/5fc0f64a7969d-sp29.jpg', '10', 2, '2020-10-29', 0, 'Câu chuyện nói về hai cá nhân kiệt xuất trong thời đại của mình nhưng vì một hiểu lầm mà cả hai ‘kình’ nhau suốt 2/3 đời người. Cuối cùng khi nhận ra sự thật thì cả hai đã đến tuổi làm bạn với thần chết cùng với nỗi ân hận khôn nguôi.', 'Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(45, 'Ký Ức Về Cha', 300000, '0', 'public/uploads/5fc0f6d43249d-sp30.jpg', '10', 2, '2020-10-29', 0, 'Ký ức về cha là tâm sự của chính tác giả Lưu Tử Khiết – người đã rời xa quê hương để đi làm – trong bảy ngày sau khi cha cô qua đời. Sự ảnh hưởng của cha đến cuộc sống của cô đã được tái hiện qua từng trang giấy bằng giọng văn hài hước cũng như có phần bất cần. Thế nhưng ẩn chứa trong đó là tình thân vĩnh viễn không thể thay đổi giữa con gái và cha.', 'Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(46, 'Chiếc lá cuối cùng', 350000, '0', 'public/uploads/5fc11c1749f5c-sp31.jpg', '10', 2, '2020-10-29', 0, 'O.Henry là một trong những bậc thầy của thế giới về truyện ngắn. Ông không có cái thâm trầm sâu xa về mặt tư tưởng, không có tầm rộng lớn về mặt khái quát, điển hình hoặc tính sắc bén trong phê phán xã hội đương thời như hai văn hào Nga và Pháp. Nhưng tên tuổi và tác phẩm của ông vẫn tồn tại mãi trong sự ưa thích và mến chuộng của người đọc khắp nơi trên thế giới.', ' Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(47, 'Những Cuộc Phiêu Lưu Của Pinocchio', 350000, '0', 'public/uploads/5fc11ca9d1ab0-sp32.jpg', '10', 2, '2020-10-29', 0, 'Có một mẩu gỗ được bác Geppeto mang về đẽo thành một chú người rối. Chú rối Pinocchio mơ ước trở thành một cậu bé bằng xương bằng thịt.\r\nCậu thường hay nói dối và bịa đặt ra những câu chuyện vì nhiều lý do khác nhau.\r\nCậu đã trải qua một cuộc phiêu lưu đầy những điều thú vị không kém phần mạo hiểm: Bị bạn xấu lừa gạt, bắt làm chó canh nhà, biến thành lừa và thậm chí còn bị cá mập nuốt vào bụ\r\nTrải qua bao sóng gió, và được Cô Tiên Xanh giúp đỡ, cuối cùng Pinocchio đã hiểu ra mình cần phải thay đổi những gì để trở thành một cậu bé đáng yêu.', 'Tình cảm -  Hài hước -  Phiêu lưu -  Đời thường -  Viễn tưởng -  Văn học nước ngoài', 0, 0),
(48, 'Tôi đã sống sót trong vụ đắm tàu titanic', 350000, '0', 'public/uploads/5fc11d416aabe-sp33.jpg', '10', 2, '2020-10-29', 0, 'Tôi Đã Sống Sót Trong Vụ Đắm Tàu Titanic 1912 Tôi Đã Sống Sót ...là series sách thuộc thể loại “historical fiction” (tiểu thuyết có yếu tố lịch sử) với sự kiện chính là một sự kiện lịch sử còn các nhân vật và câu chuyện là hư cấu. Bộ sách gồm 4 cuốn: Tôi đã sống sót trong vụ đắm tàu Titanic 1912, Tôi đã sống sót trong vụ đánh bom Trân Châu Cảng 1941, Tôi đã sống sót khi bị cá mập tấn công năm 1916, Tôi đã sống sót trong cơn bão Katrina, 2005. Mỗi cuốn sách không những giúp độc giả tìm hiểu các sự kiện lịch sử nổi tiếng qua những câu chuyện cuốn hút, thú vị, mà còn mang lại những kinh nghiệm quý báu giúp chúng ta vượt qua khó khăn trong cuộc sống.', 'Tình cảm -  Đời thường -  Văn học nước ngoài', 0, 0),
(49, 'Hello world', 400000, '10', 'public/uploads/5fc7b47c8a422-sp34.jpg', '1', 2, '2020-12-02', 10, 'Lấy mốc thời gian Kyoto vào năm 2027, chính phủ Nhật Bản lập kế hoạch thăm dò cũng như bảo tồn các kiến ​​trúc và văn hóa của thành phố nhờ kỹ thuật máy bay không người lái. Bắt đầu bằng việc lưu trữ tất cả dữ liệu của Kyoto trong một cỗ máy công suất vô hạn gọi là Alltale. Nhân vật chính là Katagaki Naomi – một học sinh trung học sống tại đây, thích đọc sách và làm công việc thủ thư tại thư viện. Một ngày, một con quạ ba chân bay đến đánh cắp cuốn sách Naomi mượn từ thư viện trên đường về nhà, khi đuổi theo nó, cậu chứng kiến một người đàn ông lạ xuất hiện. Người này tự xưng là Naomi trưởng thành của 10 năm sau, với mong muốn về quá khứ nhằm cứu bạn gái anh khỏi tai nạn sét đánh tại lễ hội pháo hoa khiến cô rơi vào trạng thái hôn mê dài – Ichigyou Ruri, hiện là bạn cùng lớp của Naomi trung học.', ' Anime -  Tình cảm -  Hài hước -  Phiêu lưu -  Học đường -  Hành động -  Viễn tưởng ', 0, 360000),
(50, 'Tôi muốn ăn tụy của bạn', 350000, '0', 'public/uploads/5fc7b770a4018-sp35.jpg', '1', 0, '2020-12-02', 0, 'Tớ Muốn Ăn Tụy Của Cậu\r\n“Tôi không biết về ngày mai của tôi - người vẫn còn thời gian, nhưng tôi đã nghĩ ngày mai của cô ấy - người chẳng còn mấy thời gian đã được hẹn trước.\r\nCái lô-gíc xuẩn ngốc gì thế này.\r\nTôi đã nghĩ thế giới này sẽ ưu ái trước sinh mệnh của một cô gái mà những ngày sống chẳng còn là bao.\r\nĐương nhiên, làm gì có chuyện như vậy. Đã không như vậy.\r\nThế giới không phân biệt một ai.\r\nNó không nương bàn tay tấn công bình đẳng ấy với bất kỳ ai, kể cả tôi - người có một thân thể khỏe mạnh, hay cô ấy - người sắp ra đi vì căn bệnh nan y.”', ' Anime -  Tình cảm-  Học đường -  Đời thường-  Văn học nước ngoài', 0, 350000),
(51, 'Thám tử lừng danh Conan', 350000, '10', 'public/uploads/5fc7bb1554b61-sp36.jpg', '1', 0, '2020-12-02', 0, 'Kudo Shinichi là một thám tử trung học rất nổi tiếng, thường xuyên giúp cảnh sát phá án các vụ án khó khăn.[2] Trong một lần khi đang theo dõi một vụ tống tiền, cậu đã bị thành viên của Tổ chức Áo đen phát hiện. Chúng đánh gục Shinichi, làm cậu bất tỉnh và ép cậu uống loại thuốc độc APTX 4869 mà Tổ chức vừa điều chế nhằm bịt đầu mối. Tuy vậy, thứ thuốc ấy không giết chết cậu mà lại khiến cậu teo nhỏ thành một đứa trẻ.[3] Sau đó, cậu tự xưng là Edogawa Conan và được Mori Ran - bạn gái của cậu khi còn là Kudo Shinichi - nhận nuôi và mang về văn phòng thám tử của bố cô là Mori Kogoro. Xuyên suốt series, Conan đã âm thầm hỗ trợ ông Mori phá các vụ án. Đồng thời cậu cũng phải nhập học Tiểu học, nhờ đó mà kết thân với nhiều người và lập ra Đội thám tử nhí.', ' Anime -  Tình cảm -  Hài hước -  Phiêu lưu -  Học đường -  Đời thường -  Hành động - Trinh thám', 0, 315000),
(52, 'Sherlock Homes', 400000, '10', 'public/uploads/5fc7bbce23e84-sp37.jpg', '11', 2, '2020-12-02', 0, 'Một tuyên bố về tuổi của Holmes trong \" Cánh cung cuối cùng của anh ấy \" ghi năm sinh của anh ấy là 1854; câu chuyện, lấy bối cảnh vào tháng 8 năm 1914, mô tả ông ta sáu mươi tuổi. [20] Cha mẹ không được đề cập, mặc dù Holmes nói rằng \"tổ tiên\" của ông là \"nước Squires \". Trong \" Cuộc phiêu lưu của thông dịch viên tiếng Hy Lạp \", anh ta tuyên bố rằng bà của mình là chị em gái của nghệ sĩ người Pháp Vernet, mà không nói rõ đây là Claude Joseph , Carle hay Horace Vernet . Mycroft , anh trai của Holmes, hơn anh bảy tuổi, là một quan chức chính phủ. Mycroft có một dịch vụ dân sự độc đáovị trí như một loại cơ sở dữ liệu con người cho tất cả các khía cạnh của chính sách của chính phủ.', ' Phiêu lưu -  Đời thường -  Hành động -  Văn học nước ngoài -  Trinh thám', 0, 360000),
(53, 'Dragon ball super', 350000, '10', 'public/uploads/5fcda48ea1f13-photo-1-15866003362101630651102.jpg', '9', 0, '2020-12-07', 0, 'Câu chuyện của Dragon Ball Super diễn ra ngay sau khi chiến đấu với Ma Nhân Bư, cuộc sống ở trái đất lại được hòa bình thêm 1 lần nữa. Sau đó vì nhà gần như hết tiền để chi tiêu Chichi tiền ra lệnh cho Goku phải đi kiếm tiền, và không được phép luyện tập trong thời gian này!! Videl sắp trở thành chị dâu của Goten nên Goten đã đặt ra một cuộc hành trình cùng với TRunks để tìm cho Videl một món quà!', ' Anime -  Hài hước -  Phiêu lưu -  Hành động -  Viễn tưởng', 0, 315000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sectors`
--

CREATE TABLE `sectors` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sectors`
--

INSERT INTO `sectors` (`ma_loai`, `ten_loai`) VALUES
(1, 'Anime'),
(2, 'Kinh dị'),
(3, 'Tình cảm'),
(4, 'Hài hước'),
(5, 'Phiêu lưu'),
(6, 'Học đường'),
(7, 'Đời thường'),
(8, 'Hành động'),
(9, 'Viễn tưởng'),
(10, 'Văn học nước ngoài'),
(11, 'Trinh thám');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ma_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kich_hoat` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` tinyint(1) DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cau_hoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ma_kh`, `name`, `password`, `kich_hoat`, `email`, `avatar`, `vai_tro`, `ngay_sinh`, `phone_number`, `cau_hoi`) VALUES
('PH11301', 'Phan Huy', '$2y$10$UjDh6ddMeag7/nzuMMmBf.kCUKoo734ZIlnY0sK7BdMKWWQql09..', 1, 'something@gmail.com', '/public/uploads/5fc111499b722-sach-colorful.jpg', 0, '2020-10-29', '0977778553', 'Phan Văn Hà'),
('PQH29', 'Huy Phan hu', '$2y$10$IX2Z0Z/2KAElYPIYSAcAjOa2PREkR7irl/z6nHwLd.0cv2cMYI1X2', 1, 'phanquochuypthm@gmail.com', 'public/uploads/5fc879f927e09-tải xuống.jpg', 1, '2020-10-30', '0365791629', 'Đỗ Thị Hiểu'),
('TMH22', 'Trần Mạnh Hùng', '$2y$10$0JM3paMPxYwMd.1/v0WIBu.wfSZ6IPUwZjDIJx9wfOTHfhgfkHO4m', 1, 'tranmanhhung22122001@gmail.com', '/public/uploads/5fc4f5dd53726-347a31473fa177b94189544d05636527anh-da-den-dau-hoi-khong-hieu-chuyen-gi-dang-xay-ra.jpg', 0, '2020-10-29', '0938553553', 'Phan Quốc Huy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manage_img`
--
ALTER TABLE `manage_img`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ma_hh`);

--
-- Chỉ mục cho bảng `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ma_kh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT cho bảng `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `manage_img`
--
ALTER TABLE `manage_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `sectors`
--
ALTER TABLE `sectors`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
