SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `BEST_BURGERS`
--
CREATE DATABASE `BEST_BURGERS` DEFAULT CHARACTER SET latin1;
USE `BEST_BURGERS`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Burger`
--

CREATE TABLE IF NOT EXISTS `Burger` (
  `BID`    int(5) unsigned NOT NULL AUTO_INCREMENT,
  `BName`  varchar(25) NOT NULL,
  `BPrice` float(4,2) NOT NULL,
  PRIMARY KEY (`BID`)
);

--
-- Daten für Tabelle `Burger`
--

INSERT INTO `Burger` (`BName`, `BPrice`) VALUES
  ('Manhattan Burger', 6);
INSERT INTO `Burger` (`BName`, `BPrice`) VALUES
  ('NewYork Classic', 6.5);
INSERT INTO `Burger` (`BName`, `BPrice`) VALUES
  ('Extra Meat Burger', 8);
INSERT INTO `Burger` (`BName`, `BPrice`) VALUES
  ('Hot Chicken Burger', 7.25);
INSERT INTO `Burger` (`BName`, `BPrice`) VALUES
  ('Austrian Burger', 7.5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `SalesSlip`
--

CREATE TABLE IF NOT EXISTS `SalesSlip` (
  `ID`         int(100) unsigned NOT NULL AUTO_INCREMENT,
  `WID`        int(5) unsigned NOT NULL,
  `TID`        int(5) unsigned NOT NULL,
  `BID`        int(5) unsigned,
  `SID`        int(5) unsigned,
  `STimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
);

--
-- Daten für Tabelle `SalesSlip`
--

INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (1, 5, 1, 1);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (1, 6, 2, 2);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (1, 7, 3, 3);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`, `STimeStamp`) VALUES
  (1, 5, 0, 2, '2010-11-18 12:00:30');
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (1, 6, 1, 3);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (1, 7, 3, 1);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`, `STimeStamp`) VALUES
  (2, 3, 5, 2, '2009-08-10 10:04:30');
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (2, 4, 3, 1);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`, `STimeStamp`) VALUES
  (2, 4, 1, 3, '2011-04-03 16:00:42');
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (2, 6, 2, 2);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`, `STimeStamp`) VALUES
  (3, 2, 2, 2, '2008-06-05 14:05:42');
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (3, 2, 1, 4);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (4, 1, 4, 3);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`) VALUES
  (4, 1, 2, 4);
INSERT INTO `SalesSlip` (`WID`, `TID`, `BID`, `SID`, `STimeStamp`) VALUES
  (4, 1, 5, 2, '2010-09-14 17:00:51');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `SideDish`
--

CREATE TABLE IF NOT EXISTS `SideDish` (
  `SID`         int(5) unsigned NOT NULL AUTO_INCREMENT,
  `SName`       varchar(15) NOT NULL,
  `SPrice`      float(4,2) NOT NULL,
  `SGlutenFree` tinyint(1) NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`SID`)
);

--
-- Daten für Tabelle `SideDish`
--

INSERT INTO `SideDish` (`SName`, `SPrice`, `SGlutenFree`) VALUES
  ('Pommes', 2.5, true);
INSERT INTO `SideDish` (`SName`, `SPrice`) VALUES
  ('Potatoes', 2);
INSERT INTO `SideDish` (`SName`, `SPrice`) VALUES
  ('Potato Stripes', 2.7);
INSERT INTO `SideDish` (`SName`, `SPrice`, `SGlutenFree`) VALUES
  ('Rice', 2, true);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Table`
--

CREATE TABLE IF NOT EXISTS `Table` (
  `TID`      int(5) unsigned NOT NULL AUTO_INCREMENT,
  `TSmoker`  tinyint(1) NOT NULL DEFAULT FALSE,
  `TSeats`   int(2) unsigned NOT NULL,
  PRIMARY KEY (`TID`)
);

--
-- Daten für Tabelle `Table`
--

-- NonSmoking Tables
INSERT INTO `Table` (`TSeats`) VALUES
  (4);
INSERT INTO `Table` (`TSeats`) VALUES
  (4);
INSERT INTO `Table` (`TSeats`) VALUES
  (2);
INSERT INTO `Table` (`TSeats`) VALUES
  (5);

-- Smoking Tables
INSERT INTO `Table` (`TSmoker`, `TSeats`) VALUES
  (true, 4);
INSERT INTO `Table` (`TSmoker`, `TSeats`) VALUES
  (true, 2);
INSERT INTO `Table` (`TSmoker`, `TSeats`) VALUES
  (true, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Waiter`
--

CREATE TABLE IF NOT EXISTS `Waiter` (
  `WID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `WFirstName` varchar(30) NOT NULL,
  `WLastName`  varchar(30) NOT NULL,
  `WAddress`   varchar(100) NOT NULL,
  `WAge`       int(3) NOT NULL,
  `WGender`    varchar(10) NOT NULL,
  PRIMARY KEY (`WID`)
);

--
-- Daten für Tabelle `Waiter`
--

INSERT INTO `Waiter` (`WFirstName`, `WLastName`, `WAddress`, `WAge`, `WGender`) VALUES
  ('Daniel', 'Fritzsch', 'Daniels Address', 20, 'male'); 
INSERT INTO `Waiter` (`WFirstName`, `WLastName`, `WAddress`, `WAge`, `WGender`) VALUES 
  ('Hannes', 'Hasenauer', 'Hannes Address', 23, 'male');
INSERT INTO `Waiter` (`WFirstName`, `WLastName`, `WAddress`, `WAge`, `WGender`) VALUES
  ('Hans Christian', 'Temmel', 'Hans Christians Address', 25, 'male');
INSERT INTO `Waiter` (`WFirstName`, `WLastName`, `WAddress`, `WAge`, `WGender`) VALUES
  ('Sandra', 'Steal', 'Sandras Address', 15, 'female'); 
