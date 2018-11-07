-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 11:06 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptomania`
--

-- --------------------------------------------------------

--
-- Table structure for table `cryptofolio`
--

CREATE TABLE `cryptofolio` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalValue` varchar(30) NOT NULL,
  `bought_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cryptofolio`
--

INSERT INTO `cryptofolio` (`id`, `name`, `price`, `amount`, `totalValue`, `bought_on`) VALUES
(12, 'Bitcoin', '6772.73', 3, '20318.19', '2018-06-06'),
(13, 'Ethereum', '502.563', 6, '3015.3779999999997', '2018-06-06'),
(14, 'Bitcoin', '6520.64', 8, '52165.12', '2018-06-06'),
(15, 'Bitcoin', '6772.73', 6, '40636.38', '2018-06-16'),
(16, 'Bitcoin', '6772.73', 2, '13545.46', '2018-06-06'),
(17, 'Bitcoin', '6772.73', 3, '20318.19', '2018-06-07'),
(18, 'Bitcoin', '6772.73', 24, '162545.52', '2018-06-07'),
(20, 'Bitcoin', '6593.44', 3, '19780.32', '2018-06-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cryptofolio`
--
ALTER TABLE `cryptofolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cryptofolio`
--
ALTER TABLE `cryptofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
