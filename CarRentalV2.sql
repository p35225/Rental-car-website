-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2018 at 01:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CarRentalV2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_newcode` (IN `discount` INT(20), IN `Ncode` TEXT, IN `describe_T` TEXT)  NO SQL
BEGIN

IF(checkNumeric(discount)) THEN
	IF(DEACTIVECODE()) THEN
  		INSERT INTO `PROMOTION` (`PROMOTION`, `ACTIVE`, `DISCOUNT`, `Description`) VALUES (Ncode, '1', discount, describe_T);

	END IF;

END IF;   

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `checkNumeric` (`discount` INT) RETURNS INT(11) NO SQL
BEGIN

IF 0<discount<=50 THEN
	RETURN 1;
ELSE
	RETURN 0;
END IF;    
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `DEACTIVECODE` () RETURNS INT(11) NO SQL
BEGIN

UPDATE PROMOTION SET `ACTIVE` = 0 WHERE PROMOTION.ACTIVE = 1;

RETURN 1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `PERSONAL_ID` bigint(50) NOT NULL,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `SEX` varchar(1) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `PHONE` int(10) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`USERNAME`, `PASSWORD`, `PERSONAL_ID`, `BRANCH_ID`, `FIRST_NAME`, `LAST_NAME`, `SEX`, `ADDRESS`, `PHONE`, `DATE_OF_BIRTH`) VALUES
('HAMANO', '12345678', 3747584327048, 1, 'HAMANI', 'HIHI', 'M', 'Cecilia Chapman\r\n711-2880 Nulla St.\r\nMankato Mississippi', 257563740, '1990-08-02'),
('HING', '12345678', 2343284327048, 2, 'HING', 'NGUSWAD', 'M', 'Calista Wise\r\n7292 Dictum Av.\r\nSan Antonio MI 47096', 862356186, '1988-07-17'),
('HUGO', '924792348', 1393857928378, 2, 'HUGO', 'HOGU', 'M', 'Aaron Hawkins\r\n5587 Nunc. Avenue\r\nErie Rhode Island 24975', 862381329, '1972-10-11'),
('MEMEM', '97635923', 29475672919982, 4, 'MANEE', 'MEENA', 'F', 'Hiroko Potter\r\nP.O. Box 887 2508 Dolor. Av.\r\nMuskegon KY 12482', 872643728, '1987-11-08'),
('SILVER', '9876523', 98546372817234, 3, 'PRAYA', 'PUNYA', 'M', 'Forrest Ray\r\n191-103 Integer Rd.\r\nCorona New Mexico 08219', 257564345, '1982-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_NAME` varchar(200) NOT NULL,
  `COUNTRY` varchar(200) NOT NULL,
  `CITY` varchar(200) NOT NULL,
  `B_ADDRESS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`BRANCH_ID`, `BRANCH_NAME`, `COUNTRY`, `CITY`, `B_ADDRESS`) VALUES
(1, 'Saki Vietnam', 'Vietnam', 'Hanoi', '5F Gami Group Building,Vietnam 11 Pham Hung St. Tu Liem Dist'),
(2, 'Saki Japan', 'Japan', 'Fukuoka', '2-6-16, Hanmichibashi,Hakata-KU,Fukuoka City,812-0897'),
(3, 'Saki China', ' China', 'Beijing', 'Beside Weast of Aomen Center,(Meet & Greet)'),
(4, 'Saki Dubai', 'Dubai', 'United Arab Emirates', 'Arrivals Terminal 1,Dubai,United Arab Emirates');

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `CAR_BRAND_ID` int(11) NOT NULL,
  `BRAND` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`CAR_BRAND_ID`, `BRAND`) VALUES
(1, 'TOYOTA'),
(2, 'HONDA'),
(3, 'BENZ'),
(4, 'BMW'),
(5, 'NISSAN'),
(6, 'LAMBORGHINI'),
(7, 'Ferrari'),
(8, 'McLaren'),
(9, 'HYUNDAI'),
(10, 'Land Rover'),
(11, 'MAZDA'),
(12, 'LEXUS');

-- --------------------------------------------------------

--
-- Table structure for table `Car`
--

CREATE TABLE `Car` (
  `CAR_ID` int(11) NOT NULL,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `MODEL_ID` int(11) NOT NULL,
  `CAR_BRAND_ID` int(11) NOT NULL,
  `CAR_TYPE_ID` int(11) NOT NULL,
  `AVAILABLE` tinyint(1) NOT NULL,
  `MAINTENANCE_STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Car`
--

INSERT INTO `Car` (`CAR_ID`, `BRANCH_ID`, `MODEL_ID`, `CAR_BRAND_ID`, `CAR_TYPE_ID`, `AVAILABLE`, `MAINTENANCE_STATUS`) VALUES
(2, 1, 1, 11, 1, 0, 0),
(3, 1, 1, 11, 1, 1, 0),
(4, 1, 2, 2, 1, 0, 0),
(5, 1, 3, 1, 1, 1, 0),
(6, 1, 4, 1, 2, 0, 0),
(7, 1, 5, 2, 2, 0, 0),
(8, 1, 6, 5, 2, 1, 0),
(9, 1, 7, 3, 3, 1, 0),
(10, 1, 7, 3, 3, 1, 0),
(11, 2, 1, 11, 1, 0, 0),
(12, 1, 13, 6, 5, 1, 0),
(13, 1, 13, 6, 5, 1, 0),
(14, 4, 1, 11, 1, 0, 0),
(15, 4, 1, 11, 1, 1, 0),
(16, 2, 4, 1, 2, 1, 0),
(17, 2, 4, 1, 2, 1, 0),
(18, 2, 2, 2, 1, 1, 0),
(19, 2, 3, 1, 1, 0, 0),
(20, 2, 3, 1, 1, 1, 0),
(21, 2, 3, 1, 1, 1, 0),
(22, 2, 3, 1, 1, 1, 0),
(23, 1, 13, 6, 5, 1, 0),
(24, 1, 5, 2, 2, 1, 0),
(25, 1, 1, 1, 1, 1, 0),
(26, 1, 1, 1, 1, 1, 0),
(27, 1, 8, 4, 3, 1, 0),
(28, 2, 4, 1, 2, 1, 0),
(29, 1, 4, 1, 2, 0, 0),
(30, 1, 2, 2, 1, 1, 0),
(31, 1, 1, 1, 1, 1, 0),
(32, 1, 1, 1, 1, 1, 0),
(33, 1, 1, 1, 1, 1, 0),
(34, 1, 1, 1, 1, 1, 0),
(35, 1, 1, 1, 1, 1, 0),
(36, 1, 1, 1, 1, 1, 0),
(37, 1, 2, 2, 1, 1, 0),
(38, 1, 1, 1, 1, 1, 0),
(39, 1, 1, 1, 1, 1, 0),
(40, 1, 1, 1, 1, 1, 0),
(41, 1, 1, 1, 1, 1, 0),
(42, 1, 1, 1, 1, 1, 0),
(43, 1, 1, 1, 1, 1, 0),
(44, 1, 1, 1, 1, 1, 0),
(45, 1, 1, 1, 1, 1, 0),
(46, 1, 1, 1, 1, 1, 0),
(47, 1, 1, 1, 1, 1, 0),
(48, 1, 4, 1, 2, 1, 0),
(49, 1, 4, 1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `CarType`
--

CREATE TABLE `CarType` (
  `CAR_TYPE_ID` int(11) NOT NULL,
  `TYPENAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CarType`
--

INSERT INTO `CarType` (`CAR_TYPE_ID`, `TYPENAME`) VALUES
(1, 'ECO CAR'),
(2, 'BUSINESS CAR'),
(3, 'LUXURY CAR'),
(4, 'VAN'),
(5, 'HYPER CAR'),
(6, 'OFF ROAD');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `PERSONAL_ID` bigint(13) DEFAULT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `SEX` varchar(1) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `PHONE` int(10) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `CREDITCARD` int(16) NOT NULL DEFAULT '0',
  `CLIENT_STATUS` tinyint(1) DEFAULT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`PERSONAL_ID`, `FIRST_NAME`, `LAST_NAME`, `SEX`, `ADDRESS`, `PHONE`, `DATE_OF_BIRTH`, `CREDITCARD`, `CLIENT_STATUS`, `USERNAME`, `PASSWORD`) VALUES
(23909840203923, 'ACOCO', 'HENAS', 'F', 'Adria Russell\r\n414-7533 Non Rd.\r\nMiami Beach North Dakota 58563', 348923023, '1976-07-11', 0, 0, 'ACACO', '943403493'),
(3747584327048, 'Supanut', 'Gdra', 'M', ' Tubma  maung  Pattaya', 2147483647, '1932-12-22', 0, 1, 'beesbes', '123456'),
(9238920321023, 'Hack2zc', 'Devas', 'M', '18/1 Trad  Thailand', 873249242, '1992-08-02', 0, 1, 'Hack', '123456'),
(NULL, 'HAMADA', 'YOSHIKI', 'M', 'Hamada land vr doll japan', 86328439, '1985-11-15', 0, 0, 'HAMADA', '123456'),
(9238920321023, 'SIlver', 'Service', 'M', 'Moji saka Bangkok Thailanf', 872644528, '1992-08-12', 0, 1, 'Hiler', '123456'),
(95439320343223, 'LICADO', 'KERUS', 'M', 'Adria Russell\r\n414-7533 Non Rd.\r\nMiami Beach North Dakota 58563', 90404023, '1982-11-16', 0, 0, 'LIGO', '343055435423'),
(788987786577, 'Makanov2', 'russia', 'M', ' Tubma  maung Trrad', 918827454, '1959-11-15', 0, 1, 'Makanov', '123456'),
(1292038492092, 'ANACODO', 'BINGO', 'M', 'Bryar Pitts\r\n5543 Aliquet St.\r\nFort Dodge GA 20783\r\n(717) 450-4729', 832792321, '1978-08-07', 0, 0, 'NANOFIBER', '93247230523'),
(1393857928378, 'NINDO', 'NANO', 'M', 'Melvin Porter\r\nP.O. Box 132 1599 Curabitur Rd.\r\nBandera South Dakota 45149', 723823822, '1991-10-09', 0, 1, 'NINDO', '124902342'),
(NULL, 'sam', '1', 'M', 'sam sam sam', 913288282, '0000-00-00', 0, 1, 'sam1', '123456'),
(2849281792012, 'NIPON', 'WAPO', 'M', 'Melvin Porter\r\nP.O. Box 132 1599 Curabitur Rd.\r\nBandera South Dakota 45149', 987228374, '1989-10-17', 0, 1, 'ZIPPO', '893489234');

-- --------------------------------------------------------

--
-- Table structure for table `MethodOfPayment`
--

CREATE TABLE `MethodOfPayment` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MethodOfPayment`
--

