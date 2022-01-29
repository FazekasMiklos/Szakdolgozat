-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jan 29. 19:33
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `c31c202121`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adminok`
--

CREATE TABLE `adminok` (
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `baratok`
--

CREATE TABLE `baratok` (
  `baratid` int(255) NOT NULL,
  `userid1` int(255) NOT NULL,
  `userid2` int(255) NOT NULL,
  `elfogadva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekelesek`
--

CREATE TABLE `ertekelesek` (
  `ertekelesid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `jatekosid` int(255) DEFAULT NULL,
  `klubid` int(255) DEFAULT NULL,
  `ertekeles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `userid` int(255) NOT NULL,
  `felhasznalonev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`userid`, `felhasznalonev`, `email`, `jelszo`) VALUES
(1, 'asd', 'asd', 'a8f5f167f44f4964e6c998dee827110c'),
(3, 'xd', 'xd@gmail.com', 'e0ec65fcfcf174244bc6201ec441d367');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatekosok`
--

CREATE TABLE `jatekosok` (
  `jatekosid` int(255) NOT NULL,
  `orszagid` varchar(3) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `klubid` int(255) NOT NULL,
  `pozid` varchar(3) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nev` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `szuletesidatum` date NOT NULL,
  `merkozesek` int(255) DEFAULT NULL,
  `golok` int(255) DEFAULT NULL,
  `golpasszok` int(255) DEFAULT NULL,
  `vedesek` int(255) DEFAULT NULL,
  `szerelesek` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvencek`
--

CREATE TABLE `kedvencek` (
  `kedvencid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `jatekosid` int(255) DEFAULT NULL,
  `ligaid` int(255) DEFAULT NULL,
  `orszagid` varchar(3) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `klubid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `klubbok`
--

CREATE TABLE `klubbok` (
  `klubid` int(255) NOT NULL,
  `nev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ligaid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `klubbok`
--

