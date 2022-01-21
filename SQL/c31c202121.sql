-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2022. Jan 21. 18:06
-- Kiszolgáló verziója: 10.3.29-MariaDB-0+deb10u1
-- PHP verzió: 7.4.23

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
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `baratok`
--

CREATE TABLE `baratok` (
  `barat_id` int(255) NOT NULL,
  `user_id1` int(255) NOT NULL,
  `user_id2` int(255) NOT NULL,
  `elfogadva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekelesek`
--

CREATE TABLE `ertekelesek` (
  `ertekeles_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `jatekos_id` int(255) DEFAULT NULL,
  `klub_id` int(255) DEFAULT NULL,
  `ertekeles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `user_id` int(255) NOT NULL,
  `felhasznalonev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatekosok`
--

CREATE TABLE `jatekosok` (
  `jatekos_id` int(255) NOT NULL,
  `orszag_id` int(255) NOT NULL,
  `klub_id` int(255) NOT NULL,
  `poz_id` int(255) NOT NULL,
  `szuletesi datum` date NOT NULL,
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
  `kedvenc_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `jatekos_id` int(255) DEFAULT NULL,
  `liga_id` int(255) DEFAULT NULL,
  `orszag_id` int(255) DEFAULT NULL,
  `klub_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `klubbok`
--

CREATE TABLE `klubbok` (
  `klub_id` int(255) NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `liga_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ligak`
--

CREATE TABLE `ligak` (
  `liga_id` int(255) NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `orszag_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orszagok`
--

CREATE TABLE `orszagok` (
  `orszag_id` int(255) NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `vilag  ranglista helyezes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posztok`
--

CREATE TABLE `posztok` (
  `poz_id` int(255) NOT NULL,
  `poz_nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzenet_id` int(255) NOT NULL,
  `user_idKuldott` int(255) NOT NULL,
  `user_idFogadott` int(255) NOT NULL,
  `szoveg` text NOT NULL,
  `szdatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemenyek`
--

CREATE TABLE `velemenyek` (
  `velemeny_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `jatekos_id` int(255) DEFAULT NULL,
  `klub_id` int(255) DEFAULT NULL,
  `szoveg` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminok`
--
ALTER TABLE `adminok`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `baratok`
--
ALTER TABLE `baratok`
  ADD PRIMARY KEY (`barat_id`),
  ADD UNIQUE KEY `user_id1` (`user_id1`),
  ADD UNIQUE KEY `user_id2` (`user_id2`);

--
-- A tábla indexei `ertekelesek`
--
ALTER TABLE `ertekelesek`
  ADD PRIMARY KEY (`ertekeles_id`),
  ADD UNIQUE KEY `jatekos_id` (`jatekos_id`),
  ADD UNIQUE KEY `klub_id` (`klub_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD PRIMARY KEY (`jatekos_id`),
  ADD UNIQUE KEY `orszag_id` (`orszag_id`),
  ADD UNIQUE KEY `klub_id` (`klub_id`),
  ADD UNIQUE KEY `poz_id` (`poz_id`);

--
-- A tábla indexei `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD PRIMARY KEY (`kedvenc_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `jatekos_id` (`jatekos_id`),
  ADD UNIQUE KEY `liga_id` (`liga_id`),
  ADD UNIQUE KEY `orszag_id` (`orszag_id`),
  ADD UNIQUE KEY `klub_id` (`klub_id`);

--
-- A tábla indexei `klubbok`
--
ALTER TABLE `klubbok`
  ADD PRIMARY KEY (`klub_id`),
  ADD UNIQUE KEY `liga_id` (`liga_id`);

--
-- A tábla indexei `ligak`
--
ALTER TABLE `ligak`
  ADD PRIMARY KEY (`liga_id`),
  ADD UNIQUE KEY `orszag_id` (`orszag_id`),
  ADD UNIQUE KEY `orszag_id_2` (`orszag_id`);

--
-- A tábla indexei `orszagok`
--
ALTER TABLE `orszagok`
  ADD PRIMARY KEY (`orszag_id`);

--
-- A tábla indexei `posztok`
--
ALTER TABLE `posztok`
  ADD PRIMARY KEY (`poz_id`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`uzenet_id`),
  ADD UNIQUE KEY `user_idKuldott` (`user_idKuldott`),
  ADD UNIQUE KEY `user_idFogadott` (`user_idFogadott`);

--
-- A tábla indexei `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD PRIMARY KEY (`velemeny_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `jatekos_id` (`jatekos_id`),
  ADD UNIQUE KEY `klub_id` (`klub_id`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `baratok`
--
ALTER TABLE `baratok`
  ADD CONSTRAINT `baratok_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baratok_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ertekelesek`
--
ALTER TABLE `ertekelesek`
  ADD CONSTRAINT `ertekelesek_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekelesek_ibfk_2` FOREIGN KEY (`klub_id`) REFERENCES `klubbok` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekelesek_ibfk_3` FOREIGN KEY (`jatekos_id`) REFERENCES `jatekosok` (`jatekos_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD CONSTRAINT `felhasznalok_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `adminok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD CONSTRAINT `jatekosok_ibfk_1` FOREIGN KEY (`klub_id`) REFERENCES `klubbok` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jatekosok_ibfk_2` FOREIGN KEY (`jatekos_id`) REFERENCES `kedvencek` (`jatekos_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jatekosok_ibfk_3` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD CONSTRAINT `kedvencek_ibfk_1` FOREIGN KEY (`liga_id`) REFERENCES `ligak` (`liga_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_3` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `klubbok`
--
ALTER TABLE `klubbok`
  ADD CONSTRAINT `klubbok_ibfk_1` FOREIGN KEY (`liga_id`) REFERENCES `ligak` (`liga_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klubbok_ibfk_2` FOREIGN KEY (`klub_id`) REFERENCES `kedvencek` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ligak`
--
ALTER TABLE `ligak`
  ADD CONSTRAINT `ligak_ibfk_1` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `orszagok`
--
ALTER TABLE `orszagok`
  ADD CONSTRAINT `orszagok_ibfk_1` FOREIGN KEY (`orszag_id`) REFERENCES `jatekosok` (`jatekos_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Megkötések a táblához `posztok`
--
ALTER TABLE `posztok`
  ADD CONSTRAINT `posztok_ibfk_1` FOREIGN KEY (`poz_id`) REFERENCES `jatekosok` (`poz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD CONSTRAINT `uzenetek_ibfk_2` FOREIGN KEY (`user_idKuldott`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzenetek_ibfk_3` FOREIGN KEY (`user_idFogadott`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD CONSTRAINT `velemenyek_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalok` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velemenyek_ibfk_2` FOREIGN KEY (`jatekos_id`) REFERENCES `jatekosok` (`jatekos_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velemenyek_ibfk_3` FOREIGN KEY (`klub_id`) REFERENCES `klubbok` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
