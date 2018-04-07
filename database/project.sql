-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 01:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'mahmoud', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cateogery`
--

CREATE TABLE `cateogery` (
  `id_cateogery` int(11) NOT NULL,
  `cateogery_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cateogery`
--

INSERT INTO `cateogery` (`id_cateogery`, `cateogery_name`) VALUES
(1, 'illu'),
(2, 'grap'),
(3, 'web'),
(15, 'ecommerce'),
(16, 'development');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'abozaid',
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(14, 'abozaid', 'abozaidfci@yahoo.com', 'good website', 'wait for more updates'),
(15, 'yousef', 'yousef@yahoo.com', 'wonderful', 'i love this website'),
(16, 'alex', 'alex@yahoo.com', 'good work', 'comming soon'),
(17, '', 'abozaidfci@yahoo.com', 'hack', 'leave message'),
(19, 'mohdy', 'yousef@yahoo.com', 'hack', 'go');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `cateogery_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `cateogery_id`, `image`, `name`, `description`) VALUES
(7, 1, 'pexels-photo-927022.jpeg', 'development_project 1', 'development project'),
(8, 1, 'pexels-photo-908288.jpeg', 'development_project 2', 'facebook project'),
(9, 16, 'pexels-photo-105032.jpeg', 'development_project 3', 'youtube project'),
(11, 3, 'pexels-photo-206607.jpeg', 'design_project 2', 'themeforst website<'),
(12, 2, 'keyboard-338505_960_720.jpg', 'photography_project', 'instgram project'),
(13, 15, 'pexels-photo-908298.jpeg', 'design_project_3', 'design'),
(14, 2, 'p1.jpg', 'project_seven', 'good portfolio');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `created_at`) VALUES
(23, 'camera', 'keyboard-338505_960_720.jpg', '200', 'high defination camera', '2018-04-04 08:24:19'),
(25, 'mouse ', 'mouse-160032_960_720.png', '50', 'mouse wireless', '2018-04-04 08:26:02'),
(27, 'car', 'pexels-photo-105032.jpeg', '20000', 'mazada car', '2018-04-04 08:27:14'),
(31, 'item_product', 'wireless-mouse-2210970_960_720.jpg', '500', 'any product', '2018-04-04 11:39:35'),
(32, 'car', 'pexels-photo-120049.jpeg', '90000', 'kia car', '2018-04-04 11:40:33'),
(33, 'labtop', 'gaming.png', '1000', 'levevo labtop', '2018-04-04 11:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cateogery`
--
ALTER TABLE `cateogery`
  ADD PRIMARY KEY (`id_cateogery`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_cateogery` (`cateogery_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cateogery`
--
ALTER TABLE `cateogery`
  MODIFY `id_cateogery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_cateogery` FOREIGN KEY (`cateogery_id`) REFERENCES `cateogery` (`id_cateogery`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