INSERT INTO `klubbok` (`klubid`, `nev`, `ligaid`) VALUES
(1, 'Manchester City', 1),
(2, 'Aston Villa', 1),
(3, 'Arsenal', 1),
(4, 'Brighton & Hove Albion', 1),
(5, 'Burnley', 1),
(6, 'Crystal Palace', 1),
(7, 'Everton', 1),
(8, 'Brentford', 1),
(9, 'Leeds United', 1),
(10, 'Leicester City', 1),
(11, 'Liverpool', 1),
(12, 'Manchester United', 1),
(13, 'Newcastle United', 1),
(14, 'Norwich City', 1),
(15, 'Southampton', 1),
(16, 'Tottenham Hotspur', 1),
(17, 'Watford', 1),
(18, 'West Ham United', 1),
(19, 'Wolverhampton Wanderers', 1),
(20, 'Alavés', 2),
(21, 'Athletic Bilbao', 2),
(22, 'Atlético de Madrid', 2),
(23, 'Barcelona', 2),
(24, 'Cádiz', 2),
(25, 'RC Celta de Vigo', 2),
(26, 'Elche', 2),
(27, 'Espanyol', 2),
(28, 'Getafe', 2),
(29, 'Granada', 2),
(30, 'Levante', 2),
(31, 'Mallorca', 2),
(32, 'Osasuna', 2),
(33, 'Rayo Vallecano', 2),
(34, 'Real Betis', 2),
(35, 'Real Madrid', 2),
(36, 'Real Sociedad', 2),
(37, 'Sevilla', 2),
(38, 'Valencia', 2),
(39, 'Villarreal', 2),
(40, 'Atalanta', 3),
(41, 'Bologna', 3),
(42, 'Cagliari', 3),
(43, 'Empoli', 3),
(44, 'Fiorentina', 3),
(45, 'Genoa', 3),
(46, 'Hellas Verona', 3),
(47, 'Internazionale', 3),
(48, 'Juventus', 3),
(49, 'Lazio', 3),
(50, 'Milan', 3),
(51, 'Napoli', 3),
(52, 'Roma', 3),
(53, 'Salernitana', 3),
(54, 'Sampdoria', 3),
(55, 'Sassuolo', 3),
(56, 'Spezia', 3),
(57, 'Torino', 3),
(58, 'Udinese', 3),
(59, 'Venezia', 3),
(60, 'Augsburg', 4),
(61, 'Arminia Bielefeld', 4),
(62, 'Bayer 04 Leverkusen', 4),
(63, 'Bayern München', 4),
(64, 'Borussia Dortmund', 4),
(65, 'VfL Bochum', 4),
(66, 'Borussia Mönchengladbach', 4),
(67, 'Eintracht Frankfurt', 4),
(68, 'SC Freiburg', 4),
(69, 'Greuther Fürth', 4),
(70, 'Hertha BSC', 4),
(71, 'TSG 1899 Hoffenheim', 4),
(72, '1. FC Köln', 4),
(73, 'RB Leipzig', 4),
(74, '1. FSV Mainz 05', 4),
(75, 'Union Berlin', 4),
(76, 'VfB Stuttgart', 4),
(77, 'VfL Wolfsburg', 4),
(78, 'Angers', 5),
(79, 'Bordeaux', 5),
(80, 'Brest', 5),
(81, 'Clermont', 5),
(82, 'Lens', 5),
(83, 'Lille', 5),
(84, 'Lorient', 5),
(85, 'Lyon', 5),
(86, 'Marseille', 5),
(87, 'Metz', 5),
(88, 'Monaco', 5),
(89, 'Montpellier', 5),
(90, 'Nantes', 5),
(91, 'Nice', 5),
(92, 'Paris Saint-Germain', 5),
(93, 'Reims', 5),
(94, 'Rennes', 5),
(95, 'Saint-Étienne', 5),
(96, 'Strasbourg', 5),
(97, 'Troyes', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ligak`
--

CREATE TABLE `ligak` (
  `ligaid` int(255) NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `orszagid` varchar(3) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ligak`
--

INSERT INTO `ligak` (`ligaid`, `nev`, `orszagid`) VALUES
(1, 'Premier League', 'ENG'),
(2, 'La Liga', 'ESP'),
(3, 'Seria A', 'ITA'),
(4, 'Bundesliga', 'GER'),
(5, 'Ligue One', 'FRA');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orszagok`
--

CREATE TABLE `orszagok` (
  `orszagid` varchar(3) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ranglista` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `orszagok`
--

INSERT INTO `orszagok` (`orszagid`, `nev`, `ranglista`) VALUES
('ALG', 'Algéria', 29),
('ARG', 'Argentina', 5),
('AUS', 'Ausztrália', 35),
('AUT', 'Ausztria', 31),
('BEL', 'Belgium', 1),
('BRA', 'Brazília', 2),
('CAN', 'Kanada', 40),
('CHI', 'Chile', 24),
('CMR', 'Kamerun', 50),
('COL', 'Kolumbia', 16),
('CRC', 'Costa Rica', 49),
('CRO', 'Horvátország', 15),
('CZE', 'Csehország', 32),
('DEN', 'Dánia', 9),
('ECU', 'Ecuador', 46),
('EGY', 'Egyiptom', 45),
('ENG', 'Anglia', 4),
('ESP', 'Spanyolország', 7),
('FRA', 'Franciaország', 3),
('GER', 'Németország', 12),
('HUN', 'Magyarország', 39),
('IRL', 'Írország', 47),
('IRN', 'Irán', 21),
('ITA', 'Olaszország', 6),
('JPN', 'Japán', 26),
('KOR', 'Dél-Korea', 33),
('MAR', 'Marokkó', 28),
('MEX', 'Mexikó', 14),
('NED', 'Hollandia', 10),
('NGA', 'Nigéria', 36),
('NOR', 'Norvégia', 41),
('PAR', 'Paraguay', 43),
('PER', 'Peru', 22),
('POL', 'Lengyelország', 27),
('POR', 'Portugália', 8),
('QAT', 'Qatar', 48),
('ROU', 'Románia', 44),
('RUS', 'Oroszország', 34),
('SCO', 'Skócia', 38),
('SEN', 'Szenegál', 20),
('SRB', 'Szerbia', 23),
('SUI', 'Svájc', 13),
('SVK', 'Szlovákia', 42),
('SWE', 'Svédország', 18),
('TUN', 'Tunézia', 30),
('TUR', 'Törökország', 37),
('UKR', 'Ukrajna', 25),
('URU', 'Uruguay', 17),
('USA', 'Egyesült Államok', 11),
('WAL', 'Wales', 19);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posztok`
--

CREATE TABLE `posztok` (
  `pozid` varchar(3) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `poznev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `posztok`
--

INSERT INTO `posztok` (`pozid`, `poznev`) VALUES
('CS', 'Csatár'),
('KA', 'Kapus'),
('KP', 'Középpályás'),
('V', 'Hátvéd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzenetid` int(255) NOT NULL,
  `useridKuldott` int(255) NOT NULL,
  `useridFogadott` int(255) NOT NULL,
  `szoveg` text NOT NULL,
  `szdatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemenyek`
--

CREATE TABLE `velemenyek` (
  `velemenyid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `jatekosid` int(255) DEFAULT NULL,
  `klubid` int(255) DEFAULT NULL,
  `szoveg` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminok`
--
ALTER TABLE `adminok`
  ADD PRIMARY KEY (`userid`);

--
-- A tábla indexei `baratok`
--
ALTER TABLE `baratok`
  ADD PRIMARY KEY (`baratid`),
  ADD UNIQUE KEY `user_id1` (`userid1`),
  ADD UNIQUE KEY `user_id2` (`userid2`),
  ADD KEY `userid1` (`userid1`),
  ADD KEY `userid2` (`userid2`);

--
-- A tábla indexei `ertekelesek`
--
ALTER TABLE `ertekelesek`
  ADD PRIMARY KEY (`ertekelesid`),
  ADD UNIQUE KEY `jatekos_id` (`jatekosid`),
  ADD UNIQUE KEY `klub_id` (`klubid`),
  ADD KEY `user_id` (`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `jatekosid` (`jatekosid`),
  ADD KEY `klubid` (`klubid`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`userid`);

--
-- A tábla indexei `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD PRIMARY KEY (`jatekosid`),
  ADD UNIQUE KEY `klub_id` (`klubid`),
  ADD UNIQUE KEY `poz_id` (`pozid`),
  ADD UNIQUE KEY `orszag_id` (`orszagid`),
  ADD KEY `poz_id_2` (`pozid`),
  ADD KEY `klub_id_2` (`klubid`),
  ADD KEY `orszag_id_2` (`orszagid`),
  ADD KEY `orszagid` (`orszagid`),
  ADD KEY `klubid` (`klubid`),
  ADD KEY `pozid` (`pozid`);

--
-- A tábla indexei `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD PRIMARY KEY (`kedvencid`),
  ADD UNIQUE KEY `user_id` (`userid`),
  ADD UNIQUE KEY `klub_id` (`klubid`),
  ADD UNIQUE KEY `jatekos_id` (`jatekosid`),
  ADD UNIQUE KEY `liga_id` (`ligaid`),
  ADD UNIQUE KEY `orszag_id` (`orszagid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `jatekosid` (`jatekosid`),
  ADD KEY `ligaid` (`ligaid`),
  ADD KEY `orszagid` (`orszagid`),
  ADD KEY `klubid` (`klubid`);

--
-- A tábla indexei `klubbok`
--
ALTER TABLE `klubbok`
  ADD PRIMARY KEY (`klubid`),
  ADD KEY `liga_id` (`ligaid`);

--
-- A tábla indexei `ligak`
--
ALTER TABLE `ligak`
  ADD PRIMARY KEY (`ligaid`),
  ADD UNIQUE KEY `orszag_id` (`orszagid`),
  ADD UNIQUE KEY `orszag_id_2` (`orszagid`);

--
-- A tábla indexei `orszagok`
--
ALTER TABLE `orszagok`
  ADD PRIMARY KEY (`orszagid`);

--
-- A tábla indexei `posztok`
--
ALTER TABLE `posztok`
  ADD PRIMARY KEY (`pozid`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`uzenetid`),
  ADD UNIQUE KEY `user_idKuldott` (`useridKuldott`),
  ADD UNIQUE KEY `user_idFogadott` (`useridFogadott`);

--
-- A tábla indexei `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD PRIMARY KEY (`velemenyid`),
  ADD UNIQUE KEY `user_id` (`userid`),
  ADD UNIQUE KEY `jatekos_id` (`jatekosid`),
  ADD UNIQUE KEY `klub_id` (`klubid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `baratok`
--
ALTER TABLE `baratok`
  MODIFY `baratid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `ertekelesek`
--
ALTER TABLE `ertekelesek`
  MODIFY `ertekelesid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  MODIFY `jatekosid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  MODIFY `kedvencid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `klubbok`
--
ALTER TABLE `klubbok`
  MODIFY `klubid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT a táblához `ligak`
--
ALTER TABLE `ligak`
  MODIFY `ligaid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `uzenetid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `velemenyid` int(255) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `adminok`
--
ALTER TABLE `adminok`
  ADD CONSTRAINT `adminok_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `baratok`
--
ALTER TABLE `baratok`
  ADD CONSTRAINT `baratok_ibfk_1` FOREIGN KEY (`userid1`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baratok_ibfk_2` FOREIGN KEY (`userid2`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ertekelesek`
--
ALTER TABLE `ertekelesek`
  ADD CONSTRAINT `ertekelesek_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekelesek_ibfk_2` FOREIGN KEY (`jatekosid`) REFERENCES `jatekosok` (`jatekosid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekelesek_ibfk_3` FOREIGN KEY (`klubid`) REFERENCES `klubbok` (`klubid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD CONSTRAINT `jatekosok_ibfk_1` FOREIGN KEY (`klubid`) REFERENCES `klubbok` (`klubid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jatekosok_ibfk_2` FOREIGN KEY (`pozid`) REFERENCES `posztok` (`pozid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jatekosok_ibfk_3` FOREIGN KEY (`orszagid`) REFERENCES `orszagok` (`orszagid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD CONSTRAINT `kedvencek_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_2` FOREIGN KEY (`jatekosid`) REFERENCES `jatekosok` (`jatekosid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_3` FOREIGN KEY (`ligaid`) REFERENCES `ligak` (`ligaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_4` FOREIGN KEY (`orszagid`) REFERENCES `orszagok` (`orszagid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_5` FOREIGN KEY (`klubid`) REFERENCES `klubbok` (`klubid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `klubbok`
--
ALTER TABLE `klubbok`
  ADD CONSTRAINT `klubbok_ibfk_1` FOREIGN KEY (`ligaid`) REFERENCES `ligak` (`ligaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ligak`
--
ALTER TABLE `ligak`
  ADD CONSTRAINT `ligak_ibfk_1` FOREIGN KEY (`orszagid`) REFERENCES `orszagok` (`orszagid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD CONSTRAINT `uzenetek_ibfk_1` FOREIGN KEY (`useridKuldott`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzenetek_ibfk_2` FOREIGN KEY (`useridFogadott`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD CONSTRAINT `velemenyek_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velemenyek_ibfk_2` FOREIGN KEY (`jatekosid`) REFERENCES `jatekosok` (`jatekosid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velemenyek_ibfk_3` FOREIGN KEY (`klubid`) REFERENCES `klubbok` (`klubid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
