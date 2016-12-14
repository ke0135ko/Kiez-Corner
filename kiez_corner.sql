-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Dez 2016 um 13:19
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
  `CITY` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `EMAIL` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `PHONE` varchar(20) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offers`
--

CREATE TABLE `offers` (
  `OFFERID` char(6) COLLATE latin1_general_cs NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `ODESCRIP` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `OADDRESS` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `OCONTACT` int(11) NOT NULL,
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
  `ID` int(6) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `RDESCRIP` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `ADDRESS` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `RCONTACT` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `RSCORE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

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
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`PICID`),
  ADD KEY `MEMBERID` (`MEMBERID`);

--
-- Indizes für die Tabelle `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MEMBERID` (`MEMBERID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
