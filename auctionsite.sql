-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2023 at 07:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auctionsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `dateends` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `starting_price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `endnotified` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `dateends`, `image`, `starting_price`, `category_id`, `endnotified`) VALUES
(1, 'name 1', 'description 1', 0, 'https://picsum.photos/200/300', '1.00', 1, '2023-04-01'),
(2, 'House', 'House with Gargen', 0, 'https://picsum.photos/200/300', '2.00', 2, '2023-04-01'),
(3, 'name 3', 'description 3', 0, 'https://picsum.photos/200/300', '3.00', 3, '2023-04-01'),
(4, 'name 4', 'description 4', 0, 'https://picsum.photos/200/300', '4.00', 4, '2023-04-01'),
(5, 'name 5', 'description 5', 0, 'https://picsum.photos/200/300', '5.00', 3, '2023-04-01'),
(6, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(7, 'name 10', 'description 43', 0, 'https://picsum.photos/200/303', '34.00', 1, '2023-04-01'),
(8, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(9, 'name 10', 'description 43', 0, 'https://picsum.photos/200/320', '34.00', 1, '2023-04-01'),
(10, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(11, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(12, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(13, 'name 10', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(14, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 4, '2023-04-01'),
(15, 'name 10', 'description 43', 0, 'https://picsum.photos/200/303', '34.00', 3, '2023-04-01'),
(16, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(17, 'name 10', 'description 43', 0, 'https://picsum.photos/200/320', '34.00', 2, '2023-04-01'),
(18, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 4, '2023-04-01'),
(19, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 2, '2023-04-01'),
(20, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 2, '2023-04-01'),
(21, 'name 10', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 2, '2023-04-01'),
(22, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 4, '2023-04-01'),
(23, 'name 10', 'description 43', 0, 'https://picsum.photos/200/303', '34.00', 3, '2023-04-01'),
(24, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 1, '2023-04-01'),
(25, 'name 10', 'description 43', 0, 'https://picsum.photos/200/320', '34.00', 3, '2023-04-01'),
(26, 'name 11', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 3, '2023-04-01'),
(28, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 4, '2023-04-01'),
(29, 'name 10', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 3, '2023-04-01'),
(127, 'name 56', 'description 43', 0, 'https://picsum.photos/200/300', '34.00', 3, '2023-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
