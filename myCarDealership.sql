-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2019 at 08:14 PM
-- Server version: 5.7.24-log
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
-- Database: `mycardealership`
--
CREATE DATABASE IF NOT EXISTS `mycardealership` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mycardealership`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` char(12) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `username`, `password`, `first_name`, `last_name`, `phone_number`, `address`) VALUES
(5, 'cblack', '0af46e127eed641f8ce91b671e68947e', 'Carson', 'Black', '017-205-0173', '794 Essex Dr, Wellington, FL 33414'),
(6, 'nfloyd', '446cfa6ce1869992a1af137f7c892d5c', 'Nolan', 'Floyd', '019-522-1930', '8 Westminster Rd, Elk Grove Village, IL 60007'),
(7, 'preed', '90e5733b2a490c5f3fc3a47df4d47ba5', 'Peyton', 'Reed', '507-375-7746', '466 Rockcrest Dr, Merrick, NY 11566'),
(8, 'ntorres', '07c70e0264300d769453597c493e8738', 'Naomi', 'Torres', '176-774-805', '290 Bridgeton Rd, South Portland, ME 04106'),
(9, 'loganj', 'f00028e01d3e9e9e89b43a386c5b45a7', 'Logan', 'Joyce', '622-226-202', '7309 3rd Ave, Miami Beach, FL 33139'),
(10, 'hmoreno', '9b28cae70bcf2dd7f0f89a52b9a55485', 'Hunter', 'Moreno', '463-934-846', '1 Rock Maple Street, Statesville, NC 28625'),
(11, 'bjackson', '3ca8d6927782db4a198d82c240612033', 'Bailey', 'Jackson', '327-271-845', '680 West Cherry St, Saint Louis, MO 63109'),
(12, 'ellas', '94e97030c952f8fe39ce3029a7e52a3b', 'Ella', 'Solomon', '091-165-597', '29 Indian Spring Ave, Blackwood, NJ 08012'),
(13, 'jgilliam', '4f19111c3ee2d5325e474ba64ba4405b', 'Josiah', 'Gilliam', '424-905-5456', '21 Winding Way Ln, Opa Locka, FL 33054'),
(14, 'wperry', 'e702e68a1a7400c45832d6c95f8d70f8', 'William', 'Perry', '287-929-0902', '578 Leatherwood Ln, New Castle, PA 16101'),
(15, 'test_customer', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test', 'Customer', '555-606-0842', '123 Sesame St, New York, NY 12345');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` char(6) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `username`, `password`) VALUES
('307478', 'employee1', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `stock_no` varchar(12) NOT NULL,
  `new_used` varchar(4) NOT NULL,
  `year` year(4) NOT NULL,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `miles` mediumint(9) NOT NULL,
  `city_mpg` tinyint(4) NOT NULL,
  `highway_mpg` tinyint(4) NOT NULL,
  `color` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `interest_rate` text NOT NULL,
  `down_payment` int(11) NOT NULL,
  `stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`stock_no`, `new_used`, `year`, `make`, `model`, `miles`, `city_mpg`, `highway_mpg`, `color`, `price`, `discount`, `interest_rate`, `down_payment`, `stock`) VALUES
('B15100', 'new', 2019, 'Buick', 'LaCrosse', 0, 25, 35, 'silver', 39280, 500, '4.0% - 7.5%', 7856, 1),
('JPJ42696', 'new', 2018, 'Jeep', 'Renegade', 0, 24, 31, 'white', 25345, 1999, '4.0% - 7.5%', 5069, 1),
('JPJ61073', 'new', 2018, 'Jeep', 'Renegade', 0, 24, 31, 'green', 26855, 300, '4.0% - 7.5%', 5371, 1),
('JU235922', 'new', 2018, 'Honda', 'Civic', 0, 32, 42, 'black', 26645, 995, '4.0% - 7.5%', 5329, 1),
('K1490A', 'used', 2015, 'Dodge', 'Grand Caravan', 102247, 17, 25, 'white', 14995, 599, '5.0% - 8.0%', 1500, 1),
('K1517A', 'used', 2016, 'Chevrolet', 'Silverado', 24696, 18, 24, 'red', 32995, 3000, '5.0% - 8.0%', 3300, 1),
('K1923B', 'used', 2012, 'Ford', 'Edge', 72564, 19, 27, 'red', 16595, 2000, '6.0% - 9.0%', 1660, 1),
('K2125B', 'used', 2015, 'Chevrolet', 'Spark', 79236, 30, 39, 'red', 9795, 300, '5.0% - 8.0%', 980, 1),
('K2227A', 'used', 2015, 'FIAT', '500 Abarth', 43755, 28, 34, 'black', 14995, 725, '5.0% - 8.0%', 1500, 1),
('K2383', 'new', 2019, 'Toyota', 'Camry L', 0, 29, 41, 'blue', 25956, 1250, '4.0% - 7.5%', 5191, 1),
('K2656A', 'used', 2016, 'BMW', '328i', 20942, 23, 35, 'blue', 27995, 5000, '5.0% - 8.0%', 2800, 1),
('K2765A', 'used', 2014, 'Dodge', 'Grand Caravan', 76596, 17, 25, 'red', 14995, 995, '5.5% - 8.0%', 1500, 1),
('K2892A', 'used', 2017, 'Chevrolet', 'Colorado', 29732, 16, 18, 'red', 37995, 2500, '5.0% - 8.0%', 3800, 1),
('K3057', 'new', 2019, 'Toyota', 'Prius LE', 0, 54, 50, 'black', 27641, 3500, '4.0% - 7.5%', 5528, 1),
('K3193A', 'used', 2011, 'Chevrolet', 'Silverado', 101784, 14, 19, 'silver', 17250, 1999, '6.0% - 9.0%', 1725, 1),
('K3203A', 'used', 2018, 'Ford', 'F-150 Raptor', 23912, 15, 18, 'silver', 62595, 4999, '4.0% - 7.5%', 6260, 1),
('K3262', 'new', 2019, 'Toyota', 'Avalon Limited', 0, 22, 31, 'black', 45660, 4200, '4.0% - 7.5%', 9132, 1),
('KB071152', 'new', 2019, 'Honda', 'Odyssey', 0, 19, 28, 'white', 45805, 4250, '4.0% - 7.5%', 9161, 1),
('KH613487', 'new', 2019, 'Chrysler', '300 Touring', 0, 19, 30, 'black', 32010, 599, '4.0% - 7.5%', 6402, 1),
('MS9001', 'new', 2019, 'Ford', 'Mustang', 0, 21, 32, 'blue', 30435, 1500, '4.0% - 7.5%', 6087, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchaseID` int(3) NOT NULL,
  `customerID` int(11) NOT NULL,
  `stock_no` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `loan_term` int(11) NOT NULL,
  `credit_card` decimal(12,0) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchaseID`, `customerID`, `stock_no`, `date`, `total_price`, `loan_term`, `credit_card`, `order_status`) VALUES
(1, 15, 'B15100', '2019-04-14', 38780, 24, '123412341234', 'pending'),
(2, 15, 'K1517A', '2019-04-16', 29995, 36, '432143214321', 'pending'),
(3, 15, 'KB071152', '2019-04-16', 41555, 72, '432143214321', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`stock_no`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchaseID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `stock_no` (`stock_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchaseID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`stock_no`) REFERENCES `inventory` (`stock_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
