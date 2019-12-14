-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 07:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babiesclothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(12, 'T SHIRT'),
(13, 'OVERALL'),
(14, 'PAJAMA'),
(16, 'SOCKS'),
(17, 'DRESS'),
(18, 'PANTS'),
(19, 'SHORT'),
(20, 'MITTENS'),
(21, 'SANDO');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `contact`, `address`, `email`, `item`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(1, 'poke mondragon', '0999999illuminati', 'PH1 BLK8 lot24 sjdm blcn', 'anthony.gonzal@yahoo.com', '(1) bench, ', '0', 'confirmed', '12/08/19 01:04:10 PM', '12/09/19 11:21:12 AM'),
(2, 'SXQSXQSX XA;LKXOAKQSXQ', 'QSXQSX', 'QSXQSXQSXQSXQSXQSX', 'QSXQSXQSXQSX@yahoo.com', '(1) bench, (1) penshoppe, (1) OXGYN, (1) Gucci, (1) bench, (1) OXGYN, ', '0', 'confirmed', '12/08/19 01:28:13 PM', '12/13/19 10:47:02 PM'),
(3, 'anthony gonzal', '09554830714', 'phase 1 block 8 lot 24 ', 'gonzalanthony22@gmail.com', '(1) Gucci, (1) Gucci, (1) penshoppe, (1) bench, ', '0', 'confirmed', '12/09/19 11:19:54 AM', '12/13/19 10:47:09 PM'),
(4, 'ssfsf wefwefwe', '34583489534', 'wefsefsef', 'sfesefsef@yahoo.com', '(1) bench, (1) Gucci, (1) bench, ', '500', 'confirmed', '12/09/19 11:36:26 AM', '12/11/19 08:04:55 PM'),
(5, 'anthony GONZAL', '09554830714', 'pahawssdfsxvd', 'gonzalanthony22@gmail.com', '(1) Gucci, (1) Gucci, (1) Gucci, (1) bench, (1) bench, ', '1000', 'confirmed', '12/11/19 08:06:04 PM', '12/11/19 08:07:11 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `Product` text NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`) VALUES
(83, 'download_(3)[1].jpeg', 'bench', '5 months old size for boy', 200, 'T SHIRT'),
(84, 'images[1].jpeg', 'Gucci', '5 months old size for girl', 200, 'T SHIRT'),
(85, 'images_(2)[1].jpeg', 'penshoppe', '10 months old size for boy', 500, 'OVERALL'),
(86, 'images_(6)[1].jpeg', 'bench', 'new born cotton', 100, 'MITTENS'),
(87, 'download_(5)[1].jpeg', 'Gucci', '5 months old size for girl', 200, 'DRESS'),
(88, 'download_(8)[1].jpeg', 'OXGYN', '10 months old size for boy', 200, 'T SHIRT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'qwe', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
