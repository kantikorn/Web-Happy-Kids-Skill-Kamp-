-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 02:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `ca_id` int(11) NOT NULL,
  `ca_product` int(11) NOT NULL,
  `ca_user` int(11) NOT NULL,
  `ca_qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ca_id`, `ca_product`, `ca_user`, `ca_qty`, `order_id`) VALUES
(20, 7, 8, 2, 12),
(21, 6, 8, 1, 12),
(22, 7, 8, 1, 13),
(23, 6, 7, 1, 14),
(24, 7, 8, 1, 15),
(25, 6, 8, 2, 15),
(26, 7, 8, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`, `images`) VALUES
(7, 'ชุดว่ายน้ำ', '16802573655221.jpg'),
(9, 'กางเกง', '16802810645837.jpeg'),
(10, 'บิกินี่', '16803549874048.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `cus_name` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `slip_payment` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cus_name`, `total_price`, `order_status`, `order_date`, `slip_payment`, `address`) VALUES
(12, 8, 1050, 2, '2023-04-09 17:16:01', '', ''),
(13, 8, 350, 2, '2023-04-09 22:21:59', '16808856137418.jpg', 'iuytre'),
(14, 7, 350, 2, '2023-04-10 11:54:24', '16809343542798.JPG', 'สิงห์บุรี ถนน ขุนสรรค์ 16000'),
(15, 8, 1050, 2, '2023-04-10 16:56:34', '16809524825866.jpg', 'ววววว'),
(16, 8, 350, 1, '2023-04-10 17:33:18', '16809546861331.jpg', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `imgproduct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `nameproduct`, `product_price`, `category`, `imgproduct`) VALUES
(6, 'บิกินี่ สีชมพู', 350, 7, '16802810950473.jpg'),
(7, 'กางเกงวอร์มขาจั้ม', 350, 9, '16802811593902.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `re_user` int(11) NOT NULL,
  `feedback` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `re_date` datetime NOT NULL,
  `re_product` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `re_user`, `feedback`, `comment`, `re_date`, `re_product`, `order_id`) VALUES
(3, 8, 1, 'แย่มาก', '2023-04-10 16:50:22', 7, 12),
(4, 8, 5, 'สินค้าดีมาก', '2023-04-10 16:55:31', 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `firstname`, `lastname`, `role`) VALUES
(6, 'admin@admin', '$2y$10$la/4tTDED8O3CZnmDMU04u45WtfPlDQ3QiPr14dPpLf9i9yTGTqd.', 'admin', 'admin', 1),
(7, 'kantikorn24@gmail', '$2y$10$HGaEGaqgHg3bdAn4O1mc7u9Ng1q4Ha6DVlYhHh6S8Mr0EIaTmmOwm', 'Kantikorn', 'Sornsuriyawong', 2),
(8, 'user@user', '$2y$10$epeWn.Mg6jzVNc0mXZA5DuvkEp0Tg94HUjku2ewYzU75h8THJwxhm', 'Thanawat', 'Chueanongprong', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
