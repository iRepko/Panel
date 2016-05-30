-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 06:16 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `panel`
--
CREATE DATABASE IF NOT EXISTS `panel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `panel`;

-- --------------------------------------------------------

--
-- Table structure for table `Info`
--

CREATE TABLE IF NOT EXISTS `Info` (
  `Name` varchar(1024) NOT NULL,
  `Email` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Servers`
--

CREATE TABLE IF NOT EXISTS `Servers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(32) NOT NULL,
  `Virtualization` int(16) NOT NULL,
  `KEY1` varchar(256) NOT NULL,
  `KEY2` varchar(256) NOT NULL,
  `Port` int(11) NOT NULL DEFAULT '25003',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(2056) NOT NULL,
  `Key` varchar(256) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `virtuals`
--

CREATE TABLE IF NOT EXISTS `virtuals` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OwnerID` int(255) NOT NULL,
  `Hostname` varchar(256) NOT NULL,
  `IP` varchar(32) NOT NULL,
  `Hard Drive` varchar(32) NOT NULL,
  `Memory` varchar(255) NOT NULL,
  `Swap` varchar(32) NOT NULL,
  `Status` varchar(32) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `vID` int(32) NOT NULL,
  `sID` int(16) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
