-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Dez 2016 um 21:44
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
-- Tabellenstruktur für Tabelle `advertisements`
--

CREATE TABLE `advertisements` (
  `ADVID` int(6) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `ADVTYPE` enum('REQUEST','OFFER') COLLATE latin1_general_cs NOT NULL,
  `HEADLINE` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `DESCRIP` varchar(200) COLLATE latin1_general_cs DEFAULT NULL,
  `ZIP` int(5) NOT NULL,
  `PHONE` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `MAIL` varchar(80) COLLATE latin1_general_cs DEFAULT NULL,
  `SCORE` int(2) NOT NULL,
  `PICTURE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

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
  `POINTS_ACCOUNT` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `member`
--

INSERT INTO `member` (`MEMBNO`, `NAME`, `ADDRESS`, `ZIP`, `CITY`, `EMAIL`, `PHONE`, `POINTS_ACCOUNT`) VALUES
(11815, 'Max Mustermann', 'Musterstrasse 15', '99012', 'ERFURT', 'testmail.com', '0815-1234', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `PICID` int(11) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `NAME` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `TYPE` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `SIZE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `scoregrade`
--

CREATE TABLE `scoregrade` (
  `GRADE` int(2) NOT NULL,
  `LOVAL` int(11) NOT NULL COMMENT 'Euro',
  `HIVAL` int(11) NOT NULL COMMENT 'Euro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `scoregrade`
--

INSERT INTO `scoregrade` (`GRADE`, `LOVAL`, `HIVAL`) VALUES
(1, 0, 5),
(2, 6, 10),
(3, 11, 20),
(4, 21, 30),
(5, 31, 40),
(6, 41, 50),
(7, 51, 60),
(8, 61, 70),
(9, 71, 80),
(10, 81, 90);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`ADVID`),
  ADD KEY `MEMBERID` (`MEMBERID`),
  ADD KEY `SCORE` (`SCORE`),
  ADD KEY `PICTURE` (`PICTURE`);

--
-- Indizes für die Tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LOGID`),
  ADD KEY `USERID` (`USERID`);

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
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD KEY `MEMBERID` (`MEMBERID`);

--
-- Indizes für die Tabelle `scoregrade`
--
ALTER TABLE `scoregrade`
  ADD PRIMARY KEY (`GRADE`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `FK_ADVERTISEMENT_MEMBER` FOREIGN KEY (`MEMBERID`) REFERENCES `member` (`MEMBNO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ADVERTISEMENT_PICTURES` FOREIGN KEY (`PICTURE`) REFERENCES `pictures` (`PICID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
