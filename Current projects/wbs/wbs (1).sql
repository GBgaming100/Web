-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 11:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `Title`, `Description`) VALUES
(1, 'Karam swamp', 'someody'),
(2, 'Jaradje', 'gra'),
(3, 'dew', '12'),
(4, 'Internet', 'dew'),
(5, 'Robin is kaas', 'Robin is een hond');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `taskName` varchar(255) NOT NULL,
  `MoSCoW` varchar(255) NOT NULL,
  `Time` int(11) NOT NULL,
  `ActualTime` int(11) NOT NULL,
  `Predecessor` int(11) NOT NULL,
  `Do` varchar(255) NOT NULL,
  `_check` varchar(255) NOT NULL,
  `Act` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `projectId`, `taskName`, `MoSCoW`, `Time`, `ActualTime`, `Predecessor`, `Do`, `_check`, `Act`) VALUES
(1, 1, ' sdf ', '   Should  ', 20, 10, 1, '', '', ''),
(2, 2, '   sdfasdfaasdfsad  ', 'Should', 12, 10, 2, '', '', ''),
(3, 1, '       asdf ', '   Could  ', 30, 10, 2, '', '', ''),
(4, 4, '   sdfasdfaasdfsad  ', 'Should', 15, 10, 2, '', '', ''),
(5, 1, ' sadf ', '    Maybe ', 10, 0, 2, '', '', ''),
(7, 1, '        sadfsdfasdfasdfaasdfasdfsad          ', ' Realistic ', 0, 0, 2, '', '', ''),
(13, 1, '      asdfasdfsadf        ', '   gay ', 10, 0, 3, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_projects_idx` (`projectId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
