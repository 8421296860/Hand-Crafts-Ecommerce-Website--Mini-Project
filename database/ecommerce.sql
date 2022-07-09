-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 08:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin'),
(4, 'pranoj', 'pranoj'),
(5, 'bhushan', 'bhushan'),
(6, 'shubham', 'shubham'),
(7, 'chinmay', 'chinmay'),
(8, 'shreyash', 'shreyash');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_fname` varchar(100) NOT NULL,
  `admin_lname` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'motorolla'),
(5, 'LG'),
(6, 'Cloth Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(9, 10, '::1', 7, 1),
(10, 11, '::1', 7, 1),
(11, 45, '::1', 7, 1),
(49, 60, '::1', 8, 1),
(50, 61, '::1', 8, 1),
(52, 5, '::1', 9, 1),
(53, 2, '::1', 14, 1),
(54, 3, '::1', 14, 1),
(55, 5, '::1', 14, 1),
(57, 2, '::1', 9, 1),
(71, 61, '127.0.0.1', -1, 1),
(160, 101, '::1', 28, 5),
(161, 102, '::1', 28, 1),
(162, 2, '::1', 28, 1),
(185, 106, '::1', 29, 1),
(193, 2, '::1', 29, 1),
(194, 3, '::1', 29, 1),
(195, 5, '::1', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Paper Carfts'),
(2, 'Metal Carfts'),
(3, 'Beauty Products'),
(4, 'Decorative Products');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(4, 'puneethreddy951@gmail.com'),
(5, 'puneethreddy@gmail.com'),
(6, 'mr.shrihari212@gmail.com'),
(7, 'shriharijadhav@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackorsuggestion`
--