INSERT INTO `MethodOfPayment` (`TYPE_ID`, `TYPE_NAME`) VALUES
(1, 'CREDITCARD'),
(2, 'BANK TRANSFER'),
(3, 'CASH'),
(4, 'E-WALLET');

-- --------------------------------------------------------

--
-- Table structure for table `Model`
--

CREATE TABLE `Model` (
  `MODEL_ID` int(11) NOT NULL,
  `MODEL_NAME` varchar(100) NOT NULL,
  `Price` int(10) DEFAULT NULL,
  `CAR_TYPE_ID` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Model`
--

INSERT INTO `Model` (`MODEL_ID`, `MODEL_NAME`, `Price`, `CAR_TYPE_ID`, `img`) VALUES
(1, 'MAZDA2', 500, 1, 'images/mazda2.jpg'),
(2, 'JAZZ', 700, 1, 'images/Jazz.jpg'),
(3, 'YARIS', 700, 1, 'images/Yaris.jpg'),
(4, 'CAMRY', 1500, 2, 'images/Camry.jpg'),
(5, 'ACCORD', 1500, 2, 'images/Accord.jpg'),
(6, 'TEANA', 1400, 2, 'images/Teana.jpg'),
(7, 'BENZ C-CLASS', 2500, 3, 'images/Benz C-Class.jpg'),
(8, 'BMW series3', 2500, 3, 'images/BMW series3.jpg'),
(9, 'ES', 2200, 3, 'images/ES.jpg'),
(10, 'Alphard', 3200, 4, 'images/Alphard.jpg'),
(11, 'H-1', 3000, 4, 'images/H1.jpg'),
(12, 'Odyssey', 3100, 4, 'images/Odyssey.jpg'),
(13, 'Aventador', 23000, 5, 'images/Aventador.jpg'),
(14, '488 GTB', 25000, 5, 'images/488GTB.jpg'),
(15, '600LT', 26000, 5, 'images/600LT.jpg'),
(16, 'BENZ G-CLASS', 7000, 6, 'images/Benz G-Class.jpg'),
(17, 'HSE', 6500, 6, 'images/HSE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `PROMOTION`
--

CREATE TABLE `PROMOTION` (
  `PROMOTION` varchar(16) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  `DISCOUNT` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROMOTION`
--

INSERT INTO `PROMOTION` (`PROMOTION`, `ACTIVE`, `DISCOUNT`, `Description`) VALUES
('1232', 0, 20, 'kmsvdd'),
('30DISNOV', 0, 30, 'Hurry 30 discount only 1 day'),
('DIS12DEC', 0, 14, 'ds'),
('DIS12NOV', 0, 12, 'DiSCOUNT IN NOVEMBER MONTH 12%'),
('DIS12NOVE', 0, 12, 'dssd'),
('DIS15Apr', 0, 15, 'Discount 15% '),
('DIS15DEC', 0, 15, ''),
('DIS15FEB', 0, 15, ''),
('DIS15JAN', 0, 15, ''),
('DIS15Mar', 0, 15, ''),
('DIS15NOV18', 1, 15, 'Now Discount 15 % Hurry!'),
('DIS15OCT', 0, 15, 'Pay now save up to 15%'),
('Dis172018', 0, 20, 'Discount Heloo new year'),
('fdkflslflfskl', 0, 20, 'lk;l'),
('klkk', 0, 15, 'nlnlkhnlk'),
('klkllk', 0, 15, 'nlnlkhnlk'),
('NDS15DIS', 0, 15, 'Just only 1 day'),
('NEW25DISNOV', 0, 25, 'Happy discount 25% just 1 day'),
('test', 0, 20, '-');

-- --------------------------------------------------------

--
-- Table structure for table `Rent`
--

CREATE TABLE `Rent` (
  `RENTAL_ID` int(11) NOT NULL,
  `BRANCH_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `PAYTYPE_ID` int(11) NOT NULL,
  `START_DATE_RENT` date NOT NULL,
  `END_DATE_RENT` date NOT NULL,
  `PROMOTION` varchar(50) DEFAULT NULL,
  `TOTAL_PRICE` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rent`
--

INSERT INTO `Rent` (`RENTAL_ID`, `BRANCH_ID`, `USERNAME`, `CAR_ID`, `PAYTYPE_ID`, `START_DATE_RENT`, `END_DATE_RENT`, `PROMOTION`, `TOTAL_PRICE`) VALUES
(2, 1, 'ACACO', 2, 3, '2018-10-23', '2018-10-25', 'DIS15OCT', 1500),
(3, 1, 'LIGO', 4, 2, '2018-10-22', '2018-10-26', NULL, 1200),
(4, 4, 'NINDO', 14, 3, '2018-10-09', '2018-10-27', NULL, 1700),
(5, 2, 'ZIPPO', 11, 3, '2018-10-03', '2018-10-26', NULL, 1800),
(6, 1, 'NANOFIBER', 8, 2, '2018-11-08', '2018-11-12', NULL, 1900),
(15, 1, 'Hack', 6, 1, '2018-11-09', '2018-11-12', NULL, 2500),
(16, 1, 'beesbes', 3, 1, '2018-11-10', '2018-11-15', NULL, 3200),
(17, 1, 'Hiler', 7, 2, '2018-11-17', '2018-11-23', NULL, 2400),
(18, 2, 'Hack', 19, 1, '2018-11-20', '2018-11-22', NULL, 0),
(19, 1, 'Hack', 2, 2, '2018-11-27', '2018-11-30', NULL, 0),
(20, 1, 'Hack', 2, 1, '2018-11-22', '2018-11-29', NULL, 0),
(21, 1, 'LIGO', 9, 1, '2018-11-20', '2018-11-22', '30DISNOV', 1500),
(22, 1, 'beesbes', 2, 1, '2018-11-24', '2018-11-28', 'DIS15NOV18', 0),
(23, 2, 'HAMADA', 20, 3, '2018-11-25', '2018-11-30', '30DISNOV', 1200),
(24, 1, 'Hack', 6, 2, '2018-11-24', '2018-11-25', 'DIS15NOV18', 0),
(25, 1, 'Makanov', 4, 1, '2018-11-24', '2018-11-28', 'DIS15NOV18', 0),
(26, 1, 'Hiler', 7, 2, '2018-11-24', '2018-11-25', 'DIS15NOV18', 0),
(27, 1, 'beesbes', 2, 1, '2018-11-24', '2018-11-27', 'DIS15NOV18', 0),
(28, 1, 'beesbes', 2, 2, '2018-11-24', '2018-11-29', 'DIS15NOV18', 0),
(29, 1, 'beesbes', 2, 1, '2018-11-24', '2018-11-30', 'DIS15NOV18', 0),
(30, 1, 'beesbes', 2, 1, '2018-11-24', '2018-11-30', NULL, 3500),
(31, 1, 'Makanov', 4, 1, '0000-00-00', '0000-00-00', 'DIS15NOV18', 3570),
(32, 1, 'sam1', 29, 1, '0000-00-00', '0000-00-00', 'DIS15NOV18', 1275);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`USERNAME`),
  ADD KEY `Admin_ibfk_1` (`BRANCH_ID`);

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`BRANCH_ID`);

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`CAR_BRAND_ID`);

