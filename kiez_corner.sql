-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Feb 2017 um 15:49
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 5.6.24

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
  `A_ZIP` int(5) NOT NULL,
  `A_PHONE` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `MAIL` varchar(80) COLLATE latin1_general_cs DEFAULT NULL,
  `SCORE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `advertisements`
--

INSERT INTO `advertisements` (`ADVID`, `MEMBERID`, `ADVTYPE`, `HEADLINE`, `DESCRIP`, `A_ZIP`, `A_PHONE`, `MAIL`, `SCORE`) VALUES
(5, 19010248, 'REQUEST', 'Fahrrad', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu', 99092, '0815-1234', 'test@mail.com', 5),
(6, 19010248, 'OFFER', 'Bohrmaschine', 'Jemand musste Josef K.\r\n\r\nverleumdet haben, denn ohne dass er etwas BÃ¶ses getan hÃ¤tte, wurde er eines Morgens verhaftet. Â»Wie ein Hund! Â« sagte er, es ', 99084, '', 'mail@test.com', 5),
(7, 15025145, 'OFFER', 'Angebot ohne Bild', 'Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben da sind und wie sie aussehen. Manchmal benutzt man Worte wie Hamburgefonts, Rafgenduks oder Handgloves, um Schriften zu testen. Ma', 99090, '1234-5678', '', 1),
(8, 15025145, 'REQUEST', 'Gesuch ohne Bild', 'Es gibt im Moment in diese Mannschaft, oh, einige Spieler vergessen ihnen Profi was sie sind. Ich lese nicht sehr viele Zeitungen, aber ich habe gehÃ¶rt viele Situationen. Erstens: wir haben nicht off', 99045, '', 'Max@Musterman.com', 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `LOGID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `USERNAME` char(8) COLLATE latin1_general_cs NOT NULL,
  `PASSWORD` varchar(80) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`LOGID`, `USERID`, `USERNAME`, `PASSWORD`) VALUES
(1, 19010248, 'ke0135ko', 'Bei_FH01'),
(2, 15025145, 'Ma0815Mu', 'Test1234');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `member`
--

CREATE TABLE `member` (
  `MEMBNO` int(11) NOT NULL,
  `NAME` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `ADDRESS` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `M_ZIP` int(5) NOT NULL,
  `CITY` varchar(50) COLLATE latin1_general_cs NOT NULL DEFAULT 'ERFURT',
  `EMAIL` varchar(80) COLLATE latin1_general_cs DEFAULT NULL,
  `M_PHONE` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `POINTS_ACCOUNT` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `member`
--

INSERT INTO `member` (`MEMBNO`, `NAME`, `ADDRESS`, `M_ZIP`, `CITY`, `EMAIL`, `M_PHONE`, `POINTS_ACCOUNT`) VALUES
(15025145, 'Max Mustermann', 'Musterstr. 25', 99084, 'ERFURT', 'mail@test.com', '', 5),
(19010248, 'Kevin Kosinski', 'Blumenstr. 8', 99092, 'ERFURT', 'test@mail.com', '', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `PICID` int(6) NOT NULL,
  `MEMBERID` int(11) NOT NULL,
  `TITLE` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `TYPE` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `SIZE` int(11) NOT NULL,
  `ASSIGNED_ADV` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`PICID`, `MEMBERID`, `TITLE`, `TYPE`, `SIZE`, `ASSIGNED_ADV`) VALUES
(1, 19010248, '19010248fahrrad', 'jpeg', 10541, 5),
(2, 19010248, '19010248borhmaschine', 'jpeg', 5149, 6);

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
  ADD UNIQUE KEY `DESCRIP` (`DESCRIP`),
  ADD KEY `MEMBERID` (`MEMBERID`),
  ADD KEY `SCORE` (`SCORE`);

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
  ADD KEY `NAME` (`NAME`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`PICID`),
  ADD KEY `MEMBERID` (`MEMBERID`),
  ADD KEY `NAME` (`TITLE`),
  ADD KEY `ASSIGNED_ADV` (`ASSIGNED_ADV`);

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
  ADD CONSTRAINT `FK_ADVERTISEMENT_SCORGRADE` FOREIGN KEY (`SCORE`) REFERENCES `scoregrade` (`GRADE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_LOGIN_MEMBER` FOREIGN KEY (`USERID`) REFERENCES `member` (`MEMBNO`);

--
-- Constraints der Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_PICTURES_ADVERTISEMENTS` FOREIGN KEY (`ASSIGNED_ADV`) REFERENCES `advertisements` (`ADVID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
