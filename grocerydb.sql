-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 03:31 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grocery`
--
CREATE DATABASE IF NOT EXISTS `grocery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `grocery`;

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE IF NOT EXISTS `admininfo` (
  `AID` bigint(20) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `AdminPassword` varchar(30) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE IF NOT EXISTS `customerinfo` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `UserPassword` varchar(30) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `UserType` varchar(20) DEFAULT 'user',
  `CreatedOn` datetime DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`UID`, `UserName`, `Email`, `UserPassword`, `Mobile`, `UserType`, `CreatedOn`, `Address`) VALUES
(1, 'qw', 'asd@gmail.com', 'asd', '1234567890', 'user', NULL, NULL),
(12, 'zxc', 'mnkhiy@qwe.com', 'zxc', '0987654321', 'user', NULL, NULL),
(13, 'mnb', 'mnb@qwe.com', 'mnb', '4321098765', 'user', NULL, NULL),
(14, 'dxc', 'dxc@asd.com', 'dxc', '5432768912', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customerorders`
--

CREATE TABLE IF NOT EXISTS `customerorders` (
  `OID` bigint(20) NOT NULL AUTO_INCREMENT,
  `OrderNumber` bigint(20) DEFAULT NULL,
  `CustomerName` varchar(30) DEFAULT NULL,
  `CustomerEmail` varchar(50) DEFAULT NULL,
  `CustomerMobile` varchar(10) DEFAULT NULL,
  `CustomerAddress` varchar(100) DEFAULT NULL,
  `BillAmount` bigint(20) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `UID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `foodgrains`
--

CREATE TABLE IF NOT EXISTS `foodgrains` (
  `FID` int(10) NOT NULL AUTO_INCREMENT,
  `Foodgrains` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Quantity` varchar(20) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `foodgrains`
--

INSERT INTO `foodgrains` (`FID`, `Foodgrains`, `Price`, `Quantity`, `Image`) VALUES
(1, 'Rajgira Seeds', 125, '500g', 'ASSETS/Food grains/Rajgira seeds.jpg'),
(2, 'Bajra', 126, '2kg', 'ASSETS/Food grains/Bajra.jpg'),
(3, 'Barley', 25, '200g', 'ASSETS/Food grains/Barley.jpg'),
(4, 'Brown Rice', 25, '5kg', 'ASSETS/Food grains/Brown rice.jpg'),
(5, 'Rye', 450, '680gm', 'ASSETS/Food grains/Rye.jpg'),
(6, 'Jowar', 599, '5kg', 'ASSETS/Food grains/Jowar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE IF NOT EXISTS `fruits` (
  `FrID` int(10) NOT NULL AUTO_INCREMENT,
  `FruitName` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Quantity` varchar(20) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`FrID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`FrID`, `FruitName`, `Price`, `Quantity`, `Image`) VALUES
(1, 'Apple', 120, '4pcs', 'ASSETS/Fruits/Apple.jpg'),
(2, 'Banana', 49, '1kg', 'ASSETS/Fruits/Banana.jpg'),
(3, 'Grapes', 42, '500g', 'ASSETS/Fruits/Grapes.jpg'),
(4, 'Guava', 39, '500g', 'ASSETS/Fruits/Guava.jpg'),
(5, 'Pineapple', 64, '1pc', 'ASSETS/Fruits/Pineapple.jpg'),
(6, 'Watermelon', 62.17, '1pc', 'ASSETS/Fruits/Watermelon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE IF NOT EXISTS `snacks` (
  `SID` int(10) NOT NULL AUTO_INCREMENT,
  `SnackName` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Quantity` varchar(20) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`SID`, `SnackName`, `Price`, `Quantity`, `Image`) VALUES
(1, '50-50', 82.8, '300g', 'ASSETS/Snacks/5050.jpg'),
(2, 'Bourbon', 34, '150g', 'ASSETS/Snacks/Bourbon.jpg'),
(3, 'Dark Fantasy', 66.5, '150g', 'ASSETS/Snacks/Dark Fantasy.jpg'),
(4, 'Krack Jack', 10, '56.7g', 'ASSETS/Snacks/Krack Jack.jpg'),
(5, 'Parle G', 126, '1kg', 'ASSETS/Snacks/Parle g.jpg'),
(6, 'Raja jeera', 40, '250g', 'ASSETS/Snacks/Raja jeera.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `spices`
--

CREATE TABLE IF NOT EXISTS `spices` (
  `SpID` int(10) NOT NULL AUTO_INCREMENT,
  `SpicesName` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Quantity` varchar(20) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`SpID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `spices`
--

INSERT INTO `spices` (`SpID`, `SpicesName`, `Price`, `Quantity`, `Image`) VALUES
(1, 'Haldi', 64, '200g', 'ASSETS/Spices/Haldi.jpg'),
(2, 'Jeera', 114, '200g', 'ASSETS/Spices/Jeera.jpg'),
(3, 'Lavanga', 34, '200g', 'ASSETS/Spices/Laung.jpg'),
(4, 'Methi', 24, '250g', 'ASSETS/Spices/Methi.jpg'),
(5, 'Dry Coriander', 30, '200g', 'ASSETS/Spices/Sukhi dhanya.jpg'),
(6, 'Elaichi', 282, '100g', 'ASSETS/Spices/Elaichi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE IF NOT EXISTS `vegetable` (
  `VID` int(10) NOT NULL AUTO_INCREMENT,
  `VegetableName` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Quantity` varchar(20) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`VID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`VID`, `VegetableName`, `Price`, `Quantity`, `Image`) VALUES
(1, 'Lady Finger', 47, '1kg', 'ASSETS/Vegies/Bhindi.jpg'),
(2, 'Brinjal', 61.5, '1kg', 'ASSETS/Vegies/Brinjal.jpg'),
(3, 'Cauliflower', 40, '1pc', 'ASSETS/Vegies/Cauliflower.jpg'),
(4, 'Lauki', 20.5, '1pc', 'ASSETS/Vegies/Lauki.jpg'),
(5, 'Onion', 106, '5kg', 'ASSETS/Vegies/Onion.jpg'),
(6, 'Potato', 22.5, '1kg', 'ASSETS/Vegies/Potato.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