--
-- Indexes for table `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`CAR_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`),
  ADD KEY `Car_ibfk_2` (`CAR_BRAND_ID`),
  ADD KEY `MODEL_ID` (`MODEL_ID`),
  ADD KEY `CAR_TYPE_ID` (`CAR_TYPE_ID`);

--
-- Indexes for table `CarType`
--
ALTER TABLE `CarType`
  ADD PRIMARY KEY (`CAR_TYPE_ID`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `MethodOfPayment`
--
ALTER TABLE `MethodOfPayment`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `Model`
--
ALTER TABLE `Model`
  ADD PRIMARY KEY (`MODEL_ID`),
  ADD KEY `CAR_TYPE_ID` (`CAR_TYPE_ID`);

--
-- Indexes for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD PRIMARY KEY (`PROMOTION`);

--
-- Indexes for table `Rent`
--
ALTER TABLE `Rent`
  ADD PRIMARY KEY (`RENTAL_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`),
  ADD KEY `USERNAME` (`USERNAME`),
  ADD KEY `CAR_ID` (`CAR_ID`),
  ADD KEY `PROMOTION` (`PROMOTION`),
  ADD KEY `PAYTYPE_ID` (`PAYTYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Branch`
--
ALTER TABLE `Branch`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `CAR_BRAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Car`
--
ALTER TABLE `Car`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `CarType`
--
ALTER TABLE `CarType`
  MODIFY `CAR_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `MethodOfPayment`
