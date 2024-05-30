-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:51 AM
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
-- Database: `php2_asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id_catalog` int(11) NOT NULL,
  `name_catalog` varchar(200) NOT NULL,
  `banner_catalog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id_catalog`, `name_catalog`, `banner_catalog`) VALUES
(1, 'Đại Hạ Giá', 'banner_dai_ha_gia.jpg'),
(2, 'One Piece', 'Banner_OP_03.jpg'),
(3, 'Tết ', 'banner_tet.jpg'),
(4, 'Tết ', 'banner_tet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `id_dto` int(11) NOT NULL,
  `id_Product` int(11) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT 1,
  `price` int(10) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detailorder`
--

INSERT INTO `detailorder` (`id_dto`, `id_Product`, `quantity`, `price`, `size`) VALUES
(2, 1, 3, 365000, 'M'),
(3, 2, 7, 270000, 'S'),
(5, 2, 2, 252000, 'M'),
(6, 4, 1, 255000, 'M'),
(7, 1, 1, 284000, 'S'),
(7, 2, 1, 243000, 'L'),
(7, 4, 1, 250000, 'S'),
(8, 1, 4, 284000, 'XL'),
(8, 2, 4, 243000, 'S'),
(9, 1, 1, 292000, 'XL'),
(9, 2, 1, 252000, 'M'),
(10, 2, 1, 0, 'M'),
(11, 1, 1, 284000, 'S'),
(11, 2, 1, 243000, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `detailproduct`
--

CREATE TABLE `detailproduct` (
  `id_detailProduct` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `base_price` double(10,0) NOT NULL,
  `sale_price` double(10,0) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detailproduct`
--

INSERT INTO `detailproduct` (`id_detailProduct`, `size`, `base_price`, `sale_price`, `id_product`) VALUES
(3, 'S', 355000, 20, 1),
(5, 'M', 365000, 20, 1),
(6, 'L', 385000, 20, 1),
(7, 'XL', 390000, 20, 1),
(8, 'S', 270000, 10, 2),
(9, 'M', 280000, 10, 2),
(10, 'L', 285000, 10, 2),
(15, 'S', 250000, 0, 3),
(16, 'M', 255000, 0, 3),
(17, 'L', 260000, 0, 3),
(18, 'XL', 270000, 0, 3),
(19, 'S', 250000, 0, 4),
(20, 'M', 255000, 0, 4),
(21, 'L', 260000, 0, 4),
(22, 'XL', 270000, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_bill` int(11) NOT NULL,
  `order_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity_Product` int(5) NOT NULL DEFAULT 0,
  `total` double(10,0) NOT NULL DEFAULT 0,
  `status` set('gio-hang','cho-xac-nhan','chuan-bi-hang','dang-giao','da-giao','huy-don') NOT NULL DEFAULT 'gio-hang' COMMENT '0 đơn hàng bị hủy 1 đang xử lý 2 Đang giao hàng 3 Đã giao hàng	',
  `name_user` varchar(50) DEFAULT NULL,
  `phone_user` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_voucher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_bill`, `order_Date`, `quantity_Product`, `total`, `status`, `name_user`, `phone_user`, `address`, `id_user`, `id_voucher`) VALUES
(2, '2024-01-27 07:42:33', 3, 1140000, 'huy-don', NULL, NULL, NULL, 2, 'FREE-SHIP'),
(3, '2024-01-27 07:41:50', 7, 1875000, 'huy-don', NULL, NULL, NULL, 1, 'FREE-SHIP'),
(4, '2024-01-27 07:48:44', 11, 3315000, 'cho-xac-nhan', NULL, NULL, NULL, 3, 'FREE-SHIP'),
(5, '2024-01-27 09:19:42', 2, 519000, 'da-giao', NULL, NULL, NULL, 3, NULL),
(6, '2024-01-27 09:21:38', 3, 774000, 'da-giao', NULL, NULL, NULL, 3, 'FREE-SHIP'),
(7, '2024-01-27 22:00:59', 3, 805500, 'da-giao', 'Nguyễn Minh ', 962943879, 'tỉnh bình dương', 1, NULL),
(8, '2024-01-29 12:08:56', 8, 2235000, 'da-giao', 'Nguyễn Minh ', 962943879, 'tỉnh bình dương', 1, NULL),
(9, '2024-01-30 07:07:48', 2, 579000, 'cho-xac-nhan', 'Nguyễn Minh ', 962943879, 'tỉnh bình dương', 1, NULL),
(10, '2024-01-29 22:25:31', 0, 0, 'gio-hang', NULL, NULL, NULL, 4, NULL),
(11, '2024-01-30 09:45:51', 2, 512000, 'cho-xac-nhan', 'Nguyễn', 962943879, 'tỉnh bình dương', 1, 'FREE-SHIP');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_Pro` varchar(255) NOT NULL,
  `price_Pro` double(10,0) NOT NULL,
  `sale_Pro` int(4) NOT NULL,
  `description_Pro` text NOT NULL,
  `quantity_Pro` int(5) NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_Pro`, `price_Pro`, `sale_Pro`, `description_Pro`, `quantity_Pro`, `id_catalog`, `id_img`) VALUES
