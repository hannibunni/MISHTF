-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Dezember 2011 um 13:19
-- Server Version: 5.1.44
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `BURGER_HOUSE`
--
CREATE DATABASE `BURGER_HOUSE` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `Waiter`
--

