-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 05 apr 2018 om 06:54
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `carspotter`
--
CREATE DATABASE IF NOT EXISTS `carspotter` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carspotter`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `brand`
--

INSERT INTO `brand` (`id`, `brand`, `filename`, `description`) VALUES
(1, 'Porsche', 'Porsche', 'Dr. Ing. h.c. F. Porsche AG (veelal afgekort tot Porsche AG) is een Duits fabrikant van sportauto''s, opgericht in 1931 door Ferdinand Porsche, tevens de ontwerper van de eerste Volkswagen. Het bedrijf is gevestigd in Zuffenhausen, onder de rook van Stuttgart.'),
(2, 'BMW', 'BMW', 'Bayerische Motoren Werke, kortweg BMW,[2] (Nederlands: Beierse motorfabrieken) is een Duitse onderneming die auto''s en motorfietsen produceert. De onderneming is gevestigd in de Beierse stad München.'),
(3, 'Ford', 'Ford', 'Ford Motor Company is een Amerikaans automobielconcern dat auto''s bouwt onder de eigen naam Ford en Lincoln. De auto''s van Ford worden wereldwijd verkocht. In 2010 was het concern de op vier na grootste autobouwer ter wereld.[2]');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `brandid` int(50) NOT NULL,
  `typeid` int(50) NOT NULL,
  `author` varchar(500) NOT NULL,
  `title` text NOT NULL,
  `review` varchar(5000) NOT NULL,
  `rating` int(2) NOT NULL,
  `datereview` date NOT NULL,
  `timereview` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Gegevens worden uitgevoerd voor tabel `review`
--

INSERT INTO `review` (`id`, `brandid`, `typeid`, `author`, `title`, `review`, `rating`, `datereview`, `timereview`) VALUES
(41, 1, 2, 'Maarten', 'Mooie Porsche', 'beste porsche ook', 9, '2018-03-14', '2018-03-14 10:54:12.097765'),
(42, 3, 3, 'Maarten', 'Beste Ford', 'snelle en goede ford', 10, '2018-03-14', '2018-03-14 10:54:57.895303');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `brandId` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Gegevens worden uitgevoerd voor tabel `types`
--

INSERT INTO `types` (`id`, `name`, `description`, `filepath`, `brandId`) VALUES
(1, 'M6 Coupe', 'In maart 2012 werd de nieuwe generatie M6 voorgesteld[1] op het Autosalon van Genève. Hij is gebaseerd op het F12/F13 chassis en heeft dezelfde N63 S63 motor als de F10 BMW M5. Onder de kap ligt een TwinTurbo V8 die gekoppeld is aan een zeventraps M-DCT automaat. De M6 F13 Coupé heeft een carbonnen dak maar is wel nog 140 kilogram zwaarder dan zijn E63 voorganger. Officieel heeft de wagen slechts 4,2 seconden nodig om van stilstand tot 100 km/u te accelereren.', '', 2),
(2, '911 Carrera 4 GTS', 'De Porsche 911 (uitgesproken als negen-elf) is de bekendste sportwagen van de Duitse autoproducent Porsche. Het uiterlijk van de auto is ontworpen door Ferdinand "Butzi" Porsche, kleinzoon van Ferdinand Porsche, de oprichter van het merk Porsche. De bekende vorm is in de afgelopen 50 jaar nauwelijks veranderd.', '', 1),
(3, 'Focus RS', 'De auto heeft een topsnelheid van 263 km per uur en bereikt vanuit stilstand de 100km/u in 5,9 seconden. Het verbruik van deze auto is gemiddeld 9,40 liter per 100 km en hij weegt 1367 kg. De APK is geldig tot 22-09-2018 en de wegenbelasting bedraagt € 179,- per kwartaal.', '', 3),
(4, 'Raptor', 'Het heeft een aantal jaren geduurd voordat er weer een Ford F150 Raptor werd gebouwd. Wachten duurt lang, maar het wachten op de nieuwe Ford Raptor is het waard. De nieuwe Ford Raptor is echt een off-road schoonheid geworden, de schitterende details zijn mooi gecombineerd met een vreselijk brute uitstraling.  De voorkant van de Ford Raptor is volgens ons nog agressiever vormgegeven dan de ‘oude’ Ford F150 Raptor, die al agressief is in onze ogen. Je herkend deze F-150 Ford altijd aan het megagrote Ford logo op de grille. De LED lichtjes in de grille zijn gelukkig behouden, want dit accentueert de brute uitstraling nog eens extra.', '', 3),
(5, 'I8 Coupe', 'De BMW i8 is een door Adrian van Hooydonk [2][3] ontworpen hybride auto, ontwikkeld door BMW. Het voertuig is een doorontwikkeling van een conceptmodel genaamd BMW Vision Efficient Dynamics uit 2009. Het voertuig is een plug-inhybride, naast 98 lithiumpolymeerbatterijcellen is er een driecilinder-benzinemotor met turbo. Dit geeft de i8 een totaalvermogen van 266 kW (362 PK), wat resulteert in een (elektronisch begrensde) topsnelheid van 250 km/u, en een actieradius van 600 km.[4]', '', 2),
(6, 'I8 Roadster', 'De BMW i8 is een door Adrian van Hooydonk [2][3] ontworpen hybride auto, ontwikkeld door BMW. Het voertuig is een doorontwikkeling van een conceptmodel genaamd BMW Vision Efficient Dynamics uit 2009. Het voertuig is een plug-inhybride, naast 98 lithiumpolymeerbatterijcellen is er een driecilinder-benzinemotor met turbo. Dit geeft de i8 een totaalvermogen van 266 kW (362 PK), wat resulteert in een (elektronisch begrensde) topsnelheid van 250 km/u, en een actieradius van 600 km.[4]', '', 2),
(7, '1 Serie Cabrio', 'De BMW 1-serie is een compacte middenklassenauto, ontworpen door Chris Bangle en geproduceerd door de Duitse autofabrikant BMW in Regensburg of Leipzig. Het is sinds midden 2005 de kleinste en goedkoopste BMW. De eerste variant van de 1-serie, de 5-deurshatchback, werd in september 2004 gelanceerd om te concurreren met de Audi A3 en de Alfa Romeo 147. Het was de opvolger van de BMW 3-serie Compact. De 1 serie deelt het chassis met de E90 3-serie. Zoals bij BMW gebruikelijk is, heeft de wagen een voorin langsgeplaatste motor en achterwielaandrijving.', '', 2),
(8, 'E30', 'De BMW E30 is een vanaf 1983 tot 1994 door BMW geproduceerde auto.  In 1983 stapte BMW van de E21 over op de E30. De E30 is van 1983 tot 1994 gebouwd in verschillende carrosserievarianten. De E30 Touring bleef tot 1994 in productie, de cabrio tot 1993. De E30 2- en 4-deurs sedan werden tot 1991 geproduceerd.  Op de 316 na werden alle motoren met injectiemotor geleverd. Na 1987 werd ook een katalysator geleverd op de E30.', '', 2),
(9, 'X6 M', 'De BMW X6 is een luxueuze SUV die in 2008 door BMW in productie is genomen. Hoewel BMW claimt dat het een kruising is tussen een coupé en een SUV is deze auto groter dan de X5. De auto wordt gebouwd in de Amerikaanse BMW-fabriek in Spartanburg.  BMW heeft dit type model "Sports Activity Coupé" gedoopt en het kan ondanks zijn afmeting toch slechts vier personen herbergen.', '', 2),
(10, '718 Bokster GTS', 'De Porsche 718 was een sportwagenmodel van de firma Porsche. De auto kwam voort uit de Porsche 550.  Oorspronkelijk ontwikkeld als tweezits-sportwagen (De RSK), zou de auto het tot Formule 2 en zelfs Formule 1 auto schoppen. De Nederlandse coureur Carel Godin de Beaufort reed in een dergelijke auto. Bij de Targa Florio behaalde de Porsche 718 in 1959 en 1960 twee keer de overwinning. Bij de 24 Uur van Le Mans in 1958 was de 718 RSK met zijn 142 pk boxermotor goed voor de derde plaats algemeen en de overwinning in zijn klasse (tot 2 liter).', '', 1),
(11, 'Panamera 4S Sport Turismo', 'De Porsche Panamera is een auto van de Duitse sportwagenfabrikant Porsche die vanaf het einde van de zomer 2009 te koop is. De Porsche Panamera wordt geproduceerd in de fabriek in Leipzig.', '', 1),
(12, 'Macan S', 'De Porsche Macan is een compacte SUV (Sports Utility Vehicle) gebaseerd op de Audi Q5, aangekondigd in november 2010 als een "ontwikkelings"project en officieel aangekondigd door Porsche in maart 2011. De productie van de auto begon eind november 2013.[1] De auto werd gelanceerd op 20 november 2013 op de Greater Los Angeles Auto Show. Porsche lanceerde de auto als een kleiner alternatief voor de grotere Cayenne.', '', 1),
(13, 'Cayenne S', 'De Porsche Cayenne is een SUV-auto (Sports Utility Vehicle) van de fabrikant Porsche. Het is een hoge, grote auto met een robuust uiterlijk, en verschilt hierdoor van andere Porsches. De Porsche Cayenne wordt voornamelijk in Amerika verkocht. Om ontwikkelingskosten en productiekosten te besparen ging Porsche een samenwerking aan met Volkswagen. Hierdoor vertoont de Volkswagen Touareg en de Audi Q7 veel gelijkenissen met de Porsche Cayenne.', '', 1),
(14, '911 GT2 RS', 'De Porsche 911 GT2 is een sportcoupé van de Duitse automobielconstructeur Porsche. Er zijn tot nu toe 3 generaties van de GT2 verschenen. De 997 GT2, beschikt over carbon stoelen en alcantara-stuur en pook. Hij ligt 2,5 cm lager dan een standaard Porsche 911. De auto heeft standaard PASM en ESP (Porsche noemt het PSM), dat helemaal uit te schakelen is in twee stappen. De (997) GT2 beschikt standaard over keramische remschijven .', '', 1),
(15, 'GT', 'Zo ziet innovatie eruit. Van zijn 3,5-liter EcoBoost®-technologie tot zijn super efficiënte aerodynamica: de Ford GT is het hoogtepunt van de geweldige dingen die we bij Ford doen. Dezelfde passie voor innovatie is te zien in ons gehele aanbod van voertuigen. ', '', 3),
(16, 'Escort Mk2', 'De tweede generatie werd in samenwerking met de Keulse Ford-afdeling ontwikkeld. Mechanisch waren de auto''s identiek, maar de Mk. II had een modernere carrosserie gekregen. De Escort bleef een populaire auto die veel werd verkocht. Uiterlijk gezien werd de auto in de loop der jaren licht gewijzigd. Zo hadden de eerste exemplaren ronde koplampen en de losse letters FORD in de grille. Vierkante, halogeen koplampen waren voorbehouden aan de luxere Escort GL en Escort Ghia uitvoeringen. Later (omstreeks 1978) kreeg de Escort vierkante koplampen en een Ford-embleem op de grille. Ook kreeg de Escort nieuw vormgegeven velgen en een stuurwiel met een andere vorm.', '', 3),
(17, 'Mustang 2.3 EcoBoost', 'De Ford Mustang is een van de meest in het oog springende modellen van het Amerikaanse autobedrijf Ford. De stylist John Najjar was fan van het gevechtsvliegtuig de P-51 Mustang (vandaar de naam). Het eerste exemplaar rolde op 17 april 1964 van de productieband en sindsdien zijn er zeer veel van verkocht. Wat de auto zo succesvol maakte was zijn sportieve uiterlijk en zijn lage prijs: 23.000 dollar. De Mustang wordt nu nog steeds geproduceerd en is in de VS nog steeds zeer populair. Dat komt doordat zijn prijs vergeleken met soortgelijke auto''s met circa 20.000 dollar erg laag is.', '', 3),
(19, 'Focus ST', 'De Ford Focus is een compacte middenklassenauto gemaakt door de Amerikaanse autofabrikant Ford. De Focus is een model dat op bijna alle markten waar Ford actief is wordt verkocht. De Focus werd in 1998 op de markt gebracht in Europa, en is vanaf 2000 verkrijgbaar in Noord-Amerika. In Europa, Zuid-Amerika en Zuid-Afrika verving de Focus de Ford Escort, in Australië, Nieuw-Zeeland en Japan verving hij de Ford Laser. In 2001 en 2002 was de Focus de best verkochte auto ter wereld. Op de Detroit Motor Show presenteerde Ford in januari 2010 de derde generatie van de Ford Focus, waarvan de verkoop in 2011 begon.', '', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'Max', 'Max'),
(3, 'Gert-jan', 'Gert-jan'),
(7, 'Maarten', '123'),
(8, 'Nocker', 'gwn10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
