-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 27, 2024 alle 17:09
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionalemusicale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `album`
--

CREATE TABLE `album` (
  `Titolo` varchar(25) NOT NULL,
  `Anno d'uscita` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `album`
--

INSERT INTO `album` (`Titolo`, `Anno d'uscita`) VALUES
('ASPETTANDO LA BELLA VITA', '2023'),
('GIOVANE RONDO', '2021'),
('Identità', '2023'),
('Milano Demons', '2022'),
('MOTIVATION 4 THE STREETZ', '2023'),
('Quarto di Bue', '2023'),
('Santana Season', '2023'),
('The Globe', '2022'),
('TRENCHES BABY', '2023'),
('Umile', '2023');

-- --------------------------------------------------------

--
-- Struttura della tabella `autori`
--

CREATE TABLE `autori` (
  `Nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `autori`
--

INSERT INTO `autori` (`Nome`) VALUES
('Artie 5ive'),
('Kid Yugi'),
('Nerissima Serpe'),
('Rondodasosa'),
('Shiva'),
('Tony Boy');

-- --------------------------------------------------------

--
-- Struttura della tabella `autori-brani`
--

CREATE TABLE `autori-brani` (
  `ID` int(11) NOT NULL,
  `Nome autori` varchar(25) NOT NULL,
  `Titolo brani` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `autori-brani`
--

INSERT INTO `autori-brani` (`ID`, `Nome autori`, `Titolo brani`) VALUES
(1, 'Artie 5ive', 'BOULEVARD'),
(2, 'Artie 5ive', 'EYES OF THE TIGER'),
(3, 'Artie 5ive', 'HOODRICH'),
(4, 'Artie 5ive', 'READY 4 WAR'),
(5, 'Artie 5ive', 'SE MORISSI OGGI'),
(6, 'Artie 5ive', 'SOULJAS'),
(7, 'Artie 5ive', 'Victoria'),
(8, 'Kid Yugi', 'GRAMMELOT'),
(9, 'Kid Yugi', 'Massafghanistan'),
(10, 'Kid Yugi', 'No Pit Stop'),
(11, 'Nerissima Serpe', 'Mamy Freestyle'),
(12, 'Nerissima Serpe', 'No Pit Stop'),
(13, 'Nerissima Serpe', 'Ovetto Frozen'),
(14, 'Rondodasosa', 'BOULEVARD'),
(15, 'Rondodasosa', 'EYES OF THE TIGER'),
(16, 'Rondodasosa', 'HOODRICH'),
(17, 'Rondodasosa', 'READY 4 WAR'),
(18, 'Rondodasosa', 'READY 4 WAR'),
(19, 'Rondodasosa', 'YOUNGSHIT'),
(20, 'Shiva', 'Alleluia'),
(21, 'Shiva', 'Diversi'),
(22, 'Shiva', 'Non lo Sai'),
(23, 'Shiva', 'Umile'),
(24, 'Shiva', 'YOUNGSHIT'),
(25, 'Tony Boy', 'Diretto al top'),
(26, 'Tony Boy', 'Umile'),
(27, 'Tony Boy', 'Victoria');

-- --------------------------------------------------------

--
-- Struttura della tabella `brani`
--

CREATE TABLE `brani` (
  `Titolo` varchar(25) NOT NULL,
  `Genere` varchar(25) NOT NULL,
  `Titolo album` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `brani`
--

INSERT INTO `brani` (`Titolo`, `Genere`, `Titolo album`) VALUES
('Alleluia', 'Hip-Hop', 'Milano Demons'),
('BOULEVARD', 'Funky', 'MOTIVATION 4 THE STREETZ'),
('Diretto al top', 'Hip-Hop', 'Umile'),
('Diversi', 'Sentimentale', 'Santana Season'),
('EYES OF THE TIGER', 'Drill', 'ASPETTANDO LA BELLA VITA'),
('GRAMMELOT', 'Tarantella', 'The Globe'),
('HOODRICH', 'Spingere', 'MOTIVATION 4 THE STREETZ'),
('Mamy Freestyle', 'Sentimentale', 'Identità'),
('Massafghanistan', 'Tarantella', 'Quarto di Bue'),
('No Pit Stop', 'Drill', 'Identità'),
('Non lo Sai', 'Sentimentale', 'Milano Demons'),
('Ovetto Frozen', 'Funky', 'Identità'),
('READY 4 WAR', 'Drill', 'TRENCHES BABY'),
('SE MORISSI OGGI', 'Sentimentale', 'MOTIVATION 4 THE STREETZ'),
('SOULJAS', 'Sentimentale', 'ASPETTANDO LA BELLA VITA'),
('Umile', 'Hip-Hop', 'Umile'),
('Victoria', 'Spingere', 'Umile'),
('YOUNGSHIT', 'Hip-Hop', 'GIOVANE RONDO');

-- --------------------------------------------------------

--
-- Struttura della tabella `informazioni`
--

CREATE TABLE `informazioni` (
  `ID` int(11) NOT NULL,
  `Nome autori` varchar(25) NOT NULL,
  `Nome` varchar(25) NOT NULL,
  `Cognome` varchar(25) NOT NULL,
  `Data di Nascita` date NOT NULL,
  `Origini` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `informazioni`
--

INSERT INTO `informazioni` (`ID`, `Nome autori`, `Nome`, `Cognome`, `Data di Nascita`, `Origini`) VALUES
(1, 'Artie 5ive', 'Ivan Arturo', 'Barioli', '2000-08-28', 'italo-sierraleonesi'),
(2, 'Kid Yugi', 'Francesco', 'Stasi', '2001-04-14', 'Massafra (TA)'),
(3, 'Nerissima Serpe', 'Matteo', 'di Falco', '2000-10-06', 'provincia pavese'),
(4, 'Rondodasosa', 'Mattia', 'Barbieri', '2002-04-29', 'Zona 7 (MI)'),
(5, 'Shiva', 'Andrea', 'Arrigoni', '1999-08-27', 'West Side, Bubu Milano'),
(6, 'Tony Boy', 'Antonio', 'Hueber', '1999-09-26', 'Padova, anni \'80');

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('aronneghilardi', '180605'),
('domenicomanca', '250605'),
('ferrarijacopo', '200405'),
('todeschinitommaso', '190105');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Titolo`);

--
-- Indici per le tabelle `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `autori-brani`
--
ALTER TABLE `autori-brani`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RIF autori` (`Nome autori`),
  ADD KEY `RIF brani` (`Titolo brani`);

--
-- Indici per le tabelle `brani`
--
ALTER TABLE `brani`
  ADD PRIMARY KEY (`Titolo`),
  ADD KEY `RIF album` (`Titolo album`);

--
-- Indici per le tabelle `informazioni`
--
ALTER TABLE `informazioni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RIF autori INFO` (`Nome autori`);

--
-- Indici per le tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autori-brani`
--
ALTER TABLE `autori-brani`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `informazioni`
--
ALTER TABLE `informazioni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `autori-brani`
--
ALTER TABLE `autori-brani`
  ADD CONSTRAINT `RIF autori` FOREIGN KEY (`Nome autori`) REFERENCES `autori` (`Nome`),
  ADD CONSTRAINT `RIF brani` FOREIGN KEY (`Titolo brani`) REFERENCES `brani` (`Titolo`);

--
-- Limiti per la tabella `brani`
--
ALTER TABLE `brani`
  ADD CONSTRAINT `RIF album` FOREIGN KEY (`Titolo album`) REFERENCES `album` (`Titolo`);

--
-- Limiti per la tabella `informazioni`
--
ALTER TABLE `informazioni`
  ADD CONSTRAINT `RIF autori INFO` FOREIGN KEY (`Nome autori`) REFERENCES `autori` (`Nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
