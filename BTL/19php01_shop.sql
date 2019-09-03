-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 28, 2019 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `19php01_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `content`, `created`, `status`) VALUES
(2, 2, 2, 'chất lượng', '2019-08-28 07:51:57', 1),
(6, 2, 1, 'Mauris aliquet augue seenim finibusat consectetur metus congutiam convallis aliquam conguen ornare exdolornon scelerisque nisl fringilla ut. Maecenas faucibus purus id elementum laoreen a hendrerit ested laoreet nibh vel lacus sagittis, eu laoreet metus v', '2019-08-28 08:44:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created`, `status`) VALUES
(2, 2, '2019-08-28 03:55:41', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(2, 2, 2, 1, '7990000'),
(3, 2, 3, 3, '9990000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `name`, `description`, `image`, `price`, `created`, `updated`) VALUES
(1, 1, 'Iphone 8', 'msafksafljalfjkashkjfhaksfasfas', 'iphone-8-plus-256gb-gold-400x460.png', '10000000', '2019-08-10 02:43:01', NULL),
(2, 2, 'Sam Sung A7', 'ửviewahruyawjeyriuewarjksehfehsfwega', 'samsung-galaxy-a7-2018-128gb-black-600x600.jpg', '7990000', '2019-08-10 02:45:24', NULL),
(3, 2, 'Sam Sung A9', 'Sam Sung A9 Sam Sung A9 Sam Sung A9 Sam Sung A9', 'tj3w_samsung-galaxy-a9-2018-blue-400x460.png', '9990000', '2019-08-19 06:15:55', NULL),
(4, 1, 'Iphone X', 'Iphone XIphone XIphone XIphone XIphone XIphone X', 'iphone-x-64gb-1-400x460-1-400x460.png', '10000000', '2019-08-19 06:41:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Iphone'),
(2, 'Sumsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` char(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `birthday` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `email`, `phone`, `birthday`, `avatar`, `created`, `updated`) VALUES
(1, 'admin', 'duong123', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hải Đường', 'haiduong.if@gmail.com', '0985722383', '1997-05-06', '5d5e88d473b82_avatar5.png', '2019-08-10 02:14:49', '2019-08-22 02:21:40'),
(2, 'customer', 'duong', '202cb962ac59075b964b07152d234b70', 'Hải Đường', 'duongnguyen@gmail.com', '985716147', '1993-06-15', 'avatar5.png', '2019-08-22 05:18:12', '0000-00-00 00:00:00'),
(3, 'customer', 'ABC', '202cb962ac59075b964b07152d234b70', 'ABC', 'thaonguyen@gmail.com', '704529962', '2019-08-14', 'avatar2.png', '2019-08-26 11:53:21', '0000-00-00 00:00:00'),
(4, 'customer', 'dat', '202cb962ac59075b964b07152d234b70', 'Đạt', 'trinhdat@gmail.com', '348609278', '2019-07-30', 'avatar04.png', '2019-08-26 12:02:12', '0000-00-00 00:00:00'),
(5, 'admin', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'QWE', 'qwe@gmail.com', '0123456987', '2019-08-05', 'avatar5.png', '2019-08-26 12:08:01', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
