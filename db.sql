-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jan 2022 om 01:09
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neger`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dranken`
--

CREATE TABLE `dranken` (
  `drankje_id` int(11) NOT NULL,
  `drankje_naam` varchar(255) NOT NULL,
  `drankje_prijs` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservaties`
--

CREATE TABLE `reservaties` (
  `klant_id` int(11) NOT NULL,
  `klant_naam` varchar(255) NOT NULL,
  `tijdstip` time NOT NULL,
  `datum` varchar(2) NOT NULL,
  `nietkomer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservaties`
--

INSERT INTO `reservaties` (`klant_id`, `klant_naam`, `tijdstip`, `datum`, `nietkomer`) VALUES
(18, 'dababy', '21:07:00', '20', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dranken`
--
ALTER TABLE `dranken`
  ADD PRIMARY KEY (`drankje_id`);

--
-- Indexen voor tabel `reservaties`
--
ALTER TABLE `reservaties`
  ADD PRIMARY KEY (`klant_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dranken`
--
ALTER TABLE `dranken`
  MODIFY `drankje_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reservaties`
--
ALTER TABLE `reservaties`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
