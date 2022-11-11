-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 10:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `book_id` int(10) NOT NULL,
  `book_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`book_id`, `book_type`) VALUES
(1, 'Classic'),
(2, 'Adventure'),
(3, 'Comic'),
(4, 'Detective');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` int(2) NOT NULL,
  `booktype` int(2) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `img` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `date` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `booktype`, `price`, `stock`, `img`, `status`, `date`) VALUES
(23, 'Ujjol', 1, 4, ' 4100', 'NO', 'img/Screenshot (5).png', 0, '2022-11-12 02:42:30'),
(24, 'Men Search for Meani', 1, 1, '300 ', 'YES', 'img/content.jpg', 1, '2022-11-12 02:46:12'),
(25, 'Treasure Island', 1, 2, '400', 'YES', 'img/tTreasure Island.jpg', 1, '2022-11-12 02:47:31'),
(26, 'sherlock holmes', 2, 4, '400', 'YES', 'img/81GRNatj7pL.jpg', 1, '2022-11-12 02:48:19'),
(27, 'secret wars', 2, 3, '300 ', 'YES', 'img/Screenshot (13).png', 1, '2022-11-12 02:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`t_id`, `t_name`) VALUES
(1, 'Paper Copy'),
(2, 'PDF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booktype`
--
ALTER TABLE `booktype`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
