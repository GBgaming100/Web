-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 06 nov 2018 om 09:59
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `trailteraa`
--
CREATE DATABASE IF NOT EXISTS `trailteraa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trailteraa`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `io` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `blocks`
--

INSERT INTO `blocks` (`id`, `io`, `status`) VALUES
(1, 'block-1', 0),
(2, 'block-2', 0),
(3, 'block-3', 0),
(4, 'block-4', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `track`
--

CREATE TABLE IF NOT EXISTS `track` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `io` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `track`
--

INSERT INTO `track` (`id`, `io`, `status`) VALUES
(1, 'changer-1', 1),
(2, 'changer-2', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trafficlights`
--

CREATE TABLE IF NOT EXISTS `trafficlights` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `state` int(1) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `trafficlights`
--

INSERT INTO `trafficlights` (`id`, `state`, `name`) VALUES
(1, 1, 'perron-A-straight'),
(2, 0, 'perron-A-curve'),
(3, 0, 'perron-B-straight'),
(4, 0, 'perron-B-curve');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `speed` int(3) NOT NULL DEFAULT '0',
  `min_speed` int(3) NOT NULL DEFAULT '0',
  `max_speed` int(3) NOT NULL DEFAULT '255',
  `direction` int(1) NOT NULL COMMENT '0 ccw, 1 cw',
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `train`
--

INSERT INTO `train` (`id`, `speed`, `min_speed`, `max_speed`, `direction`, `name`) VALUES
(1, 79, 49, 255, 0, 'Train');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
