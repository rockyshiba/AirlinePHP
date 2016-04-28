-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 01:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airlinephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `City` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `Name`, `Code`, `City`) VALUES
(2, 'Pearson', 'YYZ', 'Toronto'),
(3, 'PET', 'KUL', 'Montreal');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `credit_card` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `province`, `postal_code`, `email`, `credit_card`) VALUES
(1, 'John', 'Doe', '123 Fake Street', 'Toronto', 'Ontario', 'M2M2Z2', 'john@email.com', 3352352),
(3, 'John', 'Doe', '123 Fake Street', 'Toronto', 'Ontario', 'M2M2Z1', 'john@email.com', 24626272),
(4, 'Barry Bonds', 'Bonds', '123 Brampton Street', 'North York', 'Ontario', 'M2M 2Z', 'barry@email.com', 123141),
(5, 'Barry Bonds', 'Bonds', '123 Brampton Street', 'North York', 'Ontario', 'M2M 2Z', 'barry@email.com', 1231),
(6, 'Barry Bonds', 'Bonds', '123 Brampton Street', 'North York', 'Ontario', 'M2M 2Z', 'barry@email.com', 114141),
(7, 'Barry Bonds', 'Bonds', '123 Brampton Street', 'North York', 'Ontario', 'M2M 2Z', 'barry@email.com', 96986),
(8, 'Barry Bonds', 'Bonds', '123 Brampton Street', 'North York', 'Ontario', 'M2M 2Z', 'barry@email.com', 12314),
(9, 'James', 'Bond', '123 street', 'toronto', 'Ontario', 'a2a 2a', 'some@tom.com', 436363),
(10, 'James', 'Bond', '123 street', 'toronto', 'Ontario', 'a2a 2a', 'some@tom.com', 436363);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL COMMENT 'fk of customer.id',
  `subtotal` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `shipping` varchar(50) NOT NULL,
  `items` int(11) NOT NULL,
  `shipped` tinyint(1) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `c_id`, `subtotal`, `total`, `shipping`, `items`, `shipped`, `order_date`) VALUES
(1, 4, '840.99', '967.14', 'store', 0, 0, '0000-00-00 00:00:00'),
(2, 4, '840.99', '967.14', 'address', 0, 0, '0000-00-00 00:00:00'),
(3, 4, '840.99', '967.14', 'address', 0, 0, '0000-00-00 00:00:00'),
(4, 4, '840.99', '967.14', 'address', 0, 0, '0000-00-00 00:00:00'),
(5, 9, '29088.99', '33452.34', 'store', 0, 0, '0000-00-00 00:00:00'),
(6, 9, '29088.99', '33452.34', 'store', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  `serial_num` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `serial_num`, `description`, `category`) VALUES
(3, 'Leather shoess', '200.00', 30, 54133315, 'Dress to impress. Conquer the world.', 'Footwear'),
(4, 'Blanket', '40.99', 40, 238473958, 'Warm blanket', 'Comfort'),
(9, 'Umbrella', '10.00', 22, 29835, 'Keep yourself dry', 'Outdoors'),
(11, 'Demo', '1.00', 1, 12345, 'Demo', 'Demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
