-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 11 sep 2018 om 06:34
-- -- Serverversie: 5.7.19
-- PHP-versie: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trailteraa`
--
CREATE DATABASE IF NOT EXISTS `trailteraa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trailteraa`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `io` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blocks`
--

INSERT INTO `blocks` (`id`, `io`, `status`) VALUES
(1, 'block-1', 1),
(2, 'block-2', 1),
(3, 'block-3', 0),
(4, 'block-4', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
