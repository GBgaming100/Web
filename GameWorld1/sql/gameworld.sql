-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 18 dec 2016 om 13:16
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `gameworld`
--
CREATE DATABASE IF NOT EXISTS `gameworld` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gameworld`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pc`
--

CREATE TABLE IF NOT EXISTS `pc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` double(16,2) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Gegevens worden uitgevoerd voor tabel `pc`
--

INSERT INTO `pc` (`ID`, `Category`, `Name`, `Price`, `Image`) VALUES
(1, 2, 'Watch Dogs', 40.00, 'http://cdn.xgn.nl/boxarts/ps4/big/11537-watch-dogs.jpg'),
(2, 2, 'Watch Dogs 2', 65.00, 'https://cdn.shopify.com/s/files/1/0151/1123/products/warchdogs2ps4.png?v=1479186761'),
(3, 2, 'Far Cry 4', 30.00, 'http://s1.thcdn.com/productimg/0/600/600/99/10958799-1424770017-724172.jpg'),
(4, 2, 'Far Cry Primal', 50.00, 'https://s-media-cache-ak0.pinimg.com/564x/ed/36/88/ed3688c65b9a308d8bdcd6729c84f2a4.jpg'),
(5, 2, 'Battlefield 1', 50.00, 'http://static.webshopapp.com/shops/105494/files/066667414/battlefield-1-playstation-4.jpg'),
(6, 2, 'Maffia 3', 40.00, 'http://static.webshopapp.com/shops/105494/files/085596140/mafia-3-dlc-playstation-4.jpg'),
(7, 2, 'F1 2016', 60.00, 'http://static.webshopapp.com/shops/105494/files/087746489/f1-2016-a2-poster-playstation-4.jpg'),
(9, 1, 'TitanFall 2 ', 29.00, 'https://ic.tweakimg.net/ext/i/2001122001.jpeg'),
(20, 1, 'Dishonored 2 ', 50.00, 'http://static.webshopapp.com/shops/035312/files/090264977/pc-dishonored-2.jpg\r\n'),
(21, 1, 'Asassin''s Creed Syndicate', 40.00, 'https://s.s-bol.com/imgbase0/imagebase3/extralarge/FC/9/3/2/7/9200000052057239.jpg\r\n'),
(22, 3, 'Gear of War 4', 28.00, 'http://static.webshopapp.com/shops/105494/files/065652370/gears-of-war-4-xbox-one.jpg'),
(23, 3, 'Forza Motorsport 6', 28.00, 'http://www.game-key.nl/wp-content/uploads/2016/11/Forza-motorsport-6-Xbox-One-gamekey.jpg'),
(24, 3, 'Doom 2016', 40.00, 'http://static.webshopapp.com/shops/047899/files/067797804/bethesda-xbox-one-doom.jpg'),
(25, 3, 'Doom 2016', 40.00, 'http://static.webshopapp.com/shops/105494/files/087746237/f1-2016-a2-poster-xbox-one.jpg'),
(26, 1, 'Dishonored 2.1', 50.00, 'http://static.webshopapp.com/shops/035312/files/090264977/pc-dishonored-2.jpg\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