CREATE TABLE `feedbackorsuggestion` (
  `feedbackorsuggestion_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbackorsuggestion`
--

INSERT INTO `feedbackorsuggestion` (`feedbackorsuggestion_id`, `name`, `email`, `message`) VALUES
(1, 'shrihari jadhav', 'hari@gmail.com', 'well done'),
(2, 'demo', 'demo@gmail.com', 'lets see if it works\r\n'),
(3, 'qwerty', 'qwerty@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 12, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 14, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 12, 'Puneeth', 'puneethreddy951@gmail.com', 'Bangalore, Kumbalagodu, Karnataka', 'Bangalore', 'Karnataka', 560074, 'pokjhgfcxc', '4321 2345 6788 7654', '12/90', 3, 77000, 1234),
(2, 26, 'hari jadhav', 'mr.shrihari212@gmail.com', 'qwerty', 'ppur', 'Maharashtra', 413304, 'qwert', '12345', '12/12', 2, 4500, 0),
(3, 26, 'hari jadhav', 'mr.shrihari212@gmail.com', 'qwerty', 'ppur', 'maha', 412333, 'werth', '234567', '02/23', 1, 30000, 5485),
(4, 27, 'demo demotry', 'demo@gmail.com', 'solapur pandharpur', 'pune', 'amatrat', 333411, 'fafaf', '9876543', '06/65', 5, 14814, 231),
(5, 27, 'demo demotry', 'demo@gmail.com', 'solapur pandharpur', 'pune', 'maha', 444221, 'deded as', '1232', '04/55', 1, 12000, 0),
(6, 27, 'demo demotry', 'demo@gmail.com', 'solapur pandharpur', 'pune', 'asdfghjkl', 123444, 'hgfdsxcvb', '123456789', '06/06', 2, 890, 1),
(7, 26, 'hari jadhav', 'mr.shrihari212@gmail.com', 'qwerty', 'ppur', 'mh', 123654, 'hari', '123456789', '02/45', 1, 800, 212),
(8, 26, 'hari jadhav', 'mr.shrihari212@gmail.com', 'qwerty', 'ppur', 'MP', 321456, 'hari', '123456789', '02/33', 1, 90, 132),
(9, 29, 'Sarang Suhas ', 'sarang@gmail.com', 'Joshi Gulli ', 'Solapur', 'Maharashtra', 413005, 'suhas sarang', '6777 7601 0267 5255', '02/26', 1, 500, 55),
(10, 29, 'Sarang Suhas ', 'sarang@gmail.com', 'Joshi Gulli ', 'Solapur', 'Maharashtra', 413005, 'suhas sarang', '6777 7601 0267 5566', '02/26', 1, 0, 55),
(11, 30, 'Rushikesh Ghogardare', 'rushi@gmail.com', 'Pandharpur', 'Solapur', 'Maharashtra', 413005, 'rushikesh ghogar', '6777 7604 0267 8899', '02/26', 1, 0, 56),
(12, 29, 'Sarang Suhas ', 'sarang@gmail.com', 'Joshi Gulli ', 'Solapur', 'Maharashtra', 413005, 'suhas sarang', '6777 7601 0267 9988', '02/26', 1, 263, 22),
(13, 31, 'ravi sanga', 'ravi@gmail.com', 'Navi Peth ', 'Pune', 'Maharashtra', 412006, 'ravi sanga', '5877 5455 5968 7856', '05/29', 3, 2129, 26),
(14, 1, 'Ravi Misal', 'ravi@gmail.com', 'Navi Ves ', 'Akluj', 'Maharashtra', 413205, 'Ravi Misal', '5874 9658 7255 6688', '02/26', 4, 1116, 459),
(15, 1, 'Ravi Misal', 'ravi@gmail.com', 'Navi Ves ', 'Akluj', 'Maharashtra', 412006, 'Ravi Misal', '5898 5859 5862 3562', '02/26', 1, 9495, 46),
(16, 2, 'Shri Sanga', 'shri@gmail.com', 'Navi Peth', 'Solapur', 'Maharashtra', 413005, 'Shri Sanga', '9655596525789658', '12/25', 1, 99, 256),
(17, 3, 'Swapnil More', 'more@gmail.com', 'M.G.Road ', 'Mumbai', 'Maharashtra', 400005, 'More Swapnil', '5896 5859 8877', '06/24', 6, 5000, 69),
(18, 4, 'Riyaz Mulani', 'riyaz@gmail.com', 'Virar Road', 'Mumbai', 'Maharashtra', 400004, 'Riyaz Mulani', '6789 5859 5744', '03/27', 5, 2120, 789),
(19, 1, 'Ravi Misal', 'ravi@gmail.com', 'Navi Ves ', 'Akluj', 'Maharashtra', 400004, 'Ravi Misal', '6777 7601 0268 2566', '06/26', 1, 383, 24),
(20, 1, 'Ravi Misal', 'ravi@gmail.com', 'Navi Ves ', 'Akluj', 'Maharashtra', 412006, 'Ravi Misal', '6577 5525 6253 5542', '02/26', 2, 703, 24),
(21, 4, 'Riyaz Mulani', 'riyaz@gmail.com', 'Virar Road', 'Mumbai', 'Maharashtra', 410225, 'Riyaz Mulani', '6575 2563 5854', '02/26', 1, 383, 24),
(22, 5, 'Pranoj Gonjari', 'pranoj@gmail.com', 'MG road', 'Dighanchi', 'Maharashtra', 413005, 'Pranoj', '987445785896', '02/26', 1, 383, 51);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(73, 1, 1, 1, 5000),
(74, 1, 4, 2, 64000),
(75, 1, 8, 1, 40000),
(91, 2, 72, 1, 3500),
(92, 2, 10, 1, 1000),
(93, 3, 3, 1, 30000),
(94, 4, 8, 1, 3500),
(95, 4, 74, 2, 11000),
(96, 4, 96, 3, 297),
(97, 4, 75, 1, 5500),
(98, 4, 50, 1, 215),
(99, 5, 9, 1, 12000),
(100, 6, 89, 1, 800),
(101, 6, 101, 1, 90),
(102, 7, 89, 1, 800),
(103, 8, 101, 1, 90),
(104, 9, 1, 1, 500),
(105, 10, 74, 1, 0),
(106, 11, 4, 1, 0),
(107, 12, 106, 1, 263),
(108, 13, 1, 1, 80),
(109, 13, 13, 1, 1950),
(110, 13, 15, 1, 99),
(111, 14, 1, 1, 80),
(112, 14, 5, 1, 203),
(113, 14, 7, 1, 383),
(114, 14, 9, 1, 450),
(115, 15, 18, 1, 9495),
(116, 16, 15, 1, 99),
(117, 17, 4, 1, 122),
(118, 17, 2, 1, 320),
(119, 17, 19, 1, 1485),
(120, 17, 13, 1, 1950),
(121, 17, 3, 1, 740),
(122, 17, 7, 1, 383),
(123, 18, 16, 1, 400),
(124, 18, 17, 1, 99),
(125, 18, 5, 1, 203),
(126, 18, 6, 1, 68),
(127, 18, 8, 1, 1350),
(128, 19, 7, 1, 383),
(129, 20, 7, 1, 383),
(130, 20, 2, 1, 320),
(131, 21, 7, 1, 383),
(132, 22, 7, 1, 383);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_price_after_discount` int(11) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_image_name` varchar(150) NOT NULL,
  `sub_img_one` varchar(200) NOT NULL,
  `sub_img_two` varchar(200) NOT NULL,
  `sub_img_three` varchar(200) NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_category`, `product_title`, `product_price`, `product_discount`, `product_price_after_discount`, `product_description`, `product_image_name`, `sub_img_one`, `sub_img_two`, `sub_img_three`, `product_keywords`) VALUES
(1, 3, 'Beauty Product', 'Terra Soap', 100, 20, 80, 'Naturals Charcoal & Kaolin Clay Detox Bathing Soap (100gm)', '1656261253_terra_soap.jpg', '1656261253_soapnull0.jpg', '1656261253_natural-sage-mist-soap-56-oz-2.jpg', '1656261253_soapnull1.jpg', 'beauty product'),
(2, 3, 'Beauty Product', 'Khadi Soap', 400, 20, 320, 'Khadi Natural Ayurvedic Aloevera Soap Super Saver Pack 4+1 (125gm Each)', '1656261695_khadi_soap1.jpg', '1656261695_khadi_soap2.jpg', '1656261695_khadi_soap0.jpg', '1656261695_khadi_soap3.jpg', 'beauty product'),
(3, 3, 'Beauty Product', 'Just Herbs', 925, 20, 740, 'Just Herbs Handmade Bathing Bar Trio (300gm)', '1656262100_just_herbs0.png', '1656262100_just_herbs1.png', '1656262100_just_herbs2.png', '1656262100_just_herbs3.png', 'beauty product'),
(4, 3, 'Beauty Product', 'Biotique Bio', 140, 13, 122, 'Biotique Bio Basil & Parsley Revitalizing Body Soap-Pack of 3 (Each 75gm)', '1656262417_bio_soap0.jpg', '1656262417_bio_soap1.jpg', '1656262417_bio_soap2.jpg', '1656262417_bio_soap3.jpg', 'beauty product'),
(5, 3, 'Beauty Product', 'Inatur Charcoal Mineral Soap', 225, 10, 203, 'Inatur Charcoal Mineral Soap Deep Cleansing & Purifying (125gm)', '1656262755_inatur_soap0.jpg', '1656262755_inatur_soap1.jpg', '1656262755_inatur_soap2.jpg', '1656262755_inatur_soap3.jpg', 'beauty product'),
(6, 3, 'Beauty Product', 'Vaadi Herbals ', 75, 10, 68, 'Vaadi Herbals Elbow-Foot-Knee Scrub Soap (75gm)', '1656263052_vaadi_soap0.jpg', '1656263052_vaadi_soap1.jpg', '1656263052_vaadi_soap2.jpg', '1656263053_vaadi_soap3.jpg', 'beauty product'),
(7, 4, 'Decorative Product', 'Wall Hanger Cotton', 450, 15, 383, '100% pure highest quality cotton wall hangers with steel rim and hanging  clips', '1656263754_wall_hanger.jpg', '1656263754_wall_hanger1.jpg', '1656263754_wall_hanger.jpg', '1656263754_wall_hanger1.jpg', 'decorative products'),
(8, 4, 'Decorative Product', 'Matrix Hangers', 1500, 10, 1350, 'Matrix Arts and Crafts has one the beautiful handcrafted wall hangers which are more modern and beautiful', '1656264179_wall_hanging3.jpg', '1656264179_wall_hanging1.jpg', '1656264179_wall_hanging0.jpg', '1656264179_wall_hanger2.jpg', 'decorative products'),
(9, 4, 'Decorative Product', 'Leaf Hanger', 500, 10, 450, 'Craft Junction Handcrafted Bells Design Toran Main Door Wall hanger Item For HomeDecor Wall Art', '1656264573_leaf_hanger0.jpg', '1656264573_leaf_hanger1.jpg', '1656264573_leaf_hanger2.jpg', '1656264573_leaf_hanger3.jpg', 'decorative products'),
(10, 2, 'Metal Carft', 'Home Décor Decorative ', 4999, 50, 2500, 'Home Decor Decorative Showpiece - 43 cm  (Metal, Multicolor) . ', '1656265138_mc_1_0.jpg', '1656265138_mc_1_1.jpg', '1656265138_mc_1_2.jpg', '1656265138_mc_1_0.jpg', 'metal crafts'),
(12, 2, 'Metal Carft', 'Paradise Camel Decorative', 1999, 25, 1499, 'Handicrafts Paradise Camel Decorative Showpiece - 11 cm  (Aluminium, Multicolor)', '1656266344_mc_2_0.jpg', '1656266344_mc_2_1.jpg', '1656266344_mc_2_2.jpg', '1656266344_mc_2_3.jpg', 'metal crafts'),
(13, 2, 'Metal Carft', 'Horse Metal Decorative ', 2600, 25, 1950, 'Euro Crystal house statue for home decor Decorative Showpiece - 33.02 cm  (Metal, Wood, Multicolor)', '1656267010_mc_3_0.jpg', '1656267010_mc_3_1.jpg', '1656267010_mc_3_2.jpg', '1656267010_mc_3_1.jpg', 'metal crafts'),
(14, 2, 'Metal Carft', 'Stan Shoes', 80000, 50, 40000, 'eCraftIndia Decorative Soccer Ball and Shoe Tableware Decorative Showpiece - 11 cm  (Brass, Gold, Brown, Black)', '1656267509_mc_4_3.jpg', '1656267509_mc_4_1.jpg', '1656267509_mc_4_2.jpg', '1656267509_mc_4_0.jpg', 'metal crafts'),
(15, 1, 'Paper Carft', 'Dino Craft', 110, 10, 99, 'Dino origami paper craft. Rajveer Origami Arts & Crafts ', '1656268558_pp_1_1.jpg', '1656268558_pp_1_0.jpg', '1656268558_pp_1_2.jpg', '1656268558_pp_1_3.jpg', 'paper crafts'),
(16, 1, 'Paper Carft', 'Paper Bowl', 500, 20, 400, 'Designer Paper Bowl by Rajveer Arts & Crafts Ltd.', '1656269058_pp_2_2.jpg', '1656269058_pp_2_1.jpg', '1656269058_pp_2_3.jpg', '1656269058_pp_2_1.jpg', 'paper crafts'),
(17, 1, 'Paper Carft', 'Origami Box', 110, 10, 99, 'Origami Paper Boxes from Rajveer Arts & Crafts Ltd.', '1656269433_pp_3_0.jpg', '1656269433_pp_3_1.jpg', '1656269433_pp_3_2.jpg', '1656269433_pp_3_3.jpg', 'paper crafts'),
(18, 2, 'Metal Carft', 'Buddha Tree', 10550, 10, 9495, 'M-CRAFT - Offering Color Coated Buddha Fancy Tree Handicrafts, For Decoration', '1656269809_mc_5_0.jpg', '1656269809_mc_5_1.jpg', '1656269809_mc_5_2.jpg', '1656269809_mc_5_3.jpg', 'metal crafts'),
(19, 2, 'Metal Carft', 'Nirmala Handicrafts', 1650, 10, 1485, 'Nirmala Handicrafts Exporter Metal Hand Painted Peacock Radha Krishna Gift & Decor Item ', '1656270169_mc_6_3.jpg', '1656270169_mc_6_1.jpg', '1656270169_mc_6_2.jpg', '1656270169_mc_6_0.jpg', 'metal crafts'),
(20, 0, '', 'Wall', 550, 9, 501, 'Add', '1656270587_dc_1_1.jpg', '1656270587_dc_1_0.jpg', '1656270587_dc_1_3.jpg', '1656270587_dc_1_2.jpg', 'decorative'),
(21, 0, '', 'Wall Mural', 1349, 46, 728, '	Add oodles of class to your room\'s wall by picking from our creative range of wall hangings.', '1656271044_dc_2_0.jpg', '1656271044_dc_2_1.jpg', '1656271044_dc_2_3.jpg', '1656271044_dc_2_2.jpg', 'decorative'),
(22, 0, '', 'Red Paperweight Bonsai ', 425, 48, 221, 'Refurbish your home and workspace with PolliNation Artificial Bonsai. Perfect for side & cocktail tables as well as work desk. PolliNation delivers high-quality products which look & feel natural with Artificial Red Paperweight Bonsai with Pot', '1656271465_dc_3_0.jpg', '', '', '1656271465_dc_3_3.jpg', 'decorative products');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Ravi', 'Misal', 'ravi@gmail.com', 'Bhushan@123', '9544776622', 'Navi Ves ', 'Akluj'),
(2, 'Shri', 'Sanga', 'shri@gmail.com', 'Bhushan@123', '7709993037', 'Navi Peth', 'Solapur'),
(3, 'Swapnil', 'More', 'more@gmail.com', 'Bhushan@123', '9511721599', 'M.G.Road ', 'Mumbai'),
(4, 'Riyaz', 'Mulani', 'riyaz@gmail.com', 'Bhushan@123', '8815659870', 'Virar Road', 'Mumbai'),
(5, 'Pranoj', 'Gonjari', 'pranoj@gmail.com', 'Bhushan@123', '7756998436', 'MG road', 'Dighanchi');

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Ravi', 'Misal', 'ravi@gmail.com', 'Bhushan@123', '9544776622', 'Navi Ves ', 'Akluj'),
(2, 'Shri', 'Sanga', 'shri@gmail.com', 'Bhushan@123', '7709993037', 'Navi Peth', 'Solapur'),
(3, 'Swapnil', 'More', 'more@gmail.com', 'Bhushan@123', '9511721599', 'M.G.Road ', 'Mumbai'),
(4, 'Riyaz', 'Mulani', 'riyaz@gmail.com', 'Bhushan@123', '8815659870', 'Virar Road', 'Mumbai'),
(5, 'Pranoj', 'Gonjari', 'pranoj@gmail.com', 'Bhushan@123', '7756998436', 'MG road', 'Dighanchi'),
(12, 'puneeth', 'Reddy', 'puneethreddy951@gmail.com', '123456789', '9448121558', '123456789', 'sdcjns,djc'),
(14, 'hemanthu', 'reddy', 'hemanthreddy951@gmail.com', '123456788', '6526436723', 's,dc wfjvnvn', 'b efhfhvvbr'),
(15, 'hemu', 'ajhgdg', 'keeru@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(20, 'pramod', 'vh', 'pramod@gmail.com', '124335353', '9767645653', 'ksbdfcdf', 'sjrgrevgsib'),
(21, 'prajval', 'mcta', 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(25, 'otheruser', 'user', 'otheruser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(26, 'hari', 'jadhav', 'mr.shrihari212@gmail.com', 'Shrihari@123', '1234567890', 'qwerty', 'ppur'),
(27, 'demo', 'demotry', 'demo@gmail.com', 'Demo@12345', '9876543210', 'solapur pandharpur', 'pune'),
(28, 'example', 'example', 'example@gmail.com', 'example@123', '8888888888', 'Addresss', 'City'),
(29, 'Sarang', 'Suhas ', 'sarang@gmail.com', 'Sarang@123', '9511752565', 'Joshi Gulli ', 'Solapur'),
(30, 'Rushikesh', 'Ghogardare', 'rushi@gmail.com', 'Rushi@123', '9511456878', 'Pandharpur', 'Solapur'),
(31, 'ravi', 'sanga', 'ravi@gmail.com', 'Sarang@123', '9544778899', 'Navi Peth ', 'Pune');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `feedbackorsuggestion`
--
ALTER TABLE `feedbackorsuggestion`
  ADD PRIMARY KEY (`feedbackorsuggestion_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbackorsuggestion`
--
ALTER TABLE `feedbackorsuggestion`
  MODIFY `feedbackorsuggestion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
