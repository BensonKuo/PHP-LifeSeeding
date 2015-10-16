-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- 主機: localhost:3306
-- 產生時間： 2015 年 05 月 27 日 18:10
-- 伺服器版本: 5.5.38
-- PHP 版本： 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `LifeSeeding`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `ac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`ac`, `pw`) VALUES
('ben', 1207);

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
`CustomerNo` int(11) NOT NULL,
  `CustomerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerFrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Note` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `CustomerID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
`PaymentNo` int(11) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `TransferAcc` int(11) NOT NULL,
  `TransferAmt` int(11) NOT NULL,
  `TransferTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `payment`
--

INSERT INTO `payment` (`PaymentNo`, `OrderNo`, `TransferAcc`, `TransferAmt`, `TransferTime`, `CustomerName`, `CustomerPhone`, `TimeStamp`) VALUES
(45, 31, 500, 500, 'dsd', 'dodo', '+886919919716', '2015-05-27 16:07:23');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
`No` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Subcategory` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Price` smallint(6) NOT NULL,
  `Stock` smallint(6) NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PicType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PicBlob` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `purchase`
--

CREATE TABLE `purchase` (
`OrderNo` int(11) NOT NULL,
  `ProductNo` int(11) NOT NULL,
  `ProductAmt` int(11) NOT NULL,
  `CustomerID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PurchaseTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PaidCheck` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DeliveryCheck` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`CustomerNo`);

--
-- 資料表索引 `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`PaymentNo`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`OrderNo`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
MODIFY `CustomerNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- 使用資料表 AUTO_INCREMENT `payment`
--
ALTER TABLE `payment`
MODIFY `PaymentNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
MODIFY `No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- 使用資料表 AUTO_INCREMENT `purchase`
--
ALTER TABLE `purchase`
MODIFY `OrderNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
