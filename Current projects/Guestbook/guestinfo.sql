-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 28 feb 2017 om 21:51
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `guestbook`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `guestinfo`
--

CREATE TABLE IF NOT EXISTS `guestinfo` (
  `ID` int(25) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `WebAdress` varchar(25) DEFAULT NULL,
  `Message` text NOT NULL,
  `Ip` varchar(25) NOT NULL,
  `Mail` varchar(25) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Gegevens worden uitgevoerd voor tabel `guestinfo`
--

INSERT INTO `guestinfo` (`ID`, `Name`, `LastName`, `WebAdress`, `Message`, `Ip`, `Mail`, `datetime`) VALUES
(15, 'Max', 'Van den Boom', 'www.Reddit.com/r/Mindcrac', 'this is a test form hope this works', '::1', 'Maxvdboom1@outlook.com', '2017-02-23'),
(16, 'Max', 'Van den Boom', 'www.Reddit.com/r/Mindcrac', 'this is a test form hope this works', '::1', 'Maxvdboom1@outlook.com', '2017-02-23'),
(17, 'test', 'test', 'tset', 'test', '::1', 'test', '2017-02-23'),
(18, 'test', 'test', 'tset', 'test', '::1', 'test', '2017-02-23'),
(19, 'test', 'test', 'tset', 'test', '::1', 'test', '2017-02-23'),
(20, 'reddit', 'reddit', 'reddit', 'reddit', '::1', 'reddit', '2017-02-28'),
(21, 'reddit', 'test', 'google.com', 'test', '::1', 'max@hotmail.com', '2017-02-28'),
(22, 'reddit', 'test', 'google.com', 'test', '::1', 'max@hotmail.com', '2017-02-28'),
(23, 'reddit', 'testj;slajt;losahnfhnjf;o', 'l;iksdkjhnnta;lisjhntrl;k', 'jsal;kj;sweoilfnjsf;lokiasfo;inj;likaero;ilkjes;likjnesjaf;lsdjmna;lkifoilwf;iasoihnjfsd;oilafjs;oigjnsd;lkgna;oilhnsagoiagnjsaongklja;dsf;ngol;ikasng;lkidsfgn;oinagk;lsfdng;lsokfngl;skadgnoi;rngklsmnglksdfgn;asoignklsdgnlkgn', '::1', 'a;lksdhjn;lsajthr;loihj', '2017-02-28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
