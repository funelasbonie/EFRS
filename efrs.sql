-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 07:43 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `ADMIN_ID` varchar(50) NOT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `CONTACT_NUM` int(11) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`ADMIN_ID`, `FIRSTNAME`, `LASTNAME`, `CONTACT_NUM`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
('AD001', 'Juan', 'Dela Cruz', 9123, 'juandelacruz@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CUST_ID` varchar(50) DEFAULT NULL,
  `ITEM_ID` varchar(50) DEFAULT NULL,
  `ITEM_NAME` varchar(50) DEFAULT NULL,
  `ITEM_IMAGE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CUST_ID`, `ITEM_ID`, `ITEM_NAME`, `ITEM_IMAGE`) VALUES
('5e5ef71c94537', '1000001', 'Epson 12312', 'images/product/epson001.jpg'),
('5e5ef7832407f', '1000002', 'Acer 1231', 'images/product/epson001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ITEM_ID` varchar(50) NOT NULL,
  `ITEM_NAME` varchar(70) DEFAULT NULL,
  `ITEM_TYPE` varchar(10) DEFAULT NULL,
  `ITEM_BRAND` varchar(10) DEFAULT NULL,
  `ITEM_STATUS` varchar(10) DEFAULT NULL,
  `ITEM_IMAGE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ITEM_ID`, `ITEM_NAME`, `ITEM_TYPE`, `ITEM_BRAND`, `ITEM_STATUS`, `ITEM_IMAGE`) VALUES
('1000001', 'Epson 12312', 'TYP0001', 'Epson', 'NOT AVA', 'images/product/epson001.jpg'),
('1000002', 'Acer 1231', 'TYP0001', 'Acer', 'NOT AVA', 'images/product/epson001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_brand`
--

CREATE TABLE `item_brand` (
  `BRAND_ID` varchar(50) NOT NULL,
  `BRAND_NAME` varchar(50) DEFAULT NULL,
  `BRAND_CODE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `TYPE_ID` varchar(50) NOT NULL,
  `TYPE_NAME` varchar(50) DEFAULT NULL,
  `TYPE_CODE` varchar(50) DEFAULT NULL,
  `TYPE_IMAGE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`TYPE_ID`, `TYPE_NAME`, `TYPE_CODE`, `TYPE_IMAGE`) VALUES
('TYP0001', 'Printer', 'PRI', 'images/png/004-printer.png'),
('TYP0002', 'Speaker', 'SPE', 'images/png/009-speaker.png'),
('TYP0003', 'Projector', 'PRO', 'images/png/016-action-camera.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ITEM_ID` varchar(50) DEFAULT NULL,
  `CUST_ID` varchar(50) DEFAULT NULL,
  `CUST_NAME` varchar(50) DEFAULT NULL,
  `CUST_DEPARTMENT` varchar(50) DEFAULT NULL,
  `CUST_EMAIL` varchar(50) DEFAULT NULL,
  `CUST_CONTACT` varchar(50) DEFAULT NULL,
  `BORROW_DATE` varchar(50) DEFAULT NULL,
  `RETURN_DATE` varchar(50) DEFAULT NULL,
  `RES_STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ITEM_ID`, `CUST_ID`, `CUST_NAME`, `CUST_DEPARTMENT`, `CUST_EMAIL`, `CUST_CONTACT`, `BORROW_DATE`, `RETURN_DATE`, `RES_STATUS`) VALUES
('1000001', '5e5ef71c94537', 'Bonie', 'Cite', 'funelas@yahoo.com', '123', '2020-03-04', '2020-03-06', 'RES'),
('1000002', '5e5ef7832407f', 'Bonie funelas', 'Cite', 'funelas@yahoo.com', '123', '2020-03-13', '2020-03-13', 'RES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ITEM_ID`);

--
-- Indexes for table `item_brand`
--
ALTER TABLE `item_brand`
  ADD PRIMARY KEY (`BRAND_ID`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`TYPE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
