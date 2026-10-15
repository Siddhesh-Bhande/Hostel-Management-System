-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 05:57 PM
-- Server version: 10.1.36-MariaDB
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
-- Database: `hmsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `hh_admin_users`
--

CREATE TABLE `hh_admin_users` (
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_User_Id` varchar(30) NOT NULL,
  `Admin_Password` varchar(30) NOT NULL,
  `Admin_Xtra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hh_admin_users`
--

INSERT INTO `hh_admin_users` (`Admin_Name`, `Admin_User_Id`, `Admin_Password`, `Admin_Xtra`) VALUES
('Siddhesh Bhande', 'B_sid123', 'pass345', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_info`
--

CREATE TABLE `hotels_info` (
  `Hotel_Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Boy_Girls` varchar(100) NOT NULL,
  `NumberOfBeds` int(10) NOT NULL,
  `Beds_Vacant` int(10) NOT NULL,
  `Ac_NonAc` varchar(30) NOT NULL,
  `Lunch_options` varchar(30) NOT NULL,
  `Students_per_room` int(10) NOT NULL,
  `Hostel_User_Id` varchar(30) NOT NULL,
  `Hostel_password` varchar(30) NOT NULL,
  `Hostel_reg_status` varchar(30) NOT NULL,
  `Cost_Per_Year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels_info`
--

INSERT INTO `hotels_info` (`Hotel_Name`, `Location`, `Boy_Girls`, `NumberOfBeds`, `Beds_Vacant`, `Ac_NonAc`, `Lunch_options`, `Students_per_room`, `Hostel_User_Id`, `Hostel_password`, `Hostel_reg_status`, `Cost_Per_Year`) VALUES
('Terna COE Hostel', 'Nerul, Navi Mumbai', 'Boys and Girls', 0, 250, 'Not Available', 'Lunch + Dinner', 3, 'terna2hostel', '1234', 'Not Confirmed', 60000),
('Terna Dental College Hostel', 'Nerul, Navi Mumbai', 'Girls only', 0, 300, 'Available', 'Lunch + Dinner', 4, 'terna3hostel', '1234', 'Not Confirmed', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `std_hostel_booking`
--

CREATE TABLE `std_hostel_booking` (
  `User_Id` varchar(100) NOT NULL,
  `Hostel_User_Id` varchar(100) NOT NULL,
  `Booking_status` varchar(100) NOT NULL,
  `Payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_hostel_connect`
--

CREATE TABLE `student_hostel_connect` (
  `User_Id` varchar(30) NOT NULL,
  `Hostel_Id` varchar(30) NOT NULL,
  `Greivance_Title` varchar(200) NOT NULL,
  `G_Desc` varchar(500) NOT NULL,
  `G_Category` varchar(30) NOT NULL,
  `G_Status` varchar(30) NOT NULL,
  `G_resolution` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `User_Id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Age` int(30) NOT NULL,
  `Education` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`First_Name`, `Last_Name`, `User_Id`, `Password`, `Email`, `Age`, `Education`) VALUES
('Siddhesh', 'Bhande', 'bhandesid786', '1234', 'bhandesid786@gmail.com', 21, '2'),
('Sakshi ', 'Said', 'sadSakshi', '1234', 'sadsak@g.c', 21, '1'),
('Siddhesh', 'B', 'sid1', '1234', 'sid@g.c', 23, '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
