-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 05, 2020 at 08:03 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b&b`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Email`, `ContactNumber`, `Password`) VALUES
(1, 'Weng Hoe', 'wenghoe@gmail.com', '012-6782320', '12345'),
(2, 'Koon Zhi Hin Erwin', 'erwin@gmail.com', '012-4561234', '12345'),
(3, 'Hong Ying', 'hongying@hotmail.com', '012-2314141', '12345'),
(4, 'Sze Cin', 'cincin1023@outlook.com', '016-8677278', '12345'),
(5, 'test', 'test@gmail.com', '012-3456789', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryType` char(20) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryType`) VALUES
(1, 'Laptop'),
(2, 'Keyboard'),
(3, 'Mouse'),
(4, 'Speaker');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Username` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Gender` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Username`, `Gender`, `Email`, `DOB`, `Address`, `ContactNumber`, `Password`) VALUES
(1, 'Test1', 'Test2', 'test', 'Male', 'test@gmail.com', '2020-07-06', 'No. 42 Lrg Raja Bot 50300 Wilayah Persekutuan 50300 Malaysia', '016-5550499', '12345678'),
(2, 'Sarah', 'Robinson', 'Sarah', 'Female', 'sarah@gmail.com', '2020-07-13', '152-7, Geosanhwanggungapateu, Dongseohak-dong, Wansan-gu Jeonju-si, Jeollabuk-do', '012-4206639 ', '12345678'),
(3, 'Wen', 'Han', 'Wen Han', 'Male', 'wenhan@gmail.com', '2020-03-09', '1 Pasar Besar Lama 270 Jln Hilir Pasar 15000 Kota Bharu Kota Bharu Kelantan 15000 Malaysia Kota Bhar', '012-2808168', '12345678'),
(4, 'Lmao', 'Yeet', 'Lmao', 'Male', 'lmao@gmail.com', '2001-01-01', '618 River Rd, Farmville, VA, 23901', '013-6649898', '12345678'),
(5, 'John', 'Baptist', 'John', 'Male', 'john@gmail.com', '2020-08-06', '78/K11 Cong Hoa Street Ward 4, Tan Binh District', '012-2079147', '12345678'),
(6, 'Kylo', 'Ren', 'raysbrother', 'Female', 'kyloren@yahoo.com', '1998-05-11', '113-1, Dongbaegapateu, Onsan-eup, Ulju-gun, Ulsan', '82-115-557446', '12345678'),
(7, 'Dwayne ', 'Johnson', 'therockbottom', 'Female', 'therockbottom@outlook.com', '1945-12-12', 'No. 30 Jln Ss14/5E Ss14 47500 47500 Malaysia', '03-79843540', '12345678'),
(8, 'I', 'PEED', 'ipeed', 'Female', 'ipeed@outlook.com', '1957-08-31', '11-33 Jalan Ibrahim 83000 Batu Pahat Johor Malaysia', '019-8989112', '12345678'),
(9, 'Kobe', 'Bryant', 'mamba4ever', 'Male', 'mamba@yahoo.com', '1989-08-24', 'Pasar Pudu Jln Pasar Baru 55100 Wilayah Persekutuan 55100 Malaysia', '018-2408248', '2408');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `Quantity` int(5) NOT NULL,
  `DeliveryStatus` char(20) NOT NULL,
  `OrderStatus` char(20) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `orders_ibfk_1` (`CustomerID`),
  KEY `orders_ibfk_2` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `ProductID`, `OrderDate`, `Quantity`, `DeliveryStatus`, `OrderStatus`) VALUES
(1, 2, 1, '2020-03-10', 1, 'Delivered', 'Paid'),
(2, 7, 2, '2020-01-14', 2, 'Delivered', 'Paid'),
(3, 2, 1, '2020-06-30', 5, 'Delivered', 'Paid'),
(4, 3, 2, '2020-08-19', 6, 'Not Delivered', 'Paid'),
(5, 5, 3, '2020-07-14', 8, 'Not Delivered', 'Paid'),
(6, 6, 3, '2020-01-06', 2, 'Not Delivered', 'Paid'),
(7, 4, 2, '2020-05-12', 3, 'Not Delivered', 'Paid'),
(8, 9, 7, '0000-00-00', 4, 'Not Delivered', 'Paid'),
(9, 5, 8, '0000-00-00', 10, 'Not Delivered', 'Paid'),
(10, 5, 2, '0000-00-00', 5, 'Not Delivered', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `SellerID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Photo2` varchar(255) NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Price` decimal(5,0) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Status` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `SellerID` (`SellerID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `SellerID`, `CategoryID`, `Name`, `Photo`, `Photo2`, `Description`, `Price`, `Quantity`, `Status`) VALUES
(1, 1, 1, 'MacBookPro 13-inch', 'MacBookPro2.jpg', 'MacBookPro1.jpg', 'Apple MacBook Pro is a macOS laptop with a 13.30-inch display that has a resolution of 2560x1600 pixels. It is powered by a Core i5 processor and it comes with 12GB of RAM. The Apple MacBook Pro packs 512GB of SSD storage.', '1', 1, 'Approve'),
(2, 1, 1, 'Asus Vivo Book', 'AsusVivoBookS151.jpg', 'AsusVivoBookS152.jpg', 'The VivoBook S14 and S15 feature diamond-cut edges and metallic textured finishes. They also come in multiple array of colours that suit the user’s personality. Opening up the laptop, you’ll find the Enter key with colour-blocked edges too.', '5333', 50, 'Approve'),
(3, 2, 1, 'MacBook Air', 'MacBookAir1.jpg', 'MacBookAir2.jpg', 'The MacBook Air is a line of laptop computers developed and manufactured by Apple Inc. It consists of a full-size keyboard, a machined aluminum case, and a thin light structure. ... The MacBook Air was introduced in January 2008 with a 13.3-inch screen, and was promoted as the world\'s thinnest notebook.', '5599', 100, 'Approve'),
(4, 1, 1, 'Huawei Matebook Pro', 'HuaweiMateBook2.jpg', 'HuaweiMateBook1.jpg', 'A new level of professional performance.\\\\nWith 10th Gen Intel® Core™ i77 processor and NVIDIA GeForce MX250 discrete graphics8, up to 16 GB of memory and up to 1 TB of fast SSD storage, the HUAWEI MateBook X Pro is built to provide all the horsepower you need.', '7999', 100, 'Approve'),
(5, 4, 3, 'Mad Catz RAT7', 'Madcatz1.jpg', 'Madcatz2.jpg', 'When comparing Razer DeathAdder Elite vs Mad Catz RAT 7, the Slant community recommends Razer DeathAdder Elite for most people. In the question“What is the best gaming mouse?” Razer DeathAdder Elite is ranked 2nd while Mad Catz RAT 7 is ranked 35th. The most important reason people chose Razer DeathAdder Elite is:', '640', 100, 'Approve'),
(6, 1, 3, 'Razer Naga Trinity', 'RazerNaga1.jpg', 'RazerNaga2.jpg', 'Equipped with the world\'s most advanced 5G optical sensor with true 16,000 DPI, the Razer Naga Trinity is optimized for precision and speed, ensuring movements are swift, your spells are on target, and that you get out of the fire when battles turn intense.', '355', 100, 'Approve'),
(7, 4, 3, 'Razer Mamba Elite', 'MambaElite1.jpg', 'MambaElite2.jpg', 'The Razer Mamba Elite is the iconic gaming mouse you know and love with the most Razer Chroma in our lineup—an impressive 20 lighting zones. And with features built for performance packed into an ergonomic body, you hold an unsurpassable edge over the competition.', '379', 100, 'Approve'),
(8, 3, 3, 'Razer Naga Hex', 'NagaHex1.jpg', 'NagaHex2.jpg', 'Razer Naga Hex – MOBA/Action-RPG Gaming Mouse. The Razer Naga Hex features 6 large mechanical thumb buttons specially optimized for MOBA and action-RPG user interfaces. Every pro-gamer can map their 6 favored spells, abilities, and items to these buttons for rapid actuation.', '319', 100, 'Approve'),
(9, 3, 2, 'Razer Blackwidow Elite', 'blackwidow1.jpg', 'blackwidow2.jpg', 'Designed specifically for gaming, the Razer™ Mechanical Switch actuates at an optimal distance, giving you speed and responsiveness like never before. The Razer™ Mechanical Switch has been lauded as the new standard for all mechanical gaming keyboards since its introduction.', '650', 100, 'Approve'),
(10, 2, 2, 'Razer Huntsman Elite', 'huntsman2.jpg', 'huntsman1.jpg', 'Available in two different variant, the standard Razer Huntsman is priced at RM 649. As for the Razer Huntsman Elite which comes with additional magnetic wrist rest, multi-function digital dial, dedicated media keys, and additional Chroma RGB underglow lights, it can be obtained for RM 949.', '649', 100, 'Approve'),
(11, 2, 2, 'HP GK100S', 'GK1001.jpg', 'GK1002.jpg', 'HP GK100S RGB Backlit Wired Mechanical USB Gaming Keyboard\r\nElegant and minimalist style. Highly durable double-shot injection molding key caps. Thick keyboard with responsive keys, 2.4mm trigger route. Key cap and aperture with backlight, multi-color, colorful and uniform.', '150', 100, 'Approve'),
(12, 2, 2, 'Saitek Eclipse', 'saitek1.jpg', 'saitek2.jpg', 'From the Manufacturer. The Saitek Eclipse II keyboard builds on the success of the backlit Eclipse and Gaming keyboards, now offering a choice of colors – purple, red and blue – selectable by the user and adjustable via a dimmer mechanism.', '599', 100, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `SellerID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ShopName` varchar(255) NOT NULL,
  `SellerType` char(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` char(10) NOT NULL,
  PRIMARY KEY (`SellerID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `Username`, `ShopName`, `SellerType`, `Email`, `Address`, `ContactNumber`, `Password`, `Status`) VALUES
(1, 'johnny1234', 'JohnnyShop', 'Individual', 'johnny1234@gmail.com', 'No. 289 Jln Tangki Ayer 22000 Jerteh Terengganu Jerteh Terengganu 22000 Malaysia', '012-8977701', '12345678', 'Approve'),
(2, 'lmao', 'LmaoShop', 'Individual', 'lmao@gmail.com', 'No. 717 Lrg Senangin 3/5 Taman Senangin 09000 Kulim Kedah Kulim Kedah 09000 Malaysia', '012-9380578', '1234', 'Approve'),
(3, 'test', 'test', 'Corporate', 'test@gmail.com', 'No. 143 Jln Besar 42700 Banting Banting 42700 Malaysia', '011-1111111', '12345678', 'Approve'),
(4, 'rexIT', 'RexIT', 'Corporate', 'rexIT@gmail.com', 'No. 331 Jln Nara 16800 Pasir Puteh Pasir Puteh Kelantan 16800 Malaysia Pasir Puteh Kelantan 16800 Malays', '012-3456789', '12345678', 'Approve'),
(5, 'lemonjames', 'TacoTuesday', 'Corporate', 'lemonjames@gmail.com', '1 Jln Hussein 30250 Perak 30250 Malaysia Perak 30250 Malaysia', '012-3456789', '12345678', 'Decline');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
