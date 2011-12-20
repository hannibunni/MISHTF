-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Dezember 2011 um 13:02
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Waiter`
--

DROP TABLE IF EXISTS `Waiter`;
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

