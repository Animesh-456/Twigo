-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 07:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `A_email` varchar(50) NOT NULL,
  `A_name` varchar(50) NOT NULL,
  `A_DOB` date NOT NULL,
  `A_design.` varchar(50) NOT NULL,
  `A_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`A_email`, `A_name`, `A_DOB`, `A_design.`, `A_password`) VALUES
('d@gmail.com', 'Deb Paul', '2022-05-18', 'Manager', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(50) NOT NULL,
  `C_email` varchar(50) NOT NULL,
  `V_id` int(50) NOT NULL,
  `D_email` varchar(50) DEFAULT NULL,
  `B_type` varchar(50) NOT NULL,
  `B_distance` varchar(5) NOT NULL,
  `B_round_trip` int(1) NOT NULL,
  `B_pickup_address` varchar(50) NOT NULL,
  `B_drop_address` varchar(50) NOT NULL,
  `B_date` date NOT NULL,
  `B_amount` int(50) NOT NULL,
  `B_img_pay` varchar(1000) NOT NULL,
  `B_passenger` varchar(50) DEFAULT NULL,
  `R_email` varchar(50) NOT NULL,
  `B_ridestatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_id`, `C_email`, `V_id`, `D_email`, `B_type`, `B_distance`, `B_round_trip`, `B_pickup_address`, `B_drop_address`, `B_date`, `B_amount`, `B_img_pay`, `B_passenger`, `R_email`, `B_ridestatus`) VALUES
(99, 'k123@gmail.com', 24, 'anim29006@gmail.com', 'CityRide', '0-10', 1, 'Burdwan ', 'Kolkata', '2022-05-31', 320, 'IMG-62960765f16729.90155826.pdf', NULL, 'anim29006@gmail.com', 0),
(100, 'k123@gmail.com', 25, 'suparno69@gmail.com', 'CityRide', '10-20', 1, 'Burdwan ', 'Kolkata', '2022-06-01', 400, 'IMG-6296078acd7095.79237371.pdf', NULL, 'anim29006@gmail.com', 1),
(101, 'k123@gmail.com', 22, 'suparno69@gmail.com', 'CityRide', '20-30', 1, 'Burdwan ', 'Kolkata', '2022-06-10', 600, 'IMG-629607e54ff9e7.21515116.pdf', NULL, 'annu@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_email` varchar(50) NOT NULL,
  `C_name` varchar(50) NOT NULL,
  `C_address` varchar(50) NOT NULL,
  `C_security` varchar(50) NOT NULL,
  `C_contact` varchar(12) NOT NULL,
  `C_city` varchar(50) NOT NULL,
  `C_lisence_no` varchar(50) NOT NULL,
  `C_adhar_id` varchar(50) NOT NULL,
  `C_dob` date NOT NULL,
  `C_image` varchar(50) NOT NULL,
  `C_gender` text NOT NULL,
  `C_password` varchar(50) NOT NULL,
  `C_a/c_no` int(50) NOT NULL,
  `C_ifsc` int(50) NOT NULL,
  `RV_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_email`, `C_name`, `C_address`, `C_security`, `C_contact`, `C_city`, `C_lisence_no`, `C_adhar_id`, `C_dob`, `C_image`, `C_gender`, `C_password`, `C_a/c_no`, `C_ifsc`, `RV_id`) VALUES
