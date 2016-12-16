-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Dez 2016 um 21:06
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kiez corner`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `LOGID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `USERNAME` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `PASSWORD` varchar(10) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `member`
--

CREATE TABLE `member` (
  `MEMBNO` int(11) NOT NULL,
  `NAME` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `ADDRESS` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `ZIP` char(5) COLLATE latin1_general_cs NOT NULL,
  `CITY` varchar(50) COLLATE latin1_general_cs NOT NULL DEFAULT 'ERFURT',
  `EMAIL` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `PHONE` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `POINTS_ACCOUNT` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offers`
--

CREATE TABLE `offers` (
  `OFFERID` int(6) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `OHEADLINE` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `ODESCRIP` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `OZIP` int(5) NOT NULL,
  `OPHONE` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `OMAIL` varchar(80) COLLATE latin1_general_cs DEFAULT NULL,
  `OSCORE` int(2) NOT NULL,
  `PICTURE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `PICID` int(11) NOT NULL,
  `LINK` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `MEMBERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `requests`
--

CREATE TABLE `requests` (
  `REQUESTID` int(6) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `RHEADLINE` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `RDESCRIP` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `RZIP` int(5) NOT NULL,
  `RPHONE` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `RMAIL` varchar(80) COLLATE latin1_general_cs DEFAULT NULL,
  `RSCORE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `requests`
--

INSERT INTO `requests` (`REQUESTID`, `MEMBERID`, `RHEADLINE`, `RDESCRIP`, `RZIP`, `RPHONE`, `RMAIL`, `RSCORE`) VALUES
(1, 2147483647, 'BeispielÃ¼berschrift', 'Anzeigentext', 0, 'Kevin Kosinski', NULL, 5);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEMBNO`),
  ADD KEY `NAME` (`NAME`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indizes für die Tabelle `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OFFERID`),
  ADD KEY `MEMBERID` (`MEMBERID`),
  ADD KEY `OHEADLINE` (`OHEADLINE`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`PICID`),
  ADD KEY `MEMBERID` (`MEMBERID`);

--
-- Indizes für die Tabelle `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`REQUESTID`),
  ADD KEY `MEMBERID` (`MEMBERID`),
  ADD KEY `RHEADLINE` (`RHEADLINE`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `offers`
--
ALTER TABLE `offers`
  MODIFY `OFFERID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `requests`
--
ALTER TABLE `requests`
  MODIFY `REQUESTID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
