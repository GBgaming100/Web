-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 26 jun 2018 om 19:01
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `zorg`
--
CREATE DATABASE IF NOT EXISTS `zorg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zorg`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
--

CREATE TABLE IF NOT EXISTS `taken` (
  `taak_id` int(255) NOT NULL AUTO_INCREMENT,
  `taak_name` varchar(200) NOT NULL,
  `taak_color` text NOT NULL,
  `taak_date` date NOT NULL,
  `taak_time_from` time NOT NULL,
  `taak_time_till` time NOT NULL,
  `taak_medical` text NOT NULL,
  PRIMARY KEY (`taak_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `taken`
--

INSERT INTO `taken` (`taak_id`, `taak_name`, `taak_color`, `taak_date`, `taak_time_from`, `taak_time_till`, `taak_medical`) VALUES
(8, 'Medicijnen in nemen', '#e91e63', '2018-06-26', '17:00:00', '17:10:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
