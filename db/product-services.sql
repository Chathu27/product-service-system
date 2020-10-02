-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 03:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
(12, 'Chathu', 'Saduni', 'chathu@gmail.com', 'jkl', '2258', '58895');

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
(116, '0000-00-00', 'Kamal', 'Difficult task', 870989038),
(117, '2020-09-24', 'Madawa', 'Valve problem', 870989019),
(118, '2020-09-25', 'chathura ', 'hose damage', 870989024),
(155, '2020-09-30', 'Ruwan', 'Not good', 870989023),
(156, '2020-10-01', 'Nipuna', 'Belt replacement on machine 2', 870989039),
(157, '2020-09-03', 'Nipuna', 'Good job', 870989040);

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
(30, 0, 45, 1),
(31, 0, 44, 1),
(40, 156, 44, 20),
(41, 156, 51, 2),
(42, 156, 45, 5),
(43, 116, 42, 1),
(44, 116, 55, 1),
(45, 116, 27, 1),
(46, 117, 36, 2),
(47, 117, 54, 1),
(48, 117, 27, 1),
(49, 155, 44, 1),
(50, 155, 42, 1),
(51, 155, 48, 10),
(52, 157, 45, 1),
(53, 157, 42, 10),
(54, 157, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `inv_id` int(11) NOT NULL,
  `service_order_no` varchar(50) NOT NULL,
  `estimate_id` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `service_order_no`, `estimate_id`, `invoice_date`, `total`) VALUES
(1, '870989019', '117', '2020-10-02', 15250),
(2, '870989029', '115', '2020-10-02', 13000),
(5, '870989023', '155', '2020-10-02', 2100),
(6, '870989040', '157', '2020-09-05', 21300);

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
  `completed_date` date NOT NULL,
  `inv_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_orders`
--

INSERT INTO `service_orders` (`service_order_no`, `customer_id`, `order_date`, `serial_no`, `accessories`, `remarks`, `machine_id`, `status`, `completed_date`, `inv_status`) VALUES
(870989019, '6', '2020-08-31', '40001', 'Hose,hose', 'Hose Damage', 100002, 4, '2020-10-01', 1),
(870989023, '11', '2020-10-02', '6790420', 'power nozzle, filter', 'Nozzle without hose', 100002, 4, '2020-10-02', 1),
(870989024, '7', '2020-09-07', '200053', 'filter', 'hose damage', 100001, 6, '0000-00-00', 0),
(870989029, '10', '2020-09-16', '50001', 'test', 'testing', 100002, 4, '0000-00-00', 0),
(870989037, '11', '2020-09-22', '10002', 'hose', 'hose damage', 100001, 1, '0000-00-00', 0),
(870989038, '12', '2020-09-22', '10002', 'ljkljklj', 'ljkljkl', 100001, 5, '0000-00-00', 0),
(870989039, '12', '2020-10-01', '900054', 'Belt replacement', 'Belt replacement', 100008, 2, '0000-00-00', 0),
(870989040, '11', '2020-09-02', '456454', 'Test Test ', 'Test Test Test Test ', 100012, 4, '2020-09-05', 1);

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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`inv_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `estimate_data`
--
ALTER TABLE `estimate_data`
  MODIFY `estimate_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `estimate_items`
--
ALTER TABLE `estimate_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `service_order_no` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870989041;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
