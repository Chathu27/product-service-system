-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 03:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product-services`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(200) NOT NULL,
  `catagory_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`) VALUES
(100000, 'Wheels'),
(100001, 'High pressure Hose'),
(100002, 'Nozzle'),
(100003, 'Valve'),
(100004, 'Vacuum Hose'),
(100005, 'Tool'),
(100006, 'Housing'),
(100007, 'Oil'),
(100008, 'screw'),
(100009, 'Nut'),
(100010, 'Brush'),
(100011, 'Trigger Gun'),
(100012, 'Filter'),
(100013, 'Power Cable'),
(100014, 'Filter');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_addr` varchar(100) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email_addr`, `addr`, `contact_no`, `nic`) VALUES
(2, 'Kavindi', 'Dep', 'kavi@gmail.com1', '3/A,Rajagiriya1', '0714568558', '9785412558v'),
(3, 'Chathu', 'Gunwardane', 'chathu@gmail.com', '45 Athurugiriya', '07789546321', '9645121323'),
(6, 'Madara1', 'Godage', 'madumi1990@gmail.com', '8b,First streett,colombo-06', '0767409396', '645371489v'),
(7, 'Nuwan', 'Buddhika', 'nuwanbuddi@gmail.com', 'No:400,Temple Rd, Athurugiriya-0', '0112433566', '8990754568v'),
(9, 'Shehan', 'Ranawaka', 'shehan1990@gmail.com', 'No:29/B,Kurukulawa,Ragama', '0785667223', '9877756454v'),
(10, 'Suresh ', 'Ranjan', 'ranjan@gmail.com', 'No:34,Temple Road, Kelaniya', '0112456789', '645678978v'),
(11, 'Dilukshi', 'Chethana', 'chethi1996/@gmail.com', 'No:85/B, Flower Road,Kandy', '0764333446', '665435245v'),
(12, 'Chathu', 'Saduni', 'chathu@gmail.com', 'jkl', '2258', '58895'),
(13, 'Nayana', ' Ranathunga', 'nainiranathunga@gmail.com', 'No:245, Temple Rd, Kelaniya', '0724432524', '889076456v');

-- --------------------------------------------------------

--
-- Table structure for table `estimate_data`
--

CREATE TABLE `estimate_data` (
  `estimate_id` int(200) NOT NULL,
  `order_date` date NOT NULL,
  `estimate_by` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `service_order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimate_data`
--

INSERT INTO `estimate_data` (`estimate_id`, `order_date`, `estimate_by`, `remarks`, `service_order_no`) VALUES
(115, '2020-09-23', ' Ravudu', 'Hose Damage/nozzle Damage', 870989029),
(116, '2020-09-23', 'Madawa', 'testing', 870989038),
(117, '2020-09-24', 'Madawa', 'Valve problem', 870989019),
(118, '2020-09-25', 'chathura ', 'hose damage', 870989024),
(155, '2020-09-30', 'Ruwan', 'Not good', 870989023),
(156, '2020-09-30', 'chathura', 'test1234', 870989037),
(157, '2020-09-30', 'Madawa', 'test', 870989029),
(158, '2020-09-30', '', '', 870989024),
(159, '2020-09-30', '', '', 870989024),
(160, '2020-09-30', '', '', 870989024),
(161, '2020-09-30', '', '', 870989024),
(162, '2020-09-30', '', '', 870989024),
(163, '2020-09-30', '', '', 870989024),
(164, '2020-09-30', '', '', 870989024),
(165, '2020-09-30', '', '', 870989024);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_items`
--

