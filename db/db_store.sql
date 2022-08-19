-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 05:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminUser` varchar(20) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPass` varchar(64) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Musa Ahmad', 'adminM', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(2, 'Farabi Tausif', 'adminF', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Guardian'),
(2, 'Adorsho'),
(3, 'Onno Prokash'),
(4, 'McGraw Hill'),
(5, 'Dorling Kindersley'),
(7, 'Somorpon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Academic'),
(2, 'Motivation'),
(3, 'Drama'),
(4, 'Poetry'),
(6, 'Novel'),
(7, 'Foreign'),
(8, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'ABM Musa', 'Dhanmondi', 'Dhaka', 'Bangladesh', '1205', '019999972', 'one@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Musa', 'Dhanmondi', 'Dhaka', 'Bangladesh', '1205', '019999972', 'two@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'ABM Hafiz', 'Moghbazar', 'Dhaka', 'Bangladesh', '1205', '019999972', 'three@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Paradoxical Sajid', 2, 1, '<p>Paradoxical Sajid by Arif Azad. Guardian Publication</p>', 380.66, 'uploads/44a9e6c3d4.jpg', 0),
(2, 'Animal Farm ', 7, 3, '<p>Animal Farm. Author: George Orwell. Publisher:</p>', 180.50, 'uploads/e42a9f51ae.png', 1),
(3, 'Jadughor Pata Ache Ekhane', 8, 2, '<p>Jadughor Pata Ache Ekhane by Kishor Pasha Imon</p>', 305.00, 'uploads/46ed199311.jpg', 0),
(4, 'Fundamentals of Electric Circuits', 1, 4, '<p>Fundamentals of Electric Circuits (5th ed)</p>\r\n<p>Author: Charles K. Alexander, Matthew N. O. Sadiku</p>\r\n<p>Publisher: Mc. Graw Hill</p>', 305.50, 'uploads/145a1c8cc1.jpg', 0),
(5, 'Computer Organization and Architecture', 1, 5, '<p>Computer Organization and Architecture by William Stallings. Publication: Dorling Kindersley India Pvt. Ltd.</p>', 280.00, 'uploads/3e469f42ef.png', 0),
(6, 'Numerical Methods for Engineers', 1, 4, '<p>Numerical Methods for Engineers.&nbsp;Publication: McGraw-Hill Education</p>', 260.00, 'uploads/b04ed04701.jpg', 1),
(7, 'SQL, PL/SQL', 1, 5, '<p>SQL, PL/SQL: The Programming Language of Oracle by&nbsp;<a href=\"https://www.goodreads.com/author/show/135278.Ivan_Bayross\">Ivan Bayross</a>. BPB Publications</p>', 330.00, 'uploads/a230e94513.jpg', 1),
(8, 'Shesh Prosno', 6, 3, '<p><span style=\"font-size: 1.17em;\">শেষ প্রশ্ন </span></p>\r\n<p><span style=\"font-size: 1.17em;\">by Sarat Chandra Chattopadhyay</span></p>\r\n<p><span style=\"font-size: 1.17em;\">Digital Publisher</span></p>', 150.00, 'uploads/5ca3e851cc.jpg', 0),
(9, 'Golpoguccho', 6, 3, '<p>গল্পগুচ্ছ. Author: রবীন্দ্রনাথ ঠাকুর. Publisher: Ananda</p>', 200.00, 'uploads/3fdf9a9fe5.jpg', 0),
(10, 'Hamlet', 7, 2, '<p>Hamlet. Author:&nbsp; William Shakespeare. Publisher: Oxford Press</p>', 140.00, 'uploads/41348d8915.jpg', 0),
(11, 'Sonchita', 4, 3, '<p>সঞ্চিতা Author: Kazi&nbsp;Nazrul&nbsp;Islam. Publisher:</p>', 130.00, 'uploads/427f45a8ac.png', 1),
(12, 'Paradoxical Sajid 2', 2, 1, '<p>Paradoxical Sajid 2 by Arif Azad Guardian Publication</p>', 425.00, 'uploads/2ee0664f5f.jpg', 0),
(13, 'Spirit of Islam', 2, 7, '<p>The Spirit of Islam by Sir Syed Amir Ali</p>', 300.00, 'uploads/9aaee34c9b.jpg', 0),
(14, 'Alchemist', 7, 2, '<p>Alchemist by Pahlo Coelho</p>', 245.00, 'uploads/fe3a78fd47.jpg', 0),
(15, 'Inferno', 8, 3, '<p>Inferno by Dan Drown</p>', 300.00, 'uploads/8c07572eb7.jpg', 0),
(16, 'Kobor', 3, 2, '<p>Kobor By Munir Chowdhury</p>', 175.00, 'uploads/279ea597b2.jpg', 1),
(17, 'Nil Dorpon', 3, 2, '<p>Nil Dorpon by Dinbondhu Mitra</p>', 160.00, 'uploads/6a9f1a40a2.jpg', 1),
(18, 'Principles of Power System', 1, 5, '<p>Principles of Power System By Rohit Mehta , V.K Mehta Publisher: S. Chand</p>', 290.00, 'uploads/1a64778221.jpg', 0),
(19, 'The Lost Symbol', 8, 2, '<p>The Lost Symbol by Dawn Brown</p>', 320.00, 'uploads/ce05b3c09d.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
