-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jan 2019 um 12:36
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `szisst`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellt`
--

CREATE TABLE `bestellt` (
  `best_id` int(11) NOT NULL,
  `menue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menue`
--

CREATE TABLE `menue` (
  `id` int(11) NOT NULL,
  `datum` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `art` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise1` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise2` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise3` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise4` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise5` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `speise6` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Daten für Tabelle `menue`
--

INSERT INTO `menue` (`id`, `datum`, `name`, `art`, `speise1`, `speise2`, `speise3`, `speise4`, `speise5`, `speise6`) VALUES
(1, '3012019', 'Menue1', 'Hausmanskost', 'test1', '', '', '', '', ''),
(2, '3012019', 'Menue2', 'Vegetarisch', 'test4', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `nachname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellt`
--
ALTER TABLE `bestellt`
  ADD PRIMARY KEY (`best_id`),
  ADD KEY `fk_bestellt_user` (`user_id`),
  ADD KEY `fk_bestellt_menue` (`menue_id`);

--
-- Indizes für die Tabelle `menue`
--
ALTER TABLE `menue`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellt`
--
ALTER TABLE `bestellt`
  MODIFY `best_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `menue`
--
ALTER TABLE `menue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellt`
--
ALTER TABLE `bestellt`
  ADD CONSTRAINT `fk_bestellt_menue` FOREIGN KEY (`menue_id`) REFERENCES `menue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bestellt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
