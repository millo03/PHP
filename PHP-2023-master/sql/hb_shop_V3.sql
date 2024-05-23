-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2023 lúc 10:24 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

-- drop database hb_shop
-- create database hd_shop
-- use hd_shop
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pk_shop`

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `qty`,`size`, `productName`, `productPrice`, `productImage`) VALUES
(57, 35, 44, 1,40, 'Giày Asics GlideRide 2 Nam - Xanh', 1590000, '4377426429.jpg'),
(58, 35, 58, 1,40, 'Giày Asics EvoRide 2 Nam - Đen Trắng', 120000, '6295923885.jpg'),
(59, 35, 64, 1,40, 'Giày Asics Sky Court Nam - Trắng Đỏ ', 30000, '362dbff9ea.jpg'),
(60, 35, 88, 1,40, 'Giày Asics Sky Court Nam - Đen Trắng', 40000, '8bfbae28f9.jpg'),
(61, 35, 62, 1,40, 'Giày Asics Sky Court Nam - Trắng Xanh', 4490000, '968abb4093.jpeg'),
(62, 35, 51, 1,40, 'Giày Asics Classic CT Nam - Trắng Xanh Lá', 50000, 'e7f8e62c73.jpg'),
(117, 42, 28, 1,40, 'Giày Asics Classic CT Nam - Trắng', 100000, 'b52eabed75.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(6, 'Giày Nike', 1),
(7, 'Giày Adidas', 1),
(8, 'Giày Lacoste', 1),
(9, 'Giày Puma', 1),
(10, 'Giày Asic', 1),
(11, 'Giày Thể thao', 1),
(12, 'Giày Reebook', 1),
(13, 'Giày Brooks', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(255) NOT NULL,
  `replies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi|hello|hey|hy', 'Hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userId`, `createdDate`, `receivedDate`, `status`, `fullname`, `phoneNumber`, `address`) VALUES
(1, 1, '2023-06-09', '2023-06-09', 'Complete', 'Nguyễn Thị B', '0987654321', 'Hồ Chí Minh'),
(2, 1, '2023-06-09', '2023-06-09', 'Complete', 'Trần Văn C', '0909090909', 'Đà Nẵng'),
(3, 1, '2023-06-09', '2023-06-09', 'Complete', 'Lê Thị D', '0912345678', 'Hải Phòng'),
(4, 1, '2023-06-09', '2023-06-09', 'Complete', 'Phạm Văn E', '0977123456', 'Cần Thơ'),
(6, 42, '2023-06-12', NULL, 'Processing', 'Nguyễn Văn F', '0987654321', 'Hà Nội'),
(7, 42, '2023-06-12', NULL, 'Processing', 'Trần Thị G', '0909090909', 'Đà Nẵng'),
(8, 42, '2023-06-12', NULL, 'Processing', 'Lê Văn H', '0912345678', 'Hải Phòng'),
(9, 42, '2023-06-12', NULL, 'Processing', 'Phạm Thị I', '0977123456', 'Cần Thơ'),
(10, 42, '2023-06-12', '2023-06-16', 'Delivered', 'Nguyễn Văn J', '0987654321', 'Hà Nội'),
(11, 42, '2023-06-12', '2023-06-12', 'Complete', 'Trần Thị K', '0909090909', 'Đà Nẵng'),
(12, 42, '2023-06-12', '2023-06-12', 'Complete', 'Lê Văn L', '0912345678', 'Hải Phòng'),
(14, 1, '2023-06-13', '2023-06-13', 'Complete', 'Phạm Thị M', '0977123456', 'Cần Thơ'),
(15, 1, '2023-06-14', NULL, 'Processing', 'Nguyễn Văn A', '0868206602', 'Hà Nội'),
(16, 1, '2023-12-18', NULL, 'Processing', 'Bùi Hải', '0356149866', ' 184 đường An Lập'),
(17, 2, '2023-12-19', NULL, 'Processing', 'Bùi Hải', '0356149866', ' 184 đường An Lập'),
(18, 2, '2023-12-19', NULL, 'Processing', 'Bùi Hải', '0356149866', ' 184 đường An Lập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `qty`, `productPrice`, `productName`, `productImage`) VALUES
(1, 1, 28, 5, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(2, 2, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(3, 3, 32, 1, 48000, 'Giày Adidas Ultrabounce Nam - Đen Trắng', 'cc84fda5cf.jpg'),
(4, 4, 28, 2, 100000, 'Gìay Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(7, 6, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(8, 7, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(9, 8, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(10, 9, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(11, 10, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(12, 11, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(13, 11, 22, 1, 245000, 'Giày Adidas Supernova Rise Nam - Xám', 'cbdb844350.jpg'),
(14, 12, 28, 1, 100000, 'Giày Nike Air Zoom Pegasus 40 Nữ - Hồng', 'b52eabed75.jpeg'),
(17, 14, 22, 1, 245000, 'Giay Adidas Supernova Stride Nam - Xám', 'cbdb844350.jpg'),
(18, 15, 22, 1, 245000, 'Giay Adidas Supernova Stride Nam - Xám', 'cbdb844350.jpg'),
(19, 16, 22, 1, 245000, 'Giay Adidas Supernova Stride Nam - Xám', '6a08a530f0.jpg'),
(20, 17, 30, 1, 100000, 'Giay Adidas Stan Smith CS Nam - Trắng', '4b9515e06f.jpeg'),
(21, 18, 32, 1, 48000, 'Giay Adidas Stan Smith CS Nam - Trắng', 'cc84fda5cf.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`,`size`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(19,40, 'Giày Nike Air Winflo 11<br> Nam - Xám', 350000, 199000, 'be2888a350.jpg', 1, '2023-05-18', 6, 9, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ). Đổi hàng trong 30 ngày. (Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(20,40, 'Giày Nike Air Winflo 11<br> Nam - Den Den', 350000, 190000, 'f9e9511a72.jpg', 1, '2023-05-18', 6, 15, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(21,40, 'Giày Nike Air Winflo 11<br> Nam - Den Trang', 490000, 245000, 'df280f19b3.jpg', 1, '2023-05-18', 6, 16, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br> Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 4),
(22,40, 'Giày Nike React Pegasus Trail 4<br> Nam - Xanh', 490000, 245000, '6a08a530f0.jpg', 1, '2023-05-18', 6, 1, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 11),
(23,40, 'Giày Nike Revolution 7<br> Nam - Xanh Navy8', 500000, 299000, '6551020c7f.jpg', 1, '2023-05-18', 6, 8, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(24,40, 'Giày Nike Dunk Low Retro<br> Nam - Den Trang', 500000, 299000, '6a08a530f0.jpg', 1, '2023-05-18', 6, 20, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(25,40, 'Giày Nike SB Alleyoop<br> Nam - Xám Xanh', 500000, 299000, '06624ef4d7.jpg', 1, '2023-05-18', 6, 22, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(26,40, 'Giày Nike Venture <br>Nam - Trắng Xám ', 550000, 329000, '1842f01391.jpg', 1, '2023-05-18', 6, 10, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(27,40, 'Giày Nike Venture <br>Nam - Den Trang', 590000, 501000, 'ac55bd19cb.jpeg', 1, '2023-05-19', 7, 100, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(28,40, 'Giày Nike Interact Run<br> Nam - Xanh Trang', 200000, 100000, '4c40bb23e1.jpg', 1, '2023-05-19', 7, 0, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 64),
(30,40, 'Giày Nike Interact Run<br> Nam - Den Trắng', 200000, 100000, '4b9515e06f.jpeg', 1, '2023-05-19', 7, 97, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 2),
(31,40, 'Giày Nike Interact Run<br> Nam - Trắng', 200000, 80000, '29d1f8fd1e.jpeg', 1, '2023-05-20', 7, 99, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 1),
(32,40, 'Giay Nike Interact Run SE<br> Nam - Den Den', 120000, 48000, 'cc84fda5cf.jpg', 1, '2023-05-20', 7, 19, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. <br>Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 2),
(33,40, 'Giày Nike Interact Run SE<br> Nữ - Trắng', 1370000, 1370000, 'ac471e68eb.jpg', 1, '2023-05-25', 8, 15, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 0),
(34,40, 'Giày Nike Interact Run<br> Nữ - Hồng Nhẹ', 890000, 890000, '8f31bf8870.jpg', 1, '2023-05-25', 8, 14, '<b>MÔ TẢ SẢN PHẨM </b>\n<br> Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt.<br> Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.<br>Giày Nike Air Winflo 11 có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.', 1, 1),
(35,40, 'Giày Adidas Ultrabounce<br> Nam - Đen Trang', 300000, 300000, '6368f1fbc8.jpg', 1, '2023-05-25', 8, 25, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(36,40, 'Giày Adidas Ultrabounce<br> Nam - Đen Trang', 150000, 150000, '4c40bb23e1.jpg', 1, '2023-05-25', 8, 30, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(37,40, 'Giày Adidas Supernova Stride<br> Nam - Xám', 90000, 90000, '93005fbfe0.jpg', 1, '2023-05-25', 8, 50, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(38,40, 'Giày Adidas Stan Smith CS <br>Nam - Trang', 70000, 70000, '7a631cb669.jpg', 1, '2023-05-25', 8, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(39,40, 'Giay Adidas Kantana <br>Nam - Nau', 50000, 50000, '7c347eadda.jpg', 1, '2023-05-25', 8, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(40,40, 'Giày adidas NY 90<br> Nữ - Trắng', 70000, 70000, '8d4973b1b3.jpg', 1, '2023-05-25', 8, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(41,40, 'Giày Adidas Ultrabounce<br> Nam- Xám', 90000, 90000, 'ce2d8b2ae6.jpg', 1, '2023-05-25', 8, 98, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 2),
(42,40, 'Giày adidas Tracefinder Trail<br> Nữ - Đen Xanh', 70000, 70000, 'e1afeccdd5.jpg', 1, '2023-05-25', 8, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(43,40, 'Giày adidas Advancourt<br> Base Nam - Trang', 90000, 89999, 'a18a5dd51f.jpg', 1, '2023-05-25', 8, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(44,40, 'Giày adidas Advancourt<br> Base Nam - Trang Navy', 1590000, 1590000, '4377426429.jpg', 1, '2023-05-25', 9, 50, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(45,40, 'Giày Adidas VL Court 2.0<br> Nam - Xám Nâu', 769000, 669000, '092b939367.jpg', 1, '2023-05-25', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(46,40, 'Giày Adidas VL Court 2.0<br> Nam - Đen Nâu', 1290000, 1290000, 'd11f8afa93.jpg', 1, '2023-05-25', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(47,40, 'Giày adidas Run 80S<br> Nam - Den', 1290000, 1290000, '1e470c5392.jpg', 1, '2023-05-25', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(48,40, 'Giày adidas VL Court Base<br> Nam - Trang Xanh', 1190000, 1190000, 'c53bbd26ae.jpg', 1, '2023-05-25', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(49,40, 'Giày adidas VL Court <br>Base Nam - Trắng Den', 1790000, 1790000, 'c3071307e6.jpg', 1, '2023-05-25', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(50,40, 'Giày adidas Run 80S <br>Nam - Xám Đỏ', 1790000, 1790000, 'c8f009fc40.jpg', 1, '2023-05-26', 9, 100, 'Giày Adidas chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm <br>. Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).<br> Đổi hàng trong 30 ngày. <br>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận hàng)', 1, 0),
(51,40, 'Giày Lacoste Carnaby Pro CGR 2233<br> Nam -Xanh Navy', 1690000, 1690000, '8896355bbd.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(52,40, 'Giày Lacoste T-Clip Velcro 223<br> Nam - Trang', 1690000, 1690000, '991847a91b.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(53,40, 'Giày Lacoste Lineshot 223<br> Nam - Trắng Xám', 1690000, 1690000, 'fc706e7b5e.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(54,40, 'Giày Lacoste Lineshot 223<br> Nam - Trắng Xanh Navy', 1590000, 1590000, 'e9924e14d6.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(55,40, 'Giày Lacoste PowerCourt 2.0 223 <br>Nam - Trắng Cam', 750000, 750000, 'c36db8ae2f.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(56,40, 'Giày Lacoste L001 223 <br>Nam - Trắng Xanh Lá', 750000, 675000, 'c8c114dcb1.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(57,40, 'Giày Lacoste L001 223<br> Nam - Nâu', 780000, 702000, '64759cc0bc.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(58,40, 'Giày Lacoste L001 223 <br>Nam - Trắng Xanh', 120000, 120000, '6295923885.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(59,40, 'Giày Lacoste PowerCourt 2.0 223<br> Nam -Trắng Xanh', 50000, 50000, '61a3598e8c.jpg', 1, '2023-05-26', 9, 1000, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(60,40, 'Giày Lacoste Carnaby Pro 2233<br> Nam -Trắng', 100000, 100000, 'dea9a70312.jpg', 1, '2023-05-26', 9, 200, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(61,40, 'Giày Lacoste PowerCourt 223<br> Nam - Trắng Đỏ', 80000, 80000, '9a382258aa.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện.', 1, 0),
(62,40, 'Giày Lacoste Carnaby Pro BL23 <br>Nam -Trắng Navy', 100000, 100000, '90d6e87d73.jpg', 1, '2023-05-26', 9, 100, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(63,40, 'Giày Lacoste Grad Vulc 120 2 P <br>Nam - Đen Trắng', 120000, 120000, '4affeca067.jpg', 1, '2023-05-26', 9, 99, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 1),
(64,40, 'Giày Lacoste Hydez 119 <br>Nam - Xám', 130000, 130000, '362dbff9ea.jpg', 1, '2023-05-26', 10, 500, '<b> MÔ TẢ SẢN PHẨM<b> <br> Giày Lacoste PowerCourt 2.0 223 là mẫu giày thời trang của Lacoste có thiết kế đẹp, sang trọng và tinh tế.<br> Chất liệu cao cấp kết hợp ăn ý giữa da trơn và da lộn mang đến sự độc đáo cho dòng sản phẩm này.<br> Giày Lacoste PowerCourt 2.0 223 tại Myshoes.vn được nhập khẩu chính hãng. Full box, đầy đủ phụ kiện', 1, 0),
(65,40, 'Giày Lacoste Hydez 119<br> Nam - Trắng Xanh', 160000, 50000, '9a5fd3d85e.jpg', 1, '2023-05-26', 10, 500, 'Cập nhật sau', 1, 0),
(66,40, 'Giày Lacoste L001 123<br> Nam - Trắng Xanh', 260000, 250000, 'd1d38269e3.jpg', 1, '2023-05-26', 10, 500, 'Cập nhật sau', 1, 0),
(67,40, 'Giày Lacoste L001 123 <br>Nam - Trang Nâu', 260000, 250000, '3bf831a11b.jpg', 1, '2023-05-26', 10, 500, 'Cập nhật sau', 1, 0),
(68,40, 'Giày Lacoste Concours 118 <br>Nam - Nâu', 260000, 250000, '080cd497be.jpg', 1, '2023-05-26', 10, 500, 'Cập nhật sau', 1, 0),
(69,40, 'Giày Lacoste Angular Textile<br> Nam - Trang Nâu', 240000, 240000, 'a161eb2ee2.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(70,40, 'Giày Lacoste Spin Ultra GTX <br>Nam - Đen', 240000, 240000, '75de1eab05.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(71,40, 'Giày Lacoste Storm 96 LO<br> Nam - Den', 240000,240000, '108f690fea.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(72,40, 'Giày Lacoste Gripshot BL CNV<br> Nam - Trắng', 250000, 240000, 'f1274d5421.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(73,40, 'Giày Lacoste Storm 96 LO<br> Nam - Nâu', 250000, 240000, '6d96eb1fc2.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(74,40,'Giày Lacoste Jump Serve Lace 7222 <br>Nam -Trắng', 250000, 240000, '2d7959b1e9.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(75, 40,'Giày Puma Aviate<br> Nam - Den Trắng', 150000, 140000, '2d833330e0.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(76,40, 'Giày Puma Aviate<br> Nam - Xám', 150000, 140000, '983c1d57dc.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(77, 40,'Giay Puma V6 Low <br>Nam - Trắng Xanh', 150000, 140000, '6a08a530f0.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(78,40, 'Giày Puma V6 Low <br>Nam - Trắng Đen', 150000, 140000, '2e0530236f.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(79,40, 'Giày Puma PWRFrame TR 2 <br>Nam - Den Xanh', 130000, 125000, '8e0eaa9084.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(80,40, 'Giày Puma Neo Cat Motorsport<br> Nam -Trắng', 150000, 140000, 'b4114b0ed4.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(81,40, 'Giày Puma Neo Cat Motorsport<br> Nam - Den', 150000, 140000, '712cb77544.jpg', 1, '2023-05-26', 10, 100, ' ', 1, 0),
(82,40, 'Giày Puma PWRFrame TR 2<br> Nam - Đen', 150000, 150000, '92d84079ca.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(83,40, 'Giày Puma Slipstream Cord<br> Nam - Trang Nâu', 330000, 325000, '5f45e630cc.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(84,40, 'Giày Puma Slipstream Everywhere <br>Nam Nữ- Trắng', 230000, 225000, '1629ce9d6d.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(85,40, 'Giày Puma Slipstream Cord<br> Nam - Trắng Xám', 150000, 140000, '6d27c9733b.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(86,40, 'Giày Puma Tramp OG <br>Nam - Nâu', 250000, 240000, '0d237c24a4.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(87,40, 'Giày Puma Suede Bulk<br> Nam - Camo', 250000, 240000, '1d967b9e80.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(88,40, 'Giày Puma Suede Bulk <br>Nam - Đen Trắng', 150000, 140000, '8bfbae28f9.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(89,40, 'Giày Puma Suede Bulk<br> Nam - Navy Nâu', 250000, 240000, 'c4a4c8672e.jpg', 1, '2023-05-26', 10, 100, '  ', 1, 0),
(90,40, 'Giày Asics GlideRide 2 <br>Nam - Xanh', 140000, 130000, 'ef86faa854.jpg', 1, '2023-05-26', 10, 99, '  ', 1, 1),
(91,40, 'Giày Asics EvoRide 2 <br>Nam - Den Trắng', 200000, 150000, '41e413344e.jpg', 1, '2023-05-26', 11, 100, '  ', 1, 0),
(92,40, 'Giày Asics Sky Court <br>Nam - Trắng Đỏ',  200000, 150000, '580188b2fb.jpg', 1, '2023-05-26', 11, 121, ' ', 1, 2),
(93,40, 'Giày Asics Sky Court <br>Nam - Den Trang',  200000, 150000, '580aa82f51.jpg', 1, '2023-05-26', 11, 123, '  ', 1, 0),
(94,40, 'Giày Asics Sky Court <br>Nam - Trắng Xanh',  200000, 150000, '405b0a48ed.jpg', 1, '2023-05-26', 11, 123, '  ', 1, 0),
(95,40, 'Giày Asics Classic CT <br>Nam - Trắng Xanh Lá',  200000, 150000, '14c00d39c2.jpg', 1, '2023-05-26', 11, 123, '  ', 1, 0),
(96,40, 'Giày Asics Classic CT <br>Nam - Trắng',  200000, 150000, 'fe6020d209.jpg', 1, '2023-05-26', 11, 123, '  ', 1, 0),
(97,40, 'Giày Asics Gel Sonoma 6<br> Nam - Den Xanh', 100000, 50000, '309ffc9575.jpg', 1, '2023-05-26', 11, 123, '  ', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `statistical`
--

INSERT INTO `statistical` (`id`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(1, '2023-06-08', '16000000', '5600000', 90, 10),
(2, '2023-06-07', '54400000', '7200000', 60, 8),
(3, '2023-06-06', '24000000', '2400000', 45, 7),
(4, '2023-06-05', '36000000', '3040000', 30, 9),
(5, '2023-06-04', '24000000', '1200000', 15, 12),
(6, '2023-06-03', '6400000', '560000', 65, 30),
(7, '2023-06-02', '22400000', '18400000', 32, 20),
(8, '2023-06-01', '20000000', '16000000', 7, 6),
(9, '2023-05-31', '28800000', '22400000', 40, 15),
(10, '2023-05-30', '40000000', '10400000', 89, 19),
(11, '2023-05-29', '16000000', '12000000', 63, 11),
(12, '2023-05-28', '20000000', '12800000', 94, 14),
(13, '2023-05-27', '25600000', '13600000', 16, 10),
(14, '2023-05-26', '26400000', '15200000', 14, 5),
(15, '2023-05-25', '28800000', '14400000', 22, 12),
(16, '2023-05-24', '27200000', '16000000', 33, 20),
(17, '2023-05-23', '20000000', '12800000', 94, 14),
(18, '2023-05-22', '9600000', '5600000', 16, 10),
(19, '2023-05-21', '50400000', '15200000', 14, 5),
(20, '2023-05-20', '52800000', '14400000', 22, 12),
(21, '2023-05-19', '59200000', '16000000', 33, 20),
(22, '2023-05-18', '50400000', '15200000', 14, 5),
(23, '2023-05-17', '52800000', '14400000', 23, 12),
(24, '2023-05-16', '59200000', '16000000', 32, 20),
(25, '2023-05-15', '50400000', '15200000', 14, 5),
(26, '2023-05-14', '52800000', '14400000', 23, 12),
(27, '2023-05-13', '59200000', '16000000', 33, 20),
(28, '2023-05-12', '52800000', '14400000', 23, 12),
(29, '2023-05-11', '59200000', '16000000', 10, 20),
(30, '2023-05-10', '50400000', '15200000', 14, 5),
(31, '2023-05-09', '52800000', '14400000', 23, 12),
(32, '2023-05-08', '59200000', '16000000', 15, 20),
(33, '2023-05-07', '52800000', '14400000', 23, 12),
(34, '2023-05-06', '59200000', '16000000', 30, 22),
(35, '2023-05-05', '52800000', '14400000', 23, 12),
(36, '2023-05-04', '59200000', '16000000', 32, 20),
(37, '2023-05-03', '50400000', '15200000', 14, 5),
(38, '2023-05-02', '52800000', '14400000', 23, 12),
(39, '2023-05-01', '59200000', '16000000', 32, 20),
(40, '2023-04-30', '50400000', '15200000', 14, 5),
(41, '2023-04-29', '52800000', '14400000', 23, 12),
(42, '2023-04-28', '59200000', '16000000', 15, 20),
(43, '2023-04-27', '52800000', '14400000', 23, 12),
(44, '2023-04-26', '59200000', '16000000', 30, 22),
(45, '2023-04-25', '52800000', '14400000', 23, 12),
(46, '2023-04-24', '59200000', '16000000', 32, 20),
(47, '2023-04-23', '50400000', '15200000', 14, 5),
(48, '2023-04-22', '52800000', '14400000', 23, 12),
(49, '2023-04-21', '59200000', '16000000', 32, 20),
(50, '2023-04-20', '50400000', '15200000', 14, 5),
(51, '2023-04-19', '52800000', '14400000', 23, 12),
(52, '2023-04-18', '59200000', '16000000', 15, 20),
(53, '2023-04-17', '52800000', '14400000', 23, 12),
(54, '2023-04-16', '59200000', '16000000', 30, 22),
(55, '2023-04-15', '52800000', '14400000', 23, 12),
(56, '2023-04-14', '59200000', '16000000', 32, 20),
(57, '2023-04-13', '50400000', '15200000', 14, 5),
(58, '2023-04-12', '52800000', '14400000', 23, 12),
(59, '2023-04-11', '59200000', '16000000', 32, 20),
(60, '2023-04-10', '50400000', '15200000', 14, 5),
(61, '2023-04-09', '52800000', '14400000', 23, 12),
(62, '2023-04-08', '59200000', '16000000', 15, 20),
(63, '2023-04-07', '52800000', '14400000', 23, 12),
(64, '2023-04-06', '59200000', '16000000', 30, 22),
(65, '2023-04-05', '52800000', '14400000', 23, 12),
(66, '2023-04-04', '59200000', '16000000', 32, 20),
(67, '2023-04-03', '50400000', '15200000', 14, 5),
(68, '2023-04-02', '52800000', '14400000', 23, 12),
(69, '2023-06-10', '14400000', '5600000', 90, 10),
(70, '2023-06-11', '12000000', '7200000', 60, 8),
(71, '2023-06-12', '16800000', '2400000', 45, 7),
(72, '2023-06-13', '30400000', '3040000', 30, 9),
(73, '2023-06-14', '22800000', '1200000', 15, 12),
(74, '2023-06-15', '5840000', '560000', 65, 30),
(75, '2023-06-16', '400000', '18400000', 32, 20),
(76, '2023-06-17', '4000000', '16000000', 7, 6),
(77, '2023-06-18', '6400000', '22400000', 40, 15),
(78, '2023-06-19', '1200000', '10400000', 89, 19),
(79, '2023-06-20', '4000000', '12000000', 63, 11),
(80, '2023-06-21', '7200000', '12800000', 94, 14),
(81, '2023-06-22', '12000000', '13600000', 16, 10),
(82, '2023-06-23', '11200000', '15200000', 14, 5),
(83, '2023-06-24', '14400000', '14400000', 22, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(500) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `captcha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `dob`, `password`, `role_id`, `status`, `address`, `isConfirmed`, `captcha`) VALUES
(1, 'doh5992@gmail.com', 'Admin', '2003-10-05', '12345', 1, 1, 'Hải dương', 1, '56485'),
(2, 'trang@gmail.com', 'Chu Thi Thu Trang', '2003-11-07', '1234', 2, 1, 'Quảng Ninh', 1, '56666'),
(35, 'thuy@gmail.com', 'Truong Thi Thuy', '2003-09-22', '1234', 2, 1, 'Minh Khai, Bắc Từ Liêm, Hà Nội', 1, '87909'),
(42, 'quynh@gmail.com', 'Vo Thi Quynh', '2003-09-18', '1234', 3, 1, 'Văn Trì, Bắc Từ Liêm, Hà Nội', 1, '59682'),
(43, 'tam@gmail.com', 'Vu Thi Thanh Tam', '2003-07-18', '1234', 3, 1, 'Hoài Đức, Bắc Từ Liêm, Hà Nội', 1, '59682');
-- delete from users where id= '1'

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
