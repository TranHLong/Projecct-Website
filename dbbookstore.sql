-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2021 at 10:59 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL auto_increment,
  `Product` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Foreign Literature'),
(2, 'Manga'),
(3, 'Detective Novel'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `contact`, `address`, `email`, `item`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(2, 'aaa ss', 'dd', 'ddddd', 'fffff@gmail.com', '(1) IT Chapter 1, ', '150000', 'unconfirmed', '12/16/21 10:46:31 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL auto_increment,
  `imgUrl` text NOT NULL,
  `Product` text NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Category` text NOT NULL,
  `Category69` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`, `Category69`) VALUES
(2, 'Product_2.jpg', 'IT Chapter 1', 'Author: Stephen King', 150000, 'Horror', '4'),
(3, 'Product_3.jpg', 'Let the Right One In', 'Author: John Ajvide Lindqvist ', 110000, 'Horror', '4'),
(4, 'Product_4.jpg', 'The Exorcist', 'Author: William Peter Blatty', 95000, 'Horror', '4'),
(6, 'Product_6.png', 'One Piece', 'Author: Eiichiro Oda', 20000, 'Manga', '2'),
(7, 'Product_7.jpg', 'Dragon Ball', 'Author: Toriyama Akira', 25000, 'Manga', '2'),
(8, 'Product_8.jpg', 'Naruto', 'Author: Masashi Kishimoto', 25000, 'Manga', '2'),
(9, 'Product_9.jpg', 'Doraemon', 'Author: Fujiko Fujio', 18000, 'Manga', '2'),
(10, 'Product_10.jpg', 'Attack on Titan', 'Author: Isayama Hajime', 19000, 'Manga', '2'),
(11, 'Product_12.jpg', 'James and the Giant Peach', 'Author:  Roald Dahl', 130000, 'Foreign Literature', '1'),
(12, 'Product_13.jpg', 'Winnie the Pooh ', 'Author: Alan Alexander Milne', 130000, 'Foreign Literature', '1'),
(14, 'Product_15.jpg', 'The wind in the willows', 'Author:  Kenneth Grahame', 130000, 'Foreign Literature', '1'),
(17, 'Product_16.jpg', 'Sherlock Holmes', 'Author: Arthur Conan Doyle', 150000, 'Detective Novel', '3'),
(18, 'Product_17.jpg', 'Death on The Nile', 'Author: Agatha Christie', 137000, 'Detective Novel', '3'),
(19, 'Product_18.jpg', 'The Davinci Code', 'Author: Dan Brown', 129000, 'Detective Novel', '3'),
(20, 'Product_14.jpg', 'Testing', 'no need', 62000, 'Foreign Literature', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hodem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ten` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phanquyen` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hodem`, `ten`, `phanquyen`) VALUES
(1, 'Nguyentanhao123', 'c0cf1a015347e0b1b07428c97615902752af6683', '', '', 0),
(2, 'Nguyentrungnhan123', '0d59ec9ffecb5a4ed391713b5c728fd1d03a2575', '', '', 0),
(3, 'Truongvanthanhlam123', '1c6d6ca22cc31cb79e6e1f5277ef06e0', '', '', 0),
(4, 'Tranhoanglong123', 'f87f3d515880b9c02869a62c9218224c2b4322a7', '', '', 0);
