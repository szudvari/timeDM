-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. Már 17. 08:32
-- Szerver verzió: 5.5.31-0+wheezy1-log
-- PHP verzió: 5.3.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `szudvari`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához: `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `pass` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `fullname`, `active`, `role`) VALUES
(1, 'admin', 'e328e1cc3369cde3589f5f97fe1cf0bd0da8944a89240982841708c5fc82b7324a812d1d5276d77fa02b7c92052e14efa57c0116d9529348a54c6a333429154e', 'HeadAdmin', 1, 1),
(2, 'balika', '75aa40caf039ae01e23b962c356e59c20d9a0610464749c4c8e11f4eb17d8476aee0dac28a8a03d74fd39d89449f77cb2d558e2465bee2677bf2466fa56ca97b', 'TraveloTeszt', 1, 0),
(3, 'edit', 'd3c75672a3651c263ba1fea7b6b214ae8560d628a0e141af5b7fff2c80c53099de51ed905140a54586f4fe301a85582aa8772a026b69ad0675da293899309b7b', 'Markovics Edit', 1, 0),
(4, 'marti', '07cf76cc1887e1c5b3aba2a2e05854d0de6f55e354212bdaedd1589665a072a0220ad6117de552385ab5cd74aea32d599ac5f8c1e68092208567b0c3e34b95ea', 'Lehoczki Márta', 1, 1),
(5, 'dori', '07cf76cc1887e1c5b3aba2a2e05854d0de6f55e354212bdaedd1589665a072a0220ad6117de552385ab5cd74aea32d599ac5f8c1e68092208567b0c3e34b95ea', 'Fináczy Dóra', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
