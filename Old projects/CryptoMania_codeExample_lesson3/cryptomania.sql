-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 08 jun 2018 om 06:23
-- Serverversie: 5.7.19
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
-- Database: `cryptomania`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cryptofolio`
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
-- Gegevens worden geëxporteerd voor tabel `cryptofolio`
--

INSERT INTO `cryptofolio` (`id`, `name`, `price`, `amount`, `totalValue`, `bought_on`) VALUES
(12, 'Bitcoin (BTC)', '7486.20', 3, '22458.6', '2018-06-06'),
(13, 'Bitcoin (BTC)', '7486.20', 5, '37431', '2018-06-06'),
(14, 'Bitcoin (BTC)', '7486.20', 2, '14972.4', '2018-06-06'),
(15, 'Bitcoin (BTC)', '7486.20', 2, '14972.4', '2018-06-06'),
(16, 'Bitcoin (BTC)', '7486.20', 2, '14972.4', '2018-06-06'),
(17, 'Bitcoin (BTC)', '7486.20', 3, '22458.6', '2018-06-07'),
(18, 'Bitcoin (BTC)', '7486.20', 23, '172182.6', '2018-06-07');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cryptofolio`
--
ALTER TABLE `cryptofolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cryptofolio`
--
ALTER TABLE `cryptofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