('anim29006@gmail.com', 'Animesh Mondal', 'Telipukur Tejgang Burdwan', '', '7407934219', 'Kolkata', '5555555555555', '123456', '2000-06-29', '', 'Male', 'Animesh2906\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('arpan23@gmail.com', 'Arpan Ganguly', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Delhi', '55223366', '0', '2022-03-13', '', 'Male', 'andamannicobarislands\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('bruno123@gmail.com', 'Swarnava Samanta', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', '55223366', '0', '2022-03-02', '', 'Male', '22556688997744\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('h23@gmail.com', 'Henna Nielsen', 'Winden', 'I play i learn', '995587546', 'Mumbai', '45678910', '123456789', '1989-12-08', '', 'Female', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('h@gmail.com', 'Helge Doppler', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '5566332211', '0', '1999-02-14', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('helge34@gmail.com', 'Helge Doppler', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '5566332211', '0', '1999-02-14', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('k123@gmail.com', 'Katharina Nielsen', 'Winden', 'Winden high school', '5588779991', 'Mumbai', '123456', '22556677', '1988-02-12', '', 'Male', '1234', 0, 0, 0),
('m34@gmail.com', 'Martha Nielsen', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '55223366', '0', '2022-03-06', '', 'Female', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('martha123@gmail.com', 'Arpan Ganguly', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', 'KJDEWJKFKWEFB', '0', '2001-06-29', '', 'Male', '1234', 0, 0, 0),
('suarna69@gmail.com', 'Suparna', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Delhi', '55223366', '0', '2010-10-15', '', 'Others', '123456789\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('Ulrich789@gmail.com', 'Ulrich Nielsen', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', '45678910', '0', '1997-05-25', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('xyz@gmail.com', 'Ayshik', 'Howrah', '', '1234567890', 'Kolkata', '123456', '0', '2000-11-02', '', 'Male', '1234567890\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `D_email` varchar(50) NOT NULL,
  `D_name` varchar(50) NOT NULL,
  `D_address` varchar(50) NOT NULL,
  `D_contact` varchar(12) NOT NULL,
  `D_city` varchar(12) NOT NULL,
  `D_lisence` varchar(20) NOT NULL,
  `D_dob` date NOT NULL,
  `D_gender` varchar(10) NOT NULL,
  `D_psw` varchar(50) NOT NULL,
  `D_security` varchar(50) NOT NULL,
  `D_adhar` varchar(20) NOT NULL,
  `D_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`D_email`, `D_name`, `D_address`, `D_contact`, `D_city`, `D_lisence`, `D_dob`, `D_gender`, `D_psw`, `D_security`, `D_adhar`, `D_status`) VALUES
('anim29006@gmail.com', 'Animesh Mondal', 'Telipukur Tejgang Burdwan', '7407934219', 'Kolkata', '5566332211', '2000-06-29', 'Male', '5678', 'Winden high school', '4567891', 1),
('suparno69@gmail.com', 'Suparno Chakroborty', 'Telipukur Tejgang Burdwan', '7407934219', 'Kolkata', '55223366', '2022-05-09', 'Male', '1234', 'I play i learn', '4567952', 1);

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `R_email` varchar(50) NOT NULL,
  `R_name` varchar(50) NOT NULL,
  `R_password` varchar(50) NOT NULL,
  `R_city` varchar(50) NOT NULL,
  `R_address` varchar(50) NOT NULL,
  `R_contact` int(12) NOT NULL,
  `R_gender` varchar(50) NOT NULL,
  `R_lisence_no` varchar(50) NOT NULL,
  `R_aadhar_id` int(12) NOT NULL,
  `R_acno` varchar(50) NOT NULL,
  `R_ifsc` varchar(50) NOT NULL,
  `R_vehicle_img` varchar(50) NOT NULL,
  `R_DOB` date NOT NULL,
  `R_security` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`R_email`, `R_name`, `R_password`, `R_city`, `R_address`, `R_contact`, `R_gender`, `R_lisence_no`, `R_aadhar_id`, `R_acno`, `R_ifsc`, `R_vehicle_img`, `R_DOB`, `R_security`) VALUES
('anim29006@gmail.com', 'Animesh Mondal', '1234', 'Kolkata', 'Telipukur Tejgang Burdwan', 2147483647, 'Male', '5566332211', 456789521, '45678952', 'UTIB00018985', '', '1999-08-25', 'I play i learn'),
('annu@gmail.com', 'Arunabha Dutta', 'anu88', 'Delhi', 'Tagor Garden,West Delhi,110027', 2147483647, 'Male', 'MH-452306507139', 2147483647, '655264444344', 'SBIN45685634', '', '1988-02-07', 'chicken nudgets'),
('aro@gmail.com', 'Arayanak Chatterjjee', 'pz67', 'Delhi', 'Bharat Nagar,110052', 2147483647, 'Male', 'DL-768935697', 2147483647, '894107724173', 'SBIN00956954', '', '2000-07-12', 'pizzahut'),
('babi56@gmail.com', 'Babita Sharma', 'bb65', 'Delhi', 'Connught Place,110001', 2147483647, 'Female', 'WB-32889025821', 2147483647, '569094325629', 'SBIN8905954', '', '1986-02-08', 'french fries'),
('dasayan31@gmail.com', 'Ayan Das', 'sudisna', 'Kolkata', 'Esplanade,700069', 2147483647, 'Male', 'WB-76389025821', 2147483647, '367177170252', 'SBIN76495954', '', '2000-06-09', 'AfraidofSudisna'),
('dasgupta8@gmail.com', 'Yash Dasgupta', 'yd67', 'Kolkata', 'Bowbazar,700012', 2147483647, 'Male', 'MH7589002136', 2147483647, '484000212352', 'SBIN45684965', '', '2000-06-08', 'i love bacon'),
('dbose5@gmail.com', 'Dipyan Bose', 'dbose12', 'Kolkata', 'Dhakuria,700031', 2147483647, 'Male', 'DL-768935697', 2147483647, '662436706535', 'SBIN76495923', '', '1995-12-05', 'cup of tea makes me happy'),
('DStinni23@gmail.com', 'Debapriya Sarkar', 'ds45', 'Kolkata', 'Brace Bridge,700088', 2147483647, 'Female', 'WB-56680025821', 2147483647, '632341351182', 'SBIN45690034', '', '2000-12-23', 'rabindranritto'),
('ganguly6@gmail.com', 'Sohini Ganguly', 'sg656', 'Kolkata', 'Behala,700034', 2147483647, 'Female', 'WB-78609853', 2147483647, '473051852879', 'SBIN45690965', '', '1996-08-18', 'nahutt'),
('k123@gmail.com', 'Animesh Mondal', '1234', 'Delhi', 'Telipukur Tejgang Burdwan', 2147483647, 'Male', '45678910', 456789521, '456789522', 'SBIN76495975', '', '2000-06-29', 'Winden high school'),
('m34@gmail.com', 'Animesh Mondal', '1234', 'Kolkata', 'Telipukur Tejgang Burdwan', 2147483647, 'Male', '5566332211', 456789521, '45678952', 'UTIB00018985', '', '1999-08-25', 'I play i learn'),
('martha123@gmail.com', 'Martha Nielsen', '7777', 'Kolkata', 'Winden', 2147483647, 'Male', '55223366', 55446633, '55446666', '44558877', '', '1999-06-05', 'I play i learn'),
('mk@gmail.com', 'Martha Nielsen', '1234', 'Delhi', 'Telipukur Tejgang Burdwan', 2147483647, 'Male', '5566332211', 456897521, '4567896521', 'SBIN76495954', '', '2000-06-29', 'nikkhedinia'),
('rev4@gmail.com', 'Revaan Roy', 'rev7', 'Mumbai', 'Mandvi,400003', 2147483647, 'Male', 'MH-452300867139', 2147483647, '584576446463', 'SBIN76495975', '', '1997-04-07', 'MarthaNielsen'),
('samantas3@gmail.com', 'Sneha Samanta', '1234', 'Kolkata', 'Janpath, Central Delhi 110001', 2147483647, 'Male', 'DL-4567891235671', 2147483647, '791455048023', 'UTIB00018985', '', '1999-02-04', 'nikkhedinia'),
('sharmad4@gmail.com       ', 'Divya Sharma', 'dv87', 'Mumbai', 'Chamarbaug,400012', 2147483647, 'Female', 'WB-76980025821', 2147483647, '570601090574', 'SBIN45684990', '', '1987-02-05', 'cupcake'),
('thakur8@gmail.com', 'Prasant Thakur', 'tg56', 'Kolkata', 'Ballygunge,700019', 2147483647, 'Male', 'WB-32884565821', 2147483647, '394815281260', 'SBIN45676690', '', '1988-11-07', 'vadilal');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RV_id` int(11) NOT NULL,
  `C_email` varchar(50) NOT NULL,
  `RV_comment` varchar(250) NOT NULL,
  `RV_rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`RV_id`, `C_email`, `RV_comment`, `RV_rate`) VALUES
(9, 'k123@gmail.com', 'Quite Good !', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `V_id` int(50) NOT NULL,
  `R_email` varchar(50) NOT NULL,
  `V_no` varchar(12) NOT NULL,
  `V_name` varchar(50) NOT NULL,
  `V_type` varchar(50) NOT NULL,
  `V_Chasis_no` varchar(50) NOT NULL,
  `V_Y_of_reg.` year(4) NOT NULL,
  `V_km_driven` bigint(50) NOT NULL,
  `V_emmision_type` varchar(50) NOT NULL,
  `V_image` varchar(1000) NOT NULL,
  `V_address` varchar(50) NOT NULL,
  `V_booking_status` tinyint(1) NOT NULL DEFAULT 0,
  `V_city` varchar(12) NOT NULL,
  `V_description` varchar(500) NOT NULL,
  `V_no_seats` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`V_id`, `R_email`, `V_no`, `V_name`, `V_type`, `V_Chasis_no`, `V_Y_of_reg.`, `V_km_driven`, `V_emmision_type`, `V_image`, `V_address`, `V_booking_status`, `V_city`, `V_description`, `V_no_seats`) VALUES
(20, 'annu@gmail.com', 'WB42AD6423', 'SuzukiDzire', 'Sedan', '1HGBH41JXMN109186', 0000, 12302, 'Diesel', '', 'New Town Kolkata', 0, 'Kolkata', 'xyz', '5'),
(21, 'annu@gmail.com', 'WB42AD6454', 'MahindraThar', 'Suv', '1HLBH41JXON109184', 0000, 25000, 'Diesel', '', 'Behala', 0, 'Kolkata', 'xyz', '5'),
(22, 'annu@gmail.com', 'DL42AD6427', 'VolkswagenPolo', 'Hatchback', '1HGBU41JQMN109182', 0000, 124563, 'Diesel', '', 'Sadar Bazar', 0, 'Delhi', 'asd', '5'),
(23, 'anim29006@gmail.com', 'WB42AD6427', 'SuzukiSwift', 'Hatchback', '1HLBH41JXON109184', 0000, 25456, 'Diesel', '', 'Behala', 0, 'Kolkata', 'bbb', '4'),
(24, 'anim29006@gmail.com', 'WB42AD6427', 'SuzukiXL6', 'Suv', '1HGBH41JXMN109186', 0000, 55555, 'Diesel', '', 'New Town ', 0, 'Kolkata', 'ccc', '5'),
(25, 'anim29006@gmail.com', 'WB42AD6420', 'SuzukiSwift', 'Hatchback', '1HLBH41JXON109187', 0000, 4568, 'Diesel', '', 'New Town Kolkata', 0, 'Kolkata', 'bgvcf', '4'),
(26, 'anim29006@gmail.com', 'WB42AD6410', 'HyundaiAlcazar', 'Suv', 'KOL567POK441', 0000, 5689, 'Diesel', '', 'New Town Kolkata', 0, 'Kolkata', 'frt', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`A_email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `C_email` (`C_email`),
  ADD KEY `V_id` (`V_id`),
  ADD KEY `R_email` (`D_email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_email`),
  ADD KEY `RV_id` (`RV_id`),
  ADD KEY `RV_id_2` (`RV_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`D_email`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`R_email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RV_id`),
  ADD KEY `C_email` (`C_email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`V_id`),
  ADD KEY `R_email` (`R_email`),
  ADD KEY `R_email_2` (`R_email`),
  ADD KEY `R_email_3` (`R_email`),
  ADD KEY `R_email_4` (`R_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `V_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`C_email`) REFERENCES `customer` (`C_email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`V_id`) REFERENCES `vehicle` (`V_id`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`C_email`) REFERENCES `customer` (`C_email`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