--
ALTER TABLE `MethodOfPayment`
  MODIFY `TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Model`
--
ALTER TABLE `Model`
  MODIFY `MODEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Rent`
--
ALTER TABLE `Rent`
  MODIFY `RENTAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`BRANCH_ID`) REFERENCES `Branch` (`BRANCH_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`BRANCH_ID`) REFERENCES `Branch` (`BRANCH_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_2` FOREIGN KEY (`CAR_BRAND_ID`) REFERENCES `Brand` (`CAR_BRAND_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_3` FOREIGN KEY (`CAR_TYPE_ID`) REFERENCES `CarType` (`CAR_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_4` FOREIGN KEY (`MODEL_ID`) REFERENCES `Model` (`MODEL_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_5` FOREIGN KEY (`CAR_TYPE_ID`) REFERENCES `CarType` (`CAR_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Model`
--
ALTER TABLE `Model`
  ADD CONSTRAINT `Model_ibfk_1` FOREIGN KEY (`CAR_TYPE_ID`) REFERENCES `CarType` (`CAR_TYPE_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Rent`
--
ALTER TABLE `Rent`
  ADD CONSTRAINT `Rent_ibfk_1` FOREIGN KEY (`BRANCH_ID`) REFERENCES `Branch` (`BRANCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Rent_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `Clients` (`USERNAME`),
  ADD CONSTRAINT `Rent_ibfk_3` FOREIGN KEY (`CAR_ID`) REFERENCES `Car` (`CAR_ID`),
  ADD CONSTRAINT `Rent_ibfk_4` FOREIGN KEY (`PROMOTION`) REFERENCES `PROMOTION` (`PROMOTION`),
  ADD CONSTRAINT `Rent_ibfk_5` FOREIGN KEY (`PAYTYPE_ID`) REFERENCES `MethodOfPayment` (`TYPE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
