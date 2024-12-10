-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22.11.2024 klo 15:18
-- Palvelimen versio: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verkkokauppa`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `tuotteet`
--

CREATE TABLE `tuotteet` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `kuva` varchar(255) NOT NULL,
  `hinta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `tuotteet`
--

INSERT INTO `tuotteet` (`id`, `nimi`, `kuva`, `hinta`) VALUES
(1, 'Iphone 14 5G 6GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/6012343.jpg', 649.99),
(2, 'Iphone 13 5G 4GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/5683804.jpg', 409.99),
(3, 'Iphone 13 Pro 5G 6GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/5683805.jpg', 927.00),
(4, 'Iphone 12 5G 4GB RAM 64GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/5594641.jpg', 279.00),
(6, 'Iphone 16 5G 8GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/13854649.jpg', 999.00),
(7, 'Iphone 16 Pro Max 5G 8GB RAM 256GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/13825891.jpg', 1509.00),
(8, 'Iphone 16 Plus 5G 8GB 512GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/13854652.jpg', 1529.00),
(9, 'Iphone 16 Plus 5G 8GB 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/13854637.jpg', 1149.00),
(10, 'Iphone 15 5G 6GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/12105524.jpg', 674.00),
(11, 'Iphone 15 Pro 5G 6GB RAM 128GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/12105530.jpg', 867.00),
(13, 'Iphone 15 Pro Max 5G 6GB RAM 256GB', 'https://pricespy-75b8.kxcdn.com/product/standard/280/12105534.jpg', 1000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tuotteet`
--
ALTER TABLE `tuotteet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuotteet`
--
ALTER TABLE `tuotteet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
