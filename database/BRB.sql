-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2015 at 11:11 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BRB`
--

-- --------------------------------------------------------

--
-- Table structure for table `AggregatedValues`
--

CREATE TABLE IF NOT EXISTS `AggregatedValues` (
  `ConsequentName` varchar(50) NOT NULL,
  `ConsequenceVal1` double NOT NULL,
  `ConsequenceVal2` double NOT NULL,
  `ConsequenceVal3` double NOT NULL,
  `ConsequenceVal4` double DEFAULT NULL,
  `ConsequenceVal5` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AggregatedValues`
--

INSERT INTO `AggregatedValues` (`ConsequentName`, `ConsequenceVal1`, `ConsequenceVal2`, `ConsequenceVal3`, `ConsequenceVal4`, `ConsequenceVal5`) VALUES
('X8', 0.34779999, 0.61799997, 0.034400001, 0, 0),
('X9', 0, 0.090899996, 0.9091, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `AntecedentInputs`
--

CREATE TABLE IF NOT EXISTS `AntecedentInputs` (
  `AntecedentName` varchar(50) NOT NULL,
  `AntecedentInput` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AntecedentInputs`
--

INSERT INTO `AntecedentInputs` (`AntecedentName`, `AntecedentInput`) VALUES
('X23', 5),
('X19', 0.5),
('X20', 10),
('X21', 0.5),
('X22', 45),
('X22', 45);

-- --------------------------------------------------------

--
-- Table structure for table `DefaultRefVal`
--

CREATE TABLE IF NOT EXISTS `DefaultRefVal` (
  `RefTitle` varchar(50) DEFAULT NULL,
  `RefVal` double DEFAULT NULL,
  `AntecedentName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DefaultRefVal`
--

INSERT INTO `DefaultRefVal` (`RefTitle`, `RefVal`, `AntecedentName`) VALUES
('High', 1, 'All'),
('Medium', 0.5, 'All'),
('Low', 0, 'All'),
('High Overflow ', 100, 'x10'),
('Steep', 40, 'x25'),
('Low', 25, 'x25'),
('Medium', 0.5, 'x26'),
('Terrain', 1, 'x11'),
('Flat', 0, 'x11'),
('Severe', 1, 'x8'),
('Low', 0, 'x8'),
('Steep', 25, 'x17'),
('Low', 15, 'x17'),
('Medium', 0.5, 'x18'),
('High', 10, 'x16'),
('Low', 5, 'x16'),
('Clayey', 1, 'x19'),
('Rock', 0, 'x19'),
('Medium', 20, 'x20'),
('Highly Permeable', 1, 'x21'),
('Low Permeable', 0, 'x21'),
('Low Overflow ', 50, 'x10'),
('Medium', 750, 'x14'),
('Medium', 0.5, 'x9'),
('High', 1, 'x12'),
('Average', 22.5, 'x15'),
('Yes', 1, 'x28'),
('High', 7, 'x23'),
('Low', 3, 'x23'),
('Low', 0, 'x12'),
('Medium Overflow', 75, 'x10'),
('High', 1000, 'x14'),
('High', 50, 'x22'),
('Medium', 40, 'x22'),
('Low', 30, 'x22'),
('Medium', 32.5, 'x25'),
('High', 1, 'x26'),
('Low', 0, 'x26'),
('Average', 0.5, 'x11'),
('Average', 0.5, 'x8'),
('Medium', 20, 'x17'),
('High', 1, 'x18'),
('Low', 0, 'x18'),
('Medium', 7.5, 'x16'),
('Coarse', 0.5, 'x19'),
('High', 30, 'x20'),
('Low', 10, 'x20'),
('Average Permeable', 0.5, 'x21'),
('Low', 500, 'x14'),
('High', 1, 'x9'),
('High', 30, 'x15'),
('Low', 15, 'x15'),
('No', 0, 'x28'),
('Medium', 5, 'x23'),
('Low', 0, 'x9'),
('Medium', 0.5, 'x12');

-- --------------------------------------------------------

--
-- Table structure for table `DefaultRuleBaseForOne`
--

CREATE TABLE IF NOT EXISTS `DefaultRuleBaseForOne` (
  `Serial` int(10) DEFAULT NULL,
  `ConsequenceVal1` double DEFAULT NULL,
  `ConsequenceVal2` double DEFAULT NULL,
  `ConsequenceVal3` double DEFAULT NULL,
  `ConsequenceVal4` double DEFAULT NULL,
  `ConsequenceVal5` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DefaultRuleBaseForTwo`
--

CREATE TABLE IF NOT EXISTS `DefaultRuleBaseForTwo` (
  `Serial` int(11) DEFAULT NULL,
  `ConsequenceVal1` double DEFAULT NULL,
  `ConsequenceVal2` double DEFAULT NULL,
  `ConsequenceVal3` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RuleBaseForFive`
--

CREATE TABLE IF NOT EXISTS `RuleBaseForFive` (
  `Serial` int(3) DEFAULT NULL,
  `RuleWeight` double DEFAULT NULL,
  `Antecedent1` varchar(50) DEFAULT NULL,
  `Antecedent1RefTitle` varchar(50) DEFAULT NULL,
  `Antecedent2` varchar(50) DEFAULT NULL,
  `Antecedent2RefTitle` varchar(50) DEFAULT NULL,
  `Antecedent3` varchar(50) DEFAULT NULL,
  `Antecedent3RefTitle` varchar(50) DEFAULT NULL,
  `Antecedent4` varchar(50) DEFAULT NULL,
  `Antecedent4RefTitle` varchar(50) DEFAULT NULL,
  `Antecedent5` varchar(50) DEFAULT NULL,
  `Antecedent5RefTitle` varchar(50) DEFAULT NULL,
  `Consequence` varchar(50) DEFAULT NULL,
  `ConsequenceVal1` float DEFAULT NULL,
  `ConsequenceVal2` float DEFAULT NULL,
  `ConsequenceVal3` float DEFAULT NULL,
  `MatchingDegree` float DEFAULT NULL,
  `ActivationWeight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RuleBaseForFive`
--

INSERT INTO `RuleBaseForFive` (`Serial`, `RuleWeight`, `Antecedent1`, `Antecedent1RefTitle`, `Antecedent2`, `Antecedent2RefTitle`, `Antecedent3`, `Antecedent3RefTitle`, `Antecedent4`, `Antecedent4RefTitle`, `Antecedent5`, `Antecedent5RefTitle`, `Consequence`, `ConsequenceVal1`, `ConsequenceVal2`, `ConsequenceVal3`, `MatchingDegree`, `ActivationWeight`) VALUES
(0, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 1, 0, 0, 0, 0),
(1, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9815, 0.0185, 0, 0, 0),
(2, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.963, 0.037, 0, 0, 0),
(3, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9815, 0.0185, 0, 0, 0),
(4, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.963, 0.037, 0, 0, 0),
(5, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9444, 0.0556, 0, 0, 0),
(6, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(7, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(8, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(9, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.0741, 0.9259, 0, 0, 0),
(10, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.0556, 0.9444, 0, 0, 0),
(11, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.037, 0.963, 0, 0, 0),
(12, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.0556, 0.9444, 0, 0, 0),
(13, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.037, 0.963, 0, 0, 0),
(14, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.0185, 0.9815, 0, 0, 0),
(15, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(16, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(17, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(18, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1481, 0.8519, 0, 0),
(19, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.1296, 0.8704, 0, 0),
(20, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.1111, 0.8889, 0, 0),
(21, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.1296, 0.8704, 0, 0),
(22, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.1111, 0.8889, 0, 0),
(23, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0926, 0.9074, 0, 0),
(24, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(25, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(26, 1, 'X8', 'Severe', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(27, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.9815, 0.0185, 0, 0, 0),
(28, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.963, 0.037, 0, 0, 0),
(29, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9444, 0.0556, 0, 0, 0),
(30, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(31, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(32, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(33, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(34, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(35, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(36, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.0556, 0.9444, 0, 0, 0),
(37, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.037, 0.963, 0, 0, 0),
(38, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.0185, 0.9815, 0, 0, 0),
(39, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(40, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(41, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(42, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(43, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(44, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(45, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1296, 0.8704, 0, 0),
(46, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.1111, 0.8889, 0, 0),
(47, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0926, 0.9074, 0, 0),
(48, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(49, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(50, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(51, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(52, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(53, 1, 'X8', 'Severe', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(54, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(55, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(56, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(57, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(58, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(59, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(60, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(61, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(62, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(63, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(64, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(65, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(66, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(67, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(68, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(69, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(70, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(71, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(72, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(73, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(74, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(75, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(76, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(77, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(78, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(79, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(80, 1, 'X8', 'Severe', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(81, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.9815, 0.0185, 0, 0, 0),
(82, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.963, 0.037, 0, 0, 0),
(83, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9444, 0.0556, 0, 0, 0),
(84, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(85, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(86, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(87, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(88, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(89, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(90, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.0556, 0.9444, 0, 0, 0),
(91, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.037, 0.963, 0, 0, 0),
(92, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.0185, 0.9815, 0, 0, 0),
(93, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(94, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(95, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(96, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(97, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(98, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(99, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1296, 0.8704, 0, 0),
(100, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.1111, 0.8889, 0, 0),
(101, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0926, 0.9074, 0, 0),
(102, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(103, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(104, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(105, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(106, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(107, 1, 'X8', 'Average', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(108, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(109, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(110, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(111, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(112, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(113, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(114, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(115, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(116, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(117, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(118, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(119, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(120, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(121, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(122, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(123, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(124, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(125, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(126, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(127, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(128, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(129, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(130, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(131, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(132, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(133, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(134, 1, 'X8', 'Average', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(135, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(136, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(137, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(138, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(139, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(140, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(141, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9074, 0.0926, 0, 0, 0),
(142, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.8889, 0.1111, 0, 0, 0),
(143, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8704, 0.1296, 0, 0, 0),
(144, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(145, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(146, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(147, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(148, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(149, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(150, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.9815, 0.0185, 0, 0),
(151, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.963, 0.037, 0, 0),
(152, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.9444, 0.0556, 0, 0),
(153, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(154, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(155, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(156, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(157, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(158, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(159, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0556, 0.9444, 0, 0),
(160, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.037, 0.963, 0, 0),
(161, 1, 'X8', 'Average', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.0185, 0.9815, 0, 0),
(162, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.963, 0.037, 0, 0, 0),
(163, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9444, 0.0556, 0, 0, 0),
(164, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9259, 0.0741, 0, 0, 0),
(165, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(166, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(167, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(168, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(169, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(170, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(171, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.037, 0.963, 0, 0, 0),
(172, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.0185, 0.9815, 0, 0, 0),
(173, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 1, 0, 0, 0),
(174, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(175, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(176, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(177, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(178, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(179, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(180, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.1111, 0.8889, 0, 0),
(181, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0926, 0.9074, 0, 0),
(182, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0741, 0.9259, 0, 0),
(183, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(184, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(185, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(186, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(187, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(188, 1, 'X8', 'Low', 'X9', 'High', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(189, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.9444, 0.0556, 0, 0, 0),
(190, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9259, 0.0741, 0, 0, 0),
(191, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.9074, 0.0926, 0, 0, 0),
(192, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(193, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(194, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(195, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.9074, 0.0926, 0, 0, 0),
(196, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.8889, 0.1111, 0, 0, 0),
(197, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8704, 0.1296, 0, 0, 0),
(198, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.0185, 0.9815, 0, 0, 0),
(199, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 1, 0, 0, 0),
(200, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.9815, 0.0185, 0, 0),
(201, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(202, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(203, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(204, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.9815, 0.0185, 0, 0),
(205, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.963, 0.037, 0, 0),
(206, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.9444, 0.0556, 0, 0),
(207, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.0926, 0.9074, 0, 0),
(208, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0741, 0.9259, 0, 0),
(209, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.0556, 0.9444, 0, 0),
(210, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(211, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(212, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(213, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.0556, 0.9444, 0, 0),
(214, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.037, 0.963, 0, 0),
(215, 1, 'X8', 'Low', 'X9', 'Medium', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.0185, 0.9815, 0, 0),
(216, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0.9259, 0.0741, 0, 0, 0),
(217, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0.9074, 0.0926, 0, 0, 0),
(218, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0.8889, 0.1111, 0, 0, 0),
(219, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0.9074, 0.0926, 0, 0, 0),
(220, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0.8889, 0.1111, 0, 0, 0),
(221, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0.8704, 0.1296, 0, 0, 0),
(222, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0.8889, 0.1111, 0, 0, 0),
(223, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0.8704, 0.1296, 0, 0, 0),
(224, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'High Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0.8519, 0.1481, 0, 0, 0),
(225, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 1, 0, 0, 0),
(226, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.9815, 0.0185, 0, 0),
(227, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.963, 0.037, 0, 0),
(228, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.9815, 0.0185, 0, 0),
(229, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.963, 0.037, 0, 0),
(230, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.9444, 0.0556, 0, 0),
(231, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.963, 0.037, 0, 0),
(232, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.9444, 0.0556, 0, 0),
(233, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Medium Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0.9259, 0.0741, 0, 0),
(234, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'High', 'X7', 0, 0.0741, 0.9259, 0, 0),
(235, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Medium', 'X7', 0, 0.0556, 0.9444, 0, 0),
(236, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Terrain', 'X12', 'Low', 'X7', 0, 0.037, 0.963, 0, 0),
(237, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'High', 'X7', 0, 0.0556, 0.9444, 0, 0),
(238, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Medium', 'X7', 0, 0.037, 0.963, 0, 0),
(239, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Average', 'X12', 'Low', 'X7', 0, 0.0185, 0.9815, 0, 0),
(240, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'High', 'X7', 0, 0.037, 0.963, 0, 0),
(241, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Medium', 'X7', 0, 0.0185, 0.9815, 0, 0),
(242, 1, 'X8', 'Low', 'X9', 'Low', 'X10', 'Low Overflow', 'X11', 'Flat', 'X12', 'Low', 'X7', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RuleBaseForFour`
--

CREATE TABLE IF NOT EXISTS `RuleBaseForFour` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Antecedent3` varchar(50) NOT NULL,
  `Antecedent3RefTitle` varchar(50) NOT NULL,
  `Antecedent4` varchar(50) NOT NULL,
  `Antecedent4RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RuleBaseForOne`
--

CREATE TABLE IF NOT EXISTS `RuleBaseForOne` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `AttributeWeight` float NOT NULL,
  `Antecedent` varchar(50) NOT NULL,
  `AntecedentRefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL,
  `ConsequenceVal4` float DEFAULT NULL,
  `ConsequenceVal5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RuleBaseForThree`
--

CREATE TABLE IF NOT EXISTS `RuleBaseForThree` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Antecedent3` varchar(50) NOT NULL,
  `Antecedent3RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL,
  `MatchingDegree` float DEFAULT NULL,
  `ActivationWeight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RuleBaseForThree`
--

INSERT INTO `RuleBaseForThree` (`Serial`, `RuleWeight`, `Antecedent1`, `Antecedent1RefTitle`, `Antecedent2`, `Antecedent2RefTitle`, `Antecedent3`, `Antecedent3RefTitle`, `Consequence`, `ConsequenceVal1`, `ConsequenceVal2`, `ConsequenceVal3`, `MatchingDegree`, `ActivationWeight`) VALUES
(0, 1, 'X19', 'Clayey', 'X20', 'High', 'X21', 'Highly Permeable', 'X9', 1, 0, 0, 0, 0),
(1, 1, 'X19', 'Clayey', 'X20', 'High', 'X21', 'Average Permeable', 'X9', 0.9545, 0.0455, 0, 0, 0),
(2, 1, 'X19', 'Clayey', 'X20', 'High', 'X21', 'Low Permeable', 'X9', 0.9091, 0.0909, 0, 0, 0),
(3, 1, 'X19', 'Clayey', 'X20', 'Medium', 'X21', 'Highly Permeable', 'X9', 0.0909, 0.9091, 0, 0, 0),
(4, 1, 'X19', 'Clayey', 'X20', 'Medium', 'X21', 'Average Permeable', 'X9', 0.0455, 0.9545, 0, 0, 0),
(5, 1, 'X19', 'Clayey', 'X20', 'Medium', 'X21', 'Low Permeable', 'X9', 0, 1, 0, 0, 0),
(6, 1, 'X19', 'Clayey', 'X20', 'Low', 'X21', 'Highly Permeable', 'X9', 0, 0.1818, 0.8182, 0, 0),
(7, 1, 'X19', 'Clayey', 'X20', 'Low', 'X21', 'Average Permeable', 'X9', 0, 0.1364, 0.8636, 0, 0),
(8, 1, 'X19', 'Clayey', 'X20', 'Low', 'X21', 'Low Permeable', 'X9', 0, 0.0909, 0.9091, 0, 0),
(9, 1, 'X19', 'Coarse', 'X20', 'High', 'X21', 'Highly Permeable', 'X9', 0.9545, 0.0455, 0, 0, 0),
(10, 1, 'X19', 'Coarse', 'X20', 'High', 'X21', 'Average Permeable', 'X9', 0.9091, 0.0909, 0, 0, 0),
(11, 1, 'X19', 'Coarse', 'X20', 'High', 'X21', 'Low Permeable', 'X9', 0.8636, 0.1364, 0, 0, 0),
(12, 1, 'X19', 'Coarse', 'X20', 'Medium', 'X21', 'Highly Permeable', 'X9', 0.0455, 0.9545, 0, 0, 0),
(13, 1, 'X19', 'Coarse', 'X20', 'Medium', 'X21', 'Average Permeable', 'X9', 0, 1, 0, 0, 0),
(14, 1, 'X19', 'Coarse', 'X20', 'Medium', 'X21', 'Low Permeable', 'X9', 0, 0.9545, 0.0455, 0, 0),
(15, 1, 'X19', 'Coarse', 'X20', 'Low', 'X21', 'Highly Permeable', 'X9', 0, 0.1364, 0.8636, 0, 0),
(16, 1, 'X19', 'Coarse', 'X20', 'Low', 'X21', 'Average Permeable', 'X9', 0, 0.0909, 0.9091, 1, 1),
(17, 1, 'X19', 'Coarse', 'X20', 'Low', 'X21', 'Low Permeable', 'X9', 0, 0.0455, 0.9545, 0, 0),
(18, 1, 'X19', 'Rock', 'X20', 'High', 'X21', 'Highly Permeable', 'X9', 0.9091, 0.0909, 0, 0, 0),
(19, 1, 'X19', 'Rock', 'X20', 'High', 'X21', 'Average Permeable', 'X9', 0.8636, 0.1364, 0, 0, 0),
(20, 1, 'X19', 'Rock', 'X20', 'High', 'X21', 'Low Permeable', 'X9', 0.8182, 0.1818, 0, 0, 0),
(21, 1, 'X19', 'Rock', 'X20', 'Medium', 'X21', 'Highly Permeable', 'X9', 0, 1, 0, 0, 0),
(22, 1, 'X19', 'Rock', 'X20', 'Medium', 'X21', 'Average Permeable', 'X9', 0, 0.9545, 0.0455, 0, 0),
(23, 1, 'X19', 'Rock', 'X20', 'Medium', 'X21', 'Low Permeable', 'X9', 0, 0.9091, 0.0909, 0, 0),
(24, 1, 'X19', 'Rock', 'X20', 'Low', 'X21', 'Highly Permeable', 'X9', 0, 0.0909, 0.9091, 0, 0),
(25, 1, 'X19', 'Rock', 'X20', 'Low', 'X21', 'Average Permeable', 'X9', 0, 0.0455, 0.9545, 0, 0),
(26, 1, 'X19', 'Rock', 'X20', 'Low', 'X21', 'Low Permeable', 'X9', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RuleBaseForTwo`
--

CREATE TABLE IF NOT EXISTS `RuleBaseForTwo` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL,
  `MatchingDegree` float DEFAULT NULL,
  `ActivationWeight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RuleBaseForTwo`
--

INSERT INTO `RuleBaseForTwo` (`Serial`, `RuleWeight`, `Antecedent1`, `Antecedent1RefTitle`, `Antecedent2`, `Antecedent2RefTitle`, `Consequence`, `ConsequenceVal1`, `ConsequenceVal2`, `ConsequenceVal3`, `MatchingDegree`, `ActivationWeight`) VALUES
(0, 1, 'X22', 'High', 'X23', 'High', 'X8', 1, 0, 0, 0, 0),
(1, 1, 'X22', 'High', 'X23', 'Medium', 'X8', 0.8333, 0.1667, 0, 0, 0),
(2, 1, 'X22', 'High', 'X23', 'Low', 'X8', 0.6667, 0.3333, 0, 0, 0),
(3, 1, 'X22', 'Medium', 'X23', 'High', 'X8', 0.1667, 0.8333, 0, 0, 0),
(4, 1, 'X22', 'Medium', 'X23', 'Medium', 'X8', 0, 1, 0, 0, 0),
(5, 1, 'X22', 'Medium', 'X23', 'Low', 'X8', 0, 0.8333, 0.1667, 0, 0),
(6, 1, 'X22', 'Low', 'X23', 'High', 'X8', 0, 0.3333, 0.6667, 0, 0),
(7, 1, 'X22', 'Low', 'X23', 'Medium', 'X8', 0, 0.1667, 0.8333, 0, 0),
(8, 1, 'X22', 'Low', 'X23', 'Low', 'X8', 0, 0, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
