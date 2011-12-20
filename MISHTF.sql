SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `BURGER_HOUSE`
--
CREATE DATABASE `BURGER_HOUSE` DEFAULT CHARACTER SET latin1;
USE `BURGER_HOUSE`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Burger`
--

CREATE TABLE IF NOT EXISTS `Burger` (
  `BID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `BName` varchar(15) NOT NULL,
  `BPrice` int(3) unsigned NOT NULL,
  PRIMARY KEY (`BID`)
);

--
-- Daten für Tabelle `Burger`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Menu`
--

CREATE TABLE IF NOT EXISTS `Menu` (
  `MID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`MID`)
);

--
-- Daten für Tabelle `Menu`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Serve`
--

CREATE TABLE IF NOT EXISTS `Serve` (
  `SID` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `WID` int(5) unsigned NOT NULL,
  `TID` int(5) unsigned NOT NULL,
  `SDate` date NOT NULL,
  PRIMARY KEY (`SID`)
);

--
-- Daten für Tabelle `Serve`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `SideDishes`
--

CREATE TABLE IF NOT EXISTS `SideDishes` (
  `SID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `SName` varchar(15) NOT NULL,
  `SPrice` int(2) unsigned NOT NULL,
  `SGlutenFree` tinyint(1) NOT NULL,
  PRIMARY KEY (`SID`)
);

--
-- Daten für Tabelle `SideDishes`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Table`
--

CREATE TABLE IF NOT EXISTS `Table` (
  `TID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `TSmoker` tinyint(1) NOT NULL,
  `TSeats` int(2) unsigned NOT NULL,
  PRIMARY KEY (`TID`)
);

--
-- Daten für Tabelle `Table`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Waiter`
--

CREATE TABLE IF NOT EXISTS `Waiter` (
  `WID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `WFirstName` varchar(30) NOT NULL,
  `WLastName` varchar(30) NOT NULL,
  `WAddress` varchar(100) NOT NULL,
  `WAge` int(3) NOT NULL,
  `WGender` varchar(10) NOT NULL,
  PRIMARY KEY (`WID`)
);

--
-- Daten für Tabelle `Waiter`
--

