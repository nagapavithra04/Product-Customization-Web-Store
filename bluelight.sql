-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 02:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluelight`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `customize` tinyint(1) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`, `customize`, `size`) VALUES
(154, '', 5, 7, 2, 0, 'M'),
(155, '', 5, 126, 1, 1, 'Standard'),
(156, '::1', 0, 6, 1, 0, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `img_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `img_path`) VALUES
(1, 'T-shirt', '1679406360_1678807140_tshirt.png'),
(2, 'Hoodie', '1679406420_hoodie.png'),
(3, 'Cup', '1679406480_cup.png'),
(4, 'Cap', '1679406480_cap.png'),
(5, 'Pillow', '1680758340_1680681600_CUSTOMIZE (26).png'),
(6, 'Pillow-Cover', '1680758340_PILLOW COVER.png'),
(7, 'Towel', '1680758400_1679406540_to1.png');

-- --------------------------------------------------------

--
-- Table structure for table `custom_built`
--

CREATE TABLE `custom_built` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `custom_built`
--

INSERT INTO `custom_built` (`id`, `name`, `img_path`) VALUES
(1, 'T-shirt', '1679383860_t1.png'),
(2, 'Hoodie', '1679384220_h1.png'),
(3, 'Cup', '1679384220_m1.png'),
(4, 'Cap', '1679384280_c1.png'),
(5, 'Pillow', '1679384340_pillow.png'),
(6, 'Pillow-Cover', '1679385540_pc1.png'),
(7, 'Towel', '1680758460_1680758400_1679406540_to1.png');

-- --------------------------------------------------------

--
-- Table structure for table `custom_image`
--

CREATE TABLE `custom_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `custom_product_id` int(11) NOT NULL,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `custom_image`
--

INSERT INTO `custom_image` (`id`, `user_id`, `custom_product_id`, `img_path`, `status`) VALUES
(88, 5, 1, 'assets/img/UsersInformation.png', 1),
(89, 5, 1, 'assets/img/UsersInformation (2).png', 1),
(90, 5, 1, 'assets/img/UsersInformation (2).png', 0),
(91, 5, 1, 'assets/img/UsersInformation (2).png', 1),
(92, 6, 1, 'assets/img/UsersInformation (5).png', 0),
(93, 6, 1, 'assets/img/UsersInformation (5).png', 0),
(94, 5, 7, 'assets/img/PILLOW COVER.png', 0),
(95, 5, 1, 'assets/img/UsersInformation (5).png', 1),
(96, 5, 1, 'assets/img/UsersInformation (5).png', 0),
(97, 5, 2, 'assets/img/UsersInformation (4).png', 0),
(98, 5, 2, 'assets/img/UsersInformation (4).png', 0),
(99, 5, 3, 'assets/img/CUSTOMIZE (1).png', 0),
(100, 5, 4, 'assets/img/1678679820_c1.png', 0),
(101, 5, 1, 'assets/img/1678629540_t2.png', 0),
(102, 5, 4, 'assets/img/1678679760_cap.png', 0),
(103, 5, 4, 'assets/img/1678679760_cap.png', 0),
(104, 5, 3, 'assets/img/CUSTOMIZE.png', 0),
(105, 5, 2, 'assets/img/hoodie.png', 1),
(106, 5, 5, 'assets/img/pillow.png', 1),
(107, 6, 3, 'assets/img/UsersInformation (6).png', 0),
(108, 6, 1, 'assets/img/UsersInformation (5).png', 0),
(109, 6, 1, 'assets/img/UsersInformation (5).png', 0),
(110, 6, 1, 'assets/img/UsersInformation (5).png', 1),
(111, 6, 2, 'assets/img/hoodie.png', 1),
(112, 6, 3, 'assets/img/UsersInformation (6).png', 1),
(113, 6, 5, 'assets/img/CUSTOMIZE (27).png', 1),
(114, 6, 6, 'assets/img/CUSTOMIZE (16).png', 1),
(115, 6, 7, 'assets/img/towel.png', 1),
(116, 6, 4, 'assets/img/CUSTOMIZE (23).png', 1),
(117, 7, 1, 'assets/img/UsersInformation (7).png', 1),
(118, 7, 1, 'assets/img/UsersInformation (7).png', 1),
(119, 7, 1, 'assets/img/UsersInformation (8).png', 1),
(120, 7, 1, 'assets/img/UsersInformation (8).png', 1),
(121, 7, 1, 'assets/img/UsersInformation (8).png', 1),
(122, 5, 4, 'assets/img/CUSTOMIZE (22).png', 1),
(123, 5, 1, 'assets/img/UsersInformation (8).png', 0),
(124, 5, 2, 'assets/img/Untitled design (2).png', 0),
(125, 5, 4, 'assets/img/UsersInformation (10).png', 1),
(126, 5, 3, 'assets/img/UsersInformation (11).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_product_list`
--

CREATE TABLE `custom_product_list` (
  `id` int(11) NOT NULL,
  `custom_category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `custom_product_list`
--

INSERT INTO `custom_product_list` (`id`, `custom_category_id`, `name`, `description`, `price`, `status`) VALUES
(1, 1, 'CUSTOM T-SHIRT', 'Customized T-shirt For Both Men And Women', 499, 1),
(2, 2, 'CUSTOM HOODIE', 'Custom Hoodie', 599, 1),
(3, 3, 'CUSTOM MUG', 'Customized Mug for presenting gifts', 249, 1),
(4, 4, 'CAP', 'Customized cap with adjustable strap', 150, 1),
(5, 5, 'CUSTOM PILLOW', 'Customized pillow', 299, 1),
(6, 6, 'CUSTOM PILLOW COVER', 'Customized pillow cover', 199, 1),
(7, 7, 'CUSTOM TOWEL', 'Customized Towel', 199, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`) VALUES
(9, 'ssk', 'theni', '6789012345', 'ssk@gmail.com', 1),
(12, 'ssk', 'theni', '6789012345', 'ssk@gmail.com', 0),
(15, 'ssm', 'theni', '1908765432', 'ssm@gmail.com', 0),
(17, 'nagass', 'abcd,theni.', '7896543267', 'nagass@gmail.com', 1),
(19, 'nagass', 'abcd,theni.', '7896543267', 'nagass@gmail.com', 0),
(21, 'ssk', 'theni', '6789012345', 'ssk@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `size` text NOT NULL,
  `customize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`, `size`, `customize`) VALUES
(10, 9, 89, 1, '', 1),
(11, 9, 6, 1, '', 0),
(12, 9, 8, 1, '', 0),
(13, 10, 7, 1, '', 0),
(14, 10, 91, 1, '', 1),
(15, 11, 7, 1, '', 0),
(16, 11, 95, 2, '', 1),
(17, 12, 105, 2, '', 1),
(18, 12, 106, 2, '', 1),
(19, 12, 11, 1, '', 0),
(20, 13, 6, 1, 'XL', 0),
(21, 14, 11, 1, 'Null', 0),
(22, 15, 6, 1, 'L', 0),
(23, 15, 13, 1, 'XL', 0),
(24, 15, 11, 1, 'Standard', 0),
(25, 15, 4, 1, 'Standard', 0),
(26, 15, 12, 3, 'Standard', 0),
(27, 15, 9, 2, 'Standard', 0),
(28, 15, 14, 4, 'Standard', 0),
(29, 16, 108, 1, 'L', 0),
(30, 16, 109, 1, 'L', 0),
(31, 16, 110, 2, 'XL', 1),
(32, 16, 111, 1, 'M', 1),
(33, 16, 112, 1, 'Standard', 1),
(34, 16, 113, 2, 'Standard', 1),
(35, 16, 114, 4, 'Standard', 1),
(36, 16, 115, 2, 'Standard', 1),
(37, 16, 116, 1, 'Standard', 1),
(38, 17, 117, 2, 'XL', 1),
(39, 17, 13, 3, 'XL', 0),
(40, 18, 118, 2, 'XL', 1),
(41, 19, 119, 1, 'XL', 1),
(42, 19, 8, 1, 'XL', 0),
(43, 20, 120, 1, 'XL', 1),
(44, 20, 121, 1, 'XL', 1),
(45, 20, 11, 1, 'Standard', 0),
(46, 20, 8, 1, 'XL', 0),
(47, 21, 122, 2, 'Standard', 1),
(48, 21, 125, 2, 'Standard', 1),
(49, 21, 8, 1, 'XL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES
(1, 1, 'T-SHIRT ALWAYS LOOK COOL', 'Cotton t-shirt for both men and women', 399, '1678629540_t2.png', 1),
(2, 1, 'T-SHIRT FREE AS A BIRD', 'T-shirt for both men and women', 399, '1678629600_t3.png', 0),
(4, 4, 'CAP', 'Cap', 99, '1678807380_1678679760_cap.png', 1),
(6, 1, 'T-shirt', 'Cotton t-shirt for both men and women', 349, '1678807020_t4.png', 1),
(7, 1, 'T-shirt', 'Cotton t-shirt for both men and women', 349, '1678807080_t5.png', 1),
(8, 1, 'T-shirt', 'Cotton t-shirt for both men and women', 399, '1678807140_tshirt.png', 1),
(9, 6, 'Pillow-Cover', 'Pillow-Cover', 120, '1679408340_CUSTOMIZE (19).png', 1),
(11, 3, 'Cup', 'Cup', 199, '1679734740_CUSTOMIZE.png', 1),
(12, 5, 'Pillow', 'Pillow', 239, '1680678180_CUSTOMIZE (24).png', 1),
(13, 2, 'Hoodie', 'Hoodie for both men and women', 499, '1680678240_Untitled design.png', 1),
(14, 7, 'Towel', 'Cotton Towel', 120, '1680678360_towel.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'BLUELIGHT', 'info@bluelight.com', '0912654789', 'blurbg.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `useremail` varchar(40) NOT NULL,
  `userpassword` varchar(300) NOT NULL,
  `useraddress` varchar(50) NOT NULL,
  `userphoneno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `useremail`, `userpassword`, `useraddress`, `userphoneno`) VALUES
(1, 'pavi', 'pavi@gmail.com', '$2y$10$HLp', 'asdfg', 1234567899),
(2, 'naga', 'naga@gmail.com', '$2y$10$T6w', 'abcd', 2345678919),
(3, 'bala', 'bala@gmail.com', '$2y$10$4diCvy1/rTEzcntQKBhuBOnOMweqzReQpzcAcLSd7ODTtDlKvfi7S', 'qwert', 8901234567),
(5, 'ssk', 'ssk@gmail.com', '$2y$10$fuUNkPJZoo6pD5G1ow6ikuZQadgoRw4QxjsKm/vSIGZ1XgGMx2dCq', 'theni', 6789012345),
(6, 'ssm', 'ssm@gmail.com', '$2y$10$MjaMmY2SD8A0uwSn3fv1ueNV3XBB.99uzfW4LrPcoBnd693CfkvFi', 'theni', 1908765432),
(7, 'nagass', 'nagass@gmail.com', '$2y$10$kApDd/9RD/cxkdc0o4hBM.wgip5ny/Gvz/zKIexDEbc9iclq6.cmm', 'abcd,theni.', 7896543267);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '$2y$10$TX4cWO0riq9mf6K.c946M.FcHxJd2pUwF5OPIzXH6m1MDQ/w0XYie', 1),
(2, 'Admin 2', 'Admin 2', '$2y$10$5D.qaxU19tdwGT2i63ZwbOwlKs5a/iNn38o7gp5dteYvfecErfKPi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_built`
--
ALTER TABLE `custom_built`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_image`
--
ALTER TABLE `custom_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_product_list`
--
ALTER TABLE `custom_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `phoneno` (`userphoneno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `custom_built`
--
ALTER TABLE `custom_built`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `custom_image`
--
ALTER TABLE `custom_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `custom_product_list`
--
ALTER TABLE `custom_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