CREATE TABLE `estimate_items` (
  `id` int(11) NOT NULL,
  `estimate_id` int(200) NOT NULL,
  `item_id` int(200) NOT NULL,
  `quantity` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimate_items`
--

INSERT INTO `estimate_items` (`id`, `estimate_id`, `item_id`, `quantity`) VALUES
(1, 100, 45, 1),
(2, 100, 55, 1),
(3, 115, 27, 1),
(4, 116, 36, 1),
(5, 117, 36, 2),
(23, 155, 44, 1),
(24, 155, 42, 1),
(25, 155, 48, 10),
(26, 156, 27, 1),
(27, 156, 27, 1),
(28, 156, 27, 1),
(29, 156, 27, 1),
(30, 157, 44, 1),
(31, 157, 27, 1),
(32, 160, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `machine_models`
--

CREATE TABLE `machine_models` (
  `machine_id` int(225) NOT NULL,
  `machine_model` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_models`
--

INSERT INTO `machine_models` (`machine_id`, `machine_model`) VALUES
(100001, 'K5 Premium Electric Power Pressure Washer'),
(100002, 'K2 Plus Electric Power Pressure Washer'),
(100003, ' K7.85M Pressure Washer'),
(100004, 'Vc 2 Vacuum Cleaner '),
(100005, 'Mv3 1000-Watt Wet and Dry Vacuum Cleaner'),
(100006, 'Vc 3 Vacuum Cleaner '),
(100007, 'WD 3.5 Premium Wet & Dry Vacuum Cleaner'),
(100008, 'HD 5/12 C PLUS Professional Pressure Washer'),
(100009, 'Spray-Extraction Carpet & Upholstery Cleaners'),
(100010, 'HDS 5/12 C hot water high-pressure cleaner'),
(100011, ' SV Steam vacuum cleaner'),
(100012, ' WV5 Premium Window Vacuum C');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `item_id` int(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `catagory_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`item_id`, `item_name`, `price`, `quantity`, `catagory_id`) VALUES
(27, ' Rotary Nozzle', '13000', 10, 100002),
(36, 'Valve Seat', '750', 2, 100013),
(40, 'Power Nozzle', '17500', 1, 0),
(42, 'Vacuum Bag', '750', 1, 100014),
(44, 'Vc Flat Filter', '1100', 1, 100014),
(45, 'WD Vacuum Filter ', '800', 1, 100012),
(46, 'MV 3 Vacuum Filter ', '800', 1, 100014),
(47, 'Floor Tool', '1200', 1, 100005),
(48, 'Hex Socket', '25', 1, 100008),
(49, 'Hex Washer', '40', 1, 100008),
(50, 'Slotted Hex Washer', '40', 1, 100008),
(51, 'Valve Seat', '750', 5, 100003),
(52, 'Vacuum Brush', '450', 1, 100010),
(53, 'Pump adapter ', '150', 1, 0),
(54, 'Valve Seat', '750', 1, 100003),
(55, '8gg', '900', 100, 100013);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(200) NOT NULL,
  `role_name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_orders`
--

CREATE TABLE `service_orders` (
  `service_order_no` int(225) NOT NULL,
  `customer_id` varchar(225) NOT NULL,
  `order_date` date NOT NULL,
  `serial_no` varchar(225) NOT NULL,
  `accessories` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `completed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_orders`
--

INSERT INTO `service_orders` (`service_order_no`, `customer_id`, `order_date`, `serial_no`, `accessories`, `remarks`, `machine_id`, `status`, `completed_date`) VALUES
(870989019, '6', '2020-08-31', '40001', 'Hose,hose', 'Hose Damage', 100002, 4, '0000-00-00'),
(870989023, '11', '2020-09-02', '6790420', 'power nozzle, filter', 'Nozzle without hose', 100002, 1, '2020-09-30'),
(870989024, '7', '2020-09-07', '200053', 'filter', 'hose damage', 100001, 2, '2020-09-28'),
(870989029, '10', '2020-09-16', '50001', 'test', 'testing', 100002, 2, '0000-00-00'),
(870989037, '11', '2020-09-22', '10002', 'hose', 'hose damage', 100001, 2, '0000-00-00'),
(870989047, '10', '2020-10-01', '4000', 'Nozzle, Trigger Gun', 'Hose Damage, Without Filter', 100010, 1, '0000-00-00'),
(870989048, '3', '2020-10-01', '10002', 'Flat filter, vacuum hose, filter bag', 'Machine service only', 100005, 1, '0000-00-00'),
(870989049, '2', '2020-10-01', '50001', 'Machine only', 'Poor steam', 100011, 1, '0000-00-00'),
(870989050, '6', '2020-10-01', '7000', 'Hose,Filter', 'Without Nozzle', 100002, 1, '0000-00-00'),
(870989051, '12', '2020-10-01', '400089', 'Machine only', 'Housing Damage', 100003, 1, '0000-00-00'),
(870989052, '13', '2020-10-01', '90877', 'Filter bag, Filter', 'Filter Damage', 100004, 1, '0000-00-00'),
(870989053, '11', '2020-10-01', '78-89098', 'Brush,plug top', 'Brush damage', 100009, 1, '0000-00-00'),
(870989054, '9', '2020-10-01', '400067', 'Filter damage, Floor Tool, Vacuum Hose', 'Without Filter Bag', 100012, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_role` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `customer_id`, `u_email`, `u_password`, `u_role`) VALUES
(1, 0, 'admin@admin.com', '123456', 1),
(12, 0, 'chathu@gmail.com', '123456', 2),
(13, 0, 'tech@gmail.com', '123456', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `estimate_data`
--
ALTER TABLE `estimate_data`
  ADD PRIMARY KEY (`estimate_id`);

--
-- Indexes for table `estimate_items`
--
ALTER TABLE `estimate_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_models`
--
ALTER TABLE `machine_models`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD PRIMARY KEY (`service_order_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100015;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `estimate_data`
--
ALTER TABLE `estimate_data`
  MODIFY `estimate_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `estimate_items`
--
ALTER TABLE `estimate_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `service_order_no` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870989055;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
