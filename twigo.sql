-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 01:43 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_email` varchar(50) NOT NULL,
  `A_name` varchar(50) NOT NULL,
  `A_DOB` date NOT NULL,
  `A_design.` varchar(50) NOT NULL,
  `A_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(50) NOT NULL,
  `C_email` varchar(50) NOT NULL,
  `V_id` int(50) NOT NULL,
  `R_email` varchar(50) NOT NULL,
  `V_pickup_address` varchar(50) NOT NULL,
  `B_date` datetime(5) NOT NULL,
  `B_amount` int(50) NOT NULL,
  `B_payment` int(50) NOT NULL,
  `B_img_pay` varchar(1000) NOT NULL,
  `B_end_date` datetime(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 0, 0, 0),
('anim29006@gmail.com', 'Animesh Mondal', 'Telipukur Tejgang Burdwan', '', '7407934219', 'Kolkata', '5555555555555', '123456', '2000-06-29', '', 'Male', 'Animesh2906\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('arpan23@gmail.com', 'Arpan Ganguly', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Delhi', '55223366', '0', '2022-03-13', '', 'Male', 'andamannicobarislands\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('bruno123@gmail.com', 'Swarnava Samanta', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', '55223366', '0', '2022-03-02', '', 'Male', '22556688997744\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('h23@gmail.com', 'Henna Nielsen', 'Winden', 'I play i learn', '995587546', 'Mumbai', '45678910', '123456789', '1989-12-08', '', 'Female', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('h@gmail.com', 'Helge Doppler', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '5566332211', '0', '1999-02-14', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('helge34@gmail.com', 'Helge Doppler', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '5566332211', '0', '1999-02-14', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('k123@gmail.com', 'Katharina Nielsen', 'Winden', 'Winden high school', '5588779991', 'Mumbai', '123456', '22556677', '1988-02-12', '', 'Female', '9999', 0, 0, 0),
('m34@gmail.com', 'Martha Nielsen', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Mumbai', '55223366', '0', '2022-03-06', '', 'Female', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('martha123@gmail.com', 'Arpan Ganguly', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', 'KJDEWJKFKWEFB', '0', '2001-06-29', '', 'Male', '1234', 0, 0, 0),
('suarna69@gmail.com', 'Suparna', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Delhi', '55223366', '0', '2010-10-15', '', 'Others', '123456789\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('Ulrich789@gmail.com', 'Ulrich Nielsen', 'Telipukur Tejgang Burdwan', '', '2147483647', 'Kolkata', '45678910', '0', '1997-05-25', '', 'Male', '1234\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0),
('xyz@gmail.com', 'Ayshik', 'Howrah', '', '1234567890', 'Kolkata', '123456', '0', '2000-11-02', '', 'Male', '1234567890\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, 0, 0);

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
  `R_acno` int(50) NOT NULL,
  `R_ifsc` int(50) NOT NULL,
  `R_vehicle_img` varchar(50) NOT NULL,
  `R_DOB` date NOT NULL,
  `R_security` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`R_email`, `R_name`, `R_password`, `R_city`, `R_address`, `R_contact`, `R_gender`, `R_lisence_no`, `R_aadhar_id`, `R_acno`, `R_ifsc`, `R_vehicle_img`, `R_DOB`, `R_security`) VALUES
('martha123@gmail.com', 'Martha Nielsen', '7777', 'Kolkata', 'Winden', 2147483647, 'Female', '55223366', 55446633, 55446666, 44558877, '', '1999-06-05', 'I play i learn');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RV_id` int(11) NOT NULL,
  `C_email` varchar(50) NOT NULL,
  `V_id` int(100) NOT NULL,
  `B_id` int(100) NOT NULL,
  `R_email` varchar(50) NOT NULL,
  `RV_comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `V_Chasis_no` int(50) NOT NULL,
  `V_Y_of_reg.` year(4) NOT NULL,
  `V_km_driven` bigint(50) NOT NULL,
  `V_emmision_type` varchar(50) NOT NULL,
  `V_image` varchar(1000) NOT NULL,
  `V_address` varchar(50) NOT NULL,
  `V_booking_status` tinyint(1) NOT NULL DEFAULT 0,
  `V_rate_per_km_AC` int(4) NOT NULL,
  `V_rate_per_km_NONAC` int(5) NOT NULL,
  `V_city` varchar(12) NOT NULL,
  `V_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`V_id`, `R_email`, `V_no`, `V_name`, `V_type`, `V_Chasis_no`, `V_Y_of_reg.`, `V_km_driven`, `V_emmision_type`, `V_image`, `V_address`, `V_booking_status`, `V_rate_per_km_AC`, `V_rate_per_km_NONAC`, `V_city`, `V_description`) VALUES
(7, 'martha123@gmail.com', 'WB42AD6423', 'MahindraThar', 'Suv', 5678941, 0000, 110, 'Diesel', '', 'New Town Kolkata', 0, 12, 11, 'Kolkata', 'THAR IS AWESOME'),
(8, 'martha123@gmail.com', 'WB42AD6427', 'RenaultKwid', 'Hatchback', 412375, 0000, 500, 'Diesel', '', 'New Town ', 1, 9, 8, 'Delhi', 'Its comfortable'),
(10, 'martha123@gmail.com', 'WB42AD6429', 'HyundaiI20', 'Hatchback', 498756221, 0000, 250, 'Diesel', '', 'Knaud Place', 0, 9, 8, 'Delhi', 'This car really looks nice '),
(12, 'martha123@gmail.com', 'WB42AD6422', 'TataTigor', 'EV-Sedan', 4568799, 0000, 4500, 'Electric', '', 'Knaud Place', 0, 0, 0, 'Delhi', 'This is an electric car');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `C_email` (`C_email`),
  ADD KEY `V_id` (`V_id`),
  ADD KEY `R_email` (`R_email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_email`),
  ADD KEY `RV_id` (`RV_id`),
  ADD KEY `RV_id_2` (`RV_id`);

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
  ADD KEY `R_email_3` (`R_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RV_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `V_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`C_email`) REFERENCES `customer` (`C_email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`V_id`) REFERENCES `vehicle` (`V_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`R_email`) REFERENCES `renter` (`R_email`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`C_email`) REFERENCES `customer` (`C_email`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