(1, 'Quần Tây Sợi Tự Nhiên Co Giãn Cấp Độ 1', 385000, 20, 'Chất liệu: Vải Quần Tây\r\nThành phần: 70% poly 27% rayon 3% spandex\r\n- Mềm mại, bề mặt vải trơn mịn, cảm giác mát nhẹ khi mặc.\r\n- Thiết kế quần ống đứng mang đến sự lịch lãm, tự tin và nam tính cho người mặc.\r\n- Phù hợp với nhiều môi trường khác nhau như đi làm, đi tiệc, đi học, đi chơi.\r\n^ Ẩn bớt nội dung', 10, 1, 1),
(2, 'Áo Thun Cổ Tròn Tay Ngắn Vải Cotton 4 Chiều', 270000, 10, 'Áo Thun Cổ Tròn Đơn Giản Ngân Hà Space Ver16\r\nChất liệu: Cotton Spandex\r\nThành phần : 92% cotton 8% spandex\r\n- Thân thiện\r\n- Thấm hút thoát ẩm\r\n- Mềm mại, ít nhăn\r\n- Co giãn tối ưu\r\n- Kiểm soát mùi\r\n- Điều hòa nhiệt\r\n+ Họa tiết thêu\r\n- HDSD:\r\n+ Nên giặt chung với sản phẩm cùng màu\r\n+ Không dùng thuốc tẩy hoặc xà phòng có tính tẩy mạnh\r\n+ Nên phơi trong bóng râm để giữ sp bền màu', 10, 1, 2),
(3, 'Áo Thun Cổ Tròn Tay Ngắn Cotton 4 Chiều', 250000, 0, 'Chất liệu: Thun 4C\r\nThành phần: 92% Cotton 8% Spandex\r\n- Sợi cotton hiệu suất cao High TPI (Twists per inch) - sợi có chỉ số vòng xoắn cao (cao hơn 25% so với sợi thông thường) giúp vải siêu mềm mướt, co giãn cực thoải mái khi sử dụng.\r\n+ Áo thun cổ tròn, sử dụng bo cotton làm cổ áo.\r\n+ Họa tiết nhãn ép\r\n+ Dưới lai áo phối miếng đắp dệt thiết kế riêng cho BST', 300, 2, 3),
(4, 'Áo Thun Cổ Tròn Tay Ngắn Cotton 4 Chiều', 250000, 0, 'Chất liệu: Thun 4C\r\nThành phần: 92% Cotton 8% Spandex\r\n- Sợi cotton hiệu suất cao High TPI (Twists per inch) - sợi có chỉ số vòng xoắn cao (cao hơn 25% so với sợi thông thường) giúp vải siêu mềm mướt, co giãn cực thoải mái khi sử dụng.\r\n+ Áo thun cổ tròn, sử dụng bo cotton làm cổ áo.\r\n+ Họa tiết nhãn ép\r\n+ Dưới lai áo phối miếng đắp dệt thiết kế riêng cho BST', 300, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productimg`
--

CREATE TABLE `productimg` (
  `id_img` int(11) NOT NULL,
  `img_main_pro` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `img_5` varchar(255) NOT NULL,
  `img_6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productimg`
--

INSERT INTO `productimg` (`id_img`, `img_main_pro`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`) VALUES
(1, 'sp_da_ha_gia_main.jpg', 'sp_da_ha_gia_01.jpg', 'sp_da_ha_gia_02.jpg', 'sp_da_ha_gia_03.jpg', 'sp_da_ha_gia_04.jpg', 'sp_da_ha_gia_05.jpg', 'sp_da_ha_gia_05.jpg'),
(2, 'ao_thun_001_dai_ha_gia_main.jpg', 'ao_thun_001_dai_ha_gia_001.jpg', 'ao_thun_001_dai_ha_gia_002.jpg', 'ao_thun_001_dai_ha_gia_003.jpg', 'ao_thun_001_dai_ha_gia_004.jpg', 'ao_thun_001_dai_ha_gia_005.jpg', 'ao_thun_001_dai_ha_gia_006.jpg'),
(3, 'one_pice_001_sp_main.jpg', 'one_pice_001_sp_001.jpg', 'one_pice_001_sp_002.jpg', 'one_pice_001_sp_003.jpg', 'one_pice_001_sp_004.jpg', 'one_pice_001_sp_005.jpg', 'one_pice_001_sp_006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phoneNumber_user` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img_user` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 0,
  `OTP` varchar(6) DEFAULT NULL,
  `hanOTP` datetime DEFAULT NULL COMMENT 'đây hạn OTP được sử dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `phoneNumber_user`, `pass`, `address`, `img_user`, `role`, `OTP`, `hanOTP`) VALUES
(1, 'Nguyễn Minh Tòe', 'tamnmps27206@fpt.edu.vn', 962943879, '123', 'tỉnh bình dương', 'ao_thun_001_dai_ha_gia_004.jpg', 1, NULL, NULL),
(2, 'Minh Tom', 'minhTam13122@gmail.com', 962941234, '123', 'Tỉnh tiền giang', '', 0, NULL, NULL),
(3, 'Minh TèoO', 'tamnm@gmail.com', 962942323, '123', 'Tiền giang', '', 0, NULL, NULL),
(4, 'Nguyễn Minh Tâm', 'ad@gmail.com', 987777777, 'Aaa', 'ádasd', '', 0, NULL, NULL),
(5, 'Nguyễn Minh Tâm', 'minhTam1312@gmail.com', 987777775, 'Sss', 'ghjkghjkjkgkg', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` varchar(50) NOT NULL,
  `reduced_Price` int(10) DEFAULT NULL,
  `discount_Rate` int(10) DEFAULT NULL,
  `minimize` int(10) DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT 0,
  `start_Day` datetime DEFAULT NULL,
  `end_Day` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `reduced_Price`, `discount_Rate`, `minimize`, `quantity`, `start_Day`, `end_Day`) VALUES
('FREE-SHIP', NULL, 100, 30000, 100, '2024-01-25 21:42:54', '2024-01-31 21:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`id_dto`,`id_Product`),
  ADD KEY `dto_product` (`id_Product`);

--
-- Indexes for table `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD PRIMARY KEY (`id_detailProduct`),
  ADD KEY `dtpro_pro` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `order_user` (`id_user`),
  ADD KEY `ordert_voucher` (`id_voucher`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `pro_cata` (`id_catalog`),
  ADD KEY `pro_imge` (`id_img`);

--
-- Indexes for table `productimg`
--
ALTER TABLE `productimg`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `id_dto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detailproduct`
--
ALTER TABLE `detailproduct`
  MODIFY `id_detailProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productimg`
--
ALTER TABLE `productimg`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `dto_order` FOREIGN KEY (`id_dto`) REFERENCES `orders` (`id_bill`),
  ADD CONSTRAINT `dto_product` FOREIGN KEY (`id_Product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD CONSTRAINT `dtpro_pro` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `ordert_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `pro_cata` FOREIGN KEY (`id_catalog`) REFERENCES `catalog` (`id_catalog`),
  ADD CONSTRAINT `pro_imge` FOREIGN KEY (`id_img`) REFERENCES `productimg` (`id_img`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
